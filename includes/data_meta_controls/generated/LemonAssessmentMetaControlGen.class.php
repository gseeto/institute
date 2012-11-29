<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the LemonAssessment class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single LemonAssessment object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a LemonAssessmentMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read LemonAssessment $LemonAssessment the actual LemonAssessment data class being edited
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
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class LemonAssessmentMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var LemonAssessment objLemonAssessment
		 * @access protected
		 */
		protected $objLemonAssessment;

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

		// Controls that allow the editing of LemonAssessment's individual data fields
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


		// Controls that allow the viewing of LemonAssessment's individual data fields
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


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * LemonAssessmentMetaControl to edit a single LemonAssessment object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single LemonAssessment object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this LemonAssessmentMetaControl
		 * @param LemonAssessment $objLemonAssessment new or existing LemonAssessment object
		 */
		 public function __construct($objParentObject, LemonAssessment $objLemonAssessment) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this LemonAssessmentMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked LemonAssessment object
			$this->objLemonAssessment = $objLemonAssessment;

			// Figure out if we're Editing or Creating New
			if ($this->objLemonAssessment->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this LemonAssessmentMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing LemonAssessment object creation - defaults to CreateOrEdit
 		 * @return LemonAssessmentMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objLemonAssessment = LemonAssessment::Load($intId);

				// LemonAssessment was found -- return it!
				if ($objLemonAssessment)
					return new LemonAssessmentMetaControl($objParentObject, $objLemonAssessment);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a LemonAssessment object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new LemonAssessmentMetaControl($objParentObject, new LemonAssessment());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this LemonAssessmentMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing LemonAssessment object creation - defaults to CreateOrEdit
		 * @return LemonAssessmentMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return LemonAssessmentMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this LemonAssessmentMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing LemonAssessment object creation - defaults to CreateOrEdit
		 * @return LemonAssessmentMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return LemonAssessmentMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objLemonAssessment->Id;
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
				if (($this->objLemonAssessment->User) && ($this->objLemonAssessment->User->Id == $objUser->Id))
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
			$this->lblUserId->Text = ($this->objLemonAssessment->User) ? $this->objLemonAssessment->User->__toString() : null;
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
				if (($this->objLemonAssessment->Company) && ($this->objLemonAssessment->Company->Id == $objCompany->Id))
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
			$this->lblCompanyId->Text = ($this->objLemonAssessment->Company) ? $this->objLemonAssessment->Company->__toString() : null;
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
				if (($this->objLemonAssessment->Resource) && ($this->objLemonAssessment->Resource->Id == $objResource->Id))
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
			$this->lblResourceId->Text = ($this->objLemonAssessment->Resource) ? $this->objLemonAssessment->Resource->__toString() : null;
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
			$this->txtResourceStatusId->Text = $this->objLemonAssessment->ResourceStatusId;
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
			$this->lblResourceStatusId->Text = $this->objLemonAssessment->ResourceStatusId;
			$this->lblResourceStatusId->Format = $strFormat;
			return $this->lblResourceStatusId;
		}



		/**
		 * Refresh this MetaControl with Data from the local LemonAssessment object.
		 * @param boolean $blnReload reload LemonAssessment from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objLemonAssessment->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objLemonAssessment->Id;

			if ($this->lstUser) {
					$this->lstUser->RemoveAllItems();
				$this->lstUser->AddItem(QApplication::Translate('- Select One -'), null);
				$objUserArray = User::LoadAll();
				if ($objUserArray) foreach ($objUserArray as $objUser) {
					$objListItem = new QListItem($objUser->__toString(), $objUser->Id);
					if (($this->objLemonAssessment->User) && ($this->objLemonAssessment->User->Id == $objUser->Id))
						$objListItem->Selected = true;
					$this->lstUser->AddItem($objListItem);
				}
			}
			if ($this->lblUserId) $this->lblUserId->Text = ($this->objLemonAssessment->User) ? $this->objLemonAssessment->User->__toString() : null;

			if ($this->lstCompany) {
					$this->lstCompany->RemoveAllItems();
				$this->lstCompany->AddItem(QApplication::Translate('- Select One -'), null);
				$objCompanyArray = Company::LoadAll();
				if ($objCompanyArray) foreach ($objCompanyArray as $objCompany) {
					$objListItem = new QListItem($objCompany->__toString(), $objCompany->Id);
					if (($this->objLemonAssessment->Company) && ($this->objLemonAssessment->Company->Id == $objCompany->Id))
						$objListItem->Selected = true;
					$this->lstCompany->AddItem($objListItem);
				}
			}
			if ($this->lblCompanyId) $this->lblCompanyId->Text = ($this->objLemonAssessment->Company) ? $this->objLemonAssessment->Company->__toString() : null;

			if ($this->lstResource) {
					$this->lstResource->RemoveAllItems();
				$this->lstResource->AddItem(QApplication::Translate('- Select One -'), null);
				$objResourceArray = Resource::LoadAll();
				if ($objResourceArray) foreach ($objResourceArray as $objResource) {
					$objListItem = new QListItem($objResource->__toString(), $objResource->Id);
					if (($this->objLemonAssessment->Resource) && ($this->objLemonAssessment->Resource->Id == $objResource->Id))
						$objListItem->Selected = true;
					$this->lstResource->AddItem($objListItem);
				}
			}
			if ($this->lblResourceId) $this->lblResourceId->Text = ($this->objLemonAssessment->Resource) ? $this->objLemonAssessment->Resource->__toString() : null;

			if ($this->txtResourceStatusId) $this->txtResourceStatusId->Text = $this->objLemonAssessment->ResourceStatusId;
			if ($this->lblResourceStatusId) $this->lblResourceStatusId->Text = $this->objLemonAssessment->ResourceStatusId;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC LEMONASSESSMENT OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's LemonAssessment instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveLemonAssessment() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstUser) $this->objLemonAssessment->UserId = $this->lstUser->SelectedValue;
				if ($this->lstCompany) $this->objLemonAssessment->CompanyId = $this->lstCompany->SelectedValue;
				if ($this->lstResource) $this->objLemonAssessment->ResourceId = $this->lstResource->SelectedValue;
				if ($this->txtResourceStatusId) $this->objLemonAssessment->ResourceStatusId = $this->txtResourceStatusId->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the LemonAssessment object
				$this->objLemonAssessment->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's LemonAssessment instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteLemonAssessment() {
			$this->objLemonAssessment->Delete();
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
				case 'LemonAssessment': return $this->objLemonAssessment;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to LemonAssessment fields -- will be created dynamically if not yet created
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
					// Controls that point to LemonAssessment fields
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