<?php

use App\Core\Enums\BaseEnum;
use Illuminate\Database\Seeder;

use Modules\Blog\Http\Controllers\BlogController;
use Modules\Commerce\Http\Controllers\Front\OrderController;
use Modules\Home\Http\Controllers\Front\HomeController;
use Modules\Page\Http\Controllers\Front\InstructionController;
use Modules\Page\Http\Controllers\Front\PageController;

use App\Models\Page;
use Modules\Product\Http\Controllers\Front\FavoriteController;
use Modules\Product\Http\Controllers\Front\ProductController;

class PagesTableSeeder extends Seeder
{
    /**
     * @var array
     */
    private $list = [
        [
            'h1' => 'Главная',
            'url' => '/',
            'action' => 'index',
            'controller' => HomeController::class,
            'module_name' => 'Home',
            'text' => "Малюй майбутне"
        ],
    ];

    /**
     * @return array
     */
    private function getList(): array
    {
        return $this->list;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->getList() as $page) {
            $page['breadcrumb'] = $page['h1'];
            $page['meta_title'] = $page['h1'];
            $page['status'] = BaseEnum::PUBLISHED;

            $page_model = new Page();

            $page_model->setController($page['controller']);
            $page_model->setModuleName($page['module_name']);
            $page_model->setActionController($page['action']);

            foreach (['action', 'controller', 'module_name'] as $field) {
                unset($page[$field]);
            }

            $page_model->fill($page);
            $page_model->save();
        }

        $this->command->info("Insert count:" . count($this->getList()));
    }
}
