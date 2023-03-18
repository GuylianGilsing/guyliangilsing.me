<?php

declare(strict_types=1);

namespace GuylianGilsingWebsite\Routing\Projects;

use GuylianGilsingWebsite\Routing\AbstractPage;
use Psr\Http\Message\ServerRequestInterface;

use function GuylianGilsingWebsite\APIs\Application\current_request;

final class GET extends AbstractPage
{
    protected function getContentPageName(): string
    {
        return 'projects';
    }

    protected function getTemplateName(): string
    {
        return '/pages/projects.twig';
    }

    /**
     * @param array<string, mixed> $templateData
     *
     * @return array<string, mixed>
     */
    protected function alterTemplateData(array $templateData): array
    {
        $templateData['search'] = [];
        $currentRequest = current_request();

        $this->addQueryToFilter($templateData['search'], $currentRequest);
        $this->addTagsToFilter($templateData['search'], $currentRequest);

        return $templateData;
    }

    /**
     * @param array<string, mixed> &$searchFilterData
     */
    private function addQueryToFilter(array &$searchFilterData, ServerRequestInterface $request): void
    {
        $queryParams = $request->getQueryParams();

        if (array_key_exists('q', $queryParams) && is_string($queryParams['q']) && strlen($queryParams['q']) > 0)
        {
            $searchFilterData['query'] = $queryParams['q'];
        }
    }

    /**
     * @param array<string, mixed> &$searchFilterData
     */
    private function addTagsToFilter(array &$searchFilterData, ServerRequestInterface $request): void
    {
        $queryParams = $request->getQueryParams();

        if (array_key_exists('tags', $queryParams) && is_array($queryParams['tags']))
        {
            $searchFilterData['tags'] = $queryParams['tags'];
        }
    }
}
