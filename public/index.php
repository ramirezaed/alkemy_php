<?php
// http://localhost:8000/?accion=listar-productos
require_once __DIR__ . '/../vendor/autoload.php';

use App\Controller\products\ProductController;
// Lectura de la accion solicitada. Si no viene ninguna, usamos un
// valor por defecto (estructura condicional simple).
$accion = $_GET['accion'] ?? 'listar-productos';

$controllerProducts = new ProductController();


switch ($accion) {
    case 'listar-productos':
        $controllerProducts->list();
        break;

    default:
        http_response_code(404);
        echo "Acción no encontrada: " . htmlspecialchars($accion);
        break;
}
