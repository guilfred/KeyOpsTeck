<?php

namespace App\EventListener\JWT;

use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationSuccessEvent;

class AuthenticationSuccess
{
    private $useCase;

    private $authenticationRequest;

    private $presenter;

    /**
     * @param AuthenticationSuccessEvent $event
     */
    public function onAuthenticationSuccessResponse(AuthenticationSuccessEvent $event)
    {
        $data = $event->getData();
        $user = $event->getUser();


        $event->setData($data);
    }
}
