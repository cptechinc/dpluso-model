<?php

use Base\WhsesessionQuery as BaseWhsesessionQuery;

/**
 * Skeleton subclass for performing query and update operations on the 'whsesession' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class WhsesessionQuery extends BaseWhsesessionQuery {

	/**
	 * Returns if record exists for Session ID
	 * 
	 * @param  string $sessionID User Session ID
	 * @return bool              Does Session ID have a record
	 */
	public function sessionExists($sessionID) {
		return boolval($this->findOneBySessionid($sessionID));
	}
}
