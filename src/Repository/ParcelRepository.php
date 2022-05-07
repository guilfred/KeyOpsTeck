<?php

namespace App\Repository;

use App\Entity\Parcel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\Persistence\ManagerRegistry;
use Domain\Parcel\Gateway\ParcelGateway;
use Domain\Parcel\Entity\Parcel as ParcelEntity;

/**
 * @extends ServiceEntityRepository<Parcel>
 *
 * @method Parcel|null find($id, $lockMode = null, $lockVersion = null)
 * @method Parcel|null findOneBy(array $criteria, array $orderBy = null)
 * @method Parcel[]    findAll()
 * @method Parcel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParcelRepository extends ServiceEntityRepository implements ParcelGateway
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Parcel::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Parcel $entity, bool $flush = false): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(Parcel $entity, bool $flush = false): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @param string $uuid
     *
     * @return ParcelEntity|null
     */
    public function getParcelByUuid(string $uuid): ?ParcelEntity
    {
        $parcel = $this->findOneBy(['uuid' => $uuid]);

        if (!$parcel) {
            return null;
        }

        $parcelEntity = new ParcelEntity();
        $parcelEntity
            ->setUuid($uuid)
            ->setTransportInfo($parcel->getTransportInfo())
            ->setDeliveredAt($parcel->getDeliveredAt())
            ->setSendedAt($parcel->getSendedAt())
            ;

        return $parcelEntity;
    }
}
