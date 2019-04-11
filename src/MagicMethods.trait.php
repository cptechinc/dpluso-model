<?php 
	namespace Dpluso\Model;
	
	/**
	 * Traits that provide Magic Methods
	 * Functions include __get(), __isset()
	 */
	trait MagicMethodTraits {

		/**
		 * Properties are protected from modification without function, but
		 * We want to allow the $column values to be accessed
		 * @param  string $column The $column trying to be accessed
		 * @return mixed		   $column value or Error
		 */
		 public function __get($column) {
			$method = "get".ucfirst($column);

			if (method_exists($this, $method)) {
				return $this->$method();
			} elseif (property_exists($this, $column)) {
				return $this->$column;
			} elseif (isset($this->column_aliases)) {
				if (array_key_exists($column, $this->column_aliases)) {
					$realcolumn = $this->column_aliases[$column];
					return $this->$realcolumn;
				} else {
					$this->error("This column and alias ($column) does not exist");
					return false;
				 }
			} else {
				$this->error("This column and alias ($column) does not exist");
				return false;
			}
		}
		 
		 /**
		 * Is used to PHP functions like isset() and empty() get access and see
		 * if property is set
		 * @param  string  $column Column Name
		 * @return bool		       Whether $this->$column is set
		 */
		public function __isset($column){
			if (isset($this->$column)) {
				return isset($this->$column);
			} else {
				if (isset($this->column_aliases)) {
					return (array_key_exists($column, $this->column_aliases));
				} else{
					return false;
				}
			}
		} 
		
		
		/**
		 * We don't want to allow direct modification of properties so we have this function
		 * look for if $column exists then if it does it will set the value for the $column
		 * @param string $column   Column Name
		 * @param mixed  $value    Value of $this->$column
		 */
		 public function set($column, $value) {
			if (property_exists($this, $column)) {
				$method = "set".ucfirst($column);
				$this->$method($value);
			} elseif (isset($this->column_aliases)) { 
				if (array_key_exists($column, $this->column_aliases)) {
					$realcolumn = $this->column_aliases[$column];
					$method = "set".ucfirst($realcolumn);
					$this->$method($value);
				} else {
					$this->error("This column or alias ($column) does not exist");
	                 return false;
				}
			} else {
				$this->error("This column or alias ($column) does not exist");
                 return false;
			}
 		}
	}
	
	
	
	
