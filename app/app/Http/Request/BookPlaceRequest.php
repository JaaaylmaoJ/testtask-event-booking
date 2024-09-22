<?php

namespace App\Http\Request;

class BookPlaceRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'eventId' => ['required', 'integer'],
            'name' => ['required', 'string'],
            'places' => ['required', 'array'],
            'places.*' => ['required', 'integer'],
        ];
    }

    public function getEventId(): int
    {
        return (int) $this->input('eventId');
    }

    public function getName(): string
    {
        return (string) $this->input('name');
    }

    /**
     * @return array<int>
     */
    public function getPlaces(): array
    {
        return $this->input('places');
    }
}