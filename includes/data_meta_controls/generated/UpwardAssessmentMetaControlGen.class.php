<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the UpwardAssessment class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single UpwardAssessment object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a UpwardAssessmentMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read UpwardAssessment $UpwardAssessment the actual UpwardAssessment data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QIntegerTextBox $ResourceStatusIdControl
	 * property-read QLabel $ResourceStatusIdLabel
	 * property QIntegerTextBox $CompanyIdControl
	 * property-read QLabel $CompanyIdLabel
	 * property QIntegerTextBox $ResourceIdControl
	 * property-read QLabel $ResourceIdLabel
	 * property QListBox $UserIdControl
	 * property-read QLabel $UserIdLabel
	 * property QListBox $GroupIdControl
	 * property-read QLabel $GroupIdLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class UpwardAssessmentMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var UpwardAssessment objUpwardAssessment
		 * @access protected
		 */
		protected $objUpwardAssessment;

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

		// Controls that allow the editing of UpwardAssessment's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QIntegerTextBox txtResourceStatusId;
         * @access protected
         */
		protected $txtResourceStatusId;

        /**
         * @var QIntegerTextBox txtCompanyId;
         * @access protected
         */
		protected $txtCompanyId;

        /**
         * @var QIntegerTextBox txtResourceId;
         * @access protected
         */
		protected $txtResourceId;

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


		// Controls that allow the viewing of UpwardAssessment's individual data fields
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
		 * UpwardAssessmentMetaControl to edit a single UpwardAssessment object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single UpwardAssessment object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this UpwardAssessmentMetaControl
		 * @param UpwardAssessment $objUpwardAssessment new or existing UpwardAssessment object
		 */
		 public function __construct($objParentObject, UpwardAssessment $objUpwardAssessment) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this UpwardAssessmentMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked UpwardAssessment object
			$this->objUpwardAssessment = $objUpwardAssessment;

			// Figure out if we're Editing or Creating New
			if ($this->objUpwardAssessment->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this UpwardAssessmentMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing UpwardAssessment object creation - defaults to CreateOrEdit
 		 * @return UpwardAssessmentMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objUpwardAssessment = UpwardAssessment::Load($intId);

				// UpwardAssessment was found -- return it!
				if ($objUpwardAssessment)
					return new UpwardAssessmentMetaControl($objParentObject, $objUpwardAssessment);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a UpwardAssessment object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new UpwardAssessmentMetaControl($objParentObject, new UpwardAssessment());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this UpwardAssessmentMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing UpwardAssessment object creation - defaults to CreateOrEdit
		 * @return UpwardAssessmentMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return UpwardAssessmentMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this UpwardAssessmentMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing UpwardAssessment object creation - defaults to CreateOrEdit
		 * @return UpwardAssessmentMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return UpwardAssessmentMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objUpwardAssessment->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QIntegerTextBox txtResourceStatusId
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtResourceStatusId_Create($strControlId = null) {
			$this->txtResourceStatusId = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtResourceStatusId->Name = QApplication::Translate('Resource Status Id');
			$this->txtResourceStatusId->Text = $this->objUpwardAssessment->ResourceStatusId;
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
			$this->lblResourceStatusId->Text = $this->objUpwardAssessment->ResourceStatusId;
			$this->lblResourceStatusId->Format = $strFormat;
			return $this->lblResourceStatusId;
		}

		/**
		 * Create and setup QIntegerTextBox txtCompanyId
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtCompanyId_Create($strControlId = null) {
			$this->txtCompanyId = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtCompanyId->Name = QApplication::Translate('Company Id');
			$this->txtCompanyId->Text = $this->objUpwardAssessment->CompanyId;
			return $this->txtCompanyId;
		}

		/**
		 * Create and setup QLabel lblCompanyId
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblCompanyId_Create($strControlId = null, $strFormat = null) {
			$this->lblCompanyId = new QLabel($this->objParentObject, $strControlId);
			$this->lblCompanyId->Name = QApplication::Translate('Company Id');
			$this->lblCompanyId->Text = $this->objUpwardAssessment->CompanyId;
			$this->lblCompanyId->Format = $strFormat;
			return $this->lblCompanyId;
		}

		/**
		 * Create and setup QIntegerTextBox txtResourceId
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtResourceId_Create($strControlId = null) {
			$this->txtResourceId = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtResourceId->Name = QApplication::Translate('Resource Id');
			$this->txtResourceId->Text = $this->objUpwardAssessment->ResourceId;
			return $this->txtResourceId;
		}

		/**
		 * Create and setup QLabel lblResourceId
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblResourceId_Create($strControlId = null, $strFormat = null) {
			$this->lblResourceId = new QLabel($this->objParentObject, $strControlId);
			$this->lblResourceId->Name = QApplication::Translate('Resource Id');
			$this->lblResourceId->Text = $this->objUpwardAssessment->ResourceId;
			$this->lblResourceId->Format = $strFormat;
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
				if (($this->objUpwardAssessment->User) && ($this->objUpwardAssessment->User->Id == $objUser->Id))
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
			$this->lblUserId->Text = ($this->objUpwardAssessment->User) ? $this->objUpwardAssessment->User->__toString() : null;
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
				if (($this->objUpwardAssessment->Group) && ($this->objUpwardAssessment->Group->Id == $objGroup->Id))
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
			$this->lblGroupId->Text = ($this->objUpwardAssessment->Group) ? $this->objUpwardAssessment->Group->__toString() : null;
			return $this->lblGroupId;
		}



		/**
		 * Refresh this MetaControl with Data from the local UpwardAssessment object.
		 * @param boolean $blnReload reload UpwardAssessment from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objUpwardAssessment->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objUpwardAssessment->Id;

			if ($this->txtResourceStatusId) $this->txtResourceStatusId->Text = $this->objUpwardAssessment->ResourceStatusId;
			if ($this->lblResourceStatusId) $this->lblResourceStatusId->Text = $this->objUpwardAssessment->ResourceStatusId;

			if ($this->txtCompanyId) $this->txtCompanyId->Text = $this->objUpwardAssessment->CompanyId;
			if ($this->lblCompanyId) $this->lblCompanyId->Text = $this->objUpwardAssessment->CompanyId;

			if ($this->txtResourceId) $this->txtResourceId->Text = $this->objUpwardAssessment->ResourceId;
			if ($this->lblResourceId) $this->lblResourceId->Text = $this->objUpwardAssessment->ResourceId;

			if ($this->lstUser) {
					$this->lstUser->RemoveAllItems();
				$this->lstUser->AddItem(QApplication::Translate('- Select One -'), null);
				$objUserArray = User::LoadAll();
				if ($objUserArray) foreach ($objUserArray as $objUser) {
					$objListItem = new QListItem($objUser->__toString(), $objUser->Id);
					if (($this->objUpwardAssessment->User) && ($this->objUpwardAssessment->User->Id == $objUser->Id))
						$objListItem->Selected = true;
					$this->lstUser->AddItem($objListItem);
				}
			}
			if ($this->lblUserId) $this->lblUserId->Text = ($this->objUpwardAssessment->User) ? $this->objUpwardAssessment->User->__toString() : null;

			if ($this->lstGroup) {
					$this->lstGroup->RemoveAllItems();
				$this->lstGroup->AddItem(QApplication::Translate('- Select One -'), null);
				$objGroupArray = GroupAssessmentList::LoadAll();
				if ($objGroupArray) foreach ($objGroupArray as $objGroup) {
					$objListItem = new QListItem($objGroup->__toString(), $objGroup->Id);
					if (($this->objUpwardAssessment->Group) && ($this->objUpwardAssessment->Group->Id == $objGroup->Id))
						$objListItem->Selected = true;
					$this->lstGroup->AddItem($objListItem);
				}
			}
			if ($this->lblGroupId) $this->lblGroupId->Text = ($this->objUpwardAssessment->Group) ? $this->objUpwardAssessment->Group->__toString() : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC UPWARDASSESSMENT OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's UpwardAssessment instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveUpwardAssessment() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtResourceStatusId) $this->objUpwardAssessment->ResourceStatusId = $this->txtResourceStatusId->Text;
				if ($this->txtCompanyId) $this->objUpwardAssessment->CompanyId = $this->txtCompanyId->Text;
				if ($this->txtResourceId) $this->objUpwardAssessment->ResourceId = $this->txtResourceId->Text;
				if ($this->lstUser) $this->objUpwardAssessment->UserId = $this->lstUser->SelectedValue;
				if ($this->lstGroup) $this->objUpwardAssessment->GroupId = $this->lstGroup->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the UpwardAssessment object
				$this->objUpwardAssessment->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's UpwardAssessment instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteUpwardAssessment() {
			$this->objUpwardAssessment->Delete();
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
				case 'UpwardAssessment': return $this->objUpwardAssessment;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to UpwardAssessment fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'ResourceStatusIdControl':
					if (!$this->txtResourceStatusId) return $this->txtResourceStatusId_Create();
					return $this->txtResourceStatusId;
				case 'ResourceStatusIdLabel':
					if (!$this->lblResourceStatusId) return $this->lblResourceStatusId_Create();
					return $this->lblResourceStatusId;
				case 'CompanyIdControl':
					if (!$this->txtCompanyId) return $this->txtCompanyId_Create();
					return $this->txtCompanyId;
				case 'CompanyIdLabel':
					if (!$this->lblCompanyId) return $this->lblCompanyId_Create();
					return $this->lblCompanyId;
				case 'ResourceIdControl':
					if (!$this->txtResourceId) return $this->txtResourceId_Create();
					return $this->txtResourceId;
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
					// Controls that point to UpwardAssessment fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'ResourceStatusIdControl':
						return ($this->txtResourceStatusId = QType::Cast($mixValue, 'QControl'));
					case 'CompanyIdControl':
						return ($this->txtCompanyId = QType::Cast($mixValue, 'QControl'));
					case 'ResourceIdControl':
						return ($this->txtResourceId = QType::Cast($mixValue, 'QControl'));
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