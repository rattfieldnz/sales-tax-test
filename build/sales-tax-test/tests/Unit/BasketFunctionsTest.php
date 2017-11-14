<?php

use App\Functions\BasketFunctions;
use App\Models\Basket;
use Tests\TestCase;

class BasketFunctionsTest extends TestCase
{
    private $basketOne, $basketTwo, $basketThree;
    private $basketFunctionsOne, $basketFunctionsTwo, $basketFunctionsThree;

    public function setUp()
    {
        parent::setUp();
        $this->basketOne = Basket::where('id', 1)->first();
        $this->basketTwo = Basket::where('id', 2)->first();
        $this->basketThree = Basket::where('id', 3)->first();

        $this->basketFunctionsOne = new BasketFunctions($this->basketOne);
        $this->basketFunctionsTwo = new BasketFunctions($this->basketTwo);
        $this->basketFunctionsThree = new BasketFunctions($this->basketThree);
    }

    public function testGetReceipt()
    {
        /**  Test functionality for first basket **/

        //Arrange known values to compare with.
        $testInputOne = [
            'id' => 1,
            'final_product_cost_total' => 28.33,
            'sales_tax_total' => 1.50,
            'import_tax_total' => 0.00,
            'final_taxes_total' => 1.50,
            'final_receipt_total' => 29.83,
            'receipt_content' => "1 book: 12.49\n1 music CD: 16.49\n1 chocolate bar: 0.85\nSales Taxes: 1.50\nTotal: 29.83",
            'basket_id' => 1
        ];

        // Get receipt of first basket
        $receiptOne = $this->basketFunctionsOne->getReceipt();

        $conditionOne = $this->generateReceiptTest($receiptOne, $testInputOne);

        $this->assertTrue($conditionOne, "Tested getReceipt() functionality for first basket.");

        /**  Test functionality for second basket **/
        $testInputTwo = [
            'id' => 2,
            'final_product_cost_total' => 57.50,
            'sales_tax_total' => 4.75,
            'import_tax_total' => 2.90,
            'final_taxes_total' => 7.65,
            'final_receipt_total' => 65.15,
            'receipt_content' => "1 imported box of chocolates: 10.50\n1 imported bottle of perfume: 54.65\nSales Taxes: 7.65\nTotal: 65.15",
            'basket_id' => 2
        ];

        $receiptTwo = $this->basketFunctionsTwo->getReceipt();

        $conditionTwo = $this->generateReceiptTest($receiptTwo, $testInputTwo);

        $this->assertTrue($conditionTwo, "Tested getReceipt() functionality for second basket.");

        /**  Test functionality for third basket **/
        $testInputThree = [
            'id' => 3,
            'final_product_cost_total' => 67.98,
            'sales_tax_total' => 4.70,
            'import_tax_total' => 2.00,
            'final_taxes_total' => 6.70,
            'final_receipt_total' => 74.68,
            'receipt_content' => "1 imported bottle of perfume: 32.19\n1 bottle of perfume: 20.89\n1 packet of headache pills: 9.75\n1 box of imported chocolates: 11.85\nSales Taxes: 6.70\nTotal: 74.68",
            'basket_id' => 3
        ];

        $receiptThree = $this->basketFunctionsThree->getReceipt();

        $conditionThree = $this->generateReceiptTest($receiptThree, $testInputThree);

        $this->assertTrue($conditionThree, "Tested getReceipt() functionality for third basket.");
    }

    public function testGetProducts()
    {
        //TODO Implement test for getProducts method
        $this->assertTrue(false);
    }

    public function testGetProductCount()
    {
        //TODO Implement test for getProductCount method
        $this->assertTrue(false);
    }

    public function testAddProducts()
    {
        //TODO Implement test for addProducts method
        $this->assertTrue(false);
    }

    public function testGetProductsCostTotal()
    {
        //TODO Implement test for getProductsCostTotal method
        $this->assertTrue(false);
    }

    public function testGetProductsSalesTaxTotal()
    {
        //TODO Implement test for getProductsSalesTaxTotal method
        $this->assertTrue(false);
    }

    public function testGetProductsImportTaxTotal()
    {
        //TODO Implement test for getProductsImportTaxTotal method
        $this->assertTrue(false);
    }

    public function testGetFinalTaxesTotal()
    {
        //TODO Implement test for getFinalTaxesTotal method
        $this->assertTrue(false);
    }

    public function testGetFinalTotalCosts()
    {
        //TODO Implement test for getFinalTotalCosts method
        $this->assertTrue(false);
    }

    public function testCreateReceipt()
    {
        //TODO Implement test for createReceipt method
        $this->assertTrue(false);
    }

    public function tearDown()
    {
        //TODO Implement tearDown method
    }

    /**
     * @param \App\Models\Receipt $receipt
     * @param array               $testInput
     *
     * @return bool
     */
    private function generateReceiptTest(\App\Models\Receipt $receipt, array $testInput){

        $condition = $receipt->id == $testInput['id'] &&
            $receipt->final_product_cost_total == $testInput['final_product_cost_total'] &&
            $receipt->sales_tax_total == $testInput['sales_tax_total'] &&
            $receipt->import_tax_total == $testInput['import_tax_total'] &&
            $receipt->final_taxes_total == $testInput['final_taxes_total'] &&
            $receipt->final_receipt_total == $testInput['final_receipt_total'] &&
            $receipt->receipt_content == $testInput['receipt_content'] &&
            $receipt->basket_id == $testInput['basket_id'];

        return $condition;
    }

}