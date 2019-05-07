<?php

use Base\WhseitempickQuery as BaseWhseitempickQuery;

use Dpluso\Model\ThrowErrorTrait;
use Dpluso\Model\MagicMethodTraits;

/**
 * Skeleton subclass for performing query and update operations on the 'whseitempick' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class WhseitempickQuery extends BaseWhseitempickQuery {
	use ThrowErrorTrait;
	use MagicMethodTraits;

	/**
	 * Returns the sum of the Qty of all the barcodes picked for item filtered
	 * by the sessionid, ordernumber and itemid columns
	 * @param  string $sessionID Session Identifier
	 * @param  string $ordn      Sales Order Number
	 * @param  string $itemID    Item ID
	 * @return int               Picked Item Qty total
	 */
	public function get_pickeditemqtytotal($sessionID, $ordn, $itemID) {
		$this->clear();
		$this->addAsColumn('sum', 'SUM(qty)');
		$this->select('sum');
		$this->filterByOrdn($ordn);
		$this->filterByItemid($itemID);
		return intval($this->findOneBySessionid($sessionID));
	}

	public function get_max_orderitem_recordnumber($sessionID, $ordn, $itemID) {
		$this->clear();
		$this->addAsColumn('max', 'MAX(recordnumber)');
		$this->select('max');
		$this->filterByOrdn($ordn);
		$this->filterByItemid($itemID);
		return $this->findOneBySessionid($sessionID);
	}

	public function get_order_pickeditems($sessionID, $ordn, $itemID) {
		$this->clear();
		$this->filterByOrdn($ordn);
		$this->filterByItemid($itemID);
		return $this->findBySessionid($sessionID);
	}

	public function get_order_pickeditem($sessionID, $ordn, $itemID, $recordnumber)  {
		$this->clear();
		$this->filterByOrdn($ordn);
		$this->filterByItemid($itemID);
		$this->filterByRecordnumber($recordnumber);
		return $this->findOneBySessionid($sessionID);
	}
}
