<?php
    class AddCannedStrategy extends QPanel {
        // Child Controls must be Publically Accessible so that they can be rendered in the template
        // Typically, you would want to do this by having public __getters for each control
        // But for simplicity of this demo, we'll simply make the child controls public, themselves.
        public $pnlTitle;
        public $strStrategy;
        public $lstCategory;
        public $dtgActions;
        public $actionArray;
        public $btnActionAdd;
        
        public $dtgKpis;
        public $kpiArray;
        public $btnKpiAdd;

        public $btnSubmit;
        public $btnCancel;
        protected $strMethodCallBack;
        protected $objParent;
    
        // Specify the Template File for this custom QPanel
        protected $strTemplate = 'panels/AddCannedStrategy.tpl.php';

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
                      	
			$this->strStrategy = new QTextBox($this);
			$this->strStrategy->Name = 'Strategy';
			$this->strStrategy->Width = 400;
			$this->strStrategy->Focus();

			$this->lstCategory = new QListBox($this);
			$this->lstCategory->Name = 'Category';
			$this->lstCategory->AddItem('None');
			foreach( CategoryType::$NameArray as $key=>$value) {
				$this->lstCategory->AddItem($value,$key);				
			}
			$this->actionArray = array();
			$this->dtgActions = new QDataGrid($this);
			$this->dtgActions->AddColumn(new QDataGridColumn('Index', '<?= ($_CONTROL->CurrentRowIndex + 1) ?>'));
			$this->dtgActions->AddColumn(new QDataGridColumn('Action', '<?= $_CONTROL->ParentControl->RenderActions($_ITEM,$_CONTROL->CurrentRowIndex) ?>', 'HtmlEntities=false', 'Width=400px' ));
			$this->dtgActions->SetDataBinder('dtgActions_Bind',$this);
			$this->dtgActions->CellPadding = 5;
			$this->dtgActions->NoDataHtml = 'No Actions';
			$this->dtgActions->GridLines = 'both';
			
			$this->btnActionAdd= new QButton($this);
			$this->btnActionAdd->Text = "Add an Action";
			$this->btnActionAdd->CssClass = 'primary';
			$this->btnActionAdd->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnActionAdd_Click'));
			
			/**************/
			$this->kpiArray = array();
			$this->dtgKpis = new QDataGrid($this);
			$this->dtgKpis->AddColumn(new QDataGridColumn('Index', '<?= ($_CONTROL->CurrentRowIndex + 1) ?>'));
			$this->dtgKpis->AddColumn(new QDataGridColumn('KPI', '<?= $_CONTROL->ParentControl->RenderKpis($_ITEM,$_CONTROL->CurrentRowIndex) ?>', 'HtmlEntities=false', 'Width=400px' ));
			$this->dtgKpis->SetDataBinder('dtgKpis_Bind',$this);
			$this->dtgKpis->CellPadding = 5;
			$this->dtgKpis->NoDataHtml = 'No KPIs';
			$this->dtgKpis->GridLines = 'both';
			
			$this->btnKpiAdd= new QButton($this);
			$this->btnKpiAdd->Text = "Add a KPI";
			$this->btnKpiAdd->CssClass = 'primary';
			$this->btnKpiAdd->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnKpiAdd_Click'));
			
			$this->btnSubmit = new QButton($this);
			$this->btnSubmit->Text = "Submit";
			$this->btnSubmit->CssClass = 'primary';
			$this->btnSubmit->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnSubmit_Click'));
			
			$this->btnCancel = new QButton($this);
			$this->btnCancel->Text = "Cancel";
			$this->btnCancel->CssClass = 'primary';
			$this->btnCancel->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnCancel_Click'));
			
        }       

        public function dtgActions_Bind() {
        	$this->dtgActions->DataSource = $this->actionArray;
        }
	    public function dtgKpis_Bind() {
	    	$this->dtgKpis->DataSource = $this->kpiArray;
	    }
	    
        public function btnSubmit_Click($strFormId, $strControlId, $strParameter) {
			//Create a Canned Strategy and hide panel
			$objStrategy = new CannedStrategy();
			$objStrategy->Strategy = $this->strStrategy->Text;
			$objStrategy->CategoryTypeId = $this->lstCategory->SelectedValue;
			$intStrategyId = $objStrategy->Save();		
			foreach($this->actionArray as $strAction) {
				$objAction = new CannedActionItem();
				$objAction->Action = $strAction;
				$objAction->StrategyId = $intStrategyId;
				$objAction->Save();
			}
        	foreach($this->kpiArray as $strKpi) {
				$objKpi = new CannedKpi();
				$objKpi->Kpi = $strKpi;
				$objKpi->StrategyId = $intStrategyId;
				$objKpi->Save();
			}	
			$this->Visible = false;
			// And call the Form's Method CallBack, passing in "true" to state that we've made an update
	        $strMethodCallBack = $this->strMethodCallBack;
	        $this->objParent->$strMethodCallBack(true);
		}
		
		public function btnCancel_Click($strFormId, $strControlId, $strParameter) {
			$this->Visible = false;
		}
   
        public function btnActionAdd_Click($strFormId, $strControlId, $strParameter) {
			$this->actionArray[] = 'new action ';
			$this->dtgActions->Refresh();
		}
		
		public function btnKpiAdd_Click($strFormId, $strControlId, $strParameter) {
			$this->kpiArray[] = 'new KPI ';
			$this->dtgKpis->Refresh();
		}
		
		public function RenderActions($strAction,$intIndex) {
			$strControlId = 'text'.$intIndex;
			$strControlLabelId = 'label'.$intIndex;
			$txtAction = $this->objForm->GetControl($strControlId);
			if(!$txtAction) {
				$txtAction = new QTextBox($this->dtgActions,$strControlId);
				$txtAction->AddAction(new QMouseOutEvent(),  new QAjaxControlAction($this,'txtActionMouseOut'));
				$txtAction->Visible = false;
				$txtAction->ActionParameter = $strControlLabelId;
				$txtAction->Text = $strAction;
				$txtAction->TextMode = QTextMode::MultiLine;
				$txtAction->Width = 500;
				$txtAction->Height = 30;
				$txtAction->CssClass = 'scorecard_table';
			}
			$txtAction->Text = $strAction;
			$lblAction = $this->objForm->GetControl($strControlLabelId);
			if(!$lblAction) {
				$lblAction = new QLabel($this->dtgActions,$strControlLabelId);
				$lblAction->ActionParameter = $strControlId;
				$lblAction->AddAction(new QMouseOverEvent(), new QAjaxControlAction($this,'lblActionMouseOver'));
				$lblAction->Text = $strAction;
			}
			return ($txtAction->Render(false) . $lblAction->Render(false));
		}
		
		public function lblActionMouseOver($strFormId, $strControlId, $strParameter) {
			$txtAction = $this->objForm->GetControl($strParameter);
			$txtAction->Visible = true;
			$lblAction = $this->objForm->GetControl($strControlId);
			$lblAction->Visible = false;
		}
		public function txtActionMouseOut($strFormId, $strControlId, $strParameter) {
			$txtAction = $this->objForm->GetControl($strControlId);
			$txtAction->Visible = false;
			$lblAction = $this->objForm->GetControl($strParameter);
			$lblAction->Text = $txtAction->Text;
			$lblAction->Visible = true;
			$intIndex = intval(substr($strControlId,strlen('text')));
			$this->actionArray[$intIndex] = $txtAction->Text;
		}

		public function RenderKpis($strAction,$intIndex) {
			$strControlId = 'textKpi'.$intIndex;
			$strControlLabelId = 'labelKpi'.$intIndex;
			$txtKpi = $this->objForm->GetControl($strControlId);
			if(!$txtKpi) {
				$txtKpi = new QTextBox($this->dtgKpis,$strControlId);
				$txtKpi->AddAction(new QMouseOutEvent(),  new QAjaxControlAction($this,'txtKpiMouseOut'));
				$txtKpi->Visible = false;
				$txtKpi->ActionParameter = $strControlLabelId;
				$txtKpi->Text = $strAction;
				$txtKpi->TextMode = QTextMode::MultiLine;
				$txtKpi->Width = 500;
				$txtKpi->Height = 30;
				$txtKpi->CssClass = 'scorecard_table';
			}
			$txtKpi->Text = $strAction;
			$lblKpi = $this->objForm->GetControl($strControlLabelId);
			if(!$lblKpi) {
				$lblKpi = new QLabel($this->dtgKpis,$strControlLabelId);
				$lblKpi->ActionParameter = $strControlId;
				$lblKpi->AddAction(new QMouseOverEvent(), new QAjaxControlAction($this,'lblKpiMouseOver'));
				$lblKpi->Text = $strAction;
			}
			return ($txtKpi->Render(false) . $lblKpi->Render(false));
		}
		
		public function lblKpiMouseOver($strFormId, $strControlId, $strParameter) {
			$txtAction = $this->objForm->GetControl($strParameter);
			$txtAction->Visible = true;
			$lblAction = $this->objForm->GetControl($strControlId);
			$lblAction->Visible = false;
		}
		public function txtKpiMouseOut($strFormId, $strControlId, $strParameter) {
			$txtKpi = $this->objForm->GetControl($strControlId);
			$txtKpi->Visible = false;
			$lblKpi = $this->objForm->GetControl($strParameter);
			$lblKpi->Text = $txtKpi->Text;
			$lblKpi->Visible = true;
			$intIndex = intval(substr($strControlId,strlen('textKpi')));
			$this->kpiArray[$intIndex] = $txtKpi->Text;
		}
		
    }