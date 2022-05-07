<?php

namespace App\Service;

use Domain\Service\JWTTokenManager;
use Lexik\Bundle\JWTAuthenticationBundle\Exception\JWTDecodeFailureException;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Psr\Log\LoggerAwareTrait;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class TokenManager implements JWTTokenManager
{

    use LoggerAwareTrait;

    public function __construct(
        private JWTTokenManagerInterface $jwtManager,
        private TokenStorageInterface $tokenStorageInterface
    ) {}

    /**
     * @return array|false
     */
    public function decode(string $token): array|bool
    {
        try {
            return $this->jwtManager->decode($this->tokenStorageInterface->getToken());
        } catch (JWTDecodeFailureException $e) {
            $this->logger->error($e->getMessage());
        }

        return false;
    }
}
