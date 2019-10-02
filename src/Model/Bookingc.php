<?php

use Base\Bookingc as BaseBookingc;

use Dpluso\Model\ThrowErrorTrait;
use Dpluso\Model\MagicMethodTraits;
use Dpluso\Model\CustIndexTraits;


/**
 * Class for representing a row from the 'bookingc' table.
 * 
 */
class Bookingc extends BaseBookingc {
	use ThrowErrorTrait;
	use MagicMethodTraits;
	use CustIndexTraits;
	
}
