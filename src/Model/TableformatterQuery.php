<?php

use Base\TableformatterQuery as BaseTableformatterQuery;

/**
 * Skeleton subclass for performing query and update operations on the 'tableformatter' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class TableformatterQuery extends BaseTableformatterQuery {
	/**
	 * Filter the query on the user, formattertype column
	 *
	 * @param     string $user       The value to use as filter.
	 * @param     string $formatter  The value to use as filter.
	 *
	 * @return $this|TableformatterQuery The current query, for fluid interface
	 */
	public function filterByUserFormattertype($userID, $formatter) {
		$this->filterByUser($userID);
		$this->filterByFormattertype($formatter);
		return $this;
	}
}
