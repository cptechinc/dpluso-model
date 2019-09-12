<?php

use Base\QuotdetQuery as BaseQuotdetQuery;

/**
 * Skeleton subclass for performing query and update operations on the 'quotdet' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class QuotdetQuery extends BaseQuotdetQuery {
	/**
	 * Filter the query on the sessionid, Orderno column
	 *
	 * @param  string $sessionID Session ID
	 * @param  string $qnbr      Quote Number
	 * @return $this|QuothedQuery The current query, for fluid interface
	 */
	public function filterBySessionidQuote($sessionID, $qnbr) {
		$this->filterBySessionid($sessionID);
		$this->filterByQuotenbr($qnbr);
		return $this;
	}
}
