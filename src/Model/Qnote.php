<?php

use Base\Qnote as BaseQnote;

use Dpluso\Model\ThrowErrorTrait;
use Dpluso\Model\MagicMethodTraits;

/**
 * Skeleton subclass for representing a row from the 'qnote' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class Qnote extends BaseQnote {
	use ThrowErrorTrait;
	use MagicMethodTraits;

	const SHOW_TRUE = 'Y';

	const TYPE_CART       = 'CART';
	const TYPE_SALESORDER = 'SORD';
	const TYPE_QUOTE      = 'QUOT';

	const SHOW_SALESORDER_PICK            = 'form1';
	const SHOW_SALESORDER_PACK            = 'form2';
	const SHOW_SALESORDER_INVOICE         = 'form3';
	const SHOW_SALESORDER_ACKNOWLEDGEMENT = 'form3';

	const SHOW_QUOTE_QUOTE           = 'form1';
	const SHOW_QUOTE_PICK            = 'form2';
	const SHOW_QUOTE_PACK            = 'form3';
	const SHOW_QUOTE_INVOICE         = 'form4';
	const SHOW_QUOTE_ACKNOWLEDGEMENT = 'form5';

	const SHOW_CART_QUOTE           = 'form1';
	const SHOW_CART_PICK            = 'form2';
	const SHOW_CART_PACK            = 'form3';
	const SHOW_CART_INVOICE         = 'form4';
	const SHOW_CART_ACKNOWLEDGEMENT = 'form5';

	/**
	 * Aliases for Class Properties
	 * @var array
	 */
	const COLUMN_ALIASES = array(
		'sessionID' => 'sessionid',
		'type'      => 'rectype',
		'note'      => 'notefld'
	);
}
