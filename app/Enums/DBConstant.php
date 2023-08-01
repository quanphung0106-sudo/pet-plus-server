<?php

declare(strict_types=1);

namespace App\Enums;

/**
 * DBConstant enum.
 */
class DBConstant extends BaseEnum
{
    // Gender
    const MALE = 1;
    const FEMALE = 0;

    // Active status
    const STATUS_ACTIVE = true;
    const STATUS_BLOCK = false;
}
