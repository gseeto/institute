<?php
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

function EscapeCsv($strString) {
	return '"' . str_replace('"', '""', $strString) . '"';
}

// Disable strict no-cache for IE due to IE issues with downloading no-cache items
	if (QApplication::IsBrowser(QBrowserType::InternetExplorer)) {
		header("Pragma:");
		header("Expires:");
	}

	header('Content-Type: text/csv');
	header('Content-Disposition: attachment; filename=exportLemon.csv');
	print "Name,Email,Luminary,Entrepreneur,Manager,Organizer,Networker\r\n";
	
	
	$strArgs = substr(QApplication::$PathInfo, 1 );
	$assessmentArray = explode('/',$strArgs);
	foreach($assessmentArray as $intAssessmentId) {
		$objAssessment = LemonAssessment::Load($intAssessmentId);
		printf("%s %s,%s, %s, %s, %s, %s, %s \r\n",
		$objAssessment->User->FirstName, $objAssessment->User->LastName, $objAssessment->User->Email, $objAssessment->L,$objAssessment->E,$objAssessment->M,$objAssessment->O,$objAssessment->N);		
	}
?>