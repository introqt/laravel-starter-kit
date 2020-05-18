<?php

declare(strict_types=1);

namespace Modules\Home\Services;

use App\Core\Models\Page;

/**
 * Class HomePage
 *
 * @package Modules\Home\Services
 */
class HomePage implements HomePageInterface
{
    /**
     * @return Page
     */
    public function getPage(): Page
    {
        return Page::whereUrl('/')->firstOrFail();
    }
}
