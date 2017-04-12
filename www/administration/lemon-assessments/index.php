<?php
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

class AdminLemonAssessmentsForm extends InstituteForm {
	
	protected $strPageTitle = 'Manage LEMON Assessments';
	protected $dtgLemonAssessments;
	protected $btnAddLemonAssessment;
	protected $pnlAddLemonAssessment;
	protected $strFirstNameLemon;
	protected $strLastNameLemon;
	protected $strGroupLemon;
	protected $strCompanyLemon;
	
	protected $btnAddGroupAssessment;
	protected $pnlAddGroupAssessment;
	protected $strKeycode;
	protected $lstSearchAssessmentType;
	protected $btnSearch;
	
	protected $txtKeyCode;
	protected $lblKeyCode;
	protected $txtDescription;
	protected $lblDescription;
	protected $txtTotalKeys;
	protected $lblTotalKeys;
	protected $txtKeysLeft;
	protected $lblKeysLeft;
	protected $lstAssessmentType;
	
	protected function Form_Run() {
    	if (!QApplication::$Login) QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
		if(QApplication::$Login->Role->Name != 'Administrator') {			
			QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
		}
    	QApplication::ExecuteJavaScript("document.getElementById('administration').className = 'dropdown active';");
    	QApplication::ExecuteJavaScript("document.getElementById('admin-lemon').className = 'active';");    	
    }
    
	protected function Form_Create() {			
		$this->strFirstNameLemon = new QTextBox($this);
			$this->strFirstNameLemon->Name = 'First Name';
			$this->strFirstNameLemon->CssClass = 'form-control';

			$this->strLastNameLemon = new QTextBox($this);
			$this->strLastNameLemon->Name = 'Last Name';
			$this->strLastNameLemon->CssClass = 'form-control';
			
			$this->strGroupLemon = new QTextBox($this);
			$this->strGroupLemon->Name = 'Group KeyCode';
			$this->strGroupLemon->CssClass = 'form-control';
	        
			$this->strCompanyLemon = new QTextBox($this);
			$this->strCompanyLemon->Name = 'Company';
			$this->strCompanyLemon->CssClass = 'form-control';
			
			$this->btnSearch = new QButton($this);
	        $this->btnSearch->Text = 'Search';
	        $this->btnSearch->CssClass = 'btn btn-default';
	        $this->btnSearch->AddAction(new QClickEvent(), new QAjaxAction('dtgLemonAssessments_Refresh'));
          
	        $this->dtgLemonAssessments = new LemonAssessmentDataGrid($this);
            $this->dtgLemonAssessments->Paginator = new QPaginator($this->dtgLemonAssessments);
            $this->dtgLemonAssessments->MetaAddColumn('User','Html=<?=$_FORM->RenderUserLinkLemon($_ITEM); ?>', 'HtmlEntities=false', 'Width=300px');
           /* $this->dtgLemonAssessments->MetaAddColumn('CompanyId','Html=<?=$_FORM->RenderCompany($_ITEM->CompanyId); ?>', 'HtmlEntities=false');*/
            $this->dtgLemonAssessments->MetaAddColumn('GroupId','Html=<?=$_FORM->RenderGroupKeyCode($_ITEM); ?>', 'HtmlEntities=false');
            $this->dtgLemonAssessments->MetaAddColumn('ResourceStatusId','Html=<?=$_FORM->RenderStatus($_ITEM->ResourceStatusId); ?>', 'HtmlEntities=false');
            
        /*    $this->dtgLemonAssessments->AddColumn(new QDataGridColumn('User', '<?= $_FORM->RenderUserLinkLemon($_ITEM) ?>', 'HtmlEntities=false', 'Width=300px',
            	array('OrderByClause' => QQ::OrderBy(QQN::LemonAssessment()->User->LastName), 'ReverseOrderByClause' => QQ::OrderBy(QQN::LemonAssessment()->User->LastName, false))));
            $this->dtgLemonAssessments->AddColumn(new QDataGridColumn('Company', '<?= $_FORM->RenderCompany($_ITEM->CompanyId) ?>', 'HtmlEntities=false', 'Width=300px',
            	array('OrderByClause' => QQ::OrderBy(QQN::LemonAssessment()->Company->Name), 'ReverseOrderByClause' => QQ::OrderBy(QQN::LemonAssessment()->Company->Name, false))));
            $this->dtgLemonAssessments->AddColumn(new QDataGridColumn('Group KeyCode', '<?= $_FORM->RenderGroupKeyCode($_ITEM) ?>', 'HtmlEntities=false', 'Width=300px',
            	array('OrderByClause' => QQ::OrderBy(QQN::LemonAssessment()->Group->KeyCode), 'ReverseOrderByClause' => QQ::OrderBy(QQN::LemonAssessment()->Group->KeyCode, false))));
            $this->dtgLemonAssessments->AddColumn(new QDataGridColumn('Status', '<?= $_FORM->RenderStatus($_ITEM->ResourceStatusId) ?>', 'HtmlEntities=false', 'Width=300px',
            	array('OrderByClause' => QQ::OrderBy(QQN::LemonAssessment()->ResourceStatusId), 'ReverseOrderByClause' => QQ::OrderBy(QQN::LemonAssessment()->ResourceStatusId, false))));
         */   
            $this->dtgLemonAssessments->CellPadding = 5;
            $this->dtgLemonAssessments->SortColumnIndex = 1;
			$this->dtgLemonAssessments->ItemsPerPage = 20;
			$this->dtgLemonAssessments->SetDataBinder('dtgLemonAssessments_Bind',$this);
			$this->dtgLemonAssessments->NoDataHtml = 'No Lemon Assessments have been assigned.';
			$this->dtgLemonAssessments->UseAjax = true;
			$this->dtgLemonAssessments->CssClass = 'table table-striped table-hover';
						
	        $objStyle = $this->dtgLemonAssessments->HeaderRowStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#337ab7'; 
	        
	        $objStyle = $this->dtgLemonAssessments->HeaderLinkStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#337ab7'; 
	        
	        $this->btnAddLemonAssessment = new QButton($this);
	        $this->btnAddLemonAssessment->Text = 'Assign LEMON Assessment to a User';
	        $this->btnAddLemonAssessment->CssClass = 'btn btn-default';
	        $this->btnAddLemonAssessment->AddAction(new QClickEvent(), new QAjaxAction('btnAddLemonAssessment_Click'));
          
	        $this->pnlAddLemonAssessment = new QPanel($this);
	        $this->pnlAddLemonAssessment->Position = QPosition::Relative;
	        $this->pnlAddLemonAssessment->Visible = false;
	        $this->pnlAddLemonAssessment->AutoRenderChildren = true;			
	}
	
