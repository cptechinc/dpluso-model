<?php

use Base\ItemMakeModelYear as BaseItemMakeModelYear;

use Dpluso\Model\ThrowErrorTrait;
use Dpluso\Model\MagicMethodTraits;


/**
 * Class for representing a row from the 'item_make_model' table.
 *
 */
class ItemMakeModelYear extends BaseItemMakeModelYear {
	use ThrowErrorTrait;
	use MagicMethodTraits;
}
