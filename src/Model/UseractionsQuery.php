<?php

use Base\UseractionsQuery as BaseUseractionsQuery;

/**
 * Skeleton subclass for performing query and update operations on the 'useractions' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class UseractionsQuery extends BaseUseractionsQuery {

	/**
	 * Filter the query on the status column being Incomplete
	 * @return void
	 */
	public function filterByStatusComplete() {
		return $this->filterByCompleted(Useractions::STATUS_COMPLETED);
	}

	/**
	 * Filter the query on the status column being Rescheduled
	 * @return void
	 */
	public function filterByStatusRescheduled() {
		return $this->filterByCompleted(Useractions::STATUS_RESCHEDULED);
	}

	/**
	 * Filter the query on the status column being Incomplete
	 * @return void
	 */
	public function filterByStatusIncomplete() {
		return $this->filterByCompleted('');
	}

	public function filterByType($type = 'all') {
		if (in_array($type, Useractions::TYPES)) {
			return $this->filterByActiontype($type);
		} else {
			return $this;
		}
	}

	public function filterByDateCompletedDay($date) {
		$this->where('DATE(Useractions.DateCompleted) = ?', $date);
		return $this;
	}

	public function filterByDateUpdatedDay($date) {
		$this->where('DATE(Useractions.DateUpdated) = ?', $date);
		return $this;
	}
}
