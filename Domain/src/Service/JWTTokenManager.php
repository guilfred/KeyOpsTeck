<?php

namespace Domain\Service;

interface JWTTokenManager {

    /**
     * @param string $token
     *
     * @return array|bool
     */
    public function decode(string $token): bool|array;
}
