<?php

declare(strict_types=1);

namespace GuylianGilsingWebsite\Abstractions;

enum SupportedLanguages: string
{
    case DUTCH = 'nl';
    case ENGLISH = 'en';

    /**
     * Returns the default value of this enum.
     */
    public static function default(): SupportedLanguages
    {
        return self::DUTCH;
    }

    /**
     * @return array<string> The values of this enum.
     */
    public static function values(): array
    {
        $values = [];

        foreach (self::cases() as $case)
        {
            $values[] = $case->value;
        }

        return $values;
    }
}
