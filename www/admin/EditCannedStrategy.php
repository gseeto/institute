<?php
require(dirname(__FILE__) . '/../../includes/prepend.inc.php');

class EditCannedStrategy extends InstituteForm {
        public $pnlTitle;
        public $intStrategyId;
        public $objStrategy;
        public $strStrategy;
        public $lstCategory;
        public $dtgActions;
        public $actionArray;
        public $btnActionAdd;
        
        public $dtgKpis;
        public $kpiArray;
        public $btnKpiAdd;

        public $btnSubmit;
   
	protected function Form_Run() {
    	if (!QApplication::$Login) QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
		if(QApplication::$Login->Role->Name != 'Administrator') {			
			QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
		}
    	QApplication::ExecuteJavaScript("document.getElementById('administration').className = 'dropdown active';");
    	QApplication::ExecuteJavaScript("document.getElementById('admin-scorecards').className = 'active';");    	
    }
	
	protected function Form_Create() {
        $this->intStrategyId = QApplication::PathInfo(0);
        $this->objStrategy = CannedStrategy::Load($this->intStrategyId);
                      
		$this->strStrategy = new QTextBox($this);
		$this->strStrategy->Name = 'Strategy';
		$this->strStrategy->CssClass = 'form-control';
		$this->strStrategy->TextMode = QTextMode::MultiLine;
		$this->strStrategy->Height = 80;
		$this->strStrategy->Width = 600;
		$this->strStrategy->Text = $this->objStrategy->Strategy;
		$this->strStrategy->AddAction(new QKeyPressEvent(500), new QAjaxAction('strStrategy_KeyPress'));
		$this->strStrategy->Focus();

		$this->lstCategory = new QListBox($this);
		$this->lstCategory->Name = 'Category';
		$this->lstCategory->CssClass = 'form-control';
		$this->lstCategory->AddItem('None');
		foreach( CategoryType::$NameArray as $key=>$value) {
			if ($this->objStrategy->CategoryTypeId == $key) {
				$this->lstCategory->AddItem($value,$key,true);
			} else {
				$this->lstCategory->AddItem($value,$key);
			}				
		}
		$this->lstCategory->AddAction(new QChangeEvent(), new QAjaxAction('lstCategory_Change'));
		$this->actionArray = array();
		$this->dtgActions = new QDataGrid($this);
		$this->dtgActions->AddColumn(new QDataGridColumn('Index', '<?= ($_CONTROL->CurrentRowIndex + 1) ?>', 'Width=100px'));
		$this->dtgActions->AddColumn(new QDataGridColumn('Action', '<?= $_FORM->RenderActions($_ITEM,$_CONTROL->CurrentRowIndex) ?>', 'HtmlEntities=false' ));
		$this->dtgActions->SetDataBinder('dtgActions_Bind',$this);
		$this->dtgActions->CellPadding = 5;
		$this->dtgActions->NoDataHtml = 'No Actions';
		$this->dtgActions->GridLines = 'both';
		$this->dtgActions->CssClass = 'table table-striped table-hover table-bordered';
		
		$this->btnActionAdd= new QButton($this);
		$this->btnActionAdd->Text = "Add an Action";
		$this->btnActionAdd->CssClass = 'btn btn-default';
		$this->btnActionAdd->AddAction(new QClickEvent(), new QAjaxAction('btnActionAdd_Click'));
		
		/**************/
		$this->kpiArray = array();
		$this->dtgKpis = new QDataGrid($this);
		$this->dtgKpis->AddColumn(new QDataGridColumn('Index', '<?= ($_CONTROL->CurrentRowIndex + 1) ?>', 'Width=100px'));
		$this->dtgKpis->AddColumn(new QDataGridColumn('KPI', '<?= $_FORM->RenderKpis($_ITEM,$_CONTROL->CurrentRowIndex) ?>', 'HtmlEntities=false'));
		$this->dtgKpis->SetDataBinder('dtgKpis_Bind',$this);
		$this->dtgKpis->CellPadding = 5;
		$this->dtgKpis->NoDataHtml = 'No KPIs';
		$this->dtgKpis->GridLines = 'both';
		$this->dtgKpis->CssClass = 'table table-striped table-hover table-bordered';
		
		$this->btnKpiAdd= new QButton($this);
		$this->btnKpiAdd->Text = "Add a KPI";
		$this->btnKpiAdd->CssClass = 'btn btn-default';
		$this->btnKpiAdd->AddAction(new QClickEvent(), new QAjaxAction('btnKpiAdd_Click'));
		
		$this->btnSubmit = new QButton($this);
		$this->btnSubmit->Text = "Return";
		$this->btnSubmit->CssClass = 'btn btn-default';
		$this->btnSubmit->AddAction(new QClickEvent(), new QAjaxAction('btnSubmit_Click'));
    }       

        public function dtgActions_Bind() {
        	$this->actionArray = CannedActionItem::LoadArrayByStrategyId($this->intStrategyId);
        	$this->dtgActions->DataSource = $this->actionArray;
        }
	    public function dtgKpis_Bind() {
	    	$this->kpiArray = CannedKpi::LoadArrayByStrategyId($this->intStrategyId);
	    	$this->dtgKpis->DataSource = $this->kpiArray;
	    }
	    
        public function btnSubmit_Click($strFormId, $strControlId, $strParameter) {
        	$this->objStrategy->Strategy = $this->strStrategy->Text;
        	$this->objStrategy->CategoryTypeId = $this->lstCategory->SelectedValue;
        	$this->objStrategy->Save();
        	QApplication::Redirect(__SUBDIRECTORY__.'/administration/scorecards/');
		}
		 
