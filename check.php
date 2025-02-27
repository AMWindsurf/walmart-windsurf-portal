<?php
session_start();

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accessCode = $_POST['accessCode'];
    
    // Check for Walmart access code
    if ($accessCode === 'WMT2025') {
        $_SESSION['authorized'] = true;
        $_SESSION['client'] = 'walmart';
        echo json_encode(['success' => true, 'redirect' => '/walmart.html']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid access code']);
    }
    exit;
}

// Check if user is authorized for direct page access
if (!isset($_SESSION['authorized']) || $_SESSION['authorized'] !== true) {
    header('Location: /index.html');
    exit;
}
?>
