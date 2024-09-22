<?php

namespace App\Services\Providers\Leadbook\Services;

use App\Services\Providers\Common\DTO\ShowDTO;
use App\Services\Providers\Common\ShowGettingServiceInterface;
use App\Services\Providers\Leadbook\ApiClient;
use Psr\Http\Message\RequestInterface;

class ShowGettingService implements ShowGettingServiceInterface
{
    public function __construct(private ApiClient $client)
    {
    }

    public function getShows(RequestInterface $request): array
    {
        $content = $this->client->makeRequest($request);
        $shows = [];

        foreach ($content['response'] as $show) {
            $shows[] = new ShowDTO($show['id'], $show['name']);
        }

        return $shows;
    }
}