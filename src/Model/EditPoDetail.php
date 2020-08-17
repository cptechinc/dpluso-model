<?php

use Base\EditPoDetail as BaseEditPoDetail;

use Dpluso\Model\ThrowErrorTrait;
use Dpluso\Model\MagicMethodTraits;

/**
 * Class for representing a row from the 'edit_po_detail' table.
 */
class EditPoDetail extends BaseEditPoDetail {
	use ThrowErrorTrait;
	use MagicMethodTraits;

	/**
	 * Column Aliases to lookup / get properties
	 * @var array
	 */
	 const COLUMN_ALIASES = array(
		'ponbr'      => 'pohdnbr',
		'linenbr'    => 'podtline',
		'itemid'     => 'inititemnbr',
		'description' => 'podtdesc1',
		'desscription2' => 'podtdesc2',
		'vendoritemid'  => 'podtvenditemnbr',
		'whse'          => 'intbwhse',
		'date_shipped'  => 'podtshipdate',
		'date_expected' => 'podtexptdate',
		'uom'           => 'intbuompur',
		'qty_ordered'   => 'podtqtyord',
		'cost'          => 'podtcost',
		'cost_total'    => 'podtcosttot',
		'specialorder'  => 'podtspecordr',
		'glaccount'     => 'podtglacct',
		'weight'        => 'podtwghttot',
		'whse_destination' => 'podtdestwhse',
	);
}
