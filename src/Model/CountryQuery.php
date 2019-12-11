<?php

use Base\CountryQuery as BaseCountryQuery;

use Dplus\Model\QueryTraits;

/**
 * Class for performing query and update operations on the 'country' table.
 */
class CountryQuery extends BaseCountryQuery {
	use QueryTraits;
}
