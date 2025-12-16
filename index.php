<?php
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/app/controllers/MainController.php';



$controller = $_GET['controller'] ?? 'main';
$action = $_GET['action'] ?? 'home';




$map = [
    'main' => MainController::class,
];


if (!isset($map[$controller])) {
    http_response_code(404);
    echo 'Not found';
    exit;
}
$instance = new $map[$controller]($pdo);


if (!method_exists($instance, $action)) {
    http_response_code(404);
    echo 'Action not found';
    exit;
}


// Render the action
$instance->$action();