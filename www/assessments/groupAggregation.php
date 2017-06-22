<?php
require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

class GroupAggregationForm extends InstituteForm {
	protected $arrNavigation;
	protected $strPageTitle = 'Home';
	protected $intNavSectionId = InstituteForm::NavSectionAssessments;
	protected $dtgGroupLemonAssessments;
	protected $dtgGroupTenPAssessments;
	protected $dtgGroupTenFAssessments;
	protected $dtgGroupIntegrationAssessments;
	protected $dtgGroupKingdomAssessments;
	protected $dtgGroupLRAAssessments;
	protected $dtgPostVentureAssessments;
	protected $btnViewGlobalLemonResults;
	protected $btnAggregateGroups;
	protected $selectedLemonGroups;
	public    $strKeycode;
	protected $btnLemon;
	protected $dtgPartneringAwarenessAssessments;
	protected $dtgPartneringReadinessAssessments;
	
	public    $str50Keycode;
	protected $btn50Lemon;
	protected $dtg50GroupLemonAssessments;
	protected $btn50AggregateGroups;
	protected $selected50LemonGroups;


	protected function Form_Run() {
		// If not  logged in, go to login page.
		if (!QApplication::$Login) QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
		
		if((QApplication::$Login->Role->Name != 'Company Manager')&&(QApplication::$Login->Role->Name != 'Administrator')) {			
			QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
		}
	}
	
