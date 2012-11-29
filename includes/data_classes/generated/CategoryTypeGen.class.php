<?php
	/**
	 * The CategoryType class defined here contains
	 * code for the CategoryType enumerated type.  It represents
	 * the enumerated values found in the "category_type" table
	 * in the database.
	 * 
	 * To use, you should use the CategoryType subclass which
	 * extends this CategoryTypeGen class.
	 * 
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the CategoryType class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 */
	abstract class CategoryTypeGen extends QBaseClass {
		const Purpose = 1;
		const Product = 2;
		const Positioning = 3;
		const Presence = 4;
		const Partnering = 5;
		const Process = 6;
		const People = 7;
		const Place = 8;
		const Planning = 9;
		const Profit = 10;

		const MaxId = 10;

		public static $NameArray = array(
			1 => 'Purpose',
			2 => 'Product',
			3 => 'Positioning',
			4 => 'Presence',
			5 => 'Partnering',
			6 => 'Process',
			7 => 'People',
			8 => 'Place',
			9 => 'Planning',
			10 => 'Profit');

		public static $TokenArray = array(
			1 => 'Purpose',
			2 => 'Product',
			3 => 'Positioning',
			4 => 'Presence',
			5 => 'Partnering',
			6 => 'Process',
			7 => 'People',
			8 => 'Place',
			9 => 'Planning',
			10 => 'Profit');

		public static function ToString($intCategoryTypeId) {
			switch ($intCategoryTypeId) {
				case 1: return 'Purpose';
				case 2: return 'Product';
				case 3: return 'Positioning';
				case 4: return 'Presence';
				case 5: return 'Partnering';
				case 6: return 'Process';
				case 7: return 'People';
				case 8: return 'Place';
				case 9: return 'Planning';
				case 10: return 'Profit';
				default:
					throw new QCallerException(sprintf('Invalid intCategoryTypeId: %s', $intCategoryTypeId));
			}
		}

		public static function ToToken($intCategoryTypeId) {
			switch ($intCategoryTypeId) {
				case 1: return 'Purpose';
				case 2: return 'Product';
				case 3: return 'Positioning';
				case 4: return 'Presence';
				case 5: return 'Partnering';
				case 6: return 'Process';
				case 7: return 'People';
				case 8: return 'Place';
				case 9: return 'Planning';
				case 10: return 'Profit';
				default:
					throw new QCallerException(sprintf('Invalid intCategoryTypeId: %s', $intCategoryTypeId));
			}
		}

	}
?>