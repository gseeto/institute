<?php
	/**
	 * The abstract LemonloversAssessmentGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the LemonloversAssessment subclass which
	 * extends this LemonloversAssessmentGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the LemonloversAssessment class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property integer $UserId the value for intUserId 
	 * @property integer $CompanyId the value for intCompanyId 
	 * @property integer $ResourceId the value for intResourceId 
	 * @property integer $ResourceStatusId the value for intResourceStatusId 
	 * @property integer $GroupId the value for intGroupId 
	 * @property integer $L the value for intL 
	 * @property integer $E the value for intE 
	 * @property integer $M the value for intM 
	 * @property integer $O the value for intO 
	 * @property integer $N the value for intN 
	 * @property QDateTime $DateModified the value for dttDateModified 
	 * @property User $User the value for the User object referenced by intUserId 
	 * @property Company $Company the value for the Company object referenced by intCompanyId 
	 * @property Resource $Resource the value for the Resource object referenced by intResourceId 
	 * @property GroupAssessmentList $Group the value for the GroupAssessmentList object referenced by intGroupId 
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class LemonloversAssessmentGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column lemonlovers_assessment.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column lemonlovers_assessment.user_id
		 * @var integer intUserId
		 */
		protected $intUserId;
		const UserIdDefault = null;


		/**
		 * Protected member variable that maps to the database column lemonlovers_assessment.company_id
		 * @var integer intCompanyId
		 */
		protected $intCompanyId;
		const CompanyIdDefault = null;


		/**
		 * Protected member variable that maps to the database column lemonlovers_assessment.resource_id
		 * @var integer intResourceId
		 */
		protected $intResourceId;
		const ResourceIdDefault = null;


		/**
		 * Protected member variable that maps to the database column lemonlovers_assessment.resource_status_id
		 * @var integer intResourceStatusId
		 */
		protected $intResourceStatusId;
		const ResourceStatusIdDefault = null;


		/**
		 * Protected member variable that maps to the database column lemonlovers_assessment.group_id
		 * @var integer intGroupId
		 */
		protected $intGroupId;
		const GroupIdDefault = null;


		/**
		 * Protected member variable that maps to the database column lemonlovers_assessment.l
		 * @var integer intL
		 */
		protected $intL;
		const LDefault = null;


		/**
		 * Protected member variable that maps to the database column lemonlovers_assessment.e
		 * @var integer intE
		 */
		protected $intE;
		const EDefault = null;


		/**
		 * Protected member variable that maps to the database column lemonlovers_assessment.m
		 * @var integer intM
		 */
		protected $intM;
		const MDefault = null;


		/**
		 * Protected member variable that maps to the database column lemonlovers_assessment.o
		 * @var integer intO
		 */
		protected $intO;
		const ODefault = null;


		/**
		 * Protected member variable that maps to the database column lemonlovers_assessment.n
		 * @var integer intN
		 */
		protected $intN;
		const NDefault = null;


		/**
		 * Protected member variable that maps to the database column lemonlovers_assessment.date_modified
		 * @var QDateTime dttDateModified
		 */
		protected $dttDateModified;
		const DateModifiedDefault = null;


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
		 * in the database column lemonlovers_assessment.user_id.
		 *
		 * NOTE: Always use the User property getter to correctly retrieve this User object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var User objUser
		 */
		protected $objUser;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column lemonlovers_assessment.company_id.
		 *
		 * NOTE: Always use the Company property getter to correctly retrieve this Company object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Company objCompany
		 */
		protected $objCompany;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column lemonlovers_assessment.resource_id.
		 *
		 * NOTE: Always use the Resource property getter to correctly retrieve this Resource object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Resource objResource
		 */
		protected $objResource;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column lemonlovers_assessment.group_id.
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
		 * Load a LemonloversAssessment from PK Info
		 * @param integer $intId
		 * @return LemonloversAssessment
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return LemonloversAssessment::QuerySingle(
				QQ::Equal(QQN::LemonloversAssessment()->Id, $intId)
			);
		}

		/**
		 * Load all LemonloversAssessments
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return LemonloversAssessment[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call LemonloversAssessment::QueryArray to perform the LoadAll query
			try {
				return LemonloversAssessment::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all LemonloversAssessments
		 * @return int
		 */
		public static function CountAll() {
			// Call LemonloversAssessment::QueryCount to perform the CountAll query
			return LemonloversAssessment::QueryCount(QQ::All());
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
			$objDatabase = LemonloversAssessment::GetDatabase();

			// Create/Build out the QueryBuilder object with LemonloversAssessment-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'lemonlovers_assessment');
			LemonloversAssessment::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('lemonlovers_assessment');

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
		 * Static Qcodo Query method to query for a single LemonloversAssessment object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return LemonloversAssessment the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = LemonloversAssessment::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new LemonloversAssessment object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = LemonloversAssessment::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return LemonloversAssessment::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of LemonloversAssessment objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return LemonloversAssessment[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = LemonloversAssessment::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return LemonloversAssessment::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = LemonloversAssessment::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of LemonloversAssessment objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = LemonloversAssessment::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = LemonloversAssessment::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'lemonlovers_assessment_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with LemonloversAssessment-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				LemonloversAssessment::GetSelectFields($objQueryBuilder);
				LemonloversAssessment::GetFromFields($objQueryBuilder);

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
			return LemonloversAssessment::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this LemonloversAssessment
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'lemonlovers_assessment';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'user_id', $strAliasPrefix . 'user_id');
			$objBuilder->AddSelectItem($strTableName, 'company_id', $strAliasPrefix . 'company_id');
			$objBuilder->AddSelectItem($strTableName, 'resource_id', $strAliasPrefix . 'resource_id');
			$objBuilder->AddSelectItem($strTableName, 'resource_status_id', $strAliasPrefix . 'resource_status_id');
			$objBuilder->AddSelectItem($strTableName, 'group_id', $strAliasPrefix . 'group_id');
			$objBuilder->AddSelectItem($strTableName, 'l', $strAliasPrefix . 'l');
			$objBuilder->AddSelectItem($strTableName, 'e', $strAliasPrefix . 'e');
			$objBuilder->AddSelectItem($strTableName, 'm', $strAliasPrefix . 'm');
			$objBuilder->AddSelectItem($strTableName, 'o', $strAliasPrefix . 'o');
			$objBuilder->AddSelectItem($strTableName, 'n', $strAliasPrefix . 'n');
			$objBuilder->AddSelectItem($strTableName, 'date_modified', $strAliasPrefix . 'date_modified');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a LemonloversAssessment from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this LemonloversAssessment::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return LemonloversAssessment
		*/
		public static function InstantiateDbRow($objDbRow, $strAliasPrefix = null, $strExpandAsArrayNodes = null, $objPreviousItem = null, $strColumnAliasArray = array()) {
			// If blank row, return null
			if (!$objDbRow)
				return null;


			// Create a new instance of the LemonloversAssessment object
			$objToReturn = new LemonloversAssessment();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'user_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'user_id'] : $strAliasPrefix . 'user_id';
			$objToReturn->intUserId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'company_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'company_id'] : $strAliasPrefix . 'company_id';
			$objToReturn->intCompanyId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'resource_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'resource_id'] : $strAliasPrefix . 'resource_id';
			$objToReturn->intResourceId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'resource_status_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'resource_status_id'] : $strAliasPrefix . 'resource_status_id';
			$objToReturn->intResourceStatusId = $objDbRow->GetColumn($strAliasName, 'Integer');
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

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'lemonlovers_assessment__';

			// Check for User Early Binding
			$strAlias = $strAliasPrefix . 'user_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objUser = User::InstantiateDbRow($objDbRow, $strAliasPrefix . 'user_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for Company Early Binding
			$strAlias = $strAliasPrefix . 'company_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objCompany = Company::InstantiateDbRow($objDbRow, $strAliasPrefix . 'company_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

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




			return $objToReturn;
		}

		/**
		 * Instantiate an array of LemonloversAssessments from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return LemonloversAssessment[]
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
					$objItem = LemonloversAssessment::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = LemonloversAssessment::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single LemonloversAssessment object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return LemonloversAssessment next row resulting from the query
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
			return LemonloversAssessment::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single LemonloversAssessment object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return LemonloversAssessment
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return LemonloversAssessment::QuerySingle(
				QQ::Equal(QQN::LemonloversAssessment()->Id, $intId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of LemonloversAssessment objects,
		 * by UserId Index(es)
		 * @param integer $intUserId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return LemonloversAssessment[]
		*/
		public static function LoadArrayByUserId($intUserId, $objOptionalClauses = null) {
			// Call LemonloversAssessment::QueryArray to perform the LoadArrayByUserId query
			try {
				return LemonloversAssessment::QueryArray(
					QQ::Equal(QQN::LemonloversAssessment()->UserId, $intUserId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count LemonloversAssessments
		 * by UserId Index(es)
		 * @param integer $intUserId
		 * @return int
		*/
		public static function CountByUserId($intUserId, $objOptionalClauses = null) {
			// Call LemonloversAssessment::QueryCount to perform the CountByUserId query
			return LemonloversAssessment::QueryCount(
				QQ::Equal(QQN::LemonloversAssessment()->UserId, $intUserId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of LemonloversAssessment objects,
		 * by CompanyId Index(es)
		 * @param integer $intCompanyId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return LemonloversAssessment[]
		*/
		public static function LoadArrayByCompanyId($intCompanyId, $objOptionalClauses = null) {
			// Call LemonloversAssessment::QueryArray to perform the LoadArrayByCompanyId query
			try {
				return LemonloversAssessment::QueryArray(
					QQ::Equal(QQN::LemonloversAssessment()->CompanyId, $intCompanyId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count LemonloversAssessments
		 * by CompanyId Index(es)
		 * @param integer $intCompanyId
		 * @return int
		*/
		public static function CountByCompanyId($intCompanyId, $objOptionalClauses = null) {
			// Call LemonloversAssessment::QueryCount to perform the CountByCompanyId query
			return LemonloversAssessment::QueryCount(
				QQ::Equal(QQN::LemonloversAssessment()->CompanyId, $intCompanyId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of LemonloversAssessment objects,
		 * by ResourceId Index(es)
		 * @param integer $intResourceId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return LemonloversAssessment[]
		*/
		public static function LoadArrayByResourceId($intResourceId, $objOptionalClauses = null) {
			// Call LemonloversAssessment::QueryArray to perform the LoadArrayByResourceId query
			try {
				return LemonloversAssessment::QueryArray(
					QQ::Equal(QQN::LemonloversAssessment()->ResourceId, $intResourceId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count LemonloversAssessments
		 * by ResourceId Index(es)
		 * @param integer $intResourceId
		 * @return int
		*/
		public static function CountByResourceId($intResourceId, $objOptionalClauses = null) {
			// Call LemonloversAssessment::QueryCount to perform the CountByResourceId query
			return LemonloversAssessment::QueryCount(
				QQ::Equal(QQN::LemonloversAssessment()->ResourceId, $intResourceId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of LemonloversAssessment objects,
		 * by GroupId Index(es)
		 * @param integer $intGroupId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return LemonloversAssessment[]
		*/
		public static function LoadArrayByGroupId($intGroupId, $objOptionalClauses = null) {
			// Call LemonloversAssessment::QueryArray to perform the LoadArrayByGroupId query
			try {
				return LemonloversAssessment::QueryArray(
					QQ::Equal(QQN::LemonloversAssessment()->GroupId, $intGroupId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count LemonloversAssessments
		 * by GroupId Index(es)
		 * @param integer $intGroupId
		 * @return int
		*/
		public static function CountByGroupId($intGroupId, $objOptionalClauses = null) {
			// Call LemonloversAssessment::QueryCount to perform the CountByGroupId query
			return LemonloversAssessment::QueryCount(
				QQ::Equal(QQN::LemonloversAssessment()->GroupId, $intGroupId)
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
		 * Save this LemonloversAssessment
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = LemonloversAssessment::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `lemonlovers_assessment` (
							`user_id`,
							`company_id`,
							`resource_id`,
							`resource_status_id`,
							`group_id`,
							`l`,
							`e`,
							`m`,
							`o`,
							`n`,
							`date_modified`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intUserId) . ',
							' . $objDatabase->SqlVariable($this->intCompanyId) . ',
							' . $objDatabase->SqlVariable($this->intResourceId) . ',
							' . $objDatabase->SqlVariable($this->intResourceStatusId) . ',
							' . $objDatabase->SqlVariable($this->intGroupId) . ',
							' . $objDatabase->SqlVariable($this->intL) . ',
							' . $objDatabase->SqlVariable($this->intE) . ',
							' . $objDatabase->SqlVariable($this->intM) . ',
							' . $objDatabase->SqlVariable($this->intO) . ',
							' . $objDatabase->SqlVariable($this->intN) . ',
							' . $objDatabase->SqlVariable($this->dttDateModified) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('lemonlovers_assessment', 'id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`lemonlovers_assessment`
						SET
							`user_id` = ' . $objDatabase->SqlVariable($this->intUserId) . ',
							`company_id` = ' . $objDatabase->SqlVariable($this->intCompanyId) . ',
							`resource_id` = ' . $objDatabase->SqlVariable($this->intResourceId) . ',
							`resource_status_id` = ' . $objDatabase->SqlVariable($this->intResourceStatusId) . ',
							`group_id` = ' . $objDatabase->SqlVariable($this->intGroupId) . ',
							`l` = ' . $objDatabase->SqlVariable($this->intL) . ',
							`e` = ' . $objDatabase->SqlVariable($this->intE) . ',
							`m` = ' . $objDatabase->SqlVariable($this->intM) . ',
							`o` = ' . $objDatabase->SqlVariable($this->intO) . ',
							`n` = ' . $objDatabase->SqlVariable($this->intN) . ',
							`date_modified` = ' . $objDatabase->SqlVariable($this->dttDateModified) . '
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
		 * Delete this LemonloversAssessment
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this LemonloversAssessment with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = LemonloversAssessment::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`lemonlovers_assessment`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all LemonloversAssessments
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = LemonloversAssessment::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`lemonlovers_assessment`');
		}

		/**
		 * Truncate lemonlovers_assessment table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = LemonloversAssessment::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `lemonlovers_assessment`');
		}

		/**
		 * Reload this LemonloversAssessment from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved LemonloversAssessment object.');

			// Reload the Object
			$objReloaded = LemonloversAssessment::Load($this->intId);

			// Update $this's local variables to match
			$this->UserId = $objReloaded->UserId;
			$this->CompanyId = $objReloaded->CompanyId;
			$this->ResourceId = $objReloaded->ResourceId;
			$this->intResourceStatusId = $objReloaded->intResourceStatusId;
			$this->GroupId = $objReloaded->GroupId;
			$this->intL = $objReloaded->intL;
			$this->intE = $objReloaded->intE;
			$this->intM = $objReloaded->intM;
			$this->intO = $objReloaded->intO;
			$this->intN = $objReloaded->intN;
			$this->dttDateModified = $objReloaded->dttDateModified;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = LemonloversAssessment::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `lemonlovers_assessment` (
					`id`,
					`user_id`,
					`company_id`,
					`resource_id`,
					`resource_status_id`,
					`group_id`,
					`l`,
					`e`,
					`m`,
					`o`,
					`n`,
					`date_modified`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->intUserId) . ',
					' . $objDatabase->SqlVariable($this->intCompanyId) . ',
					' . $objDatabase->SqlVariable($this->intResourceId) . ',
					' . $objDatabase->SqlVariable($this->intResourceStatusId) . ',
					' . $objDatabase->SqlVariable($this->intGroupId) . ',
					' . $objDatabase->SqlVariable($this->intL) . ',
					' . $objDatabase->SqlVariable($this->intE) . ',
					' . $objDatabase->SqlVariable($this->intM) . ',
					' . $objDatabase->SqlVariable($this->intO) . ',
					' . $objDatabase->SqlVariable($this->intN) . ',
					' . $objDatabase->SqlVariable($this->dttDateModified) . ',
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
		 * @return LemonloversAssessment[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = LemonloversAssessment::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM lemonlovers_assessment WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return LemonloversAssessment::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return LemonloversAssessment[]
		 */
		public function GetJournal() {
			return LemonloversAssessment::GetJournalForId($this->intId);
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

				case 'CompanyId':
					// Gets the value for intCompanyId 
					// @return integer
					return $this->intCompanyId;

				case 'ResourceId':
					// Gets the value for intResourceId 
					// @return integer
					return $this->intResourceId;

				case 'ResourceStatusId':
					// Gets the value for intResourceStatusId 
					// @return integer
					return $this->intResourceStatusId;

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

				case 'Company':
					// Gets the value for the Company object referenced by intCompanyId 
					// @return Company
					try {
						if ((!$this->objCompany) && (!is_null($this->intCompanyId)))
							$this->objCompany = Company::Load($this->intCompanyId);
						return $this->objCompany;
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

				case 'CompanyId':
					// Sets the value for intCompanyId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objCompany = null;
						return ($this->intCompanyId = QType::Cast($mixValue, QType::Integer));
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
							throw new QCallerException('Unable to set an unsaved User for this LemonloversAssessment');

						// Update Local Member Variables
						$this->objUser = $mixValue;
						$this->intUserId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Company':
					// Sets the value for the Company object referenced by intCompanyId 
					// @param Company $mixValue
					// @return Company
					if (is_null($mixValue)) {
						$this->intCompanyId = null;
						$this->objCompany = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Company object
						try {
							$mixValue = QType::Cast($mixValue, 'Company');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Company object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Company for this LemonloversAssessment');

						// Update Local Member Variables
						$this->objCompany = $mixValue;
						$this->intCompanyId = $mixValue->Id;

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
							throw new QCallerException('Unable to set an unsaved Resource for this LemonloversAssessment');

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
							throw new QCallerException('Unable to set an unsaved Group for this LemonloversAssessment');

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





		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="LemonloversAssessment"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="User" type="xsd1:User"/>';
			$strToReturn .= '<element name="Company" type="xsd1:Company"/>';
			$strToReturn .= '<element name="Resource" type="xsd1:Resource"/>';
			$strToReturn .= '<element name="ResourceStatusId" type="xsd:int"/>';
			$strToReturn .= '<element name="Group" type="xsd1:GroupAssessmentList"/>';
			$strToReturn .= '<element name="L" type="xsd:int"/>';
			$strToReturn .= '<element name="E" type="xsd:int"/>';
			$strToReturn .= '<element name="M" type="xsd:int"/>';
			$strToReturn .= '<element name="O" type="xsd:int"/>';
			$strToReturn .= '<element name="N" type="xsd:int"/>';
			$strToReturn .= '<element name="DateModified" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('LemonloversAssessment', $strComplexTypeArray)) {
				$strComplexTypeArray['LemonloversAssessment'] = LemonloversAssessment::GetSoapComplexTypeXml();
				User::AlterSoapComplexTypeArray($strComplexTypeArray);
				Company::AlterSoapComplexTypeArray($strComplexTypeArray);
				Resource::AlterSoapComplexTypeArray($strComplexTypeArray);
				GroupAssessmentList::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, LemonloversAssessment::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new LemonloversAssessment();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'User')) &&
				($objSoapObject->User))
				$objToReturn->User = User::GetObjectFromSoapObject($objSoapObject->User);
			if ((property_exists($objSoapObject, 'Company')) &&
				($objSoapObject->Company))
				$objToReturn->Company = Company::GetObjectFromSoapObject($objSoapObject->Company);
			if ((property_exists($objSoapObject, 'Resource')) &&
				($objSoapObject->Resource))
				$objToReturn->Resource = Resource::GetObjectFromSoapObject($objSoapObject->Resource);
			if (property_exists($objSoapObject, 'ResourceStatusId'))
				$objToReturn->intResourceStatusId = $objSoapObject->ResourceStatusId;
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
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, LemonloversAssessment::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objUser)
				$objObject->objUser = User::GetSoapObjectFromObject($objObject->objUser, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intUserId = null;
			if ($objObject->objCompany)
				$objObject->objCompany = Company::GetSoapObjectFromObject($objObject->objCompany, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCompanyId = null;
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
	 * @property-read QQNode $CompanyId
	 * @property-read QQNodeCompany $Company
	 * @property-read QQNode $ResourceId
	 * @property-read QQNodeResource $Resource
	 * @property-read QQNode $ResourceStatusId
	 * @property-read QQNode $GroupId
	 * @property-read QQNodeGroupAssessmentList $Group
	 * @property-read QQNode $L
	 * @property-read QQNode $E
	 * @property-read QQNode $M
	 * @property-read QQNode $O
	 * @property-read QQNode $N
	 * @property-read QQNode $DateModified
	 */
	class QQNodeLemonloversAssessment extends QQNode {
		protected $strTableName = 'lemonlovers_assessment';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'LemonloversAssessment';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'UserId':
					return new QQNode('user_id', 'UserId', 'integer', $this);
				case 'User':
					return new QQNodeUser('user_id', 'User', 'integer', $this);
				case 'CompanyId':
					return new QQNode('company_id', 'CompanyId', 'integer', $this);
				case 'Company':
					return new QQNodeCompany('company_id', 'Company', 'integer', $this);
				case 'ResourceId':
					return new QQNode('resource_id', 'ResourceId', 'integer', $this);
				case 'Resource':
					return new QQNodeResource('resource_id', 'Resource', 'integer', $this);
				case 'ResourceStatusId':
					return new QQNode('resource_status_id', 'ResourceStatusId', 'integer', $this);
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
	 * @property-read QQNode $CompanyId
	 * @property-read QQNodeCompany $Company
	 * @property-read QQNode $ResourceId
	 * @property-read QQNodeResource $Resource
	 * @property-read QQNode $ResourceStatusId
	 * @property-read QQNode $GroupId
	 * @property-read QQNodeGroupAssessmentList $Group
	 * @property-read QQNode $L
	 * @property-read QQNode $E
	 * @property-read QQNode $M
	 * @property-read QQNode $O
	 * @property-read QQNode $N
	 * @property-read QQNode $DateModified
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeLemonloversAssessment extends QQReverseReferenceNode {
		protected $strTableName = 'lemonlovers_assessment';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'LemonloversAssessment';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'UserId':
					return new QQNode('user_id', 'UserId', 'integer', $this);
				case 'User':
					return new QQNodeUser('user_id', 'User', 'integer', $this);
				case 'CompanyId':
					return new QQNode('company_id', 'CompanyId', 'integer', $this);
				case 'Company':
					return new QQNodeCompany('company_id', 'Company', 'integer', $this);
				case 'ResourceId':
					return new QQNode('resource_id', 'ResourceId', 'integer', $this);
				case 'Resource':
					return new QQNodeResource('resource_id', 'Resource', 'integer', $this);
				case 'ResourceStatusId':
					return new QQNode('resource_status_id', 'ResourceStatusId', 'integer', $this);
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