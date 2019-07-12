<?php

use Base\BarcodesQuery as BaseBarcodesQuery;

/**
 * Skeleton subclass for performing query and update operations on the 'barcodes' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
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

	/**
	 * Return the first Barcodes filtered by the barcodenbr column
	 *
	 * @param  string   $barcode Barcode
	 * @return Barcodes
	 */
	public function findOneByBarcode($barcode) {
		return $this->findOneByBarcodenbr($barcode);
	}

	/**
	 * Return the first Barcodes filtered by the barcodenbr column
	 *
	 * @param  string   $barcode Barcode
	 * @return Barcodes
	 */
	public function filterByBarcode($barcode) {
		return $this->filterByBarcodenbr($barcode);
	}
}
