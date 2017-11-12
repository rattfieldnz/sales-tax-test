<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateBasketsTable
 *
 * @author Rob Attfield <emailme@robertattfield.com> <http://www.robertattfield.com>
 */
class CreateBasketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'baskets', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('receipt_id', false, true)->nullable();
                $table->foreign('receipt_id')->references('id')->on('receipts');
                $table->timestamps();
                $table->softDeletes();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('baskets');
        Schema::enableForeignKeyConstraints();
    }
}
