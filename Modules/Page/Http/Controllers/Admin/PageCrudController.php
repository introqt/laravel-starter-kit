<?php

declare(strict_types=1);

namespace Modules\Page\Http\Controllers\Admin;

use App\Core\Enums\BaseEnum;
use App\Models\Page;
use Backpack\CRUD\app\Http\Controllers\CrudController;

/**
 * Class PageCrudController
 *
 * @package Modules\Page\Http\Controllers\Admin
 */
class PageCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * @throws \Exception
     */
    public function setup()
    {
        $this->crud->setModel(Page::class);
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/pages');
        $this->crud->setEntityNameStrings('Страница', 'Страницы');

        $fields = [
            [
                'name' => 'url',
            ],
            [
                'label' => 'Заголовок',
                'name' => 'h1',
            ],
            [
                'label' => 'Текст',
                'name' => 'text',
                'type' => 'ckeditor'
            ],
            [
                'label' => 'Мета тайтл',
                'name' => 'meta_title',
            ],
            [
                'label' => 'Мета описание',
                'name' => 'meta_description',
            ],
            [
                'label' => 'Статус',
                'name' => 'status',
                'type' => 'radio',
                'options' => BaseEnum::LIST_PUBLISHED_FOR_FIELDS,
            ],
        ];

        $this->crud->addFields($fields);

        $this->crud->addColumns([
            'h1',
            [
                'label' => 'Статус',
                'name' => 'status',
                'type' => 'radio',
                'options' => BaseEnum::LIST_PUBLISHED_FOR_COLUMN,
            ],
        ]);

        $this->crud->removeFields(['url']);

        $this->crud->orderBy('status', 'DESC');
        $this->crud->orderBy('id', 'ASC');
    }

    /**
     *
     */
    protected function setupUpdateOperation()
    {
//        $this->crud->setValidation(UpdatePageRequest::class);
    }
}
