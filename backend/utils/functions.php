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

function getPageConfig() {
    static $config = null;
    
    if ($config === null) {
        // Load JSON file
        $jsonPath = __DIR__ . '/../../config/page-config.json';
        $jsonContent = file_get_contents($jsonPath);
        
        if ($jsonContent === false) {
            error_log("Could not read config file: $jsonPath");
            return [];
        }
        
        // Decode JSON
        $config = json_decode($jsonContent, true);
        
        if (json_last_error() !== JSON_ERROR_NONE) {
            error_log("Invalid JSON in config file: " . json_last_error_msg());
            return [];
        }
        
        // If we have a database connection, merge with database info
        global $pdo;
        if (isset($pdo)) {
            $dbInfo = getCompanyInfo($pdo);
            if ($dbInfo) {
                // Update company info with database values
                $config['company_info'] = array_merge($config['company_info'], [
                    'email' => $dbInfo['email'],
                    'phone' => $dbInfo['phone'],
                    'address' => [
                        'line1' => $dbInfo['address_line1'],
                        'line2' => $dbInfo['address_line2'],
                        'city' => $dbInfo['city'],
                        'state' => $dbInfo['state'],
                        'postal_code' => $dbInfo['postal_code']
                    ]
                ]);
            }
        }
    }
    
    return $config;
}

function getSection($section, $subsection = null) {
    $config = getPageConfig();
    
    if ($subsection) {
        return $config[$section][$subsection] ?? null;
    }
    
    return $config[$section] ?? null;
}
?>