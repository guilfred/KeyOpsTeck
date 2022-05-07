<?php

namespace Domain\Parcel\UseCase;

use Domain\Parcel\Gateway\ParcelGateway;
use Domain\Service\Alert;
use Domain\Service\JWTTokenManager;

class Parcel
{
    public function __construct(
        private ParcelGateway $gateway,
        private JWTTokenManager $JWTTokenManager
    ) {}

    /**
     * @param ParcelRequest   $request
     * @param ParcelPresenter $presenter
     *
     * @return void
     */
    public function execute(
        ParcelRequest $request,
        ParcelPresenter $presenter
    ): void
    {
        $response =  new ParcelResponse();

        $this->validRequest($request, $response);

        $presenter->present($response);
    }

    /**
     * @param ParcelRequest $request
     * @param ParcelResponse $response
     * @param AuthGateway    $authGateway
     *
     * @return void
     */
    private function validRequest(ParcelRequest $request, ParcelResponse $response)
    {
        $alert = $response->getNotification();

        if ($request->authorizationHeader === null) {
            $alert->setHttpCode(Alert::HTTP_FORBIDDEN);
            $alert->setMessage(Alert::MISSING_TOKEN);

            return;
        }

        $token = str_replace('Bearer ', '', $request->authorizationHeader);

        $payload = $this->JWTTokenManager->decode($token);

        if (!$payload) {
            $alert->setHttpCode(Alert::HTTP_FORBIDDEN);
            $alert->setMessage(Alert::INVALID_TOKEN);

            return;
        }

        $entity = $this->gateway->getParcelByUuid($request->uuid);

        if (is_null($entity)) {
            $alert->setMessage(sprintf(ParcelResponse::UNKNOWN_PARCEL, $request->uuid));
            $alert->setHttpCode(Alert::HTTP_BAD_REQUEST);

            return;
        }

        $response->setParcel($entity);
        $alert->setHttpCode(Alert::HTTP_OK);
    }

}
