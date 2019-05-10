<?php

use Base\PickSalesOrderDetailQuery as BasePickSalesOrderDetailQuery;

/**
 * Skeleton subclass for performing query and update operations on the 'wmpickdet' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class PickSalesOrderDetailQuery extends BasePickSalesOrderDetailQuery {
	/**
	 * Return Number of rows filtered by the sessionid, Sales Order Number column(s)
	 *
	 * @param  string $sessionID  SessionID
	 * @param  string $ordn       Sales Order Number
	 * @return int                Number of PickSalesOrderDetail rows
	 */
	public function countBySessionidOrder($sessionID, $ordn) {
		$this->clear();
		$this->filterBySessionid($sessionID);
		$this->filterByOrdernbr($ordn);
		return $this->count();
	}

	/**
	 * Return Number of rows filtered by the sessionid, ordernbr, itemid column(s)
	 *
	 * @param  string $sessionID  SessionID
	 * @param  string $ordn       Sales Order Number
	 * @param  string $itemID     ItemID
	 * @return int                Number of PickSalesOrderDetail rows
	 */
	public function countBySessionidOrderItemid($sessionID, $ordn, $itemID) {
		$this->clear();
		$this->filterBySessionid($sessionID);
		$this->filterByOrdernbr($ordn);
		$this->filterByItemnbr($itemID);
		return $this->count();
	}

	/**
	 * Return PickSalesOrderDetail filtered by the sessionid, Sales Order Number column(s)
	 *
	 * @param  string $sessionID  SessionID
	 * @param  string $ordn       Sales Order Number
	 * @return PickSalesOrderDetail
	 */
	public function findOneBySessionidOrder($sessionID, $ordn) {
		$this->clear();
		$this->filterBySessionid($sessionID);
		return $this->findOneByOrdernbr($ordn);
	}

	/**
	 * Return PickSalesOrderDetail filtered by the sessionid, ordernbr, itemid column(s)
	 *
	 * @param  string $sessionID  SessionID
	 * @param  string $ordn       Sales Order Number
	 * @param  string $itemID     ItemID
	 * @return PickSalesOrderDetail
	 */
	public function findOneBySessionidOrderItemid($sessionID, $ordn, $itemID) {
		$this->clear();
		$this->filterBySessionid($sessionID);
		$this->filterByOrdernbr($ordn);
		return $this->findOneByItemnbr($itemID);
	}

	/**
	 * Return PickSalesOrderDetail filtered by the sessionid, ordernbr, itemid column(s)
	 *
	 * @param  string $sessionID  SessionID
	 * @param  string $ordn       Sales Order Number
	 * @param  string $leinbnr    Line Number
	 * @return PickSalesOrderDetail
	 */
	public function findOneBySessionidOrderLinenbr($sessionID, $ordn, $linenbr) {
		$this->clear();
		$this->filterBySessionid($sessionID);
		$this->filterByOrdernbr($ordn);
		return $this->findOneByLinenbr($linenbr);
	}

	/**
	 * Return PickSalesOrderDetail filtered by the sessionid, ordernbr, itemid column(s)
	 *
	 * @param  string $sessionID  SessionID
	 * @param  string $ordn       Sales Order Number
	 * @param  string $itemID     ItemID
	 * @return PickSalesOrderDetail
	 */
	public function get_orderlinenbr($sessionID, $ordn, $itemID) {
		$this->clear();
		$this->select('Linenbr');
		$this->filterBySessionid($sessionID);
		$this->filterByOrdernbr($ordn);
		$this->filterByItemnbr($itemID);
		return $this->findOne();
	}


	/**
	 * Return PickSalesOrderDetail filtered by the sessionid, Sales Order Number column(s)
	 *
	 * @param  string $sessionID  SessionID
	 * @param  string $ordn       Sales Order Number
	 * @return PickSalesOrderDetail
	 */
	public function findBySessionidOrder($sessionID, $ordn) {
		$this->clear();
		$this->filterBySessionid($sessionID);
		return $this->findByOrdernbr($ordn);
	}
}
