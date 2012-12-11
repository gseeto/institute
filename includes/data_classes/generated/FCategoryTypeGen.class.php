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
		const Feelings = 1;
		const FreshThinking = 2;
		const Friendship = 3;
		const FulfillmentAtWork = 4;
		const FunctionInSociety = 5;
		const Fun = 6;
		const Family = 7;
		const Fitness = 8;
		const Finances = 9;
		const Faith = 10;

		const MaxId = 10;

		public static $NameArray = array(
			1 => 'Feelings',
			2 => 'Fresh Thinking',
			3 => 'Friendship',
			4 => 'Fulfillment At Work',
			5 => 'Function In Society',
			6 => 'Fun',
			7 => 'Family',
			8 => 'Fitness',
			9 => 'Finances',
			10 => 'Faith');

		public static $TokenArray = array(
			1 => 'Feelings',
			2 => 'FreshThinking',
			3 => 'Friendship',
			4 => 'FulfillmentAtWork',
			5 => 'FunctionInSociety',
			6 => 'Fun',
			7 => 'Family',
			8 => 'Fitness',
			9 => 'Finances',
			10 => 'Faith');

		public static function ToString($intFCategoryTypeId) {
			switch ($intFCategoryTypeId) {
				case 1: return 'Feelings';
				case 2: return 'Fresh Thinking';
				case 3: return 'Friendship';
				case 4: return 'Fulfillment At Work';
				case 5: return 'Function In Society';
				case 6: return 'Fun';
				case 7: return 'Family';
				case 8: return 'Fitness';
				case 9: return 'Finances';
				case 10: return 'Faith';
				default:
					throw new QCallerException(sprintf('Invalid intFCategoryTypeId: %s', $intFCategoryTypeId));
			}
		}

		public static function ToToken($intFCategoryTypeId) {
			switch ($intFCategoryTypeId) {
				case 1: return 'Feelings';
				case 2: return 'FreshThinking';
				case 3: return 'Friendship';
				case 4: return 'FulfillmentAtWork';
				case 5: return 'FunctionInSociety';
				case 6: return 'Fun';
				case 7: return 'Family';
				case 8: return 'Fitness';
				case 9: return 'Finances';
				case 10: return 'Faith';
				default:
					throw new QCallerException(sprintf('Invalid intFCategoryTypeId: %s', $intFCategoryTypeId));
			}
		}

	}
?>