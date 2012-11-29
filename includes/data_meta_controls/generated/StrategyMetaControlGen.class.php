<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Strategy class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Strategy object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a StrategyMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read Strategy $Strategy the actual Strategy data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QTextBox $StrategyControl
	 * property-read QLabel $StrategyLabel
	 * property QIntegerTextBox $PriorityControl
	 * property-read QLabel $PriorityLabel
	 * property QIntegerTextBox $CountControl
	 * property-read QLabel $CountLabel
	 * property QListBox $ScorecardIdControl
	 * property-read QLabel $ScorecardIdLabel
	 * property QListBox $CategoryTypeIdControl
	 * property-read QLabel $CategoryTypeIdLabel
	 * property QListBox $ModifiedByControl
	 * property-read QLabel $ModifiedByLabel
	 * property QLabel $ModifiedControl
	 * property-read QLabel $ModifiedLabel
	 * property QListBox $GiantsAsGiantControl
	 * property-read QLabel $GiantsAsGiantLabel
	 * property QListBox $SpheresAsSphereControl
	 * property-read QLabel $SpheresAsSphereLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class StrategyMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var Strategy objStrategy
		 * @access protected
		 */
		protected $objStrategy;

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

		// Controls that allow the editing of Strategy's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QTextBox txtStrategy;
         * @access protected
         */
		protected $txtStrategy;

        /**
         * @var QIntegerTextBox txtPriority;
         * @access protected
         */
		protected $txtPriority;

        /**
         * @var QIntegerTextBox txtCount;
         * @access protected
         */
		protected $txtCount;

        /**
         * @var QListBox lstScorecard;
         * @access protected
         */
		protected $lstScorecard;

        /**
         * @var QListBox lstCategoryType;
         * @access protected
         */
		protected $lstCategoryType;

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


		// Controls that allow the viewing of Strategy's individual data fields
        /**
         * @var QLabel lblStrategy
         * @access protected
         */
		protected $lblStrategy;

        /**
         * @var QLabel lblPriority
         * @access protected
         */
		protected $lblPriority;

        /**
         * @var QLabel lblCount
         * @access protected
         */
		protected $lblCount;

        /**
         * @var QLabel lblScorecardId
         * @access protected
         */
		protected $lblScorecardId;

        /**
         * @var QLabel lblCategoryTypeId
         * @access protected
         */
		protected $lblCategoryTypeId;

        /**
         * @var QLabel lblModifiedBy
         * @access protected
         */
		protected $lblModifiedBy;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References
		protected $lstGiantsesAsGiant;

		protected $lstSpheresesAsSphere;


		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References
		protected $lblGiantsesAsGiant;

		protected $lblSpheresesAsSphere;



		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * StrategyMetaControl to edit a single Strategy object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Strategy object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this StrategyMetaControl
		 * @param Strategy $objStrategy new or existing Strategy object
		 */
		 public function __construct($objParentObject, Strategy $objStrategy) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this StrategyMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Strategy object
			$this->objStrategy = $objStrategy;

			// Figure out if we're Editing or Creating New
			if ($this->objStrategy->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this StrategyMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Strategy object creation - defaults to CreateOrEdit
 		 * @return StrategyMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objStrategy = Strategy::Load($intId);

				// Strategy was found -- return it!
				if ($objStrategy)
					return new StrategyMetaControl($objParentObject, $objStrategy);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Strategy object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new StrategyMetaControl($objParentObject, new Strategy());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this StrategyMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Strategy object creation - defaults to CreateOrEdit
		 * @return StrategyMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return StrategyMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this StrategyMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Strategy object creation - defaults to CreateOrEdit
		 * @return StrategyMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return StrategyMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objStrategy->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QTextBox txtStrategy
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtStrategy_Create($strControlId = null) {
			$this->txtStrategy = new QTextBox($this->objParentObject, $strControlId);
			$this->txtStrategy->Name = QApplication::Translate('Strategy');
			$this->txtStrategy->Text = $this->objStrategy->Strategy;
			$this->txtStrategy->TextMode = QTextMode::MultiLine;
			return $this->txtStrategy;
		}

		/**
		 * Create and setup QLabel lblStrategy
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblStrategy_Create($strControlId = null) {
			$this->lblStrategy = new QLabel($this->objParentObject, $strControlId);
			$this->lblStrategy->Name = QApplication::Translate('Strategy');
			$this->lblStrategy->Text = $this->objStrategy->Strategy;
			return $this->lblStrategy;
		}

		/**
		 * Create and setup QIntegerTextBox txtPriority
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtPriority_Create($strControlId = null) {
			$this->txtPriority = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtPriority->Name = QApplication::Translate('Priority');
			$this->txtPriority->Text = $this->objStrategy->Priority;
			return $this->txtPriority;
		}

		/**
		 * Create and setup QLabel lblPriority
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblPriority_Create($strControlId = null, $strFormat = null) {
			$this->lblPriority = new QLabel($this->objParentObject, $strControlId);
			$this->lblPriority->Name = QApplication::Translate('Priority');
			$this->lblPriority->Text = $this->objStrategy->Priority;
			$this->lblPriority->Format = $strFormat;
			return $this->lblPriority;
		}

		/**
		 * Create and setup QIntegerTextBox txtCount
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtCount_Create($strControlId = null) {
			$this->txtCount = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtCount->Name = QApplication::Translate('Count');
			$this->txtCount->Text = $this->objStrategy->Count;
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
			$this->lblCount->Text = $this->objStrategy->Count;
			$this->lblCount->Format = $strFormat;
			return $this->lblCount;
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
				if (($this->objStrategy->Scorecard) && ($this->objStrategy->Scorecard->Id == $objScorecard->Id))
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
			$this->lblScorecardId->Text = ($this->objStrategy->Scorecard) ? $this->objStrategy->Scorecard->__toString() : null;
			return $this->lblScorecardId;
		}

		/**
		 * Create and setup QListBox lstCategoryType
		 * @param string $strControlId optional ControlId to use
		 * @return QListBox
		 */
		public function lstCategoryType_Create($strControlId = null) {
			$this->lstCategoryType = new QListBox($this->objParentObject, $strControlId);
			$this->lstCategoryType->Name = QApplication::Translate('Category Type');
			$this->lstCategoryType->AddItem(QApplication::Translate('- Select One -'), null);

			$this->lstCategoryType->AddItems(CategoryType::$NameArray, $this->objStrategy->CategoryTypeId);
			return $this->lstCategoryType;
		}

		/**
		 * Create and setup QLabel lblCategoryTypeId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCategoryTypeId_Create($strControlId = null) {
			$this->lblCategoryTypeId = new QLabel($this->objParentObject, $strControlId);
			$this->lblCategoryTypeId->Name = QApplication::Translate('Category Type');
			$this->lblCategoryTypeId->Text = ($this->objStrategy->CategoryTypeId) ? CategoryType::$NameArray[$this->objStrategy->CategoryTypeId] : null;
			return $this->lblCategoryTypeId;
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
				if (($this->objStrategy->ModifiedByObject) && ($this->objStrategy->ModifiedByObject->Id == $objModifiedByObject->Id))
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
			$this->lblModifiedBy->Text = ($this->objStrategy->ModifiedByObject) ? $this->objStrategy->ModifiedByObject->__toString() : null;
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
				$this->lblModified->Text = $this->objStrategy->Modified;
			else
				$this->lblModified->Text = 'N/A';
			return $this->lblModified;
		}

		/**
		 * Create and setup QListBox lstGiantsesAsGiant
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstGiantsesAsGiant_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstGiantsesAsGiant = new QListBox($this->objParentObject, $strControlId);
			$this->lstGiantsesAsGiant->Name = QApplication::Translate('Giantses As Giant');
			$this->lstGiantsesAsGiant->SelectionMode = QSelectionMode::Multiple;

			// We need to know which items to "Pre-Select"
			$objAssociatedArray = $this->objStrategy->GetGiantsAsGiantArray();

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objGiantsCursor = Giants::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objGiants = Giants::InstantiateCursor($objGiantsCursor)) {
				$objListItem = new QListItem($objGiants->__toString(), $objGiants->Id);
				foreach ($objAssociatedArray as $objAssociated) {
					if ($objAssociated->Id == $objGiants->Id)
						$objListItem->Selected = true;
				}
				$this->lstGiantsesAsGiant->AddItem($objListItem);
			}

			// Return the QListControl
			return $this->lstGiantsesAsGiant;
		}

		/**
		 * Create and setup QLabel lblGiantsesAsGiant
		 * @param string $strControlId optional ControlId to use
		 * @param string $strGlue glue to display in between each associated object
		 * @return QLabel
		 */
		public function lblGiantsesAsGiant_Create($strControlId = null, $strGlue = ', ') {
			$this->lblGiantsesAsGiant = new QLabel($this->objParentObject, $strControlId);
			$this->lstGiantsesAsGiant->Name = QApplication::Translate('Giantses As Giant');
			
			$objAssociatedArray = $this->objStrategy->GetGiantsAsGiantArray();
			$strItems = array();
			foreach ($objAssociatedArray as $objAssociated)
				$strItems[] = $objAssociated->__toString();
			$this->lblGiantsesAsGiant->Text = implode($strGlue, $strItems);
			return $this->lblGiantsesAsGiant;
		}

		/**
		 * Create and setup QListBox lstSpheresesAsSphere
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstSpheresesAsSphere_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstSpheresesAsSphere = new QListBox($this->objParentObject, $strControlId);
			$this->lstSpheresesAsSphere->Name = QApplication::Translate('Sphereses As Sphere');
			$this->lstSpheresesAsSphere->SelectionMode = QSelectionMode::Multiple;

			// We need to know which items to "Pre-Select"
			$objAssociatedArray = $this->objStrategy->GetSpheresAsSphereArray();

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objSpheresCursor = Spheres::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objSpheres = Spheres::InstantiateCursor($objSpheresCursor)) {
				$objListItem = new QListItem($objSpheres->__toString(), $objSpheres->Id);
				foreach ($objAssociatedArray as $objAssociated) {
					if ($objAssociated->Id == $objSpheres->Id)
						$objListItem->Selected = true;
				}
				$this->lstSpheresesAsSphere->AddItem($objListItem);
			}

			// Return the QListControl
			return $this->lstSpheresesAsSphere;
		}

		/**
		 * Create and setup QLabel lblSpheresesAsSphere
		 * @param string $strControlId optional ControlId to use
		 * @param string $strGlue glue to display in between each associated object
		 * @return QLabel
		 */
		public function lblSpheresesAsSphere_Create($strControlId = null, $strGlue = ', ') {
			$this->lblSpheresesAsSphere = new QLabel($this->objParentObject, $strControlId);
			$this->lstSpheresesAsSphere->Name = QApplication::Translate('Sphereses As Sphere');
			
			$objAssociatedArray = $this->objStrategy->GetSpheresAsSphereArray();
			$strItems = array();
			foreach ($objAssociatedArray as $objAssociated)
				$strItems[] = $objAssociated->__toString();
			$this->lblSpheresesAsSphere->Text = implode($strGlue, $strItems);
			return $this->lblSpheresesAsSphere;
		}



		/**
		 * Refresh this MetaControl with Data from the local Strategy object.
		 * @param boolean $blnReload reload Strategy from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objStrategy->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objStrategy->Id;

			if ($this->txtStrategy) $this->txtStrategy->Text = $this->objStrategy->Strategy;
			if ($this->lblStrategy) $this->lblStrategy->Text = $this->objStrategy->Strategy;

			if ($this->txtPriority) $this->txtPriority->Text = $this->objStrategy->Priority;
			if ($this->lblPriority) $this->lblPriority->Text = $this->objStrategy->Priority;

			if ($this->txtCount) $this->txtCount->Text = $this->objStrategy->Count;
			if ($this->lblCount) $this->lblCount->Text = $this->objStrategy->Count;

			if ($this->lstScorecard) {
					$this->lstScorecard->RemoveAllItems();
				$this->lstScorecard->AddItem(QApplication::Translate('- Select One -'), null);
				$objScorecardArray = Scorecard::LoadAll();
				if ($objScorecardArray) foreach ($objScorecardArray as $objScorecard) {
					$objListItem = new QListItem($objScorecard->__toString(), $objScorecard->Id);
					if (($this->objStrategy->Scorecard) && ($this->objStrategy->Scorecard->Id == $objScorecard->Id))
						$objListItem->Selected = true;
					$this->lstScorecard->AddItem($objListItem);
				}
			}
			if ($this->lblScorecardId) $this->lblScorecardId->Text = ($this->objStrategy->Scorecard) ? $this->objStrategy->Scorecard->__toString() : null;

			if ($this->lstCategoryType) $this->lstCategoryType->SelectedValue = $this->objStrategy->CategoryTypeId;
			if ($this->lblCategoryTypeId) $this->lblCategoryTypeId->Text = ($this->objStrategy->CategoryTypeId) ? CategoryType::$NameArray[$this->objStrategy->CategoryTypeId] : null;

			if ($this->lstModifiedByObject) {
					$this->lstModifiedByObject->RemoveAllItems();
				$this->lstModifiedByObject->AddItem(QApplication::Translate('- Select One -'), null);
				$objModifiedByObjectArray = User::LoadAll();
				if ($objModifiedByObjectArray) foreach ($objModifiedByObjectArray as $objModifiedByObject) {
					$objListItem = new QListItem($objModifiedByObject->__toString(), $objModifiedByObject->Id);
					if (($this->objStrategy->ModifiedByObject) && ($this->objStrategy->ModifiedByObject->Id == $objModifiedByObject->Id))
						$objListItem->Selected = true;
					$this->lstModifiedByObject->AddItem($objListItem);
				}
			}
			if ($this->lblModifiedBy) $this->lblModifiedBy->Text = ($this->objStrategy->ModifiedByObject) ? $this->objStrategy->ModifiedByObject->__toString() : null;

			if ($this->lblModified) if ($this->blnEditMode) $this->lblModified->Text = $this->objStrategy->Modified;

			if ($this->lstGiantsesAsGiant) {
				$this->lstGiantsesAsGiant->RemoveAllItems();
				$objAssociatedArray = $this->objStrategy->GetGiantsAsGiantArray();
				$objGiantsArray = Giants::LoadAll();
				if ($objGiantsArray) foreach ($objGiantsArray as $objGiants) {
					$objListItem = new QListItem($objGiants->__toString(), $objGiants->Id);
					foreach ($objAssociatedArray as $objAssociated) {
						if ($objAssociated->Id == $objGiants->Id)
							$objListItem->Selected = true;
					}
					$this->lstGiantsesAsGiant->AddItem($objListItem);
				}
			}
			if ($this->lblGiantsesAsGiant) {
				$objAssociatedArray = $this->objStrategy->GetGiantsAsGiantArray();
				$strItems = array();
				foreach ($objAssociatedArray as $objAssociated)
					$strItems[] = $objAssociated->__toString();
				$this->lblGiantsesAsGiant->Text = implode($strGlue, $strItems);
			}

			if ($this->lstSpheresesAsSphere) {
				$this->lstSpheresesAsSphere->RemoveAllItems();
				$objAssociatedArray = $this->objStrategy->GetSpheresAsSphereArray();
				$objSpheresArray = Spheres::LoadAll();
				if ($objSpheresArray) foreach ($objSpheresArray as $objSpheres) {
					$objListItem = new QListItem($objSpheres->__toString(), $objSpheres->Id);
					foreach ($objAssociatedArray as $objAssociated) {
						if ($objAssociated->Id == $objSpheres->Id)
							$objListItem->Selected = true;
					}
					$this->lstSpheresesAsSphere->AddItem($objListItem);
				}
			}
			if ($this->lblSpheresesAsSphere) {
				$objAssociatedArray = $this->objStrategy->GetSpheresAsSphereArray();
				$strItems = array();
				foreach ($objAssociatedArray as $objAssociated)
					$strItems[] = $objAssociated->__toString();
				$this->lblSpheresesAsSphere->Text = implode($strGlue, $strItems);
			}

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////

		protected function lstGiantsesAsGiant_Update() {
			if ($this->lstGiantsesAsGiant) {
				$this->objStrategy->UnassociateAllGiantsesAsGiant();
				$objSelectedListItems = $this->lstGiantsesAsGiant->SelectedItems;
				if ($objSelectedListItems) foreach ($objSelectedListItems as $objListItem) {
					$this->objStrategy->AssociateGiantsAsGiant(Giants::Load($objListItem->Value));
				}
			}
		}

		protected function lstSpheresesAsSphere_Update() {
			if ($this->lstSpheresesAsSphere) {
				$this->objStrategy->UnassociateAllSpheresesAsSphere();
				$objSelectedListItems = $this->lstSpheresesAsSphere->SelectedItems;
				if ($objSelectedListItems) foreach ($objSelectedListItems as $objListItem) {
					$this->objStrategy->AssociateSpheresAsSphere(Spheres::Load($objListItem->Value));
				}
			}
		}





		///////////////////////////////////////////////
		// PUBLIC STRATEGY OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Strategy instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveStrategy() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtStrategy) $this->objStrategy->Strategy = $this->txtStrategy->Text;
				if ($this->txtPriority) $this->objStrategy->Priority = $this->txtPriority->Text;
				if ($this->txtCount) $this->objStrategy->Count = $this->txtCount->Text;
				if ($this->lstScorecard) $this->objStrategy->ScorecardId = $this->lstScorecard->SelectedValue;
				if ($this->lstCategoryType) $this->objStrategy->CategoryTypeId = $this->lstCategoryType->SelectedValue;
				if ($this->lstModifiedByObject) $this->objStrategy->ModifiedBy = $this->lstModifiedByObject->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Strategy object
				$this->objStrategy->Save();

				// Finally, update any ManyToManyReferences (if any)
				$this->lstGiantsesAsGiant_Update();
				$this->lstSpheresesAsSphere_Update();
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Strategy instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteStrategy() {
			$this->objStrategy->UnassociateAllGiantsesAsGiant();
			$this->objStrategy->UnassociateAllSpheresesAsSphere();
			$this->objStrategy->Delete();
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
				case 'Strategy': return $this->objStrategy;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Strategy fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'StrategyControl':
					if (!$this->txtStrategy) return $this->txtStrategy_Create();
					return $this->txtStrategy;
				case 'StrategyLabel':
					if (!$this->lblStrategy) return $this->lblStrategy_Create();
					return $this->lblStrategy;
				case 'PriorityControl':
					if (!$this->txtPriority) return $this->txtPriority_Create();
					return $this->txtPriority;
				case 'PriorityLabel':
					if (!$this->lblPriority) return $this->lblPriority_Create();
					return $this->lblPriority;
				case 'CountControl':
					if (!$this->txtCount) return $this->txtCount_Create();
					return $this->txtCount;
				case 'CountLabel':
					if (!$this->lblCount) return $this->lblCount_Create();
					return $this->lblCount;
				case 'ScorecardIdControl':
					if (!$this->lstScorecard) return $this->lstScorecard_Create();
					return $this->lstScorecard;
				case 'ScorecardIdLabel':
					if (!$this->lblScorecardId) return $this->lblScorecardId_Create();
					return $this->lblScorecardId;
				case 'CategoryTypeIdControl':
					if (!$this->lstCategoryType) return $this->lstCategoryType_Create();
					return $this->lstCategoryType;
				case 'CategoryTypeIdLabel':
					if (!$this->lblCategoryTypeId) return $this->lblCategoryTypeId_Create();
					return $this->lblCategoryTypeId;
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
				case 'GiantsAsGiantControl':
					if (!$this->lstGiantsesAsGiant) return $this->lstGiantsesAsGiant_Create();
					return $this->lstGiantsesAsGiant;
				case 'GiantsAsGiantLabel':
					if (!$this->lblGiantsesAsGiant) return $this->lblGiantsesAsGiant_Create();
					return $this->lblGiantsesAsGiant;
				case 'SpheresAsSphereControl':
					if (!$this->lstSpheresesAsSphere) return $this->lstSpheresesAsSphere_Create();
					return $this->lstSpheresesAsSphere;
				case 'SpheresAsSphereLabel':
					if (!$this->lblSpheresesAsSphere) return $this->lblSpheresesAsSphere_Create();
					return $this->lblSpheresesAsSphere;
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
					// Controls that point to Strategy fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'StrategyControl':
						return ($this->txtStrategy = QType::Cast($mixValue, 'QControl'));
					case 'PriorityControl':
						return ($this->txtPriority = QType::Cast($mixValue, 'QControl'));
					case 'CountControl':
						return ($this->txtCount = QType::Cast($mixValue, 'QControl'));
					case 'ScorecardIdControl':
						return ($this->lstScorecard = QType::Cast($mixValue, 'QControl'));
					case 'CategoryTypeIdControl':
						return ($this->lstCategoryType = QType::Cast($mixValue, 'QControl'));
					case 'ModifiedByControl':
						return ($this->lstModifiedByObject = QType::Cast($mixValue, 'QControl'));
					case 'ModifiedControl':
						return ($this->lblModified = QType::Cast($mixValue, 'QControl'));
					case 'GiantsAsGiantControl':
						return ($this->lstGiantsesAsGiant = QType::Cast($mixValue, 'QControl'));
					case 'SpheresAsSphereControl':
						return ($this->lstSpheresesAsSphere = QType::Cast($mixValue, 'QControl'));
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