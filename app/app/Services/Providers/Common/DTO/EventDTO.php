<?php

declare(strict_types=1);

namespace App\Services\Providers\Common\DTO;

readonly class EventDTO implements \JsonSerializable
{
    public function __construct(
        private int $id,
        private int $showId,
        private string $date
    ) {
    }

    public function jsonSerialize(): array
    {
        return [
            'id'     => $this->id,
            'show_id' => $this->showId,
            'date'   => $this->date,
        ];
    }
}