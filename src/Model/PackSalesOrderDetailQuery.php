<?php

use Base\PackSalesOrderDetailQuery as BasePackSalesOrderDetailQuery;

/**
 * Skeleton subclass for performing query and update operations on the 'wmpackdet' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class PackSalesOrderDetailQuery extends BasePackSalesOrderDetailQuery {

	/**
	 * Return Number of rows filtered by the sessionid, Sales Order Number column(s)
	 *
	 * @param  string $sessionID  SessionID
	 * @param  string $ordn       Sales Order Number
	 * @return int                Number of PackSalesOrderDetail rows
	 */
	public function countBySessionidOrder($sessionID, $ordn) {
		$this->clear();
		$this->filterBySessionidOrder($sessionID, $ordn);
		$this->groupBy(array('linenbr', 'lotserial'));
		return $this->count();
	}

	/**
	 * Return PackSalesOrderDetail filtered by the sessionid, Sales Order Number column(s)
	 *
	 * @param  string $sessionID  Session ID
	 * @param  string $ordn       Sales Order Number
	 * @return PackSalesOrderDetail
	 */
	public function findBySessionidOrderGrouped($sessionID, $ordn) {
		$this->clear();
		$this->filterBySessionidOrder($sessionID, $ordn);
		$this->groupBy(array('linenbr', 'lotserial'));
		return $this->find();
	}

	public function get_line_qtytoship($sessionID, $ordn, $linenbr) {
		$this->clear();
		$this->addAsColumn('qty', 'SUM(qty_toship');
		$this->select('qty');
		$this->filterBySessionidOrder($sessionID, $ordn);
		$this->filterByLinenbr($linenbr);
		return $this->findOne();
	}

	/**
	 * Filters Query by Sessionid, Ordernbr columns
	 *
	 * @param string $sessionID Session ID
	 * @param string $ordn      Sales Order Number
	 * @return PackSalesOrderDetailQuery
	 */
	public function filterBySessionidOrder($sessionID, $ordn) {
		$this->filterBySessionid($sessionID);
		$this->filterByOrdernbr($ordn);
		return $this;
	}
}
