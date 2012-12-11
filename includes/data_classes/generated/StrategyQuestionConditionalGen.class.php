<?php
	/**
	 * The abstract StrategyQuestionConditionalGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the StrategyQuestionConditional subclass which
	 * extends this StrategyQuestionConditionalGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the StrategyQuestionConditional class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property integer $QuestionId the value for intQuestionId 
	 * @property integer $StrategyId the value for intStrategyId 
	 * @property integer $ConditionalType the value for intConditionalType 
	 * @property TenPQuestions $Question the value for the TenPQuestions object referenced by intQuestionId 
	 * @property CannedStrategy $Strategy the value for the CannedStrategy object referenced by intStrategyId 
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class StrategyQuestionConditionalGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column strategy_question_conditional.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column strategy_question_conditional.question_id
		 * @var integer intQuestionId
		 */
		protected $intQuestionId;
		const QuestionIdDefault = null;


		/**
		 * Protected member variable that maps to the database column strategy_question_conditional.strategy_id
		 * @var integer intStrategyId
		 */
		protected $intStrategyId;
		const StrategyIdDefault = null;


		/**
		 * Protected member variable that maps to the database column strategy_question_conditional.conditional_type
		 * @var integer intConditionalType
		 */
		protected $intConditionalType;
		const ConditionalTypeDefault = null;


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
		 * in the database column strategy_question_conditional.question_id.
		 *
		 * NOTE: Always use the Question property getter to correctly retrieve this TenPQuestions object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var TenPQuestions objQuestion
		 */
		protected $objQuestion;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column strategy_question_conditional.strategy_id.
		 *
		 * NOTE: Always use the Strategy property getter to correctly retrieve this CannedStrategy object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var CannedStrategy objStrategy
		 */
		protected $objStrategy;





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
		 * Load a StrategyQuestionConditional from PK Info
		 * @param integer $intId
		 * @return StrategyQuestionConditional
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return StrategyQuestionConditional::QuerySingle(
				QQ::Equal(QQN::StrategyQuestionConditional()->Id, $intId)
			);
		}

		/**
		 * Load all StrategyQuestionConditionals
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return StrategyQuestionConditional[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call StrategyQuestionConditional::QueryArray to perform the LoadAll query
			try {
				return StrategyQuestionConditional::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all StrategyQuestionConditionals
		 * @return int
		 */
		public static function CountAll() {
			// Call StrategyQuestionConditional::QueryCount to perform the CountAll query
			return StrategyQuestionConditional::QueryCount(QQ::All());
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
			$objDatabase = StrategyQuestionConditional::GetDatabase();

			// Create/Build out the QueryBuilder object with StrategyQuestionConditional-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'strategy_question_conditional');
			StrategyQuestionConditional::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('strategy_question_conditional');

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
		 * Static Qcodo Query method to query for a single StrategyQuestionConditional object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return StrategyQuestionConditional the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = StrategyQuestionConditional::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new StrategyQuestionConditional object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = StrategyQuestionConditional::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return StrategyQuestionConditional::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of StrategyQuestionConditional objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return StrategyQuestionConditional[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = StrategyQuestionConditional::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return StrategyQuestionConditional::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = StrategyQuestionConditional::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of StrategyQuestionConditional objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = StrategyQuestionConditional::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = StrategyQuestionConditional::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'strategy_question_conditional_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with StrategyQuestionConditional-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				StrategyQuestionConditional::GetSelectFields($objQueryBuilder);
				StrategyQuestionConditional::GetFromFields($objQueryBuilder);

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
			return StrategyQuestionConditional::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this StrategyQuestionConditional
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'strategy_question_conditional';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'question_id', $strAliasPrefix . 'question_id');
			$objBuilder->AddSelectItem($strTableName, 'strategy_id', $strAliasPrefix . 'strategy_id');
			$objBuilder->AddSelectItem($strTableName, 'conditional_type', $strAliasPrefix . 'conditional_type');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a StrategyQuestionConditional from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this StrategyQuestionConditional::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return StrategyQuestionConditional
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;


			// Create a new instance of the StrategyQuestionConditional object
			$objToReturn = new StrategyQuestionConditional();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'question_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'question_id'] : $strAliasPrefix . 'question_id';
			$objToReturn->intQuestionId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'strategy_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'strategy_id'] : $strAliasPrefix . 'strategy_id';
			$objToReturn->intStrategyId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'conditional_type', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'conditional_type'] : $strAliasPrefix . 'conditional_type';
			$objToReturn->intConditionalType = $objDbRow->GetColumn($strAliasName, 'Integer');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'strategy_question_conditional__';

			// Check for Question Early Binding
			$strAlias = $strAliasPrefix . 'question_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objQuestion = TenPQuestions::InstantiateDbRow($objDbRow, $strAliasPrefix . 'question_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for Strategy Early Binding
			$strAlias = $strAliasPrefix . 'strategy_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objStrategy = CannedStrategy::InstantiateDbRow($objDbRow, $strAliasPrefix . 'strategy_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			return $objToReturn;
		}

		/**
		 * Instantiate an array of StrategyQuestionConditionals from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return StrategyQuestionConditional[]
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
					$objItem = StrategyQuestionConditional::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = StrategyQuestionConditional::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single StrategyQuestionConditional object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return StrategyQuestionConditional next row resulting from the query
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
			return StrategyQuestionConditional::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single StrategyQuestionConditional object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return StrategyQuestionConditional
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return StrategyQuestionConditional::QuerySingle(
				QQ::Equal(QQN::StrategyQuestionConditional()->Id, $intId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of StrategyQuestionConditional objects,
		 * by QuestionId Index(es)
		 * @param integer $intQuestionId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return StrategyQuestionConditional[]
		*/
		public static function LoadArrayByQuestionId($intQuestionId, $objOptionalClauses = null) {
			// Call StrategyQuestionConditional::QueryArray to perform the LoadArrayByQuestionId query
			try {
				return StrategyQuestionConditional::QueryArray(
					QQ::Equal(QQN::StrategyQuestionConditional()->QuestionId, $intQuestionId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count StrategyQuestionConditionals
		 * by QuestionId Index(es)
		 * @param integer $intQuestionId
		 * @return int
		*/
		public static function CountByQuestionId($intQuestionId, $objOptionalClauses = null) {
			// Call StrategyQuestionConditional::QueryCount to perform the CountByQuestionId query
			return StrategyQuestionConditional::QueryCount(
				QQ::Equal(QQN::StrategyQuestionConditional()->QuestionId, $intQuestionId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of StrategyQuestionConditional objects,
		 * by StrategyId Index(es)
		 * @param integer $intStrategyId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return StrategyQuestionConditional[]
		*/
		public static function LoadArrayByStrategyId($intStrategyId, $objOptionalClauses = null) {
			// Call StrategyQuestionConditional::QueryArray to perform the LoadArrayByStrategyId query
			try {
				return StrategyQuestionConditional::QueryArray(
					QQ::Equal(QQN::StrategyQuestionConditional()->StrategyId, $intStrategyId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count StrategyQuestionConditionals
		 * by StrategyId Index(es)
		 * @param integer $intStrategyId
		 * @return int
		*/
		public static function CountByStrategyId($intStrategyId, $objOptionalClauses = null) {
			// Call StrategyQuestionConditional::QueryCount to perform the CountByStrategyId query
			return StrategyQuestionConditional::QueryCount(
				QQ::Equal(QQN::StrategyQuestionConditional()->StrategyId, $intStrategyId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of StrategyQuestionConditional objects,
		 * by ConditionalType Index(es)
		 * @param integer $intConditionalType
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return StrategyQuestionConditional[]
		*/
		public static function LoadArrayByConditionalType($intConditionalType, $objOptionalClauses = null) {
			// Call StrategyQuestionConditional::QueryArray to perform the LoadArrayByConditionalType query
			try {
				return StrategyQuestionConditional::QueryArray(
					QQ::Equal(QQN::StrategyQuestionConditional()->ConditionalType, $intConditionalType),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count StrategyQuestionConditionals
		 * by ConditionalType Index(es)
		 * @param integer $intConditionalType
		 * @return int
		*/
		public static function CountByConditionalType($intConditionalType, $objOptionalClauses = null) {
			// Call StrategyQuestionConditional::QueryCount to perform the CountByConditionalType query
			return StrategyQuestionConditional::QueryCount(
				QQ::Equal(QQN::StrategyQuestionConditional()->ConditionalType, $intConditionalType)
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
		 * Save this StrategyQuestionConditional
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = StrategyQuestionConditional::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `strategy_question_conditional` (
							`question_id`,
							`strategy_id`,
							`conditional_type`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intQuestionId) . ',
							' . $objDatabase->SqlVariable($this->intStrategyId) . ',
							' . $objDatabase->SqlVariable($this->intConditionalType) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('strategy_question_conditional', 'id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`strategy_question_conditional`
						SET
							`question_id` = ' . $objDatabase->SqlVariable($this->intQuestionId) . ',
							`strategy_id` = ' . $objDatabase->SqlVariable($this->intStrategyId) . ',
							`conditional_type` = ' . $objDatabase->SqlVariable($this->intConditionalType) . '
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
		 * Delete this StrategyQuestionConditional
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this StrategyQuestionConditional with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = StrategyQuestionConditional::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`strategy_question_conditional`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all StrategyQuestionConditionals
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = StrategyQuestionConditional::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`strategy_question_conditional`');
		}

		/**
		 * Truncate strategy_question_conditional table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = StrategyQuestionConditional::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `strategy_question_conditional`');
		}

		/**
		 * Reload this StrategyQuestionConditional from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved StrategyQuestionConditional object.');

			// Reload the Object
			$objReloaded = StrategyQuestionConditional::Load($this->intId);

			// Update $this's local variables to match
			$this->QuestionId = $objReloaded->QuestionId;
			$this->StrategyId = $objReloaded->StrategyId;
			$this->ConditionalType = $objReloaded->ConditionalType;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = StrategyQuestionConditional::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `strategy_question_conditional` (
					`id`,
					`question_id`,
					`strategy_id`,
					`conditional_type`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->intQuestionId) . ',
					' . $objDatabase->SqlVariable($this->intStrategyId) . ',
					' . $objDatabase->SqlVariable($this->intConditionalType) . ',
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
		 * @return StrategyQuestionConditional[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = StrategyQuestionConditional::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM strategy_question_conditional WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return StrategyQuestionConditional::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return StrategyQuestionConditional[]
		 */
		public function GetJournal() {
			return StrategyQuestionConditional::GetJournalForId($this->intId);
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

				case 'QuestionId':
					// Gets the value for intQuestionId 
					// @return integer
					return $this->intQuestionId;

				case 'StrategyId':
					// Gets the value for intStrategyId 
					// @return integer
					return $this->intStrategyId;

				case 'ConditionalType':
					// Gets the value for intConditionalType 
					// @return integer
					return $this->intConditionalType;


				///////////////////
				// Member Objects
				///////////////////
				case 'Question':
					// Gets the value for the TenPQuestions object referenced by intQuestionId 
					// @return TenPQuestions
					try {
						if ((!$this->objQuestion) && (!is_null($this->intQuestionId)))
							$this->objQuestion = TenPQuestions::Load($this->intQuestionId);
						return $this->objQuestion;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Strategy':
					// Gets the value for the CannedStrategy object referenced by intStrategyId 
					// @return CannedStrategy
					try {
						if ((!$this->objStrategy) && (!is_null($this->intStrategyId)))
							$this->objStrategy = CannedStrategy::Load($this->intStrategyId);
						return $this->objStrategy;
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
				case 'QuestionId':
					// Sets the value for intQuestionId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objQuestion = null;
						return ($this->intQuestionId = QType::Cast($mixValue, QType::Integer));
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

				case 'ConditionalType':
					// Sets the value for intConditionalType 
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intConditionalType = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Question':
					// Sets the value for the TenPQuestions object referenced by intQuestionId 
					// @param TenPQuestions $mixValue
					// @return TenPQuestions
					if (is_null($mixValue)) {
						$this->intQuestionId = null;
						$this->objQuestion = null;
						return null;
					} else {
						// Make sure $mixValue actually is a TenPQuestions object
						try {
							$mixValue = QType::Cast($mixValue, 'TenPQuestions');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED TenPQuestions object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Question for this StrategyQuestionConditional');

						// Update Local Member Variables
						$this->objQuestion = $mixValue;
						$this->intQuestionId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Strategy':
					// Sets the value for the CannedStrategy object referenced by intStrategyId 
					// @param CannedStrategy $mixValue
					// @return CannedStrategy
					if (is_null($mixValue)) {
						$this->intStrategyId = null;
						$this->objStrategy = null;
						return null;
					} else {
						// Make sure $mixValue actually is a CannedStrategy object
						try {
							$mixValue = QType::Cast($mixValue, 'CannedStrategy');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED CannedStrategy object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Strategy for this StrategyQuestionConditional');

						// Update Local Member Variables
						$this->objStrategy = $mixValue;
						$this->intStrategyId = $mixValue->Id;

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
			$strToReturn = '<complexType name="StrategyQuestionConditional"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Question" type="xsd1:TenPQuestions"/>';
			$strToReturn .= '<element name="Strategy" type="xsd1:CannedStrategy"/>';
			$strToReturn .= '<element name="ConditionalType" type="xsd:int"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('StrategyQuestionConditional', $strComplexTypeArray)) {
				$strComplexTypeArray['StrategyQuestionConditional'] = StrategyQuestionConditional::GetSoapComplexTypeXml();
				TenPQuestions::AlterSoapComplexTypeArray($strComplexTypeArray);
				CannedStrategy::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, StrategyQuestionConditional::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new StrategyQuestionConditional();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'Question')) &&
				($objSoapObject->Question))
				$objToReturn->Question = TenPQuestions::GetObjectFromSoapObject($objSoapObject->Question);
			if ((property_exists($objSoapObject, 'Strategy')) &&
				($objSoapObject->Strategy))
				$objToReturn->Strategy = CannedStrategy::GetObjectFromSoapObject($objSoapObject->Strategy);
			if (property_exists($objSoapObject, 'ConditionalType'))
				$objToReturn->intConditionalType = $objSoapObject->ConditionalType;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, StrategyQuestionConditional::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objQuestion)
				$objObject->objQuestion = TenPQuestions::GetSoapObjectFromObject($objObject->objQuestion, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intQuestionId = null;
			if ($objObject->objStrategy)
				$objObject->objStrategy = CannedStrategy::GetSoapObjectFromObject($objObject->objStrategy, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intStrategyId = null;
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $Id
	 * @property-read QQNode $QuestionId
	 * @property-read QQNodeTenPQuestions $Question
	 * @property-read QQNode $StrategyId
	 * @property-read QQNodeCannedStrategy $Strategy
	 * @property-read QQNode $ConditionalType
	 */
	class QQNodeStrategyQuestionConditional extends QQNode {
		protected $strTableName = 'strategy_question_conditional';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'StrategyQuestionConditional';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'QuestionId':
					return new QQNode('question_id', 'QuestionId', 'integer', $this);
				case 'Question':
					return new QQNodeTenPQuestions('question_id', 'Question', 'integer', $this);
				case 'StrategyId':
					return new QQNode('strategy_id', 'StrategyId', 'integer', $this);
				case 'Strategy':
					return new QQNodeCannedStrategy('strategy_id', 'Strategy', 'integer', $this);
				case 'ConditionalType':
					return new QQNode('conditional_type', 'ConditionalType', 'integer', $this);

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
	 * @property-read QQNode $QuestionId
	 * @property-read QQNodeTenPQuestions $Question
	 * @property-read QQNode $StrategyId
	 * @property-read QQNodeCannedStrategy $Strategy
	 * @property-read QQNode $ConditionalType
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeStrategyQuestionConditional extends QQReverseReferenceNode {
		protected $strTableName = 'strategy_question_conditional';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'StrategyQuestionConditional';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'QuestionId':
					return new QQNode('question_id', 'QuestionId', 'integer', $this);
				case 'Question':
					return new QQNodeTenPQuestions('question_id', 'Question', 'integer', $this);
				case 'StrategyId':
					return new QQNode('strategy_id', 'StrategyId', 'integer', $this);
				case 'Strategy':
					return new QQNodeCannedStrategy('strategy_id', 'Strategy', 'integer', $this);
				case 'ConditionalType':
					return new QQNode('conditional_type', 'ConditionalType', 'integer', $this);

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