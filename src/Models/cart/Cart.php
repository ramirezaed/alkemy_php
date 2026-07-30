<?php

require_once "User.php";

require_once __DIR__ . "/user/User.php";
require_once __DIR__ . "/../product/Product.php";

class Cart
{
    private User $user;
    //indica lo que coniene el array
    /** @var array<int, array{product: Product, amount: int}> */
    private array $items = []; //array de los productos agregados al carrito

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    //muestra el usuario al que pertenece el carro de compras
    public function getUser(): User
    {
        return $this->user;
    }

    //agregar producto al carrito
    public function addProduct(Product $product, int $amount): bool
    {
        //verifica que el producto tenga stock suficiente
        if (!$product->sufficientStock($amount)) {
            return false;
        }

        //si el producto ya esta en el carrito se suma la cantidad
        //se define el indice para saber la pocision del producto
        foreach ($this->items as $indice => $item) {
            if ($item["product"]->getId() === $product->getId()) {
                $this->items[$indice]["amount"] += $amount;
                return true;
            }
        }

        //se agrega un nuevo porducto al array
        //[] se usa para agregar nuevo elemento al final del array
        $this->items[] = [
            // => asigna valores dentro de un arreglo
            //clave => valor
            "product" => $product,
            "amount" => $amount,
        ];
        return true;
    }

    //indica lo que contiene el array

    /**
     * @return array<int, array{product: Product, amount: int}>
     */
    public function getItems(): array
    {
        return $this->items;
    }

    //calcualr el subtotal del carrito
    //recorre el array items, y calcula el valor
    public function calculateSubtotal(): float
    {
        $subtotal = 0.0; //se define la variable subtotal en valor 0 al inicio
        //para cada elemento del array this->items, tomalo de uno "item"
        foreach ($this->items as $item) {
            $subtotal += $item["product"]->calculateSubtotal($item["amount"]);
        }
        return $subtotal;
    }
}
