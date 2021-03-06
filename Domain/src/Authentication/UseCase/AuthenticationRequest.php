<?php

namespace Domain\Authentication\UseCase;

class AuthenticationRequest
{
    /**
     * @var string
     */
    public string $username;

    /**
     * @var string
     */
    public string $password;
}
