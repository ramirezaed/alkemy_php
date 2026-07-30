
<?php
require_once __DIR__ . '/../data/ProductRepository';
require_once __DIR__ . '/../Models/cart/Carrito.php';
require_once __DIR__ . '/../Models/users/user';
class ProductoController
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
            'productos' => $products,
            'carrito' => $cart,
            'usuario' => $currentUser,
        ];

        $this->renderizarVista('product/list', $dataView);
    }

    private function renderizarVista(string $vista, array $datos = []): void
    {
        // extract() convierte las claves del array en variables locales
        // disponibles dentro del archivo de vista (ej: $productos, $carrito)
        extract($datos);
        $rutaVista = __DIR__ . '/../Views/' . $vista . '.php';
        if (file_exists($rutaVista)) {
            require $rutaVista;
        } else {
            echo "Error: la vista '{$vista}' no existe.";
        }
    }
}