	protected function Form_Create() {		
		$this->btnViewGlobalLemonResults = new QButton($this);
		$this->btnViewGlobalLemonResults->Name = 'View Global LEMON Statistics';
		$this->btnViewGlobalLemonResults->Text = 'View Global LEMON Statistics';
		$this->btnViewGlobalLemonResults->CssClass = 'btn btn-default';
		if(QApplication::$Login->Role->Name != 'Administrator') {
			$this->btnViewGlobalLemonResults->Visible = false;
		}
		$this->btnViewGlobalLemonResults->AddAction(new QClickEvent(), new QAjaxAction('btnViewGlobalLemonResults_Click'));
		
		$this->strKeycode = new QTextBox($this);
		$this->strKeycode->Name = 'KeyCode';
		$this->strKeycode->CssClass = 'form-control';
		$this->strKeycode->Focus();		
	
		$this->btnLemon = new QButton($this);
		$this->btnLemon->Text = 'Submit';
		$this->btnLemon->HtmlEntities = false;
		$this->btnLemon->CssClass = 'btn btn-default';
		$this->btnLemon->AddAction(new QClickEvent(), new QAjaxAction('dtgGroupLemonAssessments_Refresh'));		
		
		$this->selectedLemonGroups = array();
		$this->dtgGroupLemonAssessments = new GroupAssessmentListDataGrid($this);
        $this->dtgGroupLemonAssessments->Paginator = new QPaginator($this->dtgGroupLemonAssessments);
        $this->dtgGroupLemonAssessments->AddColumn(new QDataGridColumn('Key Code', '<?= $_ITEM->KeyCode ?>', 'HtmlEntities=false', 'Width=200px',
        	array('OrderByClause' => QQ::OrderBy(QQN::GroupAssessmentList()->KeyCode), 'ReverseOrderByClause' => QQ::OrderBy(QQN::GroupAssessmentList()->KeyCode, false))));
        $this->dtgGroupLemonAssessments->AddColumn(new QDataGridColumn('Description', '<?= $_ITEM->Description ?>', 'HtmlEntities=false', 'Width=300px' ));
        $this->dtgGroupLemonAssessments->AddColumn(new QDataGridColumn('Total Keys', '<?= $_ITEM->TotalKeys ?>', 'HtmlEntities=false', 'Width=50px' ));
        $this->dtgGroupLemonAssessments->AddColumn(new QDataGridColumn('Keys Left', '<?= $_ITEM->KeysLeft ?>', 'HtmlEntities=false', 'Width=50px' ));   
        $this->dtgGroupLemonAssessments->MetaAddEditLinkColumn('<?=__SUBDIRECTORY__ .InstituteForm::DirAssessments. "lemon/groupAggregationResult.php/". $_ITEM->Id ?>','Result','Results');
		if(QApplication::$Login->Role->Name == 'Administrator') {
			$this->dtgGroupLemonAssessments->AddColumn(new QDataGridColumn('Select Groups to Aggregate', '<?= $_FORM->chkSelected_Render($_ITEM, $_CONTROL->CurrentRowIndex) ?>', 'HtmlEntities=false','Width=200px' ));
		}
        $this->dtgGroupLemonAssessments->SortColumnIndex = 1;
		$this->dtgGroupLemonAssessments->ItemsPerPage = 20;
        $this->dtgGroupLemonAssessments->CellPadding = 5;
		$this->dtgGroupLemonAssessments->SetDataBinder('dtgGroupLemonAssessments_Bind',$this);
		$this->dtgGroupLemonAssessments->NoDataHtml = 'No LEMON Assessments have been assigned.';
		$this->dtgGroupLemonAssessments->UseAjax = true;
		$this->dtgGroupLemonAssessments->CssClass = 'table table-striped table-hover';

        $objStyle = $this->dtgGroupLemonAssessments->HeaderRowStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7'; 
        
        $objStyle = $this->dtgGroupLemonAssessments->HeaderLinkStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7'; 
        
        $this->btnAggregateGroups = new QButton($this);
		$this->btnAggregateGroups->Name = 'Aggregate Selected Groups';
		$this->btnAggregateGroups->Text = 'Aggregate Selected Groups';
		$this->btnAggregateGroups->CssClass = 'btn btn-default';
		if(QApplication::$Login->Role->Name != 'Administrator') {
			$this->btnAggregateGroups->Visible = false;
		}
		$this->btnAggregateGroups->AddAction(new QClickEvent(), new QAjaxAction('btnAggregateGroups_Click'));
		
        /***************************************************/
		/* 50 questions assessment */
		$this->str50Keycode = new QTextBox($this);
		$this->str50Keycode->Name = 'KeyCode';
		$this->str50Keycode->CssClass = 'form-control';
		$this->str50Keycode->Focus();
		
		$this->btn50Lemon = new QButton($this);
		$this->btn50Lemon->Text = 'Submit';
		$this->btn50Lemon->HtmlEntities = false;
		$this->btn50Lemon->CssClass = 'btn btn-default';
		$this->btn50Lemon->AddAction(new QClickEvent(), new QAjaxAction('dtg50GroupLemonAssessments_Refresh'));
		
		$this->selected50LemonGroups = array();
		$this->dtg50GroupLemonAssessments = new GroupAssessmentListDataGrid($this);
        $this->dtg50GroupLemonAssessments->Paginator = new QPaginator($this->dtg50GroupLemonAssessments);
        $this->dtg50GroupLemonAssessments->AddColumn(new QDataGridColumn('Key Code', '<?= $_ITEM->KeyCode ?>', 'HtmlEntities=false', 'Width=200px',
        	array('OrderByClause' => QQ::OrderBy(QQN::GroupAssessmentList()->KeyCode), 'ReverseOrderByClause' => QQ::OrderBy(QQN::GroupAssessmentList()->KeyCode, false))));
        $this->dtg50GroupLemonAssessments->AddColumn(new QDataGridColumn('Description', '<?= $_ITEM->Description ?>', 'HtmlEntities=false', 'Width=300px' ));
        $this->dtg50GroupLemonAssessments->AddColumn(new QDataGridColumn('Total Keys', '<?= $_ITEM->TotalKeys ?>', 'HtmlEntities=false', 'Width=50px' ));
        $this->dtg50GroupLemonAssessments->AddColumn(new QDataGridColumn('Keys Left', '<?= $_FORM->RenderKeysLeft($_ITEM) ?>', 'HtmlEntities=false', 'Width=50px' ));   
        $this->dtg50GroupLemonAssessments->MetaAddEditLinkColumn('<?=__SUBDIRECTORY__ .InstituteForm::DirAssessments. "lemon/group50AggregationResult.php/". $_ITEM->Id ?>','Result','Results');
		if(QApplication::$Login->Role->Name == 'Administrator') {
			$this->dtg50GroupLemonAssessments->AddColumn(new QDataGridColumn('Select Groups to Aggregate', '<?= $_FORM->chk50Selected_Render($_ITEM, $_CONTROL->CurrentRowIndex) ?>', 'HtmlEntities=false','Width=200px' ));
		}
        $this->dtg50GroupLemonAssessments->SortColumnIndex = 1;
		$this->dtg50GroupLemonAssessments->ItemsPerPage = 20;
        $this->dtg50GroupLemonAssessments->CellPadding = 5;
		$this->dtg50GroupLemonAssessments->SetDataBinder('dtg50GroupLemonAssessments_Bind',$this);
		$this->dtg50GroupLemonAssessments->NoDataHtml = 'No LEMON Assessments have been assigned.';
		$this->dtg50GroupLemonAssessments->UseAjax = true;
		$this->dtg50GroupLemonAssessments->CssClass = 'table table-striped table-hover';

        $objStyle = $this->dtg50GroupLemonAssessments->HeaderRowStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7'; 
        
        $objStyle = $this->dtg50GroupLemonAssessments->HeaderLinkStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7'; 
        
        $this->btn50AggregateGroups = new QButton($this);
		$this->btn50AggregateGroups->Name = 'Aggregate Selected Groups';
		$this->btn50AggregateGroups->Text = 'Aggregate Selected Groups';
		$this->btn50AggregateGroups->CssClass = 'btn btn-default';
		if(QApplication::$Login->Role->Name != 'Administrator') {
			$this->btn50AggregateGroups->Visible = false;
		}
		$this->btn50AggregateGroups->AddAction(new QClickEvent(), new QAjaxAction('btn50AggregateGroups_Click'));
		/***************************************************/
        $this->dtgGroupTenPAssessments = new GroupAssessmentListDataGrid($this);
        $this->dtgGroupTenPAssessments->Paginator = new QPaginator($this->dtgGroupTenPAssessments);
        $this->dtgGroupTenPAssessments->AddColumn(new QDataGridColumn('Key Code', '<?= $_ITEM->KeyCode ?>', 'HtmlEntities=false', 'Width=200px' ));
        $this->dtgGroupTenPAssessments->AddColumn(new QDataGridColumn('Description', '<?= $_ITEM->Description ?>', 'HtmlEntities=false', 'Width=300px' ));
        $this->dtgGroupTenPAssessments->AddColumn(new QDataGridColumn('Total Keys', '<?= $_ITEM->TotalKeys ?>', 'HtmlEntities=false', 'Width=50px' ));
        $this->dtgGroupTenPAssessments->AddColumn(new QDataGridColumn('Keys Left', '<?= $_ITEM->KeysLeft ?>', 'HtmlEntities=false', 'Width=50px' ));   
        $this->dtgGroupTenPAssessments->MetaAddEditLinkColumn('<?=__SUBDIRECTORY__ .InstituteForm::DirAssessments. "tenp/groupAggregationResult.php/". $_ITEM->Id ?>','Result','Results');
			
        $this->dtgGroupTenPAssessments->CellPadding = 5;
		$this->dtgGroupTenPAssessments->SetDataBinder('dtgGroupTenPAssessments_Bind',$this);
		$this->dtgGroupTenPAssessments->NoDataHtml = 'No 10-P Assessments have been assigned.';
		$this->dtgGroupTenPAssessments->UseAjax = true;
		
		$this->dtgGroupTenPAssessments->SortColumnIndex = 1;
		$this->dtgGroupTenPAssessments->ItemsPerPage = 20;
		
		$this->dtgGroupTenPAssessments->CssClass = 'table table-striped table-hover';
        $objStyle = $this->dtgGroupTenPAssessments->HeaderRowStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7'; 
        
        $objStyle = $this->dtgGroupTenPAssessments->HeaderLinkStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7'; 
        /*************************************************************************/	
        $this->dtgGroupTenFAssessments = new GroupAssessmentListDataGrid($this);
        $this->dtgGroupTenFAssessments->Paginator = new QPaginator($this->dtgGroupTenFAssessments);
        $this->dtgGroupTenFAssessments->AddColumn(new QDataGridColumn('Key Code', '<?= $_ITEM->KeyCode ?>', 'HtmlEntities=false', 'Width=200px' ));
        $this->dtgGroupTenFAssessments->AddColumn(new QDataGridColumn('Description', '<?= $_ITEM->Description ?>', 'HtmlEntities=false', 'Width=300px' ));
        $this->dtgGroupTenFAssessments->AddColumn(new QDataGridColumn('Total Keys', '<?= $_ITEM->TotalKeys ?>', 'HtmlEntities=false', 'Width=50px' ));
        $this->dtgGroupTenFAssessments->AddColumn(new QDataGridColumn('Keys Left', '<?= $_ITEM->KeysLeft ?>', 'HtmlEntities=false', 'Width=50px' ));   
        $this->dtgGroupTenFAssessments->MetaAddEditLinkColumn('<?=__SUBDIRECTORY__ .InstituteForm::DirAssessments. "tenf/groupAggregationResult.php/". $_ITEM->Id ?>','Result','Results');
			
        $this->dtgGroupTenFAssessments->CellPadding = 5;
		$this->dtgGroupTenFAssessments->SetDataBinder('dtgGroupTenFAssessments_Bind',$this);
		$this->dtgGroupTenFAssessments->NoDataHtml = 'No 10-F Assessments have been assigned.';
		$this->dtgGroupTenPAssessments->UseAjax = true;
		
		$this->dtgGroupTenFAssessments->SortColumnIndex = 1;
		$this->dtgGroupTenFAssessments->ItemsPerPage = 20;
		
		$this->dtgGroupTenFAssessments->CssClass = 'table table-striped table-hover';

        $objStyle = $this->dtgGroupTenFAssessments->HeaderRowStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7'; 
        
        $objStyle = $this->dtgGroupTenFAssessments->HeaderLinkStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7'; 
        /*************************************************************************/	
        $this->dtgGroupIntegrationAssessments = new GroupAssessmentListDataGrid($this);
        $this->dtgGroupIntegrationAssessments->Paginator = new QPaginator($this->dtgGroupIntegrationAssessments);
        $this->dtgGroupIntegrationAssessments->AddColumn(new QDataGridColumn('Key Code', '<?= $_ITEM->KeyCode ?>', 'HtmlEntities=false', 'Width=200px' ));
        $this->dtgGroupIntegrationAssessments->AddColumn(new QDataGridColumn('Description', '<?= $_ITEM->Description ?>', 'HtmlEntities=false', 'Width=300px' ));
        $this->dtgGroupIntegrationAssessments->AddColumn(new QDataGridColumn('Total Keys', '<?= $_ITEM->TotalKeys ?>', 'HtmlEntities=false', 'Width=50px' ));
        $this->dtgGroupIntegrationAssessments->AddColumn(new QDataGridColumn('Keys Left', '<?= $_ITEM->KeysLeft ?>', 'HtmlEntities=false', 'Width=50px' ));   
        $this->dtgGroupIntegrationAssessments->MetaAddEditLinkColumn('<?=__SUBDIRECTORY__ .InstituteForm::DirAssessments. "integration/groupAggregationResult.php/". $_ITEM->Id ?>','Result','Results');
			
        $this->dtgGroupIntegrationAssessments->CellPadding = 5;
		$this->dtgGroupIntegrationAssessments->SetDataBinder('dtgGroupIntegrationAssessments_Bind',$this);
		$this->dtgGroupIntegrationAssessments->NoDataHtml = 'No Integration Assessments have been assigned.';
		$this->dtgGroupIntegrationAssessments->UseAjax = true;
		
		$this->dtgGroupIntegrationAssessments->SortColumnIndex = 1;
		$this->dtgGroupIntegrationAssessments->ItemsPerPage = 20;
		
		$this->dtgGroupIntegrationAssessments->CssClass = 'table table-striped table-hover';

        $objStyle = $this->dtgGroupIntegrationAssessments->HeaderRowStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7'; 
        
        $objStyle = $this->dtgGroupIntegrationAssessments->HeaderLinkStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7'; 
        /*************************************************************************/	
        
        $this->dtgGroupKingdomAssessments = new GroupAssessmentListDataGrid($this);
        $this->dtgGroupKingdomAssessments->Paginator = new QPaginator($this->dtgGroupKingdomAssessments);
        $this->dtgGroupKingdomAssessments->AddColumn(new QDataGridColumn('Key Code', '<?= $_ITEM->KeyCode ?>', 'HtmlEntities=false', 'Width=200px' ));
        $this->dtgGroupKingdomAssessments->AddColumn(new QDataGridColumn('Description', '<?= $_ITEM->Description ?>', 'HtmlEntities=false', 'Width=300px' ));
        $this->dtgGroupKingdomAssessments->AddColumn(new QDataGridColumn('Total Keys', '<?= $_ITEM->TotalKeys ?>', 'HtmlEntities=false', 'Width=50px' ));
        $this->dtgGroupKingdomAssessments->AddColumn(new QDataGridColumn('Keys Left', '<?= $_ITEM->KeysLeft ?>', 'HtmlEntities=false', 'Width=50px' ));   
        $this->dtgGroupKingdomAssessments->MetaAddEditLinkColumn('<?=__SUBDIRECTORY__ .InstituteForm::DirAssessments. "kingdom/groupAggregationResult.php/". $_ITEM->Id ?>','Result','Results');
			
        $this->dtgGroupKingdomAssessments->CellPadding = 5;
		$this->dtgGroupKingdomAssessments->SetDataBinder('dtgGroupKingdomAssessments_Bind',$this);
		$this->dtgGroupKingdomAssessments->NoDataHtml = 'No Kingdom Business Impact Assessments have been assigned.';
		$this->dtgGroupKingdomAssessments->UseAjax = true;
		
		$this->dtgGroupKingdomAssessments->SortColumnIndex = 1;
		$this->dtgGroupKingdomAssessments->ItemsPerPage = 20;
		
		$this->dtgGroupKingdomAssessments->CssClass = 'table table-striped table-hover';

        $objStyle = $this->dtgGroupKingdomAssessments->HeaderRowStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7'; 
        
        $objStyle = $this->dtgGroupKingdomAssessments->HeaderLinkStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7'; 
        /*************************************************************************/	
        
        $this->dtgPostVentureAssessments = new GroupAssessmentListDataGrid($this);
        $this->dtgPostVentureAssessments->Paginator = new QPaginator($this->dtgPostVentureAssessments);
        $this->dtgPostVentureAssessments->AddColumn(new QDataGridColumn('Key Code', '<?= $_ITEM->KeyCode ?>', 'HtmlEntities=false', 'Width=200px' ));
        $this->dtgPostVentureAssessments->AddColumn(new QDataGridColumn('Description', '<?= $_ITEM->Description ?>', 'HtmlEntities=false', 'Width=300px' ));
        $this->dtgPostVentureAssessments->AddColumn(new QDataGridColumn('Total Keys', '<?= $_ITEM->TotalKeys ?>', 'HtmlEntities=false', 'Width=50px' ));
        $this->dtgPostVentureAssessments->AddColumn(new QDataGridColumn('Keys Left', '<?= $_ITEM->KeysLeft ?>', 'HtmlEntities=false', 'Width=50px' ));   
        $this->dtgPostVentureAssessments->MetaAddEditLinkColumn('<?=__SUBDIRECTORY__ .InstituteForm::DirAssessments. "postventure/groupAggregationResult.php/". $_ITEM->Id ?>','Result','Results');
			
        $this->dtgPostVentureAssessments->CellPadding = 5;
		$this->dtgPostVentureAssessments->SetDataBinder('dtgPostVentureAssessments_Bind',$this);
		$this->dtgPostVentureAssessments->NoDataHtml = 'No Post Venture Assessments have been assigned.';
		$this->dtgPostVentureAssessments->UseAjax = true;
		
		$this->dtgPostVentureAssessments->SortColumnIndex = 1;
		$this->dtgPostVentureAssessments->ItemsPerPage = 20;
		
		$this->dtgPostVentureAssessments->CssClass = 'table table-striped table-hover';
		
        $objStyle = $this->dtgPostVentureAssessments->HeaderRowStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7'; 
        
        $objStyle = $this->dtgPostVentureAssessments->HeaderLinkStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7'; 
         /*************************************************************************/	
        
        $this->dtgGroupLRAAssessments = new GroupAssessmentListDataGrid($this);
        $this->dtgGroupLRAAssessments->Paginator = new QPaginator($this->dtgGroupLRAAssessments);
        $this->dtgGroupLRAAssessments->AddColumn(new QDataGridColumn('Key Code', '<?= $_ITEM->KeyCode ?>', 'HtmlEntities=false', 'Width=200px' ));
        $this->dtgGroupLRAAssessments->AddColumn(new QDataGridColumn('Description', '<?= $_ITEM->Description ?>', 'HtmlEntities=false', 'Width=300px' ));
        $this->dtgGroupLRAAssessments->AddColumn(new QDataGridColumn('Total Keys', '<?= $_ITEM->TotalKeys ?>', 'HtmlEntities=false', 'Width=50px' ));
        $this->dtgGroupLRAAssessments->AddColumn(new QDataGridColumn('Keys Left', '<?= $_ITEM->KeysLeft ?>', 'HtmlEntities=false', 'Width=50px' ));   
        $this->dtgGroupLRAAssessments->MetaAddEditLinkColumn('<?=__SUBDIRECTORY__ .InstituteForm::DirAssessments. "lra/groupAggregationResult.php/". $_ITEM->Id ?>','Result','Results');
			
        $this->dtgGroupLRAAssessments->CellPadding = 5;
		$this->dtgGroupLRAAssessments->SetDataBinder('dtgGroupLRAAssessments_Bind',$this);
		$this->dtgGroupLRAAssessments->NoDataHtml = 'No Leadership Readiness Assessments have been assigned.';
		$this->dtgGroupLRAAssessments->UseAjax = true;
		
		$this->dtgGroupLRAAssessments->SortColumnIndex = 1;
		$this->dtgGroupLRAAssessments->ItemsPerPage = 20;
		
		$this->dtgGroupLRAAssessments->CssClass = 'table table-striped table-hover';
        $objStyle = $this->dtgGroupLRAAssessments->HeaderRowStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7'; 
        
        $objStyle = $this->dtgGroupLRAAssessments->HeaderLinkStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7'; 
        /****************************************************************************************************/
        $this->dtgPartneringReadinessAssessments = new GroupAssessmentListDataGrid($this);
        $this->dtgPartneringReadinessAssessments->Paginator = new QPaginator($this->dtgPartneringReadinessAssessments);
        $this->dtgPartneringReadinessAssessments->AddColumn(new QDataGridColumn('Key Code', '<?= $_ITEM->KeyCode ?>', 'HtmlEntities=false', 'Width=200px' ));
        $this->dtgPartneringReadinessAssessments->AddColumn(new QDataGridColumn('Description', '<?= $_ITEM->Description ?>', 'HtmlEntities=false', 'Width=300px' ));
        $this->dtgPartneringReadinessAssessments->AddColumn(new QDataGridColumn('Total Keys', '<?= $_ITEM->TotalKeys ?>', 'HtmlEntities=false', 'Width=50px' ));
        $this->dtgPartneringReadinessAssessments->AddColumn(new QDataGridColumn('Keys Left', '<?= $_ITEM->KeysLeft ?>', 'HtmlEntities=false', 'Width=50px' ));   
        $this->dtgPartneringReadinessAssessments->MetaAddEditLinkColumn('<?=__SUBDIRECTORY__ .InstituteForm::DirAssessments. "partnerready/groupAggregationResult.php/". $_ITEM->Id ?>','Result','Results');
			
        $this->dtgPartneringReadinessAssessments->CellPadding = 5;
		$this->dtgPartneringReadinessAssessments->SetDataBinder('dtgPartneringReadinessAssessments_Bind',$this);
		$this->dtgPartneringReadinessAssessments->NoDataHtml = 'No Partner Readiness Assessments have been assigned.';
		$this->dtgPartneringReadinessAssessments->UseAjax = true;
		
		$this->dtgPartneringReadinessAssessments->SortColumnIndex = 1;
		$this->dtgPartneringReadinessAssessments->ItemsPerPage = 20;
		
		$this->dtgPartneringReadinessAssessments->CssClass = 'table table-striped table-hover';

        $objStyle = $this->dtgPartneringReadinessAssessments->HeaderRowStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7'; 
        
        $objStyle = $this->dtgPartneringReadinessAssessments->HeaderLinkStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7'; 
        /****************************************************************************************************/
        $this->dtgPartneringAwarenessAssessments = new GroupAssessmentListDataGrid($this);
        $this->dtgPartneringAwarenessAssessments->Paginator = new QPaginator($this->dtgPartneringAwarenessAssessments);
        $this->dtgPartneringAwarenessAssessments->AddColumn(new QDataGridColumn('Key Code', '<?= $_ITEM->KeyCode ?>', 'HtmlEntities=false', 'Width=200px' ));
        $this->dtgPartneringAwarenessAssessments->AddColumn(new QDataGridColumn('Description', '<?= $_ITEM->Description ?>', 'HtmlEntities=false', 'Width=300px' ));
        $this->dtgPartneringAwarenessAssessments->AddColumn(new QDataGridColumn('Total Keys', '<?= $_ITEM->TotalKeys ?>', 'HtmlEntities=false', 'Width=50px' ));
        $this->dtgPartneringAwarenessAssessments->AddColumn(new QDataGridColumn('Keys Left', '<?= $_ITEM->KeysLeft ?>', 'HtmlEntities=false', 'Width=50px' ));   
        $this->dtgPartneringAwarenessAssessments->MetaAddEditLinkColumn('<?=__SUBDIRECTORY__ .InstituteForm::DirAssessments. "partneraware/groupAggregationResult.php/". $_ITEM->Id ?>','Result','Results');
			
        $this->dtgPartneringAwarenessAssessments->CellPadding = 5;
		$this->dtgPartneringAwarenessAssessments->SetDataBinder('dtgPartneringAwarenessAssessments_Bind',$this);
		$this->dtgPartneringAwarenessAssessments->NoDataHtml = 'No Partner Awareness Assessments have been assigned.';
		$this->dtgPartneringAwarenessAssessments->UseAjax = true;
		
		$this->dtgPartneringAwarenessAssessments->SortColumnIndex = 1;
		$this->dtgPartneringAwarenessAssessments->ItemsPerPage = 20;
		
		$this->dtgPartneringAwarenessAssessments->CssClass = 'table table-striped table-hover';

        $objStyle = $this->dtgPartneringAwarenessAssessments->HeaderRowStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7'; 
        
        $objStyle = $this->dtgPartneringAwarenessAssessments->HeaderLinkStyle;
        $objStyle->ForeColor = '#ffffff';
        $objStyle->BackColor = '#337ab7'; 
	}

