<?php

namespace Domain\Parcel\Entity;

use DateTimeImmutable;
use DateTimeInterface;

class Parcel
{
    private ?string $uuid = null;
    private string $transportInfo;
    private DateTimeInterface $sendedAt;
    private DateTimeInterface $deliveredAt;

    /**
     * @return string|null
     */
    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    /**
     * @param string $uuid
     *
     * @return self
     */
    public function setUuid(string $uuid): self
    {
        $this->uuid = $uuid;

        return $this;
    }

    /**
     * @return string
     */
    public function getTransportInfo(): string
    {
        return $this->transportInfo;
    }

    /**
     * @param string $transportInfo
     *
     * @return self
     */
    public function setTransportInfo(string $transportInfo): self
    {
        $this->transportInfo = $transportInfo;

        return $this;
    }

    /**
     * @return DateTimeInterface
     */
    public function getSendedAt(): DateTimeInterface
    {
        return $this->sendedAt;
    }

    /**
     * @param DateTimeImmutable $sendedAt
     *
     * @return self
     */
    public function setSendedAt(DateTimeImmutable $sendedAt): Parcel
    {
        $this->sendedAt = $sendedAt;

        return $this;
    }

    /**
     * @return DateTimeInterface
     */
    public function getDeliveredAt(): DateTimeInterface
    {
        return $this->deliveredAt;
    }

    /**
     * @param DateTimeImmutable $deliveredAt
     *
     * @return self
     */
    public function setDeliveredAt(\DateTimeImmutable $deliveredAt): self
    {
        $this->deliveredAt = $deliveredAt;

        return $this;
    }

    /**
     * @return array
     */
    public function getParcelFormatted(): array
    {
        return [
            'uuid' => $this->uuid,
            'transport' => $this->transportInfo,
            'sendedAt' => $this->getSendedAt()->format('d-m-Y'),
            'deliveredAt' => $this->getDeliveredAt()->format('d-m-Y')
        ];
    }


}
