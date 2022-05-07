<?php

namespace App\DataFixtures;

use App\Entity\Parcel;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ParcelFixtures extends Fixture
{

    /**
     * @param ObjectManager $manager
     *
     * @return void
     */
    public function load(ObjectManager $manager): void
    {
        $parcel = new Parcel();
        $parcel
            ->setUuid('8e811f98-3c34-461b-9dd7-b9d74ac3a01e')
            ->setSendedAt(new \DateTimeImmutable('2019-09-10'))
            ->setDeliveredAt(new \DateTimeImmutable('2019-11-10'))
            ->setTransportInfo('avion')
        ;

        $manager->persist($parcel);
        $manager->flush();
    }
}
