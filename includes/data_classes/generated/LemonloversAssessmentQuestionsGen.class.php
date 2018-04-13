<?php
	/**
	 * The abstract LemonloversAssessmentQuestionsGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the LemonloversAssessmentQuestions subclass which
	 * extends this LemonloversAssessmentQuestionsGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the LemonloversAssessmentQuestions class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property integer $Count the value for intCount (Unique)
	 * @property string $Text the value for strText 
	 * @property integer $LemonTypeId the value for intLemonTypeId 
	 * @property boolean $Inverse the value for blnInverse 
	 * @property LemonloversAssessmentResults $_LemonloversAssessmentResultsAsQuestion the value for the private _objLemonloversAssessmentResultsAsQuestion (Read-Only) if set due to an expansion on the lemonlovers_assessment_results.question_id reverse relationship
	 * @property LemonloversAssessmentResults[] $_LemonloversAssessmentResultsAsQuestionArray the value for the private _objLemonloversAssessmentResultsAsQuestionArray (Read-Only) if set due to an ExpandAsArray on the lemonlovers_assessment_results.question_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class LemonloversAssessmentQuestionsGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column lemonlovers_assessment_questions.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column lemonlovers_assessment_questions.count
		 * @var integer intCount
		 */
		protected $intCount;
		const CountDefault = null;


		/**
		 * Protected member variable that maps to the database column lemonlovers_assessment_questions.text
		 * @var string strText
		 */
		protected $strText;
		const TextMaxLength = 514;
		const TextDefault = null;


		/**
		 * Protected member variable that maps to the database column lemonlovers_assessment_questions.lemon_type_id
		 * @var integer intLemonTypeId
		 */
		protected $intLemonTypeId;
		const LemonTypeIdDefault = null;


		/**
		 * Protected member variable that maps to the database column lemonlovers_assessment_questions.inverse
		 * @var boolean blnInverse
		 */
		protected $blnInverse;
		const InverseDefault = null;


		/**
		 * Private member variable that stores a reference to a single LemonloversAssessmentResultsAsQuestion object
		 * (of type LemonloversAssessmentResults), if this LemonloversAssessmentQuestions object was restored with
		 * an expansion on the lemonlovers_assessment_results association table.
		 * @var LemonloversAssessmentResults _objLemonloversAssessmentResultsAsQuestion;
		 */
		private $_objLemonloversAssessmentResultsAsQuestion;

		/**
		 * Private member variable that stores a reference to an array of LemonloversAssessmentResultsAsQuestion objects
		 * (of type LemonloversAssessmentResults[]), if this LemonloversAssessmentQuestions object was restored with
		 * an ExpandAsArray on the lemonlovers_assessment_results association table.
		 * @var LemonloversAssessmentResults[] _objLemonloversAssessmentResultsAsQuestionArray;
		 */
		private $_objLemonloversAssessmentResultsAsQuestionArray = array();

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
		 * Load a LemonloversAssessmentQuestions from PK Info
		 * @param integer $intId
		 * @return LemonloversAssessmentQuestions
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return LemonloversAssessmentQuestions::QuerySingle(
				QQ::Equal(QQN::LemonloversAssessmentQuestions()->Id, $intId)
			);
		}

		/**
		 * Load all LemonloversAssessmentQuestionses
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return LemonloversAssessmentQuestions[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call LemonloversAssessmentQuestions::QueryArray to perform the LoadAll query
			try {
				return LemonloversAssessmentQuestions::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all LemonloversAssessmentQuestionses
		 * @return int
		 */
		public static function CountAll() {
			// Call LemonloversAssessmentQuestions::QueryCount to perform the CountAll query
			return LemonloversAssessmentQuestions::QueryCount(QQ::All());
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
			$objDatabase = LemonloversAssessmentQuestions::GetDatabase();

			// Create/Build out the QueryBuilder object with LemonloversAssessmentQuestions-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'lemonlovers_assessment_questions');
			LemonloversAssessmentQuestions::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('lemonlovers_assessment_questions');

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
		 * Static Qcodo Query method to query for a single LemonloversAssessmentQuestions object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return LemonloversAssessmentQuestions the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = LemonloversAssessmentQuestions::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new LemonloversAssessmentQuestions object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = LemonloversAssessmentQuestions::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return LemonloversAssessmentQuestions::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of LemonloversAssessmentQuestions objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return LemonloversAssessmentQuestions[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = LemonloversAssessmentQuestions::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return LemonloversAssessmentQuestions::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = LemonloversAssessmentQuestions::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of LemonloversAssessmentQuestions objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = LemonloversAssessmentQuestions::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = LemonloversAssessmentQuestions::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'lemonlovers_assessment_questions_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with LemonloversAssessmentQuestions-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				LemonloversAssessmentQuestions::GetSelectFields($objQueryBuilder);
				LemonloversAssessmentQuestions::GetFromFields($objQueryBuilder);

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
			return LemonloversAssessmentQuestions::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this LemonloversAssessmentQuestions
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'lemonlovers_assessment_questions';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'count', $strAliasPrefix . 'count');
			$objBuilder->AddSelectItem($strTableName, 'text', $strAliasPrefix . 'text');
			$objBuilder->AddSelectItem($strTableName, 'lemon_type_id', $strAliasPrefix . 'lemon_type_id');
			$objBuilder->AddSelectItem($strTableName, 'inverse', $strAliasPrefix . 'inverse');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a LemonloversAssessmentQuestions from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this LemonloversAssessmentQuestions::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return LemonloversAssessmentQuestions
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
					$strAliasPrefix = 'lemonlovers_assessment_questions__';


				$strAlias = $strAliasPrefix . 'lemonloversassessmentresultsasquestion__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objLemonloversAssessmentResultsAsQuestionArray)) {
						$objPreviousChildItem = $objPreviousItem->_objLemonloversAssessmentResultsAsQuestionArray[$intPreviousChildItemCount - 1];
						$objChildItem = LemonloversAssessmentResults::InstantiateDbRow($objDbRow, $strAliasPrefix . 'lemonloversassessmentresultsasquestion__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objLemonloversAssessmentResultsAsQuestionArray[] = $objChildItem;
					} else
						$objPreviousItem->_objLemonloversAssessmentResultsAsQuestionArray[] = LemonloversAssessmentResults::InstantiateDbRow($objDbRow, $strAliasPrefix . 'lemonloversassessmentresultsasquestion__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'lemonlovers_assessment_questions__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the LemonloversAssessmentQuestions object
			$objToReturn = new LemonloversAssessmentQuestions();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'count', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'count'] : $strAliasPrefix . 'count';
			$objToReturn->intCount = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'text', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'text'] : $strAliasPrefix . 'text';
			$objToReturn->strText = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'lemon_type_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'lemon_type_id'] : $strAliasPrefix . 'lemon_type_id';
			$objToReturn->intLemonTypeId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'inverse', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'inverse'] : $strAliasPrefix . 'inverse';
			$objToReturn->blnInverse = $objDbRow->GetColumn($strAliasName, 'Bit');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'lemonlovers_assessment_questions__';




			// Check for LemonloversAssessmentResultsAsQuestion Virtual Binding
			$strAlias = $strAliasPrefix . 'lemonloversassessmentresultsasquestion__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objLemonloversAssessmentResultsAsQuestionArray[] = LemonloversAssessmentResults::InstantiateDbRow($objDbRow, $strAliasPrefix . 'lemonloversassessmentresultsasquestion__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objLemonloversAssessmentResultsAsQuestion = LemonloversAssessmentResults::InstantiateDbRow($objDbRow, $strAliasPrefix . 'lemonloversassessmentresultsasquestion__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of LemonloversAssessmentQuestionses from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return LemonloversAssessmentQuestions[]
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
					$objItem = LemonloversAssessmentQuestions::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = LemonloversAssessmentQuestions::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single LemonloversAssessmentQuestions object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return LemonloversAssessmentQuestions next row resulting from the query
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
			return LemonloversAssessmentQuestions::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single LemonloversAssessmentQuestions object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return LemonloversAssessmentQuestions
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return LemonloversAssessmentQuestions::QuerySingle(
				QQ::Equal(QQN::LemonloversAssessmentQuestions()->Id, $intId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load a single LemonloversAssessmentQuestions object,
		 * by Count Index(es)
		 * @param integer $intCount
		 * @return LemonloversAssessmentQuestions
		*/
		public static function LoadByCount($intCount, $objOptionalClauses = null) {
			return LemonloversAssessmentQuestions::QuerySingle(
				QQ::Equal(QQN::LemonloversAssessmentQuestions()->Count, $intCount)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of LemonloversAssessmentQuestions objects,
		 * by LemonTypeId Index(es)
		 * @param integer $intLemonTypeId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return LemonloversAssessmentQuestions[]
		*/
		public static function LoadArrayByLemonTypeId($intLemonTypeId, $objOptionalClauses = null) {
			// Call LemonloversAssessmentQuestions::QueryArray to perform the LoadArrayByLemonTypeId query
			try {
				return LemonloversAssessmentQuestions::QueryArray(
					QQ::Equal(QQN::LemonloversAssessmentQuestions()->LemonTypeId, $intLemonTypeId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count LemonloversAssessmentQuestionses
		 * by LemonTypeId Index(es)
		 * @param integer $intLemonTypeId
		 * @return int
		*/
		public static function CountByLemonTypeId($intLemonTypeId, $objOptionalClauses = null) {
			// Call LemonloversAssessmentQuestions::QueryCount to perform the CountByLemonTypeId query
			return LemonloversAssessmentQuestions::QueryCount(
				QQ::Equal(QQN::LemonloversAssessmentQuestions()->LemonTypeId, $intLemonTypeId)
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
		 * Save this LemonloversAssessmentQuestions
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = LemonloversAssessmentQuestions::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `lemonlovers_assessment_questions` (
							`count`,
							`text`,
							`lemon_type_id`,
							`inverse`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intCount) . ',
							' . $objDatabase->SqlVariable($this->strText) . ',
							' . $objDatabase->SqlVariable($this->intLemonTypeId) . ',
							' . $objDatabase->SqlVariable($this->blnInverse) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('lemonlovers_assessment_questions', 'id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`lemonlovers_assessment_questions`
						SET
							`count` = ' . $objDatabase->SqlVariable($this->intCount) . ',
							`text` = ' . $objDatabase->SqlVariable($this->strText) . ',
							`lemon_type_id` = ' . $objDatabase->SqlVariable($this->intLemonTypeId) . ',
							`inverse` = ' . $objDatabase->SqlVariable($this->blnInverse) . '
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
		 * Delete this LemonloversAssessmentQuestions
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this LemonloversAssessmentQuestions with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = LemonloversAssessmentQuestions::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`lemonlovers_assessment_questions`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all LemonloversAssessmentQuestionses
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = LemonloversAssessmentQuestions::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`lemonlovers_assessment_questions`');
		}

		/**
		 * Truncate lemonlovers_assessment_questions table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = LemonloversAssessmentQuestions::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `lemonlovers_assessment_questions`');
		}

		/**
		 * Reload this LemonloversAssessmentQuestions from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved LemonloversAssessmentQuestions object.');

			// Reload the Object
			$objReloaded = LemonloversAssessmentQuestions::Load($this->intId);

			// Update $this's local variables to match
			$this->intCount = $objReloaded->intCount;
			$this->strText = $objReloaded->strText;
			$this->LemonTypeId = $objReloaded->LemonTypeId;
			$this->blnInverse = $objReloaded->blnInverse;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = LemonloversAssessmentQuestions::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `lemonlovers_assessment_questions` (
					`id`,
					`count`,
					`text`,
					`lemon_type_id`,
					`inverse`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->intCount) . ',
					' . $objDatabase->SqlVariable($this->strText) . ',
					' . $objDatabase->SqlVariable($this->intLemonTypeId) . ',
					' . $objDatabase->SqlVariable($this->blnInverse) . ',
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
		 * @return LemonloversAssessmentQuestions[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = LemonloversAssessmentQuestions::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM lemonlovers_assessment_questions WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return LemonloversAssessmentQuestions::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return LemonloversAssessmentQuestions[]
		 */
		public function GetJournal() {
			return LemonloversAssessmentQuestions::GetJournalForId($this->intId);
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

				case 'Count':
					// Gets the value for intCount (Unique)
					// @return integer
					return $this->intCount;

				case 'Text':
					// Gets the value for strText 
					// @return string
					return $this->strText;

				case 'LemonTypeId':
					// Gets the value for intLemonTypeId 
					// @return integer
					return $this->intLemonTypeId;

				case 'Inverse':
					// Gets the value for blnInverse 
					// @return boolean
					return $this->blnInverse;


				///////////////////
				// Member Objects
				///////////////////

				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_LemonloversAssessmentResultsAsQuestion':
					// Gets the value for the private _objLemonloversAssessmentResultsAsQuestion (Read-Only)
					// if set due to an expansion on the lemonlovers_assessment_results.question_id reverse relationship
					// @return LemonloversAssessmentResults
					return $this->_objLemonloversAssessmentResultsAsQuestion;

				case '_LemonloversAssessmentResultsAsQuestionArray':
					// Gets the value for the private _objLemonloversAssessmentResultsAsQuestionArray (Read-Only)
					// if set due to an ExpandAsArray on the lemonlovers_assessment_results.question_id reverse relationship
					// @return LemonloversAssessmentResults[]
					return (array) $this->_objLemonloversAssessmentResultsAsQuestionArray;


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
				case 'Count':
					// Sets the value for intCount (Unique)
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intCount = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Text':
					// Sets the value for strText 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strText = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'LemonTypeId':
					// Sets the value for intLemonTypeId 
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intLemonTypeId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Inverse':
					// Sets the value for blnInverse 
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnInverse = QType::Cast($mixValue, QType::Boolean));
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

			
		
		// Related Objects' Methods for LemonloversAssessmentResultsAsQuestion
		//-------------------------------------------------------------------

		/**
		 * Gets all associated LemonloversAssessmentResultsesAsQuestion as an array of LemonloversAssessmentResults objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return LemonloversAssessmentResults[]
		*/ 
		public function GetLemonloversAssessmentResultsAsQuestionArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return LemonloversAssessmentResults::LoadArrayByQuestionId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated LemonloversAssessmentResultsesAsQuestion
		 * @return int
		*/ 
		public function CountLemonloversAssessmentResultsesAsQuestion() {
			if ((is_null($this->intId)))
				return 0;

			return LemonloversAssessmentResults::CountByQuestionId($this->intId);
		}

		/**
		 * Associates a LemonloversAssessmentResultsAsQuestion
		 * @param LemonloversAssessmentResults $objLemonloversAssessmentResults
		 * @return void
		*/ 
		public function AssociateLemonloversAssessmentResultsAsQuestion(LemonloversAssessmentResults $objLemonloversAssessmentResults) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateLemonloversAssessmentResultsAsQuestion on this unsaved LemonloversAssessmentQuestions.');
			if ((is_null($objLemonloversAssessmentResults->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateLemonloversAssessmentResultsAsQuestion on this LemonloversAssessmentQuestions with an unsaved LemonloversAssessmentResults.');

			// Get the Database Object for this Class
			$objDatabase = LemonloversAssessmentQuestions::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`lemonlovers_assessment_results`
				SET
					`question_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objLemonloversAssessmentResults->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objLemonloversAssessmentResults->QuestionId = $this->intId;
				$objLemonloversAssessmentResults->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a LemonloversAssessmentResultsAsQuestion
		 * @param LemonloversAssessmentResults $objLemonloversAssessmentResults
		 * @return void
		*/ 
		public function UnassociateLemonloversAssessmentResultsAsQuestion(LemonloversAssessmentResults $objLemonloversAssessmentResults) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLemonloversAssessmentResultsAsQuestion on this unsaved LemonloversAssessmentQuestions.');
			if ((is_null($objLemonloversAssessmentResults->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLemonloversAssessmentResultsAsQuestion on this LemonloversAssessmentQuestions with an unsaved LemonloversAssessmentResults.');

			// Get the Database Object for this Class
			$objDatabase = LemonloversAssessmentQuestions::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`lemonlovers_assessment_results`
				SET
					`question_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objLemonloversAssessmentResults->Id) . ' AND
					`question_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objLemonloversAssessmentResults->QuestionId = null;
				$objLemonloversAssessmentResults->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all LemonloversAssessmentResultsesAsQuestion
		 * @return void
		*/ 
		public function UnassociateAllLemonloversAssessmentResultsesAsQuestion() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLemonloversAssessmentResultsAsQuestion on this unsaved LemonloversAssessmentQuestions.');

			// Get the Database Object for this Class
			$objDatabase = LemonloversAssessmentQuestions::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (LemonloversAssessmentResults::LoadArrayByQuestionId($this->intId) as $objLemonloversAssessmentResults) {
					$objLemonloversAssessmentResults->QuestionId = null;
					$objLemonloversAssessmentResults->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`lemonlovers_assessment_results`
				SET
					`question_id` = null
				WHERE
					`question_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated LemonloversAssessmentResultsAsQuestion
		 * @param LemonloversAssessmentResults $objLemonloversAssessmentResults
		 * @return void
		*/ 
		public function DeleteAssociatedLemonloversAssessmentResultsAsQuestion(LemonloversAssessmentResults $objLemonloversAssessmentResults) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLemonloversAssessmentResultsAsQuestion on this unsaved LemonloversAssessmentQuestions.');
			if ((is_null($objLemonloversAssessmentResults->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLemonloversAssessmentResultsAsQuestion on this LemonloversAssessmentQuestions with an unsaved LemonloversAssessmentResults.');

			// Get the Database Object for this Class
			$objDatabase = LemonloversAssessmentQuestions::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`lemonlovers_assessment_results`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objLemonloversAssessmentResults->Id) . ' AND
					`question_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objLemonloversAssessmentResults->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated LemonloversAssessmentResultsesAsQuestion
		 * @return void
		*/ 
		public function DeleteAllLemonloversAssessmentResultsesAsQuestion() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLemonloversAssessmentResultsAsQuestion on this unsaved LemonloversAssessmentQuestions.');

			// Get the Database Object for this Class
			$objDatabase = LemonloversAssessmentQuestions::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (LemonloversAssessmentResults::LoadArrayByQuestionId($this->intId) as $objLemonloversAssessmentResults) {
					$objLemonloversAssessmentResults->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`lemonlovers_assessment_results`
				WHERE
					`question_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="LemonloversAssessmentQuestions"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Count" type="xsd:int"/>';
			$strToReturn .= '<element name="Text" type="xsd:string"/>';
			$strToReturn .= '<element name="LemonTypeId" type="xsd:int"/>';
			$strToReturn .= '<element name="Inverse" type="xsd:boolean"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('LemonloversAssessmentQuestions', $strComplexTypeArray)) {
				$strComplexTypeArray['LemonloversAssessmentQuestions'] = LemonloversAssessmentQuestions::GetSoapComplexTypeXml();
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, LemonloversAssessmentQuestions::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new LemonloversAssessmentQuestions();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'Count'))
				$objToReturn->intCount = $objSoapObject->Count;
			if (property_exists($objSoapObject, 'Text'))
				$objToReturn->strText = $objSoapObject->Text;
			if (property_exists($objSoapObject, 'LemonTypeId'))
				$objToReturn->intLemonTypeId = $objSoapObject->LemonTypeId;
			if (property_exists($objSoapObject, 'Inverse'))
				$objToReturn->blnInverse = $objSoapObject->Inverse;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, LemonloversAssessmentQuestions::GetSoapObjectFromObject($objObject, true));

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
	 * @property-read QQNode $Count
	 * @property-read QQNode $Text
	 * @property-read QQNode $LemonTypeId
	 * @property-read QQNode $Inverse
	 * @property-read QQReverseReferenceNodeLemonloversAssessmentResults $LemonloversAssessmentResultsAsQuestion
	 */
	class QQNodeLemonloversAssessmentQuestions extends QQNode {
		protected $strTableName = 'lemonlovers_assessment_questions';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'LemonloversAssessmentQuestions';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Count':
					return new QQNode('count', 'Count', 'integer', $this);
				case 'Text':
					return new QQNode('text', 'Text', 'string', $this);
				case 'LemonTypeId':
					return new QQNode('lemon_type_id', 'LemonTypeId', 'integer', $this);
				case 'Inverse':
					return new QQNode('inverse', 'Inverse', 'boolean', $this);
				case 'LemonloversAssessmentResultsAsQuestion':
					return new QQReverseReferenceNodeLemonloversAssessmentResults($this, 'lemonloversassessmentresultsasquestion', 'reverse_reference', 'question_id');

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
	 * @property-read QQNode $Count
	 * @property-read QQNode $Text
	 * @property-read QQNode $LemonTypeId
	 * @property-read QQNode $Inverse
	 * @property-read QQReverseReferenceNodeLemonloversAssessmentResults $LemonloversAssessmentResultsAsQuestion
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeLemonloversAssessmentQuestions extends QQReverseReferenceNode {
		protected $strTableName = 'lemonlovers_assessment_questions';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'LemonloversAssessmentQuestions';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'Count':
					return new QQNode('count', 'Count', 'integer', $this);
				case 'Text':
					return new QQNode('text', 'Text', 'string', $this);
				case 'LemonTypeId':
					return new QQNode('lemon_type_id', 'LemonTypeId', 'integer', $this);
				case 'Inverse':
					return new QQNode('inverse', 'Inverse', 'boolean', $this);
				case 'LemonloversAssessmentResultsAsQuestion':
					return new QQReverseReferenceNodeLemonloversAssessmentResults($this, 'lemonloversassessmentresultsasquestion', 'reverse_reference', 'question_id');

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