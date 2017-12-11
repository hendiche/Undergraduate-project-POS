<?php

namespace App\Helpers\Enums;

use App\Helpers\Base\BaseEnum;

class PurchaseStatus extends BaseEnum
{
    const UNCOMPLETED = 0;
    const COMPLETED = 1;

    public static function getList()
    {
        return [
            self::UNCOMPLETED,
            self::COMPLETED,
        ];
    }

    public static function getString($val)
    {
        switch ($val) {
            case self::UNCOMPLETED:
                return "uncompleted";
            case self::COMPLETED:
                return "completed";
        }
    }
}
