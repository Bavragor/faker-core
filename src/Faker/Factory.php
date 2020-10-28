<?php declare(strict_types = 1);

namespace Faker;

class Factory
{
    public const DEFAULT_LOCALE = 'en_US';

    protected static array $defaultProviders = [
        'Address',
        'Barcode',
        'Biased',
        'Color',
        'Company',
        'DateTime',
        'File',
        'HtmlLorem',
        'Image',
        'Internet',
        'Lorem',
        'Miscellaneous',
        'Payment',
        'Person',
        'PhoneNumber',
        'Text',
        'UserAgent',
        'Uuid',
    ];

    /**
     * Create a new generator
     */
    public static function create(string $locale = self::DEFAULT_LOCALE): Generator
    {
        $generator = new Generator();

        foreach (static::$defaultProviders as $provider) {
            $providerClassName = self::getProviderClassname($provider, $locale);

            $generator->addProvider(new $providerClassName($generator));
        }

        return $generator;
    }

    protected static function getProviderClassname(string $provider, string $locale = ''): string
    {
        $providerClass = self::findProviderClassname($provider, $locale);

        if ($providerClass !== null) {
            return $providerClass;
        }

        $providerClass = self::findProviderClassname($provider, static::DEFAULT_LOCALE);

        if ($providerClass !== null) {
            return $providerClass;
        }

        $providerClass = self::findProviderClassname($provider);

        if ($providerClass !== null) {
            return $providerClass;
        }

        throw new \InvalidArgumentException(sprintf('Unable to find provider "%s" with locale "%s"', $provider, $locale));
    }

    protected static function findProviderClassname(string $provider, string $locale = ''): ?string
    {
        $providerClass = 'Faker\\' . ($locale ? sprintf('Provider\%s\%s', $locale, $provider) : sprintf('Provider\%s', $provider));

        if (class_exists($providerClass, true)) {
            return $providerClass;
        }

        return null;
    }
}
