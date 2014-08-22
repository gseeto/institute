<?php
	/**
	 * The abstract LraResultsGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the LraResults subclass which
	 * extends this LraResultsGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the LraResults class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property integer $QuestionId the value for intQuestionId 
	 * @property integer $AssessmentId the value for intAssessmentId 
	 * @property integer $Head the value for intHead 
	 * @property integer $Hands the value for intHands 
	 * @property integer $Heart the value for intHeart 
	 * @property LraQuestions $Question the value for the LraQuestions object referenced by intQuestionId 
	 * @property LraAssessment $Assessment the value for the LraAssessment object referenced by intAssessmentId 
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class LraResultsGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column lra_results.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column lra_results.question_id
		 * @var integer intQuestionId
		 */
		protected $intQuestionId;
		const QuestionIdDefault = null;


		/**
		 * Protected member variable that maps to the database column lra_results.assessment_id
		 * @var integer intAssessmentId
		 */
		protected $intAssessmentId;
		const AssessmentIdDefault = null;


		/**
		 * Protected member variable that maps to the database column lra_results.head
		 * @var integer intHead
		 */
		protected $intHead;
		const HeadDefault = null;


		/**
		 * Protected member variable that maps to the database column lra_results.hands
		 * @var integer intHands
		 */
		protected $intHands;
		const HandsDefault = null;


		/**
		 * Protected member variable that maps to the database column lra_results.heart
		 * @var integer intHeart
		 */
		protected $intHeart;
		const HeartDefault = null;


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
		 * in the database column lra_results.question_id.
		 *
		 * NOTE: Always use the Question property getter to correctly retrieve this LraQuestions object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var LraQuestions objQuestion
		 */
		protected $objQuestion;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column lra_results.assessment_id.
		 *
		 * NOTE: Always use the Assessment property getter to correctly retrieve this LraAssessment object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var LraAssessment objAssessment
		 */
		protected $objAssessment;





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
		 * Load a LraResults from PK Info
		 * @param integer $intId
		 * @return LraResults
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return LraResults::QuerySingle(
				QQ::Equal(QQN::LraResults()->Id, $intId)
			);
		}

		/**
		 * Load all LraResultses
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return LraResults[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call LraResults::QueryArray to perform the LoadAll query
			try {
				return LraResults::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all LraResultses
		 * @return int
		 */
		public static function CountAll() {
			// Call LraResults::QueryCount to perform the CountAll query
			return LraResults::QueryCount(QQ::All());
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
			$objDatabase = LraResults::GetDatabase();

			// Create/Build out the QueryBuilder object with LraResults-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'lra_results');
			LraResults::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('lra_results');

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
		 * Static Qcodo Query method to query for a single LraResults object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return LraResults the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = LraResults::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new LraResults object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = LraResults::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return LraResults::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of LraResults objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return LraResults[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = LraResults::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return LraResults::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = LraResults::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of LraResults objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = LraResults::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = LraResults::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'lra_results_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with LraResults-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				LraResults::GetSelectFields($objQueryBuilder);
				LraResults::GetFromFields($objQueryBuilder);

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
			return LraResults::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this LraResults
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'lra_results';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'question_id', $strAliasPrefix . 'question_id');
			$objBuilder->AddSelectItem($strTableName, 'assessment_id', $strAliasPrefix . 'assessment_id');
			$objBuilder->AddSelectItem($strTableName, 'head', $strAliasPrefix . 'head');
			$objBuilder->AddSelectItem($strTableName, 'hands', $strAliasPrefix . 'hands');
			$objBuilder->AddSelectItem($strTableName, 'heart', $strAliasPrefix . 'heart');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a LraResults from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this LraResults::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return LraResults
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;


			// Create a new instance of the LraResults object
			$objToReturn = new LraResults();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'question_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'question_id'] : $strAliasPrefix . 'question_id';
			$objToReturn->intQuestionId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'assessment_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'assessment_id'] : $strAliasPrefix . 'assessment_id';
			$objToReturn->intAssessmentId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'head', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'head'] : $strAliasPrefix . 'head';
			$objToReturn->intHead = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'hands', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'hands'] : $strAliasPrefix . 'hands';
			$objToReturn->intHands = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'heart', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'heart'] : $strAliasPrefix . 'heart';
			$objToReturn->intHeart = $objDbRow->GetColumn($strAliasName, 'Integer');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'lra_results__';

			// Check for Question Early Binding
			$strAlias = $strAliasPrefix . 'question_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objQuestion = LraQuestions::InstantiateDbRow($objDbRow, $strAliasPrefix . 'question_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for Assessment Early Binding
			$strAlias = $strAliasPrefix . 'assessment_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objAssessment = LraAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assessment_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			return $objToReturn;
		}

		/**
		 * Instantiate an array of LraResultses from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return LraResults[]
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
					$objItem = LraResults::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = LraResults::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single LraResults object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return LraResults next row resulting from the query
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
			return LraResults::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single LraResults object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return LraResults
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return LraResults::QuerySingle(
				QQ::Equal(QQN::LraResults()->Id, $intId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of LraResults objects,
		 * by QuestionId Index(es)
		 * @param integer $intQuestionId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return LraResults[]
		*/
		public static function LoadArrayByQuestionId($intQuestionId, $objOptionalClauses = null) {
			// Call LraResults::QueryArray to perform the LoadArrayByQuestionId query
			try {
				return LraResults::QueryArray(
					QQ::Equal(QQN::LraResults()->QuestionId, $intQuestionId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count LraResultses
		 * by QuestionId Index(es)
		 * @param integer $intQuestionId
		 * @return int
		*/
		public static function CountByQuestionId($intQuestionId, $objOptionalClauses = null) {
			// Call LraResults::QueryCount to perform the CountByQuestionId query
			return LraResults::QueryCount(
				QQ::Equal(QQN::LraResults()->QuestionId, $intQuestionId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of LraResults objects,
		 * by AssessmentId Index(es)
		 * @param integer $intAssessmentId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return LraResults[]
		*/
		public static function LoadArrayByAssessmentId($intAssessmentId, $objOptionalClauses = null) {
			// Call LraResults::QueryArray to perform the LoadArrayByAssessmentId query
			try {
				return LraResults::QueryArray(
					QQ::Equal(QQN::LraResults()->AssessmentId, $intAssessmentId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count LraResultses
		 * by AssessmentId Index(es)
		 * @param integer $intAssessmentId
		 * @return int
		*/
		public static function CountByAssessmentId($intAssessmentId, $objOptionalClauses = null) {
			// Call LraResults::QueryCount to perform the CountByAssessmentId query
			return LraResults::QueryCount(
				QQ::Equal(QQN::LraResults()->AssessmentId, $intAssessmentId)
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
		 * Save this LraResults
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = LraResults::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `lra_results` (
							`question_id`,
							`assessment_id`,
							`head`,
							`hands`,
							`heart`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intQuestionId) . ',
							' . $objDatabase->SqlVariable($this->intAssessmentId) . ',
							' . $objDatabase->SqlVariable($this->intHead) . ',
							' . $objDatabase->SqlVariable($this->intHands) . ',
							' . $objDatabase->SqlVariable($this->intHeart) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('lra_results', 'id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`lra_results`
						SET
							`question_id` = ' . $objDatabase->SqlVariable($this->intQuestionId) . ',
							`assessment_id` = ' . $objDatabase->SqlVariable($this->intAssessmentId) . ',
							`head` = ' . $objDatabase->SqlVariable($this->intHead) . ',
							`hands` = ' . $objDatabase->SqlVariable($this->intHands) . ',
							`heart` = ' . $objDatabase->SqlVariable($this->intHeart) . '
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
		 * Delete this LraResults
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this LraResults with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = LraResults::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`lra_results`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all LraResultses
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = LraResults::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`lra_results`');
		}

		/**
		 * Truncate lra_results table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = LraResults::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `lra_results`');
		}

		/**
		 * Reload this LraResults from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved LraResults object.');

			// Reload the Object
			$objReloaded = LraResults::Load($this->intId);

			// Update $this's local variables to match
			$this->QuestionId = $objReloaded->QuestionId;
			$this->AssessmentId = $objReloaded->AssessmentId;
			$this->intHead = $objReloaded->intHead;
			$this->intHands = $objReloaded->intHands;
			$this->intHeart = $objReloaded->intHeart;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = LraResults::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `lra_results` (
					`id`,
					`question_id`,
					`assessment_id`,
					`head`,
					`hands`,
					`heart`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->intQuestionId) . ',
					' . $objDatabase->SqlVariable($this->intAssessmentId) . ',
					' . $objDatabase->SqlVariable($this->intHead) . ',
					' . $objDatabase->SqlVariable($this->intHands) . ',
					' . $objDatabase->SqlVariable($this->intHeart) . ',
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
		 * @return LraResults[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = LraResults::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM lra_results WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return LraResults::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return LraResults[]
		 */
		public function GetJournal() {
			return LraResults::GetJournalForId($this->intId);
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

				case 'AssessmentId':
					// Gets the value for intAssessmentId 
					// @return integer
					return $this->intAssessmentId;

				case 'Head':
					// Gets the value for intHead 
					// @return integer
					return $this->intHead;

				case 'Hands':
					// Gets the value for intHands 
					// @return integer
					return $this->intHands;

				case 'Heart':
					// Gets the value for intHeart 
					// @return integer
					return $this->intHeart;


				///////////////////
				// Member Objects
				///////////////////
				case 'Question':
					// Gets the value for the LraQuestions object referenced by intQuestionId 
					// @return LraQuestions
					try {
						if ((!$this->objQuestion) && (!is_null($this->intQuestionId)))
							$this->objQuestion = LraQuestions::Load($this->intQuestionId);
						return $this->objQuestion;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Assessment':
					// Gets the value for the LraAssessment object referenced by intAssessmentId 
					// @return LraAssessment
					try {
						if ((!$this->objAssessment) && (!is_null($this->intAssessmentId)))
							$this->objAssessment = LraAssessment::Load($this->intAssessmentId);
						return $this->objAssessment;
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

				case 'AssessmentId':
					// Sets the value for intAssessmentId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objAssessment = null;
						return ($this->intAssessmentId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Head':
					// Sets the value for intHead 
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intHead = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Hands':
					// Sets the value for intHands 
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intHands = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Heart':
					// Sets the value for intHeart 
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intHeart = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Question':
					// Sets the value for the LraQuestions object referenced by intQuestionId 
					// @param LraQuestions $mixValue
					// @return LraQuestions
					if (is_null($mixValue)) {
						$this->intQuestionId = null;
						$this->objQuestion = null;
						return null;
					} else {
						// Make sure $mixValue actually is a LraQuestions object
						try {
							$mixValue = QType::Cast($mixValue, 'LraQuestions');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED LraQuestions object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Question for this LraResults');

						// Update Local Member Variables
						$this->objQuestion = $mixValue;
						$this->intQuestionId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Assessment':
					// Sets the value for the LraAssessment object referenced by intAssessmentId 
					// @param LraAssessment $mixValue
					// @return LraAssessment
					if (is_null($mixValue)) {
						$this->intAssessmentId = null;
						$this->objAssessment = null;
						return null;
					} else {
						// Make sure $mixValue actually is a LraAssessment object
						try {
							$mixValue = QType::Cast($mixValue, 'LraAssessment');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED LraAssessment object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Assessment for this LraResults');

						// Update Local Member Variables
						$this->objAssessment = $mixValue;
						$this->intAssessmentId = $mixValue->Id;

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
			$strToReturn = '<complexType name="LraResults"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Question" type="xsd1:LraQuestions"/>';
			$strToReturn .= '<element name="Assessment" type="xsd1:LraAssessment"/>';
			$strToReturn .= '<element name="Head" type="xsd:int"/>';
			$strToReturn .= '<element name="Hands" type="xsd:int"/>';
			$strToReturn .= '<element name="Heart" type="xsd:int"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('LraResults', $strComplexTypeArray)) {
				$strComplexTypeArray['LraResults'] = LraResults::GetSoapComplexTypeXml();
				LraQuestions::AlterSoapComplexTypeArray($strComplexTypeArray);
				LraAssessment::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, LraResults::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new LraResults();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'Question')) &&
				($objSoapObject->Question))
				$objToReturn->Question = LraQuestions::GetObjectFromSoapObject($objSoapObject->Question);
			if ((property_exists($objSoapObject, 'Assessment')) &&
				($objSoapObject->Assessment))
				$objToReturn->Assessment = LraAssessment::GetObjectFromSoapObject($objSoapObject->Assessment);
			if (property_exists($objSoapObject, 'Head'))
				$objToReturn->intHead = $objSoapObject->Head;
			if (property_exists($objSoapObject, 'Hands'))
				$objToReturn->intHands = $objSoapObject->Hands;
			if (property_exists($objSoapObject, 'Heart'))
				$objToReturn->intHeart = $objSoapObject->Heart;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, LraResults::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objQuestion)
				$objObject->objQuestion = LraQuestions::GetSoapObjectFromObject($objObject->objQuestion, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intQuestionId = null;
			if ($objObject->objAssessment)
				$objObject->objAssessment = LraAssessment::GetSoapObjectFromObject($objObject->objAssessment, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intAssessmentId = null;
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $Id
	 * @property-read QQNode $QuestionId
	 * @property-read QQNodeLraQuestions $Question
	 * @property-read QQNode $AssessmentId
	 * @property-read QQNodeLraAssessment $Assessment
	 * @property-read QQNode $Head
	 * @property-read QQNode $Hands
	 * @property-read QQNode $Heart
	 */
	class QQNodeLraResults extends QQNode {
		protected $strTableName = 'lra_results';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'LraResults';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'QuestionId':
					return new QQNode('question_id', 'QuestionId', 'integer', $this);
				case 'Question':
					return new QQNodeLraQuestions('question_id', 'Question', 'integer', $this);
				case 'AssessmentId':
					return new QQNode('assessment_id', 'AssessmentId', 'integer', $this);
				case 'Assessment':
					return new QQNodeLraAssessment('assessment_id', 'Assessment', 'integer', $this);
				case 'Head':
					return new QQNode('head', 'Head', 'integer', $this);
				case 'Hands':
					return new QQNode('hands', 'Hands', 'integer', $this);
				case 'Heart':
					return new QQNode('heart', 'Heart', 'integer', $this);

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
	 * @property-read QQNodeLraQuestions $Question
	 * @property-read QQNode $AssessmentId
	 * @property-read QQNodeLraAssessment $Assessment
	 * @property-read QQNode $Head
	 * @property-read QQNode $Hands
	 * @property-read QQNode $Heart
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeLraResults extends QQReverseReferenceNode {
		protected $strTableName = 'lra_results';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'LraResults';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'QuestionId':
					return new QQNode('question_id', 'QuestionId', 'integer', $this);
				case 'Question':
					return new QQNodeLraQuestions('question_id', 'Question', 'integer', $this);
				case 'AssessmentId':
					return new QQNode('assessment_id', 'AssessmentId', 'integer', $this);
				case 'Assessment':
					return new QQNodeLraAssessment('assessment_id', 'Assessment', 'integer', $this);
				case 'Head':
					return new QQNode('head', 'Head', 'integer', $this);
				case 'Hands':
					return new QQNode('hands', 'Hands', 'integer', $this);
				case 'Heart':
					return new QQNode('heart', 'Heart', 'integer', $this);

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