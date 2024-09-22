<?php

namespace App\Services\Providers\Leadbook;

use App\Http\Request\BookPlaceRequest;
use App\Http\Request\EventPlacesRequest;
use App\Http\Request\EventRequest;
use App\Services\Providers\Common\RequestBuilderInterface;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\RequestInterface;

class LeadbookRequestBuilder implements RequestBuilderInterface
{
    public function buildShowGettingRequest(): RequestInterface
    {
        return new Request(
            method: 'GET',
            uri: 'shows',
        );
    }

    public function buildEventGettingRequest(EventRequest $request): RequestInterface
    {
        return new Request(
            method: 'GET',
            uri: sprintf('shows/%d/events', $request->getShowId()),
        );
    }

    public function buildEventPlacesRequest(EventPlacesRequest $request): RequestInterface
    {
        return new Request(
            method: 'GET',
            uri: sprintf('events/%d/places', $request->getEventId()),
        );
    }

    /**
     * @throws \JsonException
     */
    public function buildBookPlaceRequest(BookPlaceRequest $request): RequestInterface
    {
        return new Request(
            method: 'POST',
            uri: sprintf('events/%d/reserve', $request->getEventId()),
            headers: [
                'Content-Type' => 'application/x-www-form-urlencoded',
            ],
            body: http_build_query([
                'name'   => $request->getName(),
                'places' => $request->getPlaces(),
            ])
        );
    }
}