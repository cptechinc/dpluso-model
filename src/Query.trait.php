<?php
	namespace Dplus\Model;

	use Propel\Runtime\Propel;
	use Propel\Runtime\ActiveQuery\Criteria;

	/**
	 * Functions that Query Databases
	 */
	trait QueryTraits {
		/**
		 * Executes Query for Query Class
		 * @uses  self::$dbName
		 *
		 * @param  string      $sql    SQL to Execute, parameterized if need be
		 * @param  array       $params Parameters and their values
		 * @return PDOStatement        PDO Statement to get results
		 */
		public function execute_query($sql, $params) {
			$database = $this->dbName;
			$con = Propel::getWriteConnection($database);
			$stmt = $con->prepare($sql);

			if (empty($params)){
				$stmt->execute();
			} else {
				$stmt->execute($params);
			}
			return $stmt;
		}

		/**
		 * Adds a LIKE Filter for each column
		 * @param  array         $columns        Array of Table Column Names
		 * @param  string        $q              Search Query to Match
		 * @return ModelCriteria          $this
		 */
		public function search_filter(array $columns, $q) {
			foreach ($columns as $column) {
				$tablemap_column = "COL_".strtoupper($column);
				$mapclass = get_class($this->tableMap);
				$tablecolumn = constant("$mapclass::$tablemap_column");
				$this->condition($column, "$tablecolumn LIKE ?", "%$q%");
			}
			$this->where($columns, Criteria::LOGICAL_OR);
			return $this;
		}
	}
