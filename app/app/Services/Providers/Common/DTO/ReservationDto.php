<?php

namespace App\Services\Providers\Common\DTO;

readonly class ReservationDto implements \JsonSerializable
{
    public function __construct(private string $reservationId)
    {
    }

    public function jsonSerialize(): mixed
    {
        return [
            'reservation_id' => $this->reservationId
        ];
    }
}