<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the TenPResults class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single TenPResults object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a TenPResultsMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read TenPResults $TenPResults the actual TenPResults data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $QuestionIdControl
	 * property-read QLabel $QuestionIdLabel
	 * property QListBox $AssessmentIdControl
	 * property-read QLabel $AssessmentIdLabel
	 * property QIntegerTextBox $PerformanceControl
	 * property-read QLabel $PerformanceLabel
	 * property QIntegerTextBox $ImportanceControl
	 * property-read QLabel $ImportanceLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class TenPResultsMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var TenPResults objTenPResults
		 * @access protected
		 */
		protected $objTenPResults;

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

		// Controls that allow the editing of TenPResults's individual data fields
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
         * @var QIntegerTextBox txtPerformance;
         * @access protected
         */
		protected $txtPerformance;

        /**
         * @var QIntegerTextBox txtImportance;
         * @access protected
         */
		protected $txtImportance;


		// Controls that allow the viewing of TenPResults's individual data fields
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
         * @var QLabel lblPerformance
         * @access protected
         */
		protected $lblPerformance;

        /**
         * @var QLabel lblImportance
         * @access protected
         */
		protected $lblImportance;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * TenPResultsMetaControl to edit a single TenPResults object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single TenPResults object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this TenPResultsMetaControl
		 * @param TenPResults $objTenPResults new or existing TenPResults object
		 */
		 public function __construct($objParentObject, TenPResults $objTenPResults) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this TenPResultsMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked TenPResults object
			$this->objTenPResults = $objTenPResults;

			// Figure out if we're Editing or Creating New
			if ($this->objTenPResults->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this TenPResultsMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing TenPResults object creation - defaults to CreateOrEdit
 		 * @return TenPResultsMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objTenPResults = TenPResults::Load($intId);

				// TenPResults was found -- return it!
				if ($objTenPResults)
					return new TenPResultsMetaControl($objParentObject, $objTenPResults);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a TenPResults object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new TenPResultsMetaControl($objParentObject, new TenPResults());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this TenPResultsMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing TenPResults object creation - defaults to CreateOrEdit
		 * @return TenPResultsMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return TenPResultsMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this TenPResultsMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing TenPResults object creation - defaults to CreateOrEdit
		 * @return TenPResultsMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return TenPResultsMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objTenPResults->Id;
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
			$objQuestionCursor = TenPQuestions::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objQuestion = TenPQuestions::InstantiateCursor($objQuestionCursor)) {
				$objListItem = new QListItem($objQuestion->__toString(), $objQuestion->Id);
				if (($this->objTenPResults->Question) && ($this->objTenPResults->Question->Id == $objQuestion->Id))
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
			$this->lblQuestionId->Text = ($this->objTenPResults->Question) ? $this->objTenPResults->Question->__toString() : null;
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
			$objAssessmentCursor = TenPAssessment::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objAssessment = TenPAssessment::InstantiateCursor($objAssessmentCursor)) {
				$objListItem = new QListItem($objAssessment->__toString(), $objAssessment->Id);
				if (($this->objTenPResults->Assessment) && ($this->objTenPResults->Assessment->Id == $objAssessment->Id))
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
			$this->lblAssessmentId->Text = ($this->objTenPResults->Assessment) ? $this->objTenPResults->Assessment->__toString() : null;
			return $this->lblAssessmentId;
		}

		/**
		 * Create and setup QIntegerTextBox txtPerformance
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtPerformance_Create($strControlId = null) {
			$this->txtPerformance = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtPerformance->Name = QApplication::Translate('Performance');
			$this->txtPerformance->Text = $this->objTenPResults->Performance;
			return $this->txtPerformance;
		}

		/**
		 * Create and setup QLabel lblPerformance
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblPerformance_Create($strControlId = null, $strFormat = null) {
			$this->lblPerformance = new QLabel($this->objParentObject, $strControlId);
			$this->lblPerformance->Name = QApplication::Translate('Performance');
			$this->lblPerformance->Text = $this->objTenPResults->Performance;
			$this->lblPerformance->Format = $strFormat;
			return $this->lblPerformance;
		}

		/**
		 * Create and setup QIntegerTextBox txtImportance
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtImportance_Create($strControlId = null) {
			$this->txtImportance = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtImportance->Name = QApplication::Translate('Importance');
			$this->txtImportance->Text = $this->objTenPResults->Importance;
			return $this->txtImportance;
		}

		/**
		 * Create and setup QLabel lblImportance
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblImportance_Create($strControlId = null, $strFormat = null) {
			$this->lblImportance = new QLabel($this->objParentObject, $strControlId);
			$this->lblImportance->Name = QApplication::Translate('Importance');
			$this->lblImportance->Text = $this->objTenPResults->Importance;
			$this->lblImportance->Format = $strFormat;
			return $this->lblImportance;
		}



		/**
		 * Refresh this MetaControl with Data from the local TenPResults object.
		 * @param boolean $blnReload reload TenPResults from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objTenPResults->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objTenPResults->Id;

			if ($this->lstQuestion) {
					$this->lstQuestion->RemoveAllItems();
				$this->lstQuestion->AddItem(QApplication::Translate('- Select One -'), null);
				$objQuestionArray = TenPQuestions::LoadAll();
				if ($objQuestionArray) foreach ($objQuestionArray as $objQuestion) {
					$objListItem = new QListItem($objQuestion->__toString(), $objQuestion->Id);
					if (($this->objTenPResults->Question) && ($this->objTenPResults->Question->Id == $objQuestion->Id))
						$objListItem->Selected = true;
					$this->lstQuestion->AddItem($objListItem);
				}
			}
			if ($this->lblQuestionId) $this->lblQuestionId->Text = ($this->objTenPResults->Question) ? $this->objTenPResults->Question->__toString() : null;

			if ($this->lstAssessment) {
					$this->lstAssessment->RemoveAllItems();
				$this->lstAssessment->AddItem(QApplication::Translate('- Select One -'), null);
				$objAssessmentArray = TenPAssessment::LoadAll();
				if ($objAssessmentArray) foreach ($objAssessmentArray as $objAssessment) {
					$objListItem = new QListItem($objAssessment->__toString(), $objAssessment->Id);
					if (($this->objTenPResults->Assessment) && ($this->objTenPResults->Assessment->Id == $objAssessment->Id))
						$objListItem->Selected = true;
					$this->lstAssessment->AddItem($objListItem);
				}
			}
			if ($this->lblAssessmentId) $this->lblAssessmentId->Text = ($this->objTenPResults->Assessment) ? $this->objTenPResults->Assessment->__toString() : null;

			if ($this->txtPerformance) $this->txtPerformance->Text = $this->objTenPResults->Performance;
			if ($this->lblPerformance) $this->lblPerformance->Text = $this->objTenPResults->Performance;

			if ($this->txtImportance) $this->txtImportance->Text = $this->objTenPResults->Importance;
			if ($this->lblImportance) $this->lblImportance->Text = $this->objTenPResults->Importance;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC TENPRESULTS OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's TenPResults instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveTenPResults() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstQuestion) $this->objTenPResults->QuestionId = $this->lstQuestion->SelectedValue;
				if ($this->lstAssessment) $this->objTenPResults->AssessmentId = $this->lstAssessment->SelectedValue;
				if ($this->txtPerformance) $this->objTenPResults->Performance = $this->txtPerformance->Text;
				if ($this->txtImportance) $this->objTenPResults->Importance = $this->txtImportance->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the TenPResults object
				$this->objTenPResults->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's TenPResults instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteTenPResults() {
			$this->objTenPResults->Delete();
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
				case 'TenPResults': return $this->objTenPResults;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to TenPResults fields -- will be created dynamically if not yet created
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
				case 'PerformanceControl':
					if (!$this->txtPerformance) return $this->txtPerformance_Create();
					return $this->txtPerformance;
				case 'PerformanceLabel':
					if (!$this->lblPerformance) return $this->lblPerformance_Create();
					return $this->lblPerformance;
				case 'ImportanceControl':
					if (!$this->txtImportance) return $this->txtImportance_Create();
					return $this->txtImportance;
				case 'ImportanceLabel':
					if (!$this->lblImportance) return $this->lblImportance_Create();
					return $this->lblImportance;
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
					// Controls that point to TenPResults fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'QuestionIdControl':
						return ($this->lstQuestion = QType::Cast($mixValue, 'QControl'));
					case 'AssessmentIdControl':
						return ($this->lstAssessment = QType::Cast($mixValue, 'QControl'));
					case 'PerformanceControl':
						return ($this->txtPerformance = QType::Cast($mixValue, 'QControl'));
					case 'ImportanceControl':
						return ($this->txtImportance = QType::Cast($mixValue, 'QControl'));
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