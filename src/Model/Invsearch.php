<?php

use Base\Invsearch as BaseInvsearch;

use Dpluso\Model\ThrowErrorTrait;
use Dpluso\Model\MagicMethodTraits;

/**
 * Skeleton subclass for representing a row from the 'invsearch' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class Invsearch extends BaseInvsearch {
	use ThrowErrorTrait;
	use MagicMethodTraits;

	/**
	 * Session Identifier
	 * @var string
	 */
	protected $sessionid;

	/**
	 * Item ID / Item Nbr
	 * @var string
	 */
	protected $itemid;

		/**
	 * Cross Reference Item ID / Nbr / Barcode
	 * @var string
	 */
	protected $xitemid;

	/**
	 * Cross Reference Origin
	 * item = Item Master
	 * cust = Customer Item Cross Reference
	 * vend = Vendor Item Cross Reference
	 * seri = Serial Master
	 * lotm = Lot Item Master
	 * upcx = UPC Item Master
	 *
	 * @var string
	 */
	protected $xorigin;

	/**
	 * Item Type
	 * N = Normal
	 * S = Serialized
	 * L = Lotted
	 * P = Price Only
	 * @var string
	 */
	protected $itemtype;

	/**
	 * Lot Number / Serial Number
	 * Item Type   Value
	 * L           Lot Number
	 * S           Serial Number
	 * @var string
	 */
	protected $lotserial;

	/**
	 * Description 1
	 * @var string
	 */
	protected $desc1;

	/**
	 * Description 1
	 * @var string
	 */
	protected $desc2;

	/**
	 * Primary Bin
	 * @var string
	 */
	protected $primebin;

	/**
	 * Current Bin
	 * @var string
	 */
	protected $bin;

	/**
	 * Current Bin Qty
	 * @var int
	 */
	protected $qty;

	/**
	 * Date
	 * @var int
	 */
	protected $date;

	/**
	 * Time
	 * @var int
	 */
	protected $time;


	/**
	 * Aliases for Class Properties
	 * @var array
	 */
	const COLUMN_ALIASES = array(
		'itemID'    => 'itemid',
		'serialnbr' => 'lotserial',
		'lotnbr'    => 'lotserial',
		'binID'     => 'bin'
	);

	/**
	 * Item Type and the property / alias name that represents it
	 * @var array
	 */
	public static $itemtype_properties = array(
		'L' => 'lotnbr',
		'S' => 'serialnbr',
		'N' => 'itemid'
	);

	/**
	 * Array of Item Types and their description
	 *
	 * @var array
	 */
	public static $itemtype_desc = array(
		'L' => 'lot number',
		'S' => 'serial number',
		'N' => 'item id'
	);

	/**
	 * Returns if Item is a serialized item
	 * @return bool
	 */
	public function is_serialized() {
		return $this->itemtype == 'S';
	}

	/**
	 * Returns if Item is a lotted item
	 * @return bool
	 */
	public function is_lotted() {
		return $this->itemtype == 'L';
	}

	/**
	 * Returns if Item is a Normal Inventory item
	 * @return bool
	 */
	public function is_normal() {
		return $this->itemtype == 'N';
	}

	/**
	 * Returns if Item is a Normal Inventory item
	 * @return bool
	 */
	public function is_priceonly() {
		return $this->itemtype == 'P';
	}

	/**
	 * Is the Item Cross Reference Origin from the Item ID
	 * @return bool
	 */
	public function is_xorigin_item() {
		return $this->xorigin == 'item';
	}

	/**
	 * Is the Item Cross Reference Origin from the Lot or Serial Master
	 * @return bool
	 */
	public function is_xorigin_lotserial() {
		return $this->xorigin == 'lotm' || $this->xorigin  == 'seri';
	}

	/**
	 * Is the Item Cross Reference Origin from the Lot Master
	 * @return bool
	 */
	public function is_xorigin_lot() {
		return $this->xorigin == 'lotm';
	}

	/**
	 * Is the Item Cross Reference Origin from Serial Master
	 * @return bool
	 */
	public function is_xorigin_serial() {
		return $this->xorigin == 'seri';
	}

	/**
	 * Returns the property needed to access the item's identifier
	 * based on its item type
	 * e.g. Lot Number / Serial Number / Item ID
	 * @return string
	 */
	public function get_itemtypeproperty() {
		return self::$itemtype_properties[$this->itemtype];
	}

	/**
	 * Returns the description needed for this item based on its itemtype
	 * @return string
	 */
	public function get_itemtypepropertydesc() {
		return self::$itemtype_desc[$this->itemtype];
	}

	/**
	 * Returns item's identifer based on item type
	 * e.g. Lot Number / Serial Number / Item ID
	 * @return string
	 */
	public function get_itemidentifier() {
		if ($this->is_serialized() || $this->is_lotted()) {
			return $this->lotserial;
		} else {
			return $this->itemid;
		}
	}
}
