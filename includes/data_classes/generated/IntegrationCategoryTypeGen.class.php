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
		const Identity = 1;
		const Integration = 2;
		const Work = 3;
		const Ministry = 4;
		const Purpose = 5;
		const Worldview = 6;
		const Money = 7;

		const MaxId = 7;

		public static $NameArray = array(
			1 => 'Identity',
			2 => 'Integration',
			3 => 'Work',
			4 => 'Ministry',
			5 => 'Purpose',
			6 => 'Worldview',
			7 => 'Money');

		public static $TokenArray = array(
			1 => 'Identity',
			2 => 'Integration',
			3 => 'Work',
			4 => 'Ministry',
			5 => 'Purpose',
			6 => 'Worldview',
			7 => 'Money');

		public static function ToString($intIntegrationCategoryTypeId) {
			switch ($intIntegrationCategoryTypeId) {
				case 1: return 'Identity';
				case 2: return 'Integration';
				case 3: return 'Work';
				case 4: return 'Ministry';
				case 5: return 'Purpose';
				case 6: return 'Worldview';
				case 7: return 'Money';
				default:
					throw new QCallerException(sprintf('Invalid intIntegrationCategoryTypeId: %s', $intIntegrationCategoryTypeId));
			}
		}

		public static function ToToken($intIntegrationCategoryTypeId) {
			switch ($intIntegrationCategoryTypeId) {
				case 1: return 'Identity';
				case 2: return 'Integration';
				case 3: return 'Work';
				case 4: return 'Ministry';
				case 5: return 'Purpose';
				case 6: return 'Worldview';
				case 7: return 'Money';
				default:
					throw new QCallerException(sprintf('Invalid intIntegrationCategoryTypeId: %s', $intIntegrationCategoryTypeId));
			}
		}

	}
?>