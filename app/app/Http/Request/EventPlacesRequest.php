<?php

namespace App\Http\Request;

class EventPlacesRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'eventId' => ['required', 'string']
        ];
    }

    public function getEventId(): int
    {
        return (int) $this->input('eventId');
    }
}