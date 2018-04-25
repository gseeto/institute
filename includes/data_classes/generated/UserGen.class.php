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
	 * @property integer $CountryId the value for intCountryId 
	 * @property string $Department the value for strDepartment 
	 * @property integer $TitleId the value for intTitleId 
	 * @property integer $TenureId the value for intTenureId 
	 * @property integer $CareerLength the value for intCareerLength 
	 * @property boolean $OptIn the value for blnOptIn 
	 * @property Login $Login the value for the Login object referenced by intLoginId 
	 * @property CountryList $Country the value for the CountryList object referenced by intCountryId 
	 * @property TitleList $Title the value for the TitleList object referenced by intTitleId 
	 * @property TenureList $Tenure the value for the TenureList object referenced by intTenureId 
	 * @property GroupAssessmentList $_GroupAssessmentListAsAssessmentManager the value for the private _objGroupAssessmentListAsAssessmentManager (Read-Only) if set due to an expansion on the assessment_manager_assn association table
	 * @property GroupAssessmentList[] $_GroupAssessmentListAsAssessmentManagerArray the value for the private _objGroupAssessmentListAsAssessmentManagerArray (Read-Only) if set due to an ExpandAsArray on the assessment_manager_assn association table
	 * @property BusinessChecklist $_BusinessChecklistAsManager the value for the private _objBusinessChecklistAsManager (Read-Only) if set due to an expansion on the businesschecklist_manager_assn association table
	 * @property BusinessChecklist[] $_BusinessChecklistAsManagerArray the value for the private _objBusinessChecklistAsManagerArray (Read-Only) if set due to an ExpandAsArray on the businesschecklist_manager_assn association table
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
	 * @property BusinessChecklistResults $_BusinessChecklistResults the value for the private _objBusinessChecklistResults (Read-Only) if set due to an expansion on the business_checklist_results.user_id reverse relationship
	 * @property BusinessChecklistResults[] $_BusinessChecklistResultsArray the value for the private _objBusinessChecklistResultsArray (Read-Only) if set due to an ExpandAsArray on the business_checklist_results.user_id reverse relationship
	 * @property IntegrationAssessment $_IntegrationAssessment the value for the private _objIntegrationAssessment (Read-Only) if set due to an expansion on the integration_assessment.user_id reverse relationship
	 * @property IntegrationAssessment[] $_IntegrationAssessmentArray the value for the private _objIntegrationAssessmentArray (Read-Only) if set due to an ExpandAsArray on the integration_assessment.user_id reverse relationship
	 * @property KingdomBusinessAssessment $_KingdomBusinessAssessment the value for the private _objKingdomBusinessAssessment (Read-Only) if set due to an expansion on the kingdom_business_assessment.user_id reverse relationship
	 * @property KingdomBusinessAssessment[] $_KingdomBusinessAssessmentArray the value for the private _objKingdomBusinessAssessmentArray (Read-Only) if set due to an ExpandAsArray on the kingdom_business_assessment.user_id reverse relationship
	 * @property Kpis $_KpisAsModifiedBy the value for the private _objKpisAsModifiedBy (Read-Only) if set due to an expansion on the kpis.modified_by reverse relationship
	 * @property Kpis[] $_KpisAsModifiedByArray the value for the private _objKpisAsModifiedByArray (Read-Only) if set due to an ExpandAsArray on the kpis.modified_by reverse relationship
	 * @property Lemon50Assessment $_Lemon50Assessment the value for the private _objLemon50Assessment (Read-Only) if set due to an expansion on the lemon50_assessment.user_id reverse relationship
	 * @property Lemon50Assessment[] $_Lemon50AssessmentArray the value for the private _objLemon50AssessmentArray (Read-Only) if set due to an ExpandAsArray on the lemon50_assessment.user_id reverse relationship
	 * @property LemonAssessment $_LemonAssessment the value for the private _objLemonAssessment (Read-Only) if set due to an expansion on the lemon_assessment.user_id reverse relationship
	 * @property LemonAssessment[] $_LemonAssessmentArray the value for the private _objLemonAssessmentArray (Read-Only) if set due to an ExpandAsArray on the lemon_assessment.user_id reverse relationship
	 * @property LemonloversAssessment $_LemonloversAssessment the value for the private _objLemonloversAssessment (Read-Only) if set due to an expansion on the lemonlovers_assessment.user_id reverse relationship
	 * @property LemonloversAssessment[] $_LemonloversAssessmentArray the value for the private _objLemonloversAssessmentArray (Read-Only) if set due to an ExpandAsArray on the lemonlovers_assessment.user_id reverse relationship
	 * @property LraAssessment $_LraAssessment the value for the private _objLraAssessment (Read-Only) if set due to an expansion on the lra_assessment.user_id reverse relationship
	 * @property LraAssessment[] $_LraAssessmentArray the value for the private _objLraAssessmentArray (Read-Only) if set due to an ExpandAsArray on the lra_assessment.user_id reverse relationship
	 * @property PartneringAwarenessAssessment $_PartneringAwarenessAssessment the value for the private _objPartneringAwarenessAssessment (Read-Only) if set due to an expansion on the partnering_awareness_assessment.user_id reverse relationship
	 * @property PartneringAwarenessAssessment[] $_PartneringAwarenessAssessmentArray the value for the private _objPartneringAwarenessAssessmentArray (Read-Only) if set due to an ExpandAsArray on the partnering_awareness_assessment.user_id reverse relationship
	 * @property PartneringReadinessAssessment $_PartneringReadinessAssessment the value for the private _objPartneringReadinessAssessment (Read-Only) if set due to an expansion on the partnering_readiness_assessment.user_id reverse relationship
	 * @property PartneringReadinessAssessment[] $_PartneringReadinessAssessmentArray the value for the private _objPartneringReadinessAssessmentArray (Read-Only) if set due to an ExpandAsArray on the partnering_readiness_assessment.user_id reverse relationship
	 * @property PostventureAssessment $_PostventureAssessment the value for the private _objPostventureAssessment (Read-Only) if set due to an expansion on the postventure_assessment.user_id reverse relationship
	 * @property PostventureAssessment[] $_PostventureAssessmentArray the value for the private _objPostventureAssessmentArray (Read-Only) if set due to an ExpandAsArray on the postventure_assessment.user_id reverse relationship
	 * @property SeasonalAssessment $_SeasonalAssessment the value for the private _objSeasonalAssessment (Read-Only) if set due to an expansion on the seasonal_assessment.user_id reverse relationship
	 * @property SeasonalAssessment[] $_SeasonalAssessmentArray the value for the private _objSeasonalAssessmentArray (Read-Only) if set due to an ExpandAsArray on the seasonal_assessment.user_id reverse relationship
	 * @property Statement $_StatementAsModifiedBy the value for the private _objStatementAsModifiedBy (Read-Only) if set due to an expansion on the statement.modified_by reverse relationship
	 * @property Statement[] $_StatementAsModifiedByArray the value for the private _objStatementAsModifiedByArray (Read-Only) if set due to an ExpandAsArray on the statement.modified_by reverse relationship
	 * @property Strategy $_StrategyAsModifiedBy the value for the private _objStrategyAsModifiedBy (Read-Only) if set due to an expansion on the strategy.modified_by reverse relationship
	 * @property Strategy[] $_StrategyAsModifiedByArray the value for the private _objStrategyAsModifiedByArray (Read-Only) if set due to an ExpandAsArray on the strategy.modified_by reverse relationship
	 * @property TenFAssessment $_TenFAssessment the value for the private _objTenFAssessment (Read-Only) if set due to an expansion on the ten_f_assessment.user_id reverse relationship
	 * @property TenFAssessment[] $_TenFAssessmentArray the value for the private _objTenFAssessmentArray (Read-Only) if set due to an ExpandAsArray on the ten_f_assessment.user_id reverse relationship
	 * @property TenPAssessment $_TenPAssessment the value for the private _objTenPAssessment (Read-Only) if set due to an expansion on the ten_p_assessment.user_id reverse relationship
	 * @property TenPAssessment[] $_TenPAssessmentArray the value for the private _objTenPAssessmentArray (Read-Only) if set due to an ExpandAsArray on the ten_p_assessment.user_id reverse relationship
	 * @property TimeAssessment $_TimeAssessment the value for the private _objTimeAssessment (Read-Only) if set due to an expansion on the time_assessment.user_id reverse relationship
	 * @property TimeAssessment[] $_TimeAssessmentArray the value for the private _objTimeAssessmentArray (Read-Only) if set due to an ExpandAsArray on the time_assessment.user_id reverse relationship
	 * @property UpwardAssessment $_UpwardAssessment the value for the private _objUpwardAssessment (Read-Only) if set due to an expansion on the upward_assessment.user_id reverse relationship
	 * @property UpwardAssessment[] $_UpwardAssessmentArray the value for the private _objUpwardAssessmentArray (Read-Only) if set due to an ExpandAsArray on the upward_assessment.user_id reverse relationship
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
		 * Protected member variable that maps to the database column user.country_id
		 * @var integer intCountryId
		 */
		protected $intCountryId;
		const CountryIdDefault = null;


		/**
		 * Protected member variable that maps to the database column user.department
		 * @var string strDepartment
		 */
		protected $strDepartment;
		const DepartmentMaxLength = 255;
		const DepartmentDefault = null;


		/**
		 * Protected member variable that maps to the database column user.title_id
		 * @var integer intTitleId
		 */
		protected $intTitleId;
		const TitleIdDefault = null;


		/**
		 * Protected member variable that maps to the database column user.tenure_id
		 * @var integer intTenureId
		 */
		protected $intTenureId;
		const TenureIdDefault = null;


		/**
		 * Protected member variable that maps to the database column user.career_length
		 * @var integer intCareerLength
		 */
		protected $intCareerLength;
		const CareerLengthDefault = null;


		/**
		 * Protected member variable that maps to the database column user.opt_in
		 * @var boolean blnOptIn
		 */
		protected $blnOptIn;
		const OptInDefault = null;


		/**
		 * Private member variable that stores a reference to a single GroupAssessmentListAsAssessmentManager object
		 * (of type GroupAssessmentList), if this User object was restored with
		 * an expansion on the assessment_manager_assn association table.
		 * @var GroupAssessmentList _objGroupAssessmentListAsAssessmentManager;
		 */
		private $_objGroupAssessmentListAsAssessmentManager;

		/**
		 * Private member variable that stores a reference to an array of GroupAssessmentListAsAssessmentManager objects
		 * (of type GroupAssessmentList[]), if this User object was restored with
		 * an ExpandAsArray on the assessment_manager_assn association table.
		 * @var GroupAssessmentList[] _objGroupAssessmentListAsAssessmentManagerArray;
		 */
		private $_objGroupAssessmentListAsAssessmentManagerArray = array();

		/**
		 * Private member variable that stores a reference to a single BusinessChecklistAsManager object
		 * (of type BusinessChecklist), if this User object was restored with
		 * an expansion on the businesschecklist_manager_assn association table.
		 * @var BusinessChecklist _objBusinessChecklistAsManager;
		 */
		private $_objBusinessChecklistAsManager;

		/**
		 * Private member variable that stores a reference to an array of BusinessChecklistAsManager objects
		 * (of type BusinessChecklist[]), if this User object was restored with
		 * an ExpandAsArray on the businesschecklist_manager_assn association table.
		 * @var BusinessChecklist[] _objBusinessChecklistAsManagerArray;
		 */
		private $_objBusinessChecklistAsManagerArray = array();

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
		 * Private member variable that stores a reference to a single BusinessChecklistResults object
		 * (of type BusinessChecklistResults), if this User object was restored with
		 * an expansion on the business_checklist_results association table.
		 * @var BusinessChecklistResults _objBusinessChecklistResults;
		 */
		private $_objBusinessChecklistResults;

		/**
		 * Private member variable that stores a reference to an array of BusinessChecklistResults objects
		 * (of type BusinessChecklistResults[]), if this User object was restored with
		 * an ExpandAsArray on the business_checklist_results association table.
		 * @var BusinessChecklistResults[] _objBusinessChecklistResultsArray;
		 */
		private $_objBusinessChecklistResultsArray = array();

		/**
		 * Private member variable that stores a reference to a single IntegrationAssessment object
		 * (of type IntegrationAssessment), if this User object was restored with
		 * an expansion on the integration_assessment association table.
		 * @var IntegrationAssessment _objIntegrationAssessment;
		 */
		private $_objIntegrationAssessment;

		/**
		 * Private member variable that stores a reference to an array of IntegrationAssessment objects
		 * (of type IntegrationAssessment[]), if this User object was restored with
		 * an ExpandAsArray on the integration_assessment association table.
		 * @var IntegrationAssessment[] _objIntegrationAssessmentArray;
		 */
		private $_objIntegrationAssessmentArray = array();

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
		 * Private member variable that stores a reference to a single Lemon50Assessment object
		 * (of type Lemon50Assessment), if this User object was restored with
		 * an expansion on the lemon50_assessment association table.
		 * @var Lemon50Assessment _objLemon50Assessment;
		 */
		private $_objLemon50Assessment;

		/**
		 * Private member variable that stores a reference to an array of Lemon50Assessment objects
		 * (of type Lemon50Assessment[]), if this User object was restored with
		 * an ExpandAsArray on the lemon50_assessment association table.
		 * @var Lemon50Assessment[] _objLemon50AssessmentArray;
		 */
		private $_objLemon50AssessmentArray = array();

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
		 * Private member variable that stores a reference to a single LemonloversAssessment object
		 * (of type LemonloversAssessment), if this User object was restored with
		 * an expansion on the lemonlovers_assessment association table.
		 * @var LemonloversAssessment _objLemonloversAssessment;
		 */
		private $_objLemonloversAssessment;

		/**
		 * Private member variable that stores a reference to an array of LemonloversAssessment objects
		 * (of type LemonloversAssessment[]), if this User object was restored with
		 * an ExpandAsArray on the lemonlovers_assessment association table.
		 * @var LemonloversAssessment[] _objLemonloversAssessmentArray;
		 */
		private $_objLemonloversAssessmentArray = array();

		/**
		 * Private member variable that stores a reference to a single LraAssessment object
		 * (of type LraAssessment), if this User object was restored with
		 * an expansion on the lra_assessment association table.
		 * @var LraAssessment _objLraAssessment;
		 */
		private $_objLraAssessment;

		/**
		 * Private member variable that stores a reference to an array of LraAssessment objects
		 * (of type LraAssessment[]), if this User object was restored with
		 * an ExpandAsArray on the lra_assessment association table.
		 * @var LraAssessment[] _objLraAssessmentArray;
		 */
		private $_objLraAssessmentArray = array();

		/**
		 * Private member variable that stores a reference to a single PartneringAwarenessAssessment object
		 * (of type PartneringAwarenessAssessment), if this User object was restored with
		 * an expansion on the partnering_awareness_assessment association table.
		 * @var PartneringAwarenessAssessment _objPartneringAwarenessAssessment;
		 */
		private $_objPartneringAwarenessAssessment;

		/**
		 * Private member variable that stores a reference to an array of PartneringAwarenessAssessment objects
		 * (of type PartneringAwarenessAssessment[]), if this User object was restored with
		 * an ExpandAsArray on the partnering_awareness_assessment association table.
		 * @var PartneringAwarenessAssessment[] _objPartneringAwarenessAssessmentArray;
		 */
		private $_objPartneringAwarenessAssessmentArray = array();

		/**
		 * Private member variable that stores a reference to a single PartneringReadinessAssessment object
		 * (of type PartneringReadinessAssessment), if this User object was restored with
		 * an expansion on the partnering_readiness_assessment association table.
		 * @var PartneringReadinessAssessment _objPartneringReadinessAssessment;
		 */
		private $_objPartneringReadinessAssessment;

		/**
		 * Private member variable that stores a reference to an array of PartneringReadinessAssessment objects
		 * (of type PartneringReadinessAssessment[]), if this User object was restored with
		 * an ExpandAsArray on the partnering_readiness_assessment association table.
		 * @var PartneringReadinessAssessment[] _objPartneringReadinessAssessmentArray;
		 */
		private $_objPartneringReadinessAssessmentArray = array();

		/**
		 * Private member variable that stores a reference to a single PostventureAssessment object
		 * (of type PostventureAssessment), if this User object was restored with
		 * an expansion on the postventure_assessment association table.
		 * @var PostventureAssessment _objPostventureAssessment;
		 */
		private $_objPostventureAssessment;

		/**
		 * Private member variable that stores a reference to an array of PostventureAssessment objects
		 * (of type PostventureAssessment[]), if this User object was restored with
		 * an ExpandAsArray on the postventure_assessment association table.
		 * @var PostventureAssessment[] _objPostventureAssessmentArray;
		 */
		private $_objPostventureAssessmentArray = array();

		/**
		 * Private member variable that stores a reference to a single SeasonalAssessment object
		 * (of type SeasonalAssessment), if this User object was restored with
		 * an expansion on the seasonal_assessment association table.
		 * @var SeasonalAssessment _objSeasonalAssessment;
		 */
		private $_objSeasonalAssessment;

		/**
		 * Private member variable that stores a reference to an array of SeasonalAssessment objects
		 * (of type SeasonalAssessment[]), if this User object was restored with
		 * an ExpandAsArray on the seasonal_assessment association table.
		 * @var SeasonalAssessment[] _objSeasonalAssessmentArray;
		 */
		private $_objSeasonalAssessmentArray = array();

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
		 * Private member variable that stores a reference to a single TimeAssessment object
		 * (of type TimeAssessment), if this User object was restored with
		 * an expansion on the time_assessment association table.
		 * @var TimeAssessment _objTimeAssessment;
		 */
		private $_objTimeAssessment;

		/**
		 * Private member variable that stores a reference to an array of TimeAssessment objects
		 * (of type TimeAssessment[]), if this User object was restored with
		 * an ExpandAsArray on the time_assessment association table.
		 * @var TimeAssessment[] _objTimeAssessmentArray;
		 */
		private $_objTimeAssessmentArray = array();

		/**
		 * Private member variable that stores a reference to a single UpwardAssessment object
		 * (of type UpwardAssessment), if this User object was restored with
		 * an expansion on the upward_assessment association table.
		 * @var UpwardAssessment _objUpwardAssessment;
		 */
		private $_objUpwardAssessment;

		/**
		 * Private member variable that stores a reference to an array of UpwardAssessment objects
		 * (of type UpwardAssessment[]), if this User object was restored with
		 * an ExpandAsArray on the upward_assessment association table.
		 * @var UpwardAssessment[] _objUpwardAssessmentArray;
		 */
		private $_objUpwardAssessmentArray = array();

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

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column user.country_id.
		 *
		 * NOTE: Always use the Country property getter to correctly retrieve this CountryList object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var CountryList objCountry
		 */
		protected $objCountry;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column user.title_id.
		 *
		 * NOTE: Always use the Title property getter to correctly retrieve this TitleList object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var TitleList objTitle
		 */
		protected $objTitle;

		/**
		 * Protected member variable that contains the object pointed by the reference
		 * in the database column user.tenure_id.
		 *
		 * NOTE: Always use the Tenure property getter to correctly retrieve this TenureList object.
		 * (Because this class implements late binding, this variable reference MAY be null.)
		 * @var TenureList objTenure
		 */
		protected $objTenure;





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
			$objBuilder->AddSelectItem($strTableName, 'country_id', $strAliasPrefix . 'country_id');
			$objBuilder->AddSelectItem($strTableName, 'department', $strAliasPrefix . 'department');
			$objBuilder->AddSelectItem($strTableName, 'title_id', $strAliasPrefix . 'title_id');
			$objBuilder->AddSelectItem($strTableName, 'tenure_id', $strAliasPrefix . 'tenure_id');
			$objBuilder->AddSelectItem($strTableName, 'career_length', $strAliasPrefix . 'career_length');
			$objBuilder->AddSelectItem($strTableName, 'opt_in', $strAliasPrefix . 'opt_in');
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

				$strAlias = $strAliasPrefix . 'groupassessmentlistasassessmentmanager__group_assessment_id__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objGroupAssessmentListAsAssessmentManagerArray)) {
						$objPreviousChildItem = $objPreviousItem->_objGroupAssessmentListAsAssessmentManagerArray[$intPreviousChildItemCount - 1];
						$objChildItem = GroupAssessmentList::InstantiateDbRow($objDbRow, $strAliasPrefix . 'groupassessmentlistasassessmentmanager__group_assessment_id__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objGroupAssessmentListAsAssessmentManagerArray[] = $objChildItem;
					} else
						$objPreviousItem->_objGroupAssessmentListAsAssessmentManagerArray[] = GroupAssessmentList::InstantiateDbRow($objDbRow, $strAliasPrefix . 'groupassessmentlistasassessmentmanager__group_assessment_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'businesschecklistasmanager__business_checklist_id__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objBusinessChecklistAsManagerArray)) {
						$objPreviousChildItem = $objPreviousItem->_objBusinessChecklistAsManagerArray[$intPreviousChildItemCount - 1];
						$objChildItem = BusinessChecklist::InstantiateDbRow($objDbRow, $strAliasPrefix . 'businesschecklistasmanager__business_checklist_id__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objBusinessChecklistAsManagerArray[] = $objChildItem;
					} else
						$objPreviousItem->_objBusinessChecklistAsManagerArray[] = BusinessChecklist::InstantiateDbRow($objDbRow, $strAliasPrefix . 'businesschecklistasmanager__business_checklist_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

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

				$strAlias = $strAliasPrefix . 'businesschecklistresults__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objBusinessChecklistResultsArray)) {
						$objPreviousChildItem = $objPreviousItem->_objBusinessChecklistResultsArray[$intPreviousChildItemCount - 1];
						$objChildItem = BusinessChecklistResults::InstantiateDbRow($objDbRow, $strAliasPrefix . 'businesschecklistresults__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objBusinessChecklistResultsArray[] = $objChildItem;
					} else
						$objPreviousItem->_objBusinessChecklistResultsArray[] = BusinessChecklistResults::InstantiateDbRow($objDbRow, $strAliasPrefix . 'businesschecklistresults__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'integrationassessment__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objIntegrationAssessmentArray)) {
						$objPreviousChildItem = $objPreviousItem->_objIntegrationAssessmentArray[$intPreviousChildItemCount - 1];
						$objChildItem = IntegrationAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'integrationassessment__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objIntegrationAssessmentArray[] = $objChildItem;
					} else
						$objPreviousItem->_objIntegrationAssessmentArray[] = IntegrationAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'integrationassessment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
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

				$strAlias = $strAliasPrefix . 'lemon50assessment__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objLemon50AssessmentArray)) {
						$objPreviousChildItem = $objPreviousItem->_objLemon50AssessmentArray[$intPreviousChildItemCount - 1];
						$objChildItem = Lemon50Assessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'lemon50assessment__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objLemon50AssessmentArray[] = $objChildItem;
					} else
						$objPreviousItem->_objLemon50AssessmentArray[] = Lemon50Assessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'lemon50assessment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
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

				$strAlias = $strAliasPrefix . 'lemonloversassessment__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objLemonloversAssessmentArray)) {
						$objPreviousChildItem = $objPreviousItem->_objLemonloversAssessmentArray[$intPreviousChildItemCount - 1];
						$objChildItem = LemonloversAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'lemonloversassessment__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objLemonloversAssessmentArray[] = $objChildItem;
					} else
						$objPreviousItem->_objLemonloversAssessmentArray[] = LemonloversAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'lemonloversassessment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'lraassessment__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objLraAssessmentArray)) {
						$objPreviousChildItem = $objPreviousItem->_objLraAssessmentArray[$intPreviousChildItemCount - 1];
						$objChildItem = LraAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'lraassessment__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objLraAssessmentArray[] = $objChildItem;
					} else
						$objPreviousItem->_objLraAssessmentArray[] = LraAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'lraassessment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'partneringawarenessassessment__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objPartneringAwarenessAssessmentArray)) {
						$objPreviousChildItem = $objPreviousItem->_objPartneringAwarenessAssessmentArray[$intPreviousChildItemCount - 1];
						$objChildItem = PartneringAwarenessAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'partneringawarenessassessment__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objPartneringAwarenessAssessmentArray[] = $objChildItem;
					} else
						$objPreviousItem->_objPartneringAwarenessAssessmentArray[] = PartneringAwarenessAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'partneringawarenessassessment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'partneringreadinessassessment__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objPartneringReadinessAssessmentArray)) {
						$objPreviousChildItem = $objPreviousItem->_objPartneringReadinessAssessmentArray[$intPreviousChildItemCount - 1];
						$objChildItem = PartneringReadinessAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'partneringreadinessassessment__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objPartneringReadinessAssessmentArray[] = $objChildItem;
					} else
						$objPreviousItem->_objPartneringReadinessAssessmentArray[] = PartneringReadinessAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'partneringreadinessassessment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'postventureassessment__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objPostventureAssessmentArray)) {
						$objPreviousChildItem = $objPreviousItem->_objPostventureAssessmentArray[$intPreviousChildItemCount - 1];
						$objChildItem = PostventureAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'postventureassessment__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objPostventureAssessmentArray[] = $objChildItem;
					} else
						$objPreviousItem->_objPostventureAssessmentArray[] = PostventureAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'postventureassessment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'seasonalassessment__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objSeasonalAssessmentArray)) {
						$objPreviousChildItem = $objPreviousItem->_objSeasonalAssessmentArray[$intPreviousChildItemCount - 1];
						$objChildItem = SeasonalAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'seasonalassessment__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objSeasonalAssessmentArray[] = $objChildItem;
					} else
						$objPreviousItem->_objSeasonalAssessmentArray[] = SeasonalAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'seasonalassessment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
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

				$strAlias = $strAliasPrefix . 'timeassessment__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objTimeAssessmentArray)) {
						$objPreviousChildItem = $objPreviousItem->_objTimeAssessmentArray[$intPreviousChildItemCount - 1];
						$objChildItem = TimeAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'timeassessment__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objTimeAssessmentArray[] = $objChildItem;
					} else
						$objPreviousItem->_objTimeAssessmentArray[] = TimeAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'timeassessment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
					$blnExpandedViaArray = true;
				}

				$strAlias = $strAliasPrefix . 'upwardassessment__id';
				$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
				if ((array_key_exists($strAlias, $strExpandAsArrayNodes)) &&
					(!is_null($objDbRow->GetColumn($strAliasName)))) {
					if ($intPreviousChildItemCount = count($objPreviousItem->_objUpwardAssessmentArray)) {
						$objPreviousChildItem = $objPreviousItem->_objUpwardAssessmentArray[$intPreviousChildItemCount - 1];
						$objChildItem = UpwardAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'upwardassessment__', $strExpandAsArrayNodes, $objPreviousChildItem, $strColumnAliasArray);
						if ($objChildItem)
							$objPreviousItem->_objUpwardAssessmentArray[] = $objChildItem;
					} else
						$objPreviousItem->_objUpwardAssessmentArray[] = UpwardAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'upwardassessment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
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
			$strAliasName = array_key_exists($strAliasPrefix . 'country_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'country_id'] : $strAliasPrefix . 'country_id';
			$objToReturn->intCountryId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'department', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'department'] : $strAliasPrefix . 'department';
			$objToReturn->strDepartment = $objDbRow->GetColumn($strAliasName, 'VarChar');
			$strAliasName = array_key_exists($strAliasPrefix . 'title_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'title_id'] : $strAliasPrefix . 'title_id';
			$objToReturn->intTitleId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'tenure_id', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'tenure_id'] : $strAliasPrefix . 'tenure_id';
			$objToReturn->intTenureId = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'career_length', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'career_length'] : $strAliasPrefix . 'career_length';
			$objToReturn->intCareerLength = $objDbRow->GetColumn($strAliasName, 'Integer');
			$strAliasName = array_key_exists($strAliasPrefix . 'opt_in', $strColumnAliasArray) ? $strColumnAliasArray[$strAliasPrefix . 'opt_in'] : $strAliasPrefix . 'opt_in';
			$objToReturn->blnOptIn = $objDbRow->GetColumn($strAliasName, 'Bit');

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

			// Check for Country Early Binding
			$strAlias = $strAliasPrefix . 'country_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objCountry = CountryList::InstantiateDbRow($objDbRow, $strAliasPrefix . 'country_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for Title Early Binding
			$strAlias = $strAliasPrefix . 'title_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objTitle = TitleList::InstantiateDbRow($objDbRow, $strAliasPrefix . 'title_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);

			// Check for Tenure Early Binding
			$strAlias = $strAliasPrefix . 'tenure_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName)))
				$objToReturn->objTenure = TenureList::InstantiateDbRow($objDbRow, $strAliasPrefix . 'tenure_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);



			// Check for GroupAssessmentListAsAssessmentManager Virtual Binding
			$strAlias = $strAliasPrefix . 'groupassessmentlistasassessmentmanager__group_assessment_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objGroupAssessmentListAsAssessmentManagerArray[] = GroupAssessmentList::InstantiateDbRow($objDbRow, $strAliasPrefix . 'groupassessmentlistasassessmentmanager__group_assessment_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objGroupAssessmentListAsAssessmentManager = GroupAssessmentList::InstantiateDbRow($objDbRow, $strAliasPrefix . 'groupassessmentlistasassessmentmanager__group_assessment_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for BusinessChecklistAsManager Virtual Binding
			$strAlias = $strAliasPrefix . 'businesschecklistasmanager__business_checklist_id__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objBusinessChecklistAsManagerArray[] = BusinessChecklist::InstantiateDbRow($objDbRow, $strAliasPrefix . 'businesschecklistasmanager__business_checklist_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objBusinessChecklistAsManager = BusinessChecklist::InstantiateDbRow($objDbRow, $strAliasPrefix . 'businesschecklistasmanager__business_checklist_id__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

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

			// Check for BusinessChecklistResults Virtual Binding
			$strAlias = $strAliasPrefix . 'businesschecklistresults__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objBusinessChecklistResultsArray[] = BusinessChecklistResults::InstantiateDbRow($objDbRow, $strAliasPrefix . 'businesschecklistresults__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objBusinessChecklistResults = BusinessChecklistResults::InstantiateDbRow($objDbRow, $strAliasPrefix . 'businesschecklistresults__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for IntegrationAssessment Virtual Binding
			$strAlias = $strAliasPrefix . 'integrationassessment__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objIntegrationAssessmentArray[] = IntegrationAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'integrationassessment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objIntegrationAssessment = IntegrationAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'integrationassessment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
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

			// Check for Lemon50Assessment Virtual Binding
			$strAlias = $strAliasPrefix . 'lemon50assessment__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objLemon50AssessmentArray[] = Lemon50Assessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'lemon50assessment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objLemon50Assessment = Lemon50Assessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'lemon50assessment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
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

			// Check for LemonloversAssessment Virtual Binding
			$strAlias = $strAliasPrefix . 'lemonloversassessment__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objLemonloversAssessmentArray[] = LemonloversAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'lemonloversassessment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objLemonloversAssessment = LemonloversAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'lemonloversassessment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for LraAssessment Virtual Binding
			$strAlias = $strAliasPrefix . 'lraassessment__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objLraAssessmentArray[] = LraAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'lraassessment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objLraAssessment = LraAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'lraassessment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for PartneringAwarenessAssessment Virtual Binding
			$strAlias = $strAliasPrefix . 'partneringawarenessassessment__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objPartneringAwarenessAssessmentArray[] = PartneringAwarenessAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'partneringawarenessassessment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objPartneringAwarenessAssessment = PartneringAwarenessAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'partneringawarenessassessment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for PartneringReadinessAssessment Virtual Binding
			$strAlias = $strAliasPrefix . 'partneringreadinessassessment__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objPartneringReadinessAssessmentArray[] = PartneringReadinessAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'partneringreadinessassessment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objPartneringReadinessAssessment = PartneringReadinessAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'partneringreadinessassessment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for PostventureAssessment Virtual Binding
			$strAlias = $strAliasPrefix . 'postventureassessment__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objPostventureAssessmentArray[] = PostventureAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'postventureassessment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objPostventureAssessment = PostventureAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'postventureassessment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for SeasonalAssessment Virtual Binding
			$strAlias = $strAliasPrefix . 'seasonalassessment__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objSeasonalAssessmentArray[] = SeasonalAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'seasonalassessment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objSeasonalAssessment = SeasonalAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'seasonalassessment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
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

			// Check for TimeAssessment Virtual Binding
			$strAlias = $strAliasPrefix . 'timeassessment__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objTimeAssessmentArray[] = TimeAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'timeassessment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objTimeAssessment = TimeAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'timeassessment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
			}

			// Check for UpwardAssessment Virtual Binding
			$strAlias = $strAliasPrefix . 'upwardassessment__id';
			$strAliasName = array_key_exists($strAlias, $strColumnAliasArray) ? $strColumnAliasArray[$strAlias] : $strAlias;
			if (!is_null($objDbRow->GetColumn($strAliasName))) {
				if (($strExpandAsArrayNodes) && (array_key_exists($strAlias, $strExpandAsArrayNodes)))
					$objToReturn->_objUpwardAssessmentArray[] = UpwardAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'upwardassessment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
				else
					$objToReturn->_objUpwardAssessment = UpwardAssessment::InstantiateDbRow($objDbRow, $strAliasPrefix . 'upwardassessment__', $strExpandAsArrayNodes, null, $strColumnAliasArray);
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
			
		/**
		 * Load an array of User objects,
		 * by CountryId Index(es)
		 * @param integer $intCountryId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return User[]
		*/
		public static function LoadArrayByCountryId($intCountryId, $objOptionalClauses = null) {
			// Call User::QueryArray to perform the LoadArrayByCountryId query
			try {
				return User::QueryArray(
					QQ::Equal(QQN::User()->CountryId, $intCountryId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Users
		 * by CountryId Index(es)
		 * @param integer $intCountryId
		 * @return int
		*/
		public static function CountByCountryId($intCountryId, $objOptionalClauses = null) {
			// Call User::QueryCount to perform the CountByCountryId query
			return User::QueryCount(
				QQ::Equal(QQN::User()->CountryId, $intCountryId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of User objects,
		 * by TitleId Index(es)
		 * @param integer $intTitleId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return User[]
		*/
		public static function LoadArrayByTitleId($intTitleId, $objOptionalClauses = null) {
			// Call User::QueryArray to perform the LoadArrayByTitleId query
			try {
				return User::QueryArray(
					QQ::Equal(QQN::User()->TitleId, $intTitleId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Users
		 * by TitleId Index(es)
		 * @param integer $intTitleId
		 * @return int
		*/
		public static function CountByTitleId($intTitleId, $objOptionalClauses = null) {
			// Call User::QueryCount to perform the CountByTitleId query
			return User::QueryCount(
				QQ::Equal(QQN::User()->TitleId, $intTitleId)
			, $objOptionalClauses
			);
		}
			
		/**
		 * Load an array of User objects,
		 * by TenureId Index(es)
		 * @param integer $intTenureId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return User[]
		*/
		public static function LoadArrayByTenureId($intTenureId, $objOptionalClauses = null) {
			// Call User::QueryArray to perform the LoadArrayByTenureId query
			try {
				return User::QueryArray(
					QQ::Equal(QQN::User()->TenureId, $intTenureId),
					$objOptionalClauses
					);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Users
		 * by TenureId Index(es)
		 * @param integer $intTenureId
		 * @return int
		*/
		public static function CountByTenureId($intTenureId, $objOptionalClauses = null) {
			// Call User::QueryCount to perform the CountByTenureId query
			return User::QueryCount(
				QQ::Equal(QQN::User()->TenureId, $intTenureId)
			, $objOptionalClauses
			);
		}



		////////////////////////////////////////////////////
		// INDEX-BASED LOAD METHODS (Array via Many to Many)
		////////////////////////////////////////////////////
			/**
		 * Load an array of GroupAssessmentList objects for a given GroupAssessmentListAsAssessmentManager
		 * via the assessment_manager_assn table
		 * @param integer $intGroupAssessmentId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return User[]
		*/
		public static function LoadArrayByGroupAssessmentListAsAssessmentManager($intGroupAssessmentId, $objOptionalClauses = null) {
			// Call User::QueryArray to perform the LoadArrayByGroupAssessmentListAsAssessmentManager query
			try {
				return User::QueryArray(
					QQ::Equal(QQN::User()->GroupAssessmentListAsAssessmentManager->GroupAssessmentId, $intGroupAssessmentId),
					$objOptionalClauses
				);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Users for a given GroupAssessmentListAsAssessmentManager
		 * via the assessment_manager_assn table
		 * @param integer $intGroupAssessmentId
		 * @return int
		*/
		public static function CountByGroupAssessmentListAsAssessmentManager($intGroupAssessmentId, $objOptionalClauses = null) {
			return User::QueryCount(
				QQ::Equal(QQN::User()->GroupAssessmentListAsAssessmentManager->GroupAssessmentId, $intGroupAssessmentId),
				$objOptionalClauses
			);
		}
			/**
		 * Load an array of BusinessChecklist objects for a given BusinessChecklistAsManager
		 * via the businesschecklist_manager_assn table
		 * @param integer $intBusinessChecklistId
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return User[]
		*/
		public static function LoadArrayByBusinessChecklistAsManager($intBusinessChecklistId, $objOptionalClauses = null) {
			// Call User::QueryArray to perform the LoadArrayByBusinessChecklistAsManager query
			try {
				return User::QueryArray(
					QQ::Equal(QQN::User()->BusinessChecklistAsManager->BusinessChecklistId, $intBusinessChecklistId),
					$objOptionalClauses
				);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Count Users for a given BusinessChecklistAsManager
		 * via the businesschecklist_manager_assn table
		 * @param integer $intBusinessChecklistId
		 * @return int
		*/
		public static function CountByBusinessChecklistAsManager($intBusinessChecklistId, $objOptionalClauses = null) {
			return User::QueryCount(
				QQ::Equal(QQN::User()->BusinessChecklistAsManager->BusinessChecklistId, $intBusinessChecklistId),
				$objOptionalClauses
			);
		}
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
							`country_id`,
							`department`,
							`title_id`,
							`tenure_id`,
							`career_length`,
							`opt_in`
						) VALUES (
							' . $objDatabase->SqlVariable($this->intLoginId) . ',
							' . $objDatabase->SqlVariable($this->strFirstName) . ',
							' . $objDatabase->SqlVariable($this->strLastName) . ',
							' . $objDatabase->SqlVariable($this->strEmail) . ',
							' . $objDatabase->SqlVariable($this->blnGender) . ',
							' . $objDatabase->SqlVariable($this->intCountryId) . ',
							' . $objDatabase->SqlVariable($this->strDepartment) . ',
							' . $objDatabase->SqlVariable($this->intTitleId) . ',
							' . $objDatabase->SqlVariable($this->intTenureId) . ',
							' . $objDatabase->SqlVariable($this->intCareerLength) . ',
							' . $objDatabase->SqlVariable($this->blnOptIn) . '
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
							`country_id` = ' . $objDatabase->SqlVariable($this->intCountryId) . ',
							`department` = ' . $objDatabase->SqlVariable($this->strDepartment) . ',
							`title_id` = ' . $objDatabase->SqlVariable($this->intTitleId) . ',
							`tenure_id` = ' . $objDatabase->SqlVariable($this->intTenureId) . ',
							`career_length` = ' . $objDatabase->SqlVariable($this->intCareerLength) . ',
							`opt_in` = ' . $objDatabase->SqlVariable($this->blnOptIn) . '
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
			$this->CountryId = $objReloaded->CountryId;
			$this->strDepartment = $objReloaded->strDepartment;
			$this->TitleId = $objReloaded->TitleId;
			$this->TenureId = $objReloaded->TenureId;
			$this->intCareerLength = $objReloaded->intCareerLength;
			$this->blnOptIn = $objReloaded->blnOptIn;
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
					`country_id`,
					`department`,
					`title_id`,
					`tenure_id`,
					`career_length`,
					`opt_in`,
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
					' . $objDatabase->SqlVariable($this->intCountryId) . ',
					' . $objDatabase->SqlVariable($this->strDepartment) . ',
					' . $objDatabase->SqlVariable($this->intTitleId) . ',
					' . $objDatabase->SqlVariable($this->intTenureId) . ',
					' . $objDatabase->SqlVariable($this->intCareerLength) . ',
					' . $objDatabase->SqlVariable($this->blnOptIn) . ',
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

				case 'CountryId':
					// Gets the value for intCountryId 
					// @return integer
					return $this->intCountryId;

				case 'Department':
					// Gets the value for strDepartment 
					// @return string
					return $this->strDepartment;

				case 'TitleId':
					// Gets the value for intTitleId 
					// @return integer
					return $this->intTitleId;

				case 'TenureId':
					// Gets the value for intTenureId 
					// @return integer
					return $this->intTenureId;

				case 'CareerLength':
					// Gets the value for intCareerLength 
					// @return integer
					return $this->intCareerLength;

				case 'OptIn':
					// Gets the value for blnOptIn 
					// @return boolean
					return $this->blnOptIn;


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

				case 'Country':
					// Gets the value for the CountryList object referenced by intCountryId 
					// @return CountryList
					try {
						if ((!$this->objCountry) && (!is_null($this->intCountryId)))
							$this->objCountry = CountryList::Load($this->intCountryId);
						return $this->objCountry;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Title':
					// Gets the value for the TitleList object referenced by intTitleId 
					// @return TitleList
					try {
						if ((!$this->objTitle) && (!is_null($this->intTitleId)))
							$this->objTitle = TitleList::Load($this->intTitleId);
						return $this->objTitle;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'Tenure':
					// Gets the value for the TenureList object referenced by intTenureId 
					// @return TenureList
					try {
						if ((!$this->objTenure) && (!is_null($this->intTenureId)))
							$this->objTenure = TenureList::Load($this->intTenureId);
						return $this->objTenure;
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}


				////////////////////////////
				// Virtual Object References (Many to Many and Reverse References)
				// (If restored via a "Many-to" expansion)
				////////////////////////////

				case '_GroupAssessmentListAsAssessmentManager':
					// Gets the value for the private _objGroupAssessmentListAsAssessmentManager (Read-Only)
					// if set due to an expansion on the assessment_manager_assn association table
					// @return GroupAssessmentList
					return $this->_objGroupAssessmentListAsAssessmentManager;

				case '_GroupAssessmentListAsAssessmentManagerArray':
					// Gets the value for the private _objGroupAssessmentListAsAssessmentManagerArray (Read-Only)
					// if set due to an ExpandAsArray on the assessment_manager_assn association table
					// @return GroupAssessmentList[]
					return (array) $this->_objGroupAssessmentListAsAssessmentManagerArray;

				case '_BusinessChecklistAsManager':
					// Gets the value for the private _objBusinessChecklistAsManager (Read-Only)
					// if set due to an expansion on the businesschecklist_manager_assn association table
					// @return BusinessChecklist
					return $this->_objBusinessChecklistAsManager;

				case '_BusinessChecklistAsManagerArray':
					// Gets the value for the private _objBusinessChecklistAsManagerArray (Read-Only)
					// if set due to an ExpandAsArray on the businesschecklist_manager_assn association table
					// @return BusinessChecklist[]
					return (array) $this->_objBusinessChecklistAsManagerArray;

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

				case '_BusinessChecklistResults':
					// Gets the value for the private _objBusinessChecklistResults (Read-Only)
					// if set due to an expansion on the business_checklist_results.user_id reverse relationship
					// @return BusinessChecklistResults
					return $this->_objBusinessChecklistResults;

				case '_BusinessChecklistResultsArray':
					// Gets the value for the private _objBusinessChecklistResultsArray (Read-Only)
					// if set due to an ExpandAsArray on the business_checklist_results.user_id reverse relationship
					// @return BusinessChecklistResults[]
					return (array) $this->_objBusinessChecklistResultsArray;

				case '_IntegrationAssessment':
					// Gets the value for the private _objIntegrationAssessment (Read-Only)
					// if set due to an expansion on the integration_assessment.user_id reverse relationship
					// @return IntegrationAssessment
					return $this->_objIntegrationAssessment;

				case '_IntegrationAssessmentArray':
					// Gets the value for the private _objIntegrationAssessmentArray (Read-Only)
					// if set due to an ExpandAsArray on the integration_assessment.user_id reverse relationship
					// @return IntegrationAssessment[]
					return (array) $this->_objIntegrationAssessmentArray;

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

				case '_Lemon50Assessment':
					// Gets the value for the private _objLemon50Assessment (Read-Only)
					// if set due to an expansion on the lemon50_assessment.user_id reverse relationship
					// @return Lemon50Assessment
					return $this->_objLemon50Assessment;

				case '_Lemon50AssessmentArray':
					// Gets the value for the private _objLemon50AssessmentArray (Read-Only)
					// if set due to an ExpandAsArray on the lemon50_assessment.user_id reverse relationship
					// @return Lemon50Assessment[]
					return (array) $this->_objLemon50AssessmentArray;

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

				case '_LemonloversAssessment':
					// Gets the value for the private _objLemonloversAssessment (Read-Only)
					// if set due to an expansion on the lemonlovers_assessment.user_id reverse relationship
					// @return LemonloversAssessment
					return $this->_objLemonloversAssessment;

				case '_LemonloversAssessmentArray':
					// Gets the value for the private _objLemonloversAssessmentArray (Read-Only)
					// if set due to an ExpandAsArray on the lemonlovers_assessment.user_id reverse relationship
					// @return LemonloversAssessment[]
					return (array) $this->_objLemonloversAssessmentArray;

				case '_LraAssessment':
					// Gets the value for the private _objLraAssessment (Read-Only)
					// if set due to an expansion on the lra_assessment.user_id reverse relationship
					// @return LraAssessment
					return $this->_objLraAssessment;

				case '_LraAssessmentArray':
					// Gets the value for the private _objLraAssessmentArray (Read-Only)
					// if set due to an ExpandAsArray on the lra_assessment.user_id reverse relationship
					// @return LraAssessment[]
					return (array) $this->_objLraAssessmentArray;

				case '_PartneringAwarenessAssessment':
					// Gets the value for the private _objPartneringAwarenessAssessment (Read-Only)
					// if set due to an expansion on the partnering_awareness_assessment.user_id reverse relationship
					// @return PartneringAwarenessAssessment
					return $this->_objPartneringAwarenessAssessment;

				case '_PartneringAwarenessAssessmentArray':
					// Gets the value for the private _objPartneringAwarenessAssessmentArray (Read-Only)
					// if set due to an ExpandAsArray on the partnering_awareness_assessment.user_id reverse relationship
					// @return PartneringAwarenessAssessment[]
					return (array) $this->_objPartneringAwarenessAssessmentArray;

				case '_PartneringReadinessAssessment':
					// Gets the value for the private _objPartneringReadinessAssessment (Read-Only)
					// if set due to an expansion on the partnering_readiness_assessment.user_id reverse relationship
					// @return PartneringReadinessAssessment
					return $this->_objPartneringReadinessAssessment;

				case '_PartneringReadinessAssessmentArray':
					// Gets the value for the private _objPartneringReadinessAssessmentArray (Read-Only)
					// if set due to an ExpandAsArray on the partnering_readiness_assessment.user_id reverse relationship
					// @return PartneringReadinessAssessment[]
					return (array) $this->_objPartneringReadinessAssessmentArray;

				case '_PostventureAssessment':
					// Gets the value for the private _objPostventureAssessment (Read-Only)
					// if set due to an expansion on the postventure_assessment.user_id reverse relationship
					// @return PostventureAssessment
					return $this->_objPostventureAssessment;

				case '_PostventureAssessmentArray':
					// Gets the value for the private _objPostventureAssessmentArray (Read-Only)
					// if set due to an ExpandAsArray on the postventure_assessment.user_id reverse relationship
					// @return PostventureAssessment[]
					return (array) $this->_objPostventureAssessmentArray;

				case '_SeasonalAssessment':
					// Gets the value for the private _objSeasonalAssessment (Read-Only)
					// if set due to an expansion on the seasonal_assessment.user_id reverse relationship
					// @return SeasonalAssessment
					return $this->_objSeasonalAssessment;

				case '_SeasonalAssessmentArray':
					// Gets the value for the private _objSeasonalAssessmentArray (Read-Only)
					// if set due to an ExpandAsArray on the seasonal_assessment.user_id reverse relationship
					// @return SeasonalAssessment[]
					return (array) $this->_objSeasonalAssessmentArray;

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

				case '_TimeAssessment':
					// Gets the value for the private _objTimeAssessment (Read-Only)
					// if set due to an expansion on the time_assessment.user_id reverse relationship
					// @return TimeAssessment
					return $this->_objTimeAssessment;

				case '_TimeAssessmentArray':
					// Gets the value for the private _objTimeAssessmentArray (Read-Only)
					// if set due to an ExpandAsArray on the time_assessment.user_id reverse relationship
					// @return TimeAssessment[]
					return (array) $this->_objTimeAssessmentArray;

				case '_UpwardAssessment':
					// Gets the value for the private _objUpwardAssessment (Read-Only)
					// if set due to an expansion on the upward_assessment.user_id reverse relationship
					// @return UpwardAssessment
					return $this->_objUpwardAssessment;

				case '_UpwardAssessmentArray':
					// Gets the value for the private _objUpwardAssessmentArray (Read-Only)
					// if set due to an ExpandAsArray on the upward_assessment.user_id reverse relationship
					// @return UpwardAssessment[]
					return (array) $this->_objUpwardAssessmentArray;


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

				case 'CountryId':
					// Sets the value for intCountryId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objCountry = null;
						return ($this->intCountryId = QType::Cast($mixValue, QType::Integer));
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

				case 'TitleId':
					// Sets the value for intTitleId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objTitle = null;
						return ($this->intTitleId = QType::Cast($mixValue, QType::Integer));
					} catch (QCallerException $objExc) {
						$objExc->IncrementOffset();
						throw $objExc;
					}

				case 'TenureId':
					// Sets the value for intTenureId 
					// @param integer $mixValue
					// @return integer
					try {
						$this->objTenure = null;
						return ($this->intTenureId = QType::Cast($mixValue, QType::Integer));
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

				case 'OptIn':
					// Sets the value for blnOptIn 
					// @param boolean $mixValue
					// @return boolean
					try {
						return ($this->blnOptIn = QType::Cast($mixValue, QType::Boolean));
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

				case 'Country':
					// Sets the value for the CountryList object referenced by intCountryId 
					// @param CountryList $mixValue
					// @return CountryList
					if (is_null($mixValue)) {
						$this->intCountryId = null;
						$this->objCountry = null;
						return null;
					} else {
						// Make sure $mixValue actually is a CountryList object
						try {
							$mixValue = QType::Cast($mixValue, 'CountryList');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED CountryList object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Country for this User');

						// Update Local Member Variables
						$this->objCountry = $mixValue;
						$this->intCountryId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Title':
					// Sets the value for the TitleList object referenced by intTitleId 
					// @param TitleList $mixValue
					// @return TitleList
					if (is_null($mixValue)) {
						$this->intTitleId = null;
						$this->objTitle = null;
						return null;
					} else {
						// Make sure $mixValue actually is a TitleList object
						try {
							$mixValue = QType::Cast($mixValue, 'TitleList');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED TitleList object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Title for this User');

						// Update Local Member Variables
						$this->objTitle = $mixValue;
						$this->intTitleId = $mixValue->Id;

						// Return $mixValue
						return $mixValue;
					}
					break;

				case 'Tenure':
					// Sets the value for the TenureList object referenced by intTenureId 
					// @param TenureList $mixValue
					// @return TenureList
					if (is_null($mixValue)) {
						$this->intTenureId = null;
						$this->objTenure = null;
						return null;
					} else {
						// Make sure $mixValue actually is a TenureList object
						try {
							$mixValue = QType::Cast($mixValue, 'TenureList');
						} catch (QInvalidCastException $objExc) {
							$objExc->IncrementOffset();
							throw $objExc;
						} 

						// Make sure $mixValue is a SAVED TenureList object
						if (is_null($mixValue->Id))
							throw new QCallerException('Unable to set an unsaved Tenure for this User');

						// Update Local Member Variables
						$this->objTenure = $mixValue;
						$this->intTenureId = $mixValue->Id;

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

			
		
		// Related Objects' Methods for BusinessChecklistResults
		//-------------------------------------------------------------------

		/**
		 * Gets all associated BusinessChecklistResultses as an array of BusinessChecklistResults objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return BusinessChecklistResults[]
		*/ 
		public function GetBusinessChecklistResultsArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return BusinessChecklistResults::LoadArrayByUserId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated BusinessChecklistResultses
		 * @return int
		*/ 
		public function CountBusinessChecklistResultses() {
			if ((is_null($this->intId)))
				return 0;

			return BusinessChecklistResults::CountByUserId($this->intId);
		}

		/**
		 * Associates a BusinessChecklistResults
		 * @param BusinessChecklistResults $objBusinessChecklistResults
		 * @return void
		*/ 
		public function AssociateBusinessChecklistResults(BusinessChecklistResults $objBusinessChecklistResults) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateBusinessChecklistResults on this unsaved User.');
			if ((is_null($objBusinessChecklistResults->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateBusinessChecklistResults on this User with an unsaved BusinessChecklistResults.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`business_checklist_results`
				SET
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objBusinessChecklistResults->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objBusinessChecklistResults->UserId = $this->intId;
				$objBusinessChecklistResults->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a BusinessChecklistResults
		 * @param BusinessChecklistResults $objBusinessChecklistResults
		 * @return void
		*/ 
		public function UnassociateBusinessChecklistResults(BusinessChecklistResults $objBusinessChecklistResults) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateBusinessChecklistResults on this unsaved User.');
			if ((is_null($objBusinessChecklistResults->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateBusinessChecklistResults on this User with an unsaved BusinessChecklistResults.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`business_checklist_results`
				SET
					`user_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objBusinessChecklistResults->Id) . ' AND
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objBusinessChecklistResults->UserId = null;
				$objBusinessChecklistResults->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all BusinessChecklistResultses
		 * @return void
		*/ 
		public function UnassociateAllBusinessChecklistResultses() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateBusinessChecklistResults on this unsaved User.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (BusinessChecklistResults::LoadArrayByUserId($this->intId) as $objBusinessChecklistResults) {
					$objBusinessChecklistResults->UserId = null;
					$objBusinessChecklistResults->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`business_checklist_results`
				SET
					`user_id` = null
				WHERE
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated BusinessChecklistResults
		 * @param BusinessChecklistResults $objBusinessChecklistResults
		 * @return void
		*/ 
		public function DeleteAssociatedBusinessChecklistResults(BusinessChecklistResults $objBusinessChecklistResults) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateBusinessChecklistResults on this unsaved User.');
			if ((is_null($objBusinessChecklistResults->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateBusinessChecklistResults on this User with an unsaved BusinessChecklistResults.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`business_checklist_results`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objBusinessChecklistResults->Id) . ' AND
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objBusinessChecklistResults->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated BusinessChecklistResultses
		 * @return void
		*/ 
		public function DeleteAllBusinessChecklistResultses() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateBusinessChecklistResults on this unsaved User.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (BusinessChecklistResults::LoadArrayByUserId($this->intId) as $objBusinessChecklistResults) {
					$objBusinessChecklistResults->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`business_checklist_results`
				WHERE
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for IntegrationAssessment
		//-------------------------------------------------------------------

		/**
		 * Gets all associated IntegrationAssessments as an array of IntegrationAssessment objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return IntegrationAssessment[]
		*/ 
		public function GetIntegrationAssessmentArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return IntegrationAssessment::LoadArrayByUserId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated IntegrationAssessments
		 * @return int
		*/ 
		public function CountIntegrationAssessments() {
			if ((is_null($this->intId)))
				return 0;

			return IntegrationAssessment::CountByUserId($this->intId);
		}

		/**
		 * Associates a IntegrationAssessment
		 * @param IntegrationAssessment $objIntegrationAssessment
		 * @return void
		*/ 
		public function AssociateIntegrationAssessment(IntegrationAssessment $objIntegrationAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateIntegrationAssessment on this unsaved User.');
			if ((is_null($objIntegrationAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateIntegrationAssessment on this User with an unsaved IntegrationAssessment.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`integration_assessment`
				SET
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objIntegrationAssessment->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objIntegrationAssessment->UserId = $this->intId;
				$objIntegrationAssessment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a IntegrationAssessment
		 * @param IntegrationAssessment $objIntegrationAssessment
		 * @return void
		*/ 
		public function UnassociateIntegrationAssessment(IntegrationAssessment $objIntegrationAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateIntegrationAssessment on this unsaved User.');
			if ((is_null($objIntegrationAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateIntegrationAssessment on this User with an unsaved IntegrationAssessment.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`integration_assessment`
				SET
					`user_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objIntegrationAssessment->Id) . ' AND
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objIntegrationAssessment->UserId = null;
				$objIntegrationAssessment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all IntegrationAssessments
		 * @return void
		*/ 
		public function UnassociateAllIntegrationAssessments() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateIntegrationAssessment on this unsaved User.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (IntegrationAssessment::LoadArrayByUserId($this->intId) as $objIntegrationAssessment) {
					$objIntegrationAssessment->UserId = null;
					$objIntegrationAssessment->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`integration_assessment`
				SET
					`user_id` = null
				WHERE
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated IntegrationAssessment
		 * @param IntegrationAssessment $objIntegrationAssessment
		 * @return void
		*/ 
		public function DeleteAssociatedIntegrationAssessment(IntegrationAssessment $objIntegrationAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateIntegrationAssessment on this unsaved User.');
			if ((is_null($objIntegrationAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateIntegrationAssessment on this User with an unsaved IntegrationAssessment.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`integration_assessment`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objIntegrationAssessment->Id) . ' AND
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objIntegrationAssessment->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated IntegrationAssessments
		 * @return void
		*/ 
		public function DeleteAllIntegrationAssessments() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateIntegrationAssessment on this unsaved User.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (IntegrationAssessment::LoadArrayByUserId($this->intId) as $objIntegrationAssessment) {
					$objIntegrationAssessment->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`integration_assessment`
				WHERE
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
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

			
		
		// Related Objects' Methods for Lemon50Assessment
		//-------------------------------------------------------------------

		/**
		 * Gets all associated Lemon50Assessments as an array of Lemon50Assessment objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return Lemon50Assessment[]
		*/ 
		public function GetLemon50AssessmentArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return Lemon50Assessment::LoadArrayByUserId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated Lemon50Assessments
		 * @return int
		*/ 
		public function CountLemon50Assessments() {
			if ((is_null($this->intId)))
				return 0;

			return Lemon50Assessment::CountByUserId($this->intId);
		}

		/**
		 * Associates a Lemon50Assessment
		 * @param Lemon50Assessment $objLemon50Assessment
		 * @return void
		*/ 
		public function AssociateLemon50Assessment(Lemon50Assessment $objLemon50Assessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateLemon50Assessment on this unsaved User.');
			if ((is_null($objLemon50Assessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateLemon50Assessment on this User with an unsaved Lemon50Assessment.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`lemon50_assessment`
				SET
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objLemon50Assessment->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objLemon50Assessment->UserId = $this->intId;
				$objLemon50Assessment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a Lemon50Assessment
		 * @param Lemon50Assessment $objLemon50Assessment
		 * @return void
		*/ 
		public function UnassociateLemon50Assessment(Lemon50Assessment $objLemon50Assessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLemon50Assessment on this unsaved User.');
			if ((is_null($objLemon50Assessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLemon50Assessment on this User with an unsaved Lemon50Assessment.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`lemon50_assessment`
				SET
					`user_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objLemon50Assessment->Id) . ' AND
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objLemon50Assessment->UserId = null;
				$objLemon50Assessment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all Lemon50Assessments
		 * @return void
		*/ 
		public function UnassociateAllLemon50Assessments() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLemon50Assessment on this unsaved User.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Lemon50Assessment::LoadArrayByUserId($this->intId) as $objLemon50Assessment) {
					$objLemon50Assessment->UserId = null;
					$objLemon50Assessment->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`lemon50_assessment`
				SET
					`user_id` = null
				WHERE
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated Lemon50Assessment
		 * @param Lemon50Assessment $objLemon50Assessment
		 * @return void
		*/ 
		public function DeleteAssociatedLemon50Assessment(Lemon50Assessment $objLemon50Assessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLemon50Assessment on this unsaved User.');
			if ((is_null($objLemon50Assessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLemon50Assessment on this User with an unsaved Lemon50Assessment.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`lemon50_assessment`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objLemon50Assessment->Id) . ' AND
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objLemon50Assessment->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated Lemon50Assessments
		 * @return void
		*/ 
		public function DeleteAllLemon50Assessments() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLemon50Assessment on this unsaved User.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (Lemon50Assessment::LoadArrayByUserId($this->intId) as $objLemon50Assessment) {
					$objLemon50Assessment->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`lemon50_assessment`
				WHERE
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
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

			
		
		// Related Objects' Methods for LemonloversAssessment
		//-------------------------------------------------------------------

		/**
		 * Gets all associated LemonloversAssessments as an array of LemonloversAssessment objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return LemonloversAssessment[]
		*/ 
		public function GetLemonloversAssessmentArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return LemonloversAssessment::LoadArrayByUserId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated LemonloversAssessments
		 * @return int
		*/ 
		public function CountLemonloversAssessments() {
			if ((is_null($this->intId)))
				return 0;

			return LemonloversAssessment::CountByUserId($this->intId);
		}

		/**
		 * Associates a LemonloversAssessment
		 * @param LemonloversAssessment $objLemonloversAssessment
		 * @return void
		*/ 
		public function AssociateLemonloversAssessment(LemonloversAssessment $objLemonloversAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateLemonloversAssessment on this unsaved User.');
			if ((is_null($objLemonloversAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateLemonloversAssessment on this User with an unsaved LemonloversAssessment.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`lemonlovers_assessment`
				SET
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objLemonloversAssessment->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objLemonloversAssessment->UserId = $this->intId;
				$objLemonloversAssessment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a LemonloversAssessment
		 * @param LemonloversAssessment $objLemonloversAssessment
		 * @return void
		*/ 
		public function UnassociateLemonloversAssessment(LemonloversAssessment $objLemonloversAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLemonloversAssessment on this unsaved User.');
			if ((is_null($objLemonloversAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLemonloversAssessment on this User with an unsaved LemonloversAssessment.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`lemonlovers_assessment`
				SET
					`user_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objLemonloversAssessment->Id) . ' AND
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objLemonloversAssessment->UserId = null;
				$objLemonloversAssessment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all LemonloversAssessments
		 * @return void
		*/ 
		public function UnassociateAllLemonloversAssessments() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLemonloversAssessment on this unsaved User.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (LemonloversAssessment::LoadArrayByUserId($this->intId) as $objLemonloversAssessment) {
					$objLemonloversAssessment->UserId = null;
					$objLemonloversAssessment->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`lemonlovers_assessment`
				SET
					`user_id` = null
				WHERE
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated LemonloversAssessment
		 * @param LemonloversAssessment $objLemonloversAssessment
		 * @return void
		*/ 
		public function DeleteAssociatedLemonloversAssessment(LemonloversAssessment $objLemonloversAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLemonloversAssessment on this unsaved User.');
			if ((is_null($objLemonloversAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLemonloversAssessment on this User with an unsaved LemonloversAssessment.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`lemonlovers_assessment`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objLemonloversAssessment->Id) . ' AND
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objLemonloversAssessment->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated LemonloversAssessments
		 * @return void
		*/ 
		public function DeleteAllLemonloversAssessments() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLemonloversAssessment on this unsaved User.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (LemonloversAssessment::LoadArrayByUserId($this->intId) as $objLemonloversAssessment) {
					$objLemonloversAssessment->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`lemonlovers_assessment`
				WHERE
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for LraAssessment
		//-------------------------------------------------------------------

		/**
		 * Gets all associated LraAssessments as an array of LraAssessment objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return LraAssessment[]
		*/ 
		public function GetLraAssessmentArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return LraAssessment::LoadArrayByUserId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated LraAssessments
		 * @return int
		*/ 
		public function CountLraAssessments() {
			if ((is_null($this->intId)))
				return 0;

			return LraAssessment::CountByUserId($this->intId);
		}

		/**
		 * Associates a LraAssessment
		 * @param LraAssessment $objLraAssessment
		 * @return void
		*/ 
		public function AssociateLraAssessment(LraAssessment $objLraAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateLraAssessment on this unsaved User.');
			if ((is_null($objLraAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateLraAssessment on this User with an unsaved LraAssessment.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`lra_assessment`
				SET
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objLraAssessment->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objLraAssessment->UserId = $this->intId;
				$objLraAssessment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a LraAssessment
		 * @param LraAssessment $objLraAssessment
		 * @return void
		*/ 
		public function UnassociateLraAssessment(LraAssessment $objLraAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLraAssessment on this unsaved User.');
			if ((is_null($objLraAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLraAssessment on this User with an unsaved LraAssessment.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`lra_assessment`
				SET
					`user_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objLraAssessment->Id) . ' AND
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objLraAssessment->UserId = null;
				$objLraAssessment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all LraAssessments
		 * @return void
		*/ 
		public function UnassociateAllLraAssessments() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLraAssessment on this unsaved User.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (LraAssessment::LoadArrayByUserId($this->intId) as $objLraAssessment) {
					$objLraAssessment->UserId = null;
					$objLraAssessment->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`lra_assessment`
				SET
					`user_id` = null
				WHERE
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated LraAssessment
		 * @param LraAssessment $objLraAssessment
		 * @return void
		*/ 
		public function DeleteAssociatedLraAssessment(LraAssessment $objLraAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLraAssessment on this unsaved User.');
			if ((is_null($objLraAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLraAssessment on this User with an unsaved LraAssessment.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`lra_assessment`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objLraAssessment->Id) . ' AND
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objLraAssessment->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated LraAssessments
		 * @return void
		*/ 
		public function DeleteAllLraAssessments() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateLraAssessment on this unsaved User.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (LraAssessment::LoadArrayByUserId($this->intId) as $objLraAssessment) {
					$objLraAssessment->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`lra_assessment`
				WHERE
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for PartneringAwarenessAssessment
		//-------------------------------------------------------------------

		/**
		 * Gets all associated PartneringAwarenessAssessments as an array of PartneringAwarenessAssessment objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PartneringAwarenessAssessment[]
		*/ 
		public function GetPartneringAwarenessAssessmentArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return PartneringAwarenessAssessment::LoadArrayByUserId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated PartneringAwarenessAssessments
		 * @return int
		*/ 
		public function CountPartneringAwarenessAssessments() {
			if ((is_null($this->intId)))
				return 0;

			return PartneringAwarenessAssessment::CountByUserId($this->intId);
		}

		/**
		 * Associates a PartneringAwarenessAssessment
		 * @param PartneringAwarenessAssessment $objPartneringAwarenessAssessment
		 * @return void
		*/ 
		public function AssociatePartneringAwarenessAssessment(PartneringAwarenessAssessment $objPartneringAwarenessAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePartneringAwarenessAssessment on this unsaved User.');
			if ((is_null($objPartneringAwarenessAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePartneringAwarenessAssessment on this User with an unsaved PartneringAwarenessAssessment.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`partnering_awareness_assessment`
				SET
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPartneringAwarenessAssessment->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objPartneringAwarenessAssessment->UserId = $this->intId;
				$objPartneringAwarenessAssessment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a PartneringAwarenessAssessment
		 * @param PartneringAwarenessAssessment $objPartneringAwarenessAssessment
		 * @return void
		*/ 
		public function UnassociatePartneringAwarenessAssessment(PartneringAwarenessAssessment $objPartneringAwarenessAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePartneringAwarenessAssessment on this unsaved User.');
			if ((is_null($objPartneringAwarenessAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePartneringAwarenessAssessment on this User with an unsaved PartneringAwarenessAssessment.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`partnering_awareness_assessment`
				SET
					`user_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPartneringAwarenessAssessment->Id) . ' AND
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objPartneringAwarenessAssessment->UserId = null;
				$objPartneringAwarenessAssessment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all PartneringAwarenessAssessments
		 * @return void
		*/ 
		public function UnassociateAllPartneringAwarenessAssessments() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePartneringAwarenessAssessment on this unsaved User.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (PartneringAwarenessAssessment::LoadArrayByUserId($this->intId) as $objPartneringAwarenessAssessment) {
					$objPartneringAwarenessAssessment->UserId = null;
					$objPartneringAwarenessAssessment->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`partnering_awareness_assessment`
				SET
					`user_id` = null
				WHERE
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated PartneringAwarenessAssessment
		 * @param PartneringAwarenessAssessment $objPartneringAwarenessAssessment
		 * @return void
		*/ 
		public function DeleteAssociatedPartneringAwarenessAssessment(PartneringAwarenessAssessment $objPartneringAwarenessAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePartneringAwarenessAssessment on this unsaved User.');
			if ((is_null($objPartneringAwarenessAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePartneringAwarenessAssessment on this User with an unsaved PartneringAwarenessAssessment.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`partnering_awareness_assessment`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPartneringAwarenessAssessment->Id) . ' AND
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objPartneringAwarenessAssessment->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated PartneringAwarenessAssessments
		 * @return void
		*/ 
		public function DeleteAllPartneringAwarenessAssessments() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePartneringAwarenessAssessment on this unsaved User.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (PartneringAwarenessAssessment::LoadArrayByUserId($this->intId) as $objPartneringAwarenessAssessment) {
					$objPartneringAwarenessAssessment->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`partnering_awareness_assessment`
				WHERE
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for PartneringReadinessAssessment
		//-------------------------------------------------------------------

		/**
		 * Gets all associated PartneringReadinessAssessments as an array of PartneringReadinessAssessment objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PartneringReadinessAssessment[]
		*/ 
		public function GetPartneringReadinessAssessmentArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return PartneringReadinessAssessment::LoadArrayByUserId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated PartneringReadinessAssessments
		 * @return int
		*/ 
		public function CountPartneringReadinessAssessments() {
			if ((is_null($this->intId)))
				return 0;

			return PartneringReadinessAssessment::CountByUserId($this->intId);
		}

		/**
		 * Associates a PartneringReadinessAssessment
		 * @param PartneringReadinessAssessment $objPartneringReadinessAssessment
		 * @return void
		*/ 
		public function AssociatePartneringReadinessAssessment(PartneringReadinessAssessment $objPartneringReadinessAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePartneringReadinessAssessment on this unsaved User.');
			if ((is_null($objPartneringReadinessAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePartneringReadinessAssessment on this User with an unsaved PartneringReadinessAssessment.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`partnering_readiness_assessment`
				SET
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPartneringReadinessAssessment->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objPartneringReadinessAssessment->UserId = $this->intId;
				$objPartneringReadinessAssessment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a PartneringReadinessAssessment
		 * @param PartneringReadinessAssessment $objPartneringReadinessAssessment
		 * @return void
		*/ 
		public function UnassociatePartneringReadinessAssessment(PartneringReadinessAssessment $objPartneringReadinessAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePartneringReadinessAssessment on this unsaved User.');
			if ((is_null($objPartneringReadinessAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePartneringReadinessAssessment on this User with an unsaved PartneringReadinessAssessment.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`partnering_readiness_assessment`
				SET
					`user_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPartneringReadinessAssessment->Id) . ' AND
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objPartneringReadinessAssessment->UserId = null;
				$objPartneringReadinessAssessment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all PartneringReadinessAssessments
		 * @return void
		*/ 
		public function UnassociateAllPartneringReadinessAssessments() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePartneringReadinessAssessment on this unsaved User.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (PartneringReadinessAssessment::LoadArrayByUserId($this->intId) as $objPartneringReadinessAssessment) {
					$objPartneringReadinessAssessment->UserId = null;
					$objPartneringReadinessAssessment->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`partnering_readiness_assessment`
				SET
					`user_id` = null
				WHERE
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated PartneringReadinessAssessment
		 * @param PartneringReadinessAssessment $objPartneringReadinessAssessment
		 * @return void
		*/ 
		public function DeleteAssociatedPartneringReadinessAssessment(PartneringReadinessAssessment $objPartneringReadinessAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePartneringReadinessAssessment on this unsaved User.');
			if ((is_null($objPartneringReadinessAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePartneringReadinessAssessment on this User with an unsaved PartneringReadinessAssessment.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`partnering_readiness_assessment`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPartneringReadinessAssessment->Id) . ' AND
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objPartneringReadinessAssessment->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated PartneringReadinessAssessments
		 * @return void
		*/ 
		public function DeleteAllPartneringReadinessAssessments() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePartneringReadinessAssessment on this unsaved User.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (PartneringReadinessAssessment::LoadArrayByUserId($this->intId) as $objPartneringReadinessAssessment) {
					$objPartneringReadinessAssessment->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`partnering_readiness_assessment`
				WHERE
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for PostventureAssessment
		//-------------------------------------------------------------------

		/**
		 * Gets all associated PostventureAssessments as an array of PostventureAssessment objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return PostventureAssessment[]
		*/ 
		public function GetPostventureAssessmentArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return PostventureAssessment::LoadArrayByUserId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated PostventureAssessments
		 * @return int
		*/ 
		public function CountPostventureAssessments() {
			if ((is_null($this->intId)))
				return 0;

			return PostventureAssessment::CountByUserId($this->intId);
		}

		/**
		 * Associates a PostventureAssessment
		 * @param PostventureAssessment $objPostventureAssessment
		 * @return void
		*/ 
		public function AssociatePostventureAssessment(PostventureAssessment $objPostventureAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePostventureAssessment on this unsaved User.');
			if ((is_null($objPostventureAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociatePostventureAssessment on this User with an unsaved PostventureAssessment.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`postventure_assessment`
				SET
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPostventureAssessment->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objPostventureAssessment->UserId = $this->intId;
				$objPostventureAssessment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a PostventureAssessment
		 * @param PostventureAssessment $objPostventureAssessment
		 * @return void
		*/ 
		public function UnassociatePostventureAssessment(PostventureAssessment $objPostventureAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePostventureAssessment on this unsaved User.');
			if ((is_null($objPostventureAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePostventureAssessment on this User with an unsaved PostventureAssessment.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`postventure_assessment`
				SET
					`user_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPostventureAssessment->Id) . ' AND
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objPostventureAssessment->UserId = null;
				$objPostventureAssessment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all PostventureAssessments
		 * @return void
		*/ 
		public function UnassociateAllPostventureAssessments() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePostventureAssessment on this unsaved User.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (PostventureAssessment::LoadArrayByUserId($this->intId) as $objPostventureAssessment) {
					$objPostventureAssessment->UserId = null;
					$objPostventureAssessment->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`postventure_assessment`
				SET
					`user_id` = null
				WHERE
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated PostventureAssessment
		 * @param PostventureAssessment $objPostventureAssessment
		 * @return void
		*/ 
		public function DeleteAssociatedPostventureAssessment(PostventureAssessment $objPostventureAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePostventureAssessment on this unsaved User.');
			if ((is_null($objPostventureAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePostventureAssessment on this User with an unsaved PostventureAssessment.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`postventure_assessment`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objPostventureAssessment->Id) . ' AND
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objPostventureAssessment->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated PostventureAssessments
		 * @return void
		*/ 
		public function DeleteAllPostventureAssessments() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociatePostventureAssessment on this unsaved User.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (PostventureAssessment::LoadArrayByUserId($this->intId) as $objPostventureAssessment) {
					$objPostventureAssessment->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`postventure_assessment`
				WHERE
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for SeasonalAssessment
		//-------------------------------------------------------------------

		/**
		 * Gets all associated SeasonalAssessments as an array of SeasonalAssessment objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return SeasonalAssessment[]
		*/ 
		public function GetSeasonalAssessmentArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return SeasonalAssessment::LoadArrayByUserId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated SeasonalAssessments
		 * @return int
		*/ 
		public function CountSeasonalAssessments() {
			if ((is_null($this->intId)))
				return 0;

			return SeasonalAssessment::CountByUserId($this->intId);
		}

		/**
		 * Associates a SeasonalAssessment
		 * @param SeasonalAssessment $objSeasonalAssessment
		 * @return void
		*/ 
		public function AssociateSeasonalAssessment(SeasonalAssessment $objSeasonalAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateSeasonalAssessment on this unsaved User.');
			if ((is_null($objSeasonalAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateSeasonalAssessment on this User with an unsaved SeasonalAssessment.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`seasonal_assessment`
				SET
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objSeasonalAssessment->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objSeasonalAssessment->UserId = $this->intId;
				$objSeasonalAssessment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a SeasonalAssessment
		 * @param SeasonalAssessment $objSeasonalAssessment
		 * @return void
		*/ 
		public function UnassociateSeasonalAssessment(SeasonalAssessment $objSeasonalAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSeasonalAssessment on this unsaved User.');
			if ((is_null($objSeasonalAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSeasonalAssessment on this User with an unsaved SeasonalAssessment.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`seasonal_assessment`
				SET
					`user_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objSeasonalAssessment->Id) . ' AND
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objSeasonalAssessment->UserId = null;
				$objSeasonalAssessment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all SeasonalAssessments
		 * @return void
		*/ 
		public function UnassociateAllSeasonalAssessments() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSeasonalAssessment on this unsaved User.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (SeasonalAssessment::LoadArrayByUserId($this->intId) as $objSeasonalAssessment) {
					$objSeasonalAssessment->UserId = null;
					$objSeasonalAssessment->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`seasonal_assessment`
				SET
					`user_id` = null
				WHERE
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated SeasonalAssessment
		 * @param SeasonalAssessment $objSeasonalAssessment
		 * @return void
		*/ 
		public function DeleteAssociatedSeasonalAssessment(SeasonalAssessment $objSeasonalAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSeasonalAssessment on this unsaved User.');
			if ((is_null($objSeasonalAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSeasonalAssessment on this User with an unsaved SeasonalAssessment.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`seasonal_assessment`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objSeasonalAssessment->Id) . ' AND
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objSeasonalAssessment->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated SeasonalAssessments
		 * @return void
		*/ 
		public function DeleteAllSeasonalAssessments() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateSeasonalAssessment on this unsaved User.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (SeasonalAssessment::LoadArrayByUserId($this->intId) as $objSeasonalAssessment) {
					$objSeasonalAssessment->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`seasonal_assessment`
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

			
		
		// Related Objects' Methods for TimeAssessment
		//-------------------------------------------------------------------

		/**
		 * Gets all associated TimeAssessments as an array of TimeAssessment objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return TimeAssessment[]
		*/ 
		public function GetTimeAssessmentArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return TimeAssessment::LoadArrayByUserId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated TimeAssessments
		 * @return int
		*/ 
		public function CountTimeAssessments() {
			if ((is_null($this->intId)))
				return 0;

			return TimeAssessment::CountByUserId($this->intId);
		}

		/**
		 * Associates a TimeAssessment
		 * @param TimeAssessment $objTimeAssessment
		 * @return void
		*/ 
		public function AssociateTimeAssessment(TimeAssessment $objTimeAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateTimeAssessment on this unsaved User.');
			if ((is_null($objTimeAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateTimeAssessment on this User with an unsaved TimeAssessment.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`time_assessment`
				SET
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objTimeAssessment->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objTimeAssessment->UserId = $this->intId;
				$objTimeAssessment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a TimeAssessment
		 * @param TimeAssessment $objTimeAssessment
		 * @return void
		*/ 
		public function UnassociateTimeAssessment(TimeAssessment $objTimeAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTimeAssessment on this unsaved User.');
			if ((is_null($objTimeAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTimeAssessment on this User with an unsaved TimeAssessment.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`time_assessment`
				SET
					`user_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objTimeAssessment->Id) . ' AND
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objTimeAssessment->UserId = null;
				$objTimeAssessment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all TimeAssessments
		 * @return void
		*/ 
		public function UnassociateAllTimeAssessments() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTimeAssessment on this unsaved User.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (TimeAssessment::LoadArrayByUserId($this->intId) as $objTimeAssessment) {
					$objTimeAssessment->UserId = null;
					$objTimeAssessment->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`time_assessment`
				SET
					`user_id` = null
				WHERE
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated TimeAssessment
		 * @param TimeAssessment $objTimeAssessment
		 * @return void
		*/ 
		public function DeleteAssociatedTimeAssessment(TimeAssessment $objTimeAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTimeAssessment on this unsaved User.');
			if ((is_null($objTimeAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTimeAssessment on this User with an unsaved TimeAssessment.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`time_assessment`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objTimeAssessment->Id) . ' AND
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objTimeAssessment->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated TimeAssessments
		 * @return void
		*/ 
		public function DeleteAllTimeAssessments() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateTimeAssessment on this unsaved User.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (TimeAssessment::LoadArrayByUserId($this->intId) as $objTimeAssessment) {
					$objTimeAssessment->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`time_assessment`
				WHERE
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		
		// Related Objects' Methods for UpwardAssessment
		//-------------------------------------------------------------------

		/**
		 * Gets all associated UpwardAssessments as an array of UpwardAssessment objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return UpwardAssessment[]
		*/ 
		public function GetUpwardAssessmentArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return UpwardAssessment::LoadArrayByUserId($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all associated UpwardAssessments
		 * @return int
		*/ 
		public function CountUpwardAssessments() {
			if ((is_null($this->intId)))
				return 0;

			return UpwardAssessment::CountByUserId($this->intId);
		}

		/**
		 * Associates a UpwardAssessment
		 * @param UpwardAssessment $objUpwardAssessment
		 * @return void
		*/ 
		public function AssociateUpwardAssessment(UpwardAssessment $objUpwardAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateUpwardAssessment on this unsaved User.');
			if ((is_null($objUpwardAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateUpwardAssessment on this User with an unsaved UpwardAssessment.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`upward_assessment`
				SET
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objUpwardAssessment->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objUpwardAssessment->UserId = $this->intId;
				$objUpwardAssessment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates a UpwardAssessment
		 * @param UpwardAssessment $objUpwardAssessment
		 * @return void
		*/ 
		public function UnassociateUpwardAssessment(UpwardAssessment $objUpwardAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUpwardAssessment on this unsaved User.');
			if ((is_null($objUpwardAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUpwardAssessment on this User with an unsaved UpwardAssessment.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`upward_assessment`
				SET
					`user_id` = null
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objUpwardAssessment->Id) . ' AND
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objUpwardAssessment->UserId = null;
				$objUpwardAssessment->Journal('UPDATE');
			}
		}

		/**
		 * Unassociates all UpwardAssessments
		 * @return void
		*/ 
		public function UnassociateAllUpwardAssessments() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUpwardAssessment on this unsaved User.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (UpwardAssessment::LoadArrayByUserId($this->intId) as $objUpwardAssessment) {
					$objUpwardAssessment->UserId = null;
					$objUpwardAssessment->Journal('UPDATE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				UPDATE
					`upward_assessment`
				SET
					`user_id` = null
				WHERE
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

		/**
		 * Deletes an associated UpwardAssessment
		 * @param UpwardAssessment $objUpwardAssessment
		 * @return void
		*/ 
		public function DeleteAssociatedUpwardAssessment(UpwardAssessment $objUpwardAssessment) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUpwardAssessment on this unsaved User.');
			if ((is_null($objUpwardAssessment->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUpwardAssessment on this User with an unsaved UpwardAssessment.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`upward_assessment`
				WHERE
					`id` = ' . $objDatabase->SqlVariable($objUpwardAssessment->Id) . ' AND
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				$objUpwardAssessment->Journal('DELETE');
			}
		}

		/**
		 * Deletes all associated UpwardAssessments
		 * @return void
		*/ 
		public function DeleteAllUpwardAssessments() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateUpwardAssessment on this unsaved User.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Journaling
			if ($objDatabase->JournalingDatabase) {
				foreach (UpwardAssessment::LoadArrayByUserId($this->intId) as $objUpwardAssessment) {
					$objUpwardAssessment->Journal('DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`upward_assessment`
				WHERE
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}

			
		// Related Many-to-Many Objects' Methods for GroupAssessmentListAsAssessmentManager
		//-------------------------------------------------------------------

		/**
		 * Gets all many-to-many associated GroupAssessmentListsAsAssessmentManager as an array of GroupAssessmentList objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return GroupAssessmentList[]
		*/ 
		public function GetGroupAssessmentListAsAssessmentManagerArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return GroupAssessmentList::LoadArrayByUserAsAssessmentManager($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all many-to-many associated GroupAssessmentListsAsAssessmentManager
		 * @return int
		*/ 
		public function CountGroupAssessmentListsAsAssessmentManager() {
			if ((is_null($this->intId)))
				return 0;

			return GroupAssessmentList::CountByUserAsAssessmentManager($this->intId);
		}

		/**
		 * Checks to see if an association exists with a specific GroupAssessmentListAsAssessmentManager
		 * @param GroupAssessmentList $objGroupAssessmentList
		 * @return bool
		*/
		public function IsGroupAssessmentListAsAssessmentManagerAssociated(GroupAssessmentList $objGroupAssessmentList) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsGroupAssessmentListAsAssessmentManagerAssociated on this unsaved User.');
			if ((is_null($objGroupAssessmentList->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsGroupAssessmentListAsAssessmentManagerAssociated on this User with an unsaved GroupAssessmentList.');

			$intRowCount = User::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::User()->Id, $this->intId),
					QQ::Equal(QQN::User()->GroupAssessmentListAsAssessmentManager->GroupAssessmentId, $objGroupAssessmentList->Id)
				)
			);

			return ($intRowCount > 0);
		}

		/**
		 * Journals the GroupAssessmentListAsAssessmentManager relationship into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function JournalGroupAssessmentListAsAssessmentManagerAssociation($intAssociatedId, $strJournalCommand) {
			$objDatabase = User::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `assessment_manager_assn` (
					`user_id`,
					`group_assessment_id`,
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
		 * Gets the historical journal for an object's GroupAssessmentListAsAssessmentManager relationship from the log database.
		 * @param integer intId
		 * @return QDatabaseResult $objResult
		 */
		public static function GetJournalGroupAssessmentListAsAssessmentManagerAssociationForId($intId) {
			$objDatabase = User::GetDatabase()->JournalingDatabase;

			return $objDatabase->Query('SELECT * FROM assessment_manager_assn WHERE user_id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');
		}

		/**
		 * Gets the historical journal for this object's GroupAssessmentListAsAssessmentManager relationship from the log database.
		 * @return QDatabaseResult $objResult
		 */
		public function GetJournalGroupAssessmentListAsAssessmentManagerAssociation() {
			return User::GetJournalGroupAssessmentListAsAssessmentManagerAssociationForId($this->intId);
		}

		/**
		 * Associates a GroupAssessmentListAsAssessmentManager
		 * @param GroupAssessmentList $objGroupAssessmentList
		 * @return void
		*/ 
		public function AssociateGroupAssessmentListAsAssessmentManager(GroupAssessmentList $objGroupAssessmentList) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGroupAssessmentListAsAssessmentManager on this unsaved User.');
			if ((is_null($objGroupAssessmentList->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateGroupAssessmentListAsAssessmentManager on this User with an unsaved GroupAssessmentList.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				INSERT INTO `assessment_manager_assn` (
					`user_id`,
					`group_assessment_id`
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($objGroupAssessmentList->Id) . '
				)
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase)
				$this->JournalGroupAssessmentListAsAssessmentManagerAssociation($objGroupAssessmentList->Id, 'INSERT');
		}

		/**
		 * Unassociates a GroupAssessmentListAsAssessmentManager
		 * @param GroupAssessmentList $objGroupAssessmentList
		 * @return void
		*/ 
		public function UnassociateGroupAssessmentListAsAssessmentManager(GroupAssessmentList $objGroupAssessmentList) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGroupAssessmentListAsAssessmentManager on this unsaved User.');
			if ((is_null($objGroupAssessmentList->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateGroupAssessmentListAsAssessmentManager on this User with an unsaved GroupAssessmentList.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`assessment_manager_assn`
				WHERE
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . ' AND
					`group_assessment_id` = ' . $objDatabase->SqlVariable($objGroupAssessmentList->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase)
				$this->JournalGroupAssessmentListAsAssessmentManagerAssociation($objGroupAssessmentList->Id, 'DELETE');
		}

		/**
		 * Unassociates all GroupAssessmentListsAsAssessmentManager
		 * @return void
		*/ 
		public function UnassociateAllGroupAssessmentListsAsAssessmentManager() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAllGroupAssessmentListAsAssessmentManagerArray on this unsaved User.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objResult = $objDatabase->Query('SELECT `group_assessment_id` AS associated_id FROM `assessment_manager_assn` WHERE `user_id` = ' . $objDatabase->SqlVariable($this->intId));
				while ($objRow = $objResult->GetNextRow()) {
					$this->JournalGroupAssessmentListAsAssessmentManagerAssociation($objRow->GetColumn('associated_id'), 'DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`assessment_manager_assn`
				WHERE
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . '
			');
		}
			
		// Related Many-to-Many Objects' Methods for BusinessChecklistAsManager
		//-------------------------------------------------------------------

		/**
		 * Gets all many-to-many associated BusinessChecklistsAsManager as an array of BusinessChecklist objects
		 * @param QQClause[] $objOptionalClauses additional optional QQClause objects for this query
		 * @return BusinessChecklist[]
		*/ 
		public function GetBusinessChecklistAsManagerArray($objOptionalClauses = null) {
			if ((is_null($this->intId)))
				return array();

			try {
				return BusinessChecklist::LoadArrayByUserAsManager($this->intId, $objOptionalClauses);
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * Counts all many-to-many associated BusinessChecklistsAsManager
		 * @return int
		*/ 
		public function CountBusinessChecklistsAsManager() {
			if ((is_null($this->intId)))
				return 0;

			return BusinessChecklist::CountByUserAsManager($this->intId);
		}

		/**
		 * Checks to see if an association exists with a specific BusinessChecklistAsManager
		 * @param BusinessChecklist $objBusinessChecklist
		 * @return bool
		*/
		public function IsBusinessChecklistAsManagerAssociated(BusinessChecklist $objBusinessChecklist) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsBusinessChecklistAsManagerAssociated on this unsaved User.');
			if ((is_null($objBusinessChecklist->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call IsBusinessChecklistAsManagerAssociated on this User with an unsaved BusinessChecklist.');

			$intRowCount = User::QueryCount(
				QQ::AndCondition(
					QQ::Equal(QQN::User()->Id, $this->intId),
					QQ::Equal(QQN::User()->BusinessChecklistAsManager->BusinessChecklistId, $objBusinessChecklist->Id)
				)
			);

			return ($intRowCount > 0);
		}

		/**
		 * Journals the BusinessChecklistAsManager relationship into the Log database.
		 * Used internally as a helper method.
		 * @param string $strJournalCommand
		 */
		public function JournalBusinessChecklistAsManagerAssociation($intAssociatedId, $strJournalCommand) {
			$objDatabase = User::GetDatabase()->JournalingDatabase;

			$objDatabase->NonQuery('
				INSERT INTO `businesschecklist_manager_assn` (
					`user_id`,
					`business_checklist_id`,
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
		 * Gets the historical journal for an object's BusinessChecklistAsManager relationship from the log database.
		 * @param integer intId
		 * @return QDatabaseResult $objResult
		 */
		public static function GetJournalBusinessChecklistAsManagerAssociationForId($intId) {
			$objDatabase = User::GetDatabase()->JournalingDatabase;

			return $objDatabase->Query('SELECT * FROM businesschecklist_manager_assn WHERE user_id = ' .
				$objDatabase->SqlVariable($intId) . ' ORDER BY __sys_date');
		}

		/**
		 * Gets the historical journal for this object's BusinessChecklistAsManager relationship from the log database.
		 * @return QDatabaseResult $objResult
		 */
		public function GetJournalBusinessChecklistAsManagerAssociation() {
			return User::GetJournalBusinessChecklistAsManagerAssociationForId($this->intId);
		}

		/**
		 * Associates a BusinessChecklistAsManager
		 * @param BusinessChecklist $objBusinessChecklist
		 * @return void
		*/ 
		public function AssociateBusinessChecklistAsManager(BusinessChecklist $objBusinessChecklist) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateBusinessChecklistAsManager on this unsaved User.');
			if ((is_null($objBusinessChecklist->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call AssociateBusinessChecklistAsManager on this User with an unsaved BusinessChecklist.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				INSERT INTO `businesschecklist_manager_assn` (
					`user_id`,
					`business_checklist_id`
				) VALUES (
					' . $objDatabase->SqlVariable($this->intId) . ',
					' . $objDatabase->SqlVariable($objBusinessChecklist->Id) . '
				)
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase)
				$this->JournalBusinessChecklistAsManagerAssociation($objBusinessChecklist->Id, 'INSERT');
		}

		/**
		 * Unassociates a BusinessChecklistAsManager
		 * @param BusinessChecklist $objBusinessChecklist
		 * @return void
		*/ 
		public function UnassociateBusinessChecklistAsManager(BusinessChecklist $objBusinessChecklist) {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateBusinessChecklistAsManager on this unsaved User.');
			if ((is_null($objBusinessChecklist->Id)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateBusinessChecklistAsManager on this User with an unsaved BusinessChecklist.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`businesschecklist_manager_assn`
				WHERE
					`user_id` = ' . $objDatabase->SqlVariable($this->intId) . ' AND
					`business_checklist_id` = ' . $objDatabase->SqlVariable($objBusinessChecklist->Id) . '
			');

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase)
				$this->JournalBusinessChecklistAsManagerAssociation($objBusinessChecklist->Id, 'DELETE');
		}

		/**
		 * Unassociates all BusinessChecklistsAsManager
		 * @return void
		*/ 
		public function UnassociateAllBusinessChecklistsAsManager() {
			if ((is_null($this->intId)))
				throw new QUndefinedPrimaryKeyException('Unable to call UnassociateAllBusinessChecklistAsManagerArray on this unsaved User.');

			// Get the Database Object for this Class
			$objDatabase = User::GetDatabase();

			// Journaling (if applicable)
			if ($objDatabase->JournalingDatabase) {
				$objResult = $objDatabase->Query('SELECT `business_checklist_id` AS associated_id FROM `businesschecklist_manager_assn` WHERE `user_id` = ' . $objDatabase->SqlVariable($this->intId));
				while ($objRow = $objResult->GetNextRow()) {
					$this->JournalBusinessChecklistAsManagerAssociation($objRow->GetColumn('associated_id'), 'DELETE');
				}
			}

			// Perform the SQL Query
			$objDatabase->NonQuery('
				DELETE FROM
					`businesschecklist_manager_assn`
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
			$strToReturn .= '<element name="Country" type="xsd1:CountryList"/>';
			$strToReturn .= '<element name="Department" type="xsd:string"/>';
			$strToReturn .= '<element name="Title" type="xsd1:TitleList"/>';
			$strToReturn .= '<element name="Tenure" type="xsd1:TenureList"/>';
			$strToReturn .= '<element name="CareerLength" type="xsd:int"/>';
			$strToReturn .= '<element name="OptIn" type="xsd:boolean"/>';
			$strToReturn .= '<element name="__blnRestored" type="xsd:boolean"/>';
			$strToReturn .= '</sequence></complexType>';
			return $strToReturn;
		}

		public static function AlterSoapComplexTypeArray(&$strComplexTypeArray) {
			if (!array_key_exists('User', $strComplexTypeArray)) {
				$strComplexTypeArray['User'] = User::GetSoapComplexTypeXml();
				Login::AlterSoapComplexTypeArray($strComplexTypeArray);
				CountryList::AlterSoapComplexTypeArray($strComplexTypeArray);
				TitleList::AlterSoapComplexTypeArray($strComplexTypeArray);
				TenureList::AlterSoapComplexTypeArray($strComplexTypeArray);
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
			if ((property_exists($objSoapObject, 'Country')) &&
				($objSoapObject->Country))
				$objToReturn->Country = CountryList::GetObjectFromSoapObject($objSoapObject->Country);
			if (property_exists($objSoapObject, 'Department'))
				$objToReturn->strDepartment = $objSoapObject->Department;
			if ((property_exists($objSoapObject, 'Title')) &&
				($objSoapObject->Title))
				$objToReturn->Title = TitleList::GetObjectFromSoapObject($objSoapObject->Title);
			if ((property_exists($objSoapObject, 'Tenure')) &&
				($objSoapObject->Tenure))
				$objToReturn->Tenure = TenureList::GetObjectFromSoapObject($objSoapObject->Tenure);
			if (property_exists($objSoapObject, 'CareerLength'))
				$objToReturn->intCareerLength = $objSoapObject->CareerLength;
			if (property_exists($objSoapObject, 'OptIn'))
				$objToReturn->blnOptIn = $objSoapObject->OptIn;
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
			if ($objObject->objCountry)
				$objObject->objCountry = CountryList::GetSoapObjectFromObject($objObject->objCountry, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intCountryId = null;
			if ($objObject->objTitle)
				$objObject->objTitle = TitleList::GetSoapObjectFromObject($objObject->objTitle, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intTitleId = null;
			if ($objObject->objTenure)
				$objObject->objTenure = TenureList::GetSoapObjectFromObject($objObject->objTenure, false);
			else if (!$blnBindRelatedObjects)
				$objObject->intTenureId = null;
			return $objObject;
		}




	}



	/////////////////////////////////////
	// ADDITIONAL CLASSES for QCODO QUERY
	/////////////////////////////////////

	/**
	 * @property-read QQNode $GroupAssessmentId
	 * @property-read QQNodeGroupAssessmentList $GroupAssessmentList
	 * @property-read QQNodeGroupAssessmentList $_ChildTableNode
	 */
	class QQNodeUserGroupAssessmentListAsAssessmentManager extends QQAssociationNode {
		protected $strType = 'association';
		protected $strName = 'groupassessmentlistasassessmentmanager';

		protected $strTableName = 'assessment_manager_assn';
		protected $strPrimaryKey = 'user_id';
		protected $strClassName = 'GroupAssessmentList';

		public function __get($strName) {
			switch ($strName) {
				case 'GroupAssessmentId':
					return new QQNode('group_assessment_id', 'GroupAssessmentId', 'integer', $this);
				case 'GroupAssessmentList':
					return new QQNodeGroupAssessmentList('group_assessment_id', 'GroupAssessmentId', 'integer', $this);
				case '_ChildTableNode':
					return new QQNodeGroupAssessmentList('group_assessment_id', 'GroupAssessmentId', 'integer', $this);
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
	 * @property-read QQNode $BusinessChecklistId
	 * @property-read QQNodeBusinessChecklist $BusinessChecklist
	 * @property-read QQNodeBusinessChecklist $_ChildTableNode
	 */
	class QQNodeUserBusinessChecklistAsManager extends QQAssociationNode {
		protected $strType = 'association';
		protected $strName = 'businesschecklistasmanager';

		protected $strTableName = 'businesschecklist_manager_assn';
		protected $strPrimaryKey = 'user_id';
		protected $strClassName = 'BusinessChecklist';

		public function __get($strName) {
			switch ($strName) {
				case 'BusinessChecklistId':
					return new QQNode('business_checklist_id', 'BusinessChecklistId', 'integer', $this);
				case 'BusinessChecklist':
					return new QQNodeBusinessChecklist('business_checklist_id', 'BusinessChecklistId', 'integer', $this);
				case '_ChildTableNode':
					return new QQNodeBusinessChecklist('business_checklist_id', 'BusinessChecklistId', 'integer', $this);
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
	 * @property-read QQNode $CountryId
	 * @property-read QQNodeCountryList $Country
	 * @property-read QQNode $Department
	 * @property-read QQNode $TitleId
	 * @property-read QQNodeTitleList $Title
	 * @property-read QQNode $TenureId
	 * @property-read QQNodeTenureList $Tenure
	 * @property-read QQNode $CareerLength
	 * @property-read QQNode $OptIn
	 * @property-read QQNodeUserGroupAssessmentListAsAssessmentManager $GroupAssessmentListAsAssessmentManager
	 * @property-read QQNodeUserBusinessChecklistAsManager $BusinessChecklistAsManager
	 * @property-read QQNodeUserCompany $Company
	 * @property-read QQNodeUserResource $Resource
	 * @property-read QQNodeUserScorecard $Scorecard
	 * @property-read QQReverseReferenceNodeActionItems $ActionItemsAsModifiedBy
	 * @property-read QQReverseReferenceNodeActionItems $ActionItemsAsWho
	 * @property-read QQReverseReferenceNodeBusinessChecklistResults $BusinessChecklistResults
	 * @property-read QQReverseReferenceNodeIntegrationAssessment $IntegrationAssessment
	 * @property-read QQReverseReferenceNodeKingdomBusinessAssessment $KingdomBusinessAssessment
	 * @property-read QQReverseReferenceNodeKpis $KpisAsModifiedBy
	 * @property-read QQReverseReferenceNodeLemon50Assessment $Lemon50Assessment
	 * @property-read QQReverseReferenceNodeLemonAssessment $LemonAssessment
	 * @property-read QQReverseReferenceNodeLemonloversAssessment $LemonloversAssessment
	 * @property-read QQReverseReferenceNodeLraAssessment $LraAssessment
	 * @property-read QQReverseReferenceNodePartneringAwarenessAssessment $PartneringAwarenessAssessment
	 * @property-read QQReverseReferenceNodePartneringReadinessAssessment $PartneringReadinessAssessment
	 * @property-read QQReverseReferenceNodePostventureAssessment $PostventureAssessment
	 * @property-read QQReverseReferenceNodeSeasonalAssessment $SeasonalAssessment
	 * @property-read QQReverseReferenceNodeStatement $StatementAsModifiedBy
	 * @property-read QQReverseReferenceNodeStrategy $StrategyAsModifiedBy
	 * @property-read QQReverseReferenceNodeTenFAssessment $TenFAssessment
	 * @property-read QQReverseReferenceNodeTenPAssessment $TenPAssessment
	 * @property-read QQReverseReferenceNodeTimeAssessment $TimeAssessment
	 * @property-read QQReverseReferenceNodeUpwardAssessment $UpwardAssessment
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
				case 'CountryId':
					return new QQNode('country_id', 'CountryId', 'integer', $this);
				case 'Country':
					return new QQNodeCountryList('country_id', 'Country', 'integer', $this);
				case 'Department':
					return new QQNode('department', 'Department', 'string', $this);
				case 'TitleId':
					return new QQNode('title_id', 'TitleId', 'integer', $this);
				case 'Title':
					return new QQNodeTitleList('title_id', 'Title', 'integer', $this);
				case 'TenureId':
					return new QQNode('tenure_id', 'TenureId', 'integer', $this);
				case 'Tenure':
					return new QQNodeTenureList('tenure_id', 'Tenure', 'integer', $this);
				case 'CareerLength':
					return new QQNode('career_length', 'CareerLength', 'integer', $this);
				case 'OptIn':
					return new QQNode('opt_in', 'OptIn', 'boolean', $this);
				case 'GroupAssessmentListAsAssessmentManager':
					return new QQNodeUserGroupAssessmentListAsAssessmentManager($this);
				case 'BusinessChecklistAsManager':
					return new QQNodeUserBusinessChecklistAsManager($this);
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
				case 'BusinessChecklistResults':
					return new QQReverseReferenceNodeBusinessChecklistResults($this, 'businesschecklistresults', 'reverse_reference', 'user_id');
				case 'IntegrationAssessment':
					return new QQReverseReferenceNodeIntegrationAssessment($this, 'integrationassessment', 'reverse_reference', 'user_id');
				case 'KingdomBusinessAssessment':
					return new QQReverseReferenceNodeKingdomBusinessAssessment($this, 'kingdombusinessassessment', 'reverse_reference', 'user_id');
				case 'KpisAsModifiedBy':
					return new QQReverseReferenceNodeKpis($this, 'kpisasmodifiedby', 'reverse_reference', 'modified_by');
				case 'Lemon50Assessment':
					return new QQReverseReferenceNodeLemon50Assessment($this, 'lemon50assessment', 'reverse_reference', 'user_id');
				case 'LemonAssessment':
					return new QQReverseReferenceNodeLemonAssessment($this, 'lemonassessment', 'reverse_reference', 'user_id');
				case 'LemonloversAssessment':
					return new QQReverseReferenceNodeLemonloversAssessment($this, 'lemonloversassessment', 'reverse_reference', 'user_id');
				case 'LraAssessment':
					return new QQReverseReferenceNodeLraAssessment($this, 'lraassessment', 'reverse_reference', 'user_id');
				case 'PartneringAwarenessAssessment':
					return new QQReverseReferenceNodePartneringAwarenessAssessment($this, 'partneringawarenessassessment', 'reverse_reference', 'user_id');
				case 'PartneringReadinessAssessment':
					return new QQReverseReferenceNodePartneringReadinessAssessment($this, 'partneringreadinessassessment', 'reverse_reference', 'user_id');
				case 'PostventureAssessment':
					return new QQReverseReferenceNodePostventureAssessment($this, 'postventureassessment', 'reverse_reference', 'user_id');
				case 'SeasonalAssessment':
					return new QQReverseReferenceNodeSeasonalAssessment($this, 'seasonalassessment', 'reverse_reference', 'user_id');
				case 'StatementAsModifiedBy':
					return new QQReverseReferenceNodeStatement($this, 'statementasmodifiedby', 'reverse_reference', 'modified_by');
				case 'StrategyAsModifiedBy':
					return new QQReverseReferenceNodeStrategy($this, 'strategyasmodifiedby', 'reverse_reference', 'modified_by');
				case 'TenFAssessment':
					return new QQReverseReferenceNodeTenFAssessment($this, 'tenfassessment', 'reverse_reference', 'user_id');
				case 'TenPAssessment':
					return new QQReverseReferenceNodeTenPAssessment($this, 'tenpassessment', 'reverse_reference', 'user_id');
				case 'TimeAssessment':
					return new QQReverseReferenceNodeTimeAssessment($this, 'timeassessment', 'reverse_reference', 'user_id');
				case 'UpwardAssessment':
					return new QQReverseReferenceNodeUpwardAssessment($this, 'upwardassessment', 'reverse_reference', 'user_id');

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
	 * @property-read QQNode $CountryId
	 * @property-read QQNodeCountryList $Country
	 * @property-read QQNode $Department
	 * @property-read QQNode $TitleId
	 * @property-read QQNodeTitleList $Title
	 * @property-read QQNode $TenureId
	 * @property-read QQNodeTenureList $Tenure
	 * @property-read QQNode $CareerLength
	 * @property-read QQNode $OptIn
	 * @property-read QQNodeUserGroupAssessmentListAsAssessmentManager $GroupAssessmentListAsAssessmentManager
	 * @property-read QQNodeUserBusinessChecklistAsManager $BusinessChecklistAsManager
	 * @property-read QQNodeUserCompany $Company
	 * @property-read QQNodeUserResource $Resource
	 * @property-read QQNodeUserScorecard $Scorecard
	 * @property-read QQReverseReferenceNodeActionItems $ActionItemsAsModifiedBy
	 * @property-read QQReverseReferenceNodeActionItems $ActionItemsAsWho
	 * @property-read QQReverseReferenceNodeBusinessChecklistResults $BusinessChecklistResults
	 * @property-read QQReverseReferenceNodeIntegrationAssessment $IntegrationAssessment
	 * @property-read QQReverseReferenceNodeKingdomBusinessAssessment $KingdomBusinessAssessment
	 * @property-read QQReverseReferenceNodeKpis $KpisAsModifiedBy
	 * @property-read QQReverseReferenceNodeLemon50Assessment $Lemon50Assessment
	 * @property-read QQReverseReferenceNodeLemonAssessment $LemonAssessment
	 * @property-read QQReverseReferenceNodeLemonloversAssessment $LemonloversAssessment
	 * @property-read QQReverseReferenceNodeLraAssessment $LraAssessment
	 * @property-read QQReverseReferenceNodePartneringAwarenessAssessment $PartneringAwarenessAssessment
	 * @property-read QQReverseReferenceNodePartneringReadinessAssessment $PartneringReadinessAssessment
	 * @property-read QQReverseReferenceNodePostventureAssessment $PostventureAssessment
	 * @property-read QQReverseReferenceNodeSeasonalAssessment $SeasonalAssessment
	 * @property-read QQReverseReferenceNodeStatement $StatementAsModifiedBy
	 * @property-read QQReverseReferenceNodeStrategy $StrategyAsModifiedBy
	 * @property-read QQReverseReferenceNodeTenFAssessment $TenFAssessment
	 * @property-read QQReverseReferenceNodeTenPAssessment $TenPAssessment
	 * @property-read QQReverseReferenceNodeTimeAssessment $TimeAssessment
	 * @property-read QQReverseReferenceNodeUpwardAssessment $UpwardAssessment
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
				case 'CountryId':
					return new QQNode('country_id', 'CountryId', 'integer', $this);
				case 'Country':
					return new QQNodeCountryList('country_id', 'Country', 'integer', $this);
				case 'Department':
					return new QQNode('department', 'Department', 'string', $this);
				case 'TitleId':
					return new QQNode('title_id', 'TitleId', 'integer', $this);
				case 'Title':
					return new QQNodeTitleList('title_id', 'Title', 'integer', $this);
				case 'TenureId':
					return new QQNode('tenure_id', 'TenureId', 'integer', $this);
				case 'Tenure':
					return new QQNodeTenureList('tenure_id', 'Tenure', 'integer', $this);
				case 'CareerLength':
					return new QQNode('career_length', 'CareerLength', 'integer', $this);
				case 'OptIn':
					return new QQNode('opt_in', 'OptIn', 'boolean', $this);
				case 'GroupAssessmentListAsAssessmentManager':
					return new QQNodeUserGroupAssessmentListAsAssessmentManager($this);
				case 'BusinessChecklistAsManager':
					return new QQNodeUserBusinessChecklistAsManager($this);
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
				case 'BusinessChecklistResults':
					return new QQReverseReferenceNodeBusinessChecklistResults($this, 'businesschecklistresults', 'reverse_reference', 'user_id');
				case 'IntegrationAssessment':
					return new QQReverseReferenceNodeIntegrationAssessment($this, 'integrationassessment', 'reverse_reference', 'user_id');
				case 'KingdomBusinessAssessment':
					return new QQReverseReferenceNodeKingdomBusinessAssessment($this, 'kingdombusinessassessment', 'reverse_reference', 'user_id');
				case 'KpisAsModifiedBy':
					return new QQReverseReferenceNodeKpis($this, 'kpisasmodifiedby', 'reverse_reference', 'modified_by');
				case 'Lemon50Assessment':
					return new QQReverseReferenceNodeLemon50Assessment($this, 'lemon50assessment', 'reverse_reference', 'user_id');
				case 'LemonAssessment':
					return new QQReverseReferenceNodeLemonAssessment($this, 'lemonassessment', 'reverse_reference', 'user_id');
				case 'LemonloversAssessment':
					return new QQReverseReferenceNodeLemonloversAssessment($this, 'lemonloversassessment', 'reverse_reference', 'user_id');
				case 'LraAssessment':
					return new QQReverseReferenceNodeLraAssessment($this, 'lraassessment', 'reverse_reference', 'user_id');
				case 'PartneringAwarenessAssessment':
					return new QQReverseReferenceNodePartneringAwarenessAssessment($this, 'partneringawarenessassessment', 'reverse_reference', 'user_id');
				case 'PartneringReadinessAssessment':
					return new QQReverseReferenceNodePartneringReadinessAssessment($this, 'partneringreadinessassessment', 'reverse_reference', 'user_id');
				case 'PostventureAssessment':
					return new QQReverseReferenceNodePostventureAssessment($this, 'postventureassessment', 'reverse_reference', 'user_id');
				case 'SeasonalAssessment':
					return new QQReverseReferenceNodeSeasonalAssessment($this, 'seasonalassessment', 'reverse_reference', 'user_id');
				case 'StatementAsModifiedBy':
					return new QQReverseReferenceNodeStatement($this, 'statementasmodifiedby', 'reverse_reference', 'modified_by');
				case 'StrategyAsModifiedBy':
					return new QQReverseReferenceNodeStrategy($this, 'strategyasmodifiedby', 'reverse_reference', 'modified_by');
				case 'TenFAssessment':
					return new QQReverseReferenceNodeTenFAssessment($this, 'tenfassessment', 'reverse_reference', 'user_id');
				case 'TenPAssessment':
					return new QQReverseReferenceNodeTenPAssessment($this, 'tenpassessment', 'reverse_reference', 'user_id');
				case 'TimeAssessment':
					return new QQReverseReferenceNodeTimeAssessment($this, 'timeassessment', 'reverse_reference', 'user_id');
				case 'UpwardAssessment':
					return new QQReverseReferenceNodeUpwardAssessment($this, 'upwardassessment', 'reverse_reference', 'user_id');

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