<?php

declare(strict_types=1);

namespace App\Concerns;

trait HasLocalizedAttributes
{
    public function localized(string $attribute, ?string $locale = null): mixed
    {
        $locale ??= app()->getLocale();

        $availableLocales = ['ar', 'en'];

        if (! in_array($locale, $availableLocales, true)) {
            $locale = 'en';
        }

        $column = $attribute.'_'.$locale;

        if (isset($this->{$column})) {
            return $this->{$column};
        }

        $fallbackColumn = $attribute.'_en';

        return $this->{$fallbackColumn} ?? null;
    }
}
