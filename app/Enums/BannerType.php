<?php

namespace App\Enums;

class BannerType
{
    public const HOME = 'home';
    public const ABOUT = 'about';
    public const PRODUCTS = 'products';
    public const CONTACT = 'contact';
    public const FACTORIES = 'factories';
    public const FARMS = 'farms';
    public const CERTIFICATIONS = 'certifications';

    public static function values(): array
    {
        return [
            self::HOME,
            self::ABOUT,
            self::PRODUCTS,
            self::CONTACT,
            self::FACTORIES,
            self::FARMS,
            self::CERTIFICATIONS,
        ];
    }

    public static function names(): array
    {
        return array_map(fn($value) => ucfirst(strtolower($value)), self::values());
    }

    public static function options(): array
    {
        return array_combine(self::values(), self::names());
    }
}
