<?php
	/**
	 * The LemonType class defined here contains
	 * code for the LemonType enumerated type.  It represents
	 * the enumerated values found in the "lemon_type" table
	 * in the database.
	 * 
	 * To use, you should use the LemonType subclass which
	 * extends this LemonTypeGen class.
	 * 
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the LemonType class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 */
	abstract class LemonTypeGen extends QBaseClass {
		const Luminary = 1;
		const Entrepreneur = 2;
		const Manager = 3;
		const Organizer = 4;
		const Networker = 5;

		const MaxId = 5;

		public static $NameArray = array(
			1 => 'Luminary',
			2 => 'Entrepreneur',
			3 => 'Manager',
			4 => 'Organizer',
			5 => 'Networker');

		public static $TokenArray = array(
			1 => 'Luminary',
			2 => 'Entrepreneur',
			3 => 'Manager',
			4 => 'Organizer',
			5 => 'Networker');

		public static function ToString($intLemonTypeId) {
			switch ($intLemonTypeId) {
				case 1: return 'Luminary';
				case 2: return 'Entrepreneur';
				case 3: return 'Manager';
				case 4: return 'Organizer';
				case 5: return 'Networker';
				default:
					throw new QCallerException(sprintf('Invalid intLemonTypeId: %s', $intLemonTypeId));
			}
		}

		public static function ToToken($intLemonTypeId) {
			switch ($intLemonTypeId) {
				case 1: return 'Luminary';
				case 2: return 'Entrepreneur';
				case 3: return 'Manager';
				case 4: return 'Organizer';
				case 5: return 'Networker';
				default:
					throw new QCallerException(sprintf('Invalid intLemonTypeId: %s', $intLemonTypeId));
			}
		}

	}
?>