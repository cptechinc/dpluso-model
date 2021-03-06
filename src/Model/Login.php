<?php

use Base\Login as BaseLogin;

use Dpluso\Model\ThrowErrorTrait;
use Dpluso\Model\MagicMethodTraits;

/**
 * Skeleton subclass for representing a row from the 'login' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class Login extends BaseLogin {
	use ThrowErrorTrait;
	use MagicMethodTraits;

	public function is_loggedin() {
		return strtoupper($this->validlogin) == 'Y';
	}

	public function needs_setup_recovery() {
		return strtoupper($this->ermes) == 'FIRST LOGIN';
	}

	public function updated_password() {
		return strtoupper($this->ermes) == 'PASSWORD CHANGED';
	}
}
