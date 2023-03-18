<?php

declare(strict_types=1);

namespace GuylianGilsingWebsite\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

use function GuylianGilsingWebsite\APIs\Application\current_request;

final class RequestCachingMiddleware
{
    public function __invoke(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        // Cache the request so that it can be used inside the application
        current_request($request);

        return $handler->handle($request);
    }
}
