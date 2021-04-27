<?php


namespace App\Http\Helpers;


class ProductHelper
{
    public static function getColors() : array
    {
        return ['black', 'white', 'green', 'yellow','red', 'blue'];
    }

    public static function getCities() : array
    {
        return ['Moscow', 'Almaty', 'London', 'Berlin','Milan', 'Madrid'];
    }
}
