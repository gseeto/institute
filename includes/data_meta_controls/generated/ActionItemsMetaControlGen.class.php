<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the ActionItems class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single ActionItems object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a ActionItemsMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read ActionItems $ActionItems the actual ActionItems data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QTextBox $ActionControl
	 * property-read QLabel $ActionLabel
	 * property QListBox $StrategyIdControl
	 * property-read QLabel $StrategyIdLabel
	 * property QListBox $ScorecardIdControl
	 * property-read QLabel $ScorecardIdLabel
	 * property QListBox $WhoControl
	 * property-read QLabel $WhoLabel
	 * property QDateTimePicker $WhenControl
	 * property-read QLabel $WhenLabel
	 * property QListBox $StatusTypeControl
	 * property-read QLabel $StatusTypeLabel
	 * property QTextBox $CommentsControl
	 * property-read QLabel $CommentsLabel
	 * property QListBox $CategoryIdControl
	 * property-read QLabel $CategoryIdLabel
	 * property QIntegerTextBox $CountControl
	 * property-read QLabel $CountLabel
	 * property QListBox $ModifiedByControl
	 * property-read QLabel $ModifiedByLabel
	 * property QLabel $ModifiedControl
	 * property-read QLabel $ModifiedLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class ActionItemsMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var ActionItems objActionItems
		 * @access protected
		 */
		protected $objActionItems;

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

		// Controls that allow the editing of ActionItems's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QTextBox txtAction;
         * @access protected
         */
		protected $txtAction;

        /**
         * @var QListBox lstStrategy;
         * @access protected
         */
		protected $lstStrategy;

        /**
         * @var QListBox lstScorecard;
         * @access protected
         */
		protected $lstScorecard;

        /**
         * @var QListBox lstWhoObject;
         * @access protected
         */
		protected $lstWhoObject;

        /**
         * @var QDateTimePicker calWhen;
         * @access protected
         */
		protected $calWhen;

        /**
         * @var QListBox lstStatusTypeObject;
         * @access protected
         */
		protected $lstStatusTypeObject;

        /**
         * @var QTextBox txtComments;
         * @access protected
         */
		protected $txtComments;

        /**
         * @var QListBox lstCategory;
         * @access protected
         */
		protected $lstCategory;

        /**
         * @var QIntegerTextBox txtCount;
         * @access protected
         */
		protected $txtCount;

        /**
         * @var QListBox lstModifiedByObject;
         * @access protected
         */
		protected $lstModifiedByObject;

        /**
         * @var QLabel lblModified;
         * @access protected
         */
		protected $lblModified;


		// Controls that allow the viewing of ActionItems's individual data fields
        /**
         * @var QLabel lblAction
         * @access protected
         */
		protected $lblAction;

        /**
         * @var QLabel lblStrategyId
         * @access protected
         */
		protected $lblStrategyId;

        /**
         * @var QLabel lblScorecardId
         * @access protected
         */
		protected $lblScorecardId;

        /**
         * @var QLabel lblWho
         * @access protected
         */
		protected $lblWho;

        /**
         * @var QLabel lblWhen
         * @access protected
         */
		protected $lblWhen;

        /**
         * @var QLabel lblStatusType
         * @access protected
         */
		protected $lblStatusType;

        /**
         * @var QLabel lblComments
         * @access protected
         */
		protected $lblComments;

        /**
         * @var QLabel lblCategoryId
         * @access protected
         */
		protected $lblCategoryId;

        /**
         * @var QLabel lblCount
         * @access protected
         */
		protected $lblCount;

        /**
         * @var QLabel lblModifiedBy
         * @access protected
         */
		protected $lblModifiedBy;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * ActionItemsMetaControl to edit a single ActionItems object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single ActionItems object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ActionItemsMetaControl
		 * @param ActionItems $objActionItems new or existing ActionItems object
		 */
		 public function __construct($objParentObject, ActionItems $objActionItems) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this ActionItemsMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked ActionItems object
			$this->objActionItems = $objActionItems;

			// Figure out if we're Editing or Creating New
			if ($this->objActionItems->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this ActionItemsMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing ActionItems object creation - defaults to CreateOrEdit
 		 * @return ActionItemsMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objActionItems = ActionItems::Load($intId);

				// ActionItems was found -- return it!
				if ($objActionItems)
					return new ActionItemsMetaControl($objParentObject, $objActionItems);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a ActionItems object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new ActionItemsMetaControl($objParentObject, new ActionItems());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ActionItemsMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing ActionItems object creation - defaults to CreateOrEdit
		 * @return ActionItemsMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return ActionItemsMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ActionItemsMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing ActionItems object creation - defaults to CreateOrEdit
		 * @return ActionItemsMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return ActionItemsMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objActionItems->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QTextBox txtAction
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtAction_Create($strControlId = null) {
			$this->txtAction = new QTextBox($this->objParentObject, $strControlId);
			$this->txtAction->Name = QApplication::Translate('Action');
			$this->txtAction->Text = $this->objActionItems->Action;
			$this->txtAction->TextMode = QTextMode::MultiLine;
			return $this->txtAction;
		}

		/**
		 * Create and setup QLabel lblAction
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAction_Create($strControlId = null) {
			$this->lblAction = new QLabel($this->objParentObject, $strControlId);
			$this->lblAction->Name = QApplication::Translate('Action');
			$this->lblAction->Text = $this->objActionItems->Action;
			return $this->lblAction;
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
			$objStrategyCursor = Strategy::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objStrategy = Strategy::InstantiateCursor($objStrategyCursor)) {
				$objListItem = new QListItem($objStrategy->__toString(), $objStrategy->Id);
				if (($this->objActionItems->Strategy) && ($this->objActionItems->Strategy->Id == $objStrategy->Id))
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
			$this->lblStrategyId->Text = ($this->objActionItems->Strategy) ? $this->objActionItems->Strategy->__toString() : null;
			return $this->lblStrategyId;
		}

		/**
		 * Create and setup QListBox lstScorecard
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstScorecard_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstScorecard = new QListBox($this->objParentObject, $strControlId);
			$this->lstScorecard->Name = QApplication::Translate('Scorecard');
			$this->lstScorecard->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objScorecardCursor = Scorecard::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objScorecard = Scorecard::InstantiateCursor($objScorecardCursor)) {
				$objListItem = new QListItem($objScorecard->__toString(), $objScorecard->Id);
				if (($this->objActionItems->Scorecard) && ($this->objActionItems->Scorecard->Id == $objScorecard->Id))
					$objListItem->Selected = true;
				$this->lstScorecard->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstScorecard;
		}

		/**
		 * Create and setup QLabel lblScorecardId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblScorecardId_Create($strControlId = null) {
			$this->lblScorecardId = new QLabel($this->objParentObject, $strControlId);
			$this->lblScorecardId->Name = QApplication::Translate('Scorecard');
			$this->lblScorecardId->Text = ($this->objActionItems->Scorecard) ? $this->objActionItems->Scorecard->__toString() : null;
			return $this->lblScorecardId;
		}

		/**
		 * Create and setup QListBox lstWhoObject
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstWhoObject_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstWhoObject = new QListBox($this->objParentObject, $strControlId);
			$this->lstWhoObject->Name = QApplication::Translate('Who Object');
			$this->lstWhoObject->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objWhoObjectCursor = User::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objWhoObject = User::InstantiateCursor($objWhoObjectCursor)) {
				$objListItem = new QListItem($objWhoObject->__toString(), $objWhoObject->Id);
				if (($this->objActionItems->WhoObject) && ($this->objActionItems->WhoObject->Id == $objWhoObject->Id))
					$objListItem->Selected = true;
				$this->lstWhoObject->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstWhoObject;
		}

		/**
		 * Create and setup QLabel lblWho
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblWho_Create($strControlId = null) {
			$this->lblWho = new QLabel($this->objParentObject, $strControlId);
			$this->lblWho->Name = QApplication::Translate('Who Object');
			$this->lblWho->Text = ($this->objActionItems->WhoObject) ? $this->objActionItems->WhoObject->__toString() : null;
			return $this->lblWho;
		}

		/**
		 * Create and setup QDateTimePicker calWhen
		 * @param string $strControlId optional ControlId to use
		 * @return QDateTimePicker
		 */
		public function calWhen_Create($strControlId = null) {
			$this->calWhen = new QDateTimePicker($this->objParentObject, $strControlId);
			$this->calWhen->Name = QApplication::Translate('When');
			$this->calWhen->DateTime = $this->objActionItems->When;
			$this->calWhen->DateTimePickerType = QDateTimePickerType::Date;
			return $this->calWhen;
		}

		/**
		 * Create and setup QLabel lblWhen
		 * @param string $strControlId optional ControlId to use
		 * @param string $strDateTimeFormat optional DateTimeFormat to use
		 * @return QLabel
		 */
		public function lblWhen_Create($strControlId = null, $strDateTimeFormat = null) {
			$this->lblWhen = new QLabel($this->objParentObject, $strControlId);
			$this->lblWhen->Name = QApplication::Translate('When');
			$this->strWhenDateTimeFormat = $strDateTimeFormat;
			$this->lblWhen->Text = sprintf($this->objActionItems->When) ? $this->objActionItems->When->__toString($this->strWhenDateTimeFormat) : null;
			return $this->lblWhen;
		}

		protected $strWhenDateTimeFormat;

		/**
		 * Create and setup QListBox lstStatusTypeObject
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstStatusTypeObject_Create($strControlId = null) {
			$this->lstStatusTypeObject = new QListBox($this->objParentObject, $strControlId);
			$this->lstStatusTypeObject->Name = QApplication::Translate('Status Type Object');
			$this->lstStatusTypeObject->AddItem(QApplication::Translate('- Select One -'), null);

			$this->lstStatusTypeObject->AddItems(StatusType::$NameArray, $this->objActionItems->StatusType);
			return $this->lstStatusTypeObject;
		}

		/**
		 * Create and setup QLabel lblStatusType
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblStatusType_Create($strControlId = null) {
			$this->lblStatusType = new QLabel($this->objParentObject, $strControlId);
			$this->lblStatusType->Name = QApplication::Translate('Status Type Object');
			$this->lblStatusType->Text = ($this->objActionItems->StatusType) ? StatusType::$NameArray[$this->objActionItems->StatusType] : null;
			return $this->lblStatusType;
		}

		/**
		 * Create and setup QTextBox txtComments
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtComments_Create($strControlId = null) {
			$this->txtComments = new QTextBox($this->objParentObject, $strControlId);
			$this->txtComments->Name = QApplication::Translate('Comments');
			$this->txtComments->Text = $this->objActionItems->Comments;
			$this->txtComments->TextMode = QTextMode::MultiLine;
			return $this->txtComments;
		}

		/**
		 * Create and setup QLabel lblComments
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblComments_Create($strControlId = null) {
			$this->lblComments = new QLabel($this->objParentObject, $strControlId);
			$this->lblComments->Name = QApplication::Translate('Comments');
			$this->lblComments->Text = $this->objActionItems->Comments;
			return $this->lblComments;
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

			$this->lstCategory->AddItems(CategoryType::$NameArray, $this->objActionItems->CategoryId);
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
			$this->lblCategoryId->Text = ($this->objActionItems->CategoryId) ? CategoryType::$NameArray[$this->objActionItems->CategoryId] : null;
			return $this->lblCategoryId;
		}

		/**
		 * Create and setup QIntegerTextBox txtCount
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtCount_Create($strControlId = null) {
			$this->txtCount = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtCount->Name = QApplication::Translate('Count');
			$this->txtCount->Text = $this->objActionItems->Count;
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
			$this->lblCount->Text = $this->objActionItems->Count;
			$this->lblCount->Format = $strFormat;
			return $this->lblCount;
		}

		/**
		 * Create and setup QListBox lstModifiedByObject
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstModifiedByObject_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstModifiedByObject = new QListBox($this->objParentObject, $strControlId);
			$this->lstModifiedByObject->Name = QApplication::Translate('Modified By Object');
			$this->lstModifiedByObject->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objModifiedByObjectCursor = User::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objModifiedByObject = User::InstantiateCursor($objModifiedByObjectCursor)) {
				$objListItem = new QListItem($objModifiedByObject->__toString(), $objModifiedByObject->Id);
				if (($this->objActionItems->ModifiedByObject) && ($this->objActionItems->ModifiedByObject->Id == $objModifiedByObject->Id))
					$objListItem->Selected = true;
				$this->lstModifiedByObject->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstModifiedByObject;
		}

		/**
		 * Create and setup QLabel lblModifiedBy
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblModifiedBy_Create($strControlId = null) {
			$this->lblModifiedBy = new QLabel($this->objParentObject, $strControlId);
			$this->lblModifiedBy->Name = QApplication::Translate('Modified By Object');
			$this->lblModifiedBy->Text = ($this->objActionItems->ModifiedByObject) ? $this->objActionItems->ModifiedByObject->__toString() : null;
			return $this->lblModifiedBy;
		}

		/**
		 * Create and setup QLabel lblModified
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblModified_Create($strControlId = null) {
			$this->lblModified = new QLabel($this->objParentObject, $strControlId);
			$this->lblModified->Name = QApplication::Translate('Modified');
			if ($this->blnEditMode)
				$this->lblModified->Text = $this->objActionItems->Modified;
			else
				$this->lblModified->Text = 'N/A';
			return $this->lblModified;
		}



		/**
		 * Refresh this MetaControl with Data from the local ActionItems object.
		 * @param boolean $blnReload reload ActionItems from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objActionItems->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objActionItems->Id;

			if ($this->txtAction) $this->txtAction->Text = $this->objActionItems->Action;
			if ($this->lblAction) $this->lblAction->Text = $this->objActionItems->Action;

			if ($this->lstStrategy) {
					$this->lstStrategy->RemoveAllItems();
				$this->lstStrategy->AddItem(QApplication::Translate('- Select One -'), null);
				$objStrategyArray = Strategy::LoadAll();
				if ($objStrategyArray) foreach ($objStrategyArray as $objStrategy) {
					$objListItem = new QListItem($objStrategy->__toString(), $objStrategy->Id);
					if (($this->objActionItems->Strategy) && ($this->objActionItems->Strategy->Id == $objStrategy->Id))
						$objListItem->Selected = true;
					$this->lstStrategy->AddItem($objListItem);
				}
			}
			if ($this->lblStrategyId) $this->lblStrategyId->Text = ($this->objActionItems->Strategy) ? $this->objActionItems->Strategy->__toString() : null;

			if ($this->lstScorecard) {
					$this->lstScorecard->RemoveAllItems();
				$this->lstScorecard->AddItem(QApplication::Translate('- Select One -'), null);
				$objScorecardArray = Scorecard::LoadAll();
				if ($objScorecardArray) foreach ($objScorecardArray as $objScorecard) {
					$objListItem = new QListItem($objScorecard->__toString(), $objScorecard->Id);
					if (($this->objActionItems->Scorecard) && ($this->objActionItems->Scorecard->Id == $objScorecard->Id))
						$objListItem->Selected = true;
					$this->lstScorecard->AddItem($objListItem);
				}
			}
			if ($this->lblScorecardId) $this->lblScorecardId->Text = ($this->objActionItems->Scorecard) ? $this->objActionItems->Scorecard->__toString() : null;

			if ($this->lstWhoObject) {
					$this->lstWhoObject->RemoveAllItems();
				$this->lstWhoObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objWhoObjectArray = User::LoadAll();
				if ($objWhoObjectArray) foreach ($objWhoObjectArray as $objWhoObject) {
					$objListItem = new QListItem($objWhoObject->__toString(), $objWhoObject->Id);
					if (($this->objActionItems->WhoObject) && ($this->objActionItems->WhoObject->Id == $objWhoObject->Id))
						$objListItem->Selected = true;
					$this->lstWhoObject->AddItem($objListItem);
				}
			}
			if ($this->lblWho) $this->lblWho->Text = ($this->objActionItems->WhoObject) ? $this->objActionItems->WhoObject->__toString() : null;

			if ($this->calWhen) $this->calWhen->DateTime = $this->objActionItems->When;
			if ($this->lblWhen) $this->lblWhen->Text = sprintf($this->objActionItems->When) ? $this->objActionItems->__toString($this->strWhenDateTimeFormat) : null;

			if ($this->lstStatusTypeObject) $this->lstStatusTypeObject->SelectedValue = $this->objActionItems->StatusType;
			if ($this->lblStatusType) $this->lblStatusType->Text = ($this->objActionItems->StatusType) ? StatusType::$NameArray[$this->objActionItems->StatusType] : null;

			if ($this->txtComments) $this->txtComments->Text = $this->objActionItems->Comments;
			if ($this->lblComments) $this->lblComments->Text = $this->objActionItems->Comments;

			if ($this->lstCategory) $this->lstCategory->SelectedValue = $this->objActionItems->CategoryId;
			if ($this->lblCategoryId) $this->lblCategoryId->Text = ($this->objActionItems->CategoryId) ? CategoryType::$NameArray[$this->objActionItems->CategoryId] : null;

			if ($this->txtCount) $this->txtCount->Text = $this->objActionItems->Count;
			if ($this->lblCount) $this->lblCount->Text = $this->objActionItems->Count;

			if ($this->lstModifiedByObject) {
					$this->lstModifiedByObject->RemoveAllItems();
				$this->lstModifiedByObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objModifiedByObjectArray = User::LoadAll();
				if ($objModifiedByObjectArray) foreach ($objModifiedByObjectArray as $objModifiedByObject) {
					$objListItem = new QListItem($objModifiedByObject->__toString(), $objModifiedByObject->Id);
					if (($this->objActionItems->ModifiedByObject) && ($this->objActionItems->ModifiedByObject->Id == $objModifiedByObject->Id))
						$objListItem->Selected = true;
					$this->lstModifiedByObject->AddItem($objListItem);
				}
			}
			if ($this->lblModifiedBy) $this->lblModifiedBy->Text = ($this->objActionItems->ModifiedByObject) ? $this->objActionItems->ModifiedByObject->__toString() : null;

			if ($this->lblModified) if ($this->blnEditMode) $this->lblModified->Text = $this->objActionItems->Modified;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC ACTIONITEMS OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's ActionItems instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveActionItems() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtAction) $this->objActionItems->Action = $this->txtAction->Text;
				if ($this->lstStrategy) $this->objActionItems->StrategyId = $this->lstStrategy->SelectedValue;
				if ($this->lstScorecard) $this->objActionItems->ScorecardId = $this->lstScorecard->SelectedValue;
				if ($this->lstWhoObject) $this->objActionItems->Who = $this->lstWhoObject->SelectedValue;
				if ($this->calWhen) $this->objActionItems->When = $this->calWhen->DateTime;
				if ($this->lstStatusTypeObject) $this->objActionItems->StatusType = $this->lstStatusTypeObject->SelectedValue;
				if ($this->txtComments) $this->objActionItems->Comments = $this->txtComments->Text;
				if ($this->lstCategory) $this->objActionItems->CategoryId = $this->lstCategory->SelectedValue;
				if ($this->txtCount) $this->objActionItems->Count = $this->txtCount->Text;
				if ($this->lstModifiedByObject) $this->objActionItems->ModifiedBy = $this->lstModifiedByObject->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the ActionItems object
				$this->objActionItems->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's ActionItems instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteActionItems() {
			$this->objActionItems->Delete();
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
				case 'ActionItems': return $this->objActionItems;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to ActionItems fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'ActionControl':
					if (!$this->txtAction) return $this->txtAction_Create();
					return $this->txtAction;
				case 'ActionLabel':
					if (!$this->lblAction) return $this->lblAction_Create();
					return $this->lblAction;
				case 'StrategyIdControl':
					if (!$this->lstStrategy) return $this->lstStrategy_Create();
					return $this->lstStrategy;
				case 'StrategyIdLabel':
					if (!$this->lblStrategyId) return $this->lblStrategyId_Create();
					return $this->lblStrategyId;
				case 'ScorecardIdControl':
					if (!$this->lstScorecard) return $this->lstScorecard_Create();
					return $this->lstScorecard;
				case 'ScorecardIdLabel':
					if (!$this->lblScorecardId) return $this->lblScorecardId_Create();
					return $this->lblScorecardId;
				case 'WhoControl':
					if (!$this->lstWhoObject) return $this->lstWhoObject_Create();
					return $this->lstWhoObject;
				case 'WhoLabel':
					if (!$this->lblWho) return $this->lblWho_Create();
					return $this->lblWho;
				case 'WhenControl':
					if (!$this->calWhen) return $this->calWhen_Create();
					return $this->calWhen;
				case 'WhenLabel':
					if (!$this->lblWhen) return $this->lblWhen_Create();
					return $this->lblWhen;
				case 'StatusTypeControl':
					if (!$this->lstStatusTypeObject) return $this->lstStatusTypeObject_Create();
					return $this->lstStatusTypeObject;
				case 'StatusTypeLabel':
					if (!$this->lblStatusType) return $this->lblStatusType_Create();
					return $this->lblStatusType;
				case 'CommentsControl':
					if (!$this->txtComments) return $this->txtComments_Create();
					return $this->txtComments;
				case 'CommentsLabel':
					if (!$this->lblComments) return $this->lblComments_Create();
					return $this->lblComments;
				case 'CategoryIdControl':
					if (!$this->lstCategory) return $this->lstCategory_Create();
					return $this->lstCategory;
				case 'CategoryIdLabel':
					if (!$this->lblCategoryId) return $this->lblCategoryId_Create();
					return $this->lblCategoryId;
				case 'CountControl':
					if (!$this->txtCount) return $this->txtCount_Create();
					return $this->txtCount;
				case 'CountLabel':
					if (!$this->lblCount) return $this->lblCount_Create();
					return $this->lblCount;
				case 'ModifiedByControl':
					if (!$this->lstModifiedByObject) return $this->lstModifiedByObject_Create();
					return $this->lstModifiedByObject;
				case 'ModifiedByLabel':
					if (!$this->lblModifiedBy) return $this->lblModifiedBy_Create();
					return $this->lblModifiedBy;
				case 'ModifiedControl':
					if (!$this->lblModified) return $this->lblModified_Create();
					return $this->lblModified;
				case 'ModifiedLabel':
					if (!$this->lblModified) return $this->lblModified_Create();
					return $this->lblModified;
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
					// Controls that point to ActionItems fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'ActionControl':
						return ($this->txtAction = QType::Cast($mixValue, 'QControl'));
					case 'StrategyIdControl':
						return ($this->lstStrategy = QType::Cast($mixValue, 'QControl'));
					case 'ScorecardIdControl':
						return ($this->lstScorecard = QType::Cast($mixValue, 'QControl'));
					case 'WhoControl':
						return ($this->lstWhoObject = QType::Cast($mixValue, 'QControl'));
					case 'WhenControl':
						return ($this->calWhen = QType::Cast($mixValue, 'QControl'));
					case 'StatusTypeControl':
						return ($this->lstStatusTypeObject = QType::Cast($mixValue, 'QControl'));
					case 'CommentsControl':
						return ($this->txtComments = QType::Cast($mixValue, 'QControl'));
					case 'CategoryIdControl':
						return ($this->lstCategory = QType::Cast($mixValue, 'QControl'));
					case 'CountControl':
						return ($this->txtCount = QType::Cast($mixValue, 'QControl'));
					case 'ModifiedByControl':
						return ($this->lstModifiedByObject = QType::Cast($mixValue, 'QControl'));
					case 'ModifiedControl':
						return ($this->lblModified = QType::Cast($mixValue, 'QControl'));
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