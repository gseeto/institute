<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the ChecklistCategories class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single ChecklistCategories object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a ChecklistCategoriesMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read ChecklistCategories $ChecklistCategories the actual ChecklistCategories data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QTextBox $ValueControl
	 * property-read QLabel $ValueLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class ChecklistCategoriesMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var ChecklistCategories objChecklistCategories
		 * @access protected
		 */
		protected $objChecklistCategories;

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

		// Controls that allow the editing of ChecklistCategories's individual data fields
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


		// Controls that allow the viewing of ChecklistCategories's individual data fields
        /**
         * @var QLabel lblValue
         * @access protected
         */
		protected $lblValue;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * ChecklistCategoriesMetaControl to edit a single ChecklistCategories object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single ChecklistCategories object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ChecklistCategoriesMetaControl
		 * @param ChecklistCategories $objChecklistCategories new or existing ChecklistCategories object
		 */
		 public function __construct($objParentObject, ChecklistCategories $objChecklistCategories) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this ChecklistCategoriesMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked ChecklistCategories object
			$this->objChecklistCategories = $objChecklistCategories;

			// Figure out if we're Editing or Creating New
			if ($this->objChecklistCategories->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this ChecklistCategoriesMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing ChecklistCategories object creation - defaults to CreateOrEdit
 		 * @return ChecklistCategoriesMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objChecklistCategories = ChecklistCategories::Load($intId);

				// ChecklistCategories was found -- return it!
				if ($objChecklistCategories)
					return new ChecklistCategoriesMetaControl($objParentObject, $objChecklistCategories);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a ChecklistCategories object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new ChecklistCategoriesMetaControl($objParentObject, new ChecklistCategories());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ChecklistCategoriesMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing ChecklistCategories object creation - defaults to CreateOrEdit
		 * @return ChecklistCategoriesMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return ChecklistCategoriesMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ChecklistCategoriesMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing ChecklistCategories object creation - defaults to CreateOrEdit
		 * @return ChecklistCategoriesMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return ChecklistCategoriesMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objChecklistCategories->Id;
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
			$this->txtValue->Text = $this->objChecklistCategories->Value;
			$this->txtValue->MaxLength = ChecklistCategories::ValueMaxLength;
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
			$this->lblValue->Text = $this->objChecklistCategories->Value;
			return $this->lblValue;
		}



		/**
		 * Refresh this MetaControl with Data from the local ChecklistCategories object.
		 * @param boolean $blnReload reload ChecklistCategories from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objChecklistCategories->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objChecklistCategories->Id;

			if ($this->txtValue) $this->txtValue->Text = $this->objChecklistCategories->Value;
			if ($this->lblValue) $this->lblValue->Text = $this->objChecklistCategories->Value;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC CHECKLISTCATEGORIES OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's ChecklistCategories instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveChecklistCategories() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtValue) $this->objChecklistCategories->Value = $this->txtValue->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the ChecklistCategories object
				$this->objChecklistCategories->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's ChecklistCategories instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteChecklistCategories() {
			$this->objChecklistCategories->Delete();
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
				case 'ChecklistCategories': return $this->objChecklistCategories;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to ChecklistCategories fields -- will be created dynamically if not yet created
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
					// Controls that point to ChecklistCategories fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'ValueControl':
						return ($this->txtValue = QType::Cast($mixValue, 'QControl'));
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