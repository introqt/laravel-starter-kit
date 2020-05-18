<?php

declare(strict_types=1);

namespace App\Core\Interfaces;

/**
 * Interface EntityInterface
 * @package App\Core\Interfaces
 */
interface EntityInterface
{
    /**
     * @return string
     */
    public function getUrl(): string;

    /**
     * @return string
     */
    public function getController(): string;

    /**
     * @return string
     */
    public function getActionController(): string;

    /**
     * @return string
     */
    public function getModuleName(): string;
}
