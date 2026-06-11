<?php
session_start();
if (empty($_SESSION['csrf_token'])) {
	$_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
error_reporting(0);
include 'includes/content.php';
include 'includes/header.php';
include 'includes/body.php';
include 'includes/footer.php';
