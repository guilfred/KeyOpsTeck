<?php

namespace Domain\Authentication\Gateway;

use Domain\Authentication\Entity\User;

interface AuthGateway
{
    /**
     * @param string $username
     * @param string $password
     *
     * @return User|null
     */
    public function getUserByCredentials(string $username, string $password): ?User;
}
