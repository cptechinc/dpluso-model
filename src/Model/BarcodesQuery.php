<?php

use Base\BarcodesQuery as BaseBarcodesQuery;

/**
 * Class for performing query and update operations on the 'barcodes' table.
 *
 * NOTE: you can use the findByXXX(), findOneByXXX(), requireOneByXXX(), filterByXXX(), orderByXXX(), and groupByXXX()
 * methods with an alias
 * EXAMPLE: findByCustid()
 *
 * Magic Methods (NOTE these are the ones in use, not necessarily all the available ones)
 * -----------------------------------------------------------------------------------------
 * Filters
 * @method     BarcodesQuery filterByBarcode(string $barcode)  Filter the query on the barcodenbr column
 *
 * FindOne
 * @method     Barcodes findOneByBarcode(string $barcode)     Return the first Barcodes object filtered by the barcodenbr column
 *
 * Find
 *
 */
class BarcodesQuery extends BaseBarcodesQuery {

	/**
	 * Returns itemid from the barcodes table filtered by barcodenbr
	 *
	 * @param  string $barcode Barcode
	 * @return string          Item ID
	 */
	public function get_barcode_itemid($barcode) {
		return $this->select('itemid')->findOneByBarcodenbr($barcode);
	}

	/**
	 * Returns unitqty from the barcodes table filtered by barcodenbr
	 *
	 * @param  string $barcode Barcode
	 * @return int          Unit Qty
	 */
	public function get_barcode_qty($barcode) {
		return $this->select('unitqty')->findOneByBarcodenbr($barcode);
	}
}
