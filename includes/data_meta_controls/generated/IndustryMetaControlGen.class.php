<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Industry class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Industry object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a IndustryMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read Industry $Industry the actual Industry data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QTextBox $ValueControl
	 * property-read QLabel $ValueLabel
	 * property QListBox $CompanyControl
	 * property-read QLabel $CompanyLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class IndustryMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var Industry objIndustry
		 * @access protected
		 */
		protected $objIndustry;

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

		// Controls that allow the editing of Industry's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QTextBox txtValue;
         * @access protected
         */
		protected $txtValue;


		// Controls that allow the viewing of Industry's individual data fields
        /**
         * @var QLabel lblValue
         * @access protected
         */
		protected $lblValue;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References
		protected $lstCompanies;


		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References
		protected $lblCompanies;



		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * IndustryMetaControl to edit a single Industry object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Industry object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this IndustryMetaControl
		 * @param Industry $objIndustry new or existing Industry object
		 */
		 public function __construct($objParentObject, Industry $objIndustry) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this IndustryMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Industry object
			$this->objIndustry = $objIndustry;

			// Figure out if we're Editing or Creating New
			if ($this->objIndustry->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this IndustryMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Industry object creation - defaults to CreateOrEdit
 		 * @return IndustryMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objIndustry = Industry::Load($intId);

				// Industry was found -- return it!
				if ($objIndustry)
					return new IndustryMetaControl($objParentObject, $objIndustry);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Industry object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new IndustryMetaControl($objParentObject, new Industry());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this IndustryMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Industry object creation - defaults to CreateOrEdit
		 * @return IndustryMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return IndustryMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this IndustryMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Industry object creation - defaults to CreateOrEdit
		 * @return IndustryMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return IndustryMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objIndustry->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QTextBox txtValue
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtValue_Create($strControlId = null) {
			$this->txtValue = new QTextBox($this->objParentObject, $strControlId);
			$this->txtValue->Name = QApplication::Translate('Value');
			$this->txtValue->Text = $this->objIndustry->Value;
			$this->txtValue->MaxLength = Industry::ValueMaxLength;
			return $this->txtValue;
		}

		/**
		 * Create and setup QLabel lblValue
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblValue_Create($strControlId = null) {
			$this->lblValue = new QLabel($this->objParentObject, $strControlId);
			$this->lblValue->Name = QApplication::Translate('Value');
			$this->lblValue->Text = $this->objIndustry->Value;
			return $this->lblValue;
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
			$objAssociatedArray = $this->objIndustry->GetCompanyArray();

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
			
			$objAssociatedArray = $this->objIndustry->GetCompanyArray();
			$strItems = array();
			foreach ($objAssociatedArray as $objAssociated)
				$strItems[] = $objAssociated->__toString();
			$this->lblCompanies->Text = implode($strGlue, $strItems);
			return $this->lblCompanies;
		}



		/**
		 * Refresh this MetaControl with Data from the local Industry object.
		 * @param boolean $blnReload reload Industry from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objIndustry->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objIndustry->Id;

			if ($this->txtValue) $this->txtValue->Text = $this->objIndustry->Value;
			if ($this->lblValue) $this->lblValue->Text = $this->objIndustry->Value;

			if ($this->lstCompanies) {
				$this->lstCompanies->RemoveAllItems();
				$objAssociatedArray = $this->objIndustry->GetCompanyArray();
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
				$objAssociatedArray = $this->objIndustry->GetCompanyArray();
				$strItems = array();
				foreach ($objAssociatedArray as $objAssociated)
					$strItems[] = $objAssociated->__toString();
				$this->lblCompanies->Text = implode($strGlue, $strItems);
			}

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////

		protected function lstCompanies_Update() {
			if ($this->lstCompanies) {
				$this->objIndustry->UnassociateAllCompanies();
				$objSelectedListItems = $this->lstCompanies->SelectedItems;
				if ($objSelectedListItems) foreach ($objSelectedListItems as $objListItem) {
					$this->objIndustry->AssociateCompany(Company::Load($objListItem->Value));
				}
			}
		}





		///////////////////////////////////////////////
		// PUBLIC INDUSTRY OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Industry instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveIndustry() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtValue) $this->objIndustry->Value = $this->txtValue->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Industry object
				$this->objIndustry->Save();

				// Finally, update any ManyToManyReferences (if any)
				$this->lstCompanies_Update();
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Industry instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteIndustry() {
			$this->objIndustry->UnassociateAllCompanies();
			$this->objIndustry->Delete();
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
				case 'Industry': return $this->objIndustry;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Industry fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'ValueControl':
					if (!$this->txtValue) return $this->txtValue_Create();
					return $this->txtValue;
				case 'ValueLabel':
					if (!$this->lblValue) return $this->lblValue_Create();
					return $this->lblValue;
				case 'CompanyControl':
					if (!$this->lstCompanies) return $this->lstCompanies_Create();
					return $this->lstCompanies;
				case 'CompanyLabel':
					if (!$this->lblCompanies) return $this->lblCompanies_Create();
					return $this->lblCompanies;
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
					// Controls that point to Industry fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'ValueControl':
						return ($this->txtValue = QType::Cast($mixValue, 'QControl'));
					case 'CompanyControl':
						return ($this->lstCompanies = QType::Cast($mixValue, 'QControl'));
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