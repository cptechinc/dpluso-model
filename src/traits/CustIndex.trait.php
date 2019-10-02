<?php

namespace Dpluso\Model;
	
use CustindexQuery;

/**
 * Provides methods to get Customer / Customer Shipto information for $this->custid and/or $this->shiptoid
 */
trait CustIndexTraits {
	/**
	 * Returns if Customer Exists by using the CustindexQuery class
	 *
	 * @return bool
	 */
	public function customer_exists() {
		$q = CustindexQuery::create();
		$q->filterByCustid($this->custid);

		$q->filterByShiptoid('');
		return boolval($q->count());
	}

	/**
	 * Returns Customer Name by using the CustindexQuery class
	 *
	 * @return string
	 */
	public function customer_name() {
		$q = CustindexQuery::create();
		$q->filterByCustid($this->custid);

		$q->filterByShiptoid('');

		if ($q->count()) {
			$q->select('name');
			return $q->findOne();
		} else {
			return 'N/A';
		}
	}

	/**
	 * Returns Customer Shipto Name by using the CustindexQuery class
	 *
	 * @return string
	 */
	public function shipto_name() {
		$q = CustindexQuery::create();
		$q->filterByCustid($this->custid);

		$q->filterByShiptoid($this->shiptoid);

		if ($q->count()) {
			$q->select('name');
			return $q->findOne();
		} else {
			return 'N/A';
		}
	}
}