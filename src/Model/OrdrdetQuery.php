<?php

use Base\OrdrdetQuery as BaseOrdrdetQuery;

/**
 * Skeleton subclass for performing query and update operations on the 'ordrdet' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class OrdrdetQuery extends BaseOrdrdetQuery {

	/**
	 * Filter the query on the sessionid, Orderno column
	 * @param  string $sessionID Session ID
	 * @param  string $ordn      Sales Order Number
	 * @return $this|OrdrdetQuery The current query, for fluid interface
	 */
	public function filterBySessionidOrder($sessionID, $ordn) {
		$this->filterBySessionid($sessionID);
		$this->filterByOrderno($ordn);
		return $this;
	}

	/**
	 * Filter the query on the sessionid, Orderno column
	 * @param  string $sessionID Session ID
	 * @param  string $ordn      Sales Order Number
	 * @param  int    $linenbr   Line Number
	 * @return $this|OrdrdetQuery The current query, for fluid interface
	 */
	public function filterBySessionidOrderLineNbr($sessionID, $ordn, $linenbr) {
		$this->filterBySessionidOrder($sessionID, $ordn);
		$this->filterByLinenbr($linenbr);
		return $this;
	}

	/**
	 * Return the first Ordrhed filtered by the sessionid, orderno column
	 * @param  string $sessionID Session ID
	 * @param  string $ordn      Sales Order Number
	 * @param  int    $linenbr   Line Number
	 * @return Ordrhed
	 */
	public function findOneBySessionidOrder($sessionID, $ordn, $linenbr) {
		$this->clear();
		$this->filterBySessionidOrderLinenbr($sessionID, $ordn, $linenbr);
		return $this->findOne();
	}
}
