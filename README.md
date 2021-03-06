yii2-chargeio
============

ChargeIO PHP Client Library

Installation
-----------

This extension is a wrapper for [this](https://github.com/charge-io/chargeio-php).

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Update the repository and require sections of your `composer.json` file:

```
	"repositories": [
		...
		{
			"type": "vcs",
			"url": "https://github.com/daveragingbits/yii2-chargeio"
		}
	],
	"require": {
		...
		"daveragingbits/yii2-chargeio": "@dev"
	},
```

...then run `composer update`.

Finally, include `use \ChargeIO` wherever you need it.

Note: charge amount is in CENTS (integer).

The library's APIs require credentials to access your merchant data on the
ChargeIO servers. You can provide credentials as arguments to the APIs used to
retrieve objects, or you can configure the library with default credentials to
use when necessary. To set the default credentials, substitute your ChargeIO
public key and test or live-mode secret key in a call to setCredentials:

    ChargeIO::setCredentials(new ChargeIO_Credentials('<public_key>', '<secret_key>'));

Once your credentials are set, running a basic credit card charge looks like:

    $card = new ChargeIO_Card(array('number' => '4242424242424242', 'exp_month' => 10, 'exp_year' => '2016'));
    $charge = ChargeIO_Charge::create($card, 1200);
    
Using the ChargeIO.js library for payment tokenization support on your payment page
simplifies the process even more. Just configure the token callback on your page to
POST the token ID you receive to your PHP script and then perform the charge:

    $amount = $_POST['amount'];
    $token_id = $_POST['token_id'];
    $charge = ChargeIO_Charge::create(new ChargeIO_PaymentMethodReference(array('id' => $token_id)), $amount);
    
Documentation
-----------

The latest ChargeIO API documentation is available at https://chargeio.com/developers.
