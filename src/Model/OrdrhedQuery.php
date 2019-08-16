<?php

use Base\OrdrhedQuery as BaseOrdrhedQuery;

/**
 * Skeleton subclass for performing query and update operations on the 'ordrhed' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class OrdrhedQuery extends BaseOrdrhedQuery {
	/**
	 * Filter the query on the sessionid, Orderno column
	 * 
	 * @param  string $sessionID Session ID
	 * @param  string $ordn      Sales Order Number
	 * @return $this|OrdrhedQuery The current query, for fluid interface
	 */
	public function filterBySessionidOrder($sessionID, $ordn) {
		$this->filterBySessionid($sessionID);
		$this->filterByOrderno($ordn);
		return $this;
	}

	/**
	 * Return the first Ordrhed filtered by the sessionid, orderno column
	 * 
	 * @param  string $sessionID Session ID
	 * @param  string $ordn      Sales Order Number
	 * @return Ordrhed
	 */
	public function findOneBySessionidOrder($sessionID, $ordn) {
		$this->clear();
		$this->filterBySessionidOrder($sessionID, $ordn);
		return $this->findOne();
	}
}
