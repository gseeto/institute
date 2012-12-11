<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the CannedStrategy class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single CannedStrategy object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a CannedStrategyMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read CannedStrategy $CannedStrategy the actual CannedStrategy data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QTextBox $StrategyControl
	 * property-read QLabel $StrategyLabel
	 * property QListBox $CategoryTypeIdControl
	 * property-read QLabel $CategoryTypeIdLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class CannedStrategyMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var CannedStrategy objCannedStrategy
		 * @access protected
		 */
		protected $objCannedStrategy;

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

		// Controls that allow the editing of CannedStrategy's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QTextBox txtStrategy;
         * @access protected
         */
		protected $txtStrategy;

        /**
         * @var QListBox lstCategoryType;
         * @access protected
         */
		protected $lstCategoryType;


		// Controls that allow the viewing of CannedStrategy's individual data fields
        /**
         * @var QLabel lblStrategy
         * @access protected
         */
		protected $lblStrategy;

        /**
         * @var QLabel lblCategoryTypeId
         * @access protected
         */
		protected $lblCategoryTypeId;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * CannedStrategyMetaControl to edit a single CannedStrategy object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single CannedStrategy object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this CannedStrategyMetaControl
		 * @param CannedStrategy $objCannedStrategy new or existing CannedStrategy object
		 */
		 public function __construct($objParentObject, CannedStrategy $objCannedStrategy) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this CannedStrategyMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked CannedStrategy object
			$this->objCannedStrategy = $objCannedStrategy;

			// Figure out if we're Editing or Creating New
			if ($this->objCannedStrategy->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this CannedStrategyMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing CannedStrategy object creation - defaults to CreateOrEdit
 		 * @return CannedStrategyMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objCannedStrategy = CannedStrategy::Load($intId);

				// CannedStrategy was found -- return it!
				if ($objCannedStrategy)
					return new CannedStrategyMetaControl($objParentObject, $objCannedStrategy);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a CannedStrategy object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new CannedStrategyMetaControl($objParentObject, new CannedStrategy());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this CannedStrategyMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing CannedStrategy object creation - defaults to CreateOrEdit
		 * @return CannedStrategyMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return CannedStrategyMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this CannedStrategyMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing CannedStrategy object creation - defaults to CreateOrEdit
		 * @return CannedStrategyMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return CannedStrategyMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objCannedStrategy->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QTextBox txtStrategy
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtStrategy_Create($strControlId = null) {
			$this->txtStrategy = new QTextBox($this->objParentObject, $strControlId);
			$this->txtStrategy->Name = QApplication::Translate('Strategy');
			$this->txtStrategy->Text = $this->objCannedStrategy->Strategy;
			$this->txtStrategy->MaxLength = CannedStrategy::StrategyMaxLength;
			return $this->txtStrategy;
		}

		/**
		 * Create and setup QLabel lblStrategy
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblStrategy_Create($strControlId = null) {
			$this->lblStrategy = new QLabel($this->objParentObject, $strControlId);
			$this->lblStrategy->Name = QApplication::Translate('Strategy');
			$this->lblStrategy->Text = $this->objCannedStrategy->Strategy;
			return $this->lblStrategy;
		}

		/**
		 * Create and setup QListBox lstCategoryType
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstCategoryType_Create($strControlId = null) {
			$this->lstCategoryType = new QListBox($this->objParentObject, $strControlId);
			$this->lstCategoryType->Name = QApplication::Translate('Category Type');
			$this->lstCategoryType->AddItem(QApplication::Translate('- Select One -'), null);

			$this->lstCategoryType->AddItems(CategoryType::$NameArray, $this->objCannedStrategy->CategoryTypeId);
			return $this->lstCategoryType;
		}

		/**
		 * Create and setup QLabel lblCategoryTypeId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCategoryTypeId_Create($strControlId = null) {
			$this->lblCategoryTypeId = new QLabel($this->objParentObject, $strControlId);
			$this->lblCategoryTypeId->Name = QApplication::Translate('Category Type');
			$this->lblCategoryTypeId->Text = ($this->objCannedStrategy->CategoryTypeId) ? CategoryType::$NameArray[$this->objCannedStrategy->CategoryTypeId] : null;
			return $this->lblCategoryTypeId;
		}



		/**
		 * Refresh this MetaControl with Data from the local CannedStrategy object.
		 * @param boolean $blnReload reload CannedStrategy from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objCannedStrategy->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objCannedStrategy->Id;

			if ($this->txtStrategy) $this->txtStrategy->Text = $this->objCannedStrategy->Strategy;
			if ($this->lblStrategy) $this->lblStrategy->Text = $this->objCannedStrategy->Strategy;

			if ($this->lstCategoryType) $this->lstCategoryType->SelectedValue = $this->objCannedStrategy->CategoryTypeId;
			if ($this->lblCategoryTypeId) $this->lblCategoryTypeId->Text = ($this->objCannedStrategy->CategoryTypeId) ? CategoryType::$NameArray[$this->objCannedStrategy->CategoryTypeId] : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC CANNEDSTRATEGY OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's CannedStrategy instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveCannedStrategy() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtStrategy) $this->objCannedStrategy->Strategy = $this->txtStrategy->Text;
				if ($this->lstCategoryType) $this->objCannedStrategy->CategoryTypeId = $this->lstCategoryType->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the CannedStrategy object
				$this->objCannedStrategy->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's CannedStrategy instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteCannedStrategy() {
			$this->objCannedStrategy->Delete();
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
				case 'CannedStrategy': return $this->objCannedStrategy;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to CannedStrategy fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'StrategyControl':
					if (!$this->txtStrategy) return $this->txtStrategy_Create();
					return $this->txtStrategy;
				case 'StrategyLabel':
					if (!$this->lblStrategy) return $this->lblStrategy_Create();
					return $this->lblStrategy;
				case 'CategoryTypeIdControl':
					if (!$this->lstCategoryType) return $this->lstCategoryType_Create();
					return $this->lstCategoryType;
				case 'CategoryTypeIdLabel':
					if (!$this->lblCategoryTypeId) return $this->lblCategoryTypeId_Create();
					return $this->lblCategoryTypeId;
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
					// Controls that point to CannedStrategy fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'StrategyControl':
						return ($this->txtStrategy = QType::Cast($mixValue, 'QControl'));
					case 'CategoryTypeIdControl':
						return ($this->lstCategoryType = QType::Cast($mixValue, 'QControl'));
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