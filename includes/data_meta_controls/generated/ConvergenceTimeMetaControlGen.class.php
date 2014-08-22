<?php
	/**
	 * This is a MetaControl class, providing a QForm or QPanel access to event handlers
	 * and QControls to perform the Create, Edit, and Delete functionality
	 * of the ConvergenceTime class.  This code-generated class
	 * contains all the basic elements to help a QPanel or QForm display an HTML form that can
	 * manipulate a single ConvergenceTime object.
	 *
	 * To take advantage of some (or all) of these control objects, you
	 * must create a new QForm or QPanel which instantiates a ConvergenceTimeMetaControl
	 * class.
	 *
	 * Any and all changes to this file will be overwritten with any subsequent
	 * code re-generation.
	 * 
	 * @package My Application
	 * @subpackage MetaControls
	 * property-read ConvergenceTime $ConvergenceTime the actual ConvergenceTime data class being edited
	 * property QLabel $IdControl
	 * property-read QLabel $IdLabel
	 * property QListBox $UserIdControl
	 * property-read QLabel $UserIdLabel
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

	class ConvergenceTimeMetaControlGen extends QBaseClass {
		// General Variables
		/**
		 * @var ConvergenceTime objConvergenceTime
		 * @access protected
		 */
		protected $objConvergenceTime;

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

		// Controls that allow the editing of ConvergenceTime's individual data fields
        /**
         * @var QLabel lblId;
         * @access protected
         */
		protected $lblId;

        /**
         * @var QListBox lstUser;
         * @access protected
         */
		protected $lstUser;

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


		// Controls that allow the viewing of ConvergenceTime's individual data fields
        /**
         * @var QLabel lblUserId
         * @access protected
         */
		protected $lblUserId;

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
		 * ConvergenceTimeMetaControl to edit a single ConvergenceTime object within the
		 * QPanel or QForm.
		 *
		 * This constructor takes in a single ConvergenceTime object, while any of the static
		 * create methods below can be used to construct based off of individual PK ID(s).
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ConvergenceTimeMetaControl
		 * @param ConvergenceTime $objConvergenceTime new or existing ConvergenceTime object
		 */
		 public function __construct($objParentObject, ConvergenceTime $objConvergenceTime) {
			// Setup Parent Object (e.g. QForm or QPanel which will be using this ConvergenceTimeMetaControl)
			$this->objParentObject = $objParentObject;

			// Setup linked ConvergenceTime object
			$this->objConvergenceTime = $objConvergenceTime;

			// Figure out if we're Editing or Creating New
			if ($this->objConvergenceTime->__Restored) {
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
		 * @param mixed $objParentObject QForm or QPanel which will be using this ConvergenceTimeMetaControl
		 * @param integer $intId primary key value
		 * @param QMetaControlCreateType $intCreateType rules governing ConvergenceTime object creation - defaults to CreateOrEdit
 		 * @return ConvergenceTimeMetaControl
		 */
		public static function Create($objParentObject, $intId = null, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			// Attempt to Load from PK Arguments
			if (strlen($intId)) {
				$objConvergenceTime = ConvergenceTime::Load($intId);

				// ConvergenceTime was found -- return it!
				if ($objConvergenceTime)
					return new ConvergenceTimeMetaControl($objParentObject, $objConvergenceTime);

				// If CreateOnRecordNotFound not specified, throw an exception
				else if ($intCreateType != QMetaControlCreateType::CreateOnRecordNotFound)
					throw new QCallerException('Could not find a ConvergenceTime object with PK arguments: ' . $intId);

			// If EditOnly is specified, throw an exception
			} else if ($intCreateType == QMetaControlCreateType::EditOnly)
				throw new QCallerException('No PK arguments specified');

			// If we are here, then we need to create a new record
			return new ConvergenceTimeMetaControl($objParentObject, new ConvergenceTime());
		}

		/**
		 * Static Helper Method to Create using PathInfo arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ConvergenceTimeMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing ConvergenceTime object creation - defaults to CreateOrEdit
		 * @return ConvergenceTimeMetaControl
		 */
		public static function CreateFromPathInfo($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::PathInfo(0);
			return ConvergenceTimeMetaControl::Create($objParentObject, $intId, $intCreateType);
		}

		/**
		 * Static Helper Method to Create using QueryString arguments
		 *
		 * @param mixed $objParentObject QForm or QPanel which will be using this ConvergenceTimeMetaControl
		 * @param QMetaControlCreateType $intCreateType rules governing ConvergenceTime object creation - defaults to CreateOrEdit
		 * @return ConvergenceTimeMetaControl
		 */
		public static function CreateFromQueryString($objParentObject, $intCreateType = QMetaControlCreateType::CreateOrEdit) {
			$intId = QApplication::QueryString('intId');
			return ConvergenceTimeMetaControl::Create($objParentObject, $intId, $intCreateType);
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
				$this->lblId->Text = $this->objConvergenceTime->Id;
			else
				$this->lblId->Text = 'N/A';
			return $this->lblId;
		}

		/**
		 * Create and setup QListBox lstUser
		 * @param string $strControlId optional ControlId to use
		 * @param QQCondition $objConditions override the default condition of QQ::All() to the query, itself
		 * @param QQClause[] $objOptionalClauses additional optional QQClause object or array of QQClause objects for the query
		 * @return QListBox
		 */
		public function lstUser_Create($strControlId = null, QQCondition $objCondition = null, $objOptionalClauses = null) {
			$this->lstUser = new QListBox($this->objParentObject, $strControlId);
			$this->lstUser->Name = QApplication::Translate('User');
			$this->lstUser->AddItem(QApplication::Translate('- Select One -'), null);

			// Setup and perform the Query
			if (is_null($objCondition)) $objCondition = QQ::All();
			$objUserCursor = User::QueryCursor($objCondition, $objOptionalClauses);

			// Iterate through the Cursor
			while ($objUser = User::InstantiateCursor($objUserCursor)) {
				$objListItem = new QListItem($objUser->__toString(), $objUser->Id);
				if (($this->objConvergenceTime->User) && ($this->objConvergenceTime->User->Id == $objUser->Id))
					$objListItem->Selected = true;
				$this->lstUser->AddItem($objListItem);
			}

			// Return the QListBox
			return $this->lstUser;
		}

		/**
		 * Create and setup QLabel lblUserId
		 * @param string $strControlId optional ControlId to use
		 * @return QLabel
		 */
		public function lblUserId_Create($strControlId = null) {
			$this->lblUserId = new QLabel($this->objParentObject, $strControlId);
			$this->lblUserId->Name = QApplication::Translate('User');
			$this->lblUserId->Text = ($this->objConvergenceTime->User) ? $this->objConvergenceTime->User->__toString() : null;
			return $this->lblUserId;
		}

		/**
		 * Create and setup QIntegerTextBox txtTime
		 * @param string $strControlId optional ControlId to use
		 * @return QIntegerTextBox
		 */
		public function txtTime_Create($strControlId = null) {
			$this->txtTime = new QIntegerTextBox($this->objParentObject, $strControlId);
			$this->txtTime->Name = QApplication::Translate('Time');
			$this->txtTime->Text = $this->objConvergenceTime->Time;
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
			$this->lblTime->Text = $this->objConvergenceTime->Time;
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
			$this->txtActivity->Text = $this->objConvergenceTime->Activity;
			$this->txtActivity->MaxLength = ConvergenceTime::ActivityMaxLength;
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
			$this->lblActivity->Text = $this->objConvergenceTime->Activity;
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
			$this->chkCareer->Checked = $this->objConvergenceTime->Career;
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
			$this->lblCareer->Text = ($this->objConvergenceTime->Career) ? QApplication::Translate('Yes') : QApplication::Translate('No');
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
			$this->chkCalling->Checked = $this->objConvergenceTime->Calling;
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
			$this->lblCalling->Text = ($this->objConvergenceTime->Calling) ? QApplication::Translate('Yes') : QApplication::Translate('No');
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
			$this->chkCommunity->Checked = $this->objConvergenceTime->Community;
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
			$this->lblCommunity->Text = ($this->objConvergenceTime->Community) ? QApplication::Translate('Yes') : QApplication::Translate('No');
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
			$this->chkCreativity->Checked = $this->objConvergenceTime->Creativity;
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
			$this->lblCreativity->Text = ($this->objConvergenceTime->Creativity) ? QApplication::Translate('Yes') : QApplication::Translate('No');
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
			$this->chkMargin->Checked = $this->objConvergenceTime->Margin;
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
			$this->lblMargin->Text = ($this->objConvergenceTime->Margin) ? QApplication::Translate('Yes') : QApplication::Translate('No');
			return $this->lblMargin;
		}



		/**
		 * Refresh this MetaControl with Data from the local ConvergenceTime object.
		 * @param boolean $blnReload reload ConvergenceTime from the database
		 * @return void
		 */
		public function Refresh($blnReload = false) {
			if ($blnReload)
				$this->objConvergenceTime->Reload();

			if ($this->lblId) if ($this->blnEditMode) $this->lblId->Text = $this->objConvergenceTime->Id;

			if ($this->lstUser) {
					$this->lstUser->RemoveAllItems();
				$this->lstUser->AddItem(QApplication::Translate('- Select One -'), null);
				$objUserArray = User::LoadAll();
				if ($objUserArray) foreach ($objUserArray as $objUser) {
					$objListItem = new QListItem($objUser->__toString(), $objUser->Id);
					if (($this->objConvergenceTime->User) && ($this->objConvergenceTime->User->Id == $objUser->Id))
						$objListItem->Selected = true;
					$this->lstUser->AddItem($objListItem);
				}
			}
			if ($this->lblUserId) $this->lblUserId->Text = ($this->objConvergenceTime->User) ? $this->objConvergenceTime->User->__toString() : null;

			if ($this->txtTime) $this->txtTime->Text = $this->objConvergenceTime->Time;
			if ($this->lblTime) $this->lblTime->Text = $this->objConvergenceTime->Time;

			if ($this->txtActivity) $this->txtActivity->Text = $this->objConvergenceTime->Activity;
			if ($this->lblActivity) $this->lblActivity->Text = $this->objConvergenceTime->Activity;

			if ($this->chkCareer) $this->chkCareer->Checked = $this->objConvergenceTime->Career;
			if ($this->lblCareer) $this->lblCareer->Text = ($this->objConvergenceTime->Career) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->chkCalling) $this->chkCalling->Checked = $this->objConvergenceTime->Calling;
			if ($this->lblCalling) $this->lblCalling->Text = ($this->objConvergenceTime->Calling) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->chkCommunity) $this->chkCommunity->Checked = $this->objConvergenceTime->Community;
			if ($this->lblCommunity) $this->lblCommunity->Text = ($this->objConvergenceTime->Community) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->chkCreativity) $this->chkCreativity->Checked = $this->objConvergenceTime->Creativity;
			if ($this->lblCreativity) $this->lblCreativity->Text = ($this->objConvergenceTime->Creativity) ? QApplication::Translate('Yes') : QApplication::Translate('No');

			if ($this->chkMargin) $this->chkMargin->Checked = $this->objConvergenceTime->Margin;
			if ($this->lblMargin) $this->lblMargin->Text = ($this->objConvergenceTime->Margin) ? QApplication::Translate('Yes') : QApplication::Translate('No');

		}



		///////////////////////////////////////////////
		// PROTECTED UPDATE METHODS for ManyToManyReferences (if any)
		///////////////////////////////////////////////





		///////////////////////////////////////////////
		// PUBLIC CONVERGENCETIME OBJECT MANIPULATORS
		///////////////////////////////////////////////

		/**
		 * This will save this object's ConvergenceTime instance,
		 * updating only the fields which have had a control created for it.
		 */
		public function SaveConvergenceTime() {
			try {
				// Update any fields for controls that have been created
				if ($this->lstUser) $this->objConvergenceTime->UserId = $this->lstUser->SelectedValue;
				if ($this->txtTime) $this->objConvergenceTime->Time = $this->txtTime->Text;
				if ($this->txtActivity) $this->objConvergenceTime->Activity = $this->txtActivity->Text;
				if ($this->chkCareer) $this->objConvergenceTime->Career = $this->chkCareer->Checked;
				if ($this->chkCalling) $this->objConvergenceTime->Calling = $this->chkCalling->Checked;
				if ($this->chkCommunity) $this->objConvergenceTime->Community = $this->chkCommunity->Checked;
				if ($this->chkCreativity) $this->objConvergenceTime->Creativity = $this->chkCreativity->Checked;
				if ($this->chkMargin) $this->objConvergenceTime->Margin = $this->chkMargin->Checked;

				// Update any UniqueReverseReferences (if any) for controls that have been created for it

				// Save the ConvergenceTime object
				$this->objConvergenceTime->Save();

				// Finally, update any ManyToManyReferences (if any)
			} catch (QCallerException $objExc) {
				$objExc->IncrementOffset();
				throw $objExc;
			}
		}

		/**
		 * This will DELETE this object's ConvergenceTime instance from the database.
		 * It will also unassociate itself from any ManyToManyReferences.
		 */
		public function DeleteConvergenceTime() {
			$this->objConvergenceTime->Delete();
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
				case 'ConvergenceTime': return $this->objConvergenceTime;
				case 'TitleVerb': return $this->strTitleVerb;
				case 'EditMode': return $this->blnEditMode;

				// Controls that point to ConvergenceTime fields -- will be created dynamically if not yet created
				case 'IdControl':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'IdLabel':
					if (!$this->lblId) return $this->lblId_Create();
					return $this->lblId;
				case 'UserIdControl':
					if (!$this->lstUser) return $this->lstUser_Create();
					return $this->lstUser;
				case 'UserIdLabel':
					if (!$this->lblUserId) return $this->lblUserId_Create();
					return $this->lblUserId;
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
					// Controls that point to ConvergenceTime fields
					case 'IdControl':
						return ($this->lblId = QType::Cast($mixValue, 'QControl'));
					case 'UserIdControl':
						return ($this->lstUser = QType::Cast($mixValue, 'QControl'));
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