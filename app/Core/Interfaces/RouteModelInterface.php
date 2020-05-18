<?php

declare(strict_types=1);

namespace App\Core\Interfaces;

/**
 * Interface RouteModelInterface
 * @package App\Core\Interfaces
 *
 * @property string controller
 * @property string action
 */
interface RouteModelInterface
{
    /**
     * @return string
     */
    public function getEntity(): string;

    /**
     * @return int
     */
    public function getEntityId(): int;
}
