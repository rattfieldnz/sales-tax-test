<?php

use App\Functions\Number;
use Tests\TestCase;

class NumberTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
    }

    public function testRoundNumber()
    {
        $this->assertEquals(2.00, Number::roundNumber(1.96));
        $this->assertEquals(0.10, Number::roundNumber(0.09));
        $this->assertEquals(27.90, Number::roundNumber(27.86));
        $this->assertEquals(100, Number::roundNumber(99.99));
        $this->assertEquals(23.50, Number::roundNumber(23.4567890123));
        $this->assertEquals(0.05, Number::roundNumber(0.04));
        $this->assertEquals(0.05, Number::roundNumber(0.02));
        $this->assertEquals(0.03, Number::roundNumber(0.02, 3));
        $this->assertEquals(98765.45, Number::roundNumber(98765.43210));
        $this->assertEquals(98765.44, Number::roundNumber(98765.43210, 4));
        $this->assertEquals(98765.43, Number::roundNumber(98765.43210, 3));
    }

    public function testCalculateTax()
    {
        $this->assertEquals(0, Number::calculateTax(12.49, 0));
        $this->assertEquals(4.75, Number::calculateTax(47.50, 10));
        $this->assertEquals(2.40, Number::calculateTax(47.50, 5));
        $this->assertEquals(1.00, Number::calculateTax(100, 1));
        $this->assertEquals(0, Number::calculateTax(0, 0));
        $this->assertEquals(-1.00, Number::calculateTax(-10, 10));
    }

    public function testRoundUpTo5Cents()
    {
        $this->assertEquals(12.50, Number::roundUpTo5Cents(12.49));
        $this->assertEquals(1.25, Number::roundUpTo5Cents(1.23456789));
        $this->assertEquals(0.00, Number::roundUpTo5Cents(0.00));
        $this->assertEquals(0.05, Number::roundUpTo5Cents(0.01));
        $this->assertEquals(99.95, Number::roundUpTo5Cents(99.951));
        $this->assertEquals(100, Number::roundUpTo5Cents(99.96));
    }

    public function testRoundUpToX()
    {
        $this->assertEquals(12.49, Number::roundUpToX(12.49, 0));
        $this->assertEquals(12.491, Number::roundUpToX(12.491, 0.1));
        $this->assertEquals(12.50, Number::roundUpToX(12.49, 5));
        $this->assertEquals(12.49, Number::roundUpToX(12.49, 1));
        $this->assertEquals(0, Number::roundUpToX(0));
    }

    public function tearDown()
    {
        parent::tearDown();
    }
}
