<?php

namespace App\Services\Providers;

use App\Services\Providers\Common\RequestBuilderInterface;
use App\Services\Providers\Leadbook\LeadbookProvider;
use App\Services\Providers\Leadbook\LeadbookRequestBuilder;
use InvalidArgumentException;
use Psr\Container\ContainerInterface;

readonly class RequestBuilderFactory
{
    public function __construct(public ContainerInterface $container)
    {
    }

    public function create(string $provider): RequestBuilderInterface
    {
        return match($provider){
            LeadbookProvider::CODE => app()->make(LeadbookRequestBuilder::class),
            default => throw new InvalidArgumentException("Unknown provider [$provider]"),
        };
    }
}