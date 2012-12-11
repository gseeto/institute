<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the CannedActionItem class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single CannedActionItem object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a CannedActionItemMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read CannedActionItem $CannedActionItem the actual CannedActionItem data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QTextBox $ActionControl
	 * property-read QLabel $ActionLabel
	 * property QListBox $StrategyIdControl
	 * property-read QLabel $StrategyIdLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class CannedActionItemMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var CannedActionItem objCannedActionItem
		 * @access protected
		 */
		protected $objCannedActionItem;

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

		// Controls that allow the editing of CannedActionItem's individual data fields
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


		// Controls that allow the viewing of CannedActionItem's individual data fields
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


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * CannedActionItemMetaControl to edit a single CannedActionItem object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single CannedActionItem object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this CannedActionItemMetaControl
		 * @param CannedActionItem $objCannedActionItem new or existing CannedActionItem object
		 */
		 public function __construct($objParentObject, CannedActionItem $objCannedActionItem) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this CannedActionItemMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked CannedActionItem object
			$this->objCannedActionItem = $objCannedActionItem;

			// Figure out if we're Editing or Creating New
			if ($this->objCannedActionItem->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this CannedActionItemMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing CannedActionItem object creation - defaults to CreateOrEdit
 		 * @return CannedActionItemMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objCannedActionItem = CannedActionItem::Load($intId);

				// CannedActionItem was found -- return it!
				if ($objCannedActionItem)
					return new CannedActionItemMetaControl($objParentObject, $objCannedActionItem);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a CannedActionItem object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new CannedActionItemMetaControl($objParentObject, new CannedActionItem());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this CannedActionItemMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing CannedActionItem object creation - defaults to CreateOrEdit
		 * @return CannedActionItemMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return CannedActionItemMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this CannedActionItemMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing CannedActionItem object creation - defaults to CreateOrEdit
		 * @return CannedActionItemMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return CannedActionItemMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objCannedActionItem->Id;
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
			$this->txtAction->Text = $this->objCannedActionItem->Action;
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
			$this->lblAction->Text = $this->objCannedActionItem->Action;
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
			$objStrategyCursor = CannedStrategy::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objStrategy = CannedStrategy::InstantiateCursor($objStrategyCursor)) {
				$objListItem = new QListItem($objStrategy->__toString(), $objStrategy->Id);
				if (($this->objCannedActionItem->Strategy) && ($this->objCannedActionItem->Strategy->Id == $objStrategy->Id))
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
			$this->lblStrategyId->Text = ($this->objCannedActionItem->Strategy) ? $this->objCannedActionItem->Strategy->__toString() : null;
			return $this->lblStrategyId;
		}



		/**
		 * Refresh this MetaControl with Data from the local CannedActionItem object.
		 * @param boolean $blnReload reload CannedActionItem from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objCannedActionItem->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objCannedActionItem->Id;

			if ($this->txtAction) $this->txtAction->Text = $this->objCannedActionItem->Action;
			if ($this->lblAction) $this->lblAction->Text = $this->objCannedActionItem->Action;

			if ($this->lstStrategy) {
					$this->lstStrategy->RemoveAllItems();
				$this->lstStrategy->AddItem(QApplication::Translate('- Select One -'), null);
				$objStrategyArray = CannedStrategy::LoadAll();
				if ($objStrategyArray) foreach ($objStrategyArray as $objStrategy) {
					$objListItem = new QListItem($objStrategy->__toString(), $objStrategy->Id);
					if (($this->objCannedActionItem->Strategy) && ($this->objCannedActionItem->Strategy->Id == $objStrategy->Id))
						$objListItem->Selected = true;
					$this->lstStrategy->AddItem($objListItem);
				}
			}
			if ($this->lblStrategyId) $this->lblStrategyId->Text = ($this->objCannedActionItem->Strategy) ? $this->objCannedActionItem->Strategy->__toString() : null;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC CANNEDACTIONITEM OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's CannedActionItem instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveCannedActionItem() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtAction) $this->objCannedActionItem->Action = $this->txtAction->Text;
				if ($this->lstStrategy) $this->objCannedActionItem->StrategyId = $this->lstStrategy->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the CannedActionItem object
				$this->objCannedActionItem->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's CannedActionItem instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteCannedActionItem() {
			$this->objCannedActionItem->Delete();
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
				case 'CannedActionItem': return $this->objCannedActionItem;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to CannedActionItem fields -- will be created dynamically if not yet created
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
					// Controls that point to CannedActionItem fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'ActionControl':
						return ($this->txtAction = QType::Cast($mixValue, 'QControl'));
					case 'StrategyIdControl':
						return ($this->lstStrategy = QType::Cast($mixValue, 'QControl'));
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