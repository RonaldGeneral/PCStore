<?php

/**
  * @author Leong Wai Loc
  */

namespace App\Strategies;

class LoginContext
{
    private $strategy;

    public function __construct(LoginStrategy $loginStrategy)
    {
        $this->strategy = $loginStrategy;
    }

    public function executeLogin(array $credentials)
    {
        return $this->strategy->login($credentials);
    }

    public function executeLogout(){
        return $this->strategy->logout();
    }
}