        public function btnActionAdd_Click($strFormId, $strControlId, $strParameter) {
        	$objAction = new CannedActionItem();
        	$objAction->StrategyId = $this->intStrategyId;
        	$objAction->Action = 'new action ';
        	$objAction->Save();
        	$this->actionArray = CannedActionItem::LoadArrayByStrategyId($this->intStrategyId);
			$this->dtgActions->Refresh();
		}
		
		public function btnKpiAdd_Click($strFormId, $strControlId, $strParameter) {
			$objKpi = new CannedKpi();
			$objKpi->StrategyId = $this->intStrategyId;
			$objKpi->Kpi = 'new KPI ';
			$objKpi->Save();
			$this->kpiArray = CannedKpi::LoadArrayByStrategyId($this->intStrategyId);
			$this->dtgKpis->Refresh();
		}
		
		public function RenderActions($objAction,$intIndex) {
			$strControlId = 'text'.$intIndex;
			$strControlLabelId = 'label'.$intIndex;
			$txtAction = $this->GetControl($strControlId);
			if(!$txtAction) {
				$txtAction = new QTextBox($this->dtgActions,$strControlId);
				$txtAction->AddAction(new QMouseOutEvent(),  new QAjaxAction('txtActionMouseOut'));
				$txtAction->Visible = false;
				$txtAction->ActionParameter = $strControlLabelId;
				$txtAction->Text = $objAction->Action;
				$txtAction->TextMode = QTextMode::MultiLine;
				//$txtAction->Width = 500;
				//$txtAction->Height = 30;
				$txtAction->CssClass = 'form-control';
			}
			$txtAction->Text = $objAction->Action;
			$lblAction = $this->GetControl($strControlLabelId);
			if(!$lblAction) {
				$lblAction = new QLabel($this->dtgActions,$strControlLabelId);
				$lblAction->ActionParameter = $strControlId;
				$lblAction->AddAction(new QMouseOverEvent(), new QAjaxAction('lblActionMouseOver'));
				$lblAction->Text = $objAction->Action;
				$lblAction->Width = 500;
			}
			return ($txtAction->Render(false) . $lblAction->Render(false));
		}
		
		public function strStrategy_KeyPress($strFormId, $strControlId, $strParameter) {
			$this->objStrategy->Strategy = $this->strStrategy->Text;
			$this->objStrategy->Save();
		}
		public function lstCategory_Change($strFormId, $strControlId, $strParameter) {
			$this->objStrategy->CategoryTypeId = $this->lstCategory->SelectedValue;
			$this->objStrategy->Save();
		}
		public function lblActionMouseOver($strFormId, $strControlId, $strParameter) {
			$txtAction = $this->GetControl($strParameter);
			$txtAction->Visible = true;
			$lblAction = $this->GetControl($strControlId);
			$lblAction->Visible = false;
		}
		public function txtActionMouseOut($strFormId, $strControlId, $strParameter) {
			$txtAction = $this->GetControl($strControlId);
			$txtAction->Visible = false;
			$lblAction = $this->GetControl($strParameter);
			$lblAction->Text = ($txtAction=='')? '  ':$txtAction->Text;
			$lblAction->Visible = true;
			$intIndex = intval(substr($strControlId,strlen('text')));
			$this->actionArray[$intIndex]->Action = $txtAction->Text;
			$this->actionArray[$intIndex]->Save();
		}

		public function RenderKpis($objKpi,$intIndex) {
			$strControlId = 'textKpi'.$intIndex;
			$strControlLabelId = 'labelKpi'.$intIndex;
			$txtKpi = $this->GetControl($strControlId);
			if(!$txtKpi) {
				$txtKpi = new QTextBox($this->dtgKpis,$strControlId);
				$txtKpi->AddAction(new QMouseOutEvent(),  new QAjaxAction('txtKpiMouseOut'));
				$txtKpi->Visible = false;
				$txtKpi->ActionParameter = $strControlLabelId;
				$txtKpi->Text = $objKpi->Kpi;
				$txtKpi->TextMode = QTextMode::MultiLine;
				//$txtKpi->Width = 500;
				//$txtKpi->Height = 30;
				$txtKpi->CssClass = 'form-control';
			}
			$txtKpi->Text = $objKpi->Kpi;
			$lblKpi = $this->GetControl($strControlLabelId);
			if(!$lblKpi) {
				$lblKpi = new QLabel($this->dtgKpis,$strControlLabelId);
				$lblKpi->ActionParameter = $strControlId;
				$lblKpi->AddAction(new QMouseOverEvent(), new QAjaxAction('lblKpiMouseOver'));
				$lblKpi->Text = $objKpi->Kpi;
				$lblKpi->Width = 500;
			}
			return ($txtKpi->Render(false) . $lblKpi->Render(false));
		}
		
		public function lblKpiMouseOver($strFormId, $strControlId, $strParameter) {
			$txtAction = $this->GetControl($strParameter);
			$txtAction->Visible = true;
			$lblAction = $this->GetControl($strControlId);
			$lblAction->Visible = false;
		}
		public function txtKpiMouseOut($strFormId, $strControlId, $strParameter) {
			$txtKpi = $this->GetControl($strControlId);
			$txtKpi->Visible = false;
			$lblKpi = $this->GetControl($strParameter);
			$lblKpi->Text = ($txtKpi=='')? '  ':$txtKpi->Text;
			$lblKpi->Visible = true;
			$intIndex = intval(substr($strControlId,strlen('textKpi')));
			$this->kpiArray[$intIndex]->Kpi = $txtKpi->Text;
			$this->kpiArray[$intIndex]->Save();
		}
		
    }
    
EditCannedStrategy::Run('EditCannedStrategy');
?>