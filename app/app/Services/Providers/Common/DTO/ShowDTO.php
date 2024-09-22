<?php

declare(strict_types=1);

namespace App\Services\Providers\Common\DTO;

readonly class ShowDTO implements \JsonSerializable
{
    public function __construct(
        private int $id,
        private string $name,
    ) {
    }

    public function jsonSerialize(): array
    {
        return [
            'id'   => $this->id,
            'name' => $this->name,
        ];
    }
}