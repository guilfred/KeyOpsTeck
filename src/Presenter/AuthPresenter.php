<?php

namespace App\Presenter;

use App\ViewModel\AuthViewModel;
use Domain\Authentication\UseCase\AuthenticationPresenter;
use Domain\Authentication\UseCase\AuthenticationResponse;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;

class AuthPresenter implements AuthenticationPresenter
{

    public function __construct(private AuthViewModel $viewModel) {}

    /**
     * @param AuthenticationResponse $response
     * @return void
     */
    public function present(AuthenticationResponse $response): void
    {
        $viewModel = $this->viewModel;
        $notification = $response->getNotification();

        if (!is_null($response->getUser())) {
            $viewModel->token = $response->getUser()->getToken();
            $viewModel->httpCode = $notification->getHttpCode();

            return;
        }

        $viewModel->error = $notification->getMessage();
        $viewModel->httpCode = $notification->getHttpCode();
    }

    /**
     * @return AuthViewModel
     */
    public function getViewModel(): AuthViewModel
    {
        return $this->viewModel;
    }


}