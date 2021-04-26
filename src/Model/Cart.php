<?php

use Base\Cart as BaseCart;

use Dpluso\Model\ThrowErrorTrait;
use Dpluso\Model\MagicMethodTraits;

/**
 * Class for representing a row from the 'cart' table.
 */
class Cart extends BaseCart {
	use ThrowErrorTrait;
	use MagicMethodTraits;
}
