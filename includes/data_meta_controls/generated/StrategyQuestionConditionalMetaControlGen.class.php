<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the StrategyQuestionConditional class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single StrategyQuestionConditional object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a StrategyQuestionConditionalMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read StrategyQuestionConditional $StrategyQuestionConditional the actual StrategyQuestionConditional data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $QuestionIdControl
	 * property-read QLabel $QuestionIdLabel
	 * property QListBox $StrategyIdControl
	 * property-read QLabel $StrategyIdLabel
	 * property QListBox $ConditionalTypeControl
	 * property-read QLabel $ConditionalTypeLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class StrategyQuestionConditionalMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var StrategyQuestionConditional objStrategyQuestionConditional
		 * @access protected
		 */
		protected $objStrategyQuestionConditional;

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

		// Controls that allow the editing of StrategyQuestionConditional's individual data fields
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
         * @var QListBox lstStrategy;
         * @access protected
         */
		protected $lstStrategy;

        /**
         * @var QListBox lstConditionalTypeObject;
         * @access protected
         */
		protected $lstConditionalTypeObject;


		// Controls that allow the viewing of StrategyQuestionConditional's individual data fields
        /**
         * @var QLabel lblQuestionId
         * @access protected
         */
		protected $lblQuestionId;

        /**
         * @var QLabel lblStrategyId
         * @access protected
         */
		protected $lblStrategyId;

        /**
         * @var QLabel lblConditionalType
         * @access protected
         */
		protected $lblConditionalType;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * StrategyQuestionConditionalMetaControl to edit a single StrategyQuestionConditional object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single StrategyQuestionConditional object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this StrategyQuestionConditionalMetaControl
		 * @param StrategyQuestionConditional $objStrategyQuestionConditional new or existing StrategyQuestionConditional object
		 */
		 public function __construct($objParentObject, StrategyQuestionConditional $objStrategyQuestionConditional) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this StrategyQuestionConditionalMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked StrategyQuestionConditional object
			$this->objStrategyQuestionConditional = $objStrategyQuestionConditional;

			// Figure out if we're Editing or Creating New
			if ($this->objStrategyQuestionConditional->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this StrategyQuestionConditionalMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing StrategyQuestionConditional object creation - defaults to CreateOrEdit
 		 * @return StrategyQuestionConditionalMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objStrategyQuestionConditional = StrategyQuestionConditional::Load($intId);

				// StrategyQuestionConditional was found -- return it!
				if ($objStrategyQuestionConditional)
					return new StrategyQuestionConditionalMetaControl($objParentObject, $objStrategyQuestionConditional);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a StrategyQuestionConditional object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new StrategyQuestionConditionalMetaControl($objParentObject, new StrategyQuestionConditional());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this StrategyQuestionConditionalMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing StrategyQuestionConditional object creation - defaults to CreateOrEdit
		 * @return StrategyQuestionConditionalMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return StrategyQuestionConditionalMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this StrategyQuestionConditionalMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing StrategyQuestionConditional object creation - defaults to CreateOrEdit
		 * @return StrategyQuestionConditionalMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return StrategyQuestionConditionalMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objStrategyQuestionConditional->Id;
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
				if (($this->objStrategyQuestionConditional->Question) && ($this->objStrategyQuestionConditional->Question->Id == $objQuestion->Id))
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
			$this->lblQuestionId->Text = ($this->objStrategyQuestionConditional->Question) ? $this->objStrategyQuestionConditional->Question->__toString() : null;
			return $this->lblQuestionId;
		}

		/**
		 * Create and setup QListBox lstStrategy
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstStrategy_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstStrategy = new QListBox($this->objParentObject, $strControlId);
			$this->lstStrategy->Name = QApplication::Translate('Strategy');
			$this->lstStrategy->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objStrategyCursor = CannedStrategy::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objStrategy = CannedStrategy::InstantiateCursor($objStrategyCursor)) {
				$objListItem = new QListItem($objStrategy->__toString(), $objStrategy->Id);
				if (($this->objStrategyQuestionConditional->Strategy) && ($this->objStrategyQuestionConditional->Strategy->Id == $objStrategy->Id))
					$objListItem->Selected = true;
				$this->lstStrategy->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstStrategy;
		}

		/**
		 * Create and setup QLabel lblStrategyId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblStrategyId_Create($strControlId = null) {
			$this->lblStrategyId = new QLabel($this->objParentObject, $strControlId);
			$this->lblStrategyId->Name = QApplication::Translate('Strategy');
			$this->lblStrategyId->Text = ($this->objStrategyQuestionConditional->Strategy) ? $this->objStrategyQuestionConditional->Strategy->__toString() : null;
			return $this->lblStrategyId;
		}

		/**
		 * Create and setup QListBox lstConditionalTypeObject
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstConditionalTypeObject_Create($strControlId = null) {
			$this->lstConditionalTypeObject = new QListBox($this->objParentObject, $strControlId);
			$this->lstConditionalTypeObject->Name = QApplication::Translate('Conditional Type Object');
			$this->lstConditionalTypeObject->AddItem(QApplication::Translate('- Select One -'), null);

			$this->lstConditionalTypeObject->AddItems(ConditionalType::$NameArray, $this->objStrategyQuestionConditional->ConditionalType);
			return $this->lstConditionalTypeObject;
		}

		/**
		 * Create and setup QLabel lblConditionalType
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblConditionalType_Create($strControlId = null) {
			$this->lblConditionalType = new QLabel($this->objParentObject, $strControlId);
			$this->lblConditionalType->Name = QApplication::Translate('Conditional Type Object');
			$this->lblConditionalType->Text = ($this->objStrategyQuestionConditional->ConditionalType) ? ConditionalType::$NameArray[$this->objStrategyQuestionConditional->ConditionalType] : null;
			return $this->lblConditionalType;
		}



		/**
		 * Refresh this MetaControl with Data from the local StrategyQuestionConditional object.
		 * @param boolean $blnReload reload StrategyQuestionConditional from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objStrategyQuestionConditional->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objStrategyQuestionConditional->Id;

			if ($this->lstQuestion) {
					$this->lstQuestion->RemoveAllItems();
				$this->lstQuestion->AddItem(QApplication::Translate('- Select One -'), null);
				$objQuestionArray = TenPQuestions::LoadAll();
				if ($objQuestionArray) foreach ($objQuestionArray as $objQuestion) {
					$objListItem = new QListItem($objQuestion->__toString(), $objQuestion->Id);
					if (($this->objStrategyQuestionConditional->Question) && ($this->objStrategyQuestionConditional->Question->Id == $objQuestion->Id))
						$objListItem->Selected = true;
					$this->lstQuestion->AddItem($objListItem);
				}
			}
			if ($this->lblQuestionId) $this->lblQuestionId->Text = ($this->objStrategyQuestionConditional->Question) ? $this->objStrategyQuestionConditional->Question->__toString() : null;

			if ($this->lstStrategy) {
					$this->lstStrategy->RemoveAllItems();
				$this->lstStrategy->AddItem(QApplication::Translate('- Select One -'), null);
				$objStrategyArray = CannedStrategy::LoadAll();
				if ($objStrategyArray) foreach ($objStrategyArray as $objStrategy) {
					$objListItem = new QListItem($objStrategy->__toString(), $objStrategy->Id);
					if (($this->objStrategyQuestionConditional->Strategy) && ($this->objStrategyQuestionConditional->Strategy->Id == $objStrategy->Id))
						$objListItem->Selected = true;
					$this->lstStrategy->AddItem($objListItem);
				}
			}
			if ($this->lblStrategyId) $this->lblStrategyId->Text = ($this->objStrategyQuestionConditional->Strategy) ? $this->objStrategyQuestionConditional->Strategy->__toString() : null;

			if ($this->lstConditionalTypeObject) $this->lstConditionalTypeObject->SelectedValue = $this->objStrategyQuestionConditional->ConditionalType;
			if ($this->lblConditionalType) $this->lblConditionalType->Text = ($this->objStrategyQuestionConditional->ConditionalType) ? ConditionalType::$NameArray[$this->objStrategyQuestionConditional->ConditionalType] : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC STRATEGYQUESTIONCONDITIONAL OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's StrategyQuestionConditional instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveStrategyQuestionConditional() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstQuestion) $this->objStrategyQuestionConditional->QuestionId = $this->lstQuestion->SelectedValue;
				if ($this->lstStrategy) $this->objStrategyQuestionConditional->StrategyId = $this->lstStrategy->SelectedValue;
				if ($this->lstConditionalTypeObject) $this->objStrategyQuestionConditional->ConditionalType = $this->lstConditionalTypeObject->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the StrategyQuestionConditional object
				$this->objStrategyQuestionConditional->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's StrategyQuestionConditional instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteStrategyQuestionConditional() {
			$this->objStrategyQuestionConditional->Delete();
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
				case 'StrategyQuestionConditional': return $this->objStrategyQuestionConditional;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to StrategyQuestionConditional fields -- will be created dynamically if not yet created
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
				case 'StrategyIdControl':
					if (!$this->lstStrategy) return $this->lstStrategy_Create();
					return $this->lstStrategy;
				case 'StrategyIdLabel':
					if (!$this->lblStrategyId) return $this->lblStrategyId_Create();
					return $this->lblStrategyId;
				case 'ConditionalTypeControl':
					if (!$this->lstConditionalTypeObject) return $this->lstConditionalTypeObject_Create();
					return $this->lstConditionalTypeObject;
				case 'ConditionalTypeLabel':
					if (!$this->lblConditionalType) return $this->lblConditionalType_Create();
					return $this->lblConditionalType;
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
					// Controls that point to StrategyQuestionConditional fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'QuestionIdControl':
						return ($this->lstQuestion = QType::Cast($mixValue, 'QControl'));
					case 'StrategyIdControl':
						return ($this->lstStrategy = QType::Cast($mixValue, 'QControl'));
					case 'ConditionalTypeControl':
						return ($this->lstConditionalTypeObject = QType::Cast($mixValue, 'QControl'));
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