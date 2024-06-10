<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $otp = rand(100000, 999999); 

   
    session_start();
    $_SESSION['otp'] = $otp;
    $_SESSION['otp_email'] = $email;

    
}