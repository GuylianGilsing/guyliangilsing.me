<?php

declare(strict_types=1);

namespace GuylianGilsingWebsite\Routing\About;

use GuylianGilsingWebsite\Routing\AbstractPage;

final class GET extends AbstractPage
{
    protected function getContentPageName(): string
    {
        return 'about';
    }

    protected function getTemplateName(): string
    {
        return '/pages/about.twig';
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
