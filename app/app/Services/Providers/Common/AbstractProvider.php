<?php

namespace App\Services\Providers\Common;

use App\Services\Providers\Common\DTO\ReservationDto;
use Psr\Http\Message\RequestInterface;

abstract class AbstractProvider implements ProviderInterface
{
    public function __construct(
        protected ShowGettingServiceInterface $showsGettingService,
        protected EventGettingServiceInterface $eventsGettingService,
        protected EventPlacesGettingServiceInterface $eventPlacesGettingService,
        protected BookPlaceServiceInterface $bookPlaceService,
    ) {
    }

    public function getShows(RequestInterface $request): array
    {
        return $this->showsGettingService->getShows($request);
    }

    public function getEvents(RequestInterface $request): array
    {
        return $this->eventsGettingService->getEvents($request);
    }

    public function getEventPlaces(RequestInterface $request): array
    {
        return $this->eventPlacesGettingService->getEventPlaces($request);
    }

    public function bookPlace(RequestInterface $request): ReservationDto
    {
        return $this->bookPlaceService->bookPlace($request);
    }
}