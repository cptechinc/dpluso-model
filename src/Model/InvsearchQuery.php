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

	public function countDistinctItemid($sessionID, $binID = '') {
		$this->addAsColumn('count', 'COUNT(DISTINCT(itemid))');
		$this->select('count');

		if (!empty($binID)) {
			$this->filterBy('Bin', $binID);
		}
		return $this->findOneBySessionid($sessionID);
	}

	public function findOneBySessionidBin($sessionID, $binID = '') {
		if (!empty($binID)) {
			$this->filterBy('Bin', $binID);
		}
		return $this->findOneBySessionid($sessionID);
	}

	public function findByItemidDistinct($sessionID, $binID = ''){
		if (!empty($binID)) {
			$this->filterBy('Bin', $binID);
		}
		$this->groupBy('Itemid');
		return $this->findBySessionid($sessionID);
	}

	public function countByItemID($sessionID, $itemID, $binID = '') {
		$this->addAsColumn('count', 'COUNT(DISTINCT(xitemid))');
		$this->select('count');
		$this->filterBy('Itemid', $itemID);

		if (!empty($binID)) {
			$this->filterBy('Bin', $binID);
		}
		return $this->findOneBySessionid($sessionID);
	}

	public function findOneByItemid($sessionID, $itemID, $binID = '') {
		$this->filterBy('Itemid', $itemID);

		if (!empty($binID)) {
			$this->filterBy('Bin', $binID);
		}
		return $this->findOneBySessionid($sessionID);
	}

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
