<?php
    class AdminUsersView extends QPanel {     
        public $dtgUsers;
        public $btnAdd;
        
        // Specify the Template File for this custom QPanel
        protected $strTemplate = 'panels/AdminUsersView.tpl.php';

 
        // We Create a new __constructor that takes in the Project we are "viewing"
        // The functionality of __construct in a custom QPanel is similar to the QForm's Form_Create() functionality
        public function __construct($objParentObject, $strControlId = null) {
            // First, let's call the Parent's __constructor
            try {
                parent::__construct($objParentObject, $strControlId);
            } catch (QCallerException $objExc) {
                $objExc->IncrementOffset();
                throw $objExc;
            }
            $this->dtgUsers = new UserDataGrid($this);
            $this->dtgUsers->Paginator = new QPaginator($this->dtgUsers);
			$this->dtgUsers->MetaAddEditLinkColumn('<?=__SUBDIRECTORY__.InstituteForm::DirUser."viewUser.php" ?>','<?=$_CONTROL->ParentControl->RenderName($_ITEM)?>','Name');
			$this->dtgUsers->AddColumn(new QDataGridColumn('Username', '<?= $_CONTROL->ParentControl->RenderUserName($_ITEM->LoginId) ?>', 'HtmlEntities=false', 'Width=200px' ));
			
			$this->dtgUsers->MetaAddColumn('Email','Html=<?=$_ITEM->Email; ?>', 'HtmlEntities=False', 'Width=200px');
			$this->dtgUsers->MetaAddColumn('Country', 'Html=<?=$_ITEM->Country; ?>','Width=100px');
			$this->dtgUsers->AddColumn(new QDataGridColumn('Company', '<?= $_CONTROL->ParentControl->RenderCompany($_ITEM->Id) ?>', 'HtmlEntities=false' ));
            
			$this->dtgUsers->CellPadding = 5;
			$this->dtgUsers->SetDataBinder('dtgUsers_Bind',$this);
			$this->dtgUsers->NoDataHtml = 'No Users.';
			$this->dtgUsers->UseAjax = true;
			
			$this->dtgUsers->SortColumnIndex = 1;
			$this->dtgUsers->ItemsPerPage = 20;
		
			$objStyle = $this->dtgUsers->RowStyle;
	        $objStyle->BackColor = '#ffffff';
	        $objStyle->FontSize = 12;
	
	        $objStyle = $this->dtgUsers->AlternateRowStyle;
	        $objStyle->BackColor = '#CCCCCC';
	
	        $objStyle = $this->dtgUsers->HeaderRowStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#003366'; 
	        
	        $objStyle = $this->dtgUsers->HeaderLinkStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#003366'; 
	        
	        $this->btnAdd = new QButton($this);
	        $this->btnAdd->Text = 'Add A User';
	        $this->btnAdd->CssClass = 'primary';
	        $this->btnAdd->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnAdd_Click'));
          
        }
        
    	public function dtgUsers_Bind() {
			$objConditions = QQ::All();
			$objClauses = array();
	
			/*if ($strName = trim($this->strName->Text)) {
				$objConditions = QQ::AndCondition($objConditions,
					QQ::Like( QQN::Recipe()->Name, $strName . '%')
				);
			}	*/	
			$userArray = User::QueryArray($objConditions,$objClauses);		
			$this->dtgUsers->DataSource = $userArray; 
		}
	
		public function RenderName($objUser) {
			return $objUser->FirstName . ' ' . $objUser->LastName;
		}
		
    	public function RenderUserName($intLoginId) {
    		$objLogin = Login::Load($intLoginId);
			return $objLogin->Username;
		}
        
   		public function RenderCompany($intUserId) {
    		$objCompanyArray = Company::LoadArrayByUser($intUserId);
    		if (null != $objCompanyArray) {
    			$strCompanys = '';
    			foreach($objCompanyArray as $objCompany) {
    				$strCompanys .= $objCompany->Name . ', ';
    			}
    			rtrim($strCompanys,', ');
				return $strCompanys;
    		} else {
    			return 'No Associated Company';
    		}
		}
		
	    public function btnAdd_Click($strFormId, $strControlId, $strParameter) {
			QApplication::Redirect('newUser.php');
		}
		
    }