<?php

use Base\BillingQuery as BaseBillingQuery;
use Dpluso\Model\QueryTraits;

/**
 * Skeleton subclass for performing query and update operations on the 'billing' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class BillingQuery extends BaseBillingQuery {
	use QueryTraits;
	
	public function selectDecryptedColumn($col, $salt) {
		$this->withColumn("cast(aes_decrypt($col, hex('$salt')) as char charset utf8)", 'decrypt');
		$this->select('decrypt');
	}

	public function encryptColumn($col, $salt, $sessionID) {
		$sql = "UPDATE billing SET $col = AES_ENCRYPT($col, HEX('$salt')) WHERE sessionid = :sessID";
		$params = array(':sessID' => $sessionID);
		$this->execute_query($sql, $params);
	}
}
