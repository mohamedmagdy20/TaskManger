<?php

namespace App\Interfaces;

interface AuthRepositoriesInterface
{
    public function register(array $data);
    public function login(array $data);
    public function logout();
}