<?php
declare(strict_types=1);

namespace Domain\Authentication\UseCase;

use Domain\Authentication\Gateway\AuthGateway;
use Domain\Service\ValidateAuth;

class Authentication {

    private AuthGateway $gateway;

    /**
     * @param AuthGateway $gateway
     */
    public function __construct(AuthGateway $gateway)
    {
        $this->gateway = $gateway;
    }

    /**
     * @param AuthenticationRequest $request
     * @param AuthenticationPresenter $presenter
     *
     * @return void
     */
    public function execute(AuthenticationRequest $request, AuthenticationPresenter $presenter): void
    {
        $response = new AuthenticationResponse();

        ValidateAuth::validCredentials($request->username, $request->password);

        $this->gateway->getUser($request->username);

        //$presenter->present($response);
    }

}
