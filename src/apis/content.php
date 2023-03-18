<?php

declare(strict_types=1);

namespace GuylianGilsingWebsite\APIs\Content;

use GuylianGilsingWebsite\Abstractions\SupportedLanguages;

/**
 * Returns the full file name for a JSON content page.
 *
 * @param SupportedLanguages $supportedLanguage a supported translation language.
 * @param string $pageName The name of the page.
 *
 * @return string The file name with a `.json` extension.
 */
function get_json_content_full_file_name(SupportedLanguages $supportedLanguage, string $pageName): string
{
    return BASE_DIR.'/content/'.$pageName.'-'.$supportedLanguage->value.'.json';
}

/**
 * Checks if JSON content for a specific page exists.
 *
 * @param SupportedLanguages $supportedLanguage a supported translation language.
 * @param string $pageName The name of the page.
 *
 * @return bool Returns `true` when content for a specified page exists, `false` otherwise.
 */
function json_content_exists(SupportedLanguages $supportedLanguage, string $pageName): bool
{
    if (!file_exists(BASE_DIR.'/content'))
    {
        return false;
    }

    $fileName = get_json_content_full_file_name($supportedLanguage, $pageName);

    if (!file_exists($fileName))
    {
        return false;
    }

    return true;
}

/**
 * Parses JSON from a specified content page.
 *
 * @param SupportedLanguages $supportedLanguage a supported translation language.
 * @param string $pageName The name of the page.
 *
 * @return ?array<string, mixed> Returns an associative array when the page
 * content could be found/parsed, `null` otherwise.
 */
function parse_json_content(SupportedLanguages $supportedLanguage, string $pageName): ?array
{
    if (!json_content_exists($supportedLanguage, $pageName))
    {
        return null;
    }

    $fileName = get_json_content_full_file_name($supportedLanguage, $pageName);
    $fileContent = file_get_contents($fileName);

    $parsedContent = json_decode($fileContent, true);

    if (!is_array($parsedContent))
    {
        return null;
    }

    return $parsedContent;
}
