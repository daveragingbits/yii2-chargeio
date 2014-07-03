<?php
class TransactionTest extends ChargeIO_TestCase
{
	public function testTransactionLifecycle() {
		// New charge for $10
		$card = $this->newCard();
		$charge = ChargeIO_Charge::create($card, 1000);
		$this->assertNotNull($charge);
		$this->assertEquals('AUTHORIZED', $charge->status);
		
		
		// Refund $1.75
		$refund = $charge->refund(175);
		$this->assertNotNull($refund);
		$this->assertEquals('AUTHORIZED', $refund->status);
		$this->assertEquals(175, $refund->amount);
		
		
		// Void the refund
		$refund->void();
		$this->assertEquals('VOIDED', $refund->status);

		
		// Capture the original charge, but for only $9.10
		$charge->capture(910);
		$this->assertEquals('COMPLETED', $charge->status);
		$this->assertEquals(910, $charge->amount);
	}
}