<!-- This is the front controller for the application where All requests are routed through this file using .htaccess -->
<?php
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/app/controllers/MainController.php';
require_once __DIR__ . '/app/models/User.php';
require_once __DIR__ . '/app/controllers/AuthController.php';
require_once __DIR__ . '/app/controllers/UserController.php';
require_once __DIR__ . '/app/models/Post.php';
require_once __DIR__ . '/app/controllers/PostController.php';
require_once __DIR__ . '/app/controllers/AdminController.php';
require_once __DIR__ . '/app/controllers/TutorialController.php';
require_once __DIR__ . "/app/models/Tutorial.php";
require_once __DIR__ . '/app/models/Quote.php';



$controller = $_GET['controller'] ?? 'main';
$action = $_GET['action'] ?? 'home';



// This Maps the URL controller names to their matching controller classes, this prevents direct file access and keeps the routing centralized.
$map = [
    'main' => MainController::class,
    'auth' => AuthController::class,
    'user' => UserController::class,
    'post' => PostController::class,
    'admin' => AdminController::class,
    'tutorial' => TutorialController::class,

];

// If the requested controller does not exist, return a 404 response
if (!isset($map[$controller])) {
    http_response_code(404);
    echo 'Not found';
    exit;
}
$instance = new $map[$controller]($pdo);

// If the requested action does not exist on the controller, return a 404 response
if (!method_exists($instance, $action)) {
    http_response_code(404);
    echo 'Action not found';
    exit;
}




// Render the action, execute the requested controller action

$instance->$action();