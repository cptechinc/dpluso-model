<?php

use Base\CustindexQuery as BaseCustindexQuery;

/**
 * Class for performing query and update operations on the 'custindex' table.
 *
 */
class CustindexQuery extends BaseCustindexQuery {

	/**
	 * Adds Custom WHERE MATCH filter using the the index
	 *
	 * @param  string $query value to find a match for
	 * @return CustindexQuery
	 */
	public function filterByMatchExpression($query) {
		$columns = 'Custindex.Custid, Custindex.Shiptoid, Custindex.Name, Custindex.Addr1, Custindex.Addr2, Custindex.City, Custindex.State, Custindex.Zip, Custindex.Phone, Custindex.cellphone, Custindex.Contact, Custindex.Email, Custindex.Typecode, Custindex.Faxnbr, Custindex.Title';
		$this->where("MATCH($columns) AGAINST (? IN BOOLEAN MODE)", "*$query*");
		return $this;
	}

	/**
	 * Adds Custom WHERE filter that uses Custperm to subquery
	 *
	 * @param string $loginID User Login ID
	 * @return CustindexQuery
	 */
	public function filterByUserCustperm($loginID) {
		if ($loginID != 'admin') {
			$this->where("(Custindex.custid, Custindex.shiptoid) IN (SELECT custperm.custid, custperm.shiptoid FROM custperm WHERE loginid = ?)", $loginID);
		}
		return $this;
	}
}
