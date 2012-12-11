<?php
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

class SocietalForm extends InstituteForm {
	protected $arrNavigation;
	protected $strPageTitle = 'Scorecard';
	protected $intNavSectionId = InstituteForm::NavSectionScorecard;
	protected $intNavScorecardId = InstituteForm::NavScorecardSocietal;
	protected $objScorecard;
	protected $dtgPArray;
	protected $dlgAssociateSphere;
	public    $dlgAssociateGiant;
	protected $imgSpheres;
	protected $imgSpheresInvolvement;
	protected $imgGiants;
	protected $imgGiantsInvolvement;
	protected $lblDebug;

	protected function Form_Run() {
		// If not  logged in, go to login page.
		if (!QApplication::$Login) QApplication::Redirect('/inst/index.php');
	}
	
	protected function Form_Create() {
		$this->lblDebug = new QLabel($this);
		$this->objScorecard = Scorecard::Load(QApplication::PathInfo(0));
		$this->dtgPArray = array();

		// Generate a summary of the P Strategys
		foreach(CategoryType::$NameArray as $key=>$value) {
			$dtgP = new StrategyDataGrid($this);
			$dtgP->AddColumn(new QDataGridColumn('', '<?= $_ITEM->Count ?>', 'HtmlEntities=false', 'Width=20px' ));
			$dtgP->AddColumn(new QDataGridColumn($value.' Strategy Summary', '<?= $_ITEM->Strategy ?>', 'HtmlEntities=false', 'Width=700px' ));
			$dtgP->AddColumn(new QDataGridColumn('Average KPI', '<?= $_FORM->RenderKPI($_ITEM->Id) ?>', 'HtmlEntities=false', 'Width=20px' ));
			$dtgP->AddColumn(new QDataGridColumn('Societal Ills Being Addressed', '<?= $_FORM->RenderGiants($_ITEM, $_CONTROL) ?>', 'HtmlEntities=false', 'Width=20px' ));
			$dtgP->AddColumn(new QDataGridColumn('Spheres Or Sectors', '<?= $_FORM->RenderSpheres($_ITEM, $_CONTROL) ?>', 'HtmlEntities=false', 'Width=20px' ));
			$dtgP->CellPadding = 5;
			$dtgP->GridLines = QGridLines::Both;

			$objConditions = QQ::All();
			$objClauses = array();					
			$objConditions = QQ::AndCondition($objConditions,
				QQ::Equal( QQN::Strategy()->ScorecardId, $this->objScorecard->Id));
			$objConditions = QQ::AndCondition($objConditions,
				QQ::Equal( QQN::Strategy()->CategoryTypeId, $key));
		
			$strategyArray = Strategy::QueryArray($objConditions,$objClauses);		
			$dtgP->DataSource = $strategyArray; 
			
			$dtgP->NoDataHtml = '<div style=\'padding:20px;\'><p><b>'.$value.' Strategy Summary</b></p>' .'No Strategies.<br></div>';
			$dtgP->UseAjax = true;
			$objStyle = $dtgP->HeaderRowStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#003366'; 	        
	        $objStyle = $dtgP->HeaderLinkStyle;
	        $objStyle->ForeColor = '#ffffff';
	        $objStyle->BackColor = '#003366'; 	      
			
			$this->dtgPArray[] = $dtgP;
			
			$this->imgSpheres = new QLabel($this);
			$this->imgSpheres->CssClass = 'societalImage';
			$this->imgSpheres->HtmlEntities = false;
			$this->imgSpheres->Text = '<img src=\'/inst/scorecard/societal/spheresImg.php/'.$this->objScorecard->Id.'\' />';
			$this->imgSpheresInvolvement = new QLabel($this);
			$this->imgSpheresInvolvement->CssClass = 'societalImage';
			$this->imgSpheresInvolvement->HtmlEntities = false;
			$this->imgSpheresInvolvement->Text = '<img src=\'/inst/scorecard/societal/spheresInvolvementImg.php/'.$this->objScorecard->Id.'\' />';
			$this->imgGiants = new QLabel($this);
			$this->imgGiants->CssClass = 'societalImage';
			$this->imgGiants->HtmlEntities = false;
			$this->imgGiants->Text = '<img src=\'/inst/scorecard/societal/giantsImg.php/'.$this->objScorecard->Id.'\' />';
			$this->imgGiantsInvolvement = new QLabel($this);
			$this->imgGiantsInvolvement->CssClass = 'societalImage';
			$this->imgGiantsInvolvement->HtmlEntities = false;	
			$this->imgGiantsInvolvement->Text= '<img src=\'/inst/scorecard/societal/giantsInvolvementImg.php/'.$this->objScorecard->Id.'\' />';		
		}
		
		// Define the AssociateSphere Dialog. passing in the Method Callback for whenever the dialog is Closed
        $this->dlgAssociateSphere = new DlgAssociateSphere('btnAssociateSphere_Close', $this);
        $this->dlgAssociateSphere->Visible = false;
        
        // Define the AssociateSphere Dialog. passing in the Method Callback for whenever the dialog is Closed
        $this->dlgAssociateGiant = new DlgAssociateGiant('btnAssociateGiant_Close', $this);
        $this->dlgAssociateGiant->Visible = false;
        $this->dlgAssociateGiant->Width = 500;		
        
        
	}
			
