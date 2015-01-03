<?php
	/**
	 * The abstract ActionItemsGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the ActionItems subclass which
	 * extends this ActionItemsGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the ActionItems class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property string $Action the value for strAction 
	 * @property integer $StrategyId the value for intStrategyId 
	 * @property integer $ScorecardId the value for intScorecardId 
	 * @property integer $Who the value for intWho 
	 * @property QDateTime $When the value for dttWhen 
	 * @property integer $StatusType the value for intStatusType 
	 * @property string $Comments the value for strComments 
	 * @property integer $CategoryId the value for intCategoryId 
	 * @property integer $Count the value for intCount 
	 * @property integer $ModifiedBy the value for intModifiedBy 
	 * @property string $Modified the value for strModified (Read-Only Timestamp)
	 * @property boolean $Rank the value for blnRank 
	 * @property Strategy $Strategy the value for the Strategy object referenced by intStrategyId 
	 * @property Scorecard $Scorecard the value for the Scorecard object referenced by intScorecardId 
	 * @property User $WhoObject the value for the User object referenced by intWho 
	 * @property User $ModifiedByObject the value for the User object referenced by intModifiedBy 
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class ActionItemsGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column action_items.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column action_items.action
		 * @var string strAction
		 */
		protected $strAction;
		const ActionDefault = null;


		/**
		 * Protected member variable that maps to the database column action_items.strategy_id
		 * @var integer intStrategyId
		 */
		protected $intStrategyId;
		const StrategyIdDefault = null;


		/**
		 * Protected member variable that maps to the database column action_items.scorecard_id
		 * @var integer intScorecardId
		 */
		protected $intScorecardId;
		const ScorecardIdDefault = null;


		/**
		 * Protected member variable that maps to the database column action_items.who
		 * @var integer intWho
		 */
		protected $intWho;
		const WhoDefault = null;


		/**
		 * Protected member variable that maps to the database column action_items.when
		 * @var QDateTime dttWhen
		 */
		protected $dttWhen;
		const WhenDefault = null;


		/**
		 * Protected member variable that maps to the database column action_items.status_type
		 * @var integer intStatusType
		 */
		protected $intStatusType;
		const StatusTypeDefault = null;


		/**
		 * Protected member variable that maps to the database column action_items.comments
		 * @var string strComments
		 */
		protected $strComments;
		const CommentsDefault = null;


		/**
		 * Protected member variable that maps to the database column action_items.category_id
		 * @var integer intCategoryId
		 */
		protected $intCategoryId;
		const CategoryIdDefault = null;


		/**
		 * Protected member variable that maps to the database column action_items.count
		 * @var integer intCount
		 */
		protected $intCount;
		const CountDefault = null;


		/**
		 * Protected member variable that maps to the database column action_items.modified_by
		 * @var integer intModifiedBy
		 */
		protected $intModifiedBy;
		const ModifiedByDefault = null;


		/**
		 * Protected member variable that maps to the database column action_items.modified
		 * @var string strModified
		 */
		protected $strModified;
		const ModifiedDefault = null;


		/**
		 * Protected member variable that maps to the database column action_items.rank
		 * @var boolean blnRank
		 */
		protected $blnRank;
		const RankDefault = null;


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
		 * in the database column action_items.strategy_id.
		 *
		 * NOTE: Always use the Strategy property getter to correctly retrieve this Strategy object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Strategy objStrategy
		 */
		protected $objStrategy;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column action_items.scorecard_id.
		 *
		 * NOTE: Always use the Scorecard property getter to correctly retrieve this Scorecard object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Scorecard objScorecard
		 */
		protected $objScorecard;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column action_items.who.
		 *
		 * NOTE: Always use the WhoObject property getter to correctly retrieve this User object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var User objWhoObject
		 */
		protected $objWhoObject;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column action_items.modified_by.
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
		 * Load a ActionItems from PK Info
		 * @param integer $intId
		 * @return ActionItems
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return ActionItems::QuerySingle(
				QQ::Equal(QQN::ActionItems()->Id, $intId)
			);
		}

		/**
		 * Load all ActionItemses
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ActionItems[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call ActionItems::QueryArray to perform the LoadAll query
			try {
				return ActionItems::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all ActionItemses
		 * @return int
		 */
		public static function CountAll() {
			// Call ActionItems::QueryCount to perform the CountAll query
			return ActionItems::QueryCount(QQ::All());
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
			$objDatabase = ActionItems::GetDatabase();

			// Create/Build out the QueryBuilder object with ActionItems-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'action_items');
			ActionItems::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('action_items');

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
		 * Static Qcodo Query method to query for a single ActionItems object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ActionItems the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ActionItems::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new ActionItems object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = ActionItems::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return ActionItems::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of ActionItems objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return ActionItems[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ActionItems::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return ActionItems::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = ActionItems::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of ActionItems objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = ActionItems::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = ActionItems::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'action_items_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with ActionItems-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				ActionItems::GetSelectFields($objQueryBuilder);
				ActionItems::GetFromFields($objQueryBuilder);

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
			return ActionItems::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this ActionItems
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'action_items';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'action', $strAliasPrefix . 'action');
			$objBuilder->AddSelectItem($strTableName, 'strategy_id', $strAliasPrefix . 'strategy_id');
			$objBuilder->AddSelectItem($strTableName, 'scorecard_id', $strAliasPrefix . 'scorecard_id');
			$objBuilder->AddSelectItem($strTableName, 'who', $strAliasPrefix . 'who');
			$objBuilder->AddSelectItem($strTableName, 'when', $strAliasPrefix . 'when');
			$objBuilder->AddSelectItem($strTableName, 'status_type', $strAliasPrefix . 'status_type');
			$objBuilder->AddSelectItem($strTableName, 'comments', $strAliasPrefix . 'comments');
			$objBuilder->AddSelectItem($strTableName, 'category_id', $strAliasPrefix . 'category_id');
			$objBuilder->AddSelectItem($strTableName, 'count', $strAliasPrefix . 'count');
			$objBuilder->AddSelectItem($strTableName, 'modified_by', $strAliasPrefix . 'modified_by');
			$objBuilder->AddSelectItem($strTableName, 'modified', $strAliasPrefix . 'modified');
			$objBuilder->AddSelectItem($strTableName, 'rank', $strAliasPrefix . 'rank');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a ActionItems from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this ActionItems::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return ActionItems
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;


			// Create a new instance of the ActionItems object
			$objToReturn = new ActionItems();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'action', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'action'] : $strAliasPrefix . 'action';
			$objToReturn->strAction = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAliasName = array_key_exists($strAliasPrefix . 'strategy_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'strategy_id'] : $strAliasPrefix . 'strategy_id';
			$objToReturn->intStrategyId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'scorecard_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'scorecard_id'] : $strAliasPrefix . 'scorecard_id';
			$objToReturn->intScorecardId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'who', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'who'] : $strAliasPrefix . 'who';
			$objToReturn->intWho = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'when', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'when'] : $strAliasPrefix . 'when';
			$objToReturn->dttWhen = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAliasName = array_key_exists($strAliasPrefix . 'status_type', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'status_type'] : $strAliasPrefix . 'status_type';
			$objToReturn->intStatusType = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'comments', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'comments'] : $strAliasPrefix . 'comments';
			$objToReturn->strComments = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAliasName = array_key_exists($strAliasPrefix . 'category_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'category_id'] : $strAliasPrefix . 'category_id';
			$objToReturn->intCategoryId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'count', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'count'] : $strAliasPrefix . 'count';
			$objToReturn->intCount = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'modified_by', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'modified_by'] : $strAliasPrefix . 'modified_by';
			$objToReturn->intModifiedBy = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'modified', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'modified'] : $strAliasPrefix . 'modified';
			$objToReturn->strModified = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'rank', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'rank'] : $strAliasPrefix . 'rank';
			$objToReturn->blnRank = $objDbRow->GetColumn($strAliasName, 'Bit');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'action_items__';

			// Check for Strategy Early Binding
			$strAlias = $strAliasPrefix . 'strategy_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objStrategy = Strategy::InstantiateDbRow($objDbRow, $strAliasPrefix . 'strategy_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for Scorecard Early Binding
			$strAlias = $strAliasPrefix . 'scorecard_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objScorecard = Scorecard::InstantiateDbRow($objDbRow, $strAliasPrefix . 'scorecard_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for WhoObject Early Binding
			$strAlias = $strAliasPrefix . 'who__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objWhoObject = User::InstantiateDbRow($objDbRow, $strAliasPrefix . 'who__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for ModifiedByObject Early Binding
			$strAlias = $strAliasPrefix . 'modified_by__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objModifiedByObject = User::InstantiateDbRow($objDbRow, $strAliasPrefix . 'modified_by__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			return $objToReturn;
		}

		/**
		 * Instantiate an array of ActionItemses from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return ActionItems[]
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
					$objItem = ActionItems::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = ActionItems::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single ActionItems object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return ActionItems next row resulting from the query
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
			return ActionItems::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single ActionItems object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return ActionItems
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return ActionItems::QuerySingle(
				QQ::Equal(QQN::ActionItems()->Id, $intId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of ActionItems objects,
		 * by StrategyId Index(es)
		 * @param integer $intStrategyId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ActionItems[]
		*/
		public static function LoadArrayByStrategyId($intStrategyId, $objOptionalClauses = null) {
			// Call ActionItems::QueryArray to perform the LoadArrayByStrategyId query
			try {
				return ActionItems::QueryArray(
					QQ::Equal(QQN::ActionItems()->StrategyId, $intStrategyId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ActionItemses
		 * by StrategyId Index(es)
		 * @param integer $intStrategyId
		 * @return int
		*/
		public static function CountByStrategyId($intStrategyId, $objOptionalClauses = null) {
			// Call ActionItems::QueryCount to perform the CountByStrategyId query
			return ActionItems::QueryCount(
				QQ::Equal(QQN::ActionItems()->StrategyId, $intStrategyId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of ActionItems objects,
		 * by ScorecardId Index(es)
		 * @param integer $intScorecardId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ActionItems[]
		*/
		public static function LoadArrayByScorecardId($intScorecardId, $objOptionalClauses = null) {
			// Call ActionItems::QueryArray to perform the LoadArrayByScorecardId query
			try {
				return ActionItems::QueryArray(
					QQ::Equal(QQN::ActionItems()->ScorecardId, $intScorecardId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ActionItemses
		 * by ScorecardId Index(es)
		 * @param integer $intScorecardId
		 * @return int
		*/
		public static function CountByScorecardId($intScorecardId, $objOptionalClauses = null) {
			// Call ActionItems::QueryCount to perform the CountByScorecardId query
			return ActionItems::QueryCount(
				QQ::Equal(QQN::ActionItems()->ScorecardId, $intScorecardId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of ActionItems objects,
		 * by Who Index(es)
		 * @param integer $intWho
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ActionItems[]
		*/
		public static function LoadArrayByWho($intWho, $objOptionalClauses = null) {
			// Call ActionItems::QueryArray to perform the LoadArrayByWho query
			try {
				return ActionItems::QueryArray(
					QQ::Equal(QQN::ActionItems()->Who, $intWho),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ActionItemses
		 * by Who Index(es)
		 * @param integer $intWho
		 * @return int
		*/
		public static function CountByWho($intWho, $objOptionalClauses = null) {
			// Call ActionItems::QueryCount to perform the CountByWho query
			return ActionItems::QueryCount(
				QQ::Equal(QQN::ActionItems()->Who, $intWho)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of ActionItems objects,
		 * by StatusType Index(es)
		 * @param integer $intStatusType
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ActionItems[]
		*/
		public static function LoadArrayByStatusType($intStatusType, $objOptionalClauses = null) {
			// Call ActionItems::QueryArray to perform the LoadArrayByStatusType query
			try {
				return ActionItems::QueryArray(
					QQ::Equal(QQN::ActionItems()->StatusType, $intStatusType),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ActionItemses
		 * by StatusType Index(es)
		 * @param integer $intStatusType
		 * @return int
		*/
		public static function CountByStatusType($intStatusType, $objOptionalClauses = null) {
			// Call ActionItems::QueryCount to perform the CountByStatusType query
			return ActionItems::QueryCount(
				QQ::Equal(QQN::ActionItems()->StatusType, $intStatusType)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of ActionItems objects,
		 * by CategoryId Index(es)
		 * @param integer $intCategoryId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ActionItems[]
		*/
		public static function LoadArrayByCategoryId($intCategoryId, $objOptionalClauses = null) {
			// Call ActionItems::QueryArray to perform the LoadArrayByCategoryId query
			try {
				return ActionItems::QueryArray(
					QQ::Equal(QQN::ActionItems()->CategoryId, $intCategoryId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ActionItemses
		 * by CategoryId Index(es)
		 * @param integer $intCategoryId
		 * @return int
		*/
		public static function CountByCategoryId($intCategoryId, $objOptionalClauses = null) {
			// Call ActionItems::QueryCount to perform the CountByCategoryId query
			return ActionItems::QueryCount(
				QQ::Equal(QQN::ActionItems()->CategoryId, $intCategoryId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of ActionItems objects,
		 * by ModifiedBy Index(es)
		 * @param integer $intModifiedBy
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ActionItems[]
		*/
		public static function LoadArrayByModifiedBy($intModifiedBy, $objOptionalClauses = null) {
			// Call ActionItems::QueryArray to perform the LoadArrayByModifiedBy query
			try {
				return ActionItems::QueryArray(
					QQ::Equal(QQN::ActionItems()->ModifiedBy, $intModifiedBy),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count ActionItemses
		 * by ModifiedBy Index(es)
		 * @param integer $intModifiedBy
		 * @return int
		*/
		public static function CountByModifiedBy($intModifiedBy, $objOptionalClauses = null) {
			// Call ActionItems::QueryCount to perform the CountByModifiedBy query
			return ActionItems::QueryCount(
				QQ::Equal(QQN::ActionItems()->ModifiedBy, $intModifiedBy)
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
		 * Save this ActionItems
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = ActionItems::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `action_items` (
							`action`,
							`strategy_id`,
							`scorecard_id`,
							`who`,
							`when`,
							`status_type`,
							`comments`,
							`category_id`,
							`count`,
							`modified_by`,
							`rank`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strAction) . ',
							' . $objDatabase->SqlVariable($this->intStrategyId) . ',
							' . $objDatabase->SqlVariable($this->intScorecardId) . ',
							' . $objDatabase->SqlVariable($this->intWho) . ',
							' . $objDatabase->SqlVariable($this->dttWhen) . ',
							' . $objDatabase->SqlVariable($this->intStatusType) . ',
							' . $objDatabase->SqlVariable($this->strComments) . ',
							' . $objDatabase->SqlVariable($this->intCategoryId) . ',
							' . $objDatabase->SqlVariable($this->intCount) . ',
							' . $objDatabase->SqlVariable($this->intModifiedBy) . ',
							' . $objDatabase->SqlVariable($this->blnRank) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('action_items', 'id');

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
								`action_items`
							WHERE
								`id` = ' . $objDatabase->SqlVariable($this->intId) . '
						');
						
						$objRow = $objResult->FetchArray();
						if ($objRow[0] != $this->strModified)
							throw new QOptimisticLockingException('ActionItems');
					}

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`action_items`
						SET
							`action` = ' . $objDatabase->SqlVariable($this->strAction) . ',
							`strategy_id` = ' . $objDatabase->SqlVariable($this->intStrategyId) . ',
							`scorecard_id` = ' . $objDatabase->SqlVariable($this->intScorecardId) . ',
							`who` = ' . $objDatabase->SqlVariable($this->intWho) . ',
							`when` = ' . $objDatabase->SqlVariable($this->dttWhen) . ',
							`status_type` = ' . $objDatabase->SqlVariable($this->intStatusType) . ',
							`comments` = ' . $objDatabase->SqlVariable($this->strComments) . ',
							`category_id` = ' . $objDatabase->SqlVariable($this->intCategoryId) . ',
							`count` = ' . $objDatabase->SqlVariable($this->intCount) . ',
							`modified_by` = ' . $objDatabase->SqlVariable($this->intModifiedBy) . ',
							`rank` = ' . $objDatabase->SqlVariable($this->blnRank) . '
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
					`action_items`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
						
			$objRow = $objResult->FetchArray();
			$this->strModified = $objRow[0];

			// Return 
			return $mixToReturn;
		}

		/**
		 * Delete this ActionItems
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this ActionItems with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = ActionItems::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`action_items`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all ActionItemses
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = ActionItems::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`action_items`');
		}

		/**
		 * Truncate action_items table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = ActionItems::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `action_items`');
		}

		/**
		 * Reload this ActionItems from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved ActionItems object.');

			// Reload the Object
			$objReloaded = ActionItems::Load($this->intId);

			// Update $this's local variables to match
			$this->strAction = $objReloaded->strAction;
			$this->StrategyId = $objReloaded->StrategyId;
			$this->ScorecardId = $objReloaded->ScorecardId;
			$this->Who = $objReloaded->Who;
			$this->dttWhen = $objReloaded->dttWhen;
			$this->StatusType = $objReloaded->StatusType;
			$this->strComments = $objReloaded->strComments;
			$this->CategoryId = $objReloaded->CategoryId;
			$this->intCount = $objReloaded->intCount;
			$this->ModifiedBy = $objReloaded->ModifiedBy;
			$this->strModified = $objReloaded->strModified;
			$this->blnRank = $objReloaded->blnRank;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = ActionItems::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `action_items` (
					`id`,
					`action`,
					`strategy_id`,
					`scorecard_id`,
					`who`,
					`when`,
					`status_type`,
					`comments`,
					`category_id`,
					`count`,
					`modified_by`,
					`rank`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->strAction) . ',
					' . $objDatabase->SqlVariable($this->intStrategyId) . ',
					' . $objDatabase->SqlVariable($this->intScorecardId) . ',
					' . $objDatabase->SqlVariable($this->intWho) . ',
					' . $objDatabase->SqlVariable($this->dttWhen) . ',
					' . $objDatabase->SqlVariable($this->intStatusType) . ',
					' . $objDatabase->SqlVariable($this->strComments) . ',
					' . $objDatabase->SqlVariable($this->intCategoryId) . ',
					' . $objDatabase->SqlVariable($this->intCount) . ',
					' . $objDatabase->SqlVariable($this->intModifiedBy) . ',
					' . $objDatabase->SqlVariable($this->blnRank) . ',
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
		 * @return ActionItems[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = ActionItems::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM action_items WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return ActionItems::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return ActionItems[]
		 */
		public function GetJournal() {
			return ActionItems::GetJournalForId($this->intId);
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

				case 'Action':
					// Gets the value for strAction 
					// @return string
					return $this->strAction;

				case 'StrategyId':
					// Gets the value for intStrategyId 
					// @return integer
					return $this->intStrategyId;

				case 'ScorecardId':
					// Gets the value for intScorecardId 
					// @return integer
					return $this->intScorecardId;

				case 'Who':
					// Gets the value for intWho 
					// @return integer
					return $this->intWho;

				case 'When':
					// Gets the value for dttWhen 
					// @return QDateTime
					return $this->dttWhen;

				case 'StatusType':
					// Gets the value for intStatusType 
					// @return integer
					return $this->intStatusType;

				case 'Comments':
					// Gets the value for strComments 
					// @return string
					return $this->strComments;

				case 'CategoryId':
					// Gets the value for intCategoryId 
					// @return integer
					return $this->intCategoryId;

				case 'Count':
					// Gets the value for intCount 
					// @return integer
					return $this->intCount;

				case 'ModifiedBy':
					// Gets the value for intModifiedBy 
					// @return integer
					return $this->intModifiedBy;

				case 'Modified':
					// Gets the value for strModified (Read-Only Timestamp)
					// @return string
					return $this->strModified;

				case 'Rank':
					// Gets the value for blnRank 
					// @return boolean
					return $this->blnRank;


				///////////////////
				// Member Objects
				///////////////////
				case 'Strategy':
					// Gets the value for the Strategy object referenced by intStrategyId 
					// @return Strategy
					try {
						if ((!$this->objStrategy) && (!is_null($this->intStrategyId)))
							$this->objStrategy = Strategy::Load($this->intStrategyId);
						return $this->objStrategy;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

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

				case 'WhoObject':
					// Gets the value for the User object referenced by intWho 
					// @return User
					try {
						if ((!$this->objWhoObject) && (!is_null($this->intWho)))
							$this->objWhoObject = User::Load($this->intWho);
						return $this->objWhoObject;
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
				case 'Action':
					// Sets the value for strAction 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strAction = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'StrategyId':
					// Sets the value for intStrategyId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objStrategy = null;
						return ($this->intStrategyId = QType::Cast($mixValue, QType::Integer));
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

				case 'Who':
					// Sets the value for intWho 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objWhoObject = null;
						return ($this->intWho = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'When':
					// Sets the value for dttWhen 
					// @param QDateTime $mixValue
					// @return QDateTime
					try {
						return ($this->dttWhen = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'StatusType':
					// Sets the value for intStatusType 
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intStatusType = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Comments':
					// Sets the value for strComments 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strComments = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CategoryId':
					// Sets the value for intCategoryId 
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intCategoryId = QType::Cast($mixValue, QType::Integer));
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

				case 'Rank':
					// Sets the value for blnRank 
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnRank = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Strategy':
					// Sets the value for the Strategy object referenced by intStrategyId 
					// @param Strategy $mixValue
					// @return Strategy
					if (is_null($mixValue)) {
						$this->intStrategyId = null;
						$this->objStrategy = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Strategy object
						try {
							$mixValue = QType::Cast($mixValue, 'Strategy');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Strategy object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Strategy for this ActionItems');

						// Update Local Member Variables
						$this->objStrategy = $mixValue;
						$this->intStrategyId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

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
							throw new QCallerException('Unable to set an unsaved Scorecard for this ActionItems');

						// Update Local Member Variables
						$this->objScorecard = $mixValue;
						$this->intScorecardId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'WhoObject':
					// Sets the value for the User object referenced by intWho 
					// @param User $mixValue
					// @return User
					if (is_null($mixValue)) {
						$this->intWho = null;
						$this->objWhoObject = null;
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
							throw new QCallerException('Unable to set an unsaved WhoObject for this ActionItems');

						// Update Local Member Variables
						$this->objWhoObject = $mixValue;
						$this->intWho = $mixValue->Id;

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
							throw new QCallerException('Unable to set an unsaved ModifiedByObject for this ActionItems');

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





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="ActionItems"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Action" type="xsd:string"/>';
			$strToReturn .= '<element name="Strategy" type="xsd1:Strategy"/>';
			$strToReturn .= '<element name="Scorecard" type="xsd1:Scorecard"/>';
			$strToReturn .= '<element name="WhoObject" type="xsd1:User"/>';
			$strToReturn .= '<element name="When" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="StatusType" type="xsd:int"/>';
			$strToReturn .= '<element name="Comments" type="xsd:string"/>';
			$strToReturn .= '<element name="CategoryId" type="xsd:int"/>';
			$strToReturn .= '<element name="Count" type="xsd:int"/>';
			$strToReturn .= '<element name="ModifiedByObject" type="xsd1:User"/>';
			$strToReturn .= '<element name="Modified" type="xsd:string"/>';
			$strToReturn .= '<element name="Rank" type="xsd:boolean"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('ActionItems', $strComplexTypeArray)) {
				$strComplexTypeArray['ActionItems'] = ActionItems::GetSoapComplexTypeXml();
				Strategy::AlterSoapComplexTypeArray($strComplexTypeArray);
				Scorecard::AlterSoapComplexTypeArray($strComplexTypeArray);
				User::AlterSoapComplexTypeArray($strComplexTypeArray);
				User::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, ActionItems::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new ActionItems();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'Action'))
				$objToReturn->strAction = $objSoapObject->Action;
			if ((property_exists($objSoapObject, 'Strategy')) &&
				($objSoapObject->Strategy))
				$objToReturn->Strategy = Strategy::GetObjectFromSoapObject($objSoapObject->Strategy);
			if ((property_exists($objSoapObject, 'Scorecard')) &&
				($objSoapObject->Scorecard))
				$objToReturn->Scorecard = Scorecard::GetObjectFromSoapObject($objSoapObject->Scorecard);
			if ((property_exists($objSoapObject, 'WhoObject')) &&
				($objSoapObject->WhoObject))
				$objToReturn->WhoObject = User::GetObjectFromSoapObject($objSoapObject->WhoObject);
			if (property_exists($objSoapObject, 'When'))
				$objToReturn->dttWhen = new QDateTime($objSoapObject->When);
			if (property_exists($objSoapObject, 'StatusType'))
				$objToReturn->intStatusType = $objSoapObject->StatusType;
			if (property_exists($objSoapObject, 'Comments'))
				$objToReturn->strComments = $objSoapObject->Comments;
			if (property_exists($objSoapObject, 'CategoryId'))
				$objToReturn->intCategoryId = $objSoapObject->CategoryId;
			if (property_exists($objSoapObject, 'Count'))
				$objToReturn->intCount = $objSoapObject->Count;
			if ((property_exists($objSoapObject, 'ModifiedByObject')) &&
				($objSoapObject->ModifiedByObject))
				$objToReturn->ModifiedByObject = User::GetObjectFromSoapObject($objSoapObject->ModifiedByObject);
			if (property_exists($objSoapObject, 'Modified'))
				$objToReturn->strModified = $objSoapObject->Modified;
			if (property_exists($objSoapObject, 'Rank'))
				$objToReturn->blnRank = $objSoapObject->Rank;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, ActionItems::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objStrategy)
				$objObject->objStrategy = Strategy::GetSoapObjectFromObject($objObject->objStrategy, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intStrategyId = null;
			if ($objObject->objScorecard)
				$objObject->objScorecard = Scorecard::GetSoapObjectFromObject($objObject->objScorecard, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intScorecardId = null;
			if ($objObject->objWhoObject)
				$objObject->objWhoObject = User::GetSoapObjectFromObject($objObject->objWhoObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intWho = null;
			if ($objObject->dttWhen)
				$objObject->dttWhen = $objObject->dttWhen->__toString(QDateTime::FormatSoap);
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
	 * @property-read QQNode $Id
	 * @property-read QQNode $Action
	 * @property-read QQNode $StrategyId
	 * @property-read QQNodeStrategy $Strategy
	 * @property-read QQNode $ScorecardId
	 * @property-read QQNodeScorecard $Scorecard
	 * @property-read QQNode $Who
	 * @property-read QQNodeUser $WhoObject
	 * @property-read QQNode $When
	 * @property-read QQNode $StatusType
	 * @property-read QQNode $Comments
	 * @property-read QQNode $CategoryId
	 * @property-read QQNode $Count
	 * @property-read QQNode $ModifiedBy
	 * @property-read QQNodeUser $ModifiedByObject
	 * @property-read QQNode $Modified
	 * @property-read QQNode $Rank
	 */
	class QQNodeActionItems extends QQNode {
		protected $strTableName = 'action_items';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'ActionItems';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Action':
					return new QQNode('action', 'Action', 'string', $this);
				case 'StrategyId':
					return new QQNode('strategy_id', 'StrategyId', 'integer', $this);
				case 'Strategy':
					return new QQNodeStrategy('strategy_id', 'Strategy', 'integer', $this);
				case 'ScorecardId':
					return new QQNode('scorecard_id', 'ScorecardId', 'integer', $this);
				case 'Scorecard':
					return new QQNodeScorecard('scorecard_id', 'Scorecard', 'integer', $this);
				case 'Who':
					return new QQNode('who', 'Who', 'integer', $this);
				case 'WhoObject':
					return new QQNodeUser('who', 'WhoObject', 'integer', $this);
				case 'When':
					return new QQNode('when', 'When', 'QDateTime', $this);
				case 'StatusType':
					return new QQNode('status_type', 'StatusType', 'integer', $this);
				case 'Comments':
					return new QQNode('comments', 'Comments', 'string', $this);
				case 'CategoryId':
					return new QQNode('category_id', 'CategoryId', 'integer', $this);
				case 'Count':
					return new QQNode('count', 'Count', 'integer', $this);
				case 'ModifiedBy':
					return new QQNode('modified_by', 'ModifiedBy', 'integer', $this);
				case 'ModifiedByObject':
					return new QQNodeUser('modified_by', 'ModifiedByObject', 'integer', $this);
				case 'Modified':
					return new QQNode('modified', 'Modified', 'string', $this);
				case 'Rank':
					return new QQNode('rank', 'Rank', 'boolean', $this);

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
	 * @property-read QQNode $Action
	 * @property-read QQNode $StrategyId
	 * @property-read QQNodeStrategy $Strategy
	 * @property-read QQNode $ScorecardId
	 * @property-read QQNodeScorecard $Scorecard
	 * @property-read QQNode $Who
	 * @property-read QQNodeUser $WhoObject
	 * @property-read QQNode $When
	 * @property-read QQNode $StatusType
	 * @property-read QQNode $Comments
	 * @property-read QQNode $CategoryId
	 * @property-read QQNode $Count
	 * @property-read QQNode $ModifiedBy
	 * @property-read QQNodeUser $ModifiedByObject
	 * @property-read QQNode $Modified
	 * @property-read QQNode $Rank
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeActionItems extends QQReverseReferenceNode {
		protected $strTableName = 'action_items';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'ActionItems';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Action':
					return new QQNode('action', 'Action', 'string', $this);
				case 'StrategyId':
					return new QQNode('strategy_id', 'StrategyId', 'integer', $this);
				case 'Strategy':
					return new QQNodeStrategy('strategy_id', 'Strategy', 'integer', $this);
				case 'ScorecardId':
					return new QQNode('scorecard_id', 'ScorecardId', 'integer', $this);
				case 'Scorecard':
					return new QQNodeScorecard('scorecard_id', 'Scorecard', 'integer', $this);
				case 'Who':
					return new QQNode('who', 'Who', 'integer', $this);
				case 'WhoObject':
					return new QQNodeUser('who', 'WhoObject', 'integer', $this);
				case 'When':
					return new QQNode('when', 'When', 'QDateTime', $this);
				case 'StatusType':
					return new QQNode('status_type', 'StatusType', 'integer', $this);
				case 'Comments':
					return new QQNode('comments', 'Comments', 'string', $this);
				case 'CategoryId':
					return new QQNode('category_id', 'CategoryId', 'integer', $this);
				case 'Count':
					return new QQNode('count', 'Count', 'integer', $this);
				case 'ModifiedBy':
					return new QQNode('modified_by', 'ModifiedBy', 'integer', $this);
				case 'ModifiedByObject':
					return new QQNodeUser('modified_by', 'ModifiedByObject', 'integer', $this);
				case 'Modified':
					return new QQNode('modified', 'Modified', 'string', $this);
				case 'Rank':
					return new QQNode('rank', 'Rank', 'boolean', $this);

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