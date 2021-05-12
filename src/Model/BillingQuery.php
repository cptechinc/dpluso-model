<?php

use Base\BillingQuery as BaseBillingQuery;
use Dpluso\Model\QueryTraits;

/**
 * Class for performing query and update operations on the 'billing' table.
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

	public function encryptPayment($salt, $sessionID) {
		$sql = "UPDATE billing SET ccno = AES_ENCRYPT(ccno, HEX('$salt')), xpdate = AES_ENCRYPT(xpdate, HEX('$salt')), vc = AES_ENCRYPT(vc, HEX('$salt')) WHERE sessionid = :sessID";
		$params = array(':sessID' => $sessionID);
		$this->execute_query($sql, $params);
	}
}
