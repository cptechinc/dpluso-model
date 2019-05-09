<?php

use Base\Whseitempick as BaseWhseitempick;

/**
 * Skeleton subclass for representing a row from the 'whseitempick' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class Whseitempick extends BaseWhseitempick {
	/**
	 * Returns the Qty by multiplying the unit qty of barcode by the number of units (of this barcode)
	 * @return int Qty
	 */
	public function get_barcodeqtytotal() {
		$barcode_qty = BarcodesQuery::create()->get_barcode_qty($this->barcode);
		return $this->qty * $barcode_qty;
	}
}
