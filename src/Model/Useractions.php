<?php

use Base\Useractions as BaseUseractions;

use Dpluso\Model\ThrowErrorTrait;
use Dpluso\Model\MagicMethodTraits;

/**
 * Skeleton subclass for representing a row from the 'useractions' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class Useractions extends BaseUseractions {
	use ThrowErrorTrait;
	use MagicMethodTraits;

	/**
	 * Action ID, derived from Database
	 * @var int
	 */
	protected $id;

	/**
	 * Date Created
	 * @var string format: Y-m-d
	 */
	protected $datecreated;

	/**
	 * Action Type
	 * @var string task | note | action
	 */
	protected $actiontype;

	/**
	 * Sub Type For Action
	 * @var string Customer Defined
	 */
	protected $actionsubtype;

	/**
	 * Date Task is Due
	 * @var string format: Y-m-d
	 */
	protected $duedate;

	/**
	 * Created By User ID
	 * @var string
	 */
	protected $createdby;

	/**
	 * Action Assigned to User ID
	 * @var string
	 */
	protected $assignedto;

	/**
	 * User ID of who assigned action
	 * @var string
	 */
	protected $assignedby;

	/**
	 * Title of Action
	 * @var string
	 */
	protected $title;

	/**
	 * Description / Notes of Action
	 * @var string
	 */
	protected $textbody;

	/**
	 * Reflection Note for Action
	 * @var string
	 */
	protected $reflectnote;

	/**
	 * Is Completed?
	 * @var string Y | N
	 */
	protected $completed;

	/**
	 * Date Action was completed
	 * @var string format: Y-m-d | (blank)
	 */
	protected $datecompleted;

	/**
	 * Date Action was updated
	 * @var string format: Y-m-d
	 */
	protected $dateupdated;

	/**
	 * Customer ID
	 * @var string
	 */
	protected $customerlink;

	/**
	 * Customer ShiptoID
	 * @var string
	 */
	protected $shiptolink;

	/**
	 * Customer Contact ID
	 * @var string
	 */
	protected $contactlink;

	/**
	 * Sales Order Number
	 * @var string
	 */
	protected $salesorderlink;

	/**
	 * Quote Number
	 * @var string
	 */
	protected $quotelink;

	/**
	 * Vendor ID
	 * @var string
	 */
	protected $vendorlink;

	/**
	 * Vendor Ship From ID
	 * @var string
	 */
	protected $vendorshipfromlink;

	/**
	 * Purchase Order Number
	 * @var string
	 */
	protected $purchaseorderlink;

	/**
	 * Action ID
	 * @var int
	 */
	protected $actionlink;

	/**
	 * ID of Action that this action was rescheduled to
	 * @var int
	 */
	protected $rescheduledlink;

	/**
	 * Default Date Format
	 * @var string
	 */
	const DATEFORMAT = "Y-m-d H:i:s";

	/**
	 * Default Date Display format
	 * @var string
	 */
	const DATEFORMAT_DISPLAY = 'm/d/Y g:i A';

	/**
	 * Value for when status is completed
	 * @var string
	 */
	const STATUS_COMPLETED = 'Y';

	/**
	 * Value for when status is rescheduled
	 * @var string
	 */
	const STATUS_RESCHEDULED = 'R';

	/**
	 * Action Types
	 * @var array
	 */
	CONST TYPES = array(
		'task'    => 'task',
		'action' => 'action',
		'notes'   => 'note'
	);

	/**
	 * Returns if UserAction has something in the ID property
	 * @return bool
	 */
	public function has_id() {
		return !empty($this->id);
	}

	/**
	 * Returns if UserAction is linked to a Customer
	 * @return bool
	 */
	public function has_customerlink() {
		return !empty($this->customerlink);
	}

	/**
	 * Returns if UserAction is linked to a Customer Shipto
	 * @return bool
	 */
	public function has_shiptolink() {
		return !empty($this->shiptolink);
	}

	/**
	 * Returns if UserAction is linked to a Customer Contact
	 * @return bool
	 */
	public function has_contactlink() {
		return !empty($this->contactlink);
	}

	/**
	 * Returns if UserAction is linked to a Sales Order
	 * @return bool
	 */
	public function has_salesorderlink() {
		return !empty($this->salesorderlink);
	}

	/**
	 * Returns if UserAction is linked to a Quote
	 * @return bool
	 */
	public function has_quotelink() {
		return !empty($this->quotelink);
	}

	/**
	 * Returns if UserAction is linked to another UserAction
	 * @return bool
	 */
	public function has_actionlink() {
		return !empty($this->actionlink);
	}

	/**
	 * Returns if UserAction has the completed field 'Y'
	 * @return bool
	 */
	public function is_completed() {
		return $this->completed == self::STATUS_COMPLETED;
	}

	/**
	 * Returns if UserAction has the completed field 'R'
	 * @return bool
	 */
	public function is_rescheduled() {
		return $this->completed == self::STATUS_RESCHEDULED;
	}

	/**
	 * Checks if the UserAction has a due date and if the due date has passed
	 * @return bool
	 */
	public function is_overdue() {
		if ($this->actiontype == 'task') {
			if (!$this->is_completed()) {
				return strtotime($this->duedate) < strtotime("now");
			}
		}
		return false;
	}

}
