<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the LemonAssessmentResults class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single LemonAssessmentResults object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a LemonAssessmentResultsMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read LemonAssessmentResults $LemonAssessmentResults the actual LemonAssessmentResults data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $QuestionIdControl
	 * property-read QLabel $QuestionIdLabel
	 * property QListBox $AssessmentIdControl
	 * property-read QLabel $AssessmentIdLabel
	 * property QIntegerTextBox $ValueControl
	 * property-read QLabel $ValueLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class LemonAssessmentResultsMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var LemonAssessmentResults objLemonAssessmentResults
		 * @access protected
		 */
		protected $objLemonAssessmentResults;

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

		// Controls that allow the editing of LemonAssessmentResults's individual data fields
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
         * @var QListBox lstAssessment;
         * @access protected
         */
		protected $lstAssessment;

        /**
         * @var QIntegerTextBox txtValue;
         * @access protected
         */
		protected $txtValue;


		// Controls that allow the viewing of LemonAssessmentResults's individual data fields
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
		 * LemonAssessmentResultsMetaControl to edit a single LemonAssessmentResults object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single LemonAssessmentResults object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this LemonAssessmentResultsMetaControl
		 * @param LemonAssessmentResults $objLemonAssessmentResults new or existing LemonAssessmentResults object
		 */
		 public function __construct($objParentObject, LemonAssessmentResults $objLemonAssessmentResults) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this LemonAssessmentResultsMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked LemonAssessmentResults object
			$this->objLemonAssessmentResults = $objLemonAssessmentResults;

			// Figure out if we're Editing or Creating New
			if ($this->objLemonAssessmentResults->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this LemonAssessmentResultsMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing LemonAssessmentResults object creation - defaults to CreateOrEdit
 		 * @return LemonAssessmentResultsMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objLemonAssessmentResults = LemonAssessmentResults::Load($intId);

				// LemonAssessmentResults was found -- return it!
				if ($objLemonAssessmentResults)
					return new LemonAssessmentResultsMetaControl($objParentObject, $objLemonAssessmentResults);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a LemonAssessmentResults object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new LemonAssessmentResultsMetaControl($objParentObject, new LemonAssessmentResults());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this LemonAssessmentResultsMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing LemonAssessmentResults object creation - defaults to CreateOrEdit
		 * @return LemonAssessmentResultsMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return LemonAssessmentResultsMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this LemonAssessmentResultsMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing LemonAssessmentResults object creation - defaults to CreateOrEdit
		 * @return LemonAssessmentResultsMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return LemonAssessmentResultsMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objLemonAssessmentResults->Id;
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
			$objQuestionCursor = LemonAssessmentQuestions::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objQuestion = LemonAssessmentQuestions::InstantiateCursor($objQuestionCursor)) {
				$objListItem = new QListItem($objQuestion->__toString(), $objQuestion->Id);
				if (($this->objLemonAssessmentResults->Question) && ($this->objLemonAssessmentResults->Question->Id == $objQuestion->Id))
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
			$this->lblQuestionId->Text = ($this->objLemonAssessmentResults->Question) ? $this->objLemonAssessmentResults->Question->__toString() : null;
			return $this->lblQuestionId;
		}

		/**
		 * Create and setup QListBox lstAssessment
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstAssessment_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstAssessment = new QListBox($this->objParentObject, $strControlId);
			$this->lstAssessment->Name = QApplication::Translate('Assessment');
			$this->lstAssessment->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objAssessmentCursor = LemonAssessment::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objAssessment = LemonAssessment::InstantiateCursor($objAssessmentCursor)) {
				$objListItem = new QListItem($objAssessment->__toString(), $objAssessment->Id);
				if (($this->objLemonAssessmentResults->Assessment) && ($this->objLemonAssessmentResults->Assessment->Id == $objAssessment->Id))
					$objListItem->Selected = true;
				$this->lstAssessment->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstAssessment;
		}

		/**
		 * Create and setup QLabel lblAssessmentId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAssessmentId_Create($strControlId = null) {
			$this->lblAssessmentId = new QLabel($this->objParentObject, $strControlId);
			$this->lblAssessmentId->Name = QApplication::Translate('Assessment');
			$this->lblAssessmentId->Text = ($this->objLemonAssessmentResults->Assessment) ? $this->objLemonAssessmentResults->Assessment->__toString() : null;
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
			$this->txtValue->Text = $this->objLemonAssessmentResults->Value;
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
			$this->lblValue->Text = $this->objLemonAssessmentResults->Value;
			$this->lblValue->Format = $strFormat;
			return $this->lblValue;
		}



		/**
		 * Refresh this MetaControl with Data from the local LemonAssessmentResults object.
		 * @param boolean $blnReload reload LemonAssessmentResults from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objLemonAssessmentResults->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objLemonAssessmentResults->Id;

			if ($this->lstQuestion) {
					$this->lstQuestion->RemoveAllItems();
				$this->lstQuestion->AddItem(QApplication::Translate('- Select One -'), null);
				$objQuestionArray = LemonAssessmentQuestions::LoadAll();
				if ($objQuestionArray) foreach ($objQuestionArray as $objQuestion) {
					$objListItem = new QListItem($objQuestion->__toString(), $objQuestion->Id);
					if (($this->objLemonAssessmentResults->Question) && ($this->objLemonAssessmentResults->Question->Id == $objQuestion->Id))
						$objListItem->Selected = true;
					$this->lstQuestion->AddItem($objListItem);
				}
			}
			if ($this->lblQuestionId) $this->lblQuestionId->Text = ($this->objLemonAssessmentResults->Question) ? $this->objLemonAssessmentResults->Question->__toString() : null;

			if ($this->lstAssessment) {
					$this->lstAssessment->RemoveAllItems();
				$this->lstAssessment->AddItem(QApplication::Translate('- Select One -'), null);
				$objAssessmentArray = LemonAssessment::LoadAll();
				if ($objAssessmentArray) foreach ($objAssessmentArray as $objAssessment) {
					$objListItem = new QListItem($objAssessment->__toString(), $objAssessment->Id);
					if (($this->objLemonAssessmentResults->Assessment) && ($this->objLemonAssessmentResults->Assessment->Id == $objAssessment->Id))
						$objListItem->Selected = true;
					$this->lstAssessment->AddItem($objListItem);
				}
			}
			if ($this->lblAssessmentId) $this->lblAssessmentId->Text = ($this->objLemonAssessmentResults->Assessment) ? $this->objLemonAssessmentResults->Assessment->__toString() : null;

			if ($this->txtValue) $this->txtValue->Text = $this->objLemonAssessmentResults->Value;
			if ($this->lblValue) $this->lblValue->Text = $this->objLemonAssessmentResults->Value;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC LEMONASSESSMENTRESULTS OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's LemonAssessmentResults instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveLemonAssessmentResults() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstQuestion) $this->objLemonAssessmentResults->QuestionId = $this->lstQuestion->SelectedValue;
				if ($this->lstAssessment) $this->objLemonAssessmentResults->AssessmentId = $this->lstAssessment->SelectedValue;
				if ($this->txtValue) $this->objLemonAssessmentResults->Value = $this->txtValue->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the LemonAssessmentResults object
				$this->objLemonAssessmentResults->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's LemonAssessmentResults instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteLemonAssessmentResults() {
			$this->objLemonAssessmentResults->Delete();
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
				case 'LemonAssessmentResults': return $this->objLemonAssessmentResults;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to LemonAssessmentResults fields -- will be created dynamically if not yet created
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
					if (!$this->lstAssessment) return $this->lstAssessment_Create();
					return $this->lstAssessment;
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
					// Controls that point to LemonAssessmentResults fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'QuestionIdControl':
						return ($this->lstQuestion = QType::Cast($mixValue, 'QControl'));
					case 'AssessmentIdControl':
						return ($this->lstAssessment = QType::Cast($mixValue, 'QControl'));
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