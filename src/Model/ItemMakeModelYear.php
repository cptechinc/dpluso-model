<?php

use Base\ItemMakeModelYear as BaseItemMakeModelYear;

use Dpluso\Model\ThrowErrorTrait;
use Dpluso\Model\MagicMethodTraits;


/**
 * Class for representing a row from the 'item_make_model' table.
 *
 */
class ItemMakeModelYear extends BaseItemMakeModelYear {
	use ThrowErrorTrait;
	use MagicMethodTraits;

	/**
	 * Set From and Through Year
	 * @return void
	 */
	public function fixYears() {
		$this->setFromyear($this->fixYear($this->fromyear));
		$this->setThroughyear($this->fixYear($this->throughyear));
	}

	/**
	 * Return 4-character year 
	 * @param   int $year
	 * @return string
	 */
	private function fixYear($year) {
		if (strlen($year) == 4) {
			return $year;
		}
		if (strlen($year) == 2) {
			$prefix = (intval(date('Y')) + 3) > intval('20'.$year) ? '20' : '19';
			return $prefix.$year;
		}
		return '';
	}
}
