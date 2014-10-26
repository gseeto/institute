<?php
	/**
	 * The SeasonalCategoryType class defined here contains
	 * code for the SeasonalCategoryType enumerated type.  It represents
	 * the enumerated values found in the "seasonal_category_type" table
	 * in the database.
	 * 
	 * To use, you should use the SeasonalCategoryType subclass which
	 * extends this SeasonalCategoryTypeGen class.
	 * 
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the SeasonalCategoryType class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 */
	abstract class SeasonalCategoryTypeGen extends QBaseClass {

		const MaxId = 0;

		public static $NameArray = array();

		public static $TokenArray = array();

		public static function ToString($intSeasonalCategoryTypeId) {
			switch ($intSeasonalCategoryTypeId) {
				default:
					throw new QCallerException(sprintf('Invalid intSeasonalCategoryTypeId: %s', $intSeasonalCategoryTypeId));
			}
		}

		public static function ToToken($intSeasonalCategoryTypeId) {
			switch ($intSeasonalCategoryTypeId) {
				default:
					throw new QCallerException(sprintf('Invalid intSeasonalCategoryTypeId: %s', $intSeasonalCategoryTypeId));
			}
		}

	}
?>