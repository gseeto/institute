<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Spheres class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Spheres object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a SpheresMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read Spheres $Spheres the actual Spheres data class being edited
	 * property QIntegerTextBox $IdControl
	 * property-read QLabel $IdLabel
	 * property QTextBox $SphereControl
	 * property-read QLabel $SphereLabel
	 * property QListBox $StrategyAsSphereControl
	 * property-read QLabel $StrategyAsSphereLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class SpheresMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var Spheres objSpheres
		 * @access protected
		 */
		protected $objSpheres;

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

		// Controls that allow the editing of Spheres's individual data fields
        /**
         * @var QIntegerTextBox txtId;
         * @access protected
         */
		protected $txtId;

        /**
         * @var QTextBox txtSphere;
         * @access protected
         */
		protected $txtSphere;


		// Controls that allow the viewing of Spheres's individual data fields
        /**
         * @var QLabel lblId
         * @access protected
         */
		protected $lblId;

        /**
         * @var QLabel lblSphere
         * @access protected
         */
		protected $lblSphere;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References
		protected $lstStrategiesAsSphere;


		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References
		protected $lblStrategiesAsSphere;



		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * SpheresMetaControl to edit a single Spheres object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Spheres object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this SpheresMetaControl
		 * @param Spheres $objSpheres new or existing Spheres object
		 */
		 public function __construct($objParentObject, Spheres $objSpheres) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this SpheresMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Spheres object
			$this->objSpheres = $objSpheres;

			// Figure out if we're Editing or Creating New
			if ($this->objSpheres->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this SpheresMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Spheres object creation - defaults to CreateOrEdit
 		 * @return SpheresMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objSpheres = Spheres::Load($intId);

				// Spheres was found -- return it!
				if ($objSpheres)
					return new SpheresMetaControl($objParentObject, $objSpheres);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Spheres object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new SpheresMetaControl($objParentObject, new Spheres());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this SpheresMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Spheres object creation - defaults to CreateOrEdit
		 * @return SpheresMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return SpheresMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this SpheresMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Spheres object creation - defaults to CreateOrEdit
		 * @return SpheresMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return SpheresMetaControl::Create($objParentObject, $intId, $intCreateType);
		}



		///////////////////////////////////////////////
		// PUBLIC CREATE and REFRESH METHODS
		///////////////////////////////////////////////

		/**
		 * Create and setup QIntegerTextBox txtId
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtId_Create($strControlId = null) {
			$this->txtId = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtId->Name = QApplication::Translate('Id');
			$this->txtId->Text = $this->objSpheres->Id;
			$this->txtId->Required = true;
			return $this->txtId;
		}

		/**
		 * Create and setup QLabel lblId
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblId_Create($strControlId = null, $strFormat = null) {
			$this->lblId = new QLabel($this->objParentObject, $strControlId);
			$this->lblId->Name = QApplication::Translate('Id');
			$this->lblId->Text = $this->objSpheres->Id;
			$this->lblId->Required = true;
			$this->lblId->Format = $strFormat;
			return $this->lblId;
		}

		/**
		 * Create and setup QTextBox txtSphere
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtSphere_Create($strControlId = null) {
			$this->txtSphere = new QTextBox($this->objParentObject, $strControlId);
			$this->txtSphere->Name = QApplication::Translate('Sphere');
			$this->txtSphere->Text = $this->objSpheres->Sphere;
			$this->txtSphere->TextMode = QTextMode::MultiLine;
			return $this->txtSphere;
		}

		/**
		 * Create and setup QLabel lblSphere
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblSphere_Create($strControlId = null) {
			$this->lblSphere = new QLabel($this->objParentObject, $strControlId);
			$this->lblSphere->Name = QApplication::Translate('Sphere');
			$this->lblSphere->Text = $this->objSpheres->Sphere;
			return $this->lblSphere;
		}

		/**
		 * Create and setup QListBox lstStrategiesAsSphere
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstStrategiesAsSphere_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstStrategiesAsSphere = new QListBox($this->objParentObject, $strControlId);
			$this->lstStrategiesAsSphere->Name = QApplication::Translate('Strategies As Sphere');
			$this->lstStrategiesAsSphere->SelectionMode = QSelectionMode::Multiple;

			// We need to know which items to "Pre-Select"
			$objAssociatedArray = $this->objSpheres->GetStrategyAsSphereArray();

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
				$this->lstStrategiesAsSphere->AddItem($objListItem);
			}

			// Return the QListControl
			return $this->lstStrategiesAsSphere;
		}

		/**
		 * Create and setup QLabel lblStrategiesAsSphere
		 * @param string $strControlId optional ControlId to use
		 * @param string $strGlue glue to display in between each associated object
		 * @return QLabel
		 */
		public function lblStrategiesAsSphere_Create($strControlId = null, $strGlue = ', ') {
			$this->lblStrategiesAsSphere = new QLabel($this->objParentObject, $strControlId);
			$this->lstStrategiesAsSphere->Name = QApplication::Translate('Strategies As Sphere');
			
			$objAssociatedArray = $this->objSpheres->GetStrategyAsSphereArray();
			$strItems = array();
			foreach ($objAssociatedArray as $objAssociated)
				$strItems[] = $objAssociated->__toString();
			$this->lblStrategiesAsSphere->Text = implode($strGlue, $strItems);
			return $this->lblStrategiesAsSphere;
		}



		/**
		 * Refresh this MetaControl with Data from the local Spheres object.
		 * @param boolean $blnReload reload Spheres from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objSpheres->Reload();

			if ($this->txtId) $this->txtId->Text = $this->objSpheres->Id;
			if ($this->lblId) $this->lblId->Text = $this->objSpheres->Id;

			if ($this->txtSphere) $this->txtSphere->Text = $this->objSpheres->Sphere;
			if ($this->lblSphere) $this->lblSphere->Text = $this->objSpheres->Sphere;

			if ($this->lstStrategiesAsSphere) {
				$this->lstStrategiesAsSphere->RemoveAllItems();
				$objAssociatedArray = $this->objSpheres->GetStrategyAsSphereArray();
				$objStrategyArray = Strategy::LoadAll();
				if ($objStrategyArray) foreach ($objStrategyArray as $objStrategy) {
					$objListItem = new QListItem($objStrategy->__toString(), $objStrategy->Id);
					foreach ($objAssociatedArray as $objAssociated) {
						if ($objAssociated->Id == $objStrategy->Id)
							$objListItem->Selected = true;
					}
					$this->lstStrategiesAsSphere->AddItem($objListItem);
				}
			}
			if ($this->lblStrategiesAsSphere) {
				$objAssociatedArray = $this->objSpheres->GetStrategyAsSphereArray();
				$strItems = array();
				foreach ($objAssociatedArray as $objAssociated)
					$strItems[] = $objAssociated->__toString();
				$this->lblStrategiesAsSphere->Text = implode($strGlue, $strItems);
			}

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////

		protected function lstStrategiesAsSphere_Update() {
			if ($this->lstStrategiesAsSphere) {
				$this->objSpheres->UnassociateAllStrategiesAsSphere();
				$objSelectedListItems = $this->lstStrategiesAsSphere->SelectedItems;
				if ($objSelectedListItems) foreach ($objSelectedListItems as $objListItem) {
					$this->objSpheres->AssociateStrategyAsSphere(Strategy::Load($objListItem->Value));
				}
			}
		}





		///////////////////////////////////////////////
		// PUBLIC SPHERES OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Spheres instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveSpheres() {
			try {
				// Update any fields for controls that have been created
				if ($this->txtId) $this->objSpheres->Id = $this->txtId->Text;
				if ($this->txtSphere) $this->objSpheres->Sphere = $this->txtSphere->Text;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Spheres object
				$this->objSpheres->Save();

				// Finally, update any ManyToManyReferences (if any)
				$this->lstStrategiesAsSphere_Update();
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Spheres instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteSpheres() {
			$this->objSpheres->UnassociateAllStrategiesAsSphere();
			$this->objSpheres->Delete();
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
				case 'Spheres': return $this->objSpheres;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Spheres fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->txtId) return $this->txtId_Create();
					return $this->txtId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'SphereControl':
					if (!$this->txtSphere) return $this->txtSphere_Create();
					return $this->txtSphere;
				case 'SphereLabel':
					if (!$this->lblSphere) return $this->lblSphere_Create();
					return $this->lblSphere;
				case 'StrategyAsSphereControl':
					if (!$this->lstStrategiesAsSphere) return $this->lstStrategiesAsSphere_Create();
					return $this->lstStrategiesAsSphere;
				case 'StrategyAsSphereLabel':
					if (!$this->lblStrategiesAsSphere) return $this->lblStrategiesAsSphere_Create();
					return $this->lblStrategiesAsSphere;
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
					// Controls that point to Spheres fields
					case 'IdControl':
						return ($this->txtId = QType::Cast($mixValue, 'QControl'));
					case 'SphereControl':
						return ($this->txtSphere = QType::Cast($mixValue, 'QControl'));
					case 'StrategyAsSphereControl':
						return ($this->lstStrategiesAsSphere = QType::Cast($mixValue, 'QControl'));
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