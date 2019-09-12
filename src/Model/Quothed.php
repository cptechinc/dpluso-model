<?php

use Base\Quothed as BaseQuothed;

use Dpluso\Model\ThrowErrorTrait;
use Dpluso\Model\MagicMethodTraits;

/**
 * Skeleton subclass for representing a row from the 'quothed' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class Quothed extends BaseQuothed {
	use ThrowErrorTrait;
	use MagicMethodTraits;

	/**
	 * Column Aliases to lookup / get properties
	 * @var array
	 */
	const COLUMN_ALIASES = array(
		'qnbr'  => 'quotnbr',
		'quotenumber' => 'quotnbr',
		'total_total'  => 'ordertotal',
		'date_quoted' => 'quotdate',
		'date_review' => 'revdate',
		'date_expires' => 'expdate',
		'date_canceled' => '',
		'date_taken' => '',
		'subtotal_tax' => 'subtotal',
		'total_freight'   => 'freight',
		'total_tax'       => 'salestax',
		'shipto_name'     => 'shipname',
		'shipto_address' => 'shipaddress',
		'shipto_address2' => 'shipaddress2',
		'shipto_address3' => 'shipaddress3',
		'shipto_country'  => 'shipcountry',
		'shipto_city'     => 'shipcity',
		'shipto_state'    => 'shipstate',
		'shipto_zip'      => 'shipzip',
		'contact'         => 'contact',
		'termscode'       => 'termcode',
		'shipvia'         => 'shipviacd',
		'salesperson_1'   => 'sp1',
		'salesperson_2'   => 'sp2',
		'salesperson_3'   => 'sp3',
		'error_message'   => 'errormsg',
		'delivery'        => 'deliverydesc',
		'warehouse'       => 'whse'
	);

	const FOB_OPTIONS = array('O', 'D');
	const FOB_OPTIONS_DESC = array(
		'O' => 'origin',
		'D' => 'destination'
	);

	public function fob() {
		return self::FOB_OPTIONS_DESC[$this->fob];
	}

	public function get_foboptions() {
		return self::FOB_OPTIONS_DESC;
	}

	public function has_error() {
		return ($this->error == 'Y');
	}

	public function get_items() {
		return QuotdetQuery::create()->filterBySessionidQuote($this->sessionid, $this->quotnbr)->find();
	}

}
