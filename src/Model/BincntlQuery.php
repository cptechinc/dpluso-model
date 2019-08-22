<?php

use Base\BincntlQuery as BaseBincntlQuery;
use Propel\Runtime\ActiveQuery\Criteria;

/**
 * Class for performing query and update operations on the 'bincntl' table.
 *
 *
 * NOTE: you can use the findByXXX(), findOneByXXX(), requireOneByXXX(), filterByXXX(), orderByXXX(), and groupByXXX()
 * methods with an alias
 * EXAMPLE: findByCustid()
 *
 * Magic Methods (NOTE these are the ones in use, not necessarily all the available ones)
 * -----------------------------------------------------------------------------------------
 * Filters
 *
 * FindOne
 *
 * Find
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
