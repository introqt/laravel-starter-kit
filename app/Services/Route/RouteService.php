<?php

declare(strict_types=1);

namespace App\Services\Route;

use Illuminate\Database\Eloquent\Builder;

use App\Core\Interfaces\EntityInterface;
use App\Core\Interfaces\RouteModelInterface;

/**
 * Class RouteService
 * @package App\Services\Route
 */
class RouteService implements RouteServiceInterface
{
    /**
     * @param RouteModelInterface $route_model
     * @return EntityInterface|Builder
     */
    public function getEntityByRouteModel(RouteModelInterface $route_model): EntityInterface
    {
        /** @var Builder $entity */
        $entity = $route_model->getEntity();
        $entity_id = $route_model->getEntityId();

        return $entity::findOrFail($entity_id);
    }
}
