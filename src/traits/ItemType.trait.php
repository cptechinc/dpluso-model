<?php
	namespace Dpluso\Model;
	
	use ItemMasterQuery;

	/**
	 * Provides methods to get Item Type information for $this->itemid
	 */
	trait ItemTypeTraits {
		/**
		 * Return is Item is serialized
		 *
		 * @return bool Is item Serialized?
		 */
		public function is_item_serialized() {
			return ItemmasterQuery::create()->is_item_serialized($this->itemid);
		}

		/**
		 * Return is Item is lotted
		 *
		 * @return bool Is item Lotted?
		 */
		public function is_item_lotted() {
			return ItemmasterQuery::create()->is_item_lotted($this->itemid);
		}

		/**
		 * Return is Item is Normal
		 *
		 * @return bool Is item Normal?
		 */
		public function is_item_normal() {
			return ItemmasterQuery::create()->is_item_normal($this->itemid);
		}

		/**
		 * Return if item is a Non Stock
		 *
		 * @return bool
		 */
		public function is_item_nonstock() {
			return Itemmaster::is_itemid_nonstock($this->itemid);
		}
	}