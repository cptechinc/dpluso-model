<?php

use Base\Quotdet as BaseQuotdet;

use Dpluso\Model\ThrowErrorTrait;
use Dpluso\Model\MagicMethodTraits;

/**
 * Class for representing a row from the 'quotdet' table
 */
class Quotdet extends BaseQuotdet {
	use ThrowErrorTrait;
	use MagicMethodTraits;

	/**
	 * Aliases for Class Properties
	 * @var array
	 */
	const COLUMN_ALIASES = array(
		'quotenbr'        => 'quotenbr',
		'quoteid'         => 'quotenbr',
		'quoteID'         => 'quotenbr',
		'id'              => 'quotenbr',
		'quotenumber'     => 'quotenbr',
		'line'            => 'linenbr',
		'linenumber'      => 'linenbr',
		'description'     => 'desc1',
		'description2'    => 'desc2',
		'date_requested'  => 'rshipdate',
		'specialorder'    => 'spcord',
		'qty'             => 'ordrqty',
		'price'           => 'ordrprice',
		'price_total'     => 'ordrtotalprice',
		'cost'            => 'ordrtotalcost',
		'tax_code1'       => 'taxcode',
		'unitofmeasure'   => 'intbuomsale',
		'quoted_qty'      => 'quotqty',
		'quoted_price'    => 'quotprice',
		'quoted_cost'     => 'quotcost',
		'quoted_margin'   => 'quotmkupmarg',
	);

	public function has_notes() {
		return $this->hasnotes == 'Y';
	}
}
