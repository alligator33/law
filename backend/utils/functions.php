<?php
function sanitizeInput($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function saveContentToDatabase($content, $pdo) {
    $stmt = $pdo->prepare("INSERT INTO page_content (content) VALUES (:content)");
    $stmt->bindParam(':content', $content);
    return $stmt->execute();
}
?>