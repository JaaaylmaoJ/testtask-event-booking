<?php

declare(strict_types=1);

namespace App\Services\Providers\Common\DTO;

readonly class PlaceDTO implements \JsonSerializable
{
    public function __construct(
        private int $id,
        private float $x,
        private float $y,
        private float $width,
        private float $height,
        private bool $isAvailable
    ) {
    }

    public function jsonSerialize(): array
    {
        return [
            'id'           => $this->id,
            'x'            => $this->x,
            'y'            => $this->y,
            'width'        => $this->width,
            'height'       => $this->height,
            'is_available' => $this->isAvailable,
        ];
    }
}