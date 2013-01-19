<?php
	/**
	 * The abstract UserGen class defined here is
	 * code-generated and contains all the basic CRUD-type functionality as well as
	 * basic methods to handle relationships and index-based loading.
	 *
	 * To use, you should use the User subclass which
	 * extends this UserGen class.
	 *
	 * Because subsequent re-code generations will overwrite any changes to this
	 * file, you should leave this file unaltered to prevent yourself from losing
	 * any information or code changes.  All customizations should be done by
	 * overriding existing or implementing new methods, properties and variables
	 * in the User class.
	 * 
	 * @package My Application
	 * @subpackage GeneratedDataObjects
	 * @property integer $Id the value for intId (Read-Only PK)
	 * @property integer $LoginId the value for intLoginId 
	 * @property string $FirstName the value for strFirstName 
	 * @property string $LastName the value for strLastName 
	 * @property string $Email the value for strEmail 
	 * @property boolean $Gender the value for blnGender 
	 * @property string $Country the value for strCountry 
	 * @property string $Department the value for strDepartment 
	 * @property string $Title the value for strTitle 
	 * @property integer $Tenure the value for intTenure 
	 * @property integer $CareerLength the value for intCareerLength 
	 * @property Login $Login the value for the Login object referenced by intLoginId 
	 * @property Company $_Company the value for the private _objCompany (Read-Only) if set due to an expansion on the company_user_assn association table
	 * @property Company[] $_CompanyArray the value for the private _objCompanyArray (Read-Only) if set due to an ExpandAsArray on the company_user_assn association table
	 * @property Resource $_Resource the value for the private _objResource (Read-Only) if set due to an expansion on the resource_user_assn association table
	 * @property Resource[] $_ResourceArray the value for the private _objResourceArray (Read-Only) if set due to an ExpandAsArray on the resource_user_assn association table
	 * @property Scorecard $_Scorecard the value for the private _objScorecard (Read-Only) if set due to an expansion on the scorecard_user_assn association table
	 * @property Scorecard[] $_ScorecardArray the value for the private _objScorecardArray (Read-Only) if set due to an ExpandAsArray on the scorecard_user_assn association table
	 * @property ActionItems $_ActionItemsAsModifiedBy the value for the private _objActionItemsAsModifiedBy (Read-Only) if set due to an expansion on the action_items.modified_by reverse relationship
	 * @property ActionItems[] $_ActionItemsAsModifiedByArray the value for the private _objActionItemsAsModifiedByArray (Read-Only) if set due to an ExpandAsArray on the action_items.modified_by reverse relationship
	 * @property ActionItems $_ActionItemsAsWho the value for the private _objActionItemsAsWho (Read-Only) if set due to an expansion on the action_items.who reverse relationship
	 * @property ActionItems[] $_ActionItemsAsWhoArray the value for the private _objActionItemsAsWhoArray (Read-Only) if set due to an ExpandAsArray on the action_items.who reverse relationship
	 * @property KingdomBusinessAssessment $_KingdomBusinessAssessment the value for the private _objKingdomBusinessAssessment (Read-Only) if set due to an expansion on the kingdom_business_assessment.user_id reverse relationship
	 * @property KingdomBusinessAssessment[] $_KingdomBusinessAssessmentArray the value for the private _objKingdomBusinessAssessmentArray (Read-Only) if set due to an ExpandAsArray on the kingdom_business_assessment.user_id reverse relationship
	 * @property Kpis $_KpisAsModifiedBy the value for the private _objKpisAsModifiedBy (Read-Only) if set due to an expansion on the kpis.modified_by reverse relationship
	 * @property Kpis[] $_KpisAsModifiedByArray the value for the private _objKpisAsModifiedByArray (Read-Only) if set due to an ExpandAsArray on the kpis.modified_by reverse relationship
	 * @property LemonAssessment $_LemonAssessment the value for the private _objLemonAssessment (Read-Only) if set due to an expansion on the lemon_assessment.user_id reverse relationship
	 * @property LemonAssessment[] $_LemonAssessmentArray the value for the private _objLemonAssessmentArray (Read-Only) if set due to an ExpandAsArray on the lemon_assessment.user_id reverse relationship
	 * @property Statement $_StatementAsModifiedBy the value for the private _objStatementAsModifiedBy (Read-Only) if set due to an expansion on the statement.modified_by reverse relationship
	 * @property Statement[] $_StatementAsModifiedByArray the value for the private _objStatementAsModifiedByArray (Read-Only) if set due to an ExpandAsArray on the statement.modified_by reverse relationship
	 * @property Strategy $_StrategyAsModifiedBy the value for the private _objStrategyAsModifiedBy (Read-Only) if set due to an expansion on the strategy.modified_by reverse relationship
	 * @property Strategy[] $_StrategyAsModifiedByArray the value for the private _objStrategyAsModifiedByArray (Read-Only) if set due to an ExpandAsArray on the strategy.modified_by reverse relationship
	 * @property TenFAssessment $_TenFAssessment the value for the private _objTenFAssessment (Read-Only) if set due to an expansion on the ten_f_assessment.user_id reverse relationship
	 * @property TenFAssessment[] $_TenFAssessmentArray the value for the private _objTenFAssessmentArray (Read-Only) if set due to an ExpandAsArray on the ten_f_assessment.user_id reverse relationship
	 * @property TenPAssessment $_TenPAssessment the value for the private _objTenPAssessment (Read-Only) if set due to an expansion on the ten_p_assessment.user_id reverse relationship
	 * @property TenPAssessment[] $_TenPAssessmentArray the value for the private _objTenPAssessmentArray (Read-Only) if set due to an ExpandAsArray on the ten_p_assessment.user_id reverse relationship
	 * @property boolean $__Restored whether or not this object was restored from the database (as opposed to created new)
	 */
	class UserGen extends QBaseClass {

		///////////////////////////////////////////////////////////////////////
		// PROTECTED MEMBER VARIABLES and TEXT FIELD MAXLENGTHS (if applicable)
		///////////////////////////////////////////////////////////////////////
		
		/**
		 * Protected member variable that maps to the database PK Identity column user.id
		 * @var integer intId
		 */
		protected $intId;
		const IdDefault = null;


		/**
		 * Protected member variable that maps to the database column user.login_id
		 * @var integer intLoginId
		 */
		protected $intLoginId;
		const LoginIdDefault = null;


		/**
		 * Protected member variable that maps to the database column user.first_name
		 * @var string strFirstName
		 */
		protected $strFirstName;
		const FirstNameDefault = null;


		/**
		 * Protected member variable that maps to the database column user.last_name
		 * @var string strLastName
		 */
		protected $strLastName;
		const LastNameDefault = null;


		/**
		 * Protected member variable that maps to the database column user.email
		 * @var string strEmail
		 */
		protected $strEmail;
		const EmailDefault = null;


		/**
		 * Protected member variable that maps to the database column user.gender
		 * @var boolean blnGender
		 */
		protected $blnGender;
		const GenderDefault = null;


		/**
		 * Protected member variable that maps to the database column user.country
		 * @var string strCountry
		 */
		protected $strCountry;
		const CountryMaxLength = 255;
		const CountryDefault = null;


		/**
		 * Protected member variable that maps to the database column user.department
		 * @var string strDepartment
		 */
		protected $strDepartment;
		const DepartmentMaxLength = 255;
		const DepartmentDefault = null;


		/**
		 * Protected member variable that maps to the database column user.title
		 * @var string strTitle
		 */
		protected $strTitle;
		const TitleMaxLength = 255;
		const TitleDefault = null;


		/**
		 * Protected member variable that maps to the database column user.tenure
		 * @var integer intTenure
		 */
		protected $intTenure;
		const TenureDefault = null;


		/**
		 * Protected member variable that maps to the database column user.career_length
		 * @var integer intCareerLength
		 */
		protected $intCareerLength;
		const CareerLengthDefault = null;


		/**
		 * Private member variable that stores a reference to a single Company object
		 * (of type Company), if this User object was restored with
		 * an expansion on the company_user_assn association table.
		 * @var Company _objCompany;
		 */
		private $_objCompany;

		/**
		 * Private member variable that stores a reference to an array of Company objects
		 * (of type Company[]), if this User object was restored with
		 * an ExpandAsArray on the company_user_assn association table.
		 * @var Company[] _objCompanyArray;
		 */
		private $_objCompanyArray = array();

		/**
		 * Private member variable that stores a reference to a single Resource object
		 * (of type Resource), if this User object was restored with
		 * an expansion on the resource_user_assn association table.
		 * @var Resource _objResource;
		 */
		private $_objResource;

		/**
		 * Private member variable that stores a reference to an array of Resource objects
		 * (of type Resource[]), if this User object was restored with
		 * an ExpandAsArray on the resource_user_assn association table.
		 * @var Resource[] _objResourceArray;
		 */
		private $_objResourceArray = array();

		/**
		 * Private member variable that stores a reference to a single Scorecard object
		 * (of type Scorecard), if this User object was restored with
		 * an expansion on the scorecard_user_assn association table.
		 * @var Scorecard _objScorecard;
		 */
		private $_objScorecard;

		/**
		 * Private member variable that stores a reference to an array of Scorecard objects
		 * (of type Scorecard[]), if this User object was restored with
		 * an ExpandAsArray on the scorecard_user_assn association table.
		 * @var Scorecard[] _objScorecardArray;
		 */
		private $_objScorecardArray = array();

		/**
		 * Private member variable that stores a reference to a single ActionItemsAsModifiedBy object
		 * (of type ActionItems), if this User object was restored with
		 * an expansion on the action_items association table.
		 * @var ActionItems _objActionItemsAsModifiedBy;
		 */
		private $_objActionItemsAsModifiedBy;

		/**
		 * Private member variable that stores a reference to an array of ActionItemsAsModifiedBy objects
		 * (of type ActionItems[]), if this User object was restored with
		 * an ExpandAsArray on the action_items association table.
		 * @var ActionItems[] _objActionItemsAsModifiedByArray;
		 */
		private $_objActionItemsAsModifiedByArray = array();

		/**
		 * Private member variable that stores a reference to a single ActionItemsAsWho object
		 * (of type ActionItems), if this User object was restored with
		 * an expansion on the action_items association table.
		 * @var ActionItems _objActionItemsAsWho;
		 */
		private $_objActionItemsAsWho;

		/**
		 * Private member variable that stores a reference to an array of ActionItemsAsWho objects
		 * (of type ActionItems[]), if this User object was restored with
		 * an ExpandAsArray on the action_items association table.
		 * @var ActionItems[] _objActionItemsAsWhoArray;
		 */
		private $_objActionItemsAsWhoArray = array();

		/**
		 * Private member variable that stores a reference to a single KingdomBusinessAssessment object
		 * (of type KingdomBusinessAssessment), if this User object was restored with
		 * an expansion on the kingdom_business_assessment association table.
		 * @var KingdomBusinessAssessment _objKingdomBusinessAssessment;
		 */
		private $_objKingdomBusinessAssessment;

		/**
		 * Private member variable that stores a reference to an array of KingdomBusinessAssessment objects
		 * (of type KingdomBusinessAssessment[]), if this User object was restored with
		 * an ExpandAsArray on the kingdom_business_assessment association table.
		 * @var KingdomBusinessAssessment[] _objKingdomBusinessAssessmentArray;
		 */
		private $_objKingdomBusinessAssessmentArray = array();

		/**
		 * Private member variable that stores a reference to a single KpisAsModifiedBy object
		 * (of type Kpis), if this User object was restored with
		 * an expansion on the kpis association table.
		 * @var Kpis _objKpisAsModifiedBy;
		 */
		private $_objKpisAsModifiedBy;

		/**
		 * Private member variable that stores a reference to an array of KpisAsModifiedBy objects
		 * (of type Kpis[]), if this User object was restored with
		 * an ExpandAsArray on the kpis association table.
		 * @var Kpis[] _objKpisAsModifiedByArray;
		 */
		private $_objKpisAsModifiedByArray = array();

		/**
		 * Private member variable that stores a reference to a single LemonAssessment object
		 * (of type LemonAssessment), if this User object was restored with
		 * an expansion on the lemon_assessment association table.
		 * @var LemonAssessment _objLemonAssessment;
		 */
		private $_objLemonAssessment;

		/**
		 * Private member variable that stores a reference to an array of LemonAssessment objects
		 * (of type LemonAssessment[]), if this User object was restored with
		 * an ExpandAsArray on the lemon_assessment association table.
		 * @var LemonAssessment[] _objLemonAssessmentArray;
		 */
		private $_objLemonAssessmentArray = array();

		/**
		 * Private member variable that stores a reference to a single StatementAsModifiedBy object
		 * (of type Statement), if this User object was restored with
		 * an expansion on the statement association table.
		 * @var Statement _objStatementAsModifiedBy;
		 */
		private $_objStatementAsModifiedBy;

		/**
		 * Private member variable that stores a reference to an array of StatementAsModifiedBy objects
		 * (of type Statement[]), if this User object was restored with
		 * an ExpandAsArray on the statement association table.
		 * @var Statement[] _objStatementAsModifiedByArray;
		 */
		private $_objStatementAsModifiedByArray = array();

		/**
		 * Private member variable that stores a reference to a single StrategyAsModifiedBy object
		 * (of type Strategy), if this User object was restored with
		 * an expansion on the strategy association table.
		 * @var Strategy _objStrategyAsModifiedBy;
		 */
		private $_objStrategyAsModifiedBy;

		/**
		 * Private member variable that stores a reference to an array of StrategyAsModifiedBy objects
		 * (of type Strategy[]), if this User object was restored with
		 * an ExpandAsArray on the strategy association table.
		 * @var Strategy[] _objStrategyAsModifiedByArray;
		 */
		private $_objStrategyAsModifiedByArray = array();

		/**
		 * Private member variable that stores a reference to a single TenFAssessment object
		 * (of type TenFAssessment), if this User object was restored with
		 * an expansion on the ten_f_assessment association table.
		 * @var TenFAssessment _objTenFAssessment;
		 */
		private $_objTenFAssessment;

		/**
		 * Private member variable that stores a reference to an array of TenFAssessment objects
		 * (of type TenFAssessment[]), if this User object was restored with
		 * an ExpandAsArray on the ten_f_assessment association table.
		 * @var TenFAssessment[] _objTenFAssessmentArray;
		 */
		private $_objTenFAssessmentArray = array();

		/**
		 * Private member variable that stores a reference to a single TenPAssessment object
		 * (of type TenPAssessment), if this User object was restored with
		 * an expansion on the ten_p_assessment association table.
		 * @var TenPAssessment _objTenPAssessment;
		 */
		private $_objTenPAssessment;

		/**
		 * Private member variable that stores a reference to an array of TenPAssessment objects
		 * (of type TenPAssessment[]), if this User object was restored with
		 * an ExpandAsArray on the ten_p_assessment association table.
		 * @var TenPAssessment[] _objTenPAssessmentArray;
		 */
		private $_objTenPAssessmentArray = array();

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
		 * in the database column user.login_id.
		 *
		 * NOTE: Always use the Login property getter to correctly retrieve this Login object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var Login objLogin
		 */
		protected $objLogin;





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
		 * Load a User from PK Info
		 * @param integer $intId
		 * @return User
		 */
		public static function Load($intId) {
			// Use QuerySingle to Perform the Query
			return User::QuerySingle(
				QQ::Equal(QQN::User()->Id, $intId)
			);
		}

		/**
		 * Load all Users
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return User[]
		 */
		public static function LoadAll($objOptionalClauses = null) {
			// Call User::QueryArray to perform the LoadAll query
			try {
				return User::QueryArray(QQ::All(), $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count all Users
		 * @return int
		 */
		public static function CountAll() {
			// Call User::QueryCount to perform the CountAll query
			return User::QueryCount(QQ::All());
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
			$objDatabase = User::GetDatabase();

			// Create/Build out the QueryBuilder object with User-specific SELET and FROM fields
			$objQueryBuilder = new QQueryBuilder($objDatabase, 'user');
			User::GetSelectFields($objQueryBuilder);
			$objQueryBuilder->AddFromItem('user');

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
		 * Static Qcodo Query method to query for a single User object.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return User the queried object
		 */
		public static function QuerySingle(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = User::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);

			// Instantiate a new User object and return it

			// Do we have to expand anything?
			if ($objQueryBuilder->ExpandAsArrayNodes) {
				$objToReturn = array();
				while ($objDbRow = $objDbResult->GetNextRow()) {
					$objItem = User::InstantiateDbRow($objDbRow, null, $objQueryBuilder->ExpandAsArrayNodes, $objToReturn, $objQueryBuilder->ColumnAliasArray);
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
				return User::InstantiateDbRow($objDbRow, null, null, null, $objQueryBuilder->ColumnAliasArray);
			}
		}

		/**
		 * Static Qcodo Query method to query for an array of User objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return User[] the queried objects as an array
		 */
		public static function QueryArray(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = User::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}

			// Perform the Query and Instantiate the Array Result
			$objDbResult = $objQueryBuilder->Database->Query($strQuery);
			return User::InstantiateDbResult($objDbResult, $objQueryBuilder->ExpandAsArrayNodes, $objQueryBuilder->ColumnAliasArray);
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
				$strQuery = User::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, false);
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
		 * Static Qcodo Query method to query for a count of User objects.
		 * Uses BuildQueryStatment to perform most of the work.
		 * @param QQCondition $objConditions any conditions on the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @param mixed[] $mixParameterArray a array of name-value pairs to perform PrepareStatement with
		 * @return integer the count of queried objects as an integer
		 */
		public static function QueryCount(QQCondition $objConditions, $objOptionalClauses = null, $mixParameterArray = null) {
			// Get the Query Statement
			try {
				$strQuery = User::BuildQueryStatement($objQueryBuilder, $objConditions, $objOptionalClauses, $mixParameterArray, true);
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
			$objDatabase = User::GetDatabase();

			// Lookup the QCache for This Query Statement
			$objCache = new QCache('query', 'user_' . serialize($strConditions));
			if (!($strQuery = $objCache->GetData())) {
				// Not Found -- Go ahead and Create/Build out a new QueryBuilder object with User-specific fields
				$objQueryBuilder = new QQueryBuilder($objDatabase);
				User::GetSelectFields($objQueryBuilder);
				User::GetFromFields($objQueryBuilder);

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
			return User::InstantiateDbResult($objDbResult);
		}*/

		/**
		 * Updates a QQueryBuilder with the SELECT fields for this User
		 * @param QQueryBuilder $objBuilder the Query Builder object to update
		 * @param string $strPrefix optional prefix to add to the SELECT fields
		 */
		public static function GetSelectFields(QQueryBuilder $objBuilder, $strPrefix = null) {
			if ($strPrefix) {
				$strTableName = $strPrefix;
				$strAliasPrefix = $strPrefix . '__';
			} else {
				$strTableName = 'user';
				$strAliasPrefix = '';
			}

			$objBuilder->AddSelectItem($strTableName, 'id', $strAliasPrefix . 'id');
			$objBuilder->AddSelectItem($strTableName, 'login_id', $strAliasPrefix . 'login_id');
			$objBuilder->AddSelectItem($strTableName, 'first_name', $strAliasPrefix . 'first_name');
			$objBuilder->AddSelectItem($strTableName, 'last_name', $strAliasPrefix . 'last_name');
			$objBuilder->AddSelectItem($strTableName, 'email', $strAliasPrefix . 'email');
			$objBuilder->AddSelectItem($strTableName, 'gender', $strAliasPrefix . 'gender');
			$objBuilder->AddSelectItem($strTableName, 'country', $strAliasPrefix . 'country');
			$objBuilder->AddSelectItem($strTableName, 'department', $strAliasPrefix . 'department');
			$objBuilder->AddSelectItem($strTableName, 'title', $strAliasPrefix . 'title');
			$objBuilder->AddSelectItem($strTableName, 'tenure', $strAliasPrefix . 'tenure');
			$objBuilder->AddSelectItem($strTableName, 'career_length', $strAliasPrefix . 'career_length');
		}




		///////////////////////////////
		// INSTANTIATION-RELATED METHODS
		///////////////////////////////

		/**
		 * Instantiate a User from a Database Row.
		 * Takes in an optional strAliasPrefix, used in case another Object::InstantiateDbRow
		 * is calling this User::InstantiateDbRow in order to perform
		 * early binding on referenced objects.
		 * @param QDatabaseRowBase $objDbRow
		 * @param string $strAliasPrefix
		 * @param string $strExpandAsArrayNodes
		 * @param QBaseClass $objPreviousItem
		 * @param string[] $strColumnAliasArray
		 * @return User
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
					$strAliasPrefix = 'user__';

				$strAlias = $strAliasPrefix . 'company__company_id__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objCompanyArray)) {
						$objPreviousChildItem = $objPreviousItem->_objCompanyArray[$intPreviousChildItemCount - 1];
						$objChildItem = Company::InstantiateDbRow($objDbRow, $strAliasPrefix . 'company__company_id__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objCompanyArray[] = $objChildItem;
					} else
						$objPreviousItem->_objCompanyArray[] = Company::InstantiateDbRow($objDbRow, $strAliasPrefix . 'company__company_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'resource__resource_id__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objResourceArray)) {
						$objPreviousChildItem = $objPreviousItem->_objResourceArray[$intPreviousChildItemCount - 1];
						$objChildItem = Resource::InstantiateDbRow($objDbRow, $strAliasPrefix . 'resource__resource_id__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objResourceArray[] = $objChildItem;
					} else
						$objPreviousItem->_objResourceArray[] = Resource::InstantiateDbRow($objDbRow, $strAliasPrefix . 'resource__resource_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'scorecard__scorecard_id__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objScorecardArray)) {
						$objPreviousChildItem = $objPreviousItem->_objScorecardArray[$intPreviousChildItemCount - 1];
						$objChildItem = Scorecard::InstantiateDbRow($objDbRow, $strAliasPrefix . 'scorecard__scorecard_id__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objScorecardArray[] = $objChildItem;
					} else
						$objPreviousItem->_objScorecardArray[] = Scorecard::InstantiateDbRow($objDbRow, $strAliasPrefix . 'scorecard__scorecard_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}


				$strAlias = $strAliasPrefix . 'actionitemsasmodifiedby__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objActionItemsAsModifiedByArray)) {
						$objPreviousChildItem = $objPreviousItem->_objActionItemsAsModifiedByArray[$intPreviousChildItemCount - 1];
						$objChildItem = ActionItems::InstantiateDbRow($objDbRow, $strAliasPrefix . 'actionitemsasmodifiedby__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objActionItemsAsModifiedByArray[] = $objChildItem;
					} else
						$objPreviousItem->_objActionItemsAsModifiedByArray[] = ActionItems::InstantiateDbRow($objDbRow, $strAliasPrefix . 'actionitemsasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'actionitemsaswho__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objActionItemsAsWhoArray)) {
						$objPreviousChildItem = $objPreviousItem->_objActionItemsAsWhoArray[$intPreviousChildItemCount - 1];
						$objChildItem = ActionItems::InstantiateDbRow($objDbRow, $strAliasPrefix . 'actionitemsaswho__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objActionItemsAsWhoArray[] = $objChildItem;
					} else
						$objPreviousItem->_objActionItemsAsWhoArray[] = ActionItems::InstantiateDbRow($objDbRow, $strAliasPrefix . 'actionitemsaswho__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'kingdombusinessassessment__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objKingdomBusinessAssessmentArray)) {
						$objPreviousChildItem = $objPreviousItem->_objKingdomBusinessAssessmentArray[$intPreviousChildItemCount - 1];
						$objChildItem = KingdomBusinessAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'kingdombusinessassessment__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objKingdomBusinessAssessmentArray[] = $objChildItem;
					} else
						$objPreviousItem->_objKingdomBusinessAssessmentArray[] = KingdomBusinessAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'kingdombusinessassessment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'kpisasmodifiedby__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objKpisAsModifiedByArray)) {
						$objPreviousChildItem = $objPreviousItem->_objKpisAsModifiedByArray[$intPreviousChildItemCount - 1];
						$objChildItem = Kpis::InstantiateDbRow($objDbRow, $strAliasPrefix . 'kpisasmodifiedby__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objKpisAsModifiedByArray[] = $objChildItem;
					} else
						$objPreviousItem->_objKpisAsModifiedByArray[] = Kpis::InstantiateDbRow($objDbRow, $strAliasPrefix . 'kpisasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'lemonassessment__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objLemonAssessmentArray)) {
						$objPreviousChildItem = $objPreviousItem->_objLemonAssessmentArray[$intPreviousChildItemCount - 1];
						$objChildItem = LemonAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'lemonassessment__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objLemonAssessmentArray[] = $objChildItem;
					} else
						$objPreviousItem->_objLemonAssessmentArray[] = LemonAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'lemonassessment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'statementasmodifiedby__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objStatementAsModifiedByArray)) {
						$objPreviousChildItem = $objPreviousItem->_objStatementAsModifiedByArray[$intPreviousChildItemCount - 1];
						$objChildItem = Statement::InstantiateDbRow($objDbRow, $strAliasPrefix . 'statementasmodifiedby__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objStatementAsModifiedByArray[] = $objChildItem;
					} else
						$objPreviousItem->_objStatementAsModifiedByArray[] = Statement::InstantiateDbRow($objDbRow, $strAliasPrefix . 'statementasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'strategyasmodifiedby__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objStrategyAsModifiedByArray)) {
						$objPreviousChildItem = $objPreviousItem->_objStrategyAsModifiedByArray[$intPreviousChildItemCount - 1];
						$objChildItem = Strategy::InstantiateDbRow($objDbRow, $strAliasPrefix . 'strategyasmodifiedby__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objStrategyAsModifiedByArray[] = $objChildItem;
					} else
						$objPreviousItem->_objStrategyAsModifiedByArray[] = Strategy::InstantiateDbRow($objDbRow, $strAliasPrefix . 'strategyasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'tenfassessment__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objTenFAssessmentArray)) {
						$objPreviousChildItem = $objPreviousItem->_objTenFAssessmentArray[$intPreviousChildItemCount - 1];
						$objChildItem = TenFAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'tenfassessment__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objTenFAssessmentArray[] = $objChildItem;
					} else
						$objPreviousItem->_objTenFAssessmentArray[] = TenFAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'tenfassessment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'tenpassessment__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objTenPAssessmentArray)) {
						$objPreviousChildItem = $objPreviousItem->_objTenPAssessmentArray[$intPreviousChildItemCount - 1];
						$objChildItem = TenPAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'tenpassessment__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objTenPAssessmentArray[] = $objChildItem;
					} else
						$objPreviousItem->_objTenPAssessmentArray[] = TenPAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'tenpassessment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				// Either return false to signal array expansion, or check-to-reset the Alias prefix and move on
				if ($blnExpandedViaArray)
					return false;
				else if ($strAliasPrefix == 'user__')
					$strAliasPrefix = null;
			}

			// Create a new instance of the User object
			$objToReturn = new User();
			$objToReturn->__blnRestored = true;

			$strAliasName = array_key_exists($strAliasPrefix . 'id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'id'] : $strAliasPrefix . 'id';
			$objToReturn->intId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'login_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'login_id'] : $strAliasPrefix . 'login_id';
			$objToReturn->intLoginId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'first_name', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'first_name'] : $strAliasPrefix . 'first_name';
			$objToReturn->strFirstName = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAliasName = array_key_exists($strAliasPrefix . 'last_name', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'last_name'] : $strAliasPrefix . 'last_name';
			$objToReturn->strLastName = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAliasName = array_key_exists($strAliasPrefix . 'email', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'email'] : $strAliasPrefix . 'email';
			$objToReturn->strEmail = $objDbRow->GetColumn($strAliasName, 'Blob');
			$strAliasName = array_key_exists($strAliasPrefix . 'gender', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'gender'] : $strAliasPrefix . 'gender';
			$objToReturn->blnGender = $objDbRow->GetColumn($strAliasName, 'Bit');
			$strAliasName = array_key_exists($strAliasPrefix . 'country', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'country'] : $strAliasPrefix . 'country';
			$objToReturn->strCountry = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'department', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'department'] : $strAliasPrefix . 'department';
			$objToReturn->strDepartment = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'title', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'title'] : $strAliasPrefix . 'title';
			$objToReturn->strTitle = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'tenure', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'tenure'] : $strAliasPrefix . 'tenure';
			$objToReturn->intTenure = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'career_length', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'career_length'] : $strAliasPrefix . 'career_length';
			$objToReturn->intCareerLength = $objDbRow->GetColumn($strAliasName, 'Integer');

			// Instantiate Virtual Attributes
			foreach ($objDbRow->GetColumnNameArray() as $strColumnName => $mixValue) {
				$strVirtualPrefix = $strAliasPrefix . '__';
				$strVirtualPrefixLength = strlen($strVirtualPrefix);
				if (substr($strColumnName, 0, $strVirtualPrefixLength) == $strVirtualPrefix)
					$objToReturn->__strVirtualAttributeArray[substr($strColumnName, $strVirtualPrefixLength)] = $mixValue;
			}

			// Prepare to Check for Early/Virtual Binding
			if (!$strAliasPrefix)
				$strAliasPrefix = 'user__';

			// Check for Login Early Binding
			$strAlias = $strAliasPrefix . 'login_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objLogin = Login::InstantiateDbRow($objDbRow, $strAliasPrefix . 'login_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);



			// Check for Company Virtual Binding
			$strAlias = $strAliasPrefix . 'company__company_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objCompanyArray[] = Company::InstantiateDbRow($objDbRow, $strAliasPrefix . 'company__company_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objCompany = Company::InstantiateDbRow($objDbRow, $strAliasPrefix . 'company__company_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for Resource Virtual Binding
			$strAlias = $strAliasPrefix . 'resource__resource_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objResourceArray[] = Resource::InstantiateDbRow($objDbRow, $strAliasPrefix . 'resource__resource_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objResource = Resource::InstantiateDbRow($objDbRow, $strAliasPrefix . 'resource__resource_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for Scorecard Virtual Binding
			$strAlias = $strAliasPrefix . 'scorecard__scorecard_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objScorecardArray[] = Scorecard::InstantiateDbRow($objDbRow, $strAliasPrefix . 'scorecard__scorecard_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objScorecard = Scorecard::InstantiateDbRow($objDbRow, $strAliasPrefix . 'scorecard__scorecard_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}


			// Check for ActionItemsAsModifiedBy Virtual Binding
			$strAlias = $strAliasPrefix . 'actionitemsasmodifiedby__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objActionItemsAsModifiedByArray[] = ActionItems::InstantiateDbRow($objDbRow, $strAliasPrefix . 'actionitemsasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objActionItemsAsModifiedBy = ActionItems::InstantiateDbRow($objDbRow, $strAliasPrefix . 'actionitemsasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for ActionItemsAsWho Virtual Binding
			$strAlias = $strAliasPrefix . 'actionitemsaswho__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objActionItemsAsWhoArray[] = ActionItems::InstantiateDbRow($objDbRow, $strAliasPrefix . 'actionitemsaswho__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objActionItemsAsWho = ActionItems::InstantiateDbRow($objDbRow, $strAliasPrefix . 'actionitemsaswho__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for KingdomBusinessAssessment Virtual Binding
			$strAlias = $strAliasPrefix . 'kingdombusinessassessment__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objKingdomBusinessAssessmentArray[] = KingdomBusinessAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'kingdombusinessassessment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objKingdomBusinessAssessment = KingdomBusinessAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'kingdombusinessassessment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for KpisAsModifiedBy Virtual Binding
			$strAlias = $strAliasPrefix . 'kpisasmodifiedby__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objKpisAsModifiedByArray[] = Kpis::InstantiateDbRow($objDbRow, $strAliasPrefix . 'kpisasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objKpisAsModifiedBy = Kpis::InstantiateDbRow($objDbRow, $strAliasPrefix . 'kpisasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for LemonAssessment Virtual Binding
			$strAlias = $strAliasPrefix . 'lemonassessment__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objLemonAssessmentArray[] = LemonAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'lemonassessment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objLemonAssessment = LemonAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'lemonassessment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for StatementAsModifiedBy Virtual Binding
			$strAlias = $strAliasPrefix . 'statementasmodifiedby__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objStatementAsModifiedByArray[] = Statement::InstantiateDbRow($objDbRow, $strAliasPrefix . 'statementasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objStatementAsModifiedBy = Statement::InstantiateDbRow($objDbRow, $strAliasPrefix . 'statementasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for StrategyAsModifiedBy Virtual Binding
			$strAlias = $strAliasPrefix . 'strategyasmodifiedby__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objStrategyAsModifiedByArray[] = Strategy::InstantiateDbRow($objDbRow, $strAliasPrefix . 'strategyasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objStrategyAsModifiedBy = Strategy::InstantiateDbRow($objDbRow, $strAliasPrefix . 'strategyasmodifiedby__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for TenFAssessment Virtual Binding
			$strAlias = $strAliasPrefix . 'tenfassessment__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objTenFAssessmentArray[] = TenFAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'tenfassessment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objTenFAssessment = TenFAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'tenfassessment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for TenPAssessment Virtual Binding
			$strAlias = $strAliasPrefix . 'tenpassessment__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objTenPAssessmentArray[] = TenPAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'tenpassessment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objTenPAssessment = TenPAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'tenpassessment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate an array of Users from a Database Result
		 * @param QDatabaseResultBase $objDbResult
		 * @param string $strExpandAsArrayNodes
		 * @param string[] $strColumnAliasArray
		 * @return User[]
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
					$objItem = User::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, $objLastRowItem, $strColumnAliasArray);
					if ($objItem) {
						$objToReturn[] = $objItem;
						$objLastRowItem = $objItem;
					}
				}
			} else {
				while ($objDbRow = $objDbResult->GetNextRow())
					$objToReturn[] = User::InstantiateDbRow($objDbRow, null, null, null, $strColumnAliasArray);
			}

			return $objToReturn;
		}

		/**
		 * Instantiate a single User object from a query cursor (e.g. a DB ResultSet).
		 * Cursor is automatically moved to the "next row" of the result set.
		 * Will return NULL if no cursor or if the cursor has no more rows in the resultset.
		 * @param QDatabaseResultBase $objDbResult cursor resource
		 * @return User next row resulting from the query
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
			return User::InstantiateDbRow($objDbRow, null, $strExpandAsArrayNodes, null, $strColumnAliasArray);
		}




		///////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Single Load and Array)
		///////////////////////////////////////////////////
			
		/**
		 * Load a single User object,
		 * by Id Index(es)
		 * @param integer $intId
		 * @return User
		*/
		public static function LoadById($intId, $objOptionalClauses = null) {
			return User::QuerySingle(
				QQ::Equal(QQN::User()->Id, $intId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of User objects,
		 * by LoginId Index(es)
		 * @param integer $intLoginId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return User[]
		*/
		public static function LoadArrayByLoginId($intLoginId, $objOptionalClauses = null) {
			// Call User::QueryArray to perform the LoadArrayByLoginId query
			try {
				return User::QueryArray(
					QQ::Equal(QQN::User()->LoginId, $intLoginId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Users
		 * by LoginId Index(es)
		 * @param integer $intLoginId
		 * @return int
		*/
		public static function CountByLoginId($intLoginId, $objOptionalClauses = null) {
			// Call User::QueryCount to perform the CountByLoginId query
			return User::QueryCount(
				QQ::Equal(QQN::User()->LoginId, $intLoginId)
			, $objOptionalClauses
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////
			/**
		 * Load an array of Company objects for a given Company
		 * via the company_user_assn table
		 * @param integer $intCompanyId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return User[]
		*/
		public static function LoadArrayByCompany($intCompanyId, $objOptionalClauses = null) {
			// Call User::QueryArray to perform the LoadArrayByCompany query
			try {
				return User::QueryArray(
					QQ::Equal(QQN::User()->Company->CompanyId, $intCompanyId),
					$objOptionalClauses
				);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Users for a given Company
		 * via the company_user_assn table
		 * @param integer $intCompanyId
		 * @return int
		*/
		public static function CountByCompany($intCompanyId, $objOptionalClauses = null) {
			return User::QueryCount(
				QQ::Equal(QQN::User()->Company->CompanyId, $intCompanyId),
				$objOptionalClauses
			);
		}
			/**
		 * Load an array of Resource objects for a given Resource
		 * via the resource_user_assn table
		 * @param integer $intResourceId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return User[]
		*/
		public static function LoadArrayByResource($intResourceId, $objOptionalClauses = null) {
			// Call User::QueryArray to perform the LoadArrayByResource query
			try {
				return User::QueryArray(
					QQ::Equal(QQN::User()->Resource->ResourceId, $intResourceId),
					$objOptionalClauses
				);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Users for a given Resource
		 * via the resource_user_assn table
		 * @param integer $intResourceId
		 * @return int
		*/
		public static function CountByResource($intResourceId, $objOptionalClauses = null) {
			return User::QueryCount(
				QQ::Equal(QQN::User()->Resource->ResourceId, $intResourceId),
				$objOptionalClauses
			);
		}
			/**
		 * Load an array of Scorecard objects for a given Scorecard
		 * via the scorecard_user_assn table
		 * @param integer $intScorecardId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return User[]
		*/
		public static function LoadArrayByScorecard($intScorecardId, $objOptionalClauses = null) {
			// Call User::QueryArray to perform the LoadArrayByScorecard query
			try {
				return User::QueryArray(
					QQ::Equal(QQN::User()->Scorecard->ScorecardId, $intScorecardId),
					$objOptionalClauses
				);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Users for a given Scorecard
		 * via the scorecard_user_assn table
		 * @param integer $intScorecardId
		 * @return int
		*/
		public static function CountByScorecard($intScorecardId, $objOptionalClauses = null) {
			return User::QueryCount(
				QQ::Equal(QQN::User()->Scorecard->ScorecardId, $intScorecardId),
				$objOptionalClauses
			);
		}




		//////////////////////////////////////
		// SAVE, DELETE, RELOAD and JOURNALING
		//////////////////////////////////////

		/**
		 * Save this User
		 * @param bool $blnForceInsert
		 * @param bool $blnForceUpdate
		 * @return int
		 */
		public function Save($blnForceInsert = false, $blnForceUpdate = false) {
			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			$mixToReturn = null;

			try {
				if ((!$this->__blnRestored) || ($blnForceInsert)) {
					// Perform an INSERT query
					$objDatabase->NonQuery('
						INSERT INTO `user` (
							`login_id`,
							`first_name`,
							`last_name`,
							`email`,
							`gender`,
							`country`,
							`department`,
							`title`,
							`tenure`,
							`career_length`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intLoginId) . ',
							' . $objDatabase->SqlVariable($this->strFirstName) . ',
							' . $objDatabase->SqlVariable($this->strLastName) . ',
							' . $objDatabase->SqlVariable($this->strEmail) . ',
							' . $objDatabase->SqlVariable($this->blnGender) . ',
							' . $objDatabase->SqlVariable($this->strCountry) . ',
							' . $objDatabase->SqlVariable($this->strDepartment) . ',
							' . $objDatabase->SqlVariable($this->strTitle) . ',
							' . $objDatabase->SqlVariable($this->intTenure) . ',
							' . $objDatabase->SqlVariable($this->intCareerLength) . '
						)
					');

					// Update Identity column and return its value
					$mixToReturn = $this->intId = $objDatabase->InsertId('user', 'id');

					// Journaling
					if ($objDatabase->JournalingDatabase) $this->Journal('INSERT');

				} else {
					// Perform an UPDATE query

					// First checking for Optimistic Locking constraints (if applicable)

					// Perform the UPDATE query
					$objDatabase->NonQuery('
						UPDATE
							`user`
						SET
							`login_id` = ' . $objDatabase->SqlVariable($this->intLoginId) . ',
							`first_name` = ' . $objDatabase->SqlVariable($this->strFirstName) . ',
							`last_name` = ' . $objDatabase->SqlVariable($this->strLastName) . ',
							`email` = ' . $objDatabase->SqlVariable($this->strEmail) . ',
							`gender` = ' . $objDatabase->SqlVariable($this->blnGender) . ',
							`country` = ' . $objDatabase->SqlVariable($this->strCountry) . ',
							`department` = ' . $objDatabase->SqlVariable($this->strDepartment) . ',
							`title` = ' . $objDatabase->SqlVariable($this->strTitle) . ',
							`tenure` = ' . $objDatabase->SqlVariable($this->intTenure) . ',
							`career_length` = ' . $objDatabase->SqlVariable($this->intCareerLength) . '
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
		 * Delete this User
		 * @return void
		 */
		public function Delete() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Cannot delete this User with an unset primary key.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();


			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`user`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($this->intId) . '');

			// Journaling
			if ($objDatabase->JournalingDatabase) $this->Journal('DELETE');
		}

		/**
		 * Delete all Users
		 * @return void
		 */
		public static function DeleteAll() {
			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				DELETE FROM
					`user`');
		}

		/**
		 * Truncate user table
		 * @return void
		 */
		public static function Truncate() {
			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the Query
			$objDatabase->NonQuery('
				TRUNCATE `user`');
		}

		/**
		 * Reload this User from the database.
		 * @return void
		 */
		public function Reload() {
			// Make sure we are actually Restored from the database
			if (!$this->__blnRestored)
				throw new QCallerException('Cannot call Reload() on a new, unsaved User object.');

			// Reload the Object
			$objReloaded = User::Load($this->intId);

			// Update $this's local variables to match
			$this->LoginId = $objReloaded->LoginId;
			$this->strFirstName = $objReloaded->strFirstName;
			$this->strLastName = $objReloaded->strLastName;
			$this->strEmail = $objReloaded->strEmail;
			$this->blnGender = $objReloaded->blnGender;
			$this->strCountry = $objReloaded->strCountry;
			$this->strDepartment = $objReloaded->strDepartment;
			$this->strTitle = $objReloaded->strTitle;
			$this->intTenure = $objReloaded->intTenure;
			$this->intCareerLength = $objReloaded->intCareerLength;
		}

		/**
		 * Journals the current object into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function Journal($strJournalCommand) {
			$objDatabase = User::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `user` (
					`id`,
					`login_id`,
					`first_name`,
					`last_name`,
					`email`,
					`gender`,
					`country`,
					`department`,
					`title`,
					`tenure`,
					`career_length`,
					__sys_login_id,
					__sys_action,
					__sys_date
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($this->intLoginId) . ',
					' . $objDatabase->SqlVariable($this->strFirstName) . ',
					' . $objDatabase->SqlVariable($this->strLastName) . ',
					' . $objDatabase->SqlVariable($this->strEmail) . ',
					' . $objDatabase->SqlVariable($this->blnGender) . ',
					' . $objDatabase->SqlVariable($this->strCountry) . ',
					' . $objDatabase->SqlVariable($this->strDepartment) . ',
					' . $objDatabase->SqlVariable($this->strTitle) . ',
					' . $objDatabase->SqlVariable($this->intTenure) . ',
					' . $objDatabase->SqlVariable($this->intCareerLength) . ',
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
		 * @return User[]
		 */
		public static function GetJournalForId($intId) {
			$objDatabase = User::GetDatabase()->JournalingDatabase;

			$objResult = $objDatabase->Query('SELECT * FROM user WHERE id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');

			return User::InstantiateDbResult($objResult);
		}

		/**
		 * Gets the historical journal for this object from the log database.
		 * Objects will have VirtualAttributes available to lookup login, date, and action information from the journal object.
		 * @return User[]
		 */
		public function GetJournal() {
			return User::GetJournalForId($this->intId);
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

				case 'LoginId':
					// Gets the value for intLoginId 
					// @return integer
					return $this->intLoginId;

				case 'FirstName':
					// Gets the value for strFirstName 
					// @return string
					return $this->strFirstName;

				case 'LastName':
					// Gets the value for strLastName 
					// @return string
					return $this->strLastName;

				case 'Email':
					// Gets the value for strEmail 
					// @return string
					return $this->strEmail;

				case 'Gender':
					// Gets the value for blnGender 
					// @return boolean
					return $this->blnGender;

				case 'Country':
					// Gets the value for strCountry 
					// @return string
					return $this->strCountry;

				case 'Department':
					// Gets the value for strDepartment 
					// @return string
					return $this->strDepartment;

				case 'Title':
					// Gets the value for strTitle 
					// @return string
					return $this->strTitle;

				case 'Tenure':
					// Gets the value for intTenure 
					// @return integer
					return $this->intTenure;

				case 'CareerLength':
					// Gets the value for intCareerLength 
					// @return integer
					return $this->intCareerLength;


				///////////////////
				// Member Objects
				///////////////////
				case 'Login':
					// Gets the value for the Login object referenced by intLoginId 
					// @return Login
					try {
						if ((!$this->objLogin) && (!is_null($this->intLoginId)))
							$this->objLogin = Login::Load($this->intLoginId);
						return $this->objLogin;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_Company':
					// Gets the value for the private _objCompany (Read-Only)
					// if set due to an expansion on the company_user_assn association table
					// @return Company
					return $this->_objCompany;

				case '_CompanyArray':
					// Gets the value for the private _objCompanyArray (Read-Only)
					// if set due to an ExpandAsArray on the company_user_assn association table
					// @return Company[]
					return (array) $this->_objCompanyArray;

				case '_Resource':
					// Gets the value for the private _objResource (Read-Only)
					// if set due to an expansion on the resource_user_assn association table
					// @return Resource
					return $this->_objResource;

				case '_ResourceArray':
					// Gets the value for the private _objResourceArray (Read-Only)
					// if set due to an ExpandAsArray on the resource_user_assn association table
					// @return Resource[]
					return (array) $this->_objResourceArray;

				case '_Scorecard':
					// Gets the value for the private _objScorecard (Read-Only)
					// if set due to an expansion on the scorecard_user_assn association table
					// @return Scorecard
					return $this->_objScorecard;

				case '_ScorecardArray':
					// Gets the value for the private _objScorecardArray (Read-Only)
					// if set due to an ExpandAsArray on the scorecard_user_assn association table
					// @return Scorecard[]
					return (array) $this->_objScorecardArray;

				case '_ActionItemsAsModifiedBy':
					// Gets the value for the private _objActionItemsAsModifiedBy (Read-Only)
					// if set due to an expansion on the action_items.modified_by reverse relationship
					// @return ActionItems
					return $this->_objActionItemsAsModifiedBy;

				case '_ActionItemsAsModifiedByArray':
					// Gets the value for the private _objActionItemsAsModifiedByArray (Read-Only)
					// if set due to an ExpandAsArray on the action_items.modified_by reverse relationship
					// @return ActionItems[]
					return (array) $this->_objActionItemsAsModifiedByArray;

				case '_ActionItemsAsWho':
					// Gets the value for the private _objActionItemsAsWho (Read-Only)
					// if set due to an expansion on the action_items.who reverse relationship
					// @return ActionItems
					return $this->_objActionItemsAsWho;

				case '_ActionItemsAsWhoArray':
					// Gets the value for the private _objActionItemsAsWhoArray (Read-Only)
					// if set due to an ExpandAsArray on the action_items.who reverse relationship
					// @return ActionItems[]
					return (array) $this->_objActionItemsAsWhoArray;

				case '_KingdomBusinessAssessment':
					// Gets the value for the private _objKingdomBusinessAssessment (Read-Only)
					// if set due to an expansion on the kingdom_business_assessment.user_id reverse relationship
					// @return KingdomBusinessAssessment
					return $this->_objKingdomBusinessAssessment;

				case '_KingdomBusinessAssessmentArray':
					// Gets the value for the private _objKingdomBusinessAssessmentArray (Read-Only)
					// if set due to an ExpandAsArray on the kingdom_business_assessment.user_id reverse relationship
					// @return KingdomBusinessAssessment[]
					return (array) $this->_objKingdomBusinessAssessmentArray;

				case '_KpisAsModifiedBy':
					// Gets the value for the private _objKpisAsModifiedBy (Read-Only)
					// if set due to an expansion on the kpis.modified_by reverse relationship
					// @return Kpis
					return $this->_objKpisAsModifiedBy;

				case '_KpisAsModifiedByArray':
					// Gets the value for the private _objKpisAsModifiedByArray (Read-Only)
					// if set due to an ExpandAsArray on the kpis.modified_by reverse relationship
					// @return Kpis[]
					return (array) $this->_objKpisAsModifiedByArray;

				case '_LemonAssessment':
					// Gets the value for the private _objLemonAssessment (Read-Only)
					// if set due to an expansion on the lemon_assessment.user_id reverse relationship
					// @return LemonAssessment
					return $this->_objLemonAssessment;

				case '_LemonAssessmentArray':
					// Gets the value for the private _objLemonAssessmentArray (Read-Only)
					// if set due to an ExpandAsArray on the lemon_assessment.user_id reverse relationship
					// @return LemonAssessment[]
					return (array) $this->_objLemonAssessmentArray;

				case '_StatementAsModifiedBy':
					// Gets the value for the private _objStatementAsModifiedBy (Read-Only)
					// if set due to an expansion on the statement.modified_by reverse relationship
					// @return Statement
					return $this->_objStatementAsModifiedBy;

				case '_StatementAsModifiedByArray':
					// Gets the value for the private _objStatementAsModifiedByArray (Read-Only)
					// if set due to an ExpandAsArray on the statement.modified_by reverse relationship
					// @return Statement[]
					return (array) $this->_objStatementAsModifiedByArray;

				case '_StrategyAsModifiedBy':
					// Gets the value for the private _objStrategyAsModifiedBy (Read-Only)
					// if set due to an expansion on the strategy.modified_by reverse relationship
					// @return Strategy
					return $this->_objStrategyAsModifiedBy;

				case '_StrategyAsModifiedByArray':
					// Gets the value for the private _objStrategyAsModifiedByArray (Read-Only)
					// if set due to an ExpandAsArray on the strategy.modified_by reverse relationship
					// @return Strategy[]
					return (array) $this->_objStrategyAsModifiedByArray;

				case '_TenFAssessment':
					// Gets the value for the private _objTenFAssessment (Read-Only)
					// if set due to an expansion on the ten_f_assessment.user_id reverse relationship
					// @return TenFAssessment
					return $this->_objTenFAssessment;

				case '_TenFAssessmentArray':
					// Gets the value for the private _objTenFAssessmentArray (Read-Only)
					// if set due to an ExpandAsArray on the ten_f_assessment.user_id reverse relationship
					// @return TenFAssessment[]
					return (array) $this->_objTenFAssessmentArray;

				case '_TenPAssessment':
					// Gets the value for the private _objTenPAssessment (Read-Only)
					// if set due to an expansion on the ten_p_assessment.user_id reverse relationship
					// @return TenPAssessment
					return $this->_objTenPAssessment;

				case '_TenPAssessmentArray':
					// Gets the value for the private _objTenPAssessmentArray (Read-Only)
					// if set due to an ExpandAsArray on the ten_p_assessment.user_id reverse relationship
					// @return TenPAssessment[]
					return (array) $this->_objTenPAssessmentArray;


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
				case 'LoginId':
					// Sets the value for intLoginId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objLogin = null;
						return ($this->intLoginId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'FirstName':
					// Sets the value for strFirstName 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strFirstName = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'LastName':
					// Sets the value for strLastName 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strLastName = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Email':
					// Sets the value for strEmail 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strEmail = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Gender':
					// Sets the value for blnGender 
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnGender = QType::Cast($mixValue, QType::Boolean));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Country':
					// Sets the value for strCountry 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strCountry = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Department':
					// Sets the value for strDepartment 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strDepartment = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Title':
					// Sets the value for strTitle 
					// @param string $mixValue
					// @return string
					try {
						return ($this->strTitle = QType::Cast($mixValue, QType::String));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Tenure':
					// Sets the value for intTenure 
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intTenure = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'CareerLength':
					// Sets the value for intCareerLength 
					// @param integer $mixValue
					// @return integer
					try {
						return ($this->intCareerLength = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				///////////////////
				// Member Objects
				///////////////////
				case 'Login':
					// Sets the value for the Login object referenced by intLoginId 
					// @param Login $mixValue
					// @return Login
					if (is_null($mixValue)) {
						$this->intLoginId = null;
						$this->objLogin = null;
						return null;
					} else {
						// Make sure $mixValue actually is a Login object
						try {
							$mixValue = QType::Cast($mixValue, 'Login');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED Login object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Login for this User');

						// Update Local Member Variables
						$this->objLogin = $mixValue;
						$this->intLoginId = $mixValue->Id;

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

			
		
		// Related Objects' Methods for ActionItemsAsModifiedBy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ActionItemsesAsModifiedBy as an array of ActionItems objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ActionItems[]
		*/ 
		public function GetActionItemsAsModifiedByArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return ActionItems::LoadArrayByModifiedBy($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ActionItemsesAsModifiedBy
		 * @return int
		*/ 
		public function CountActionItemsesAsModifiedBy() {
			if ((is_null($this->intId)))
				return 0;

			return ActionItems::CountByModifiedBy($this->intId);
		}

		/**
		 * Associates a ActionItemsAsModifiedBy
		 * @param ActionItems $objActionItems
		 * @return void
		*/ 
		public function AssociateActionItemsAsModifiedBy(ActionItems $objActionItems) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateActionItemsAsModifiedBy on this unsaved User.');
			if ((is_null($objActionItems->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateActionItemsAsModifiedBy on this User with an unsaved ActionItems.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`action_items`
				SET
					`modified_by` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objActionItems->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objActionItems->ModifiedBy = $this->intId;
				$objActionItems->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a ActionItemsAsModifiedBy
		 * @param ActionItems $objActionItems
		 * @return void
		*/ 
		public function UnassociateActionItemsAsModifiedBy(ActionItems $objActionItems) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateActionItemsAsModifiedBy on this unsaved User.');
			if ((is_null($objActionItems->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateActionItemsAsModifiedBy on this User with an unsaved ActionItems.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`action_items`
				SET
					`modified_by` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objActionItems->Id) . ' AND
					`modified_by` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objActionItems->ModifiedBy = null;
				$objActionItems->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all ActionItemsesAsModifiedBy
		 * @return void
		*/ 
		public function UnassociateAllActionItemsesAsModifiedBy() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateActionItemsAsModifiedBy on this unsaved User.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (ActionItems::LoadArrayByModifiedBy($this->intId) as $objActionItems) {
					$objActionItems->ModifiedBy = null;
					$objActionItems->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`action_items`
				SET
					`modified_by` = null
				WHERE
					`modified_by` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated ActionItemsAsModifiedBy
		 * @param ActionItems $objActionItems
		 * @return void
		*/ 
		public function DeleteAssociatedActionItemsAsModifiedBy(ActionItems $objActionItems) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateActionItemsAsModifiedBy on this unsaved User.');
			if ((is_null($objActionItems->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateActionItemsAsModifiedBy on this User with an unsaved ActionItems.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`action_items`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objActionItems->Id) . ' AND
					`modified_by` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objActionItems->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated ActionItemsesAsModifiedBy
		 * @return void
		*/ 
		public function DeleteAllActionItemsesAsModifiedBy() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateActionItemsAsModifiedBy on this unsaved User.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (ActionItems::LoadArrayByModifiedBy($this->intId) as $objActionItems) {
					$objActionItems->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`action_items`
				WHERE
					`modified_by` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for ActionItemsAsWho
		//-------------------------------------------------------------------

		/**
		 * Gets all associated ActionItemsesAsWho as an array of ActionItems objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return ActionItems[]
		*/ 
		public function GetActionItemsAsWhoArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return ActionItems::LoadArrayByWho($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated ActionItemsesAsWho
		 * @return int
		*/ 
		public function CountActionItemsesAsWho() {
			if ((is_null($this->intId)))
				return 0;

			return ActionItems::CountByWho($this->intId);
		}

		/**
		 * Associates a ActionItemsAsWho
		 * @param ActionItems $objActionItems
		 * @return void
		*/ 
		public function AssociateActionItemsAsWho(ActionItems $objActionItems) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateActionItemsAsWho on this unsaved User.');
			if ((is_null($objActionItems->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateActionItemsAsWho on this User with an unsaved ActionItems.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`action_items`
				SET
					`who` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objActionItems->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objActionItems->Who = $this->intId;
				$objActionItems->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a ActionItemsAsWho
		 * @param ActionItems $objActionItems
		 * @return void
		*/ 
		public function UnassociateActionItemsAsWho(ActionItems $objActionItems) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateActionItemsAsWho on this unsaved User.');
			if ((is_null($objActionItems->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateActionItemsAsWho on this User with an unsaved ActionItems.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`action_items`
				SET
					`who` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objActionItems->Id) . ' AND
					`who` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objActionItems->Who = null;
				$objActionItems->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all ActionItemsesAsWho
		 * @return void
		*/ 
		public function UnassociateAllActionItemsesAsWho() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateActionItemsAsWho on this unsaved User.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (ActionItems::LoadArrayByWho($this->intId) as $objActionItems) {
					$objActionItems->Who = null;
					$objActionItems->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`action_items`
				SET
					`who` = null
				WHERE
					`who` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated ActionItemsAsWho
		 * @param ActionItems $objActionItems
		 * @return void
		*/ 
		public function DeleteAssociatedActionItemsAsWho(ActionItems $objActionItems) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateActionItemsAsWho on this unsaved User.');
			if ((is_null($objActionItems->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateActionItemsAsWho on this User with an unsaved ActionItems.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`action_items`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objActionItems->Id) . ' AND
					`who` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objActionItems->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated ActionItemsesAsWho
		 * @return void
		*/ 
		public function DeleteAllActionItemsesAsWho() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateActionItemsAsWho on this unsaved User.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (ActionItems::LoadArrayByWho($this->intId) as $objActionItems) {
					$objActionItems->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`action_items`
				WHERE
					`who` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for KingdomBusinessAssessment
		//-------------------------------------------------------------------

		/**
		 * Gets all associated KingdomBusinessAssessments as an array of KingdomBusinessAssessment objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return KingdomBusinessAssessment[]
		*/ 
		public function GetKingdomBusinessAssessmentArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return KingdomBusinessAssessment::LoadArrayByUserId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated KingdomBusinessAssessments
		 * @return int
		*/ 
		public function CountKingdomBusinessAssessments() {
			if ((is_null($this->intId)))
				return 0;

			return KingdomBusinessAssessment::CountByUserId($this->intId);
		}

		/**
		 * Associates a KingdomBusinessAssessment
		 * @param KingdomBusinessAssessment $objKingdomBusinessAssessment
		 * @return void
		*/ 
		public function AssociateKingdomBusinessAssessment(KingdomBusinessAssessment $objKingdomBusinessAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateKingdomBusinessAssessment on this unsaved User.');
			if ((is_null($objKingdomBusinessAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateKingdomBusinessAssessment on this User with an unsaved KingdomBusinessAssessment.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`kingdom_business_assessment`
				SET
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objKingdomBusinessAssessment->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objKingdomBusinessAssessment->UserId = $this->intId;
				$objKingdomBusinessAssessment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a KingdomBusinessAssessment
		 * @param KingdomBusinessAssessment $objKingdomBusinessAssessment
		 * @return void
		*/ 
		public function UnassociateKingdomBusinessAssessment(KingdomBusinessAssessment $objKingdomBusinessAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateKingdomBusinessAssessment on this unsaved User.');
			if ((is_null($objKingdomBusinessAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateKingdomBusinessAssessment on this User with an unsaved KingdomBusinessAssessment.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`kingdom_business_assessment`
				SET
					`user_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objKingdomBusinessAssessment->Id) . ' AND
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objKingdomBusinessAssessment->UserId = null;
				$objKingdomBusinessAssessment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all KingdomBusinessAssessments
		 * @return void
		*/ 
		public function UnassociateAllKingdomBusinessAssessments() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateKingdomBusinessAssessment on this unsaved User.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (KingdomBusinessAssessment::LoadArrayByUserId($this->intId) as $objKingdomBusinessAssessment) {
					$objKingdomBusinessAssessment->UserId = null;
					$objKingdomBusinessAssessment->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`kingdom_business_assessment`
				SET
					`user_id` = null
				WHERE
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated KingdomBusinessAssessment
		 * @param KingdomBusinessAssessment $objKingdomBusinessAssessment
		 * @return void
		*/ 
		public function DeleteAssociatedKingdomBusinessAssessment(KingdomBusinessAssessment $objKingdomBusinessAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateKingdomBusinessAssessment on this unsaved User.');
			if ((is_null($objKingdomBusinessAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateKingdomBusinessAssessment on this User with an unsaved KingdomBusinessAssessment.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`kingdom_business_assessment`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objKingdomBusinessAssessment->Id) . ' AND
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objKingdomBusinessAssessment->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated KingdomBusinessAssessments
		 * @return void
		*/ 
		public function DeleteAllKingdomBusinessAssessments() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateKingdomBusinessAssessment on this unsaved User.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (KingdomBusinessAssessment::LoadArrayByUserId($this->intId) as $objKingdomBusinessAssessment) {
					$objKingdomBusinessAssessment->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`kingdom_business_assessment`
				WHERE
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for KpisAsModifiedBy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated KpisesAsModifiedBy as an array of Kpis objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Kpis[]
		*/ 
		public function GetKpisAsModifiedByArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Kpis::LoadArrayByModifiedBy($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated KpisesAsModifiedBy
		 * @return int
		*/ 
		public function CountKpisesAsModifiedBy() {
			if ((is_null($this->intId)))
				return 0;

			return Kpis::CountByModifiedBy($this->intId);
		}

		/**
		 * Associates a KpisAsModifiedBy
		 * @param Kpis $objKpis
		 * @return void
		*/ 
		public function AssociateKpisAsModifiedBy(Kpis $objKpis) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateKpisAsModifiedBy on this unsaved User.');
			if ((is_null($objKpis->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateKpisAsModifiedBy on this User with an unsaved Kpis.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`kpis`
				SET
					`modified_by` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objKpis->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objKpis->ModifiedBy = $this->intId;
				$objKpis->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a KpisAsModifiedBy
		 * @param Kpis $objKpis
		 * @return void
		*/ 
		public function UnassociateKpisAsModifiedBy(Kpis $objKpis) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateKpisAsModifiedBy on this unsaved User.');
			if ((is_null($objKpis->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateKpisAsModifiedBy on this User with an unsaved Kpis.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`kpis`
				SET
					`modified_by` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objKpis->Id) . ' AND
					`modified_by` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objKpis->ModifiedBy = null;
				$objKpis->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all KpisesAsModifiedBy
		 * @return void
		*/ 
		public function UnassociateAllKpisesAsModifiedBy() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateKpisAsModifiedBy on this unsaved User.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Kpis::LoadArrayByModifiedBy($this->intId) as $objKpis) {
					$objKpis->ModifiedBy = null;
					$objKpis->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`kpis`
				SET
					`modified_by` = null
				WHERE
					`modified_by` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated KpisAsModifiedBy
		 * @param Kpis $objKpis
		 * @return void
		*/ 
		public function DeleteAssociatedKpisAsModifiedBy(Kpis $objKpis) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateKpisAsModifiedBy on this unsaved User.');
			if ((is_null($objKpis->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateKpisAsModifiedBy on this User with an unsaved Kpis.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`kpis`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objKpis->Id) . ' AND
					`modified_by` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objKpis->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated KpisesAsModifiedBy
		 * @return void
		*/ 
		public function DeleteAllKpisesAsModifiedBy() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateKpisAsModifiedBy on this unsaved User.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Kpis::LoadArrayByModifiedBy($this->intId) as $objKpis) {
					$objKpis->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`kpis`
				WHERE
					`modified_by` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for LemonAssessment
		//-------------------------------------------------------------------

		/**
		 * Gets all associated LemonAssessments as an array of LemonAssessment objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return LemonAssessment[]
		*/ 
		public function GetLemonAssessmentArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return LemonAssessment::LoadArrayByUserId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated LemonAssessments
		 * @return int
		*/ 
		public function CountLemonAssessments() {
			if ((is_null($this->intId)))
				return 0;

			return LemonAssessment::CountByUserId($this->intId);
		}

		/**
		 * Associates a LemonAssessment
		 * @param LemonAssessment $objLemonAssessment
		 * @return void
		*/ 
		public function AssociateLemonAssessment(LemonAssessment $objLemonAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateLemonAssessment on this unsaved User.');
			if ((is_null($objLemonAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateLemonAssessment on this User with an unsaved LemonAssessment.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`lemon_assessment`
				SET
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objLemonAssessment->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objLemonAssessment->UserId = $this->intId;
				$objLemonAssessment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a LemonAssessment
		 * @param LemonAssessment $objLemonAssessment
		 * @return void
		*/ 
		public function UnassociateLemonAssessment(LemonAssessment $objLemonAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLemonAssessment on this unsaved User.');
			if ((is_null($objLemonAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLemonAssessment on this User with an unsaved LemonAssessment.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`lemon_assessment`
				SET
					`user_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objLemonAssessment->Id) . ' AND
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objLemonAssessment->UserId = null;
				$objLemonAssessment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all LemonAssessments
		 * @return void
		*/ 
		public function UnassociateAllLemonAssessments() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLemonAssessment on this unsaved User.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (LemonAssessment::LoadArrayByUserId($this->intId) as $objLemonAssessment) {
					$objLemonAssessment->UserId = null;
					$objLemonAssessment->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`lemon_assessment`
				SET
					`user_id` = null
				WHERE
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated LemonAssessment
		 * @param LemonAssessment $objLemonAssessment
		 * @return void
		*/ 
		public function DeleteAssociatedLemonAssessment(LemonAssessment $objLemonAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLemonAssessment on this unsaved User.');
			if ((is_null($objLemonAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLemonAssessment on this User with an unsaved LemonAssessment.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`lemon_assessment`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objLemonAssessment->Id) . ' AND
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objLemonAssessment->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated LemonAssessments
		 * @return void
		*/ 
		public function DeleteAllLemonAssessments() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLemonAssessment on this unsaved User.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (LemonAssessment::LoadArrayByUserId($this->intId) as $objLemonAssessment) {
					$objLemonAssessment->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`lemon_assessment`
				WHERE
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for StatementAsModifiedBy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated StatementsAsModifiedBy as an array of Statement objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Statement[]
		*/ 
		public function GetStatementAsModifiedByArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Statement::LoadArrayByModifiedBy($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated StatementsAsModifiedBy
		 * @return int
		*/ 
		public function CountStatementsAsModifiedBy() {
			if ((is_null($this->intId)))
				return 0;

			return Statement::CountByModifiedBy($this->intId);
		}

		/**
		 * Associates a StatementAsModifiedBy
		 * @param Statement $objStatement
		 * @return void
		*/ 
		public function AssociateStatementAsModifiedBy(Statement $objStatement) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateStatementAsModifiedBy on this unsaved User.');
			if ((is_null($objStatement->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateStatementAsModifiedBy on this User with an unsaved Statement.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`statement`
				SET
					`modified_by` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objStatement->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objStatement->ModifiedBy = $this->intId;
				$objStatement->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a StatementAsModifiedBy
		 * @param Statement $objStatement
		 * @return void
		*/ 
		public function UnassociateStatementAsModifiedBy(Statement $objStatement) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStatementAsModifiedBy on this unsaved User.');
			if ((is_null($objStatement->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStatementAsModifiedBy on this User with an unsaved Statement.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`statement`
				SET
					`modified_by` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objStatement->Id) . ' AND
					`modified_by` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objStatement->ModifiedBy = null;
				$objStatement->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all StatementsAsModifiedBy
		 * @return void
		*/ 
		public function UnassociateAllStatementsAsModifiedBy() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStatementAsModifiedBy on this unsaved User.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Statement::LoadArrayByModifiedBy($this->intId) as $objStatement) {
					$objStatement->ModifiedBy = null;
					$objStatement->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`statement`
				SET
					`modified_by` = null
				WHERE
					`modified_by` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated StatementAsModifiedBy
		 * @param Statement $objStatement
		 * @return void
		*/ 
		public function DeleteAssociatedStatementAsModifiedBy(Statement $objStatement) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStatementAsModifiedBy on this unsaved User.');
			if ((is_null($objStatement->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStatementAsModifiedBy on this User with an unsaved Statement.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`statement`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objStatement->Id) . ' AND
					`modified_by` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objStatement->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated StatementsAsModifiedBy
		 * @return void
		*/ 
		public function DeleteAllStatementsAsModifiedBy() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStatementAsModifiedBy on this unsaved User.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Statement::LoadArrayByModifiedBy($this->intId) as $objStatement) {
					$objStatement->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`statement`
				WHERE
					`modified_by` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for StrategyAsModifiedBy
		//-------------------------------------------------------------------

		/**
		 * Gets all associated StrategiesAsModifiedBy as an array of Strategy objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Strategy[]
		*/ 
		public function GetStrategyAsModifiedByArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Strategy::LoadArrayByModifiedBy($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated StrategiesAsModifiedBy
		 * @return int
		*/ 
		public function CountStrategiesAsModifiedBy() {
			if ((is_null($this->intId)))
				return 0;

			return Strategy::CountByModifiedBy($this->intId);
		}

		/**
		 * Associates a StrategyAsModifiedBy
		 * @param Strategy $objStrategy
		 * @return void
		*/ 
		public function AssociateStrategyAsModifiedBy(Strategy $objStrategy) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateStrategyAsModifiedBy on this unsaved User.');
			if ((is_null($objStrategy->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateStrategyAsModifiedBy on this User with an unsaved Strategy.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`strategy`
				SET
					`modified_by` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objStrategy->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objStrategy->ModifiedBy = $this->intId;
				$objStrategy->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a StrategyAsModifiedBy
		 * @param Strategy $objStrategy
		 * @return void
		*/ 
		public function UnassociateStrategyAsModifiedBy(Strategy $objStrategy) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStrategyAsModifiedBy on this unsaved User.');
			if ((is_null($objStrategy->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStrategyAsModifiedBy on this User with an unsaved Strategy.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`strategy`
				SET
					`modified_by` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objStrategy->Id) . ' AND
					`modified_by` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objStrategy->ModifiedBy = null;
				$objStrategy->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all StrategiesAsModifiedBy
		 * @return void
		*/ 
		public function UnassociateAllStrategiesAsModifiedBy() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStrategyAsModifiedBy on this unsaved User.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Strategy::LoadArrayByModifiedBy($this->intId) as $objStrategy) {
					$objStrategy->ModifiedBy = null;
					$objStrategy->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`strategy`
				SET
					`modified_by` = null
				WHERE
					`modified_by` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated StrategyAsModifiedBy
		 * @param Strategy $objStrategy
		 * @return void
		*/ 
		public function DeleteAssociatedStrategyAsModifiedBy(Strategy $objStrategy) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStrategyAsModifiedBy on this unsaved User.');
			if ((is_null($objStrategy->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStrategyAsModifiedBy on this User with an unsaved Strategy.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`strategy`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objStrategy->Id) . ' AND
					`modified_by` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objStrategy->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated StrategiesAsModifiedBy
		 * @return void
		*/ 
		public function DeleteAllStrategiesAsModifiedBy() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateStrategyAsModifiedBy on this unsaved User.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Strategy::LoadArrayByModifiedBy($this->intId) as $objStrategy) {
					$objStrategy->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`strategy`
				WHERE
					`modified_by` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for TenFAssessment
		//-------------------------------------------------------------------

		/**
		 * Gets all associated TenFAssessments as an array of TenFAssessment objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return TenFAssessment[]
		*/ 
		public function GetTenFAssessmentArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return TenFAssessment::LoadArrayByUserId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated TenFAssessments
		 * @return int
		*/ 
		public function CountTenFAssessments() {
			if ((is_null($this->intId)))
				return 0;

			return TenFAssessment::CountByUserId($this->intId);
		}

		/**
		 * Associates a TenFAssessment
		 * @param TenFAssessment $objTenFAssessment
		 * @return void
		*/ 
		public function AssociateTenFAssessment(TenFAssessment $objTenFAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateTenFAssessment on this unsaved User.');
			if ((is_null($objTenFAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateTenFAssessment on this User with an unsaved TenFAssessment.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`ten_f_assessment`
				SET
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objTenFAssessment->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objTenFAssessment->UserId = $this->intId;
				$objTenFAssessment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a TenFAssessment
		 * @param TenFAssessment $objTenFAssessment
		 * @return void
		*/ 
		public function UnassociateTenFAssessment(TenFAssessment $objTenFAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTenFAssessment on this unsaved User.');
			if ((is_null($objTenFAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTenFAssessment on this User with an unsaved TenFAssessment.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`ten_f_assessment`
				SET
					`user_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objTenFAssessment->Id) . ' AND
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objTenFAssessment->UserId = null;
				$objTenFAssessment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all TenFAssessments
		 * @return void
		*/ 
		public function UnassociateAllTenFAssessments() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTenFAssessment on this unsaved User.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (TenFAssessment::LoadArrayByUserId($this->intId) as $objTenFAssessment) {
					$objTenFAssessment->UserId = null;
					$objTenFAssessment->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`ten_f_assessment`
				SET
					`user_id` = null
				WHERE
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated TenFAssessment
		 * @param TenFAssessment $objTenFAssessment
		 * @return void
		*/ 
		public function DeleteAssociatedTenFAssessment(TenFAssessment $objTenFAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTenFAssessment on this unsaved User.');
			if ((is_null($objTenFAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTenFAssessment on this User with an unsaved TenFAssessment.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`ten_f_assessment`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objTenFAssessment->Id) . ' AND
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objTenFAssessment->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated TenFAssessments
		 * @return void
		*/ 
		public function DeleteAllTenFAssessments() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTenFAssessment on this unsaved User.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (TenFAssessment::LoadArrayByUserId($this->intId) as $objTenFAssessment) {
					$objTenFAssessment->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`ten_f_assessment`
				WHERE
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for TenPAssessment
		//-------------------------------------------------------------------

		/**
		 * Gets all associated TenPAssessments as an array of TenPAssessment objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return TenPAssessment[]
		*/ 
		public function GetTenPAssessmentArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return TenPAssessment::LoadArrayByUserId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated TenPAssessments
		 * @return int
		*/ 
		public function CountTenPAssessments() {
			if ((is_null($this->intId)))
				return 0;

			return TenPAssessment::CountByUserId($this->intId);
		}

		/**
		 * Associates a TenPAssessment
		 * @param TenPAssessment $objTenPAssessment
		 * @return void
		*/ 
		public function AssociateTenPAssessment(TenPAssessment $objTenPAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateTenPAssessment on this unsaved User.');
			if ((is_null($objTenPAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateTenPAssessment on this User with an unsaved TenPAssessment.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`ten_p_assessment`
				SET
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objTenPAssessment->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objTenPAssessment->UserId = $this->intId;
				$objTenPAssessment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a TenPAssessment
		 * @param TenPAssessment $objTenPAssessment
		 * @return void
		*/ 
		public function UnassociateTenPAssessment(TenPAssessment $objTenPAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTenPAssessment on this unsaved User.');
			if ((is_null($objTenPAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTenPAssessment on this User with an unsaved TenPAssessment.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`ten_p_assessment`
				SET
					`user_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objTenPAssessment->Id) . ' AND
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objTenPAssessment->UserId = null;
				$objTenPAssessment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all TenPAssessments
		 * @return void
		*/ 
		public function UnassociateAllTenPAssessments() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTenPAssessment on this unsaved User.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (TenPAssessment::LoadArrayByUserId($this->intId) as $objTenPAssessment) {
					$objTenPAssessment->UserId = null;
					$objTenPAssessment->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`ten_p_assessment`
				SET
					`user_id` = null
				WHERE
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated TenPAssessment
		 * @param TenPAssessment $objTenPAssessment
		 * @return void
		*/ 
		public function DeleteAssociatedTenPAssessment(TenPAssessment $objTenPAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTenPAssessment on this unsaved User.');
			if ((is_null($objTenPAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTenPAssessment on this User with an unsaved TenPAssessment.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`ten_p_assessment`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objTenPAssessment->Id) . ' AND
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objTenPAssessment->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated TenPAssessments
		 * @return void
		*/ 
		public function DeleteAllTenPAssessments() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTenPAssessment on this unsaved User.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (TenPAssessment::LoadArrayByUserId($this->intId) as $objTenPAssessment) {
					$objTenPAssessment->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`ten_p_assessment`
				WHERE
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		// Related Many-to-Many Objects' Methods for Company
		//-------------------------------------------------------------------

		/**
		 * Gets all many-to-many associated Companies as an array of Company objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Company[]
		*/ 
		public function GetCompanyArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Company::LoadArrayByUser($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all many-to-many associated Companies
		 * @return int
		*/ 
		public function CountCompanies() {
			if ((is_null($this->intId)))
				return 0;

			return Company::CountByUser($this->intId);
		}

		/**
		 * Checks to see if an association exists with a specific Company
		 * @param Company $objCompany
		 * @return bool
		*/
		public function IsCompanyAssociated(Company $objCompany) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsCompanyAssociated on this unsaved User.');
			if ((is_null($objCompany->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsCompanyAssociated on this User with an unsaved Company.');

			$intRowCount = User::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::User()->Id, $this->intId),
					QQ::Equal(QQN::User()->Company->CompanyId, $objCompany->Id)
				)
			);

			return ($intRowCount > 0);
		}

		/**
		 * Journals the Company relationship into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function JournalCompanyAssociation($intAssociatedId, $strJournalCommand) {
			$objDatabase = User::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `company_user_assn` (
					`user_id`,
					`company_id`,
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
		 * Gets the historical journal for an object's Company relationship from the log database.
		 * @param integer intId
		 * @return QDatabaseResult $objResult
		 */
		public static function GetJournalCompanyAssociationForId($intId) {
			$objDatabase = User::GetDatabase()->JournalingDatabase;

			return $objDatabase->Query('SELECT * FROM company_user_assn WHERE user_id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');
		}

		/**
		 * Gets the historical journal for this object's Company relationship from the log database.
		 * @return QDatabaseResult $objResult
		 */
		public function GetJournalCompanyAssociation() {
			return User::GetJournalCompanyAssociationForId($this->intId);
		}

		/**
		 * Associates a Company
		 * @param Company $objCompany
		 * @return void
		*/ 
		public function AssociateCompany(Company $objCompany) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCompany on this unsaved User.');
			if ((is_null($objCompany->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateCompany on this User with an unsaved Company.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				INSERT INTO `company_user_assn` (
					`user_id`,
					`company_id`
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($objCompany->Id) . '
				)
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase)
				$this->JournalCompanyAssociation($objCompany->Id, 'INSERT');
		}

		/**
		 * Unassociates a Company
		 * @param Company $objCompany
		 * @return void
		*/ 
		public function UnassociateCompany(Company $objCompany) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCompany on this unsaved User.');
			if ((is_null($objCompany->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateCompany on this User with an unsaved Company.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`company_user_assn`
				WHERE
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . ' AND
					`company_id` = ' . $objDatabase->SqlVariable($objCompany->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase)
				$this->JournalCompanyAssociation($objCompany->Id, 'DELETE');
		}

		/**
		 * Unassociates all Companies
		 * @return void
		*/ 
		public function UnassociateAllCompanies() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAllCompanyArray on this unsaved User.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objResult = $objDatabase->Query('SELECT `company_id` AS associated_id FROM `company_user_assn` WHERE `user_id` = ' . $objDatabase->SqlVariable($this->intId));
				while ($objRow = $objResult->GetNextRow()) {
					$this->JournalCompanyAssociation($objRow->GetColumn('associated_id'), 'DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`company_user_assn`
				WHERE
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}
			
		// Related Many-to-Many Objects' Methods for Resource
		//-------------------------------------------------------------------

		/**
		 * Gets all many-to-many associated Resources as an array of Resource objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Resource[]
		*/ 
		public function GetResourceArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Resource::LoadArrayByUser($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all many-to-many associated Resources
		 * @return int
		*/ 
		public function CountResources() {
			if ((is_null($this->intId)))
				return 0;

			return Resource::CountByUser($this->intId);
		}

		/**
		 * Checks to see if an association exists with a specific Resource
		 * @param Resource $objResource
		 * @return bool
		*/
		public function IsResourceAssociated(Resource $objResource) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsResourceAssociated on this unsaved User.');
			if ((is_null($objResource->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsResourceAssociated on this User with an unsaved Resource.');

			$intRowCount = User::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::User()->Id, $this->intId),
					QQ::Equal(QQN::User()->Resource->ResourceId, $objResource->Id)
				)
			);

			return ($intRowCount > 0);
		}

		/**
		 * Journals the Resource relationship into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function JournalResourceAssociation($intAssociatedId, $strJournalCommand) {
			$objDatabase = User::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `resource_user_assn` (
					`user_id`,
					`resource_id`,
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
		 * Gets the historical journal for an object's Resource relationship from the log database.
		 * @param integer intId
		 * @return QDatabaseResult $objResult
		 */
		public static function GetJournalResourceAssociationForId($intId) {
			$objDatabase = User::GetDatabase()->JournalingDatabase;

			return $objDatabase->Query('SELECT * FROM resource_user_assn WHERE user_id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');
		}

		/**
		 * Gets the historical journal for this object's Resource relationship from the log database.
		 * @return QDatabaseResult $objResult
		 */
		public function GetJournalResourceAssociation() {
			return User::GetJournalResourceAssociationForId($this->intId);
		}

		/**
		 * Associates a Resource
		 * @param Resource $objResource
		 * @return void
		*/ 
		public function AssociateResource(Resource $objResource) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateResource on this unsaved User.');
			if ((is_null($objResource->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateResource on this User with an unsaved Resource.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				INSERT INTO `resource_user_assn` (
					`user_id`,
					`resource_id`
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($objResource->Id) . '
				)
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase)
				$this->JournalResourceAssociation($objResource->Id, 'INSERT');
		}

		/**
		 * Unassociates a Resource
		 * @param Resource $objResource
		 * @return void
		*/ 
		public function UnassociateResource(Resource $objResource) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateResource on this unsaved User.');
			if ((is_null($objResource->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateResource on this User with an unsaved Resource.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`resource_user_assn`
				WHERE
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . ' AND
					`resource_id` = ' . $objDatabase->SqlVariable($objResource->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase)
				$this->JournalResourceAssociation($objResource->Id, 'DELETE');
		}

		/**
		 * Unassociates all Resources
		 * @return void
		*/ 
		public function UnassociateAllResources() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAllResourceArray on this unsaved User.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objResult = $objDatabase->Query('SELECT `resource_id` AS associated_id FROM `resource_user_assn` WHERE `user_id` = ' . $objDatabase->SqlVariable($this->intId));
				while ($objRow = $objResult->GetNextRow()) {
					$this->JournalResourceAssociation($objRow->GetColumn('associated_id'), 'DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`resource_user_assn`
				WHERE
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}
			
		// Related Many-to-Many Objects' Methods for Scorecard
		//-------------------------------------------------------------------

		/**
		 * Gets all many-to-many associated Scorecards as an array of Scorecard objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Scorecard[]
		*/ 
		public function GetScorecardArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Scorecard::LoadArrayByUser($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all many-to-many associated Scorecards
		 * @return int
		*/ 
		public function CountScorecards() {
			if ((is_null($this->intId)))
				return 0;

			return Scorecard::CountByUser($this->intId);
		}

		/**
		 * Checks to see if an association exists with a specific Scorecard
		 * @param Scorecard $objScorecard
		 * @return bool
		*/
		public function IsScorecardAssociated(Scorecard $objScorecard) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsScorecardAssociated on this unsaved User.');
			if ((is_null($objScorecard->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsScorecardAssociated on this User with an unsaved Scorecard.');

			$intRowCount = User::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::User()->Id, $this->intId),
					QQ::Equal(QQN::User()->Scorecard->ScorecardId, $objScorecard->Id)
				)
			);

			return ($intRowCount > 0);
		}

		/**
		 * Journals the Scorecard relationship into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function JournalScorecardAssociation($intAssociatedId, $strJournalCommand) {
			$objDatabase = User::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `scorecard_user_assn` (
					`user_id`,
					`scorecard_id`,
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
		 * Gets the historical journal for an object's Scorecard relationship from the log database.
		 * @param integer intId
		 * @return QDatabaseResult $objResult
		 */
		public static function GetJournalScorecardAssociationForId($intId) {
			$objDatabase = User::GetDatabase()->JournalingDatabase;

			return $objDatabase->Query('SELECT * FROM scorecard_user_assn WHERE user_id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');
		}

		/**
		 * Gets the historical journal for this object's Scorecard relationship from the log database.
		 * @return QDatabaseResult $objResult
		 */
		public function GetJournalScorecardAssociation() {
			return User::GetJournalScorecardAssociationForId($this->intId);
		}

		/**
		 * Associates a Scorecard
		 * @param Scorecard $objScorecard
		 * @return void
		*/ 
		public function AssociateScorecard(Scorecard $objScorecard) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateScorecard on this unsaved User.');
			if ((is_null($objScorecard->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateScorecard on this User with an unsaved Scorecard.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				INSERT INTO `scorecard_user_assn` (
					`user_id`,
					`scorecard_id`
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($objScorecard->Id) . '
				)
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase)
				$this->JournalScorecardAssociation($objScorecard->Id, 'INSERT');
		}

		/**
		 * Unassociates a Scorecard
		 * @param Scorecard $objScorecard
		 * @return void
		*/ 
		public function UnassociateScorecard(Scorecard $objScorecard) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateScorecard on this unsaved User.');
			if ((is_null($objScorecard->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateScorecard on this User with an unsaved Scorecard.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`scorecard_user_assn`
				WHERE
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . ' AND
					`scorecard_id` = ' . $objDatabase->SqlVariable($objScorecard->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase)
				$this->JournalScorecardAssociation($objScorecard->Id, 'DELETE');
		}

		/**
		 * Unassociates all Scorecards
		 * @return void
		*/ 
		public function UnassociateAllScorecards() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAllScorecardArray on this unsaved User.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objResult = $objDatabase->Query('SELECT `scorecard_id` AS associated_id FROM `scorecard_user_assn` WHERE `user_id` = ' . $objDatabase->SqlVariable($this->intId));
				while ($objRow = $objResult->GetNextRow()) {
					$this->JournalScorecardAssociation($objRow->GetColumn('associated_id'), 'DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`scorecard_user_assn`
				WHERE
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}




		////////////////////////////////////////
		// METHODS for SOAP-BASED WEB SERVICES
		////////////////////////////////////////

		public static function GetSoapComplexTypeXml() {
			$strToReturn = '<complexType name="User"><sequence>';
			$strToReturn .= '<element name="Id" type="xsd:int"/>';
			$strToReturn .= '<element name="Login" type="xsd1:Login"/>';
			$strToReturn .= '<element name="FirstName" type="xsd:string"/>';
			$strToReturn .= '<element name="LastName" type="xsd:string"/>';
			$strToReturn .= '<element name="Email" type="xsd:string"/>';
			$strToReturn .= '<element name="Gender" type="xsd:boolean"/>';
			$strToReturn .= '<element name="Country" type="xsd:string"/>';
			$strToReturn .= '<element name="Department" type="xsd:string"/>';
			$strToReturn .= '<element name="Title" type="xsd:string"/>';
			$strToReturn .= '<element name="Tenure" type="xsd:int"/>';
			$strToReturn .= '<element name="CareerLength" type="xsd:int"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('User', $strComplexTypeArray)) {
				$strComplexTypeArray['User'] = User::GetSoapComplexTypeXml();
				Login::AlterSoapComplexTypeArray($strComplexTypeArray);
			}
		}

		public static function GetArrayFromSoapArray($objSoapArray) {
			$objArrayToReturn = array();

			foreach ($objSoapArray as $objSoapObject)
				array_push($objArrayToReturn, User::GetObjectFromSoapObject($objSoapObject));

			return $objArrayToReturn;
		}

		public static function GetObjectFromSoapObject($objSoapObject) {
			$objToReturn = new User();
			if (property_exists($objSoapObject, 'Id'))
				$objToReturn->intId = $objSoapObject->Id;
			if ((property_exists($objSoapObject, 'Login')) &&
				($objSoapObject->Login))
				$objToReturn->Login = Login::GetObjectFromSoapObject($objSoapObject->Login);
			if (property_exists($objSoapObject, 'FirstName'))
				$objToReturn->strFirstName = $objSoapObject->FirstName;
			if (property_exists($objSoapObject, 'LastName'))
				$objToReturn->strLastName = $objSoapObject->LastName;
			if (property_exists($objSoapObject, 'Email'))
				$objToReturn->strEmail = $objSoapObject->Email;
			if (property_exists($objSoapObject, 'Gender'))
				$objToReturn->blnGender = $objSoapObject->Gender;
			if (property_exists($objSoapObject, 'Country'))
				$objToReturn->strCountry = $objSoapObject->Country;
			if (property_exists($objSoapObject, 'Department'))
				$objToReturn->strDepartment = $objSoapObject->Department;
			if (property_exists($objSoapObject, 'Title'))
				$objToReturn->strTitle = $objSoapObject->Title;
			if (property_exists($objSoapObject, 'Tenure'))
				$objToReturn->intTenure = $objSoapObject->Tenure;
			if (property_exists($objSoapObject, 'CareerLength'))
				$objToReturn->intCareerLength = $objSoapObject->CareerLength;
			if (property_exists($objSoapObject, '__blnRestored'))
				$objToReturn->__blnRestored = $objSoapObject->__blnRestored;
			return $objToReturn;
		}

		public static function GetSoapArrayFromArray($objArray) {
			if (!$objArray)
				return null;

			$objArrayToReturn = array();

			foreach ($objArray as $objObject)
				array_push($objArrayToReturn, User::GetSoapObjectFromObject($objObject, true));

			return unserialize(serialize($objArrayToReturn));
		}

		public static function GetSoapObjectFromObject($objObject, $blnBindRelatedObjects) {
			if ($objObject->objLogin)
				$objObject->objLogin = Login::GetSoapObjectFromObject($objObject->objLogin, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intLoginId = null;
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $CompanyId
	 * @property-read QQNodeCompany $Company
	 * @property-read QQNodeCompany $_ChildTableNode
	 */
	class QQNodeUserCompany extends QQAssociationNode {
		protected $strType = 'association';
		protected $strName = 'company';

		protected $strTableName = 'company_user_assn';
		protected $strPrimaryKey = 'user_id';
		protected $strClassName = 'Company';

		public function __get($strName) {
			switch ($strName) {
				case 'CompanyId':
					return new QQNode('company_id', 'CompanyId', 'integer', $this);
				case 'Company':
					return new QQNodeCompany('company_id', 'CompanyId', 'integer', $this);
				case '_ChildTableNode':
					return new QQNodeCompany('company_id', 'CompanyId', 'integer', $this);
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
	 * @property-read QQNode $ResourceId
	 * @property-read QQNodeResource $Resource
	 * @property-read QQNodeResource $_ChildTableNode
	 */
	class QQNodeUserResource extends QQAssociationNode {
		protected $strType = 'association';
		protected $strName = 'resource';

		protected $strTableName = 'resource_user_assn';
		protected $strPrimaryKey = 'user_id';
		protected $strClassName = 'Resource';

		public function __get($strName) {
			switch ($strName) {
				case 'ResourceId':
					return new QQNode('resource_id', 'ResourceId', 'integer', $this);
				case 'Resource':
					return new QQNodeResource('resource_id', 'ResourceId', 'integer', $this);
				case '_ChildTableNode':
					return new QQNodeResource('resource_id', 'ResourceId', 'integer', $this);
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
	 * @property-read QQNode $ScorecardId
	 * @property-read QQNodeScorecard $Scorecard
	 * @property-read QQNodeScorecard $_ChildTableNode
	 */
	class QQNodeUserScorecard extends QQAssociationNode {
		protected $strType = 'association';
		protected $strName = 'scorecard';

		protected $strTableName = 'scorecard_user_assn';
		protected $strPrimaryKey = 'user_id';
		protected $strClassName = 'Scorecard';

		public function __get($strName) {
			switch ($strName) {
				case 'ScorecardId':
					return new QQNode('scorecard_id', 'ScorecardId', 'integer', $this);
				case 'Scorecard':
					return new QQNodeScorecard('scorecard_id', 'ScorecardId', 'integer', $this);
				case '_ChildTableNode':
					return new QQNodeScorecard('scorecard_id', 'ScorecardId', 'integer', $this);
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
	 * @property-read QQNode $LoginId
	 * @property-read QQNodeLogin $Login
	 * @property-read QQNode $FirstName
	 * @property-read QQNode $LastName
	 * @property-read QQNode $Email
	 * @property-read QQNode $Gender
	 * @property-read QQNode $Country
	 * @property-read QQNode $Department
	 * @property-read QQNode $Title
	 * @property-read QQNode $Tenure
	 * @property-read QQNode $CareerLength
	 * @property-read QQNodeUserCompany $Company
	 * @property-read QQNodeUserResource $Resource
	 * @property-read QQNodeUserScorecard $Scorecard
	 * @property-read QQReverseReferenceNodeActionItems $ActionItemsAsModifiedBy
	 * @property-read QQReverseReferenceNodeActionItems $ActionItemsAsWho
	 * @property-read QQReverseReferenceNodeKingdomBusinessAssessment $KingdomBusinessAssessment
	 * @property-read QQReverseReferenceNodeKpis $KpisAsModifiedBy
	 * @property-read QQReverseReferenceNodeLemonAssessment $LemonAssessment
	 * @property-read QQReverseReferenceNodeStatement $StatementAsModifiedBy
	 * @property-read QQReverseReferenceNodeStrategy $StrategyAsModifiedBy
	 * @property-read QQReverseReferenceNodeTenFAssessment $TenFAssessment
	 * @property-read QQReverseReferenceNodeTenPAssessment $TenPAssessment
	 */
	class QQNodeUser extends QQNode {
		protected $strTableName = 'user';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'User';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'LoginId':
					return new QQNode('login_id', 'LoginId', 'integer', $this);
				case 'Login':
					return new QQNodeLogin('login_id', 'Login', 'integer', $this);
				case 'FirstName':
					return new QQNode('first_name', 'FirstName', 'string', $this);
				case 'LastName':
					return new QQNode('last_name', 'LastName', 'string', $this);
				case 'Email':
					return new QQNode('email', 'Email', 'string', $this);
				case 'Gender':
					return new QQNode('gender', 'Gender', 'boolean', $this);
				case 'Country':
					return new QQNode('country', 'Country', 'string', $this);
				case 'Department':
					return new QQNode('department', 'Department', 'string', $this);
				case 'Title':
					return new QQNode('title', 'Title', 'string', $this);
				case 'Tenure':
					return new QQNode('tenure', 'Tenure', 'integer', $this);
				case 'CareerLength':
					return new QQNode('career_length', 'CareerLength', 'integer', $this);
				case 'Company':
					return new QQNodeUserCompany($this);
				case 'Resource':
					return new QQNodeUserResource($this);
				case 'Scorecard':
					return new QQNodeUserScorecard($this);
				case 'ActionItemsAsModifiedBy':
					return new QQReverseReferenceNodeActionItems($this, 'actionitemsasmodifiedby', 'reverse_reference', 'modified_by');
				case 'ActionItemsAsWho':
					return new QQReverseReferenceNodeActionItems($this, 'actionitemsaswho', 'reverse_reference', 'who');
				case 'KingdomBusinessAssessment':
					return new QQReverseReferenceNodeKingdomBusinessAssessment($this, 'kingdombusinessassessment', 'reverse_reference', 'user_id');
				case 'KpisAsModifiedBy':
					return new QQReverseReferenceNodeKpis($this, 'kpisasmodifiedby', 'reverse_reference', 'modified_by');
				case 'LemonAssessment':
					return new QQReverseReferenceNodeLemonAssessment($this, 'lemonassessment', 'reverse_reference', 'user_id');
				case 'StatementAsModifiedBy':
					return new QQReverseReferenceNodeStatement($this, 'statementasmodifiedby', 'reverse_reference', 'modified_by');
				case 'StrategyAsModifiedBy':
					return new QQReverseReferenceNodeStrategy($this, 'strategyasmodifiedby', 'reverse_reference', 'modified_by');
				case 'TenFAssessment':
					return new QQReverseReferenceNodeTenFAssessment($this, 'tenfassessment', 'reverse_reference', 'user_id');
				case 'TenPAssessment':
					return new QQReverseReferenceNodeTenPAssessment($this, 'tenpassessment', 'reverse_reference', 'user_id');

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
	 * @property-read QQNode $LoginId
	 * @property-read QQNodeLogin $Login
	 * @property-read QQNode $FirstName
	 * @property-read QQNode $LastName
	 * @property-read QQNode $Email
	 * @property-read QQNode $Gender
	 * @property-read QQNode $Country
	 * @property-read QQNode $Department
	 * @property-read QQNode $Title
	 * @property-read QQNode $Tenure
	 * @property-read QQNode $CareerLength
	 * @property-read QQNodeUserCompany $Company
	 * @property-read QQNodeUserResource $Resource
	 * @property-read QQNodeUserScorecard $Scorecard
	 * @property-read QQReverseReferenceNodeActionItems $ActionItemsAsModifiedBy
	 * @property-read QQReverseReferenceNodeActionItems $ActionItemsAsWho
	 * @property-read QQReverseReferenceNodeKingdomBusinessAssessment $KingdomBusinessAssessment
	 * @property-read QQReverseReferenceNodeKpis $KpisAsModifiedBy
	 * @property-read QQReverseReferenceNodeLemonAssessment $LemonAssessment
	 * @property-read QQReverseReferenceNodeStatement $StatementAsModifiedBy
	 * @property-read QQReverseReferenceNodeStrategy $StrategyAsModifiedBy
	 * @property-read QQReverseReferenceNodeTenFAssessment $TenFAssessment
	 * @property-read QQReverseReferenceNodeTenPAssessment $TenPAssessment
	 * @property-read QQNode $_PrimaryKeyNode
	 */
	class QQReverseReferenceNodeUser extends QQReverseReferenceNode {
		protected $strTableName = 'user';
		protected $strPrimaryKey = 'id';
		protected $strClassName = 'User';
		public function __get($strName) {
			switch ($strName) {
				case 'Id':
					return new QQNode('id', 'Id', 'integer', $this);
				case 'LoginId':
					return new QQNode('login_id', 'LoginId', 'integer', $this);
				case 'Login':
					return new QQNodeLogin('login_id', 'Login', 'integer', $this);
				case 'FirstName':
					return new QQNode('first_name', 'FirstName', 'string', $this);
				case 'LastName':
					return new QQNode('last_name', 'LastName', 'string', $this);
				case 'Email':
					return new QQNode('email', 'Email', 'string', $this);
				case 'Gender':
					return new QQNode('gender', 'Gender', 'boolean', $this);
				case 'Country':
					return new QQNode('country', 'Country', 'string', $this);
				case 'Department':
					return new QQNode('department', 'Department', 'string', $this);
				case 'Title':
					return new QQNode('title', 'Title', 'string', $this);
				case 'Tenure':
					return new QQNode('tenure', 'Tenure', 'integer', $this);
				case 'CareerLength':
					return new QQNode('career_length', 'CareerLength', 'integer', $this);
				case 'Company':
					return new QQNodeUserCompany($this);
				case 'Resource':
					return new QQNodeUserResource($this);
				case 'Scorecard':
					return new QQNodeUserScorecard($this);
				case 'ActionItemsAsModifiedBy':
					return new QQReverseReferenceNodeActionItems($this, 'actionitemsasmodifiedby', 'reverse_reference', 'modified_by');
				case 'ActionItemsAsWho':
					return new QQReverseReferenceNodeActionItems($this, 'actionitemsaswho', 'reverse_reference', 'who');
				case 'KingdomBusinessAssessment':
					return new QQReverseReferenceNodeKingdomBusinessAssessment($this, 'kingdombusinessassessment', 'reverse_reference', 'user_id');
				case 'KpisAsModifiedBy':
					return new QQReverseReferenceNodeKpis($this, 'kpisasmodifiedby', 'reverse_reference', 'modified_by');
				case 'LemonAssessment':
					return new QQReverseReferenceNodeLemonAssessment($this, 'lemonassessment', 'reverse_reference', 'user_id');
				case 'StatementAsModifiedBy':
					return new QQReverseReferenceNodeStatement($this, 'statementasmodifiedby', 'reverse_reference', 'modified_by');
				case 'StrategyAsModifiedBy':
					return new QQReverseReferenceNodeStrategy($this, 'strategyasmodifiedby', 'reverse_reference', 'modified_by');
				case 'TenFAssessment':
					return new QQReverseReferenceNodeTenFAssessment($this, 'tenfassessment', 'reverse_reference', 'user_id');
				case 'TenPAssessment':
					return new QQReverseReferenceNodeTenPAssessment($this, 'tenpassessment', 'reverse_reference', 'user_id');

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