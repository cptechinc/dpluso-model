<?php

use Base\Whseitemphysicalcount as BaseWhseitemphysicalcount;

use Dpluso\Model\ThrowErrorTrait;
use Dpluso\Model\MagicMethodTraits;

use Propel\Runtime\ActiveQuery\Criteria;

/**
 * Class for representing a row from the 'whseitemphysicalcount' table.
 */
class Whseitemphysicalcount extends BaseWhseitemphysicalcount {
	use ThrowErrorTrait;
	use MagicMethodTraits;

	/**
	 * Return if Transaction was completed
	 *
	 * @return bool
	 */
	public function is_complete() {
		return $this->complete == 'Y';
	}

	/**
	 * Returns if there is an error
	 * @return bool=
	 */
	public function has_error() {
		return strpos(strtolower($this->status), 'error:') !== false;
	}

	/**
	 * Returns Error Message
	 * @return string
	 */
	public function get_error() {
		return str_replace('error:', '', strtolower($this->status));
	}

	/**
	 * Returns if Item is on PO
	 * NOTE: Checks against error message making sure there no message about item not being on po
	 * @return bool
	 */
	public function is_on_po() {
		return !strpos(strtolower($this->get_error()), 'item is not on po') !== false;
	}

	/**
	 * Return Lotserials not found in the PACK bin
	 *
	 * @return Whseitemphysicalcount[]
	 */
	public function get_lotserials() {
		$q = WhseitemphysicalcountQuery::create();
		$q->filterBySessionid($this->sessionid);
		$q->filterScanItemid($this->scan, $this->itemid);
		$q->filterByBin('PACK', Criteria::ALT_NOT_EQUAL);
		return $q->find();
	}

	/**
	 * Return the number of Lotserials not found in the PACK bin
	 *
	 * @return int
	 */
	public function count_lotserials() {
		$q = WhseitemphysicalcountQuery::create();
		$q->filterBySessionid($this->sessionid);
		$q->filterScanItemid($this->scan, $this->itemid);
		$q->filterByBin('PACK', Criteria::ALT_NOT_EQUAL);
		return $q->count();
	}

	/**
	 * Return the total qty found for this itemid and scan
	 *
	 * @return float
	 */
	public function get_total_qty() {
		$q = WhseitemphysicalcountQuery::create();
		$q->withColumn('SUM(qty)', 'total');
		$q->select('total');
		$q->filterBySessionid($this->sessionid);
		$q->filterScanItemid($this->scan, $this->itemid);
		return $q->findOne();
	}
}
