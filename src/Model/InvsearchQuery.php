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
	 * Returns the Number of Distinct Item IDs found for this session and bin
	 * @uses self::findOneBySessionid()
	 * 
	 * @param  string $sessionID Session ID
	 * @param  string $binID     Warehouse Bin
	 * @return int               Number of Distinct Item Ids
	 */
	public function countDistinctItemid($sessionID, $binID = '') {
		$this->addAsColumn('count', 'COUNT(DISTINCT(itemid))');
		$this->select('count');

		if (!empty($binID)) {
			$this->filterBy('Bin', $binID);
		}
		return $this->findOneBySessionid($sessionID);
	}

	/**
	 * Filter the query on the Itemid column and Return the One
	 * NOTE filters by bin if provided
	 * @uses self::findOneBySessionid()
	 * 
	 * @param  string    $sessionID Session ID
	 * @param  string    $binID     Warehouse Bin
	 * @return Invsearch
	 */
	public function findOneByItemid($sessionID, $binID = '') {
		$this->filterBy('Itemid', $itemID);

		if (!empty($binID)) {
			$this->filterBy('Bin', $binID);
		}
		return $this->findOneBySessionid($sessionID);
	}

	/**
	 * Return the distinct Records
	 * NOTE filters by bin if provided
	 * @uses self::findBySessionid()
	 *
	 * @param  string $sessionID Session ID
	 * @param  string $binID     Warehouse Bin
	 * @return array
	 */
	public function findByItemidDistinct($sessionID, $binID = ''){
		if (!empty($binID)) {
			$this->filterBy('Bin', $binID);
		}
		$this->groupBy('Itemid');
		return $this->findBySessionid($sessionID);
	}

	/**
	 * Return the Number of results found for this Item ID
	 * NOTE filters by bin if provided
	 * @uses self::findOneBySessionid()
	 *
	 * @param  string $sessionID Session ID
	 * @param  string $binID     Warehouse Bin
	 * @return int               Number of Distinct Item IDs 
	 */
	public function countByItemID($sessionID, $itemID, $binID = '') {
		$this->addAsColumn('count', 'COUNT(DISTINCT(xitemid))');
		$this->select('count');
		$this->filterBy('Itemid', $itemID);

		if (!empty($binID)) {
			$this->filterBy('Bin', $binID);
		}
		return $this->findOneBySessionid($sessionID);
	}

	/**
	 * Returns Invsearch record for session
	 * @uses self::findOneBySessionid()
	 *
	 * @param  string $sessionID Session ID
	 * @param  string $binID     Warehouse Bin
	 * @return Invsearch
	 */
	public function findOneBySessionidBin($sessionID, $itemID, $binID = '') {

		if (!empty($binID)) {
			$this->filterBy('Bin', $binID);
		}
		return $this->findOneBySessionid($sessionID);
	}

	/**
	 * Returns Bin Quantity found for the Item
	 *
	 * @param  string    $sessionID Session ID
	 * @param  InvSearch $item
	 * @param  string    $binID     Warehouse Bin
	 * @return int                  Bin Qty
	 */
	public function get_binqty($sessionID, InvSearch $item, $binID) {
		$this->select('Qty');
		$this->where('Invsearch.Sessionid = ?', $sessionID);
		$this->where('Invsearch.Itemid = ?', $item->itemid);

		if ($item->is_lotted() || $item->is_serialized()) {
			$this->where('Invsearch.lotserial = ?', $item->lotserial);
		}
		return $this->findOneByBin($binID);
	}
}
