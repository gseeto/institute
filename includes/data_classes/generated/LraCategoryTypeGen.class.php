<?php
	/**
	 * The LraCategoryType class defined here contains
	 * code for the LraCategoryType enumerated type.  It represents
	 * the enumerated values found in the "lra_category_type" table
	 * in the database.
	 * 
	 * To use, you should use the LraCategoryType subclass which
	 * extends this LraCategoryTypeGen class.
	 * 
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the LraCategoryType class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 */
	abstract class LraCategoryTypeGen extends QBaseClass {

		const MaxId = 0;

		public static $NameArray = array();

		public static $TokenArray = array();

		public static function ToString($intLraCategoryTypeId) {
			switch ($intLraCategoryTypeId) {
				default:
					throw new QCallerException(sprintf('Invalid intLraCategoryTypeId: %s', $intLraCategoryTypeId));
			}
		}

		public static function ToToken($intLraCategoryTypeId) {
			switch ($intLraCategoryTypeId) {
				default:
					throw new QCallerException(sprintf('Invalid intLraCategoryTypeId: %s', $intLraCategoryTypeId));
			}
		}

	}
?>