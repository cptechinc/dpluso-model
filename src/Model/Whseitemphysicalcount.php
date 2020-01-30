<?php

use Base\Whseitemphysicalcount as BaseWhseitemphysicalcount;

use Dpluso\Model\ThrowErrorTrait;
use Dpluso\Model\MagicMethodTraits;

use Propel\Runtime\ActiveQuery\Criteria;

/**
 * Skeleton subclass for representing a row from the 'whseitemphysicalcount' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class Whseitemphysicalcount extends BaseWhseitemphysicalcount {
	use ThrowErrorTrait;
	use MagicMethodTraits;

	public function is_complete() {
		return $this->complete == 'Y';
	}

	public function description() {
		$q = ItemmasterQuery::create();
		$q->select('name1');
		$q->filterByItemid($this->itemid);
		return $q->findOne();
	}

	/**
	 * Returns if Item is serialized
	 *
	 * @param  string $itemID
	 * @return bool           Is the Item Serialized
	 */
	public function is_item_serialized() {
		return $this->type == Itemmaster::ITEMTYPE_SERIALIZED;
	}

	/**
	 * Returns if Item is lotted
	 *
	 * @param  string $itemID
	 * @return bool           Is the Item lotted
	 */
	public function is_item_lotted() {
		return $this->type == Itemmaster::ITEMTYPE_LOTTED;
	}

	/**
	 * Returns if Item is normal
	 *
	 * @param  string $itemID
	 * @return bool            Is the Item normal
	 */
	public function is_item_normal() {
		return $this->type == Itemmaster::ITEMTYPE_NORMAL;
	}

	/**
	 * Returns if the Sales Order is finished
	 * @return bool        Is Order finished?
	 */
	public function has_error() {
		return strpos(strtolower($this->status), 'error:') !== false;
	}

	/**
	 * Returns if the Sales Order is finished
	 * @return bool        Is Order finished?
	 */
	public function get_error() {
		return str_replace('error:', '', strtolower($this->status));
	}

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
