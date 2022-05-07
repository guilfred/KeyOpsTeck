<?php

namespace App\Controller;

use App\Presenter\Parcel\ParcelPresenter;
use App\Repository\ParcelRepository;
use App\Service\TokenManager;
use Domain\Parcel\UseCase\Parcel;
use Domain\Parcel\UseCase\ParcelRequest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class ParcelController extends AbstractController
{

    public function __construct(
        private ParcelRepository $repository,
        private TokenManager $JWTTokenManager
    ) {}

    public function __invoke(
        string $uuid,
        Request $request,
        Parcel $parcelUseCase,
        ParcelRequest $parcelRequest,
        ParcelPresenter $parcelPresenter
    )
    {
        $parcelRequest->uuid = $uuid;
        $parcelRequest->authorizationHeader = $request->headers->get('authorization');
        $this->JWTTokenManager->decode($parcelRequest->authorizationHeader);

        $parcelUseCase->execute($parcelRequest, $parcelPresenter);
        $model = $parcelPresenter->getViewModel();
        $data = $this->repository->getParcelByUuid($uuid);

        /** @var \Domain\Parcel\Entity\Parcel $data */

        return new JsonResponse($data->getParcelFormatted(), $model->httpCode);
    }
}
