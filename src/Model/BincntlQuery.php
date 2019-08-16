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

	/**
	 * Returns if bin is a valid bin at the warehouse according to warehouse bin rules
	 * 
	 * @param  string $whseID Warehouse ID
	 * @param  string $binID  Bin ID
	 * @return bool           Is bin valid?
	 */
	public function validate_bin($whseID, $binID) {
		$bins_areranged = WarehouseQuery::create()->are_binsranged($whseID);

		if ($bins_areranged) {
			$this->condition('from', 'Bincntl.Binfrom <= ?', $binID);
			$this->condition('thru', 'Bincntl.Binthru >= ?', $binID);
			$this->where(array('from', 'thru'), Criteria::LOGICAL_AND);
		} else {
			$this->filterbyBinfrom($binID);
		}

		$this->filterByWarehouse($whseID);
		return boolval($this->count());
	}

	/**
	 * Return Bincntl objects filtered by warehouse column
	 * 
	 * @return Bincntl[]|ObjectCollection
	 */
	public function get_warehousebins($whseID) {
		$bins_areranged = WarehouseQuery::create()->are_binsranged($whseID);

		if ($bins_areranged) {
			$this->addAsColumn('start', 'Bincntl.Binfrom');
			$this->addAsColumn('through', 'Bincntl.Binthru');
			$this->select(array('start', 'through'));
		} else {
			$this->select('Binfrom');
		}
		return $this->findByWarehouse($whseID);
	}
}
