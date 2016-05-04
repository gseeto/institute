<?php
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

class LemonGlobalForm extends InstituteForm {
	protected $arrNavigation;
	protected $strPageTitle = 'Global LEMON Assessment';
	protected $intNavSectionId = InstituteForm::NavSectionAssessments;
	protected $countryArray;
	protected $lblDebug;

	protected function Form_Run() {
		if (!QApplication::$Login) QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
		
		if((QApplication::$Login->Role->Name != 'Company Manager')&&(QApplication::$Login->Role->Name != 'Administrator')) {			
			QApplication::Redirect(__SUBDIRECTORY__.'/index.php');
		}
	}
	
	protected function Form_Create() {	
		$this->countryArray = array();
		$this->lblDebug = new QLabel($this);
		$this->lblDebug->HtmlEntities = false;
			
		// Not really doing anything here. Just displaying global statistics
		// Determine the top ten countries we have assessments for.
		$countryList = array();
		$objAssessmentCursor = LemonAssessment::QueryCursor(QQ::All());
 		while ($objLemon = LemonAssessment::InstantiateCursor($objAssessmentCursor)) {
 			if($objLemon->User != null) {
	 			if(array_key_exists($objLemon->User->CountryId, $countryList))
	 				$countryList[$objLemon->User->CountryId] +=1;
	 			else 
	 				$countryList[$objLemon->User->CountryId] = 1;
 			}
 		}
 		arsort($countryList);
 		$i = 1;
 		//$this->lblDebug->Text .= "Getting top ten countries...<br>";
 		foreach($countryList as $key=>$value) {
 			if(CountryList::Load($key)) {
	 			//$this->lblDebug->Text .= CountryList::Load($key)->Name ." has ".$value." entries<br>";
	 			$this->countryArray[] = $key;
	 			if ($i >= 9 )
	 				break;
	 			$i++;
 			}
 		}
 		
	}
	
}

LemonGlobalForm::Run('LemonGlobalForm');
?>