	public function dtg50GroupLemonAssessments_Refresh($strFormId, $strControlId, $strParameter) {
			$this->dtg50GroupLemonAssessments->PageNumber = 1;
			$this->dtg50GroupLemonAssessments->Refresh();
	}
	
	public function dtg50GroupLemonAssessments_Bind() {
		$objConditions = QQ::All();
		$objConditions = QQ::AndCondition($objConditions,QQ::Equal( QQN::GroupAssessmentList()->Resource->Name, 'LEMON Assessment (50 Questions)')); 
		if ($strName = trim($this->str50Keycode->Text)) {
			$objConditions = QQ::AndCondition($objConditions,
				QQ::Like( QQN::GroupAssessmentList()->KeyCode, $strName . '%')
			);
		}
		$objClauses = array(QQ::Distinct());
			if ($objClause = $this->dtg50GroupLemonAssessments->LimitClause) $objClauses[] = $objClause;
			if ($objClause = $this->dtg50GroupLemonAssessments->OrderByClause) $objClauses[] = $objClause;
		
		$filteredGroupArray = array();
		$groupArray = GroupAssessmentList::QueryArray($objConditions,$objClauses);
		$this->dtg50GroupLemonAssessments->TotalItemCount =  GroupAssessmentList::CountAll();	
		
		if (QApplication::$Login->Role->Name == 'Administrator') {
			$this->dtg50GroupLemonAssessments->DataSource = $groupArray;
		} else {
			$groupArray = GroupAssessmentList::QueryArray($objConditions);
			$objUserArray = QApplication::$Login->GetUserArray();
			foreach ($groupArray as $objGroupAssessment) {
				if($objGroupAssessment->IsUserAsAssessmentManagerAssociated($objUserArray[0])){
					$filteredGroupArray[] = $objGroupAssessment;
				}					
			}
			$this->dtg50GroupLemonAssessments->DataSource = $filteredGroupArray; 
		}
	}
	