	public function dtgLemonAssessments_Refresh($strFormId, $strControlId, $strParameter) {
			$this->dtgLemonAssessments->PageNumber = 1;
			$this->dtgLemonAssessments->Refresh();
	}
	
	public function dtgLemonAssessments_Bind() {			
            $objConditions = QQ::All(); 
            $objClauses = array();
			if ($strName = trim($this->strFirstNameLemon->Text)) {
				$objConditions = QQ::AndCondition($objConditions,
					QQ::Like( QQN::LemonAssessment()->User->FirstName, $strName . '%')
				);
			}
		
			if ($strName = trim($this->strLastNameLemon->Text)) {
				$objConditions = QQ::AndCondition($objConditions,
					QQ::Like( QQN::LemonAssessment()->User->LastName, $strName . '%')
				);
			}
				
			if ($strName = trim($this->strGroupLemon->Text)) {
				$objConditions = QQ::AndCondition($objConditions,
					QQ::Like( QQN::LemonAssessment()->Group->KeyCode, $strName . '%')
				);
			} 
			if ($strName = trim($this->strCompanyLemon->Text)) {
				$objConditions = QQ::AndCondition($objConditions,
					QQ::Like( QQN::LemonAssessment()->Company->Name, $strName . '%')
				);
			} 
			  
		/*	$this->dtgLemonAssessments->TotalItemCount = LemonAssessment::CountAll();			
			$this->dtgLemonAssessments->DataSource = LemonAssessment::QueryArray($objConditions, QQ::Clause(
                $this->dtgLemonAssessments->OrderByClause,
                $this->dtgLemonAssessments->LimitClause
            ));	
            */
			$this->dtgLemonAssessments->MetaDataBinder($objConditions,$objClauses);		
		}
		
	public function RenderStatus($intResourceStatusId) {
			return ResourceStatus::Load($intResourceStatusId)->Value;
		}
		
