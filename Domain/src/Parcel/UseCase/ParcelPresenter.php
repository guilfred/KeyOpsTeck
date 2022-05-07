<?php

namespace Domain\Parcel\UseCase;

interface ParcelPresenter
{
    public function present(ParcelResponse $response): void;
}
