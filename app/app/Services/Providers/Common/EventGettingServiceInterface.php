<?php

namespace App\Services\Providers\Common;

use App\Services\Providers\Common\DTO\EventDTO;
use Psr\Http\Message\RequestInterface;

interface EventGettingServiceInterface
{
    /**
     * @return array<EventDTO>
     */
    public function getEvents(RequestInterface $request): array;
}