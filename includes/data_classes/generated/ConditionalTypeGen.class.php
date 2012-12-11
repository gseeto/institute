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

		const MaxId = 0;

		public static $NameArray = array();

		public static $TokenArray = array();

		public static function ToString($intConditionalTypeId) {
			switch ($intConditionalTypeId) {
				default:
					throw new QCallerException(sprintf('Invalid intConditionalTypeId: %s', $intConditionalTypeId));
			}
		}

		public static function ToToken($intConditionalTypeId) {
			switch ($intConditionalTypeId) {
				default:
					throw new QCallerException(sprintf('Invalid intConditionalTypeId: %s', $intConditionalTypeId));
			}
		}

	}
?>