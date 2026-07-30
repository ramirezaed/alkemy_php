<?php

namespace App\Controller\products;
// Importamos las clases externas de datos y modelos usando Namespaces
use App\data\ProductRepository;
use App\Models\cart\Cart;
use App\Models\user\User;

class ProductController
{
    private ProductRepository $repository;

    public function __construct()
    {
        $this->repository = new ProductRepository();
    }


    //list crea un ejemplo de carrito para mostrar el calculo del subtotal
    public function list(): void
    {
        $products = $this->repository->getAll();
        // Usuario de ejemplo para simular sesion
        $currentUser = new User(1, 'usuarioEjemplo', 'usuario@ejemplo.com');
        $cart = new Cart($currentUser);

        // agregamos el primer producto con stock como ejemplo de uso del carrito
        foreach ($products as $product) {
            if ($product->sufficientStock(2)) {
                $cart->addProduct($product, 2);
                break;
            }
        }

        // datos que la vista preparados por el Controlador
        $dataView = [
            'products' => $products,
            'cart' => $cart,
            'user' => $currentUser,
        ];

        $this->renderizarVista('product/list', $dataView);
    }

    //funcion para renderizar la pagina
    private function renderizarVista(string $view, array $data = []): void
    {
        // extract() convierte las claves del array en variables locales
        // disponibles dentro del archivo de vista
        extract($data);
        $routeView = __DIR__ . '/../../Views/' . $view . '.php';
        if (file_exists($routeView)) {
            require $routeView;
        } else {
            echo "Error: la vista '{$view}' no existe.";
        }
    }
}
