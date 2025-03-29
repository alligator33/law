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

function getCompanyInfo($pdo) {
    try {
        $stmt = $pdo->query("SELECT * FROM company_info ORDER BY id DESC LIMIT 1");
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log("Error fetching company info: " . $e->getMessage());
        return null;
    }
}
?>