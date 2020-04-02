<?php

use Base\LockRecord as BaseLockRecord;

use Dpluso\Model\ThrowErrorTrait;
use Dpluso\Model\MagicMethodTraits;

/**
 * Class for representing a row from the 'lockrecord' table.
 * KEY: functionid, keyid
 * NOTE: Keyid is case-sensitive
 */
class LockRecord extends BaseLockRecord {
	use ThrowErrorTrait;
	use MagicMethodTraits;

	const DATE_FORMAT = 'Y-m-d H:i:s';

	/**
	 * Aliases for Class Properties
	 * @var array
	 */
	const COLUMN_ALIASES = array(
		'function'  => 'functionid',
		'key'       => 'keyid',
		'date'      => 'lockdate'
	);
}