	public function btnCategory_Clicked($strFormId, $strControlId, $strParameter) {
		if ($strParameter == 'Summary') {
			QApplication::Redirect('/inst/scorecard/scorecard.php/'.$this->objScorecard->Id);
		} else { 
			$intCategoryId = $strParameter;
			QApplication::Redirect('/inst/scorecard/tenp/index.php/'. $this->objScorecard->Id . '/' .$intCategoryId );
		}
    }
    
    public function RenderKPI($intStrategyId) {
    	$kpiArray = Kpis::LoadArrayByStrategyId($intStrategyId);
    	$total = 0;
    	foreach($kpiArray as $objKPI) {
    		$total += $objKPI->Rating;
    	}
    	if(count($kpiArray) == 0) {
    		return 0;
    	} else {
    		return round($total/count($kpiArray),2);
    	}
    }
    
 	public function btnSubmit_Click() {
		// redirect to appropriate scorecard
		QApplication::Redirect('/inst/scorecard/scorecard.php/'.$this->rbnScorecards->SelectedValue);
	}
	
 	public function RenderGiants(Strategy $objStrategy, StrategyDataGrid $dtgP) {
    	$strGiants = '';
 		if ($objStrategy->CountGiantsesAsGiant() == 0) {
    		$strGiants = 'Select Societal Ills';
    	} else {
    		$objGiantArray = $objStrategy->GetGiantsAsGiantArray();
    		foreach($objGiantArray as $objGiant) {
    			$strGiants .= $objGiant->Giant .',';
    		}
    	}
    	rtrim($strGiants,',');
    	$btnAssociateGiant = new QButton($dtgP);
    	$btnAssociateGiant->Text = $strGiants;
    	$btnAssociateGiant->CssClass = 'societalButton';
    	$btnAssociateGiant->ActionParameter = $objStrategy->Id;
    	$btnAssociateGiant->AddAction(new QClickEvent(), new QAjaxAction('btnAssociateGiant_Clicked'));
    	return $btnAssociateGiant->Render(false);
    }
    
	public function btnAssociateGiant_Clicked($strFormId, $strControlId, $strParameter) {
    	// Setup the necessary Values
    	$objStrategy = Strategy::Load($strParameter);
    	$strDebug = trim($objStrategy->Strategy);
    	$this->lblDebug->Text = $strDebug;
        $this->dlgAssociateGiant->Strategy = trim(Strategy::Load($strParameter)->Strategy);
        $btnAssociatedGiant = $this->GetControl($strControlId);
        $this->dlgAssociateGiant->AssociatedGiants = $btnAssociatedGiant->Text;
        $this->dlgAssociateGiant->StrategyId = $objStrategy->Id;
        foreach(CategoryType::$NameArray as $key=>$value) {
        	if ($objStrategy->CategoryTypeId == $key) 
        		$this->dlgAssociateGiant->CategoryId = $key;
        }

        // And Show dialog box
        $this->dlgAssociateGiant->ShowDialogBox();
    }
    
