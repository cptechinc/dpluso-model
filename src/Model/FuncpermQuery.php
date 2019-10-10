<?php

use Base\FuncpermQuery as BaseFuncpermQuery;

/**
 * Skeleton subclass for performing query and update operations on the 'funcperm' table.
 *
 *
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class FuncpermQuery extends BaseFuncpermQuery {
	/**
	 * Return array of function codes filtered by the permission WHERE == Y, loginid column
	 *
	 * @param  string $userID User LoginID
	 * @return array          Function codes
	 */
	public function get_users_functions($userID) {
		$this->select('function');
		$this->filterByPermission(Funcperm::HAS_PERMISSION);
		$this->findByLoginid($userID);
		$functions = $this->find()->toArray();
		$functions[] = '';
		return $functions;
	}

	/**
	 * Returns if user has Y in their funcperm record
	 *
	 * @param  string $userID   User LoginID
	 * @param  string $function Dplus Function Code
	 * @return bool             Does User have permission to $function?
	 */
	public function does_user_have_permission($userID, $function) {
		$this->select('permission');
		$this->filterByFunction($function);
		$this->findByLoginid($userID);
		return $this->findOne() == Funcperm::HAS_PERMISSION;
	}

	public function filter_user_functions($userID, array $functions) {
		$this->select('function');
		$this->filterByPermission(Funcperm::HAS_PERMISSION);
		$this->filterByFunction($functions);
		$this->findByLoginid($userID);
		$functions = $this->find()->toArray();
		$functions[] = '';
		return $functions;
	}
}
