<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the BusinessChecklistResults class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single BusinessChecklistResults object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a BusinessChecklistResultsMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read BusinessChecklistResults $BusinessChecklistResults the actual BusinessChecklistResults data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $QuestionIdControl
	 * property-read QLabel $QuestionIdLabel
	 * property QListBox $ChecklistIdControl
	 * property-read QLabel $ChecklistIdLabel
	 * property QIntegerTextBox $ValueControl
	 * property-read QLabel $ValueLabel
	 * property QListBox $UserIdControl
	 * property-read QLabel $UserIdLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class BusinessChecklistResultsMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var BusinessChecklistResults objBusinessChecklistResults
		 * @access protected
		 */
		protected $objBusinessChecklistResults;

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

		// Controls that allow the editing of BusinessChecklistResults's individual data fields
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
         * @var QListBox lstChecklist;
         * @access protected
         */
		protected $lstChecklist;

        /**
         * @var QIntegerTextBox txtValue;
         * @access protected
         */
		protected $txtValue;

        /**
         * @var QListBox lstUser;
         * @access protected
         */
		protected $lstUser;


		// Controls that allow the viewing of BusinessChecklistResults's individual data fields
        /**
         * @var QLabel lblQuestionId
         * @access protected
         */
		protected $lblQuestionId;

        /**
         * @var QLabel lblChecklistId
         * @access protected
         */
		protected $lblChecklistId;

        /**
         * @var QLabel lblValue
         * @access protected
         */
		protected $lblValue;

        /**
         * @var QLabel lblUserId
         * @access protected
         */
		protected $lblUserId;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * BusinessChecklistResultsMetaControl to edit a single BusinessChecklistResults object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single BusinessChecklistResults object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this BusinessChecklistResultsMetaControl
		 * @param BusinessChecklistResults $objBusinessChecklistResults new or existing BusinessChecklistResults object
		 */
		 public function __construct($objParentObject, BusinessChecklistResults $objBusinessChecklistResults) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this BusinessChecklistResultsMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked BusinessChecklistResults object
			$this->objBusinessChecklistResults = $objBusinessChecklistResults;

			// Figure out if we're Editing or Creating New
			if ($this->objBusinessChecklistResults->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this BusinessChecklistResultsMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing BusinessChecklistResults object creation - defaults to CreateOrEdit
 		 * @return BusinessChecklistResultsMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objBusinessChecklistResults = BusinessChecklistResults::Load($intId);

				// BusinessChecklistResults was found -- return it!
				if ($objBusinessChecklistResults)
					return new BusinessChecklistResultsMetaControl($objParentObject, $objBusinessChecklistResults);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a BusinessChecklistResults object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new BusinessChecklistResultsMetaControl($objParentObject, new BusinessChecklistResults());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this BusinessChecklistResultsMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing BusinessChecklistResults object creation - defaults to CreateOrEdit
		 * @return BusinessChecklistResultsMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return BusinessChecklistResultsMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this BusinessChecklistResultsMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing BusinessChecklistResults object creation - defaults to CreateOrEdit
		 * @return BusinessChecklistResultsMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return BusinessChecklistResultsMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objBusinessChecklistResults->Id;
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
			$objQuestionCursor = BusinessChecklistQuestions::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objQuestion = BusinessChecklistQuestions::InstantiateCursor($objQuestionCursor)) {
				$objListItem = new QListItem($objQuestion->__toString(), $objQuestion->Id);
				if (($this->objBusinessChecklistResults->Question) && ($this->objBusinessChecklistResults->Question->Id == $objQuestion->Id))
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
			$this->lblQuestionId->Text = ($this->objBusinessChecklistResults->Question) ? $this->objBusinessChecklistResults->Question->__toString() : null;
			return $this->lblQuestionId;
		}

		/**
		 * Create and setup QListBox lstChecklist
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstChecklist_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstChecklist = new QListBox($this->objParentObject, $strControlId);
			$this->lstChecklist->Name = QApplication::Translate('Checklist');
			$this->lstChecklist->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objChecklistCursor = BusinessChecklist::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objChecklist = BusinessChecklist::InstantiateCursor($objChecklistCursor)) {
				$objListItem = new QListItem($objChecklist->__toString(), $objChecklist->Id);
				if (($this->objBusinessChecklistResults->Checklist) && ($this->objBusinessChecklistResults->Checklist->Id == $objChecklist->Id))
					$objListItem->Selected = true;
				$this->lstChecklist->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstChecklist;
		}

		/**
		 * Create and setup QLabel lblChecklistId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblChecklistId_Create($strControlId = null) {
			$this->lblChecklistId = new QLabel($this->objParentObject, $strControlId);
			$this->lblChecklistId->Name = QApplication::Translate('Checklist');
			$this->lblChecklistId->Text = ($this->objBusinessChecklistResults->Checklist) ? $this->objBusinessChecklistResults->Checklist->__toString() : null;
			return $this->lblChecklistId;
		}

		/**
		 * Create and setup QIntegerTextBox txtValue
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtValue_Create($strControlId = null) {
			$this->txtValue = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtValue->Name = QApplication::Translate('Value');
			$this->txtValue->Text = $this->objBusinessChecklistResults->Value;
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
			$this->lblValue->Text = $this->objBusinessChecklistResults->Value;
			$this->lblValue->Format = $strFormat;
			return $this->lblValue;
		}

		/**
		 * Create and setup QListBox lstUser
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstUser_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstUser = new QListBox($this->objParentObject, $strControlId);
			$this->lstUser->Name = QApplication::Translate('User');
			$this->lstUser->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objUserCursor = User::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objUser = User::InstantiateCursor($objUserCursor)) {
				$objListItem = new QListItem($objUser->__toString(), $objUser->Id);
				if (($this->objBusinessChecklistResults->User) && ($this->objBusinessChecklistResults->User->Id == $objUser->Id))
					$objListItem->Selected = true;
				$this->lstUser->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstUser;
		}

		/**
		 * Create and setup QLabel lblUserId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblUserId_Create($strControlId = null) {
			$this->lblUserId = new QLabel($this->objParentObject, $strControlId);
			$this->lblUserId->Name = QApplication::Translate('User');
			$this->lblUserId->Text = ($this->objBusinessChecklistResults->User) ? $this->objBusinessChecklistResults->User->__toString() : null;
			return $this->lblUserId;
		}



		/**
		 * Refresh this MetaControl with Data from the local BusinessChecklistResults object.
		 * @param boolean $blnReload reload BusinessChecklistResults from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objBusinessChecklistResults->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objBusinessChecklistResults->Id;

			if ($this->lstQuestion) {
					$this->lstQuestion->RemoveAllItems();
				$this->lstQuestion->AddItem(QApplication::Translate('- Select One -'), null);
				$objQuestionArray = BusinessChecklistQuestions::LoadAll();
				if ($objQuestionArray) foreach ($objQuestionArray as $objQuestion) {
					$objListItem = new QListItem($objQuestion->__toString(), $objQuestion->Id);
					if (($this->objBusinessChecklistResults->Question) && ($this->objBusinessChecklistResults->Question->Id == $objQuestion->Id))
						$objListItem->Selected = true;
					$this->lstQuestion->AddItem($objListItem);
				}
			}
			if ($this->lblQuestionId) $this->lblQuestionId->Text = ($this->objBusinessChecklistResults->Question) ? $this->objBusinessChecklistResults->Question->__toString() : null;

			if ($this->lstChecklist) {
					$this->lstChecklist->RemoveAllItems();
				$this->lstChecklist->AddItem(QApplication::Translate('- Select One -'), null);
				$objChecklistArray = BusinessChecklist::LoadAll();
				if ($objChecklistArray) foreach ($objChecklistArray as $objChecklist) {
					$objListItem = new QListItem($objChecklist->__toString(), $objChecklist->Id);
					if (($this->objBusinessChecklistResults->Checklist) && ($this->objBusinessChecklistResults->Checklist->Id == $objChecklist->Id))
						$objListItem->Selected = true;
					$this->lstChecklist->AddItem($objListItem);
				}
			}
			if ($this->lblChecklistId) $this->lblChecklistId->Text = ($this->objBusinessChecklistResults->Checklist) ? $this->objBusinessChecklistResults->Checklist->__toString() : null;

			if ($this->txtValue) $this->txtValue->Text = $this->objBusinessChecklistResults->Value;
			if ($this->lblValue) $this->lblValue->Text = $this->objBusinessChecklistResults->Value;

			if ($this->lstUser) {
					$this->lstUser->RemoveAllItems();
				$this->lstUser->AddItem(QApplication::Translate('- Select One -'), null);
				$objUserArray = User::LoadAll();
				if ($objUserArray) foreach ($objUserArray as $objUser) {
					$objListItem = new QListItem($objUser->__toString(), $objUser->Id);
					if (($this->objBusinessChecklistResults->User) && ($this->objBusinessChecklistResults->User->Id == $objUser->Id))
						$objListItem->Selected = true;
					$this->lstUser->AddItem($objListItem);
				}
			}
			if ($this->lblUserId) $this->lblUserId->Text = ($this->objBusinessChecklistResults->User) ? $this->objBusinessChecklistResults->User->__toString() : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC BUSINESSCHECKLISTRESULTS OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's BusinessChecklistResults instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveBusinessChecklistResults() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstQuestion) $this->objBusinessChecklistResults->QuestionId = $this->lstQuestion->SelectedValue;
				if ($this->lstChecklist) $this->objBusinessChecklistResults->ChecklistId = $this->lstChecklist->SelectedValue;
				if ($this->txtValue) $this->objBusinessChecklistResults->Value = $this->txtValue->Text;
				if ($this->lstUser) $this->objBusinessChecklistResults->UserId = $this->lstUser->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the BusinessChecklistResults object
				$this->objBusinessChecklistResults->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's BusinessChecklistResults instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteBusinessChecklistResults() {
			$this->objBusinessChecklistResults->Delete();
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
				case 'BusinessChecklistResults': return $this->objBusinessChecklistResults;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to BusinessChecklistResults fields -- will be created dynamically if not yet created
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
				case 'ChecklistIdControl':
					if (!$this->lstChecklist) return $this->lstChecklist_Create();
					return $this->lstChecklist;
				case 'ChecklistIdLabel':
					if (!$this->lblChecklistId) return $this->lblChecklistId_Create();
					return $this->lblChecklistId;
				case 'ValueControl':
					if (!$this->txtValue) return $this->txtValue_Create();
					return $this->txtValue;
				case 'ValueLabel':
					if (!$this->lblValue) return $this->lblValue_Create();
					return $this->lblValue;
				case 'UserIdControl':
					if (!$this->lstUser) return $this->lstUser_Create();
					return $this->lstUser;
				case 'UserIdLabel':
					if (!$this->lblUserId) return $this->lblUserId_Create();
					return $this->lblUserId;
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
					// Controls that point to BusinessChecklistResults fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'QuestionIdControl':
						return ($this->lstQuestion = QType::Cast($mixValue, 'QControl'));
					case 'ChecklistIdControl':
						return ($this->lstChecklist = QType::Cast($mixValue, 'QControl'));
					case 'ValueControl':
						return ($this->txtValue = QType::Cast($mixValue, 'QControl'));
					case 'UserIdControl':
						return ($this->lstUser = QType::Cast($mixValue, 'QControl'));
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