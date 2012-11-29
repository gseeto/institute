<?php
	/**
	 * The abstract ResourceStatusGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the ResourceStatus subclass which
	 * extends this ResourceStatusGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the ResourceStatus class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property string $Value the value for strValue 
	 * @property KingdomBusinessAssessment $_KingdomBusinessAssessment the value for the private _objKingdomBusinessAssessment (Read-Only) if set due to an expansion on the kingdom_business_assessment.resource_status_id reverse relationship
	 * @property KingdomBusinessAssessment[] $_KingdomBusinessAssessmentArray the value for the private _objKingdomBusinessAssessmentArray (Read-Only) if set due to an ExpandAsArray on the kingdom_business_assessment.resource_status_id reverse relationship
	 * @property TenPAssessment $_TenPAssessment the value for the private _objTenPAssessment (Read-Only) if set due to an expansion on the ten_p_assessment.resource_status_id reverse relationship
	 * @property TenPAssessment[] $_TenPAssessmentArray the value for the private _objTenPAssessmentArray (Read-Only) if set due to an ExpandAsArray on the ten_p_assessment.resource_status_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class ResourceStatusGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column resource_status.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column resource_status.value
		 * @var string strValue
		 */
		protected $strValue;
		const ValueMaxLength = 255;
		const ValueDefault = null;


		/**
		 * Private member variable that stores a reference to a single KingdomBusinessAssessment object
		 * (of type KingdomBusinessAssessment), if this ResourceStatus object was restored with
		 * an expansion on the kingdom_business_assessment association table.
		 * @var KingdomBusinessAssessment _objKingdomBusinessAssessment;
		 */
		private $_objKingdomBusinessAssessment;

		/**
		 * Private member variable that stores a reference to an array of KingdomBusinessAssessment objects
		 * (of type KingdomBusinessAssessment[]), if this ResourceStatus object was restored with
		 * an ExpandAsArray on the kingdom_business_assessment association table.
		 * @var KingdomBusinessAssessment[] _objKingdomBusinessAssessmentArray;
		 */
		private $_objKingdomBusinessAssessmentArray = array();

		/**
		 * Private member variable that stores a reference to a single TenPAssessment object
		 * (of type TenPAssessment), if this ResourceStatus object was restored with
		 * an expansion on the ten_p_assessment association table.
		 * @var TenPAssessment _objTenPAssessment;
		 */
		private $_objTenPAssessment;

		/**
		 * Private member variable that stores a reference to an array of TenPAssessment objects
		 * (of type TenPAssessment[]), if this ResourceStatus object was restored with
		 * an ExpandAsArray on the ten_p_assessment association table.
		 * @var TenPAssessment[] _objTenPAssessmentArray;
		 */
		private $_objTenPAssessmentArray = array();

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
		 * Load a ResourceStatus from PK Info
		 * @param integer $intId
		 * @return ResourceStatus
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return ResourceStatus::QuerySingle(
				QQ::Equal(QQN::ResourceStatus()->Id, $intId)
			);
		}

		/**
		 * Load all ResourceStatuses
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ResourceStatus[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call ResourceStatus::QueryArray to perform the LoadAll query
			try {
				return ResourceStatus::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all ResourceStatuses
		 * @return int
		 */
		public static function CountAll() {
			// Call ResourceStatus::QueryCount to perform the CountAll query
			return ResourceStatus::QueryCount(QQ::All());
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
			$objDatabase = ResourceStatus::GetDatabase();

			// Create/Build out the QueryBuilder object with ResourceStatus-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'resource_status');
			ResourceStatus::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('resource_status');

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
		 * Static Qcodo Query method to query for a single ResourceStatus object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ResourceStatus the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ResourceStatus::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new ResourceStatus object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = ResourceStatus::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return ResourceStatus::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of ResourceStatus objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ResourceStatus[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ResourceStatus::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return ResourceStatus::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = ResourceStatus::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of ResourceStatus objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ResourceStatus::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = ResourceStatus::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'resource_status_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with ResourceStatus-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				ResourceStatus::GetSelectFields($objQueryBuilder);
				ResourceStatus::GetFromFields($objQueryBuilder);

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
			return ResourceStatus::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this ResourceStatus
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'resource_status';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'value', $strAliasPrefix . 'value');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a ResourceStatus from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this ResourceStatus::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return ResourceStatus
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
					$strAliasPrefix = 'resource_status__';


				$strAlias = $strAliasPrefix . 'kingdombusinessassessment__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objKingdomBusinessAssessmentArray)) {
						$objPreviousChildItem = $objPreviousItem->_objKingdomBusinessAssessmentArray[$intPreviousChildItemCount - 1];
						$objChildItem = KingdomBusinessAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'kingdombusinessassessment__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objKingdomBusinessAssessmentArray[] = $objChildItem;
					} else
						$objPreviousItem->_objKingdomBusinessAssessmentArray[] = KingdomBusinessAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'kingdombusinessassessment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'tenpassessment__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objTenPAssessmentArray)) {
						$objPreviousChildItem = $objPreviousItem->_objTenPAssessmentArray[$intPreviousChildItemCount - 1];
						$objChildItem = TenPAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'tenpassessment__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objTenPAssessmentArray[] = $objChildItem;
					} else
						$objPreviousItem->_objTenPAssessmentArray[] = TenPAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'tenpassessment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'resource_status__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the ResourceStatus object
			$objToReturn = new ResourceStatus();
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
				$strAliasPrefix = 'resource_status__';




			// Check for KingdomBusinessAssessment Virtual Binding
			$strAlias = $strAliasPrefix . 'kingdombusinessassessment__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objKingdomBusinessAssessmentArray[] = KingdomBusinessAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'kingdombusinessassessment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objKingdomBusinessAssessment = KingdomBusinessAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'kingdombusinessassessment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for TenPAssessment Virtual Binding
			$strAlias = $strAliasPrefix . 'tenpassessment__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objTenPAssessmentArray[] = TenPAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'tenpassessment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objTenPAssessment = TenPAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'tenpassessment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of ResourceStatuses from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return ResourceStatus[]
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
					$objItem = ResourceStatus::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = ResourceStatus::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single ResourceStatus object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return ResourceStatus next row resulting from the query
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
			return ResourceStatus::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single ResourceStatus object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return ResourceStatus
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return ResourceStatus::QuerySingle(
				QQ::Equal(QQN::ResourceStatus()->Id, $intId)
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
		 * Save this ResourceStatus
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = ResourceStatus::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `resource_status` (
							`value`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strValue) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('resource_status', 'id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`resource_status`
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
		 * Delete this ResourceStatus
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this ResourceStatus with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = ResourceStatus::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`resource_status`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all ResourceStatuses
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = ResourceStatus::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`resource_status`');
		}

		/**
		 * Truncate resource_status table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = ResourceStatus::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `resource_status`');
		}

		/**
		 * Reload this ResourceStatus from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved ResourceStatus object.');

			// Reload the Object
			$objReloaded = ResourceStatus::Load($this->intId);

			// Update $this's local variables to match
			$this->strValue = $objReloaded->strValue;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = ResourceStatus::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `resource_status` (
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
		 * @return ResourceStatus[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = ResourceStatus::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM resource_status WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return ResourceStatus::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return ResourceStatus[]
		 */
		public function GetJournal() {
			return ResourceStatus::GetJournalForId($this->intId);
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

				case '_KingdomBusinessAssessment':
					// Gets the value for the private _objKingdomBusinessAssessment (Read-Only)
					// if set due to an expansion on the kingdom_business_assessment.resource_status_id reverse relationship
					// @return KingdomBusinessAssessment
					return $this->_objKingdomBusinessAssessment;

				case '_KingdomBusinessAssessmentArray':
					// Gets the value for the private _objKingdomBusinessAssessmentArray (Read-Only)
					// if set due to an ExpandAsArray on the kingdom_business_assessment.resource_status_id reverse relationship
					// @return KingdomBusinessAssessment[]
					return (array) $this->_objKingdomBusinessAssessmentArray;

				case '_TenPAssessment':
					// Gets the value for the private _objTenPAssessment (Read-Only)
					// if set due to an expansion on the ten_p_assessment.resource_status_id reverse relationship
					// @return TenPAssessment
					return $this->_objTenPAssessment;

				case '_TenPAssessmentArray':
					// Gets the value for the private _objTenPAssessmentArray (Read-Only)
					// if set due to an ExpandAsArray on the ten_p_assessment.resource_status_id reverse relationship
					// @return TenPAssessment[]
					return (array) $this->_objTenPAssessmentArray;


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

			
		
		// Related Objects' Methods for KingdomBusinessAssessment
		//-------------------------------------------------------------------

		/**
		 * Gets all associated KingdomBusinessAssessments as an array of KingdomBusinessAssessment objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return KingdomBusinessAssessment[]
		*/ 
		public function GetKingdomBusinessAssessmentArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return KingdomBusinessAssessment::LoadArrayByResourceStatusId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated KingdomBusinessAssessments
		 * @return int
		*/ 
		public function CountKingdomBusinessAssessments() {
			if ((is_null($this->intId)))
				return 0;

			return KingdomBusinessAssessment::CountByResourceStatusId($this->intId);
		}

		/**
		 * Associates a KingdomBusinessAssessment
		 * @param KingdomBusinessAssessment $objKingdomBusinessAssessment
		 * @return void
		*/ 
		public function AssociateKingdomBusinessAssessment(KingdomBusinessAssessment $objKingdomBusinessAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateKingdomBusinessAssessment on this unsaved ResourceStatus.');
			if ((is_null($objKingdomBusinessAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateKingdomBusinessAssessment on this ResourceStatus with an unsaved KingdomBusinessAssessment.');

			// Get the Database Object for this Class
			$objDatabase = ResourceStatus::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`kingdom_business_assessment`
				SET
					`resource_status_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objKingdomBusinessAssessment->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objKingdomBusinessAssessment->ResourceStatusId = $this->intId;
				$objKingdomBusinessAssessment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a KingdomBusinessAssessment
		 * @param KingdomBusinessAssessment $objKingdomBusinessAssessment
		 * @return void
		*/ 
		public function UnassociateKingdomBusinessAssessment(KingdomBusinessAssessment $objKingdomBusinessAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateKingdomBusinessAssessment on this unsaved ResourceStatus.');
			if ((is_null($objKingdomBusinessAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateKingdomBusinessAssessment on this ResourceStatus with an unsaved KingdomBusinessAssessment.');

			// Get the Database Object for this Class
			$objDatabase = ResourceStatus::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`kingdom_business_assessment`
				SET
					`resource_status_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objKingdomBusinessAssessment->Id) . ' AND
					`resource_status_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objKingdomBusinessAssessment->ResourceStatusId = null;
				$objKingdomBusinessAssessment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all KingdomBusinessAssessments
		 * @return void
		*/ 
		public function UnassociateAllKingdomBusinessAssessments() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateKingdomBusinessAssessment on this unsaved ResourceStatus.');

			// Get the Database Object for this Class
			$objDatabase = ResourceStatus::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (KingdomBusinessAssessment::LoadArrayByResourceStatusId($this->intId) as $objKingdomBusinessAssessment) {
					$objKingdomBusinessAssessment->ResourceStatusId = null;
					$objKingdomBusinessAssessment->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`kingdom_business_assessment`
				SET
					`resource_status_id` = null
				WHERE
					`resource_status_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated KingdomBusinessAssessment
		 * @param KingdomBusinessAssessment $objKingdomBusinessAssessment
		 * @return void
		*/ 
		public function DeleteAssociatedKingdomBusinessAssessment(KingdomBusinessAssessment $objKingdomBusinessAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateKingdomBusinessAssessment on this unsaved ResourceStatus.');
			if ((is_null($objKingdomBusinessAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateKingdomBusinessAssessment on this ResourceStatus with an unsaved KingdomBusinessAssessment.');

			// Get the Database Object for this Class
			$objDatabase = ResourceStatus::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`kingdom_business_assessment`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objKingdomBusinessAssessment->Id) . ' AND
					`resource_status_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objKingdomBusinessAssessment->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated KingdomBusinessAssessments
		 * @return void
		*/ 
		public function DeleteAllKingdomBusinessAssessments() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateKingdomBusinessAssessment on this unsaved ResourceStatus.');

			// Get the Database Object for this Class
			$objDatabase = ResourceStatus::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (KingdomBusinessAssessment::LoadArrayByResourceStatusId($this->intId) as $objKingdomBusinessAssessment) {
					$objKingdomBusinessAssessment->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`kingdom_business_assessment`
				WHERE
					`resource_status_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for TenPAssessment
		//-------------------------------------------------------------------

		/**
		 * Gets all associated TenPAssessments as an array of TenPAssessment objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return TenPAssessment[]
		*/ 
		public function GetTenPAssessmentArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return TenPAssessment::LoadArrayByResourceStatusId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated TenPAssessments
		 * @return int
		*/ 
		public function CountTenPAssessments() {
			if ((is_null($this->intId)))
				return 0;

			return TenPAssessment::CountByResourceStatusId($this->intId);
		}

		/**
		 * Associates a TenPAssessment
		 * @param TenPAssessment $objTenPAssessment
		 * @return void
		*/ 
		public function AssociateTenPAssessment(TenPAssessment $objTenPAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateTenPAssessment on this unsaved ResourceStatus.');
			if ((is_null($objTenPAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateTenPAssessment on this ResourceStatus with an unsaved TenPAssessment.');

			// Get the Database Object for this Class
			$objDatabase = ResourceStatus::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`ten_p_assessment`
				SET
					`resource_status_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objTenPAssessment->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objTenPAssessment->ResourceStatusId = $this->intId;
				$objTenPAssessment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a TenPAssessment
		 * @param TenPAssessment $objTenPAssessment
		 * @return void
		*/ 
		public function UnassociateTenPAssessment(TenPAssessment $objTenPAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTenPAssessment on this unsaved ResourceStatus.');
			if ((is_null($objTenPAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTenPAssessment on this ResourceStatus with an unsaved TenPAssessment.');

			// Get the Database Object for this Class
			$objDatabase = ResourceStatus::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`ten_p_assessment`
				SET
					`resource_status_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objTenPAssessment->Id) . ' AND
					`resource_status_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objTenPAssessment->ResourceStatusId = null;
				$objTenPAssessment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all TenPAssessments
		 * @return void
		*/ 
		public function UnassociateAllTenPAssessments() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTenPAssessment on this unsaved ResourceStatus.');

			// Get the Database Object for this Class
			$objDatabase = ResourceStatus::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (TenPAssessment::LoadArrayByResourceStatusId($this->intId) as $objTenPAssessment) {
					$objTenPAssessment->ResourceStatusId = null;
					$objTenPAssessment->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`ten_p_assessment`
				SET
					`resource_status_id` = null
				WHERE
					`resource_status_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated TenPAssessment
		 * @param TenPAssessment $objTenPAssessment
		 * @return void
		*/ 
		public function DeleteAssociatedTenPAssessment(TenPAssessment $objTenPAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTenPAssessment on this unsaved ResourceStatus.');
			if ((is_null($objTenPAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTenPAssessment on this ResourceStatus with an unsaved TenPAssessment.');

			// Get the Database Object for this Class
			$objDatabase = ResourceStatus::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`ten_p_assessment`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objTenPAssessment->Id) . ' AND
					`resource_status_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objTenPAssessment->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated TenPAssessments
		 * @return void
		*/ 
		public function DeleteAllTenPAssessments() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTenPAssessment on this unsaved ResourceStatus.');

			// Get the Database Object for this Class
			$objDatabase = ResourceStatus::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (TenPAssessment::LoadArrayByResourceStatusId($this->intId) as $objTenPAssessment) {
					$objTenPAssessment->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`ten_p_assessment`
				WHERE
					`resource_status_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="ResourceStatus"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Value" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('ResourceStatus', $strComplexTypeArray)) {
				$strComplexTypeArray['ResourceStatus'] = ResourceStatus::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, ResourceStatus::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new ResourceStatus();
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
				array_push($objArrayToReturn, ResourceStatus::GetSoapObjectFromObject($objObject, true));

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
	 * @property-read QQReverseReferenceNodeKingdomBusinessAssessment $KingdomBusinessAssessment
	 * @property-read QQReverseReferenceNodeTenPAssessment $TenPAssessment
	 */
	class QQNodeResourceStatus extends QQNode {
		protected $strTableName = 'resource_status';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'ResourceStatus';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Value':
					return new QQNode('value', 'Value', 'string', $this);
				case 'KingdomBusinessAssessment':
					return new QQReverseReferenceNodeKingdomBusinessAssessment($this, 'kingdombusinessassessment', 'reverse_reference', 'resource_status_id');
				case 'TenPAssessment':
					return new QQReverseReferenceNodeTenPAssessment($this, 'tenpassessment', 'reverse_reference', 'resource_status_id');

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
	 * @property-read QQReverseReferenceNodeKingdomBusinessAssessment $KingdomBusinessAssessment
	 * @property-read QQReverseReferenceNodeTenPAssessment $TenPAssessment
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeResourceStatus extends QQReverseReferenceNode {
		protected $strTableName = 'resource_status';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'ResourceStatus';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Value':
					return new QQNode('value', 'Value', 'string', $this);
				case 'KingdomBusinessAssessment':
					return new QQReverseReferenceNodeKingdomBusinessAssessment($this, 'kingdombusinessassessment', 'reverse_reference', 'resource_status_id');
				case 'TenPAssessment':
					return new QQReverseReferenceNodeTenPAssessment($this, 'tenpassessment', 'reverse_reference', 'resource_status_id');

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