<?php

use Base\Itemmaster as BaseItemmaster;

use Dpluso\Model\ThrowErrorTrait;
use Dpluso\Model\MagicMethodTraits;

/**
 * Skeleton subclass for representing a row from the 'itemmaster' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class Itemmaster extends BaseItemmaster {
	use ThrowErrorTrait;
	use MagicMethodTraits;

	const ITEMTYPE_SERIALIZED = 'S';
	const ITEMTYPE_LOTTED     = 'L';
	const ITEMTYPE_NORMAL     = 'N';
	const ITEMTYPE_PRICEONLY  = 'P';
	
	const ITEMID_NONSTOCK     = 'N';

	/**
	 * Return if the Item ID provided is a NON-STOCK Item ID
	 *
	 * @param  string $itemID
	 * @return bool
	 */
	public static function is_itemid_nonstock($itemID) {
		return $itemID == self::ITEMID_NONSTOCK;
	}
}
