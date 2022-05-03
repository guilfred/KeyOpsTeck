<?php

namespace Domain\Authentication\Gateway;

use Domain\Authentication\Entity\Auth;

interface AuthGateway
{
    /**
     * @param string $username
     *
     * @return Auth
     */
    public function getUser(string $username): Auth;
}
