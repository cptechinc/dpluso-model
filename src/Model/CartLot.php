<?php

use Base\CartLot as BaseCartLot;

use Dpluso\Model\ThrowErrorTrait;
use Dpluso\Model\MagicMethodTraits;

/**
 * Class for representing a row from the 'cartlots' table.
 */
class CartLot extends BaseCartLot {
	use ThrowErrorTrait;
	use MagicMethodTraits;
}
