<?php

namespace App\Strategies;

interface LoginStrategy{
    public function login(array $credentials);
}