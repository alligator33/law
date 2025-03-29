<?php
function sendMail($to, $subject, $message, $headers) {
    // Use PHP's mail function to send the email
    if(mail($to, $subject, $message, $headers)) {
        return true;
    } else {
        return false;
    }
}
?>