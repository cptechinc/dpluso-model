<?php

use Base\ItemmasterQuery as BaseItemmasterQuery;

/**
 * Skeleton subclass for performing query and update operations on the 'itemmaster' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class ItemmasterQuery extends BaseItemmasterQuery {
	/**
	 * Returns Item Type for Item Id
	 *
	 * @param  string $itemID
	 * @return int            Item Type
	 */
	public function get_itemtype($itemID) {
		$this->clear();
		$this->select('itemtype');
		return $this->findOneByItemid($itemID);
	}

	/**
	 * Returns if Item is serialized
	 * @param  string $itemID
	 * @return bool           Is the Item Serialized
	 */
	public function is_item_serialized($itemID) {
		$itemtype = $this->get_itemtype($itemID);
		return $itemtype == Itemmaster::ITEMTYPE_SERIALIZED;
	}

	/**
	 * Returns if Item is lotted
	 * @param  string $itemID
	 * @return bool           Is the Item lotted
	 */
	public function is_item_lotted($itemID) {
		$itemtype = $this->get_itemtype($itemID);
		return $itemtype == Itemmaster::ITEMTYPE_LOTTED;
	}

	/**
	 * Returns if Item is normal
	 * @param  string $itemID
	 * @return bool            Is the Item normal
	 */
	public function is_item_normal($itemID) {
		$itemtype = $this->get_itemtype($itemID);
		return $itemtype == Itemmaster::ITEMTYPE_NORMAL;
	}

	/**
	 * Returns if Item is price only
	 * @param  string $itemID
	 * @return bool            Is the Item price only
	 */
	public function is_item_priceonly($itemID) {
		$itemtype = $this->get_itemtype($itemID);
		return $itemtype == Itemmaster::ITEMTYPE_PRICEONLY;
	}

}
