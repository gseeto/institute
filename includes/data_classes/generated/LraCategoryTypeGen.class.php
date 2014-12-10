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
		const Purpose = 1;
		const Product = 2;
		const Positioning = 3;
		const Presence = 4;
		const Partnering = 5;
		const Profit = 6;
		const Process = 7;
		const People = 8;
		const Planning = 9;
		const Place = 10;
		const FreshThinking = 11;
		const Friendships = 12;
		const Feelings = 13;
		const Family = 14;
		const Faith = 15;
		const Fun = 16;
		const Fitness = 17;
		const Finances = 18;
		const FulfilmentAtWork = 19;
		const FunctionInSociety = 20;

		const MaxId = 20;

		public static $NameArray = array(
			1 => 'Purpose',
			2 => 'Product',
			3 => 'Positioning',
			4 => 'Presence',
			5 => 'Partnering',
			6 => 'Profit',
			7 => 'Process',
			8 => 'People',
			9 => 'Planning',
			10 => 'Place',
			11 => 'Fresh Thinking',
			12 => 'Friendships',
			13 => 'Feelings',
			14 => 'Family',
			15 => 'Faith',
			16 => 'Fun',
			17 => 'Fitness',
			18 => 'Finances',
			19 => 'Fulfilment At Work',
			20 => 'Function In Society');

		public static $TokenArray = array(
			1 => 'Purpose',
			2 => 'Product',
			3 => 'Positioning',
			4 => 'Presence',
			5 => 'Partnering',
			6 => 'Profit',
			7 => 'Process',
			8 => 'People',
			9 => 'Planning',
			10 => 'Place',
			11 => 'FreshThinking',
			12 => 'Friendships',
			13 => 'Feelings',
			14 => 'Family',
			15 => 'Faith',
			16 => 'Fun',
			17 => 'Fitness',
			18 => 'Finances',
			19 => 'FulfilmentAtWork',
			20 => 'FunctionInSociety');

		public static function ToString($intLraCategoryTypeId) {
			switch ($intLraCategoryTypeId) {
				case 1: return 'Purpose';
				case 2: return 'Product';
				case 3: return 'Positioning';
				case 4: return 'Presence';
				case 5: return 'Partnering';
				case 6: return 'Profit';
				case 7: return 'Process';
				case 8: return 'People';
				case 9: return 'Planning';
				case 10: return 'Place';
				case 11: return 'Fresh Thinking';
				case 12: return 'Friendships';
				case 13: return 'Feelings';
				case 14: return 'Family';
				case 15: return 'Faith';
				case 16: return 'Fun';
				case 17: return 'Fitness';
				case 18: return 'Finances';
				case 19: return 'Fulfilment At Work';
				case 20: return 'Function In Society';
				default:
					throw new QCallerException(sprintf('Invalid intLraCategoryTypeId: %s', $intLraCategoryTypeId));
			}
		}

		public static function ToToken($intLraCategoryTypeId) {
			switch ($intLraCategoryTypeId) {
				case 1: return 'Purpose';
				case 2: return 'Product';
				case 3: return 'Positioning';
				case 4: return 'Presence';
				case 5: return 'Partnering';
				case 6: return 'Profit';
				case 7: return 'Process';
				case 8: return 'People';
				case 9: return 'Planning';
				case 10: return 'Place';
				case 11: return 'FreshThinking';
				case 12: return 'Friendships';
				case 13: return 'Feelings';
				case 14: return 'Family';
				case 15: return 'Faith';
				case 16: return 'Fun';
				case 17: return 'Fitness';
				case 18: return 'Finances';
				case 19: return 'FulfilmentAtWork';
				case 20: return 'FunctionInSociety';
				default:
					throw new QCallerException(sprintf('Invalid intLraCategoryTypeId: %s', $intLraCategoryTypeId));
			}
		}

	}
?>