<?php

use Base\Vmiorder as BaseVmiorder;

use Dpluso\Model\ThrowErrorTrait;
use Dpluso\Model\MagicMethodTraits;

/**
 * Class for representing a row from the 'vmiorder' table.
 */
class Vmiorder extends BaseVmiorder {
	use ThrowErrorTrait;
	use MagicMethodTraits;
}
