<?php

use Base\EditPoHead as BaseEditPoHead;

use Dpluso\Model\ThrowErrorTrait;
use Dpluso\Model\MagicMethodTraits;

/**
 * Class for representing a row from the 'edit_po_head' table.
 */
class EditPoHead extends BaseEditPoHead {
	use ThrowErrorTrait;
	use MagicMethodTraits;

	const STATUS_DESCRIPTIONS = array(
		'N' => 'not printed',
		'C' => 'closed',
		'O' => 'open',
		'P' => 'printed'
	);

	const STATUS_OPEN   = 'O';
	const STATUS_CLOSED = 'C';

	const FREIGHTPAIDBY_DESCRIPTIONS = array(
		'C' => 'collect',
		'P' => 'prepaid',
		'A' => 'prepaid & add',
		'T' => 'third party'
	);

	const FOB_DESCRIPTIONS = array(
		'D' => 'destination',
		'O' => 'origin',
		'P' => 'prepaid + add'
	);

	/**
	 * Column Aliases to lookup / get properties
	 * @var array
	 */
	const COLUMN_ALIASES = array(
		'ponbr'              => 'pohdnbr',
		'status'             => 'pohdstat',
		'poref'              => 'pohdref',
		'reference'          => 'pohdref',
		'vendorID'           => 'apvevendid',
		'vendorid'           => 'apvevendid',
		'shipto_name'        => 'pohdtoname',
		'shipto_address'     => 'pohdtoadr1',
		'shipto_address2'    => 'pohdtoadr2',
		'shipto_address3'    => 'pohdtoadr3',
		'shipto_country'     => 'pohdtoctry',
		'shipto_city'        => 'pohdtocity',
		'shipto_state'       => 'pohdtostat',
		'shipto_zip'         => 'pohdtozipcode',
		'contact'            => 'pohdcont',
		'email'              => 'pohdemailaddr',
		'date_ordered'       => 'pohdordrdate',
		'date_expected'      => 'pohdexptdate',
		'date_shipped'       => 'pohdshipdate',
		'date_cancel'        => 'pohdcancdate',
		'date_acknowledged'  => 'pohdackdate',
		'shipvia'            => 'artbsviacode',
		'phone'              => 'pohdtelenbr',
		'phone_intl'         => 'pohdteleintl',
		'phone_extension'    => 'pohdteleext',
		'fax'                => 'pohdfaxnbr',
		'fax_intl'           => 'pohdfaxintl',
		'shipfromid'         => 'apfmshipid',
		'payto_name'      => 'pohdptname',
		'payto_address'   => 'pohdptadr1',
		'payto_address2'  => 'pohdptadr2',
		'payto_address3'  => 'pohdptadr3',
		'payto_country'   => 'pohdptctry',
		'payto_city'      => 'pohdptcity',
		'payto_state'     => 'pohdptstat',
		'payto_zip'       => 'pohdptzipcode',
		'fob'                => 'pohdfob',
		'tax_exempt'         => 'pohdtaxexem',
		'releasenbr'         => 'pohdreleasenbr',
		'freightpaidby'      => 'pohdcolppd',
		'termscode'          => 'aptmtermcode',
		'futurebuy'          => 'pohdfuturebuy',
		'landedcost'         => 'pohdlandcost',
		'exchange_country'   => 'pohdexchctry',
		'exchange_rate'      => 'pohdexchrate'
	);

	/**
	 * Adds Leading Zeroes to Purchase Order Number
	 *
	 * @param  string $ponbr Purchase Order Number ex.    4290100
	 * @return string        Purchase Order Number ex. 0004290100
	 */
	public static function get_paddedponumber($ponbr) {
		 return str_pad($ponbr , self::LENGTH , "0", STR_PAD_LEFT);
	}

	/**
	 * Returns Description for the status
	 *
	 * @return string
	 */
	public function status() {
		return self::STATUS_DESCRIPTIONS[$this->status];
	}

	/**
	 * Return Freight Paid By Description
	 * @return string
	 */
	public function freightpaidby() {
		return self::FREIGHTPAIDBY_DESCRIPTIONS[$this->freightpaidby];
	}

	/**
	 * Return FOB descriptions
	 * @return string
	 */
	public function fob() {
		return self::FOB_DESCRIPTIONS[$this->fob];
	}

	/**
	 * Return Options for Freight Paid By
	 * @return array
	 */
	public function get_options_freightpaidby() {
		return self::FREIGHTPAIDBY_DESCRIPTIONS;
	}

	/**
	 * Return Options for FOB
	 * @return array
	 */
	public function get_options_fob() {
		return self::FOB_DESCRIPTIONS;
	}

	/**
	 * Returns if PO is in a closed status
	 * @return bool
	 */
	public function is_closed() {
		return $this->status == self::STATUS_CLOSED;
	}

	public function get_items() {
		$q = EditPoDetailQuery::create();
		$q->filterBySessionid($this->sessionid);
		$q->filterByPonbr($this->ponbr);
		return $q->find();
	}
}
