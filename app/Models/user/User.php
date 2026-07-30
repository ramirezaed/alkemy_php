<?php


// clase usuario, representa una persona que usa el sistema
namespace App\Models\user;

class User
{
    //define como constantes el tipo de rol para usuario
    public const cliente = " cliente";
    public const admin = "admin";

    //define propiedades/atributos del usuario
    private int $id;
    private string $name;
    private string $email;
    private string $role;

    //constructor es el metodo o funcion que se ejecuta automaticamente cada vez que se instancia un objeto
    //cuando se crea un nuevo usuario, por default se crea con un rol cliente
    public function __construct(int $id, string $name, string $email,  string $role = "cliente")
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->role = $role;
    }
    //muetra el id del usuario
    public function getId(): int
    {
        return $this->id;
    }
    //muestra el nombre del usuario
    public function getName(): string
    {
        return $this->name;
    }
    //muetra el email del usuario
    public function getEmail(): string
    {
        return $this->email;
    }
    //muestra el rol del usuario
    public function getRole(): string
    {
        return $this->role;
    }
}
