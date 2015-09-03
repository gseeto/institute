<?php
	/**
	 * The abstract BusinessChecklistGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the BusinessChecklist subclass which
	 * extends this BusinessChecklistGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the BusinessChecklist class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property integer $CompanyId the value for intCompanyId 
	 * @property Company $Company the value for the Company object referenced by intCompanyId 
	 * @property User $_UserAsManager the value for the private _objUserAsManager (Read-Only) if set due to an expansion on the businesschecklist_manager_assn association table
	 * @property User[] $_UserAsManagerArray the value for the private _objUserAsManagerArray (Read-Only) if set due to an ExpandAsArray on the businesschecklist_manager_assn association table
	 * @property BusinessChecklistResults $_BusinessChecklistResultsAsChecklist the value for the private _objBusinessChecklistResultsAsChecklist (Read-Only) if set due to an expansion on the business_checklist_results.checklist_id reverse relationship
	 * @property BusinessChecklistResults[] $_BusinessChecklistResultsAsChecklistArray the value for the private _objBusinessChecklistResultsAsChecklistArray (Read-Only) if set due to an ExpandAsArray on the business_checklist_results.checklist_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class BusinessChecklistGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column business_checklist.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column business_checklist.company_id
		 * @var integer intCompanyId
		 */
		protected $intCompanyId;
		const CompanyIdDefault = null;


		/**
		 * Private member variable that stores a reference to a single UserAsManager object
		 * (of type User), if this BusinessChecklist object was restored with
		 * an expansion on the businesschecklist_manager_assn association table.
		 * @var User _objUserAsManager;
		 */
		private $_objUserAsManager;

		/**
		 * Private member variable that stores a reference to an array of UserAsManager objects
		 * (of type User[]), if this BusinessChecklist object was restored with
		 * an ExpandAsArray on the businesschecklist_manager_assn association table.
		 * @var User[] _objUserAsManagerArray;
		 */
		private $_objUserAsManagerArray = array();

		/**
		 * Private member variable that stores a reference to a single BusinessChecklistResultsAsChecklist object
		 * (of type BusinessChecklistResults), if this BusinessChecklist object was restored with
		 * an expansion on the business_checklist_results association table.
		 * @var BusinessChecklistResults _objBusinessChecklistResultsAsChecklist;
		 */
		private $_objBusinessChecklistResultsAsChecklist;

		/**
		 * Private member variable that stores a reference to an array of BusinessChecklistResultsAsChecklist objects
		 * (of type BusinessChecklistResults[]), if this BusinessChecklist object was restored with
		 * an ExpandAsArray on the business_checklist_results association table.
		 * @var BusinessChecklistResults[] _objBusinessChecklistResultsAsChecklistArray;
		 */
		private $_objBusinessChecklistResultsAsChecklistArray = array();

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

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column business_checklist.company_id.
		 *
		 * NOTE: Always use the Company property getter to correctly retrieve this Company object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Company objCompany
		 */
		protected $objCompany;





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
		 * Load a BusinessChecklist from PK Info
		 * @param integer $intId
		 * @return BusinessChecklist
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return BusinessChecklist::QuerySingle(
				QQ::Equal(QQN::BusinessChecklist()->Id, $intId)
			);
		}

		/**
		 * Load all BusinessChecklists
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return BusinessChecklist[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call BusinessChecklist::QueryArray to perform the LoadAll query
			try {
				return BusinessChecklist::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all BusinessChecklists
		 * @return int
		 */
		public static function CountAll() {
			// Call BusinessChecklist::QueryCount to perform the CountAll query
			return BusinessChecklist::QueryCount(QQ::All());
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
			$objDatabase = BusinessChecklist::GetDatabase();

			// Create/Build out the QueryBuilder object with BusinessChecklist-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'business_checklist');
			BusinessChecklist::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('business_checklist');

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
		 * Static Qcodo Query method to query for a single BusinessChecklist object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return BusinessChecklist the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = BusinessChecklist::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new BusinessChecklist object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = BusinessChecklist::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return BusinessChecklist::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of BusinessChecklist objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return BusinessChecklist[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = BusinessChecklist::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return BusinessChecklist::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = BusinessChecklist::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of BusinessChecklist objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = BusinessChecklist::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = BusinessChecklist::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'business_checklist_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with BusinessChecklist-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				BusinessChecklist::GetSelectFields($objQueryBuilder);
				BusinessChecklist::GetFromFields($objQueryBuilder);

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
			return BusinessChecklist::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this BusinessChecklist
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'business_checklist';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'company_id', $strAliasPrefix . 'company_id');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a BusinessChecklist from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this BusinessChecklist::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return BusinessChecklist
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
					$strAliasPrefix = 'business_checklist__';

				$strAlias = $strAliasPrefix . 'userasmanager__user_id__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objUserAsManagerArray)) {
						$objPreviousChildItem = $objPreviousItem->_objUserAsManagerArray[$intPreviousChildItemCount - 1];
						$objChildItem = User::InstantiateDbRow($objDbRow, $strAliasPrefix . 'userasmanager__user_id__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objUserAsManagerArray[] = $objChildItem;
					} else
						$objPreviousItem->_objUserAsManagerArray[] = User::InstantiateDbRow($objDbRow, $strAliasPrefix . 'userasmanager__user_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}


				$strAlias = $strAliasPrefix . 'businesschecklistresultsaschecklist__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objBusinessChecklistResultsAsChecklistArray)) {
						$objPreviousChildItem = $objPreviousItem->_objBusinessChecklistResultsAsChecklistArray[$intPreviousChildItemCount - 1];
						$objChildItem = BusinessChecklistResults::InstantiateDbRow($objDbRow, $strAliasPrefix . 'businesschecklistresultsaschecklist__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objBusinessChecklistResultsAsChecklistArray[] = $objChildItem;
					} else
						$objPreviousItem->_objBusinessChecklistResultsAsChecklistArray[] = BusinessChecklistResults::InstantiateDbRow($objDbRow, $strAliasPrefix . 'businesschecklistresultsaschecklist__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'business_checklist__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the BusinessChecklist object
			$objToReturn = new BusinessChecklist();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'company_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'company_id'] : $strAliasPrefix . 'company_id';
			$objToReturn->intCompanyId = $objDbRow->GetColumn($strAliasName, 'Integer');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'business_checklist__';

			// Check for Company Early Binding
			$strAlias = $strAliasPrefix . 'company_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objCompany = Company::InstantiateDbRow($objDbRow, $strAliasPrefix . 'company_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);



			// Check for UserAsManager Virtual Binding
			$strAlias = $strAliasPrefix . 'userasmanager__user_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objUserAsManagerArray[] = User::InstantiateDbRow($objDbRow, $strAliasPrefix . 'userasmanager__user_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objUserAsManager = User::InstantiateDbRow($objDbRow, $strAliasPrefix . 'userasmanager__user_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}


			// Check for BusinessChecklistResultsAsChecklist Virtual Binding
			$strAlias = $strAliasPrefix . 'businesschecklistresultsaschecklist__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objBusinessChecklistResultsAsChecklistArray[] = BusinessChecklistResults::InstantiateDbRow($objDbRow, $strAliasPrefix . 'businesschecklistresultsaschecklist__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objBusinessChecklistResultsAsChecklist = BusinessChecklistResults::InstantiateDbRow($objDbRow, $strAliasPrefix . 'businesschecklistresultsaschecklist__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of BusinessChecklists from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return BusinessChecklist[]
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
					$objItem = BusinessChecklist::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = BusinessChecklist::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single BusinessChecklist object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return BusinessChecklist next row resulting from the query
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
			return BusinessChecklist::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single BusinessChecklist object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return BusinessChecklist
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return BusinessChecklist::QuerySingle(
				QQ::Equal(QQN::BusinessChecklist()->Id, $intId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of BusinessChecklist objects,
		 * by CompanyId Index(es)
		 * @param integer $intCompanyId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return BusinessChecklist[]
		*/
		public static function LoadArrayByCompanyId($intCompanyId, $objOptionalClauses = null) {
			// Call BusinessChecklist::QueryArray to perform the LoadArrayByCompanyId query
			try {
				return BusinessChecklist::QueryArray(
					QQ::Equal(QQN::BusinessChecklist()->CompanyId, $intCompanyId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count BusinessChecklists
		 * by CompanyId Index(es)
		 * @param integer $intCompanyId
		 * @return int
		*/
		public static function CountByCompanyId($intCompanyId, $objOptionalClauses = null) {
			// Call BusinessChecklist::QueryCount to perform the CountByCompanyId query
			return BusinessChecklist::QueryCount(
				QQ::Equal(QQN::BusinessChecklist()->CompanyId, $intCompanyId)
			, $objOptionalClauses
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////
			/**
		 * Load an array of User objects for a given UserAsManager
		 * via the businesschecklist_manager_assn table
		 * @param integer $intUserId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return BusinessChecklist[]
		*/
		public static function LoadArrayByUserAsManager($intUserId, $objOptionalClauses = null) {
			// Call BusinessChecklist::QueryArray to perform the LoadArrayByUserAsManager query
			try {
				return BusinessChecklist::QueryArray(
					QQ::Equal(QQN::BusinessChecklist()->UserAsManager->UserId, $intUserId),
					$objOptionalClauses
				);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count BusinessChecklists for a given UserAsManager
		 * via the businesschecklist_manager_assn table
		 * @param integer $intUserId
		 * @return int
		*/
		public static function CountByUserAsManager($intUserId, $objOptionalClauses = null) {
			return BusinessChecklist::QueryCount(
				QQ::Equal(QQN::BusinessChecklist()->UserAsManager->UserId, $intUserId),
				$objOptionalClauses
			);
		}




		//////////////////////////////////////
		// SAVE, DELETE, RELOAD and JOURNALING
		//////////////////////////////////////

		/**
		 * Save this BusinessChecklist
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = BusinessChecklist::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `business_checklist` (
							`company_id`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intCompanyId) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('business_checklist', 'id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`business_checklist`
						SET
							`company_id` = ' . $objDatabase->SqlVariable($this->intCompanyId) . '
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
		 * Delete this BusinessChecklist
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this BusinessChecklist with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = BusinessChecklist::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`business_checklist`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all BusinessChecklists
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = BusinessChecklist::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`business_checklist`');
		}

		/**
		 * Truncate business_checklist table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = BusinessChecklist::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `business_checklist`');
		}

		/**
		 * Reload this BusinessChecklist from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved BusinessChecklist object.');

			// Reload the Object
			$objReloaded = BusinessChecklist::Load($this->intId);

			// Update $this's local variables to match
			$this->CompanyId = $objReloaded->CompanyId;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = BusinessChecklist::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `business_checklist` (
					`id`,
					`company_id`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->intCompanyId) . ',
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
		 * @return BusinessChecklist[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = BusinessChecklist::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM business_checklist WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return BusinessChecklist::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return BusinessChecklist[]
		 */
		public function GetJournal() {
			return BusinessChecklist::GetJournalForId($this->intId);
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

				case 'CompanyId':
					// Gets the value for intCompanyId 
					// @return integer
					return $this->intCompanyId;


				///////////////////
				// Member Objects
				///////////////////
				case 'Company':
					// Gets the value for the Company object referenced by intCompanyId 
					// @return Company
					try {
						if ((!$this->objCompany) && (!is_null($this->intCompanyId)))
							$this->objCompany = Company::Load($this->intCompanyId);
						return $this->objCompany;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_UserAsManager':
					// Gets the value for the private _objUserAsManager (Read-Only)
					// if set due to an expansion on the businesschecklist_manager_assn association table
					// @return User
					return $this->_objUserAsManager;

				case '_UserAsManagerArray':
					// Gets the value for the private _objUserAsManagerArray (Read-Only)
					// if set due to an ExpandAsArray on the businesschecklist_manager_assn association table
					// @return User[]
					return (array) $this->_objUserAsManagerArray;

				case '_BusinessChecklistResultsAsChecklist':
					// Gets the value for the private _objBusinessChecklistResultsAsChecklist (Read-Only)
					// if set due to an expansion on the business_checklist_results.checklist_id reverse relationship
					// @return BusinessChecklistResults
					return $this->_objBusinessChecklistResultsAsChecklist;

				case '_BusinessChecklistResultsAsChecklistArray':
					// Gets the value for the private _objBusinessChecklistResultsAsChecklistArray (Read-Only)
					// if set due to an ExpandAsArray on the business_checklist_results.checklist_id reverse relationship
					// @return BusinessChecklistResults[]
					return (array) $this->_objBusinessChecklistResultsAsChecklistArray;


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
				case 'CompanyId':
					// Sets the value for intCompanyId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objCompany = null;
						return ($this->intCompanyId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Company':
					// Sets the value for the Company object referenced by intCompanyId 
					// @param Company $mixValue
					// @return Company
					if (is_null($mixValue)) {
						$this->intCompanyId = null;
						$this->objCompany = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Company object
						try {
							$mixValue = QType::Cast($mixValue, 'Company');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Company object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Company for this BusinessChecklist');

						// Update Local Member Variables
						$this->objCompany = $mixValue;
						$this->intCompanyId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

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

			
		
		// Related Objects' Methods for BusinessChecklistResultsAsChecklist
		//-------------------------------------------------------------------

		/**
		 * Gets all associated BusinessChecklistResultsesAsChecklist as an array of BusinessChecklistResults objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return BusinessChecklistResults[]
		*/ 
		public function GetBusinessChecklistResultsAsChecklistArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return BusinessChecklistResults::LoadArrayByChecklistId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated BusinessChecklistResultsesAsChecklist
		 * @return int
		*/ 
		public function CountBusinessChecklistResultsesAsChecklist() {
			if ((is_null($this->intId)))
				return 0;

			return BusinessChecklistResults::CountByChecklistId($this->intId);
		}

		/**
		 * Associates a BusinessChecklistResultsAsChecklist
		 * @param BusinessChecklistResults $objBusinessChecklistResults
		 * @return void
		*/ 
		public function AssociateBusinessChecklistResultsAsChecklist(BusinessChecklistResults $objBusinessChecklistResults) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateBusinessChecklistResultsAsChecklist on this unsaved BusinessChecklist.');
			if ((is_null($objBusinessChecklistResults->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateBusinessChecklistResultsAsChecklist on this BusinessChecklist with an unsaved BusinessChecklistResults.');

			// Get the Database Object for this Class
			$objDatabase = BusinessChecklist::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`business_checklist_results`
				SET
					`checklist_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objBusinessChecklistResults->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objBusinessChecklistResults->ChecklistId = $this->intId;
				$objBusinessChecklistResults->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a BusinessChecklistResultsAsChecklist
		 * @param BusinessChecklistResults $objBusinessChecklistResults
		 * @return void
		*/ 
		public function UnassociateBusinessChecklistResultsAsChecklist(BusinessChecklistResults $objBusinessChecklistResults) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateBusinessChecklistResultsAsChecklist on this unsaved BusinessChecklist.');
			if ((is_null($objBusinessChecklistResults->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateBusinessChecklistResultsAsChecklist on this BusinessChecklist with an unsaved BusinessChecklistResults.');

			// Get the Database Object for this Class
			$objDatabase = BusinessChecklist::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`business_checklist_results`
				SET
					`checklist_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objBusinessChecklistResults->Id) . ' AND
					`checklist_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objBusinessChecklistResults->ChecklistId = null;
				$objBusinessChecklistResults->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all BusinessChecklistResultsesAsChecklist
		 * @return void
		*/ 
		public function UnassociateAllBusinessChecklistResultsesAsChecklist() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateBusinessChecklistResultsAsChecklist on this unsaved BusinessChecklist.');

			// Get the Database Object for this Class
			$objDatabase = BusinessChecklist::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (BusinessChecklistResults::LoadArrayByChecklistId($this->intId) as $objBusinessChecklistResults) {
					$objBusinessChecklistResults->ChecklistId = null;
					$objBusinessChecklistResults->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`business_checklist_results`
				SET
					`checklist_id` = null
				WHERE
					`checklist_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated BusinessChecklistResultsAsChecklist
		 * @param BusinessChecklistResults $objBusinessChecklistResults
		 * @return void
		*/ 
		public function DeleteAssociatedBusinessChecklistResultsAsChecklist(BusinessChecklistResults $objBusinessChecklistResults) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateBusinessChecklistResultsAsChecklist on this unsaved BusinessChecklist.');
			if ((is_null($objBusinessChecklistResults->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateBusinessChecklistResultsAsChecklist on this BusinessChecklist with an unsaved BusinessChecklistResults.');

			// Get the Database Object for this Class
			$objDatabase = BusinessChecklist::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`business_checklist_results`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objBusinessChecklistResults->Id) . ' AND
					`checklist_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objBusinessChecklistResults->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated BusinessChecklistResultsesAsChecklist
		 * @return void
		*/ 
		public function DeleteAllBusinessChecklistResultsesAsChecklist() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateBusinessChecklistResultsAsChecklist on this unsaved BusinessChecklist.');

			// Get the Database Object for this Class
			$objDatabase = BusinessChecklist::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (BusinessChecklistResults::LoadArrayByChecklistId($this->intId) as $objBusinessChecklistResults) {
					$objBusinessChecklistResults->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`business_checklist_results`
				WHERE
					`checklist_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		// Related Many-to-Many Objects' Methods for UserAsManager
		//-------------------------------------------------------------------

		/**
		 * Gets all many-to-many associated UsersAsManager as an array of User objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return User[]
		*/ 
		public function GetUserAsManagerArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return User::LoadArrayByBusinessChecklistAsManager($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all many-to-many associated UsersAsManager
		 * @return int
		*/ 
		public function CountUsersAsManager() {
			if ((is_null($this->intId)))
				return 0;

			return User::CountByBusinessChecklistAsManager($this->intId);
		}

		/**
		 * Checks to see if an association exists with a specific UserAsManager
		 * @param User $objUser
		 * @return bool
		*/
		public function IsUserAsManagerAssociated(User $objUser) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsUserAsManagerAssociated on this unsaved BusinessChecklist.');
			if ((is_null($objUser->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsUserAsManagerAssociated on this BusinessChecklist with an unsaved User.');

			$intRowCount = BusinessChecklist::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::BusinessChecklist()->Id, $this->intId),
					QQ::Equal(QQN::BusinessChecklist()->UserAsManager->UserId, $objUser->Id)
				)
			);

			return ($intRowCount > 0);
		}

		/**
		 * Journals the UserAsManager relationship into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function JournalUserAsManagerAssociation($intAssociatedId, $strJournalCommand) {
			$objDatabase = BusinessChecklist::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `businesschecklist_manager_assn` (
					`business_checklist_id`,
					`user_id`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($intAssociatedId) . ',
					' . (($objDatabase->JournaledById) ? $objDatabase->JournaledById : 'NULL') . ',
					' . $objDatabase->SqlVariable($strJournalCommand) . ',
					NOW()
				);
			');
		}

		/**
		 * Gets the historical journal for an object's UserAsManager relationship from the log database.
		 * @param integer intId
		 * @return QDatabaseResult $objResult
		 */
		public static function GetJournalUserAsManagerAssociationForId($intId) {
			$objDatabase = BusinessChecklist::GetDatabase()->JournalingDatabase;

			return $objDatabase->Query('SELECT * FROM businesschecklist_manager_assn WHERE business_checklist_id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');
		}

		/**
		 * Gets the historical journal for this object's UserAsManager relationship from the log database.
		 * @return QDatabaseResult $objResult
		 */
		public function GetJournalUserAsManagerAssociation() {
			return BusinessChecklist::GetJournalUserAsManagerAssociationForId($this->intId);
		}

		/**
		 * Associates a UserAsManager
		 * @param User $objUser
		 * @return void
		*/ 
		public function AssociateUserAsManager(User $objUser) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateUserAsManager on this unsaved BusinessChecklist.');
			if ((is_null($objUser->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateUserAsManager on this BusinessChecklist with an unsaved User.');

			// Get the Database Object for this Class
			$objDatabase = BusinessChecklist::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				INSERT INTO `businesschecklist_manager_assn` (
					`business_checklist_id`,
					`user_id`
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($objUser->Id) . '
				)
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase)
				$this->JournalUserAsManagerAssociation($objUser->Id, 'INSERT');
		}

		/**
		 * Unassociates a UserAsManager
		 * @param User $objUser
		 * @return void
		*/ 
		public function UnassociateUserAsManager(User $objUser) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUserAsManager on this unsaved BusinessChecklist.');
			if ((is_null($objUser->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUserAsManager on this BusinessChecklist with an unsaved User.');

			// Get the Database Object for this Class
			$objDatabase = BusinessChecklist::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`businesschecklist_manager_assn`
				WHERE
					`business_checklist_id` = ' . $objDatabase->SqlVariable($this->intId) . ' AND
					`user_id` = ' . $objDatabase->SqlVariable($objUser->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase)
				$this->JournalUserAsManagerAssociation($objUser->Id, 'DELETE');
		}

		/**
		 * Unassociates all UsersAsManager
		 * @return void
		*/ 
		public function UnassociateAllUsersAsManager() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAllUserAsManagerArray on this unsaved BusinessChecklist.');

			// Get the Database Object for this Class
			$objDatabase = BusinessChecklist::GetDatabase();

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objResult = $objDatabase->Query('SELECT `user_id` AS associated_id FROM `businesschecklist_manager_assn` WHERE `business_checklist_id` = ' . $objDatabase->SqlVariable($this->intId));
				while ($objRow = $objResult->GetNextRow()) {
					$this->JournalUserAsManagerAssociation($objRow->GetColumn('associated_id'), 'DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`businesschecklist_manager_assn`
				WHERE
					`business_checklist_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}




		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="BusinessChecklist"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Company" type="xsd1:Company"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('BusinessChecklist', $strComplexTypeArray)) {
				$strComplexTypeArray['BusinessChecklist'] = BusinessChecklist::GetSoapComplexTypeXml();
				Company::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, BusinessChecklist::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new BusinessChecklist();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'Company')) &&
				($objSoapObject->Company))
				$objToReturn->Company = Company::GetObjectFromSoapObject($objSoapObject->Company);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, BusinessChecklist::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objCompany)
				$objObject->objCompany = Company::GetSoapObjectFromObject($objObject->objCompany, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCompanyId = null;
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $UserId
	 * @property-read QQNodeUser $User
	 * @property-read QQNodeUser $_ChildTableNode
	 */
	class QQNodeBusinessChecklistUserAsManager extends QQAssociationNode {
		protected $strType = 'association';
		protected $strName = 'userasmanager';

		protected $strTableName = 'businesschecklist_manager_assn';
		protected $strPrimaryKey = 'business_checklist_id';
		protected $strClassName = 'User';

		public function __get($strName) {
			switch ($strName) {
				case 'UserId':
					return new QQNode('user_id', 'UserId', 'integer', $this);
				case 'User':
					return new QQNodeUser('user_id', 'UserId', 'integer', $this);
				case '_ChildTableNode':
					return new QQNodeUser('user_id', 'UserId', 'integer', $this);
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
	 * @property-read QQNode $CompanyId
	 * @property-read QQNodeCompany $Company
	 * @property-read QQNodeBusinessChecklistUserAsManager $UserAsManager
	 * @property-read QQReverseReferenceNodeBusinessChecklistResults $BusinessChecklistResultsAsChecklist
	 */
	class QQNodeBusinessChecklist extends QQNode {
		protected $strTableName = 'business_checklist';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'BusinessChecklist';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'CompanyId':
					return new QQNode('company_id', 'CompanyId', 'integer', $this);
				case 'Company':
					return new QQNodeCompany('company_id', 'Company', 'integer', $this);
				case 'UserAsManager':
					return new QQNodeBusinessChecklistUserAsManager($this);
				case 'BusinessChecklistResultsAsChecklist':
					return new QQReverseReferenceNodeBusinessChecklistResults($this, 'businesschecklistresultsaschecklist', 'reverse_reference', 'checklist_id');

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
	 * @property-read QQNode $CompanyId
	 * @property-read QQNodeCompany $Company
	 * @property-read QQNodeBusinessChecklistUserAsManager $UserAsManager
	 * @property-read QQReverseReferenceNodeBusinessChecklistResults $BusinessChecklistResultsAsChecklist
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeBusinessChecklist extends QQReverseReferenceNode {
		protected $strTableName = 'business_checklist';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'BusinessChecklist';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'CompanyId':
					return new QQNode('company_id', 'CompanyId', 'integer', $this);
				case 'Company':
					return new QQNodeCompany('company_id', 'Company', 'integer', $this);
				case 'UserAsManager':
					return new QQNodeBusinessChecklistUserAsManager($this);
				case 'BusinessChecklistResultsAsChecklist':
					return new QQReverseReferenceNodeBusinessChecklistResults($this, 'businesschecklistresultsaschecklist', 'reverse_reference', 'checklist_id');

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