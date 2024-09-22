<?php

namespace App\Services\Providers\Common;

use App\Http\Request\BookPlaceRequest;
use App\Http\Request\EventPlacesRequest;
use App\Http\Request\EventRequest;
use Psr\Http\Message\RequestInterface;

interface RequestBuilderInterface
{
    public function buildShowGettingRequest(): RequestInterface;
    public function buildEventGettingRequest(EventRequest $request): RequestInterface;
    public function buildEventPlacesRequest(EventPlacesRequest $request): RequestInterface;
    public function buildBookPlaceRequest(BookPlaceRequest $request): RequestInterface;
}