	public function chk50Selected_Render(GroupAssessmentList $objGroup, $intRow) {
     	$strControlId = 'chk50Selected' . $objGroup->Id;

        // Let's see if the Checkbox exists already
        $chkSelected = $this->GetControl($strControlId);     
        if (!$chkSelected) {
            $chkSelected = new QCheckBox($this->dtg50GroupLemonAssessments, $strControlId);
            $chkSelected->Text = 'Select';
            $chkSelected->ActionParameter = $objGroup->Id;
            $chkSelected->CssClass = 'form-control';
            $chkSelected->AddAction(new QClickEvent(), new QAjaxAction('chk50Selected_Click'));
        }
        return $chkSelected->Render(false);
            
    }
        
    public function chk50Selected_Click($strFormId, $strControlId, $strParameter) {
		$intGroupId = $strParameter;
		if ($this->GetControl($strControlId)->Checked) {
			if (!in_array ($intGroupId, $this->selected50LemonGroups))
				$this->selected50LemonGroups[] = $intGroupId;
		} else {
			$key = array_search($intGroupId, $this->selected50LemonGroups);
			unset($this->selected50LemonGroups[$key]);
		}
    }
	/*******************************************************************/
	public function dtgGroupLemonAssessments_Refresh($strFormId, $strControlId, $strParameter) {
			$this->dtgGroupLemonAssessments->PageNumber = 1;
			$this->dtgGroupLemonAssessments->Refresh();
	}
	public function dtgGroupLemonAssessments_Bind() {
		$objConditions = QQ::All();
		$objConditions = QQ::AndCondition($objConditions,QQ::Equal( QQN::GroupAssessmentList()->Resource->Name, 'LEMON Assessment')); 
		if ($strName = trim($this->strKeycode->Text)) {
			$objConditions = QQ::AndCondition($objConditions,
				QQ::Like( QQN::GroupAssessmentList()->KeyCode, $strName . '%')
			);
		}
		$objClauses = array(QQ::Distinct());
			if ($objClause = $this->dtgGroupLemonAssessments->LimitClause) $objClauses[] = $objClause;
			if ($objClause = $this->dtgGroupLemonAssessments->OrderByClause) $objClauses[] = $objClause;
		
		$filteredGroupArray = array();
		$groupArray = GroupAssessmentList::QueryArray($objConditions,$objClauses);
		$this->dtgGroupLemonAssessments->TotalItemCount =  GroupAssessmentList::CountAll();	
		
		if (QApplication::$Login->Role->Name == 'Administrator') {
			$this->dtgGroupLemonAssessments->DataSource = $groupArray;
		} else {
			$groupArray = GroupAssessmentList::QueryArray($objConditions);
			$objUserArray = QApplication::$Login->GetUserArray();
			foreach ($groupArray as $objGroupAssessment) {
				if($objGroupAssessment->IsUserAsAssessmentManagerAssociated($objUserArray[0])){
					$filteredGroupArray[] = $objGroupAssessment;
				}					
			}
			$this->dtgGroupLemonAssessments->DataSource = $filteredGroupArray; 
		}
	}
	public function chkSelected_Render(GroupAssessmentList $objGroup, $intRow) {
     	$strControlId = 'chkSelected' . $objGroup->Id;

        // Let's see if the Checkbox exists already
        $chkSelected = $this->GetControl($strControlId);     
        if (!$chkSelected) {
            $chkSelected = new QCheckBox($this->dtgGroupLemonAssessments, $strControlId);
            $chkSelected->Text = 'Select';
            $chkSelected->ActionParameter = $objGroup->Id;
            $chkSelected->CssClass = 'form-control';
            $chkSelected->AddAction(new QClickEvent(), new QAjaxAction('chkSelected_Click'));
        }
        return $chkSelected->Render(false);
            
    }
        
