<?php

declare(strict_types=1);

namespace App\Core\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

use Backpack\CRUD\app\Models\Traits\CrudTrait;


if (\Module::find('translate') && \Module::find('translate')->isEnabled()) {
    /**
     * Class InnerAbstractModel
     * @package App\Core\Models
     */
    abstract class InnerAbstractModel extends Model
    {
//        use \Modules\Translate\Traits\TranslateTrail;

        /**
         * @var array
         */
        protected $translated = [];
    }
} else {
    /**
     * Class InnerAbstractModel
     * @package App\Core\Models
     */
    abstract class InnerAbstractModel extends Model
    {

    }
}


/**
 * Class AbstractModel
 *
 * @package App\Core\Models
 */
abstract class AbstractModel extends InnerAbstractModel
{
    use CrudTrait;

    const PUBLIC_STORE = 'public';

    protected $uploaded = [];

    /**
     * Setter for uploaded file
     *
     * @param string $attribute_name - model attribute
     * @param $value
     *
     * @return AbstractModel
     */
    private function setUploadAttr(string $attribute_name, $value)
    {
        $fs = Storage::disk(self::PUBLIC_STORE);

        if ($value == null) {
            $fs->delete($this->{$attribute_name});
            $this->attributes[$attribute_name] = null;
            return $this;
        }

        if (starts_with($value, 'data:image')) { //TODO: other types
            $image = Image::make($value)->encode('jpg', 90);
            $filename = md5($attribute_name . time()) . '.jpg';
            $destination_path = 'uploads/' . date("y/m/d") . '/' . $filename;
            $fs->put($destination_path, $image->stream());
            $fs->delete($this->{$attribute_name});
            $this->attributes[$attribute_name] = $destination_path;
        } else {
            $this->attributes[$attribute_name] = $value;
        }

        return $this;
    }

    /**
     * Delete files from disk
     * @param array $attribute_names - model attributes
     */
    protected function deleteUploadAttrs(array $attribute_names): void
    {
        $fs = Storage::disk(self::PUBLIC_STORE);
        foreach ($attribute_names as $name) {
            $fs->delete($this->attributes[$name]);
        }
    }

    /**
     *
     */
    public static function boot()
    {
        parent::boot();
        static::deleting(function ($obj) {
            /** @var AbstractModel $obj */
            $obj->deleteUploadAttrs($obj->uploaded);
        });
    }

    /**
     * @param string $key
     * @param mixed $value
     * @return AbstractModel|InnerAbstractModel|mixed
     */
    public function setAttribute($key, $value)
    {

        if ($this->hasSetMutator($key)) {
            return $this->setMutatedAttributeValue($key, $value);
        }
        if (in_array($key, $this->uploaded)) {
            return $this->setUploadAttr($key, $value);
        } else {
            return parent::setAttribute($key, $value);
        }
    }

    /**
     * @return bool
     */
    public function checkPublishedRecordOrAbort404(): bool
    {
        return (bool)$this->status === false;
    }
}

