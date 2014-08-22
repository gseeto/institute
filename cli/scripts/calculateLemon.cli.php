<?php
print "Calculating All the LEMON values\n";

 $objAssessmentCursor = LemonAssessment::QueryCursor(QQ::All());
 QDataGen::DisplayForEachTaskStart('Calculating All the LEMON values', LemonAssessment::CountAll());
 while ($objLemon = LemonAssessment::InstantiateCursor($objAssessmentCursor)) {
 	QDataGen::DisplayForEachTaskNext('Calculating All the LEMON values');
 	$objResults = LemonAssessmentResults::LoadArrayByAssessmentId($objLemon->Id);
 	if (empty($objResults)) {
 		print "Didn't find any results for ".$objLemon->User->FirstName.' '.$objLemon->User->LastName."\r\n";
 	} else {
	 	$lemonValues = array(0,0,0,0,0);
	 	print "Performing calculations for ". $objLemon->User->FirstName.' '.$objLemon->User->LastName."\r\n";
	 	foreach($objResults as $objResult) {
	 		$intIndex = $objResult->Question->LemonTypeId - 1;
			$lemonValues[$intIndex] += $objResult->Value;
	 	}
	 	$objLemon->L = $lemonValues[0];
	 	$objLemon->E = $lemonValues[1];
	 	$objLemon->M = $lemonValues[2];
	 	$objLemon->O = $lemonValues[3];
	 	$objLemon->N = $lemonValues[4];
	 	$objLemon->Save();
 	}
 }
 QDataGen::DisplayForEachTaskEnd('Calculating All the LEMON values');

?>