<?php

declare(strict_types=1);

use GuylianGilsingWebsite\Middleware\RemoveTrailingSlashMiddleware;

use function GuylianGilsingWebsite\APIs\Application\get_application_instance;

$app = get_application_instance();

$app->addBodyParsingMiddleware();
$app->addRoutingMiddleware();
$app->addErrorMiddleware(APP_DEBUG, APP_DEBUG, APP_DEBUG);

$app->add(RemoveTrailingSlashMiddleware::class);

require_once __DIR__.'/setup-application/routing.php';
require_once __DIR__.'/setup-application/extend-twig.php';
