<?php

use Base\Whseitemphysicalcount as BaseWhseitemphysicalcount;

use Dpluso\Model\ThrowErrorTrait;
use Dpluso\Model\MagicMethodTraits;

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

	/**
	 * Returns if Item is serialized
	 *
	 * @param  string $itemID
	 * @return bool           Is the Item Serialized
	 */
	public function is_item_serialized($itemID) {
		return $this->type == Itemmaster::ITEMTYPE_SERIALIZED;
	}

	/**
	 * Returns if Item is lotted
	 *
	 * @param  string $itemID
	 * @return bool           Is the Item lotted
	 */
	public function is_item_lotted($itemID) {
		return $this->type == Itemmaster::ITEMTYPE_LOTTED;
	}

	/**
	 * Returns if Item is normal
	 *
	 * @param  string $itemID
	 * @return bool            Is the Item normal
	 */
	public function is_item_normal($itemID) {
		return $this->type == Itemmaster::ITEMTYPE_NORMAL;
	}
}
