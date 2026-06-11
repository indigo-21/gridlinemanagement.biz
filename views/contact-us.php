<div class="tekup-breadcrumb" style="background-image: url(assets/img/contact-banner.jpg)">
    <div class="container">
        <h1 class="post__title">Contact Us</h1>
        <nav class="breadcrumbs">
            <ul>
                <li><a href='?page=home'>Home</a></li>
                <li aria-current="page"> Contact Us</li>
            </ul>
        </nav>

    </div>
</div>
<div class="section tekup-section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-6 d-flex align-items-center">
                <div class="tekup-default-content">
                    <h2>LET'S TALK ABOUT YOUR PROJECT </h2>
                    <h5>Let's talk about your following challenges.</h5>
                    <p>Every successful project starts with a good conversation. Please tell us your needs and goals,
                        and together we will design the best strategy to achieve sustainable and measurable results.</p>
                    <pWe're here to help you transform your management, streamline your operations, and take your
                        business to the next level.>
                        </p>
                        <div class="tekup-contact-info-wrap wrap2">
                            <div class="tekup-contact-info mb-0">
                                <i class="ri-mail-fill"></i>
                                <h5>Email</h5>
                                <a href="mailto:info@corlevconsulting.com">info@corlevconsulting.com</a>
                            </div>
                        </div>
                        <div class="tekup-contact-info-wrap wrap2">
                            <div class="tekup-contact-info mb-0">
                                <i class="fa fa-map-pin"></i>
                                <h5>Address</h5>
                                1303 Greene Avenue, Suite 400 <br> Westmount, Quebec <br> Canada, H3Z2A7
                            </div>
                        </div>
                </div>
            </div>
            <div class="col-xl-6 offset-xl-1 col-lg-6">
                <div class="tekup-main-form">
                    <h3>Contact Form</h3>
                    <p>Leave us your details and we will contact you as soon as possible.</p>
                    <?php
                    // Generate CSRF token if not already in session
                    if (session_status() === PHP_SESSION_NONE) {
                        session_start();
                    }
                    if (empty($_SESSION['csrf_token'])) {
                        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
                    }
                    ?>
                    <form action="mailFunction.php" method="post">
                        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                        <input type="hidden" name="redirect_page" value="contact-us">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="tekup-main-field">
                                    <input type="text" name="name" placeholder="Full Name" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="tekup-main-field">
                                    <input type="text" name="company" placeholder="Company / Organization">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="tekup-main-field">
                                    <input type="email" name="email" placeholder="Email" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="tekup-main-field">
                                    <input type="text" name="phone" placeholder="Contact Phone" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="tekup-main-field">
                                    <textarea name="message"
                                        placeholder="Write to us briefly about your needs or the service you are interested in"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <input type="text" id="captcha_mail" name="captcha" hidden>
                                <div class="col">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group ">
                                                <input type="text"
                                                    class="form-control text-3 custom-border-color-grey-1 h-auto py-2"
                                                    id="submit" placeholder="Captcha" />
                                            </div>
                                        </div>
                                        <div class="col-md-1 mt-2 text-center">
                                            <div onclick="generate()">
                                                <i class="fas fa-sync"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <input type="text"
                                                    class="form-control text-3 custom-border-color-grey-1 h-auto py-2"
                                                    style="text-decoration:line-through;text-align:center; font-style: italic;"
                                                    id="captchandler" disabled>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <button type="button" id="tekup-main-form-btn" class=""
                                                onclick="printmsg()">
                                                <span class="btn-text">Check </span></button>
                                        </div>
                                    </div>
                                    <p id="key" style="color:green; font-weight:bold; padding:10px 5px;"></p>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <button id="tekup-main-form-btn" type="submit">Send Message <i
                                        class="ri-arrow-right-up-line"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_REQUEST['email-sent']) && $_REQUEST['email-sent'] == 'success') {
    echo '<script>
				Swal.fire({
				icon: "success",
				title: "Message sent",
				showConfirmButton: false,
				timer: 2000    })
     		 </script>';
}
?>