<?php
	/**
	 * The ConditionalType class defined here contains
	 * code for the ConditionalType enumerated type.  It represents
	 * the enumerated values found in the "conditional_type" table
	 * in the database.
	 * 
	 * To use, you should use the ConditionalType subclass which
	 * extends this ConditionalTypeGen class.
	 * 
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the ConditionalType class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 */
	abstract class ConditionalTypeGen extends QBaseClass {
		const Performance2 = 1;
		const Performance3 = 2;
		const Performance4 = 3;
		const Performance5 = 4;
		const Performance6 = 5;
		const ImportancePerformanceGap2 = 6;
		const ImportancePerformanceGap3 = 7;
		const ImportancePerformanceGap4 = 8;
		const ImportancePerformanceGap5 = 9;
		const Importance2 = 10;
		const Importance3 = 11;
		const Importance4 = 12;
		const Importance5 = 13;
		const Importance6 = 14;

		const MaxId = 14;

		public static $NameArray = array(
			1 => 'Performance < 2',
			2 => 'Performance < 3',
			3 => 'Performance < 4',
			4 => 'Performance < 5',
			5 => 'Performance < 6',
			6 => 'Importance/Performance Gap > 2',
			7 => 'Importance/Performance Gap > 3',
			8 => 'Importance/Performance Gap > 4',
			9 => 'Importance/Performance Gap > 5',
			10 => 'Importance < 2',
			11 => 'Importance < 3',
			12 => 'Importance < 4',
			13 => 'Importance < 5',
			14 => 'Importance < 6');

		public static $TokenArray = array(
			1 => 'Performance2',
			2 => 'Performance3',
			3 => 'Performance4',
			4 => 'Performance5',
			5 => 'Performance6',
			6 => 'ImportancePerformanceGap2',
			7 => 'ImportancePerformanceGap3',
			8 => 'ImportancePerformanceGap4',
			9 => 'ImportancePerformanceGap5',
			10 => 'Importance2',
			11 => 'Importance3',
			12 => 'Importance4',
			13 => 'Importance5',
			14 => 'Importance6');

		public static function ToString($intConditionalTypeId) {
			switch ($intConditionalTypeId) {
				case 1: return 'Performance < 2';
				case 2: return 'Performance < 3';
				case 3: return 'Performance < 4';
				case 4: return 'Performance < 5';
				case 5: return 'Performance < 6';
				case 6: return 'Importance/Performance Gap > 2';
				case 7: return 'Importance/Performance Gap > 3';
				case 8: return 'Importance/Performance Gap > 4';
				case 9: return 'Importance/Performance Gap > 5';
				case 10: return 'Importance < 2';
				case 11: return 'Importance < 3';
				case 12: return 'Importance < 4';
				case 13: return 'Importance < 5';
				case 14: return 'Importance < 6';
				default:
					throw new QCallerException(sprintf('Invalid intConditionalTypeId: %s', $intConditionalTypeId));
			}
		}

		public static function ToToken($intConditionalTypeId) {
			switch ($intConditionalTypeId) {
				case 1: return 'Performance2';
				case 2: return 'Performance3';
				case 3: return 'Performance4';
				case 4: return 'Performance5';
				case 5: return 'Performance6';
				case 6: return 'ImportancePerformanceGap2';
				case 7: return 'ImportancePerformanceGap3';
				case 8: return 'ImportancePerformanceGap4';
				case 9: return 'ImportancePerformanceGap5';
				case 10: return 'Importance2';
				case 11: return 'Importance3';
				case 12: return 'Importance4';
				case 13: return 'Importance5';
				case 14: return 'Importance6';
				default:
					throw new QCallerException(sprintf('Invalid intConditionalTypeId: %s', $intConditionalTypeId));
			}
		}

	}
?>