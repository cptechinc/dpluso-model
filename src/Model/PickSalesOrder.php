<?php

use Base\PickSalesOrder as BasePickSalesOrder;

use Dpluso\Model\ThrowErrorTrait;
use Dpluso\Model\MagicMethodTraits;

/**
 * Skeleton subclass for representing a row from the 'wmpickhed' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class PickSalesOrder extends BasePickSalesOrder {
	use ThrowErrorTrait;
	use MagicMethodTraits;

	/**
	 * Aliases for Class Properties
	 * @var array
	 */
	const COLUMN_ALIASES = array(
		'custid'    => 'customerid',
		'custID'    => 'customerid',
		'ordn'      => 'ordernbr'
	);
}
