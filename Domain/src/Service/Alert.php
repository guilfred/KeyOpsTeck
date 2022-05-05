<?php

namespace Domain\Service;

class Alert
{
    public const BAD_CREDENTIAL = "Mauvaises informations d'identification, veuillez vérifier que votre nom d'utilisateur/mot de passe est correctement défini";
    public const HTTP_UNAUTHORIZED = 401;
    public const HTTP_OK = 200;

    private string $message;
    private int $httpCode;

    /**
     * @param string $message
     *
     * @return void
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    public function setHttpCode(int $httpCode)
    {
        $this->httpCode = $httpCode;
    }

    public function getHttpCode(): string
    {
        return $this->httpCode;
    }

}
