<?php
	/**
	 * The IntegrationCategoryType class defined here contains
	 * code for the IntegrationCategoryType enumerated type.  It represents
	 * the enumerated values found in the "integration_category_type" table
	 * in the database.
	 * 
	 * To use, you should use the IntegrationCategoryType subclass which
	 * extends this IntegrationCategoryTypeGen class.
	 * 
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the IntegrationCategoryType class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 */
	abstract class IntegrationCategoryTypeGen extends QBaseClass {

		const MaxId = 0;

		public static $NameArray = array();

		public static $TokenArray = array();

		public static function ToString($intIntegrationCategoryTypeId) {
			switch ($intIntegrationCategoryTypeId) {
				default:
					throw new QCallerException(sprintf('Invalid intIntegrationCategoryTypeId: %s', $intIntegrationCategoryTypeId));
			}
		}

		public static function ToToken($intIntegrationCategoryTypeId) {
			switch ($intIntegrationCategoryTypeId) {
				default:
					throw new QCallerException(sprintf('Invalid intIntegrationCategoryTypeId: %s', $intIntegrationCategoryTypeId));
			}
		}

	}
?>