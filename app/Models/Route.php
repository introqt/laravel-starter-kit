<?php

namespace App\Models;

use App\Core\Interfaces\RouteModelInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Route
 *
 * @package App
 * @property string entity;
 * @property int entity_id;
 */
class Route extends Model implements RouteModelInterface
{
    /**
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return string
     */
    public function getEntity(): string
    {
        return $this->entity;
    }

    /**
     * @return int
     */
    public function getEntityId(): int
    {
        return $this->entity_id;
    }
}
