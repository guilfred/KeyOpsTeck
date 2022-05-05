<?php

namespace App\ViewModel;

class AuthViewModel
{
    public ?string $token = null;
    public ?int $httpCode = null;
    public ?string $error = null;
}
