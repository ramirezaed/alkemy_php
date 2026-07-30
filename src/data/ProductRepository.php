<?php

require_once __DIR__ . '/../Models/product/Product.php';
require_once __DIR__ . '/../Models/category/Category.php';


class ProductRepository
{
    /** @var Product[] */
    private array $products;

    public function __construct()
    {
        // categorias de ejemplo
        $categoryElectronic = new Category(1, 'Electronica');
        $categoryHome = new Category(2, 'Hogar');

        // Productos de ejemplo (datos hardcodeados)
        $this->products = [
            new Product(1, 'Auriculares Bluetooth', 15999.90, 25, $categoryElectronic),
            new Product(2, 'Cargador USB-C 30W', 6500.00, 40, $categoryElectronic),
            new Product(3, 'Set de Sábanas', 9800.50, 12, $categoryHome),
            new Product(4, 'Lámpara de Escritorio', 7300.00, 0, $categoryHome),
        ];
    }

    /**
     * @return Product[]
     */
    //funcion para listar todos los productos
    public function getAll(): array
    {
        return $this->products;
    }
}
