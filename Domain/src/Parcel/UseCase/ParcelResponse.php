<?php

namespace Domain\Parcel\UseCase;

use Domain\Service\Alert;
use Domain\Parcel\Entity\Parcel as ParcelEntity;

class ParcelResponse
{
    private Alert $alert;
    private $parcel;
    public const UNKNOWN_PARCEL = 'Unknown Parcel with uuid %s';

    public function __construct()
    {
        $this->alert = new Alert();
    }

    /**
     * @return Alert
     */
    public function getNotification(): Alert
    {
        return $this->alert;
    }

    public function getParcel(): ?ParcelEntity
    {
        return $this->parcel;
    }

    public function setParcel(?ParcelEntity $parcel)
    {
        $this->parcel = $parcel;
    }
}