	public function RenderCompany($intCompanyId) {
			$objCompany = Company::Load($intCompanyId);
			if (null != $objCompany)
				return $objCompany->Name;
			else 
				return 'No Company';
		}
        
    	public function RenderUser($intUserId) {
    		$objUser = User::Load($intUserId);
			return sprintf("%s %s", $objUser->FirstName, $objUser->LastName);
		}
		
    	public function RenderUserLinkKingdom($objAssessment) {
    		$intUserId = $objAssessment->UserId;
    		$objUser = User::Load($intUserId);
    		// Only display link if there is an assessment to display
    		if(ResourceStatus::Load($objAssessment->ResourceStatusId)->Id == 2) {
				return sprintf("<a href='%s/assessments/kingdom/viewAssessment.php/%s' target='_blank' >%s %s</a>", __SUBDIRECTORY__, $intUserId, $objUser->FirstName, $objUser->LastName);
    		} else {
    			return sprintf("%s %s", $objUser->FirstName, $objUser->LastName);
    		}
		}
		public function RenderGroupKeyCode(LemonAssessment $objAssessment) {
			$strControlId = 'lstLemonGroup' . $objAssessment->Id;
			$lstGroupType = $this->GetControl($strControlId);
			if(!$lstGroupType) {
				$lstGroupType = new QListBox($this->dtgLemonAssessments,$strControlId);
				$lstGroupType->Name = 'AssessmentGroup';
				$lstGroupType->CssClass = 'form-control';
				$lstGroupType->AddItem('-- No Group KeyCode --', 0,true);
				foreach(GroupAssessmentList::LoadArrayByResourceId(5) as $objGroup) {					
						if($objAssessment->GroupId == $objGroup->Id)
							$lstGroupType->AddItem($objGroup->KeyCode, $objGroup->Id,true);
						else 
							$lstGroupType->AddItem($objGroup->KeyCode, $objGroup->Id);
					}
							
				$lstGroupType->ActionParameter = $objAssessment->Id;
				$lstGroupType->AddAction(new QChangeEvent(), new QAjaxAction('lstLemonGroup_Change'));
			}
			return $lstGroupType->Render(false);
		}
		
    	public function lstLemonGroup_Change($strFormId, $strControlId, $strParameter) {
			$lstGroupType = $this->GetControl($strControlId);
			if ($lstGroupType != null){
				$objLemonAssessment = LemonAssessment::Load($strParameter);
				if($lstGroupType->SelectedValue == 0)
					$objLemonAssessment->GroupId = null;
				else
					$objLemonAssessment->GroupId = $lstGroupType->SelectedValue;
				$objLemonAssessment->Save();
			}
			$this->dtgLemonAssessments->Refresh();
		}
		
    	public function RenderUserLinkLemon($objAssessment) {
    		$intUserId = $objAssessment->UserId;
    		$objUser = User::Load($intUserId);
    		if(null != $objUser) {
	    		// Only display link if there is an assessment to display
	    		if(ResourceStatus::Load($objAssessment->ResourceStatusId)->Id == 2) {
					return sprintf("<a href='%s/assessments/lemon/viewAssessment.php/%s' target='_blank' >%s %s</a>", __SUBDIRECTORY__,$intUserId, $objUser->FirstName, $objUser->LastName);
	    		} else {
	    			return sprintf("%s %s", $objUser->FirstName, $objUser->LastName);
	    		}
    		} else {
    			return "No user associated";
    		}
		}
		
		public function btnAddLemonAssessment_Click($strFormId, $strControlId, $strParameter) {
			// Open up the panel and allow the adding of members to Lemon Assessments
	        $this->pnlAddLemonAssessment->Visible = true;
	        $this->pnlAddLemonAssessment->RemoveChildControls(true);
	        $pnlAddLemonView = new AddLemonAssessment($this->pnlAddLemonAssessment,'UpdateLemonAssessmentList',$this);	
		}
		
	    // Method Call back for the  panels 
	    public function UpdateLemonAssessmentList($blnUpdatesMade) {
	    	$this->dtgLemonAssessments->PageNumber = 1;
			$this->dtgLemonAssessments->Refresh();
	    }
}

AdminLemonAssessmentsForm::Run('AdminLemonAssessmentsForm');
?>