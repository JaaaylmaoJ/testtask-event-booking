<?php /** @noinspection OneTimeUseVariablesInspection */

/** @noinspection PhpUnnecessaryLocalVariableInspection */

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Request\BookPlaceRequest;
use App\Http\Request\EventPlacesRequest;
use App\Http\Request\EventRequest;
use App\Http\Request\ShowRequest;
use App\Services\Providers\Common\DTO\ReservationDto;
use App\Services\Providers\Leadbook\LeadbookProvider;
use App\Services\Providers\ProviderFactory;
use App\Services\Providers\RequestBuilderFactory;

class ShowController extends Controller
{
    public function __construct(
        private ProviderFactory $providerFactory,
        private RequestBuilderFactory $requestBuilderFactory
    ) {
    }

    public function get(ShowRequest $request): array
    {
        $provider       = $this->providerFactory->create(LeadbookProvider::CODE);
        $requestBuilder = $this->requestBuilderFactory->create(LeadbookProvider::CODE);

        $providerRequest = $requestBuilder->buildShowGettingRequest();
        $shows           = $provider->getShows($providerRequest);

        return $shows;
    }

    public function getEvents(EventRequest $request): array
    {
        $provider       = $this->providerFactory->create(LeadbookProvider::CODE);
        $requestBuilder = $this->requestBuilderFactory->create(LeadbookProvider::CODE);

        $providerRequest = $requestBuilder->buildEventGettingRequest($request);
        $events          = $provider->getEvents($providerRequest);

        return $events;
    }

    public function getEventPlaces(EventPlacesRequest $request): array
    {
        $provider       = $this->providerFactory->create(LeadbookProvider::CODE);
        $requestBuilder = $this->requestBuilderFactory->create(LeadbookProvider::CODE);

        $providerRequest = $requestBuilder->buildEventPlacesRequest($request);
        $eventPlaces     = $provider->getEventPlaces($providerRequest);

        return $eventPlaces;
    }

    public function bookPlace(BookPlaceRequest $request): ReservationDto
    {
        $data = $request->validated();

        $provider       = $this->providerFactory->create(LeadbookProvider::CODE);
        $requestBuilder = $this->requestBuilderFactory->create(LeadbookProvider::CODE);

        $providerRequest = $requestBuilder->buildBookPlaceRequest($request);
        $result          = $provider->bookPlace($providerRequest);

        return $result;
    }
}