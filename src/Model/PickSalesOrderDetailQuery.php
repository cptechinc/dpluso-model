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
		$this->filterBySessionidOrder($sessionID, $ordn);
		$this->filterByItemnbr($itemID);
		return $this->findOne();
	}

	/**
	 * Return PickSalesOrderDetail filtered by the sessionid, ordernbr, itemid column(s)
	 *
	 * @param  string $sessionID  SessionID
	 * @param  string $ordn       Sales Order Number
	 * @param  string $itemID     ItemID
	 * @return PickSalesOrderDetail
	 */
	public function get_ordersublinenbr($sessionID, $ordn, $itemID) {
		$this->clear();
		$this->select('Sublinenbr');
		$this->filterBySessionidOrder($sessionID, $ordn);
		$this->filterByItemnbr($itemID);
		return $this->findOne();
	}

	/**
	 * Filters Query by Sessionid, Ordernbr columns
	 *
	 * @param string $sessionID Session ID
	 * @param string $ordn      Sales Order Number
	 * @return PickSalesOrderDetailQuery
	 */
	public function filterBySessionidOrder($sessionID, $ordn) {
		$this->filterBySessionid($sessionID);
		$this->filterByOrdernbr($ordn);
		return $this;
	}

	/**
	 * Filters Query by Sessionid, Ordernbr columns
	 *
	 * @param string $itemID Item ID
	 * @return PickSalesOrderDetailQuery
	 */
	public function filterByItemid($itemID) {
		$this->filterByItemnbr($itemID);
		return $this;
	}

	/**
	 * Filter the query on the linenbr, sublinenbr columns
	 *
	 * @param  int    $linenbr    Sales Order Line Number
	 * @param  int    $sublinenbr Sales Order SubLine Number
	 * @return PickSalesOrderDetailQuery
	 */
	public function filterByLinenbrSublinenbr($linenbr = 1, $sublinenbr = 0) {
		$this->filterByLinenbr($linenbr);
		$this->filterBySublinenbr($sublinenbr);
		return $this;
	}

	/**
	 * Return PickSalesOrderDetail objects filtered by the sessionid, ordernumber, (qtyremaining = 0) column
	 *
	 * @param string $sessionID Session ID
	 * @param string $ordn      Sales Order Number
	 * @return PickSalesOrderDetail[]|ObjectCollection
	 */
	public function get_order_lines_picked($sessionID, $ordn) {
		$this->clear();
		$this->filterBySessionidOrder($sessionID, $ordn);
		$this->filterByQtyremaining(0);
		return $this->find();
	}

	/**
	 * Return PickSalesOrderDetail objects filtered by the sessionid, ordernumber, linenbr, (qtyremaining = 0) column
	 *
	 * @param string $sessionID Session ID
	 * @param string $ordn      Sales Order Number
	 * @param int    $linenbr   Line Number
	 * @return PickSalesOrderDetail[]|ObjectCollection
	 */
	public function get_order_sublines_picked($sessionID, $ordn, $linenbr = 1) {
		$this->clear();
		$this->filterBySessionidOrder($sessionID, $ordn);
		$this->filterByQtyremaining(0);
		$this->filterByLinenbr($linenbr);
		return $this->find();
	}

	/**
	 * Return PickSalesOrderDetail objects filtered by the sessionid, ordernumber, (qtyremaining >= 1) column
	 *
	 * @param string $sessionID Session ID
	 * @param string $ordn      Sales Order Number
	 * @return PickSalesOrderDetail[]|ObjectCollection
	 */
	public function get_order_lines_unpicked($sessionID, $ordn) {
		$this->clear();
		$this->filterBySessionidOrder($sessionID, $ordn);
		$this->filterByQtyremaining(array('min' => 1));
		return $this->find();
	}

	/**
	 * Return PickSalesOrderDetail objects filtered by the sessionid, ordernumber, (qtyremaining >= 1) column
	 *
	 * @param string $sessionID Session ID
	 * @param string $ordn      Sales Order Number
	 * @param int    $linenbr   Line Number
	 * @return PickSalesOrderDetail[]|ObjectCollection
	 */
	public function get_order_sublines_unpicked($sessionID, $ordn, $linenbr = 1) {
		$this->clear();
		$this->filterBySessionidOrder($sessionID, $ordn);
		$this->filterByLinenbr($linenbr);
		$this->filterByQtyremaining(array('min' => 1));
		return $this->find();
	}
}
