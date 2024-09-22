<?php

namespace App\Services\Providers;

use App\Services\Providers\Common\ProviderInterface;
use App\Services\Providers\Leadbook\LeadbookProvider;
use InvalidArgumentException;
use Psr\Container\ContainerInterface;

readonly class ProviderFactory
{
    public function __construct(public ContainerInterface $container)
    {
    }

    public function create(string $provider): ProviderInterface
    {
        return match($provider){
            LeadbookProvider::CODE => app()->make(LeadbookProvider::class),
            default => throw new InvalidArgumentException("Unknown provider [$provider]"),
        };
    }
}