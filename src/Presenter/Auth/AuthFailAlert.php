<?php

namespace App\Presenter\Auth;

use Domain\Service\Alert;

class AuthFailAlert
{
    public string $message = Alert::BAD_CREDENTIAL;
    public int $httpCode = Alert::HTTP_UNAUTHORIZED;
}
