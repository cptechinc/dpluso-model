<?php

use Base\VmiOrder as BaseVmiOrder;

use Dpluso\Model\ThrowErrorTrait;
use Dpluso\Model\MagicMethodTraits;

/**
 * Class for representing a row from the 'vmiorder' table.
 */
class VmiOrder extends BaseVmiOrder {
	use ThrowErrorTrait;
	use MagicMethodTraits;
}