    public function chkSelected_Click($strFormId, $strControlId, $strParameter) {
		$intGroupId = $strParameter;
		if ($this->GetControl($strControlId)->Checked) {
			if (!in_array ($intGroupId, $this->selectedLemonGroups))
				$this->selectedLemonGroups[] = $intGroupId;
		} else {
			$key = array_search($intGroupId, $this->selectedLemonGroups);
			unset($this->selectedLemonGroups[$key]);
		}
    }
    public function dtgGroupTenFAssessments_Bind() {
    	$objConditions = QQ::All();
		$objConditions = QQ::AndCondition($objConditions,QQ::Equal( QQN::GroupAssessmentList()->Resource->Name,'10-F Assessment')); 
		$objClauses = array();
		$filteredGroupArray = array();
		$groupArray = GroupAssessmentList::QueryArray($objConditions,$objClauses);	
		if (QApplication::$Login->Role->Name == 'Administrator') {
			$this->dtgGroupTenFAssessments->DataSource = $groupArray;
		} else {
			$objUserArray = QApplication::$Login->GetUserArray();
			foreach ($groupArray as $objGroupAssessment) {
				if($objGroupAssessment->IsUserAsAssessmentManagerAssociated($objUserArray[0])){
					$filteredGroupArray[] = $objGroupAssessment;
				}					
			}	
			$this->dtgGroupTenFAssessments->DataSource = $filteredGroupArray; 
		}
    }
	public function dtgGroupTenPAssessments_Bind() {
		$objConditions = QQ::All();
		$objConditions = QQ::AndCondition($objConditions,QQ::Equal( QQN::GroupAssessmentList()->Resource->Name,'10-P Assessment')); 
		$objClauses = array();
		$filteredGroupArray = array();
		$groupArray = GroupAssessmentList::QueryArray($objConditions,$objClauses);	
		if (QApplication::$Login->Role->Name == 'Administrator') {
			$this->dtgGroupTenPAssessments->DataSource = $groupArray;
		} else {
			$objUserArray = QApplication::$Login->GetUserArray();
			foreach ($groupArray as $objGroupAssessment) {
				if($objGroupAssessment->IsUserAsAssessmentManagerAssociated($objUserArray[0])){
					$filteredGroupArray[] = $objGroupAssessment;
				}					
			}	
			$this->dtgGroupTenPAssessments->DataSource = $filteredGroupArray; 
		}
	}
	
