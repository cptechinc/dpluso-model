<?php

use Base\LockRecordQuery as BaseLockRecordQuery;

use Dpluso\Model\QueryTraits;

/**
 * Class for performing query and update operations on the 'lockrecord' table.
 *
 */
class LockRecordQuery extends BaseLockRecordQuery {
	use QueryTraits;


	/**
     * Filter the query on the lockdate column
     *
     * Example usage:
     * <code>
     * $query->filterByLockdate('2011-03-14'); // WHERE lockdate = '2011-03-14'
     * $query->filterByLockdate('now'); // WHERE lockdate = '2011-03-14'
     * $query->filterByLockdate(array('max' => 'yesterday')); // WHERE lockdate > '2011-03-13'
     * </code>
     *
     * @param     mixed $lockdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildLockRecordQuery The current query, for fluid interface
     */
	public function filterByDate($date = null, $comparison = null) {
		$this->filterByLockdate($date, $comparison);
	}
}
