<?php

declare(strict_types=1);

namespace GuylianGilsingWebsite\Routing\Index;

use GuylianGilsingWebsite\Routing\AbstractPage;

final class GET extends AbstractPage
{
    protected function getContentPageName(): string
    {
        return 'home';
    }

    protected function getTemplateName(): string
    {
        return '/pages/home.twig';
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
