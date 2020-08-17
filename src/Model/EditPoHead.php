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

	const STATUS_OPEN   = 'O';
	const STATUS_CLOSED = 'C';

	/**
	 * Column Aliases to lookup / get properties
	 * @var array
	 */
	const COLUMN_ALIASES = array(
		'ponbr'              => 'pohdnbr',
		'status'             => 'pohdstat',
		'poref'              => 'pohdref',
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
		'date_cancelled'     => 'pohdcancdate',
		'shipvia'            => 'artbsviacode',
		'phone'              => 'pohdtelenbr',
		'phone_intl'         => 'pohdteleintl',
		'phone_extension'    => 'pohdteleext',
		'fax'                => 'pohdfaxnbr',
		'fax_intl'           => 'pohdfaxintl',
		'shipfromid'         => 'apfmshipid',
		'shipfrom_name'      => 'pohdptname',
		'shipfrom_address'   => 'pohdptadr1',
		'shipfrom_address2'  => 'pohdptadr2',
		'shipfrom_address3'  => 'pohdptadr3',
		'shipfrom_country'   => 'pohdptctry',
		'shipfrom_city'      => 'pohdptcity',
		'shipfrom_state'     => 'pohdptstat',
		'shipfrom_zip'       => 'pohdptzipcode',
		'fob'                => 'pohdfob',
		'tax_exempt'         => 'pohdtaxexem',
		'releasenbr'         => 'pohdreleasenbr'
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
