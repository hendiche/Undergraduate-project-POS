<?php

namespace App\Helpers\Enums;

use App\Helpers\Base\BaseEnum;

class StatusEnum extends BaseEnum
{
    const INACTIVE = 0;
    const ACTIVE = 1;

    public static function getList()
    {
        return [
            self::INACTIVE,
            self::ACTIVE,
        ];
    }

    public static function getString($val)
    {
        switch ($val) {
            case self::INACTIVE:
                return "Inactive";
            case self::ACTIVE:
                return "Active";
        }
    }
}
