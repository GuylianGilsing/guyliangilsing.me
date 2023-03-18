<?php

declare(strict_types=1);

use GuylianGilsingWebsite\Abstractions\SupportedLanguages;
use GuylianGilsingWebsite\Middleware\LanguageMiddleware;
use GuylianGilsingWebsite\Middleware\RequestCachingMiddleware;
use Slim\Routing\RouteCollectorProxy;

use function GuylianGilsingWebsite\APIs\Application\get_application_instance;

$app = get_application_instance();

$baseGroupRoute = $app->group('/{languageCode}', static function (RouteCollectorProxy $baseGroup): void
{
    $baseGroup->get('', \GuylianGilsingWebsite\Routing\Index\GET::class);
    $baseGroup->get('/projects', \GuylianGilsingWebsite\Routing\Projects\GET::class);
    $baseGroup->get('/about', \GuylianGilsingWebsite\Routing\About\GET::class);

    // Catch-all redirect route that displays a 404 page
    $baseGroup->get('{path:.*}', \GuylianGilsingWebsite\Routing\Errors\PageNotFound\GET::class);
});

// Catch-all redirect route that forces a selected language
$app->redirect('{path:.*}', '/'.SupportedLanguages::default()->value);

$baseGroupRoute->add(RequestCachingMiddleware::class);
$baseGroupRoute->add(LanguageMiddleware::class);
