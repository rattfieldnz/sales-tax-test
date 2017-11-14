<?php

use App\Functions\ProductFunctions;
use App\Models\Product;
use Tests\TestCase;

class ProductFunctionsTest extends TestCase
{

    private $productFunctions;

    public function setUp()
    {
        parent::setUp();
        $this->productFunctions = $this->generateProductFunctions();
    }

    public function testGetDescription()
    {
        $this->assertEquals("book", $this->productFunctions[1]->getDescription());
        $this->assertEquals("music CD", $this->productFunctions[2]->getDescription());
        $this->assertEquals("chocolate bar", $this->productFunctions[3]->getDescription());
        $this->assertEquals("imported box of chocolates", $this->productFunctions[4]->getDescription());
        $this->assertEquals("imported bottle of perfume", $this->productFunctions[5]->getDescription());
        $this->assertEquals("imported bottle of perfume", $this->productFunctions[6]->getDescription());
        $this->assertEquals("bottle of perfume", $this->productFunctions[7]->getDescription());
        $this->assertEquals("packet of headache pills", $this->productFunctions[8]->getDescription());
        $this->assertEquals("box of imported chocolates", $this->productFunctions[9]->getDescription());
    }

    public function testGetSalesTaxPercentage()
    {
        $this->assertEquals(0, $this->productFunctions[1]->getSalesTaxPercentage());
        $this->assertEquals(10, $this->productFunctions[2]->getSalesTaxPercentage());
        $this->assertEquals(0, $this->productFunctions[3]->getSalesTaxPercentage());
        $this->assertEquals(0, $this->productFunctions[4]->getSalesTaxPercentage());
        $this->assertEquals(10, $this->productFunctions[5]->getSalesTaxPercentage());
        $this->assertEquals(10, $this->productFunctions[6]->getSalesTaxPercentage());
        $this->assertEquals(10, $this->productFunctions[7]->getSalesTaxPercentage());
        $this->assertEquals(0, $this->productFunctions[8]->getSalesTaxPercentage());
        $this->assertEquals(0, $this->productFunctions[9]->getSalesTaxPercentage());
    }

    public function testGetImportTaxPercentage()
    {
        $this->assertEquals(0, $this->productFunctions[1]->getImportTaxPercentage());
        $this->assertEquals(0, $this->productFunctions[2]->getImportTaxPercentage());
        $this->assertEquals(0, $this->productFunctions[3]->getImportTaxPercentage());
        $this->assertEquals(5, $this->productFunctions[4]->getImportTaxPercentage());
        $this->assertEquals(5, $this->productFunctions[5]->getImportTaxPercentage());
        $this->assertEquals(5, $this->productFunctions[6]->getImportTaxPercentage());
        $this->assertEquals(0, $this->productFunctions[7]->getImportTaxPercentage());
        $this->assertEquals(0, $this->productFunctions[8]->getImportTaxPercentage());
        $this->assertEquals(5, $this->productFunctions[9]->getImportTaxPercentage());
    }

    public function testGetPrice()
    {
        $this->assertEquals(12.49, $this->productFunctions[1]->getPrice());
        $this->assertEquals(14.99, $this->productFunctions[2]->getPrice());
        $this->assertEquals(0.85, $this->productFunctions[3]->getPrice());
        $this->assertEquals(10.00, $this->productFunctions[4]->getPrice());
        $this->assertEquals(47.50, $this->productFunctions[5]->getPrice());
        $this->assertEquals(27.99, $this->productFunctions[6]->getPrice());
        $this->assertEquals(18.99, $this->productFunctions[7]->getPrice());
        $this->assertEquals(9.75, $this->productFunctions[8]->getPrice());
        $this->assertEquals(11.25, $this->productFunctions[9]->getPrice());
    }

