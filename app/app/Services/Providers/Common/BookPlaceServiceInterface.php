<?php

namespace App\Services\Providers\Common;

use App\Services\Providers\Common\DTO\ReservationDto;
use Psr\Http\Message\RequestInterface;

interface BookPlaceServiceInterface
{
    public function bookPlace(RequestInterface $request): ReservationDto;
}