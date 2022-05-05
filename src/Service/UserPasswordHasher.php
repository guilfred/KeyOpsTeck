<?php

namespace App\Service;

use Domain\Authentication\Security\PasswordHasherInterface;
use Symfony\Component\PasswordHasher\Hasher\NativePasswordHasher;

class UserPasswordHasher implements PasswordHasherInterface
{

    public function __construct(private NativePasswordHasher $nativePasswordHasher) {}

    /**
     * @param string $hashPassword
     * @param string $plainPassword
     *
     * @return bool
     */
    public function isPasswordValid(string $hashPassword, string $plainPassword): bool
    {
        return $this->nativePasswordHasher->verify($hashPassword, $plainPassword);
    }

    public function hashPassword(string $plainPassword): string
    {
        return $this->hashPassword($plainPassword);
    }
}

