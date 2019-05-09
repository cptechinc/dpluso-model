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
	 * Return PickSalesOrderDetail filtered by the sessionid, Sales Order Number column(s)
	 *
	 * @param  string $sessionID  SessionID
	 * @param  string $ordn       Sales Order Number
	 * @return PickSalesOrderDetail
	 */
	public function findOneBySessionidOrder($sessionID, $ordn) {
		$this->clear();
		$this->filterBySessionid($sessionID);
		$this->filterByOrdernbr($ordn);
		return $this->findOneByOrdernbr($ordn);
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
		$this->filterByOrdernbr($ordn);
		return $this->findByOrdernbr($ordn);
	}
}
