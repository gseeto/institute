<?php
	/**
	 * The abstract ChecklistCategoriesGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the ChecklistCategories subclass which
	 * extends this ChecklistCategoriesGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the ChecklistCategories class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property string $Value the value for strValue 
	 * @property BusinessChecklistQuestions $_BusinessChecklistQuestionsAsCategory the value for the private _objBusinessChecklistQuestionsAsCategory (Read-Only) if set due to an expansion on the business_checklist_questions.category_id reverse relationship
	 * @property BusinessChecklistQuestions[] $_BusinessChecklistQuestionsAsCategoryArray the value for the private _objBusinessChecklistQuestionsAsCategoryArray (Read-Only) if set due to an ExpandAsArray on the business_checklist_questions.category_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class ChecklistCategoriesGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column checklist_categories.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column checklist_categories.value
		 * @var string strValue
		 */
		protected $strValue;
		const ValueMaxLength = 255;
		const ValueDefault = null;


		/**
		 * Private member variable that stores a reference to a single BusinessChecklistQuestionsAsCategory object
		 * (of type BusinessChecklistQuestions), if this ChecklistCategories object was restored with
		 * an expansion on the business_checklist_questions association table.
		 * @var BusinessChecklistQuestions _objBusinessChecklistQuestionsAsCategory;
		 */
		private $_objBusinessChecklistQuestionsAsCategory;

		/**
		 * Private member variable that stores a reference to an array of BusinessChecklistQuestionsAsCategory objects
		 * (of type BusinessChecklistQuestions[]), if this ChecklistCategories object was restored with
		 * an ExpandAsArray on the business_checklist_questions association table.
		 * @var BusinessChecklistQuestions[] _objBusinessChecklistQuestionsAsCategoryArray;
		 */
		private $_objBusinessChecklistQuestionsAsCategoryArray = array();

		/**
		 * Protected array of virtual attributes for this object (e.g. extra/other calculated and/or non-object bound
		 * columns from the run-time database query result for this object).  Used by InstantiateDbRow and
		 * GetVirtualAttribute.
		 * @var string[] $__strVirtualAttributeArray
		 */
		protected $__strVirtualAttributeArray = array();

		/**
		 * Protected internal member variable that specifies whether or not this object is Restored from the database.
		 * Used by Save() to determine if Save() should perform a db UPDATE or INSERT.
		 * @var bool __blnRestored;
		 */
		protected $__blnRestored;




		///////////////////////////////
		// PROTECTED MEMBER OBJECTS
		///////////////////////////////





		///////////////////////////////
		// CLASS-WIDE LOAD AND COUNT METHODS
		///////////////////////////////

		/**
		 * Static method to retrieve the Database object that owns this class.
		 * @return QDatabaseBase reference to the Database object that can query this class
		 */
		public static function GetDatabase() {
			return QApplication::$Database[1];
		}

		/**
		 * Load a ChecklistCategories from PK Info
		 * @param integer $intId
		 * @return ChecklistCategories
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return ChecklistCategories::QuerySingle(
				QQ::Equal(QQN::ChecklistCategories()->Id, $intId)
			);
		}

		/**
		 * Load all ChecklistCategorieses
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ChecklistCategories[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call ChecklistCategories::QueryArray to perform the LoadAll query
			try {
				return ChecklistCategories::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all ChecklistCategorieses
		 * @return int
		 */
		public static function CountAll() {
			// Call ChecklistCategories::QueryCount to perform the CountAll query
			return ChecklistCategories::QueryCount(QQ::All());
		}




		///////////////////////////////
		// QCODO QUERY-RELATED METHODS
		///////////////////////////////

		/**
		 * Internally called method to assist with calling Qcodo Query for this class
		 * on load methods.
		 * @param QQueryBuilder &$objQueryBuilder the QueryBuilder object that will be created
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with (sending in null will skip the PrepareStatement step)
		 * @param boolean $blnCountOnly only select a rowcount
		 * @return string the query statement
		 */
		protected static function BuildQueryStatement(&$objQueryBuilder, QQCondition $objConditions, $objOptionalClauses, $mixParameterArray, $blnCountOnly) {
			// Get the Database Object for this Class
			$objDatabase = ChecklistCategories::GetDatabase();

			// Create/Build out the QueryBuilder object with ChecklistCategories-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'checklist_categories');
			ChecklistCategories::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('checklist_categories');

			// Set "CountOnly" option (if applicable)
			if ($blnCountOnly)
				$objQueryBuilder->SetCountOnlyFlag();

			// Apply Any Conditions
			if ($objConditions)
				try {
					$objConditions->UpdateQueryBuilder($objQueryBuilder);
				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}

			// Iterate through all the Optional Clauses (if any) and perform accordingly
			if ($objOptionalClauses) {
				if ($objOptionalClauses instanceof QQClause)
					$objOptionalClauses->UpdateQueryBuilder($objQueryBuilder);
				else if (is_array($objOptionalClauses))
					foreach ($objOptionalClauses as $objClause)
						$objClause->UpdateQueryBuilder($objQueryBuilder);
				else
					throw new QCallerException('Optional Clauses must be a QQClause object or an array of QQClause objects');
			}

			// Get the SQL Statement
			$strQuery = $objQueryBuilder->GetStatement();

			// Prepare the Statement with the Query Parameters (if applicable)
			if ($mixParameterArray) {
				if (is_array($mixParameterArray)) {
					if (count($mixParameterArray))
						$strQuery = $objDatabase->PrepareStatement($strQuery, $mixParameterArray);

					// Ensure that there are no other Unresolved Named Parameters
					if (strpos($strQuery, chr(QQNamedValue::DelimiterCode) . '{') !== false)
						throw new QCallerException('Unresolved named parameters in the query');
				} else
					throw new QCallerException('Parameter Array must be an array of name-value parameter pairs');
			}

			// Return the Objects
			return $strQuery;
		}

		/**
		 * Static Qcodo Query method to query for a single ChecklistCategories object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ChecklistCategories the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ChecklistCategories::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new ChecklistCategories object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = ChecklistCategories::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
					if ($objItem) $objToReturn[] = $objItem;
				}

				if (count($objToReturn)) {
					// Since we only want the object to return, lets return the object and not the array.
					return $objToReturn[0];
				} else {
					return null;
				}
			} else {
				// No expands just return the first row
				$objDbRow = $objDbResult->GetNextRow();
				if (is_null($objDbRow)) return null;
				return ChecklistCategories::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of ChecklistCategories objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ChecklistCategories[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ChecklistCategories::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return ChecklistCategories::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
		}

		/**
		 * Static Qcodo query method to issue a query and get a cursor to progressively fetch its results.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return QDatabaseResultBase the cursor resource instance
		 */
		public static function QueryCursor(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the query statement
			try {
				$strQuery = ChecklistCategories::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
		
			// Return the results cursor
			$objDbResult->QueryBuilder = $objQueryBuilder;
			return $objDbResult;
		}

		/**
		 * Static Qcodo Query method to query for a count of ChecklistCategories objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ChecklistCategories::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and return the row_count
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Figure out if the query is using GroupBy
			$blnGrouped = false;

			if ($objOptionalClauses) foreach ($objOptionalClauses as $objClause) {
				if ($objClause instanceof QQGroupBy) {
					$blnGrouped = true;
					break;
				}
			}

			if ($blnGrouped)
				// Groups in this query - return the count of Groups (which is the count of all rows)
				return $objDbResult->CountRows();
			else {
				// No Groups - return the sql-calculated count(*) value
				$strDbRow = $objDbResult->FetchRow();
				return QType::Cast($strDbRow[0], QType::Integer);
			}
		}

/*		public static function QueryArrayCached($strConditions, $mixParameterArray = null) {
			// Get the Database Object for this Class
			$objDatabase = ChecklistCategories::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'checklist_categories_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with ChecklistCategories-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				ChecklistCategories::GetSelectFields($objQueryBuilder);
				ChecklistCategories::GetFromFields($objQueryBuilder);

				// Ensure the Passed-in Conditions is a string
				try {
					$strConditions = QType::Cast($strConditions, QType::String);
				} catch (QCallerException $objExc) {
					$objExc->IncrementOffset();
					throw $objExc;
				}

				// Create the Conditions object, and apply it
				$objConditions = eval('return ' . $strConditions . ';');

				// Apply Any Conditions
				if ($objConditions)
					$objConditions->UpdateQueryBuilder($objQueryBuilder);

				// Get the SQL Statement
				$strQuery = $objQueryBuilder->GetStatement();

				// Save the SQL Statement in the Cache
				$objCache->SaveData($strQuery);
			}

			// Prepare the Statement with the Parameters
			if ($mixParameterArray)
				$strQuery = $objDatabase->PrepareStatement($strQuery, $mixParameterArray);

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objDatabase->Query($strQuery);
			return ChecklistCategories::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this ChecklistCategories
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'checklist_categories';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'value', $strAliasPrefix . 'value');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a ChecklistCategories from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this ChecklistCategories::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return ChecklistCategories
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;

			// See if we're doing an array expansion on the previous item
			$strAlias = $strAliasPrefix . 'id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (($strExpandAsArrayNodes) && ($objPreviousItem) &&
				($objPreviousItem->intId == $objDbRow->GetColumn($strAliasName, 'Integer'))) {

				// We are.  Now, prepare to check for ExpandAsArray clauses
				$blnExpandedViaArray = false;
				if (!$strAliasPrefix)
					$strAliasPrefix = 'checklist_categories__';


				$strAlias = $strAliasPrefix . 'businesschecklistquestionsascategory__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objBusinessChecklistQuestionsAsCategoryArray)) {
						$objPreviousChildItem = $objPreviousItem->_objBusinessChecklistQuestionsAsCategoryArray[$intPreviousChildItemCount - 1];
						$objChildItem = BusinessChecklistQuestions::InstantiateDbRow($objDbRow, $strAliasPrefix . 'businesschecklistquestionsascategory__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objBusinessChecklistQuestionsAsCategoryArray[] = $objChildItem;
					} else
						$objPreviousItem->_objBusinessChecklistQuestionsAsCategoryArray[] = BusinessChecklistQuestions::InstantiateDbRow($objDbRow, $strAliasPrefix . 'businesschecklistquestionsascategory__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'checklist_categories__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the ChecklistCategories object
			$objToReturn = new ChecklistCategories();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'value', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'value'] : $strAliasPrefix . 'value';
			$objToReturn->strValue = $objDbRow->GetColumn($strAliasName, 'VarChar');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'checklist_categories__';




			// Check for BusinessChecklistQuestionsAsCategory Virtual Binding
			$strAlias = $strAliasPrefix . 'businesschecklistquestionsascategory__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objBusinessChecklistQuestionsAsCategoryArray[] = BusinessChecklistQuestions::InstantiateDbRow($objDbRow, $strAliasPrefix . 'businesschecklistquestionsascategory__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objBusinessChecklistQuestionsAsCategory = BusinessChecklistQuestions::InstantiateDbRow($objDbRow, $strAliasPrefix . 'businesschecklistquestionsascategory__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of ChecklistCategorieses from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return ChecklistCategories[]
		 */
		public static function InstantiateDbResult(QDatabaseResultBase $objDbResult, $strExpandAsArrayNodes = null, $strColumnAliasArray = null) {
			$objToReturn = array();
			
			if (!$strColumnAliasArray)
				$strColumnAliasArray = array();

			// If blank resultset, then return empty array
			if (!$objDbResult)
				return $objToReturn;

			// Load up the return array with each row
			if ($strExpandAsArrayNodes) {
				$objLastRowItem = null;
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = ChecklistCategories::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = ChecklistCategories::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single ChecklistCategories object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return ChecklistCategories next row resulting from the query
		 */
		public static function InstantiateCursor(QDatabaseResultBase $objDbResult) {
			// If blank resultset, then return empty result
			if (!$objDbResult) return null;

			// If empty resultset, then return empty result
			$objDbRow = $objDbResult->GetNextRow();
			if (!$objDbRow) return null;

			// We need the Column Aliases
			$strColumnAliasArray = $objDbResult->QueryBuilder->ColumnAliasArray;
			if (!$strColumnAliasArray) $strColumnAliasArray = array();

			// Pull Expansions (if applicable)
			$strExpandAsArrayNodes = $objDbResult->QueryBuilder->ExpandAsArrayNodes;

			// Load up the return result with a row and return it
			return ChecklistCategories::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single ChecklistCategories object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return ChecklistCategories
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return ChecklistCategories::QuerySingle(
				QQ::Equal(QQN::ChecklistCategories()->Id, $intId)
			, $objOptionalClauses
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////




		//////////////////////////////////////
		// SAVE, DELETE, RELOAD and JOURNALING
		//////////////////////////////////////

		/**
		 * Save this ChecklistCategories
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = ChecklistCategories::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `checklist_categories` (
							`value`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strValue) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('checklist_categories', 'id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`checklist_categories`
						SET
							`value` = ' . $objDatabase->SqlVariable($this->strValue) . '
						WHERE
							`id` = ' . $objDatabase->SqlVariable($this->intId) . '
					');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('UPDATE');
				}

			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Update __blnRestored and any Non-Identity PK Columns (if applicable)
			$this->__blnRestored = true;


			// Return 
			return $mixToReturn;
		}

		/**
		 * Delete this ChecklistCategories
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this ChecklistCategories with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = ChecklistCategories::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`checklist_categories`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all ChecklistCategorieses
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = ChecklistCategories::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`checklist_categories`');
		}

		/**
		 * Truncate checklist_categories table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = ChecklistCategories::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `checklist_categories`');
		}

		/**
		 * Reload this ChecklistCategories from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved ChecklistCategories object.');

			// Reload the Object
			$objReloaded = ChecklistCategories::Load($this->intId);

			// Update $this's local variables to match
			$this->strValue = $objReloaded->strValue;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = ChecklistCategories::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `checklist_categories` (
					`id`,
					`value`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->strValue) . ',
					' . (($objDatabase->JournaledById) ? $objDatabase->JournaledById : 'NULL') . ',
					' . $objDatabase->SqlVariable($strJournalCommand) . ',
					NOW()
				);
			');
		}

		/**
		 * Gets the historical journal for an object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @param integer intId
		 * @return ChecklistCategories[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = ChecklistCategories::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM checklist_categories WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return ChecklistCategories::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return ChecklistCategories[]
		 */
		public function GetJournal() {
			return ChecklistCategories::GetJournalForId($this->intId);
		}




		////////////////////
		// PUBLIC OVERRIDERS
		////////////////////

				/**
		 * Override method to perform a property "Get"
		 * This will get the value of $strName
		 *
		 * @param string $strName Name of the property to get
		 * @return mixed
		 */
		public function __get($strName) {
			switch ($strName) {
				///////////////////
				// Member Variables
				///////////////////
				case 'Id':
					// Gets the value for intId (Read-Only PK)
					// @return integer
					return $this->intId;

				case 'Value':
					// Gets the value for strValue 
					// @return string
					return $this->strValue;


				///////////////////
				// Member Objects
				///////////////////

				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_BusinessChecklistQuestionsAsCategory':
					// Gets the value for the private _objBusinessChecklistQuestionsAsCategory (Read-Only)
					// if set due to an expansion on the business_checklist_questions.category_id reverse relationship
					// @return BusinessChecklistQuestions
					return $this->_objBusinessChecklistQuestionsAsCategory;

				case '_BusinessChecklistQuestionsAsCategoryArray':
					// Gets the value for the private _objBusinessChecklistQuestionsAsCategoryArray (Read-Only)
					// if set due to an ExpandAsArray on the business_checklist_questions.category_id reverse relationship
					// @return BusinessChecklistQuestions[]
					return (array) $this->_objBusinessChecklistQuestionsAsCategoryArray;


				case '__Restored':
					return $this->__blnRestored;

				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

				/**
		 * Override method to perform a property "Set"
		 * This will set the property $strName to be $mixValue
		 *
		 * @param string $strName Name of the property to set
		 * @param string $mixValue New value of the property
		 * @return mixed
		 */
		public function __set($strName, $mixValue) {
			switch ($strName) {
				///////////////////
				// Member Variables
				///////////////////
				case 'Value':
					// Sets the value for strValue 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strValue = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				default:
					try {
						return parent::__set($strName, $mixValue);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}

		/**
		 * Lookup a VirtualAttribute value (if applicable).  Returns NULL if none found.
		 * @param string $strName
		 * @return string
		 */
		public function GetVirtualAttribute($strName) {
			if (array_key_exists($strName, $this->__strVirtualAttributeArray))
				return $this->__strVirtualAttributeArray[$strName];
			return null;
		}



		///////////////////////////////
		// ASSOCIATED OBJECTS' METHODS
		///////////////////////////////

			
		
		// Related Objects' Methods for BusinessChecklistQuestionsAsCategory
		//-------------------------------------------------------------------

		/**
		 * Gets all associated BusinessChecklistQuestionsesAsCategory as an array of BusinessChecklistQuestions objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return BusinessChecklistQuestions[]
		*/ 
		public function GetBusinessChecklistQuestionsAsCategoryArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return BusinessChecklistQuestions::LoadArrayByCategoryId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated BusinessChecklistQuestionsesAsCategory
		 * @return int
		*/ 
		public function CountBusinessChecklistQuestionsesAsCategory() {
			if ((is_null($this->intId)))
				return 0;

			return BusinessChecklistQuestions::CountByCategoryId($this->intId);
		}

		/**
		 * Associates a BusinessChecklistQuestionsAsCategory
		 * @param BusinessChecklistQuestions $objBusinessChecklistQuestions
		 * @return void
		*/ 
		public function AssociateBusinessChecklistQuestionsAsCategory(BusinessChecklistQuestions $objBusinessChecklistQuestions) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateBusinessChecklistQuestionsAsCategory on this unsaved ChecklistCategories.');
			if ((is_null($objBusinessChecklistQuestions->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateBusinessChecklistQuestionsAsCategory on this ChecklistCategories with an unsaved BusinessChecklistQuestions.');

			// Get the Database Object for this Class
			$objDatabase = ChecklistCategories::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`business_checklist_questions`
				SET
					`category_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objBusinessChecklistQuestions->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objBusinessChecklistQuestions->CategoryId = $this->intId;
				$objBusinessChecklistQuestions->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a BusinessChecklistQuestionsAsCategory
		 * @param BusinessChecklistQuestions $objBusinessChecklistQuestions
		 * @return void
		*/ 
		public function UnassociateBusinessChecklistQuestionsAsCategory(BusinessChecklistQuestions $objBusinessChecklistQuestions) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateBusinessChecklistQuestionsAsCategory on this unsaved ChecklistCategories.');
			if ((is_null($objBusinessChecklistQuestions->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateBusinessChecklistQuestionsAsCategory on this ChecklistCategories with an unsaved BusinessChecklistQuestions.');

			// Get the Database Object for this Class
			$objDatabase = ChecklistCategories::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`business_checklist_questions`
				SET
					`category_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objBusinessChecklistQuestions->Id) . ' AND
					`category_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objBusinessChecklistQuestions->CategoryId = null;
				$objBusinessChecklistQuestions->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all BusinessChecklistQuestionsesAsCategory
		 * @return void
		*/ 
		public function UnassociateAllBusinessChecklistQuestionsesAsCategory() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateBusinessChecklistQuestionsAsCategory on this unsaved ChecklistCategories.');

			// Get the Database Object for this Class
			$objDatabase = ChecklistCategories::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (BusinessChecklistQuestions::LoadArrayByCategoryId($this->intId) as $objBusinessChecklistQuestions) {
					$objBusinessChecklistQuestions->CategoryId = null;
					$objBusinessChecklistQuestions->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`business_checklist_questions`
				SET
					`category_id` = null
				WHERE
					`category_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated BusinessChecklistQuestionsAsCategory
		 * @param BusinessChecklistQuestions $objBusinessChecklistQuestions
		 * @return void
		*/ 
		public function DeleteAssociatedBusinessChecklistQuestionsAsCategory(BusinessChecklistQuestions $objBusinessChecklistQuestions) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateBusinessChecklistQuestionsAsCategory on this unsaved ChecklistCategories.');
			if ((is_null($objBusinessChecklistQuestions->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateBusinessChecklistQuestionsAsCategory on this ChecklistCategories with an unsaved BusinessChecklistQuestions.');

			// Get the Database Object for this Class
			$objDatabase = ChecklistCategories::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`business_checklist_questions`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objBusinessChecklistQuestions->Id) . ' AND
					`category_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objBusinessChecklistQuestions->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated BusinessChecklistQuestionsesAsCategory
		 * @return void
		*/ 
		public function DeleteAllBusinessChecklistQuestionsesAsCategory() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateBusinessChecklistQuestionsAsCategory on this unsaved ChecklistCategories.');

			// Get the Database Object for this Class
			$objDatabase = ChecklistCategories::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (BusinessChecklistQuestions::LoadArrayByCategoryId($this->intId) as $objBusinessChecklistQuestions) {
					$objBusinessChecklistQuestions->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`business_checklist_questions`
				WHERE
					`category_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="ChecklistCategories"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Value" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('ChecklistCategories', $strComplexTypeArray)) {
				$strComplexTypeArray['ChecklistCategories'] = ChecklistCategories::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, ChecklistCategories::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new ChecklistCategories();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'Value'))
				$objToReturn->strValue = $objSoapObject->Value;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, ChecklistCategories::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $Id
	 * @property-read QQNode $Value
	 * @property-read QQReverseReferenceNodeBusinessChecklistQuestions $BusinessChecklistQuestionsAsCategory
	 */
	class QQNodeChecklistCategories extends QQNode {
		protected $strTableName = 'checklist_categories';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'ChecklistCategories';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Value':
					return new QQNode('value', 'Value', 'string', $this);
				case 'BusinessChecklistQuestionsAsCategory':
					return new QQReverseReferenceNodeBusinessChecklistQuestions($this, 'businesschecklistquestionsascategory', 'reverse_reference', 'category_id');

				case '_PrimaryKeyNode':
					return new QQNode('id', 'Id', 'integer', $this);
				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
	}
	
	/**
	 * @property-read QQNode $Id
	 * @property-read QQNode $Value
	 * @property-read QQReverseReferenceNodeBusinessChecklistQuestions $BusinessChecklistQuestionsAsCategory
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeChecklistCategories extends QQReverseReferenceNode {
		protected $strTableName = 'checklist_categories';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'ChecklistCategories';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Value':
					return new QQNode('value', 'Value', 'string', $this);
				case 'BusinessChecklistQuestionsAsCategory':
					return new QQReverseReferenceNodeBusinessChecklistQuestions($this, 'businesschecklistquestionsascategory', 'reverse_reference', 'category_id');

				case '_PrimaryKeyNode':
					return new QQNode('id', 'Id', 'integer', $this);
				default:
					try {
						return parent::__get($strName);
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}
			}
		}
	}

?>