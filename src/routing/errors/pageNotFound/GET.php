<?php

declare(strict_types=1);

namespace GuylianGilsingWebsite\Routing\Errors\PageNotFound;

use GuylianGilsingWebsite\Routing\AbstractPage;

final class GET extends AbstractPage
{
    protected function getContentPageName(): string
    {
        return 'errors/404';
    }

    protected function getTemplateName(): string
    {
        return '/pages/error/404.twig';
    }

    /**
     * @param array<string, mixed> $templateData
     *
     * @return array<string, mixed>
     */
    protected function alterTemplateData(array $templateData): array
    {
        return $templateData;
    }
}
