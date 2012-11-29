<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the Scorecard class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single Scorecard object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a ScorecardMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read Scorecard $Scorecard the actual Scorecard data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $CompanyIdControl
	 * property-read QLabel $CompanyIdLabel
	 * property QTextBox $NameControl
	 * property-read QLabel $NameLabel
	 * property QListBox $ResourceIdControl
	 * property-read QLabel $ResourceIdLabel
	 * property QListBox $UserControl
	 * property-read QLabel $UserLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class ScorecardMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var Scorecard objScorecard
		 * @access protected
		 */
		protected $objScorecard;

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

		// Controls that allow the editing of Scorecard's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QListBox lstCompany;
         * @access protected
         */
		protected $lstCompany;

        /**
         * @var QTextBox txtName;
         * @access protected
         */
		protected $txtName;

        /**
         * @var QListBox lstResource;
         * @access protected
         */
		protected $lstResource;


		// Controls that allow the viewing of Scorecard's individual data fields
        /**
         * @var QLabel lblCompanyId
         * @access protected
         */
		protected $lblCompanyId;

        /**
         * @var QLabel lblName
         * @access protected
         */
		protected $lblName;

        /**
         * @var QLabel lblResourceId
         * @access protected
         */
		protected $lblResourceId;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References
		protected $lstUsers;


		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References
		protected $lblUsers;



		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * ScorecardMetaControl to edit a single Scorecard object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single Scorecard object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ScorecardMetaControl
		 * @param Scorecard $objScorecard new or existing Scorecard object
		 */
		 public function __construct($objParentObject, Scorecard $objScorecard) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this ScorecardMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked Scorecard object
			$this->objScorecard = $objScorecard;

			// Figure out if we're Editing or Creating New
			if ($this->objScorecard->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this ScorecardMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing Scorecard object creation - defaults to CreateOrEdit
 		 * @return ScorecardMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objScorecard = Scorecard::Load($intId);

				// Scorecard was found -- return it!
				if ($objScorecard)
					return new ScorecardMetaControl($objParentObject, $objScorecard);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a Scorecard object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new ScorecardMetaControl($objParentObject, new Scorecard());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ScorecardMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Scorecard object creation - defaults to CreateOrEdit
		 * @return ScorecardMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return ScorecardMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ScorecardMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing Scorecard object creation - defaults to CreateOrEdit
		 * @return ScorecardMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return ScorecardMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objScorecard->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QListBox lstCompany
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstCompany_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstCompany = new QListBox($this->objParentObject, $strControlId);
			$this->lstCompany->Name = QApplication::Translate('Company');
			$this->lstCompany->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objCompanyCursor = Company::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objCompany = Company::InstantiateCursor($objCompanyCursor)) {
				$objListItem = new QListItem($objCompany->__toString(), $objCompany->Id);
				if (($this->objScorecard->Company) && ($this->objScorecard->Company->Id == $objCompany->Id))
					$objListItem->Selected = true;
				$this->lstCompany->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstCompany;
		}

		/**
		 * Create and setup QLabel lblCompanyId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCompanyId_Create($strControlId = null) {
			$this->lblCompanyId = new QLabel($this->objParentObject, $strControlId);
			$this->lblCompanyId->Name = QApplication::Translate('Company');
			$this->lblCompanyId->Text = ($this->objScorecard->Company) ? $this->objScorecard->Company->__toString() : null;
			return $this->lblCompanyId;
		}

		/**
		 * Create and setup QTextBox txtName
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtName_Create($strControlId = null) {
			$this->txtName = new QTextBox($this->objParentObject, $strControlId);
			$this->txtName->Name = QApplication::Translate('Name');
			$this->txtName->Text = $this->objScorecard->Name;
			$this->txtName->TextMode = QTextMode::MultiLine;
			return $this->txtName;
		}

		/**
		 * Create and setup QLabel lblName
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblName_Create($strControlId = null) {
			$this->lblName = new QLabel($this->objParentObject, $strControlId);
			$this->lblName->Name = QApplication::Translate('Name');
			$this->lblName->Text = $this->objScorecard->Name;
			return $this->lblName;
		}

		/**
		 * Create and setup QListBox lstResource
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstResource_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstResource = new QListBox($this->objParentObject, $strControlId);
			$this->lstResource->Name = QApplication::Translate('Resource');
			$this->lstResource->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objResourceCursor = Resource::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objResource = Resource::InstantiateCursor($objResourceCursor)) {
				$objListItem = new QListItem($objResource->__toString(), $objResource->Id);
				if (($this->objScorecard->Resource) && ($this->objScorecard->Resource->Id == $objResource->Id))
					$objListItem->Selected = true;
				$this->lstResource->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstResource;
		}

		/**
		 * Create and setup QLabel lblResourceId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblResourceId_Create($strControlId = null) {
			$this->lblResourceId = new QLabel($this->objParentObject, $strControlId);
			$this->lblResourceId->Name = QApplication::Translate('Resource');
			$this->lblResourceId->Text = ($this->objScorecard->Resource) ? $this->objScorecard->Resource->__toString() : null;
			return $this->lblResourceId;
		}

		/**
		 * Create and setup QListBox lstUsers
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstUsers_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstUsers = new QListBox($this->objParentObject, $strControlId);
			$this->lstUsers->Name = QApplication::Translate('Users');
			$this->lstUsers->SelectionMode = QSelectionMode::Multiple;

			// We need to know which items to "Pre-Select"
			$objAssociatedArray = $this->objScorecard->GetUserArray();

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objUserCursor = User::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objUser = User::InstantiateCursor($objUserCursor)) {
				$objListItem = new QListItem($objUser->__toString(), $objUser->Id);
				foreach ($objAssociatedArray as $objAssociated) {
					if ($objAssociated->Id == $objUser->Id)
						$objListItem->Selected = true;
				}
				$this->lstUsers->AddItem($objListItem);
			}

			// Return the QListControl
			return $this->lstUsers;
		}

		/**
		 * Create and setup QLabel lblUsers
		 * @param string $strControlId optional ControlId to use
		 * @param string $strGlue glue to display in between each associated object
		 * @return QLabel
		 */
		public function lblUsers_Create($strControlId = null, $strGlue = ', ') {
			$this->lblUsers = new QLabel($this->objParentObject, $strControlId);
			$this->lstUsers->Name = QApplication::Translate('Users');
			
			$objAssociatedArray = $this->objScorecard->GetUserArray();
			$strItems = array();
			foreach ($objAssociatedArray as $objAssociated)
				$strItems[] = $objAssociated->__toString();
			$this->lblUsers->Text = implode($strGlue, $strItems);
			return $this->lblUsers;
		}



		/**
		 * Refresh this MetaControl with Data from the local Scorecard object.
		 * @param boolean $blnReload reload Scorecard from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objScorecard->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objScorecard->Id;

			if ($this->lstCompany) {
					$this->lstCompany->RemoveAllItems();
				$this->lstCompany->AddItem(QApplication::Translate('- Select One -'), null);
				$objCompanyArray = Company::LoadAll();
				if ($objCompanyArray) foreach ($objCompanyArray as $objCompany) {
					$objListItem = new QListItem($objCompany->__toString(), $objCompany->Id);
					if (($this->objScorecard->Company) && ($this->objScorecard->Company->Id == $objCompany->Id))
						$objListItem->Selected = true;
					$this->lstCompany->AddItem($objListItem);
				}
			}
			if ($this->lblCompanyId) $this->lblCompanyId->Text = ($this->objScorecard->Company) ? $this->objScorecard->Company->__toString() : null;

			if ($this->txtName) $this->txtName->Text = $this->objScorecard->Name;
			if ($this->lblName) $this->lblName->Text = $this->objScorecard->Name;

			if ($this->lstResource) {
					$this->lstResource->RemoveAllItems();
				$this->lstResource->AddItem(QApplication::Translate('- Select One -'), null);
				$objResourceArray = Resource::LoadAll();
				if ($objResourceArray) foreach ($objResourceArray as $objResource) {
					$objListItem = new QListItem($objResource->__toString(), $objResource->Id);
					if (($this->objScorecard->Resource) && ($this->objScorecard->Resource->Id == $objResource->Id))
						$objListItem->Selected = true;
					$this->lstResource->AddItem($objListItem);
				}
			}
			if ($this->lblResourceId) $this->lblResourceId->Text = ($this->objScorecard->Resource) ? $this->objScorecard->Resource->__toString() : null;

			if ($this->lstUsers) {
				$this->lstUsers->RemoveAllItems();
				$objAssociatedArray = $this->objScorecard->GetUserArray();
				$objUserArray = User::LoadAll();
				if ($objUserArray) foreach ($objUserArray as $objUser) {
					$objListItem = new QListItem($objUser->__toString(), $objUser->Id);
					foreach ($objAssociatedArray as $objAssociated) {
						if ($objAssociated->Id == $objUser->Id)
							$objListItem->Selected = true;
					}
					$this->lstUsers->AddItem($objListItem);
				}
			}
			if ($this->lblUsers) {
				$objAssociatedArray = $this->objScorecard->GetUserArray();
				$strItems = array();
				foreach ($objAssociatedArray as $objAssociated)
					$strItems[] = $objAssociated->__toString();
				$this->lblUsers->Text = implode($strGlue, $strItems);
			}

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////

		protected function lstUsers_Update() {
			if ($this->lstUsers) {
				$this->objScorecard->UnassociateAllUsers();
				$objSelectedListItems = $this->lstUsers->SelectedItems;
				if ($objSelectedListItems) foreach ($objSelectedListItems as $objListItem) {
					$this->objScorecard->AssociateUser(User::Load($objListItem->Value));
				}
			}
		}





		///////////////////////////////////////////////
		// PUBLIC SCORECARD OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's Scorecard instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveScorecard() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstCompany) $this->objScorecard->CompanyId = $this->lstCompany->SelectedValue;
				if ($this->txtName) $this->objScorecard->Name = $this->txtName->Text;
				if ($this->lstResource) $this->objScorecard->ResourceId = $this->lstResource->SelectedValue;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the Scorecard object
				$this->objScorecard->Save();

				// Finally, update any ManyToManyReferences (if any)
				$this->lstUsers_Update();
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's Scorecard instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteScorecard() {
			$this->objScorecard->UnassociateAllUsers();
			$this->objScorecard->Delete();
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
				case 'Scorecard': return $this->objScorecard;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to Scorecard fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'CompanyIdControl':
					if (!$this->lstCompany) return $this->lstCompany_Create();
					return $this->lstCompany;
				case 'CompanyIdLabel':
					if (!$this->lblCompanyId) return $this->lblCompanyId_Create();
					return $this->lblCompanyId;
				case 'NameControl':
					if (!$this->txtName) return $this->txtName_Create();
					return $this->txtName;
				case 'NameLabel':
					if (!$this->lblName) return $this->lblName_Create();
					return $this->lblName;
				case 'ResourceIdControl':
					if (!$this->lstResource) return $this->lstResource_Create();
					return $this->lstResource;
				case 'ResourceIdLabel':
					if (!$this->lblResourceId) return $this->lblResourceId_Create();
					return $this->lblResourceId;
				case 'UserControl':
					if (!$this->lstUsers) return $this->lstUsers_Create();
					return $this->lstUsers;
				case 'UserLabel':
					if (!$this->lblUsers) return $this->lblUsers_Create();
					return $this->lblUsers;
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
					// Controls that point to Scorecard fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'CompanyIdControl':
						return ($this->lstCompany = QType::Cast($mixValue, 'QControl'));
					case 'NameControl':
						return ($this->txtName = QType::Cast($mixValue, 'QControl'));
					case 'ResourceIdControl':
						return ($this->lstResource = QType::Cast($mixValue, 'QControl'));
					case 'UserControl':
						return ($this->lstUsers = QType::Cast($mixValue, 'QControl'));
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