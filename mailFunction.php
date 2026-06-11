<?php
session_start();

function maskTokenForDebug($token) {
    if (empty($token) || !is_string($token)) {
        return '';
    }

    $tokenLength = strlen($token);
    if ($tokenLength <= 12) {
        return $token;
    }

    return substr($token, 0, 6) . '...' . substr($token, -6);
}

function getPostValue($primaryKey, $fallbackKeys = array()) {
    if (isset($_POST[$primaryKey])) {
        return $_POST[$primaryKey];
    }

    foreach ($fallbackKeys as $key) {
        if (isset($_POST[$key])) {
            return $_POST[$key];
        }
    }

    return '';
}

// ===== SECURITY CONFIGURATION =====
$MAX_REQUESTS_PER_HOUR = 5;  // Max emails from same IP per hour
$MIN_TIME_BETWEEN_REQUESTS = 5;  // Minimum seconds between requests
$MAX_MESSAGE_LENGTH = 5000;
$MAX_NAME_LENGTH = 100;
$EMAIL_REGEX = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
$POSTMARK_API_KEY = '301943f2-1fec-4a46-872d-f71f3f203455';
$ADMIN_EMAIL = 'project.support@gridlinemanagement.biz';
$companyName = "Gridline Management Inc";

// ===== SECURITY FUNCTIONS =====

// 1. CSRF Token Validation
function validateCSRFToken() {
    // Backward-compatible: if CSRF fields are not present in the form yet,
    // don't block submission. If both are present, enforce strict validation.
    if (empty($_POST['csrf_token']) || empty($_SESSION['csrf_token'])) {
        return true;
    }

    if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        return false;
    }
    return true;
}

// 2. Honeypot Field Check (catches bots)
function checkHoneypot() {
    if (!empty($_POST['website']) || !empty($_POST['phone_number'])) {
        return false; // Honeypot field filled, likely a bot
    }
    return true;
}

// 3. Rate Limiting Check
function checkRateLimit() {
    global $MAX_REQUESTS_PER_HOUR, $MIN_TIME_BETWEEN_REQUESTS;
    $clientIP = getClientIP();
    
    // Initialize session tracking
    if (!isset($_SESSION['email_requests'])) {
        $_SESSION['email_requests'] = array();
    }
    
    $currentTime = time();
    $requestKey = 'ip_' . $clientIP;
    
    // Clean old requests (older than 1 hour)
    if (isset($_SESSION['email_requests'][$requestKey])) {
        $_SESSION['email_requests'][$requestKey] = array_filter(
            $_SESSION['email_requests'][$requestKey],
            function($timestamp) use ($currentTime) {
                return ($currentTime - $timestamp) < 3600;
            }
        );
    } else {
        $_SESSION['email_requests'][$requestKey] = array();
    }
    
    // Check if too many requests
    if (count($_SESSION['email_requests'][$requestKey]) >= $MAX_REQUESTS_PER_HOUR) {
        return false;
    }
    
    // Check minimum time between requests
    if (!empty($_SESSION['email_requests'][$requestKey])) {
        $lastRequest = end($_SESSION['email_requests'][$requestKey]);
        if (($currentTime - $lastRequest) < $MIN_TIME_BETWEEN_REQUESTS) {
            return false;
        }
    }
    
    // Add current request
    $_SESSION['email_requests'][$requestKey][] = $currentTime;
    return true;
}

// 4. Input Validation
function validateInputs(&$inputs) {
    $errors = array();
    
    // Name validation
    if (empty($inputs['name']) || strlen($inputs['name']) > 100) {
        $errors[] = 'Invalid name';
    }

    // Organization validation (optional)
    if (!empty($inputs['organization']) && strlen($inputs['organization']) > 200) {
        $errors[] = 'Invalid organization';
    }

    // Phone validation (optional)
    if (!empty($inputs['phone']) && strlen($inputs['phone']) > 50) {
        $errors[] = 'Invalid phone number';
    }

    // Email validation
    if (empty($inputs['email']) || !preg_match($GLOBALS['EMAIL_REGEX'], $inputs['email'])) {
        $errors[] = 'Invalid email address';
    }
    
    // Message validation
    if (empty($inputs['message']) || strlen($inputs['message']) > $GLOBALS['MAX_MESSAGE_LENGTH']) {
        $errors[] = 'Message must not exceed ' . $GLOBALS['MAX_MESSAGE_LENGTH'] . ' characters';
    }
    
    return $errors;
}

