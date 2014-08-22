<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the TimeResults class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single TimeResults object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a TimeResultsMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read TimeResults $TimeResults the actual TimeResults data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $AssessmentIdControl
	 * property-read QLabel $AssessmentIdLabel
	 * property QIntegerTextBox $TimeControl
	 * property-read QLabel $TimeLabel
	 * property QTextBox $ActivityControl
	 * property-read QLabel $ActivityLabel
	 * property QCheckBox $CareerControl
	 * property-read QLabel $CareerLabel
	 * property QCheckBox $CallingControl
	 * property-read QLabel $CallingLabel
	 * property QCheckBox $CommunityControl
	 * property-read QLabel $CommunityLabel
	 * property QCheckBox $CreativityControl
	 * property-read QLabel $CreativityLabel
	 * property QCheckBox $MarginControl
	 * property-read QLabel $MarginLabel
	 * property-read string $TitleVerb a verb indicating whether or not this is being edited or created
	 * property-read boolean $EditMode a boolean indicating whether or not this is being edited or created
	 */

	class TimeResultsMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var TimeResults objTimeResults
		 * @access protected
		 */
		protected $objTimeResults;

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

		// Controls that allow the editing of TimeResults's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QListBox lstAssessment;
         * @access protected
         */
		protected $lstAssessment;

        /**
         * @var QIntegerTextBox txtTime;
         * @access protected
         */
		protected $txtTime;

        /**
         * @var QTextBox txtActivity;
         * @access protected
         */
		protected $txtActivity;

        /**
         * @var QCheckBox chkCareer;
         * @access protected
         */
		protected $chkCareer;

        /**
         * @var QCheckBox chkCalling;
         * @access protected
         */
		protected $chkCalling;

        /**
         * @var QCheckBox chkCommunity;
         * @access protected
         */
		protected $chkCommunity;

        /**
         * @var QCheckBox chkCreativity;
         * @access protected
         */
		protected $chkCreativity;

        /**
         * @var QCheckBox chkMargin;
         * @access protected
         */
		protected $chkMargin;


		// Controls that allow the viewing of TimeResults's individual data fields
        /**
         * @var QLabel lblAssessmentId
         * @access protected
         */
		protected $lblAssessmentId;

        /**
         * @var QLabel lblTime
         * @access protected
         */
		protected $lblTime;

        /**
         * @var QLabel lblActivity
         * @access protected
         */
		protected $lblActivity;

        /**
         * @var QLabel lblCareer
         * @access protected
         */
		protected $lblCareer;

        /**
         * @var QLabel lblCalling
         * @access protected
         */
		protected $lblCalling;

        /**
         * @var QLabel lblCommunity
         * @access protected
         */
		protected $lblCommunity;

        /**
         * @var QLabel lblCreativity
         * @access protected
         */
		protected $lblCreativity;

        /**
         * @var QLabel lblMargin
         * @access protected
         */
		protected $lblMargin;


		// QListBox Controls (if applicable) to edit Unique ReverseReferences and ManyToMany References

		// QLabel Controls (if applicable) to view Unique ReverseReferences and ManyToMany References


		/**
		 * Main constructor.  Constructor OR static create methods are designed to be called in either
		 * a parent QPanel or the main QForm when wanting to create a
		 * TimeResultsMetaControl to edit a single TimeResults object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single TimeResults object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this TimeResultsMetaControl
		 * @param TimeResults $objTimeResults new or existing TimeResults object
		 */
		 public function __construct($objParentObject, TimeResults $objTimeResults) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this TimeResultsMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked TimeResults object
			$this->objTimeResults = $objTimeResults;

			// Figure out if we're Editing or Creating New
			if ($this->objTimeResults->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this TimeResultsMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing TimeResults object creation - defaults to CreateOrEdit
 		 * @return TimeResultsMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objTimeResults = TimeResults::Load($intId);

				// TimeResults was found -- return it!
				if ($objTimeResults)
					return new TimeResultsMetaControl($objParentObject, $objTimeResults);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a TimeResults object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new TimeResultsMetaControl($objParentObject, new TimeResults());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this TimeResultsMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing TimeResults object creation - defaults to CreateOrEdit
		 * @return TimeResultsMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return TimeResultsMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this TimeResultsMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing TimeResults object creation - defaults to CreateOrEdit
		 * @return TimeResultsMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return TimeResultsMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objTimeResults->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QListBox lstAssessment
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstAssessment_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstAssessment = new QListBox($this->objParentObject, $strControlId);
			$this->lstAssessment->Name = QApplication::Translate('Assessment');
			$this->lstAssessment->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objAssessmentCursor = TimeAssessment::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objAssessment = TimeAssessment::InstantiateCursor($objAssessmentCursor)) {
				$objListItem = new QListItem($objAssessment->__toString(), $objAssessment->Id);
				if (($this->objTimeResults->Assessment) && ($this->objTimeResults->Assessment->Id == $objAssessment->Id))
					$objListItem->Selected = true;
				$this->lstAssessment->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstAssessment;
		}

		/**
		 * Create and setup QLabel lblAssessmentId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblAssessmentId_Create($strControlId = null) {
			$this->lblAssessmentId = new QLabel($this->objParentObject, $strControlId);
			$this->lblAssessmentId->Name = QApplication::Translate('Assessment');
			$this->lblAssessmentId->Text = ($this->objTimeResults->Assessment) ? $this->objTimeResults->Assessment->__toString() : null;
			return $this->lblAssessmentId;
		}

		/**
		 * Create and setup QIntegerTextBox txtTime
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtTime_Create($strControlId = null) {
			$this->txtTime = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtTime->Name = QApplication::Translate('Time');
			$this->txtTime->Text = $this->objTimeResults->Time;
			return $this->txtTime;
		}

		/**
		 * Create and setup QLabel lblTime
		 * @param string $strControlId optional ControlId to use
		 * @param string $strFormat optional sprintf format to use
		 * @return QLabel
		 */
		public function lblTime_Create($strControlId = null, $strFormat = null) {
			$this->lblTime = new QLabel($this->objParentObject, $strControlId);
			$this->lblTime->Name = QApplication::Translate('Time');
			$this->lblTime->Text = $this->objTimeResults->Time;
			$this->lblTime->Format = $strFormat;
			return $this->lblTime;
		}

		/**
		 * Create and setup QTextBox txtActivity
		 * @param string $strControlId optional ControlId to use
		 * @return QTextBox
		 */
		public function txtActivity_Create($strControlId = null) {
			$this->txtActivity = new QTextBox($this->objParentObject, $strControlId);
			$this->txtActivity->Name = QApplication::Translate('Activity');
			$this->txtActivity->Text = $this->objTimeResults->Activity;
			$this->txtActivity->MaxLength = TimeResults::ActivityMaxLength;
			return $this->txtActivity;
		}

		/**
		 * Create and setup QLabel lblActivity
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblActivity_Create($strControlId = null) {
			$this->lblActivity = new QLabel($this->objParentObject, $strControlId);
			$this->lblActivity->Name = QApplication::Translate('Activity');
			$this->lblActivity->Text = $this->objTimeResults->Activity;
			return $this->lblActivity;
		}

		/**
		 * Create and setup QCheckBox chkCareer
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkCareer_Create($strControlId = null) {
			$this->chkCareer = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkCareer->Name = QApplication::Translate('Career');
			$this->chkCareer->Checked = $this->objTimeResults->Career;
			return $this->chkCareer;
		}

		/**
		 * Create and setup QLabel lblCareer
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCareer_Create($strControlId = null) {
			$this->lblCareer = new QLabel($this->objParentObject, $strControlId);
			$this->lblCareer->Name = QApplication::Translate('Career');
			$this->lblCareer->Text = ($this->objTimeResults->Career) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblCareer;
		}

		/**
		 * Create and setup QCheckBox chkCalling
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkCalling_Create($strControlId = null) {
			$this->chkCalling = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkCalling->Name = QApplication::Translate('Calling');
			$this->chkCalling->Checked = $this->objTimeResults->Calling;
			return $this->chkCalling;
		}

		/**
		 * Create and setup QLabel lblCalling
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCalling_Create($strControlId = null) {
			$this->lblCalling = new QLabel($this->objParentObject, $strControlId);
			$this->lblCalling->Name = QApplication::Translate('Calling');
			$this->lblCalling->Text = ($this->objTimeResults->Calling) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblCalling;
		}

		/**
		 * Create and setup QCheckBox chkCommunity
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkCommunity_Create($strControlId = null) {
			$this->chkCommunity = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkCommunity->Name = QApplication::Translate('Community');
			$this->chkCommunity->Checked = $this->objTimeResults->Community;
			return $this->chkCommunity;
		}

		/**
		 * Create and setup QLabel lblCommunity
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCommunity_Create($strControlId = null) {
			$this->lblCommunity = new QLabel($this->objParentObject, $strControlId);
			$this->lblCommunity->Name = QApplication::Translate('Community');
			$this->lblCommunity->Text = ($this->objTimeResults->Community) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblCommunity;
		}

		/**
		 * Create and setup QCheckBox chkCreativity
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkCreativity_Create($strControlId = null) {
			$this->chkCreativity = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkCreativity->Name = QApplication::Translate('Creativity');
			$this->chkCreativity->Checked = $this->objTimeResults->Creativity;
			return $this->chkCreativity;
		}

		/**
		 * Create and setup QLabel lblCreativity
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblCreativity_Create($strControlId = null) {
			$this->lblCreativity = new QLabel($this->objParentObject, $strControlId);
			$this->lblCreativity->Name = QApplication::Translate('Creativity');
			$this->lblCreativity->Text = ($this->objTimeResults->Creativity) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblCreativity;
		}

		/**
		 * Create and setup QCheckBox chkMargin
		 * @param string $strControlId optional ControlId to use
		 * @return QCheckBox
		 */
		public function chkMargin_Create($strControlId = null) {
			$this->chkMargin = new QCheckBox($this->objParentObject, $strControlId);
			$this->chkMargin->Name = QApplication::Translate('Margin');
			$this->chkMargin->Checked = $this->objTimeResults->Margin;
			return $this->chkMargin;
		}

		/**
		 * Create and setup QLabel lblMargin
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblMargin_Create($strControlId = null) {
			$this->lblMargin = new QLabel($this->objParentObject, $strControlId);
			$this->lblMargin->Name = QApplication::Translate('Margin');
			$this->lblMargin->Text = ($this->objTimeResults->Margin) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblMargin;
		}



		/**
		 * Refresh this MetaControl with Data from the local TimeResults object.
		 * @param boolean $blnReload reload TimeResults from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objTimeResults->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objTimeResults->Id;

			if ($this->lstAssessment) {
					$this->lstAssessment->RemoveAllItems();
				$this->lstAssessment->AddItem(QApplication::Translate('- Select One -'), null);
				$objAssessmentArray = TimeAssessment::LoadAll();
				if ($objAssessmentArray) foreach ($objAssessmentArray as $objAssessment) {
					$objListItem = new QListItem($objAssessment->__toString(), $objAssessment->Id);
					if (($this->objTimeResults->Assessment) && ($this->objTimeResults->Assessment->Id == $objAssessment->Id))
						$objListItem->Selected = true;
					$this->lstAssessment->AddItem($objListItem);
				}
			}
			if ($this->lblAssessmentId) $this->lblAssessmentId->Text = ($this->objTimeResults->Assessment) ? $this->objTimeResults->Assessment->__toString() : null;

			if ($this->txtTime) $this->txtTime->Text = $this->objTimeResults->Time;
			if ($this->lblTime) $this->lblTime->Text = $this->objTimeResults->Time;

			if ($this->txtActivity) $this->txtActivity->Text = $this->objTimeResults->Activity;
			if ($this->lblActivity) $this->lblActivity->Text = $this->objTimeResults->Activity;

			if ($this->chkCareer) $this->chkCareer->Checked = $this->objTimeResults->Career;
			if ($this->lblCareer) $this->lblCareer->Text = ($this->objTimeResults->Career) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->chkCalling) $this->chkCalling->Checked = $this->objTimeResults->Calling;
			if ($this->lblCalling) $this->lblCalling->Text = ($this->objTimeResults->Calling) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->chkCommunity) $this->chkCommunity->Checked = $this->objTimeResults->Community;
			if ($this->lblCommunity) $this->lblCommunity->Text = ($this->objTimeResults->Community) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->chkCreativity) $this->chkCreativity->Checked = $this->objTimeResults->Creativity;
			if ($this->lblCreativity) $this->lblCreativity->Text = ($this->objTimeResults->Creativity) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->chkMargin) $this->chkMargin->Checked = $this->objTimeResults->Margin;
			if ($this->lblMargin) $this->lblMargin->Text = ($this->objTimeResults->Margin) ? QApplication::Translate('Yes') : QApplication::Translate('No');

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC TIMERESULTS OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's TimeResults instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveTimeResults() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstAssessment) $this->objTimeResults->AssessmentId = $this->lstAssessment->SelectedValue;
				if ($this->txtTime) $this->objTimeResults->Time = $this->txtTime->Text;
				if ($this->txtActivity) $this->objTimeResults->Activity = $this->txtActivity->Text;
				if ($this->chkCareer) $this->objTimeResults->Career = $this->chkCareer->Checked;
				if ($this->chkCalling) $this->objTimeResults->Calling = $this->chkCalling->Checked;
				if ($this->chkCommunity) $this->objTimeResults->Community = $this->chkCommunity->Checked;
				if ($this->chkCreativity) $this->objTimeResults->Creativity = $this->chkCreativity->Checked;
				if ($this->chkMargin) $this->objTimeResults->Margin = $this->chkMargin->Checked;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the TimeResults object
				$this->objTimeResults->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's TimeResults instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteTimeResults() {
			$this->objTimeResults->Delete();
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
				case 'TimeResults': return $this->objTimeResults;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to TimeResults fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'AssessmentIdControl':
					if (!$this->lstAssessment) return $this->lstAssessment_Create();
					return $this->lstAssessment;
				case 'AssessmentIdLabel':
					if (!$this->lblAssessmentId) return $this->lblAssessmentId_Create();
					return $this->lblAssessmentId;
				case 'TimeControl':
					if (!$this->txtTime) return $this->txtTime_Create();
					return $this->txtTime;
				case 'TimeLabel':
					if (!$this->lblTime) return $this->lblTime_Create();
					return $this->lblTime;
				case 'ActivityControl':
					if (!$this->txtActivity) return $this->txtActivity_Create();
					return $this->txtActivity;
				case 'ActivityLabel':
					if (!$this->lblActivity) return $this->lblActivity_Create();
					return $this->lblActivity;
				case 'CareerControl':
					if (!$this->chkCareer) return $this->chkCareer_Create();
					return $this->chkCareer;
				case 'CareerLabel':
					if (!$this->lblCareer) return $this->lblCareer_Create();
					return $this->lblCareer;
				case 'CallingControl':
					if (!$this->chkCalling) return $this->chkCalling_Create();
					return $this->chkCalling;
				case 'CallingLabel':
					if (!$this->lblCalling) return $this->lblCalling_Create();
					return $this->lblCalling;
				case 'CommunityControl':
					if (!$this->chkCommunity) return $this->chkCommunity_Create();
					return $this->chkCommunity;
				case 'CommunityLabel':
					if (!$this->lblCommunity) return $this->lblCommunity_Create();
					return $this->lblCommunity;
				case 'CreativityControl':
					if (!$this->chkCreativity) return $this->chkCreativity_Create();
					return $this->chkCreativity;
				case 'CreativityLabel':
					if (!$this->lblCreativity) return $this->lblCreativity_Create();
					return $this->lblCreativity;
				case 'MarginControl':
					if (!$this->chkMargin) return $this->chkMargin_Create();
					return $this->chkMargin;
				case 'MarginLabel':
					if (!$this->lblMargin) return $this->lblMargin_Create();
					return $this->lblMargin;
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
					// Controls that point to TimeResults fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'AssessmentIdControl':
						return ($this->lstAssessment = QType::Cast($mixValue, 'QControl'));
					case 'TimeControl':
						return ($this->txtTime = QType::Cast($mixValue, 'QControl'));
					case 'ActivityControl':
						return ($this->txtActivity = QType::Cast($mixValue, 'QControl'));
					case 'CareerControl':
						return ($this->chkCareer = QType::Cast($mixValue, 'QControl'));
					case 'CallingControl':
						return ($this->chkCalling = QType::Cast($mixValue, 'QControl'));
					case 'CommunityControl':
						return ($this->chkCommunity = QType::Cast($mixValue, 'QControl'));
					case 'CreativityControl':
						return ($this->chkCreativity = QType::Cast($mixValue, 'QControl'));
					case 'MarginControl':
						return ($this->chkMargin = QType::Cast($mixValue, 'QControl'));
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