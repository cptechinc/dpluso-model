<?php

use Base\WhseitempackQuery as BaseWhseitempackQuery;

/**
 * Skeleton subclass for performing query and update operations on the 'whseitempack' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class WhseitempackQuery extends BaseWhseitempackQuery {

	/**
	 * SAFE
	 * Filter the query by the sessionid, ordernbr, linenbr, recordnumber columns
	 *
	 * @param  string $sessionID     Session Identifier
	 * @param  string $ordn          Sales Order Number
	 * @param  int    $linenbr       Pick Order Line Number
	 * @param  int    $recordnumber  Record Number
	 * @return WhseitempackQuery
	 */
	public function filterBySessionidOrdnLinenbrRecordnumber($sessionID, $ordn, $linenbr, $recordnumber) {
		$this->clear();
		$this->filterByOrdn($ordn);
		$this->filterByLinenumber($linenbr);
		$this->filterByRecordnumber($recordnumber);
		return $this->filterBySessionid($sessionID);
	}

	/**
	 * Return the highest carton number for Session and Order
	 * 
	 * @param  string $sessionID     Session Identifier
	 * @param  string $ordn          Sales Order Number
	 * @return int                   highest carton number for Session and Order
	 */
	public function get_maxcarton($sessionID, $ordn) {
		$this->clear();
		$this->filterBySessionid($sessionID);
		$this->filterByOrdn($ordn);
		$this->addAsColumn('carton', 'MAX(carton)');
		$this->select('carton');
		return $this->findOne();
	}

	/**
	 * Filter the query on the sessionid, ordn columns
	 *
	 * @param  string $sessionID Session ID
	 * @param  string $ordn      Sales Order Number
	 * @return WhseitempackQuery
	 */
	public function filterBySessionidOrder($sessionID, $ordn) {
		$this->filterBySessionid($sessionID);
		$this->filterByOrdn($ordn);
		return $this;
	}

	/**
	 * Filter the query on the sessionid, ordn columns
	 *
	 * @param  string $sessionID Session ID
	 * @param  string $ordn      Sales Order Number
	 * @param string  $linenbr   Line Number
	 * @return WhseitempackQuery
	 */
	public function filterBySessionidOrderLinenbr($sessionID, $ordn, $linenbr) {
		$this->filterBySessionid($sessionID);
		$this->filterByOrdn($ordn);
		$this->filterByLinenumber($linenbr);
		return $this;
	}

	/**
	 * Returns the Max Record Number for the Carton filtered
	 * by the sessionid, ordernumber and itemid columns
	 *
	 * @param  string $sessionID Session Identifier
	 * @param  string $ordn      Sales Order Number
	 * @param  string $carton    Carton Number
	 * @return int               Carton Line Max record number
	 */
	public function get_max_carton_recordnumber($sessionID, $ordn, $carton) {
		$this->clear();
		$this->addAsColumn('max', 'MAX(recordnumber)');
		$this->select('max');
		$this->filterByOrdn($ordn);
		$this->filterByCarton($carton);
		return $this->findOneBySessionid($sessionID);
	}

	/**
	 * Get Qty Packed for Order Line
	 *
	 * @param  string $sessionID Session Identifier
	 * @param  string $ordn      Sales Order Number
	 * @param  string $linenbr   Linenbr
	 * @return int               Order Line Qty Total
	 */
	public function get_orderline_qty($sessionID, $ordn, $linenbr) {
		$this->clear();
		$this->addAsColumn('qty', 'SUM(qty)');
		$this->select('qty');
		$this->filterBySessionidOrderLinenbr($sessionID, $ordn, $linenbr);
		return $this->findOne();
	}
}
