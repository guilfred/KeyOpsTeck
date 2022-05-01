<?php

namespace Domain\Authentication\UseCase;

interface AuthenticationPresenter
{
    public function present(AuthenticationResponse $response): void;
}
