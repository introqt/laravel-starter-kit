<?php

declare(strict_types=1);

namespace App\Core\Models;

use App\Core\Traits\ScopeTrait;
use App\Core\Interfaces\EntityInterface;
use App\Models\Route;

/**
 * Class BaseModel
 *
 * @package App\Core\Models
 *
 * @property string module_name
 * @property string url
 * @property int id
 */
abstract class BaseModel extends AbstractModel implements EntityInterface
{
    use ScopeTrait;

    public static function boot(): void
    {
        parent::boot();

        self::created(function (self $object) {
            Route::create([
                'url' => $object->getUrl(),
                'module_name' => $object->getModuleName(),
                'entity' => static::class,
                'entity_id' => $object->id,
                'action' => $object->getActionController(),
                'controller' => $object->getController(),
            ]);
        });

        static::updating(function (self $model) {
            $model->route()->update(['url' => $model->url]);
        });

        static::deleting(function (self $model) {
            $model->route()->delete();
        });
    }

    ####################################
    #           RELATIONS
    ####################################

    /**
     * Get associated Route
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function route()
    {
        return $this->hasOne(Route::class, 'entity_id', 'id')
            ->whereEntity(static::class);
    }

    ####################################
    #           MUTATORS
    ####################################

    /**
     * @param string|null $value
     */
    protected function setUrlAttribute(string $value = null): void
    {
        $this->attributes['url'] = $value ?? str_slug(request('h1'));
    }

    /**
     * @param string|null $value
     */
    protected function setBreadcrumbAttribute(string $value = null): void
    {
        $this->attributes['breadcrumb'] = $value ?? $this->h1;
    }

    /**
     * @param string|null $value
     */
    protected function setMetaTitleAttribute(string $value = null): void
    {
        $this->attributes['meta_title'] = $value ?? $this->h1;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }
}
