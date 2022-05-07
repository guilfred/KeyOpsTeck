<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\ParcelRepository;
use Doctrine\ORM\Mapping as ORM;

use ApiPlatform\Core\Annotation\ApiProperty;

#[ORM\Entity(repositoryClass: ParcelRepository::class)]
#[ApiResource(
    collectionOperations: [],
    itemOperations: [
        'get_parcel' => [
            'route_name' => 'parcel_information',
            'read' => false,
        ]
    ],
    attributes: ["security" => "is_granted('ROLE_USER')"]
)]
class Parcel
{
    #[ORM\Id, ORM\Column, ORM\GeneratedValue]
    #[ApiProperty(identifier: false)]
    private ?int $id = null;

    #[ORM\Column(type: 'string', length: 100)]
    #[ApiProperty(identifier: true)]
    private $uuid;

    #[ORM\Column(type: 'string', length: 20)]
    private $transportInfo;

    #[ORM\Column(type: 'datetime_immutable')]
    private $sendedAt;

    #[ORM\Column(type: 'datetime_immutable')]
    private $deliveredAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    public function setUuid(string $uuid)
    {
        $this->uuid = $uuid;

        return $this;
    }

    public function getTransportInfo(): ?string
    {
        return $this->transportInfo;
    }

    public function setTransportInfo(string $transportInfo): self
    {
        $this->transportInfo = $transportInfo;

        return $this;
    }

    public function getSendedAt(): ?\DateTimeImmutable
    {
        return $this->sendedAt;
    }

    public function setSendedAt(\DateTimeImmutable $sendedAt): self
    {
        $this->sendedAt = $sendedAt;

        return $this;
    }

    public function getDeliveredAt(): ?\DateTimeImmutable
    {
        return $this->deliveredAt;
    }

    public function setDeliveredAt(\DateTimeImmutable $deliveredAt): self
    {
        $this->deliveredAt = $deliveredAt;

        return $this;
    }
}
