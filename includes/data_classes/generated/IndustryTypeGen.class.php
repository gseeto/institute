<?php
	/**
	 * The IndustryType class defined here contains
	 * code for the IndustryType enumerated type.  It represents
	 * the enumerated values found in the "industry_type" table
	 * in the database.
	 * 
	 * To use, you should use the IndustryType subclass which
	 * extends this IndustryTypeGen class.
	 * 
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the IndustryType class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 */
	abstract class IndustryTypeGen extends QBaseClass {

		const MaxId = 0;

		public static $NameArray = array();

		public static $TokenArray = array();

		public static function ToString($intIndustryTypeId) {
			switch ($intIndustryTypeId) {
				default:
					throw new QCallerException(sprintf('Invalid intIndustryTypeId: %s', $intIndustryTypeId));
			}
		}

		public static function ToToken($intIndustryTypeId) {
			switch ($intIndustryTypeId) {
				default:
					throw new QCallerException(sprintf('Invalid intIndustryTypeId: %s', $intIndustryTypeId));
			}
		}

	}
?>