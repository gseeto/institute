<?php
	/**
	 * The abstract CannedStrategyGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the CannedStrategy subclass which
	 * extends this CannedStrategyGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the CannedStrategy class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property string $Strategy the value for strStrategy 
	 * @property integer $CategoryTypeId the value for intCategoryTypeId 
	 * @property CannedActionItem $_CannedActionItemAsStrategy the value for the private _objCannedActionItemAsStrategy (Read-Only) if set due to an expansion on the canned_action_item.strategy_id reverse relationship
	 * @property CannedActionItem[] $_CannedActionItemAsStrategyArray the value for the private _objCannedActionItemAsStrategyArray (Read-Only) if set due to an ExpandAsArray on the canned_action_item.strategy_id reverse relationship
	 * @property CannedKpi $_CannedKpiAsStrategy the value for the private _objCannedKpiAsStrategy (Read-Only) if set due to an expansion on the canned_kpi.strategy_id reverse relationship
	 * @property CannedKpi[] $_CannedKpiAsStrategyArray the value for the private _objCannedKpiAsStrategyArray (Read-Only) if set due to an ExpandAsArray on the canned_kpi.strategy_id reverse relationship
	 * @property StrategyQuestionConditional $_StrategyQuestionConditionalAsStrategy the value for the private _objStrategyQuestionConditionalAsStrategy (Read-Only) if set due to an expansion on the strategy_question_conditional.strategy_id reverse relationship
	 * @property StrategyQuestionConditional[] $_StrategyQuestionConditionalAsStrategyArray the value for the private _objStrategyQuestionConditionalAsStrategyArray (Read-Only) if set due to an ExpandAsArray on the strategy_question_conditional.strategy_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class CannedStrategyGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column canned_strategy.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column canned_strategy.strategy
		 * @var string strStrategy
		 */
		protected $strStrategy;
		const StrategyMaxLength = 1024;
		const StrategyDefault = null;


		/**
		 * Protected member variable that maps to the database column canned_strategy.category_type_id
		 * @var integer intCategoryTypeId
		 */
		protected $intCategoryTypeId;
		const CategoryTypeIdDefault = null;


		/**
		 * Private member variable that stores a reference to a single CannedActionItemAsStrategy object
		 * (of type CannedActionItem), if this CannedStrategy object was restored with
		 * an expansion on the canned_action_item association table.
		 * @var CannedActionItem _objCannedActionItemAsStrategy;
		 */
		private $_objCannedActionItemAsStrategy;

		/**
		 * Private member variable that stores a reference to an array of CannedActionItemAsStrategy objects
		 * (of type CannedActionItem[]), if this CannedStrategy object was restored with
		 * an ExpandAsArray on the canned_action_item association table.
		 * @var CannedActionItem[] _objCannedActionItemAsStrategyArray;
		 */
		private $_objCannedActionItemAsStrategyArray = array();

		/**
		 * Private member variable that stores a reference to a single CannedKpiAsStrategy object
		 * (of type CannedKpi), if this CannedStrategy object was restored with
		 * an expansion on the canned_kpi association table.
		 * @var CannedKpi _objCannedKpiAsStrategy;
		 */
		private $_objCannedKpiAsStrategy;

		/**
		 * Private member variable that stores a reference to an array of CannedKpiAsStrategy objects
		 * (of type CannedKpi[]), if this CannedStrategy object was restored with
		 * an ExpandAsArray on the canned_kpi association table.
		 * @var CannedKpi[] _objCannedKpiAsStrategyArray;
		 */
		private $_objCannedKpiAsStrategyArray = array();

		/**
		 * Private member variable that stores a reference to a single StrategyQuestionConditionalAsStrategy object
		 * (of type StrategyQuestionConditional), if this CannedStrategy object was restored with
		 * an expansion on the strategy_question_conditional association table.
		 * @var StrategyQuestionConditional _objStrategyQuestionConditionalAsStrategy;
		 */
		private $_objStrategyQuestionConditionalAsStrategy;

		/**
		 * Private member variable that stores a reference to an array of StrategyQuestionConditionalAsStrategy objects
		 * (of type StrategyQuestionConditional[]), if this CannedStrategy object was restored with
		 * an ExpandAsArray on the strategy_question_conditional association table.
		 * @var StrategyQuestionConditional[] _objStrategyQuestionConditionalAsStrategyArray;
		 */
		private $_objStrategyQuestionConditionalAsStrategyArray = array();

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
		 * Load a CannedStrategy from PK Info
		 * @param integer $intId
		 * @return CannedStrategy
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return CannedStrategy::QuerySingle(
				QQ::Equal(QQN::CannedStrategy()->Id, $intId)
			);
		}

		/**
		 * Load all CannedStrategies
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return CannedStrategy[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call CannedStrategy::QueryArray to perform the LoadAll query
			try {
				return CannedStrategy::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all CannedStrategies
		 * @return int
		 */
		public static function CountAll() {
			// Call CannedStrategy::QueryCount to perform the CountAll query
			return CannedStrategy::QueryCount(QQ::All());
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
			$objDatabase = CannedStrategy::GetDatabase();

			// Create/Build out the QueryBuilder object with CannedStrategy-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'canned_strategy');
			CannedStrategy::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('canned_strategy');

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
		 * Static Qcodo Query method to query for a single CannedStrategy object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return CannedStrategy the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = CannedStrategy::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new CannedStrategy object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = CannedStrategy::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return CannedStrategy::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of CannedStrategy objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return CannedStrategy[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = CannedStrategy::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return CannedStrategy::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = CannedStrategy::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of CannedStrategy objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = CannedStrategy::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = CannedStrategy::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'canned_strategy_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with CannedStrategy-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				CannedStrategy::GetSelectFields($objQueryBuilder);
				CannedStrategy::GetFromFields($objQueryBuilder);

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
			return CannedStrategy::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this CannedStrategy
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'canned_strategy';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'strategy', $strAliasPrefix . 'strategy');
			$objBuilder->AddSelectItem($strTableName, 'category_type_id', $strAliasPrefix . 'category_type_id');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a CannedStrategy from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this CannedStrategy::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return CannedStrategy
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
					$strAliasPrefix = 'canned_strategy__';


				$strAlias = $strAliasPrefix . 'cannedactionitemasstrategy__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objCannedActionItemAsStrategyArray)) {
						$objPreviousChildItem = $objPreviousItem->_objCannedActionItemAsStrategyArray[$intPreviousChildItemCount - 1];
						$objChildItem = CannedActionItem::InstantiateDbRow($objDbRow, $strAliasPrefix . 'cannedactionitemasstrategy__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objCannedActionItemAsStrategyArray[] = $objChildItem;
					} else
						$objPreviousItem->_objCannedActionItemAsStrategyArray[] = CannedActionItem::InstantiateDbRow($objDbRow, $strAliasPrefix . 'cannedactionitemasstrategy__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'cannedkpiasstrategy__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objCannedKpiAsStrategyArray)) {
						$objPreviousChildItem = $objPreviousItem->_objCannedKpiAsStrategyArray[$intPreviousChildItemCount - 1];
						$objChildItem = CannedKpi::InstantiateDbRow($objDbRow, $strAliasPrefix . 'cannedkpiasstrategy__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objCannedKpiAsStrategyArray[] = $objChildItem;
					} else
						$objPreviousItem->_objCannedKpiAsStrategyArray[] = CannedKpi::InstantiateDbRow($objDbRow, $strAliasPrefix . 'cannedkpiasstrategy__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'strategyquestionconditionalasstrategy__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objStrategyQuestionConditionalAsStrategyArray)) {
						$objPreviousChildItem = $objPreviousItem->_objStrategyQuestionConditionalAsStrategyArray[$intPreviousChildItemCount - 1];
						$objChildItem = StrategyQuestionConditional::InstantiateDbRow($objDbRow, $strAliasPrefix . 'strategyquestionconditionalasstrategy__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objStrategyQuestionConditionalAsStrategyArray[] = $objChildItem;
					} else
						$objPreviousItem->_objStrategyQuestionConditionalAsStrategyArray[] = StrategyQuestionConditional::InstantiateDbRow($objDbRow, $strAliasPrefix . 'strategyquestionconditionalasstrategy__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'canned_strategy__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the CannedStrategy object
			$objToReturn = new CannedStrategy();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'strategy', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'strategy'] : $strAliasPrefix . 'strategy';
			$objToReturn->strStrategy = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'category_type_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'category_type_id'] : $strAliasPrefix . 'category_type_id';
			$objToReturn->intCategoryTypeId = $objDbRow->GetColumn($strAliasName, 'Integer');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'canned_strategy__';




			// Check for CannedActionItemAsStrategy Virtual Binding
			$strAlias = $strAliasPrefix . 'cannedactionitemasstrategy__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objCannedActionItemAsStrategyArray[] = CannedActionItem::InstantiateDbRow($objDbRow, $strAliasPrefix . 'cannedactionitemasstrategy__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objCannedActionItemAsStrategy = CannedActionItem::InstantiateDbRow($objDbRow, $strAliasPrefix . 'cannedactionitemasstrategy__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for CannedKpiAsStrategy Virtual Binding
			$strAlias = $strAliasPrefix . 'cannedkpiasstrategy__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objCannedKpiAsStrategyArray[] = CannedKpi::InstantiateDbRow($objDbRow, $strAliasPrefix . 'cannedkpiasstrategy__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objCannedKpiAsStrategy = CannedKpi::InstantiateDbRow($objDbRow, $strAliasPrefix . 'cannedkpiasstrategy__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for StrategyQuestionConditionalAsStrategy Virtual Binding
			$strAlias = $strAliasPrefix . 'strategyquestionconditionalasstrategy__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objStrategyQuestionConditionalAsStrategyArray[] = StrategyQuestionConditional::InstantiateDbRow($objDbRow, $strAliasPrefix . 'strategyquestionconditionalasstrategy__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objStrategyQuestionConditionalAsStrategy = StrategyQuestionConditional::InstantiateDbRow($objDbRow, $strAliasPrefix . 'strategyquestionconditionalasstrategy__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of CannedStrategies from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return CannedStrategy[]
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
					$objItem = CannedStrategy::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = CannedStrategy::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single CannedStrategy object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return CannedStrategy next row resulting from the query
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
			return CannedStrategy::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single CannedStrategy object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return CannedStrategy
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return CannedStrategy::QuerySingle(
				QQ::Equal(QQN::CannedStrategy()->Id, $intId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of CannedStrategy objects,
		 * by CategoryTypeId Index(es)
		 * @param integer $intCategoryTypeId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return CannedStrategy[]
		*/
		public static function LoadArrayByCategoryTypeId($intCategoryTypeId, $objOptionalClauses = null) {
			// Call CannedStrategy::QueryArray to perform the LoadArrayByCategoryTypeId query
			try {
				return CannedStrategy::QueryArray(
					QQ::Equal(QQN::CannedStrategy()->CategoryTypeId, $intCategoryTypeId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count CannedStrategies
		 * by CategoryTypeId Index(es)
		 * @param integer $intCategoryTypeId
		 * @return int
		*/
		public static function CountByCategoryTypeId($intCategoryTypeId, $objOptionalClauses = null) {
			// Call CannedStrategy::QueryCount to perform the CountByCategoryTypeId query
			return CannedStrategy::QueryCount(
				QQ::Equal(QQN::CannedStrategy()->CategoryTypeId, $intCategoryTypeId)
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
		 * Save this CannedStrategy
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = CannedStrategy::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `canned_strategy` (
							`strategy`,
							`category_type_id`
						) VALUES (
							' . $objDatabase->SqlVariable($this->strStrategy) . ',
							' . $objDatabase->SqlVariable($this->intCategoryTypeId) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('canned_strategy', 'id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`canned_strategy`
						SET
							`strategy` = ' . $objDatabase->SqlVariable($this->strStrategy) . ',
							`category_type_id` = ' . $objDatabase->SqlVariable($this->intCategoryTypeId) . '
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
		 * Delete this CannedStrategy
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this CannedStrategy with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = CannedStrategy::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`canned_strategy`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all CannedStrategies
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = CannedStrategy::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`canned_strategy`');
		}

		/**
		 * Truncate canned_strategy table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = CannedStrategy::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `canned_strategy`');
		}

		/**
		 * Reload this CannedStrategy from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved CannedStrategy object.');

			// Reload the Object
			$objReloaded = CannedStrategy::Load($this->intId);

			// Update $this's local variables to match
			$this->strStrategy = $objReloaded->strStrategy;
			$this->CategoryTypeId = $objReloaded->CategoryTypeId;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = CannedStrategy::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `canned_strategy` (
					`id`,
					`strategy`,
					`category_type_id`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->strStrategy) . ',
					' . $objDatabase->SqlVariable($this->intCategoryTypeId) . ',
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
		 * @return CannedStrategy[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = CannedStrategy::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM canned_strategy WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return CannedStrategy::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return CannedStrategy[]
		 */
		public function GetJournal() {
			return CannedStrategy::GetJournalForId($this->intId);
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

				case 'CategoryTypeId':
					// Gets the value for intCategoryTypeId 
					// @return integer
					return $this->intCategoryTypeId;


				///////////////////
				// Member Objects
				///////////////////

				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_CannedActionItemAsStrategy':
					// Gets the value for the private _objCannedActionItemAsStrategy (Read-Only)
					// if set due to an expansion on the canned_action_item.strategy_id reverse relationship
					// @return CannedActionItem
					return $this->_objCannedActionItemAsStrategy;

				case '_CannedActionItemAsStrategyArray':
					// Gets the value for the private _objCannedActionItemAsStrategyArray (Read-Only)
					// if set due to an ExpandAsArray on the canned_action_item.strategy_id reverse relationship
					// @return CannedActionItem[]
					return (array) $this->_objCannedActionItemAsStrategyArray;

				case '_CannedKpiAsStrategy':
					// Gets the value for the private _objCannedKpiAsStrategy (Read-Only)
					// if set due to an expansion on the canned_kpi.strategy_id reverse relationship
					// @return CannedKpi
					return $this->_objCannedKpiAsStrategy;

				case '_CannedKpiAsStrategyArray':
					// Gets the value for the private _objCannedKpiAsStrategyArray (Read-Only)
					// if set due to an ExpandAsArray on the canned_kpi.strategy_id reverse relationship
					// @return CannedKpi[]
					return (array) $this->_objCannedKpiAsStrategyArray;

				case '_StrategyQuestionConditionalAsStrategy':
					// Gets the value for the private _objStrategyQuestionConditionalAsStrategy (Read-Only)
					// if set due to an expansion on the strategy_question_conditional.strategy_id reverse relationship
					// @return StrategyQuestionConditional
					return $this->_objStrategyQuestionConditionalAsStrategy;

				case '_StrategyQuestionConditionalAsStrategyArray':
					// Gets the value for the private _objStrategyQuestionConditionalAsStrategyArray (Read-Only)
					// if set due to an ExpandAsArray on the strategy_question_conditional.strategy_id reverse relationship
					// @return StrategyQuestionConditional[]
					return (array) $this->_objStrategyQuestionConditionalAsStrategyArray;


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

			
		
		// Related Objects' Methods for CannedActionItemAsStrategy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated CannedActionItemsAsStrategy as an array of CannedActionItem objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return CannedActionItem[]
		*/ 
		public function GetCannedActionItemAsStrategyArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return CannedActionItem::LoadArrayByStrategyId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated CannedActionItemsAsStrategy
		 * @return int
		*/ 
		public function CountCannedActionItemsAsStrategy() {
			if ((is_null($this->intId)))
				return 0;

			return CannedActionItem::CountByStrategyId($this->intId);
		}

		/**
		 * Associates a CannedActionItemAsStrategy
		 * @param CannedActionItem $objCannedActionItem
		 * @return void
		*/ 
		public function AssociateCannedActionItemAsStrategy(CannedActionItem $objCannedActionItem) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCannedActionItemAsStrategy on this unsaved CannedStrategy.');
			if ((is_null($objCannedActionItem->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCannedActionItemAsStrategy on this CannedStrategy with an unsaved CannedActionItem.');

			// Get the Database Object for this Class
			$objDatabase = CannedStrategy::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`canned_action_item`
				SET
					`strategy_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCannedActionItem->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objCannedActionItem->StrategyId = $this->intId;
				$objCannedActionItem->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a CannedActionItemAsStrategy
		 * @param CannedActionItem $objCannedActionItem
		 * @return void
		*/ 
		public function UnassociateCannedActionItemAsStrategy(CannedActionItem $objCannedActionItem) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCannedActionItemAsStrategy on this unsaved CannedStrategy.');
			if ((is_null($objCannedActionItem->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCannedActionItemAsStrategy on this CannedStrategy with an unsaved CannedActionItem.');

			// Get the Database Object for this Class
			$objDatabase = CannedStrategy::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`canned_action_item`
				SET
					`strategy_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCannedActionItem->Id) . ' AND
					`strategy_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objCannedActionItem->StrategyId = null;
				$objCannedActionItem->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all CannedActionItemsAsStrategy
		 * @return void
		*/ 
		public function UnassociateAllCannedActionItemsAsStrategy() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCannedActionItemAsStrategy on this unsaved CannedStrategy.');

			// Get the Database Object for this Class
			$objDatabase = CannedStrategy::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (CannedActionItem::LoadArrayByStrategyId($this->intId) as $objCannedActionItem) {
					$objCannedActionItem->StrategyId = null;
					$objCannedActionItem->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`canned_action_item`
				SET
					`strategy_id` = null
				WHERE
					`strategy_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated CannedActionItemAsStrategy
		 * @param CannedActionItem $objCannedActionItem
		 * @return void
		*/ 
		public function DeleteAssociatedCannedActionItemAsStrategy(CannedActionItem $objCannedActionItem) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCannedActionItemAsStrategy on this unsaved CannedStrategy.');
			if ((is_null($objCannedActionItem->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCannedActionItemAsStrategy on this CannedStrategy with an unsaved CannedActionItem.');

			// Get the Database Object for this Class
			$objDatabase = CannedStrategy::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`canned_action_item`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCannedActionItem->Id) . ' AND
					`strategy_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objCannedActionItem->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated CannedActionItemsAsStrategy
		 * @return void
		*/ 
		public function DeleteAllCannedActionItemsAsStrategy() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCannedActionItemAsStrategy on this unsaved CannedStrategy.');

			// Get the Database Object for this Class
			$objDatabase = CannedStrategy::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (CannedActionItem::LoadArrayByStrategyId($this->intId) as $objCannedActionItem) {
					$objCannedActionItem->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`canned_action_item`
				WHERE
					`strategy_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for CannedKpiAsStrategy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated CannedKpisAsStrategy as an array of CannedKpi objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return CannedKpi[]
		*/ 
		public function GetCannedKpiAsStrategyArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return CannedKpi::LoadArrayByStrategyId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated CannedKpisAsStrategy
		 * @return int
		*/ 
		public function CountCannedKpisAsStrategy() {
			if ((is_null($this->intId)))
				return 0;

			return CannedKpi::CountByStrategyId($this->intId);
		}

		/**
		 * Associates a CannedKpiAsStrategy
		 * @param CannedKpi $objCannedKpi
		 * @return void
		*/ 
		public function AssociateCannedKpiAsStrategy(CannedKpi $objCannedKpi) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCannedKpiAsStrategy on this unsaved CannedStrategy.');
			if ((is_null($objCannedKpi->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCannedKpiAsStrategy on this CannedStrategy with an unsaved CannedKpi.');

			// Get the Database Object for this Class
			$objDatabase = CannedStrategy::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`canned_kpi`
				SET
					`strategy_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCannedKpi->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objCannedKpi->StrategyId = $this->intId;
				$objCannedKpi->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a CannedKpiAsStrategy
		 * @param CannedKpi $objCannedKpi
		 * @return void
		*/ 
		public function UnassociateCannedKpiAsStrategy(CannedKpi $objCannedKpi) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCannedKpiAsStrategy on this unsaved CannedStrategy.');
			if ((is_null($objCannedKpi->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCannedKpiAsStrategy on this CannedStrategy with an unsaved CannedKpi.');

			// Get the Database Object for this Class
			$objDatabase = CannedStrategy::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`canned_kpi`
				SET
					`strategy_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCannedKpi->Id) . ' AND
					`strategy_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objCannedKpi->StrategyId = null;
				$objCannedKpi->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all CannedKpisAsStrategy
		 * @return void
		*/ 
		public function UnassociateAllCannedKpisAsStrategy() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCannedKpiAsStrategy on this unsaved CannedStrategy.');

			// Get the Database Object for this Class
			$objDatabase = CannedStrategy::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (CannedKpi::LoadArrayByStrategyId($this->intId) as $objCannedKpi) {
					$objCannedKpi->StrategyId = null;
					$objCannedKpi->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`canned_kpi`
				SET
					`strategy_id` = null
				WHERE
					`strategy_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated CannedKpiAsStrategy
		 * @param CannedKpi $objCannedKpi
		 * @return void
		*/ 
		public function DeleteAssociatedCannedKpiAsStrategy(CannedKpi $objCannedKpi) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCannedKpiAsStrategy on this unsaved CannedStrategy.');
			if ((is_null($objCannedKpi->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCannedKpiAsStrategy on this CannedStrategy with an unsaved CannedKpi.');

			// Get the Database Object for this Class
			$objDatabase = CannedStrategy::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`canned_kpi`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objCannedKpi->Id) . ' AND
					`strategy_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objCannedKpi->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated CannedKpisAsStrategy
		 * @return void
		*/ 
		public function DeleteAllCannedKpisAsStrategy() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCannedKpiAsStrategy on this unsaved CannedStrategy.');

			// Get the Database Object for this Class
			$objDatabase = CannedStrategy::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (CannedKpi::LoadArrayByStrategyId($this->intId) as $objCannedKpi) {
					$objCannedKpi->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`canned_kpi`
				WHERE
					`strategy_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for StrategyQuestionConditionalAsStrategy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated StrategyQuestionConditionalsAsStrategy as an array of StrategyQuestionConditional objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return StrategyQuestionConditional[]
		*/ 
		public function GetStrategyQuestionConditionalAsStrategyArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return StrategyQuestionConditional::LoadArrayByStrategyId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated StrategyQuestionConditionalsAsStrategy
		 * @return int
		*/ 
		public function CountStrategyQuestionConditionalsAsStrategy() {
			if ((is_null($this->intId)))
				return 0;

			return StrategyQuestionConditional::CountByStrategyId($this->intId);
		}

		/**
		 * Associates a StrategyQuestionConditionalAsStrategy
		 * @param StrategyQuestionConditional $objStrategyQuestionConditional
		 * @return void
		*/ 
		public function AssociateStrategyQuestionConditionalAsStrategy(StrategyQuestionConditional $objStrategyQuestionConditional) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateStrategyQuestionConditionalAsStrategy on this unsaved CannedStrategy.');
			if ((is_null($objStrategyQuestionConditional->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateStrategyQuestionConditionalAsStrategy on this CannedStrategy with an unsaved StrategyQuestionConditional.');

			// Get the Database Object for this Class
			$objDatabase = CannedStrategy::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`strategy_question_conditional`
				SET
					`strategy_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objStrategyQuestionConditional->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objStrategyQuestionConditional->StrategyId = $this->intId;
				$objStrategyQuestionConditional->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a StrategyQuestionConditionalAsStrategy
		 * @param StrategyQuestionConditional $objStrategyQuestionConditional
		 * @return void
		*/ 
		public function UnassociateStrategyQuestionConditionalAsStrategy(StrategyQuestionConditional $objStrategyQuestionConditional) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStrategyQuestionConditionalAsStrategy on this unsaved CannedStrategy.');
			if ((is_null($objStrategyQuestionConditional->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStrategyQuestionConditionalAsStrategy on this CannedStrategy with an unsaved StrategyQuestionConditional.');

			// Get the Database Object for this Class
			$objDatabase = CannedStrategy::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`strategy_question_conditional`
				SET
					`strategy_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objStrategyQuestionConditional->Id) . ' AND
					`strategy_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objStrategyQuestionConditional->StrategyId = null;
				$objStrategyQuestionConditional->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all StrategyQuestionConditionalsAsStrategy
		 * @return void
		*/ 
		public function UnassociateAllStrategyQuestionConditionalsAsStrategy() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStrategyQuestionConditionalAsStrategy on this unsaved CannedStrategy.');

			// Get the Database Object for this Class
			$objDatabase = CannedStrategy::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (StrategyQuestionConditional::LoadArrayByStrategyId($this->intId) as $objStrategyQuestionConditional) {
					$objStrategyQuestionConditional->StrategyId = null;
					$objStrategyQuestionConditional->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`strategy_question_conditional`
				SET
					`strategy_id` = null
				WHERE
					`strategy_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated StrategyQuestionConditionalAsStrategy
		 * @param StrategyQuestionConditional $objStrategyQuestionConditional
		 * @return void
		*/ 
		public function DeleteAssociatedStrategyQuestionConditionalAsStrategy(StrategyQuestionConditional $objStrategyQuestionConditional) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStrategyQuestionConditionalAsStrategy on this unsaved CannedStrategy.');
			if ((is_null($objStrategyQuestionConditional->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStrategyQuestionConditionalAsStrategy on this CannedStrategy with an unsaved StrategyQuestionConditional.');

			// Get the Database Object for this Class
			$objDatabase = CannedStrategy::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`strategy_question_conditional`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objStrategyQuestionConditional->Id) . ' AND
					`strategy_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objStrategyQuestionConditional->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated StrategyQuestionConditionalsAsStrategy
		 * @return void
		*/ 
		public function DeleteAllStrategyQuestionConditionalsAsStrategy() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStrategyQuestionConditionalAsStrategy on this unsaved CannedStrategy.');

			// Get the Database Object for this Class
			$objDatabase = CannedStrategy::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (StrategyQuestionConditional::LoadArrayByStrategyId($this->intId) as $objStrategyQuestionConditional) {
					$objStrategyQuestionConditional->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`strategy_question_conditional`
				WHERE
					`strategy_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="CannedStrategy"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Strategy" type="xsd:string"/>';
			$strToReturn .= '<element name="CategoryTypeId" type="xsd:int"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('CannedStrategy', $strComplexTypeArray)) {
				$strComplexTypeArray['CannedStrategy'] = CannedStrategy::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, CannedStrategy::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new CannedStrategy();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'Strategy'))
				$objToReturn->strStrategy = $objSoapObject->Strategy;
			if (property_exists($objSoapObject, 'CategoryTypeId'))
				$objToReturn->intCategoryTypeId = $objSoapObject->CategoryTypeId;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, CannedStrategy::GetSoapObjectFromObject($objObject, true));

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
	 * @property-read QQNode $Strategy
	 * @property-read QQNode $CategoryTypeId
	 * @property-read QQReverseReferenceNodeCannedActionItem $CannedActionItemAsStrategy
	 * @property-read QQReverseReferenceNodeCannedKpi $CannedKpiAsStrategy
	 * @property-read QQReverseReferenceNodeStrategyQuestionConditional $StrategyQuestionConditionalAsStrategy
	 */
	class QQNodeCannedStrategy extends QQNode {
		protected $strTableName = 'canned_strategy';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'CannedStrategy';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Strategy':
					return new QQNode('strategy', 'Strategy', 'string', $this);
				case 'CategoryTypeId':
					return new QQNode('category_type_id', 'CategoryTypeId', 'integer', $this);
				case 'CannedActionItemAsStrategy':
					return new QQReverseReferenceNodeCannedActionItem($this, 'cannedactionitemasstrategy', 'reverse_reference', 'strategy_id');
				case 'CannedKpiAsStrategy':
					return new QQReverseReferenceNodeCannedKpi($this, 'cannedkpiasstrategy', 'reverse_reference', 'strategy_id');
				case 'StrategyQuestionConditionalAsStrategy':
					return new QQReverseReferenceNodeStrategyQuestionConditional($this, 'strategyquestionconditionalasstrategy', 'reverse_reference', 'strategy_id');

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
	 * @property-read QQNode $CategoryTypeId
	 * @property-read QQReverseReferenceNodeCannedActionItem $CannedActionItemAsStrategy
	 * @property-read QQReverseReferenceNodeCannedKpi $CannedKpiAsStrategy
	 * @property-read QQReverseReferenceNodeStrategyQuestionConditional $StrategyQuestionConditionalAsStrategy
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeCannedStrategy extends QQReverseReferenceNode {
		protected $strTableName = 'canned_strategy';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'CannedStrategy';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Strategy':
					return new QQNode('strategy', 'Strategy', 'string', $this);
				case 'CategoryTypeId':
					return new QQNode('category_type_id', 'CategoryTypeId', 'integer', $this);
				case 'CannedActionItemAsStrategy':
					return new QQReverseReferenceNodeCannedActionItem($this, 'cannedactionitemasstrategy', 'reverse_reference', 'strategy_id');
				case 'CannedKpiAsStrategy':
					return new QQReverseReferenceNodeCannedKpi($this, 'cannedkpiasstrategy', 'reverse_reference', 'strategy_id');
				case 'StrategyQuestionConditionalAsStrategy':
					return new QQReverseReferenceNodeStrategyQuestionConditional($this, 'strategyquestionconditionalasstrategy', 'reverse_reference', 'strategy_id');

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