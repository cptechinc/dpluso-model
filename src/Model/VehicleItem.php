<?php

use Base\VehicleItem as BaseVehicleItem;

use Dpluso\Model\ThrowErrorTrait;
use Dpluso\Model\MagicMethodTraits;

/**
 * Class for representing a row from the 'vehicle_catalog' table.
 * 
 * USE: Tie Items to Vehicle Year, Make, Model
 */
class VehicleItem extends BaseVehicleItem {
	use ThrowErrorTrait;
	use MagicMethodTraits;
}
