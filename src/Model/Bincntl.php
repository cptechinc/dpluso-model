<?php

use Base\Bincntl as BaseBincntl;

use Dpluso\Model\ThrowErrorTrait;
use Dpluso\Model\MagicMethodTraits;

/**
 * Skeleton subclass for representing a row from the 'bincntl' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class Bincntl extends BaseBincntl {
	use ThrowErrorTrait;
	use MagicMethodTraits;

	/**
	 * Aliases for Class Properties
	 * @var array
	 */
	const COLUMN_ALIASES = array(
		'whseid'  => 'warehouse',
		'whseID'  => 'warehouse',
		'from'    => 'binfrom',
		'through' => 'binthru',
		'type'    => 'bintype',
		'area'    => 'binarea',
		'desc'    => 'bindesc',
	);
}
