<?php
	/**
	 * The UpwardCategoryType class defined here contains
	 * code for the UpwardCategoryType enumerated type.  It represents
	 * the enumerated values found in the "upward_category_type" table
	 * in the database.
	 * 
	 * To use, you should use the UpwardCategoryType subclass which
	 * extends this UpwardCategoryTypeGen class.
	 * 
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the UpwardCategoryType class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 */
	abstract class UpwardCategoryTypeGen extends QBaseClass {

		const MaxId = 0;

		public static $NameArray = array();

		public static $TokenArray = array();

		public static function ToString($intUpwardCategoryTypeId) {
			switch ($intUpwardCategoryTypeId) {
				default:
					throw new QCallerException(sprintf('Invalid intUpwardCategoryTypeId: %s', $intUpwardCategoryTypeId));
			}
		}

		public static function ToToken($intUpwardCategoryTypeId) {
			switch ($intUpwardCategoryTypeId) {
				default:
					throw new QCallerException(sprintf('Invalid intUpwardCategoryTypeId: %s', $intUpwardCategoryTypeId));
			}
		}

	}
?>