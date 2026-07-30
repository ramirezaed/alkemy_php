<?php

class Category
{
    //prodpiedades de la categoria
    private int $id;
    private string $name;

    //contrusctor, funcion/metodo que se ejecuta automaticamente cuando se instancia un nuevo obejto de la clase
    public function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }
    //muestra el id de la categoria
    public function getId(): int
    {
        return $this->id;
    }
    //muestra el nombre de la categoria
    public function getName(): string
    {
        return $this->name;
    }
}