	public function dtgPartneringReadinessAssessments_Bind() {
		$objConditions = QQ::All();
		$objConditions = QQ::AndCondition($objConditions,QQ::Equal( QQN::GroupAssessmentList()->Resource->Name,'Partnering Readiness Assessment')); 
		$objClauses = array();
		$filteredGroupArray = array();
		$groupArray = GroupAssessmentList::QueryArray($objConditions,$objClauses);	
		if (QApplication::$Login->Role->Name == 'Administrator') {
			$this->dtgPartneringReadinessAssessments->DataSource = $groupArray;
		} else {
			$objUserArray = QApplication::$Login->GetUserArray();
			foreach ($groupArray as $objGroupAssessment) {
				if($objGroupAssessment->IsUserAsAssessmentManagerAssociated($objUserArray[0])){
					$filteredGroupArray[] = $objGroupAssessment;
				}					
			}	
			$this->dtgPartneringReadinessAssessments->DataSource = $filteredGroupArray; 
		}
	}
	
	public function dtgPartneringAwarenessAssessments_Bind() {
		$objConditions = QQ::All();
		$objConditions = QQ::AndCondition($objConditions,QQ::Equal( QQN::GroupAssessmentList()->Resource->Name,'Partnering Awareness Assessment')); 
		$objClauses = array();
		$filteredGroupArray = array();
		$groupArray = GroupAssessmentList::QueryArray($objConditions,$objClauses);	
		if (QApplication::$Login->Role->Name == 'Administrator') {
			$this->dtgPartneringAwarenessAssessments->DataSource = $groupArray;
		} else {
			$objUserArray = QApplication::$Login->GetUserArray();
			foreach ($groupArray as $objGroupAssessment) {
				if($objGroupAssessment->IsUserAsAssessmentManagerAssociated($objUserArray[0])){
					$filteredGroupArray[] = $objGroupAssessment;
				}					
			}	
			$this->dtgPartneringAwarenessAssessments->DataSource = $filteredGroupArray; 
		}
	}
	
