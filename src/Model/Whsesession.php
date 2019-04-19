<?php

use Base\Whsesession as BaseWhsesession;

use Dplus\Model\ThrowErrorTrait;
use Dplus\Model\MagicMethodTraits;

/**
 * Skeleton subclass for representing a row from the 'whsesession' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class Whsesession extends BaseWhsesession {
	use ThrowErrorTrait;
	use MagicMethodTraits;

	/**
	 * Session Identifier
	 * @var string
	 */
	protected $sessionid;

	/**
	 * Date of Last Update
	 * @var int
	 */
	protected $date;

	/**
	 * Time Session Record Update
	 * @var int
	 */
	protected $time;

	/**
	 * User Login ID
	 * @var string
	 */
	protected $loginid;

	/**
	 * Warehouse ID
	 * @var string
	 */
	protected $whseid;

	/**
	 * Order Number
	 * @var string
	 */
	protected $ordernbr;

	/**
	 * Bin Location
	 * @var string
	 */
	protected $binnbr;

	/**
	 * Pallet Number
	 * @var string
	 */
	protected $palletnbr;

	/**
	 * Carton Number
	 * @var string
	 */
	protected $cartonnbr;

	/**
	 * Status Message
	 * @var string
	 */
	protected $status;

	/**
	 * Current Warehouse Function
	 * @var string
	 */
	protected $function;

	/**
	 * Aliases for Class Properties
	 * @var array
	 */
	protected $fieldaliases = array(
		'sessionID' => 'sessionid',
		'loginID'   => 'loginid',
		'whseID'    => 'whseid',
		'ordn'      => 'ordernbr',
		'bin'       => 'binnbr',
		'pallet'    => 'palletnbr',
		'carton'    => 'cartonnbr'
	);

	/**
	 * Returns if the Whse Session has a bin defined
	 * @return bool Is the bin defined?
	 */
	public function has_bin() {
		return !empty($this->binnbr);
	}

	/**
	 * Returns if the Whse Session has a pallet defined
	 * @return bool Is the pallet defined?
	 */
	public function has_pallet() {
		return !empty($this->palletnbr);
	}

	/**
	 * Returns if the Sales Order is finished
	 * @return bool        Is Order finished?
	 */
	public function is_orderfinished() {
		return strpos(strtolower($this->status), 'end of order') !== false ? true : false;
	}

	/**
	 * Returns if the Sales Order has been Exited
	 * @return bool Is Order exited?
	 */
	public function is_orderexited() {
		return strpos(strtolower($this->status), 'order exited') !== false ? true : false;
	}

	/**
	 * Returns if the Sales Order is on hold
	 * @return bool        Is Order on Hold?
	 */
	public function is_orderonhold() {
		return strpos(strtolower($this->status), 'order on hold') !== false? true : false;
	}

	/**
	 * Returns if the Sales Order has been verified, has been picked
	 * @return bool        Has Order been verified?
	 */
	public function is_orderverified() {
		return strpos(strtolower($this->status), 'order is verified') !== false ? true : false;
	}

	/**
	 * Returns if the Sales Order has been invoiced
	 * @return bool        Has Order been invoiced?
	 */
	public function is_orderinvoiced() {
		return strpos(strtolower($this->status), 'order is invoiced') !== false ? true : false;
	}

	/**
	 * Returns if the Sales Order Number is invalid
	 * @return bool        Has Order been Sales Order Number is invalid
	 */
	public function is_orderinvalid() {
		return strpos(strtolower($this->status), 'bad order nbr') !== false? true : false;
	}

	/**
	 * Returns if user is using wrong function
	 * @return bool Is user using the wrong function?
	 */
	public function is_usingwrongfunction() {
		return strpos(strtolower($this->status), 'wrong function') !== false ? true : false;
	}

	/**
	 * Returns a message about the Status of the Order
	 * @return string Order Status
	 */
	public function generate_statusmessage() {
		$msg = '';

		if ($this->is_orderonhold()) {
			$msg = "Order $this->ordernbr is on hold";
		} elseif ($this->is_orderverified()) {
			$msg = "Order $this->ordernbr has been verified";
		} elseif ($this->is_orderinvoiced()) {
			$msg = "Order $this->ordernbr has been invoiced";
		} elseif ($this->is_orderinvalid()) {
			$msg = "$this->ordernbr is Invalid";
		}
		return $msg;
	}

	/**
	 * Returns if whse session status has the word success
	 * @return bool was the whse function successful?
	 */
	public function had_succeeded() {
		return strpos(strtolower($this->status), 'success') !== false ? true : false;
	}
}