// 5. Spam Detection
function detectSpam($message, $name) {
    // Check for excessive URLs
    if (substr_count($message, 'http://') > 3 || substr_count($message, 'https://') > 3) {
        return true;
    }
    
    // Check for common spam keywords
    $spamKeywords = array('viagra', 'casino', 'lottery', 'click here', 'buy now', 'free money', 'work from home', 'bitcoin', 'cryptocurrency');
    $messageLower = strtolower($message);
    foreach ($spamKeywords as $keyword) {
        if (strpos($messageLower, $keyword) !== false) {
            return true;
        }
    }
    
    // Check for repeated characters (spam pattern)
    if (preg_match('/(.)\1{9,}/', $message)) {
        return true;
    }
    
    // Check for ALL CAPS (potential spam)
    if (strlen($message) > 20 && strtoupper($message) === $message) {
        return true;
    }
    
    return false;
}

// 6. Get Client IP Address
function getClientIP() {
    $ipKeys = array('HTTP_CF_CONNECTING_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'HTTP_CLIENT_IP', 'HTTP_X_CLIENT_IP', 'REMOTE_ADDR');
    foreach ($ipKeys as $key) {
        if (array_key_exists($key, $_SERVER) === true) {
            $ips = explode(',', $_SERVER[$key]);
            $ip = trim($ips[0]);
            if (filter_var($ip, FILTER_VALIDATE_IP) === false) {
                continue;
            }
            return $ip;
        }
    }
    return $_SERVER['REMOTE_ADDR'];
}

// ===== MAIN VALIDATION =====

$statusCode = 'failed';
$errorMessage = '';
$debugInfo = array();

// Check request method
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $errorMessage = 'Invalid request method';
    $debugInfo = array(
        'reason' => 'invalid_request_method',
        'request_method' => isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : ''
    );
} 
// Check CSRF token
elseif (!validateCSRFToken()) {
    $errorMessage = 'Invalid session. Please try again.';
    $debugInfo = array(
        'reason' => 'csrf_validation_failed',
        'has_post_token' => !empty($_POST['csrf_token']),
        'has_session_token' => !empty($_SESSION['csrf_token']),
        'post_token_preview' => isset($_POST['csrf_token']) ? maskTokenForDebug($_POST['csrf_token']) : '',
        'session_token_preview' => isset($_SESSION['csrf_token']) ? maskTokenForDebug($_SESSION['csrf_token']) : '',
        'session_id' => session_id(),
        'session_cookie_name' => session_name(),
        'has_session_cookie' => isset($_COOKIE[session_name()])
    );
} 
// Check honeypot
elseif (!checkHoneypot()) {
    $errorMessage = 'Invalid form submission';
    $debugInfo = array(
        'reason' => 'honeypot_triggered'
    );
} 
// Check rate limiting
elseif (!checkRateLimit()) {
    $errorMessage = 'Too many requests. Please wait before sending another email.';
    $debugInfo = array(
        'reason' => 'rate_limit_triggered'
    );
} else {
    // Sanitize inputs
    $inputs = array(
        'name' => trim(strip_tags(getPostValue('name'))),
        'organization' => trim(strip_tags(getPostValue('organization', array('company')))),
        'phone' => trim(strip_tags(getPostValue('phone'))),
        'email' => filter_var(getPostValue('email'), FILTER_SANITIZE_EMAIL),
        'message' => trim(strip_tags(getPostValue('message', array('textarea-55'))))
    );
    
    // Validate inputs
    $validationErrors = validateInputs($inputs);
    if (!empty($validationErrors)) {
        $errorMessage = implode(', ', $validationErrors);
        $debugInfo = array(
            'reason' => 'input_validation_failed',
            'validation_errors' => $validationErrors
        );
    } 
    // Check for spam
    elseif (detectSpam($inputs['message'], $inputs['name'])) {
        $errorMessage = 'Your message was flagged as potential spam. Please review and try again.';
        $debugInfo = array(
            'reason' => 'spam_detected'
        );
    } 
    else {
        // All validations passed, proceed with email sending
        $fullname = $inputs['name'];
        $organization = $inputs['organization'];
        $phone = $inputs['phone'];
        $clientEmail = $inputs['email'];
        $message = $inputs['message'];
        
        $subject = 'Inquiry - ' . $fullname . ' - ' . $organization . ' - ' . $clientEmail;
        
        $formContent = "<b>Name: </b>" . htmlspecialchars($fullname) .
            "<br><b>Organization: </b>" . htmlspecialchars($organization) .
            "<br><b>Phone: </b>" . htmlspecialchars($phone) .
            "<br><b>Email: </b>" . htmlspecialchars($clientEmail) .
            "<br><b>Message: </b>" . nl2br(htmlspecialchars($message));

        $adminEmailData = array(
            'From' => $ADMIN_EMAIL,
            'To' => $ADMIN_EMAIL,      
            'Subject' => $subject,
            'HtmlBody' => $formContent,
            'MessageStream' => 'outbound',
            'ReplyTo' => $clientEmail
        );

        $clientEmailData = array(
            'From' => $ADMIN_EMAIL,
            'To' => $clientEmail,
            'Subject' => 'We have received your email!',
            'HtmlBody' => 'Hi ' . htmlspecialchars($fullname) . ' , <br><br> Your email has been received and as soon as an agent is available they will contact you. <br><br> Regards, <br>' . $companyName,
            'MessageStream' => 'outbound'
        );

        // Primary channel: Postmark, with PHP mail() fallback for environments where API/cURL fail.
        $adminSent = sendEmailViaPostmark($adminEmailData, $POSTMARK_API_KEY);
        $clientSent = sendEmailViaPostmark($clientEmailData, $POSTMARK_API_KEY);

        if (!$adminSent) {
            $adminSent = sendEmailViaPhpMail($ADMIN_EMAIL, $subject, $formContent, $clientEmail);
        }

        if (!$clientSent) {
            $clientAckSubject = 'We have received your email!';
            $clientAckBody = 'Hi ' . htmlspecialchars($fullname) . ' , <br><br> Your email has been received and as soon as an agent is available they will contact you. <br><br> Regards, <br>' . $companyName;
            $clientSent = sendEmailViaPhpMail($clientEmail, $clientAckSubject, $clientAckBody, $ADMIN_EMAIL);
        }

        if ($adminSent && $clientSent) {
            $statusCode = 'success';
            $debugInfo = array(
                'reason' => 'sent_successfully'
            );
        } else {
            $errorMessage = 'Failed to send email. Please try again later.';
            $debugInfo = array(
                'reason' => 'postmark_send_failed'
            );
        }
    }
}


