<?php

use Base\BincntlQuery as BaseBincntlQuery;
use Propel\Runtime\ActiveQuery\Criteria;

/**
 * Skeleton subclass for performing query and update operations on the 'bincntl' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class BincntlQuery extends BaseBincntlQuery {

	public function validate_bin($whseID, $binID) {
		$bins_areranged = WarehouseQuery::create()->are_binsranged($whseID);

		if ($bins_areranged) {
			$this->condition('from', 'Bincntl.Binfrom <= ? ', $binID);
			$this->condition('thru', 'Bincntl.Binthru >= ? ', $binID);
			$this->where(array('from', 'thru'), Criteria::LOGICAL_AND);
		} else {
			$this->where('Bincntl.Binfrom = ?', $binID);
		}

		$this->filterByWarehouse($whseID);
		return boolval($this->count());
	}
}
