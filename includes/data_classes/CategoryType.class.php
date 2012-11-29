<?php
	require(__DATAGEN_CLASSES__ . '/CategoryTypeGen.class.php');

	/**
	 * The CategoryType class defined here contains any
	 * customized code for the CategoryType enumerated type. 
	 * 
	 * It represents the enumerated values found in the "category_type" table in the database,
	 * and extends from the code generated abstract CategoryTypeGen
	 * class, which contains all the values extracted from the database.
	 * 
	 * Type classes which are generally used to attach a type to data object.
	 * However, they may be used as simple database indepedant enumerated type.
	 * 
	 * @package My Application
	 * @subpackage DataObjects
	 */
	abstract class CategoryType extends CategoryTypeGen {
	}
?>