// Function to send email via Postmark
function sendEmailViaPostmark($emailData, $apiKey) {
    if (empty($apiKey) || !function_exists('curl_init')) {
        return false;
    }

    $cSession = curl_init();
    curl_setopt($cSession, CURLOPT_URL, "https://api.postmarkapp.com/email");
    curl_setopt($cSession, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($cSession, CURLOPT_HTTPHEADER, array(
        'Accept: application/json',
        'Content-Type: application/json',
        'X-Postmark-Server-Token:' . $apiKey
    ));
    curl_setopt($cSession, CURLOPT_POSTFIELDS, json_encode($emailData));
    curl_setopt($cSession, CURLOPT_HEADER, false);
    curl_setopt($cSession, CURLOPT_TIMEOUT, 10);
    
    $result = curl_exec($cSession);
    $httpCode = curl_getinfo($cSession, CURLINFO_HTTP_CODE);
    curl_close($cSession);
    
    return ($httpCode >= 200 && $httpCode < 300);
}

function sendEmailViaPhpMail($to, $subject, $htmlBody, $replyTo) {
    $headers = array(
        'MIME-Version: 1.0',
        'Content-type: text/html; charset=UTF-8',
        'From: Gridline Management Inc <project.support@gridlinemanagement.biz>',
        'Reply-To: ' . $replyTo,
        'X-Mailer: PHP/' . phpversion()
    );

    return mail($to, $subject, $htmlBody, implode("\r\n", $headers));
}

// Redirect with status
$redirectPage = isset($_POST['redirect_page']) && preg_match('/^[a-z0-9\-]+$/i', $_POST['redirect_page']) ? $_POST['redirect_page'] : 'contact-us';
header("Location: ./?page=" . $redirectPage . "&email-sent=" . $statusCode . ($errorMessage ? "&error=" . urlencode($errorMessage) : ""));
exit;
// header('Content-Type: application/json');
// echo json_encode(array('status' => $statusCode, 'error' => $errorMessage, 'debug' => $debugInfo));
?>