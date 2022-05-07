<?php
declare(strict_types=1);

namespace Domain\Authentication\UseCase;

use Domain\Authentication\Entity\User;
use Domain\Authentication\Gateway\AuthGateway;
use Domain\Service\Alert;

class Authentication  {

    public function __construct(private AuthGateway $gateway) {}

    /**
     * @param AuthenticationRequest   $request
     * @param AuthenticationPresenter $presenter
     *
     * @return void
     */
    public function execute(AuthenticationRequest $request, AuthenticationPresenter $presenter): void
    {
        $authenticationResponse = new AuthenticationResponse();

        $response = $this->prepareResponse($request, $authenticationResponse);

        $presenter->present($response);
    }

    /**
     * @param string $username
     * @param string $password
     *
     * @return User|null
     */
    private function verifyUser(string $username, string $password): ?User
    {
        $user = $this->gateway->getUserByCredentials($username, $password);

        return $user ?? null;
    }

    /**
     * @param AuthenticationRequest  $request
     * @param AuthenticationResponse $response
     *
     * @return AuthenticationResponse
     */
    private function prepareResponse(AuthenticationRequest $request, AuthenticationResponse $response): AuthenticationResponse
    {
        $user = $this->verifyUser($request->username, $request->password);
        $notification = $response->getNotification();

        if (is_null($user)) {
            $notification->setMessage(Alert::BAD_CREDENTIAL);
            $notification->setHttpCode(Alert::HTTP_UNAUTHORIZED);
        }

        $response->setUser($user);
        $notification->setHttpCode(Alert::HTTP_OK);

        return $response;
    }

}
