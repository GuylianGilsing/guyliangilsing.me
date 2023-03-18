<?php

declare(strict_types=1);

namespace GuylianGilsingWebsite\APIs\Application;

use DI\Bridge\Slim\Bridge;
use DI\Container;
use DI\ContainerBuilder;
use ErrorException;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\App;

function define_base_dir(string $dir): void
{
    define('BASE_DIR', $dir);
}

function get_dependency_container_instance(): ContainerInterface
{
    static $container;

    if (!isset($container))
    {
        $builder = new ContainerBuilder();

        $builder->useAnnotations(false);
        $builder->useAutowiring(true);

        $container = $builder->build();
    }

    return $container;
}

function get_application_instance(): App
{
    static $app;

    if (!isset($app))
    {
        /**
         * @var Container $container
         */
        $container = get_dependency_container_instance();
        $app = Bridge::create($container);
    }

    return $app;
}

/**
 * Retrieves the current request object.
 *
 * @param ?ServerRequestInterface $setRequest When a request object is given, it is cached inside this function and
 * will be returned when the function is called without any parameters.
 *
 * @throws ErrorException when no request has been registered when the function is called without any parameters.
 */
function current_request(?ServerRequestInterface $setRequest = null): ServerRequestInterface
{
    static $request = null;

    if ($setRequest !== null)
    {
        $request = $setRequest;
    }

    if ($request === null)
    {
        throw new ErrorException('Cannot retrieve current request, no request registered.');
    }

    return $request;
}

function application_cleanup(): void
{
    return;
}
