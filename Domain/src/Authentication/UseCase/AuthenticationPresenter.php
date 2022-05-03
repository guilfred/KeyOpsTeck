<?php

namespace Domain\Authentication\UseCase;

interface AuthenticationPresenter
{
    /**
     * @param AuthenticationResponse $response
     *
     * @return void
     */
    public function present(AuthenticationResponse $response): void;
}
