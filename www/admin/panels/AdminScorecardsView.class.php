<?php
/** PHPExcel */
require_once __INCLUDES__.'/Classes/PHPExcel.php';
require_once __INCLUDES__.'/Classes/PHPExcel/IOFactory.php';

    class AdminScorecardsView extends QPanel {
        // Child Controls must be Publically Accessible so that they can be rendered in the template
        // Typically, you would want to do this by having public __getters for each control
        // But for simplicity of this demo, we'll simply make the child controls public, themselves.
        public $dtgScorecards;
        public $btnAddScorecard;
        public $pnlAddScorecard;
        public $btnAddUser;
        public $pnlAddUser;
        public $dtgCannedStrategy;
        public $btnAddCannedStrategy;
        public $pnlAddCannedStrategy;
        public $lblDebug;
        
        // Specify the Template File for this custom QPanel
        protected $strTemplate = 'panels/AdminScorecardsView.tpl.php';

 
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
            $this->lblDebug = new QLabel($this);
            $this->lblDebug->DisplayStyle = QDisplayStyle::Block;
            $this->lblDebug->HtmlEntities = false;
            
            $this->dtgScorecards = new ScorecardDataGrid($this);
            $this->dtgScorecards->Paginator = new QPaginator($this->dtgScorecards);
			$this->dtgScorecards->AddColumn(new QDataGridColumn('Scorecard Name', '<?= $_ITEM->Name ?>', 'HtmlEntities=false', 'Width=100px' ));
			$this->dtgScorecards->AddColumn(new QDataGridColumn('Company', '<?= $_CONTROL->ParentControl->RenderCompany($_ITEM->CompanyId) ?>', 'HtmlEntities=false', 'Width=400px' ));
            $this->dtgScorecards->AddColumn(new QDataGridColumn('Users', '<?= $_CONTROL->ParentControl->RenderUsers($_ITEM) ?>', 'HtmlEntities=false', 'Width=200px' ));
			$this->dtgScorecards->AddColumn(new QDataGridColumn('Import Scorecard', '<?= $_CONTROL->ParentControl->RenderImport($_ITEM) ?>', 'HtmlEntities=false', 'Width=100px' ));
            $this->dtgScorecards->MetaAddEditLinkColumn('<?="/inst/admin/panels/ExportScorecard.php/".$_ITEM->Id?>', '<img src=\'/inst/assets/images/download.png\' />Download','Download Scorecard');
        	$this->dtgScorecards->CellPadding = 5;
			$this->dtgScorecards->SetDataBinder('dtgScorecards_Bind',$this);
			$this->dtgScorecards->NoDataHtml = 'No Scorecards.';
			$this->dtgScorecards->UseAjax = true;
			$this->dtgScorecards->GridLines = QGridLines::Both;
			
			$this->dtgScorecards->SortColumnIndex = 1;
			$this->dtgScorecards->ItemsPerPage = 20;
		
			$objStyle = $this->dtgScorecards->RowStyle;
	        $objStyle->BackColor = '#ffffff';
	        $objStyle->FontSize = 12;
	
	        $objStyle = $this->dtgScorecards->AlternateRowStyle;
	        $objStyle->BackColor = '#CCCCCC';
	
	        $objStyle = $this->dtgScorecards->HeaderRowStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#003366'; 
	        
	        $objStyle = $this->dtgScorecards->HeaderLinkStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#003366'; 
	        
	        $this->btnAddScorecard = new QButton($this);
	        $this->btnAddScorecard->Text = 'Add A Scorecard';
	        $this->btnAddScorecard->CssClass = 'primary';
	        $this->btnAddScorecard->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnAddScorecard_Click'));
	        
	        $this->pnlAddScorecard = new QPanel($this);
	        $this->pnlAddScorecard->Position = QPosition::Relative;
	        $this->pnlAddScorecard->Visible = false;
	        $this->pnlAddScorecard->AutoRenderChildren = true;
	        
	        $this->btnAddUser = new QButton($this);
	        $this->btnAddUser->Text = 'Add Users to A Scorecard';
	        $this->btnAddUser->CssClass = 'primary';
	        $this->btnAddUser->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnAddUser_Click'));
	        
	        $this->pnlAddUser = new QPanel($this);
	        $this->pnlAddUser->Position = QPosition::Relative;
	        $this->pnlAddUser->Visible = false;
	        $this->pnlAddUser->AutoRenderChildren = true;
			/*************************/
	        $this->dtgCannedStrategy = new CannedStrategyDataGrid($this);
	        $this->dtgCannedStrategy->Paginator = new QPaginator($this->dtgCannedStrategy);
			$this->dtgCannedStrategy->AddColumn(new QDataGridColumn('Canned Strategy', '<?= $_ITEM->Strategy ?>', 'HtmlEntities=false', 'Width=400px' ));
			$this->dtgCannedStrategy->MetaAddTypeColumn('CategoryTypeId', 'CategoryType');
            $this->dtgCannedStrategy->AddColumn(new QDataGridColumn('Actions', '<?= $_CONTROL->ParentControl->RenderActions($_ITEM->Id) ?>', 'HtmlEntities=false', 'Width=200px' ));
			$this->dtgCannedStrategy->AddColumn(new QDataGridColumn('KPIs', '<?= $_CONTROL->ParentControl->RenderKPIs($_ITEM->Id) ?>', 'HtmlEntities=false', 'Width=200px' ));
           /* $this->dtgCannedStrategy->MetaAddEditLinkColumn('<?="/inst/admin/panels/ExportScorecard.php/".$_ITEM->Id?>', '<img src=\'/inst/assets/images/download.png\' />Download','Download Scorecard');*/
        	$this->dtgCannedStrategy->CellPadding = 5;
			$this->dtgCannedStrategy->SetDataBinder('dtgCannedStrategy_Bind',$this);
			$this->dtgCannedStrategy->NoDataHtml = 'No Canned strategies.';
			$this->dtgCannedStrategy->UseAjax = true;
			$this->dtgCannedStrategy->GridLines = QGridLines::Both;
			
			$this->dtgCannedStrategy->SortColumnIndex = 1;
			$this->dtgCannedStrategy->ItemsPerPage = 20;
		
			$objStyle = $this->dtgCannedStrategy->RowStyle;
	        $objStyle->BackColor = '#ffffff';
	        $objStyle->FontSize = 12;
	
	        $objStyle = $this->dtgCannedStrategy->AlternateRowStyle;
	        $objStyle->BackColor = '#CCCCCC';
	
	        $objStyle = $this->dtgCannedStrategy->HeaderRowStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#003366'; 
	        
	        $objStyle = $this->dtgCannedStrategy->HeaderLinkStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#003366'; 
	        
	        $this->btnAddCannedStrategy = new QButton($this);
	        $this->btnAddCannedStrategy->Text = 'Add A Canned Strategy';
	        $this->btnAddCannedStrategy->CssClass = 'primary';
	        $this->btnAddCannedStrategy->AddAction(new QClickEvent(), new QAjaxControlAction($this,'btnAddCannedStrategy_Click'));
	        
			$this->pnlAddCannedStrategy = new QPanel($this);
	        $this->pnlAddCannedStrategy->Position = QPosition::Relative;
	        $this->pnlAddCannedStrategy->Visible = false;
	        $this->pnlAddCannedStrategy->AutoRenderChildren = true;
        }
        
        // Event Handlers Here
        public function dtgCannedStrategy_Bind() {
        	$objConditions = QQ::All();
			$objClauses = array();
			$cannedStrategyArray = CannedStrategy::QueryArray($objConditions,$objClauses);		
			$this->dtgCannedStrategy->DataSource = $cannedStrategyArray; 
        }
        
        public function RenderActions($intCannedStrategyId) {
        	$strReturn = '';
        	$actionArray = CannedActionItem::LoadArrayByStrategyId($intCannedStrategyId);
        	foreach($actionArray as $objAction) {
        		$strReturn .= $objAction->Action.'<br>';
        	}
        	return $strReturn;
        }
        
   	 	public function RenderKPIs($intCannedStrategyId) {
        	$strReturn = '';
        	$kpiArray = CannedKpi::LoadArrayByStrategyId($intCannedStrategyId);
        	foreach($kpiArray as $objKpi) {
        		$strReturn .= $objKpi->Kpi.'<br>';
        	}
        	return $strReturn;
        }
        
    	public function dtgScorecards_Bind() {
			$objConditions = QQ::All();
			$objClauses = array();
			$scorecardArray = Scorecard::QueryArray($objConditions,$objClauses);		
			$this->dtgScorecards->DataSource = $scorecardArray; 
		}
		
        public function RenderCompany($intCompanyId) {
        	$objCompany = Company::Load($intCompanyId);
        	return $objCompany->Name;
        }
        
        public function RenderUsers($objScorecard) {
        	$strUsers = '';
        	$userArray = $objScorecard->GetUserArray();
        	foreach($userArray as $objUser) {
        		$strUsers .= Login::Load($objUser->LoginId)->Username .',';
        	}
        	$strUsers = rtrim($strUsers,',');
        	return $strUsers;
        }

        public function RenderImport($objScorecard) {
        	$strControlId = 'import'.$objScorecard->Id;
        	$objFile = $this->objForm->GetControl($strControlId);
        	if (!$objFile) {
	        	$objFile = new QFileUploader($this->dtgScorecards,$strControlId);
	        	$objFile->ActionParameter = $objScorecard->Id;
	        	$objFile->TemporaryUploadFolder =  __DOCROOT__ . '/inst/scorecard/temp_uploads';
	        	$objFile->SetFileUploadedCallback($this,'ExtractInformation');
        	}
        	return $objFile->Render(false);
        }
        
        public function ExtractInformation($strFormId, $strControlId, $strParameter) {
        	$objFile = $this->objForm->GetControl($strControlId);
        	if($objFile) {
        		// Now open the file and parse it.
				// Assume knowledge of the format of the scorecard excel spreadsheet.
				// Assumptions:
				// 1) There are Summary Strategies start at B7
				// 2) Detail Strategies begin 6 rows down from the last summary strategy
				// 2) Action items start at 4 rows after strategies
				// 3) KPIs start at 4 rows after Action Items
				$objPHPExcel = PHPExcel_IOFactory::load($objFile->FilePath);
				foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
				    $worksheetTitle     = $worksheet->getTitle();
				    $highestRow         = $worksheet->getHighestRow(); // e.g. 10
				    $highestColumn      = $worksheet->getHighestColumn(); // e.g 'F'
				    $highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
				    $nrColumns = ord($highestColumn) - 64;
				    $highestRow         = $worksheet->getHighestRow();
				    
				   // $this->lblDebug->Text .= '<br> <b>Wrksheet Title = '.$worksheetTitle . '</b><br>';
				    $categoryId = 0;
				    switch ($worksheetTitle) {
				    	case 'Purpose':
				    		$categoryId = CategoryType::Purpose;
				    		break;
				    	case 'Product':
				    		$categoryId = CategoryType::Product;
				    		break;
				    	case 'Positioning':
				    		$categoryId = CategoryType::Positioning;
				    		break;
				    	case 'Presence':
				    		$categoryId = CategoryType::Presence;
				    		break;
				    	case 'Partnering':
				    		$categoryId = CategoryType::Partnering;
				    		break;
				    	case 'People':
				    		$categoryId = CategoryType::People;
				    		break;
				    	case 'Process':
				    		$categoryId = CategoryType::Process;
				    		break;
				    	case 'Place':
				    		$categoryId = CategoryType::Place;
				    		break;
				    	case 'Planning':
				    		$categoryId = CategoryType::Planning;
				    		break;
				    	case 'Profit':
				    		$categoryId = CategoryType::Profit;
				    		break;
				    }
				    $strategyRow = 7; 
				    $col = 1;
					$i = $strategyRow;
					$cell = $worksheet->getCellByColumnAndRow($col, $i);
					$val = $cell->getValue();
					// Move to first detail strategy
					while ($val != '') {
						$i++;
						$cell = $worksheet->getCellByColumnAndRow($col, $i);
						$val = $cell->getValue();
					}
					$i += 5;
					$cell = $worksheet->getCellByColumnAndRow($col, $i);
					$val = $cell->getValue();
					$strategyindex = 1;
					while($val !=''){
						// Get strategy + priority
						//$this->lblDebug->Text .= '<br>Strategy '.$strategyindex. ' = ' .$val;
						$cell = $worksheet->getCellByColumnAndRow($col+1, $i);
						$priority = $cell->getValue();
						//$this->lblDebug->Text .= '<br>Priority = ' . $priority;
						// set the strategy
						$objStrategy = new Strategy();
						$objStrategy->ScorecardId = $strParameter;
						$objStrategy->Strategy = $val;
						$objStrategy->CategoryTypeId = $categoryId;
						$objStrategy->Count = Strategy::GetNextCount($strParameter, $categoryId);
						$intStrategyId = $objStrategy->Save();
						$i+= 4;
						$cell = $worksheet->getCellByColumnAndRow($col, $i);
						$val = $cell->getValue();
						// Get actions
						$index = 1;
						while ($val != '') {
							//$this->lblDebug->Text .= '<br>Action '.$index.' = ' .$val;
							$cell = $worksheet->getCellByColumnAndRow($col+1, $i);
							$when = $cell->getValue();
							$sGMTMySqlString = gmdate("Y-m-d", strtotime($when));
							
							$cell = $worksheet->getCellByColumnAndRow($col+3, $i);
							$comments = $cell->getValue();
							//$this->lblDebug->Text .= '<br>Comments = '.$comments;
							$objAction = new ActionItems();
							$objAction->Action = $val;
							if((trim($when) != '') && ($when != '0000-00-00')){
								//$this->lblDebug->Text .= '<br>When = '.$sGMTMySqlString;
								$dtxActionWhen = new QDateTimeTextBox($this);
								$dtxActionWhen->Text = ($when) ? $when : null;
								$objAction->When = $dtxActionWhen->DateTime; //$sGMTMySqlString;
							} 
							$objAction->CategoryId = $categoryId;
							$objAction->Comments = $comments;
							$objAction->ScorecardId = $strParameter;
							$objAction->StrategyId = $intStrategyId;
							$objAction->Count = ActionItems::GetNextCount($strParameter, $categoryId, $intStrategyId);
							$objAction->Save();
							$i++;
							$index++;
							$cell = $worksheet->getCellByColumnAndRow($col, $i);
							$val = $cell->getValue();
						}
						$i+= 3;
						$cell = $worksheet->getCellByColumnAndRow($col, $i);
						$val = $cell->getValue();
						// Get KPIs
						$index = 1;
						while ($val != '') {
							//$this->lblDebug->Text .= '<br>KPI '.$index.' = ' .$val;
							$cell = $worksheet->getCellByColumnAndRow($col+1, $i);
							$comments = $cell->getValue();
							//$this->lblDebug->Text .= '<br>Comments = '.$comments;
							$cell = $worksheet->getCellByColumnAndRow($col+2, $i);
							$rating = $cell->getValue();
							//$this->lblDebug->Text .= '<br>Rating = '.$rating;
							$objKpi = new Kpis();
							$objKpi->Kpi = $val;
							$objKpi->Comments = $comments;
							$objKpi->Rating = $rating;
							$objKpi->ScorecardId = $strParameter;
							$objKpi->StrategyId = $intStrategyId;
							$objKpi->Save();
							
							$i++;
							$index++;
							$cell = $worksheet->getCellByColumnAndRow($col, $i);
							$val = $cell->getValue();
						}
						$strategyindex++;
						$i+= 3;
						$cell = $worksheet->getCellByColumnAndRow($col, $i);
						$val = $cell->getValue();
					}
				}
        	}
        }
	
    	public function RenderDownload($objScorecard) {
    		$strControlId = 'download'.$objScorecard->Id;
        	$imgDownload = new QLabel($this);
        	$imgDownload->HtmlEntities = false;
        	$imgDownload->CssClass = 'link';
        	$imgDownload->ActionParameter = $objScorecard->Id;
        	$imgDownload->Text = '<href src=\'/inst/admin/panels/exportScorecard.php/'.$objScorecard->Id.'\'><img src=\'/inst/assets/images/download.png\' />Download</a>';
        	//$imgDownload->AddAction(new QClickEvent(),new QAjaxControlAction($this,'imgDownload_Click'));
        	return $imgDownload->Render(false);
        }
        
        public function imgDownload_Click($strFormId, $strControlId, $strParameter) {
        	$objPHPExcel = new PHPExcel();
        	$objPHPExcel->getProperties()->setCreator("inst.net")
							 ->setLastModifiedBy("inst.net")
							 ->setTitle("Scorecard")
							 ->setSubject("Scorecard")
							 ->setDescription("Scorecard")
							 ->setKeywords("")
							 ->setCategory("");

			$company = Company::Load(Scorecard::Load($strParameter)->Company->Name);
			foreach(CategoryType::$NameArray as $val) {
				if($val != 'Purpose') {
					$objWorksheet2 = $objPHPExcel->createSheet();
					$objWorksheet2->setTitle($val);
				}
			}
			for($index=1; $index<11; $index++) {
				$objPHPExcel->setActiveSheetIndex($index-1);
				$objPHPExcel->getActiveSheet()->setTitle(CategoryType::$NameArray[$index]);
				$objPHPExcel->getActiveSheet()->setCellValue('B1', $company);
				$objPHPExcel->getActiveSheet()->getStyle('B1')->getFont()->setSize(16); 
				$objPHPExcel->getActiveSheet()->getStyle('B1')->getFont()->setBold(true);
								
				$objPHPExcel->getActiveSheet()->setCellValue('B3', CategoryType::$NameArray[$index]);
				$objPHPExcel->getActiveSheet()->getStyle('B3')->getFont()->setSize(14); 
				$objPHPExcel->getActiveSheet()->getStyle('B3')->getFont()->setBold(true);
				
				$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(50);
				$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
				$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
				$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(50);
				$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(50);
				
				$i = 5;
				// Print purpose or Positioning statement
				if((CategoryType::$NameArray[$index] == 'Purpose') ||(CategoryType::$NameArray[$index] == 'Positioning')) {
					$objPHPExcel->getActiveSheet()->setCellValue('E' . $i, CategoryType::$NameArray[$index]." Statement");
					$objPHPExcel->getActiveSheet()->getStyle('E'. $i)->getFont()->setSize(12); 
					$objPHPExcel->getActiveSheet()->getStyle('E'. $i)->getFont()->setBold(true);
					$i++;
					$statementArray = Statement::LoadArrayByScorecardId($strParameter);
					if(CategoryType::$NameArray[$index] == 'Purpose') {
						if($statementArray[0]->IsPurpose) {
							$objPHPExcel->getActiveSheet()->setCellValue('E' . $i, htmlspecialchars_decode($statementArray[0]->Value));
						} else {
							$objPHPExcel->getActiveSheet()->setCellValue('E' . $i, htmlspecialchars_decode($statementArray[1]->Value));
						}
					} else {
						if($statementArray[0]->IsPurpose) {
							$objPHPExcel->getActiveSheet()->setCellValue('E' . $i, htmlspecialchars_decode($statementArray[1]->Value));
						} else {
							$objPHPExcel->getActiveSheet()->setCellValue('E' . $i, htmlspecialchars_decode($statementArray[0]->Value));
						}
					}
				}
				$i--;
				
				// Print Summary
				$objPHPExcel->getActiveSheet()->setCellValue('B' . $i, CategoryType::$NameArray[$index]." Summary");
				$objPHPExcel->getActiveSheet()->getStyle('B'. $i)->getFont()->setSize(12); 
				$objPHPExcel->getActiveSheet()->getStyle('B'. $i)->getFont()->setBold(true);
				$i++;
				$objPHPExcel->getActiveSheet()->setCellValue('A' . $i, 'Strategy');
				$objPHPExcel->getActiveSheet()->getStyle('A' . $i)->getFont()->setBold(true);
				$objPHPExcel->getActiveSheet()->setCellValue('B' . $i, "Description");
				$objPHPExcel->getActiveSheet()->getStyle('B' . $i)->getFont()->setBold(true);
				$strategyArray = Strategy::LoadArrayByScorecardIdAndCategoryTypeId($strParameter, $index-1);
				foreach($strategyArray as $objStrategy) {
					$objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $objStrategy->Count);
					$objPHPExcel->getActiveSheet()->setCellValue('B' . $i, htmlspecialchars_decode($objStrategy->Strategy));
				}
				
				// Print Detail
				$i = $i+4;
				$objPHPExcel->getActiveSheet()->setCellValue('B' . $i, CategoryType::$NameArray[$index]." Detail");
				$objPHPExcel->getActiveSheet()->getStyle('B'. $i)->getFont()->setSize(12); 
				$objPHPExcel->getActiveSheet()->getStyle('B'. $i)->getFont()->setBold(true);
				$i++;
				foreach($strategyArray as $objStrategy) {
					$objPHPExcel->getActiveSheet()->setCellValue('A' . $i, "Strategy");
					$objPHPExcel->getActiveSheet()->getStyle('A' . $i)->getFont()->setBold(true);
					$objPHPExcel->getActiveSheet()->setCellValue('B' . $i, "Description");
					$objPHPExcel->getActiveSheet()->getStyle('B' . $i)->getFont()->setBold(true);
					$objPHPExcel->getActiveSheet()->setCellValue('C' . $i, "Priority");
					$objPHPExcel->getActiveSheet()->getStyle('C' . $i)->getFont()->setBold(true);
					$i++;
					$objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $objStrategy->Count);
					$objPHPExcel->getActiveSheet()->setCellValue('B' . $i, htmlspecialchars_decode($objStrategy->Strategy));
					$objPHPExcel->getActiveSheet()->setCellValue('C' . $i, $objStrategy->Priority);
					$i++;
					$i++;
					$objPHPExcel->getActiveSheet()->setCellValue('B' . $i, "Action Items");
					$objPHPExcel->getActiveSheet()->getStyle('B' . $i)->getFont()->setBold(true);
					$i++;
					$objPHPExcel->getActiveSheet()->setCellValue('A' . $i, "index");
					$objPHPExcel->getActiveSheet()->getStyle('A' . $i)->getFont()->setBold(true);
					$objPHPExcel->getActiveSheet()->setCellValue('B' . $i, "action");
					$objPHPExcel->getActiveSheet()->getStyle('B' . $i)->getFont()->setBold(true);
					$objPHPExcel->getActiveSheet()->setCellValue('C' . $i, "when");
					$objPHPExcel->getActiveSheet()->getStyle('C' . $i)->getFont()->setBold(true);
					$objPHPExcel->getActiveSheet()->setCellValue('D' . $i, "who");
					$objPHPExcel->getActiveSheet()->getStyle('D' . $i)->getFont()->setBold(true);
					$objPHPExcel->getActiveSheet()->setCellValue('E' . $i, "comments");
					$objPHPExcel->getActiveSheet()->getStyle('E' . $i)->getFont()->setBold(true);
					$actionArray = ActionItems::LoadArrayByStrategyId($objStrategy->Id);
					foreach($actionArray as $objAction){
						$i++;
						$objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $objAction->Count);
						$objPHPExcel->getActiveSheet()->setCellValue('B' . $i, htmlspecialchars_decode($objAction->Action));
						$objPHPExcel->getActiveSheet()->setCellValue('C' . $i, gmdate("Y-m-d", strtotime($objAction->When)));
						$objUser = User::Load($objAction->Who);
						if($objUser) {
							$objPHPExcel->getActiveSheet()->setCellValue('D' . $i, $objUser->FirstName . ' '.$objUser->LastName);
						} else {
							$objPHPExcel->getActiveSheet()->setCellValue('D' . $i, ' ');
						}
						$objPHPExcel->getActiveSheet()->setCellValue('E' . $i, htmlspecialchars_decode($objAction->Comments));
					}
					$i++;
					$i++;
					$objPHPExcel->getActiveSheet()->setCellValue('B' . $i, "KPIs");
					$objPHPExcel->getActiveSheet()->getStyle('B' . $i)->getFont()->setBold(true);
					$i++;
					$objPHPExcel->getActiveSheet()->setCellValue('A' . $i, "index");
					$objPHPExcel->getActiveSheet()->getStyle('A' . $i)->getFont()->setBold(true);
					$objPHPExcel->getActiveSheet()->setCellValue('B' . $i, "KPI");
					$objPHPExcel->getActiveSheet()->getStyle('B' . $i)->getFont()->setBold(true);
					$objPHPExcel->getActiveSheet()->setCellValue('C' . $i, "Comments");
					$objPHPExcel->getActiveSheet()->getStyle('C' . $i)->getFont()->setBold(true);
					$objPHPExcel->getActiveSheet()->setCellValue('D' . $i, "rating");
					$objPHPExcel->getActiveSheet()->getStyle('D' . $i)->getFont()->setBold(true);
					$kpiArray = Kpis::LoadArrayByStrategyId($objStrategy->Id);
					foreach($kpiArray as $objKpi){
						$i++;
						$objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $objKpi->Count);
						$objPHPExcel->getActiveSheet()->setCellValue('B' . $i, htmlspecialchars_decode($objKpi->Kpi));
						$objPHPExcel->getActiveSheet()->setCellValue('C' . $i, htmlspecialchars_decode($objKpi->Comments));
						$objPHPExcel->getActiveSheet()->setCellValue('D' . $i, $objKpi->Rating);
					}
					$i = $i+3;
				}
				$objPHPExcel->getActiveSheet()->getStyle('B5:F'.$i)->getAlignment()->setWrapText(true);
			}
        	foreach($objPHPExcel->getActiveSheet()->getRowDimensions() as $rd) { 
			    $rd->setRowHeight(-1); 
			}
			///////////////////////////////////////////////////////////////////////////////////////
			// Set active sheet index to the first sheet, so Excel opens this as the first sheet
			$objPHPExcel->setActiveSheetIndex(0);
			
			
			// Redirect output to a client's web browser (Excel5)
			$tUnixTime = time();
			$sGMTMySqlString = gmdate("Y-m-d", $tUnixTime);
			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="'.Scorecard::Load($strParameter)->Name.$sGMTMySqlString.'-scorecard.xls"');
			header('Cache-Control: max-age=0');
			
			$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
			$objWriter->save('php://output');
			exit;
        }
        
        public function btnAddCannedStrategy_Click($strFormId, $strControlId, $strParameter) {
			// Open up the panel and allow the adding of scorecards
	        $this->pnlAddCannedStrategy->Visible = true;
	        $this->pnlAddCannedStrategy->RemoveChildControls(true);
	        $pnlAddCannedStrategyView = new AddCannedStrategy($this->pnlAddCannedStrategy,'UpdateStrategyList',$this);  		
		}
		
    	public function btnAddScorecard_Click($strFormId, $strControlId, $strParameter) {
			// Open up the panel and allow the adding of scorecards
	        $this->pnlAddScorecard->Visible = true;
	        $this->pnlAddScorecard->RemoveChildControls(true);
	        $pnlAddScorecardView = new AddScorecard($this->pnlAddScorecard,'UpdateScorecardList',$this);  		
		}
		
    	public function btnAddUser_Click($strFormId, $strControlId, $strParameter) {
			// Open up the panel and allow the adding of users to a scorecard
	        $this->pnlAddUser->Visible = true;
	        $this->pnlAddUser->RemoveChildControls(true);
	        $pnlAddUserView = new AddScorecardUser($this->pnlAddUser,'UpdateScorecardList',$this);  		
		}
		
    	// Method Call back for the  panels 
	    public function UpdateScorecardList($blnUpdatesMade) {
	    	$this->dtgScorecards->PageNumber = 1;
			$this->dtgScorecards->Refresh();
	    }
    	public function UpdateStrategyList($blnUpdatesMade) {
	    	$this->dtgCannedStrategy->PageNumber = 1;
			$this->dtgCannedStrategy->Refresh();
	    }
	    
    }