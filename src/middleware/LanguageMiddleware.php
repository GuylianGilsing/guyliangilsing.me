<?php

declare(strict_types=1);

namespace GuylianGilsingWebsite\Middleware;

use GuylianGilsingWebsite\Abstractions\SupportedLanguages;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Slim\Routing\RouteContext;

use function GuylianGilsingWebsite\Helpers\HTTP\redirect_response;

final class LanguageMiddleware
{
    public function __invoke(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $route = RouteContext::fromRequest($request)->getRoute();
        $languageCode = $route->getArgument('languageCode');

        if (
            !is_string($languageCode) ||
            strlen($languageCode) === 0 ||
            !in_array($languageCode, SupportedLanguages::values(), true)
        ) {
            return redirect_response('/'.SupportedLanguages::default()->value);
        }

        return $handler->handle($request);
    }
}
