<?php

use Base\Ordrhed as BaseOrdrhed;

use Dpluso\Model\ThrowErrorTrait;
use Dpluso\Model\MagicMethodTraits;

/**
 * Skeleton subclass for representing a row from the 'ordrhed' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class Ordrhed extends BaseOrdrhed {
	use ThrowErrorTrait;
	use MagicMethodTraits;

	/**
	 * Column Aliases to lookup / get properties
	 * @var array
	 */
	const COLUMN_ALIASES = array(
		'ordernumber'  => 'orderno',
		'custpo'       => 'custpo',
		'total_total'  => 'ordertotal',
		'date_ordered' => 'orderdate',
		'date_requested' => 'rqstdate',
		'date_canceled' => '',
		'date_taken' => '',
		'releasenumber' => 'releasenbr',
		'status'       => 'oehdstat',
		'orderstatus'     => 'oehdstat',
		'subtotal_tax' => 'subtotal',
		'total_freight'   => 'freight',
		'total_tax'       => 'salestax',
		'shipto_name'     => 'shipname',
		'shipto_address1' => 'shipaddress',
		'shipto_address2' => 'shipaddress2',
		'shipto_address3' => '',
		'shipto_country'  => 'shipcountry',
		'shipto_city'     => 'shipcity',
		'shipto_state'    => 'shipstate',
		'shipto_zip'      => 'shipzip',
		'contact'         => 'sconame',
		'phone_intl'      => 'phintl',
		'phone_ext'       => 'extension',
		'fax_intl'        => 'phintl',
		'fax'             => 'faxnbr',
		'pricecode'       => 'priceode',
		'taxcode'         => 'taxcode',
		'termscode'       => 'termcode',
		'shipvia'         => 'shipviacd',
		'salesperson_1'   => 'sp1',
		'salesperson_2'   => 'sp2',
		'salesperson_3'   => 'sp3',
		'shipcomplete'    => 'shipcom',
		'error'           => 'errormsg'
	);

	/**
	 * Does Order Have an Error
	 *
	 * @return bool
	 */
	public function has_error() {
		return boolval(strlen($this->errormsg));
	}
}
