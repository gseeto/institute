<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the LraQuestions class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single LraQuestions object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a LraQuestionsMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read LraQuestions $LraQuestions the actual LraQuestions data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QIntegerTextBox $CountControl
	 * property-read QLabel $CountLabel
	 * property QTextBox $TextControl
	 * property-read QLabel $TextLabel
	 * property QListBox $CategoryIdControl
	 * property-read QLabel $CategoryIdLabel
	 * property QCheckBox $InvertControl
	 * property-read QLabel $InvertLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class LraQuestionsMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var LraQuestions objLraQuestions
		 * @access protected
		 */
		protected $objLraQuestions;

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

		// Controls that allow the editing of LraQuestions's individual data fields
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
         * @var QListBox lstCategory;
         * @access protected
         */
		protected $lstCategory;

        /**
         * @var QCheckBox chkInvert;
         * @access protected
         */
		protected $chkInvert;


		// Controls that allow the viewing of LraQuestions's individual data fields
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
         * @var QLabel lblCategoryId
         * @access protected
         */
		protected $lblCategoryId;

        /**
         * @var QLabel lblInvert
         * @access protected
         */
		protected $lblInvert;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * LraQuestionsMetaControl to edit a single LraQuestions object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single LraQuestions object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this LraQuestionsMetaControl
		 * @param LraQuestions $objLraQuestions new or existing LraQuestions object
		 */
		 public function __construct($objParentObject, LraQuestions $objLraQuestions) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this LraQuestionsMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked LraQuestions object
			$this->objLraQuestions = $objLraQuestions;

			// Figure out if we're Editing or Creating New
			if ($this->objLraQuestions->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this LraQuestionsMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing LraQuestions object creation - defaults to CreateOrEdit
 		 * @return LraQuestionsMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objLraQuestions = LraQuestions::Load($intId);

				// LraQuestions was found -- return it!
				if ($objLraQuestions)
					return new LraQuestionsMetaControl($objParentObject, $objLraQuestions);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a LraQuestions object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new LraQuestionsMetaControl($objParentObject, new LraQuestions());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this LraQuestionsMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing LraQuestions object creation - defaults to CreateOrEdit
		 * @return LraQuestionsMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return LraQuestionsMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this LraQuestionsMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing LraQuestions object creation - defaults to CreateOrEdit
		 * @return LraQuestionsMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return LraQuestionsMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objLraQuestions->Id;
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
			$this->txtCount->Text = $this->objLraQuestions->Count;
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
			$this->lblCount->Text = $this->objLraQuestions->Count;
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
			$this->txtText->Text = $this->objLraQuestions->Text;
			$this->txtText->MaxLength = LraQuestions::TextMaxLength;
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
			$this->lblText->Text = $this->objLraQuestions->Text;
			return $this->lblText;
		}

		/**
		 * Create and setup QListBox lstCategory
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstCategory_Create($strControlId = null) {
			$this->lstCategory = new QListBox($this->objParentObject, $strControlId);
			$this->lstCategory->Name = QApplication::Translate('Category');
			$this->lstCategory->AddItem(QApplication::Translate('- Select One -'), null);

			$this->lstCategory->AddItems(LraCategoryType::$NameArray, $this->objLraQuestions->CategoryId);
			return $this->lstCategory;
		}

		/**
		 * Create and setup QLabel lblCategoryId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCategoryId_Create($strControlId = null) {
			$this->lblCategoryId = new QLabel($this->objParentObject, $strControlId);
			$this->lblCategoryId->Name = QApplication::Translate('Category');
			$this->lblCategoryId->Text = ($this->objLraQuestions->CategoryId) ? LraCategoryType::$NameArray[$this->objLraQuestions->CategoryId] : null;
			return $this->lblCategoryId;
		}

		/**
		 * Create and setup QCheckBox chkInvert
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkInvert_Create($strControlId = null) {
			$this->chkInvert = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkInvert->Name = QApplication::Translate('Invert');
			$this->chkInvert->Checked = $this->objLraQuestions->Invert;
			return $this->chkInvert;
		}

		/**
		 * Create and setup QLabel lblInvert
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblInvert_Create($strControlId = null) {
			$this->lblInvert = new QLabel($this->objParentObject, $strControlId);
			$this->lblInvert->Name = QApplication::Translate('Invert');
			$this->lblInvert->Text = ($this->objLraQuestions->Invert) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblInvert;
		}



		/**
		 * Refresh this MetaControl with Data from the local LraQuestions object.
		 * @param boolean $blnReload reload LraQuestions from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objLraQuestions->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objLraQuestions->Id;

			if ($this->txtCount) $this->txtCount->Text = $this->objLraQuestions->Count;
			if ($this->lblCount) $this->lblCount->Text = $this->objLraQuestions->Count;

			if ($this->txtText) $this->txtText->Text = $this->objLraQuestions->Text;
			if ($this->lblText) $this->lblText->Text = $this->objLraQuestions->Text;

			if ($this->lstCategory) $this->lstCategory->SelectedValue = $this->objLraQuestions->CategoryId;
			if ($this->lblCategoryId) $this->lblCategoryId->Text = ($this->objLraQuestions->CategoryId) ? LraCategoryType::$NameArray[$this->objLraQuestions->CategoryId] : null;

			if ($this->chkInvert) $this->chkInvert->Checked = $this->objLraQuestions->Invert;
			if ($this->lblInvert) $this->lblInvert->Text = ($this->objLraQuestions->Invert) ? QApplication::Translate('Yes') : QApplication::Translate('No');

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC LRAQUESTIONS OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's LraQuestions instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveLraQuestions() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtCount) $this->objLraQuestions->Count = $this->txtCount->Text;
				if ($this->txtText) $this->objLraQuestions->Text = $this->txtText->Text;
				if ($this->lstCategory) $this->objLraQuestions->CategoryId = $this->lstCategory->SelectedValue;
				if ($this->chkInvert) $this->objLraQuestions->Invert = $this->chkInvert->Checked;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the LraQuestions object
				$this->objLraQuestions->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's LraQuestions instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteLraQuestions() {
			$this->objLraQuestions->Delete();
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
				case 'LraQuestions': return $this->objLraQuestions;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to LraQuestions fields -- will be created dynamically if not yet created
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
				case 'CategoryIdControl':
					if (!$this->lstCategory) return $this->lstCategory_Create();
					return $this->lstCategory;
				case 'CategoryIdLabel':
					if (!$this->lblCategoryId) return $this->lblCategoryId_Create();
					return $this->lblCategoryId;
				case 'InvertControl':
					if (!$this->chkInvert) return $this->chkInvert_Create();
					return $this->chkInvert;
				case 'InvertLabel':
					if (!$this->lblInvert) return $this->lblInvert_Create();
					return $this->lblInvert;
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
					// Controls that point to LraQuestions fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'CountControl':
						return ($this->txtCount = QType::Cast($mixValue, 'QControl'));
					case 'TextControl':
						return ($this->txtText = QType::Cast($mixValue, 'QControl'));
					case 'CategoryIdControl':
						return ($this->lstCategory = QType::Cast($mixValue, 'QControl'));
					case 'InvertControl':
						return ($this->chkInvert = QType::Cast($mixValue, 'QControl'));
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