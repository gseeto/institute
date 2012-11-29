<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Statement class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Statement object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a StatementMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read Statement $Statement the actual Statement data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QTextBox $ValueControl
	 * property-read QLabel $ValueLabel
	 * property QListBox $ScorecardIdControl
	 * property-read QLabel $ScorecardIdLabel
	 * property QCheckBox $IsPurposeControl
	 * property-read QLabel $IsPurposeLabel
	 * property QListBox $ModifiedByControl
	 * property-read QLabel $ModifiedByLabel
	 * property QLabel $ModifiedControl
	 * property-read QLabel $ModifiedLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class StatementMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var Statement objStatement
		 * @access protected
		 */
		protected $objStatement;

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

		// Controls that allow the editing of Statement's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QTextBox txtValue;
         * @access protected
         */
		protected $txtValue;

        /**
         * @var QListBox lstScorecard;
         * @access protected
         */
		protected $lstScorecard;

        /**
         * @var QCheckBox chkIsPurpose;
         * @access protected
         */
		protected $chkIsPurpose;

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


		// Controls that allow the viewing of Statement's individual data fields
        /**
         * @var QLabel lblValue
         * @access protected
         */
		protected $lblValue;

        /**
         * @var QLabel lblScorecardId
         * @access protected
         */
		protected $lblScorecardId;

        /**
         * @var QLabel lblIsPurpose
         * @access protected
         */
		protected $lblIsPurpose;

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
		 * StatementMetaControl to edit a single Statement object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Statement object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this StatementMetaControl
		 * @param Statement $objStatement new or existing Statement object
		 */
		 public function __construct($objParentObject, Statement $objStatement) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this StatementMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Statement object
			$this->objStatement = $objStatement;

			// Figure out if we're Editing or Creating New
			if ($this->objStatement->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this StatementMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Statement object creation - defaults to CreateOrEdit
 		 * @return StatementMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objStatement = Statement::Load($intId);

				// Statement was found -- return it!
				if ($objStatement)
					return new StatementMetaControl($objParentObject, $objStatement);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Statement object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new StatementMetaControl($objParentObject, new Statement());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this StatementMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Statement object creation - defaults to CreateOrEdit
		 * @return StatementMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return StatementMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this StatementMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Statement object creation - defaults to CreateOrEdit
		 * @return StatementMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return StatementMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objStatement->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QTextBox txtValue
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtValue_Create($strControlId = null) {
			$this->txtValue = new QTextBox($this->objParentObject, $strControlId);
			$this->txtValue->Name = QApplication::Translate('Value');
			$this->txtValue->Text = $this->objStatement->Value;
			$this->txtValue->MaxLength = Statement::ValueMaxLength;
			return $this->txtValue;
		}

		/**
		 * Create and setup QLabel lblValue
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblValue_Create($strControlId = null) {
			$this->lblValue = new QLabel($this->objParentObject, $strControlId);
			$this->lblValue->Name = QApplication::Translate('Value');
			$this->lblValue->Text = $this->objStatement->Value;
			return $this->lblValue;
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
				if (($this->objStatement->Scorecard) && ($this->objStatement->Scorecard->Id == $objScorecard->Id))
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
			$this->lblScorecardId->Text = ($this->objStatement->Scorecard) ? $this->objStatement->Scorecard->__toString() : null;
			return $this->lblScorecardId;
		}

		/**
		 * Create and setup QCheckBox chkIsPurpose
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkIsPurpose_Create($strControlId = null) {
			$this->chkIsPurpose = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkIsPurpose->Name = QApplication::Translate('Is Purpose');
			$this->chkIsPurpose->Checked = $this->objStatement->IsPurpose;
			return $this->chkIsPurpose;
		}

		/**
		 * Create and setup QLabel lblIsPurpose
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblIsPurpose_Create($strControlId = null) {
			$this->lblIsPurpose = new QLabel($this->objParentObject, $strControlId);
			$this->lblIsPurpose->Name = QApplication::Translate('Is Purpose');
			$this->lblIsPurpose->Text = ($this->objStatement->IsPurpose) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblIsPurpose;
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
				if (($this->objStatement->ModifiedByObject) && ($this->objStatement->ModifiedByObject->Id == $objModifiedByObject->Id))
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
			$this->lblModifiedBy->Text = ($this->objStatement->ModifiedByObject) ? $this->objStatement->ModifiedByObject->__toString() : null;
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
				$this->lblModified->Text = $this->objStatement->Modified;
			else
				$this->lblModified->Text = 'N/A';
			return $this->lblModified;
		}



		/**
		 * Refresh this MetaControl with Data from the local Statement object.
		 * @param boolean $blnReload reload Statement from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objStatement->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objStatement->Id;

			if ($this->txtValue) $this->txtValue->Text = $this->objStatement->Value;
			if ($this->lblValue) $this->lblValue->Text = $this->objStatement->Value;

			if ($this->lstScorecard) {
					$this->lstScorecard->RemoveAllItems();
				$this->lstScorecard->AddItem(QApplication::Translate('- Select One -'), null);
				$objScorecardArray = Scorecard::LoadAll();
				if ($objScorecardArray) foreach ($objScorecardArray as $objScorecard) {
					$objListItem = new QListItem($objScorecard->__toString(), $objScorecard->Id);
					if (($this->objStatement->Scorecard) && ($this->objStatement->Scorecard->Id == $objScorecard->Id))
						$objListItem->Selected = true;
					$this->lstScorecard->AddItem($objListItem);
				}
			}
			if ($this->lblScorecardId) $this->lblScorecardId->Text = ($this->objStatement->Scorecard) ? $this->objStatement->Scorecard->__toString() : null;

			if ($this->chkIsPurpose) $this->chkIsPurpose->Checked = $this->objStatement->IsPurpose;
			if ($this->lblIsPurpose) $this->lblIsPurpose->Text = ($this->objStatement->IsPurpose) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->lstModifiedByObject) {
					$this->lstModifiedByObject->RemoveAllItems();
				$this->lstModifiedByObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objModifiedByObjectArray = User::LoadAll();
				if ($objModifiedByObjectArray) foreach ($objModifiedByObjectArray as $objModifiedByObject) {
					$objListItem = new QListItem($objModifiedByObject->__toString(), $objModifiedByObject->Id);
					if (($this->objStatement->ModifiedByObject) && ($this->objStatement->ModifiedByObject->Id == $objModifiedByObject->Id))
						$objListItem->Selected = true;
					$this->lstModifiedByObject->AddItem($objListItem);
				}
			}
			if ($this->lblModifiedBy) $this->lblModifiedBy->Text = ($this->objStatement->ModifiedByObject) ? $this->objStatement->ModifiedByObject->__toString() : null;

			if ($this->lblModified) if ($this->blnEditMode) $this->lblModified->Text = $this->objStatement->Modified;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC STATEMENT OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Statement instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveStatement() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtValue) $this->objStatement->Value = $this->txtValue->Text;
				if ($this->lstScorecard) $this->objStatement->ScorecardId = $this->lstScorecard->SelectedValue;
				if ($this->chkIsPurpose) $this->objStatement->IsPurpose = $this->chkIsPurpose->Checked;
				if ($this->lstModifiedByObject) $this->objStatement->ModifiedBy = $this->lstModifiedByObject->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Statement object
				$this->objStatement->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Statement instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteStatement() {
			$this->objStatement->Delete();
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
				case 'Statement': return $this->objStatement;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Statement fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'ValueControl':
					if (!$this->txtValue) return $this->txtValue_Create();
					return $this->txtValue;
				case 'ValueLabel':
					if (!$this->lblValue) return $this->lblValue_Create();
					return $this->lblValue;
				case 'ScorecardIdControl':
					if (!$this->lstScorecard) return $this->lstScorecard_Create();
					return $this->lstScorecard;
				case 'ScorecardIdLabel':
					if (!$this->lblScorecardId) return $this->lblScorecardId_Create();
					return $this->lblScorecardId;
				case 'IsPurposeControl':
					if (!$this->chkIsPurpose) return $this->chkIsPurpose_Create();
					return $this->chkIsPurpose;
				case 'IsPurposeLabel':
					if (!$this->lblIsPurpose) return $this->lblIsPurpose_Create();
					return $this->lblIsPurpose;
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
					// Controls that point to Statement fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'ValueControl':
						return ($this->txtValue = QType::Cast($mixValue, 'QControl'));
					case 'ScorecardIdControl':
						return ($this->lstScorecard = QType::Cast($mixValue, 'QControl'));
					case 'IsPurposeControl':
						return ($this->chkIsPurpose = QType::Cast($mixValue, 'QControl'));
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