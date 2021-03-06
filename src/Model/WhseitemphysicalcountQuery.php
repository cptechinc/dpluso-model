<?php

use Base\WhseitemphysicalcountQuery as BaseWhseitemphysicalcountQuery;

/**
 * Skeleton subclass for performing query and update operations on the 'whseitemphysicalcount' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class WhseitemphysicalcountQuery extends BaseWhseitemphysicalcountQuery {

	public function filterScanItemid($scan, $itemID) {
		$this->filterByScan($scan);
		$this->filterByItemid($itemID);
		return $this;
	}
}
