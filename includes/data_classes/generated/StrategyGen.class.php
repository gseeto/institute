<?php
	/**
	 * The abstract StrategyGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Strategy subclass which
	 * extends this StrategyGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Strategy class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property string $Strategy the value for strStrategy 
	 * @property integer $Priority the value for intPriority 
	 * @property integer $Count the value for intCount 
	 * @property integer $ScorecardId the value for intScorecardId 
	 * @property integer $CategoryTypeId the value for intCategoryTypeId 
	 * @property integer $ModifiedBy the value for intModifiedBy 
	 * @property string $Modified the value for strModified (Read-Only Timestamp)
	 * @property Scorecard $Scorecard the value for the Scorecard object referenced by intScorecardId 
	 * @property User $ModifiedByObject the value for the User object referenced by intModifiedBy 
	 * @property Giants $_GiantsAsGiant the value for the private _objGiantsAsGiant (Read-Only) if set due to an expansion on the strategy_giant_assn association table
	 * @property Giants[] $_GiantsAsGiantArray the value for the private _objGiantsAsGiantArray (Read-Only) if set due to an ExpandAsArray on the strategy_giant_assn association table
	 * @property Spheres $_SpheresAsSphere the value for the private _objSpheresAsSphere (Read-Only) if set due to an expansion on the strategy_sphere_assn association table
	 * @property Spheres[] $_SpheresAsSphereArray the value for the private _objSpheresAsSphereArray (Read-Only) if set due to an ExpandAsArray on the strategy_sphere_assn association table
	 * @property ActionItems $_ActionItems the value for the private _objActionItems (Read-Only) if set due to an expansion on the action_items.strategy_id reverse relationship
	 * @property ActionItems[] $_ActionItemsArray the value for the private _objActionItemsArray (Read-Only) if set due to an ExpandAsArray on the action_items.strategy_id reverse relationship
	 * @property Kpis $_Kpis the value for the private _objKpis (Read-Only) if set due to an expansion on the kpis.strategy_id reverse relationship
	 * @property Kpis[] $_KpisArray the value for the private _objKpisArray (Read-Only) if set due to an ExpandAsArray on the kpis.strategy_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class StrategyGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column strategy.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column strategy.strategy
		 * @var string strStrategy
		 */
		protected $strStrategy;
		const StrategyDefault = null;


		/**
		 * Protected member variable that maps to the database column strategy.priority
		 * @var integer intPriority
		 */
		protected $intPriority;
		const PriorityDefault = null;


		/**
		 * Protected member variable that maps to the database column strategy.count
		 * @var integer intCount
		 */
		protected $intCount;
		const CountDefault = null;


		/**
		 * Protected member variable that maps to the database column strategy.scorecard_id
		 * @var integer intScorecardId
		 */
		protected $intScorecardId;
		const ScorecardIdDefault = null;


		/**
		 * Protected member variable that maps to the database column strategy.category_type_id
		 * @var integer intCategoryTypeId
		 */
		protected $intCategoryTypeId;
		const CategoryTypeIdDefault = null;


		/**
		 * Protected member variable that maps to the database column strategy.modified_by
		 * @var integer intModifiedBy
		 */
		protected $intModifiedBy;
		const ModifiedByDefault = null;


		/**
		 * Protected member variable that maps to the database column strategy.modified
		 * @var string strModified
		 */
		protected $strModified;
		const ModifiedDefault = null;


		/**
		 * Private member variable that stores a reference to a single GiantsAsGiant object
		 * (of type Giants), if this Strategy object was restored with
		 * an expansion on the strategy_giant_assn association table.
		 * @var Giants _objGiantsAsGiant;
		 */
		private $_objGiantsAsGiant;

		/**
		 * Private member variable that stores a reference to an array of GiantsAsGiant objects
		 * (of type Giants[]), if this Strategy object was restored with
		 * an ExpandAsArray on the strategy_giant_assn association table.
		 * @var Giants[] _objGiantsAsGiantArray;
		 */
		private $_objGiantsAsGiantArray = array();

		/**
		 * Private member variable that stores a reference to a single SpheresAsSphere object
		 * (of type Spheres), if this Strategy object was restored with
		 * an expansion on the strategy_sphere_assn association table.
		 * @var Spheres _objSpheresAsSphere;
		 */
		private $_objSpheresAsSphere;

		/**
		 * Private member variable that stores a reference to an array of SpheresAsSphere objects
		 * (of type Spheres[]), if this Strategy object was restored with
		 * an ExpandAsArray on the strategy_sphere_assn association table.
		 * @var Spheres[] _objSpheresAsSphereArray;
		 */
		private $_objSpheresAsSphereArray = array();

		/**
		 * Private member variable that stores a reference to a single ActionItems object
		 * (of type ActionItems), if this Strategy object was restored with
		 * an expansion on the action_items association table.
		 * @var ActionItems _objActionItems;
		 */
		private $_objActionItems;

		/**
		 * Private member variable that stores a reference to an array of ActionItems objects
		 * (of type ActionItems[]), if this Strategy object was restored with
		 * an ExpandAsArray on the action_items association table.
		 * @var ActionItems[] _objActionItemsArray;
		 */
		private $_objActionItemsArray = array();

		/**
		 * Private member variable that stores a reference to a single Kpis object
		 * (of type Kpis), if this Strategy object was restored with
		 * an expansion on the kpis association table.
		 * @var Kpis _objKpis;
		 */
		private $_objKpis;

		/**
		 * Private member variable that stores a reference to an array of Kpis objects
		 * (of type Kpis[]), if this Strategy object was restored with
		 * an ExpandAsArray on the kpis association table.
		 * @var Kpis[] _objKpisArray;
		 */
		private $_objKpisArray = array();

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
		 * in the database column strategy.scorecard_id.
		 *
		 * NOTE: Always use the Scorecard property getter to correctly retrieve this Scorecard object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Scorecard objScorecard
		 */
		protected $objScorecard;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column strategy.modified_by.
		 *
		 * NOTE: Always use the ModifiedByObject property getter to correctly retrieve this User object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var User objModifiedByObject
		 */
		protected $objModifiedByObject;





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
		 * Load a Strategy from PK Info
		 * @param integer $intId
		 * @return Strategy
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return Strategy::QuerySingle(
				QQ::Equal(QQN::Strategy()->Id, $intId)
			);
		}

		/**
		 * Load all Strategies
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Strategy[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call Strategy::QueryArray to perform the LoadAll query
			try {
				return Strategy::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Strategies
		 * @return int
		 */
		public static function CountAll() {
			// Call Strategy::QueryCount to perform the CountAll query
			return Strategy::QueryCount(QQ::All());
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
			$objDatabase = Strategy::GetDatabase();

			// Create/Build out the QueryBuilder object with Strategy-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'strategy');
			Strategy::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('strategy');

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
		 * Static Qcodo Query method to query for a single Strategy object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Strategy the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Strategy::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new Strategy object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Strategy::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return Strategy::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of Strategy objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Strategy[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Strategy::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Strategy::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Strategy::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of Strategy objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Strategy::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Strategy::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'strategy_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with Strategy-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				Strategy::GetSelectFields($objQueryBuilder);
				Strategy::GetFromFields($objQueryBuilder);

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
			return Strategy::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Strategy
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'strategy';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'strategy', $strAliasPrefix . 'strategy');
			$objBuilder->AddSelectItem($strTableName, 'priority', $strAliasPrefix . 'priority');
			$objBuilder->AddSelectItem($strTableName, 'count', $strAliasPrefix . 'count');
			$objBuilder->AddSelectItem($strTableName, 'scorecard_id', $strAliasPrefix . 'scorecard_id');
			$objBuilder->AddSelectItem($strTableName, 'category_type_id', $strAliasPrefix . 'category_type_id');
			$objBuilder->AddSelectItem($strTableName, 'modified_by', $strAliasPrefix . 'modified_by');
			$objBuilder->AddSelectItem($strTableName, 'modified', $strAliasPrefix . 'modified');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Strategy from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Strategy::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Strategy
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
					$strAliasPrefix = 'strategy__';

				$strAlias = $strAliasPrefix . 'giantsasgiant__giant_id__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objGiantsAsGiantArray)) {
						$objPreviousChildItem = $objPreviousItem->_objGiantsAsGiantArray[$intPreviousChildItemCount - 1];
						$objChildItem = Giants::InstantiateDbRow($objDbRow, $strAliasPrefix . 'giantsasgiant__giant_id__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objGiantsAsGiantArray[] = $objChildItem;
					} else
						$objPreviousItem->_objGiantsAsGiantArray[] = Giants::InstantiateDbRow($objDbRow, $strAliasPrefix . 'giantsasgiant__giant_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'spheresassphere__sphere_id__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objSpheresAsSphereArray)) {
						$objPreviousChildItem = $objPreviousItem->_objSpheresAsSphereArray[$intPreviousChildItemCount - 1];
						$objChildItem = Spheres::InstantiateDbRow($objDbRow, $strAliasPrefix . 'spheresassphere__sphere_id__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objSpheresAsSphereArray[] = $objChildItem;
					} else
						$objPreviousItem->_objSpheresAsSphereArray[] = Spheres::InstantiateDbRow($objDbRow, $strAliasPrefix . 'spheresassphere__sphere_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
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

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'strategy__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the Strategy object
			$objToReturn = new Strategy();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'strategy', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'strategy'] : $strAliasPrefix . 'strategy';
			$objToReturn->strStrategy = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAliasName = array_key_exists($strAliasPrefix . 'priority', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'priority'] : $strAliasPrefix . 'priority';
			$objToReturn->intPriority = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'count', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'count'] : $strAliasPrefix . 'count';
			$objToReturn->intCount = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'scorecard_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'scorecard_id'] : $strAliasPrefix . 'scorecard_id';
			$objToReturn->intScorecardId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'category_type_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'category_type_id'] : $strAliasPrefix . 'category_type_id';
			$objToReturn->intCategoryTypeId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'modified_by', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'modified_by'] : $strAliasPrefix . 'modified_by';
			$objToReturn->intModifiedBy = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'modified', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'modified'] : $strAliasPrefix . 'modified';
			$objToReturn->strModified = $objDbRow->GetColumn($strAliasName, 'VarChar');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'strategy__';

			// Check for Scorecard Early Binding
			$strAlias = $strAliasPrefix . 'scorecard_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objScorecard = Scorecard::InstantiateDbRow($objDbRow, $strAliasPrefix . 'scorecard_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for ModifiedByObject Early Binding
			$strAlias = $strAliasPrefix . 'modified_by__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objModifiedByObject = User::InstantiateDbRow($objDbRow, $strAliasPrefix . 'modified_by__', $strExpandAsArrayNodes, null, $strColumnAliasArray);



			// Check for GiantsAsGiant Virtual Binding
			$strAlias = $strAliasPrefix . 'giantsasgiant__giant_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objGiantsAsGiantArray[] = Giants::InstantiateDbRow($objDbRow, $strAliasPrefix . 'giantsasgiant__giant_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objGiantsAsGiant = Giants::InstantiateDbRow($objDbRow, $strAliasPrefix . 'giantsasgiant__giant_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for SpheresAsSphere Virtual Binding
			$strAlias = $strAliasPrefix . 'spheresassphere__sphere_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objSpheresAsSphereArray[] = Spheres::InstantiateDbRow($objDbRow, $strAliasPrefix . 'spheresassphere__sphere_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objSpheresAsSphere = Spheres::InstantiateDbRow($objDbRow, $strAliasPrefix . 'spheresassphere__sphere_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
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

			return $objToReturn;
		}

		/**
		 * Instantiate an array of Strategies from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Strategy[]
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
					$objItem = Strategy::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Strategy::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single Strategy object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Strategy next row resulting from the query
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
			return Strategy::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Strategy object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return Strategy
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return Strategy::QuerySingle(
				QQ::Equal(QQN::Strategy()->Id, $intId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Strategy objects,
		 * by Priority Index(es)
		 * @param integer $intPriority
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Strategy[]
		*/
		public static function LoadArrayByPriority($intPriority, $objOptionalClauses = null) {
			// Call Strategy::QueryArray to perform the LoadArrayByPriority query
			try {
				return Strategy::QueryArray(
					QQ::Equal(QQN::Strategy()->Priority, $intPriority),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Strategies
		 * by Priority Index(es)
		 * @param integer $intPriority
		 * @return int
		*/
		public static function CountByPriority($intPriority, $objOptionalClauses = null) {
			// Call Strategy::QueryCount to perform the CountByPriority query
			return Strategy::QueryCount(
				QQ::Equal(QQN::Strategy()->Priority, $intPriority)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Strategy objects,
		 * by ScorecardId Index(es)
		 * @param integer $intScorecardId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Strategy[]
		*/
		public static function LoadArrayByScorecardId($intScorecardId, $objOptionalClauses = null) {
			// Call Strategy::QueryArray to perform the LoadArrayByScorecardId query
			try {
				return Strategy::QueryArray(
					QQ::Equal(QQN::Strategy()->ScorecardId, $intScorecardId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Strategies
		 * by ScorecardId Index(es)
		 * @param integer $intScorecardId
		 * @return int
		*/
		public static function CountByScorecardId($intScorecardId, $objOptionalClauses = null) {
			// Call Strategy::QueryCount to perform the CountByScorecardId query
			return Strategy::QueryCount(
				QQ::Equal(QQN::Strategy()->ScorecardId, $intScorecardId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Strategy objects,
		 * by CategoryTypeId Index(es)
		 * @param integer $intCategoryTypeId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Strategy[]
		*/
		public static function LoadArrayByCategoryTypeId($intCategoryTypeId, $objOptionalClauses = null) {
			// Call Strategy::QueryArray to perform the LoadArrayByCategoryTypeId query
			try {
				return Strategy::QueryArray(
					QQ::Equal(QQN::Strategy()->CategoryTypeId, $intCategoryTypeId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Strategies
		 * by CategoryTypeId Index(es)
		 * @param integer $intCategoryTypeId
		 * @return int
		*/
		public static function CountByCategoryTypeId($intCategoryTypeId, $objOptionalClauses = null) {
			// Call Strategy::QueryCount to perform the CountByCategoryTypeId query
			return Strategy::QueryCount(
				QQ::Equal(QQN::Strategy()->CategoryTypeId, $intCategoryTypeId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Strategy objects,
		 * by ModifiedBy Index(es)
		 * @param integer $intModifiedBy
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Strategy[]
		*/
		public static function LoadArrayByModifiedBy($intModifiedBy, $objOptionalClauses = null) {
			// Call Strategy::QueryArray to perform the LoadArrayByModifiedBy query
			try {
				return Strategy::QueryArray(
					QQ::Equal(QQN::Strategy()->ModifiedBy, $intModifiedBy),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Strategies
		 * by ModifiedBy Index(es)
		 * @param integer $intModifiedBy
		 * @return int
		*/
		public static function CountByModifiedBy($intModifiedBy, $objOptionalClauses = null) {
			// Call Strategy::QueryCount to perform the CountByModifiedBy query
			return Strategy::QueryCount(
				QQ::Equal(QQN::Strategy()->ModifiedBy, $intModifiedBy)
			, $objOptionalClauses
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////
			/**
		 * Load an array of Giants objects for a given GiantsAsGiant
		 * via the strategy_giant_assn table
		 * @param integer $intGiantId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Strategy[]
		*/
		public static function LoadArrayByGiantsAsGiant($intGiantId, $objOptionalClauses = null) {
			// Call Strategy::QueryArray to perform the LoadArrayByGiantsAsGiant query
			try {
				return Strategy::QueryArray(
					QQ::Equal(QQN::Strategy()->GiantsAsGiant->GiantId, $intGiantId),
					$objOptionalClauses
				);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Strategies for a given GiantsAsGiant
		 * via the strategy_giant_assn table
		 * @param integer $intGiantId
		 * @return int
		*/
		public static function CountByGiantsAsGiant($intGiantId, $objOptionalClauses = null) {
			return Strategy::QueryCount(
				QQ::Equal(QQN::Strategy()->GiantsAsGiant->GiantId, $intGiantId),
				$objOptionalClauses
			);
		}
			/**
		 * Load an array of Spheres objects for a given SpheresAsSphere
		 * via the strategy_sphere_assn table
		 * @param integer $intSphereId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Strategy[]
		*/
		public static function LoadArrayBySpheresAsSphere($intSphereId, $objOptionalClauses = null) {
			// Call Strategy::QueryArray to perform the LoadArrayBySpheresAsSphere query
			try {
				return Strategy::QueryArray(
					QQ::Equal(QQN::Strategy()->SpheresAsSphere->SphereId, $intSphereId),
					$objOptionalClauses
				);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Strategies for a given SpheresAsSphere
		 * via the strategy_sphere_assn table
		 * @param integer $intSphereId
		 * @return int
		*/
		public static function CountBySpheresAsSphere($intSphereId, $objOptionalClauses = null) {
			return Strategy::QueryCount(
				QQ::Equal(QQN::Strategy()->SpheresAsSphere->SphereId, $intSphereId),
				$objOptionalClauses
			);
		}




		//////////////////////////////////////
		// SAVE, DELETE, RELOAD and JOURNALING
		//////////////////////////////////////

		/**
		 * Save this Strategy
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Strategy::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `strategy` (
							`strategy`,
							`priority`,
							`count`,
							`scorecard_id`,
							`category_type_id`,
							`modified_by`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strStrategy) . ',
							' . $objDatabase->SqlVariable($this->intPriority) . ',
							' . $objDatabase->SqlVariable($this->intCount) . ',
							' . $objDatabase->SqlVariable($this->intScorecardId) . ',
							' . $objDatabase->SqlVariable($this->intCategoryTypeId) . ',
							' . $objDatabase->SqlVariable($this->intModifiedBy) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('strategy', 'id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)
					if (!$blnForceUpdate) {
						// Perform the Optimistic Locking check
						$objResult = $objDatabase->Query('
							SELECT
								`modified`
							FROM
								`strategy`
							WHERE
								`id` = ' . $objDatabase->SqlVariable($this->intId) . '
						');
						
						$objRow = $objResult->FetchArray();
						if ($objRow[0] != $this->strModified)
							throw new QOptimisticLockingException('Strategy');
					}

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`strategy`
						SET
							`strategy` = ' . $objDatabase->SqlVariable($this->strStrategy) . ',
							`priority` = ' . $objDatabase->SqlVariable($this->intPriority) . ',
							`count` = ' . $objDatabase->SqlVariable($this->intCount) . ',
							`scorecard_id` = ' . $objDatabase->SqlVariable($this->intScorecardId) . ',
							`category_type_id` = ' . $objDatabase->SqlVariable($this->intCategoryTypeId) . ',
							`modified_by` = ' . $objDatabase->SqlVariable($this->intModifiedBy) . '
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

			// Update Local Timestamp
			$objResult = $objDatabase->Query('
				SELECT
					`modified`
				FROM
					`strategy`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
						
			$objRow = $objResult->FetchArray();
			$this->strModified = $objRow[0];

			// Return 
			return $mixToReturn;
		}

		/**
		 * Delete this Strategy
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Strategy with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Strategy::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`strategy`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all Strategies
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Strategy::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`strategy`');
		}

		/**
		 * Truncate strategy table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Strategy::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `strategy`');
		}

		/**
		 * Reload this Strategy from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Strategy object.');

			// Reload the Object
			$objReloaded = Strategy::Load($this->intId);

			// Update $this's local variables to match
			$this->strStrategy = $objReloaded->strStrategy;
			$this->intPriority = $objReloaded->intPriority;
			$this->intCount = $objReloaded->intCount;
			$this->ScorecardId = $objReloaded->ScorecardId;
			$this->CategoryTypeId = $objReloaded->CategoryTypeId;
			$this->ModifiedBy = $objReloaded->ModifiedBy;
			$this->strModified = $objReloaded->strModified;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = Strategy::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `strategy` (
					`id`,
					`strategy`,
					`priority`,
					`count`,
					`scorecard_id`,
					`category_type_id`,
					`modified_by`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->strStrategy) . ',
					' . $objDatabase->SqlVariable($this->intPriority) . ',
					' . $objDatabase->SqlVariable($this->intCount) . ',
					' . $objDatabase->SqlVariable($this->intScorecardId) . ',
					' . $objDatabase->SqlVariable($this->intCategoryTypeId) . ',
					' . $objDatabase->SqlVariable($this->intModifiedBy) . ',
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
		 * @return Strategy[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = Strategy::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM strategy WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return Strategy::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return Strategy[]
		 */
		public function GetJournal() {
			return Strategy::GetJournalForId($this->intId);
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

				case 'Strategy':
					// Gets the value for strStrategy 
					// @return string
					return $this->strStrategy;

				case 'Priority':
					// Gets the value for intPriority 
					// @return integer
					return $this->intPriority;

				case 'Count':
					// Gets the value for intCount 
					// @return integer
					return $this->intCount;

				case 'ScorecardId':
					// Gets the value for intScorecardId 
					// @return integer
					return $this->intScorecardId;

				case 'CategoryTypeId':
					// Gets the value for intCategoryTypeId 
					// @return integer
					return $this->intCategoryTypeId;

				case 'ModifiedBy':
					// Gets the value for intModifiedBy 
					// @return integer
					return $this->intModifiedBy;

				case 'Modified':
					// Gets the value for strModified (Read-Only Timestamp)
					// @return string
					return $this->strModified;


				///////////////////
				// Member Objects
				///////////////////
				case 'Scorecard':
					// Gets the value for the Scorecard object referenced by intScorecardId 
					// @return Scorecard
					try {
						if ((!$this->objScorecard) && (!is_null($this->intScorecardId)))
							$this->objScorecard = Scorecard::Load($this->intScorecardId);
						return $this->objScorecard;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ModifiedByObject':
					// Gets the value for the User object referenced by intModifiedBy 
					// @return User
					try {
						if ((!$this->objModifiedByObject) && (!is_null($this->intModifiedBy)))
							$this->objModifiedByObject = User::Load($this->intModifiedBy);
						return $this->objModifiedByObject;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_GiantsAsGiant':
					// Gets the value for the private _objGiantsAsGiant (Read-Only)
					// if set due to an expansion on the strategy_giant_assn association table
					// @return Giants
					return $this->_objGiantsAsGiant;

				case '_GiantsAsGiantArray':
					// Gets the value for the private _objGiantsAsGiantArray (Read-Only)
					// if set due to an ExpandAsArray on the strategy_giant_assn association table
					// @return Giants[]
					return (array) $this->_objGiantsAsGiantArray;

				case '_SpheresAsSphere':
					// Gets the value for the private _objSpheresAsSphere (Read-Only)
					// if set due to an expansion on the strategy_sphere_assn association table
					// @return Spheres
					return $this->_objSpheresAsSphere;

				case '_SpheresAsSphereArray':
					// Gets the value for the private _objSpheresAsSphereArray (Read-Only)
					// if set due to an ExpandAsArray on the strategy_sphere_assn association table
					// @return Spheres[]
					return (array) $this->_objSpheresAsSphereArray;

				case '_ActionItems':
					// Gets the value for the private _objActionItems (Read-Only)
					// if set due to an expansion on the action_items.strategy_id reverse relationship
					// @return ActionItems
					return $this->_objActionItems;

				case '_ActionItemsArray':
					// Gets the value for the private _objActionItemsArray (Read-Only)
					// if set due to an ExpandAsArray on the action_items.strategy_id reverse relationship
					// @return ActionItems[]
					return (array) $this->_objActionItemsArray;

				case '_Kpis':
					// Gets the value for the private _objKpis (Read-Only)
					// if set due to an expansion on the kpis.strategy_id reverse relationship
					// @return Kpis
					return $this->_objKpis;

				case '_KpisArray':
					// Gets the value for the private _objKpisArray (Read-Only)
					// if set due to an ExpandAsArray on the kpis.strategy_id reverse relationship
					// @return Kpis[]
					return (array) $this->_objKpisArray;


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
				case 'Strategy':
					// Sets the value for strStrategy 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strStrategy = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Priority':
					// Sets the value for intPriority 
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intPriority = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Count':
					// Sets the value for intCount 
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intCount = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ScorecardId':
					// Sets the value for intScorecardId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objScorecard = null;
						return ($this->intScorecardId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CategoryTypeId':
					// Sets the value for intCategoryTypeId 
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intCategoryTypeId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ModifiedBy':
					// Sets the value for intModifiedBy 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objModifiedByObject = null;
						return ($this->intModifiedBy = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Scorecard':
					// Sets the value for the Scorecard object referenced by intScorecardId 
					// @param Scorecard $mixValue
					// @return Scorecard
					if (is_null($mixValue)) {
						$this->intScorecardId = null;
						$this->objScorecard = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Scorecard object
						try {
							$mixValue = QType::Cast($mixValue, 'Scorecard');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Scorecard object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Scorecard for this Strategy');

						// Update Local Member Variables
						$this->objScorecard = $mixValue;
						$this->intScorecardId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'ModifiedByObject':
					// Sets the value for the User object referenced by intModifiedBy 
					// @param User $mixValue
					// @return User
					if (is_null($mixValue)) {
						$this->intModifiedBy = null;
						$this->objModifiedByObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a User object
						try {
							$mixValue = QType::Cast($mixValue, 'User');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED User object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved ModifiedByObject for this Strategy');

						// Update Local Member Variables
						$this->objModifiedByObject = $mixValue;
						$this->intModifiedBy = $mixValue->Id;

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
				return ActionItems::LoadArrayByStrategyId($this->intId, $objOptionalClauses);
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

			return ActionItems::CountByStrategyId($this->intId);
		}

		/**
		 * Associates a ActionItems
		 * @param ActionItems $objActionItems
		 * @return void
		*/ 
		public function AssociateActionItems(ActionItems $objActionItems) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateActionItems on this unsaved Strategy.');
			if ((is_null($objActionItems->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateActionItems on this Strategy with an unsaved ActionItems.');

			// Get the Database Object for this Class
			$objDatabase = Strategy::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`action_items`
				SET
					`strategy_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objActionItems->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objActionItems->StrategyId = $this->intId;
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
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateActionItems on this unsaved Strategy.');
			if ((is_null($objActionItems->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateActionItems on this Strategy with an unsaved ActionItems.');

			// Get the Database Object for this Class
			$objDatabase = Strategy::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`action_items`
				SET
					`strategy_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objActionItems->Id) . ' AND
					`strategy_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objActionItems->StrategyId = null;
				$objActionItems->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all ActionItemses
		 * @return void
		*/ 
		public function UnassociateAllActionItemses() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateActionItems on this unsaved Strategy.');

			// Get the Database Object for this Class
			$objDatabase = Strategy::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (ActionItems::LoadArrayByStrategyId($this->intId) as $objActionItems) {
					$objActionItems->StrategyId = null;
					$objActionItems->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`action_items`
				SET
					`strategy_id` = null
				WHERE
					`strategy_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated ActionItems
		 * @param ActionItems $objActionItems
		 * @return void
		*/ 
		public function DeleteAssociatedActionItems(ActionItems $objActionItems) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateActionItems on this unsaved Strategy.');
			if ((is_null($objActionItems->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateActionItems on this Strategy with an unsaved ActionItems.');

			// Get the Database Object for this Class
			$objDatabase = Strategy::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`action_items`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objActionItems->Id) . ' AND
					`strategy_id` = ' . $objDatabase->SqlVariable($this->intId) . '
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
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateActionItems on this unsaved Strategy.');

			// Get the Database Object for this Class
			$objDatabase = Strategy::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (ActionItems::LoadArrayByStrategyId($this->intId) as $objActionItems) {
					$objActionItems->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`action_items`
				WHERE
					`strategy_id` = ' . $objDatabase->SqlVariable($this->intId) . '
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
				return Kpis::LoadArrayByStrategyId($this->intId, $objOptionalClauses);
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

			return Kpis::CountByStrategyId($this->intId);
		}

		/**
		 * Associates a Kpis
		 * @param Kpis $objKpis
		 * @return void
		*/ 
		public function AssociateKpis(Kpis $objKpis) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateKpis on this unsaved Strategy.');
			if ((is_null($objKpis->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateKpis on this Strategy with an unsaved Kpis.');

			// Get the Database Object for this Class
			$objDatabase = Strategy::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`kpis`
				SET
					`strategy_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objKpis->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objKpis->StrategyId = $this->intId;
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
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateKpis on this unsaved Strategy.');
			if ((is_null($objKpis->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateKpis on this Strategy with an unsaved Kpis.');

			// Get the Database Object for this Class
			$objDatabase = Strategy::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`kpis`
				SET
					`strategy_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objKpis->Id) . ' AND
					`strategy_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objKpis->StrategyId = null;
				$objKpis->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all Kpises
		 * @return void
		*/ 
		public function UnassociateAllKpises() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateKpis on this unsaved Strategy.');

			// Get the Database Object for this Class
			$objDatabase = Strategy::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Kpis::LoadArrayByStrategyId($this->intId) as $objKpis) {
					$objKpis->StrategyId = null;
					$objKpis->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`kpis`
				SET
					`strategy_id` = null
				WHERE
					`strategy_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated Kpis
		 * @param Kpis $objKpis
		 * @return void
		*/ 
		public function DeleteAssociatedKpis(Kpis $objKpis) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateKpis on this unsaved Strategy.');
			if ((is_null($objKpis->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateKpis on this Strategy with an unsaved Kpis.');

			// Get the Database Object for this Class
			$objDatabase = Strategy::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`kpis`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objKpis->Id) . ' AND
					`strategy_id` = ' . $objDatabase->SqlVariable($this->intId) . '
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
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateKpis on this unsaved Strategy.');

			// Get the Database Object for this Class
			$objDatabase = Strategy::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Kpis::LoadArrayByStrategyId($this->intId) as $objKpis) {
					$objKpis->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`kpis`
				WHERE
					`strategy_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		// Related Many-to-Many Objects' Methods for GiantsAsGiant
		//-------------------------------------------------------------------

		/**
		 * Gets all many-to-many associated GiantsesAsGiant as an array of Giants objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Giants[]
		*/ 
		public function GetGiantsAsGiantArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Giants::LoadArrayByStrategyAsGiant($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all many-to-many associated GiantsesAsGiant
		 * @return int
		*/ 
		public function CountGiantsesAsGiant() {
			if ((is_null($this->intId)))
				return 0;

			return Giants::CountByStrategyAsGiant($this->intId);
		}

		/**
		 * Checks to see if an association exists with a specific GiantsAsGiant
		 * @param Giants $objGiants
		 * @return bool
		*/
		public function IsGiantsAsGiantAssociated(Giants $objGiants) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsGiantsAsGiantAssociated on this unsaved Strategy.');
			if ((is_null($objGiants->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsGiantsAsGiantAssociated on this Strategy with an unsaved Giants.');

			$intRowCount = Strategy::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::Strategy()->Id, $this->intId),
					QQ::Equal(QQN::Strategy()->GiantsAsGiant->GiantId, $objGiants->Id)
				)
			);

			return ($intRowCount > 0);
		}

		/**
		 * Journals the GiantsAsGiant relationship into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function JournalGiantsAsGiantAssociation($intAssociatedId, $strJournalCommand) {
			$objDatabase = Strategy::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `strategy_giant_assn` (
					`strategy_id`,
					`giant_id`,
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
		 * Gets the historical journal for an object's GiantsAsGiant relationship from the log database.
		 * @param integer intId
		 * @return QDatabaseResult $objResult
		 */
		public static function GetJournalGiantsAsGiantAssociationForId($intId) {
			$objDatabase = Strategy::GetDatabase()->JournalingDatabase;

			return $objDatabase->Query('SELECT * FROM strategy_giant_assn WHERE strategy_id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');
		}

		/**
		 * Gets the historical journal for this object's GiantsAsGiant relationship from the log database.
		 * @return QDatabaseResult $objResult
		 */
		public function GetJournalGiantsAsGiantAssociation() {
			return Strategy::GetJournalGiantsAsGiantAssociationForId($this->intId);
		}

		/**
		 * Associates a GiantsAsGiant
		 * @param Giants $objGiants
		 * @return void
		*/ 
		public function AssociateGiantsAsGiant(Giants $objGiants) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGiantsAsGiant on this unsaved Strategy.');
			if ((is_null($objGiants->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGiantsAsGiant on this Strategy with an unsaved Giants.');

			// Get the Database Object for this Class
			$objDatabase = Strategy::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				INSERT INTO `strategy_giant_assn` (
					`strategy_id`,
					`giant_id`
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($objGiants->Id) . '
				)
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase)
				$this->JournalGiantsAsGiantAssociation($objGiants->Id, 'INSERT');
		}

		/**
		 * Unassociates a GiantsAsGiant
		 * @param Giants $objGiants
		 * @return void
		*/ 
		public function UnassociateGiantsAsGiant(Giants $objGiants) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGiantsAsGiant on this unsaved Strategy.');
			if ((is_null($objGiants->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGiantsAsGiant on this Strategy with an unsaved Giants.');

			// Get the Database Object for this Class
			$objDatabase = Strategy::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`strategy_giant_assn`
				WHERE
					`strategy_id` = ' . $objDatabase->SqlVariable($this->intId) . ' AND
					`giant_id` = ' . $objDatabase->SqlVariable($objGiants->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase)
				$this->JournalGiantsAsGiantAssociation($objGiants->Id, 'DELETE');
		}

		/**
		 * Unassociates all GiantsesAsGiant
		 * @return void
		*/ 
		public function UnassociateAllGiantsesAsGiant() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAllGiantsAsGiantArray on this unsaved Strategy.');

			// Get the Database Object for this Class
			$objDatabase = Strategy::GetDatabase();

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objResult = $objDatabase->Query('SELECT `giant_id` AS associated_id FROM `strategy_giant_assn` WHERE `strategy_id` = ' . $objDatabase->SqlVariable($this->intId));
				while ($objRow = $objResult->GetNextRow()) {
					$this->JournalGiantsAsGiantAssociation($objRow->GetColumn('associated_id'), 'DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`strategy_giant_assn`
				WHERE
					`strategy_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}
			
		// Related Many-to-Many Objects' Methods for SpheresAsSphere
		//-------------------------------------------------------------------

		/**
		 * Gets all many-to-many associated SpheresesAsSphere as an array of Spheres objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Spheres[]
		*/ 
		public function GetSpheresAsSphereArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Spheres::LoadArrayByStrategyAsSphere($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all many-to-many associated SpheresesAsSphere
		 * @return int
		*/ 
		public function CountSpheresesAsSphere() {
			if ((is_null($this->intId)))
				return 0;

			return Spheres::CountByStrategyAsSphere($this->intId);
		}

		/**
		 * Checks to see if an association exists with a specific SpheresAsSphere
		 * @param Spheres $objSpheres
		 * @return bool
		*/
		public function IsSpheresAsSphereAssociated(Spheres $objSpheres) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsSpheresAsSphereAssociated on this unsaved Strategy.');
			if ((is_null($objSpheres->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsSpheresAsSphereAssociated on this Strategy with an unsaved Spheres.');

			$intRowCount = Strategy::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::Strategy()->Id, $this->intId),
					QQ::Equal(QQN::Strategy()->SpheresAsSphere->SphereId, $objSpheres->Id)
				)
			);

			return ($intRowCount > 0);
		}

		/**
		 * Journals the SpheresAsSphere relationship into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function JournalSpheresAsSphereAssociation($intAssociatedId, $strJournalCommand) {
			$objDatabase = Strategy::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `strategy_sphere_assn` (
					`strategy_id`,
					`sphere_id`,
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
		 * Gets the historical journal for an object's SpheresAsSphere relationship from the log database.
		 * @param integer intId
		 * @return QDatabaseResult $objResult
		 */
		public static function GetJournalSpheresAsSphereAssociationForId($intId) {
			$objDatabase = Strategy::GetDatabase()->JournalingDatabase;

			return $objDatabase->Query('SELECT * FROM strategy_sphere_assn WHERE strategy_id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');
		}

		/**
		 * Gets the historical journal for this object's SpheresAsSphere relationship from the log database.
		 * @return QDatabaseResult $objResult
		 */
		public function GetJournalSpheresAsSphereAssociation() {
			return Strategy::GetJournalSpheresAsSphereAssociationForId($this->intId);
		}

		/**
		 * Associates a SpheresAsSphere
		 * @param Spheres $objSpheres
		 * @return void
		*/ 
		public function AssociateSpheresAsSphere(Spheres $objSpheres) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateSpheresAsSphere on this unsaved Strategy.');
			if ((is_null($objSpheres->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateSpheresAsSphere on this Strategy with an unsaved Spheres.');

			// Get the Database Object for this Class
			$objDatabase = Strategy::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				INSERT INTO `strategy_sphere_assn` (
					`strategy_id`,
					`sphere_id`
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($objSpheres->Id) . '
				)
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase)
				$this->JournalSpheresAsSphereAssociation($objSpheres->Id, 'INSERT');
		}

		/**
		 * Unassociates a SpheresAsSphere
		 * @param Spheres $objSpheres
		 * @return void
		*/ 
		public function UnassociateSpheresAsSphere(Spheres $objSpheres) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSpheresAsSphere on this unsaved Strategy.');
			if ((is_null($objSpheres->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSpheresAsSphere on this Strategy with an unsaved Spheres.');

			// Get the Database Object for this Class
			$objDatabase = Strategy::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`strategy_sphere_assn`
				WHERE
					`strategy_id` = ' . $objDatabase->SqlVariable($this->intId) . ' AND
					`sphere_id` = ' . $objDatabase->SqlVariable($objSpheres->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase)
				$this->JournalSpheresAsSphereAssociation($objSpheres->Id, 'DELETE');
		}

		/**
		 * Unassociates all SpheresesAsSphere
		 * @return void
		*/ 
		public function UnassociateAllSpheresesAsSphere() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAllSpheresAsSphereArray on this unsaved Strategy.');

			// Get the Database Object for this Class
			$objDatabase = Strategy::GetDatabase();

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objResult = $objDatabase->Query('SELECT `sphere_id` AS associated_id FROM `strategy_sphere_assn` WHERE `strategy_id` = ' . $objDatabase->SqlVariable($this->intId));
				while ($objRow = $objResult->GetNextRow()) {
					$this->JournalSpheresAsSphereAssociation($objRow->GetColumn('associated_id'), 'DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`strategy_sphere_assn`
				WHERE
					`strategy_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}




		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="Strategy"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Strategy" type="xsd:string"/>';
			$strToReturn .= '<element name="Priority" type="xsd:int"/>';
			$strToReturn .= '<element name="Count" type="xsd:int"/>';
			$strToReturn .= '<element name="Scorecard" type="xsd1:Scorecard"/>';
			$strToReturn .= '<element name="CategoryTypeId" type="xsd:int"/>';
			$strToReturn .= '<element name="ModifiedByObject" type="xsd1:User"/>';
			$strToReturn .= '<element name="Modified" type="xsd:string"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Strategy', $strComplexTypeArray)) {
				$strComplexTypeArray['Strategy'] = Strategy::GetSoapComplexTypeXml();
				Scorecard::AlterSoapComplexTypeArray($strComplexTypeArray);
				User::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Strategy::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Strategy();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'Strategy'))
				$objToReturn->strStrategy = $objSoapObject->Strategy;
			if (property_exists($objSoapObject, 'Priority'))
				$objToReturn->intPriority = $objSoapObject->Priority;
			if (property_exists($objSoapObject, 'Count'))
				$objToReturn->intCount = $objSoapObject->Count;
			if ((property_exists($objSoapObject, 'Scorecard')) &&
				($objSoapObject->Scorecard))
				$objToReturn->Scorecard = Scorecard::GetObjectFromSoapObject($objSoapObject->Scorecard);
			if (property_exists($objSoapObject, 'CategoryTypeId'))
				$objToReturn->intCategoryTypeId = $objSoapObject->CategoryTypeId;
			if ((property_exists($objSoapObject, 'ModifiedByObject')) &&
				($objSoapObject->ModifiedByObject))
				$objToReturn->ModifiedByObject = User::GetObjectFromSoapObject($objSoapObject->ModifiedByObject);
			if (property_exists($objSoapObject, 'Modified'))
				$objToReturn->strModified = $objSoapObject->Modified;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Strategy::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objScorecard)
				$objObject->objScorecard = Scorecard::GetSoapObjectFromObject($objObject->objScorecard, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intScorecardId = null;
			if ($objObject->objModifiedByObject)
				$objObject->objModifiedByObject = User::GetSoapObjectFromObject($objObject->objModifiedByObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intModifiedBy = null;
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $GiantId
	 * @property-read QQNodeGiants $Giants
	 * @property-read QQNodeGiants $_ChildTableNode
	 */
	class QQNodeStrategyGiantsAsGiant extends QQAssociationNode {
		protected $strType = 'association';
		protected $strName = 'giantsasgiant';

		protected $strTableName = 'strategy_giant_assn';
		protected $strPrimaryKey = 'strategy_id';
		protected $strClassName = 'Giants';

		public function __get($strName) {
			switch ($strName) {
				case 'GiantId':
					return new QQNode('giant_id', 'GiantId', 'integer', $this);
				case 'Giants':
					return new QQNodeGiants('giant_id', 'GiantId', 'integer', $this);
				case '_ChildTableNode':
					return new QQNodeGiants('giant_id', 'GiantId', 'integer', $this);
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
	 * @property-read QQNode $SphereId
	 * @property-read QQNodeSpheres $Spheres
	 * @property-read QQNodeSpheres $_ChildTableNode
	 */
	class QQNodeStrategySpheresAsSphere extends QQAssociationNode {
		protected $strType = 'association';
		protected $strName = 'spheresassphere';

		protected $strTableName = 'strategy_sphere_assn';
		protected $strPrimaryKey = 'strategy_id';
		protected $strClassName = 'Spheres';

		public function __get($strName) {
			switch ($strName) {
				case 'SphereId':
					return new QQNode('sphere_id', 'SphereId', 'integer', $this);
				case 'Spheres':
					return new QQNodeSpheres('sphere_id', 'SphereId', 'integer', $this);
				case '_ChildTableNode':
					return new QQNodeSpheres('sphere_id', 'SphereId', 'integer', $this);
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
	 * @property-read QQNode $Strategy
	 * @property-read QQNode $Priority
	 * @property-read QQNode $Count
	 * @property-read QQNode $ScorecardId
	 * @property-read QQNodeScorecard $Scorecard
	 * @property-read QQNode $CategoryTypeId
	 * @property-read QQNode $ModifiedBy
	 * @property-read QQNodeUser $ModifiedByObject
	 * @property-read QQNode $Modified
	 * @property-read QQNodeStrategyGiantsAsGiant $GiantsAsGiant
	 * @property-read QQNodeStrategySpheresAsSphere $SpheresAsSphere
	 * @property-read QQReverseReferenceNodeActionItems $ActionItems
	 * @property-read QQReverseReferenceNodeKpis $Kpis
	 */
	class QQNodeStrategy extends QQNode {
		protected $strTableName = 'strategy';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Strategy';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Strategy':
					return new QQNode('strategy', 'Strategy', 'string', $this);
				case 'Priority':
					return new QQNode('priority', 'Priority', 'integer', $this);
				case 'Count':
					return new QQNode('count', 'Count', 'integer', $this);
				case 'ScorecardId':
					return new QQNode('scorecard_id', 'ScorecardId', 'integer', $this);
				case 'Scorecard':
					return new QQNodeScorecard('scorecard_id', 'Scorecard', 'integer', $this);
				case 'CategoryTypeId':
					return new QQNode('category_type_id', 'CategoryTypeId', 'integer', $this);
				case 'ModifiedBy':
					return new QQNode('modified_by', 'ModifiedBy', 'integer', $this);
				case 'ModifiedByObject':
					return new QQNodeUser('modified_by', 'ModifiedByObject', 'integer', $this);
				case 'Modified':
					return new QQNode('modified', 'Modified', 'string', $this);
				case 'GiantsAsGiant':
					return new QQNodeStrategyGiantsAsGiant($this);
				case 'SpheresAsSphere':
					return new QQNodeStrategySpheresAsSphere($this);
				case 'ActionItems':
					return new QQReverseReferenceNodeActionItems($this, 'actionitems', 'reverse_reference', 'strategy_id');
				case 'Kpis':
					return new QQReverseReferenceNodeKpis($this, 'kpis', 'reverse_reference', 'strategy_id');

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
	 * @property-read QQNode $Strategy
	 * @property-read QQNode $Priority
	 * @property-read QQNode $Count
	 * @property-read QQNode $ScorecardId
	 * @property-read QQNodeScorecard $Scorecard
	 * @property-read QQNode $CategoryTypeId
	 * @property-read QQNode $ModifiedBy
	 * @property-read QQNodeUser $ModifiedByObject
	 * @property-read QQNode $Modified
	 * @property-read QQNodeStrategyGiantsAsGiant $GiantsAsGiant
	 * @property-read QQNodeStrategySpheresAsSphere $SpheresAsSphere
	 * @property-read QQReverseReferenceNodeActionItems $ActionItems
	 * @property-read QQReverseReferenceNodeKpis $Kpis
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeStrategy extends QQReverseReferenceNode {
		protected $strTableName = 'strategy';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Strategy';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Strategy':
					return new QQNode('strategy', 'Strategy', 'string', $this);
				case 'Priority':
					return new QQNode('priority', 'Priority', 'integer', $this);
				case 'Count':
					return new QQNode('count', 'Count', 'integer', $this);
				case 'ScorecardId':
					return new QQNode('scorecard_id', 'ScorecardId', 'integer', $this);
				case 'Scorecard':
					return new QQNodeScorecard('scorecard_id', 'Scorecard', 'integer', $this);
				case 'CategoryTypeId':
					return new QQNode('category_type_id', 'CategoryTypeId', 'integer', $this);
				case 'ModifiedBy':
					return new QQNode('modified_by', 'ModifiedBy', 'integer', $this);
				case 'ModifiedByObject':
					return new QQNodeUser('modified_by', 'ModifiedByObject', 'integer', $this);
				case 'Modified':
					return new QQNode('modified', 'Modified', 'string', $this);
				case 'GiantsAsGiant':
					return new QQNodeStrategyGiantsAsGiant($this);
				case 'SpheresAsSphere':
					return new QQNodeStrategySpheresAsSphere($this);
				case 'ActionItems':
					return new QQReverseReferenceNodeActionItems($this, 'actionitems', 'reverse_reference', 'strategy_id');
				case 'Kpis':
					return new QQReverseReferenceNodeKpis($this, 'kpis', 'reverse_reference', 'strategy_id');

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