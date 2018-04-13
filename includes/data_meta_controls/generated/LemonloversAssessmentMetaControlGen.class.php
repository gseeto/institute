<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the LemonloversAssessment class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single LemonloversAssessment object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a LemonloversAssessmentMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read LemonloversAssessment $LemonloversAssessment the actual LemonloversAssessment data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $UserIdControl
	 * property-read QLabel $UserIdLabel
	 * property QListBox $CompanyIdControl
	 * property-read QLabel $CompanyIdLabel
	 * property QListBox $ResourceIdControl
	 * property-read QLabel $ResourceIdLabel
	 * property QIntegerTextBox $ResourceStatusIdControl
	 * property-read QLabel $ResourceStatusIdLabel
	 * property QListBox $GroupIdControl
	 * property-read QLabel $GroupIdLabel
	 * property QIntegerTextBox $LControl
	 * property-read QLabel $LLabel
	 * property QIntegerTextBox $EControl
	 * property-read QLabel $ELabel
	 * property QIntegerTextBox $MControl
	 * property-read QLabel $MLabel
	 * property QIntegerTextBox $OControl
	 * property-read QLabel $OLabel
	 * property QIntegerTextBox $NControl
	 * property-read QLabel $NLabel
	 * property QDateTimePicker $DateModifiedControl
	 * property-read QLabel $DateModifiedLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class LemonloversAssessmentMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var LemonloversAssessment objLemonloversAssessment
		 * @access protected
		 */
		protected $objLemonloversAssessment;

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

		// Controls that allow the editing of LemonloversAssessment's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QListBox lstUser;
         * @access protected
         */
		protected $lstUser;

        /**
         * @var QListBox lstCompany;
         * @access protected
         */
		protected $lstCompany;

        /**
         * @var QListBox lstResource;
         * @access protected
         */
		protected $lstResource;

        /**
         * @var QIntegerTextBox txtResourceStatusId;
         * @access protected
         */
		protected $txtResourceStatusId;

        /**
         * @var QListBox lstGroup;
         * @access protected
         */
		protected $lstGroup;

        /**
         * @var QIntegerTextBox txtL;
         * @access protected
         */
		protected $txtL;

        /**
         * @var QIntegerTextBox txtE;
         * @access protected
         */
		protected $txtE;

        /**
         * @var QIntegerTextBox txtM;
         * @access protected
         */
		protected $txtM;

        /**
         * @var QIntegerTextBox txtO;
         * @access protected
         */
		protected $txtO;

        /**
         * @var QIntegerTextBox txtN;
         * @access protected
         */
		protected $txtN;

        /**
         * @var QDateTimePicker calDateModified;
         * @access protected
         */
		protected $calDateModified;


		// Controls that allow the viewing of LemonloversAssessment's individual data fields
        /**
         * @var QLabel lblUserId
         * @access protected
         */
		protected $lblUserId;

        /**
         * @var QLabel lblCompanyId
         * @access protected
         */
		protected $lblCompanyId;

        /**
         * @var QLabel lblResourceId
         * @access protected
         */
		protected $lblResourceId;

        /**
         * @var QLabel lblResourceStatusId
         * @access protected
         */
		protected $lblResourceStatusId;

        /**
         * @var QLabel lblGroupId
         * @access protected
         */
		protected $lblGroupId;

        /**
         * @var QLabel lblL
         * @access protected
         */
		protected $lblL;

        /**
         * @var QLabel lblE
         * @access protected
         */
		protected $lblE;

        /**
         * @var QLabel lblM
         * @access protected
         */
		protected $lblM;

        /**
         * @var QLabel lblO
         * @access protected
         */
		protected $lblO;

        /**
         * @var QLabel lblN
         * @access protected
         */
		protected $lblN;

        /**
         * @var QLabel lblDateModified
         * @access protected
         */
		protected $lblDateModified;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * LemonloversAssessmentMetaControl to edit a single LemonloversAssessment object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single LemonloversAssessment object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this LemonloversAssessmentMetaControl
		 * @param LemonloversAssessment $objLemonloversAssessment new or existing LemonloversAssessment object
		 */
		 public function __construct($objParentObject, LemonloversAssessment $objLemonloversAssessment) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this LemonloversAssessmentMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked LemonloversAssessment object
			$this->objLemonloversAssessment = $objLemonloversAssessment;

			// Figure out if we're Editing or Creating New
			if ($this->objLemonloversAssessment->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this LemonloversAssessmentMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing LemonloversAssessment object creation - defaults to CreateOrEdit
 		 * @return LemonloversAssessmentMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objLemonloversAssessment = LemonloversAssessment::Load($intId);

				// LemonloversAssessment was found -- return it!
				if ($objLemonloversAssessment)
					return new LemonloversAssessmentMetaControl($objParentObject, $objLemonloversAssessment);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a LemonloversAssessment object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new LemonloversAssessmentMetaControl($objParentObject, new LemonloversAssessment());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this LemonloversAssessmentMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing LemonloversAssessment object creation - defaults to CreateOrEdit
		 * @return LemonloversAssessmentMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return LemonloversAssessmentMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this LemonloversAssessmentMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing LemonloversAssessment object creation - defaults to CreateOrEdit
		 * @return LemonloversAssessmentMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return LemonloversAssessmentMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objLemonloversAssessment->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QListBox lstUser
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstUser_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstUser = new QListBox($this->objParentObject, $strControlId);
			$this->lstUser->Name = QApplication::Translate('User');
			$this->lstUser->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objUserCursor = User::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objUser = User::InstantiateCursor($objUserCursor)) {
				$objListItem = new QListItem($objUser->__toString(), $objUser->Id);
				if (($this->objLemonloversAssessment->User) && ($this->objLemonloversAssessment->User->Id == $objUser->Id))
					$objListItem->Selected = true;
				$this->lstUser->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstUser;
		}

		/**
		 * Create and setup QLabel lblUserId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblUserId_Create($strControlId = null) {
			$this->lblUserId = new QLabel($this->objParentObject, $strControlId);
			$this->lblUserId->Name = QApplication::Translate('User');
			$this->lblUserId->Text = ($this->objLemonloversAssessment->User) ? $this->objLemonloversAssessment->User->__toString() : null;
			return $this->lblUserId;
		}

		/**
		 * Create and setup QListBox lstCompany
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstCompany_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstCompany = new QListBox($this->objParentObject, $strControlId);
			$this->lstCompany->Name = QApplication::Translate('Company');
			$this->lstCompany->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objCompanyCursor = Company::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objCompany = Company::InstantiateCursor($objCompanyCursor)) {
				$objListItem = new QListItem($objCompany->__toString(), $objCompany->Id);
				if (($this->objLemonloversAssessment->Company) && ($this->objLemonloversAssessment->Company->Id == $objCompany->Id))
					$objListItem->Selected = true;
				$this->lstCompany->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstCompany;
		}

		/**
		 * Create and setup QLabel lblCompanyId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCompanyId_Create($strControlId = null) {
			$this->lblCompanyId = new QLabel($this->objParentObject, $strControlId);
			$this->lblCompanyId->Name = QApplication::Translate('Company');
			$this->lblCompanyId->Text = ($this->objLemonloversAssessment->Company) ? $this->objLemonloversAssessment->Company->__toString() : null;
			return $this->lblCompanyId;
		}

		/**
		 * Create and setup QListBox lstResource
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstResource_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstResource = new QListBox($this->objParentObject, $strControlId);
			$this->lstResource->Name = QApplication::Translate('Resource');
			$this->lstResource->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objResourceCursor = Resource::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objResource = Resource::InstantiateCursor($objResourceCursor)) {
				$objListItem = new QListItem($objResource->__toString(), $objResource->Id);
				if (($this->objLemonloversAssessment->Resource) && ($this->objLemonloversAssessment->Resource->Id == $objResource->Id))
					$objListItem->Selected = true;
				$this->lstResource->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstResource;
		}

		/**
		 * Create and setup QLabel lblResourceId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblResourceId_Create($strControlId = null) {
			$this->lblResourceId = new QLabel($this->objParentObject, $strControlId);
			$this->lblResourceId->Name = QApplication::Translate('Resource');
			$this->lblResourceId->Text = ($this->objLemonloversAssessment->Resource) ? $this->objLemonloversAssessment->Resource->__toString() : null;
			return $this->lblResourceId;
		}

		/**
		 * Create and setup QIntegerTextBox txtResourceStatusId
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtResourceStatusId_Create($strControlId = null) {
			$this->txtResourceStatusId = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtResourceStatusId->Name = QApplication::Translate('Resource Status Id');
			$this->txtResourceStatusId->Text = $this->objLemonloversAssessment->ResourceStatusId;
			return $this->txtResourceStatusId;
		}

		/**
		 * Create and setup QLabel lblResourceStatusId
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblResourceStatusId_Create($strControlId = null, $strFormat = null) {
			$this->lblResourceStatusId = new QLabel($this->objParentObject, $strControlId);
			$this->lblResourceStatusId->Name = QApplication::Translate('Resource Status Id');
			$this->lblResourceStatusId->Text = $this->objLemonloversAssessment->ResourceStatusId;
			$this->lblResourceStatusId->Format = $strFormat;
			return $this->lblResourceStatusId;
		}

		/**
		 * Create and setup QListBox lstGroup
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstGroup_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstGroup = new QListBox($this->objParentObject, $strControlId);
			$this->lstGroup->Name = QApplication::Translate('Group');
			$this->lstGroup->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objGroupCursor = GroupAssessmentList::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objGroup = GroupAssessmentList::InstantiateCursor($objGroupCursor)) {
				$objListItem = new QListItem($objGroup->__toString(), $objGroup->Id);
				if (($this->objLemonloversAssessment->Group) && ($this->objLemonloversAssessment->Group->Id == $objGroup->Id))
					$objListItem->Selected = true;
				$this->lstGroup->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstGroup;
		}

		/**
		 * Create and setup QLabel lblGroupId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblGroupId_Create($strControlId = null) {
			$this->lblGroupId = new QLabel($this->objParentObject, $strControlId);
			$this->lblGroupId->Name = QApplication::Translate('Group');
			$this->lblGroupId->Text = ($this->objLemonloversAssessment->Group) ? $this->objLemonloversAssessment->Group->__toString() : null;
			return $this->lblGroupId;
		}

		/**
		 * Create and setup QIntegerTextBox txtL
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtL_Create($strControlId = null) {
			$this->txtL = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtL->Name = QApplication::Translate('L');
			$this->txtL->Text = $this->objLemonloversAssessment->L;
			return $this->txtL;
		}

		/**
		 * Create and setup QLabel lblL
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblL_Create($strControlId = null, $strFormat = null) {
			$this->lblL = new QLabel($this->objParentObject, $strControlId);
			$this->lblL->Name = QApplication::Translate('L');
			$this->lblL->Text = $this->objLemonloversAssessment->L;
			$this->lblL->Format = $strFormat;
			return $this->lblL;
		}

		/**
		 * Create and setup QIntegerTextBox txtE
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtE_Create($strControlId = null) {
			$this->txtE = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtE->Name = QApplication::Translate('E');
			$this->txtE->Text = $this->objLemonloversAssessment->E;
			return $this->txtE;
		}

		/**
		 * Create and setup QLabel lblE
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblE_Create($strControlId = null, $strFormat = null) {
			$this->lblE = new QLabel($this->objParentObject, $strControlId);
			$this->lblE->Name = QApplication::Translate('E');
			$this->lblE->Text = $this->objLemonloversAssessment->E;
			$this->lblE->Format = $strFormat;
			return $this->lblE;
		}

		/**
		 * Create and setup QIntegerTextBox txtM
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtM_Create($strControlId = null) {
			$this->txtM = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtM->Name = QApplication::Translate('M');
			$this->txtM->Text = $this->objLemonloversAssessment->M;
			return $this->txtM;
		}

		/**
		 * Create and setup QLabel lblM
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblM_Create($strControlId = null, $strFormat = null) {
			$this->lblM = new QLabel($this->objParentObject, $strControlId);
			$this->lblM->Name = QApplication::Translate('M');
			$this->lblM->Text = $this->objLemonloversAssessment->M;
			$this->lblM->Format = $strFormat;
			return $this->lblM;
		}

		/**
		 * Create and setup QIntegerTextBox txtO
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtO_Create($strControlId = null) {
			$this->txtO = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtO->Name = QApplication::Translate('O');
			$this->txtO->Text = $this->objLemonloversAssessment->O;
			return $this->txtO;
		}

		/**
		 * Create and setup QLabel lblO
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblO_Create($strControlId = null, $strFormat = null) {
			$this->lblO = new QLabel($this->objParentObject, $strControlId);
			$this->lblO->Name = QApplication::Translate('O');
			$this->lblO->Text = $this->objLemonloversAssessment->O;
			$this->lblO->Format = $strFormat;
			return $this->lblO;
		}

		/**
		 * Create and setup QIntegerTextBox txtN
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtN_Create($strControlId = null) {
			$this->txtN = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtN->Name = QApplication::Translate('N');
			$this->txtN->Text = $this->objLemonloversAssessment->N;
			return $this->txtN;
		}

		/**
		 * Create and setup QLabel lblN
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblN_Create($strControlId = null, $strFormat = null) {
			$this->lblN = new QLabel($this->objParentObject, $strControlId);
			$this->lblN->Name = QApplication::Translate('N');
			$this->lblN->Text = $this->objLemonloversAssessment->N;
			$this->lblN->Format = $strFormat;
			return $this->lblN;
		}

		/**
		 * Create and setup QDateTimePicker calDateModified
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calDateModified_Create($strControlId = null) {
			$this->calDateModified = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calDateModified->Name = QApplication::Translate('Date Modified');
			$this->calDateModified->DateTime = $this->objLemonloversAssessment->DateModified;
			$this->calDateModified->DateTimePickerType = QDateTimePickerType::Date;
			return $this->calDateModified;
		}

		/**
		 * Create and setup QLabel lblDateModified
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblDateModified_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblDateModified = new QLabel($this->objParentObject, $strControlId);
			$this->lblDateModified->Name = QApplication::Translate('Date Modified');
			$this->strDateModifiedDateTimeFormat = $strDateTimeFormat;
			$this->lblDateModified->Text = sprintf($this->objLemonloversAssessment->DateModified) ? $this->objLemonloversAssessment->DateModified->__toString($this->strDateModifiedDateTimeFormat) : null;
			return $this->lblDateModified;
		}

		protected $strDateModifiedDateTimeFormat;



		/**
		 * Refresh this MetaControl with Data from the local LemonloversAssessment object.
		 * @param boolean $blnReload reload LemonloversAssessment from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objLemonloversAssessment->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objLemonloversAssessment->Id;

			if ($this->lstUser) {
					$this->lstUser->RemoveAllItems();
				$this->lstUser->AddItem(QApplication::Translate('- Select One -'), null);
				$objUserArray = User::LoadAll();
				if ($objUserArray) foreach ($objUserArray as $objUser) {
					$objListItem = new QListItem($objUser->__toString(), $objUser->Id);
					if (($this->objLemonloversAssessment->User) && ($this->objLemonloversAssessment->User->Id == $objUser->Id))
						$objListItem->Selected = true;
					$this->lstUser->AddItem($objListItem);
				}
			}
			if ($this->lblUserId) $this->lblUserId->Text = ($this->objLemonloversAssessment->User) ? $this->objLemonloversAssessment->User->__toString() : null;

			if ($this->lstCompany) {
					$this->lstCompany->RemoveAllItems();
				$this->lstCompany->AddItem(QApplication::Translate('- Select One -'), null);
				$objCompanyArray = Company::LoadAll();
				if ($objCompanyArray) foreach ($objCompanyArray as $objCompany) {
					$objListItem = new QListItem($objCompany->__toString(), $objCompany->Id);
					if (($this->objLemonloversAssessment->Company) && ($this->objLemonloversAssessment->Company->Id == $objCompany->Id))
						$objListItem->Selected = true;
					$this->lstCompany->AddItem($objListItem);
				}
			}
			if ($this->lblCompanyId) $this->lblCompanyId->Text = ($this->objLemonloversAssessment->Company) ? $this->objLemonloversAssessment->Company->__toString() : null;

			if ($this->lstResource) {
					$this->lstResource->RemoveAllItems();
				$this->lstResource->AddItem(QApplication::Translate('- Select One -'), null);
				$objResourceArray = Resource::LoadAll();
				if ($objResourceArray) foreach ($objResourceArray as $objResource) {
					$objListItem = new QListItem($objResource->__toString(), $objResource->Id);
					if (($this->objLemonloversAssessment->Resource) && ($this->objLemonloversAssessment->Resource->Id == $objResource->Id))
						$objListItem->Selected = true;
					$this->lstResource->AddItem($objListItem);
				}
			}
			if ($this->lblResourceId) $this->lblResourceId->Text = ($this->objLemonloversAssessment->Resource) ? $this->objLemonloversAssessment->Resource->__toString() : null;

			if ($this->txtResourceStatusId) $this->txtResourceStatusId->Text = $this->objLemonloversAssessment->ResourceStatusId;
			if ($this->lblResourceStatusId) $this->lblResourceStatusId->Text = $this->objLemonloversAssessment->ResourceStatusId;

			if ($this->lstGroup) {
					$this->lstGroup->RemoveAllItems();
				$this->lstGroup->AddItem(QApplication::Translate('- Select One -'), null);
				$objGroupArray = GroupAssessmentList::LoadAll();
				if ($objGroupArray) foreach ($objGroupArray as $objGroup) {
					$objListItem = new QListItem($objGroup->__toString(), $objGroup->Id);
					if (($this->objLemonloversAssessment->Group) && ($this->objLemonloversAssessment->Group->Id == $objGroup->Id))
						$objListItem->Selected = true;
					$this->lstGroup->AddItem($objListItem);
				}
			}
			if ($this->lblGroupId) $this->lblGroupId->Text = ($this->objLemonloversAssessment->Group) ? $this->objLemonloversAssessment->Group->__toString() : null;

			if ($this->txtL) $this->txtL->Text = $this->objLemonloversAssessment->L;
			if ($this->lblL) $this->lblL->Text = $this->objLemonloversAssessment->L;

			if ($this->txtE) $this->txtE->Text = $this->objLemonloversAssessment->E;
			if ($this->lblE) $this->lblE->Text = $this->objLemonloversAssessment->E;

			if ($this->txtM) $this->txtM->Text = $this->objLemonloversAssessment->M;
			if ($this->lblM) $this->lblM->Text = $this->objLemonloversAssessment->M;

			if ($this->txtO) $this->txtO->Text = $this->objLemonloversAssessment->O;
			if ($this->lblO) $this->lblO->Text = $this->objLemonloversAssessment->O;

			if ($this->txtN) $this->txtN->Text = $this->objLemonloversAssessment->N;
			if ($this->lblN) $this->lblN->Text = $this->objLemonloversAssessment->N;

			if ($this->calDateModified) $this->calDateModified->DateTime = $this->objLemonloversAssessment->DateModified;
			if ($this->lblDateModified) $this->lblDateModified->Text = sprintf($this->objLemonloversAssessment->DateModified) ? $this->objLemonloversAssessment->__toString($this->strDateModifiedDateTimeFormat) : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC LEMONLOVERSASSESSMENT OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's LemonloversAssessment instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveLemonloversAssessment() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstUser) $this->objLemonloversAssessment->UserId = $this->lstUser->SelectedValue;
				if ($this->lstCompany) $this->objLemonloversAssessment->CompanyId = $this->lstCompany->SelectedValue;
				if ($this->lstResource) $this->objLemonloversAssessment->ResourceId = $this->lstResource->SelectedValue;
				if ($this->txtResourceStatusId) $this->objLemonloversAssessment->ResourceStatusId = $this->txtResourceStatusId->Text;
				if ($this->lstGroup) $this->objLemonloversAssessment->GroupId = $this->lstGroup->SelectedValue;
				if ($this->txtL) $this->objLemonloversAssessment->L = $this->txtL->Text;
				if ($this->txtE) $this->objLemonloversAssessment->E = $this->txtE->Text;
				if ($this->txtM) $this->objLemonloversAssessment->M = $this->txtM->Text;
				if ($this->txtO) $this->objLemonloversAssessment->O = $this->txtO->Text;
				if ($this->txtN) $this->objLemonloversAssessment->N = $this->txtN->Text;
				if ($this->calDateModified) $this->objLemonloversAssessment->DateModified = $this->calDateModified->DateTime;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the LemonloversAssessment object
				$this->objLemonloversAssessment->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's LemonloversAssessment instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteLemonloversAssessment() {
			$this->objLemonloversAssessment->Delete();
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
				case 'LemonloversAssessment': return $this->objLemonloversAssessment;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to LemonloversAssessment fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'UserIdControl':
					if (!$this->lstUser) return $this->lstUser_Create();
					return $this->lstUser;
				case 'UserIdLabel':
					if (!$this->lblUserId) return $this->lblUserId_Create();
					return $this->lblUserId;
				case 'CompanyIdControl':
					if (!$this->lstCompany) return $this->lstCompany_Create();
					return $this->lstCompany;
				case 'CompanyIdLabel':
					if (!$this->lblCompanyId) return $this->lblCompanyId_Create();
					return $this->lblCompanyId;
				case 'ResourceIdControl':
					if (!$this->lstResource) return $this->lstResource_Create();
					return $this->lstResource;
				case 'ResourceIdLabel':
					if (!$this->lblResourceId) return $this->lblResourceId_Create();
					return $this->lblResourceId;
				case 'ResourceStatusIdControl':
					if (!$this->txtResourceStatusId) return $this->txtResourceStatusId_Create();
					return $this->txtResourceStatusId;
				case 'ResourceStatusIdLabel':
					if (!$this->lblResourceStatusId) return $this->lblResourceStatusId_Create();
					return $this->lblResourceStatusId;
				case 'GroupIdControl':
					if (!$this->lstGroup) return $this->lstGroup_Create();
					return $this->lstGroup;
				case 'GroupIdLabel':
					if (!$this->lblGroupId) return $this->lblGroupId_Create();
					return $this->lblGroupId;
				case 'LControl':
					if (!$this->txtL) return $this->txtL_Create();
					return $this->txtL;
				case 'LLabel':
					if (!$this->lblL) return $this->lblL_Create();
					return $this->lblL;
				case 'EControl':
					if (!$this->txtE) return $this->txtE_Create();
					return $this->txtE;
				case 'ELabel':
					if (!$this->lblE) return $this->lblE_Create();
					return $this->lblE;
				case 'MControl':
					if (!$this->txtM) return $this->txtM_Create();
					return $this->txtM;
				case 'MLabel':
					if (!$this->lblM) return $this->lblM_Create();
					return $this->lblM;
				case 'OControl':
					if (!$this->txtO) return $this->txtO_Create();
					return $this->txtO;
				case 'OLabel':
					if (!$this->lblO) return $this->lblO_Create();
					return $this->lblO;
				case 'NControl':
					if (!$this->txtN) return $this->txtN_Create();
					return $this->txtN;
				case 'NLabel':
					if (!$this->lblN) return $this->lblN_Create();
					return $this->lblN;
				case 'DateModifiedControl':
					if (!$this->calDateModified) return $this->calDateModified_Create();
					return $this->calDateModified;
				case 'DateModifiedLabel':
					if (!$this->lblDateModified) return $this->lblDateModified_Create();
					return $this->lblDateModified;
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
					// Controls that point to LemonloversAssessment fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'UserIdControl':
						return ($this->lstUser = QType::Cast($mixValue, 'QControl'));
					case 'CompanyIdControl':
						return ($this->lstCompany = QType::Cast($mixValue, 'QControl'));
					case 'ResourceIdControl':
						return ($this->lstResource = QType::Cast($mixValue, 'QControl'));
					case 'ResourceStatusIdControl':
						return ($this->txtResourceStatusId = QType::Cast($mixValue, 'QControl'));
					case 'GroupIdControl':
						return ($this->lstGroup = QType::Cast($mixValue, 'QControl'));
					case 'LControl':
						return ($this->txtL = QType::Cast($mixValue, 'QControl'));
					case 'EControl':
						return ($this->txtE = QType::Cast($mixValue, 'QControl'));
					case 'MControl':
						return ($this->txtM = QType::Cast($mixValue, 'QControl'));
					case 'OControl':
						return ($this->txtO = QType::Cast($mixValue, 'QControl'));
					case 'NControl':
						return ($this->txtN = QType::Cast($mixValue, 'QControl'));
					case 'DateModifiedControl':
						return ($this->calDateModified = QType::Cast($mixValue, 'QControl'));
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