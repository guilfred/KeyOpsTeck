<?php

namespace Domain\Authentication\UseCase;

use Domain\Authentication\Entity\User;
use Domain\Service\Alert;

class AuthenticationResponse
{
    private Alert $alert;
    private $user;

    public function __construct()
    {
        $this->alert = new Alert();
    }

    /**
     * @return Alert
     */
    public function getNotification(): Alert
    {
        return $this->alert;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user)
    {
        $this->user = $user;
    }
}
