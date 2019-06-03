<?php

use Base\QnoteQuery as BaseQnoteQuery;

/**
 * Skeleton subclass for performing query and update operations on the 'qnote' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class QnoteQuery extends BaseQnoteQuery {

	/**
	 * Filters the Query on the Sessionid, Key1, Key2 columns
	 *
	 * @param  string  $sessionID Session ID
	 * @param  string  $ordn      Used for Key1
	 * @param  int     $linenbr   Used for Key2
	 * @return QnoteQuery
	 */
	public function filterBySessionidOrdernbrLinenbr($sessionID, $ordn, $linenbr = 0) {
		$this->filterBySessionid($sessionID);
		$this->filterByRectype(Qnote::TYPE_SALESORDER);
		$this->filterByKey1($ordn);
		$this->filterByKey2($linenbr);
		return $this;
	}

	/**
	 * Filters the Query on the (form{x}) column responsible for show on Pack Ticket
	 *
	 * @return void
	 */
	public function filterByShowSalesOrderPack() {
		$column_pack = ucfirst(Qnote::SHOW_SALESORDER_PACK);
		$function = "filterBy$column_pack";
		$this->$function(Qnote::SHOW_TRUE);
		return $this;
	}
}
