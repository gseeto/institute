<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the User class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single User object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a UserMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read User $User the actual User data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $LoginIdControl
	 * property-read QLabel $LoginIdLabel
	 * property QTextBox $FirstNameControl
	 * property-read QLabel $FirstNameLabel
	 * property QTextBox $LastNameControl
	 * property-read QLabel $LastNameLabel
	 * property QTextBox $EmailControl
	 * property-read QLabel $EmailLabel
	 * property QCheckBox $GenderControl
	 * property-read QLabel $GenderLabel
	 * property QListBox $CountryIdControl
	 * property-read QLabel $CountryIdLabel
	 * property QTextBox $DepartmentControl
	 * property-read QLabel $DepartmentLabel
	 * property QListBox $TitleIdControl
	 * property-read QLabel $TitleIdLabel
	 * property QListBox $TenureIdControl
	 * property-read QLabel $TenureIdLabel
	 * property QIntegerTextBox $CareerLengthControl
	 * property-read QLabel $CareerLengthLabel
	 * property QCheckBox $OptInControl
	 * property-read QLabel $OptInLabel
	 * property QListBox $GroupAssessmentListAsAssessmentManagerControl
	 * property-read QLabel $GroupAssessmentListAsAssessmentManagerLabel
	 * property QListBox $BusinessChecklistAsManagerControl
	 * property-read QLabel $BusinessChecklistAsManagerLabel
	 * property QListBox $CompanyControl
	 * property-read QLabel $CompanyLabel
	 * property QListBox $ResourceControl
	 * property-read QLabel $ResourceLabel
	 * property QListBox $ScorecardControl
	 * property-read QLabel $ScorecardLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class UserMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var User objUser
		 * @access protected
		 */
		protected $objUser;

		/**
		 * @var QForm|QControl objParentObject
		 * @access protected
		 */
		protected $objParentObject;

		/**
		 * @var string  strTitleVerb
		 * @access protected
		 */
		protected $strTitleVerb;

		/**
		 * @var boolean blnEditMode
		 * @access protected
		 */
		protected $blnEditMode;

		// Controls that allow the editing of User's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QListBox lstLogin;
         * @access protected
         */
		protected $lstLogin;

        /**
         * @var QTextBox txtFirstName;
         * @access protected
         */
		protected $txtFirstName;

        /**
         * @var QTextBox txtLastName;
         * @access protected
         */
		protected $txtLastName;

        /**
         * @var QTextBox txtEmail;
         * @access protected
         */
		protected $txtEmail;

        /**
         * @var QCheckBox chkGender;
         * @access protected
         */
		protected $chkGender;

        /**
         * @var QListBox lstCountry;
         * @access protected
         */
		protected $lstCountry;

        /**
         * @var QTextBox txtDepartment;
         * @access protected
         */
		protected $txtDepartment;

        /**
         * @var QListBox lstTitle;
         * @access protected
         */
		protected $lstTitle;

        /**
         * @var QListBox lstTenure;
         * @access protected
         */
		protected $lstTenure;

        /**
         * @var QIntegerTextBox txtCareerLength;
         * @access protected
         */
		protected $txtCareerLength;

        /**
         * @var QCheckBox chkOptIn;
         * @access protected
         */
		protected $chkOptIn;


		// Controls that allow the viewing of User's individual data fields
        /**
         * @var QLabel lblLoginId
         * @access protected
         */
		protected $lblLoginId;

        /**
         * @var QLabel lblFirstName
         * @access protected
         */
		protected $lblFirstName;

        /**
         * @var QLabel lblLastName
         * @access protected
         */
		protected $lblLastName;

        /**
         * @var QLabel lblEmail
         * @access protected
         */
		protected $lblEmail;

        /**
         * @var QLabel lblGender
         * @access protected
         */
		protected $lblGender;

        /**
         * @var QLabel lblCountryId
         * @access protected
         */
		protected $lblCountryId;

        /**
         * @var QLabel lblDepartment
         * @access protected
         */
		protected $lblDepartment;

        /**
         * @var QLabel lblTitleId
         * @access protected
         */
		protected $lblTitleId;

        /**
         * @var QLabel lblTenureId
         * @access protected
         */
		protected $lblTenureId;

        /**
         * @var QLabel lblCareerLength
         * @access protected
         */
		protected $lblCareerLength;

        /**
         * @var QLabel lblOptIn
         * @access protected
         */
		protected $lblOptIn;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References
		protected $lstGroupAssessmentListsAsAssessmentManager;

		protected $lstBusinessChecklistsAsManager;

		protected $lstCompanies;

		protected $lstResources;

		protected $lstScorecards;


		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References
		protected $lblGroupAssessmentListsAsAssessmentManager;

		protected $lblBusinessChecklistsAsManager;

		protected $lblCompanies;

		protected $lblResources;

		protected $lblScorecards;



		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * UserMetaControl to edit a single User object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single User object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this UserMetaControl
		 * @param User $objUser new or existing User object
		 */
		 public function __construct($objParentObject, User $objUser) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this UserMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked User object
			$this->objUser = $objUser;

			// Figure out if we're Editing or Creating New
			if ($this->objUser->__Restored) {
				$this->strTitleVerb = QApplication::Translate('Edit');
				$this->blnEditMode = true;
			} else {
				$this->strTitleVerb = QApplication::Translate('Create');
				$this->blnEditMode = false;
			}
		 }

		/**
		 * Static Helper Method to Create using PK arguments
		 * You must pass in the PK arguments on an object to load, or leave it blank to create a new one.
		 * If you want to load via QueryString or PathInfo, use the CreateFromQueryString or CreateFromPathInfo
		 * static helper methods.  Finally, specify a CreateType to define whether or not we are only allowed to 
		 * edit, or if we are also allowed to create a new one, etc.
		 * 
		 * @param mixed $objParentObject QForm or QPanel which will be using this UserMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing User object creation - defaults to CreateOrEdit
 		 * @return UserMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objUser = User::Load($intId);

				// User was found -- return it!
				if ($objUser)
					return new UserMetaControl($objParentObject, $objUser);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a User object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new UserMetaControl($objParentObject, new User());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this UserMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing User object creation - defaults to CreateOrEdit
		 * @return UserMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return UserMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this UserMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing User object creation - defaults to CreateOrEdit
		 * @return UserMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return UserMetaControl::Create($objParentObject, $intId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QLabel lblId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblId_Create($strControlId = null) {
			$this->lblId = new QLabel($this->objParentObject, $strControlId);
			$this->lblId->Name = QApplication::Translate('Id');
			if ($this->blnEditMode)
				$this->lblId->Text = $this->objUser->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QListBox lstLogin
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstLogin_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstLogin = new QListBox($this->objParentObject, $strControlId);
			$this->lstLogin->Name = QApplication::Translate('Login');
			$this->lstLogin->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objLoginCursor = Login::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objLogin = Login::InstantiateCursor($objLoginCursor)) {
				$objListItem = new QListItem($objLogin->__toString(), $objLogin->Id);
				if (($this->objUser->Login) && ($this->objUser->Login->Id == $objLogin->Id))
					$objListItem->Selected = true;
				$this->lstLogin->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstLogin;
		}

		/**
		 * Create and setup QLabel lblLoginId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblLoginId_Create($strControlId = null) {
			$this->lblLoginId = new QLabel($this->objParentObject, $strControlId);
			$this->lblLoginId->Name = QApplication::Translate('Login');
			$this->lblLoginId->Text = ($this->objUser->Login) ? $this->objUser->Login->__toString() : null;
			return $this->lblLoginId;
		}

		/**
		 * Create and setup QTextBox txtFirstName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtFirstName_Create($strControlId = null) {
			$this->txtFirstName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtFirstName->Name = QApplication::Translate('First Name');
			$this->txtFirstName->Text = $this->objUser->FirstName;
			$this->txtFirstName->TextMode = QTextMode::MultiLine;
			return $this->txtFirstName;
		}

		/**
		 * Create and setup QLabel lblFirstName
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblFirstName_Create($strControlId = null) {
			$this->lblFirstName = new QLabel($this->objParentObject, $strControlId);
			$this->lblFirstName->Name = QApplication::Translate('First Name');
			$this->lblFirstName->Text = $this->objUser->FirstName;
			return $this->lblFirstName;
		}

		/**
		 * Create and setup QTextBox txtLastName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtLastName_Create($strControlId = null) {
			$this->txtLastName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtLastName->Name = QApplication::Translate('Last Name');
			$this->txtLastName->Text = $this->objUser->LastName;
			$this->txtLastName->TextMode = QTextMode::MultiLine;
			return $this->txtLastName;
		}

		/**
		 * Create and setup QLabel lblLastName
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblLastName_Create($strControlId = null) {
			$this->lblLastName = new QLabel($this->objParentObject, $strControlId);
			$this->lblLastName->Name = QApplication::Translate('Last Name');
			$this->lblLastName->Text = $this->objUser->LastName;
			return $this->lblLastName;
		}

		/**
		 * Create and setup QTextBox txtEmail
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtEmail_Create($strControlId = null) {
			$this->txtEmail = new QTextBox($this->objParentObject, $strControlId);
			$this->txtEmail->Name = QApplication::Translate('Email');
			$this->txtEmail->Text = $this->objUser->Email;
			$this->txtEmail->TextMode = QTextMode::MultiLine;
			return $this->txtEmail;
		}

		/**
		 * Create and setup QLabel lblEmail
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblEmail_Create($strControlId = null) {
			$this->lblEmail = new QLabel($this->objParentObject, $strControlId);
			$this->lblEmail->Name = QApplication::Translate('Email');
			$this->lblEmail->Text = $this->objUser->Email;
			return $this->lblEmail;
		}

		/**
		 * Create and setup QCheckBox chkGender
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkGender_Create($strControlId = null) {
			$this->chkGender = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkGender->Name = QApplication::Translate('Gender');
			$this->chkGender->Checked = $this->objUser->Gender;
			return $this->chkGender;
		}

		/**
		 * Create and setup QLabel lblGender
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblGender_Create($strControlId = null) {
			$this->lblGender = new QLabel($this->objParentObject, $strControlId);
			$this->lblGender->Name = QApplication::Translate('Gender');
			$this->lblGender->Text = ($this->objUser->Gender) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblGender;
		}

		/**
		 * Create and setup QListBox lstCountry
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstCountry_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstCountry = new QListBox($this->objParentObject, $strControlId);
			$this->lstCountry->Name = QApplication::Translate('Country');
			$this->lstCountry->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objCountryCursor = CountryList::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objCountry = CountryList::InstantiateCursor($objCountryCursor)) {
				$objListItem = new QListItem($objCountry->__toString(), $objCountry->Id);
				if (($this->objUser->Country) && ($this->objUser->Country->Id == $objCountry->Id))
					$objListItem->Selected = true;
				$this->lstCountry->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstCountry;
		}

		/**
		 * Create and setup QLabel lblCountryId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCountryId_Create($strControlId = null) {
			$this->lblCountryId = new QLabel($this->objParentObject, $strControlId);
			$this->lblCountryId->Name = QApplication::Translate('Country');
			$this->lblCountryId->Text = ($this->objUser->Country) ? $this->objUser->Country->__toString() : null;
			return $this->lblCountryId;
		}

		/**
		 * Create and setup QTextBox txtDepartment
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtDepartment_Create($strControlId = null) {
			$this->txtDepartment = new QTextBox($this->objParentObject, $strControlId);
			$this->txtDepartment->Name = QApplication::Translate('Department');
			$this->txtDepartment->Text = $this->objUser->Department;
			$this->txtDepartment->MaxLength = User::DepartmentMaxLength;
			return $this->txtDepartment;
		}

		/**
		 * Create and setup QLabel lblDepartment
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblDepartment_Create($strControlId = null) {
			$this->lblDepartment = new QLabel($this->objParentObject, $strControlId);
			$this->lblDepartment->Name = QApplication::Translate('Department');
			$this->lblDepartment->Text = $this->objUser->Department;
			return $this->lblDepartment;
		}

		/**
		 * Create and setup QListBox lstTitle
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstTitle_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstTitle = new QListBox($this->objParentObject, $strControlId);
			$this->lstTitle->Name = QApplication::Translate('Title');
			$this->lstTitle->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objTitleCursor = TitleList::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objTitle = TitleList::InstantiateCursor($objTitleCursor)) {
				$objListItem = new QListItem($objTitle->__toString(), $objTitle->Id);
				if (($this->objUser->Title) && ($this->objUser->Title->Id == $objTitle->Id))
					$objListItem->Selected = true;
				$this->lstTitle->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstTitle;
		}

		/**
		 * Create and setup QLabel lblTitleId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblTitleId_Create($strControlId = null) {
			$this->lblTitleId = new QLabel($this->objParentObject, $strControlId);
			$this->lblTitleId->Name = QApplication::Translate('Title');
			$this->lblTitleId->Text = ($this->objUser->Title) ? $this->objUser->Title->__toString() : null;
			return $this->lblTitleId;
		}

		/**
		 * Create and setup QListBox lstTenure
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstTenure_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstTenure = new QListBox($this->objParentObject, $strControlId);
			$this->lstTenure->Name = QApplication::Translate('Tenure');
			$this->lstTenure->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objTenureCursor = TenureList::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objTenure = TenureList::InstantiateCursor($objTenureCursor)) {
				$objListItem = new QListItem($objTenure->__toString(), $objTenure->Id);
				if (($this->objUser->Tenure) && ($this->objUser->Tenure->Id == $objTenure->Id))
					$objListItem->Selected = true;
				$this->lstTenure->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstTenure;
		}

		/**
		 * Create and setup QLabel lblTenureId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblTenureId_Create($strControlId = null) {
			$this->lblTenureId = new QLabel($this->objParentObject, $strControlId);
			$this->lblTenureId->Name = QApplication::Translate('Tenure');
			$this->lblTenureId->Text = ($this->objUser->Tenure) ? $this->objUser->Tenure->__toString() : null;
			return $this->lblTenureId;
		}

		/**
		 * Create and setup QIntegerTextBox txtCareerLength
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtCareerLength_Create($strControlId = null) {
			$this->txtCareerLength = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtCareerLength->Name = QApplication::Translate('Career Length');
			$this->txtCareerLength->Text = $this->objUser->CareerLength;
			return $this->txtCareerLength;
		}

		/**
		 * Create and setup QLabel lblCareerLength
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblCareerLength_Create($strControlId = null, $strFormat = null) {
			$this->lblCareerLength = new QLabel($this->objParentObject, $strControlId);
			$this->lblCareerLength->Name = QApplication::Translate('Career Length');
			$this->lblCareerLength->Text = $this->objUser->CareerLength;
			$this->lblCareerLength->Format = $strFormat;
			return $this->lblCareerLength;
		}

		/**
		 * Create and setup QCheckBox chkOptIn
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkOptIn_Create($strControlId = null) {
			$this->chkOptIn = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkOptIn->Name = QApplication::Translate('Opt In');
			$this->chkOptIn->Checked = $this->objUser->OptIn;
			return $this->chkOptIn;
		}

		/**
		 * Create and setup QLabel lblOptIn
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblOptIn_Create($strControlId = null) {
			$this->lblOptIn = new QLabel($this->objParentObject, $strControlId);
			$this->lblOptIn->Name = QApplication::Translate('Opt In');
			$this->lblOptIn->Text = ($this->objUser->OptIn) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblOptIn;
		}

		/**
		 * Create and setup QListBox lstGroupAssessmentListsAsAssessmentManager
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstGroupAssessmentListsAsAssessmentManager_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstGroupAssessmentListsAsAssessmentManager = new QListBox($this->objParentObject, $strControlId);
			$this->lstGroupAssessmentListsAsAssessmentManager->Name = QApplication::Translate('Group Assessment Lists As Assessment Manager');
			$this->lstGroupAssessmentListsAsAssessmentManager->SelectionMode = QSelectionMode::Multiple;

			// We need to know which items to "Pre-Select"
			$objAssociatedArray = $this->objUser->GetGroupAssessmentListAsAssessmentManagerArray();

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objGroupAssessmentListCursor = GroupAssessmentList::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objGroupAssessmentList = GroupAssessmentList::InstantiateCursor($objGroupAssessmentListCursor)) {
				$objListItem = new QListItem($objGroupAssessmentList->__toString(), $objGroupAssessmentList->Id);
				foreach ($objAssociatedArray as $objAssociated) {
					if ($objAssociated->Id == $objGroupAssessmentList->Id)
						$objListItem->Selected = true;
				}
				$this->lstGroupAssessmentListsAsAssessmentManager->AddItem($objListItem);
			}

			// Return the QListControl
			return $this->lstGroupAssessmentListsAsAssessmentManager;
		}

		/**
		 * Create and setup QLabel lblGroupAssessmentListsAsAssessmentManager
		 * @param string $strControlId optional ControlId to use
		 * @param string $strGlue glue to display in between each associated object
		 * @return QLabel
		 */
		public function lblGroupAssessmentListsAsAssessmentManager_Create($strControlId = null, $strGlue = ', ') {
			$this->lblGroupAssessmentListsAsAssessmentManager = new QLabel($this->objParentObject, $strControlId);
			$this->lstGroupAssessmentListsAsAssessmentManager->Name = QApplication::Translate('Group Assessment Lists As Assessment Manager');
			
			$objAssociatedArray = $this->objUser->GetGroupAssessmentListAsAssessmentManagerArray();
			$strItems = array();
			foreach ($objAssociatedArray as $objAssociated)
				$strItems[] = $objAssociated->__toString();
			$this->lblGroupAssessmentListsAsAssessmentManager->Text = implode($strGlue, $strItems);
			return $this->lblGroupAssessmentListsAsAssessmentManager;
		}

		/**
		 * Create and setup QListBox lstBusinessChecklistsAsManager
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstBusinessChecklistsAsManager_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstBusinessChecklistsAsManager = new QListBox($this->objParentObject, $strControlId);
			$this->lstBusinessChecklistsAsManager->Name = QApplication::Translate('Business Checklists As Manager');
			$this->lstBusinessChecklistsAsManager->SelectionMode = QSelectionMode::Multiple;

			// We need to know which items to "Pre-Select"
			$objAssociatedArray = $this->objUser->GetBusinessChecklistAsManagerArray();

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objBusinessChecklistCursor = BusinessChecklist::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objBusinessChecklist = BusinessChecklist::InstantiateCursor($objBusinessChecklistCursor)) {
				$objListItem = new QListItem($objBusinessChecklist->__toString(), $objBusinessChecklist->Id);
				foreach ($objAssociatedArray as $objAssociated) {
					if ($objAssociated->Id == $objBusinessChecklist->Id)
						$objListItem->Selected = true;
				}
				$this->lstBusinessChecklistsAsManager->AddItem($objListItem);
			}

			// Return the QListControl
			return $this->lstBusinessChecklistsAsManager;
		}

		/**
		 * Create and setup QLabel lblBusinessChecklistsAsManager
		 * @param string $strControlId optional ControlId to use
		 * @param string $strGlue glue to display in between each associated object
		 * @return QLabel
		 */
		public function lblBusinessChecklistsAsManager_Create($strControlId = null, $strGlue = ', ') {
			$this->lblBusinessChecklistsAsManager = new QLabel($this->objParentObject, $strControlId);
			$this->lstBusinessChecklistsAsManager->Name = QApplication::Translate('Business Checklists As Manager');
			
			$objAssociatedArray = $this->objUser->GetBusinessChecklistAsManagerArray();
			$strItems = array();
			foreach ($objAssociatedArray as $objAssociated)
				$strItems[] = $objAssociated->__toString();
			$this->lblBusinessChecklistsAsManager->Text = implode($strGlue, $strItems);
			return $this->lblBusinessChecklistsAsManager;
		}

		/**
		 * Create and setup QListBox lstCompanies
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstCompanies_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstCompanies = new QListBox($this->objParentObject, $strControlId);
			$this->lstCompanies->Name = QApplication::Translate('Companies');
			$this->lstCompanies->SelectionMode = QSelectionMode::Multiple;

			// We need to know which items to "Pre-Select"
			$objAssociatedArray = $this->objUser->GetCompanyArray();

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objCompanyCursor = Company::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objCompany = Company::InstantiateCursor($objCompanyCursor)) {
				$objListItem = new QListItem($objCompany->__toString(), $objCompany->Id);
				foreach ($objAssociatedArray as $objAssociated) {
					if ($objAssociated->Id == $objCompany->Id)
						$objListItem->Selected = true;
				}
				$this->lstCompanies->AddItem($objListItem);
			}

			// Return the QListControl
			return $this->lstCompanies;
		}

		/**
		 * Create and setup QLabel lblCompanies
		 * @param string $strControlId optional ControlId to use
		 * @param string $strGlue glue to display in between each associated object
		 * @return QLabel
		 */
		public function lblCompanies_Create($strControlId = null, $strGlue = ', ') {
			$this->lblCompanies = new QLabel($this->objParentObject, $strControlId);
			$this->lstCompanies->Name = QApplication::Translate('Companies');
			
			$objAssociatedArray = $this->objUser->GetCompanyArray();
			$strItems = array();
			foreach ($objAssociatedArray as $objAssociated)
				$strItems[] = $objAssociated->__toString();
			$this->lblCompanies->Text = implode($strGlue, $strItems);
			return $this->lblCompanies;
		}

		/**
		 * Create and setup QListBox lstResources
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstResources_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstResources = new QListBox($this->objParentObject, $strControlId);
			$this->lstResources->Name = QApplication::Translate('Resources');
			$this->lstResources->SelectionMode = QSelectionMode::Multiple;

			// We need to know which items to "Pre-Select"
			$objAssociatedArray = $this->objUser->GetResourceArray();

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objResourceCursor = Resource::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objResource = Resource::InstantiateCursor($objResourceCursor)) {
				$objListItem = new QListItem($objResource->__toString(), $objResource->Id);
				foreach ($objAssociatedArray as $objAssociated) {
					if ($objAssociated->Id == $objResource->Id)
						$objListItem->Selected = true;
				}
				$this->lstResources->AddItem($objListItem);
			}

			// Return the QListControl
			return $this->lstResources;
		}

		/**
		 * Create and setup QLabel lblResources
		 * @param string $strControlId optional ControlId to use
		 * @param string $strGlue glue to display in between each associated object
		 * @return QLabel
		 */
		public function lblResources_Create($strControlId = null, $strGlue = ', ') {
			$this->lblResources = new QLabel($this->objParentObject, $strControlId);
			$this->lstResources->Name = QApplication::Translate('Resources');
			
			$objAssociatedArray = $this->objUser->GetResourceArray();
			$strItems = array();
			foreach ($objAssociatedArray as $objAssociated)
				$strItems[] = $objAssociated->__toString();
			$this->lblResources->Text = implode($strGlue, $strItems);
			return $this->lblResources;
		}

		/**
		 * Create and setup QListBox lstScorecards
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstScorecards_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstScorecards = new QListBox($this->objParentObject, $strControlId);
			$this->lstScorecards->Name = QApplication::Translate('Scorecards');
			$this->lstScorecards->SelectionMode = QSelectionMode::Multiple;

			// We need to know which items to "Pre-Select"
			$objAssociatedArray = $this->objUser->GetScorecardArray();

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objScorecardCursor = Scorecard::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objScorecard = Scorecard::InstantiateCursor($objScorecardCursor)) {
				$objListItem = new QListItem($objScorecard->__toString(), $objScorecard->Id);
				foreach ($objAssociatedArray as $objAssociated) {
					if ($objAssociated->Id == $objScorecard->Id)
						$objListItem->Selected = true;
				}
				$this->lstScorecards->AddItem($objListItem);
			}

			// Return the QListControl
			return $this->lstScorecards;
		}

		/**
		 * Create and setup QLabel lblScorecards
		 * @param string $strControlId optional ControlId to use
		 * @param string $strGlue glue to display in between each associated object
		 * @return QLabel
		 */
		public function lblScorecards_Create($strControlId = null, $strGlue = ', ') {
			$this->lblScorecards = new QLabel($this->objParentObject, $strControlId);
			$this->lstScorecards->Name = QApplication::Translate('Scorecards');
			
			$objAssociatedArray = $this->objUser->GetScorecardArray();
			$strItems = array();
			foreach ($objAssociatedArray as $objAssociated)
				$strItems[] = $objAssociated->__toString();
			$this->lblScorecards->Text = implode($strGlue, $strItems);
			return $this->lblScorecards;
		}



		/**
		 * Refresh this MetaControl with Data from the local User object.
		 * @param boolean $blnReload reload User from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objUser->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objUser->Id;

			if ($this->lstLogin) {
					$this->lstLogin->RemoveAllItems();
				$this->lstLogin->AddItem(QApplication::Translate('- Select One -'), null);
				$objLoginArray = Login::LoadAll();
				if ($objLoginArray) foreach ($objLoginArray as $objLogin) {
					$objListItem = new QListItem($objLogin->__toString(), $objLogin->Id);
					if (($this->objUser->Login) && ($this->objUser->Login->Id == $objLogin->Id))
						$objListItem->Selected = true;
					$this->lstLogin->AddItem($objListItem);
				}
			}
			if ($this->lblLoginId) $this->lblLoginId->Text = ($this->objUser->Login) ? $this->objUser->Login->__toString() : null;

			if ($this->txtFirstName) $this->txtFirstName->Text = $this->objUser->FirstName;
			if ($this->lblFirstName) $this->lblFirstName->Text = $this->objUser->FirstName;

			if ($this->txtLastName) $this->txtLastName->Text = $this->objUser->LastName;
			if ($this->lblLastName) $this->lblLastName->Text = $this->objUser->LastName;

			if ($this->txtEmail) $this->txtEmail->Text = $this->objUser->Email;
			if ($this->lblEmail) $this->lblEmail->Text = $this->objUser->Email;

			if ($this->chkGender) $this->chkGender->Checked = $this->objUser->Gender;
			if ($this->lblGender) $this->lblGender->Text = ($this->objUser->Gender) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->lstCountry) {
					$this->lstCountry->RemoveAllItems();
				$this->lstCountry->AddItem(QApplication::Translate('- Select One -'), null);
				$objCountryArray = CountryList::LoadAll();
				if ($objCountryArray) foreach ($objCountryArray as $objCountry) {
					$objListItem = new QListItem($objCountry->__toString(), $objCountry->Id);
					if (($this->objUser->Country) && ($this->objUser->Country->Id == $objCountry->Id))
						$objListItem->Selected = true;
					$this->lstCountry->AddItem($objListItem);
				}
			}
			if ($this->lblCountryId) $this->lblCountryId->Text = ($this->objUser->Country) ? $this->objUser->Country->__toString() : null;

			if ($this->txtDepartment) $this->txtDepartment->Text = $this->objUser->Department;
			if ($this->lblDepartment) $this->lblDepartment->Text = $this->objUser->Department;

			if ($this->lstTitle) {
					$this->lstTitle->RemoveAllItems();
				$this->lstTitle->AddItem(QApplication::Translate('- Select One -'), null);
				$objTitleArray = TitleList::LoadAll();
				if ($objTitleArray) foreach ($objTitleArray as $objTitle) {
					$objListItem = new QListItem($objTitle->__toString(), $objTitle->Id);
					if (($this->objUser->Title) && ($this->objUser->Title->Id == $objTitle->Id))
						$objListItem->Selected = true;
					$this->lstTitle->AddItem($objListItem);
				}
			}
			if ($this->lblTitleId) $this->lblTitleId->Text = ($this->objUser->Title) ? $this->objUser->Title->__toString() : null;

			if ($this->lstTenure) {
					$this->lstTenure->RemoveAllItems();
				$this->lstTenure->AddItem(QApplication::Translate('- Select One -'), null);
				$objTenureArray = TenureList::LoadAll();
				if ($objTenureArray) foreach ($objTenureArray as $objTenure) {
					$objListItem = new QListItem($objTenure->__toString(), $objTenure->Id);
					if (($this->objUser->Tenure) && ($this->objUser->Tenure->Id == $objTenure->Id))
						$objListItem->Selected = true;
					$this->lstTenure->AddItem($objListItem);
				}
			}
			if ($this->lblTenureId) $this->lblTenureId->Text = ($this->objUser->Tenure) ? $this->objUser->Tenure->__toString() : null;

			if ($this->txtCareerLength) $this->txtCareerLength->Text = $this->objUser->CareerLength;
			if ($this->lblCareerLength) $this->lblCareerLength->Text = $this->objUser->CareerLength;

			if ($this->chkOptIn) $this->chkOptIn->Checked = $this->objUser->OptIn;
			if ($this->lblOptIn) $this->lblOptIn->Text = ($this->objUser->OptIn) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->lstGroupAssessmentListsAsAssessmentManager) {
				$this->lstGroupAssessmentListsAsAssessmentManager->RemoveAllItems();
				$objAssociatedArray = $this->objUser->GetGroupAssessmentListAsAssessmentManagerArray();
				$objGroupAssessmentListArray = GroupAssessmentList::LoadAll();
				if ($objGroupAssessmentListArray) foreach ($objGroupAssessmentListArray as $objGroupAssessmentList) {
					$objListItem = new QListItem($objGroupAssessmentList->__toString(), $objGroupAssessmentList->Id);
					foreach ($objAssociatedArray as $objAssociated) {
						if ($objAssociated->Id == $objGroupAssessmentList->Id)
							$objListItem->Selected = true;
					}
					$this->lstGroupAssessmentListsAsAssessmentManager->AddItem($objListItem);
				}
			}
			if ($this->lblGroupAssessmentListsAsAssessmentManager) {
				$objAssociatedArray = $this->objUser->GetGroupAssessmentListAsAssessmentManagerArray();
				$strItems = array();
				foreach ($objAssociatedArray as $objAssociated)
					$strItems[] = $objAssociated->__toString();
				$this->lblGroupAssessmentListsAsAssessmentManager->Text = implode($strGlue, $strItems);
			}

			if ($this->lstBusinessChecklistsAsManager) {
				$this->lstBusinessChecklistsAsManager->RemoveAllItems();
				$objAssociatedArray = $this->objUser->GetBusinessChecklistAsManagerArray();
				$objBusinessChecklistArray = BusinessChecklist::LoadAll();
				if ($objBusinessChecklistArray) foreach ($objBusinessChecklistArray as $objBusinessChecklist) {
					$objListItem = new QListItem($objBusinessChecklist->__toString(), $objBusinessChecklist->Id);
					foreach ($objAssociatedArray as $objAssociated) {
						if ($objAssociated->Id == $objBusinessChecklist->Id)
							$objListItem->Selected = true;
					}
					$this->lstBusinessChecklistsAsManager->AddItem($objListItem);
				}
			}
			if ($this->lblBusinessChecklistsAsManager) {
				$objAssociatedArray = $this->objUser->GetBusinessChecklistAsManagerArray();
				$strItems = array();
				foreach ($objAssociatedArray as $objAssociated)
					$strItems[] = $objAssociated->__toString();
				$this->lblBusinessChecklistsAsManager->Text = implode($strGlue, $strItems);
			}

			if ($this->lstCompanies) {
				$this->lstCompanies->RemoveAllItems();
				$objAssociatedArray = $this->objUser->GetCompanyArray();
				$objCompanyArray = Company::LoadAll();
				if ($objCompanyArray) foreach ($objCompanyArray as $objCompany) {
					$objListItem = new QListItem($objCompany->__toString(), $objCompany->Id);
					foreach ($objAssociatedArray as $objAssociated) {
						if ($objAssociated->Id == $objCompany->Id)
							$objListItem->Selected = true;
					}
					$this->lstCompanies->AddItem($objListItem);
				}
			}
			if ($this->lblCompanies) {
				$objAssociatedArray = $this->objUser->GetCompanyArray();
				$strItems = array();
				foreach ($objAssociatedArray as $objAssociated)
					$strItems[] = $objAssociated->__toString();
				$this->lblCompanies->Text = implode($strGlue, $strItems);
			}

			if ($this->lstResources) {
				$this->lstResources->RemoveAllItems();
				$objAssociatedArray = $this->objUser->GetResourceArray();
				$objResourceArray = Resource::LoadAll();
				if ($objResourceArray) foreach ($objResourceArray as $objResource) {
					$objListItem = new QListItem($objResource->__toString(), $objResource->Id);
					foreach ($objAssociatedArray as $objAssociated) {
						if ($objAssociated->Id == $objResource->Id)
							$objListItem->Selected = true;
					}
					$this->lstResources->AddItem($objListItem);
				}
			}
			if ($this->lblResources) {
				$objAssociatedArray = $this->objUser->GetResourceArray();
				$strItems = array();
				foreach ($objAssociatedArray as $objAssociated)
					$strItems[] = $objAssociated->__toString();
				$this->lblResources->Text = implode($strGlue, $strItems);
			}

			if ($this->lstScorecards) {
				$this->lstScorecards->RemoveAllItems();
				$objAssociatedArray = $this->objUser->GetScorecardArray();
				$objScorecardArray = Scorecard::LoadAll();
				if ($objScorecardArray) foreach ($objScorecardArray as $objScorecard) {
					$objListItem = new QListItem($objScorecard->__toString(), $objScorecard->Id);
					foreach ($objAssociatedArray as $objAssociated) {
						if ($objAssociated->Id == $objScorecard->Id)
							$objListItem->Selected = true;
					}
					$this->lstScorecards->AddItem($objListItem);
				}
			}
			if ($this->lblScorecards) {
				$objAssociatedArray = $this->objUser->GetScorecardArray();
				$strItems = array();
				foreach ($objAssociatedArray as $objAssociated)
					$strItems[] = $objAssociated->__toString();
				$this->lblScorecards->Text = implode($strGlue, $strItems);
			}

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////

		protected function lstGroupAssessmentListsAsAssessmentManager_Update() {
			if ($this->lstGroupAssessmentListsAsAssessmentManager) {
				$this->objUser->UnassociateAllGroupAssessmentListsAsAssessmentManager();
				$objSelectedListItems = $this->lstGroupAssessmentListsAsAssessmentManager->SelectedItems;
				if ($objSelectedListItems) foreach ($objSelectedListItems as $objListItem) {
					$this->objUser->AssociateGroupAssessmentListAsAssessmentManager(GroupAssessmentList::Load($objListItem->Value));
				}
			}
		}

		protected function lstBusinessChecklistsAsManager_Update() {
			if ($this->lstBusinessChecklistsAsManager) {
				$this->objUser->UnassociateAllBusinessChecklistsAsManager();
				$objSelectedListItems = $this->lstBusinessChecklistsAsManager->SelectedItems;
				if ($objSelectedListItems) foreach ($objSelectedListItems as $objListItem) {
					$this->objUser->AssociateBusinessChecklistAsManager(BusinessChecklist::Load($objListItem->Value));
				}
			}
		}

		protected function lstCompanies_Update() {
			if ($this->lstCompanies) {
				$this->objUser->UnassociateAllCompanies();
				$objSelectedListItems = $this->lstCompanies->SelectedItems;
				if ($objSelectedListItems) foreach ($objSelectedListItems as $objListItem) {
					$this->objUser->AssociateCompany(Company::Load($objListItem->Value));
				}
			}
		}

		protected function lstResources_Update() {
			if ($this->lstResources) {
				$this->objUser->UnassociateAllResources();
				$objSelectedListItems = $this->lstResources->SelectedItems;
				if ($objSelectedListItems) foreach ($objSelectedListItems as $objListItem) {
					$this->objUser->AssociateResource(Resource::Load($objListItem->Value));
				}
			}
		}

		protected function lstScorecards_Update() {
			if ($this->lstScorecards) {
				$this->objUser->UnassociateAllScorecards();
				$objSelectedListItems = $this->lstScorecards->SelectedItems;
				if ($objSelectedListItems) foreach ($objSelectedListItems as $objListItem) {
					$this->objUser->AssociateScorecard(Scorecard::Load($objListItem->Value));
				}
			}
		}





		///////////////////////////////////////////////
		// PUBLIC USER OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's User instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveUser() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstLogin) $this->objUser->LoginId = $this->lstLogin->SelectedValue;
				if ($this->txtFirstName) $this->objUser->FirstName = $this->txtFirstName->Text;
				if ($this->txtLastName) $this->objUser->LastName = $this->txtLastName->Text;
				if ($this->txtEmail) $this->objUser->Email = $this->txtEmail->Text;
				if ($this->chkGender) $this->objUser->Gender = $this->chkGender->Checked;
				if ($this->lstCountry) $this->objUser->CountryId = $this->lstCountry->SelectedValue;
				if ($this->txtDepartment) $this->objUser->Department = $this->txtDepartment->Text;
				if ($this->lstTitle) $this->objUser->TitleId = $this->lstTitle->SelectedValue;
				if ($this->lstTenure) $this->objUser->TenureId = $this->lstTenure->SelectedValue;
				if ($this->txtCareerLength) $this->objUser->CareerLength = $this->txtCareerLength->Text;
				if ($this->chkOptIn) $this->objUser->OptIn = $this->chkOptIn->Checked;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the User object
				$this->objUser->Save();

				// Finally, update any ManyToManyReferences (if any)
				$this->lstGroupAssessmentListsAsAssessmentManager_Update();
				$this->lstBusinessChecklistsAsManager_Update();
				$this->lstCompanies_Update();
				$this->lstResources_Update();
				$this->lstScorecards_Update();
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's User instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteUser() {
			$this->objUser->UnassociateAllGroupAssessmentListsAsAssessmentManager();
			$this->objUser->UnassociateAllBusinessChecklistsAsManager();
			$this->objUser->UnassociateAllCompanies();
			$this->objUser->UnassociateAllResources();
			$this->objUser->UnassociateAllScorecards();
			$this->objUser->Delete();
		}		



		///////////////////////////////////////////////
		// PUBLIC GETTERS and SETTERS
		///////////////////////////////////////////////

		/**
		 * Override method to perform a property "Get"
		 * This will get the value of $strName
		 *
		 * @param string $strName Name of the property to get
		 * @return mixed
		 */
		public function __get($strName) {
			switch ($strName) {
				// General MetaControlVariables
				case 'User': return $this->objUser;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to User fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'LoginIdControl':
					if (!$this->lstLogin) return $this->lstLogin_Create();
					return $this->lstLogin;
				case 'LoginIdLabel':
					if (!$this->lblLoginId) return $this->lblLoginId_Create();
					return $this->lblLoginId;
				case 'FirstNameControl':
					if (!$this->txtFirstName) return $this->txtFirstName_Create();
					return $this->txtFirstName;
				case 'FirstNameLabel':
					if (!$this->lblFirstName) return $this->lblFirstName_Create();
					return $this->lblFirstName;
				case 'LastNameControl':
					if (!$this->txtLastName) return $this->txtLastName_Create();
					return $this->txtLastName;
				case 'LastNameLabel':
					if (!$this->lblLastName) return $this->lblLastName_Create();
					return $this->lblLastName;
				case 'EmailControl':
					if (!$this->txtEmail) return $this->txtEmail_Create();
					return $this->txtEmail;
				case 'EmailLabel':
					if (!$this->lblEmail) return $this->lblEmail_Create();
					return $this->lblEmail;
				case 'GenderControl':
					if (!$this->chkGender) return $this->chkGender_Create();
					return $this->chkGender;
				case 'GenderLabel':
					if (!$this->lblGender) return $this->lblGender_Create();
					return $this->lblGender;
				case 'CountryIdControl':
					if (!$this->lstCountry) return $this->lstCountry_Create();
					return $this->lstCountry;
				case 'CountryIdLabel':
					if (!$this->lblCountryId) return $this->lblCountryId_Create();
					return $this->lblCountryId;
				case 'DepartmentControl':
					if (!$this->txtDepartment) return $this->txtDepartment_Create();
					return $this->txtDepartment;
				case 'DepartmentLabel':
					if (!$this->lblDepartment) return $this->lblDepartment_Create();
					return $this->lblDepartment;
				case 'TitleIdControl':
					if (!$this->lstTitle) return $this->lstTitle_Create();
					return $this->lstTitle;
				case 'TitleIdLabel':
					if (!$this->lblTitleId) return $this->lblTitleId_Create();
					return $this->lblTitleId;
				case 'TenureIdControl':
					if (!$this->lstTenure) return $this->lstTenure_Create();
					return $this->lstTenure;
				case 'TenureIdLabel':
					if (!$this->lblTenureId) return $this->lblTenureId_Create();
					return $this->lblTenureId;
				case 'CareerLengthControl':
					if (!$this->txtCareerLength) return $this->txtCareerLength_Create();
					return $this->txtCareerLength;
				case 'CareerLengthLabel':
					if (!$this->lblCareerLength) return $this->lblCareerLength_Create();
					return $this->lblCareerLength;
				case 'OptInControl':
					if (!$this->chkOptIn) return $this->chkOptIn_Create();
					return $this->chkOptIn;
				case 'OptInLabel':
					if (!$this->lblOptIn) return $this->lblOptIn_Create();
					return $this->lblOptIn;
				case 'GroupAssessmentListAsAssessmentManagerControl':
					if (!$this->lstGroupAssessmentListsAsAssessmentManager) return $this->lstGroupAssessmentListsAsAssessmentManager_Create();
					return $this->lstGroupAssessmentListsAsAssessmentManager;
				case 'GroupAssessmentListAsAssessmentManagerLabel':
					if (!$this->lblGroupAssessmentListsAsAssessmentManager) return $this->lblGroupAssessmentListsAsAssessmentManager_Create();
					return $this->lblGroupAssessmentListsAsAssessmentManager;
				case 'BusinessChecklistAsManagerControl':
					if (!$this->lstBusinessChecklistsAsManager) return $this->lstBusinessChecklistsAsManager_Create();
					return $this->lstBusinessChecklistsAsManager;
				case 'BusinessChecklistAsManagerLabel':
					if (!$this->lblBusinessChecklistsAsManager) return $this->lblBusinessChecklistsAsManager_Create();
					return $this->lblBusinessChecklistsAsManager;
				case 'CompanyControl':
					if (!$this->lstCompanies) return $this->lstCompanies_Create();
					return $this->lstCompanies;
				case 'CompanyLabel':
					if (!$this->lblCompanies) return $this->lblCompanies_Create();
					return $this->lblCompanies;
				case 'ResourceControl':
					if (!$this->lstResources) return $this->lstResources_Create();
					return $this->lstResources;
				case 'ResourceLabel':
					if (!$this->lblResources) return $this->lblResources_Create();
					return $this->lblResources;
				case 'ScorecardControl':
					if (!$this->lstScorecards) return $this->lstScorecards_Create();
					return $this->lstScorecards;
				case 'ScorecardLabel':
					if (!$this->lblScorecards) return $this->lblScorecards_Create();
					return $this->lblScorecards;
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
			try {
				switch ($strName) {
					// Controls that point to User fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'LoginIdControl':
						return ($this->lstLogin = QType::Cast($mixValue, 'QControl'));
					case 'FirstNameControl':
						return ($this->txtFirstName = QType::Cast($mixValue, 'QControl'));
					case 'LastNameControl':
						return ($this->txtLastName = QType::Cast($mixValue, 'QControl'));
					case 'EmailControl':
						return ($this->txtEmail = QType::Cast($mixValue, 'QControl'));
					case 'GenderControl':
						return ($this->chkGender = QType::Cast($mixValue, 'QControl'));
					case 'CountryIdControl':
						return ($this->lstCountry = QType::Cast($mixValue, 'QControl'));
					case 'DepartmentControl':
						return ($this->txtDepartment = QType::Cast($mixValue, 'QControl'));
					case 'TitleIdControl':
						return ($this->lstTitle = QType::Cast($mixValue, 'QControl'));
					case 'TenureIdControl':
						return ($this->lstTenure = QType::Cast($mixValue, 'QControl'));
					case 'CareerLengthControl':
						return ($this->txtCareerLength = QType::Cast($mixValue, 'QControl'));
					case 'OptInControl':
						return ($this->chkOptIn = QType::Cast($mixValue, 'QControl'));
					case 'GroupAssessmentListAsAssessmentManagerControl':
						return ($this->lstGroupAssessmentListsAsAssessmentManager = QType::Cast($mixValue, 'QControl'));
					case 'BusinessChecklistAsManagerControl':
						return ($this->lstBusinessChecklistsAsManager = QType::Cast($mixValue, 'QControl'));
					case 'CompanyControl':
						return ($this->lstCompanies = QType::Cast($mixValue, 'QControl'));
					case 'ResourceControl':
						return ($this->lstResources = QType::Cast($mixValue, 'QControl'));
					case 'ScorecardControl':
						return ($this->lstScorecards = QType::Cast($mixValue, 'QControl'));
					default:
						return parent::__set($strName, $mixValue);
				}
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}
	}
?>