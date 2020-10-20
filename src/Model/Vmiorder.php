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

	const FORMAT_DATE = 'Ymd';
	const FORMAT_TIME = 'Hi';

	/**
	 * Return Time
	 * @param  int $digits
	 * @return string
	 */
	public function time($digits = 6) {
		return substr($this->time, 0, $digits);
	}

	/**
	 * Return 4 digit Time prepended by 0 if needed
	 * @return string
	 */
	public function timestr() {
		$time = $this->time(4);
		if (intval(substr($time, 0, 1)) > 2) {
			$minutes = substr($time, 1, 2);
			$hours = substr($time, 0, 1);
			$hours = "0$hours";
		} else {
			$minutes = substr($time, 2);
			$hours = substr($time, 0, 2);
		}
		return $hours.$minutes;
	}
}
