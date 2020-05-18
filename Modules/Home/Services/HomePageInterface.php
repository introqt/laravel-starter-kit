<?php

declare(strict_types=1);

namespace Modules\Home\Services;

use App\Core\Models\Page;

/**
 * Interface HomePageInterface
 *
 * @package Modules\Home\Services
 */
interface HomePageInterface
{
    /**
     * @return Page
     */
    public function getPage(): Page;
}
