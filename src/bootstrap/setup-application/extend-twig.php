<?php

declare(strict_types=1);

use GuylianGilsingWebsite\Abstractions\SupportedLanguages;
use Slim\Routing\RouteContext;

use function GuylianGilsingWebsite\APIs\Application\current_request;
use function GuylianGilsingWebsite\APIs\Views\get_twig_environment_instance;
use function GuylianGilsingWebsite\APIs\Views\Projects\filter_projects_by_name;
use function GuylianGilsingWebsite\APIs\Views\Projects\filter_projects_by_tags;
use function GuylianGilsingWebsite\Helpers\HTTP\http_protocol_and_host_name;

$twig = get_twig_environment_instance();

$twig->addFunction(new \Twig\TwigFunction('in_array', static function (string $key, array $array): bool
{
    return in_array($key, $array, true);
}));

$twig->addFunction(new \Twig\TwigFunction('current_year', static function (): int
{
    static $date = null;

    if ($date === null)
    {
        $date = intval((new DateTimeImmutable())->format('Y'));
    }

    return $date;
}));

$twig->addFunction(new \Twig\TwigFunction('asset_url', static function (string $path): string
{
    return http_protocol_and_host_name().$path;
}));

$twig->addFunction(new \Twig\TwigFunction('abs_url', static function (string $path): string
{
    $currentRequest = current_request();

    $routeContext = RouteContext::fromRequest($currentRequest);
    $route = $routeContext->getRoute();

    $language = SupportedLanguages::from($route->getArgument('languageCode', SupportedLanguages::default()->value));

    return http_protocol_and_host_name().'/'.$language->value.$path;
}));

$twig->addFunction(new \Twig\TwigFunction('url_is_active', static function (string $url): bool
{
    $requestURI = $_SERVER['REQUEST_URI'];

    if (
        array_key_exists('QUERY_STRING', $_SERVER) &&
        is_string($_SERVER['QUERY_STRING']) &&
        strlen($_SERVER['QUERY_STRING']) > 0
    ) {
        $requestURI = str_replace($_SERVER['QUERY_STRING'], '', $requestURI);
    }

    $requestURI = str_replace('?', '', $requestURI);
    $requestURI = str_replace('#', '', $requestURI);

    return $url === $requestURI;
}));

$twig->addFunction(new \Twig\TwigFunction('language_switcher_language_name', static function (): string
{
    $currentRequest = current_request();

    $routeContext = RouteContext::fromRequest($currentRequest);
    $route = $routeContext->getRoute();

    $selectedLanguageCode = $route->getArgument('languageCode', SupportedLanguages::default()->value);
    $selectedLanguage = '';

    switch (SupportedLanguages::from($selectedLanguageCode))
    {
        case SupportedLanguages::DUTCH:
            $selectedLanguage = 'Taal';
            break;

        case SupportedLanguages::ENGLISH:
            $selectedLanguage = 'Language';
            break;
    }

    return $selectedLanguage;
}));

/**
 * @return array<string, string> An associative array that returns languages with a key => title format.
 */
$twig->addFunction(new \Twig\TwigFunction('language_switcher_languages', static function (): array
{
    $currentURL = current_request()->getUri()->getPath();

    // Create a clean base URL without the language code
    $explodedURL = explode('/', $currentURL);
    array_shift($explodedURL);
    array_shift($explodedURL);

    $baseURL = '/'.implode('/', $explodedURL);

    if ($baseURL === '/')
    {
        $baseURL = '';
    }

    $languages = [];
    $supportedLanguages = [
        'Nederlands' => SupportedLanguages::DUTCH->value,
        'English' => SupportedLanguages::ENGLISH->value,
    ];

    foreach ($supportedLanguages as $title => $language)
    {
        $languages[$title] = http_protocol_and_host_name().'/'.$language.$baseURL;
    }

    return $languages;
}));

/**
 * @param array<array<string, mixed>> $projects An indexed array of associative arrays that represent projects.
 *
 * @return array<string> Project tags.
 */
$twig->addFunction(new \Twig\TwigFunction('project_tags_filter', static function (array $projects): array
{
    $foundTags = [];

    foreach ($projects as $project)
    {
        if (!is_array($project))
        {
            continue;
        }

        if (!array_key_exists('tags', $project) || !is_array($project['tags']))
        {
            continue;
        }

        foreach ($project['tags'] as $tag)
        {
            if (!in_array($tag, $foundTags))
            {
                $foundTags[] = $tag;
            }
        }
    }

    return $foundTags;
}));

/**
 * @param array<array<string, mixed>> $projects An indexed array of associative arrays that represent projects.
 *
 * @return array<array<string, mixed>> Filtered projects.
 */
$twig->addFunction(new \Twig\TwigFunction('filter_projects', static function (array $projects): array
{
    $filteredProjects = $projects;
    $queryParams = current_request()->getQueryParams();

    if (array_key_exists('q', $queryParams) && is_string($queryParams['q']))
    {
        $filteredProjects = filter_projects_by_name($queryParams['q'], $filteredProjects);
    }

    if (array_key_exists('tags', $queryParams) && is_array($queryParams['tags']))
    {
        $filteredProjects = filter_projects_by_tags($queryParams['tags'], $filteredProjects);
    }

    return $filteredProjects;
}));
