<?php

declare(strict_types=1);

namespace App\Core\Models;

use Modules\Page\Http\Controllers\Front\PageController;

/**
 * Class Page
 * @package Modules\Page\Entities
 * @property string url
 * @property bool status
 */
class Page extends BaseModel
{
    /** @var string */
    private $action = 'show';

    /** @var string */
    private $module_name = 'Page';

    /** @var string */
    private $controller = PageController::class;

    /**
     * @var array field translated by module
     */
    protected $translated = ['h1', 'meta_title', 'meta_description', 'text'];

    /**
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getController(): string
    {
        return $this->controller;
    }

    /**
     * @param string $controller
     * @return void
     */
    public function setController(string $controller): void
    {
        $this->controller = $controller;
    }

    /**
     * @param string $action
     * @return void
     */
    public function setActionController(string $action): void
    {
        $this->action = $action;
    }

    /**
     * @return string
     */
    public function getActionController(): string
    {
        return $this->action;
    }

    /**
     * @return string
     */
    public function getModuleName(): string
    {
        return $this->module_name;
    }

    /**
     * @param string $module_name
     * @return void
     */
    public function setModuleName(string $module_name): void
    {
        $this->module_name = $module_name;
    }
}
