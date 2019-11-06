<?php

use Base\InvsearchQuery as BaseInvsearchQuery;
use Map\InvsearchTableMap;

/**
 * Skeleton subclass for performing query and update operations on the 'invsearch' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class InvsearchQuery extends BaseInvsearchQuery {

	/**
	 * Returns Number of Invsearch records filtered by sessionid, (& binid if neeeded)
	 *
	 * @param  string $sessionID  Session ID
	 * @param  string $binID      Bin ID (optional)
	 * @return int                Number of Invsearch records for sessionid, itemid
	 */
	public function countDistinctItemid($sessionID, $binID = '') {
		$this->clear();
		$this->addAsColumn('count', 'COUNT(DISTINCT(itemid))');
		$this->select('count');

		if (!empty($binID)) {
			$this->filterBy('Bin', $binID);
		}
		return $this->findOneBySessionid($sessionID);
	}

	/**
	 * Return Invsearch objects filtered by the sessionid (& binid if needed) column(s)
	 *
	 * @param  string $sessionID Session ID
	 * @param  string $binID     Bin ID (optional)
	 * @return Invsearch[]|ObjectCollection
	 */
	public function findDistinctItems($sessionID, $binID = '') {
		$this->clear();
		if (!empty($binID)) {
			$this->filterBy('Bin', $binID);
		}
		$this->groupBy('Itemid');
		return $this->findBySessionid($sessionID);
	}

	/**
	 * Return Invsearch object filtered by the sessionid (& binid if needed) column(s)
	 *
	 * @param  string    $sessionID Session ID
	 * @param  string    $binID     Bin ID (optional)
	 * @return Invsearch
	 */
	public function findOneBySessionidBin($sessionID, $binID = '') {
		$this->clear();
		if (!empty($binID)) {
			$this->filterBy('Bin', $binID);
		}
		return $this->findOneBySessionid($sessionID);
	}

	/**
	 * Returns Number of Invsearch records filtered by sessionid, itemid (& binid if neeeded)
	 *
	 * @param  string $sessionID  Session ID
	 * @param  string $itemID     Item ID
	 * @param  string $binID      Bin ID (optional)
	 * @return int                Number of Invsearch records for sessionid, itemid
	 */
	public function countByItemid($sessionID, $itemID, $binID = '') {
		$this->clear();
		$this->filterBy('Itemid', $itemID);

		if (!empty($binID)) {
			$this->filterBy('Bin', $binID);
		}
		return $this->filterBySessionid($sessionID)->count();
	}

	/**
	 * Return Invsearch object filtered by the sessionid, itemid (& binid if needed) column(s)
	 *
	 * @param  string $sessionID Session ID
	 * @param  string $itemID    Item ID
	 * @param  string $binID     Bin ID (optional)
	 * @return Invsearch
	 */
	public function findOneByItemid($sessionID, $itemID, $binID = '') {
		$this->clear();
		$this->filterBy('Itemid', $itemID);

		if (!empty($binID)) {
			$this->filterBy('Bin', $binID);
		}
		return $this->findOneBySessionid($sessionID);
	}

	/**
	 * Return Invsearch object filtered by the sessionid, itemid (& binid if needed) column(s)
	 *
	 * @param  string $sessionID Session ID
	 * @param  string $itemID    Item ID
	 * @param  string $binID     Bin ID (optional)
	 * @return Invsearch
	 */
	public function findByItemid($sessionID, $itemID, $binID = '') {
		$this->clear();
		$this->filterBy('Itemid', $itemID);

		if (!empty($binID)) {
			$this->filterBy('Bin', $binID);
		}
		return $this->findBySessionid($sessionID);
	}

	/**
	 * Returns Number of Invsearch records filtered by sessionid, lotserial (& binid if neeeded)
	 *
	 * @param  string $sessionID  Session ID
	 * @param  string $lotserial  Lot / Serial Number
	 * @param  string $binID      Bin ID (optional)
	 * @return int                Number of Invsearch records for sessionid, itemid
	 */
	public function countByLotserial($sessionID, $lotserial, $binID = '') {
		$this->clear();
		$this->filterBy('Lotserial', $lotserial);

		if (!empty($binID)) {
			$this->filterBy('Bin', $binID);
		}
		return $this->filterBySessionid($sessionID)->count();
	}

	/**
	 * Return Invsearch object filtered by the sessionid, lotserial (& binid if needed) column(s)
	 *
	 * @param  string $sessionID Session ID
	 * @param  string $lotserial Lot / Serial Number
	 * @param  string $binID     Bin ID (optional)
	 * @return Invsearch
	 */
	public function get_lotserial($sessionID, $lotserial, $binID = '') {
		$this->clear();
		$this->filterBy('Lotserial', $lotserial);

		if (!empty($binID)) {
			$this->filterBy('Bin', $binID);
		}
		return $this->findOneBySessionid($sessionID);
	}

	/**
	 * Returns Total Bin Qty for Item by (itemid or lotserial)
	 *
	 * @param  string    $sessionID Session ID
	 * @param  InvSearch $item      Item to filter from
	 * @param  string    $binID     Bin ID
	 * @return int                  Item bin qty
	 */
	public function get_binqty($sessionID, InvSearch $item, $binID) {
		$this->clear();
		$this->select('Qty');
		$this->filterBySessionid($sessionID);
		$this->filterByItemid($item->itemid);

		if ($item->is_lotted() || $item->is_serialized()) {
			$this->filterByLotserial($item->lotserial);
		}
		return intval($this->findOneByBin($binID));
	}

	/**
	 * Returns the Number of Bins for this Item
	 *
	 * @param string    $sessionID  Session Id
	 * @param InvSearch $item
	 * @return int                  Number of Bins for this Item
	 */
	public function count_itembins($sessionID, InvSearch $item) {
		$this->clear();
		$this->addAsColumn('bincount', 'COUNT(DISTINCT(bin))');
		$this->select('bincount');
		$this->filterByQty(array('min' => 0));
		$this->filterByItemid($item->itemid);

		if ($item->is_lotted() || $item->is_serialized()) {
			$this->filterByLotserial($item->lotserial);
		}

		return intval($this->findOneBySessionid($sessionID));
	}

	/**
	 * Returns the number of bins the Item ID is in
	 *
	 * @param  string $sessionID Session ID
	 * @param  string $itemID    Item ID
	 * @return int
	 */
	public function count_itembins_itemid($sessionID, $itemID) {
		$this->clear();
		$this->addAsColumn('bincount', 'COUNT(DISTINCT(bin))');
		$this->select('bincount');
		$this->filterByQty(array('min' => 0));
		$this->filterBySessionid($sessionID);
		$this->filterByItemid($itemID);
		return intval($this->findOne());
	}

	/**
	 * Return the first Invsearch filtered by the sessionid, itemid columns
	 *
	 * @param string $sessionID Session ID
	 * @param string $itemID    Item ID
	 * @return Invsearch
	 */
	public function findOneBinBySessionidItemid($sessionID, $itemID) {
		$this->clear();
		$this->select('bin');
		$this->filterByQty(array('min' => 0));
		$this->filterBySessionid($sessionID);
		$this->filterByItemid($itemID);
		return $this->findOne();
	}

	/**
	 * Returns the number of bins the Lot Serial is in
	 *
	 * @param  string $sessionID Session ID
	 * @param  string $itemID    Item ID
	 * @param  string $lotserial Lot / Serial number
	 * @return int
	 */
	public function count_itembins_lotserial($sessionID, $itemID, $lotserial) {
		$this->clear();
		$this->addAsColumn('bincount', 'COUNT(DISTINCT(bin))');
		$this->select('bincount');
		$this->filterBySessionid($sessionID);
		$this->filterByItemid($itemID);
		$this->filterByLotserial($lotserial);
		return intval($this->findOne());
	}

	/**
	 * Return the Sum of Qty for filtered by sessionid, itemid (& bin)
	 *
	 * @param  string $sessionID Session ID
	 * @param  string $itemID    Item ID
	 * @param  string $binID     Bin ID (optional)
	 * @return int               Total Item Qty
	 */
	public function get_qty_itemid($sessionID, $itemID, $binID = '') {
		$this->clear();
		$this->addAsColumn('qty', 'SUM(qty)');
		$this->select('qty');
		$this->filterBySessionid($sessionID);
		$this->filterByItemid($itemID);

		if (!empty($binID)) {
			$this->filterByBin($binID);
		}
		return $this->findOne();
	}

	/**
	 * Return Invsearch objects filtered by the sessionid, itemid (& binid if needed) column(s)
	 *
	 * @param  string $sessionID Session ID
	 * @param  string $itemID    Item ID
	 * @param  string $binID     Bin ID (optional)
	 * @return Invsearch[]|ObjectCollection
	 */
	public function get_lotserials_itemid($sessionID, $itemID, $binID = '', $orderby = '') {
		$this->clear();
		$this->filterByItemid($itemID);

		if (!empty($binID)) {
			$this->filterByBin($binID);
		}

		if (!empty($orderby)) {
			$this->orderBy($orderby);
		}
		return $this->findBySessionid($sessionID);
	}

	/**
	 * Return Invsearch objects filtered by the sessionid, itemid (& binid if needed) column(s)
	 *
	 * @param  string $sessionID Session ID
	 * @param  string $itemID    Item ID
	 * @param  string $binID     Bin ID (optional)
	 * @return Invsearch[]|ObjectCollection
	 */
	public function count_lotserials_itemid($sessionID, $itemID, $binID = '') {
		$this->clear();
		$this->addAsColumn('lotcount', 'COUNT(DISTINCT(lotserial))');
		$this->select('lotcount');
		$this->filterByItemid($itemID);
		if (!empty($binID)) {
			$this->filterByBin($binID);
		}

		return $this->filterBySessionid($sessionID)->findOne();
	}

	public function get_bins_itemid($sessionID, $itemID) {
		$this->clear();
		$this->filterByItemid($itemID);
		$this->groupBy('Bin');
		return $this->findBySessionid($sessionID);
	}
}
