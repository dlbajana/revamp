<?php

namespace App\Helpers;

class AppHelper
{
    public static function toPeso($value)
    {
        if (is_null($value)) return null;

        return '₱ ' . number_format($value, 2);
    }

    public static function trimPesoSign($value)
    {
        if (is_null($value)) return null;

        return str_replace(['₱ ', ','], '', $value);
    }

    public static function trimPercentSign($value)
    {
        if (is_null($value)) return null;

        return str_replace([' %', ','], '', $value) / 100;
    }

    public static function toPercentage($value)
    {
        return ($value * 100) . ' %';
    }

    public static function toPercentageAsCharged($value)
    {
        if (is_null($value)) {
            return 'AS CHARGED';
        }

        return ($value * 100) . ' %';
    }

    public static function toAsCharged($value)
    {
        if (is_null($value)) {
            return 'AS CHARGED';
        }

        return AppHelper::toPeso($value);
    }
}
