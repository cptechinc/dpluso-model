<?php

use Base\QuothedQuery as BaseQuothedQuery;

/**
 * Skeleton subclass for performing query and update operations on the 'quothed' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class QuothedQuery extends BaseQuothedQuery {
	/**
	 * Filter the query on the sessionid, Orderno column
	 *
	 * @param  string $sessionID Session ID
	 * @param  string $qnbr      Quote Number
	 * @return $this|QuothedQuery The current query, for fluid interface
	 */
	public function filterBySessionidQuote($sessionID, $qnbr) {
		$this->filterBySessionid($sessionID);
		$this->filterByQuotnbr($qnbr);
		return $this;
	}

	/**
	 * Return the first Ordrhed filtered by the sessionid, orderno column
	 *
	 * @param  string $sessionID Session ID
	 * @param  string $qnbr      Quote Number
	 * @return Quothed
	 */
	public function findOneBySessionidQuote($sessionID, $qnbr) {
		$this->clear();
		$this->filterBySessionidQuote($sessionID, $qnbr);
		return $this->findOne();
	}
}
