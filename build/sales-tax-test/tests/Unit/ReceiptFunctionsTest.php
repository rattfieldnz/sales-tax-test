<?php

use App\Functions\ReceiptFunctions;
use App\Models\Receipt;
use Tests\TestCase;

class ReceiptFunctionsTest extends TestCase
{
    private $receiptFunctions;
    public function setUp()
    {
        parent::setUp();
        $this->receiptFunctions = $this->generateReceiptFunctions();
    }

    /**public function testGetBasket()
    {
        //TODO Implement test for getBasket method
        $this->assertTrue(false);
    }**/

    /**public function testGetProducts()
    {
        //TODO Implement test for getProducts method
        $this->assertTrue(false);
    }**/

    public function testGetFinalProductCostTotal()
    {
        $receiptOneProductsTotal = $this->receiptFunctions[1]->getFinalProductCostTotal();
        $receiptTwoProductsTotal = $this->receiptFunctions[2]->getFinalProductCostTotal();
        $receiptThreeProductsTotal = $this->receiptFunctions[3]->getFinalProductCostTotal();

        $this->assertEquals(28.33, $receiptOneProductsTotal);
        $this->assertEquals(57.50, $receiptTwoProductsTotal);
        $this->assertEquals(67.98, $receiptThreeProductsTotal);
    }

    public function testGetSalesTaxTotal()
    {
        $receiptOneSalesTaxTotal = $this->receiptFunctions[1]->getSalesTaxTotal();
        $receiptTwoSalesTaxTotal = $this->receiptFunctions[2]->getSalesTaxTotal();
        $receiptThreeSalesTaxTotal = $this->receiptFunctions[3]->getSalesTaxTotal();

        $this->assertEquals(1.50, $receiptOneSalesTaxTotal);
        $this->assertEquals(4.75, $receiptTwoSalesTaxTotal);
        $this->assertEquals(4.70, $receiptThreeSalesTaxTotal);
    }

    public function testGetImportTaxTotal()
    {
        $receiptOneImportTaxTotal = $this->receiptFunctions[1]->getImportTaxTotal();
        $receiptTwoImportTaxTotal = $this->receiptFunctions[2]->getImportTaxTotal();
        $receiptThreeImportTaxTotal = $this->receiptFunctions[3]->getImportTaxTotal();

        $this->assertEquals(0.00, $receiptOneImportTaxTotal);
        $this->assertEquals(2.90, $receiptTwoImportTaxTotal);
        $this->assertEquals(2.00, $receiptThreeImportTaxTotal);
    }

    public function testGetFinalTaxesTotal()
    {
        $receiptOneFinalTaxesTotal = $this->receiptFunctions[1]->getFinalTaxesTotal();
        $receiptTwoFinalTaxesTotal = $this->receiptFunctions[2]->getFinalTaxesTotal();
        $receiptThreeFinalTaxesTotal = $this->receiptFunctions[3]->getFinalTaxesTotal();

        $this->assertEquals(1.50, $receiptOneFinalTaxesTotal);
        $this->assertEquals(7.65, $receiptTwoFinalTaxesTotal);
        $this->assertEquals(6.70, $receiptThreeFinalTaxesTotal);
    }

    public function testGetFinalReceiptTotal()
    {
        $receiptOneFinalReceiptTotal = $this->receiptFunctions[1]->getFinalReceiptTotal();
        $receiptTwoFinalReceiptTotal = $this->receiptFunctions[2]->getFinalReceiptTotal();
        $receiptThreeFinalReceiptTotal = $this->receiptFunctions[3]->getFinalReceiptTotal();

        $this->assertEquals(29.83, $receiptOneFinalReceiptTotal);
        $this->assertEquals(65.15, $receiptTwoFinalReceiptTotal);
        $this->assertEquals(74.68, $receiptThreeFinalReceiptTotal);
    }

    public function testGetReceiptContent()
    {
        $receiptOneContent = $this->receiptFunctions[1]->getReceiptContent();
        $receiptTwoContent = $this->receiptFunctions[2]->getReceiptContent();
        $receiptThreeContent = $this->receiptFunctions[3]->getReceiptContent();

        $receiptOneExpected = "1 book: 12.49\n1 music CD: 16.49\n1 chocolate bar: 0.85\nSales Taxes: 1.50\nTotal: 29.83";
        $receiptTwoExpected = "1 imported box of chocolates: 10.50\n1 imported bottle of perfume: 54.65\nSales Taxes: 7.65\nTotal: 65.15";
        $receiptThreeExpected = "1 imported bottle of perfume: 32.19\n1 bottle of perfume: 20.89\n1 packet of headache pills: 9.75\n1 box of imported chocolates: 11.85\nSales Taxes: 6.70\nTotal: 74.68";

        $this->assertEquals($receiptOneExpected, $receiptOneContent);
        $this->assertEquals($receiptTwoExpected, $receiptTwoContent);
        $this->assertEquals($receiptThreeExpected, $receiptThreeContent);
    }

    public function tearDown()
    {
        parent::tearDown();
    }

    private function generateReceiptFunctions()
    {

        $receiptFunctionsArray = [];

        foreach (Receipt::all() as $r) {
            $receiptFunctionsArray[$r->id] = new ReceiptFunctions($r);
        }

        return $receiptFunctionsArray;
    }
}
