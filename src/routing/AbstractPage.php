<?php

declare(strict_types=1);

namespace GuylianGilsingWebsite\Routing;

use GuylianGilsingWebsite\Abstractions\SupportedLanguages;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Routing\RouteContext;

use function GuylianGilsingWebsite\APIs\Content\parse_json_content;
use function GuylianGilsingWebsite\APIs\Views\view_response;

abstract class AbstractPage
{
    public function __invoke(ServerRequestInterface $request): ResponseInterface
    {
        $route = RouteContext::fromRequest($request)->getRoute();
        $language = SupportedLanguages::from(
            $route->getArgument('languageCode', SupportedLanguages::default()->value)
        );

        $templateData = [
            'header' => $this->getParsedJSONContent($language, 'header/header'),
            'page' => $this->getParsedJSONContent($language, $this->getContentPageName()),
            'footer' => $this->getParsedJSONContent($language, 'footer/footer'),
        ];

        return view_response($this->getTemplateName(), $this->alterTemplateData($templateData));
    }

    abstract protected function getContentPageName(): string;
    abstract protected function getTemplateName(): string;

    /**
     * @param array<string, mixed> $templateData
     *
     * @return array<string, mixed>
     */
    abstract protected function alterTemplateData(array $templateData): array;

    /**
     * Returns parsed content for a given JSON file name.
     *
     * @param string $fileName The path and file name without any extensions or language data.
     *
     * @return array<string, mixed>
     */
    private function getParsedJSONContent(SupportedLanguages $supportedLanguage, string $fileName): array
    {
        $content = parse_json_content($supportedLanguage, $fileName);

        if (!is_array($content))
        {
            return [];
        }

        return $content;
    }
}
