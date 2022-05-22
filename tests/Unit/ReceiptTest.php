<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Utility\Receipt;

class ReceiptTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_that_true_is_true()
    {
        $this->assertTrue(true);
    }

    
    public function testHello() {
        $receiptClass = new Receipt();
        $receipt = $receiptClass->create();

        $this->assertTrue($receipt == 'hello');
    }

    public function testLineItem() {
        $receiptClass = new Receipt();
       //$film = array("movieType"=> $mo)
        //$receipt = $receiptClass->lineItem($film, $duration);

        $this->assertTrue($receipt == 'hello');
    }
}
