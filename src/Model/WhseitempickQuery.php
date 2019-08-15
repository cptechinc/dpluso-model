<?php

use Base\WhseitempickQuery as BaseWhseitempickQuery;

use Dpluso\Model\QueryTraits;

/**
 * Skeleton subclass for performing query and update operations on the 'whseitempick' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class WhseitempickQuery extends BaseWhseitempickQuery {
	use QueryTraits;

	/**
	 * Returns the sum of How many eaches were picked by adding up all the unit quantities
	 * of each barcode picked multiplied by the qty picked of that barcode
	 *
	 * @param  string $sessionID Session Identifier
	 * @param  string $ordn      Sales Order Number
	 * @param  string $itemID    Item ID
	 * @return int               Picked Item Qty total
	 */
	public function get_pickeditemqtytotal($sessionID, $ordn, $itemID) {
		$sql =  "SELECT SUM(unitqty * qty) as totalpicked
		FROM whseitempick JOIN barcodes ON barcode = barcodes.barcodenbr
		WHERE sessionid = :sessionID AND ordn = :ordernumber AND whseitempick.itemid = :item";
		$params = array(':sessionID' => $sessionID, ':ordernumber' => $ordn, ':item' => $itemID);
		$result = $this->execute_query($sql, $params);
		return intval($result->fetchColumn());
	}

	/**
	 * Returns the sum of How many eaches were picked by adding up all the unit quantities
	 * of each barcode picked multiplied by the qty picked of that barcode
	 *
	 * @param  string $sessionID   Session Identifier
	 * @param  string $ordn        Sales Order Number
	 * @param  int    $linenbr     Line Nbr
	 * @param  int    $sublinenbr  Sub Line Nbr
	 * @return int                 Picked Item Qty total
	 */
	public function get_sublineqtytotal($sessionID, $ordn, $linenbr, $sublinenbr) {
		$sql =  "SELECT SUM(unitqty * qty) as totalpicked
		FROM whseitempick JOIN barcodes ON barcode = barcodes.barcodenbr
		WHERE sessionid = :sessionID AND ordn = :ordernumber AND whseitempick.linenbr = :line AND whseitempick.sublinenbr = :subline";
		$params = array(':sessionID' => $sessionID, ':ordernumber' => $ordn, ':line' => $linenbr, ':subline' => $sublinenbr);
		$result = $this->execute_query($sql, $params);
		return intval($result->fetchColumn());
	}

	/**
	 * Returns the sum of the Qty of all the barcodes picked for item filtered
	 * by the sessionid, ordernumber and itemid columns for each pallet
	 *
	 * @param  string $sessionID Session Identifier
	 * @param  string $ordn      Sales Order Number
	 * @param  string $itemID    Item ID
	 * @return array             ex. array(array('qty' => 2, 'palletnbr' => 1))
	 */
	public function get_pickeditemqtytotalbypallet($sessionID, $ordn, $itemID) {
		$sql =  "SELECT palletnbr, SUM(unitqty * qty) as totalpicked
		FROM whseitempick JOIN barcodes ON barcode = barcodes.barcodenbr
		WHERE sessionid = :sessionID AND ordn = :ordernumber AND whseitempick.itemid = :item
		GROUP BY palletnbr";
		$params = array(':sessionID' => $sessionID, ':ordernumber' => $ordn, ':item' => $itemID);
		$result = $this->execute_query($sql, $params);
		return $result->fetchAll();
	}

	/**
	 * Returns the sum of the Qty of all the barcodes picked for line filtered
	 * by the sessionid, ordernumber and itemid columns for each pallet
	 *
	 * @param  string $sessionID Session Identifier
	 * @param  string $ordn      Sales Order Number
	 * @param  string $itemID    Item ID
	 * @return array             ex. array(array('qty' => 2, 'palletnbr' => 1))
	 */
	public function get_qtytotalbybin($sessionID, $ordn, $linenbr = 1) {
		$sql =  "SELECT bin, SUM(unitqty * qty) as qty
		FROM whseitempick JOIN barcodes ON barcode = barcodes.barcodenbr
		WHERE sessionid = :sessionID AND ordn = :ordernumber AND linenbr = :line
		GROUP BY bin";
		$params = array(':sessionID' => $sessionID, ':ordernumber' => $ordn, ':line' => $linenbr);
		$result = $this->execute_query($sql, $params);
		return $result->fetchAll();
	}

	/**
	 * Returns the Max Record Number for the Item ID filtered
	 * by the sessionid, ordernumber and itemid columns
	 *
	 * @param  string $sessionID Session Identifier
	 * @param  string $ordn      Sales Order Number
	 * @param  string $itemID    Item ID
	 * @return int               Order Item Max record number
	 */
	public function get_max_orderitem_recordnumber($sessionID, $ordn, $itemID) {
		$this->clear();
		$this->addAsColumn('max', 'MAX(recordnumber)');
		$this->select('max');
		$this->filterByOrdn($ordn);
		$this->filterByItemid($itemID);
		return $this->findOneBySessionid($sessionID);
	}

	/**
	 * Returns the Max Record Number for the Line Nbr filtered
	 * by the sessionid, ordernumber and itemid columns
	 *
	 * @param  string $sessionID   Session Identifier
	 * @param  string $ordn        Sales Order Number
	 * @param  int    $linenbr     Line Nbr
	 * @param  int    $sublinenbr  Sub Line Nbr
	 * @return int                 Order Line Max record number
	 */
	public function get_max_order_subline_recordnumber($sessionID, $ordn, $linenbr, $sublinenbr) {
		$this->clear();
		$this->addAsColumn('max', 'MAX(recordnumber)');
		$this->select('max');
		$this->filterBySessionidOrder($sessionID, $ordn);
		$this->filterByLinenbrSublinenbr($linenbr, $sublinenbr);
		return $this->findOneBySessionid($sessionID);
	}

	/**
	 * Return Whseitempick objects filtered by the sessionid, ordernbr, itemid columns
	 *
	 * @param  string $sessionID Session Identifier
	 * @param  string $ordn      Sales Order Number
	 * @param  string $itemID    Item ID
	 * @return Whseitempick[]|ObjectCollection
	 */
	public function get_order_pickeditems($sessionID, $ordn, $itemID) {
		//$this->clear();
		$this->filterBySessionidOrder($sessionID, $ordn);
		$this->filterByItemid($itemID);
		return $this->find();
	}

	/**
	 * Return if barcode has been picked for Order Number Line Number
	 *
	 * @param  string $sessionID     Session Identifier
	 * @param  string $ordn          Sales Order Number
	 * @param  string $barcode       Barcode
	 * @param  int    $linenbr       Sales Order Line Number
	 * @param  int    $sublinenbr    Sales Order Line Number
	 * @return bool
	 */
	public function has_picked_barcode($sessionID, $ordn, $barcode, $linenbr = 1, $sublinenbr = 0) {
		$this->clear();
		$this->addAsColumn('count', 'COUNT(*)');
		$this->select('count');
		$this->filterBySessionidOrder($sessionID, $ordn);
		$this->filterByLinenbrSublinenbr($linenbr, $sublinenbr);
		$this->filterByBarcode($barcode);
		return boolval($this->findOne());
	}

	/**
	 * Returns if Sales Order Detail Sub Line is being Picked by another Session
	 *
	 * @param  string $sessionID  User SessionID to
	 * @param  string $ordn       Sales Order Number
	 * @param  int    $linenbr    Line Number
	 * @param  int    $sublinenbr Sub Line Number
	 * @return bool               Is Sales Order Detail SubLine being Picked
	 */
	public function is_order_subline_being_picked($sessionID, $ordn, $linenbr = 1, $sublinenbr = 0) {
		$this->clear();
		$this->addAsColumn('count', 'COUNT(*)');
		$this->select('count');
		$this->filterByOrdn($ordn);
		$this->filterByLinenbrSublinenbr($linenbr, $sublinenbr);
		return boolval($this->findOne());
	}


	/**
	 * Returns if Session is picking the order subline
	 *
	 * @param  string $sessionID User SessionID to
	 * @param  string $ordn      Sales Order Number
	 * @param  int    $linenbr   Line Number
	 * @param  int    $sublinenbr Sub Line Number
	 * @return bool              Is Sales Order Detail SubLine being Picked by $sessionID
	 */
	public function is_order_subline_being_picked_session($sessionID, $ordn, $linenbr = 1, $sublinenbr = 0) {
		$this->clear();
		$this->addAsColumn('count', 'COUNT(*)');
		$this->select('count');
		$this->filterBySessionidOrder($sessionID, $ordn);
		$this->filterByLinenbrSublinenbr($linenbr, $sublinenbr);
		return boolval($this->findOne());
	}

	/**
	 * Filter the query on the sessionid, ordn columns
	 *
	 * @param  string $sessionID Session ID
	 * @param  string $ordn      Sales Order Number
	 * @return WhseitempickQuery
	 */
	public function filterBySessionidOrder($sessionID, $ordn) {
		$this->filterBySessionid($sessionID);
		$this->filterByOrdn($ordn);
		return $this;
	}

	/**
	 * Filter the query on the linenbr, sublinenbr columns
	 *
	 * @param  int    $linenbr    Sales Order Line Number
	 * @param  int    $sublinenbr Sales Order SubLine Number
	 * @return WhseitempickQuery
	 */
	public function filterByLinenbrSublinenbr($linenbr = 1, $sublinenbr = 0) {
		$this->filterByLinenbr($linenbr);
		$this->filterBySublinenbr($sublinenbr);
		return $this;
	}
}
