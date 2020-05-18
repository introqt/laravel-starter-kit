<?php

declare(strict_types=1);

namespace App\Services\Route;

use App\Core\Interfaces\EntityInterface;
use App\Core\Interfaces\RouteModelInterface;

/**
 * Interface RouteServiceInterface
 * @package App\Services\Route
 */
interface RouteServiceInterface
{
    /**
     * @param RouteModelInterface $route_model
     * @return EntityInterface
     */
    public function getEntityByRouteModel(RouteModelInterface $route_model): EntityInterface;
}
