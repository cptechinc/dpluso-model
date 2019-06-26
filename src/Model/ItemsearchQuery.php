<?php

use Base\ItemsearchQuery as BaseItemsearchQuery;

/**
 * Skeleton subclass for performing query and update operations on the 'itemsearch' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class ItemsearchQuery extends BaseItemsearchQuery {
	/**
     * Filter the query on the itemstatus column for Active
     * @return $this|ItemsearchQuery The current query, for fluid interface
     */
	public function filterActive() {
		return $this->filterByItemstatus(Itemsearch::ITEMSTATUS_ACTIVE);
	}

	/**
     * Filter the query on the itemstatus column for Inactive
     * @return $this|ItemsearchQuery The current query, for fluid interface
     */
	public function filterInactive() {
		return $this->filterByItemstatus(Itemsearch::ITEMSTATUS_INACTIVE);
	}
}
