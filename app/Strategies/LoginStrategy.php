<?php

/**
  * @author Leong Wai Loc
  */

namespace App\Strategies;

interface LoginStrategy{
    public function login(array $credentials);
    public function logout();
}