<?php

declare(strict_types=1);

namespace App\Core\Traits;

use Illuminate\Database\Eloquent\Builder;
use App\Core\Enums\BaseEnum;

/**
 * Trait QueryTrait
 * @package App\Core\Traits
 */
trait ScopeTrait
{
    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeActive(Builder $query): Builder
    {
        return $query->whereStatus(BaseEnum::PUBLISHED);
    }

    /**
     * @param Builder $query
     * @return Builder
     */
    public function scopeSort(Builder $query): Builder
    {
        return $query->orderBy('sort', 'DESC');
    }

    /**
     * Scope for sorting with Reorder action from Backpack
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeSortBackpack(Builder $query): Builder
    {
        return $query->orderBy('lft', 'ASC');
    }
}
