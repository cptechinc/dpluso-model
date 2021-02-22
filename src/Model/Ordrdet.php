<?php

use Base\Ordrdet as BaseOrdrdet;

use Dpluso\Model\ThrowErrorTrait;
use Dpluso\Model\MagicMethodTraits;

/**
 * Class for representing a row from the 'ordrdet' table.
 */
class Ordrdet extends BaseOrdrdet {
	use ThrowErrorTrait;
	use MagicMethodTraits;

	/**
	 * Column Aliases to lookup / get properties
	 * @var array
	 */
	const COLUMN_ALIASES = array(
		'ordernumber'    => 'orderno',
		'ordn'           => 'orderno',
		'nsvendorid'     => 'vendorid',
		'nsvendoritemid' => 'vendoritemid',
		'nsitemgroupid'  => 'nsitemgroup',
	);
}
