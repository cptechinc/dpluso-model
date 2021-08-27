<?php

use Base\Custindex as BaseCustindex;

use Dpluso\Model\ThrowErrorTrait;
use Dpluso\Model\MagicMethodTraits;

/**
 * Class for representing a row from the 'custindex' table.
 */
class Custindex extends BaseCustindex {
	use ThrowErrorTrait;
	use MagicMethodTraits;
}
