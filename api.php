<?php
header('Content-Type: application/json');
$file = 'history.json';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (file_exists($file)) {
        echo file_get_contents($file);
    } else {
        echo '[]';
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $data = file_get_contents('php://input');
    file_put_contents($file, $data);
    echo '{"status": "ok"}';
} else {
    http_response_code(405);
    echo '{"error": "Method not allowed"}';
}
?>