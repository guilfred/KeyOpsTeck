<?php

namespace App\EventListener\JWT;

use App\Presenter\AuthFailAlert;
use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationFailureEvent;
use Lexik\Bundle\JWTAuthenticationBundle\Response\JWTAuthenticationFailureResponse;

class AuthenticationFailure
{

    public function __construct(private AuthFailAlert $alert)
    {

    }

    /**
     * @param AuthenticationFailureEvent $event
     */
    public function onAuthenticationFailureResponse(AuthenticationFailureEvent $event)
    {
        $response = new JWTAuthenticationFailureResponse(
            $this->alert->message,
            $this->alert->httpCode
        );

        $event->setResponse($response);
    }
}
