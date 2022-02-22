<?php

namespace App\Contracts;

use Illuminate\Http\Request;

interface CustomerContract
{
    public function Register(array $data);
    public function Login(array $data);
    
}
