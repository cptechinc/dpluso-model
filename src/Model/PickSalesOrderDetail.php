<?php

use Base\PickSalesOrderDetail as BasePickSalesOrderDetail;

use Dpluso\Model\ThrowErrorTrait;
use Dpluso\Model\MagicMethodTraits;

/**
 * Skeleton subclass for representing a row from the 'wmpickdet' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class PickSalesOrderDetail extends BasePickSalesOrderDetail {
	use ThrowErrorTrait;
	use MagicMethodTraits;

	/**
	 * Session Identifier
	 * @var string
	 */
	protected $sessionid;

	/**
	 * Record Number
	 * @var int
	 */
	protected $recno;

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
	 * Sales Order Number
	 * @var string
	 */
	protected $ordernbr;

	/**
	 * Line Number
	 * @var int
	 */
	protected $linenbr;

	/**
	 * Item ID
	 * @var string
	 */
	protected $itemnbr;

	/**
	 * Item Description 1
	 * @var string
	 */
	protected $itemdesc1;

	/**
	 * Item Description 2
	 * @var string
	 */
	protected $itemdesc2;

	/**
	 * Order Qty
	 * @var int
	 */
	protected $qtyordered;

	/**
	 * Qty Pulled
	 * @var int
	 */
	protected $qtypulled;

	/**
	 * Qty Remaining
	 * @var int
	 */
	protected $qtyremaining;

	/**
	 * Bin ID / Location
	 * @var string
	 */
	protected $binnbr;

	/**
	 * Bin Qty
	 * @var int
	 */
	protected $binqty;


	/**
	 * Qty in Case
	 * @var int
	 */
	protected $caseqty;

	/**
	 * Qty in an inner pack
	 * @var int
	 */
	protected $innerpack;

	/**
	 * Over Bin 1 ID / Location
	 * @var string
	 */
	protected $overbin1;

	/**
	 * Over Bin 1 Qty
	 * @var int
	 */
	protected $overbinqty1;

	/**
	 * Over Bin 2 ID / Location
	 * @var string
	 */
	protected $overbin2;

	/**
	 * Over Bin 2 Qty
	 * @var int
	 */
	protected $overbinqty2;

	/**
	 * Status Message from Dplus
	 * @var string
	 */
	protected $statusmsg;

	/**
	 * Aliases for Class Properties
	 * @var array
	 */
	const COLUMN_ALIASES = array(
		'sessionID' => 'sessionid',
		'ordn'      => 'ordernbr',
		'bin'       => 'binnbr',
		'itemid'    => 'itemnbr',
		'itemID'    => 'itemnbr',
		'desc1'     => 'itemdesc1',
		'desc2'     => 'itemdesc2',
	);

	/**
	 * Creates an array for JS config for the item
	 *
	 * @return array
	 */
	public function get_jsconfigarray() {
		return array(
			'itemid' => $this->itemnbr,
			'qty' => [
				'expected'     => intval($this->binqty),
				'ordered'      => intval($this->qtyordered),
				'picked'       => intval($this->get_userpickedtotal()),
				'pulled'       => intval($this->qtypulled),
				'total_picked' => intval($this->get_orderpickedtotal()),
				'remaining'    => intval($this->get_qtyremaining())
			]
		);
	}

	/**
	 * Returns the Total Picked Qty for this item
	 * @return int User Picked Qty
	 */
	public function get_userpickedtotal() {
		return WhseitempickQuery::create()->get_pickeditemqtytotal($this->sessionid, $this->ordernbr, $this->itemnbr);
	}

	/**
	 * Returns the Item's total Picked Qty for each Pallet
	 * @return array   ex. array(array('qty' => 2, 'palletnbr' => 1))
	 */
	public function get_userpickedtotalsbypallet() {
		return WhseitempickQuery::create()->get_pickeditemqtytotalbypallet($this->sessionid, $this->ordernbr, $this->itemnbr);
	}

	/**
	 * Returns the Picked Qty + already pulled qty for the Order, not just user
	 * // NOTE this Total is total picked for the order, not just what the user has picked
	 * @return int Total Picked for this item on the order
	 */
	public function get_orderpickedtotal() {
		return $this->qtypulled + $this->get_userpickedtotal();
	}

	/**
	 * Returns the Quantity remaining to pull
	 * @return int
	 */
	public function get_qtyremaining() {
		return $this->qtyordered - ($this->get_orderpickedtotal());
	}

	/**
	 * Returns if there has been Qty pulled for this Item / Order
	 * @return bool Does Order Item have previous pick quantity?
	 */
	public function has_pickedqty() {
		return $this->qtypulled > 0;
	}

	/**
	 * Returns if there's still quantity remaining to pick
	 * @return bool Is there quantity left to pick?
	 */
	public function has_qtyremaining() {
		return $this->get_qtyremaining() > 0;
	}

	/**
	 * Returns the Qty as cases
	 * // NOTE Rounds down to nearest int
	 * @param  int $qty
	 * @return int
	 */
	public function get_casecount($qty) {
		return $this->caseqty < 1 ? 0 : floor(($qty) / $this->caseqty);
	}

	/**
	 * Returns the Qty as cases and if its cases vs case
	 * @uses self::get_casecount()
	 * @param  int $qty
	 * @return string
	 */
	public function get_casedescription($qty) {
		$caseqty = $this->get_casecount($qty);
		return $caseqty == 1 ? "$caseqty case &nbsp;" : "$caseqty cases";
	}

	/**
	 * Returns if Qty picked is more than needed
	 * @return bool Has user picked too much?
	 */
	public function has_pickedtoomuch() {
		return $this->get_orderpickedtotal() > $this->qtyordered;
	}

	/**
	 * Returns if User has picked more than bin qty
	 * @return bool Did user pick more than expected Bin Qty?
	 */
	public function has_pickedmorethanbinqty() {
		return $this->get_userpickedtotal() > $this->binqty ? true : false;
	}

	/**
	 * Inserts a Whseitempick record for this item
	 * @param string $barcode   Barcode to add
	 * @param int    $palletnbr Pallet Number
	 */
	public function add_barcode($barcode, $palletnbr = 1) {
		if (BarcodesQuery::create()->get_barcode_itemid($barcode) == $this->itemnbr) {
			$barcode_info = BarcodesQuery::create()->findOneByBarcode($barcode);
			$picking_master = WhseitempickQuery::create();

			$item = new Whseitempick();
			$item->setSessionid($this->sessionid);
			$item->setOrdn($this->ordernbr);
			$item->setItemid($this->itemnbr);
			$item->setRecordnumber($picking_master->get_max_orderitem_recordnumber($this->sessionid, $this->ordernbr, $this->itemnbr) + 1);
			$item->setPalletnbr($palletnbr);
			$item->setBarcode($barcode);
			$item->setQty($barcode_info->qty);
			$item->save();
		}
	}

	/**
	 * Updates a Whseitempick record for this item
	 * @param string $barcode     Barcode to add
	 * @param int    $palletnbr   Pallet Number
	 * @param int    $recordumber Record Number
	 * @param int    $qty         Quantity to change to
	 */
	public function edit_barcode_qty($barcode, $palletnbr = 1, $recordnumber, $qty = 1) {
		$barcode_qty = BarcodesQuery::create()->get_barcode_qty($barcode);
		$picking_master = WhseitempickQuery::create();
		$item = $picking_master->get_order_pickeditem($this->sessionid, $this->ordernbr, $this->itemnbr, $recordnumber);
		$item->setQty($qty);
		$item->save();
	}

	/**
	 * Eletes a Whseitempick record for with recordnumber
	 * @param string $barcode     Barcode to add
	 * @param int    $palletnbr   Pallet Number
	 * @param int    $recordumber Record Number
	 */
	public function delete_barcode_qty($barcode, $palletnbr = 1, $recordnumber) {
		$picking_master = WhseitempickQuery::create();
		$item = $picking_master->get_order_pickeditem($this->sessionid, $this->ordernbr, $this->itemnbr, $recordnumber);
		$item->delete();
	}
}
