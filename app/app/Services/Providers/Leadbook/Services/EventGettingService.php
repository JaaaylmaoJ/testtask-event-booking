<?php

namespace App\Services\Providers\Leadbook\Services;

use App\Services\Providers\Common\DTO\EventDTO;
use App\Services\Providers\Common\EventGettingServiceInterface;
use App\Services\Providers\Leadbook\ApiClient;
use Psr\Http\Message\RequestInterface;

class EventGettingService implements EventGettingServiceInterface
{
    public function __construct(private ApiClient $client)
    {
    }

    public function getEvents(RequestInterface $request): array
    {
        $content = $this->client->makeRequest($request);
        $events = [];

        foreach ($content['response'] as $show) {
            $events[] = new EventDTO(
                $show['id'],
                $show['showId'],
                $show['date'],
            );
        }

        return $events;
    }
}