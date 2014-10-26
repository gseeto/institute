<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the GroupAssessmentList class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single GroupAssessmentList object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a GroupAssessmentListMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read GroupAssessmentList $GroupAssessmentList the actual GroupAssessmentList data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QIntegerTextBox $TotalKeysControl
	 * property-read QLabel $TotalKeysLabel
	 * property QIntegerTextBox $KeysLeftControl
	 * property-read QLabel $KeysLeftLabel
	 * property QListBox $ResourceIdControl
	 * property-read QLabel $ResourceIdLabel
	 * property QTextBox $KeyCodeControl
	 * property-read QLabel $KeyCodeLabel
	 * property QTextBox $DescriptionControl
	 * property-read QLabel $DescriptionLabel
	 * property QDateTimePicker $DateModifiedControl
	 * property-read QLabel $DateModifiedLabel
	 * property QListBox $UserAsAssessmentManagerControl
	 * property-read QLabel $UserAsAssessmentManagerLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class GroupAssessmentListMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var GroupAssessmentList objGroupAssessmentList
		 * @access protected
		 */
		protected $objGroupAssessmentList;

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

		// Controls that allow the editing of GroupAssessmentList's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QIntegerTextBox txtTotalKeys;
         * @access protected
         */
		protected $txtTotalKeys;

        /**
         * @var QIntegerTextBox txtKeysLeft;
         * @access protected
         */
		protected $txtKeysLeft;

        /**
         * @var QListBox lstResource;
         * @access protected
         */
		protected $lstResource;

        /**
         * @var QTextBox txtKeyCode;
         * @access protected
         */
		protected $txtKeyCode;

        /**
         * @var QTextBox txtDescription;
         * @access protected
         */
		protected $txtDescription;

        /**
         * @var QDateTimePicker calDateModified;
         * @access protected
         */
		protected $calDateModified;


		// Controls that allow the viewing of GroupAssessmentList's individual data fields
        /**
         * @var QLabel lblTotalKeys
         * @access protected
         */
		protected $lblTotalKeys;

        /**
         * @var QLabel lblKeysLeft
         * @access protected
         */
		protected $lblKeysLeft;

        /**
         * @var QLabel lblResourceId
         * @access protected
         */
		protected $lblResourceId;

        /**
         * @var QLabel lblKeyCode
         * @access protected
         */
		protected $lblKeyCode;

        /**
         * @var QLabel lblDescription
         * @access protected
         */
		protected $lblDescription;

        /**
         * @var QLabel lblDateModified
         * @access protected
         */
		protected $lblDateModified;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References
		protected $lstUsersAsAssessmentManager;


		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References
		protected $lblUsersAsAssessmentManager;



		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * GroupAssessmentListMetaControl to edit a single GroupAssessmentList object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single GroupAssessmentList object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this GroupAssessmentListMetaControl
		 * @param GroupAssessmentList $objGroupAssessmentList new or existing GroupAssessmentList object
		 */
		 public function __construct($objParentObject, GroupAssessmentList $objGroupAssessmentList) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this GroupAssessmentListMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked GroupAssessmentList object
			$this->objGroupAssessmentList = $objGroupAssessmentList;

			// Figure out if we're Editing or Creating New
			if ($this->objGroupAssessmentList->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this GroupAssessmentListMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing GroupAssessmentList object creation - defaults to CreateOrEdit
 		 * @return GroupAssessmentListMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objGroupAssessmentList = GroupAssessmentList::Load($intId);

				// GroupAssessmentList was found -- return it!
				if ($objGroupAssessmentList)
					return new GroupAssessmentListMetaControl($objParentObject, $objGroupAssessmentList);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a GroupAssessmentList object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new GroupAssessmentListMetaControl($objParentObject, new GroupAssessmentList());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this GroupAssessmentListMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing GroupAssessmentList object creation - defaults to CreateOrEdit
		 * @return GroupAssessmentListMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return GroupAssessmentListMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this GroupAssessmentListMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing GroupAssessmentList object creation - defaults to CreateOrEdit
		 * @return GroupAssessmentListMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return GroupAssessmentListMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objGroupAssessmentList->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QIntegerTextBox txtTotalKeys
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtTotalKeys_Create($strControlId = null) {
			$this->txtTotalKeys = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtTotalKeys->Name = QApplication::Translate('Total Keys');
			$this->txtTotalKeys->Text = $this->objGroupAssessmentList->TotalKeys;
			$this->txtTotalKeys->Required = true;
			return $this->txtTotalKeys;
		}

		/**
		 * Create and setup QLabel lblTotalKeys
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblTotalKeys_Create($strControlId = null, $strFormat = null) {
			$this->lblTotalKeys = new QLabel($this->objParentObject, $strControlId);
			$this->lblTotalKeys->Name = QApplication::Translate('Total Keys');
			$this->lblTotalKeys->Text = $this->objGroupAssessmentList->TotalKeys;
			$this->lblTotalKeys->Required = true;
			$this->lblTotalKeys->Format = $strFormat;
			return $this->lblTotalKeys;
		}

		/**
		 * Create and setup QIntegerTextBox txtKeysLeft
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtKeysLeft_Create($strControlId = null) {
			$this->txtKeysLeft = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtKeysLeft->Name = QApplication::Translate('Keys Left');
			$this->txtKeysLeft->Text = $this->objGroupAssessmentList->KeysLeft;
			$this->txtKeysLeft->Required = true;
			return $this->txtKeysLeft;
		}

		/**
		 * Create and setup QLabel lblKeysLeft
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblKeysLeft_Create($strControlId = null, $strFormat = null) {
			$this->lblKeysLeft = new QLabel($this->objParentObject, $strControlId);
			$this->lblKeysLeft->Name = QApplication::Translate('Keys Left');
			$this->lblKeysLeft->Text = $this->objGroupAssessmentList->KeysLeft;
			$this->lblKeysLeft->Required = true;
			$this->lblKeysLeft->Format = $strFormat;
			return $this->lblKeysLeft;
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
				if (($this->objGroupAssessmentList->Resource) && ($this->objGroupAssessmentList->Resource->Id == $objResource->Id))
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
			$this->lblResourceId->Text = ($this->objGroupAssessmentList->Resource) ? $this->objGroupAssessmentList->Resource->__toString() : null;
			return $this->lblResourceId;
		}

		/**
		 * Create and setup QTextBox txtKeyCode
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtKeyCode_Create($strControlId = null) {
			$this->txtKeyCode = new QTextBox($this->objParentObject, $strControlId);
			$this->txtKeyCode->Name = QApplication::Translate('Key Code');
			$this->txtKeyCode->Text = $this->objGroupAssessmentList->KeyCode;
			$this->txtKeyCode->MaxLength = GroupAssessmentList::KeyCodeMaxLength;
			return $this->txtKeyCode;
		}

		/**
		 * Create and setup QLabel lblKeyCode
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblKeyCode_Create($strControlId = null) {
			$this->lblKeyCode = new QLabel($this->objParentObject, $strControlId);
			$this->lblKeyCode->Name = QApplication::Translate('Key Code');
			$this->lblKeyCode->Text = $this->objGroupAssessmentList->KeyCode;
			return $this->lblKeyCode;
		}

		/**
		 * Create and setup QTextBox txtDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtDescription_Create($strControlId = null) {
			$this->txtDescription = new QTextBox($this->objParentObject, $strControlId);
			$this->txtDescription->Name = QApplication::Translate('Description');
			$this->txtDescription->Text = $this->objGroupAssessmentList->Description;
			$this->txtDescription->MaxLength = GroupAssessmentList::DescriptionMaxLength;
			return $this->txtDescription;
		}

		/**
		 * Create and setup QLabel lblDescription
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblDescription_Create($strControlId = null) {
			$this->lblDescription = new QLabel($this->objParentObject, $strControlId);
			$this->lblDescription->Name = QApplication::Translate('Description');
			$this->lblDescription->Text = $this->objGroupAssessmentList->Description;
			return $this->lblDescription;
		}

		/**
		 * Create and setup QDateTimePicker calDateModified
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calDateModified_Create($strControlId = null) {
			$this->calDateModified = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calDateModified->Name = QApplication::Translate('Date Modified');
			$this->calDateModified->DateTime = $this->objGroupAssessmentList->DateModified;
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
			$this->lblDateModified->Text = sprintf($this->objGroupAssessmentList->DateModified) ? $this->objGroupAssessmentList->DateModified->__toString($this->strDateModifiedDateTimeFormat) : null;
			return $this->lblDateModified;
		}

		protected $strDateModifiedDateTimeFormat;

		/**
		 * Create and setup QListBox lstUsersAsAssessmentManager
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstUsersAsAssessmentManager_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstUsersAsAssessmentManager = new QListBox($this->objParentObject, $strControlId);
			$this->lstUsersAsAssessmentManager->Name = QApplication::Translate('Users As Assessment Manager');
			$this->lstUsersAsAssessmentManager->SelectionMode = QSelectionMode::Multiple;

			// We need to know which items to "Pre-Select"
			$objAssociatedArray = $this->objGroupAssessmentList->GetUserAsAssessmentManagerArray();

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objUserCursor = User::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objUser = User::InstantiateCursor($objUserCursor)) {
				$objListItem = new QListItem($objUser->__toString(), $objUser->Id);
				foreach ($objAssociatedArray as $objAssociated) {
					if ($objAssociated->Id == $objUser->Id)
						$objListItem->Selected = true;
				}
				$this->lstUsersAsAssessmentManager->AddItem($objListItem);
			}

			// Return the QListControl
			return $this->lstUsersAsAssessmentManager;
		}

		/**
		 * Create and setup QLabel lblUsersAsAssessmentManager
		 * @param string $strControlId optional ControlId to use
		 * @param string $strGlue glue to display in between each associated object
		 * @return QLabel
		 */
		public function lblUsersAsAssessmentManager_Create($strControlId = null, $strGlue = ', ') {
			$this->lblUsersAsAssessmentManager = new QLabel($this->objParentObject, $strControlId);
			$this->lstUsersAsAssessmentManager->Name = QApplication::Translate('Users As Assessment Manager');
			
			$objAssociatedArray = $this->objGroupAssessmentList->GetUserAsAssessmentManagerArray();
			$strItems = array();
			foreach ($objAssociatedArray as $objAssociated)
				$strItems[] = $objAssociated->__toString();
			$this->lblUsersAsAssessmentManager->Text = implode($strGlue, $strItems);
			return $this->lblUsersAsAssessmentManager;
		}



		/**
		 * Refresh this MetaControl with Data from the local GroupAssessmentList object.
		 * @param boolean $blnReload reload GroupAssessmentList from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objGroupAssessmentList->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objGroupAssessmentList->Id;

			if ($this->txtTotalKeys) $this->txtTotalKeys->Text = $this->objGroupAssessmentList->TotalKeys;
			if ($this->lblTotalKeys) $this->lblTotalKeys->Text = $this->objGroupAssessmentList->TotalKeys;

			if ($this->txtKeysLeft) $this->txtKeysLeft->Text = $this->objGroupAssessmentList->KeysLeft;
			if ($this->lblKeysLeft) $this->lblKeysLeft->Text = $this->objGroupAssessmentList->KeysLeft;

			if ($this->lstResource) {
					$this->lstResource->RemoveAllItems();
				$this->lstResource->AddItem(QApplication::Translate('- Select One -'), null);
				$objResourceArray = Resource::LoadAll();
				if ($objResourceArray) foreach ($objResourceArray as $objResource) {
					$objListItem = new QListItem($objResource->__toString(), $objResource->Id);
					if (($this->objGroupAssessmentList->Resource) && ($this->objGroupAssessmentList->Resource->Id == $objResource->Id))
						$objListItem->Selected = true;
					$this->lstResource->AddItem($objListItem);
				}
			}
			if ($this->lblResourceId) $this->lblResourceId->Text = ($this->objGroupAssessmentList->Resource) ? $this->objGroupAssessmentList->Resource->__toString() : null;

			if ($this->txtKeyCode) $this->txtKeyCode->Text = $this->objGroupAssessmentList->KeyCode;
			if ($this->lblKeyCode) $this->lblKeyCode->Text = $this->objGroupAssessmentList->KeyCode;

			if ($this->txtDescription) $this->txtDescription->Text = $this->objGroupAssessmentList->Description;
			if ($this->lblDescription) $this->lblDescription->Text = $this->objGroupAssessmentList->Description;

			if ($this->calDateModified) $this->calDateModified->DateTime = $this->objGroupAssessmentList->DateModified;
			if ($this->lblDateModified) $this->lblDateModified->Text = sprintf($this->objGroupAssessmentList->DateModified) ? $this->objGroupAssessmentList->__toString($this->strDateModifiedDateTimeFormat) : null;

			if ($this->lstUsersAsAssessmentManager) {
				$this->lstUsersAsAssessmentManager->RemoveAllItems();
				$objAssociatedArray = $this->objGroupAssessmentList->GetUserAsAssessmentManagerArray();
				$objUserArray = User::LoadAll();
				if ($objUserArray) foreach ($objUserArray as $objUser) {
					$objListItem = new QListItem($objUser->__toString(), $objUser->Id);
					foreach ($objAssociatedArray as $objAssociated) {
						if ($objAssociated->Id == $objUser->Id)
							$objListItem->Selected = true;
					}
					$this->lstUsersAsAssessmentManager->AddItem($objListItem);
				}
			}
			if ($this->lblUsersAsAssessmentManager) {
				$objAssociatedArray = $this->objGroupAssessmentList->GetUserAsAssessmentManagerArray();
				$strItems = array();
				foreach ($objAssociatedArray as $objAssociated)
					$strItems[] = $objAssociated->__toString();
				$this->lblUsersAsAssessmentManager->Text = implode($strGlue, $strItems);
			}

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////

		protected function lstUsersAsAssessmentManager_Update() {
			if ($this->lstUsersAsAssessmentManager) {
				$this->objGroupAssessmentList->UnassociateAllUsersAsAssessmentManager();
				$objSelectedListItems = $this->lstUsersAsAssessmentManager->SelectedItems;
				if ($objSelectedListItems) foreach ($objSelectedListItems as $objListItem) {
					$this->objGroupAssessmentList->AssociateUserAsAssessmentManager(User::Load($objListItem->Value));
				}
			}
		}





		///////////////////////////////////////////////
		// PUBLIC GROUPASSESSMENTLIST OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's GroupAssessmentList instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveGroupAssessmentList() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtTotalKeys) $this->objGroupAssessmentList->TotalKeys = $this->txtTotalKeys->Text;
				if ($this->txtKeysLeft) $this->objGroupAssessmentList->KeysLeft = $this->txtKeysLeft->Text;
				if ($this->lstResource) $this->objGroupAssessmentList->ResourceId = $this->lstResource->SelectedValue;
				if ($this->txtKeyCode) $this->objGroupAssessmentList->KeyCode = $this->txtKeyCode->Text;
				if ($this->txtDescription) $this->objGroupAssessmentList->Description = $this->txtDescription->Text;
				if ($this->calDateModified) $this->objGroupAssessmentList->DateModified = $this->calDateModified->DateTime;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the GroupAssessmentList object
				$this->objGroupAssessmentList->Save();

				// Finally, update any ManyToManyReferences (if any)
				$this->lstUsersAsAssessmentManager_Update();
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's GroupAssessmentList instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteGroupAssessmentList() {
			$this->objGroupAssessmentList->UnassociateAllUsersAsAssessmentManager();
			$this->objGroupAssessmentList->Delete();
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
				case 'GroupAssessmentList': return $this->objGroupAssessmentList;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to GroupAssessmentList fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'TotalKeysControl':
					if (!$this->txtTotalKeys) return $this->txtTotalKeys_Create();
					return $this->txtTotalKeys;
				case 'TotalKeysLabel':
					if (!$this->lblTotalKeys) return $this->lblTotalKeys_Create();
					return $this->lblTotalKeys;
				case 'KeysLeftControl':
					if (!$this->txtKeysLeft) return $this->txtKeysLeft_Create();
					return $this->txtKeysLeft;
				case 'KeysLeftLabel':
					if (!$this->lblKeysLeft) return $this->lblKeysLeft_Create();
					return $this->lblKeysLeft;
				case 'ResourceIdControl':
					if (!$this->lstResource) return $this->lstResource_Create();
					return $this->lstResource;
				case 'ResourceIdLabel':
					if (!$this->lblResourceId) return $this->lblResourceId_Create();
					return $this->lblResourceId;
				case 'KeyCodeControl':
					if (!$this->txtKeyCode) return $this->txtKeyCode_Create();
					return $this->txtKeyCode;
				case 'KeyCodeLabel':
					if (!$this->lblKeyCode) return $this->lblKeyCode_Create();
					return $this->lblKeyCode;
				case 'DescriptionControl':
					if (!$this->txtDescription) return $this->txtDescription_Create();
					return $this->txtDescription;
				case 'DescriptionLabel':
					if (!$this->lblDescription) return $this->lblDescription_Create();
					return $this->lblDescription;
				case 'DateModifiedControl':
					if (!$this->calDateModified) return $this->calDateModified_Create();
					return $this->calDateModified;
				case 'DateModifiedLabel':
					if (!$this->lblDateModified) return $this->lblDateModified_Create();
					return $this->lblDateModified;
				case 'UserAsAssessmentManagerControl':
					if (!$this->lstUsersAsAssessmentManager) return $this->lstUsersAsAssessmentManager_Create();
					return $this->lstUsersAsAssessmentManager;
				case 'UserAsAssessmentManagerLabel':
					if (!$this->lblUsersAsAssessmentManager) return $this->lblUsersAsAssessmentManager_Create();
					return $this->lblUsersAsAssessmentManager;
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
					// Controls that point to GroupAssessmentList fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'TotalKeysControl':
						return ($this->txtTotalKeys = QType::Cast($mixValue, 'QControl'));
					case 'KeysLeftControl':
						return ($this->txtKeysLeft = QType::Cast($mixValue, 'QControl'));
					case 'ResourceIdControl':
						return ($this->lstResource = QType::Cast($mixValue, 'QControl'));
					case 'KeyCodeControl':
						return ($this->txtKeyCode = QType::Cast($mixValue, 'QControl'));
					case 'DescriptionControl':
						return ($this->txtDescription = QType::Cast($mixValue, 'QControl'));
					case 'DateModifiedControl':
						return ($this->calDateModified = QType::Cast($mixValue, 'QControl'));
					case 'UserAsAssessmentManagerControl':
						return ($this->lstUsersAsAssessmentManager = QType::Cast($mixValue, 'QControl'));
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