<?php

namespace Domain\Authentication\UseCase;

use Domain\Service\Alert;

class AuthenticationResponse
{
    private $alert;
    private $auth;

    public function __construct(Alert $alert)
    {
        $this->alert = $alert;
    }

    /**
     * @return Alert
     */
    public function getNotification(): Alert
    {
        return $this->alert;
    }

    /**
     * @param Authentication $auth
     */
    public function setAuth(Authentication $auth): void
    {
        $this->auth = $auth;
    }

    /**
     * @return Authentication
     */
    public function getAuth(): Authentication
    {
        return $this->auth;
    }

}
