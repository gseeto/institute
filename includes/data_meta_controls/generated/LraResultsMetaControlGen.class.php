<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the LraResults class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single LraResults object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a LraResultsMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read LraResults $LraResults the actual LraResults data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $QuestionIdControl
	 * property-read QLabel $QuestionIdLabel
	 * property QListBox $AssessmentIdControl
	 * property-read QLabel $AssessmentIdLabel
	 * property QIntegerTextBox $HeadControl
	 * property-read QLabel $HeadLabel
	 * property QIntegerTextBox $HandsControl
	 * property-read QLabel $HandsLabel
	 * property QIntegerTextBox $HeartControl
	 * property-read QLabel $HeartLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class LraResultsMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var LraResults objLraResults
		 * @access protected
		 */
		protected $objLraResults;

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

		// Controls that allow the editing of LraResults's individual data fields
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
         * @var QIntegerTextBox txtHead;
         * @access protected
         */
		protected $txtHead;

        /**
         * @var QIntegerTextBox txtHands;
         * @access protected
         */
		protected $txtHands;

        /**
         * @var QIntegerTextBox txtHeart;
         * @access protected
         */
		protected $txtHeart;


		// Controls that allow the viewing of LraResults's individual data fields
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
         * @var QLabel lblHead
         * @access protected
         */
		protected $lblHead;

        /**
         * @var QLabel lblHands
         * @access protected
         */
		protected $lblHands;

        /**
         * @var QLabel lblHeart
         * @access protected
         */
		protected $lblHeart;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * LraResultsMetaControl to edit a single LraResults object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single LraResults object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this LraResultsMetaControl
		 * @param LraResults $objLraResults new or existing LraResults object
		 */
		 public function __construct($objParentObject, LraResults $objLraResults) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this LraResultsMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked LraResults object
			$this->objLraResults = $objLraResults;

			// Figure out if we're Editing or Creating New
			if ($this->objLraResults->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this LraResultsMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing LraResults object creation - defaults to CreateOrEdit
 		 * @return LraResultsMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objLraResults = LraResults::Load($intId);

				// LraResults was found -- return it!
				if ($objLraResults)
					return new LraResultsMetaControl($objParentObject, $objLraResults);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a LraResults object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new LraResultsMetaControl($objParentObject, new LraResults());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this LraResultsMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing LraResults object creation - defaults to CreateOrEdit
		 * @return LraResultsMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return LraResultsMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this LraResultsMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing LraResults object creation - defaults to CreateOrEdit
		 * @return LraResultsMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return LraResultsMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objLraResults->Id;
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
			$objQuestionCursor = LraQuestions::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objQuestion = LraQuestions::InstantiateCursor($objQuestionCursor)) {
				$objListItem = new QListItem($objQuestion->__toString(), $objQuestion->Id);
				if (($this->objLraResults->Question) && ($this->objLraResults->Question->Id == $objQuestion->Id))
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
			$this->lblQuestionId->Text = ($this->objLraResults->Question) ? $this->objLraResults->Question->__toString() : null;
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
			$objAssessmentCursor = LraAssessment::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objAssessment = LraAssessment::InstantiateCursor($objAssessmentCursor)) {
				$objListItem = new QListItem($objAssessment->__toString(), $objAssessment->Id);
				if (($this->objLraResults->Assessment) && ($this->objLraResults->Assessment->Id == $objAssessment->Id))
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
			$this->lblAssessmentId->Text = ($this->objLraResults->Assessment) ? $this->objLraResults->Assessment->__toString() : null;
			return $this->lblAssessmentId;
		}

		/**
		 * Create and setup QIntegerTextBox txtHead
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtHead_Create($strControlId = null) {
			$this->txtHead = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtHead->Name = QApplication::Translate('Head');
			$this->txtHead->Text = $this->objLraResults->Head;
			return $this->txtHead;
		}

		/**
		 * Create and setup QLabel lblHead
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblHead_Create($strControlId = null, $strFormat = null) {
			$this->lblHead = new QLabel($this->objParentObject, $strControlId);
			$this->lblHead->Name = QApplication::Translate('Head');
			$this->lblHead->Text = $this->objLraResults->Head;
			$this->lblHead->Format = $strFormat;
			return $this->lblHead;
		}

		/**
		 * Create and setup QIntegerTextBox txtHands
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtHands_Create($strControlId = null) {
			$this->txtHands = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtHands->Name = QApplication::Translate('Hands');
			$this->txtHands->Text = $this->objLraResults->Hands;
			return $this->txtHands;
		}

		/**
		 * Create and setup QLabel lblHands
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblHands_Create($strControlId = null, $strFormat = null) {
			$this->lblHands = new QLabel($this->objParentObject, $strControlId);
			$this->lblHands->Name = QApplication::Translate('Hands');
			$this->lblHands->Text = $this->objLraResults->Hands;
			$this->lblHands->Format = $strFormat;
			return $this->lblHands;
		}

		/**
		 * Create and setup QIntegerTextBox txtHeart
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtHeart_Create($strControlId = null) {
			$this->txtHeart = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtHeart->Name = QApplication::Translate('Heart');
			$this->txtHeart->Text = $this->objLraResults->Heart;
			return $this->txtHeart;
		}

		/**
		 * Create and setup QLabel lblHeart
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblHeart_Create($strControlId = null, $strFormat = null) {
			$this->lblHeart = new QLabel($this->objParentObject, $strControlId);
			$this->lblHeart->Name = QApplication::Translate('Heart');
			$this->lblHeart->Text = $this->objLraResults->Heart;
			$this->lblHeart->Format = $strFormat;
			return $this->lblHeart;
		}



		/**
		 * Refresh this MetaControl with Data from the local LraResults object.
		 * @param boolean $blnReload reload LraResults from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objLraResults->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objLraResults->Id;

			if ($this->lstQuestion) {
					$this->lstQuestion->RemoveAllItems();
				$this->lstQuestion->AddItem(QApplication::Translate('- Select One -'), null);
				$objQuestionArray = LraQuestions::LoadAll();
				if ($objQuestionArray) foreach ($objQuestionArray as $objQuestion) {
					$objListItem = new QListItem($objQuestion->__toString(), $objQuestion->Id);
					if (($this->objLraResults->Question) && ($this->objLraResults->Question->Id == $objQuestion->Id))
						$objListItem->Selected = true;
					$this->lstQuestion->AddItem($objListItem);
				}
			}
			if ($this->lblQuestionId) $this->lblQuestionId->Text = ($this->objLraResults->Question) ? $this->objLraResults->Question->__toString() : null;

			if ($this->lstAssessment) {
					$this->lstAssessment->RemoveAllItems();
				$this->lstAssessment->AddItem(QApplication::Translate('- Select One -'), null);
				$objAssessmentArray = LraAssessment::LoadAll();
				if ($objAssessmentArray) foreach ($objAssessmentArray as $objAssessment) {
					$objListItem = new QListItem($objAssessment->__toString(), $objAssessment->Id);
					if (($this->objLraResults->Assessment) && ($this->objLraResults->Assessment->Id == $objAssessment->Id))
						$objListItem->Selected = true;
					$this->lstAssessment->AddItem($objListItem);
				}
			}
			if ($this->lblAssessmentId) $this->lblAssessmentId->Text = ($this->objLraResults->Assessment) ? $this->objLraResults->Assessment->__toString() : null;

			if ($this->txtHead) $this->txtHead->Text = $this->objLraResults->Head;
			if ($this->lblHead) $this->lblHead->Text = $this->objLraResults->Head;

			if ($this->txtHands) $this->txtHands->Text = $this->objLraResults->Hands;
			if ($this->lblHands) $this->lblHands->Text = $this->objLraResults->Hands;

			if ($this->txtHeart) $this->txtHeart->Text = $this->objLraResults->Heart;
			if ($this->lblHeart) $this->lblHeart->Text = $this->objLraResults->Heart;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC LRARESULTS OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's LraResults instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveLraResults() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstQuestion) $this->objLraResults->QuestionId = $this->lstQuestion->SelectedValue;
				if ($this->lstAssessment) $this->objLraResults->AssessmentId = $this->lstAssessment->SelectedValue;
				if ($this->txtHead) $this->objLraResults->Head = $this->txtHead->Text;
				if ($this->txtHands) $this->objLraResults->Hands = $this->txtHands->Text;
				if ($this->txtHeart) $this->objLraResults->Heart = $this->txtHeart->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the LraResults object
				$this->objLraResults->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's LraResults instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteLraResults() {
			$this->objLraResults->Delete();
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
				case 'LraResults': return $this->objLraResults;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to LraResults fields -- will be created dynamically if not yet created
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
				case 'HeadControl':
					if (!$this->txtHead) return $this->txtHead_Create();
					return $this->txtHead;
				case 'HeadLabel':
					if (!$this->lblHead) return $this->lblHead_Create();
					return $this->lblHead;
				case 'HandsControl':
					if (!$this->txtHands) return $this->txtHands_Create();
					return $this->txtHands;
				case 'HandsLabel':
					if (!$this->lblHands) return $this->lblHands_Create();
					return $this->lblHands;
				case 'HeartControl':
					if (!$this->txtHeart) return $this->txtHeart_Create();
					return $this->txtHeart;
				case 'HeartLabel':
					if (!$this->lblHeart) return $this->lblHeart_Create();
					return $this->lblHeart;
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
					// Controls that point to LraResults fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'QuestionIdControl':
						return ($this->lstQuestion = QType::Cast($mixValue, 'QControl'));
					case 'AssessmentIdControl':
						return ($this->lstAssessment = QType::Cast($mixValue, 'QControl'));
					case 'HeadControl':
						return ($this->txtHead = QType::Cast($mixValue, 'QControl'));
					case 'HandsControl':
						return ($this->txtHands = QType::Cast($mixValue, 'QControl'));
					case 'HeartControl':
						return ($this->txtHeart = QType::Cast($mixValue, 'QControl'));
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