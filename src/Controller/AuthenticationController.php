<?php

namespace App\Controller;

use App\Presenter\Auth\AuthPresenter;
use Domain\Authentication\UseCase\Authentication;
use Domain\Authentication\UseCase\AuthenticationRequest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class AuthenticationController extends AbstractController
{
    public function __invoke(
        Request $request,
        Authentication $authentication,
        AuthPresenter $presenter
    ): JsonResponse
    {
        $params = json_decode($request->getContent(), true);

        $authRequest = new AuthenticationRequest();
        $authRequest->username = $params['username'];
        $authRequest->password = $params['password'];

        $authentication->execute($authRequest, $presenter);
        $model = $presenter->getViewModel();

        return new JsonResponse(['token' => $model->token], $model->httpCode);
    }
}
