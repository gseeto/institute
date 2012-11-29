<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Company class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Company object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a CompanyMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read Company $Company the actual Company data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QTextBox $NameControl
	 * property-read QLabel $NameLabel
	 * property QListBox $AddressIdControl
	 * property-read QLabel $AddressIdLabel
	 * property QListBox $IndustryControl
	 * property-read QLabel $IndustryLabel
	 * property QListBox $UserControl
	 * property-read QLabel $UserLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class CompanyMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var Company objCompany
		 * @access protected
		 */
		protected $objCompany;

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

		// Controls that allow the editing of Company's individual data fields
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

        /**
         * @var QListBox lstAddress;
         * @access protected
         */
		protected $lstAddress;


		// Controls that allow the viewing of Company's individual data fields
        /**
         * @var QLabel lblName
         * @access protected
         */
		protected $lblName;

        /**
         * @var QLabel lblAddressId
         * @access protected
         */
		protected $lblAddressId;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References
		protected $lstIndustries;

		protected $lstUsers;


		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References
		protected $lblIndustries;

		protected $lblUsers;



		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * CompanyMetaControl to edit a single Company object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Company object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this CompanyMetaControl
		 * @param Company $objCompany new or existing Company object
		 */
		 public function __construct($objParentObject, Company $objCompany) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this CompanyMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Company object
			$this->objCompany = $objCompany;

			// Figure out if we're Editing or Creating New
			if ($this->objCompany->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this CompanyMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Company object creation - defaults to CreateOrEdit
 		 * @return CompanyMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objCompany = Company::Load($intId);

				// Company was found -- return it!
				if ($objCompany)
					return new CompanyMetaControl($objParentObject, $objCompany);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Company object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new CompanyMetaControl($objParentObject, new Company());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this CompanyMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Company object creation - defaults to CreateOrEdit
		 * @return CompanyMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return CompanyMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this CompanyMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Company object creation - defaults to CreateOrEdit
		 * @return CompanyMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return CompanyMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objCompany->Id;
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
			$this->txtName->Text = $this->objCompany->Name;
			$this->txtName->TextMode = QTextMode::MultiLine;
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
			$this->lblName->Text = $this->objCompany->Name;
			return $this->lblName;
		}

		/**
		 * Create and setup QListBox lstAddress
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstAddress_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstAddress = new QListBox($this->objParentObject, $strControlId);
			$this->lstAddress->Name = QApplication::Translate('Address');
			$this->lstAddress->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objAddressCursor = Address::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objAddress = Address::InstantiateCursor($objAddressCursor)) {
				$objListItem = new QListItem($objAddress->__toString(), $objAddress->Id);
				if (($this->objCompany->Address) && ($this->objCompany->Address->Id == $objAddress->Id))
					$objListItem->Selected = true;
				$this->lstAddress->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstAddress;
		}

		/**
		 * Create and setup QLabel lblAddressId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAddressId_Create($strControlId = null) {
			$this->lblAddressId = new QLabel($this->objParentObject, $strControlId);
			$this->lblAddressId->Name = QApplication::Translate('Address');
			$this->lblAddressId->Text = ($this->objCompany->Address) ? $this->objCompany->Address->__toString() : null;
			return $this->lblAddressId;
		}

		/**
		 * Create and setup QListBox lstIndustries
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstIndustries_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstIndustries = new QListBox($this->objParentObject, $strControlId);
			$this->lstIndustries->Name = QApplication::Translate('Industries');
			$this->lstIndustries->SelectionMode = QSelectionMode::Multiple;

			// We need to know which items to "Pre-Select"
			$objAssociatedArray = $this->objCompany->GetIndustryArray();

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objIndustryCursor = Industry::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objIndustry = Industry::InstantiateCursor($objIndustryCursor)) {
				$objListItem = new QListItem($objIndustry->__toString(), $objIndustry->Id);
				foreach ($objAssociatedArray as $objAssociated) {
					if ($objAssociated->Id == $objIndustry->Id)
						$objListItem->Selected = true;
				}
				$this->lstIndustries->AddItem($objListItem);
			}

			// Return the QListControl
			return $this->lstIndustries;
		}

		/**
		 * Create and setup QLabel lblIndustries
		 * @param string $strControlId optional ControlId to use
		 * @param string $strGlue glue to display in between each associated object
		 * @return QLabel
		 */
		public function lblIndustries_Create($strControlId = null, $strGlue = ', ') {
			$this->lblIndustries = new QLabel($this->objParentObject, $strControlId);
			$this->lstIndustries->Name = QApplication::Translate('Industries');
			
			$objAssociatedArray = $this->objCompany->GetIndustryArray();
			$strItems = array();
			foreach ($objAssociatedArray as $objAssociated)
				$strItems[] = $objAssociated->__toString();
			$this->lblIndustries->Text = implode($strGlue, $strItems);
			return $this->lblIndustries;
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
			$objAssociatedArray = $this->objCompany->GetUserArray();

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
			
			$objAssociatedArray = $this->objCompany->GetUserArray();
			$strItems = array();
			foreach ($objAssociatedArray as $objAssociated)
				$strItems[] = $objAssociated->__toString();
			$this->lblUsers->Text = implode($strGlue, $strItems);
			return $this->lblUsers;
		}



		/**
		 * Refresh this MetaControl with Data from the local Company object.
		 * @param boolean $blnReload reload Company from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objCompany->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objCompany->Id;

			if ($this->txtName) $this->txtName->Text = $this->objCompany->Name;
			if ($this->lblName) $this->lblName->Text = $this->objCompany->Name;

			if ($this->lstAddress) {
					$this->lstAddress->RemoveAllItems();
				$this->lstAddress->AddItem(QApplication::Translate('- Select One -'), null);
				$objAddressArray = Address::LoadAll();
				if ($objAddressArray) foreach ($objAddressArray as $objAddress) {
					$objListItem = new QListItem($objAddress->__toString(), $objAddress->Id);
					if (($this->objCompany->Address) && ($this->objCompany->Address->Id == $objAddress->Id))
						$objListItem->Selected = true;
					$this->lstAddress->AddItem($objListItem);
				}
			}
			if ($this->lblAddressId) $this->lblAddressId->Text = ($this->objCompany->Address) ? $this->objCompany->Address->__toString() : null;

			if ($this->lstIndustries) {
				$this->lstIndustries->RemoveAllItems();
				$objAssociatedArray = $this->objCompany->GetIndustryArray();
				$objIndustryArray = Industry::LoadAll();
				if ($objIndustryArray) foreach ($objIndustryArray as $objIndustry) {
					$objListItem = new QListItem($objIndustry->__toString(), $objIndustry->Id);
					foreach ($objAssociatedArray as $objAssociated) {
						if ($objAssociated->Id == $objIndustry->Id)
							$objListItem->Selected = true;
					}
					$this->lstIndustries->AddItem($objListItem);
				}
			}
			if ($this->lblIndustries) {
				$objAssociatedArray = $this->objCompany->GetIndustryArray();
				$strItems = array();
				foreach ($objAssociatedArray as $objAssociated)
					$strItems[] = $objAssociated->__toString();
				$this->lblIndustries->Text = implode($strGlue, $strItems);
			}

			if ($this->lstUsers) {
				$this->lstUsers->RemoveAllItems();
				$objAssociatedArray = $this->objCompany->GetUserArray();
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
				$objAssociatedArray = $this->objCompany->GetUserArray();
				$strItems = array();
				foreach ($objAssociatedArray as $objAssociated)
					$strItems[] = $objAssociated->__toString();
				$this->lblUsers->Text = implode($strGlue, $strItems);
			}

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////

		protected function lstIndustries_Update() {
			if ($this->lstIndustries) {
				$this->objCompany->UnassociateAllIndustries();
				$objSelectedListItems = $this->lstIndustries->SelectedItems;
				if ($objSelectedListItems) foreach ($objSelectedListItems as $objListItem) {
					$this->objCompany->AssociateIndustry(Industry::Load($objListItem->Value));
				}
			}
		}

		protected function lstUsers_Update() {
			if ($this->lstUsers) {
				$this->objCompany->UnassociateAllUsers();
				$objSelectedListItems = $this->lstUsers->SelectedItems;
				if ($objSelectedListItems) foreach ($objSelectedListItems as $objListItem) {
					$this->objCompany->AssociateUser(User::Load($objListItem->Value));
				}
			}
		}





		///////////////////////////////////////////////
		// PUBLIC COMPANY OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Company instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveCompany() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtName) $this->objCompany->Name = $this->txtName->Text;
				if ($this->lstAddress) $this->objCompany->AddressId = $this->lstAddress->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Company object
				$this->objCompany->Save();

				// Finally, update any ManyToManyReferences (if any)
				$this->lstIndustries_Update();
				$this->lstUsers_Update();
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Company instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteCompany() {
			$this->objCompany->UnassociateAllIndustries();
			$this->objCompany->UnassociateAllUsers();
			$this->objCompany->Delete();
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
				case 'Company': return $this->objCompany;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Company fields -- will be created dynamically if not yet created
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
				case 'AddressIdControl':
					if (!$this->lstAddress) return $this->lstAddress_Create();
					return $this->lstAddress;
				case 'AddressIdLabel':
					if (!$this->lblAddressId) return $this->lblAddressId_Create();
					return $this->lblAddressId;
				case 'IndustryControl':
					if (!$this->lstIndustries) return $this->lstIndustries_Create();
					return $this->lstIndustries;
				case 'IndustryLabel':
					if (!$this->lblIndustries) return $this->lblIndustries_Create();
					return $this->lblIndustries;
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
					// Controls that point to Company fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'NameControl':
						return ($this->txtName = QType::Cast($mixValue, 'QControl'));
					case 'AddressIdControl':
						return ($this->lstAddress = QType::Cast($mixValue, 'QControl'));
					case 'IndustryControl':
						return ($this->lstIndustries = QType::Cast($mixValue, 'QControl'));
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