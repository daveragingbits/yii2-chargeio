<?php

class ChargeIO_Bank extends ChargeIO_Object implements ChargeIO_PaymentMethod {
	public function __construct($attributes = array(), $connection = null) {
		parent::__construct($attributes, $connection);
		$this->connection = $connection;
		$this->attributes = array_merge($this->attributes, $attributes);
		$this->attributes['type'] = 'bank';
	}
}