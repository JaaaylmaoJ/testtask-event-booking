<?php

namespace App\Services\Providers\Leadbook;

use App\Services\Providers\Exception\ErrorInProviderException;
use App\Services\Providers\Exception\ProviderClientException;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Message\RequestInterface;

class ApiClient extends Client
{
    /**
     * @throws ProviderClientException
     * @throws ClientExceptionInterface
     * @throws ErrorInProviderException
     */
    public function makeRequest(RequestInterface $request): array
    {
        $response = parent::sendRequest($request);
        $content = json_decode($response->getBody()->getContents(), true);

        if ($response->getStatusCode() !== 200) {
            Log::warning("Has provider response with {$response->getStatusCode()} status. " .
                "\n response: {$response->getBody()->getContents()}");
            throw new ProviderClientException("Provider responded with an error code");
        }

        if (array_key_exists('error', $content)) {
            throw new ErrorInProviderException($content['error']);
        }

        return $content;
    }
}