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
	 * Return Whseitempack object by the sessionid, ordernbr, linenbr, recordnumber columns
	 * 
	 * @param  string $sessionID     Session Identifier
	 * @param  string $ordn          Sales Order Number
	 * @param  int    $linenbr       Pick Order Line Number
	 * @param  int    $recordnumber  Record Number
	 * @return Whseitempack[]|ObjectCollection
	 */
	public function findOneBySessionidOrdnLinenbrRecordnumber($sessionID, $ordn, $linenbr, $recordnumber) {
		$this->clear();
		$this->filterByOrdn($ordn);
		$this->filterByLinenbr($linenbr);
		$this->filterByRecordnumber($recordnumber);
		return $this->findOneBySessionid($sessionID);
	}

	/**
	 * Returns if Sales Order Detail Line is being Packed by another Session
	 * 
	 * @param  string $sessionID User SessionID
	 * @param  string $ordn      Sales Order Number
	 * @param  int    $linenbr   Line Number
	 * @return bool              Is Sales Order Detail Line being Packed
	 */
	public function is_orderline_being_packed($sessionID, $ordn, $linenbr = 1) {
		$this->clear();
		$this->addAsColumn('count', 'COUNT(*)');
		$this->select('count');
		$this->filterByOrdn($ordn);
		$this->filterByLinenbr($linenbr);
		//$this->where('whseitempick.sessionid != ?', $sessionID);
		return boolval($this->findOne());
	}

	/**
	 * Returns if Session is packing the order line
	 *
	 * @param  string $sessionID User SessionID
	 * @param  string $ordn      Sales Order Number
	 * @param  int    $linenbr   Line Number
	 * @return bool              Is Sales Order Detail Line being Packed by $sessionID
	 */
	public function is_orderline_being_packed_session($sessionID, $ordn, $linenbr = 1) {
		$this->clear();
		$this->addAsColumn('count', 'COUNT(*)');
		$this->select('count');
		$this->filterByOrdn($ordn);
		$this->filterByLinenbr($linenbr);
		$this->filterBySessionid($sessionID);
		return boolval($this->findOne());
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
	 * @param  int    $linenbr   Sales Order Line Number
	 * @return WhseitempackQuery
	 */
	public function filterBySessionidOrderLinenbr($sessionID, $ordn, $linenbr) {
		$this->filterBySessionidOrder($sessionID, $ordn);
		$this->filterByLinenbr($linenbr);
		return $this;
	}
}
