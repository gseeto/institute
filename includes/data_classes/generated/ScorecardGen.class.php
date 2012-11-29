<?php
	/**
	 * The abstract ScorecardGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Scorecard subclass which
	 * extends this ScorecardGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Scorecard class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property integer $CompanyId the value for intCompanyId 
	 * @property string $Name the value for strName 
	 * @property integer $ResourceId the value for intResourceId 
	 * @property Company $Company the value for the Company object referenced by intCompanyId 
	 * @property Resource $Resource the value for the Resource object referenced by intResourceId 
	 * @property User $_User the value for the private _objUser (Read-Only) if set due to an expansion on the scorecard_user_assn association table
	 * @property User[] $_UserArray the value for the private _objUserArray (Read-Only) if set due to an ExpandAsArray on the scorecard_user_assn association table
	 * @property ActionItems $_ActionItems the value for the private _objActionItems (Read-Only) if set due to an expansion on the action_items.scorecard_id reverse relationship
	 * @property ActionItems[] $_ActionItemsArray the value for the private _objActionItemsArray (Read-Only) if set due to an ExpandAsArray on the action_items.scorecard_id reverse relationship
	 * @property Kpis $_Kpis the value for the private _objKpis (Read-Only) if set due to an expansion on the kpis.scorecard_id reverse relationship
	 * @property Kpis[] $_KpisArray the value for the private _objKpisArray (Read-Only) if set due to an ExpandAsArray on the kpis.scorecard_id reverse relationship
	 * @property Statement $_Statement the value for the private _objStatement (Read-Only) if set due to an expansion on the statement.scorecard_id reverse relationship
	 * @property Statement[] $_StatementArray the value for the private _objStatementArray (Read-Only) if set due to an ExpandAsArray on the statement.scorecard_id reverse relationship
	 * @property Strategy $_Strategy the value for the private _objStrategy (Read-Only) if set due to an expansion on the strategy.scorecard_id reverse relationship
	 * @property Strategy[] $_StrategyArray the value for the private _objStrategyArray (Read-Only) if set due to an ExpandAsArray on the strategy.scorecard_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class ScorecardGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column scorecard.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column scorecard.company_id
		 * @var integer intCompanyId
		 */
		protected $intCompanyId;
		const CompanyIdDefault = null;


		/**
		 * Protected member variable that maps to the database column scorecard.name
		 * @var string strName
		 */
		protected $strName;
		const NameDefault = null;


		/**
		 * Protected member variable that maps to the database column scorecard.resource_id
		 * @var integer intResourceId
		 */
		protected $intResourceId;
		const ResourceIdDefault = null;


		/**
		 * Private member variable that stores a reference to a single User object
		 * (of type User), if this Scorecard object was restored with
		 * an expansion on the scorecard_user_assn association table.
		 * @var User _objUser;
		 */
		private $_objUser;

		/**
		 * Private member variable that stores a reference to an array of User objects
		 * (of type User[]), if this Scorecard object was restored with
		 * an ExpandAsArray on the scorecard_user_assn association table.
		 * @var User[] _objUserArray;
		 */
		private $_objUserArray = array();

		/**
		 * Private member variable that stores a reference to a single ActionItems object
		 * (of type ActionItems), if this Scorecard object was restored with
		 * an expansion on the action_items association table.
		 * @var ActionItems _objActionItems;
		 */
		private $_objActionItems;

		/**
		 * Private member variable that stores a reference to an array of ActionItems objects
		 * (of type ActionItems[]), if this Scorecard object was restored with
		 * an ExpandAsArray on the action_items association table.
		 * @var ActionItems[] _objActionItemsArray;
		 */
		private $_objActionItemsArray = array();

		/**
		 * Private member variable that stores a reference to a single Kpis object
		 * (of type Kpis), if this Scorecard object was restored with
		 * an expansion on the kpis association table.
		 * @var Kpis _objKpis;
		 */
		private $_objKpis;

		/**
		 * Private member variable that stores a reference to an array of Kpis objects
		 * (of type Kpis[]), if this Scorecard object was restored with
		 * an ExpandAsArray on the kpis association table.
		 * @var Kpis[] _objKpisArray;
		 */
		private $_objKpisArray = array();

		/**
		 * Private member variable that stores a reference to a single Statement object
		 * (of type Statement), if this Scorecard object was restored with
		 * an expansion on the statement association table.
		 * @var Statement _objStatement;
		 */
		private $_objStatement;

		/**
		 * Private member variable that stores a reference to an array of Statement objects
		 * (of type Statement[]), if this Scorecard object was restored with
		 * an ExpandAsArray on the statement association table.
		 * @var Statement[] _objStatementArray;
		 */
		private $_objStatementArray = array();

		/**
		 * Private member variable that stores a reference to a single Strategy object
		 * (of type Strategy), if this Scorecard object was restored with
		 * an expansion on the strategy association table.
		 * @var Strategy _objStrategy;
		 */
		private $_objStrategy;

		/**
		 * Private member variable that stores a reference to an array of Strategy objects
		 * (of type Strategy[]), if this Scorecard object was restored with
		 * an ExpandAsArray on the strategy association table.
		 * @var Strategy[] _objStrategyArray;
		 */
		private $_objStrategyArray = array();

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
		 * in the database column scorecard.company_id.
		 *
		 * NOTE: Always use the Company property getter to correctly retrieve this Company object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Company objCompany
		 */
		protected $objCompany;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column scorecard.resource_id.
		 *
		 * NOTE: Always use the Resource property getter to correctly retrieve this Resource object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Resource objResource
		 */
		protected $objResource;





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
		 * Load a Scorecard from PK Info
		 * @param integer $intId
		 * @return Scorecard
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return Scorecard::QuerySingle(
				QQ::Equal(QQN::Scorecard()->Id, $intId)
			);
		}

		/**
		 * Load all Scorecards
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Scorecard[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call Scorecard::QueryArray to perform the LoadAll query
			try {
				return Scorecard::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Scorecards
		 * @return int
		 */
		public static function CountAll() {
			// Call Scorecard::QueryCount to perform the CountAll query
			return Scorecard::QueryCount(QQ::All());
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
			$objDatabase = Scorecard::GetDatabase();

			// Create/Build out the QueryBuilder object with Scorecard-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'scorecard');
			Scorecard::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('scorecard');

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
		 * Static Qcodo Query method to query for a single Scorecard object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Scorecard the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Scorecard::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new Scorecard object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Scorecard::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return Scorecard::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of Scorecard objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Scorecard[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Scorecard::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Scorecard::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Scorecard::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of Scorecard objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Scorecard::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Scorecard::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'scorecard_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with Scorecard-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				Scorecard::GetSelectFields($objQueryBuilder);
				Scorecard::GetFromFields($objQueryBuilder);

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
			return Scorecard::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Scorecard
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'scorecard';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'company_id', $strAliasPrefix . 'company_id');
			$objBuilder->AddSelectItem($strTableName, 'name', $strAliasPrefix . 'name');
			$objBuilder->AddSelectItem($strTableName, 'resource_id', $strAliasPrefix . 'resource_id');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Scorecard from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Scorecard::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Scorecard
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
					$strAliasPrefix = 'scorecard__';

				$strAlias = $strAliasPrefix . 'user__user_id__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objUserArray)) {
						$objPreviousChildItem = $objPreviousItem->_objUserArray[$intPreviousChildItemCount - 1];
						$objChildItem = User::InstantiateDbRow($objDbRow, $strAliasPrefix . 'user__user_id__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objUserArray[] = $objChildItem;
					} else
						$objPreviousItem->_objUserArray[] = User::InstantiateDbRow($objDbRow, $strAliasPrefix . 'user__user_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}


				$strAlias = $strAliasPrefix . 'actionitems__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objActionItemsArray)) {
						$objPreviousChildItem = $objPreviousItem->_objActionItemsArray[$intPreviousChildItemCount - 1];
						$objChildItem = ActionItems::InstantiateDbRow($objDbRow, $strAliasPrefix . 'actionitems__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objActionItemsArray[] = $objChildItem;
					} else
						$objPreviousItem->_objActionItemsArray[] = ActionItems::InstantiateDbRow($objDbRow, $strAliasPrefix . 'actionitems__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'kpis__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objKpisArray)) {
						$objPreviousChildItem = $objPreviousItem->_objKpisArray[$intPreviousChildItemCount - 1];
						$objChildItem = Kpis::InstantiateDbRow($objDbRow, $strAliasPrefix . 'kpis__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objKpisArray[] = $objChildItem;
					} else
						$objPreviousItem->_objKpisArray[] = Kpis::InstantiateDbRow($objDbRow, $strAliasPrefix . 'kpis__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'statement__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objStatementArray)) {
						$objPreviousChildItem = $objPreviousItem->_objStatementArray[$intPreviousChildItemCount - 1];
						$objChildItem = Statement::InstantiateDbRow($objDbRow, $strAliasPrefix . 'statement__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objStatementArray[] = $objChildItem;
					} else
						$objPreviousItem->_objStatementArray[] = Statement::InstantiateDbRow($objDbRow, $strAliasPrefix . 'statement__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'strategy__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objStrategyArray)) {
						$objPreviousChildItem = $objPreviousItem->_objStrategyArray[$intPreviousChildItemCount - 1];
						$objChildItem = Strategy::InstantiateDbRow($objDbRow, $strAliasPrefix . 'strategy__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objStrategyArray[] = $objChildItem;
					} else
						$objPreviousItem->_objStrategyArray[] = Strategy::InstantiateDbRow($objDbRow, $strAliasPrefix . 'strategy__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'scorecard__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the Scorecard object
			$objToReturn = new Scorecard();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'company_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'company_id'] : $strAliasPrefix . 'company_id';
			$objToReturn->intCompanyId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'name', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'name'] : $strAliasPrefix . 'name';
			$objToReturn->strName = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAliasName = array_key_exists($strAliasPrefix . 'resource_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'resource_id'] : $strAliasPrefix . 'resource_id';
			$objToReturn->intResourceId = $objDbRow->GetColumn($strAliasName, 'Integer');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'scorecard__';

			// Check for Company Early Binding
			$strAlias = $strAliasPrefix . 'company_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objCompany = Company::InstantiateDbRow($objDbRow, $strAliasPrefix . 'company_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for Resource Early Binding
			$strAlias = $strAliasPrefix . 'resource_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objResource = Resource::InstantiateDbRow($objDbRow, $strAliasPrefix . 'resource_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);



			// Check for User Virtual Binding
			$strAlias = $strAliasPrefix . 'user__user_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objUserArray[] = User::InstantiateDbRow($objDbRow, $strAliasPrefix . 'user__user_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objUser = User::InstantiateDbRow($objDbRow, $strAliasPrefix . 'user__user_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}


			// Check for ActionItems Virtual Binding
			$strAlias = $strAliasPrefix . 'actionitems__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objActionItemsArray[] = ActionItems::InstantiateDbRow($objDbRow, $strAliasPrefix . 'actionitems__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objActionItems = ActionItems::InstantiateDbRow($objDbRow, $strAliasPrefix . 'actionitems__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for Kpis Virtual Binding
			$strAlias = $strAliasPrefix . 'kpis__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objKpisArray[] = Kpis::InstantiateDbRow($objDbRow, $strAliasPrefix . 'kpis__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objKpis = Kpis::InstantiateDbRow($objDbRow, $strAliasPrefix . 'kpis__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for Statement Virtual Binding
			$strAlias = $strAliasPrefix . 'statement__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objStatementArray[] = Statement::InstantiateDbRow($objDbRow, $strAliasPrefix . 'statement__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objStatement = Statement::InstantiateDbRow($objDbRow, $strAliasPrefix . 'statement__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for Strategy Virtual Binding
			$strAlias = $strAliasPrefix . 'strategy__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objStrategyArray[] = Strategy::InstantiateDbRow($objDbRow, $strAliasPrefix . 'strategy__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objStrategy = Strategy::InstantiateDbRow($objDbRow, $strAliasPrefix . 'strategy__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of Scorecards from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Scorecard[]
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
					$objItem = Scorecard::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Scorecard::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single Scorecard object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Scorecard next row resulting from the query
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
			return Scorecard::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Scorecard object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return Scorecard
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return Scorecard::QuerySingle(
				QQ::Equal(QQN::Scorecard()->Id, $intId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Scorecard objects,
		 * by CompanyId Index(es)
		 * @param integer $intCompanyId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Scorecard[]
		*/
		public static function LoadArrayByCompanyId($intCompanyId, $objOptionalClauses = null) {
			// Call Scorecard::QueryArray to perform the LoadArrayByCompanyId query
			try {
				return Scorecard::QueryArray(
					QQ::Equal(QQN::Scorecard()->CompanyId, $intCompanyId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Scorecards
		 * by CompanyId Index(es)
		 * @param integer $intCompanyId
		 * @return int
		*/
		public static function CountByCompanyId($intCompanyId, $objOptionalClauses = null) {
			// Call Scorecard::QueryCount to perform the CountByCompanyId query
			return Scorecard::QueryCount(
				QQ::Equal(QQN::Scorecard()->CompanyId, $intCompanyId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Scorecard objects,
		 * by ResourceId Index(es)
		 * @param integer $intResourceId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Scorecard[]
		*/
		public static function LoadArrayByResourceId($intResourceId, $objOptionalClauses = null) {
			// Call Scorecard::QueryArray to perform the LoadArrayByResourceId query
			try {
				return Scorecard::QueryArray(
					QQ::Equal(QQN::Scorecard()->ResourceId, $intResourceId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Scorecards
		 * by ResourceId Index(es)
		 * @param integer $intResourceId
		 * @return int
		*/
		public static function CountByResourceId($intResourceId, $objOptionalClauses = null) {
			// Call Scorecard::QueryCount to perform the CountByResourceId query
			return Scorecard::QueryCount(
				QQ::Equal(QQN::Scorecard()->ResourceId, $intResourceId)
			, $objOptionalClauses
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////
			/**
		 * Load an array of User objects for a given User
		 * via the scorecard_user_assn table
		 * @param integer $intUserId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Scorecard[]
		*/
		public static function LoadArrayByUser($intUserId, $objOptionalClauses = null) {
			// Call Scorecard::QueryArray to perform the LoadArrayByUser query
			try {
				return Scorecard::QueryArray(
					QQ::Equal(QQN::Scorecard()->User->UserId, $intUserId),
					$objOptionalClauses
				);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Scorecards for a given User
		 * via the scorecard_user_assn table
		 * @param integer $intUserId
		 * @return int
		*/
		public static function CountByUser($intUserId, $objOptionalClauses = null) {
			return Scorecard::QueryCount(
				QQ::Equal(QQN::Scorecard()->User->UserId, $intUserId),
				$objOptionalClauses
			);
		}




		//////////////////////////////////////
		// SAVE, DELETE, RELOAD and JOURNALING
		//////////////////////////////////////

		/**
		 * Save this Scorecard
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Scorecard::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `scorecard` (
							`company_id`,
							`name`,
							`resource_id`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intCompanyId) . ',
							' . $objDatabase->SqlVariable($this->strName) . ',
							' . $objDatabase->SqlVariable($this->intResourceId) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('scorecard', 'id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`scorecard`
						SET
							`company_id` = ' . $objDatabase->SqlVariable($this->intCompanyId) . ',
							`name` = ' . $objDatabase->SqlVariable($this->strName) . ',
							`resource_id` = ' . $objDatabase->SqlVariable($this->intResourceId) . '
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
		 * Delete this Scorecard
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Scorecard with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Scorecard::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`scorecard`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all Scorecards
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Scorecard::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`scorecard`');
		}

		/**
		 * Truncate scorecard table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Scorecard::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `scorecard`');
		}

		/**
		 * Reload this Scorecard from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Scorecard object.');

			// Reload the Object
			$objReloaded = Scorecard::Load($this->intId);

			// Update $this's local variables to match
			$this->CompanyId = $objReloaded->CompanyId;
			$this->strName = $objReloaded->strName;
			$this->ResourceId = $objReloaded->ResourceId;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = Scorecard::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `scorecard` (
					`id`,
					`company_id`,
					`name`,
					`resource_id`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->intCompanyId) . ',
					' . $objDatabase->SqlVariable($this->strName) . ',
					' . $objDatabase->SqlVariable($this->intResourceId) . ',
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
		 * @return Scorecard[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = Scorecard::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM scorecard WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return Scorecard::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return Scorecard[]
		 */
		public function GetJournal() {
			return Scorecard::GetJournalForId($this->intId);
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

				case 'Name':
					// Gets the value for strName 
					// @return string
					return $this->strName;

				case 'ResourceId':
					// Gets the value for intResourceId 
					// @return integer
					return $this->intResourceId;


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

				case 'Resource':
					// Gets the value for the Resource object referenced by intResourceId 
					// @return Resource
					try {
						if ((!$this->objResource) && (!is_null($this->intResourceId)))
							$this->objResource = Resource::Load($this->intResourceId);
						return $this->objResource;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_User':
					// Gets the value for the private _objUser (Read-Only)
					// if set due to an expansion on the scorecard_user_assn association table
					// @return User
					return $this->_objUser;

				case '_UserArray':
					// Gets the value for the private _objUserArray (Read-Only)
					// if set due to an ExpandAsArray on the scorecard_user_assn association table
					// @return User[]
					return (array) $this->_objUserArray;

				case '_ActionItems':
					// Gets the value for the private _objActionItems (Read-Only)
					// if set due to an expansion on the action_items.scorecard_id reverse relationship
					// @return ActionItems
					return $this->_objActionItems;

				case '_ActionItemsArray':
					// Gets the value for the private _objActionItemsArray (Read-Only)
					// if set due to an ExpandAsArray on the action_items.scorecard_id reverse relationship
					// @return ActionItems[]
					return (array) $this->_objActionItemsArray;

				case '_Kpis':
					// Gets the value for the private _objKpis (Read-Only)
					// if set due to an expansion on the kpis.scorecard_id reverse relationship
					// @return Kpis
					return $this->_objKpis;

				case '_KpisArray':
					// Gets the value for the private _objKpisArray (Read-Only)
					// if set due to an ExpandAsArray on the kpis.scorecard_id reverse relationship
					// @return Kpis[]
					return (array) $this->_objKpisArray;

				case '_Statement':
					// Gets the value for the private _objStatement (Read-Only)
					// if set due to an expansion on the statement.scorecard_id reverse relationship
					// @return Statement
					return $this->_objStatement;

				case '_StatementArray':
					// Gets the value for the private _objStatementArray (Read-Only)
					// if set due to an ExpandAsArray on the statement.scorecard_id reverse relationship
					// @return Statement[]
					return (array) $this->_objStatementArray;

				case '_Strategy':
					// Gets the value for the private _objStrategy (Read-Only)
					// if set due to an expansion on the strategy.scorecard_id reverse relationship
					// @return Strategy
					return $this->_objStrategy;

				case '_StrategyArray':
					// Gets the value for the private _objStrategyArray (Read-Only)
					// if set due to an ExpandAsArray on the strategy.scorecard_id reverse relationship
					// @return Strategy[]
					return (array) $this->_objStrategyArray;


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

				case 'Name':
					// Sets the value for strName 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strName = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ResourceId':
					// Sets the value for intResourceId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objResource = null;
						return ($this->intResourceId = QType::Cast($mixValue, QType::Integer));
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
							throw new QCallerException('Unable to set an unsaved Company for this Scorecard');

						// Update Local Member Variables
						$this->objCompany = $mixValue;
						$this->intCompanyId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Resource':
					// Sets the value for the Resource object referenced by intResourceId 
					// @param Resource $mixValue
					// @return Resource
					if (is_null($mixValue)) {
						$this->intResourceId = null;
						$this->objResource = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Resource object
						try {
							$mixValue = QType::Cast($mixValue, 'Resource');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Resource object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Resource for this Scorecard');

						// Update Local Member Variables
						$this->objResource = $mixValue;
						$this->intResourceId = $mixValue->Id;

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

			
		
		// Related Objects' Methods for ActionItems
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ActionItemses as an array of ActionItems objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ActionItems[]
		*/ 
		public function GetActionItemsArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return ActionItems::LoadArrayByScorecardId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ActionItemses
		 * @return int
		*/ 
		public function CountActionItemses() {
			if ((is_null($this->intId)))
				return 0;

			return ActionItems::CountByScorecardId($this->intId);
		}

		/**
		 * Associates a ActionItems
		 * @param ActionItems $objActionItems
		 * @return void
		*/ 
		public function AssociateActionItems(ActionItems $objActionItems) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateActionItems on this unsaved Scorecard.');
			if ((is_null($objActionItems->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateActionItems on this Scorecard with an unsaved ActionItems.');

			// Get the Database Object for this Class
			$objDatabase = Scorecard::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`action_items`
				SET
					`scorecard_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objActionItems->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objActionItems->ScorecardId = $this->intId;
				$objActionItems->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a ActionItems
		 * @param ActionItems $objActionItems
		 * @return void
		*/ 
		public function UnassociateActionItems(ActionItems $objActionItems) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateActionItems on this unsaved Scorecard.');
			if ((is_null($objActionItems->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateActionItems on this Scorecard with an unsaved ActionItems.');

			// Get the Database Object for this Class
			$objDatabase = Scorecard::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`action_items`
				SET
					`scorecard_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objActionItems->Id) . ' AND
					`scorecard_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objActionItems->ScorecardId = null;
				$objActionItems->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all ActionItemses
		 * @return void
		*/ 
		public function UnassociateAllActionItemses() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateActionItems on this unsaved Scorecard.');

			// Get the Database Object for this Class
			$objDatabase = Scorecard::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (ActionItems::LoadArrayByScorecardId($this->intId) as $objActionItems) {
					$objActionItems->ScorecardId = null;
					$objActionItems->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`action_items`
				SET
					`scorecard_id` = null
				WHERE
					`scorecard_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated ActionItems
		 * @param ActionItems $objActionItems
		 * @return void
		*/ 
		public function DeleteAssociatedActionItems(ActionItems $objActionItems) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateActionItems on this unsaved Scorecard.');
			if ((is_null($objActionItems->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateActionItems on this Scorecard with an unsaved ActionItems.');

			// Get the Database Object for this Class
			$objDatabase = Scorecard::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`action_items`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objActionItems->Id) . ' AND
					`scorecard_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objActionItems->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated ActionItemses
		 * @return void
		*/ 
		public function DeleteAllActionItemses() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateActionItems on this unsaved Scorecard.');

			// Get the Database Object for this Class
			$objDatabase = Scorecard::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (ActionItems::LoadArrayByScorecardId($this->intId) as $objActionItems) {
					$objActionItems->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`action_items`
				WHERE
					`scorecard_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for Kpis
		//-------------------------------------------------------------------

		/**
		 * Gets all associated Kpises as an array of Kpis objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Kpis[]
		*/ 
		public function GetKpisArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Kpis::LoadArrayByScorecardId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated Kpises
		 * @return int
		*/ 
		public function CountKpises() {
			if ((is_null($this->intId)))
				return 0;

			return Kpis::CountByScorecardId($this->intId);
		}

		/**
		 * Associates a Kpis
		 * @param Kpis $objKpis
		 * @return void
		*/ 
		public function AssociateKpis(Kpis $objKpis) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateKpis on this unsaved Scorecard.');
			if ((is_null($objKpis->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateKpis on this Scorecard with an unsaved Kpis.');

			// Get the Database Object for this Class
			$objDatabase = Scorecard::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`kpis`
				SET
					`scorecard_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objKpis->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objKpis->ScorecardId = $this->intId;
				$objKpis->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a Kpis
		 * @param Kpis $objKpis
		 * @return void
		*/ 
		public function UnassociateKpis(Kpis $objKpis) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateKpis on this unsaved Scorecard.');
			if ((is_null($objKpis->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateKpis on this Scorecard with an unsaved Kpis.');

			// Get the Database Object for this Class
			$objDatabase = Scorecard::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`kpis`
				SET
					`scorecard_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objKpis->Id) . ' AND
					`scorecard_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objKpis->ScorecardId = null;
				$objKpis->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all Kpises
		 * @return void
		*/ 
		public function UnassociateAllKpises() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateKpis on this unsaved Scorecard.');

			// Get the Database Object for this Class
			$objDatabase = Scorecard::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Kpis::LoadArrayByScorecardId($this->intId) as $objKpis) {
					$objKpis->ScorecardId = null;
					$objKpis->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`kpis`
				SET
					`scorecard_id` = null
				WHERE
					`scorecard_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated Kpis
		 * @param Kpis $objKpis
		 * @return void
		*/ 
		public function DeleteAssociatedKpis(Kpis $objKpis) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateKpis on this unsaved Scorecard.');
			if ((is_null($objKpis->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateKpis on this Scorecard with an unsaved Kpis.');

			// Get the Database Object for this Class
			$objDatabase = Scorecard::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`kpis`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objKpis->Id) . ' AND
					`scorecard_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objKpis->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated Kpises
		 * @return void
		*/ 
		public function DeleteAllKpises() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateKpis on this unsaved Scorecard.');

			// Get the Database Object for this Class
			$objDatabase = Scorecard::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Kpis::LoadArrayByScorecardId($this->intId) as $objKpis) {
					$objKpis->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`kpis`
				WHERE
					`scorecard_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for Statement
		//-------------------------------------------------------------------

		/**
		 * Gets all associated Statements as an array of Statement objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Statement[]
		*/ 
		public function GetStatementArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Statement::LoadArrayByScorecardId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated Statements
		 * @return int
		*/ 
		public function CountStatements() {
			if ((is_null($this->intId)))
				return 0;

			return Statement::CountByScorecardId($this->intId);
		}

		/**
		 * Associates a Statement
		 * @param Statement $objStatement
		 * @return void
		*/ 
		public function AssociateStatement(Statement $objStatement) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateStatement on this unsaved Scorecard.');
			if ((is_null($objStatement->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateStatement on this Scorecard with an unsaved Statement.');

			// Get the Database Object for this Class
			$objDatabase = Scorecard::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`statement`
				SET
					`scorecard_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objStatement->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objStatement->ScorecardId = $this->intId;
				$objStatement->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a Statement
		 * @param Statement $objStatement
		 * @return void
		*/ 
		public function UnassociateStatement(Statement $objStatement) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStatement on this unsaved Scorecard.');
			if ((is_null($objStatement->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStatement on this Scorecard with an unsaved Statement.');

			// Get the Database Object for this Class
			$objDatabase = Scorecard::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`statement`
				SET
					`scorecard_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objStatement->Id) . ' AND
					`scorecard_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objStatement->ScorecardId = null;
				$objStatement->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all Statements
		 * @return void
		*/ 
		public function UnassociateAllStatements() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStatement on this unsaved Scorecard.');

			// Get the Database Object for this Class
			$objDatabase = Scorecard::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Statement::LoadArrayByScorecardId($this->intId) as $objStatement) {
					$objStatement->ScorecardId = null;
					$objStatement->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`statement`
				SET
					`scorecard_id` = null
				WHERE
					`scorecard_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated Statement
		 * @param Statement $objStatement
		 * @return void
		*/ 
		public function DeleteAssociatedStatement(Statement $objStatement) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStatement on this unsaved Scorecard.');
			if ((is_null($objStatement->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStatement on this Scorecard with an unsaved Statement.');

			// Get the Database Object for this Class
			$objDatabase = Scorecard::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`statement`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objStatement->Id) . ' AND
					`scorecard_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objStatement->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated Statements
		 * @return void
		*/ 
		public function DeleteAllStatements() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStatement on this unsaved Scorecard.');

			// Get the Database Object for this Class
			$objDatabase = Scorecard::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Statement::LoadArrayByScorecardId($this->intId) as $objStatement) {
					$objStatement->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`statement`
				WHERE
					`scorecard_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for Strategy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated Strategies as an array of Strategy objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Strategy[]
		*/ 
		public function GetStrategyArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Strategy::LoadArrayByScorecardId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated Strategies
		 * @return int
		*/ 
		public function CountStrategies() {
			if ((is_null($this->intId)))
				return 0;

			return Strategy::CountByScorecardId($this->intId);
		}

		/**
		 * Associates a Strategy
		 * @param Strategy $objStrategy
		 * @return void
		*/ 
		public function AssociateStrategy(Strategy $objStrategy) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateStrategy on this unsaved Scorecard.');
			if ((is_null($objStrategy->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateStrategy on this Scorecard with an unsaved Strategy.');

			// Get the Database Object for this Class
			$objDatabase = Scorecard::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`strategy`
				SET
					`scorecard_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objStrategy->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objStrategy->ScorecardId = $this->intId;
				$objStrategy->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a Strategy
		 * @param Strategy $objStrategy
		 * @return void
		*/ 
		public function UnassociateStrategy(Strategy $objStrategy) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStrategy on this unsaved Scorecard.');
			if ((is_null($objStrategy->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStrategy on this Scorecard with an unsaved Strategy.');

			// Get the Database Object for this Class
			$objDatabase = Scorecard::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`strategy`
				SET
					`scorecard_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objStrategy->Id) . ' AND
					`scorecard_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objStrategy->ScorecardId = null;
				$objStrategy->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all Strategies
		 * @return void
		*/ 
		public function UnassociateAllStrategies() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStrategy on this unsaved Scorecard.');

			// Get the Database Object for this Class
			$objDatabase = Scorecard::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Strategy::LoadArrayByScorecardId($this->intId) as $objStrategy) {
					$objStrategy->ScorecardId = null;
					$objStrategy->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`strategy`
				SET
					`scorecard_id` = null
				WHERE
					`scorecard_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated Strategy
		 * @param Strategy $objStrategy
		 * @return void
		*/ 
		public function DeleteAssociatedStrategy(Strategy $objStrategy) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStrategy on this unsaved Scorecard.');
			if ((is_null($objStrategy->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStrategy on this Scorecard with an unsaved Strategy.');

			// Get the Database Object for this Class
			$objDatabase = Scorecard::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`strategy`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objStrategy->Id) . ' AND
					`scorecard_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objStrategy->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated Strategies
		 * @return void
		*/ 
		public function DeleteAllStrategies() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStrategy on this unsaved Scorecard.');

			// Get the Database Object for this Class
			$objDatabase = Scorecard::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Strategy::LoadArrayByScorecardId($this->intId) as $objStrategy) {
					$objStrategy->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`strategy`
				WHERE
					`scorecard_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		// Related Many-to-Many Objects' Methods for User
		//-------------------------------------------------------------------

		/**
		 * Gets all many-to-many associated Users as an array of User objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return User[]
		*/ 
		public function GetUserArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return User::LoadArrayByScorecard($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all many-to-many associated Users
		 * @return int
		*/ 
		public function CountUsers() {
			if ((is_null($this->intId)))
				return 0;

			return User::CountByScorecard($this->intId);
		}

		/**
		 * Checks to see if an association exists with a specific User
		 * @param User $objUser
		 * @return bool
		*/
		public function IsUserAssociated(User $objUser) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsUserAssociated on this unsaved Scorecard.');
			if ((is_null($objUser->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsUserAssociated on this Scorecard with an unsaved User.');

			$intRowCount = Scorecard::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::Scorecard()->Id, $this->intId),
					QQ::Equal(QQN::Scorecard()->User->UserId, $objUser->Id)
				)
			);

			return ($intRowCount > 0);
		}

		/**
		 * Journals the User relationship into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function JournalUserAssociation($intAssociatedId, $strJournalCommand) {
			$objDatabase = Scorecard::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `scorecard_user_assn` (
					`scorecard_id`,
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
		 * Gets the historical journal for an object's User relationship from the log database.
		 * @param integer intId
		 * @return QDatabaseResult $objResult
		 */
		public static function GetJournalUserAssociationForId($intId) {
			$objDatabase = Scorecard::GetDatabase()->JournalingDatabase;

			return $objDatabase->Query('SELECT * FROM scorecard_user_assn WHERE scorecard_id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');
		}

		/**
		 * Gets the historical journal for this object's User relationship from the log database.
		 * @return QDatabaseResult $objResult
		 */
		public function GetJournalUserAssociation() {
			return Scorecard::GetJournalUserAssociationForId($this->intId);
		}

		/**
		 * Associates a User
		 * @param User $objUser
		 * @return void
		*/ 
		public function AssociateUser(User $objUser) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateUser on this unsaved Scorecard.');
			if ((is_null($objUser->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateUser on this Scorecard with an unsaved User.');

			// Get the Database Object for this Class
			$objDatabase = Scorecard::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				INSERT INTO `scorecard_user_assn` (
					`scorecard_id`,
					`user_id`
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($objUser->Id) . '
				)
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase)
				$this->JournalUserAssociation($objUser->Id, 'INSERT');
		}

		/**
		 * Unassociates a User
		 * @param User $objUser
		 * @return void
		*/ 
		public function UnassociateUser(User $objUser) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUser on this unsaved Scorecard.');
			if ((is_null($objUser->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUser on this Scorecard with an unsaved User.');

			// Get the Database Object for this Class
			$objDatabase = Scorecard::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`scorecard_user_assn`
				WHERE
					`scorecard_id` = ' . $objDatabase->SqlVariable($this->intId) . ' AND
					`user_id` = ' . $objDatabase->SqlVariable($objUser->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase)
				$this->JournalUserAssociation($objUser->Id, 'DELETE');
		}

		/**
		 * Unassociates all Users
		 * @return void
		*/ 
		public function UnassociateAllUsers() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAllUserArray on this unsaved Scorecard.');

			// Get the Database Object for this Class
			$objDatabase = Scorecard::GetDatabase();

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objResult = $objDatabase->Query('SELECT `user_id` AS associated_id FROM `scorecard_user_assn` WHERE `scorecard_id` = ' . $objDatabase->SqlVariable($this->intId));
				while ($objRow = $objResult->GetNextRow()) {
					$this->JournalUserAssociation($objRow->GetColumn('associated_id'), 'DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`scorecard_user_assn`
				WHERE
					`scorecard_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}




		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="Scorecard"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Company" type="xsd1:Company"/>';
			$strToReturn .= '<element name="Name" type="xsd:string"/>';
			$strToReturn .= '<element name="Resource" type="xsd1:Resource"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Scorecard', $strComplexTypeArray)) {
				$strComplexTypeArray['Scorecard'] = Scorecard::GetSoapComplexTypeXml();
				Company::AlterSoapComplexTypeArray($strComplexTypeArray);
				Resource::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Scorecard::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Scorecard();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'Company')) &&
				($objSoapObject->Company))
				$objToReturn->Company = Company::GetObjectFromSoapObject($objSoapObject->Company);
			if (property_exists($objSoapObject, 'Name'))
				$objToReturn->strName = $objSoapObject->Name;
			if ((property_exists($objSoapObject, 'Resource')) &&
				($objSoapObject->Resource))
				$objToReturn->Resource = Resource::GetObjectFromSoapObject($objSoapObject->Resource);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Scorecard::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objCompany)
				$objObject->objCompany = Company::GetSoapObjectFromObject($objObject->objCompany, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCompanyId = null;
			if ($objObject->objResource)
				$objObject->objResource = Resource::GetSoapObjectFromObject($objObject->objResource, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intResourceId = null;
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
	class QQNodeScorecardUser extends QQAssociationNode {
		protected $strType = 'association';
		protected $strName = 'user';

		protected $strTableName = 'scorecard_user_assn';
		protected $strPrimaryKey = 'scorecard_id';
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
	 * @property-read QQNode $Name
	 * @property-read QQNode $ResourceId
	 * @property-read QQNodeResource $Resource
	 * @property-read QQNodeScorecardUser $User
	 * @property-read QQReverseReferenceNodeActionItems $ActionItems
	 * @property-read QQReverseReferenceNodeKpis $Kpis
	 * @property-read QQReverseReferenceNodeStatement $Statement
	 * @property-read QQReverseReferenceNodeStrategy $Strategy
	 */
	class QQNodeScorecard extends QQNode {
		protected $strTableName = 'scorecard';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Scorecard';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'CompanyId':
					return new QQNode('company_id', 'CompanyId', 'integer', $this);
				case 'Company':
					return new QQNodeCompany('company_id', 'Company', 'integer', $this);
				case 'Name':
					return new QQNode('name', 'Name', 'string', $this);
				case 'ResourceId':
					return new QQNode('resource_id', 'ResourceId', 'integer', $this);
				case 'Resource':
					return new QQNodeResource('resource_id', 'Resource', 'integer', $this);
				case 'User':
					return new QQNodeScorecardUser($this);
				case 'ActionItems':
					return new QQReverseReferenceNodeActionItems($this, 'actionitems', 'reverse_reference', 'scorecard_id');
				case 'Kpis':
					return new QQReverseReferenceNodeKpis($this, 'kpis', 'reverse_reference', 'scorecard_id');
				case 'Statement':
					return new QQReverseReferenceNodeStatement($this, 'statement', 'reverse_reference', 'scorecard_id');
				case 'Strategy':
					return new QQReverseReferenceNodeStrategy($this, 'strategy', 'reverse_reference', 'scorecard_id');

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
	 * @property-read QQNode $Name
	 * @property-read QQNode $ResourceId
	 * @property-read QQNodeResource $Resource
	 * @property-read QQNodeScorecardUser $User
	 * @property-read QQReverseReferenceNodeActionItems $ActionItems
	 * @property-read QQReverseReferenceNodeKpis $Kpis
	 * @property-read QQReverseReferenceNodeStatement $Statement
	 * @property-read QQReverseReferenceNodeStrategy $Strategy
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeScorecard extends QQReverseReferenceNode {
		protected $strTableName = 'scorecard';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Scorecard';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'CompanyId':
					return new QQNode('company_id', 'CompanyId', 'integer', $this);
				case 'Company':
					return new QQNodeCompany('company_id', 'Company', 'integer', $this);
				case 'Name':
					return new QQNode('name', 'Name', 'string', $this);
				case 'ResourceId':
					return new QQNode('resource_id', 'ResourceId', 'integer', $this);
				case 'Resource':
					return new QQNodeResource('resource_id', 'Resource', 'integer', $this);
				case 'User':
					return new QQNodeScorecardUser($this);
				case 'ActionItems':
					return new QQReverseReferenceNodeActionItems($this, 'actionitems', 'reverse_reference', 'scorecard_id');
				case 'Kpis':
					return new QQReverseReferenceNodeKpis($this, 'kpis', 'reverse_reference', 'scorecard_id');
				case 'Statement':
					return new QQReverseReferenceNodeStatement($this, 'statement', 'reverse_reference', 'scorecard_id');
				case 'Strategy':
					return new QQReverseReferenceNodeStrategy($this, 'strategy', 'reverse_reference', 'scorecard_id');

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