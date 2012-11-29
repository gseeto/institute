<?php
	/**
	 * The StatusType class defined here contains
	 * code for the StatusType enumerated type.  It represents
	 * the enumerated values found in the "status_type" table
	 * in the database.
	 * 
	 * To use, you should use the StatusType subclass which
	 * extends this StatusTypeGen class.
	 * 
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the StatusType class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 */
	abstract class StatusTypeGen extends QBaseClass {
		const _0 = 1;
		const _25 = 2;
		const _50 = 3;
		const _75 = 4;
		const _100 = 5;
		const Recurring = 6;

		const MaxId = 6;

		public static $NameArray = array(
			1 => '0%',
			2 => '25%',
			3 => '50%',
			4 => '75%',
			5 => '100%',
			6 => 'Recurring');

		public static $TokenArray = array(
			1 => '_0',
			2 => '_25',
			3 => '_50',
			4 => '_75',
			5 => '_100',
			6 => 'Recurring');

		public static function ToString($intStatusTypeId) {
			switch ($intStatusTypeId) {
				case 1: return '0%';
				case 2: return '25%';
				case 3: return '50%';
				case 4: return '75%';
				case 5: return '100%';
				case 6: return 'Recurring';
				default:
					throw new QCallerException(sprintf('Invalid intStatusTypeId: %s', $intStatusTypeId));
			}
		}

		public static function ToToken($intStatusTypeId) {
			switch ($intStatusTypeId) {
				case 1: return '_0';
				case 2: return '_25';
				case 3: return '_50';
				case 4: return '_75';
				case 5: return '_100';
				case 6: return 'Recurring';
				default:
					throw new QCallerException(sprintf('Invalid intStatusTypeId: %s', $intStatusTypeId));
			}
		}

	}
?>