    public function testGetSalesTaxCost()
    {
        $this->assertEquals(0, $this->productFunctions[1]->getSalesTaxCost());
        $this->assertEquals(1.50, $this->productFunctions[2]->getSalesTaxCost());
        $this->assertEquals(0, $this->productFunctions[3]->getSalesTaxCost());
        $this->assertEquals(0, $this->productFunctions[4]->getSalesTaxCost());
        $this->assertEquals(4.75, $this->productFunctions[5]->getSalesTaxCost());
        $this->assertEquals(2.80, $this->productFunctions[6]->getSalesTaxCost());
        $this->assertEquals(1.90, $this->productFunctions[7]->getSalesTaxCost());
        $this->assertEquals(0, $this->productFunctions[8]->getSalesTaxCost());
        $this->assertEquals(0, $this->productFunctions[9]->getSalesTaxCost());
    }

    public function testGetImportTaxCost()
    {
        $this->assertEquals(0, $this->productFunctions[1]->getImportTaxCost());
        $this->assertEquals(0, $this->productFunctions[2]->getImportTaxCost());
        $this->assertEquals(0, $this->productFunctions[3]->getImportTaxCost());
        $this->assertEquals(0.50, $this->productFunctions[4]->getImportTaxCost());
        $this->assertEquals(2.40, $this->productFunctions[5]->getImportTaxCost());
        $this->assertEquals(1.40, $this->productFunctions[6]->getImportTaxCost());
        $this->assertEquals(0, $this->productFunctions[7]->getImportTaxCost());
        $this->assertEquals(0, $this->productFunctions[8]->getImportTaxCost());
        $this->assertEquals(0.60, $this->productFunctions[9]->getImportTaxCost());
    }

    public function testGetSalesTaxPrice()
    {
        $this->assertEquals(12.49, $this->productFunctions[1]->getSalesTaxPrice());
        $this->assertEquals(16.49, $this->productFunctions[2]->getSalesTaxPrice());
        $this->assertEquals(0.85, $this->productFunctions[3]->getSalesTaxPrice());
        $this->assertEquals(10.00, $this->productFunctions[4]->getSalesTaxPrice());
        $this->assertEquals(52.25, $this->productFunctions[5]->getSalesTaxPrice());
        $this->assertEquals(30.79, $this->productFunctions[6]->getSalesTaxPrice());
        $this->assertEquals(20.89, $this->productFunctions[7]->getSalesTaxPrice());
        $this->assertEquals(9.75, $this->productFunctions[8]->getSalesTaxPrice());
        $this->assertEquals(11.25, $this->productFunctions[9]->getSalesTaxPrice());
    }

    public function testGetImportTaxPrice()
    {
        $this->assertEquals(12.49, $this->productFunctions[1]->getImportTaxPrice());
        $this->assertEquals(14.99, $this->productFunctions[2]->getImportTaxPrice());
        $this->assertEquals(0.85, $this->productFunctions[3]->getImportTaxPrice());
        $this->assertEquals(10.50, $this->productFunctions[4]->getImportTaxPrice());
        $this->assertEquals(49.90, $this->productFunctions[5]->getImportTaxPrice());
        $this->assertEquals(29.39, $this->productFunctions[6]->getImportTaxPrice());
        $this->assertEquals(18.99, $this->productFunctions[7]->getImportTaxPrice());
        $this->assertEquals(9.75, $this->productFunctions[8]->getImportTaxPrice());
        $this->assertEquals(11.85, $this->productFunctions[9]->getImportTaxPrice());
    }

    public function testFinalCost()
    {
        $this->assertEquals(12.49, $this->productFunctions[1]->finalCost());
        $this->assertEquals(16.49, $this->productFunctions[2]->finalCost());
        $this->assertEquals(0.85, $this->productFunctions[3]->finalCost());
        $this->assertEquals(10.50, $this->productFunctions[4]->finalCost());
        $this->assertEquals(54.65, $this->productFunctions[5]->finalCost());
        $this->assertEquals(32.19, $this->productFunctions[6]->finalCost());
        $this->assertEquals(20.89, $this->productFunctions[7]->finalCost());
        $this->assertEquals(9.75, $this->productFunctions[8]->finalCost());
        $this->assertEquals(11.85, $this->productFunctions[9]->finalCost());
    }

    public function tearDown()
    {
        parent::tearDown();
    }

    private function generateProductFunctions()
    {

        $productFunctionsArray = [];

        foreach (Product::all() as $p) {
            $productFunctionsArray[$p->id] = new ProductFunctions($p);
        }

        return $productFunctionsArray;
    }
}
