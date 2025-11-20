<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

function getIPInfo() {
    // Получаем IP
    $ipResponse = file_get_contents('https://api.ipify.org?format=json');
    $ipData = json_decode($ipResponse, true);
    
    if (!isset($ipData['ip'])) {
        return ['error' => 'Could not get IP address'];
    }
    
    // Получаем информацию об IP
    $infoResponse = file_get_contents("https://ipapi.co/{$ipData['ip']}/json/");
    $fullInfo = json_decode($infoResponse, true);
    
    return [
        'success' => true,
        'data' => $fullInfo,
        'timestamp' => date('c')
    ];
}

// Обрабатываем разные HTTP методы
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $result = getIPInfo();
    echo json_encode($result, JSON_PRETTY_PRINT);
} else {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
}
?>
