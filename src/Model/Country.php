<?php

use Base\Country as BaseCountry;

use Dpluso\Model\ThrowErrorTrait;
use Dpluso\Model\MagicMethodTraits;

/**
 * Class for representing a row from the 'country' table.
 */
class Country extends BaseCountry {
	use ThrowErrorTrait;
	use MagicMethodTraits;
}
