<?php
	/**
	 * The abstract TimeResultsGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the TimeResults subclass which
	 * extends this TimeResultsGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the TimeResults class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property integer $AssessmentId the value for intAssessmentId 
	 * @property integer $Time the value for intTime 
	 * @property string $Activity the value for strActivity 
	 * @property boolean $Career the value for blnCareer 
	 * @property boolean $Calling the value for blnCalling 
	 * @property boolean $Community the value for blnCommunity 
	 * @property boolean $Creativity the value for blnCreativity 
	 * @property boolean $Margin the value for blnMargin 
	 * @property TimeAssessment $Assessment the value for the TimeAssessment object referenced by intAssessmentId 
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class TimeResultsGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column time_results.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column time_results.assessment_id
		 * @var integer intAssessmentId
		 */
		protected $intAssessmentId;
		const AssessmentIdDefault = null;


		/**
		 * Protected member variable that maps to the database column time_results.time
		 * @var integer intTime
		 */
		protected $intTime;
		const TimeDefault = null;


		/**
		 * Protected member variable that maps to the database column time_results.activity
		 * @var string strActivity
		 */
		protected $strActivity;
		const ActivityMaxLength = 514;
		const ActivityDefault = null;


		/**
		 * Protected member variable that maps to the database column time_results.career
		 * @var boolean blnCareer
		 */
		protected $blnCareer;
		const CareerDefault = null;


		/**
		 * Protected member variable that maps to the database column time_results.calling
		 * @var boolean blnCalling
		 */
		protected $blnCalling;
		const CallingDefault = null;


		/**
		 * Protected member variable that maps to the database column time_results.community
		 * @var boolean blnCommunity
		 */
		protected $blnCommunity;
		const CommunityDefault = null;


		/**
		 * Protected member variable that maps to the database column time_results.creativity
		 * @var boolean blnCreativity
		 */
		protected $blnCreativity;
		const CreativityDefault = null;


		/**
		 * Protected member variable that maps to the database column time_results.margin
		 * @var boolean blnMargin
		 */
		protected $blnMargin;
		const MarginDefault = null;


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
		 * in the database column time_results.assessment_id.
		 *
		 * NOTE: Always use the Assessment property getter to correctly retrieve this TimeAssessment object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var TimeAssessment objAssessment
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
		 * Load a TimeResults from PK Info
		 * @param integer $intId
		 * @return TimeResults
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return TimeResults::QuerySingle(
				QQ::Equal(QQN::TimeResults()->Id, $intId)
			);
		}

		/**
		 * Load all TimeResultses
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return TimeResults[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call TimeResults::QueryArray to perform the LoadAll query
			try {
				return TimeResults::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all TimeResultses
		 * @return int
		 */
		public static function CountAll() {
			// Call TimeResults::QueryCount to perform the CountAll query
			return TimeResults::QueryCount(QQ::All());
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
			$objDatabase = TimeResults::GetDatabase();

			// Create/Build out the QueryBuilder object with TimeResults-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'time_results');
			TimeResults::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('time_results');

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
		 * Static Qcodo Query method to query for a single TimeResults object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return TimeResults the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = TimeResults::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new TimeResults object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = TimeResults::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return TimeResults::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of TimeResults objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return TimeResults[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = TimeResults::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return TimeResults::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = TimeResults::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of TimeResults objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = TimeResults::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = TimeResults::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'time_results_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with TimeResults-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				TimeResults::GetSelectFields($objQueryBuilder);
				TimeResults::GetFromFields($objQueryBuilder);

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
			return TimeResults::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this TimeResults
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'time_results';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'assessment_id', $strAliasPrefix . 'assessment_id');
			$objBuilder->AddSelectItem($strTableName, 'time', $strAliasPrefix . 'time');
			$objBuilder->AddSelectItem($strTableName, 'activity', $strAliasPrefix . 'activity');
			$objBuilder->AddSelectItem($strTableName, 'career', $strAliasPrefix . 'career');
			$objBuilder->AddSelectItem($strTableName, 'calling', $strAliasPrefix . 'calling');
			$objBuilder->AddSelectItem($strTableName, 'community', $strAliasPrefix . 'community');
			$objBuilder->AddSelectItem($strTableName, 'creativity', $strAliasPrefix . 'creativity');
			$objBuilder->AddSelectItem($strTableName, 'margin', $strAliasPrefix . 'margin');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a TimeResults from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this TimeResults::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return TimeResults
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;


			// Create a new instance of the TimeResults object
			$objToReturn = new TimeResults();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'assessment_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'assessment_id'] : $strAliasPrefix . 'assessment_id';
			$objToReturn->intAssessmentId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'time', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'time'] : $strAliasPrefix . 'time';
			$objToReturn->intTime = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'activity', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'activity'] : $strAliasPrefix . 'activity';
			$objToReturn->strActivity = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'career', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'career'] : $strAliasPrefix . 'career';
			$objToReturn->blnCareer = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'calling', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'calling'] : $strAliasPrefix . 'calling';
			$objToReturn->blnCalling = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'community', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'community'] : $strAliasPrefix . 'community';
			$objToReturn->blnCommunity = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'creativity', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'creativity'] : $strAliasPrefix . 'creativity';
			$objToReturn->blnCreativity = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'margin', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'margin'] : $strAliasPrefix . 'margin';
			$objToReturn->blnMargin = $objDbRow->GetColumn($strAliasName, 'Bit');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'time_results__';

			// Check for Assessment Early Binding
			$strAlias = $strAliasPrefix . 'assessment_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objAssessment = TimeAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'assessment_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			return $objToReturn;
		}

		/**
		 * Instantiate an array of TimeResultses from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return TimeResults[]
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
					$objItem = TimeResults::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = TimeResults::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single TimeResults object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return TimeResults next row resulting from the query
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
			return TimeResults::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single TimeResults object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return TimeResults
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return TimeResults::QuerySingle(
				QQ::Equal(QQN::TimeResults()->Id, $intId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of TimeResults objects,
		 * by AssessmentId Index(es)
		 * @param integer $intAssessmentId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return TimeResults[]
		*/
		public static function LoadArrayByAssessmentId($intAssessmentId, $objOptionalClauses = null) {
			// Call TimeResults::QueryArray to perform the LoadArrayByAssessmentId query
			try {
				return TimeResults::QueryArray(
					QQ::Equal(QQN::TimeResults()->AssessmentId, $intAssessmentId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count TimeResultses
		 * by AssessmentId Index(es)
		 * @param integer $intAssessmentId
		 * @return int
		*/
		public static function CountByAssessmentId($intAssessmentId, $objOptionalClauses = null) {
			// Call TimeResults::QueryCount to perform the CountByAssessmentId query
			return TimeResults::QueryCount(
				QQ::Equal(QQN::TimeResults()->AssessmentId, $intAssessmentId)
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
		 * Save this TimeResults
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = TimeResults::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `time_results` (
							`assessment_id`,
							`time`,
							`activity`,
							`career`,
							`calling`,
							`community`,
							`creativity`,
							`margin`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intAssessmentId) . ',
							' . $objDatabase->SqlVariable($this->intTime) . ',
							' . $objDatabase->SqlVariable($this->strActivity) . ',
							' . $objDatabase->SqlVariable($this->blnCareer) . ',
							' . $objDatabase->SqlVariable($this->blnCalling) . ',
							' . $objDatabase->SqlVariable($this->blnCommunity) . ',
							' . $objDatabase->SqlVariable($this->blnCreativity) . ',
							' . $objDatabase->SqlVariable($this->blnMargin) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('time_results', 'id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`time_results`
						SET
							`assessment_id` = ' . $objDatabase->SqlVariable($this->intAssessmentId) . ',
							`time` = ' . $objDatabase->SqlVariable($this->intTime) . ',
							`activity` = ' . $objDatabase->SqlVariable($this->strActivity) . ',
							`career` = ' . $objDatabase->SqlVariable($this->blnCareer) . ',
							`calling` = ' . $objDatabase->SqlVariable($this->blnCalling) . ',
							`community` = ' . $objDatabase->SqlVariable($this->blnCommunity) . ',
							`creativity` = ' . $objDatabase->SqlVariable($this->blnCreativity) . ',
							`margin` = ' . $objDatabase->SqlVariable($this->blnMargin) . '
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
		 * Delete this TimeResults
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this TimeResults with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = TimeResults::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`time_results`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all TimeResultses
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = TimeResults::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`time_results`');
		}

		/**
		 * Truncate time_results table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = TimeResults::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `time_results`');
		}

		/**
		 * Reload this TimeResults from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved TimeResults object.');

			// Reload the Object
			$objReloaded = TimeResults::Load($this->intId);

			// Update $this's local variables to match
			$this->AssessmentId = $objReloaded->AssessmentId;
			$this->intTime = $objReloaded->intTime;
			$this->strActivity = $objReloaded->strActivity;
			$this->blnCareer = $objReloaded->blnCareer;
			$this->blnCalling = $objReloaded->blnCalling;
			$this->blnCommunity = $objReloaded->blnCommunity;
			$this->blnCreativity = $objReloaded->blnCreativity;
			$this->blnMargin = $objReloaded->blnMargin;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = TimeResults::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `time_results` (
					`id`,
					`assessment_id`,
					`time`,
					`activity`,
					`career`,
					`calling`,
					`community`,
					`creativity`,
					`margin`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->intAssessmentId) . ',
					' . $objDatabase->SqlVariable($this->intTime) . ',
					' . $objDatabase->SqlVariable($this->strActivity) . ',
					' . $objDatabase->SqlVariable($this->blnCareer) . ',
					' . $objDatabase->SqlVariable($this->blnCalling) . ',
					' . $objDatabase->SqlVariable($this->blnCommunity) . ',
					' . $objDatabase->SqlVariable($this->blnCreativity) . ',
					' . $objDatabase->SqlVariable($this->blnMargin) . ',
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
		 * @return TimeResults[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = TimeResults::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM time_results WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return TimeResults::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return TimeResults[]
		 */
		public function GetJournal() {
			return TimeResults::GetJournalForId($this->intId);
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

				case 'AssessmentId':
					// Gets the value for intAssessmentId 
					// @return integer
					return $this->intAssessmentId;

				case 'Time':
					// Gets the value for intTime 
					// @return integer
					return $this->intTime;

				case 'Activity':
					// Gets the value for strActivity 
					// @return string
					return $this->strActivity;

				case 'Career':
					// Gets the value for blnCareer 
					// @return boolean
					return $this->blnCareer;

				case 'Calling':
					// Gets the value for blnCalling 
					// @return boolean
					return $this->blnCalling;

				case 'Community':
					// Gets the value for blnCommunity 
					// @return boolean
					return $this->blnCommunity;

				case 'Creativity':
					// Gets the value for blnCreativity 
					// @return boolean
					return $this->blnCreativity;

				case 'Margin':
					// Gets the value for blnMargin 
					// @return boolean
					return $this->blnMargin;


				///////////////////
				// Member Objects
				///////////////////
				case 'Assessment':
					// Gets the value for the TimeAssessment object referenced by intAssessmentId 
					// @return TimeAssessment
					try {
						if ((!$this->objAssessment) && (!is_null($this->intAssessmentId)))
							$this->objAssessment = TimeAssessment::Load($this->intAssessmentId);
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

				case 'Time':
					// Sets the value for intTime 
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intTime = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Activity':
					// Sets the value for strActivity 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strActivity = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Career':
					// Sets the value for blnCareer 
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnCareer = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Calling':
					// Sets the value for blnCalling 
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnCalling = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Community':
					// Sets the value for blnCommunity 
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnCommunity = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Creativity':
					// Sets the value for blnCreativity 
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnCreativity = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Margin':
					// Sets the value for blnMargin 
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnMargin = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Assessment':
					// Sets the value for the TimeAssessment object referenced by intAssessmentId 
					// @param TimeAssessment $mixValue
					// @return TimeAssessment
					if (is_null($mixValue)) {
						$this->intAssessmentId = null;
						$this->objAssessment = null;
						return null;
					} else {
						// Make sure $mixValue actually is a TimeAssessment object
						try {
							$mixValue = QType::Cast($mixValue, 'TimeAssessment');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED TimeAssessment object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Assessment for this TimeResults');

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
			$strToReturn = '<complexType name="TimeResults"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Assessment" type="xsd1:TimeAssessment"/>';
			$strToReturn .= '<element name="Time" type="xsd:int"/>';
			$strToReturn .= '<element name="Activity" type="xsd:string"/>';
			$strToReturn .= '<element name="Career" type="xsd:boolean"/>';
			$strToReturn .= '<element name="Calling" type="xsd:boolean"/>';
			$strToReturn .= '<element name="Community" type="xsd:boolean"/>';
			$strToReturn .= '<element name="Creativity" type="xsd:boolean"/>';
			$strToReturn .= '<element name="Margin" type="xsd:boolean"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('TimeResults', $strComplexTypeArray)) {
				$strComplexTypeArray['TimeResults'] = TimeResults::GetSoapComplexTypeXml();
				TimeAssessment::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, TimeResults::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new TimeResults();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'Assessment')) &&
				($objSoapObject->Assessment))
				$objToReturn->Assessment = TimeAssessment::GetObjectFromSoapObject($objSoapObject->Assessment);
			if (property_exists($objSoapObject, 'Time'))
				$objToReturn->intTime = $objSoapObject->Time;
			if (property_exists($objSoapObject, 'Activity'))
				$objToReturn->strActivity = $objSoapObject->Activity;
			if (property_exists($objSoapObject, 'Career'))
				$objToReturn->blnCareer = $objSoapObject->Career;
			if (property_exists($objSoapObject, 'Calling'))
				$objToReturn->blnCalling = $objSoapObject->Calling;
			if (property_exists($objSoapObject, 'Community'))
				$objToReturn->blnCommunity = $objSoapObject->Community;
			if (property_exists($objSoapObject, 'Creativity'))
				$objToReturn->blnCreativity = $objSoapObject->Creativity;
			if (property_exists($objSoapObject, 'Margin'))
				$objToReturn->blnMargin = $objSoapObject->Margin;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, TimeResults::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objAssessment)
				$objObject->objAssessment = TimeAssessment::GetSoapObjectFromObject($objObject->objAssessment, false);
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
	 * @property-read QQNode $AssessmentId
	 * @property-read QQNodeTimeAssessment $Assessment
	 * @property-read QQNode $Time
	 * @property-read QQNode $Activity
	 * @property-read QQNode $Career
	 * @property-read QQNode $Calling
	 * @property-read QQNode $Community
	 * @property-read QQNode $Creativity
	 * @property-read QQNode $Margin
	 */
	class QQNodeTimeResults extends QQNode {
		protected $strTableName = 'time_results';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'TimeResults';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'AssessmentId':
					return new QQNode('assessment_id', 'AssessmentId', 'integer', $this);
				case 'Assessment':
					return new QQNodeTimeAssessment('assessment_id', 'Assessment', 'integer', $this);
				case 'Time':
					return new QQNode('time', 'Time', 'integer', $this);
				case 'Activity':
					return new QQNode('activity', 'Activity', 'string', $this);
				case 'Career':
					return new QQNode('career', 'Career', 'boolean', $this);
				case 'Calling':
					return new QQNode('calling', 'Calling', 'boolean', $this);
				case 'Community':
					return new QQNode('community', 'Community', 'boolean', $this);
				case 'Creativity':
					return new QQNode('creativity', 'Creativity', 'boolean', $this);
				case 'Margin':
					return new QQNode('margin', 'Margin', 'boolean', $this);

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
	 * @property-read QQNode $AssessmentId
	 * @property-read QQNodeTimeAssessment $Assessment
	 * @property-read QQNode $Time
	 * @property-read QQNode $Activity
	 * @property-read QQNode $Career
	 * @property-read QQNode $Calling
	 * @property-read QQNode $Community
	 * @property-read QQNode $Creativity
	 * @property-read QQNode $Margin
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeTimeResults extends QQReverseReferenceNode {
		protected $strTableName = 'time_results';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'TimeResults';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'AssessmentId':
					return new QQNode('assessment_id', 'AssessmentId', 'integer', $this);
				case 'Assessment':
					return new QQNodeTimeAssessment('assessment_id', 'Assessment', 'integer', $this);
				case 'Time':
					return new QQNode('time', 'Time', 'integer', $this);
				case 'Activity':
					return new QQNode('activity', 'Activity', 'string', $this);
				case 'Career':
					return new QQNode('career', 'Career', 'boolean', $this);
				case 'Calling':
					return new QQNode('calling', 'Calling', 'boolean', $this);
				case 'Community':
					return new QQNode('community', 'Community', 'boolean', $this);
				case 'Creativity':
					return new QQNode('creativity', 'Creativity', 'boolean', $this);
				case 'Margin':
					return new QQNode('margin', 'Margin', 'boolean', $this);

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