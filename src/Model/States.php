<?php

use Base\States as BaseStates;

use Dpluso\Model\ThrowErrorTrait;
use Dpluso\Model\MagicMethodTraits;

/**
 * Class for representing a row from the 'states' table.
 */
class States extends BaseStates {
	use ThrowErrorTrait;
	use MagicMethodTraits;
}
