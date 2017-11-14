<?php

use App\Functions\BasketFunctions;
use App\Models\Basket;
use Tests\TestCase;

class BasketFunctionsTest extends TestCase
{
    private $basketOne, $basketTwo, $basketThree;
    private $basketOneFunctions, $basketTwoFunctions, $basketThreeFunctions;

    public function setUp()
    {
        parent::setUp();
        $this->basketOne = Basket::where('id', 1)->first();
        $this->basketTwo = Basket::where('id', 2)->first();
        $this->basketThree = Basket::where('id', 3)->first();

        $this->basketOneFunctions = new BasketFunctions($this->basketOne);
        $this->basketTwoFunctions = new BasketFunctions($this->basketTwo);
        $this->basketThreeFunctions = new BasketFunctions($this->basketThree);
    }

    public function testGetReceipt()
    {
        /**  Test functionality for first basket **/

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

        $receiptOne = $this->basketOneFunctions->getReceipt();

        $this->generateReceiptTest($receiptOne, $testInputOne);

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

        $receiptTwo = $this->basketTwoFunctions->getReceipt();

        $this->generateReceiptTest($receiptTwo, $testInputTwo);

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

        $receiptThree = $this->basketThreeFunctions->getReceipt();

        $this->generateReceiptTest($receiptThree, $testInputThree);
    }

    /**public function testGetProducts()
    {
        //TODO Implement test for getProducts method
        //$this->assertTrue(false);
    }**/

    /**public function testGetProductCount()
    {
        //TODO Implement test for getProductCount method
        //$this->assertTrue(false);
    }**/

    /**public function testAddProducts()
    {
        //TODO Implement test for addProducts method
        //$this->assertTrue(false);
    }**/

    public function testGetProductsCostTotal()
    {
        $basketOneProductCostsTotal = $this->basketOneFunctions->getProductsCostTotal();
        $basketTwoProductCostsTotal = $this->basketTwoFunctions->getProductsCostTotal();
        $basketThreeProductCostsTotal = $this->basketThreeFunctions->getProductsCostTotal();

        $this->assertEquals(28.33, $basketOneProductCostsTotal, '', 0.00);
        $this->assertEquals(57.50, $basketTwoProductCostsTotal, '', 0.00);
        $this->assertEquals(67.98, $basketThreeProductCostsTotal, '', 0.00);
    }

    public function testGetProductsSalesTaxTotal()
    {
        $basketOneSalesTaxTotal = $this->basketOneFunctions->getProductsSalesTaxTotal();
        $basketTwoSalesTaxTotal = $this->basketTwoFunctions->getProductsSalesTaxTotal();
        $basketThreeSalesTaxTotal = $this->basketThreeFunctions->getProductsSalesTaxTotal();

        $this->assertEquals(1.50, $basketOneSalesTaxTotal, '', 0.00);
        $this->assertEquals(4.75, $basketTwoSalesTaxTotal, '', 0.00);
        $this->assertEquals(4.70, $basketThreeSalesTaxTotal, '', 0.00);
    }

    public function testGetProductsImportTaxTotal()
    {
        $basketOneImportTaxTotal = $this->basketOneFunctions->getProductsImportTaxTotal();
        $basketTwoImportTaxTotal = $this->basketTwoFunctions->getProductsImportTaxTotal();
        $basketThreeImportTaxTotal = $this->basketThreeFunctions->getProductsImportTaxTotal();

        $this->assertEquals(0.00, $basketOneImportTaxTotal, '', 0.00);
        $this->assertEquals(2.90, $basketTwoImportTaxTotal, '', 0.00);
        $this->assertEquals(2.00, $basketThreeImportTaxTotal, '', 0.00);
    }

    public function testGetFinalTaxesTotal()
    {
        $basketOneFinalTaxesTotal = $this->basketOneFunctions->getFinalTaxesTotal();
        $basketTwoFinalTaxesTotal = $this->basketTwoFunctions->getFinalTaxesTotal();
        $basketThreeFinalTaxesTotal = $this->basketThreeFunctions->getFinalTaxesTotal();

        $this->assertEquals(1.50, $basketOneFinalTaxesTotal, '', 0.00);
        $this->assertEquals(7.65, $basketTwoFinalTaxesTotal, '', 0.00);
        $this->assertEquals(6.70, $basketThreeFinalTaxesTotal, '', 0.00);
    }

    public function testGetFinalTotalCosts()
    {
        $basketOneFinalTotalCosts = $this->basketOneFunctions->getFinalTotalCosts();
        $basketTwoFinalTotalCosts = $this->basketTwoFunctions->getFinalTotalCosts();
        $basketThreeFinalTotalCosts = $this->basketThreeFunctions->getFinalTotalCosts();

        $this->assertEquals(29.83, $basketOneFinalTotalCosts, '', 0.00);
        $this->assertEquals(65.15, $basketTwoFinalTotalCosts, '', 0.00);
        $this->assertEquals(74.68, $basketThreeFinalTotalCosts, '', 0.00);
    }

    /**public function testCreateReceipt()
    {
        //TODO Implement test for createReceipt method
        //$this->assertTrue(false);
    }**/

    public function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @param \App\Models\Receipt $receipt
     * @param array               $testInput
     *
     * @return void
     */
    private function generateReceiptTest(\App\Models\Receipt $receipt, array $testInput)
    {

        $this->assertEquals($receipt->id, $testInput['id']);
        $this->assertEquals($receipt->final_product_cost_total, $testInput['final_product_cost_total']);
        $this->assertEquals($receipt->sales_tax_total, $testInput['sales_tax_total']);
        $this->assertEquals($receipt->import_tax_total, $testInput['import_tax_total']);
        $this->assertEquals($receipt->final_taxes_total, $testInput['final_taxes_total']);
        $this->assertEquals($receipt->final_receipt_total, $testInput['final_receipt_total']);
        $this->assertEquals($receipt->receipt_content, $testInput['receipt_content']);
        $this->assertEquals($receipt->basket_id, $testInput['basket_id']);
    }
}
