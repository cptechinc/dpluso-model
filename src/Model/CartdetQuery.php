<?php

use Base\CartdetQuery as BaseCartdetQuery;

use Dpluso\Model\QueryTraits;

/**
 * Skeleton subclass for performing query and update operations on the 'cartdet' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class CartdetQuery extends BaseCartdetQuery {
	use QueryTraits;

	/**
	 * Filter the query on the sessionid, linenbr column
	 *
	 * @param  string $sessionid The value to use as filter.
	 * @param  int    $linenbr   Line Number
	 *
	 * @return $this|CartdetQuery The current query, for fluid interface
	 */
	public function filterBySessionidLinenbr($sessionID, $linenbr) {
		$this->filterBySessionid($sessionID);
		$this->filterByLinenbr($linenbr);
		return $this;
	}
}
