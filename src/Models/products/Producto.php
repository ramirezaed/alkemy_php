<?php

//   Clase Producto
//   Representa un producto de la tienda.

class Product
{
    private int $id;
    private string $name;
    private float $price;
    private int $stock;
    private Category $categoria;
    //constructor metodo/funcion , se ejecuta automaticamente cuando se crea una nueva instancia de la clase
    public function __construct(int $id, string $name, int $stock, float $price, Category $category)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->stock = $stock;
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
}
