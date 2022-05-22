<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Utility\Receipt;

class ReceiptTest extends TestCase
{
    public function testLineItem() {
        $receiptClass = new Receipt();
        $lineItem = $receiptClass->lineItem("matrix", 3, "new");
        $this->assertTrue($lineItem['price'] == 9 &&  $lineItem['points'] == 2);
    }
}
