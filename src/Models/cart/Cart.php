<?php

require_once "User.php";

class Cart {
    private User $user;
    //array de los productos agregados al carrito
    private array items =[];

    public function __construct(User $user)
    {
        $this->user= $user;
    }

    public function getUserCart(): User
    {
        return $this->user;
    }

}