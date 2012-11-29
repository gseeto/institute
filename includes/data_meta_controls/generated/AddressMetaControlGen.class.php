<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Address class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Address object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a AddressMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read Address $Address the actual Address data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QTextBox $Address1Control
	 * property-read QLabel $Address1Label
	 * property QTextBox $CityControl
	 * property-read QLabel $CityLabel
	 * property QTextBox $StateControl
	 * property-read QLabel $StateLabel
	 * property QTextBox $ZipCodeControl
	 * property-read QLabel $ZipCodeLabel
	 * property QTextBox $CountryControl
	 * property-read QLabel $CountryLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class AddressMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var Address objAddress
		 * @access protected
		 */
		protected $objAddress;

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

		// Controls that allow the editing of Address's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QTextBox txtAddress1;
         * @access protected
         */
		protected $txtAddress1;

        /**
         * @var QTextBox txtCity;
         * @access protected
         */
		protected $txtCity;

        /**
         * @var QTextBox txtState;
         * @access protected
         */
		protected $txtState;

        /**
         * @var QTextBox txtZipCode;
         * @access protected
         */
		protected $txtZipCode;

        /**
         * @var QTextBox txtCountry;
         * @access protected
         */
		protected $txtCountry;


		// Controls that allow the viewing of Address's individual data fields
        /**
         * @var QLabel lblAddress1
         * @access protected
         */
		protected $lblAddress1;

        /**
         * @var QLabel lblCity
         * @access protected
         */
		protected $lblCity;

        /**
         * @var QLabel lblState
         * @access protected
         */
		protected $lblState;

        /**
         * @var QLabel lblZipCode
         * @access protected
         */
		protected $lblZipCode;

        /**
         * @var QLabel lblCountry
         * @access protected
         */
		protected $lblCountry;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * AddressMetaControl to edit a single Address object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Address object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this AddressMetaControl
		 * @param Address $objAddress new or existing Address object
		 */
		 public function __construct($objParentObject, Address $objAddress) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this AddressMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Address object
			$this->objAddress = $objAddress;

			// Figure out if we're Editing or Creating New
			if ($this->objAddress->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this AddressMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Address object creation - defaults to CreateOrEdit
 		 * @return AddressMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objAddress = Address::Load($intId);

				// Address was found -- return it!
				if ($objAddress)
					return new AddressMetaControl($objParentObject, $objAddress);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Address object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new AddressMetaControl($objParentObject, new Address());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this AddressMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Address object creation - defaults to CreateOrEdit
		 * @return AddressMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return AddressMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this AddressMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Address object creation - defaults to CreateOrEdit
		 * @return AddressMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return AddressMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objAddress->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QTextBox txtAddress1
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtAddress1_Create($strControlId = null) {
			$this->txtAddress1 = new QTextBox($this->objParentObject, $strControlId);
			$this->txtAddress1->Name = QApplication::Translate('Address 1');
			$this->txtAddress1->Text = $this->objAddress->Address1;
			$this->txtAddress1->TextMode = QTextMode::MultiLine;
			return $this->txtAddress1;
		}

		/**
		 * Create and setup QLabel lblAddress1
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAddress1_Create($strControlId = null) {
			$this->lblAddress1 = new QLabel($this->objParentObject, $strControlId);
			$this->lblAddress1->Name = QApplication::Translate('Address 1');
			$this->lblAddress1->Text = $this->objAddress->Address1;
			return $this->lblAddress1;
		}

		/**
		 * Create and setup QTextBox txtCity
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtCity_Create($strControlId = null) {
			$this->txtCity = new QTextBox($this->objParentObject, $strControlId);
			$this->txtCity->Name = QApplication::Translate('City');
			$this->txtCity->Text = $this->objAddress->City;
			$this->txtCity->TextMode = QTextMode::MultiLine;
			return $this->txtCity;
		}

		/**
		 * Create and setup QLabel lblCity
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCity_Create($strControlId = null) {
			$this->lblCity = new QLabel($this->objParentObject, $strControlId);
			$this->lblCity->Name = QApplication::Translate('City');
			$this->lblCity->Text = $this->objAddress->City;
			return $this->lblCity;
		}

		/**
		 * Create and setup QTextBox txtState
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtState_Create($strControlId = null) {
			$this->txtState = new QTextBox($this->objParentObject, $strControlId);
			$this->txtState->Name = QApplication::Translate('State');
			$this->txtState->Text = $this->objAddress->State;
			$this->txtState->TextMode = QTextMode::MultiLine;
			return $this->txtState;
		}

		/**
		 * Create and setup QLabel lblState
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblState_Create($strControlId = null) {
			$this->lblState = new QLabel($this->objParentObject, $strControlId);
			$this->lblState->Name = QApplication::Translate('State');
			$this->lblState->Text = $this->objAddress->State;
			return $this->lblState;
		}

		/**
		 * Create and setup QTextBox txtZipCode
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtZipCode_Create($strControlId = null) {
			$this->txtZipCode = new QTextBox($this->objParentObject, $strControlId);
			$this->txtZipCode->Name = QApplication::Translate('Zip Code');
			$this->txtZipCode->Text = $this->objAddress->ZipCode;
			$this->txtZipCode->TextMode = QTextMode::MultiLine;
			return $this->txtZipCode;
		}

		/**
		 * Create and setup QLabel lblZipCode
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblZipCode_Create($strControlId = null) {
			$this->lblZipCode = new QLabel($this->objParentObject, $strControlId);
			$this->lblZipCode->Name = QApplication::Translate('Zip Code');
			$this->lblZipCode->Text = $this->objAddress->ZipCode;
			return $this->lblZipCode;
		}

		/**
		 * Create and setup QTextBox txtCountry
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtCountry_Create($strControlId = null) {
			$this->txtCountry = new QTextBox($this->objParentObject, $strControlId);
			$this->txtCountry->Name = QApplication::Translate('Country');
			$this->txtCountry->Text = $this->objAddress->Country;
			$this->txtCountry->TextMode = QTextMode::MultiLine;
			return $this->txtCountry;
		}

		/**
		 * Create and setup QLabel lblCountry
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCountry_Create($strControlId = null) {
			$this->lblCountry = new QLabel($this->objParentObject, $strControlId);
			$this->lblCountry->Name = QApplication::Translate('Country');
			$this->lblCountry->Text = $this->objAddress->Country;
			return $this->lblCountry;
		}



		/**
		 * Refresh this MetaControl with Data from the local Address object.
		 * @param boolean $blnReload reload Address from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objAddress->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objAddress->Id;

			if ($this->txtAddress1) $this->txtAddress1->Text = $this->objAddress->Address1;
			if ($this->lblAddress1) $this->lblAddress1->Text = $this->objAddress->Address1;

			if ($this->txtCity) $this->txtCity->Text = $this->objAddress->City;
			if ($this->lblCity) $this->lblCity->Text = $this->objAddress->City;

			if ($this->txtState) $this->txtState->Text = $this->objAddress->State;
			if ($this->lblState) $this->lblState->Text = $this->objAddress->State;

			if ($this->txtZipCode) $this->txtZipCode->Text = $this->objAddress->ZipCode;
			if ($this->lblZipCode) $this->lblZipCode->Text = $this->objAddress->ZipCode;

			if ($this->txtCountry) $this->txtCountry->Text = $this->objAddress->Country;
			if ($this->lblCountry) $this->lblCountry->Text = $this->objAddress->Country;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC ADDRESS OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Address instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveAddress() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtAddress1) $this->objAddress->Address1 = $this->txtAddress1->Text;
				if ($this->txtCity) $this->objAddress->City = $this->txtCity->Text;
				if ($this->txtState) $this->objAddress->State = $this->txtState->Text;
				if ($this->txtZipCode) $this->objAddress->ZipCode = $this->txtZipCode->Text;
				if ($this->txtCountry) $this->objAddress->Country = $this->txtCountry->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Address object
				$this->objAddress->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Address instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteAddress() {
			$this->objAddress->Delete();
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
				case 'Address': return $this->objAddress;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Address fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'Address1Control':
					if (!$this->txtAddress1) return $this->txtAddress1_Create();
					return $this->txtAddress1;
				case 'Address1Label':
					if (!$this->lblAddress1) return $this->lblAddress1_Create();
					return $this->lblAddress1;
				case 'CityControl':
					if (!$this->txtCity) return $this->txtCity_Create();
					return $this->txtCity;
				case 'CityLabel':
					if (!$this->lblCity) return $this->lblCity_Create();
					return $this->lblCity;
				case 'StateControl':
					if (!$this->txtState) return $this->txtState_Create();
					return $this->txtState;
				case 'StateLabel':
					if (!$this->lblState) return $this->lblState_Create();
					return $this->lblState;
				case 'ZipCodeControl':
					if (!$this->txtZipCode) return $this->txtZipCode_Create();
					return $this->txtZipCode;
				case 'ZipCodeLabel':
					if (!$this->lblZipCode) return $this->lblZipCode_Create();
					return $this->lblZipCode;
				case 'CountryControl':
					if (!$this->txtCountry) return $this->txtCountry_Create();
					return $this->txtCountry;
				case 'CountryLabel':
					if (!$this->lblCountry) return $this->lblCountry_Create();
					return $this->lblCountry;
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
					// Controls that point to Address fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'Address1Control':
						return ($this->txtAddress1 = QType::Cast($mixValue, 'QControl'));
					case 'CityControl':
						return ($this->txtCity = QType::Cast($mixValue, 'QControl'));
					case 'StateControl':
						return ($this->txtState = QType::Cast($mixValue, 'QControl'));
					case 'ZipCodeControl':
						return ($this->txtZipCode = QType::Cast($mixValue, 'QControl'));
					case 'CountryControl':
						return ($this->txtCountry = QType::Cast($mixValue, 'QControl'));
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