<?php
	/**
	 * The abstract Lemon50AssessmentGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the Lemon50Assessment subclass which
	 * extends this Lemon50AssessmentGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the Lemon50Assessment class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property integer $UserId the value for intUserId 
	 * @property integer $ResourceId the value for intResourceId 
	 * @property integer $GroupId the value for intGroupId 
	 * @property integer $L the value for intL 
	 * @property integer $E the value for intE 
	 * @property integer $M the value for intM 
	 * @property integer $O the value for intO 
	 * @property integer $N the value for intN 
	 * @property QDateTime $DateModified the value for dttDateModified 
	 * @property integer $ResourceStatusId the value for intResourceStatusId 
	 * @property User $User the value for the User object referenced by intUserId 
	 * @property Resource $Resource the value for the Resource object referenced by intResourceId 
	 * @property GroupAssessmentList $Group the value for the GroupAssessmentList object referenced by intGroupId 
	 * @property Lemon50AssessmentResults $_Lemon50AssessmentResultsAsAssessment the value for the private _objLemon50AssessmentResultsAsAssessment (Read-Only) if set due to an expansion on the lemon50_assessment_results.assessment_id reverse relationship
	 * @property Lemon50AssessmentResults[] $_Lemon50AssessmentResultsAsAssessmentArray the value for the private _objLemon50AssessmentResultsAsAssessmentArray (Read-Only) if set due to an ExpandAsArray on the lemon50_assessment_results.assessment_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class Lemon50AssessmentGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column lemon50_assessment.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column lemon50_assessment.user_id
		 * @var integer intUserId
		 */
		protected $intUserId;
		const UserIdDefault = null;


		/**
		 * Protected member variable that maps to the database column lemon50_assessment.resource_id
		 * @var integer intResourceId
		 */
		protected $intResourceId;
		const ResourceIdDefault = null;


		/**
		 * Protected member variable that maps to the database column lemon50_assessment.group_id
		 * @var integer intGroupId
		 */
		protected $intGroupId;
		const GroupIdDefault = null;


		/**
		 * Protected member variable that maps to the database column lemon50_assessment.l
		 * @var integer intL
		 */
		protected $intL;
		const LDefault = null;


		/**
		 * Protected member variable that maps to the database column lemon50_assessment.e
		 * @var integer intE
		 */
		protected $intE;
		const EDefault = null;


		/**
		 * Protected member variable that maps to the database column lemon50_assessment.m
		 * @var integer intM
		 */
		protected $intM;
		const MDefault = null;


		/**
		 * Protected member variable that maps to the database column lemon50_assessment.o
		 * @var integer intO
		 */
		protected $intO;
		const ODefault = null;


		/**
		 * Protected member variable that maps to the database column lemon50_assessment.n
		 * @var integer intN
		 */
		protected $intN;
		const NDefault = null;


		/**
		 * Protected member variable that maps to the database column lemon50_assessment.date_modified
		 * @var QDateTime dttDateModified
		 */
		protected $dttDateModified;
		const DateModifiedDefault = null;


		/**
		 * Protected member variable that maps to the database column lemon50_assessment.resource_status_id
		 * @var integer intResourceStatusId
		 */
		protected $intResourceStatusId;
		const ResourceStatusIdDefault = null;


		/**
		 * Private member variable that stores a reference to a single Lemon50AssessmentResultsAsAssessment object
		 * (of type Lemon50AssessmentResults), if this Lemon50Assessment object was restored with
		 * an expansion on the lemon50_assessment_results association table.
		 * @var Lemon50AssessmentResults _objLemon50AssessmentResultsAsAssessment;
		 */
		private $_objLemon50AssessmentResultsAsAssessment;

		/**
		 * Private member variable that stores a reference to an array of Lemon50AssessmentResultsAsAssessment objects
		 * (of type Lemon50AssessmentResults[]), if this Lemon50Assessment object was restored with
		 * an ExpandAsArray on the lemon50_assessment_results association table.
		 * @var Lemon50AssessmentResults[] _objLemon50AssessmentResultsAsAssessmentArray;
		 */
		private $_objLemon50AssessmentResultsAsAssessmentArray = array();

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
		 * in the database column lemon50_assessment.user_id.
		 *
		 * NOTE: Always use the User property getter to correctly retrieve this User object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var User objUser
		 */
		protected $objUser;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column lemon50_assessment.resource_id.
		 *
		 * NOTE: Always use the Resource property getter to correctly retrieve this Resource object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Resource objResource
		 */
		protected $objResource;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column lemon50_assessment.group_id.
		 *
		 * NOTE: Always use the Group property getter to correctly retrieve this GroupAssessmentList object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var GroupAssessmentList objGroup
		 */
		protected $objGroup;





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
		 * Load a Lemon50Assessment from PK Info
		 * @param integer $intId
		 * @return Lemon50Assessment
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return Lemon50Assessment::QuerySingle(
				QQ::Equal(QQN::Lemon50Assessment()->Id, $intId)
			);
		}

		/**
		 * Load all Lemon50Assessments
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Lemon50Assessment[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call Lemon50Assessment::QueryArray to perform the LoadAll query
			try {
				return Lemon50Assessment::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Lemon50Assessments
		 * @return int
		 */
		public static function CountAll() {
			// Call Lemon50Assessment::QueryCount to perform the CountAll query
			return Lemon50Assessment::QueryCount(QQ::All());
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
			$objDatabase = Lemon50Assessment::GetDatabase();

			// Create/Build out the QueryBuilder object with Lemon50Assessment-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'lemon50_assessment');
			Lemon50Assessment::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('lemon50_assessment');

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
		 * Static Qcodo Query method to query for a single Lemon50Assessment object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Lemon50Assessment the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Lemon50Assessment::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new Lemon50Assessment object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = Lemon50Assessment::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return Lemon50Assessment::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of Lemon50Assessment objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return Lemon50Assessment[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Lemon50Assessment::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return Lemon50Assessment::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = Lemon50Assessment::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of Lemon50Assessment objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = Lemon50Assessment::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = Lemon50Assessment::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'lemon50_assessment_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with Lemon50Assessment-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				Lemon50Assessment::GetSelectFields($objQueryBuilder);
				Lemon50Assessment::GetFromFields($objQueryBuilder);

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
			return Lemon50Assessment::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this Lemon50Assessment
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'lemon50_assessment';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'user_id', $strAliasPrefix . 'user_id');
			$objBuilder->AddSelectItem($strTableName, 'resource_id', $strAliasPrefix . 'resource_id');
			$objBuilder->AddSelectItem($strTableName, 'group_id', $strAliasPrefix . 'group_id');
			$objBuilder->AddSelectItem($strTableName, 'l', $strAliasPrefix . 'l');
			$objBuilder->AddSelectItem($strTableName, 'e', $strAliasPrefix . 'e');
			$objBuilder->AddSelectItem($strTableName, 'm', $strAliasPrefix . 'm');
			$objBuilder->AddSelectItem($strTableName, 'o', $strAliasPrefix . 'o');
			$objBuilder->AddSelectItem($strTableName, 'n', $strAliasPrefix . 'n');
			$objBuilder->AddSelectItem($strTableName, 'date_modified', $strAliasPrefix . 'date_modified');
			$objBuilder->AddSelectItem($strTableName, 'resource_status_id', $strAliasPrefix . 'resource_status_id');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a Lemon50Assessment from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this Lemon50Assessment::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return Lemon50Assessment
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
					$strAliasPrefix = 'lemon50_assessment__';


				$strAlias = $strAliasPrefix . 'lemon50assessmentresultsasassessment__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objLemon50AssessmentResultsAsAssessmentArray)) {
						$objPreviousChildItem = $objPreviousItem->_objLemon50AssessmentResultsAsAssessmentArray[$intPreviousChildItemCount - 1];
						$objChildItem = Lemon50AssessmentResults::InstantiateDbRow($objDbRow, $strAliasPrefix . 'lemon50assessmentresultsasassessment__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objLemon50AssessmentResultsAsAssessmentArray[] = $objChildItem;
					} else
						$objPreviousItem->_objLemon50AssessmentResultsAsAssessmentArray[] = Lemon50AssessmentResults::InstantiateDbRow($objDbRow, $strAliasPrefix . 'lemon50assessmentresultsasassessment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'lemon50_assessment__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the Lemon50Assessment object
			$objToReturn = new Lemon50Assessment();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'user_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'user_id'] : $strAliasPrefix . 'user_id';
			$objToReturn->intUserId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'resource_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'resource_id'] : $strAliasPrefix . 'resource_id';
			$objToReturn->intResourceId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'group_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'group_id'] : $strAliasPrefix . 'group_id';
			$objToReturn->intGroupId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'l', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'l'] : $strAliasPrefix . 'l';
			$objToReturn->intL = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'e', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'e'] : $strAliasPrefix . 'e';
			$objToReturn->intE = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'm', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'm'] : $strAliasPrefix . 'm';
			$objToReturn->intM = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'o', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'o'] : $strAliasPrefix . 'o';
			$objToReturn->intO = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'n', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'n'] : $strAliasPrefix . 'n';
			$objToReturn->intN = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'date_modified', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'date_modified'] : $strAliasPrefix . 'date_modified';
			$objToReturn->dttDateModified = $objDbRow->GetColumn($strAliasName, 'Date');
			$strAliasName = array_key_exists($strAliasPrefix . 'resource_status_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'resource_status_id'] : $strAliasPrefix . 'resource_status_id';
			$objToReturn->intResourceStatusId = $objDbRow->GetColumn($strAliasName, 'Integer');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'lemon50_assessment__';

			// Check for User Early Binding
			$strAlias = $strAliasPrefix . 'user_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objUser = User::InstantiateDbRow($objDbRow, $strAliasPrefix . 'user_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for Resource Early Binding
			$strAlias = $strAliasPrefix . 'resource_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objResource = Resource::InstantiateDbRow($objDbRow, $strAliasPrefix . 'resource_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for Group Early Binding
			$strAlias = $strAliasPrefix . 'group_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objGroup = GroupAssessmentList::InstantiateDbRow($objDbRow, $strAliasPrefix . 'group_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);




			// Check for Lemon50AssessmentResultsAsAssessment Virtual Binding
			$strAlias = $strAliasPrefix . 'lemon50assessmentresultsasassessment__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objLemon50AssessmentResultsAsAssessmentArray[] = Lemon50AssessmentResults::InstantiateDbRow($objDbRow, $strAliasPrefix . 'lemon50assessmentresultsasassessment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objLemon50AssessmentResultsAsAssessment = Lemon50AssessmentResults::InstantiateDbRow($objDbRow, $strAliasPrefix . 'lemon50assessmentresultsasassessment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of Lemon50Assessments from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return Lemon50Assessment[]
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
					$objItem = Lemon50Assessment::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = Lemon50Assessment::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single Lemon50Assessment object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return Lemon50Assessment next row resulting from the query
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
			return Lemon50Assessment::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single Lemon50Assessment object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return Lemon50Assessment
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return Lemon50Assessment::QuerySingle(
				QQ::Equal(QQN::Lemon50Assessment()->Id, $intId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Lemon50Assessment objects,
		 * by UserId Index(es)
		 * @param integer $intUserId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Lemon50Assessment[]
		*/
		public static function LoadArrayByUserId($intUserId, $objOptionalClauses = null) {
			// Call Lemon50Assessment::QueryArray to perform the LoadArrayByUserId query
			try {
				return Lemon50Assessment::QueryArray(
					QQ::Equal(QQN::Lemon50Assessment()->UserId, $intUserId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Lemon50Assessments
		 * by UserId Index(es)
		 * @param integer $intUserId
		 * @return int
		*/
		public static function CountByUserId($intUserId, $objOptionalClauses = null) {
			// Call Lemon50Assessment::QueryCount to perform the CountByUserId query
			return Lemon50Assessment::QueryCount(
				QQ::Equal(QQN::Lemon50Assessment()->UserId, $intUserId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Lemon50Assessment objects,
		 * by ResourceId Index(es)
		 * @param integer $intResourceId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Lemon50Assessment[]
		*/
		public static function LoadArrayByResourceId($intResourceId, $objOptionalClauses = null) {
			// Call Lemon50Assessment::QueryArray to perform the LoadArrayByResourceId query
			try {
				return Lemon50Assessment::QueryArray(
					QQ::Equal(QQN::Lemon50Assessment()->ResourceId, $intResourceId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Lemon50Assessments
		 * by ResourceId Index(es)
		 * @param integer $intResourceId
		 * @return int
		*/
		public static function CountByResourceId($intResourceId, $objOptionalClauses = null) {
			// Call Lemon50Assessment::QueryCount to perform the CountByResourceId query
			return Lemon50Assessment::QueryCount(
				QQ::Equal(QQN::Lemon50Assessment()->ResourceId, $intResourceId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of Lemon50Assessment objects,
		 * by GroupId Index(es)
		 * @param integer $intGroupId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Lemon50Assessment[]
		*/
		public static function LoadArrayByGroupId($intGroupId, $objOptionalClauses = null) {
			// Call Lemon50Assessment::QueryArray to perform the LoadArrayByGroupId query
			try {
				return Lemon50Assessment::QueryArray(
					QQ::Equal(QQN::Lemon50Assessment()->GroupId, $intGroupId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Lemon50Assessments
		 * by GroupId Index(es)
		 * @param integer $intGroupId
		 * @return int
		*/
		public static function CountByGroupId($intGroupId, $objOptionalClauses = null) {
			// Call Lemon50Assessment::QueryCount to perform the CountByGroupId query
			return Lemon50Assessment::QueryCount(
				QQ::Equal(QQN::Lemon50Assessment()->GroupId, $intGroupId)
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
		 * Save this Lemon50Assessment
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = Lemon50Assessment::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `lemon50_assessment` (
							`user_id`,
							`resource_id`,
							`group_id`,
							`l`,
							`e`,
							`m`,
							`o`,
							`n`,
							`date_modified`,
							`resource_status_id`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intUserId) . ',
							' . $objDatabase->SqlVariable($this->intResourceId) . ',
							' . $objDatabase->SqlVariable($this->intGroupId) . ',
							' . $objDatabase->SqlVariable($this->intL) . ',
							' . $objDatabase->SqlVariable($this->intE) . ',
							' . $objDatabase->SqlVariable($this->intM) . ',
							' . $objDatabase->SqlVariable($this->intO) . ',
							' . $objDatabase->SqlVariable($this->intN) . ',
							' . $objDatabase->SqlVariable($this->dttDateModified) . ',
							' . $objDatabase->SqlVariable($this->intResourceStatusId) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('lemon50_assessment', 'id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`lemon50_assessment`
						SET
							`user_id` = ' . $objDatabase->SqlVariable($this->intUserId) . ',
							`resource_id` = ' . $objDatabase->SqlVariable($this->intResourceId) . ',
							`group_id` = ' . $objDatabase->SqlVariable($this->intGroupId) . ',
							`l` = ' . $objDatabase->SqlVariable($this->intL) . ',
							`e` = ' . $objDatabase->SqlVariable($this->intE) . ',
							`m` = ' . $objDatabase->SqlVariable($this->intM) . ',
							`o` = ' . $objDatabase->SqlVariable($this->intO) . ',
							`n` = ' . $objDatabase->SqlVariable($this->intN) . ',
							`date_modified` = ' . $objDatabase->SqlVariable($this->dttDateModified) . ',
							`resource_status_id` = ' . $objDatabase->SqlVariable($this->intResourceStatusId) . '
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
		 * Delete this Lemon50Assessment
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this Lemon50Assessment with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = Lemon50Assessment::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`lemon50_assessment`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all Lemon50Assessments
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = Lemon50Assessment::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`lemon50_assessment`');
		}

		/**
		 * Truncate lemon50_assessment table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = Lemon50Assessment::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `lemon50_assessment`');
		}

		/**
		 * Reload this Lemon50Assessment from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved Lemon50Assessment object.');

			// Reload the Object
			$objReloaded = Lemon50Assessment::Load($this->intId);

			// Update $this's local variables to match
			$this->UserId = $objReloaded->UserId;
			$this->ResourceId = $objReloaded->ResourceId;
			$this->GroupId = $objReloaded->GroupId;
			$this->intL = $objReloaded->intL;
			$this->intE = $objReloaded->intE;
			$this->intM = $objReloaded->intM;
			$this->intO = $objReloaded->intO;
			$this->intN = $objReloaded->intN;
			$this->dttDateModified = $objReloaded->dttDateModified;
			$this->intResourceStatusId = $objReloaded->intResourceStatusId;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = Lemon50Assessment::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `lemon50_assessment` (
					`id`,
					`user_id`,
					`resource_id`,
					`group_id`,
					`l`,
					`e`,
					`m`,
					`o`,
					`n`,
					`date_modified`,
					`resource_status_id`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->intUserId) . ',
					' . $objDatabase->SqlVariable($this->intResourceId) . ',
					' . $objDatabase->SqlVariable($this->intGroupId) . ',
					' . $objDatabase->SqlVariable($this->intL) . ',
					' . $objDatabase->SqlVariable($this->intE) . ',
					' . $objDatabase->SqlVariable($this->intM) . ',
					' . $objDatabase->SqlVariable($this->intO) . ',
					' . $objDatabase->SqlVariable($this->intN) . ',
					' . $objDatabase->SqlVariable($this->dttDateModified) . ',
					' . $objDatabase->SqlVariable($this->intResourceStatusId) . ',
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
		 * @return Lemon50Assessment[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = Lemon50Assessment::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM lemon50_assessment WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return Lemon50Assessment::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return Lemon50Assessment[]
		 */
		public function GetJournal() {
			return Lemon50Assessment::GetJournalForId($this->intId);
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

				case 'UserId':
					// Gets the value for intUserId 
					// @return integer
					return $this->intUserId;

				case 'ResourceId':
					// Gets the value for intResourceId 
					// @return integer
					return $this->intResourceId;

				case 'GroupId':
					// Gets the value for intGroupId 
					// @return integer
					return $this->intGroupId;

				case 'L':
					// Gets the value for intL 
					// @return integer
					return $this->intL;

				case 'E':
					// Gets the value for intE 
					// @return integer
					return $this->intE;

				case 'M':
					// Gets the value for intM 
					// @return integer
					return $this->intM;

				case 'O':
					// Gets the value for intO 
					// @return integer
					return $this->intO;

				case 'N':
					// Gets the value for intN 
					// @return integer
					return $this->intN;

				case 'DateModified':
					// Gets the value for dttDateModified 
					// @return QDateTime
					return $this->dttDateModified;

				case 'ResourceStatusId':
					// Gets the value for intResourceStatusId 
					// @return integer
					return $this->intResourceStatusId;


				///////////////////
				// Member Objects
				///////////////////
				case 'User':
					// Gets the value for the User object referenced by intUserId 
					// @return User
					try {
						if ((!$this->objUser) && (!is_null($this->intUserId)))
							$this->objUser = User::Load($this->intUserId);
						return $this->objUser;
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

				case 'Group':
					// Gets the value for the GroupAssessmentList object referenced by intGroupId 
					// @return GroupAssessmentList
					try {
						if ((!$this->objGroup) && (!is_null($this->intGroupId)))
							$this->objGroup = GroupAssessmentList::Load($this->intGroupId);
						return $this->objGroup;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_Lemon50AssessmentResultsAsAssessment':
					// Gets the value for the private _objLemon50AssessmentResultsAsAssessment (Read-Only)
					// if set due to an expansion on the lemon50_assessment_results.assessment_id reverse relationship
					// @return Lemon50AssessmentResults
					return $this->_objLemon50AssessmentResultsAsAssessment;

				case '_Lemon50AssessmentResultsAsAssessmentArray':
					// Gets the value for the private _objLemon50AssessmentResultsAsAssessmentArray (Read-Only)
					// if set due to an ExpandAsArray on the lemon50_assessment_results.assessment_id reverse relationship
					// @return Lemon50AssessmentResults[]
					return (array) $this->_objLemon50AssessmentResultsAsAssessmentArray;


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
				case 'UserId':
					// Sets the value for intUserId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objUser = null;
						return ($this->intUserId = QType::Cast($mixValue, QType::Integer));
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

				case 'GroupId':
					// Sets the value for intGroupId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objGroup = null;
						return ($this->intGroupId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'L':
					// Sets the value for intL 
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intL = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'E':
					// Sets the value for intE 
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intE = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'M':
					// Sets the value for intM 
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intM = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'O':
					// Sets the value for intO 
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intO = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'N':
					// Sets the value for intN 
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intN = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'DateModified':
					// Sets the value for dttDateModified 
					// @param QDateTime $mixValue
					// @return QDateTime
					try {
						return ($this->dttDateModified = QType::Cast($mixValue, QType::DateTime));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'ResourceStatusId':
					// Sets the value for intResourceStatusId 
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intResourceStatusId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'User':
					// Sets the value for the User object referenced by intUserId 
					// @param User $mixValue
					// @return User
					if (is_null($mixValue)) {
						$this->intUserId = null;
						$this->objUser = null;
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
							throw new QCallerException('Unable to set an unsaved User for this Lemon50Assessment');

						// Update Local Member Variables
						$this->objUser = $mixValue;
						$this->intUserId = $mixValue->Id;

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
							throw new QCallerException('Unable to set an unsaved Resource for this Lemon50Assessment');

						// Update Local Member Variables
						$this->objResource = $mixValue;
						$this->intResourceId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Group':
					// Sets the value for the GroupAssessmentList object referenced by intGroupId 
					// @param GroupAssessmentList $mixValue
					// @return GroupAssessmentList
					if (is_null($mixValue)) {
						$this->intGroupId = null;
						$this->objGroup = null;
						return null;
					} else {
						// Make sure $mixValue actually is a GroupAssessmentList object
						try {
							$mixValue = QType::Cast($mixValue, 'GroupAssessmentList');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED GroupAssessmentList object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Group for this Lemon50Assessment');

						// Update Local Member Variables
						$this->objGroup = $mixValue;
						$this->intGroupId = $mixValue->Id;

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

			
		
		// Related Objects' Methods for Lemon50AssessmentResultsAsAssessment
		//-------------------------------------------------------------------

		/**
		 * Gets all associated Lemon50AssessmentResultsesAsAssessment as an array of Lemon50AssessmentResults objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Lemon50AssessmentResults[]
		*/ 
		public function GetLemon50AssessmentResultsAsAssessmentArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Lemon50AssessmentResults::LoadArrayByAssessmentId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated Lemon50AssessmentResultsesAsAssessment
		 * @return int
		*/ 
		public function CountLemon50AssessmentResultsesAsAssessment() {
			if ((is_null($this->intId)))
				return 0;

			return Lemon50AssessmentResults::CountByAssessmentId($this->intId);
		}

		/**
		 * Associates a Lemon50AssessmentResultsAsAssessment
		 * @param Lemon50AssessmentResults $objLemon50AssessmentResults
		 * @return void
		*/ 
		public function AssociateLemon50AssessmentResultsAsAssessment(Lemon50AssessmentResults $objLemon50AssessmentResults) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateLemon50AssessmentResultsAsAssessment on this unsaved Lemon50Assessment.');
			if ((is_null($objLemon50AssessmentResults->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateLemon50AssessmentResultsAsAssessment on this Lemon50Assessment with an unsaved Lemon50AssessmentResults.');

			// Get the Database Object for this Class
			$objDatabase = Lemon50Assessment::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`lemon50_assessment_results`
				SET
					`assessment_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objLemon50AssessmentResults->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objLemon50AssessmentResults->AssessmentId = $this->intId;
				$objLemon50AssessmentResults->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a Lemon50AssessmentResultsAsAssessment
		 * @param Lemon50AssessmentResults $objLemon50AssessmentResults
		 * @return void
		*/ 
		public function UnassociateLemon50AssessmentResultsAsAssessment(Lemon50AssessmentResults $objLemon50AssessmentResults) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLemon50AssessmentResultsAsAssessment on this unsaved Lemon50Assessment.');
			if ((is_null($objLemon50AssessmentResults->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLemon50AssessmentResultsAsAssessment on this Lemon50Assessment with an unsaved Lemon50AssessmentResults.');

			// Get the Database Object for this Class
			$objDatabase = Lemon50Assessment::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`lemon50_assessment_results`
				SET
					`assessment_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objLemon50AssessmentResults->Id) . ' AND
					`assessment_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objLemon50AssessmentResults->AssessmentId = null;
				$objLemon50AssessmentResults->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all Lemon50AssessmentResultsesAsAssessment
		 * @return void
		*/ 
		public function UnassociateAllLemon50AssessmentResultsesAsAssessment() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLemon50AssessmentResultsAsAssessment on this unsaved Lemon50Assessment.');

			// Get the Database Object for this Class
			$objDatabase = Lemon50Assessment::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Lemon50AssessmentResults::LoadArrayByAssessmentId($this->intId) as $objLemon50AssessmentResults) {
					$objLemon50AssessmentResults->AssessmentId = null;
					$objLemon50AssessmentResults->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`lemon50_assessment_results`
				SET
					`assessment_id` = null
				WHERE
					`assessment_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated Lemon50AssessmentResultsAsAssessment
		 * @param Lemon50AssessmentResults $objLemon50AssessmentResults
		 * @return void
		*/ 
		public function DeleteAssociatedLemon50AssessmentResultsAsAssessment(Lemon50AssessmentResults $objLemon50AssessmentResults) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLemon50AssessmentResultsAsAssessment on this unsaved Lemon50Assessment.');
			if ((is_null($objLemon50AssessmentResults->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLemon50AssessmentResultsAsAssessment on this Lemon50Assessment with an unsaved Lemon50AssessmentResults.');

			// Get the Database Object for this Class
			$objDatabase = Lemon50Assessment::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`lemon50_assessment_results`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objLemon50AssessmentResults->Id) . ' AND
					`assessment_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objLemon50AssessmentResults->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated Lemon50AssessmentResultsesAsAssessment
		 * @return void
		*/ 
		public function DeleteAllLemon50AssessmentResultsesAsAssessment() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLemon50AssessmentResultsAsAssessment on this unsaved Lemon50Assessment.');

			// Get the Database Object for this Class
			$objDatabase = Lemon50Assessment::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Lemon50AssessmentResults::LoadArrayByAssessmentId($this->intId) as $objLemon50AssessmentResults) {
					$objLemon50AssessmentResults->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`lemon50_assessment_results`
				WHERE
					`assessment_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="Lemon50Assessment"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="User" type="xsd1:User"/>';
			$strToReturn .= '<element name="Resource" type="xsd1:Resource"/>';
			$strToReturn .= '<element name="Group" type="xsd1:GroupAssessmentList"/>';
			$strToReturn .= '<element name="L" type="xsd:int"/>';
			$strToReturn .= '<element name="E" type="xsd:int"/>';
			$strToReturn .= '<element name="M" type="xsd:int"/>';
			$strToReturn .= '<element name="O" type="xsd:int"/>';
			$strToReturn .= '<element name="N" type="xsd:int"/>';
			$strToReturn .= '<element name="DateModified" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="ResourceStatusId" type="xsd:int"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('Lemon50Assessment', $strComplexTypeArray)) {
				$strComplexTypeArray['Lemon50Assessment'] = Lemon50Assessment::GetSoapComplexTypeXml();
				User::AlterSoapComplexTypeArray($strComplexTypeArray);
				Resource::AlterSoapComplexTypeArray($strComplexTypeArray);
				GroupAssessmentList::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, Lemon50Assessment::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new Lemon50Assessment();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'User')) &&
				($objSoapObject->User))
				$objToReturn->User = User::GetObjectFromSoapObject($objSoapObject->User);
			if ((property_exists($objSoapObject, 'Resource')) &&
				($objSoapObject->Resource))
				$objToReturn->Resource = Resource::GetObjectFromSoapObject($objSoapObject->Resource);
			if ((property_exists($objSoapObject, 'Group')) &&
				($objSoapObject->Group))
				$objToReturn->Group = GroupAssessmentList::GetObjectFromSoapObject($objSoapObject->Group);
			if (property_exists($objSoapObject, 'L'))
				$objToReturn->intL = $objSoapObject->L;
			if (property_exists($objSoapObject, 'E'))
				$objToReturn->intE = $objSoapObject->E;
			if (property_exists($objSoapObject, 'M'))
				$objToReturn->intM = $objSoapObject->M;
			if (property_exists($objSoapObject, 'O'))
				$objToReturn->intO = $objSoapObject->O;
			if (property_exists($objSoapObject, 'N'))
				$objToReturn->intN = $objSoapObject->N;
			if (property_exists($objSoapObject, 'DateModified'))
				$objToReturn->dttDateModified = new QDateTime($objSoapObject->DateModified);
			if (property_exists($objSoapObject, 'ResourceStatusId'))
				$objToReturn->intResourceStatusId = $objSoapObject->ResourceStatusId;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, Lemon50Assessment::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objUser)
				$objObject->objUser = User::GetSoapObjectFromObject($objObject->objUser, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intUserId = null;
			if ($objObject->objResource)
				$objObject->objResource = Resource::GetSoapObjectFromObject($objObject->objResource, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intResourceId = null;
			if ($objObject->objGroup)
				$objObject->objGroup = GroupAssessmentList::GetSoapObjectFromObject($objObject->objGroup, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intGroupId = null;
			if ($objObject->dttDateModified)
				$objObject->dttDateModified = $objObject->dttDateModified->__toString(QDateTime::FormatSoap);
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $Id
	 * @property-read QQNode $UserId
	 * @property-read QQNodeUser $User
	 * @property-read QQNode $ResourceId
	 * @property-read QQNodeResource $Resource
	 * @property-read QQNode $GroupId
	 * @property-read QQNodeGroupAssessmentList $Group
	 * @property-read QQNode $L
	 * @property-read QQNode $E
	 * @property-read QQNode $M
	 * @property-read QQNode $O
	 * @property-read QQNode $N
	 * @property-read QQNode $DateModified
	 * @property-read QQNode $ResourceStatusId
	 * @property-read QQReverseReferenceNodeLemon50AssessmentResults $Lemon50AssessmentResultsAsAssessment
	 */
	class QQNodeLemon50Assessment extends QQNode {
		protected $strTableName = 'lemon50_assessment';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Lemon50Assessment';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'UserId':
					return new QQNode('user_id', 'UserId', 'integer', $this);
				case 'User':
					return new QQNodeUser('user_id', 'User', 'integer', $this);
				case 'ResourceId':
					return new QQNode('resource_id', 'ResourceId', 'integer', $this);
				case 'Resource':
					return new QQNodeResource('resource_id', 'Resource', 'integer', $this);
				case 'GroupId':
					return new QQNode('group_id', 'GroupId', 'integer', $this);
				case 'Group':
					return new QQNodeGroupAssessmentList('group_id', 'Group', 'integer', $this);
				case 'L':
					return new QQNode('l', 'L', 'integer', $this);
				case 'E':
					return new QQNode('e', 'E', 'integer', $this);
				case 'M':
					return new QQNode('m', 'M', 'integer', $this);
				case 'O':
					return new QQNode('o', 'O', 'integer', $this);
				case 'N':
					return new QQNode('n', 'N', 'integer', $this);
				case 'DateModified':
					return new QQNode('date_modified', 'DateModified', 'QDateTime', $this);
				case 'ResourceStatusId':
					return new QQNode('resource_status_id', 'ResourceStatusId', 'integer', $this);
				case 'Lemon50AssessmentResultsAsAssessment':
					return new QQReverseReferenceNodeLemon50AssessmentResults($this, 'lemon50assessmentresultsasassessment', 'reverse_reference', 'assessment_id');

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
	 * @property-read QQNode $UserId
	 * @property-read QQNodeUser $User
	 * @property-read QQNode $ResourceId
	 * @property-read QQNodeResource $Resource
	 * @property-read QQNode $GroupId
	 * @property-read QQNodeGroupAssessmentList $Group
	 * @property-read QQNode $L
	 * @property-read QQNode $E
	 * @property-read QQNode $M
	 * @property-read QQNode $O
	 * @property-read QQNode $N
	 * @property-read QQNode $DateModified
	 * @property-read QQNode $ResourceStatusId
	 * @property-read QQReverseReferenceNodeLemon50AssessmentResults $Lemon50AssessmentResultsAsAssessment
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeLemon50Assessment extends QQReverseReferenceNode {
		protected $strTableName = 'lemon50_assessment';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'Lemon50Assessment';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'UserId':
					return new QQNode('user_id', 'UserId', 'integer', $this);
				case 'User':
					return new QQNodeUser('user_id', 'User', 'integer', $this);
				case 'ResourceId':
					return new QQNode('resource_id', 'ResourceId', 'integer', $this);
				case 'Resource':
					return new QQNodeResource('resource_id', 'Resource', 'integer', $this);
				case 'GroupId':
					return new QQNode('group_id', 'GroupId', 'integer', $this);
				case 'Group':
					return new QQNodeGroupAssessmentList('group_id', 'Group', 'integer', $this);
				case 'L':
					return new QQNode('l', 'L', 'integer', $this);
				case 'E':
					return new QQNode('e', 'E', 'integer', $this);
				case 'M':
					return new QQNode('m', 'M', 'integer', $this);
				case 'O':
					return new QQNode('o', 'O', 'integer', $this);
				case 'N':
					return new QQNode('n', 'N', 'integer', $this);
				case 'DateModified':
					return new QQNode('date_modified', 'DateModified', 'QDateTime', $this);
				case 'ResourceStatusId':
					return new QQNode('resource_status_id', 'ResourceStatusId', 'integer', $this);
				case 'Lemon50AssessmentResultsAsAssessment':
					return new QQReverseReferenceNodeLemon50AssessmentResults($this, 'lemon50assessmentresultsasassessment', 'reverse_reference', 'assessment_id');

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