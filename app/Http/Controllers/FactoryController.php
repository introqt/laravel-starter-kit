<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Core\Interfaces\RouteModelInterface;
use App\Services\Route\RouteServiceInterface;

/**
 * Class FactoryController
 *
 * @package App\Http\Controllers
 */
class FactoryController extends Controller
{
    /**
     * @param RouteModelInterface $route_entity
     * @param RouteServiceInterface $route_service
     * @param string|null $lang
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function create(
        RouteModelInterface $route_entity,
        RouteServiceInterface $route_service
    ) {
        /** @var Controller $controller */
        $controller = app()->make($route_entity->controller);

        $entity = $route_service->getEntityByRouteModel($route_entity);


//        if ($entity instanceof EntityInterface && (bool)$entity->status === false) {
//            abort(Response::HTTP_NOT_FOUND);
//        }

        return $controller->callAction($route_entity->action, [$entity]);
    }
}
