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
	const TYPES = array(
		'task'   => 'task',
		'action' => 'action',
		'note'   => 'note'
	);

	const SUBTYPES_DESCRIPTION = array(
		'follow-up'   => 'follow up',
		'followup'    => 'follow up'
	);

	const STATUS_DESCRIPTION = array(
		'Y' => 'completed',
		'R' => 'rescheduled'
	);

	/**
	 * Aliases for Class Properties
	 * @var array
	 */
	const COLUMN_ALIASES = array(
		'custid'           => 'customerlink',
		'custID'           => 'customerlink',
		'shiptoid'         => 'shiptoid',
		'shiptoID'         => 'shiptoID',
		'contact'          => 'contactlink',
		'contactid'        => 'contactlink',
		'contactID'        => 'contactlink',
		'ordn'             => 'salesorderlink',
		'qnbr'             => 'quotelink',
		'ponbr'            => 'purchaseorderlink',
		'vendorid'         => 'vendorlink',
		'vendorID'         => 'vendorlink',
		'shipfromID'       => 'vendorshipfromlink',
		'shipfromid'       => 'vendorshipfromlink',
		'actionid'         => 'actionlink',
		'actionID'         => 'actionlink',
		'date_completed'   => 'datecompleted',
		'date_updated'     => 'dateupdated',
		'date_created'     => 'datecreated',
		'date_due'         => 'duedate',
		'type'             => 'actiontype',
		'subtype'          => 'actionsubtype',
		'assigned_to'      => 'assignedto',
		'assigned_by'      => 'assignedby',
		'notes'            => 'textbody',
		'notes_reflection' => 'reflectnote'
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
	 * Returns if UserAction is linked to a Vendor
	 * @return bool
	 */
	public function has_vendorlink() {
		return !empty($this->vendorlink);
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
				return strtotime($this->duedate->format(self::DATEFORMAT)) < strtotime("now");
			}
		}
		return false;
	}

	/**
	 * Return the Description of the Subtype
	 * @return string Subtype Description
	 */
	public function subtype_description() {
		return array_key_exists($this->actionsubtype, self::SUBTYPES_DESCRIPTION) ? self::SUBTYPES_DESCRIPTION[$this->actionsubtype] : $this->actionsubtype;
	}

	/**
	 * Return the Description of the status
	 * @return string status Description
	 */
	public function status_description() {
		return array_key_exists($this->completed, self::STATUS_DESCRIPTION) ? self::STATUS_DESCRIPTION[$this->completed] : 'incomplete';
	}

	/**
	 * Returns the Customer for Action
	 * @return Customer
	 */
	public function get_customer() {
		return CustomerQuery::create()->findOneByCustid($this->customerlink);
	}

	/**
	 * Returns the Customer Shipto for Action
	 * @return CustomerShipto
	 */
	public function get_shipto() {
		return CustomerShiptoQuery::create()->findOneByCustidShiptoid($this->customerlink, $this->shiptolink);
	}

	/**
	 * Returns the Contact for Action
	 * @return Contact
	 */
	public function get_contact() {
		return ContactQuery::create()->findOneByCustidShiptoidContactid($this->customerlink, $this->shiptolink, $this->contactlink);
	}

	/**
	 * Returns an array of UserActions that are linked by parentage
	 * @return array UserActions
	 */
	public function get_actionlineage() {
		$lineage = array();

		if ($this->has_actionlink()) {
			$parentid = $this->actionlink;

			while ($parentid != '') {
				$parent = UserActionsQuery::create()->findOneById($parentid);
				$lineage[] = $parent;
				$parentid = $parent->actionlink;
			}
		}
		return $lineage;
	}

	/**
	 * Returns a title that is already given to the UserAction or generates one
	 * based on the links and their order of specificity
	 * @return string
	 */
	public function get_title() {
		$desc = '';
		if (!empty($this->title)) {
			return $this->title;
		}
		$desc = $this->has_customerlink() ? 'CustID: '. CustomerQuery::create()->findOneByCustid($this->customerlink)->name : '';
		$desc .=  $this->has_shiptolink() ? ' ShipID: '. CustomerShiptoQuery::create()->findOneByCustidShiptoid($this->customerlink, $this->shiptolink)->name : '';
		$desc .=  $this->has_contactlink() ? ' Contact: '. $this->contactlink : '';
		$desc .=  $this->has_salesorderlink() ? ' Sales Order #' . $this->salesorderlink : '';
		$desc .=  $this->has_quotelink() ? ' Quote #' . $this->quotelink : '';
		$desc .=  $this->has_actionlink() ? ' ActionID: ' . $this->actionlink: '';
		return $desc;
	}
}
