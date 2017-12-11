<?php

namespace App\Helpers\Enums;

use App\Helpers\Base\BaseEnum;

class PurchaseType extends BaseEnum
{
    const USER = 0;
    const GUEST = 1;

    public static function getList()
    {
        return [
            self::USER,
            self::GUEST,
        ];
    }

    public static function getString($val)
    {
        switch ($val) {
            case self::USER:
                return "user";
            case self::GUEST:
                return "guest";
        }
    }
}
