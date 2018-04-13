<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the LemonloversAssessmentResults class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single LemonloversAssessmentResults object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a LemonloversAssessmentResultsMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read LemonloversAssessmentResults $LemonloversAssessmentResults the actual LemonloversAssessmentResults data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $QuestionIdControl
	 * property-read QLabel $QuestionIdLabel
	 * property QIntegerTextBox $AssessmentIdControl
	 * property-read QLabel $AssessmentIdLabel
	 * property QIntegerTextBox $ValueControl
	 * property-read QLabel $ValueLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class LemonloversAssessmentResultsMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var LemonloversAssessmentResults objLemonloversAssessmentResults
		 * @access protected
		 */
		protected $objLemonloversAssessmentResults;

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

		// Controls that allow the editing of LemonloversAssessmentResults's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QListBox lstQuestion;
         * @access protected
         */
		protected $lstQuestion;

        /**
         * @var QIntegerTextBox txtAssessmentId;
         * @access protected
         */
		protected $txtAssessmentId;

        /**
         * @var QIntegerTextBox txtValue;
         * @access protected
         */
		protected $txtValue;


		// Controls that allow the viewing of LemonloversAssessmentResults's individual data fields
        /**
         * @var QLabel lblQuestionId
         * @access protected
         */
		protected $lblQuestionId;

        /**
         * @var QLabel lblAssessmentId
         * @access protected
         */
		protected $lblAssessmentId;

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
		 * LemonloversAssessmentResultsMetaControl to edit a single LemonloversAssessmentResults object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single LemonloversAssessmentResults object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this LemonloversAssessmentResultsMetaControl
		 * @param LemonloversAssessmentResults $objLemonloversAssessmentResults new or existing LemonloversAssessmentResults object
		 */
		 public function __construct($objParentObject, LemonloversAssessmentResults $objLemonloversAssessmentResults) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this LemonloversAssessmentResultsMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked LemonloversAssessmentResults object
			$this->objLemonloversAssessmentResults = $objLemonloversAssessmentResults;

			// Figure out if we're Editing or Creating New
			if ($this->objLemonloversAssessmentResults->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this LemonloversAssessmentResultsMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing LemonloversAssessmentResults object creation - defaults to CreateOrEdit
 		 * @return LemonloversAssessmentResultsMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objLemonloversAssessmentResults = LemonloversAssessmentResults::Load($intId);

				// LemonloversAssessmentResults was found -- return it!
				if ($objLemonloversAssessmentResults)
					return new LemonloversAssessmentResultsMetaControl($objParentObject, $objLemonloversAssessmentResults);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a LemonloversAssessmentResults object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new LemonloversAssessmentResultsMetaControl($objParentObject, new LemonloversAssessmentResults());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this LemonloversAssessmentResultsMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing LemonloversAssessmentResults object creation - defaults to CreateOrEdit
		 * @return LemonloversAssessmentResultsMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return LemonloversAssessmentResultsMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this LemonloversAssessmentResultsMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing LemonloversAssessmentResults object creation - defaults to CreateOrEdit
		 * @return LemonloversAssessmentResultsMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return LemonloversAssessmentResultsMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objLemonloversAssessmentResults->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QListBox lstQuestion
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstQuestion_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstQuestion = new QListBox($this->objParentObject, $strControlId);
			$this->lstQuestion->Name = QApplication::Translate('Question');
			$this->lstQuestion->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objQuestionCursor = LemonloversAssessmentQuestions::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objQuestion = LemonloversAssessmentQuestions::InstantiateCursor($objQuestionCursor)) {
				$objListItem = new QListItem($objQuestion->__toString(), $objQuestion->Id);
				if (($this->objLemonloversAssessmentResults->Question) && ($this->objLemonloversAssessmentResults->Question->Id == $objQuestion->Id))
					$objListItem->Selected = true;
				$this->lstQuestion->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstQuestion;
		}

		/**
		 * Create and setup QLabel lblQuestionId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblQuestionId_Create($strControlId = null) {
			$this->lblQuestionId = new QLabel($this->objParentObject, $strControlId);
			$this->lblQuestionId->Name = QApplication::Translate('Question');
			$this->lblQuestionId->Text = ($this->objLemonloversAssessmentResults->Question) ? $this->objLemonloversAssessmentResults->Question->__toString() : null;
			return $this->lblQuestionId;
		}

		/**
		 * Create and setup QIntegerTextBox txtAssessmentId
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtAssessmentId_Create($strControlId = null) {
			$this->txtAssessmentId = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtAssessmentId->Name = QApplication::Translate('Assessment Id');
			$this->txtAssessmentId->Text = $this->objLemonloversAssessmentResults->AssessmentId;
			return $this->txtAssessmentId;
		}

		/**
		 * Create and setup QLabel lblAssessmentId
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblAssessmentId_Create($strControlId = null, $strFormat = null) {
			$this->lblAssessmentId = new QLabel($this->objParentObject, $strControlId);
			$this->lblAssessmentId->Name = QApplication::Translate('Assessment Id');
			$this->lblAssessmentId->Text = $this->objLemonloversAssessmentResults->AssessmentId;
			$this->lblAssessmentId->Format = $strFormat;
			return $this->lblAssessmentId;
		}

		/**
		 * Create and setup QIntegerTextBox txtValue
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtValue_Create($strControlId = null) {
			$this->txtValue = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtValue->Name = QApplication::Translate('Value');
			$this->txtValue->Text = $this->objLemonloversAssessmentResults->Value;
			return $this->txtValue;
		}

		/**
		 * Create and setup QLabel lblValue
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblValue_Create($strControlId = null, $strFormat = null) {
			$this->lblValue = new QLabel($this->objParentObject, $strControlId);
			$this->lblValue->Name = QApplication::Translate('Value');
			$this->lblValue->Text = $this->objLemonloversAssessmentResults->Value;
			$this->lblValue->Format = $strFormat;
			return $this->lblValue;
		}



		/**
		 * Refresh this MetaControl with Data from the local LemonloversAssessmentResults object.
		 * @param boolean $blnReload reload LemonloversAssessmentResults from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objLemonloversAssessmentResults->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objLemonloversAssessmentResults->Id;

			if ($this->lstQuestion) {
					$this->lstQuestion->RemoveAllItems();
				$this->lstQuestion->AddItem(QApplication::Translate('- Select One -'), null);
				$objQuestionArray = LemonloversAssessmentQuestions::LoadAll();
				if ($objQuestionArray) foreach ($objQuestionArray as $objQuestion) {
					$objListItem = new QListItem($objQuestion->__toString(), $objQuestion->Id);
					if (($this->objLemonloversAssessmentResults->Question) && ($this->objLemonloversAssessmentResults->Question->Id == $objQuestion->Id))
						$objListItem->Selected = true;
					$this->lstQuestion->AddItem($objListItem);
				}
			}
			if ($this->lblQuestionId) $this->lblQuestionId->Text = ($this->objLemonloversAssessmentResults->Question) ? $this->objLemonloversAssessmentResults->Question->__toString() : null;

			if ($this->txtAssessmentId) $this->txtAssessmentId->Text = $this->objLemonloversAssessmentResults->AssessmentId;
			if ($this->lblAssessmentId) $this->lblAssessmentId->Text = $this->objLemonloversAssessmentResults->AssessmentId;

			if ($this->txtValue) $this->txtValue->Text = $this->objLemonloversAssessmentResults->Value;
			if ($this->lblValue) $this->lblValue->Text = $this->objLemonloversAssessmentResults->Value;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC LEMONLOVERSASSESSMENTRESULTS OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's LemonloversAssessmentResults instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveLemonloversAssessmentResults() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstQuestion) $this->objLemonloversAssessmentResults->QuestionId = $this->lstQuestion->SelectedValue;
				if ($this->txtAssessmentId) $this->objLemonloversAssessmentResults->AssessmentId = $this->txtAssessmentId->Text;
				if ($this->txtValue) $this->objLemonloversAssessmentResults->Value = $this->txtValue->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the LemonloversAssessmentResults object
				$this->objLemonloversAssessmentResults->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's LemonloversAssessmentResults instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteLemonloversAssessmentResults() {
			$this->objLemonloversAssessmentResults->Delete();
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
				case 'LemonloversAssessmentResults': return $this->objLemonloversAssessmentResults;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to LemonloversAssessmentResults fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'QuestionIdControl':
					if (!$this->lstQuestion) return $this->lstQuestion_Create();
					return $this->lstQuestion;
				case 'QuestionIdLabel':
					if (!$this->lblQuestionId) return $this->lblQuestionId_Create();
					return $this->lblQuestionId;
				case 'AssessmentIdControl':
					if (!$this->txtAssessmentId) return $this->txtAssessmentId_Create();
					return $this->txtAssessmentId;
				case 'AssessmentIdLabel':
					if (!$this->lblAssessmentId) return $this->lblAssessmentId_Create();
					return $this->lblAssessmentId;
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
					// Controls that point to LemonloversAssessmentResults fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'QuestionIdControl':
						return ($this->lstQuestion = QType::Cast($mixValue, 'QControl'));
					case 'AssessmentIdControl':
						return ($this->txtAssessmentId = QType::Cast($mixValue, 'QControl'));
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