 	// Setup the "Callback" function for when the dialog closes
    // This needs to be a public method
    public function btnAssociateGiant_Close() {
    	$categoryId = $this->dlgAssociateGiant->CategoryId;
        $objConditions = QQ::All();
		$objClauses = array();					
		$objConditions = QQ::AndCondition($objConditions,
			QQ::Equal( QQN::Strategy()->ScorecardId, $this->objScorecard->Id));
		$objConditions = QQ::AndCondition($objConditions,
			QQ::Equal( QQN::Strategy()->CategoryTypeId, $categoryId));
	
		$strategyArray = Strategy::QueryArray($objConditions,$objClauses);		
		$this->dtgPArray[$categoryId-1]->DataSource = $strategyArray;
		$this->dtgPArray[$categoryId-1]->Refresh();
		
		$this->imgSpheres->Refresh();
		$this->imgSpheresInvolvement->Refresh();
		$this->imgGiants->Refresh();
		$this->imgGiantsInvolvement->Refresh();
    }
    
 	public function RenderSpheres($objStrategy, StrategyDataGrid $dtgP) {
    	$strSpheres = '';
 		if ($objStrategy->CountSpheresesAsSphere() == 0) {
    		$strSpheres = 'Select Spheres';
    	} else {
    		$objSphereArray = $objStrategy->GetSpheresAsSphereArray();
    		foreach($objSphereArray as $objSpheres) {
    			$strSpheres .= $objSpheres->Sphere .',';
    		}
    	}
    	rtrim($strSpheres,',');
    	$btnAssociateSphere = new QButton($dtgP);
    	$btnAssociateSphere->Text = $strSpheres;
    	$btnAssociateSphere->CssClass = 'societalButton';
    	$btnAssociateSphere->ActionParameter = $objStrategy->Id;
    	$btnAssociateSphere->AddAction(new QClickEvent(), new QAjaxAction('btnAssociateSphere_Clicked'));
    	return $btnAssociateSphere->Render(false);
    }
    
	public function btnAssociateSphere_Clicked($strFormId, $strControlId, $strParameter) {
    	// Setup the necessary Values
    	$objStrategy = Strategy::Load($strParameter);
    	$strDebug = trim($objStrategy->Strategy);
    	$this->lblDebug->Text = $strDebug;
        $this->dlgAssociateSphere->Strategy = trim(Strategy::Load($strParameter)->Strategy);
        $btnAssociatedSphere = $this->GetControl($strControlId);
        $this->dlgAssociateSphere->AssociatedSpheres = $btnAssociatedSphere->Text;
        $this->dlgAssociateSphere->StrategyId = $objStrategy->Id;
        foreach(CategoryType::$NameArray as $key=>$value) {
        	if ($objStrategy->CategoryTypeId == $key) 
        		$this->dlgAssociateSphere->CategoryId = $key;
        }

        // And Show dialog box
        $this->dlgAssociateSphere->ShowDialogBox();
    }
    
 	// Setup the "Callback" function for when the calculator closes
    // This needs to be a public method
    public function btnAssociateSphere_Close() {
    	$categoryId = $this->dlgAssociateSphere->CategoryId;
        $objConditions = QQ::All();
		$objClauses = array();					
		$objConditions = QQ::AndCondition($objConditions,
			QQ::Equal( QQN::Strategy()->ScorecardId, $this->objScorecard->Id));
		$objConditions = QQ::AndCondition($objConditions,
			QQ::Equal( QQN::Strategy()->CategoryTypeId, $categoryId));
	
		$strategyArray = Strategy::QueryArray($objConditions,$objClauses);		
		$this->dtgPArray[$categoryId-1]->DataSource = $strategyArray;
		$this->dtgPArray[$categoryId-1]->Refresh();
		$this->imgSpheres->Refresh();
		$this->imgSpheresInvolvement->Refresh();
		$this->imgGiants->Refresh();
		$this->imgGiantsInvolvement->Refresh();
    }
        
}

SocietalForm::Run('SocietalForm');
?>