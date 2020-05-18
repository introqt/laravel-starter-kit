<?php

declare(strict_types=1);

namespace App\Core\Enums;

/**
 * Class BaseEnum
 *
 * @package App\Core\Enums
 */
class BaseEnum
{
    /** @var int */
    const NOT_PUBLISHED = 0;

    /** @var int */
    const PUBLISHED = 1;

    /** @var array */
    const LIST_PUBLISHED_FOR_FIELDS = [
        self::NOT_PUBLISHED => 'Не публиковать',
        self::PUBLISHED => 'Опубликовать',
    ];

    /** @var array */
    const LIST_PUBLISHED_FOR_COLUMN = [
        self::NOT_PUBLISHED => 'Не опубликовано',
        self::PUBLISHED => 'Опубликовано',
    ];

    /** @var int */
    const DEFAULT_REORDER_VALUE = 0;

    /** @var int */
    const MAX_TEXT_SIZE = 65535;
}
