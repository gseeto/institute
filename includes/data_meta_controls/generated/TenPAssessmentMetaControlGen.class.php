<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the TenPAssessment class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single TenPAssessment object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a TenPAssessmentMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read TenPAssessment $TenPAssessment the actual TenPAssessment data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $ResourceStatusIdControl
	 * property-read QLabel $ResourceStatusIdLabel
	 * property QListBox $CompanyIdControl
	 * property-read QLabel $CompanyIdLabel
	 * property QListBox $ResourceIdControl
	 * property-read QLabel $ResourceIdLabel
	 * property QListBox $UserIdControl
	 * property-read QLabel $UserIdLabel
	 * property QListBox $GroupIdControl
	 * property-read QLabel $GroupIdLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class TenPAssessmentMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var TenPAssessment objTenPAssessment
		 * @access protected
		 */
		protected $objTenPAssessment;

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

		// Controls that allow the editing of TenPAssessment's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QListBox lstResourceStatus;
         * @access protected
         */
		protected $lstResourceStatus;

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
         * @var QListBox lstUser;
         * @access protected
         */
		protected $lstUser;

        /**
         * @var QListBox lstGroup;
         * @access protected
         */
		protected $lstGroup;


		// Controls that allow the viewing of TenPAssessment's individual data fields
        /**
         * @var QLabel lblResourceStatusId
         * @access protected
         */
		protected $lblResourceStatusId;

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
         * @var QLabel lblUserId
         * @access protected
         */
		protected $lblUserId;

        /**
         * @var QLabel lblGroupId
         * @access protected
         */
		protected $lblGroupId;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * TenPAssessmentMetaControl to edit a single TenPAssessment object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single TenPAssessment object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this TenPAssessmentMetaControl
		 * @param TenPAssessment $objTenPAssessment new or existing TenPAssessment object
		 */
		 public function __construct($objParentObject, TenPAssessment $objTenPAssessment) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this TenPAssessmentMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked TenPAssessment object
			$this->objTenPAssessment = $objTenPAssessment;

			// Figure out if we're Editing or Creating New
			if ($this->objTenPAssessment->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this TenPAssessmentMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing TenPAssessment object creation - defaults to CreateOrEdit
 		 * @return TenPAssessmentMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objTenPAssessment = TenPAssessment::Load($intId);

				// TenPAssessment was found -- return it!
				if ($objTenPAssessment)
					return new TenPAssessmentMetaControl($objParentObject, $objTenPAssessment);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a TenPAssessment object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new TenPAssessmentMetaControl($objParentObject, new TenPAssessment());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this TenPAssessmentMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing TenPAssessment object creation - defaults to CreateOrEdit
		 * @return TenPAssessmentMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return TenPAssessmentMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this TenPAssessmentMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing TenPAssessment object creation - defaults to CreateOrEdit
		 * @return TenPAssessmentMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return TenPAssessmentMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objTenPAssessment->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QListBox lstResourceStatus
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstResourceStatus_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstResourceStatus = new QListBox($this->objParentObject, $strControlId);
			$this->lstResourceStatus->Name = QApplication::Translate('Resource Status');
			$this->lstResourceStatus->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objResourceStatusCursor = ResourceStatus::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objResourceStatus = ResourceStatus::InstantiateCursor($objResourceStatusCursor)) {
				$objListItem = new QListItem($objResourceStatus->__toString(), $objResourceStatus->Id);
				if (($this->objTenPAssessment->ResourceStatus) && ($this->objTenPAssessment->ResourceStatus->Id == $objResourceStatus->Id))
					$objListItem->Selected = true;
				$this->lstResourceStatus->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstResourceStatus;
		}

		/**
		 * Create and setup QLabel lblResourceStatusId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblResourceStatusId_Create($strControlId = null) {
			$this->lblResourceStatusId = new QLabel($this->objParentObject, $strControlId);
			$this->lblResourceStatusId->Name = QApplication::Translate('Resource Status');
			$this->lblResourceStatusId->Text = ($this->objTenPAssessment->ResourceStatus) ? $this->objTenPAssessment->ResourceStatus->__toString() : null;
			return $this->lblResourceStatusId;
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
				if (($this->objTenPAssessment->Company) && ($this->objTenPAssessment->Company->Id == $objCompany->Id))
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
			$this->lblCompanyId->Text = ($this->objTenPAssessment->Company) ? $this->objTenPAssessment->Company->__toString() : null;
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
				if (($this->objTenPAssessment->Resource) && ($this->objTenPAssessment->Resource->Id == $objResource->Id))
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
			$this->lblResourceId->Text = ($this->objTenPAssessment->Resource) ? $this->objTenPAssessment->Resource->__toString() : null;
			return $this->lblResourceId;
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
				if (($this->objTenPAssessment->User) && ($this->objTenPAssessment->User->Id == $objUser->Id))
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
			$this->lblUserId->Text = ($this->objTenPAssessment->User) ? $this->objTenPAssessment->User->__toString() : null;
			return $this->lblUserId;
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
				if (($this->objTenPAssessment->Group) && ($this->objTenPAssessment->Group->Id == $objGroup->Id))
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
			$this->lblGroupId->Text = ($this->objTenPAssessment->Group) ? $this->objTenPAssessment->Group->__toString() : null;
			return $this->lblGroupId;
		}



		/**
		 * Refresh this MetaControl with Data from the local TenPAssessment object.
		 * @param boolean $blnReload reload TenPAssessment from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objTenPAssessment->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objTenPAssessment->Id;

			if ($this->lstResourceStatus) {
					$this->lstResourceStatus->RemoveAllItems();
				$this->lstResourceStatus->AddItem(QApplication::Translate('- Select One -'), null);
				$objResourceStatusArray = ResourceStatus::LoadAll();
				if ($objResourceStatusArray) foreach ($objResourceStatusArray as $objResourceStatus) {
					$objListItem = new QListItem($objResourceStatus->__toString(), $objResourceStatus->Id);
					if (($this->objTenPAssessment->ResourceStatus) && ($this->objTenPAssessment->ResourceStatus->Id == $objResourceStatus->Id))
						$objListItem->Selected = true;
					$this->lstResourceStatus->AddItem($objListItem);
				}
			}
			if ($this->lblResourceStatusId) $this->lblResourceStatusId->Text = ($this->objTenPAssessment->ResourceStatus) ? $this->objTenPAssessment->ResourceStatus->__toString() : null;

			if ($this->lstCompany) {
					$this->lstCompany->RemoveAllItems();
				$this->lstCompany->AddItem(QApplication::Translate('- Select One -'), null);
				$objCompanyArray = Company::LoadAll();
				if ($objCompanyArray) foreach ($objCompanyArray as $objCompany) {
					$objListItem = new QListItem($objCompany->__toString(), $objCompany->Id);
					if (($this->objTenPAssessment->Company) && ($this->objTenPAssessment->Company->Id == $objCompany->Id))
						$objListItem->Selected = true;
					$this->lstCompany->AddItem($objListItem);
				}
			}
			if ($this->lblCompanyId) $this->lblCompanyId->Text = ($this->objTenPAssessment->Company) ? $this->objTenPAssessment->Company->__toString() : null;

			if ($this->lstResource) {
					$this->lstResource->RemoveAllItems();
				$this->lstResource->AddItem(QApplication::Translate('- Select One -'), null);
				$objResourceArray = Resource::LoadAll();
				if ($objResourceArray) foreach ($objResourceArray as $objResource) {
					$objListItem = new QListItem($objResource->__toString(), $objResource->Id);
					if (($this->objTenPAssessment->Resource) && ($this->objTenPAssessment->Resource->Id == $objResource->Id))
						$objListItem->Selected = true;
					$this->lstResource->AddItem($objListItem);
				}
			}
			if ($this->lblResourceId) $this->lblResourceId->Text = ($this->objTenPAssessment->Resource) ? $this->objTenPAssessment->Resource->__toString() : null;

			if ($this->lstUser) {
					$this->lstUser->RemoveAllItems();
				$this->lstUser->AddItem(QApplication::Translate('- Select One -'), null);
				$objUserArray = User::LoadAll();
				if ($objUserArray) foreach ($objUserArray as $objUser) {
					$objListItem = new QListItem($objUser->__toString(), $objUser->Id);
					if (($this->objTenPAssessment->User) && ($this->objTenPAssessment->User->Id == $objUser->Id))
						$objListItem->Selected = true;
					$this->lstUser->AddItem($objListItem);
				}
			}
			if ($this->lblUserId) $this->lblUserId->Text = ($this->objTenPAssessment->User) ? $this->objTenPAssessment->User->__toString() : null;

			if ($this->lstGroup) {
					$this->lstGroup->RemoveAllItems();
				$this->lstGroup->AddItem(QApplication::Translate('- Select One -'), null);
				$objGroupArray = GroupAssessmentList::LoadAll();
				if ($objGroupArray) foreach ($objGroupArray as $objGroup) {
					$objListItem = new QListItem($objGroup->__toString(), $objGroup->Id);
					if (($this->objTenPAssessment->Group) && ($this->objTenPAssessment->Group->Id == $objGroup->Id))
						$objListItem->Selected = true;
					$this->lstGroup->AddItem($objListItem);
				}
			}
			if ($this->lblGroupId) $this->lblGroupId->Text = ($this->objTenPAssessment->Group) ? $this->objTenPAssessment->Group->__toString() : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC TENPASSESSMENT OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's TenPAssessment instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveTenPAssessment() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstResourceStatus) $this->objTenPAssessment->ResourceStatusId = $this->lstResourceStatus->SelectedValue;
				if ($this->lstCompany) $this->objTenPAssessment->CompanyId = $this->lstCompany->SelectedValue;
				if ($this->lstResource) $this->objTenPAssessment->ResourceId = $this->lstResource->SelectedValue;
				if ($this->lstUser) $this->objTenPAssessment->UserId = $this->lstUser->SelectedValue;
				if ($this->lstGroup) $this->objTenPAssessment->GroupId = $this->lstGroup->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the TenPAssessment object
				$this->objTenPAssessment->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's TenPAssessment instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteTenPAssessment() {
			$this->objTenPAssessment->Delete();
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
				case 'TenPAssessment': return $this->objTenPAssessment;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to TenPAssessment fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'ResourceStatusIdControl':
					if (!$this->lstResourceStatus) return $this->lstResourceStatus_Create();
					return $this->lstResourceStatus;
				case 'ResourceStatusIdLabel':
					if (!$this->lblResourceStatusId) return $this->lblResourceStatusId_Create();
					return $this->lblResourceStatusId;
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
				case 'UserIdControl':
					if (!$this->lstUser) return $this->lstUser_Create();
					return $this->lstUser;
				case 'UserIdLabel':
					if (!$this->lblUserId) return $this->lblUserId_Create();
					return $this->lblUserId;
				case 'GroupIdControl':
					if (!$this->lstGroup) return $this->lstGroup_Create();
					return $this->lstGroup;
				case 'GroupIdLabel':
					if (!$this->lblGroupId) return $this->lblGroupId_Create();
					return $this->lblGroupId;
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
					// Controls that point to TenPAssessment fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'ResourceStatusIdControl':
						return ($this->lstResourceStatus = QType::Cast($mixValue, 'QControl'));
					case 'CompanyIdControl':
						return ($this->lstCompany = QType::Cast($mixValue, 'QControl'));
					case 'ResourceIdControl':
						return ($this->lstResource = QType::Cast($mixValue, 'QControl'));
					case 'UserIdControl':
						return ($this->lstUser = QType::Cast($mixValue, 'QControl'));
					case 'GroupIdControl':
						return ($this->lstGroup = QType::Cast($mixValue, 'QControl'));
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