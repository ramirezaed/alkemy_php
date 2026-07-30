<?php


namespace App\Models\product;

//   Clase Producto
//   Representa un producto de la tienda.
use App\Models\category\Category;

class Product
{
    private int $id;
    private string $name;
    private float $price;
    private int $stock;
    private Category $category;
    //constructor metodo/funcion , se ejecuta automaticamente cuando se crea una nueva instancia de la clase
    public function __construct(int $id, string $name, int $stock, float $price, Category $category)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->stock = $stock;
        $this->category = $category;
    }

    //muestra el id del producto
    public function getId(): int
    {
        return $this->id;
    }
    //muetra el nombre del producto
    public function getName(): string
    {
        return $this->name;
    }
    //muestra el precio del producto
    public function getPrice(): float
    {
        return $this->price;
    }
    //muestra el stock del producto
    public function getStock(): int
    {
        return $this->stock;
    }

    //muestra la categoria del producto
    public function getCategory(): Category
    {
        return $this->category;
    }

    // funcion para verificar si el stock disponible del producto es suficiente para la cantidad solicitada
    // devuelve true o false
    public function sufficientStock(int $amount): bool
    {
        //verifica que cantidad sea nuemero positivo
        if ($amount <= 0) {
            return false;
        }
        //si stock es menor que la cantidad solicitada , devuelve false
        return $this->stock >= $amount;
    }

    public function deductStock(int $amount): void
    {
        //llama a la funcion para verificar si tiene stock suficiente
        if ($this->sufficientStock($amount)) {
            // -=  resta el valor de una variable, y asigna en ella el resultado
            $this->stock -= $amount;
        }
    }

    public function calculateSubtotal(int $amount): float
    {
        //verifica que la cantidad sea positiva
        if ($amount <= 0) {
            return false;
        }
        return $this->price * $amount;
    }
}
