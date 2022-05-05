<?php

namespace Domain\Authentication\Service;

use Domain\Authentication\Security\PasswordHasherInterface;

class HasherPassword implements PasswordHasherInterface
{

    public function hashPassword(string $plainPassword): string
    {
        return password_hash($plainPassword, PASSWORD_BCRYPT);
    }

    public function isPasswordValid(string $hashPassword, string $plainPassword): bool
    {
        return password_verify($plainPassword, $hashPassword);
    }
}
