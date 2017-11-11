<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateReceiptsTable
 *
 * @author Rob Attfield <emailme@robertattfield.com> <http://www.robertattfield.com>
 */
class CreateReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'receipts', function (Blueprint $table) {
                $table->increments('id');
                $table->decimal('final_product_cost_total', 8, 2);
                $table->decimal('sales_tax_total', 8, 2);
                $table->decimal('import_tax_total', 8, 2);
                $table->decimal('final_taxes_total', 8, 2);
                $table->decimal('final_receipt_total', 8, 2);
                $table->text('receipt_content');
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
        Schema::dropIfExists('receipts');
        Schema::enableForeignKeyConstraints();
    }
}
