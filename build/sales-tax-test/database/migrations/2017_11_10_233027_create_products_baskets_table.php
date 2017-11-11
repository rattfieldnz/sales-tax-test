<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateProductsBasketsTable
 *
 * @author  Rob Attfield <emailme@robertattfield.com> <http://www.robertattfield.com>
 */
class CreateProductsBasketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_baskets', function (Blueprint $table) {
            $table->integer('product_id', false, true);
            $table->foreign('product_id')->references('id')->on('products');
            $table->integer('basket_id', false, true);
            $table->foreign('basket_id')->references('id')->on('baskets');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('products_baskets');
        Schema::enableForeignKeyConstraints();
    }
}
