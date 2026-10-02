<?php

declare(strict_types=1);

namespace SeoIntelligence\Core;

/**
 * Lightweight type-safe Dependency Injection Container.
 */
final class Container
{
    /**
     * @var array<string, object>
     */
    private array $services = [];

    /**
     * @var array<string, callable>
     */
    private array $factories = [];

    /**
     * Bind a shared service instance.
     */
    public function set(string $id, object $service): void
    {
        $this->services[$id] = $service;
    }

    /**
     * Bind a factory closure.
     */
    public function factory(string $id, callable $factory): void
    {
        $this->factories[$id] = $factory;
    }

    /**
     * Retrieve a service instance.
     *
     * @template T of object
     * @param class-string<T>|string $id
     * @return T|object
     */
    public function get(string $id): object
    {
        if (isset($this->services[$id])) {
            return $this->services[$id];
        }

        if (isset($this->factories[$id])) {
            $service = ($this->factories[$id])($this);
            $this->services[$id] = $service;
            return $service;
        }

        throw new \InvalidArgumentException(sprintf('Service "%s" is not registered in Container.', $id));
    }

    /**
     * Check if service exists.
     */
    public function has(string $id): bool
    {
        return isset($this->services[$id]) || isset($this->factories[$id]);
    }
}
