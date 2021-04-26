<?php

use Base\Billing as BaseBilling;

use Dpluso\Model\ThrowErrorTrait;
use Dpluso\Model\MagicMethodTraits;

/**
 * Class for representing a row from the 'billing' table.
 */
class Billing extends BaseBilling {
	use ThrowErrorTrait;
	use MagicMethodTraits;

	private $salt;

	/**
	 * Aliases for Class Properties
	 * @var array
	 */
	const COLUMN_ALIASES = array(
		'billtoname'     => 'bname',
		'billtocompany'  => 'bconame',
		'billtoaddress1' => 'baddress',
		'billtoaddress2' => 'baddress2',
		'billtocity'     => 'bcity',
		'billtostate'    => 'bst',
		'billtozip'      => 'bzip',
		'shiptoname'     => 'sname',
		'shiptocompany'  => 'sconame',
		'shiptoaddress1' => 'saddress',
		'shiptoaddress2' => 'saddress2',
		'shiptocity'     => 'scity',
		'shiptostate'    => 'sst',
		'shiptozip'      => 'szip',
		'ponbr'          => 'pono',
		'shipvia'        => 'shipmeth',
		'notes'          => 'note',
		'shipcomplete'   => 'shipcom',
		'paytype'        => 'paymenttype',
		'cardnumber'     => 'ccno',
		'expiredate'     => 'xpdate',
		'cvc'            => 'vc',
		'message'        => 'ermes',
		'ordernumber'    => 'orders'
	);

	public function shipcomplete() {
		return $this->shipcomplete == 'Y';
	}

	public function has_error() {
		return $this->error == 'Y';
	}

	public function paytype() {
		if (empty($this->paytype) === false) {
			return $this->paytype;
		}
		if ($this->termtype === 'STD') {
			return 'bill';
		}
	}

	public function useCreditCard() {
		return $this->paytype() != 'bill' && $this->paytype() != 'cod';
	}

	public function hasCreditCard() {
		return empty($this->cardnumber()) === false;
	}

	public function cardLast4() {
		return substr($this->cardnumber(), -4);
	}

/* =============================================================
	Decrypt Column Functions
============================================================= */
	/**
	 * Set Salt Value for Encryption
	 * @param   string $salt
	 * @return void
	 */
	public function setSalt($salt) {
		$this->salt = $salt;
	}

	/**
	 * Set Salt Value for Encryption
	 * @param   string $salt
	 * @return void
	 */
	public function getSalt() {
		return $this->salt;
	}


/* =============================================================
	Decrypt Column Functions
============================================================= */
	/**
	 * Return Decrypted Column Value
	 * @param  string $col  Database Column
	 * @return mixed        Value
	 */
	public function decrypt($col) {
		$q = BillingQuery::create();
		$q->selectDecryptedColumn($col, $this->salt);
		$q->filterBySessionid($this->sessionid);
		return $q->findOne();
	}

	/**
	 * Returns Decrypted Card Number
	 * @return string
	 */
	public function cardnumber() {
		return $this->decrypt('ccno');
	}

	/**
	 * Returns Decrypted Card Expiration Date
	 * @return string
	 */
	public function expiredate() {
		return $this->decrypt('xpdate');
	}

	/* =============================================================
	Encrypt Functions
============================================================= */
	/**
	 * Encrypts Card Number in the Database
	 *  @return void
	 */
	public function encryptCardnumber() {
		BillingQuery::create()->encryptColumn('ccno', $this->salt, $this->sessionid);
	}

	/**
	 * Encrypts Expiration Date in the Database
	 * @return void
	 */
	public function encryptExpiredate() {
		BillingQuery::create()->encryptColumn('xpdate', $this->salt, $this->sessionid);
	}

	/**
	 * Encrypts CVV in the Database
	 * @return void
	 */
	public function encryptCvc() {
		BillingQuery::create()->encryptColumn('vc', $this->salt, $this->sessionid);
	}
}
