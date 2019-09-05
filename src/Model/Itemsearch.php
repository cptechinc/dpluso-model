<?php

use Base\Itemsearch as BaseItemsearch;

use Dpluso\Model\ThrowErrorTrait;
use Dpluso\Model\MagicMethodTraits;

/**
 * Skeleton subclass for representing a row from the 'itemsearch' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class Itemsearch extends BaseItemsearch {
	use ThrowErrorTrait;
	use MagicMethodTraits;

	const ORIGINTYPE_CUSTOMER = 'C';
	const ORIGINTYPE_VENDOR   = 'V';
	const ORIGINTYPE_ITEM     = 'I';

	const ITEMSTATUS_ACTIVE   = 'A';
	const ITEMSTATUS_INACTIVE = 'I';

	/**
	 * Returns if Item is Active
	 *
	 * @return bool
	 */
	public function is_active() {
		return $this->itemstatus == self::ITEMSTATUS_ACTIVE;
	}
}
