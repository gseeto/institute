<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the LemonAssessmentFrenchQuestions class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single LemonAssessmentFrenchQuestions object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a LemonAssessmentFrenchQuestionsMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read LemonAssessmentFrenchQuestions $LemonAssessmentFrenchQuestions the actual LemonAssessmentFrenchQuestions data class being edited
	 * property QIntegerTextBox $CountControl
	 * property-read QLabel $CountLabel
	 * property QTextBox $TextControl
	 * property-read QLabel $TextLabel
	 * property QListBox $LemonTypeIdControl
	 * property-read QLabel $LemonTypeIdLabel
	 * property QCheckBox $InverseControl
	 * property-read QLabel $InverseLabel
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class LemonAssessmentFrenchQuestionsMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var LemonAssessmentFrenchQuestions objLemonAssessmentFrenchQuestions
		 * @access protected
		 */
		protected $objLemonAssessmentFrenchQuestions;

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

		// Controls that allow the editing of LemonAssessmentFrenchQuestions's individual data fields
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

        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;


		// Controls that allow the viewing of LemonAssessmentFrenchQuestions's individual data fields
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
		 * LemonAssessmentFrenchQuestionsMetaControl to edit a single LemonAssessmentFrenchQuestions object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single LemonAssessmentFrenchQuestions object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this LemonAssessmentFrenchQuestionsMetaControl
		 * @param LemonAssessmentFrenchQuestions $objLemonAssessmentFrenchQuestions new or existing LemonAssessmentFrenchQuestions object
		 */
		 public function __construct($objParentObject, LemonAssessmentFrenchQuestions $objLemonAssessmentFrenchQuestions) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this LemonAssessmentFrenchQuestionsMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked LemonAssessmentFrenchQuestions object
			$this->objLemonAssessmentFrenchQuestions = $objLemonAssessmentFrenchQuestions;

			// Figure out if we're Editing or Creating New
			if ($this->objLemonAssessmentFrenchQuestions->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this LemonAssessmentFrenchQuestionsMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing LemonAssessmentFrenchQuestions object creation - defaults to CreateOrEdit
 		 * @return LemonAssessmentFrenchQuestionsMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objLemonAssessmentFrenchQuestions = LemonAssessmentFrenchQuestions::Load($intId);

				// LemonAssessmentFrenchQuestions was found -- return it!
				if ($objLemonAssessmentFrenchQuestions)
					return new LemonAssessmentFrenchQuestionsMetaControl($objParentObject, $objLemonAssessmentFrenchQuestions);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a LemonAssessmentFrenchQuestions object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new LemonAssessmentFrenchQuestionsMetaControl($objParentObject, new LemonAssessmentFrenchQuestions());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this LemonAssessmentFrenchQuestionsMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing LemonAssessmentFrenchQuestions object creation - defaults to CreateOrEdit
		 * @return LemonAssessmentFrenchQuestionsMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return LemonAssessmentFrenchQuestionsMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this LemonAssessmentFrenchQuestionsMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing LemonAssessmentFrenchQuestions object creation - defaults to CreateOrEdit
		 * @return LemonAssessmentFrenchQuestionsMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return LemonAssessmentFrenchQuestionsMetaControl::Create($objParentObject, $intId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QIntegerTextBox txtCount
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtCount_Create($strControlId = null) {
			$this->txtCount = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtCount->Name = QApplication::Translate('Count');
			$this->txtCount->Text = $this->objLemonAssessmentFrenchQuestions->Count;
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
			$this->lblCount->Text = $this->objLemonAssessmentFrenchQuestions->Count;
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
			$this->txtText->Text = $this->objLemonAssessmentFrenchQuestions->Text;
			$this->txtText->MaxLength = LemonAssessmentFrenchQuestions::TextMaxLength;
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
			$this->lblText->Text = $this->objLemonAssessmentFrenchQuestions->Text;
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

			$this->lstLemonType->AddItems(LemonType::$NameArray, $this->objLemonAssessmentFrenchQuestions->LemonTypeId);
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
			$this->lblLemonTypeId->Text = ($this->objLemonAssessmentFrenchQuestions->LemonTypeId) ? LemonType::$NameArray[$this->objLemonAssessmentFrenchQuestions->LemonTypeId] : null;
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
			$this->chkInverse->Checked = $this->objLemonAssessmentFrenchQuestions->Inverse;
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
			$this->lblInverse->Text = ($this->objLemonAssessmentFrenchQuestions->Inverse) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblInverse;
		}

		/**
		 * Create and setup QLabel lblId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblId_Create($strControlId = null) {
			$this->lblId = new QLabel($this->objParentObject, $strControlId);
			$this->lblId->Name = QApplication::Translate('Id');
			if ($this->blnEditMode)
				$this->lblId->Text = $this->objLemonAssessmentFrenchQuestions->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}



		/**
		 * Refresh this MetaControl with Data from the local LemonAssessmentFrenchQuestions object.
		 * @param boolean $blnReload reload LemonAssessmentFrenchQuestions from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objLemonAssessmentFrenchQuestions->Reload();

			if ($this->txtCount) $this->txtCount->Text = $this->objLemonAssessmentFrenchQuestions->Count;
			if ($this->lblCount) $this->lblCount->Text = $this->objLemonAssessmentFrenchQuestions->Count;

			if ($this->txtText) $this->txtText->Text = $this->objLemonAssessmentFrenchQuestions->Text;
			if ($this->lblText) $this->lblText->Text = $this->objLemonAssessmentFrenchQuestions->Text;

			if ($this->lstLemonType) $this->lstLemonType->SelectedValue = $this->objLemonAssessmentFrenchQuestions->LemonTypeId;
			if ($this->lblLemonTypeId) $this->lblLemonTypeId->Text = ($this->objLemonAssessmentFrenchQuestions->LemonTypeId) ? LemonType::$NameArray[$this->objLemonAssessmentFrenchQuestions->LemonTypeId] : null;

			if ($this->chkInverse) $this->chkInverse->Checked = $this->objLemonAssessmentFrenchQuestions->Inverse;
			if ($this->lblInverse) $this->lblInverse->Text = ($this->objLemonAssessmentFrenchQuestions->Inverse) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objLemonAssessmentFrenchQuestions->Id;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC LEMONASSESSMENTFRENCHQUESTIONS OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's LemonAssessmentFrenchQuestions instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveLemonAssessmentFrenchQuestions() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtCount) $this->objLemonAssessmentFrenchQuestions->Count = $this->txtCount->Text;
				if ($this->txtText) $this->objLemonAssessmentFrenchQuestions->Text = $this->txtText->Text;
				if ($this->lstLemonType) $this->objLemonAssessmentFrenchQuestions->LemonTypeId = $this->lstLemonType->SelectedValue;
				if ($this->chkInverse) $this->objLemonAssessmentFrenchQuestions->Inverse = $this->chkInverse->Checked;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the LemonAssessmentFrenchQuestions object
				$this->objLemonAssessmentFrenchQuestions->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's LemonAssessmentFrenchQuestions instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteLemonAssessmentFrenchQuestions() {
			$this->objLemonAssessmentFrenchQuestions->Delete();
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
				case 'LemonAssessmentFrenchQuestions': return $this->objLemonAssessmentFrenchQuestions;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to LemonAssessmentFrenchQuestions fields -- will be created dynamically if not yet created
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
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
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
					// Controls that point to LemonAssessmentFrenchQuestions fields
					case 'CountControl':
						return ($this->txtCount = QType::Cast($mixValue, 'QControl'));
					case 'TextControl':
						return ($this->txtText = QType::Cast($mixValue, 'QControl'));
					case 'LemonTypeIdControl':
						return ($this->lstLemonType = QType::Cast($mixValue, 'QControl'));
					case 'InverseControl':
						return ($this->chkInverse = QType::Cast($mixValue, 'QControl'));
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
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