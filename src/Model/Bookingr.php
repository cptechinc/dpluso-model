<?php

use Base\Bookingr as BaseBookingr;

use Dpluso\Model\ThrowErrorTrait;
use Dpluso\Model\MagicMethodTraits;
use Dpluso\Model\CustIndexTraits;

/**
 * Class for representing a row from the 'bookingr' table.
 *
 */
class Bookingr extends BaseBookingr {
	use ThrowErrorTrait;
	use MagicMethodTraits;
	use CustIndexTraits;

}
