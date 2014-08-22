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
		const DiscoveringyourGifts = 1;
		const Faith = 2;
		const HearingandFearingGod = 3;
		const SkillsBuilding = 4;
		const InternalIntegrity = 5;
		const rechoosingyourspouse = 6;
		const UniversityoftheDesert = 7;

		const MaxId = 7;

		public static $NameArray = array(
			1 => 'Discovering your Gifts',
			2 => 'Faith',
			3 => 'Hearing and Fearing God',
			4 => 'Skills Building',
			5 => 'Internal Integrity',
			6 => '(re)choosing your spouse',
			7 => 'University of the Desert');

		public static $TokenArray = array(
			1 => 'DiscoveringyourGifts',
			2 => 'Faith',
			3 => 'HearingandFearingGod',
			4 => 'SkillsBuilding',
			5 => 'InternalIntegrity',
			6 => 'rechoosingyourspouse',
			7 => 'UniversityoftheDesert');

		public static function ToString($intSeasonalCategoryTypeId) {
			switch ($intSeasonalCategoryTypeId) {
				case 1: return 'Discovering your Gifts';
				case 2: return 'Faith';
				case 3: return 'Hearing and Fearing God';
				case 4: return 'Skills Building';
				case 5: return 'Internal Integrity';
				case 6: return '(re)choosing your spouse';
				case 7: return 'University of the Desert';
				default:
					throw new QCallerException(sprintf('Invalid intSeasonalCategoryTypeId: %s', $intSeasonalCategoryTypeId));
			}
		}

		public static function ToToken($intSeasonalCategoryTypeId) {
			switch ($intSeasonalCategoryTypeId) {
				case 1: return 'DiscoveringyourGifts';
				case 2: return 'Faith';
				case 3: return 'HearingandFearingGod';
				case 4: return 'SkillsBuilding';
				case 5: return 'InternalIntegrity';
				case 6: return 'rechoosingyourspouse';
				case 7: return 'UniversityoftheDesert';
				default:
					throw new QCallerException(sprintf('Invalid intSeasonalCategoryTypeId: %s', $intSeasonalCategoryTypeId));
			}
		}

	}
?>