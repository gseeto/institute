<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Kpis class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Kpis object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a KpisMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read Kpis $Kpis the actual Kpis data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $StrategyIdControl
	 * property-read QLabel $StrategyIdLabel
	 * property QListBox $ScorecardIdControl
	 * property-read QLabel $ScorecardIdLabel
	 * property QIntegerTextBox $RatingControl
	 * property-read QLabel $RatingLabel
	 * property QTextBox $KpiControl
	 * property-read QLabel $KpiLabel
	 * property QIntegerTextBox $CountControl
	 * property-read QLabel $CountLabel
	 * property QTextBox $CommentsControl
	 * property-read QLabel $CommentsLabel
	 * property QListBox $ModifiedByControl
	 * property-read QLabel $ModifiedByLabel
	 * property QLabel $ModifiedControl
	 * property-read QLabel $ModifiedLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class KpisMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var Kpis objKpis
		 * @access protected
		 */
		protected $objKpis;

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

		// Controls that allow the editing of Kpis's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

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
         * @var QIntegerTextBox txtRating;
         * @access protected
         */
		protected $txtRating;

        /**
         * @var QTextBox txtKpi;
         * @access protected
         */
		protected $txtKpi;

        /**
         * @var QIntegerTextBox txtCount;
         * @access protected
         */
		protected $txtCount;

        /**
         * @var QTextBox txtComments;
         * @access protected
         */
		protected $txtComments;

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


		// Controls that allow the viewing of Kpis's individual data fields
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
         * @var QLabel lblRating
         * @access protected
         */
		protected $lblRating;

        /**
         * @var QLabel lblKpi
         * @access protected
         */
		protected $lblKpi;

        /**
         * @var QLabel lblCount
         * @access protected
         */
		protected $lblCount;

        /**
         * @var QLabel lblComments
         * @access protected
         */
		protected $lblComments;

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
		 * KpisMetaControl to edit a single Kpis object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Kpis object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this KpisMetaControl
		 * @param Kpis $objKpis new or existing Kpis object
		 */
		 public function __construct($objParentObject, Kpis $objKpis) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this KpisMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Kpis object
			$this->objKpis = $objKpis;

			// Figure out if we're Editing or Creating New
			if ($this->objKpis->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this KpisMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Kpis object creation - defaults to CreateOrEdit
 		 * @return KpisMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objKpis = Kpis::Load($intId);

				// Kpis was found -- return it!
				if ($objKpis)
					return new KpisMetaControl($objParentObject, $objKpis);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Kpis object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new KpisMetaControl($objParentObject, new Kpis());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this KpisMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Kpis object creation - defaults to CreateOrEdit
		 * @return KpisMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return KpisMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this KpisMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Kpis object creation - defaults to CreateOrEdit
		 * @return KpisMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return KpisMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objKpis->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
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
				if (($this->objKpis->Strategy) && ($this->objKpis->Strategy->Id == $objStrategy->Id))
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
			$this->lblStrategyId->Text = ($this->objKpis->Strategy) ? $this->objKpis->Strategy->__toString() : null;
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
				if (($this->objKpis->Scorecard) && ($this->objKpis->Scorecard->Id == $objScorecard->Id))
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
			$this->lblScorecardId->Text = ($this->objKpis->Scorecard) ? $this->objKpis->Scorecard->__toString() : null;
			return $this->lblScorecardId;
		}

		/**
		 * Create and setup QIntegerTextBox txtRating
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtRating_Create($strControlId = null) {
			$this->txtRating = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtRating->Name = QApplication::Translate('Rating');
			$this->txtRating->Text = $this->objKpis->Rating;
			return $this->txtRating;
		}

		/**
		 * Create and setup QLabel lblRating
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblRating_Create($strControlId = null, $strFormat = null) {
			$this->lblRating = new QLabel($this->objParentObject, $strControlId);
			$this->lblRating->Name = QApplication::Translate('Rating');
			$this->lblRating->Text = $this->objKpis->Rating;
			$this->lblRating->Format = $strFormat;
			return $this->lblRating;
		}

		/**
		 * Create and setup QTextBox txtKpi
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtKpi_Create($strControlId = null) {
			$this->txtKpi = new QTextBox($this->objParentObject, $strControlId);
			$this->txtKpi->Name = QApplication::Translate('Kpi');
			$this->txtKpi->Text = $this->objKpis->Kpi;
			$this->txtKpi->TextMode = QTextMode::MultiLine;
			return $this->txtKpi;
		}

		/**
		 * Create and setup QLabel lblKpi
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblKpi_Create($strControlId = null) {
			$this->lblKpi = new QLabel($this->objParentObject, $strControlId);
			$this->lblKpi->Name = QApplication::Translate('Kpi');
			$this->lblKpi->Text = $this->objKpis->Kpi;
			return $this->lblKpi;
		}

		/**
		 * Create and setup QIntegerTextBox txtCount
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtCount_Create($strControlId = null) {
			$this->txtCount = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtCount->Name = QApplication::Translate('Count');
			$this->txtCount->Text = $this->objKpis->Count;
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
			$this->lblCount->Text = $this->objKpis->Count;
			$this->lblCount->Format = $strFormat;
			return $this->lblCount;
		}

		/**
		 * Create and setup QTextBox txtComments
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtComments_Create($strControlId = null) {
			$this->txtComments = new QTextBox($this->objParentObject, $strControlId);
			$this->txtComments->Name = QApplication::Translate('Comments');
			$this->txtComments->Text = $this->objKpis->Comments;
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
			$this->lblComments->Text = $this->objKpis->Comments;
			return $this->lblComments;
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
				if (($this->objKpis->ModifiedByObject) && ($this->objKpis->ModifiedByObject->Id == $objModifiedByObject->Id))
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
			$this->lblModifiedBy->Text = ($this->objKpis->ModifiedByObject) ? $this->objKpis->ModifiedByObject->__toString() : null;
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
				$this->lblModified->Text = $this->objKpis->Modified;
			else
				$this->lblModified->Text = 'N/A';
			return $this->lblModified;
		}



		/**
		 * Refresh this MetaControl with Data from the local Kpis object.
		 * @param boolean $blnReload reload Kpis from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objKpis->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objKpis->Id;

			if ($this->lstStrategy) {
					$this->lstStrategy->RemoveAllItems();
				$this->lstStrategy->AddItem(QApplication::Translate('- Select One -'), null);
				$objStrategyArray = Strategy::LoadAll();
				if ($objStrategyArray) foreach ($objStrategyArray as $objStrategy) {
					$objListItem = new QListItem($objStrategy->__toString(), $objStrategy->Id);
					if (($this->objKpis->Strategy) && ($this->objKpis->Strategy->Id == $objStrategy->Id))
						$objListItem->Selected = true;
					$this->lstStrategy->AddItem($objListItem);
				}
			}
			if ($this->lblStrategyId) $this->lblStrategyId->Text = ($this->objKpis->Strategy) ? $this->objKpis->Strategy->__toString() : null;

			if ($this->lstScorecard) {
					$this->lstScorecard->RemoveAllItems();
				$this->lstScorecard->AddItem(QApplication::Translate('- Select One -'), null);
				$objScorecardArray = Scorecard::LoadAll();
				if ($objScorecardArray) foreach ($objScorecardArray as $objScorecard) {
					$objListItem = new QListItem($objScorecard->__toString(), $objScorecard->Id);
					if (($this->objKpis->Scorecard) && ($this->objKpis->Scorecard->Id == $objScorecard->Id))
						$objListItem->Selected = true;
					$this->lstScorecard->AddItem($objListItem);
				}
			}
			if ($this->lblScorecardId) $this->lblScorecardId->Text = ($this->objKpis->Scorecard) ? $this->objKpis->Scorecard->__toString() : null;

			if ($this->txtRating) $this->txtRating->Text = $this->objKpis->Rating;
			if ($this->lblRating) $this->lblRating->Text = $this->objKpis->Rating;

			if ($this->txtKpi) $this->txtKpi->Text = $this->objKpis->Kpi;
			if ($this->lblKpi) $this->lblKpi->Text = $this->objKpis->Kpi;

			if ($this->txtCount) $this->txtCount->Text = $this->objKpis->Count;
			if ($this->lblCount) $this->lblCount->Text = $this->objKpis->Count;

			if ($this->txtComments) $this->txtComments->Text = $this->objKpis->Comments;
			if ($this->lblComments) $this->lblComments->Text = $this->objKpis->Comments;

			if ($this->lstModifiedByObject) {
					$this->lstModifiedByObject->RemoveAllItems();
				$this->lstModifiedByObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objModifiedByObjectArray = User::LoadAll();
				if ($objModifiedByObjectArray) foreach ($objModifiedByObjectArray as $objModifiedByObject) {
					$objListItem = new QListItem($objModifiedByObject->__toString(), $objModifiedByObject->Id);
					if (($this->objKpis->ModifiedByObject) && ($this->objKpis->ModifiedByObject->Id == $objModifiedByObject->Id))
						$objListItem->Selected = true;
					$this->lstModifiedByObject->AddItem($objListItem);
				}
			}
			if ($this->lblModifiedBy) $this->lblModifiedBy->Text = ($this->objKpis->ModifiedByObject) ? $this->objKpis->ModifiedByObject->__toString() : null;

			if ($this->lblModified) if ($this->blnEditMode) $this->lblModified->Text = $this->objKpis->Modified;

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC KPIS OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Kpis instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveKpis() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstStrategy) $this->objKpis->StrategyId = $this->lstStrategy->SelectedValue;
				if ($this->lstScorecard) $this->objKpis->ScorecardId = $this->lstScorecard->SelectedValue;
				if ($this->txtRating) $this->objKpis->Rating = $this->txtRating->Text;
				if ($this->txtKpi) $this->objKpis->Kpi = $this->txtKpi->Text;
				if ($this->txtCount) $this->objKpis->Count = $this->txtCount->Text;
				if ($this->txtComments) $this->objKpis->Comments = $this->txtComments->Text;
				if ($this->lstModifiedByObject) $this->objKpis->ModifiedBy = $this->lstModifiedByObject->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Kpis object
				$this->objKpis->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Kpis instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteKpis() {
			$this->objKpis->Delete();
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
				case 'Kpis': return $this->objKpis;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Kpis fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
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
				case 'RatingControl':
					if (!$this->txtRating) return $this->txtRating_Create();
					return $this->txtRating;
				case 'RatingLabel':
					if (!$this->lblRating) return $this->lblRating_Create();
					return $this->lblRating;
				case 'KpiControl':
					if (!$this->txtKpi) return $this->txtKpi_Create();
					return $this->txtKpi;
				case 'KpiLabel':
					if (!$this->lblKpi) return $this->lblKpi_Create();
					return $this->lblKpi;
				case 'CountControl':
					if (!$this->txtCount) return $this->txtCount_Create();
					return $this->txtCount;
				case 'CountLabel':
					if (!$this->lblCount) return $this->lblCount_Create();
					return $this->lblCount;
				case 'CommentsControl':
					if (!$this->txtComments) return $this->txtComments_Create();
					return $this->txtComments;
				case 'CommentsLabel':
					if (!$this->lblComments) return $this->lblComments_Create();
					return $this->lblComments;
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
					// Controls that point to Kpis fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'StrategyIdControl':
						return ($this->lstStrategy = QType::Cast($mixValue, 'QControl'));
					case 'ScorecardIdControl':
						return ($this->lstScorecard = QType::Cast($mixValue, 'QControl'));
					case 'RatingControl':
						return ($this->txtRating = QType::Cast($mixValue, 'QControl'));
					case 'KpiControl':
						return ($this->txtKpi = QType::Cast($mixValue, 'QControl'));
					case 'CountControl':
						return ($this->txtCount = QType::Cast($mixValue, 'QControl'));
					case 'CommentsControl':
						return ($this->txtComments = QType::Cast($mixValue, 'QControl'));
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