<?php

use Base\PackSalesOrderDetail as BasePackSalesOrderDetail;

use Dpluso\Model\ThrowErrorTrait;
use Dpluso\Model\MagicMethodTraits;

/**
 * Skeleton subclass for representing a row from the 'wmpackdet' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class PackSalesOrderDetail extends BasePackSalesOrderDetail {
	use ThrowErrorTrait;
	use MagicMethodTraits;


	/**
	 * Aliases for Class Properties
	 * @var array
	 */
	const COLUMN_ALIASES = array(
		'sessionID' => 'sessionid',
		'ordn'      => 'ordernbr',
	);

	/**
	 * Return is Item is serialized
	 *
	 * @return bool Is item Serialized?
	 */
	public function is_item_serialized() {
		return ItemmasterQuery::create()->is_item_serialized($this->itemid);
	}

	/**
	 * Return is Item is lotted
	 *
	 * @return bool Is item Lotted?
	 */
	public function is_item_lotted() {
		return ItemmasterQuery::create()->is_item_lotted($this->itemid);
	}

	/**
	 * Return is Item is Normal
	 *
	 * @return bool Is item Normal?
	 */
	public function is_item_normal() {
		return ItemmasterQuery::create()->is_item_normal($this->itemid);
	}

	/**
	 * Return if item is a Non Stock
	 *
	 * @return bool
	 */
	public function is_item_nonstock() {
		return Itemmaster::is_itemid_nonstock($this->itemid);
	}
}
