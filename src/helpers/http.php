<?php

declare(strict_types=1);

namespace GuylianGilsingWebsite\Helpers\HTTP;

use Fig\Http\Message\StatusCodeInterface;
use Psr\Http\Message\ResponseInterface;
use Slim\Psr7\Response;

/**
 * Returns the HTTP protocol and the site's host name as follows: `http://example.com` or `https://example.com`.
 */
function http_protocol_and_host_name(): string
{
    return isset($_SERVER['HTTPS']) ? 'https://'.$_SERVER['HTTP_HOST'] : 'http://'.$_SERVER['HTTP_HOST'];
}

/**
 * Creates a PSR-7 response that redirects the user to a specified path once returned.
 */
function redirect_response(string $path): ResponseInterface
{
    $response = new Response(StatusCodeInterface::STATUS_MOVED_PERMANENTLY);

    return $response->withHeader('Location', http_protocol_and_host_name().$path);
}

/**
 * Creates a PSR-7 "Page not found" response.
 */
function notfound_response(): ResponseInterface
{
    return new Response(StatusCodeInterface::STATUS_NOT_FOUND);
}

/**
 * Creates a PSR-7 "Bad request" response.
 */
function badrequest_response(string $message): ResponseInterface
{
    $response = new Response(StatusCodeInterface::STATUS_BAD_REQUEST);

    $responseJSON = json_encode([
        'message' => $message,
    ]);

    $response->getBody()->write($responseJSON);

    return $response->withHeader('Content-Type', 'application/json');
}

/**
 * Creates a PSR-7 "Unauthorized" response.
 */
function unauthorized_response(): ResponseInterface
{
    return new Response(StatusCodeInterface::STATUS_UNAUTHORIZED);
}
