<?php

use Base\BininfoQuery as BaseBininfoQuery;

/**
 * Skeleton subclass for performing query and update operations on the 'bininfo' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class BininfoQuery extends BaseBininfoQuery {

	function filterByItemid($sessionID, $itemID) {
		$item = InvsearchQuery::create()->findOneByItemid($sessionID, $itemID);
		$this->filterBy('Sessionid', $sessionID);
		$this->filterBy('Itemid', $itemID);

		if (!$item->is_lotted()) {
			$this->addAsColumn('qty', 'SUM(qty)');
			$this->groupBy('Bin');
		}
		return $this;
	}

	function filterByLotserial($sessionID, $lotserial) {
		$this->filterBy('Sessionid', $sessionID);
		$this->filterBy('Lotserial', $lotserial);
		return $this;
	}

	function filterByItem($sessionID, Invsearch $item) {
		if ($item->is_lotted() || $item->is_serialized()) {
			$this->filterByLotserial($sessionID, $item->lotserial);
		} else {
			$this->filterByItemId($sessionID, $item->itemid);
		}
		return $this;
	}

	function select_bin_qty() {
		$this->select(array('bin', 'qty'));
		return $this;
	}
}
