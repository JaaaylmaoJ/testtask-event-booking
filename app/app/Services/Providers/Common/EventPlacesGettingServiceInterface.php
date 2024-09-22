<?php

namespace App\Services\Providers\Common;

use App\Services\Providers\Common\DTO\PlaceDTO;
use Psr\Http\Message\RequestInterface;

interface EventPlacesGettingServiceInterface
{
    /**
     * @return array<PlaceDTO>
     */
    public function getEventPlaces(RequestInterface $request): array;
}