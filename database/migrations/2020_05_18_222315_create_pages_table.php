<?php

use App\Core\Enums\BaseEnum;
use App\Models\Page;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create((new Page())->getTable(), function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('h1')->unique();
            $table->string('url')->unique();
            $table->string('breadcrumb');
            $table->string('meta_title');
            $table->text('meta_description')->nullable();
            $table->longText('text')->nullable();
            $table->boolean('status')->default(BaseEnum::NOT_PUBLISHED);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop((new Page())->getTable());
    }
}
