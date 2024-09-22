<?php

namespace App\Services\Providers\Leadbook\Services;

use App\Services\Providers\Common\BookPlaceServiceInterface;
use App\Services\Providers\Common\DTO\ReservationDto;
use App\Services\Providers\Leadbook\ApiClient;
use Psr\Http\Message\RequestInterface;

class BookPlaceService implements BookPlaceServiceInterface
{
    public function __construct(private ApiClient $client)
    {
    }

    public function bookPlace(RequestInterface $request): ReservationDto
    {
        $content = $this->client->makeRequest($request);
        return new ReservationDto($content['response']['reservation_id']);
    }
}