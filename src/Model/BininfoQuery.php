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
	/**
	 * Filter the query on the sessionid, itemid column
	 *
	 * @param  string $sessionid   The value to use as filter.
	 * @param  string $itemID	   The value to use as filter.
	 * @return $this|BininfoQuery  The current query, for fluid interface
	 */
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

	/**
	 * Filter the query on the sessionid, lotserial column
	 *
	 * @param  string $sessionid   The value to use as filter.
	 * @param  string $lotserial   The value to use as filter.
	 * @return $this|BininfoQuery  The current query, for fluid interface
	 */
	function filterByLotserial($sessionID, $lotserial) {
		$this->filterBy('Sessionid', $sessionID);
		$this->filterBy('Lotserial', $lotserial);
		return $this;
	}
	
	/**
	 * Filter the query on the sessionid, lotserial or itemID column
	 *
	 * @param  string $sessionid   The value to use as filter.
	 * @param  string $lotserial   The value to use as filter.
	 * @return $this|BininfoQuery  The current query, for fluid interface
	 */
	function filterByItem($sessionID, Invsearch $item) {
		if ($item->is_lotted() || $item->is_serialized()) {
			$this->filterByLotserial($sessionID, $item->lotserial);
		} else {
			$this->filterByItemId($sessionID, $item->itemid);
		}
		return $this;
	}

	/**
	 * Selects Bin & Qty has columns
	 *
	 * @return $this|BininfoQuery  The current query, for fluid interface
	 */
	function select_bin_qty() {
		$this->select(array('bin', 'qty'));
		return $this;
	}
}
