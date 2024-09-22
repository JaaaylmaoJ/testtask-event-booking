<?php

namespace App\Services\Providers\Common;

use App\Services\Providers\Common\DTO\ShowDTO;
use Psr\Http\Message\RequestInterface;

interface ShowGettingServiceInterface
{
    /**
     * @return array<ShowDTO>
     */
    public function getShows(RequestInterface $request): array;
}