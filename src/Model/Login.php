<?php

use Base\Login as BaseLogin;

use Dpluso\Model\ThrowErrorTrait;
use Dpluso\Model\MagicMethodTraits;

/**
 * Class for representing a row from the 'login' table.
 */
class Login extends BaseLogin {
	use ThrowErrorTrait;
	use MagicMethodTraits;

	public function is_loggedin() {
		return $this->isLoggedIn();
	}

	public function needs_setup_recovery() {
		return strtoupper($this->ermes) == 'FIRST LOGIN';
	}

	public function updated_password() {
		return strtoupper($this->ermes) == 'PASSWORD CHANGED';
	}

	public function isLoggedIn() {
		return strtoupper($this->validlogin) == 'Y';
	}

	public function invalidPasswordInfo() {
		return strtoupper($this->ermes) == 'INVALID PASSWORD INFO';
	}

	public function invalidCustomer() {
		return strtoupper($this->ermes) == 'INVALID CUST ID';
	}

	public function invalidAccount() {
		if ($this->invalidPasswordInfo() === false && $this->invalidCustomer() === false) {
			return false;
		}
		return empty($this->custid);
	}
}
