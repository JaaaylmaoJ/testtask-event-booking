<?php

namespace App\Services\Providers\Leadbook\Services;

use App\Services\Providers\Common\DTO\PlaceDTO;
use App\Services\Providers\Common\EventPlacesGettingServiceInterface;
use App\Services\Providers\Leadbook\ApiClient;
use Psr\Http\Message\RequestInterface;

class EventPlacesGettingService implements EventPlacesGettingServiceInterface
{
    public function __construct(private ApiClient $client)
    {
    }

    public function getEventPlaces(RequestInterface $request): array
    {
        $content = $this->client->makeRequest($request);
        $places = [];

        foreach ($content['response'] as $place) {
            $places[] = new PlaceDTO(
                $place['id'],
                $place['x'],
                $place['y'],
                $place['width'],
                $place['height'],
                $place['is_available'],
            );
        }

        return $places;
    }
}