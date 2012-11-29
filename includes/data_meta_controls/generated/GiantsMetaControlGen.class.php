<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Giants class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Giants object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a GiantsMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read Giants $Giants the actual Giants data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QTextBox $GiantControl
	 * property-read QLabel $GiantLabel
	 * property QTextBox $CountryControl
	 * property-read QLabel $CountryLabel
	 * property QListBox $StrategyAsGiantControl
	 * property-read QLabel $StrategyAsGiantLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class GiantsMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var Giants objGiants
		 * @access protected
		 */
		protected $objGiants;

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

		// Controls that allow the editing of Giants's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QTextBox txtGiant;
         * @access protected
         */
		protected $txtGiant;

        /**
         * @var QTextBox txtCountry;
         * @access protected
         */
		protected $txtCountry;


		// Controls that allow the viewing of Giants's individual data fields
        /**
         * @var QLabel lblGiant
         * @access protected
         */
		protected $lblGiant;

        /**
         * @var QLabel lblCountry
         * @access protected
         */
		protected $lblCountry;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References
		protected $lstStrategiesAsGiant;


		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References
		protected $lblStrategiesAsGiant;



		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * GiantsMetaControl to edit a single Giants object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Giants object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this GiantsMetaControl
		 * @param Giants $objGiants new or existing Giants object
		 */
		 public function __construct($objParentObject, Giants $objGiants) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this GiantsMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Giants object
			$this->objGiants = $objGiants;

			// Figure out if we're Editing or Creating New
			if ($this->objGiants->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this GiantsMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Giants object creation - defaults to CreateOrEdit
 		 * @return GiantsMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objGiants = Giants::Load($intId);

				// Giants was found -- return it!
				if ($objGiants)
					return new GiantsMetaControl($objParentObject, $objGiants);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Giants object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new GiantsMetaControl($objParentObject, new Giants());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this GiantsMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Giants object creation - defaults to CreateOrEdit
		 * @return GiantsMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return GiantsMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this GiantsMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Giants object creation - defaults to CreateOrEdit
		 * @return GiantsMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return GiantsMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objGiants->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QTextBox txtGiant
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtGiant_Create($strControlId = null) {
			$this->txtGiant = new QTextBox($this->objParentObject, $strControlId);
			$this->txtGiant->Name = QApplication::Translate('Giant');
			$this->txtGiant->Text = $this->objGiants->Giant;
			$this->txtGiant->TextMode = QTextMode::MultiLine;
			return $this->txtGiant;
		}

		/**
		 * Create and setup QLabel lblGiant
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblGiant_Create($strControlId = null) {
			$this->lblGiant = new QLabel($this->objParentObject, $strControlId);
			$this->lblGiant->Name = QApplication::Translate('Giant');
			$this->lblGiant->Text = $this->objGiants->Giant;
			return $this->lblGiant;
		}

		/**
		 * Create and setup QTextBox txtCountry
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtCountry_Create($strControlId = null) {
			$this->txtCountry = new QTextBox($this->objParentObject, $strControlId);
			$this->txtCountry->Name = QApplication::Translate('Country');
			$this->txtCountry->Text = $this->objGiants->Country;
			$this->txtCountry->TextMode = QTextMode::MultiLine;
			return $this->txtCountry;
		}

		/**
		 * Create and setup QLabel lblCountry
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCountry_Create($strControlId = null) {
			$this->lblCountry = new QLabel($this->objParentObject, $strControlId);
			$this->lblCountry->Name = QApplication::Translate('Country');
			$this->lblCountry->Text = $this->objGiants->Country;
			return $this->lblCountry;
		}

		/**
		 * Create and setup QListBox lstStrategiesAsGiant
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstStrategiesAsGiant_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstStrategiesAsGiant = new QListBox($this->objParentObject, $strControlId);
			$this->lstStrategiesAsGiant->Name = QApplication::Translate('Strategies As Giant');
			$this->lstStrategiesAsGiant->SelectionMode = QSelectionMode::Multiple;

			// We need to know which items to "Pre-Select"
			$objAssociatedArray = $this->objGiants->GetStrategyAsGiantArray();

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objStrategyCursor = Strategy::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objStrategy = Strategy::InstantiateCursor($objStrategyCursor)) {
				$objListItem = new QListItem($objStrategy->__toString(), $objStrategy->Id);
				foreach ($objAssociatedArray as $objAssociated) {
					if ($objAssociated->Id == $objStrategy->Id)
						$objListItem->Selected = true;
				}
				$this->lstStrategiesAsGiant->AddItem($objListItem);
			}

			// Return the QListControl
			return $this->lstStrategiesAsGiant;
		}

		/**
		 * Create and setup QLabel lblStrategiesAsGiant
		 * @param string $strControlId optional ControlId to use
		 * @param string $strGlue glue to display in between each associated object
		 * @return QLabel
		 */
		public function lblStrategiesAsGiant_Create($strControlId = null, $strGlue = ', ') {
			$this->lblStrategiesAsGiant = new QLabel($this->objParentObject, $strControlId);
			$this->lstStrategiesAsGiant->Name = QApplication::Translate('Strategies As Giant');
			
			$objAssociatedArray = $this->objGiants->GetStrategyAsGiantArray();
			$strItems = array();
			foreach ($objAssociatedArray as $objAssociated)
				$strItems[] = $objAssociated->__toString();
			$this->lblStrategiesAsGiant->Text = implode($strGlue, $strItems);
			return $this->lblStrategiesAsGiant;
		}



		/**
		 * Refresh this MetaControl with Data from the local Giants object.
		 * @param boolean $blnReload reload Giants from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objGiants->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objGiants->Id;

			if ($this->txtGiant) $this->txtGiant->Text = $this->objGiants->Giant;
			if ($this->lblGiant) $this->lblGiant->Text = $this->objGiants->Giant;

			if ($this->txtCountry) $this->txtCountry->Text = $this->objGiants->Country;
			if ($this->lblCountry) $this->lblCountry->Text = $this->objGiants->Country;

			if ($this->lstStrategiesAsGiant) {
				$this->lstStrategiesAsGiant->RemoveAllItems();
				$objAssociatedArray = $this->objGiants->GetStrategyAsGiantArray();
				$objStrategyArray = Strategy::LoadAll();
				if ($objStrategyArray) foreach ($objStrategyArray as $objStrategy) {
					$objListItem = new QListItem($objStrategy->__toString(), $objStrategy->Id);
					foreach ($objAssociatedArray as $objAssociated) {
						if ($objAssociated->Id == $objStrategy->Id)
							$objListItem->Selected = true;
					}
					$this->lstStrategiesAsGiant->AddItem($objListItem);
				}
			}
			if ($this->lblStrategiesAsGiant) {
				$objAssociatedArray = $this->objGiants->GetStrategyAsGiantArray();
				$strItems = array();
				foreach ($objAssociatedArray as $objAssociated)
					$strItems[] = $objAssociated->__toString();
				$this->lblStrategiesAsGiant->Text = implode($strGlue, $strItems);
			}

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////

		protected function lstStrategiesAsGiant_Update() {
			if ($this->lstStrategiesAsGiant) {
				$this->objGiants->UnassociateAllStrategiesAsGiant();
				$objSelectedListItems = $this->lstStrategiesAsGiant->SelectedItems;
				if ($objSelectedListItems) foreach ($objSelectedListItems as $objListItem) {
					$this->objGiants->AssociateStrategyAsGiant(Strategy::Load($objListItem->Value));
				}
			}
		}





		///////////////////////////////////////////////
		// PUBLIC GIANTS OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Giants instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveGiants() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtGiant) $this->objGiants->Giant = $this->txtGiant->Text;
				if ($this->txtCountry) $this->objGiants->Country = $this->txtCountry->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Giants object
				$this->objGiants->Save();

				// Finally, update any ManyToManyReferences (if any)
				$this->lstStrategiesAsGiant_Update();
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Giants instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteGiants() {
			$this->objGiants->UnassociateAllStrategiesAsGiant();
			$this->objGiants->Delete();
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
				case 'Giants': return $this->objGiants;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Giants fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'GiantControl':
					if (!$this->txtGiant) return $this->txtGiant_Create();
					return $this->txtGiant;
				case 'GiantLabel':
					if (!$this->lblGiant) return $this->lblGiant_Create();
					return $this->lblGiant;
				case 'CountryControl':
					if (!$this->txtCountry) return $this->txtCountry_Create();
					return $this->txtCountry;
				case 'CountryLabel':
					if (!$this->lblCountry) return $this->lblCountry_Create();
					return $this->lblCountry;
				case 'StrategyAsGiantControl':
					if (!$this->lstStrategiesAsGiant) return $this->lstStrategiesAsGiant_Create();
					return $this->lstStrategiesAsGiant;
				case 'StrategyAsGiantLabel':
					if (!$this->lblStrategiesAsGiant) return $this->lblStrategiesAsGiant_Create();
					return $this->lblStrategiesAsGiant;
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
					// Controls that point to Giants fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'GiantControl':
						return ($this->txtGiant = QType::Cast($mixValue, 'QControl'));
					case 'CountryControl':
						return ($this->txtCountry = QType::Cast($mixValue, 'QControl'));
					case 'StrategyAsGiantControl':
						return ($this->lstStrategiesAsGiant = QType::Cast($mixValue, 'QControl'));
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