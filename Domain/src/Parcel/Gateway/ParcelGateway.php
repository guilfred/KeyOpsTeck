<?php

namespace Domain\Parcel\Gateway;

use Domain\Parcel\Entity\Parcel;

interface ParcelGateway
{
    /**
     * @param string $uuid
     *
     * @return Parcel|null
     */
    public function getParcelByUuid(string $uuid): ?Parcel;
}
