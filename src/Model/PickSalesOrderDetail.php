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
	 * Returns the Item's total Picked Qty for each Pallet
	 * 
	 * @return array   ex. array(array('qty' => 2, 'palletnbr' => 1))
	 */
	public function get_userpickedtotalsbypallet() {
		return WhseitempickQuery::create()->get_pickeditemqtytotalbypallet($this->sessionid, $this->ordernbr, $this->itemnbr);
	}

	/**
	 * Returns the Item's total picked qty grouped by Bin
	 *
	 * @return array array(array('bin' => binid, 'qty' => 2))
	 */
	public function get_userpickedtotalsbybin() {
		return WhseitempickQuery::create()->get_qtytotalbybin($this->sessionid, $this->ordernbr, $this->linenbr);
	}

	/**
	 * Returns Item's total picked grouped by barcode
	 *
	 * @return array array(array('barcode' => $barcode, bin' => binid, 'qty' => 2))
	 */
	public function get_userpickedtotalsbybarcode() {
		$query = WhseitempickQuery::create();
		$query->filterBySessionid($this->sessionid);
		$query->filterByOrdn($this->ordernbr);
		$query->filterByItemid($this->itemnbr);
		$query->filterByLinenbr($this->linenbr);
		$query->groupByBarcode();
		return $query->find();
	}

	/**
	 * Returns if there has been Qty pulled for this Item / Order
	 * 
	 * @return bool Does Order Item have previous pick quantity?
	 */
	public function has_pickedqty() {
		return $this->qtypulled > 0;
	}

	/**
	 * Returns if there's still quantity remaining to pick
	 * 
	 * @return bool Is there quantity left to pick?
	 */
	public function has_qtyremaining() {
		return $this->get_qtyremaining() > 0;
	}

	/**
	 * Returns the Qty as cases
	 * // NOTE Rounds down to nearest int
	 * 
	 * @param  int $qty
	 * @return int
	 */
	public function get_casecount($qty) {
		return $this->caseqty < 1 ? 0 : floor(($qty) / $this->caseqty);
	}

	/**
	 * Returns the Qty as cases and if its cases vs case
	 * 
	 * @uses self::get_casecount()
	 * @param  int $qty
	 * @return string
	 */
	public function get_casedescription($qty) {
		$caseqty = $this->get_casecount($qty);
		return $caseqty == 1 ? "$caseqty case &nbsp;" : "$caseqty cases";
	}

	/**
	 * Return is Item is serialized
	 * 
	 * @return bool Is item Serialized?
	 */
	public function is_item_serialized() {
		return ItemmasterQuery::create()->is_item_serialized($this->itemnbr);
	}

	/**
	 * Return is Item is lotted
	 * 
	 * @return bool Is item Lotted?
	 */
	public function is_item_lotted() {
		return ItemmasterQuery::create()->is_item_lotted($this->itemnbr);
	}

	/**
	 * Return is Item is Normal
	 * 
	 * @return bool Is item Normal?
	 */
	public function is_item_normal() {
		return ItemmasterQuery::create()->is_item_normal($this->itemnbr);
	}
}
