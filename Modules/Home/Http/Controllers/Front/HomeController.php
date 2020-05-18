<?php

declare(strict_types=1);

namespace Modules\Home\Http\Controllers\Front;

use Illuminate\Routing\Controller;
use Modules\Home\Services\HomePageInterface;

/**
 * Class HomeController
 *
 * @package Modules\Home\Http\Controllers\Front
 */
class HomeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function index()
    {
        /** @var HomePageInterface $home_page_service */
        $home_page_service = app()->make(HomePageInterface::class);

        return view('welcome', [
            'page' => $home_page_service->getPage(),
        ]);
    }
}
