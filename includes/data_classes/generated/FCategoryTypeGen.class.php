<?php
	/**
	 * The FCategoryType class defined here contains
	 * code for the FCategoryType enumerated type.  It represents
	 * the enumerated values found in the "f_category_type" table
	 * in the database.
	 * 
	 * To use, you should use the FCategoryType subclass which
	 * extends this FCategoryTypeGen class.
	 * 
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the FCategoryType class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 */
	abstract class FCategoryTypeGen extends QBaseClass {

		const MaxId = 0;

		public static $NameArray = array();

		public static $TokenArray = array();

		public static function ToString($intFCategoryTypeId) {
			switch ($intFCategoryTypeId) {
				default:
					throw new QCallerException(sprintf('Invalid intFCategoryTypeId: %s', $intFCategoryTypeId));
			}
		}

		public static function ToToken($intFCategoryTypeId) {
			switch ($intFCategoryTypeId) {
				default:
					throw new QCallerException(sprintf('Invalid intFCategoryTypeId: %s', $intFCategoryTypeId));
			}
		}

	}
?>