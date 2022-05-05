<?php
declare(strict_types=1);

namespace Domain\Authentication\Security;

interface PasswordHasherInterface
{
    /**
     * @param string $plainPassword
     *
     * @return string
     */
    public function hashPassword(string $plainPassword): string;

    /**
     * @param string $hashPassword
     * @param string $plainPassword
     *
     * @return bool
     */
    public function isPasswordValid(string $hashPassword, string $plainPassword): bool;
}
