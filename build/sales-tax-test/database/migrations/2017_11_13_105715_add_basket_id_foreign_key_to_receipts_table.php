<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBasketIdForeignKeyToReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'receipts', function (Blueprint $table) {
                $table->integer('basket_id', false, true)
                    ->after('final_receipt_total');
                $table->foreign('basket_id')->references('id')->on('baskets');
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
        Schema::table(
            'receipts', function (Blueprint $table) {

                Schema::disableForeignKeyConstraints();
                //$table->dropForeign('basket_id');
                //$table->dropColumn('basket_id');
                Schema::enableForeignKeyConstraints();
            }
        );
    }
}
