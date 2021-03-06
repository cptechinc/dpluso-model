<?php

use Base\LogpermQuery as BaseLogpermQuery;

/**
 * Skeleton subclass for performing query and update operations on the 'logperm' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class LogpermQuery extends BaseLogpermQuery {
	const VALID_LOGIN = 'Y';

	/**
	 * Returns if user is logged in by checking if logm record has a Y in the validlogin field. 
	 *
	 * @param  string $sessionID  User SessionID
	 * @return bool               Is User Logged in
	 */
	public function is_loggedin($sessionID) {
		$isloggedin = $this->select(array('validlogin'))->findOneBySessionid($sessionID);
		return (strtoupper($isloggedin) == self::VALID_LOGIN);
	}
}
