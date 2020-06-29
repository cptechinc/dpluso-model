<?php

use Base\Billing as BaseBilling;

use Dpluso\Model\ThrowErrorTrait;
use Dpluso\Model\MagicMethodTraits;

/**
 * Skeleton subclass for representing a row from the 'billing' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class Billing extends BaseBilling {
	use ThrowErrorTrait;
	use MagicMethodTraits;

	public function has_error() {
		return $this->error == 'Y';	
	}
}
