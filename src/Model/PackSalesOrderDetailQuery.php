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

	/**
	 * Return PackSalesOrderDetail filtered by the sessionid, Sales Order Number column(s)
	 *
	 * @param  string $sessionID  Session ID
	 * @param  string $ordn       Sales Order Number
	 * @return PackSalesOrderDetail[]|ObjectCollection
	 */
	public function findBySessionidOrderGroupedUnpacked($sessionID, $ordn) {
		$this->clear();
		$this->filterBySessionidOrder($sessionID, $ordn);
		$this->groupBy(array('itemid', 'lotserial'));
		$this->where('qty_packed < qty_toship');
		return $this->find();
	}

	/**
	 * Return PackSalesOrderDetail filtered by the sessionid, Sales Order Number column(s)
	 *
	 * @param  string $sessionID  Session ID
	 * @param  string $ordn       Sales Order Number
	 * @return PackSalesOrderDetail[]|ObjectCollection
	 */
	public function findBySessionidOrderGroupedPacked($sessionID, $ordn) {
		$this->clear();
		$this->filterBySessionidOrder($sessionID, $ordn);
		$this->groupBy(array('itemid', 'lotserial'));
		$this->where('qty_packed >= qty_toship');
		return $this->find();
	}

	/**
	 * Return PackSalesOrderDetail filtered by the sessionid, Sales Order Number column(s)
	 *
	 * @param  string $sessionID  Session ID
	 * @param  string $ordn       Sales Order Number
	 * @param  int    $linenbr    Line Number
	 * @return PackSalesOrderDetail
	 */
	public function findOneBySessionidOrderLinenbr($sessionID, $ordn, $linenbr) {
		$this->clear();
		$this->filterBySessionidOrder($sessionID, $ordn);
		$this->filterByLinenbr($linenbr);
		return $this->findOne();
	}

	/**
	 * Return total Qty to ship for Line
	 * @param  string $sessionID Session ID
	 * @param  string $ordn      Sales Order Number
	 * @param  int    $linenbr   Line Number
	 * @return int               total Qty to ship
	 */
	public function get_line_qtytoship($sessionID, $ordn, $linenbr) {
		$this->clear();
		$this->addAsColumn('qty', 'SUM(qty_toship)');
		$this->select('qty');
		$this->filterBySessionidOrder($sessionID, $ordn);
		$this->filterByLinenbr($linenbr);
		return $this->findOne();
	}

	/**
	 * Return total Qty packed for Line
	 * @param  string $sessionID Session ID
	 * @param  string $ordn      Sales Order Number
	 * @param  int    $linenbr   Line Number
	 * @return int               total Qty packed
	 */
	public function get_line_qtypacked($sessionID, $ordn, $linenbr) {
		$this->clear();
		$this->addAsColumn('qty', 'SUM(qty_packed)');
		$this->select('qty');
		$this->filterBySessionidOrder($sessionID, $ordn);
		$this->filterByLinenbr($linenbr);
		return $this->findOne();
	}

	/**
	 * Return total Qty remaining for Line
	 * @param  string $sessionID Session ID
	 * @param  string $ordn      Sales Order Number
	 * @param  int    $linenbr   Line Number
	 * @return int               total Qty remaining
	 */
	public function get_line_qtyremaining($sessionID, $ordn, $linenbr) {
		$this->clear();
		$this->addAsColumn('qty', 'SUM(qty_remaining)');
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
