<?php
	/**
	 * The abstract LemonAssessmentFrenchQuestionsGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the LemonAssessmentFrenchQuestions subclass which
	 * extends this LemonAssessmentFrenchQuestionsGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the LemonAssessmentFrenchQuestions class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $Count the value for intCount 
	 * @property string $Text the value for strText 
	 * @property integer $LemonTypeId the value for intLemonTypeId 
	 * @property boolean $Inverse the value for blnInverse 
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property LemonAssessmentResults $IdObject the value for the LemonAssessmentResults object referenced by intId (Read-Only PK)
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class LemonAssessmentFrenchQuestionsGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database column lemon_assessment_french_questions.count
		 * @var integer intCount
		 */
		protected $intCount;
		const CountDefault = null;


		/**
		 * Protected member variable that maps to the database column lemon_assessment_french_questions.text
		 * @var string strText
		 */
		protected $strText;
		const TextMaxLength = 514;
		const TextDefault = null;


		/**
		 * Protected member variable that maps to the database column lemon_assessment_french_questions.lemon_type_id
		 * @var integer intLemonTypeId
		 */
		protected $intLemonTypeId;
		const LemonTypeIdDefault = null;


		/**
		 * Protected member variable that maps to the database column lemon_assessment_french_questions.inverse
		 * @var boolean blnInverse
		 */
		protected $blnInverse;
		const InverseDefault = null;


		/**
		 * Protected member variable that maps to the database PK Identity column lemon_assessment_french_questions.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


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
		 * in the database column lemon_assessment_french_questions.id.
		 *
		 * NOTE: Always use the IdObject property getter to correctly retrieve this LemonAssessmentResults object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var LemonAssessmentResults objIdObject
		 */
		protected $objIdObject;





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
		 * Load a LemonAssessmentFrenchQuestions from PK Info
		 * @param integer $intId
		 * @return LemonAssessmentFrenchQuestions
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return LemonAssessmentFrenchQuestions::QuerySingle(
				QQ::Equal(QQN::LemonAssessmentFrenchQuestions()->Id, $intId)
			);
		}

		/**
		 * Load all LemonAssessmentFrenchQuestionses
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return LemonAssessmentFrenchQuestions[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call LemonAssessmentFrenchQuestions::QueryArray to perform the LoadAll query
			try {
				return LemonAssessmentFrenchQuestions::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all LemonAssessmentFrenchQuestionses
		 * @return int
		 */
		public static function CountAll() {
			// Call LemonAssessmentFrenchQuestions::QueryCount to perform the CountAll query
			return LemonAssessmentFrenchQuestions::QueryCount(QQ::All());
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
			$objDatabase = LemonAssessmentFrenchQuestions::GetDatabase();

			// Create/Build out the QueryBuilder object with LemonAssessmentFrenchQuestions-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'lemon_assessment_french_questions');
			LemonAssessmentFrenchQuestions::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('lemon_assessment_french_questions');

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
		 * Static Qcodo Query method to query for a single LemonAssessmentFrenchQuestions object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return LemonAssessmentFrenchQuestions the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = LemonAssessmentFrenchQuestions::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new LemonAssessmentFrenchQuestions object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = LemonAssessmentFrenchQuestions::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return LemonAssessmentFrenchQuestions::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of LemonAssessmentFrenchQuestions objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return LemonAssessmentFrenchQuestions[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = LemonAssessmentFrenchQuestions::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return LemonAssessmentFrenchQuestions::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = LemonAssessmentFrenchQuestions::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of LemonAssessmentFrenchQuestions objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = LemonAssessmentFrenchQuestions::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = LemonAssessmentFrenchQuestions::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'lemon_assessment_french_questions_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with LemonAssessmentFrenchQuestions-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				LemonAssessmentFrenchQuestions::GetSelectFields($objQueryBuilder);
				LemonAssessmentFrenchQuestions::GetFromFields($objQueryBuilder);

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
			return LemonAssessmentFrenchQuestions::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this LemonAssessmentFrenchQuestions
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'lemon_assessment_french_questions';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'count', $strAliasPrefix . 'count');
			$objBuilder->AddSelectItem($strTableName, 'text', $strAliasPrefix . 'text');
			$objBuilder->AddSelectItem($strTableName, 'lemon_type_id', $strAliasPrefix . 'lemon_type_id');
			$objBuilder->AddSelectItem($strTableName, 'inverse', $strAliasPrefix . 'inverse');
			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a LemonAssessmentFrenchQuestions from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this LemonAssessmentFrenchQuestions::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return LemonAssessmentFrenchQuestions
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;


			// Create a new instance of the LemonAssessmentFrenchQuestions object
			$objToReturn = new LemonAssessmentFrenchQuestions();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'count', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'count'] : $strAliasPrefix . 'count';
			$objToReturn->intCount = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'text', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'text'] : $strAliasPrefix . 'text';
			$objToReturn->strText = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'lemon_type_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'lemon_type_id'] : $strAliasPrefix . 'lemon_type_id';
			$objToReturn->intLemonTypeId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'inverse', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'inverse'] : $strAliasPrefix . 'inverse';
			$objToReturn->blnInverse = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'lemon_assessment_french_questions__';

			// Check for IdObject Early Binding
			$strAlias = $strAliasPrefix . 'id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objIdObject = LemonAssessmentResults::InstantiateDbRow($objDbRow, $strAliasPrefix . 'id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			return $objToReturn;
		}

		/**
		 * Instantiate an array of LemonAssessmentFrenchQuestionses from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return LemonAssessmentFrenchQuestions[]
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
					$objItem = LemonAssessmentFrenchQuestions::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = LemonAssessmentFrenchQuestions::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single LemonAssessmentFrenchQuestions object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return LemonAssessmentFrenchQuestions next row resulting from the query
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
			return LemonAssessmentFrenchQuestions::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single LemonAssessmentFrenchQuestions object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return LemonAssessmentFrenchQuestions
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return LemonAssessmentFrenchQuestions::QuerySingle(
				QQ::Equal(QQN::LemonAssessmentFrenchQuestions()->Id, $intId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of LemonAssessmentFrenchQuestions objects,
		 * by LemonTypeId Index(es)
		 * @param integer $intLemonTypeId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return LemonAssessmentFrenchQuestions[]
		*/
		public static function LoadArrayByLemonTypeId($intLemonTypeId, $objOptionalClauses = null) {
			// Call LemonAssessmentFrenchQuestions::QueryArray to perform the LoadArrayByLemonTypeId query
			try {
				return LemonAssessmentFrenchQuestions::QueryArray(
					QQ::Equal(QQN::LemonAssessmentFrenchQuestions()->LemonTypeId, $intLemonTypeId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count LemonAssessmentFrenchQuestionses
		 * by LemonTypeId Index(es)
		 * @param integer $intLemonTypeId
		 * @return int
		*/
		public static function CountByLemonTypeId($intLemonTypeId, $objOptionalClauses = null) {
			// Call LemonAssessmentFrenchQuestions::QueryCount to perform the CountByLemonTypeId query
			return LemonAssessmentFrenchQuestions::QueryCount(
				QQ::Equal(QQN::LemonAssessmentFrenchQuestions()->LemonTypeId, $intLemonTypeId)
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
		 * Save this LemonAssessmentFrenchQuestions
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = LemonAssessmentFrenchQuestions::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `lemon_assessment_french_questions` (
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
					$mixToReturn = $this->intId = $objDatabase->InsertId('lemon_assessment_french_questions', 'id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`lemon_assessment_french_questions`
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
		 * Delete this LemonAssessmentFrenchQuestions
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this LemonAssessmentFrenchQuestions with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = LemonAssessmentFrenchQuestions::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`lemon_assessment_french_questions`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all LemonAssessmentFrenchQuestionses
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = LemonAssessmentFrenchQuestions::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`lemon_assessment_french_questions`');
		}

		/**
		 * Truncate lemon_assessment_french_questions table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = LemonAssessmentFrenchQuestions::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `lemon_assessment_french_questions`');
		}

		/**
		 * Reload this LemonAssessmentFrenchQuestions from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved LemonAssessmentFrenchQuestions object.');

			// Reload the Object
			$objReloaded = LemonAssessmentFrenchQuestions::Load($this->intId);

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
			$objDatabase = LemonAssessmentFrenchQuestions::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `lemon_assessment_french_questions` (
					`count`,
					`text`,
					`lemon_type_id`,
					`inverse`,
					`id`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intCount) . ',
					' . $objDatabase->SqlVariable($this->strText) . ',
					' . $objDatabase->SqlVariable($this->intLemonTypeId) . ',
					' . $objDatabase->SqlVariable($this->blnInverse) . ',
					' . $objDatabase->SqlVariable($this->intId) . ',
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
		 * @return LemonAssessmentFrenchQuestions[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = LemonAssessmentFrenchQuestions::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM lemon_assessment_french_questions WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return LemonAssessmentFrenchQuestions::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return LemonAssessmentFrenchQuestions[]
		 */
		public function GetJournal() {
			return LemonAssessmentFrenchQuestions::GetJournalForId($this->intId);
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
				case 'Count':
					// Gets the value for intCount 
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

				case 'Id':
					// Gets the value for intId (Read-Only PK)
					// @return integer
					return $this->intId;


				///////////////////
				// Member Objects
				///////////////////
				case 'IdObject':
					// Gets the value for the LemonAssessmentResults object referenced by intId (Read-Only PK)
					// @return LemonAssessmentResults
					try {
						if ((!$this->objIdObject) && (!is_null($this->intId)))
							$this->objIdObject = LemonAssessmentResults::Load($this->intId);
						return $this->objIdObject;
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
				case 'IdObject':
					// Sets the value for the LemonAssessmentResults object referenced by intId (Read-Only PK)
					// @param LemonAssessmentResults $mixValue
					// @return LemonAssessmentResults
					if (is_null($mixValue)) {
						$this->intId = null;
						$this->objIdObject = null;
						return null;
					} else {
						// Make sure $mixValue actually is a LemonAssessmentResults object
						try {
							$mixValue = QType::Cast($mixValue, 'LemonAssessmentResults');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED LemonAssessmentResults object
						if (is_null($mixValue->QuestionId))
							throw new QCallerException('Unable to set an unsaved IdObject for this LemonAssessmentFrenchQuestions');

						// Update Local Member Variables
						$this->objIdObject = $mixValue;
						$this->intId = $mixValue->QuestionId;

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
			$strToReturn = '<complexType name="LemonAssessmentFrenchQuestions"><sequence>';
			$strToReturn .= '<element name="Count" type="xsd:int"/>';
			$strToReturn .= '<element name="Text" type="xsd:string"/>';
			$strToReturn .= '<element name="LemonTypeId" type="xsd:int"/>';
			$strToReturn .= '<element name="Inverse" type="xsd:boolean"/>';
			$strToReturn .= '<element name="IdObject" type="xsd1:LemonAssessmentResults"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('LemonAssessmentFrenchQuestions', $strComplexTypeArray)) {
				$strComplexTypeArray['LemonAssessmentFrenchQuestions'] = LemonAssessmentFrenchQuestions::GetSoapComplexTypeXml();
				LemonAssessmentResults::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, LemonAssessmentFrenchQuestions::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new LemonAssessmentFrenchQuestions();
			if (property_exists($objSoapObject, 'Count'))
				$objToReturn->intCount = $objSoapObject->Count;
			if (property_exists($objSoapObject, 'Text'))
				$objToReturn->strText = $objSoapObject->Text;
			if (property_exists($objSoapObject, 'LemonTypeId'))
				$objToReturn->intLemonTypeId = $objSoapObject->LemonTypeId;
			if (property_exists($objSoapObject, 'Inverse'))
				$objToReturn->blnInverse = $objSoapObject->Inverse;
			if ((property_exists($objSoapObject, 'IdObject')) &&
				($objSoapObject->IdObject))
				$objToReturn->IdObject = LemonAssessmentResults::GetObjectFromSoapObject($objSoapObject->IdObject);
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, LemonAssessmentFrenchQuestions::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objIdObject)
				$objObject->objIdObject = LemonAssessmentResults::GetSoapObjectFromObject($objObject->objIdObject, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intId = null;
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $Count
	 * @property-read QQNode $Text
	 * @property-read QQNode $LemonTypeId
	 * @property-read QQNode $Inverse
	 * @property-read QQNode $Id
	 * @property-read QQNodeLemonAssessmentResults $IdObject
	 */
	class QQNodeLemonAssessmentFrenchQuestions extends QQNode {
		protected $strTableName = 'lemon_assessment_french_questions';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'LemonAssessmentFrenchQuestions';
		public function __get($strName) {
			switch ($strName) {
				case 'Count':
					return new QQNode('count', 'Count', 'integer', $this);
				case 'Text':
					return new QQNode('text', 'Text', 'string', $this);
				case 'LemonTypeId':
					return new QQNode('lemon_type_id', 'LemonTypeId', 'integer', $this);
				case 'Inverse':
					return new QQNode('inverse', 'Inverse', 'boolean', $this);
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'IdObject':
					return new QQNodeLemonAssessmentResults('id', 'IdObject', 'integer', $this);

				case '_PrimaryKeyNode':
					return new QQNodeLemonAssessmentResults('id', 'Id', 'integer', $this);
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
	 * @property-read QQNode $Count
	 * @property-read QQNode $Text
	 * @property-read QQNode $LemonTypeId
	 * @property-read QQNode $Inverse
	 * @property-read QQNode $Id
	 * @property-read QQNodeLemonAssessmentResults $IdObject
	 * @property-read QQNodeLemonAssessmentResults $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeLemonAssessmentFrenchQuestions extends QQReverseReferenceNode {
		protected $strTableName = 'lemon_assessment_french_questions';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'LemonAssessmentFrenchQuestions';
		public function __get($strName) {
			switch ($strName) {
				case 'Count':
					return new QQNode('count', 'Count', 'integer', $this);
				case 'Text':
					return new QQNode('text', 'Text', 'string', $this);
				case 'LemonTypeId':
					return new QQNode('lemon_type_id', 'LemonTypeId', 'integer', $this);
				case 'Inverse':
					return new QQNode('inverse', 'Inverse', 'boolean', $this);
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'IdObject':
					return new QQNodeLemonAssessmentResults('id', 'IdObject', 'integer', $this);

				case '_PrimaryKeyNode':
					return new QQNodeLemonAssessmentResults('id', 'Id', 'integer', $this);
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