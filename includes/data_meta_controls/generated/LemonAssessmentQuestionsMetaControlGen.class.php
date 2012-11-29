<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the LemonAssessmentQuestions class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single LemonAssessmentQuestions object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a LemonAssessmentQuestionsMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read LemonAssessmentQuestions $LemonAssessmentQuestions the actual LemonAssessmentQuestions data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QIntegerTextBox $CountControl
	 * property-read QLabel $CountLabel
	 * property QTextBox $TextControl
	 * property-read QLabel $TextLabel
	 * property QListBox $LemonTypeIdControl
	 * property-read QLabel $LemonTypeIdLabel
	 * property QCheckBox $InverseControl
	 * property-read QLabel $InverseLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class LemonAssessmentQuestionsMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var LemonAssessmentQuestions objLemonAssessmentQuestions
		 * @access protected
		 */
		protected $objLemonAssessmentQuestions;

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

		// Controls that allow the editing of LemonAssessmentQuestions's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QIntegerTextBox txtCount;
         * @access protected
         */
		protected $txtCount;

        /**
         * @var QTextBox txtText;
         * @access protected
         */
		protected $txtText;

        /**
         * @var QListBox lstLemonType;
         * @access protected
         */
		protected $lstLemonType;

        /**
         * @var QCheckBox chkInverse;
         * @access protected
         */
		protected $chkInverse;


		// Controls that allow the viewing of LemonAssessmentQuestions's individual data fields
        /**
         * @var QLabel lblCount
         * @access protected
         */
		protected $lblCount;

        /**
         * @var QLabel lblText
         * @access protected
         */
		protected $lblText;

        /**
         * @var QLabel lblLemonTypeId
         * @access protected
         */
		protected $lblLemonTypeId;

        /**
         * @var QLabel lblInverse
         * @access protected
         */
		protected $lblInverse;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * LemonAssessmentQuestionsMetaControl to edit a single LemonAssessmentQuestions object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single LemonAssessmentQuestions object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this LemonAssessmentQuestionsMetaControl
		 * @param LemonAssessmentQuestions $objLemonAssessmentQuestions new or existing LemonAssessmentQuestions object
		 */
		 public function __construct($objParentObject, LemonAssessmentQuestions $objLemonAssessmentQuestions) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this LemonAssessmentQuestionsMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked LemonAssessmentQuestions object
			$this->objLemonAssessmentQuestions = $objLemonAssessmentQuestions;

			// Figure out if we're Editing or Creating New
			if ($this->objLemonAssessmentQuestions->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this LemonAssessmentQuestionsMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing LemonAssessmentQuestions object creation - defaults to CreateOrEdit
 		 * @return LemonAssessmentQuestionsMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objLemonAssessmentQuestions = LemonAssessmentQuestions::Load($intId);

				// LemonAssessmentQuestions was found -- return it!
				if ($objLemonAssessmentQuestions)
					return new LemonAssessmentQuestionsMetaControl($objParentObject, $objLemonAssessmentQuestions);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a LemonAssessmentQuestions object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new LemonAssessmentQuestionsMetaControl($objParentObject, new LemonAssessmentQuestions());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this LemonAssessmentQuestionsMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing LemonAssessmentQuestions object creation - defaults to CreateOrEdit
		 * @return LemonAssessmentQuestionsMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return LemonAssessmentQuestionsMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this LemonAssessmentQuestionsMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing LemonAssessmentQuestions object creation - defaults to CreateOrEdit
		 * @return LemonAssessmentQuestionsMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return LemonAssessmentQuestionsMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objLemonAssessmentQuestions->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QIntegerTextBox txtCount
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtCount_Create($strControlId = null) {
			$this->txtCount = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtCount->Name = QApplication::Translate('Count');
			$this->txtCount->Text = $this->objLemonAssessmentQuestions->Count;
			return $this->txtCount;
		}

		/**
		 * Create and setup QLabel lblCount
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblCount_Create($strControlId = null, $strFormat = null) {
			$this->lblCount = new QLabel($this->objParentObject, $strControlId);
			$this->lblCount->Name = QApplication::Translate('Count');
			$this->lblCount->Text = $this->objLemonAssessmentQuestions->Count;
			$this->lblCount->Format = $strFormat;
			return $this->lblCount;
		}

		/**
		 * Create and setup QTextBox txtText
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtText_Create($strControlId = null) {
			$this->txtText = new QTextBox($this->objParentObject, $strControlId);
			$this->txtText->Name = QApplication::Translate('Text');
			$this->txtText->Text = $this->objLemonAssessmentQuestions->Text;
			$this->txtText->MaxLength = LemonAssessmentQuestions::TextMaxLength;
			return $this->txtText;
		}

		/**
		 * Create and setup QLabel lblText
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblText_Create($strControlId = null) {
			$this->lblText = new QLabel($this->objParentObject, $strControlId);
			$this->lblText->Name = QApplication::Translate('Text');
			$this->lblText->Text = $this->objLemonAssessmentQuestions->Text;
			return $this->lblText;
		}

		/**
		 * Create and setup QListBox lstLemonType
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstLemonType_Create($strControlId = null) {
			$this->lstLemonType = new QListBox($this->objParentObject, $strControlId);
			$this->lstLemonType->Name = QApplication::Translate('Lemon Type');
			$this->lstLemonType->AddItem(QApplication::Translate('- Select One -'), null);

			$this->lstLemonType->AddItems(LemonType::$NameArray, $this->objLemonAssessmentQuestions->LemonTypeId);
			return $this->lstLemonType;
		}

		/**
		 * Create and setup QLabel lblLemonTypeId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblLemonTypeId_Create($strControlId = null) {
			$this->lblLemonTypeId = new QLabel($this->objParentObject, $strControlId);
			$this->lblLemonTypeId->Name = QApplication::Translate('Lemon Type');
			$this->lblLemonTypeId->Text = ($this->objLemonAssessmentQuestions->LemonTypeId) ? LemonType::$NameArray[$this->objLemonAssessmentQuestions->LemonTypeId] : null;
			return $this->lblLemonTypeId;
		}

		/**
		 * Create and setup QCheckBox chkInverse
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkInverse_Create($strControlId = null) {
			$this->chkInverse = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkInverse->Name = QApplication::Translate('Inverse');
			$this->chkInverse->Checked = $this->objLemonAssessmentQuestions->Inverse;
			return $this->chkInverse;
		}

		/**
		 * Create and setup QLabel lblInverse
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblInverse_Create($strControlId = null) {
			$this->lblInverse = new QLabel($this->objParentObject, $strControlId);
			$this->lblInverse->Name = QApplication::Translate('Inverse');
			$this->lblInverse->Text = ($this->objLemonAssessmentQuestions->Inverse) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblInverse;
		}



		/**
		 * Refresh this MetaControl with Data from the local LemonAssessmentQuestions object.
		 * @param boolean $blnReload reload LemonAssessmentQuestions from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objLemonAssessmentQuestions->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objLemonAssessmentQuestions->Id;

			if ($this->txtCount) $this->txtCount->Text = $this->objLemonAssessmentQuestions->Count;
			if ($this->lblCount) $this->lblCount->Text = $this->objLemonAssessmentQuestions->Count;

			if ($this->txtText) $this->txtText->Text = $this->objLemonAssessmentQuestions->Text;
			if ($this->lblText) $this->lblText->Text = $this->objLemonAssessmentQuestions->Text;

			if ($this->lstLemonType) $this->lstLemonType->SelectedValue = $this->objLemonAssessmentQuestions->LemonTypeId;
			if ($this->lblLemonTypeId) $this->lblLemonTypeId->Text = ($this->objLemonAssessmentQuestions->LemonTypeId) ? LemonType::$NameArray[$this->objLemonAssessmentQuestions->LemonTypeId] : null;

			if ($this->chkInverse) $this->chkInverse->Checked = $this->objLemonAssessmentQuestions->Inverse;
			if ($this->lblInverse) $this->lblInverse->Text = ($this->objLemonAssessmentQuestions->Inverse) ? QApplication::Translate('Yes') : QApplication::Translate('No');

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC LEMONASSESSMENTQUESTIONS OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's LemonAssessmentQuestions instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveLemonAssessmentQuestions() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtCount) $this->objLemonAssessmentQuestions->Count = $this->txtCount->Text;
				if ($this->txtText) $this->objLemonAssessmentQuestions->Text = $this->txtText->Text;
				if ($this->lstLemonType) $this->objLemonAssessmentQuestions->LemonTypeId = $this->lstLemonType->SelectedValue;
				if ($this->chkInverse) $this->objLemonAssessmentQuestions->Inverse = $this->chkInverse->Checked;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the LemonAssessmentQuestions object
				$this->objLemonAssessmentQuestions->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's LemonAssessmentQuestions instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteLemonAssessmentQuestions() {
			$this->objLemonAssessmentQuestions->Delete();
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
				case 'LemonAssessmentQuestions': return $this->objLemonAssessmentQuestions;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to LemonAssessmentQuestions fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'CountControl':
					if (!$this->txtCount) return $this->txtCount_Create();
					return $this->txtCount;
				case 'CountLabel':
					if (!$this->lblCount) return $this->lblCount_Create();
					return $this->lblCount;
				case 'TextControl':
					if (!$this->txtText) return $this->txtText_Create();
					return $this->txtText;
				case 'TextLabel':
					if (!$this->lblText) return $this->lblText_Create();
					return $this->lblText;
				case 'LemonTypeIdControl':
					if (!$this->lstLemonType) return $this->lstLemonType_Create();
					return $this->lstLemonType;
				case 'LemonTypeIdLabel':
					if (!$this->lblLemonTypeId) return $this->lblLemonTypeId_Create();
					return $this->lblLemonTypeId;
				case 'InverseControl':
					if (!$this->chkInverse) return $this->chkInverse_Create();
					return $this->chkInverse;
				case 'InverseLabel':
					if (!$this->lblInverse) return $this->lblInverse_Create();
					return $this->lblInverse;
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
					// Controls that point to LemonAssessmentQuestions fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'CountControl':
						return ($this->txtCount = QType::Cast($mixValue, 'QControl'));
					case 'TextControl':
						return ($this->txtText = QType::Cast($mixValue, 'QControl'));
					case 'LemonTypeIdControl':
						return ($this->lstLemonType = QType::Cast($mixValue, 'QControl'));
					case 'InverseControl':
						return ($this->chkInverse = QType::Cast($mixValue, 'QControl'));
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