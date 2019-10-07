<?php

use Base\Custperm as BaseCustperm;

use Dpluso\Model\ThrowErrorTrait;
use Dpluso\Model\MagicMethodTraits;

/**
 * Class for representing a row from the 'custperm' table.
 */
class Custperm extends BaseCustperm {
	use ThrowErrorTrait;
	use MagicMethodTraits;

	public function get_name() {
		$q = CustindexQuery::create();
		$q->filterByCustid($this->custid);

		if ($this->shiptoid) {
			$q->filterByShiptoid($this->shiptoid);
		}

		if ($q->count()) {
			$q->select('name');
			return $q->findOne();
		} else {
			return 'N/A';
		}
	}
}
