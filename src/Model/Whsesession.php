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
	 * Should Prompt Function
	 * @var string Y | N
	 */
	protected $promptfunction;

	/**
	 * Aliases for Class Properties
	 * @var array
	 */
	const COLUMN_ALIASES = array(
		'sessionID' => 'sessionid',
		'loginID'   => 'loginid',
		'whseID'    => 'whseid',
		'ordn'      => 'ordernbr',
		'bin'       => 'binnbr',
		'pallet'    => 'palletnbr',
		'carton'    => 'cartonnbr'
	);

	/**
	 * Value for Prompt Function if it's true
	 * @var string
	 */
	const PROMPTFUNCTION_TRUE  = 'Y';

	/**
	 * Value for Prompt Function if it's false
	 * @var string
	 */
	const PROMPTFUNCTION_FALSE = 'N';

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

	public function is_pickingunguided() {
		return $this->function == 'PICKUNGUIDED';
	}

	public function is_picking() {
		return $this->function == 'PICKING';
	}

	public function is_pickingpacking() {
		return $this->function == 'PACKING';
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
	 * @return bool       Is Sales Order Number invalid?
	 */
	public function is_orderinvalid() {
		return strpos(strtolower($this->status), 'bad order nbr') !== false ? true : false;
	}

	/**
	 * Returns if the Sales Order is not able to be picked due to low inventory
	 * @return bool
	 */
	public function is_ordershortstocked() {
		return strpos(strtolower($this->status), 'no stock on hand ') !== false ? true : false;

	}

	/**
	 * Returns if user is using wrong function
	 * @return bool Is user using the wrong function?
	 */
	public function is_usingwrongfunction() {
		return strpos(strtolower($this->status), 'wrong function') !== false ? true : false;
	}

	/**
	 * Returns if whse session status has the word success
	 * @return bool was the whse function successful?
	 */
	public function had_succeeded() {
		return strpos(strtolower($this->status), 'success') !== false ? true : false;
	}

	/**
	 * Returns if Whsesession needs prompt for function
	 *
	 * @return bool
	 */
	public function needs_functionprompt() {
		return $this->promptfunction == self::PROMPTFUNCTION_TRUE;
	}

	/**
	 * Returns if status has No Order Head Rec
	 * @return bool Is the order not found
	 */
	public function is_ordernotfound() {
		return strpos(strtolower($this->status), 'no order head rec') !== false ? true : false;
	}

	/**
	 * Sets Function Prompt to the value needed for true or false
	 *
	 * @param  bool $prompt
	 * @return void
	 */
	public function set_functionprompt($prompt = true) {
		$promptfunction = $prompt ? self::PROMPTFUNCTION_TRUE : self::PROMPTFUNCTION_FALSE;
		$this->setPromptfunction($promptfunction);
	}

	/**
	 * Returns a message about the Status of the Order
	 * @return string Order Status
	 */
	public function get_statusmessage() {
		$msg = '';

		if ($this->is_orderonhold()) {
			$msg = "Order #$this->ordernbr is on hold";
		} elseif ($this->is_orderverified()) {
			$msg = "Order #$this->ordernbr has been verified";
		} elseif ($this->is_orderinvoiced()) {
			$msg = "Order #$this->ordernbr has been invoiced";
		} elseif ($this->is_orderinvalid()) {
			$msg = "$this->ordernbr is Invalid";
		} elseif ($this->is_ordershortstocked()) {
			$msg = "There is insufficent stock for Order #$this->ordernbr";
		} elseif ($this->is_orderfinished()) {
			$msg = "$this->ordernbr is finished";
		} elseif ($this->is_ordernotfound()) {
			$msg = "Order #$this->ordernbr can't be found";
		} elseif ($this->is_usingwrongfunction()) {
			$msg = "$this->status for Order # $this->ordernbr";
		}

		return $msg;
	}


}
