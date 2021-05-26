<?php

use Base\BininfoQuery as BaseBininfoQuery;

/**
 * Skeleton subclass for performing query and update operations on the 'bininfo' table.
 *
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
 */
class BininfoQuery extends BaseBininfoQuery {
	/**
	 * Filter the query on the sessionid, itemid column
	 *
	 * @param  string $sessionid   The value to use as filter.
	 * @param  string $itemID	   The value to use as filter.
	 * @return $this|BininfoQuery  The current query, for fluid interface
	 */
	function filterBySessionItemid($sessionID, $itemID) {
		$item = InvsearchQuery::create()->findOneByItemid($sessionID, $itemID);
		$this->filterBySessionid($sessionID);
		$this->filterByItemid($itemID);

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
	function filterBySessionLotserial($sessionID, $lotserial) {
		$this->filterBySessionid($sessionID);
		$this->filterByLotserial($lotserial);
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
		if (($item->is_lotted() || $item->is_serialized()) && $item->lotserial != '') {
			$this->filterBySessionLotserial($sessionID, $item->lotserial);
		} else {
			$this->filterBySessionItemId($sessionID, $item->itemid);
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
