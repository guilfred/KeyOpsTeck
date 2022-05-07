<?php

namespace App\Presenter\Parcel;

use App\ViewModel\ParcelViewModel;
use Domain\Parcel\UseCase\ParcelPresenter as ParcelPresenterInterface;
use Domain\Parcel\UseCase\ParcelResponse;

class ParcelPresenter implements ParcelPresenterInterface
{
    public function __construct(private ParcelViewModel $viewModel) {}

    /**
     * @return ParcelViewModel
     */
    public function getViewModel(): ParcelViewModel
    {
        return $this->viewModel;
    }

    public function present(ParcelResponse $response): void
    {
        $this->viewModel->httpCode = $response->getNotification()->getHttpCode();
        $this->viewModel->error = $response->getNotification()->getMessage();
    }
}
