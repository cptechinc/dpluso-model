<?php

use Base\LockRecordQuery as BaseLockRecordQuery;

use Dpluso\Model\QueryTraits;

/**
 * Class for performing query and update operations on the 'lockrecord' table.
 *
 */
class LockRecordQuery extends BaseLockRecordQuery {
	use QueryTraits;
}
