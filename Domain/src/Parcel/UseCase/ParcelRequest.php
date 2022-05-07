<?php

namespace Domain\Parcel\UseCase;

class ParcelRequest
{
    public string $uuid;

    public ?string $authorizationHeader;
}
