<?php

namespace App\Services\Providers\Common;

use App\Services\Providers\Common\DTO\EventDTO;
use App\Services\Providers\Common\DTO\PlaceDTO;
use App\Services\Providers\Common\DTO\ReservationDto;
use App\Services\Providers\Common\DTO\ShowDTO;
use Psr\Http\Message\RequestInterface;

interface ProviderInterface
{
    /**
     * @return array<ShowDTO>
     */
    public function getShows(RequestInterface $request): array;

    /**
     * @return array<EventDTO>
     */
    public function getEvents(RequestInterface $request): array;

    /**
     * @return array<PlaceDTO>
     */
    public function getEventPlaces(RequestInterface $request): array;

    public function bookPlace(RequestInterface $request): ReservationDto;
}