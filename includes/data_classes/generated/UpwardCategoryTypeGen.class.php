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
		const Purpose = 1;
		const Service = 2;
		const Positioning = 3;
		const Presence = 4;
		const Partnering = 5;
		const Place = 6;
		const Planning = 7;

		const MaxId = 7;

		public static $NameArray = array(
			1 => 'Purpose',
			2 => 'Service',
			3 => 'Positioning',
			4 => 'Presence',
			5 => 'Partnering',
			6 => 'Place',
			7 => 'Planning');

		public static $TokenArray = array(
			1 => 'Purpose',
			2 => 'Service',
			3 => 'Positioning',
			4 => 'Presence',
			5 => 'Partnering',
			6 => 'Place',
			7 => 'Planning');

		public static function ToString($intUpwardCategoryTypeId) {
			switch ($intUpwardCategoryTypeId) {
				case 1: return 'Purpose';
				case 2: return 'Service';
				case 3: return 'Positioning';
				case 4: return 'Presence';
				case 5: return 'Partnering';
				case 6: return 'Place';
				case 7: return 'Planning';
				default:
					throw new QCallerException(sprintf('Invalid intUpwardCategoryTypeId: %s', $intUpwardCategoryTypeId));
			}
		}

		public static function ToToken($intUpwardCategoryTypeId) {
			switch ($intUpwardCategoryTypeId) {
				case 1: return 'Purpose';
				case 2: return 'Service';
				case 3: return 'Positioning';
				case 4: return 'Presence';
				case 5: return 'Partnering';
				case 6: return 'Place';
				case 7: return 'Planning';
				default:
					throw new QCallerException(sprintf('Invalid intUpwardCategoryTypeId: %s', $intUpwardCategoryTypeId));
			}
		}

	}
?>