<?php

$ruta = rtrim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$metodo = $_SERVER['REQUEST_METHOD'];
$viewDir = '/views';
$rutaContenido = __DIR__ . $viewDir;

require_once 'controllers/UserController.php';
require_once 'controllers/ContractController.php';

if ($ruta === '/new-user' && $metodo === 'GET') {
    mostrarFormulario();

} elseif ($ruta === '/new-user' && $metodo === 'POST') {
    guardarUsuario();

} elseif ($ruta === '') {
    $parentContent = $rutaContenido . "/home.php";
    require __DIR__ . '/includes/layout.php';
} elseif ($ruta === '/new-contract' && $metodo === 'GET') {
    mostrarFormularioContrato();
} elseif ($ruta === '/new-contract' && $metodo === 'POST') {
    guardarContrato();
} else {
    $parentContent = $rutaContenido . "/404.php";
    require __DIR__ . '/includes/layout.php';
}
