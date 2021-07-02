<?php

use Base\VehicleItem as BaseVehicleItem;

use Dpluso\Model\ThrowErrorTrait;
use Dpluso\Model\MagicMethodTraits;

/**
 * Class for representing a row from the 'vehicle_catalog' table.
 * 
 * USE: Tie Items to Vehicle Year, Make, Model
 * 
 * @property string $id           Record ID
 * @property string $catalog      Vehicle Catalog (e.g. ATV|UTV|SNOW)
 * @property int[4] $fromyear     First Year Item Applies to
 * @property int[4] $throughyear  Last Year Item Applies to
 * @property string $make         Make / Manufacturer (Vehicle)
 * @property int    $engine       Engine Size
 * @property string $model        Model (Vehicle)
 * @property string $submodel
 * @property string $itemid       Part #
 * @property string $application  Application use (e.g. FRONT)
 * @property string $notes        Vehicle + Part # notes
 * @property string
 */
class VehicleItem extends BaseVehicleItem {
	use ThrowErrorTrait;
	use MagicMethodTraits;
}
