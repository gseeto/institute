<?php
    class AddSeasonalAssessment extends QPanel {
        // Child Controls must be Publically Accessible so that they can be rendered in the template
        // Typically, you would want to do this by having public __getters for each control
        // But for simplicity of this demo, we'll simply make the child controls public, themselves.
        public $pnlTitle;
        public $strFirstName;
		public $strUsername;
		public $strLastName;
		public $btnSubmit;
		public $btnCancel;
		public $dtgUsers;
        protected $selectedUserArray;
        protected $strMethodCallBack;
        protected $objParent;
    
        // Specify the Template File for this custom QPanel
        protected $strTemplate = '../../admin/panels/AddSeasonalAssessment.tpl.php';

        // Customize the Look/Feel
        protected $strPadding = '10px';
      //  protected $strBackColor = '#fefece';

        // We Create a new __constructor that takes in the Project we are "viewing"
        // The functionality of __construct in a custom QPanel is similar to the QForm's Form_Create() functionality
        public function __construct($objParentObject, $strMethodCallBack, $objParent, $strControlId = null) {
            // First, let's call the Parent's __constructor
            try {
                parent::__construct($objParentObject, $strControlId);
            } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
            }
            $this->objParent = $objParent;
            $this->strMethodCallBack = $strMethodCallBack;
            $this->selectedUserArray = array();
            
            // Let's set up some other local child control
            $this->dtgUsers = new UserDataGrid($this);    
			$this->dtgUsers->Paginator = new QPaginator($this->dtgUsers);
			$this->dtgUsers->MetaAddColumn('FirstName','Html=<?=$_ITEM->FirstName; ?>', 'HtmlEntities=False', 'Width=200px');
			$this->dtgUsers->MetaAddColumn('LastName', 'Html=<?=$_ITEM->LastName; ?>','Width=100px', 'Width=200px');
			$this->dtgUsers->AddColumn(new QDataGridColumn('Username', '<?= $_CONTROL->ParentControl->RenderUsername($_ITEM) ?>', 'HtmlEntities=false' ));          
            $this->dtgUsers->AddColumn(new QDataGridColumn('Select User', '<?= $_CONTROL->ParentControl->chkSelected_Render($_ITEM) ?>', 'HtmlEntities=false' ));
            
			$this->dtgUsers->CellPadding = 5;
			$this->dtgUsers->SetDataBinder('dtgUsers_Bind',$this);
			$this->dtgUsers->NoDataHtml = 'No results found.  Please use a less-restrictive filter.';
			$this->dtgUsers->UseAjax = true;
			$this->dtgUsers->CssClass = 'table table-striped table-hover';
			
			$this->dtgUsers->SortColumnIndex = 1;
			$this->dtgUsers->ItemsPerPage = 20;
			
	        $objStyle = $this->dtgUsers->HeaderRowStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#337ab7'; 
	        
	        $objStyle = $this->dtgUsers->HeaderLinkStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#337ab7'; 
	
			$this->strFirstName = new QTextBox($this);
			$this->strFirstName->Name = 'First Name';
			$this->strFirstName->CssClass = 'form-control';
			$this->strFirstName->AddAction(new QChangeEvent(), new QAjaxControlAction($this,'dtgUsers_Refresh'));
			$this->strFirstName->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this,'dtgUsers_Refresh'));
			$this->strFirstName->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->strFirstName->Focus();
			
			$this->strLastName = new QTextBox($this);
			$this->strLastName->Name = 'Last Name';
			$this->strLastName->CssClass = 'form-control';
			$this->strLastName->AddAction(new QChangeEvent(), new QAjaxControlAction($this,'dtgUsers_Refresh'));
			$this->strLastName->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this,'dtgUsers_Refresh'));
			$this->strLastName->AddAction(new QEnterKeyEvent(), new QTerminateAction());
			$this->strLastName->Focus();
			
			$this->strUsername = new QTextBox($this);
			$this->strUsername->Name = 'Username';
			$this->strUsername->CssClass = 'form-control';
			$this->strUsername->AddAction(new QChangeEvent(), new QAjaxControlAction($this,'dtgUsers_Refresh'));
			$this->strUsername->AddAction(new QEnterKeyEvent(), new QAjaxControlAction($this,'dtgUsers_Refresh'));
			$this->strUsername->AddAction(new QEnterKeyEvent(), new QTerminateAction());
									
			$this->btnSubmit = new QButton($this);
			$this->btnSubmit->Text = "Add Users to Seasonal Assessment";
			$this->btnSubmit->CssClass = 'btn btn-default';
			$this->btnSubmit->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnSubmit_Click'));
			
			$this->btnCancel = new QButton($this);
			$this->btnCancel->Text = "Cancel";
			$this->btnCancel->CssClass = 'btn btn-default';
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnCancel_Click'));
			
        }
        
    public function dtgUsers_Refresh($strFormId, $strControlId, $strParameter) {
		$this->dtgUsers->PageNumber = 1;
		$this->dtgUsers->Refresh();
	}

    public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
		$this->Visible = false;
	}
	
     public function btnSubmit_Click($strFormId, $strControlId, $strParameter) {
		//Associate selected Users and hide panel
		foreach($this->selectedUserArray as $intUserId) {
			// Create a new assessment entry first
	     	$objAssessment = new SeasonalAssessment();
	     	$objAssessment->UserId = $intUserId;
	     	$objAssessment->ResourceId = 7; //Seasonal Assessment - going to have to find a nicer way of doing this
	     	$objAssessment->ResourceStatusId = 1; // initial state is untouched
	     	$objUser = User::Load($intUserId);
	     	$objUser->AssociateResource(Resource::Load(7));
			$objAssessment->Save();
		}
		$this->Visible = false;
		// And call the Form's Method CallBack, passing in "true" to state that we've made an update
        $strMethodCallBack = $this->strMethodCallBack;
        $this->objParent->$strMethodCallBack(true);
	}
	
    // This method (declared as public) will help with the checkbox column rendering
    public function chkSelected_Render(User $objUser) {
     	$strControlId = 'chkSelected' . $objUser->Id;

        // Let's see if the Checkbox exists already
        $chkSelected = $this->objForm->GetControl($strControlId);     
        if (!$chkSelected) {
            $chkSelected = new QCheckBox($this->dtgUsers, $strControlId);
            $chkSelected->Text = 'Select';
            $chkSelected->ActionParameter = $objUser->Id;
            $chkSelected->CssClass = 'checkbox';
            $chkSelected->AddAction(new QClickEvent(), new QAjaxControlAction($this,'chkSelected_Click'));
        }
        return $chkSelected->Render(false);
            
    }
        
    public function chkSelected_Click($strFormId, $strControlId, $strParameter) {
		$intUserId = $strParameter;
		if ($this->objForm->GetControl($strControlId)->Checked) {
			if (!in_array ($intUserId, $this->selectedUserArray))
				$this->selectedUserArray[] = $intUserId;
		} else {
			$key = array_search($intUserId, $this->selectedUserArray);
			unset($this->selectedUserArray[$key]);
		}
    }
        
	public function dtgUsers_Bind() {
		$objConditions = QQ::All();
		$objClauses = QQ::Clause($this->dtgUsers->LimitClause);

		if ($strName = trim($this->strFirstName->Text)) {
			$objConditions = QQ::AndCondition($objConditions,
				QQ::Like( QQN::User()->FirstName, $strName . '%')
			);
		}

		if ($strName = trim($this->strLastName->Text)) {
			$objConditions = QQ::AndCondition($objConditions,
				QQ::Like( QQN::User()->LastName, $strName . '%')
			);
		}
		
		if ($strName = trim($this->strUsername->Text)) {
			$objLoginCondition = QQ::All();
			$objLoginCondition = QQ::AndCondition($objLoginCondition,
				QQ::Like( QQN::Login()->Username, $strName . '%')
			);
			$objLogin = Login::QuerySingle($objLoginCondition);
			if (null != $objLogin) {
				$objConditions = QQ::AndCondition($objConditions,
				QQ::Equal( QQN::User()->LoginId, (int)$objLogin->Id)
			);
			} 
		}
		$this->dtgUsers->TotalItemCount = User::CountAll();
		$this->dtgUsers->DataSource = User::QueryArray($objConditions,$objClauses); 
	}

	public function RenderUsername($objUser) {
		$objLogin = Login::Load($objUser->LoginId);
		if($objLogin) {
			return $objLogin->Username;
		} else {
			return 'None';
		}
	}
 
    }