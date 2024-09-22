<?php

namespace App\Http\Request;

class EventRequest extends BaseRequest
{
    public function rules(): array
    {
        return [
            'showId' => ['required', 'integer']
        ];
    }

    public function getShowId(): int
    {
        return (int) $this->input('showId');
    }
}