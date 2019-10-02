<?php

use Base\Bookingd as BaseBookingd;

use Dpluso\Model\ThrowErrorTrait;
use Dpluso\Model\MagicMethodTraits;
use Dpluso\Model\CustIndexTraits;

/**
 * Class for representing a row from the 'bookingd' table.
 *
 */
class Bookingd extends BaseBookingd {
	use ThrowErrorTrait;
	use MagicMethodTraits;
	use CustIndexTraits;

	/**
	 * Returns if Qty Columns are not the same value
	 *
	 * @return bool
	 */
	public function qty_changed() {
		return $this->b4qty != $this->afterqty;
	}

	/**
	 * Returns if before qty is less than after qty
	 *
	 * @return bool
	 */
	public function qty_increased() {
		return $this->b4qty < $this->afterqty;
	}

	/**
	 * Returns if before qty is more than after qty
	 *
	 * @return bool
	 */
	public function qty_decreased() {
		return $this->b4qty > $this->afterqty;
	}

	/**
	 * Returns if before price is different than after price
	 *
	 * @return bool
	 */
	public function price_changed() {
		return $this->b4price != $this->afterprice;
	}

	/**
	 * Returns if before price is less than after price
	 *
	 * @return bool
	 */
	public function price_increased() {
		return $this->b4price < $this->afterprice;
	}

	/**
	 * Returns if before price is more than after price
	 *
	 * @return bool
	 */
	public function price_decreased() {
		return $this->b4price > $this->afterprice;
	}

	/**
	 * Returns if before net amount is less than after net amount
	 *
	 * @return bool
	 */
	public function netamount_increased() {
		return $this->netamount > 0;
	}
}
