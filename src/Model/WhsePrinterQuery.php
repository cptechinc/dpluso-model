<?php

use Base\WhsePrinterQuery as BaseWhsePrinterQuery;

/**
 * Skeleton subclass for performing query and update operations on the 'prntctrl' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class WhsePrinterQuery extends BaseWhsePrinterQuery {
	/**
	 * Returns the Printer Description
	 * @param  string $whseID    Warehouse ID
	 * @param  string $printerID Printer
	 * @return string            Printer Description
	 */
	public function get_description($whseID, $printerID) {
		$this->clear();
		$this->select('desc');
		$this->filterByWhse($whseID);
		return $this->findOneById($printerID);
	}

	/**
	 * Return WhsePrinter objects filtered by the whse column
	 * 
	 * @param  string $whseID    Warehouse ID
	 * @return WhsePrinter[]|ObjectCollection
	 */
	public function get_printers($whseID) {
		$this->clear();
		return $this->findByWhse($whseID);
	}
}
