<?php
	/**
	 * The abstract GroupAssessmentListGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the GroupAssessmentList subclass which
	 * extends this GroupAssessmentListGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the GroupAssessmentList class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property integer $TotalKeys the value for intTotalKeys 
	 * @property integer $KeysLeft the value for intKeysLeft 
	 * @property integer $ResourceId the value for intResourceId 
	 * @property string $KeyCode the value for strKeyCode (Unique)
	 * @property string $Description the value for strDescription 
	 * @property QDateTime $DateModified the value for dttDateModified 
	 * @property Resource $Resource the value for the Resource object referenced by intResourceId 
	 * @property User $_UserAsAssessmentManager the value for the private _objUserAsAssessmentManager (Read-Only) if set due to an expansion on the assessment_manager_assn association table
	 * @property User[] $_UserAsAssessmentManagerArray the value for the private _objUserAsAssessmentManagerArray (Read-Only) if set due to an ExpandAsArray on the assessment_manager_assn association table
	 * @property IntegrationAssessment $_IntegrationAssessmentAsGroup the value for the private _objIntegrationAssessmentAsGroup (Read-Only) if set due to an expansion on the integration_assessment.group_id reverse relationship
	 * @property IntegrationAssessment[] $_IntegrationAssessmentAsGroupArray the value for the private _objIntegrationAssessmentAsGroupArray (Read-Only) if set due to an ExpandAsArray on the integration_assessment.group_id reverse relationship
	 * @property KingdomBusinessAssessment $_KingdomBusinessAssessmentAsGroup the value for the private _objKingdomBusinessAssessmentAsGroup (Read-Only) if set due to an expansion on the kingdom_business_assessment.group_id reverse relationship
	 * @property KingdomBusinessAssessment[] $_KingdomBusinessAssessmentAsGroupArray the value for the private _objKingdomBusinessAssessmentAsGroupArray (Read-Only) if set due to an ExpandAsArray on the kingdom_business_assessment.group_id reverse relationship
	 * @property Lemon50Assessment $_Lemon50AssessmentAsGroup the value for the private _objLemon50AssessmentAsGroup (Read-Only) if set due to an expansion on the lemon50_assessment.group_id reverse relationship
	 * @property Lemon50Assessment[] $_Lemon50AssessmentAsGroupArray the value for the private _objLemon50AssessmentAsGroupArray (Read-Only) if set due to an ExpandAsArray on the lemon50_assessment.group_id reverse relationship
	 * @property LemonAssessment $_LemonAssessmentAsGroup the value for the private _objLemonAssessmentAsGroup (Read-Only) if set due to an expansion on the lemon_assessment.group_id reverse relationship
	 * @property LemonAssessment[] $_LemonAssessmentAsGroupArray the value for the private _objLemonAssessmentAsGroupArray (Read-Only) if set due to an ExpandAsArray on the lemon_assessment.group_id reverse relationship
	 * @property LemonloversAssessment $_LemonloversAssessmentAsGroup the value for the private _objLemonloversAssessmentAsGroup (Read-Only) if set due to an expansion on the lemonlovers_assessment.group_id reverse relationship
	 * @property LemonloversAssessment[] $_LemonloversAssessmentAsGroupArray the value for the private _objLemonloversAssessmentAsGroupArray (Read-Only) if set due to an ExpandAsArray on the lemonlovers_assessment.group_id reverse relationship
	 * @property LraAssessment $_LraAssessmentAsGroup the value for the private _objLraAssessmentAsGroup (Read-Only) if set due to an expansion on the lra_assessment.group_id reverse relationship
	 * @property LraAssessment[] $_LraAssessmentAsGroupArray the value for the private _objLraAssessmentAsGroupArray (Read-Only) if set due to an ExpandAsArray on the lra_assessment.group_id reverse relationship
	 * @property PartneringAwarenessAssessment $_PartneringAwarenessAssessmentAsGroup the value for the private _objPartneringAwarenessAssessmentAsGroup (Read-Only) if set due to an expansion on the partnering_awareness_assessment.group_id reverse relationship
	 * @property PartneringAwarenessAssessment[] $_PartneringAwarenessAssessmentAsGroupArray the value for the private _objPartneringAwarenessAssessmentAsGroupArray (Read-Only) if set due to an ExpandAsArray on the partnering_awareness_assessment.group_id reverse relationship
	 * @property PartneringReadinessAssessment $_PartneringReadinessAssessmentAsGroup the value for the private _objPartneringReadinessAssessmentAsGroup (Read-Only) if set due to an expansion on the partnering_readiness_assessment.group_id reverse relationship
	 * @property PartneringReadinessAssessment[] $_PartneringReadinessAssessmentAsGroupArray the value for the private _objPartneringReadinessAssessmentAsGroupArray (Read-Only) if set due to an ExpandAsArray on the partnering_readiness_assessment.group_id reverse relationship
	 * @property PostventureAssessment $_PostventureAssessmentAsGroup the value for the private _objPostventureAssessmentAsGroup (Read-Only) if set due to an expansion on the postventure_assessment.group_id reverse relationship
	 * @property PostventureAssessment[] $_PostventureAssessmentAsGroupArray the value for the private _objPostventureAssessmentAsGroupArray (Read-Only) if set due to an ExpandAsArray on the postventure_assessment.group_id reverse relationship
	 * @property SeasonalAssessment $_SeasonalAssessmentAsGroup the value for the private _objSeasonalAssessmentAsGroup (Read-Only) if set due to an expansion on the seasonal_assessment.group_id reverse relationship
	 * @property SeasonalAssessment[] $_SeasonalAssessmentAsGroupArray the value for the private _objSeasonalAssessmentAsGroupArray (Read-Only) if set due to an ExpandAsArray on the seasonal_assessment.group_id reverse relationship
	 * @property TenFAssessment $_TenFAssessmentAsGroup the value for the private _objTenFAssessmentAsGroup (Read-Only) if set due to an expansion on the ten_f_assessment.group_id reverse relationship
	 * @property TenFAssessment[] $_TenFAssessmentAsGroupArray the value for the private _objTenFAssessmentAsGroupArray (Read-Only) if set due to an ExpandAsArray on the ten_f_assessment.group_id reverse relationship
	 * @property TenPAssessment $_TenPAssessmentAsGroup the value for the private _objTenPAssessmentAsGroup (Read-Only) if set due to an expansion on the ten_p_assessment.group_id reverse relationship
	 * @property TenPAssessment[] $_TenPAssessmentAsGroupArray the value for the private _objTenPAssessmentAsGroupArray (Read-Only) if set due to an ExpandAsArray on the ten_p_assessment.group_id reverse relationship
	 * @property TimeAssessment $_TimeAssessmentAsGroup the value for the private _objTimeAssessmentAsGroup (Read-Only) if set due to an expansion on the time_assessment.group_id reverse relationship
	 * @property TimeAssessment[] $_TimeAssessmentAsGroupArray the value for the private _objTimeAssessmentAsGroupArray (Read-Only) if set due to an ExpandAsArray on the time_assessment.group_id reverse relationship
	 * @property UpwardAssessment $_UpwardAssessmentAsGroup the value for the private _objUpwardAssessmentAsGroup (Read-Only) if set due to an expansion on the upward_assessment.group_id reverse relationship
	 * @property UpwardAssessment[] $_UpwardAssessmentAsGroupArray the value for the private _objUpwardAssessmentAsGroupArray (Read-Only) if set due to an ExpandAsArray on the upward_assessment.group_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class GroupAssessmentListGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column group_assessment_list.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column group_assessment_list.total_keys
		 * @var integer intTotalKeys
		 */
		protected $intTotalKeys;
		const TotalKeysDefault = null;


		/**
		 * Protected member variable that maps to the database column group_assessment_list.keys_left
		 * @var integer intKeysLeft
		 */
		protected $intKeysLeft;
		const KeysLeftDefault = null;


		/**
		 * Protected member variable that maps to the database column group_assessment_list.resource_id
		 * @var integer intResourceId
		 */
		protected $intResourceId;
		const ResourceIdDefault = null;


		/**
		 * Protected member variable that maps to the database column group_assessment_list.key_code
		 * @var string strKeyCode
		 */
		protected $strKeyCode;
		const KeyCodeMaxLength = 255;
		const KeyCodeDefault = null;


		/**
		 * Protected member variable that maps to the database column group_assessment_list.description
		 * @var string strDescription
		 */
		protected $strDescription;
		const DescriptionMaxLength = 255;
		const DescriptionDefault = null;


		/**
		 * Protected member variable that maps to the database column group_assessment_list.date_modified
		 * @var QDateTime dttDateModified
		 */
		protected $dttDateModified;
		const DateModifiedDefault = null;


		/**
		 * Private member variable that stores a reference to a single UserAsAssessmentManager object
		 * (of type User), if this GroupAssessmentList object was restored with
		 * an expansion on the assessment_manager_assn association table.
		 * @var User _objUserAsAssessmentManager;
		 */
		private $_objUserAsAssessmentManager;

		/**
		 * Private member variable that stores a reference to an array of UserAsAssessmentManager objects
		 * (of type User[]), if this GroupAssessmentList object was restored with
		 * an ExpandAsArray on the assessment_manager_assn association table.
		 * @var User[] _objUserAsAssessmentManagerArray;
		 */
		private $_objUserAsAssessmentManagerArray = array();

		/**
		 * Private member variable that stores a reference to a single IntegrationAssessmentAsGroup object
		 * (of type IntegrationAssessment), if this GroupAssessmentList object was restored with
		 * an expansion on the integration_assessment association table.
		 * @var IntegrationAssessment _objIntegrationAssessmentAsGroup;
		 */
		private $_objIntegrationAssessmentAsGroup;

		/**
		 * Private member variable that stores a reference to an array of IntegrationAssessmentAsGroup objects
		 * (of type IntegrationAssessment[]), if this GroupAssessmentList object was restored with
		 * an ExpandAsArray on the integration_assessment association table.
		 * @var IntegrationAssessment[] _objIntegrationAssessmentAsGroupArray;
		 */
		private $_objIntegrationAssessmentAsGroupArray = array();

		/**
		 * Private member variable that stores a reference to a single KingdomBusinessAssessmentAsGroup object
		 * (of type KingdomBusinessAssessment), if this GroupAssessmentList object was restored with
		 * an expansion on the kingdom_business_assessment association table.
		 * @var KingdomBusinessAssessment _objKingdomBusinessAssessmentAsGroup;
		 */
		private $_objKingdomBusinessAssessmentAsGroup;

		/**
		 * Private member variable that stores a reference to an array of KingdomBusinessAssessmentAsGroup objects
		 * (of type KingdomBusinessAssessment[]), if this GroupAssessmentList object was restored with
		 * an ExpandAsArray on the kingdom_business_assessment association table.
		 * @var KingdomBusinessAssessment[] _objKingdomBusinessAssessmentAsGroupArray;
		 */
		private $_objKingdomBusinessAssessmentAsGroupArray = array();

		/**
		 * Private member variable that stores a reference to a single Lemon50AssessmentAsGroup object
		 * (of type Lemon50Assessment), if this GroupAssessmentList object was restored with
		 * an expansion on the lemon50_assessment association table.
		 * @var Lemon50Assessment _objLemon50AssessmentAsGroup;
		 */
		private $_objLemon50AssessmentAsGroup;

		/**
		 * Private member variable that stores a reference to an array of Lemon50AssessmentAsGroup objects
		 * (of type Lemon50Assessment[]), if this GroupAssessmentList object was restored with
		 * an ExpandAsArray on the lemon50_assessment association table.
		 * @var Lemon50Assessment[] _objLemon50AssessmentAsGroupArray;
		 */
		private $_objLemon50AssessmentAsGroupArray = array();

		/**
		 * Private member variable that stores a reference to a single LemonAssessmentAsGroup object
		 * (of type LemonAssessment), if this GroupAssessmentList object was restored with
		 * an expansion on the lemon_assessment association table.
		 * @var LemonAssessment _objLemonAssessmentAsGroup;
		 */
		private $_objLemonAssessmentAsGroup;

		/**
		 * Private member variable that stores a reference to an array of LemonAssessmentAsGroup objects
		 * (of type LemonAssessment[]), if this GroupAssessmentList object was restored with
		 * an ExpandAsArray on the lemon_assessment association table.
		 * @var LemonAssessment[] _objLemonAssessmentAsGroupArray;
		 */
		private $_objLemonAssessmentAsGroupArray = array();

		/**
		 * Private member variable that stores a reference to a single LemonloversAssessmentAsGroup object
		 * (of type LemonloversAssessment), if this GroupAssessmentList object was restored with
		 * an expansion on the lemonlovers_assessment association table.
		 * @var LemonloversAssessment _objLemonloversAssessmentAsGroup;
		 */
		private $_objLemonloversAssessmentAsGroup;

		/**
		 * Private member variable that stores a reference to an array of LemonloversAssessmentAsGroup objects
		 * (of type LemonloversAssessment[]), if this GroupAssessmentList object was restored with
		 * an ExpandAsArray on the lemonlovers_assessment association table.
		 * @var LemonloversAssessment[] _objLemonloversAssessmentAsGroupArray;
		 */
		private $_objLemonloversAssessmentAsGroupArray = array();

		/**
		 * Private member variable that stores a reference to a single LraAssessmentAsGroup object
		 * (of type LraAssessment), if this GroupAssessmentList object was restored with
		 * an expansion on the lra_assessment association table.
		 * @var LraAssessment _objLraAssessmentAsGroup;
		 */
		private $_objLraAssessmentAsGroup;

		/**
		 * Private member variable that stores a reference to an array of LraAssessmentAsGroup objects
		 * (of type LraAssessment[]), if this GroupAssessmentList object was restored with
		 * an ExpandAsArray on the lra_assessment association table.
		 * @var LraAssessment[] _objLraAssessmentAsGroupArray;
		 */
		private $_objLraAssessmentAsGroupArray = array();

		/**
		 * Private member variable that stores a reference to a single PartneringAwarenessAssessmentAsGroup object
		 * (of type PartneringAwarenessAssessment), if this GroupAssessmentList object was restored with
		 * an expansion on the partnering_awareness_assessment association table.
		 * @var PartneringAwarenessAssessment _objPartneringAwarenessAssessmentAsGroup;
		 */
		private $_objPartneringAwarenessAssessmentAsGroup;

		/**
		 * Private member variable that stores a reference to an array of PartneringAwarenessAssessmentAsGroup objects
		 * (of type PartneringAwarenessAssessment[]), if this GroupAssessmentList object was restored with
		 * an ExpandAsArray on the partnering_awareness_assessment association table.
		 * @var PartneringAwarenessAssessment[] _objPartneringAwarenessAssessmentAsGroupArray;
		 */
		private $_objPartneringAwarenessAssessmentAsGroupArray = array();

		/**
		 * Private member variable that stores a reference to a single PartneringReadinessAssessmentAsGroup object
		 * (of type PartneringReadinessAssessment), if this GroupAssessmentList object was restored with
		 * an expansion on the partnering_readiness_assessment association table.
		 * @var PartneringReadinessAssessment _objPartneringReadinessAssessmentAsGroup;
		 */
		private $_objPartneringReadinessAssessmentAsGroup;

		/**
		 * Private member variable that stores a reference to an array of PartneringReadinessAssessmentAsGroup objects
		 * (of type PartneringReadinessAssessment[]), if this GroupAssessmentList object was restored with
		 * an ExpandAsArray on the partnering_readiness_assessment association table.
		 * @var PartneringReadinessAssessment[] _objPartneringReadinessAssessmentAsGroupArray;
		 */
		private $_objPartneringReadinessAssessmentAsGroupArray = array();

		/**
		 * Private member variable that stores a reference to a single PostventureAssessmentAsGroup object
		 * (of type PostventureAssessment), if this GroupAssessmentList object was restored with
		 * an expansion on the postventure_assessment association table.
		 * @var PostventureAssessment _objPostventureAssessmentAsGroup;
		 */
		private $_objPostventureAssessmentAsGroup;

		/**
		 * Private member variable that stores a reference to an array of PostventureAssessmentAsGroup objects
		 * (of type PostventureAssessment[]), if this GroupAssessmentList object was restored with
		 * an ExpandAsArray on the postventure_assessment association table.
		 * @var PostventureAssessment[] _objPostventureAssessmentAsGroupArray;
		 */
		private $_objPostventureAssessmentAsGroupArray = array();

		/**
		 * Private member variable that stores a reference to a single SeasonalAssessmentAsGroup object
		 * (of type SeasonalAssessment), if this GroupAssessmentList object was restored with
		 * an expansion on the seasonal_assessment association table.
		 * @var SeasonalAssessment _objSeasonalAssessmentAsGroup;
		 */
		private $_objSeasonalAssessmentAsGroup;

		/**
		 * Private member variable that stores a reference to an array of SeasonalAssessmentAsGroup objects
		 * (of type SeasonalAssessment[]), if this GroupAssessmentList object was restored with
		 * an ExpandAsArray on the seasonal_assessment association table.
		 * @var SeasonalAssessment[] _objSeasonalAssessmentAsGroupArray;
		 */
		private $_objSeasonalAssessmentAsGroupArray = array();

		/**
		 * Private member variable that stores a reference to a single TenFAssessmentAsGroup object
		 * (of type TenFAssessment), if this GroupAssessmentList object was restored with
		 * an expansion on the ten_f_assessment association table.
		 * @var TenFAssessment _objTenFAssessmentAsGroup;
		 */
		private $_objTenFAssessmentAsGroup;

		/**
		 * Private member variable that stores a reference to an array of TenFAssessmentAsGroup objects
		 * (of type TenFAssessment[]), if this GroupAssessmentList object was restored with
		 * an ExpandAsArray on the ten_f_assessment association table.
		 * @var TenFAssessment[] _objTenFAssessmentAsGroupArray;
		 */
		private $_objTenFAssessmentAsGroupArray = array();

		/**
		 * Private member variable that stores a reference to a single TenPAssessmentAsGroup object
		 * (of type TenPAssessment), if this GroupAssessmentList object was restored with
		 * an expansion on the ten_p_assessment association table.
		 * @var TenPAssessment _objTenPAssessmentAsGroup;
		 */
		private $_objTenPAssessmentAsGroup;

		/**
		 * Private member variable that stores a reference to an array of TenPAssessmentAsGroup objects
		 * (of type TenPAssessment[]), if this GroupAssessmentList object was restored with
		 * an ExpandAsArray on the ten_p_assessment association table.
		 * @var TenPAssessment[] _objTenPAssessmentAsGroupArray;
		 */
		private $_objTenPAssessmentAsGroupArray = array();

		/**
		 * Private member variable that stores a reference to a single TimeAssessmentAsGroup object
		 * (of type TimeAssessment), if this GroupAssessmentList object was restored with
		 * an expansion on the time_assessment association table.
		 * @var TimeAssessment _objTimeAssessmentAsGroup;
		 */
		private $_objTimeAssessmentAsGroup;

		/**
		 * Private member variable that stores a reference to an array of TimeAssessmentAsGroup objects
		 * (of type TimeAssessment[]), if this GroupAssessmentList object was restored with
		 * an ExpandAsArray on the time_assessment association table.
		 * @var TimeAssessment[] _objTimeAssessmentAsGroupArray;
		 */
		private $_objTimeAssessmentAsGroupArray = array();

		/**
		 * Private member variable that stores a reference to a single UpwardAssessmentAsGroup object
		 * (of type UpwardAssessment), if this GroupAssessmentList object was restored with
		 * an expansion on the upward_assessment association table.
		 * @var UpwardAssessment _objUpwardAssessmentAsGroup;
		 */
		private $_objUpwardAssessmentAsGroup;

		/**
		 * Private member variable that stores a reference to an array of UpwardAssessmentAsGroup objects
		 * (of type UpwardAssessment[]), if this GroupAssessmentList object was restored with
		 * an ExpandAsArray on the upward_assessment association table.
		 * @var UpwardAssessment[] _objUpwardAssessmentAsGroupArray;
		 */
		private $_objUpwardAssessmentAsGroupArray = array();

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
		 * in the database column group_assessment_list.resource_id.
		 *
		 * NOTE: Always use the Resource property getter to correctly retrieve this Resource object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Resource objResource
		 */
		protected $objResource;





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
		 * Load a GroupAssessmentList from PK Info
		 * @param integer $intId
		 * @return GroupAssessmentList
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return GroupAssessmentList::QuerySingle(
				QQ::Equal(QQN::GroupAssessmentList()->Id, $intId)
			);
		}

		/**
		 * Load all GroupAssessmentLists
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GroupAssessmentList[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call GroupAssessmentList::QueryArray to perform the LoadAll query
			try {
				return GroupAssessmentList::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all GroupAssessmentLists
		 * @return int
		 */
		public static function CountAll() {
			// Call GroupAssessmentList::QueryCount to perform the CountAll query
			return GroupAssessmentList::QueryCount(QQ::All());
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
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Create/Build out the QueryBuilder object with GroupAssessmentList-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'group_assessment_list');
			GroupAssessmentList::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('group_assessment_list');

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
		 * Static Qcodo Query method to query for a single GroupAssessmentList object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return GroupAssessmentList the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = GroupAssessmentList::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new GroupAssessmentList object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = GroupAssessmentList::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return GroupAssessmentList::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of GroupAssessmentList objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return GroupAssessmentList[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = GroupAssessmentList::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return GroupAssessmentList::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = GroupAssessmentList::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of GroupAssessmentList objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = GroupAssessmentList::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'group_assessment_list_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with GroupAssessmentList-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				GroupAssessmentList::GetSelectFields($objQueryBuilder);
				GroupAssessmentList::GetFromFields($objQueryBuilder);

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
			return GroupAssessmentList::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this GroupAssessmentList
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'group_assessment_list';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'total_keys', $strAliasPrefix . 'total_keys');
			$objBuilder->AddSelectItem($strTableName, 'keys_left', $strAliasPrefix . 'keys_left');
			$objBuilder->AddSelectItem($strTableName, 'resource_id', $strAliasPrefix . 'resource_id');
			$objBuilder->AddSelectItem($strTableName, 'key_code', $strAliasPrefix . 'key_code');
			$objBuilder->AddSelectItem($strTableName, 'description', $strAliasPrefix . 'description');
			$objBuilder->AddSelectItem($strTableName, 'date_modified', $strAliasPrefix . 'date_modified');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a GroupAssessmentList from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this GroupAssessmentList::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return GroupAssessmentList
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
					$strAliasPrefix = 'group_assessment_list__';

				$strAlias = $strAliasPrefix . 'userasassessmentmanager__user_id__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objUserAsAssessmentManagerArray)) {
						$objPreviousChildItem = $objPreviousItem->_objUserAsAssessmentManagerArray[$intPreviousChildItemCount - 1];
						$objChildItem = User::InstantiateDbRow($objDbRow, $strAliasPrefix . 'userasassessmentmanager__user_id__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objUserAsAssessmentManagerArray[] = $objChildItem;
					} else
						$objPreviousItem->_objUserAsAssessmentManagerArray[] = User::InstantiateDbRow($objDbRow, $strAliasPrefix . 'userasassessmentmanager__user_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}


				$strAlias = $strAliasPrefix . 'integrationassessmentasgroup__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objIntegrationAssessmentAsGroupArray)) {
						$objPreviousChildItem = $objPreviousItem->_objIntegrationAssessmentAsGroupArray[$intPreviousChildItemCount - 1];
						$objChildItem = IntegrationAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'integrationassessmentasgroup__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objIntegrationAssessmentAsGroupArray[] = $objChildItem;
					} else
						$objPreviousItem->_objIntegrationAssessmentAsGroupArray[] = IntegrationAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'integrationassessmentasgroup__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'kingdombusinessassessmentasgroup__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objKingdomBusinessAssessmentAsGroupArray)) {
						$objPreviousChildItem = $objPreviousItem->_objKingdomBusinessAssessmentAsGroupArray[$intPreviousChildItemCount - 1];
						$objChildItem = KingdomBusinessAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'kingdombusinessassessmentasgroup__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objKingdomBusinessAssessmentAsGroupArray[] = $objChildItem;
					} else
						$objPreviousItem->_objKingdomBusinessAssessmentAsGroupArray[] = KingdomBusinessAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'kingdombusinessassessmentasgroup__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'lemon50assessmentasgroup__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objLemon50AssessmentAsGroupArray)) {
						$objPreviousChildItem = $objPreviousItem->_objLemon50AssessmentAsGroupArray[$intPreviousChildItemCount - 1];
						$objChildItem = Lemon50Assessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'lemon50assessmentasgroup__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objLemon50AssessmentAsGroupArray[] = $objChildItem;
					} else
						$objPreviousItem->_objLemon50AssessmentAsGroupArray[] = Lemon50Assessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'lemon50assessmentasgroup__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'lemonassessmentasgroup__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objLemonAssessmentAsGroupArray)) {
						$objPreviousChildItem = $objPreviousItem->_objLemonAssessmentAsGroupArray[$intPreviousChildItemCount - 1];
						$objChildItem = LemonAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'lemonassessmentasgroup__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objLemonAssessmentAsGroupArray[] = $objChildItem;
					} else
						$objPreviousItem->_objLemonAssessmentAsGroupArray[] = LemonAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'lemonassessmentasgroup__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'lemonloversassessmentasgroup__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objLemonloversAssessmentAsGroupArray)) {
						$objPreviousChildItem = $objPreviousItem->_objLemonloversAssessmentAsGroupArray[$intPreviousChildItemCount - 1];
						$objChildItem = LemonloversAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'lemonloversassessmentasgroup__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objLemonloversAssessmentAsGroupArray[] = $objChildItem;
					} else
						$objPreviousItem->_objLemonloversAssessmentAsGroupArray[] = LemonloversAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'lemonloversassessmentasgroup__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'lraassessmentasgroup__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objLraAssessmentAsGroupArray)) {
						$objPreviousChildItem = $objPreviousItem->_objLraAssessmentAsGroupArray[$intPreviousChildItemCount - 1];
						$objChildItem = LraAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'lraassessmentasgroup__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objLraAssessmentAsGroupArray[] = $objChildItem;
					} else
						$objPreviousItem->_objLraAssessmentAsGroupArray[] = LraAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'lraassessmentasgroup__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'partneringawarenessassessmentasgroup__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objPartneringAwarenessAssessmentAsGroupArray)) {
						$objPreviousChildItem = $objPreviousItem->_objPartneringAwarenessAssessmentAsGroupArray[$intPreviousChildItemCount - 1];
						$objChildItem = PartneringAwarenessAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'partneringawarenessassessmentasgroup__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objPartneringAwarenessAssessmentAsGroupArray[] = $objChildItem;
					} else
						$objPreviousItem->_objPartneringAwarenessAssessmentAsGroupArray[] = PartneringAwarenessAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'partneringawarenessassessmentasgroup__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'partneringreadinessassessmentasgroup__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objPartneringReadinessAssessmentAsGroupArray)) {
						$objPreviousChildItem = $objPreviousItem->_objPartneringReadinessAssessmentAsGroupArray[$intPreviousChildItemCount - 1];
						$objChildItem = PartneringReadinessAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'partneringreadinessassessmentasgroup__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objPartneringReadinessAssessmentAsGroupArray[] = $objChildItem;
					} else
						$objPreviousItem->_objPartneringReadinessAssessmentAsGroupArray[] = PartneringReadinessAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'partneringreadinessassessmentasgroup__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'postventureassessmentasgroup__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objPostventureAssessmentAsGroupArray)) {
						$objPreviousChildItem = $objPreviousItem->_objPostventureAssessmentAsGroupArray[$intPreviousChildItemCount - 1];
						$objChildItem = PostventureAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'postventureassessmentasgroup__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objPostventureAssessmentAsGroupArray[] = $objChildItem;
					} else
						$objPreviousItem->_objPostventureAssessmentAsGroupArray[] = PostventureAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'postventureassessmentasgroup__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'seasonalassessmentasgroup__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objSeasonalAssessmentAsGroupArray)) {
						$objPreviousChildItem = $objPreviousItem->_objSeasonalAssessmentAsGroupArray[$intPreviousChildItemCount - 1];
						$objChildItem = SeasonalAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'seasonalassessmentasgroup__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objSeasonalAssessmentAsGroupArray[] = $objChildItem;
					} else
						$objPreviousItem->_objSeasonalAssessmentAsGroupArray[] = SeasonalAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'seasonalassessmentasgroup__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'tenfassessmentasgroup__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objTenFAssessmentAsGroupArray)) {
						$objPreviousChildItem = $objPreviousItem->_objTenFAssessmentAsGroupArray[$intPreviousChildItemCount - 1];
						$objChildItem = TenFAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'tenfassessmentasgroup__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objTenFAssessmentAsGroupArray[] = $objChildItem;
					} else
						$objPreviousItem->_objTenFAssessmentAsGroupArray[] = TenFAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'tenfassessmentasgroup__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'tenpassessmentasgroup__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objTenPAssessmentAsGroupArray)) {
						$objPreviousChildItem = $objPreviousItem->_objTenPAssessmentAsGroupArray[$intPreviousChildItemCount - 1];
						$objChildItem = TenPAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'tenpassessmentasgroup__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objTenPAssessmentAsGroupArray[] = $objChildItem;
					} else
						$objPreviousItem->_objTenPAssessmentAsGroupArray[] = TenPAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'tenpassessmentasgroup__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'timeassessmentasgroup__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objTimeAssessmentAsGroupArray)) {
						$objPreviousChildItem = $objPreviousItem->_objTimeAssessmentAsGroupArray[$intPreviousChildItemCount - 1];
						$objChildItem = TimeAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'timeassessmentasgroup__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objTimeAssessmentAsGroupArray[] = $objChildItem;
					} else
						$objPreviousItem->_objTimeAssessmentAsGroupArray[] = TimeAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'timeassessmentasgroup__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'upwardassessmentasgroup__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objUpwardAssessmentAsGroupArray)) {
						$objPreviousChildItem = $objPreviousItem->_objUpwardAssessmentAsGroupArray[$intPreviousChildItemCount - 1];
						$objChildItem = UpwardAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'upwardassessmentasgroup__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objUpwardAssessmentAsGroupArray[] = $objChildItem;
					} else
						$objPreviousItem->_objUpwardAssessmentAsGroupArray[] = UpwardAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'upwardassessmentasgroup__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'group_assessment_list__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the GroupAssessmentList object
			$objToReturn = new GroupAssessmentList();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'total_keys', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'total_keys'] : $strAliasPrefix . 'total_keys';
			$objToReturn->intTotalKeys = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'keys_left', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'keys_left'] : $strAliasPrefix . 'keys_left';
			$objToReturn->intKeysLeft = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'resource_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'resource_id'] : $strAliasPrefix . 'resource_id';
			$objToReturn->intResourceId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'key_code', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'key_code'] : $strAliasPrefix . 'key_code';
			$objToReturn->strKeyCode = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'description', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'description'] : $strAliasPrefix . 'description';
			$objToReturn->strDescription = $objDbRow->GetColumn($strAliasName, 'VarChar');
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
				$strAliasPrefix = 'group_assessment_list__';

			// Check for Resource Early Binding
			$strAlias = $strAliasPrefix . 'resource_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objResource = Resource::InstantiateDbRow($objDbRow, $strAliasPrefix . 'resource_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);



			// Check for UserAsAssessmentManager Virtual Binding
			$strAlias = $strAliasPrefix . 'userasassessmentmanager__user_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objUserAsAssessmentManagerArray[] = User::InstantiateDbRow($objDbRow, $strAliasPrefix . 'userasassessmentmanager__user_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objUserAsAssessmentManager = User::InstantiateDbRow($objDbRow, $strAliasPrefix . 'userasassessmentmanager__user_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}


			// Check for IntegrationAssessmentAsGroup Virtual Binding
			$strAlias = $strAliasPrefix . 'integrationassessmentasgroup__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objIntegrationAssessmentAsGroupArray[] = IntegrationAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'integrationassessmentasgroup__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objIntegrationAssessmentAsGroup = IntegrationAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'integrationassessmentasgroup__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for KingdomBusinessAssessmentAsGroup Virtual Binding
			$strAlias = $strAliasPrefix . 'kingdombusinessassessmentasgroup__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objKingdomBusinessAssessmentAsGroupArray[] = KingdomBusinessAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'kingdombusinessassessmentasgroup__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objKingdomBusinessAssessmentAsGroup = KingdomBusinessAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'kingdombusinessassessmentasgroup__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for Lemon50AssessmentAsGroup Virtual Binding
			$strAlias = $strAliasPrefix . 'lemon50assessmentasgroup__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objLemon50AssessmentAsGroupArray[] = Lemon50Assessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'lemon50assessmentasgroup__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objLemon50AssessmentAsGroup = Lemon50Assessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'lemon50assessmentasgroup__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for LemonAssessmentAsGroup Virtual Binding
			$strAlias = $strAliasPrefix . 'lemonassessmentasgroup__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objLemonAssessmentAsGroupArray[] = LemonAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'lemonassessmentasgroup__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objLemonAssessmentAsGroup = LemonAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'lemonassessmentasgroup__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for LemonloversAssessmentAsGroup Virtual Binding
			$strAlias = $strAliasPrefix . 'lemonloversassessmentasgroup__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objLemonloversAssessmentAsGroupArray[] = LemonloversAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'lemonloversassessmentasgroup__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objLemonloversAssessmentAsGroup = LemonloversAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'lemonloversassessmentasgroup__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for LraAssessmentAsGroup Virtual Binding
			$strAlias = $strAliasPrefix . 'lraassessmentasgroup__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objLraAssessmentAsGroupArray[] = LraAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'lraassessmentasgroup__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objLraAssessmentAsGroup = LraAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'lraassessmentasgroup__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for PartneringAwarenessAssessmentAsGroup Virtual Binding
			$strAlias = $strAliasPrefix . 'partneringawarenessassessmentasgroup__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objPartneringAwarenessAssessmentAsGroupArray[] = PartneringAwarenessAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'partneringawarenessassessmentasgroup__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objPartneringAwarenessAssessmentAsGroup = PartneringAwarenessAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'partneringawarenessassessmentasgroup__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for PartneringReadinessAssessmentAsGroup Virtual Binding
			$strAlias = $strAliasPrefix . 'partneringreadinessassessmentasgroup__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objPartneringReadinessAssessmentAsGroupArray[] = PartneringReadinessAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'partneringreadinessassessmentasgroup__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objPartneringReadinessAssessmentAsGroup = PartneringReadinessAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'partneringreadinessassessmentasgroup__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for PostventureAssessmentAsGroup Virtual Binding
			$strAlias = $strAliasPrefix . 'postventureassessmentasgroup__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objPostventureAssessmentAsGroupArray[] = PostventureAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'postventureassessmentasgroup__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objPostventureAssessmentAsGroup = PostventureAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'postventureassessmentasgroup__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for SeasonalAssessmentAsGroup Virtual Binding
			$strAlias = $strAliasPrefix . 'seasonalassessmentasgroup__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objSeasonalAssessmentAsGroupArray[] = SeasonalAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'seasonalassessmentasgroup__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objSeasonalAssessmentAsGroup = SeasonalAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'seasonalassessmentasgroup__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for TenFAssessmentAsGroup Virtual Binding
			$strAlias = $strAliasPrefix . 'tenfassessmentasgroup__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objTenFAssessmentAsGroupArray[] = TenFAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'tenfassessmentasgroup__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objTenFAssessmentAsGroup = TenFAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'tenfassessmentasgroup__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for TenPAssessmentAsGroup Virtual Binding
			$strAlias = $strAliasPrefix . 'tenpassessmentasgroup__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objTenPAssessmentAsGroupArray[] = TenPAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'tenpassessmentasgroup__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objTenPAssessmentAsGroup = TenPAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'tenpassessmentasgroup__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for TimeAssessmentAsGroup Virtual Binding
			$strAlias = $strAliasPrefix . 'timeassessmentasgroup__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objTimeAssessmentAsGroupArray[] = TimeAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'timeassessmentasgroup__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objTimeAssessmentAsGroup = TimeAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'timeassessmentasgroup__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for UpwardAssessmentAsGroup Virtual Binding
			$strAlias = $strAliasPrefix . 'upwardassessmentasgroup__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objUpwardAssessmentAsGroupArray[] = UpwardAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'upwardassessmentasgroup__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objUpwardAssessmentAsGroup = UpwardAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'upwardassessmentasgroup__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of GroupAssessmentLists from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return GroupAssessmentList[]
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
					$objItem = GroupAssessmentList::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = GroupAssessmentList::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single GroupAssessmentList object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return GroupAssessmentList next row resulting from the query
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
			return GroupAssessmentList::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single GroupAssessmentList object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return GroupAssessmentList
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return GroupAssessmentList::QuerySingle(
				QQ::Equal(QQN::GroupAssessmentList()->Id, $intId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load a single GroupAssessmentList object,
		 * by KeyCode Index(es)
		 * @param string $strKeyCode
		 * @return GroupAssessmentList
		*/
		public static function LoadByKeyCode($strKeyCode, $objOptionalClauses = null) {
			return GroupAssessmentList::QuerySingle(
				QQ::Equal(QQN::GroupAssessmentList()->KeyCode, $strKeyCode)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of GroupAssessmentList objects,
		 * by ResourceId Index(es)
		 * @param integer $intResourceId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GroupAssessmentList[]
		*/
		public static function LoadArrayByResourceId($intResourceId, $objOptionalClauses = null) {
			// Call GroupAssessmentList::QueryArray to perform the LoadArrayByResourceId query
			try {
				return GroupAssessmentList::QueryArray(
					QQ::Equal(QQN::GroupAssessmentList()->ResourceId, $intResourceId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count GroupAssessmentLists
		 * by ResourceId Index(es)
		 * @param integer $intResourceId
		 * @return int
		*/
		public static function CountByResourceId($intResourceId, $objOptionalClauses = null) {
			// Call GroupAssessmentList::QueryCount to perform the CountByResourceId query
			return GroupAssessmentList::QueryCount(
				QQ::Equal(QQN::GroupAssessmentList()->ResourceId, $intResourceId)
			, $objOptionalClauses
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////
			/**
		 * Load an array of User objects for a given UserAsAssessmentManager
		 * via the assessment_manager_assn table
		 * @param integer $intUserId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GroupAssessmentList[]
		*/
		public static function LoadArrayByUserAsAssessmentManager($intUserId, $objOptionalClauses = null) {
			// Call GroupAssessmentList::QueryArray to perform the LoadArrayByUserAsAssessmentManager query
			try {
				return GroupAssessmentList::QueryArray(
					QQ::Equal(QQN::GroupAssessmentList()->UserAsAssessmentManager->UserId, $intUserId),
					$objOptionalClauses
				);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count GroupAssessmentLists for a given UserAsAssessmentManager
		 * via the assessment_manager_assn table
		 * @param integer $intUserId
		 * @return int
		*/
		public static function CountByUserAsAssessmentManager($intUserId, $objOptionalClauses = null) {
			return GroupAssessmentList::QueryCount(
				QQ::Equal(QQN::GroupAssessmentList()->UserAsAssessmentManager->UserId, $intUserId),
				$objOptionalClauses
			);
		}




		//////////////////////////////////////
		// SAVE, DELETE, RELOAD and JOURNALING
		//////////////////////////////////////

		/**
		 * Save this GroupAssessmentList
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `group_assessment_list` (
							`total_keys`,
							`keys_left`,
							`resource_id`,
							`key_code`,
							`description`,
							`date_modified`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intTotalKeys) . ',
							' . $objDatabase->SqlVariable($this->intKeysLeft) . ',
							' . $objDatabase->SqlVariable($this->intResourceId) . ',
							' . $objDatabase->SqlVariable($this->strKeyCode) . ',
							' . $objDatabase->SqlVariable($this->strDescription) . ',
							' . $objDatabase->SqlVariable($this->dttDateModified) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('group_assessment_list', 'id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`group_assessment_list`
						SET
							`total_keys` = ' . $objDatabase->SqlVariable($this->intTotalKeys) . ',
							`keys_left` = ' . $objDatabase->SqlVariable($this->intKeysLeft) . ',
							`resource_id` = ' . $objDatabase->SqlVariable($this->intResourceId) . ',
							`key_code` = ' . $objDatabase->SqlVariable($this->strKeyCode) . ',
							`description` = ' . $objDatabase->SqlVariable($this->strDescription) . ',
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
		 * Delete this GroupAssessmentList
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this GroupAssessmentList with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`group_assessment_list`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all GroupAssessmentLists
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`group_assessment_list`');
		}

		/**
		 * Truncate group_assessment_list table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `group_assessment_list`');
		}

		/**
		 * Reload this GroupAssessmentList from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved GroupAssessmentList object.');

			// Reload the Object
			$objReloaded = GroupAssessmentList::Load($this->intId);

			// Update $this's local variables to match
			$this->intTotalKeys = $objReloaded->intTotalKeys;
			$this->intKeysLeft = $objReloaded->intKeysLeft;
			$this->ResourceId = $objReloaded->ResourceId;
			$this->strKeyCode = $objReloaded->strKeyCode;
			$this->strDescription = $objReloaded->strDescription;
			$this->dttDateModified = $objReloaded->dttDateModified;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = GroupAssessmentList::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `group_assessment_list` (
					`id`,
					`total_keys`,
					`keys_left`,
					`resource_id`,
					`key_code`,
					`description`,
					`date_modified`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->intTotalKeys) . ',
					' . $objDatabase->SqlVariable($this->intKeysLeft) . ',
					' . $objDatabase->SqlVariable($this->intResourceId) . ',
					' . $objDatabase->SqlVariable($this->strKeyCode) . ',
					' . $objDatabase->SqlVariable($this->strDescription) . ',
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
		 * @return GroupAssessmentList[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = GroupAssessmentList::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM group_assessment_list WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return GroupAssessmentList::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return GroupAssessmentList[]
		 */
		public function GetJournal() {
			return GroupAssessmentList::GetJournalForId($this->intId);
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

				case 'TotalKeys':
					// Gets the value for intTotalKeys 
					// @return integer
					return $this->intTotalKeys;

				case 'KeysLeft':
					// Gets the value for intKeysLeft 
					// @return integer
					return $this->intKeysLeft;

				case 'ResourceId':
					// Gets the value for intResourceId 
					// @return integer
					return $this->intResourceId;

				case 'KeyCode':
					// Gets the value for strKeyCode (Unique)
					// @return string
					return $this->strKeyCode;

				case 'Description':
					// Gets the value for strDescription 
					// @return string
					return $this->strDescription;

				case 'DateModified':
					// Gets the value for dttDateModified 
					// @return QDateTime
					return $this->dttDateModified;


				///////////////////
				// Member Objects
				///////////////////
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


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_UserAsAssessmentManager':
					// Gets the value for the private _objUserAsAssessmentManager (Read-Only)
					// if set due to an expansion on the assessment_manager_assn association table
					// @return User
					return $this->_objUserAsAssessmentManager;

				case '_UserAsAssessmentManagerArray':
					// Gets the value for the private _objUserAsAssessmentManagerArray (Read-Only)
					// if set due to an ExpandAsArray on the assessment_manager_assn association table
					// @return User[]
					return (array) $this->_objUserAsAssessmentManagerArray;

				case '_IntegrationAssessmentAsGroup':
					// Gets the value for the private _objIntegrationAssessmentAsGroup (Read-Only)
					// if set due to an expansion on the integration_assessment.group_id reverse relationship
					// @return IntegrationAssessment
					return $this->_objIntegrationAssessmentAsGroup;

				case '_IntegrationAssessmentAsGroupArray':
					// Gets the value for the private _objIntegrationAssessmentAsGroupArray (Read-Only)
					// if set due to an ExpandAsArray on the integration_assessment.group_id reverse relationship
					// @return IntegrationAssessment[]
					return (array) $this->_objIntegrationAssessmentAsGroupArray;

				case '_KingdomBusinessAssessmentAsGroup':
					// Gets the value for the private _objKingdomBusinessAssessmentAsGroup (Read-Only)
					// if set due to an expansion on the kingdom_business_assessment.group_id reverse relationship
					// @return KingdomBusinessAssessment
					return $this->_objKingdomBusinessAssessmentAsGroup;

				case '_KingdomBusinessAssessmentAsGroupArray':
					// Gets the value for the private _objKingdomBusinessAssessmentAsGroupArray (Read-Only)
					// if set due to an ExpandAsArray on the kingdom_business_assessment.group_id reverse relationship
					// @return KingdomBusinessAssessment[]
					return (array) $this->_objKingdomBusinessAssessmentAsGroupArray;

				case '_Lemon50AssessmentAsGroup':
					// Gets the value for the private _objLemon50AssessmentAsGroup (Read-Only)
					// if set due to an expansion on the lemon50_assessment.group_id reverse relationship
					// @return Lemon50Assessment
					return $this->_objLemon50AssessmentAsGroup;

				case '_Lemon50AssessmentAsGroupArray':
					// Gets the value for the private _objLemon50AssessmentAsGroupArray (Read-Only)
					// if set due to an ExpandAsArray on the lemon50_assessment.group_id reverse relationship
					// @return Lemon50Assessment[]
					return (array) $this->_objLemon50AssessmentAsGroupArray;

				case '_LemonAssessmentAsGroup':
					// Gets the value for the private _objLemonAssessmentAsGroup (Read-Only)
					// if set due to an expansion on the lemon_assessment.group_id reverse relationship
					// @return LemonAssessment
					return $this->_objLemonAssessmentAsGroup;

				case '_LemonAssessmentAsGroupArray':
					// Gets the value for the private _objLemonAssessmentAsGroupArray (Read-Only)
					// if set due to an ExpandAsArray on the lemon_assessment.group_id reverse relationship
					// @return LemonAssessment[]
					return (array) $this->_objLemonAssessmentAsGroupArray;

				case '_LemonloversAssessmentAsGroup':
					// Gets the value for the private _objLemonloversAssessmentAsGroup (Read-Only)
					// if set due to an expansion on the lemonlovers_assessment.group_id reverse relationship
					// @return LemonloversAssessment
					return $this->_objLemonloversAssessmentAsGroup;

				case '_LemonloversAssessmentAsGroupArray':
					// Gets the value for the private _objLemonloversAssessmentAsGroupArray (Read-Only)
					// if set due to an ExpandAsArray on the lemonlovers_assessment.group_id reverse relationship
					// @return LemonloversAssessment[]
					return (array) $this->_objLemonloversAssessmentAsGroupArray;

				case '_LraAssessmentAsGroup':
					// Gets the value for the private _objLraAssessmentAsGroup (Read-Only)
					// if set due to an expansion on the lra_assessment.group_id reverse relationship
					// @return LraAssessment
					return $this->_objLraAssessmentAsGroup;

				case '_LraAssessmentAsGroupArray':
					// Gets the value for the private _objLraAssessmentAsGroupArray (Read-Only)
					// if set due to an ExpandAsArray on the lra_assessment.group_id reverse relationship
					// @return LraAssessment[]
					return (array) $this->_objLraAssessmentAsGroupArray;

				case '_PartneringAwarenessAssessmentAsGroup':
					// Gets the value for the private _objPartneringAwarenessAssessmentAsGroup (Read-Only)
					// if set due to an expansion on the partnering_awareness_assessment.group_id reverse relationship
					// @return PartneringAwarenessAssessment
					return $this->_objPartneringAwarenessAssessmentAsGroup;

				case '_PartneringAwarenessAssessmentAsGroupArray':
					// Gets the value for the private _objPartneringAwarenessAssessmentAsGroupArray (Read-Only)
					// if set due to an ExpandAsArray on the partnering_awareness_assessment.group_id reverse relationship
					// @return PartneringAwarenessAssessment[]
					return (array) $this->_objPartneringAwarenessAssessmentAsGroupArray;

				case '_PartneringReadinessAssessmentAsGroup':
					// Gets the value for the private _objPartneringReadinessAssessmentAsGroup (Read-Only)
					// if set due to an expansion on the partnering_readiness_assessment.group_id reverse relationship
					// @return PartneringReadinessAssessment
					return $this->_objPartneringReadinessAssessmentAsGroup;

				case '_PartneringReadinessAssessmentAsGroupArray':
					// Gets the value for the private _objPartneringReadinessAssessmentAsGroupArray (Read-Only)
					// if set due to an ExpandAsArray on the partnering_readiness_assessment.group_id reverse relationship
					// @return PartneringReadinessAssessment[]
					return (array) $this->_objPartneringReadinessAssessmentAsGroupArray;

				case '_PostventureAssessmentAsGroup':
					// Gets the value for the private _objPostventureAssessmentAsGroup (Read-Only)
					// if set due to an expansion on the postventure_assessment.group_id reverse relationship
					// @return PostventureAssessment
					return $this->_objPostventureAssessmentAsGroup;

				case '_PostventureAssessmentAsGroupArray':
					// Gets the value for the private _objPostventureAssessmentAsGroupArray (Read-Only)
					// if set due to an ExpandAsArray on the postventure_assessment.group_id reverse relationship
					// @return PostventureAssessment[]
					return (array) $this->_objPostventureAssessmentAsGroupArray;

				case '_SeasonalAssessmentAsGroup':
					// Gets the value for the private _objSeasonalAssessmentAsGroup (Read-Only)
					// if set due to an expansion on the seasonal_assessment.group_id reverse relationship
					// @return SeasonalAssessment
					return $this->_objSeasonalAssessmentAsGroup;

				case '_SeasonalAssessmentAsGroupArray':
					// Gets the value for the private _objSeasonalAssessmentAsGroupArray (Read-Only)
					// if set due to an ExpandAsArray on the seasonal_assessment.group_id reverse relationship
					// @return SeasonalAssessment[]
					return (array) $this->_objSeasonalAssessmentAsGroupArray;

				case '_TenFAssessmentAsGroup':
					// Gets the value for the private _objTenFAssessmentAsGroup (Read-Only)
					// if set due to an expansion on the ten_f_assessment.group_id reverse relationship
					// @return TenFAssessment
					return $this->_objTenFAssessmentAsGroup;

				case '_TenFAssessmentAsGroupArray':
					// Gets the value for the private _objTenFAssessmentAsGroupArray (Read-Only)
					// if set due to an ExpandAsArray on the ten_f_assessment.group_id reverse relationship
					// @return TenFAssessment[]
					return (array) $this->_objTenFAssessmentAsGroupArray;

				case '_TenPAssessmentAsGroup':
					// Gets the value for the private _objTenPAssessmentAsGroup (Read-Only)
					// if set due to an expansion on the ten_p_assessment.group_id reverse relationship
					// @return TenPAssessment
					return $this->_objTenPAssessmentAsGroup;

				case '_TenPAssessmentAsGroupArray':
					// Gets the value for the private _objTenPAssessmentAsGroupArray (Read-Only)
					// if set due to an ExpandAsArray on the ten_p_assessment.group_id reverse relationship
					// @return TenPAssessment[]
					return (array) $this->_objTenPAssessmentAsGroupArray;

				case '_TimeAssessmentAsGroup':
					// Gets the value for the private _objTimeAssessmentAsGroup (Read-Only)
					// if set due to an expansion on the time_assessment.group_id reverse relationship
					// @return TimeAssessment
					return $this->_objTimeAssessmentAsGroup;

				case '_TimeAssessmentAsGroupArray':
					// Gets the value for the private _objTimeAssessmentAsGroupArray (Read-Only)
					// if set due to an ExpandAsArray on the time_assessment.group_id reverse relationship
					// @return TimeAssessment[]
					return (array) $this->_objTimeAssessmentAsGroupArray;

				case '_UpwardAssessmentAsGroup':
					// Gets the value for the private _objUpwardAssessmentAsGroup (Read-Only)
					// if set due to an expansion on the upward_assessment.group_id reverse relationship
					// @return UpwardAssessment
					return $this->_objUpwardAssessmentAsGroup;

				case '_UpwardAssessmentAsGroupArray':
					// Gets the value for the private _objUpwardAssessmentAsGroupArray (Read-Only)
					// if set due to an ExpandAsArray on the upward_assessment.group_id reverse relationship
					// @return UpwardAssessment[]
					return (array) $this->_objUpwardAssessmentAsGroupArray;


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
				case 'TotalKeys':
					// Sets the value for intTotalKeys 
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intTotalKeys = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'KeysLeft':
					// Sets the value for intKeysLeft 
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intKeysLeft = QType::Cast($mixValue, QType::Integer));
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

				case 'KeyCode':
					// Sets the value for strKeyCode (Unique)
					// @param string $mixValue
					// @return string
					try {
						return ($this->strKeyCode = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Description':
					// Sets the value for strDescription 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strDescription = QType::Cast($mixValue, QType::String));
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
							throw new QCallerException('Unable to set an unsaved Resource for this GroupAssessmentList');

						// Update Local Member Variables
						$this->objResource = $mixValue;
						$this->intResourceId = $mixValue->Id;

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

			
		
		// Related Objects' Methods for IntegrationAssessmentAsGroup
		//-------------------------------------------------------------------

		/**
		 * Gets all associated IntegrationAssessmentsAsGroup as an array of IntegrationAssessment objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return IntegrationAssessment[]
		*/ 
		public function GetIntegrationAssessmentAsGroupArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return IntegrationAssessment::LoadArrayByGroupId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated IntegrationAssessmentsAsGroup
		 * @return int
		*/ 
		public function CountIntegrationAssessmentsAsGroup() {
			if ((is_null($this->intId)))
				return 0;

			return IntegrationAssessment::CountByGroupId($this->intId);
		}

		/**
		 * Associates a IntegrationAssessmentAsGroup
		 * @param IntegrationAssessment $objIntegrationAssessment
		 * @return void
		*/ 
		public function AssociateIntegrationAssessmentAsGroup(IntegrationAssessment $objIntegrationAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateIntegrationAssessmentAsGroup on this unsaved GroupAssessmentList.');
			if ((is_null($objIntegrationAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateIntegrationAssessmentAsGroup on this GroupAssessmentList with an unsaved IntegrationAssessment.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`integration_assessment`
				SET
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objIntegrationAssessment->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objIntegrationAssessment->GroupId = $this->intId;
				$objIntegrationAssessment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a IntegrationAssessmentAsGroup
		 * @param IntegrationAssessment $objIntegrationAssessment
		 * @return void
		*/ 
		public function UnassociateIntegrationAssessmentAsGroup(IntegrationAssessment $objIntegrationAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateIntegrationAssessmentAsGroup on this unsaved GroupAssessmentList.');
			if ((is_null($objIntegrationAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateIntegrationAssessmentAsGroup on this GroupAssessmentList with an unsaved IntegrationAssessment.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`integration_assessment`
				SET
					`group_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objIntegrationAssessment->Id) . ' AND
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objIntegrationAssessment->GroupId = null;
				$objIntegrationAssessment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all IntegrationAssessmentsAsGroup
		 * @return void
		*/ 
		public function UnassociateAllIntegrationAssessmentsAsGroup() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateIntegrationAssessmentAsGroup on this unsaved GroupAssessmentList.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (IntegrationAssessment::LoadArrayByGroupId($this->intId) as $objIntegrationAssessment) {
					$objIntegrationAssessment->GroupId = null;
					$objIntegrationAssessment->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`integration_assessment`
				SET
					`group_id` = null
				WHERE
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated IntegrationAssessmentAsGroup
		 * @param IntegrationAssessment $objIntegrationAssessment
		 * @return void
		*/ 
		public function DeleteAssociatedIntegrationAssessmentAsGroup(IntegrationAssessment $objIntegrationAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateIntegrationAssessmentAsGroup on this unsaved GroupAssessmentList.');
			if ((is_null($objIntegrationAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateIntegrationAssessmentAsGroup on this GroupAssessmentList with an unsaved IntegrationAssessment.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`integration_assessment`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objIntegrationAssessment->Id) . ' AND
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objIntegrationAssessment->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated IntegrationAssessmentsAsGroup
		 * @return void
		*/ 
		public function DeleteAllIntegrationAssessmentsAsGroup() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateIntegrationAssessmentAsGroup on this unsaved GroupAssessmentList.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (IntegrationAssessment::LoadArrayByGroupId($this->intId) as $objIntegrationAssessment) {
					$objIntegrationAssessment->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`integration_assessment`
				WHERE
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for KingdomBusinessAssessmentAsGroup
		//-------------------------------------------------------------------

		/**
		 * Gets all associated KingdomBusinessAssessmentsAsGroup as an array of KingdomBusinessAssessment objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return KingdomBusinessAssessment[]
		*/ 
		public function GetKingdomBusinessAssessmentAsGroupArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return KingdomBusinessAssessment::LoadArrayByGroupId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated KingdomBusinessAssessmentsAsGroup
		 * @return int
		*/ 
		public function CountKingdomBusinessAssessmentsAsGroup() {
			if ((is_null($this->intId)))
				return 0;

			return KingdomBusinessAssessment::CountByGroupId($this->intId);
		}

		/**
		 * Associates a KingdomBusinessAssessmentAsGroup
		 * @param KingdomBusinessAssessment $objKingdomBusinessAssessment
		 * @return void
		*/ 
		public function AssociateKingdomBusinessAssessmentAsGroup(KingdomBusinessAssessment $objKingdomBusinessAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateKingdomBusinessAssessmentAsGroup on this unsaved GroupAssessmentList.');
			if ((is_null($objKingdomBusinessAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateKingdomBusinessAssessmentAsGroup on this GroupAssessmentList with an unsaved KingdomBusinessAssessment.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`kingdom_business_assessment`
				SET
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objKingdomBusinessAssessment->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objKingdomBusinessAssessment->GroupId = $this->intId;
				$objKingdomBusinessAssessment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a KingdomBusinessAssessmentAsGroup
		 * @param KingdomBusinessAssessment $objKingdomBusinessAssessment
		 * @return void
		*/ 
		public function UnassociateKingdomBusinessAssessmentAsGroup(KingdomBusinessAssessment $objKingdomBusinessAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateKingdomBusinessAssessmentAsGroup on this unsaved GroupAssessmentList.');
			if ((is_null($objKingdomBusinessAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateKingdomBusinessAssessmentAsGroup on this GroupAssessmentList with an unsaved KingdomBusinessAssessment.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`kingdom_business_assessment`
				SET
					`group_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objKingdomBusinessAssessment->Id) . ' AND
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objKingdomBusinessAssessment->GroupId = null;
				$objKingdomBusinessAssessment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all KingdomBusinessAssessmentsAsGroup
		 * @return void
		*/ 
		public function UnassociateAllKingdomBusinessAssessmentsAsGroup() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateKingdomBusinessAssessmentAsGroup on this unsaved GroupAssessmentList.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (KingdomBusinessAssessment::LoadArrayByGroupId($this->intId) as $objKingdomBusinessAssessment) {
					$objKingdomBusinessAssessment->GroupId = null;
					$objKingdomBusinessAssessment->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`kingdom_business_assessment`
				SET
					`group_id` = null
				WHERE
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated KingdomBusinessAssessmentAsGroup
		 * @param KingdomBusinessAssessment $objKingdomBusinessAssessment
		 * @return void
		*/ 
		public function DeleteAssociatedKingdomBusinessAssessmentAsGroup(KingdomBusinessAssessment $objKingdomBusinessAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateKingdomBusinessAssessmentAsGroup on this unsaved GroupAssessmentList.');
			if ((is_null($objKingdomBusinessAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateKingdomBusinessAssessmentAsGroup on this GroupAssessmentList with an unsaved KingdomBusinessAssessment.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`kingdom_business_assessment`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objKingdomBusinessAssessment->Id) . ' AND
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objKingdomBusinessAssessment->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated KingdomBusinessAssessmentsAsGroup
		 * @return void
		*/ 
		public function DeleteAllKingdomBusinessAssessmentsAsGroup() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateKingdomBusinessAssessmentAsGroup on this unsaved GroupAssessmentList.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (KingdomBusinessAssessment::LoadArrayByGroupId($this->intId) as $objKingdomBusinessAssessment) {
					$objKingdomBusinessAssessment->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`kingdom_business_assessment`
				WHERE
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for Lemon50AssessmentAsGroup
		//-------------------------------------------------------------------

		/**
		 * Gets all associated Lemon50AssessmentsAsGroup as an array of Lemon50Assessment objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Lemon50Assessment[]
		*/ 
		public function GetLemon50AssessmentAsGroupArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Lemon50Assessment::LoadArrayByGroupId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated Lemon50AssessmentsAsGroup
		 * @return int
		*/ 
		public function CountLemon50AssessmentsAsGroup() {
			if ((is_null($this->intId)))
				return 0;

			return Lemon50Assessment::CountByGroupId($this->intId);
		}

		/**
		 * Associates a Lemon50AssessmentAsGroup
		 * @param Lemon50Assessment $objLemon50Assessment
		 * @return void
		*/ 
		public function AssociateLemon50AssessmentAsGroup(Lemon50Assessment $objLemon50Assessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateLemon50AssessmentAsGroup on this unsaved GroupAssessmentList.');
			if ((is_null($objLemon50Assessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateLemon50AssessmentAsGroup on this GroupAssessmentList with an unsaved Lemon50Assessment.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`lemon50_assessment`
				SET
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objLemon50Assessment->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objLemon50Assessment->GroupId = $this->intId;
				$objLemon50Assessment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a Lemon50AssessmentAsGroup
		 * @param Lemon50Assessment $objLemon50Assessment
		 * @return void
		*/ 
		public function UnassociateLemon50AssessmentAsGroup(Lemon50Assessment $objLemon50Assessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLemon50AssessmentAsGroup on this unsaved GroupAssessmentList.');
			if ((is_null($objLemon50Assessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLemon50AssessmentAsGroup on this GroupAssessmentList with an unsaved Lemon50Assessment.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`lemon50_assessment`
				SET
					`group_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objLemon50Assessment->Id) . ' AND
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objLemon50Assessment->GroupId = null;
				$objLemon50Assessment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all Lemon50AssessmentsAsGroup
		 * @return void
		*/ 
		public function UnassociateAllLemon50AssessmentsAsGroup() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLemon50AssessmentAsGroup on this unsaved GroupAssessmentList.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Lemon50Assessment::LoadArrayByGroupId($this->intId) as $objLemon50Assessment) {
					$objLemon50Assessment->GroupId = null;
					$objLemon50Assessment->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`lemon50_assessment`
				SET
					`group_id` = null
				WHERE
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated Lemon50AssessmentAsGroup
		 * @param Lemon50Assessment $objLemon50Assessment
		 * @return void
		*/ 
		public function DeleteAssociatedLemon50AssessmentAsGroup(Lemon50Assessment $objLemon50Assessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLemon50AssessmentAsGroup on this unsaved GroupAssessmentList.');
			if ((is_null($objLemon50Assessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLemon50AssessmentAsGroup on this GroupAssessmentList with an unsaved Lemon50Assessment.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`lemon50_assessment`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objLemon50Assessment->Id) . ' AND
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objLemon50Assessment->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated Lemon50AssessmentsAsGroup
		 * @return void
		*/ 
		public function DeleteAllLemon50AssessmentsAsGroup() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLemon50AssessmentAsGroup on this unsaved GroupAssessmentList.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Lemon50Assessment::LoadArrayByGroupId($this->intId) as $objLemon50Assessment) {
					$objLemon50Assessment->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`lemon50_assessment`
				WHERE
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for LemonAssessmentAsGroup
		//-------------------------------------------------------------------

		/**
		 * Gets all associated LemonAssessmentsAsGroup as an array of LemonAssessment objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return LemonAssessment[]
		*/ 
		public function GetLemonAssessmentAsGroupArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return LemonAssessment::LoadArrayByGroupId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated LemonAssessmentsAsGroup
		 * @return int
		*/ 
		public function CountLemonAssessmentsAsGroup() {
			if ((is_null($this->intId)))
				return 0;

			return LemonAssessment::CountByGroupId($this->intId);
		}

		/**
		 * Associates a LemonAssessmentAsGroup
		 * @param LemonAssessment $objLemonAssessment
		 * @return void
		*/ 
		public function AssociateLemonAssessmentAsGroup(LemonAssessment $objLemonAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateLemonAssessmentAsGroup on this unsaved GroupAssessmentList.');
			if ((is_null($objLemonAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateLemonAssessmentAsGroup on this GroupAssessmentList with an unsaved LemonAssessment.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`lemon_assessment`
				SET
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objLemonAssessment->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objLemonAssessment->GroupId = $this->intId;
				$objLemonAssessment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a LemonAssessmentAsGroup
		 * @param LemonAssessment $objLemonAssessment
		 * @return void
		*/ 
		public function UnassociateLemonAssessmentAsGroup(LemonAssessment $objLemonAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLemonAssessmentAsGroup on this unsaved GroupAssessmentList.');
			if ((is_null($objLemonAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLemonAssessmentAsGroup on this GroupAssessmentList with an unsaved LemonAssessment.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`lemon_assessment`
				SET
					`group_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objLemonAssessment->Id) . ' AND
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objLemonAssessment->GroupId = null;
				$objLemonAssessment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all LemonAssessmentsAsGroup
		 * @return void
		*/ 
		public function UnassociateAllLemonAssessmentsAsGroup() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLemonAssessmentAsGroup on this unsaved GroupAssessmentList.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (LemonAssessment::LoadArrayByGroupId($this->intId) as $objLemonAssessment) {
					$objLemonAssessment->GroupId = null;
					$objLemonAssessment->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`lemon_assessment`
				SET
					`group_id` = null
				WHERE
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated LemonAssessmentAsGroup
		 * @param LemonAssessment $objLemonAssessment
		 * @return void
		*/ 
		public function DeleteAssociatedLemonAssessmentAsGroup(LemonAssessment $objLemonAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLemonAssessmentAsGroup on this unsaved GroupAssessmentList.');
			if ((is_null($objLemonAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLemonAssessmentAsGroup on this GroupAssessmentList with an unsaved LemonAssessment.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`lemon_assessment`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objLemonAssessment->Id) . ' AND
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objLemonAssessment->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated LemonAssessmentsAsGroup
		 * @return void
		*/ 
		public function DeleteAllLemonAssessmentsAsGroup() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLemonAssessmentAsGroup on this unsaved GroupAssessmentList.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (LemonAssessment::LoadArrayByGroupId($this->intId) as $objLemonAssessment) {
					$objLemonAssessment->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`lemon_assessment`
				WHERE
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for LemonloversAssessmentAsGroup
		//-------------------------------------------------------------------

		/**
		 * Gets all associated LemonloversAssessmentsAsGroup as an array of LemonloversAssessment objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return LemonloversAssessment[]
		*/ 
		public function GetLemonloversAssessmentAsGroupArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return LemonloversAssessment::LoadArrayByGroupId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated LemonloversAssessmentsAsGroup
		 * @return int
		*/ 
		public function CountLemonloversAssessmentsAsGroup() {
			if ((is_null($this->intId)))
				return 0;

			return LemonloversAssessment::CountByGroupId($this->intId);
		}

		/**
		 * Associates a LemonloversAssessmentAsGroup
		 * @param LemonloversAssessment $objLemonloversAssessment
		 * @return void
		*/ 
		public function AssociateLemonloversAssessmentAsGroup(LemonloversAssessment $objLemonloversAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateLemonloversAssessmentAsGroup on this unsaved GroupAssessmentList.');
			if ((is_null($objLemonloversAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateLemonloversAssessmentAsGroup on this GroupAssessmentList with an unsaved LemonloversAssessment.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`lemonlovers_assessment`
				SET
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objLemonloversAssessment->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objLemonloversAssessment->GroupId = $this->intId;
				$objLemonloversAssessment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a LemonloversAssessmentAsGroup
		 * @param LemonloversAssessment $objLemonloversAssessment
		 * @return void
		*/ 
		public function UnassociateLemonloversAssessmentAsGroup(LemonloversAssessment $objLemonloversAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLemonloversAssessmentAsGroup on this unsaved GroupAssessmentList.');
			if ((is_null($objLemonloversAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLemonloversAssessmentAsGroup on this GroupAssessmentList with an unsaved LemonloversAssessment.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`lemonlovers_assessment`
				SET
					`group_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objLemonloversAssessment->Id) . ' AND
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objLemonloversAssessment->GroupId = null;
				$objLemonloversAssessment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all LemonloversAssessmentsAsGroup
		 * @return void
		*/ 
		public function UnassociateAllLemonloversAssessmentsAsGroup() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLemonloversAssessmentAsGroup on this unsaved GroupAssessmentList.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (LemonloversAssessment::LoadArrayByGroupId($this->intId) as $objLemonloversAssessment) {
					$objLemonloversAssessment->GroupId = null;
					$objLemonloversAssessment->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`lemonlovers_assessment`
				SET
					`group_id` = null
				WHERE
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated LemonloversAssessmentAsGroup
		 * @param LemonloversAssessment $objLemonloversAssessment
		 * @return void
		*/ 
		public function DeleteAssociatedLemonloversAssessmentAsGroup(LemonloversAssessment $objLemonloversAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLemonloversAssessmentAsGroup on this unsaved GroupAssessmentList.');
			if ((is_null($objLemonloversAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLemonloversAssessmentAsGroup on this GroupAssessmentList with an unsaved LemonloversAssessment.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`lemonlovers_assessment`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objLemonloversAssessment->Id) . ' AND
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objLemonloversAssessment->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated LemonloversAssessmentsAsGroup
		 * @return void
		*/ 
		public function DeleteAllLemonloversAssessmentsAsGroup() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLemonloversAssessmentAsGroup on this unsaved GroupAssessmentList.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (LemonloversAssessment::LoadArrayByGroupId($this->intId) as $objLemonloversAssessment) {
					$objLemonloversAssessment->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`lemonlovers_assessment`
				WHERE
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for LraAssessmentAsGroup
		//-------------------------------------------------------------------

		/**
		 * Gets all associated LraAssessmentsAsGroup as an array of LraAssessment objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return LraAssessment[]
		*/ 
		public function GetLraAssessmentAsGroupArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return LraAssessment::LoadArrayByGroupId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated LraAssessmentsAsGroup
		 * @return int
		*/ 
		public function CountLraAssessmentsAsGroup() {
			if ((is_null($this->intId)))
				return 0;

			return LraAssessment::CountByGroupId($this->intId);
		}

		/**
		 * Associates a LraAssessmentAsGroup
		 * @param LraAssessment $objLraAssessment
		 * @return void
		*/ 
		public function AssociateLraAssessmentAsGroup(LraAssessment $objLraAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateLraAssessmentAsGroup on this unsaved GroupAssessmentList.');
			if ((is_null($objLraAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateLraAssessmentAsGroup on this GroupAssessmentList with an unsaved LraAssessment.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`lra_assessment`
				SET
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objLraAssessment->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objLraAssessment->GroupId = $this->intId;
				$objLraAssessment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a LraAssessmentAsGroup
		 * @param LraAssessment $objLraAssessment
		 * @return void
		*/ 
		public function UnassociateLraAssessmentAsGroup(LraAssessment $objLraAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLraAssessmentAsGroup on this unsaved GroupAssessmentList.');
			if ((is_null($objLraAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLraAssessmentAsGroup on this GroupAssessmentList with an unsaved LraAssessment.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`lra_assessment`
				SET
					`group_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objLraAssessment->Id) . ' AND
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objLraAssessment->GroupId = null;
				$objLraAssessment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all LraAssessmentsAsGroup
		 * @return void
		*/ 
		public function UnassociateAllLraAssessmentsAsGroup() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLraAssessmentAsGroup on this unsaved GroupAssessmentList.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (LraAssessment::LoadArrayByGroupId($this->intId) as $objLraAssessment) {
					$objLraAssessment->GroupId = null;
					$objLraAssessment->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`lra_assessment`
				SET
					`group_id` = null
				WHERE
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated LraAssessmentAsGroup
		 * @param LraAssessment $objLraAssessment
		 * @return void
		*/ 
		public function DeleteAssociatedLraAssessmentAsGroup(LraAssessment $objLraAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLraAssessmentAsGroup on this unsaved GroupAssessmentList.');
			if ((is_null($objLraAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLraAssessmentAsGroup on this GroupAssessmentList with an unsaved LraAssessment.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`lra_assessment`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objLraAssessment->Id) . ' AND
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objLraAssessment->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated LraAssessmentsAsGroup
		 * @return void
		*/ 
		public function DeleteAllLraAssessmentsAsGroup() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLraAssessmentAsGroup on this unsaved GroupAssessmentList.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (LraAssessment::LoadArrayByGroupId($this->intId) as $objLraAssessment) {
					$objLraAssessment->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`lra_assessment`
				WHERE
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for PartneringAwarenessAssessmentAsGroup
		//-------------------------------------------------------------------

		/**
		 * Gets all associated PartneringAwarenessAssessmentsAsGroup as an array of PartneringAwarenessAssessment objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PartneringAwarenessAssessment[]
		*/ 
		public function GetPartneringAwarenessAssessmentAsGroupArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return PartneringAwarenessAssessment::LoadArrayByGroupId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated PartneringAwarenessAssessmentsAsGroup
		 * @return int
		*/ 
		public function CountPartneringAwarenessAssessmentsAsGroup() {
			if ((is_null($this->intId)))
				return 0;

			return PartneringAwarenessAssessment::CountByGroupId($this->intId);
		}

		/**
		 * Associates a PartneringAwarenessAssessmentAsGroup
		 * @param PartneringAwarenessAssessment $objPartneringAwarenessAssessment
		 * @return void
		*/ 
		public function AssociatePartneringAwarenessAssessmentAsGroup(PartneringAwarenessAssessment $objPartneringAwarenessAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePartneringAwarenessAssessmentAsGroup on this unsaved GroupAssessmentList.');
			if ((is_null($objPartneringAwarenessAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePartneringAwarenessAssessmentAsGroup on this GroupAssessmentList with an unsaved PartneringAwarenessAssessment.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`partnering_awareness_assessment`
				SET
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPartneringAwarenessAssessment->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objPartneringAwarenessAssessment->GroupId = $this->intId;
				$objPartneringAwarenessAssessment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a PartneringAwarenessAssessmentAsGroup
		 * @param PartneringAwarenessAssessment $objPartneringAwarenessAssessment
		 * @return void
		*/ 
		public function UnassociatePartneringAwarenessAssessmentAsGroup(PartneringAwarenessAssessment $objPartneringAwarenessAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePartneringAwarenessAssessmentAsGroup on this unsaved GroupAssessmentList.');
			if ((is_null($objPartneringAwarenessAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePartneringAwarenessAssessmentAsGroup on this GroupAssessmentList with an unsaved PartneringAwarenessAssessment.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`partnering_awareness_assessment`
				SET
					`group_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPartneringAwarenessAssessment->Id) . ' AND
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objPartneringAwarenessAssessment->GroupId = null;
				$objPartneringAwarenessAssessment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all PartneringAwarenessAssessmentsAsGroup
		 * @return void
		*/ 
		public function UnassociateAllPartneringAwarenessAssessmentsAsGroup() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePartneringAwarenessAssessmentAsGroup on this unsaved GroupAssessmentList.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (PartneringAwarenessAssessment::LoadArrayByGroupId($this->intId) as $objPartneringAwarenessAssessment) {
					$objPartneringAwarenessAssessment->GroupId = null;
					$objPartneringAwarenessAssessment->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`partnering_awareness_assessment`
				SET
					`group_id` = null
				WHERE
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated PartneringAwarenessAssessmentAsGroup
		 * @param PartneringAwarenessAssessment $objPartneringAwarenessAssessment
		 * @return void
		*/ 
		public function DeleteAssociatedPartneringAwarenessAssessmentAsGroup(PartneringAwarenessAssessment $objPartneringAwarenessAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePartneringAwarenessAssessmentAsGroup on this unsaved GroupAssessmentList.');
			if ((is_null($objPartneringAwarenessAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePartneringAwarenessAssessmentAsGroup on this GroupAssessmentList with an unsaved PartneringAwarenessAssessment.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`partnering_awareness_assessment`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPartneringAwarenessAssessment->Id) . ' AND
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objPartneringAwarenessAssessment->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated PartneringAwarenessAssessmentsAsGroup
		 * @return void
		*/ 
		public function DeleteAllPartneringAwarenessAssessmentsAsGroup() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePartneringAwarenessAssessmentAsGroup on this unsaved GroupAssessmentList.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (PartneringAwarenessAssessment::LoadArrayByGroupId($this->intId) as $objPartneringAwarenessAssessment) {
					$objPartneringAwarenessAssessment->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`partnering_awareness_assessment`
				WHERE
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for PartneringReadinessAssessmentAsGroup
		//-------------------------------------------------------------------

		/**
		 * Gets all associated PartneringReadinessAssessmentsAsGroup as an array of PartneringReadinessAssessment objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PartneringReadinessAssessment[]
		*/ 
		public function GetPartneringReadinessAssessmentAsGroupArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return PartneringReadinessAssessment::LoadArrayByGroupId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated PartneringReadinessAssessmentsAsGroup
		 * @return int
		*/ 
		public function CountPartneringReadinessAssessmentsAsGroup() {
			if ((is_null($this->intId)))
				return 0;

			return PartneringReadinessAssessment::CountByGroupId($this->intId);
		}

		/**
		 * Associates a PartneringReadinessAssessmentAsGroup
		 * @param PartneringReadinessAssessment $objPartneringReadinessAssessment
		 * @return void
		*/ 
		public function AssociatePartneringReadinessAssessmentAsGroup(PartneringReadinessAssessment $objPartneringReadinessAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePartneringReadinessAssessmentAsGroup on this unsaved GroupAssessmentList.');
			if ((is_null($objPartneringReadinessAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePartneringReadinessAssessmentAsGroup on this GroupAssessmentList with an unsaved PartneringReadinessAssessment.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`partnering_readiness_assessment`
				SET
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPartneringReadinessAssessment->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objPartneringReadinessAssessment->GroupId = $this->intId;
				$objPartneringReadinessAssessment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a PartneringReadinessAssessmentAsGroup
		 * @param PartneringReadinessAssessment $objPartneringReadinessAssessment
		 * @return void
		*/ 
		public function UnassociatePartneringReadinessAssessmentAsGroup(PartneringReadinessAssessment $objPartneringReadinessAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePartneringReadinessAssessmentAsGroup on this unsaved GroupAssessmentList.');
			if ((is_null($objPartneringReadinessAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePartneringReadinessAssessmentAsGroup on this GroupAssessmentList with an unsaved PartneringReadinessAssessment.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`partnering_readiness_assessment`
				SET
					`group_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPartneringReadinessAssessment->Id) . ' AND
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objPartneringReadinessAssessment->GroupId = null;
				$objPartneringReadinessAssessment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all PartneringReadinessAssessmentsAsGroup
		 * @return void
		*/ 
		public function UnassociateAllPartneringReadinessAssessmentsAsGroup() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePartneringReadinessAssessmentAsGroup on this unsaved GroupAssessmentList.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (PartneringReadinessAssessment::LoadArrayByGroupId($this->intId) as $objPartneringReadinessAssessment) {
					$objPartneringReadinessAssessment->GroupId = null;
					$objPartneringReadinessAssessment->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`partnering_readiness_assessment`
				SET
					`group_id` = null
				WHERE
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated PartneringReadinessAssessmentAsGroup
		 * @param PartneringReadinessAssessment $objPartneringReadinessAssessment
		 * @return void
		*/ 
		public function DeleteAssociatedPartneringReadinessAssessmentAsGroup(PartneringReadinessAssessment $objPartneringReadinessAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePartneringReadinessAssessmentAsGroup on this unsaved GroupAssessmentList.');
			if ((is_null($objPartneringReadinessAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePartneringReadinessAssessmentAsGroup on this GroupAssessmentList with an unsaved PartneringReadinessAssessment.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`partnering_readiness_assessment`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPartneringReadinessAssessment->Id) . ' AND
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objPartneringReadinessAssessment->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated PartneringReadinessAssessmentsAsGroup
		 * @return void
		*/ 
		public function DeleteAllPartneringReadinessAssessmentsAsGroup() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePartneringReadinessAssessmentAsGroup on this unsaved GroupAssessmentList.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (PartneringReadinessAssessment::LoadArrayByGroupId($this->intId) as $objPartneringReadinessAssessment) {
					$objPartneringReadinessAssessment->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`partnering_readiness_assessment`
				WHERE
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for PostventureAssessmentAsGroup
		//-------------------------------------------------------------------

		/**
		 * Gets all associated PostventureAssessmentsAsGroup as an array of PostventureAssessment objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PostventureAssessment[]
		*/ 
		public function GetPostventureAssessmentAsGroupArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return PostventureAssessment::LoadArrayByGroupId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated PostventureAssessmentsAsGroup
		 * @return int
		*/ 
		public function CountPostventureAssessmentsAsGroup() {
			if ((is_null($this->intId)))
				return 0;

			return PostventureAssessment::CountByGroupId($this->intId);
		}

		/**
		 * Associates a PostventureAssessmentAsGroup
		 * @param PostventureAssessment $objPostventureAssessment
		 * @return void
		*/ 
		public function AssociatePostventureAssessmentAsGroup(PostventureAssessment $objPostventureAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePostventureAssessmentAsGroup on this unsaved GroupAssessmentList.');
			if ((is_null($objPostventureAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePostventureAssessmentAsGroup on this GroupAssessmentList with an unsaved PostventureAssessment.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`postventure_assessment`
				SET
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPostventureAssessment->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objPostventureAssessment->GroupId = $this->intId;
				$objPostventureAssessment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a PostventureAssessmentAsGroup
		 * @param PostventureAssessment $objPostventureAssessment
		 * @return void
		*/ 
		public function UnassociatePostventureAssessmentAsGroup(PostventureAssessment $objPostventureAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePostventureAssessmentAsGroup on this unsaved GroupAssessmentList.');
			if ((is_null($objPostventureAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePostventureAssessmentAsGroup on this GroupAssessmentList with an unsaved PostventureAssessment.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`postventure_assessment`
				SET
					`group_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPostventureAssessment->Id) . ' AND
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objPostventureAssessment->GroupId = null;
				$objPostventureAssessment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all PostventureAssessmentsAsGroup
		 * @return void
		*/ 
		public function UnassociateAllPostventureAssessmentsAsGroup() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePostventureAssessmentAsGroup on this unsaved GroupAssessmentList.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (PostventureAssessment::LoadArrayByGroupId($this->intId) as $objPostventureAssessment) {
					$objPostventureAssessment->GroupId = null;
					$objPostventureAssessment->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`postventure_assessment`
				SET
					`group_id` = null
				WHERE
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated PostventureAssessmentAsGroup
		 * @param PostventureAssessment $objPostventureAssessment
		 * @return void
		*/ 
		public function DeleteAssociatedPostventureAssessmentAsGroup(PostventureAssessment $objPostventureAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePostventureAssessmentAsGroup on this unsaved GroupAssessmentList.');
			if ((is_null($objPostventureAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePostventureAssessmentAsGroup on this GroupAssessmentList with an unsaved PostventureAssessment.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`postventure_assessment`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPostventureAssessment->Id) . ' AND
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objPostventureAssessment->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated PostventureAssessmentsAsGroup
		 * @return void
		*/ 
		public function DeleteAllPostventureAssessmentsAsGroup() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePostventureAssessmentAsGroup on this unsaved GroupAssessmentList.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (PostventureAssessment::LoadArrayByGroupId($this->intId) as $objPostventureAssessment) {
					$objPostventureAssessment->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`postventure_assessment`
				WHERE
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for SeasonalAssessmentAsGroup
		//-------------------------------------------------------------------

		/**
		 * Gets all associated SeasonalAssessmentsAsGroup as an array of SeasonalAssessment objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SeasonalAssessment[]
		*/ 
		public function GetSeasonalAssessmentAsGroupArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return SeasonalAssessment::LoadArrayByGroupId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated SeasonalAssessmentsAsGroup
		 * @return int
		*/ 
		public function CountSeasonalAssessmentsAsGroup() {
			if ((is_null($this->intId)))
				return 0;

			return SeasonalAssessment::CountByGroupId($this->intId);
		}

		/**
		 * Associates a SeasonalAssessmentAsGroup
		 * @param SeasonalAssessment $objSeasonalAssessment
		 * @return void
		*/ 
		public function AssociateSeasonalAssessmentAsGroup(SeasonalAssessment $objSeasonalAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateSeasonalAssessmentAsGroup on this unsaved GroupAssessmentList.');
			if ((is_null($objSeasonalAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateSeasonalAssessmentAsGroup on this GroupAssessmentList with an unsaved SeasonalAssessment.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`seasonal_assessment`
				SET
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objSeasonalAssessment->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objSeasonalAssessment->GroupId = $this->intId;
				$objSeasonalAssessment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a SeasonalAssessmentAsGroup
		 * @param SeasonalAssessment $objSeasonalAssessment
		 * @return void
		*/ 
		public function UnassociateSeasonalAssessmentAsGroup(SeasonalAssessment $objSeasonalAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSeasonalAssessmentAsGroup on this unsaved GroupAssessmentList.');
			if ((is_null($objSeasonalAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSeasonalAssessmentAsGroup on this GroupAssessmentList with an unsaved SeasonalAssessment.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`seasonal_assessment`
				SET
					`group_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objSeasonalAssessment->Id) . ' AND
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objSeasonalAssessment->GroupId = null;
				$objSeasonalAssessment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all SeasonalAssessmentsAsGroup
		 * @return void
		*/ 
		public function UnassociateAllSeasonalAssessmentsAsGroup() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSeasonalAssessmentAsGroup on this unsaved GroupAssessmentList.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (SeasonalAssessment::LoadArrayByGroupId($this->intId) as $objSeasonalAssessment) {
					$objSeasonalAssessment->GroupId = null;
					$objSeasonalAssessment->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`seasonal_assessment`
				SET
					`group_id` = null
				WHERE
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated SeasonalAssessmentAsGroup
		 * @param SeasonalAssessment $objSeasonalAssessment
		 * @return void
		*/ 
		public function DeleteAssociatedSeasonalAssessmentAsGroup(SeasonalAssessment $objSeasonalAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSeasonalAssessmentAsGroup on this unsaved GroupAssessmentList.');
			if ((is_null($objSeasonalAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSeasonalAssessmentAsGroup on this GroupAssessmentList with an unsaved SeasonalAssessment.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`seasonal_assessment`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objSeasonalAssessment->Id) . ' AND
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objSeasonalAssessment->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated SeasonalAssessmentsAsGroup
		 * @return void
		*/ 
		public function DeleteAllSeasonalAssessmentsAsGroup() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSeasonalAssessmentAsGroup on this unsaved GroupAssessmentList.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (SeasonalAssessment::LoadArrayByGroupId($this->intId) as $objSeasonalAssessment) {
					$objSeasonalAssessment->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`seasonal_assessment`
				WHERE
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for TenFAssessmentAsGroup
		//-------------------------------------------------------------------

		/**
		 * Gets all associated TenFAssessmentsAsGroup as an array of TenFAssessment objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return TenFAssessment[]
		*/ 
		public function GetTenFAssessmentAsGroupArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return TenFAssessment::LoadArrayByGroupId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated TenFAssessmentsAsGroup
		 * @return int
		*/ 
		public function CountTenFAssessmentsAsGroup() {
			if ((is_null($this->intId)))
				return 0;

			return TenFAssessment::CountByGroupId($this->intId);
		}

		/**
		 * Associates a TenFAssessmentAsGroup
		 * @param TenFAssessment $objTenFAssessment
		 * @return void
		*/ 
		public function AssociateTenFAssessmentAsGroup(TenFAssessment $objTenFAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateTenFAssessmentAsGroup on this unsaved GroupAssessmentList.');
			if ((is_null($objTenFAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateTenFAssessmentAsGroup on this GroupAssessmentList with an unsaved TenFAssessment.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`ten_f_assessment`
				SET
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objTenFAssessment->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objTenFAssessment->GroupId = $this->intId;
				$objTenFAssessment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a TenFAssessmentAsGroup
		 * @param TenFAssessment $objTenFAssessment
		 * @return void
		*/ 
		public function UnassociateTenFAssessmentAsGroup(TenFAssessment $objTenFAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTenFAssessmentAsGroup on this unsaved GroupAssessmentList.');
			if ((is_null($objTenFAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTenFAssessmentAsGroup on this GroupAssessmentList with an unsaved TenFAssessment.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`ten_f_assessment`
				SET
					`group_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objTenFAssessment->Id) . ' AND
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objTenFAssessment->GroupId = null;
				$objTenFAssessment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all TenFAssessmentsAsGroup
		 * @return void
		*/ 
		public function UnassociateAllTenFAssessmentsAsGroup() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTenFAssessmentAsGroup on this unsaved GroupAssessmentList.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (TenFAssessment::LoadArrayByGroupId($this->intId) as $objTenFAssessment) {
					$objTenFAssessment->GroupId = null;
					$objTenFAssessment->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`ten_f_assessment`
				SET
					`group_id` = null
				WHERE
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated TenFAssessmentAsGroup
		 * @param TenFAssessment $objTenFAssessment
		 * @return void
		*/ 
		public function DeleteAssociatedTenFAssessmentAsGroup(TenFAssessment $objTenFAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTenFAssessmentAsGroup on this unsaved GroupAssessmentList.');
			if ((is_null($objTenFAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTenFAssessmentAsGroup on this GroupAssessmentList with an unsaved TenFAssessment.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`ten_f_assessment`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objTenFAssessment->Id) . ' AND
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objTenFAssessment->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated TenFAssessmentsAsGroup
		 * @return void
		*/ 
		public function DeleteAllTenFAssessmentsAsGroup() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTenFAssessmentAsGroup on this unsaved GroupAssessmentList.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (TenFAssessment::LoadArrayByGroupId($this->intId) as $objTenFAssessment) {
					$objTenFAssessment->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`ten_f_assessment`
				WHERE
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for TenPAssessmentAsGroup
		//-------------------------------------------------------------------

		/**
		 * Gets all associated TenPAssessmentsAsGroup as an array of TenPAssessment objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return TenPAssessment[]
		*/ 
		public function GetTenPAssessmentAsGroupArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return TenPAssessment::LoadArrayByGroupId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated TenPAssessmentsAsGroup
		 * @return int
		*/ 
		public function CountTenPAssessmentsAsGroup() {
			if ((is_null($this->intId)))
				return 0;

			return TenPAssessment::CountByGroupId($this->intId);
		}

		/**
		 * Associates a TenPAssessmentAsGroup
		 * @param TenPAssessment $objTenPAssessment
		 * @return void
		*/ 
		public function AssociateTenPAssessmentAsGroup(TenPAssessment $objTenPAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateTenPAssessmentAsGroup on this unsaved GroupAssessmentList.');
			if ((is_null($objTenPAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateTenPAssessmentAsGroup on this GroupAssessmentList with an unsaved TenPAssessment.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`ten_p_assessment`
				SET
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objTenPAssessment->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objTenPAssessment->GroupId = $this->intId;
				$objTenPAssessment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a TenPAssessmentAsGroup
		 * @param TenPAssessment $objTenPAssessment
		 * @return void
		*/ 
		public function UnassociateTenPAssessmentAsGroup(TenPAssessment $objTenPAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTenPAssessmentAsGroup on this unsaved GroupAssessmentList.');
			if ((is_null($objTenPAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTenPAssessmentAsGroup on this GroupAssessmentList with an unsaved TenPAssessment.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`ten_p_assessment`
				SET
					`group_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objTenPAssessment->Id) . ' AND
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objTenPAssessment->GroupId = null;
				$objTenPAssessment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all TenPAssessmentsAsGroup
		 * @return void
		*/ 
		public function UnassociateAllTenPAssessmentsAsGroup() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTenPAssessmentAsGroup on this unsaved GroupAssessmentList.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (TenPAssessment::LoadArrayByGroupId($this->intId) as $objTenPAssessment) {
					$objTenPAssessment->GroupId = null;
					$objTenPAssessment->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`ten_p_assessment`
				SET
					`group_id` = null
				WHERE
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated TenPAssessmentAsGroup
		 * @param TenPAssessment $objTenPAssessment
		 * @return void
		*/ 
		public function DeleteAssociatedTenPAssessmentAsGroup(TenPAssessment $objTenPAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTenPAssessmentAsGroup on this unsaved GroupAssessmentList.');
			if ((is_null($objTenPAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTenPAssessmentAsGroup on this GroupAssessmentList with an unsaved TenPAssessment.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`ten_p_assessment`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objTenPAssessment->Id) . ' AND
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objTenPAssessment->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated TenPAssessmentsAsGroup
		 * @return void
		*/ 
		public function DeleteAllTenPAssessmentsAsGroup() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTenPAssessmentAsGroup on this unsaved GroupAssessmentList.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (TenPAssessment::LoadArrayByGroupId($this->intId) as $objTenPAssessment) {
					$objTenPAssessment->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`ten_p_assessment`
				WHERE
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for TimeAssessmentAsGroup
		//-------------------------------------------------------------------

		/**
		 * Gets all associated TimeAssessmentsAsGroup as an array of TimeAssessment objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return TimeAssessment[]
		*/ 
		public function GetTimeAssessmentAsGroupArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return TimeAssessment::LoadArrayByGroupId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated TimeAssessmentsAsGroup
		 * @return int
		*/ 
		public function CountTimeAssessmentsAsGroup() {
			if ((is_null($this->intId)))
				return 0;

			return TimeAssessment::CountByGroupId($this->intId);
		}

		/**
		 * Associates a TimeAssessmentAsGroup
		 * @param TimeAssessment $objTimeAssessment
		 * @return void
		*/ 
		public function AssociateTimeAssessmentAsGroup(TimeAssessment $objTimeAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateTimeAssessmentAsGroup on this unsaved GroupAssessmentList.');
			if ((is_null($objTimeAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateTimeAssessmentAsGroup on this GroupAssessmentList with an unsaved TimeAssessment.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`time_assessment`
				SET
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objTimeAssessment->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objTimeAssessment->GroupId = $this->intId;
				$objTimeAssessment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a TimeAssessmentAsGroup
		 * @param TimeAssessment $objTimeAssessment
		 * @return void
		*/ 
		public function UnassociateTimeAssessmentAsGroup(TimeAssessment $objTimeAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTimeAssessmentAsGroup on this unsaved GroupAssessmentList.');
			if ((is_null($objTimeAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTimeAssessmentAsGroup on this GroupAssessmentList with an unsaved TimeAssessment.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`time_assessment`
				SET
					`group_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objTimeAssessment->Id) . ' AND
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objTimeAssessment->GroupId = null;
				$objTimeAssessment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all TimeAssessmentsAsGroup
		 * @return void
		*/ 
		public function UnassociateAllTimeAssessmentsAsGroup() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTimeAssessmentAsGroup on this unsaved GroupAssessmentList.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (TimeAssessment::LoadArrayByGroupId($this->intId) as $objTimeAssessment) {
					$objTimeAssessment->GroupId = null;
					$objTimeAssessment->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`time_assessment`
				SET
					`group_id` = null
				WHERE
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated TimeAssessmentAsGroup
		 * @param TimeAssessment $objTimeAssessment
		 * @return void
		*/ 
		public function DeleteAssociatedTimeAssessmentAsGroup(TimeAssessment $objTimeAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTimeAssessmentAsGroup on this unsaved GroupAssessmentList.');
			if ((is_null($objTimeAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTimeAssessmentAsGroup on this GroupAssessmentList with an unsaved TimeAssessment.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`time_assessment`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objTimeAssessment->Id) . ' AND
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objTimeAssessment->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated TimeAssessmentsAsGroup
		 * @return void
		*/ 
		public function DeleteAllTimeAssessmentsAsGroup() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTimeAssessmentAsGroup on this unsaved GroupAssessmentList.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (TimeAssessment::LoadArrayByGroupId($this->intId) as $objTimeAssessment) {
					$objTimeAssessment->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`time_assessment`
				WHERE
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for UpwardAssessmentAsGroup
		//-------------------------------------------------------------------

		/**
		 * Gets all associated UpwardAssessmentsAsGroup as an array of UpwardAssessment objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return UpwardAssessment[]
		*/ 
		public function GetUpwardAssessmentAsGroupArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return UpwardAssessment::LoadArrayByGroupId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated UpwardAssessmentsAsGroup
		 * @return int
		*/ 
		public function CountUpwardAssessmentsAsGroup() {
			if ((is_null($this->intId)))
				return 0;

			return UpwardAssessment::CountByGroupId($this->intId);
		}

		/**
		 * Associates a UpwardAssessmentAsGroup
		 * @param UpwardAssessment $objUpwardAssessment
		 * @return void
		*/ 
		public function AssociateUpwardAssessmentAsGroup(UpwardAssessment $objUpwardAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateUpwardAssessmentAsGroup on this unsaved GroupAssessmentList.');
			if ((is_null($objUpwardAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateUpwardAssessmentAsGroup on this GroupAssessmentList with an unsaved UpwardAssessment.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`upward_assessment`
				SET
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objUpwardAssessment->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objUpwardAssessment->GroupId = $this->intId;
				$objUpwardAssessment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a UpwardAssessmentAsGroup
		 * @param UpwardAssessment $objUpwardAssessment
		 * @return void
		*/ 
		public function UnassociateUpwardAssessmentAsGroup(UpwardAssessment $objUpwardAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUpwardAssessmentAsGroup on this unsaved GroupAssessmentList.');
			if ((is_null($objUpwardAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUpwardAssessmentAsGroup on this GroupAssessmentList with an unsaved UpwardAssessment.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`upward_assessment`
				SET
					`group_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objUpwardAssessment->Id) . ' AND
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objUpwardAssessment->GroupId = null;
				$objUpwardAssessment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all UpwardAssessmentsAsGroup
		 * @return void
		*/ 
		public function UnassociateAllUpwardAssessmentsAsGroup() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUpwardAssessmentAsGroup on this unsaved GroupAssessmentList.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (UpwardAssessment::LoadArrayByGroupId($this->intId) as $objUpwardAssessment) {
					$objUpwardAssessment->GroupId = null;
					$objUpwardAssessment->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`upward_assessment`
				SET
					`group_id` = null
				WHERE
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated UpwardAssessmentAsGroup
		 * @param UpwardAssessment $objUpwardAssessment
		 * @return void
		*/ 
		public function DeleteAssociatedUpwardAssessmentAsGroup(UpwardAssessment $objUpwardAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUpwardAssessmentAsGroup on this unsaved GroupAssessmentList.');
			if ((is_null($objUpwardAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUpwardAssessmentAsGroup on this GroupAssessmentList with an unsaved UpwardAssessment.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`upward_assessment`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objUpwardAssessment->Id) . ' AND
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objUpwardAssessment->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated UpwardAssessmentsAsGroup
		 * @return void
		*/ 
		public function DeleteAllUpwardAssessmentsAsGroup() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUpwardAssessmentAsGroup on this unsaved GroupAssessmentList.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (UpwardAssessment::LoadArrayByGroupId($this->intId) as $objUpwardAssessment) {
					$objUpwardAssessment->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`upward_assessment`
				WHERE
					`group_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		// Related Many-to-Many Objects' Methods for UserAsAssessmentManager
		//-------------------------------------------------------------------

		/**
		 * Gets all many-to-many associated UsersAsAssessmentManager as an array of User objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return User[]
		*/ 
		public function GetUserAsAssessmentManagerArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return User::LoadArrayByGroupAssessmentListAsAssessmentManager($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all many-to-many associated UsersAsAssessmentManager
		 * @return int
		*/ 
		public function CountUsersAsAssessmentManager() {
			if ((is_null($this->intId)))
				return 0;

			return User::CountByGroupAssessmentListAsAssessmentManager($this->intId);
		}

		/**
		 * Checks to see if an association exists with a specific UserAsAssessmentManager
		 * @param User $objUser
		 * @return bool
		*/
		public function IsUserAsAssessmentManagerAssociated(User $objUser) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsUserAsAssessmentManagerAssociated on this unsaved GroupAssessmentList.');
			if ((is_null($objUser->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsUserAsAssessmentManagerAssociated on this GroupAssessmentList with an unsaved User.');

			$intRowCount = GroupAssessmentList::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::GroupAssessmentList()->Id, $this->intId),
					QQ::Equal(QQN::GroupAssessmentList()->UserAsAssessmentManager->UserId, $objUser->Id)
				)
			);

			return ($intRowCount > 0);
		}

		/**
		 * Journals the UserAsAssessmentManager relationship into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function JournalUserAsAssessmentManagerAssociation($intAssociatedId, $strJournalCommand) {
			$objDatabase = GroupAssessmentList::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `assessment_manager_assn` (
					`group_assessment_id`,
					`user_id`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($intAssociatedId) . ',
					' . (($objDatabase->JournaledById) ? $objDatabase->JournaledById : 'NULL') . ',
					' . $objDatabase->SqlVariable($strJournalCommand) . ',
					NOW()
				);
			');
		}

		/**
		 * Gets the historical journal for an object's UserAsAssessmentManager relationship from the log database.
		 * @param integer intId
		 * @return QDatabaseResult $objResult
		 */
		public static function GetJournalUserAsAssessmentManagerAssociationForId($intId) {
			$objDatabase = GroupAssessmentList::GetDatabase()->JournalingDatabase;

			return $objDatabase->Query('SELECT * FROM assessment_manager_assn WHERE group_assessment_id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');
		}

		/**
		 * Gets the historical journal for this object's UserAsAssessmentManager relationship from the log database.
		 * @return QDatabaseResult $objResult
		 */
		public function GetJournalUserAsAssessmentManagerAssociation() {
			return GroupAssessmentList::GetJournalUserAsAssessmentManagerAssociationForId($this->intId);
		}

		/**
		 * Associates a UserAsAssessmentManager
		 * @param User $objUser
		 * @return void
		*/ 
		public function AssociateUserAsAssessmentManager(User $objUser) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateUserAsAssessmentManager on this unsaved GroupAssessmentList.');
			if ((is_null($objUser->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateUserAsAssessmentManager on this GroupAssessmentList with an unsaved User.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				INSERT INTO `assessment_manager_assn` (
					`group_assessment_id`,
					`user_id`
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($objUser->Id) . '
				)
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase)
				$this->JournalUserAsAssessmentManagerAssociation($objUser->Id, 'INSERT');
		}

		/**
		 * Unassociates a UserAsAssessmentManager
		 * @param User $objUser
		 * @return void
		*/ 
		public function UnassociateUserAsAssessmentManager(User $objUser) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUserAsAssessmentManager on this unsaved GroupAssessmentList.');
			if ((is_null($objUser->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUserAsAssessmentManager on this GroupAssessmentList with an unsaved User.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`assessment_manager_assn`
				WHERE
					`group_assessment_id` = ' . $objDatabase->SqlVariable($this->intId) . ' AND
					`user_id` = ' . $objDatabase->SqlVariable($objUser->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase)
				$this->JournalUserAsAssessmentManagerAssociation($objUser->Id, 'DELETE');
		}

		/**
		 * Unassociates all UsersAsAssessmentManager
		 * @return void
		*/ 
		public function UnassociateAllUsersAsAssessmentManager() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAllUserAsAssessmentManagerArray on this unsaved GroupAssessmentList.');

			// Get the Database Object for this Class
			$objDatabase = GroupAssessmentList::GetDatabase();

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objResult = $objDatabase->Query('SELECT `user_id` AS associated_id FROM `assessment_manager_assn` WHERE `group_assessment_id` = ' . $objDatabase->SqlVariable($this->intId));
				while ($objRow = $objResult->GetNextRow()) {
					$this->JournalUserAsAssessmentManagerAssociation($objRow->GetColumn('associated_id'), 'DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`assessment_manager_assn`
				WHERE
					`group_assessment_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}




		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="GroupAssessmentList"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="TotalKeys" type="xsd:int"/>';
			$strToReturn .= '<element name="KeysLeft" type="xsd:int"/>';
			$strToReturn .= '<element name="Resource" type="xsd1:Resource"/>';
			$strToReturn .= '<element name="KeyCode" type="xsd:string"/>';
			$strToReturn .= '<element name="Description" type="xsd:string"/>';
			$strToReturn .= '<element name="DateModified" type="xsd:dateTime"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('GroupAssessmentList', $strComplexTypeArray)) {
				$strComplexTypeArray['GroupAssessmentList'] = GroupAssessmentList::GetSoapComplexTypeXml();
				Resource::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, GroupAssessmentList::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new GroupAssessmentList();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if (property_exists($objSoapObject, 'TotalKeys'))
				$objToReturn->intTotalKeys = $objSoapObject->TotalKeys;
			if (property_exists($objSoapObject, 'KeysLeft'))
				$objToReturn->intKeysLeft = $objSoapObject->KeysLeft;
			if ((property_exists($objSoapObject, 'Resource')) &&
				($objSoapObject->Resource))
				$objToReturn->Resource = Resource::GetObjectFromSoapObject($objSoapObject->Resource);
			if (property_exists($objSoapObject, 'KeyCode'))
				$objToReturn->strKeyCode = $objSoapObject->KeyCode;
			if (property_exists($objSoapObject, 'Description'))
				$objToReturn->strDescription = $objSoapObject->Description;
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
				array_push($objArrayToReturn, GroupAssessmentList::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objResource)
				$objObject->objResource = Resource::GetSoapObjectFromObject($objObject->objResource, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intResourceId = null;
			if ($objObject->dttDateModified)
				$objObject->dttDateModified = $objObject->dttDateModified->__toString(QDateTime::FormatSoap);
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $UserId
	 * @property-read QQNodeUser $User
	 * @property-read QQNodeUser $_ChildTableNode
	 */
	class QQNodeGroupAssessmentListUserAsAssessmentManager extends QQAssociationNode {
		protected $strType = 'association';
		protected $strName = 'userasassessmentmanager';

		protected $strTableName = 'assessment_manager_assn';
		protected $strPrimaryKey = 'group_assessment_id';
		protected $strClassName = 'User';

		public function __get($strName) {
			switch ($strName) {
				case 'UserId':
					return new QQNode('user_id', 'UserId', 'integer', $this);
				case 'User':
					return new QQNodeUser('user_id', 'UserId', 'integer', $this);
				case '_ChildTableNode':
					return new QQNodeUser('user_id', 'UserId', 'integer', $this);
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
	 * @property-read QQNode $TotalKeys
	 * @property-read QQNode $KeysLeft
	 * @property-read QQNode $ResourceId
	 * @property-read QQNodeResource $Resource
	 * @property-read QQNode $KeyCode
	 * @property-read QQNode $Description
	 * @property-read QQNode $DateModified
	 * @property-read QQNodeGroupAssessmentListUserAsAssessmentManager $UserAsAssessmentManager
	 * @property-read QQReverseReferenceNodeIntegrationAssessment $IntegrationAssessmentAsGroup
	 * @property-read QQReverseReferenceNodeKingdomBusinessAssessment $KingdomBusinessAssessmentAsGroup
	 * @property-read QQReverseReferenceNodeLemon50Assessment $Lemon50AssessmentAsGroup
	 * @property-read QQReverseReferenceNodeLemonAssessment $LemonAssessmentAsGroup
	 * @property-read QQReverseReferenceNodeLemonloversAssessment $LemonloversAssessmentAsGroup
	 * @property-read QQReverseReferenceNodeLraAssessment $LraAssessmentAsGroup
	 * @property-read QQReverseReferenceNodePartneringAwarenessAssessment $PartneringAwarenessAssessmentAsGroup
	 * @property-read QQReverseReferenceNodePartneringReadinessAssessment $PartneringReadinessAssessmentAsGroup
	 * @property-read QQReverseReferenceNodePostventureAssessment $PostventureAssessmentAsGroup
	 * @property-read QQReverseReferenceNodeSeasonalAssessment $SeasonalAssessmentAsGroup
	 * @property-read QQReverseReferenceNodeTenFAssessment $TenFAssessmentAsGroup
	 * @property-read QQReverseReferenceNodeTenPAssessment $TenPAssessmentAsGroup
	 * @property-read QQReverseReferenceNodeTimeAssessment $TimeAssessmentAsGroup
	 * @property-read QQReverseReferenceNodeUpwardAssessment $UpwardAssessmentAsGroup
	 */
	class QQNodeGroupAssessmentList extends QQNode {
		protected $strTableName = 'group_assessment_list';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'GroupAssessmentList';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'TotalKeys':
					return new QQNode('total_keys', 'TotalKeys', 'integer', $this);
				case 'KeysLeft':
					return new QQNode('keys_left', 'KeysLeft', 'integer', $this);
				case 'ResourceId':
					return new QQNode('resource_id', 'ResourceId', 'integer', $this);
				case 'Resource':
					return new QQNodeResource('resource_id', 'Resource', 'integer', $this);
				case 'KeyCode':
					return new QQNode('key_code', 'KeyCode', 'string', $this);
				case 'Description':
					return new QQNode('description', 'Description', 'string', $this);
				case 'DateModified':
					return new QQNode('date_modified', 'DateModified', 'QDateTime', $this);
				case 'UserAsAssessmentManager':
					return new QQNodeGroupAssessmentListUserAsAssessmentManager($this);
				case 'IntegrationAssessmentAsGroup':
					return new QQReverseReferenceNodeIntegrationAssessment($this, 'integrationassessmentasgroup', 'reverse_reference', 'group_id');
				case 'KingdomBusinessAssessmentAsGroup':
					return new QQReverseReferenceNodeKingdomBusinessAssessment($this, 'kingdombusinessassessmentasgroup', 'reverse_reference', 'group_id');
				case 'Lemon50AssessmentAsGroup':
					return new QQReverseReferenceNodeLemon50Assessment($this, 'lemon50assessmentasgroup', 'reverse_reference', 'group_id');
				case 'LemonAssessmentAsGroup':
					return new QQReverseReferenceNodeLemonAssessment($this, 'lemonassessmentasgroup', 'reverse_reference', 'group_id');
				case 'LemonloversAssessmentAsGroup':
					return new QQReverseReferenceNodeLemonloversAssessment($this, 'lemonloversassessmentasgroup', 'reverse_reference', 'group_id');
				case 'LraAssessmentAsGroup':
					return new QQReverseReferenceNodeLraAssessment($this, 'lraassessmentasgroup', 'reverse_reference', 'group_id');
				case 'PartneringAwarenessAssessmentAsGroup':
					return new QQReverseReferenceNodePartneringAwarenessAssessment($this, 'partneringawarenessassessmentasgroup', 'reverse_reference', 'group_id');
				case 'PartneringReadinessAssessmentAsGroup':
					return new QQReverseReferenceNodePartneringReadinessAssessment($this, 'partneringreadinessassessmentasgroup', 'reverse_reference', 'group_id');
				case 'PostventureAssessmentAsGroup':
					return new QQReverseReferenceNodePostventureAssessment($this, 'postventureassessmentasgroup', 'reverse_reference', 'group_id');
				case 'SeasonalAssessmentAsGroup':
					return new QQReverseReferenceNodeSeasonalAssessment($this, 'seasonalassessmentasgroup', 'reverse_reference', 'group_id');
				case 'TenFAssessmentAsGroup':
					return new QQReverseReferenceNodeTenFAssessment($this, 'tenfassessmentasgroup', 'reverse_reference', 'group_id');
				case 'TenPAssessmentAsGroup':
					return new QQReverseReferenceNodeTenPAssessment($this, 'tenpassessmentasgroup', 'reverse_reference', 'group_id');
				case 'TimeAssessmentAsGroup':
					return new QQReverseReferenceNodeTimeAssessment($this, 'timeassessmentasgroup', 'reverse_reference', 'group_id');
				case 'UpwardAssessmentAsGroup':
					return new QQReverseReferenceNodeUpwardAssessment($this, 'upwardassessmentasgroup', 'reverse_reference', 'group_id');

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
	 * @property-read QQNode $TotalKeys
	 * @property-read QQNode $KeysLeft
	 * @property-read QQNode $ResourceId
	 * @property-read QQNodeResource $Resource
	 * @property-read QQNode $KeyCode
	 * @property-read QQNode $Description
	 * @property-read QQNode $DateModified
	 * @property-read QQNodeGroupAssessmentListUserAsAssessmentManager $UserAsAssessmentManager
	 * @property-read QQReverseReferenceNodeIntegrationAssessment $IntegrationAssessmentAsGroup
	 * @property-read QQReverseReferenceNodeKingdomBusinessAssessment $KingdomBusinessAssessmentAsGroup
	 * @property-read QQReverseReferenceNodeLemon50Assessment $Lemon50AssessmentAsGroup
	 * @property-read QQReverseReferenceNodeLemonAssessment $LemonAssessmentAsGroup
	 * @property-read QQReverseReferenceNodeLemonloversAssessment $LemonloversAssessmentAsGroup
	 * @property-read QQReverseReferenceNodeLraAssessment $LraAssessmentAsGroup
	 * @property-read QQReverseReferenceNodePartneringAwarenessAssessment $PartneringAwarenessAssessmentAsGroup
	 * @property-read QQReverseReferenceNodePartneringReadinessAssessment $PartneringReadinessAssessmentAsGroup
	 * @property-read QQReverseReferenceNodePostventureAssessment $PostventureAssessmentAsGroup
	 * @property-read QQReverseReferenceNodeSeasonalAssessment $SeasonalAssessmentAsGroup
	 * @property-read QQReverseReferenceNodeTenFAssessment $TenFAssessmentAsGroup
	 * @property-read QQReverseReferenceNodeTenPAssessment $TenPAssessmentAsGroup
	 * @property-read QQReverseReferenceNodeTimeAssessment $TimeAssessmentAsGroup
	 * @property-read QQReverseReferenceNodeUpwardAssessment $UpwardAssessmentAsGroup
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeGroupAssessmentList extends QQReverseReferenceNode {
		protected $strTableName = 'group_assessment_list';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'GroupAssessmentList';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'TotalKeys':
					return new QQNode('total_keys', 'TotalKeys', 'integer', $this);
				case 'KeysLeft':
					return new QQNode('keys_left', 'KeysLeft', 'integer', $this);
				case 'ResourceId':
					return new QQNode('resource_id', 'ResourceId', 'integer', $this);
				case 'Resource':
					return new QQNodeResource('resource_id', 'Resource', 'integer', $this);
				case 'KeyCode':
					return new QQNode('key_code', 'KeyCode', 'string', $this);
				case 'Description':
					return new QQNode('description', 'Description', 'string', $this);
				case 'DateModified':
					return new QQNode('date_modified', 'DateModified', 'QDateTime', $this);
				case 'UserAsAssessmentManager':
					return new QQNodeGroupAssessmentListUserAsAssessmentManager($this);
				case 'IntegrationAssessmentAsGroup':
					return new QQReverseReferenceNodeIntegrationAssessment($this, 'integrationassessmentasgroup', 'reverse_reference', 'group_id');
				case 'KingdomBusinessAssessmentAsGroup':
					return new QQReverseReferenceNodeKingdomBusinessAssessment($this, 'kingdombusinessassessmentasgroup', 'reverse_reference', 'group_id');
				case 'Lemon50AssessmentAsGroup':
					return new QQReverseReferenceNodeLemon50Assessment($this, 'lemon50assessmentasgroup', 'reverse_reference', 'group_id');
				case 'LemonAssessmentAsGroup':
					return new QQReverseReferenceNodeLemonAssessment($this, 'lemonassessmentasgroup', 'reverse_reference', 'group_id');
				case 'LemonloversAssessmentAsGroup':
					return new QQReverseReferenceNodeLemonloversAssessment($this, 'lemonloversassessmentasgroup', 'reverse_reference', 'group_id');
				case 'LraAssessmentAsGroup':
					return new QQReverseReferenceNodeLraAssessment($this, 'lraassessmentasgroup', 'reverse_reference', 'group_id');
				case 'PartneringAwarenessAssessmentAsGroup':
					return new QQReverseReferenceNodePartneringAwarenessAssessment($this, 'partneringawarenessassessmentasgroup', 'reverse_reference', 'group_id');
				case 'PartneringReadinessAssessmentAsGroup':
					return new QQReverseReferenceNodePartneringReadinessAssessment($this, 'partneringreadinessassessmentasgroup', 'reverse_reference', 'group_id');
				case 'PostventureAssessmentAsGroup':
					return new QQReverseReferenceNodePostventureAssessment($this, 'postventureassessmentasgroup', 'reverse_reference', 'group_id');
				case 'SeasonalAssessmentAsGroup':
					return new QQReverseReferenceNodeSeasonalAssessment($this, 'seasonalassessmentasgroup', 'reverse_reference', 'group_id');
				case 'TenFAssessmentAsGroup':
					return new QQReverseReferenceNodeTenFAssessment($this, 'tenfassessmentasgroup', 'reverse_reference', 'group_id');
				case 'TenPAssessmentAsGroup':
					return new QQReverseReferenceNodeTenPAssessment($this, 'tenpassessmentasgroup', 'reverse_reference', 'group_id');
				case 'TimeAssessmentAsGroup':
					return new QQReverseReferenceNodeTimeAssessment($this, 'timeassessmentasgroup', 'reverse_reference', 'group_id');
				case 'UpwardAssessmentAsGroup':
					return new QQReverseReferenceNodeUpwardAssessment($this, 'upwardassessmentasgroup', 'reverse_reference', 'group_id');

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