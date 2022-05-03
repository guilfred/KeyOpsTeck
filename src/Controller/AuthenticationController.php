<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Exception\AuthenticationException;

class AuthenticationController extends AbstractController
{
    public function __invoke()
    {
        throw new AuthenticationException('ben erreur tout simplement');
        //return new JsonResponse(['ouohhh' => 'kois'], Response::HTTP_OK);
    }
}