	public function dtgGroupIntegrationAssessments_Bind() {
    	$objConditions = QQ::All();
		$objConditions = QQ::AndCondition($objConditions,QQ::Equal( QQN::GroupAssessmentList()->Resource->Name,'Integration Assessment')); 
		$objClauses = array();
		$filteredGroupArray = array();
		$groupArray = GroupAssessmentList::QueryArray($objConditions,$objClauses);	
		if (QApplication::$Login->Role->Name == 'Administrator') {
			$this->dtgGroupIntegrationAssessments->DataSource = $groupArray;
		} else {
			$objUserArray = QApplication::$Login->GetUserArray();
			foreach ($groupArray as $objGroupAssessment) {
				if($objGroupAssessment->IsUserAsAssessmentManagerAssociated($objUserArray[0])){
					$filteredGroupArray[] = $objGroupAssessment;
				}					
			}	
			$this->dtgGroupIntegrationAssessments->DataSource = $filteredGroupArray; 
		}
    }
    
    public function dtgGroupLRAAssessments_Bind() {
		$objConditions = QQ::All();
		$objConditions = QQ::AndCondition($objConditions,QQ::Equal( QQN::GroupAssessmentList()->Resource->Name,'Leadership Readiness Assessment')); 
		$objClauses = array();
		$filteredGroupArray = array();
		$groupArray = GroupAssessmentList::QueryArray($objConditions,$objClauses);	
		if (QApplication::$Login->Role->Name == 'Administrator') {
			$this->dtgGroupLRAAssessments->DataSource = $groupArray;
		} else {
			$objUserArray = QApplication::$Login->GetUserArray();
			foreach ($groupArray as $objGroupAssessment) {
				if($objGroupAssessment->IsUserAsAssessmentManagerAssociated($objUserArray[0])){
					$filteredGroupArray[] = $objGroupAssessment;
				}					
			}	
			$this->dtgGroupLRAAssessments->DataSource = $filteredGroupArray; 
		}
	}
	
