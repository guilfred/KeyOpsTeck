<?php

namespace Domain\Service;

use Webmozart\Assert\Assert;

class ValidateAuth
{
    private const USERNAME_NOT_EMPTY = 'Le username ne doit pas être vide !';
    private const PASSWORD_NOT_EMPTY = 'Le mot de passe ne doit pas être vide !';

    /**
     * Validate credentials
     *
     * @param string $username
     * @param string $password
     *
     * @return void
     */
    public static function validCredentials(string $username, string $password): void
    {
        self::validUsername($username);
        self::validPassword($password);
    }

    /**
     * Validate password
     *
     * @param string $username
     *
     * @return void
     */
    private static function validUsername(string $username): void
    {
        Assert::notEmpty($username, self::USERNAME_NOT_EMPTY);
    }

    /**
     * Validate username
     *
     * @param string $password
     *
     * @return void
     */
    private static function validPassword(string $password): void
    {
        Assert::notEmpty($password, self::PASSWORD_NOT_EMPTY);
    }
}
