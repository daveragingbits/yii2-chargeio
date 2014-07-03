<?php

require_once 'lib/ChargeIO.php';
require(dirname(__FILE__) . '/TestCase.php');

ChargeIO::setCredentials(new ChargeIO_Credentials('m_wKgFeD0hHlaBPSGgaAQAAA', 'akZdI3PuQOWiAX9Vbrnosg000000000000000000000000000000000000000002'));
ChargeIO::setApiUrl('http://local.chargeio.com:8080/v1');
ChargeIO::setDebug(true);