	public function dtgGroupKingdomAssessments_Bind() {
		$objConditions = QQ::All();
		$objConditions = QQ::AndCondition($objConditions,QQ::Equal( QQN::GroupAssessmentList()->Resource->Name,'Kingdom Business Assessment')); 
		$objClauses = array();
		$filteredGroupArray = array();
		$groupArray = GroupAssessmentList::QueryArray($objConditions,$objClauses);	
		if (QApplication::$Login->Role->Name == 'Administrator') {
			$this->dtgGroupKingdomAssessments->DataSource = $groupArray;
		} else {
			$objUserArray = QApplication::$Login->GetUserArray();
			foreach ($groupArray as $objGroupAssessment) {
				if($objGroupAssessment->IsUserAsAssessmentManagerAssociated($objUserArray[0])){
					$filteredGroupArray[] = $objGroupAssessment;
				}					
			}	
			$this->dtgGroupKingdomAssessments->DataSource = $filteredGroupArray; 
		}
	}
		
	public function dtgPostVentureAssessments_Bind() {
		$objConditions = QQ::All();
		$objConditions = QQ::AndCondition($objConditions,QQ::Equal( QQN::GroupAssessmentList()->Resource->Name,'Post Venture Assessment')); 
		$objClauses = array();
		$filteredGroupArray = array();
		$groupArray = GroupAssessmentList::QueryArray($objConditions,$objClauses);	
		if (QApplication::$Login->Role->Name == 'Administrator') {
			$this->dtgPostVentureAssessments->DataSource = $groupArray;
		} else {
			$objUserArray = QApplication::$Login->GetUserArray();
			foreach ($groupArray as $objGroupAssessment) {
				if($objGroupAssessment->IsUserAsAssessmentManagerAssociated($objUserArray[0])){
					$filteredGroupArray[] = $objGroupAssessment;
				}					
			}	
			$this->dtgPostVentureAssessments->DataSource = $filteredGroupArray; 
		}
	}
	
	public function RenderKeysLeft( GroupAssessmentList $objGroup) {
		$count = Lemon50Assessment::CountByGroupId($objGroup->Id);		
		$TotalKeys = $objGroup->TotalKeys;
		return ($TotalKeys - $count);
	}
	public function RenderAssessmentType($objGroupAssessment) {
		$intResourceId = $objGroupAssessment->ResourceId;
			foreach(Resource::LoadAll() as $objResource) {
				if($objResource->Name != 'Scorecard') {
					if($intResourceId == $objResource->Id)
						$strReturn = $objResource->Name;
				}
			}				
		return $strReturn;
	}
	
	public function btnViewGlobalLemonResults_Click() {
		QApplication::Redirect(__SUBDIRECTORY__.'/assessments/lemon/global.php');
	}
	
	public function btnAggregateGroups_Click() {
		$strArgs = implode('&',$this->selectedLemonGroups);
		QApplication::Redirect(__SUBDIRECTORY__.InstituteForm::DirAssessments. "lemon/groupAggregationResult.php/".$strArgs);
	}
}

GroupAggregationForm::Run('GroupAggregationForm');
?>