<?php
	/**
	 * The abstract UpwardResultsGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the UpwardResults subclass which
	 * extends this UpwardResultsGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the UpwardResults class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property integer $QuestionId the value for intQuestionId 
	 * @property integer $AssessmentId the value for intAssessmentId 
	 * @property integer $Performance the value for intPerformance 
	 * @property integer $Importance the value for intImportance 
	 * @property UpwardQuestions $Question the value for the UpwardQuestions object referenced by intQuestionId 
	 * @property UpwardAssessment $Assessment the value for the UpwardAssessment object referenced by intAssessmentId 
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class UpwardResultsGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column upward_results.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column upward_results.question_id
		 * @var integer intQuestionId
		 */
		protected $intQuestionId;
		const QuestionIdDefault = null;


		/**
		 * Protected member variable that maps to the database column upward_results.assessment_id
		 * @var integer intAssessmentId
		 */
		protected $intAssessmentId;
		const AssessmentIdDefault = null;


		/**
		 * Protected member variable that maps to the database column upward_results.performance
		 * @var integer intPerformance
		 */
		protected $intPerformance;
		const PerformanceDefault = null;


		/**
		 * Protected member variable that maps to the database column upward_results.importance
		 * @var integer intImportance
		 */
		protected $intImportance;
		const ImportanceDefault = null;


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
		 * in the database column upward_results.question_id.
		 *
		 * NOTE: Always use the Question property getter to correctly retrieve this UpwardQuestions object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var UpwardQuestions objQuestion
		 */
		protected $objQuestion;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column upward_results.assessment_id.
		 *
		 * NOTE: Always use the Assessment property getter to correctly retrieve this UpwardAssessment object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var UpwardAssessment objAssessment
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
		 * Load a UpwardResults from PK Info
		 * @param integer $intId
		 * @return UpwardResults
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return UpwardResults::QuerySingle(
				QQ::Equal(QQN::UpwardResults()->Id, $intId)
			);
		}

		/**
		 * Load all UpwardResultses
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return UpwardResults[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call UpwardResults::QueryArray to perform the LoadAll query
			try {
				return UpwardResults::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all UpwardResultses
		 * @return int
		 */
		public static function CountAll() {
			// Call UpwardResults::QueryCount to perform the CountAll query
			return UpwardResults::QueryCount(QQ::All());
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
			$objDatabase = UpwardResults::GetDatabase();

			// Create/Build out the QueryBuilder object with UpwardResults-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'upward_results');
			UpwardResults::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('upward_results');

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
		 * Static Qcodo Query method to query for a single UpwardResults object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return UpwardResults the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = UpwardResults::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new UpwardResults object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = UpwardResults::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return UpwardResults::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of UpwardResults objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return UpwardResults[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = UpwardResults::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return UpwardResults::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = UpwardResults::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of UpwardResults objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = UpwardResults::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = UpwardResults::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'upward_results_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with UpwardResults-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				UpwardResults::GetSelectFields($objQueryBuilder);
				UpwardResults::GetFromFields($objQueryBuilder);

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
			return UpwardResults::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this UpwardResults
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'upward_results';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'question_id', $strAliasPrefix . 'question_id');
			$objBuilder->AddSelectItem($strTableName, 'assessment_id', $strAliasPrefix . 'assessment_id');
			$objBuilder->AddSelectItem($strTableName, 'performance', $strAliasPrefix . 'performance');
			$objBuilder->AddSelectItem($strTableName, 'importance', $strAliasPrefix . 'importance');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a UpwardResults from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this UpwardResults::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return UpwardResults
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;


			// Create a new instance of the UpwardResults object
			$objToReturn = new UpwardResults();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'question_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'question_id'] : $strAliasPrefix . 'question_id';
			$objToReturn->intQuestionId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'assessment_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'assessment_id'] : $strAliasPrefix . 'assessment_id';
			$objToReturn->intAssessmentId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'performance', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'performance'] : $strAliasPrefix . 'performance';
			$objToReturn->intPerformance = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'importance', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'importance'] : $strAliasPrefix . 'importance';
			$objToReturn->intImportance = $objDbRow->GetColumn($strAliasName, 'Integer');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'upward_results__';

			// Check for Question Early Binding
			$strAlias = $strAliasPrefix . 'question_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objQuestion = UpwardQuestions::InstantiateDbRow($objDbRow, $strAliasPrefix . 'question_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for Assessment Early Binding
			$strAlias = $strAliasPrefix . 'assessment_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objAssessment = UpwardAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assessment_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			return $objToReturn;
		}

		/**
		 * Instantiate an array of UpwardResultses from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return UpwardResults[]
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
					$objItem = UpwardResults::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = UpwardResults::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single UpwardResults object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return UpwardResults next row resulting from the query
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
			return UpwardResults::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single UpwardResults object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return UpwardResults
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return UpwardResults::QuerySingle(
				QQ::Equal(QQN::UpwardResults()->Id, $intId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of UpwardResults objects,
		 * by QuestionId Index(es)
		 * @param integer $intQuestionId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return UpwardResults[]
		*/
		public static function LoadArrayByQuestionId($intQuestionId, $objOptionalClauses = null) {
			// Call UpwardResults::QueryArray to perform the LoadArrayByQuestionId query
			try {
				return UpwardResults::QueryArray(
					QQ::Equal(QQN::UpwardResults()->QuestionId, $intQuestionId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count UpwardResultses
		 * by QuestionId Index(es)
		 * @param integer $intQuestionId
		 * @return int
		*/
		public static function CountByQuestionId($intQuestionId, $objOptionalClauses = null) {
			// Call UpwardResults::QueryCount to perform the CountByQuestionId query
			return UpwardResults::QueryCount(
				QQ::Equal(QQN::UpwardResults()->QuestionId, $intQuestionId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of UpwardResults objects,
		 * by AssessmentId Index(es)
		 * @param integer $intAssessmentId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return UpwardResults[]
		*/
		public static function LoadArrayByAssessmentId($intAssessmentId, $objOptionalClauses = null) {
			// Call UpwardResults::QueryArray to perform the LoadArrayByAssessmentId query
			try {
				return UpwardResults::QueryArray(
					QQ::Equal(QQN::UpwardResults()->AssessmentId, $intAssessmentId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count UpwardResultses
		 * by AssessmentId Index(es)
		 * @param integer $intAssessmentId
		 * @return int
		*/
		public static function CountByAssessmentId($intAssessmentId, $objOptionalClauses = null) {
			// Call UpwardResults::QueryCount to perform the CountByAssessmentId query
			return UpwardResults::QueryCount(
				QQ::Equal(QQN::UpwardResults()->AssessmentId, $intAssessmentId)
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
		 * Save this UpwardResults
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = UpwardResults::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `upward_results` (
							`question_id`,
							`assessment_id`,
							`performance`,
							`importance`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intQuestionId) . ',
							' . $objDatabase->SqlVariable($this->intAssessmentId) . ',
							' . $objDatabase->SqlVariable($this->intPerformance) . ',
							' . $objDatabase->SqlVariable($this->intImportance) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('upward_results', 'id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`upward_results`
						SET
							`question_id` = ' . $objDatabase->SqlVariable($this->intQuestionId) . ',
							`assessment_id` = ' . $objDatabase->SqlVariable($this->intAssessmentId) . ',
							`performance` = ' . $objDatabase->SqlVariable($this->intPerformance) . ',
							`importance` = ' . $objDatabase->SqlVariable($this->intImportance) . '
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
		 * Delete this UpwardResults
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this UpwardResults with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = UpwardResults::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`upward_results`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all UpwardResultses
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = UpwardResults::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`upward_results`');
		}

		/**
		 * Truncate upward_results table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = UpwardResults::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `upward_results`');
		}

		/**
		 * Reload this UpwardResults from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved UpwardResults object.');

			// Reload the Object
			$objReloaded = UpwardResults::Load($this->intId);

			// Update $this's local variables to match
			$this->QuestionId = $objReloaded->QuestionId;
			$this->AssessmentId = $objReloaded->AssessmentId;
			$this->intPerformance = $objReloaded->intPerformance;
			$this->intImportance = $objReloaded->intImportance;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = UpwardResults::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `upward_results` (
					`id`,
					`question_id`,
					`assessment_id`,
					`performance`,
					`importance`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->intQuestionId) . ',
					' . $objDatabase->SqlVariable($this->intAssessmentId) . ',
					' . $objDatabase->SqlVariable($this->intPerformance) . ',
					' . $objDatabase->SqlVariable($this->intImportance) . ',
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
		 * @return UpwardResults[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = UpwardResults::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM upward_results WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return UpwardResults::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return UpwardResults[]
		 */
		public function GetJournal() {
			return UpwardResults::GetJournalForId($this->intId);
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

				case 'Performance':
					// Gets the value for intPerformance 
					// @return integer
					return $this->intPerformance;

				case 'Importance':
					// Gets the value for intImportance 
					// @return integer
					return $this->intImportance;


				///////////////////
				// Member Objects
				///////////////////
				case 'Question':
					// Gets the value for the UpwardQuestions object referenced by intQuestionId 
					// @return UpwardQuestions
					try {
						if ((!$this->objQuestion) && (!is_null($this->intQuestionId)))
							$this->objQuestion = UpwardQuestions::Load($this->intQuestionId);
						return $this->objQuestion;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Assessment':
					// Gets the value for the UpwardAssessment object referenced by intAssessmentId 
					// @return UpwardAssessment
					try {
						if ((!$this->objAssessment) && (!is_null($this->intAssessmentId)))
							$this->objAssessment = UpwardAssessment::Load($this->intAssessmentId);
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

				case 'Performance':
					// Sets the value for intPerformance 
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intPerformance = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Importance':
					// Sets the value for intImportance 
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intImportance = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Question':
					// Sets the value for the UpwardQuestions object referenced by intQuestionId 
					// @param UpwardQuestions $mixValue
					// @return UpwardQuestions
					if (is_null($mixValue)) {
						$this->intQuestionId = null;
						$this->objQuestion = null;
						return null;
					} else {
						// Make sure $mixValue actually is a UpwardQuestions object
						try {
							$mixValue = QType::Cast($mixValue, 'UpwardQuestions');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED UpwardQuestions object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Question for this UpwardResults');

						// Update Local Member Variables
						$this->objQuestion = $mixValue;
						$this->intQuestionId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Assessment':
					// Sets the value for the UpwardAssessment object referenced by intAssessmentId 
					// @param UpwardAssessment $mixValue
					// @return UpwardAssessment
					if (is_null($mixValue)) {
						$this->intAssessmentId = null;
						$this->objAssessment = null;
						return null;
					} else {
						// Make sure $mixValue actually is a UpwardAssessment object
						try {
							$mixValue = QType::Cast($mixValue, 'UpwardAssessment');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED UpwardAssessment object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Assessment for this UpwardResults');

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
			$strToReturn = '<complexType name="UpwardResults"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Question" type="xsd1:UpwardQuestions"/>';
			$strToReturn .= '<element name="Assessment" type="xsd1:UpwardAssessment"/>';
			$strToReturn .= '<element name="Performance" type="xsd:int"/>';
			$strToReturn .= '<element name="Importance" type="xsd:int"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('UpwardResults', $strComplexTypeArray)) {
				$strComplexTypeArray['UpwardResults'] = UpwardResults::GetSoapComplexTypeXml();
				UpwardQuestions::AlterSoapComplexTypeArray($strComplexTypeArray);
				UpwardAssessment::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, UpwardResults::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new UpwardResults();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'Question')) &&
				($objSoapObject->Question))
				$objToReturn->Question = UpwardQuestions::GetObjectFromSoapObject($objSoapObject->Question);
			if ((property_exists($objSoapObject, 'Assessment')) &&
				($objSoapObject->Assessment))
				$objToReturn->Assessment = UpwardAssessment::GetObjectFromSoapObject($objSoapObject->Assessment);
			if (property_exists($objSoapObject, 'Performance'))
				$objToReturn->intPerformance = $objSoapObject->Performance;
			if (property_exists($objSoapObject, 'Importance'))
				$objToReturn->intImportance = $objSoapObject->Importance;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, UpwardResults::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objQuestion)
				$objObject->objQuestion = UpwardQuestions::GetSoapObjectFromObject($objObject->objQuestion, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intQuestionId = null;
			if ($objObject->objAssessment)
				$objObject->objAssessment = UpwardAssessment::GetSoapObjectFromObject($objObject->objAssessment, false);
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
	 * @property-read QQNodeUpwardQuestions $Question
	 * @property-read QQNode $AssessmentId
	 * @property-read QQNodeUpwardAssessment $Assessment
	 * @property-read QQNode $Performance
	 * @property-read QQNode $Importance
	 */
	class QQNodeUpwardResults extends QQNode {
		protected $strTableName = 'upward_results';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'UpwardResults';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'QuestionId':
					return new QQNode('question_id', 'QuestionId', 'integer', $this);
				case 'Question':
					return new QQNodeUpwardQuestions('question_id', 'Question', 'integer', $this);
				case 'AssessmentId':
					return new QQNode('assessment_id', 'AssessmentId', 'integer', $this);
				case 'Assessment':
					return new QQNodeUpwardAssessment('assessment_id', 'Assessment', 'integer', $this);
				case 'Performance':
					return new QQNode('performance', 'Performance', 'integer', $this);
				case 'Importance':
					return new QQNode('importance', 'Importance', 'integer', $this);

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
	 * @property-read QQNodeUpwardQuestions $Question
	 * @property-read QQNode $AssessmentId
	 * @property-read QQNodeUpwardAssessment $Assessment
	 * @property-read QQNode $Performance
	 * @property-read QQNode $Importance
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeUpwardResults extends QQReverseReferenceNode {
		protected $strTableName = 'upward_results';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'UpwardResults';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'QuestionId':
					return new QQNode('question_id', 'QuestionId', 'integer', $this);
				case 'Question':
					return new QQNodeUpwardQuestions('question_id', 'Question', 'integer', $this);
				case 'AssessmentId':
					return new QQNode('assessment_id', 'AssessmentId', 'integer', $this);
				case 'Assessment':
					return new QQNodeUpwardAssessment('assessment_id', 'Assessment', 'integer', $this);
				case 'Performance':
					return new QQNode('performance', 'Performance', 'integer', $this);
				case 'Importance':
					return new QQNode('importance', 'Importance', 'integer', $this);

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