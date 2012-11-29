<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Resource class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Resource object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a ResourceMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read Resource $Resource the actual Resource data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QTextBox $NameControl
	 * property-read QLabel $NameLabel
	 * property QListBox $UserControl
	 * property-read QLabel $UserLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class ResourceMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var Resource objResource
		 * @access protected
		 */
		protected $objResource;

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

		// Controls that allow the editing of Resource's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QTextBox txtName;
         * @access protected
         */
		protected $txtName;


		// Controls that allow the viewing of Resource's individual data fields
        /**
         * @var QLabel lblName
         * @access protected
         */
		protected $lblName;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References
		protected $lstUsers;


		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References
		protected $lblUsers;



		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * ResourceMetaControl to edit a single Resource object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Resource object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ResourceMetaControl
		 * @param Resource $objResource new or existing Resource object
		 */
		 public function __construct($objParentObject, Resource $objResource) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this ResourceMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Resource object
			$this->objResource = $objResource;

			// Figure out if we're Editing or Creating New
			if ($this->objResource->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this ResourceMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Resource object creation - defaults to CreateOrEdit
 		 * @return ResourceMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objResource = Resource::Load($intId);

				// Resource was found -- return it!
				if ($objResource)
					return new ResourceMetaControl($objParentObject, $objResource);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Resource object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new ResourceMetaControl($objParentObject, new Resource());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ResourceMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Resource object creation - defaults to CreateOrEdit
		 * @return ResourceMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return ResourceMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ResourceMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Resource object creation - defaults to CreateOrEdit
		 * @return ResourceMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return ResourceMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objResource->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QTextBox txtName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtName_Create($strControlId = null) {
			$this->txtName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtName->Name = QApplication::Translate('Name');
			$this->txtName->Text = $this->objResource->Name;
			$this->txtName->MaxLength = Resource::NameMaxLength;
			return $this->txtName;
		}

		/**
		 * Create and setup QLabel lblName
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblName_Create($strControlId = null) {
			$this->lblName = new QLabel($this->objParentObject, $strControlId);
			$this->lblName->Name = QApplication::Translate('Name');
			$this->lblName->Text = $this->objResource->Name;
			return $this->lblName;
		}

		/**
		 * Create and setup QListBox lstUsers
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstUsers_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstUsers = new QListBox($this->objParentObject, $strControlId);
			$this->lstUsers->Name = QApplication::Translate('Users');
			$this->lstUsers->SelectionMode = QSelectionMode::Multiple;

			// We need to know which items to "Pre-Select"
			$objAssociatedArray = $this->objResource->GetUserArray();

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
				$this->lstUsers->AddItem($objListItem);
			}

			// Return the QListControl
			return $this->lstUsers;
		}

		/**
		 * Create and setup QLabel lblUsers
		 * @param string $strControlId optional ControlId to use
		 * @param string $strGlue glue to display in between each associated object
		 * @return QLabel
		 */
		public function lblUsers_Create($strControlId = null, $strGlue = ', ') {
			$this->lblUsers = new QLabel($this->objParentObject, $strControlId);
			$this->lstUsers->Name = QApplication::Translate('Users');
			
			$objAssociatedArray = $this->objResource->GetUserArray();
			$strItems = array();
			foreach ($objAssociatedArray as $objAssociated)
				$strItems[] = $objAssociated->__toString();
			$this->lblUsers->Text = implode($strGlue, $strItems);
			return $this->lblUsers;
		}



		/**
		 * Refresh this MetaControl with Data from the local Resource object.
		 * @param boolean $blnReload reload Resource from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objResource->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objResource->Id;

			if ($this->txtName) $this->txtName->Text = $this->objResource->Name;
			if ($this->lblName) $this->lblName->Text = $this->objResource->Name;

			if ($this->lstUsers) {
				$this->lstUsers->RemoveAllItems();
				$objAssociatedArray = $this->objResource->GetUserArray();
				$objUserArray = User::LoadAll();
				if ($objUserArray) foreach ($objUserArray as $objUser) {
					$objListItem = new QListItem($objUser->__toString(), $objUser->Id);
					foreach ($objAssociatedArray as $objAssociated) {
						if ($objAssociated->Id == $objUser->Id)
							$objListItem->Selected = true;
					}
					$this->lstUsers->AddItem($objListItem);
				}
			}
			if ($this->lblUsers) {
				$objAssociatedArray = $this->objResource->GetUserArray();
				$strItems = array();
				foreach ($objAssociatedArray as $objAssociated)
					$strItems[] = $objAssociated->__toString();
				$this->lblUsers->Text = implode($strGlue, $strItems);
			}

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////

		protected function lstUsers_Update() {
			if ($this->lstUsers) {
				$this->objResource->UnassociateAllUsers();
				$objSelectedListItems = $this->lstUsers->SelectedItems;
				if ($objSelectedListItems) foreach ($objSelectedListItems as $objListItem) {
					$this->objResource->AssociateUser(User::Load($objListItem->Value));
				}
			}
		}





		///////////////////////////////////////////////
		// PUBLIC RESOURCE OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Resource instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveResource() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtName) $this->objResource->Name = $this->txtName->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Resource object
				$this->objResource->Save();

				// Finally, update any ManyToManyReferences (if any)
				$this->lstUsers_Update();
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Resource instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteResource() {
			$this->objResource->UnassociateAllUsers();
			$this->objResource->Delete();
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
				case 'Resource': return $this->objResource;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Resource fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'NameControl':
					if (!$this->txtName) return $this->txtName_Create();
					return $this->txtName;
				case 'NameLabel':
					if (!$this->lblName) return $this->lblName_Create();
					return $this->lblName;
				case 'UserControl':
					if (!$this->lstUsers) return $this->lstUsers_Create();
					return $this->lstUsers;
				case 'UserLabel':
					if (!$this->lblUsers) return $this->lblUsers_Create();
					return $this->lblUsers;
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
					// Controls that point to Resource fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'NameControl':
						return ($this->txtName = QType::Cast($mixValue, 'QControl'));
					case 'UserControl':
						return ($this->lstUsers = QType::Cast($mixValue, 'QControl'));
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