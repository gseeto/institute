<?php // content="text/plain; charset=utf-8"
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
require_once (dirname(__FILE__) . '/../../../includes/jpgraph/jpgraph.php');
require_once (dirname(__FILE__) . '/../../../includes/jpgraph/jpgraph_pie.php');
require_once (dirname(__FILE__) . '/../../../includes/jpgraph/jpgraph_pie3d.php');

$total = 0;
$lemonValues = array(0,0,0,0,0);
/*$categoriesArray = array();
for($i=1; $i<6; $i++) {
	$categoriesArray[] = LemonType::ToString($i);
}*/
$strArgs = substr(QApplication::$PathInfo, 1 );
$assessmentArray = explode('/',$strArgs);
foreach($assessmentArray as $intAssessmentId)  {
	$objLemon = LemonAssessment::Load($intAssessmentId);
 	if($objLemon->L) {
 		$lemonArray = array("L"=>$objLemon->L,
 							"E"=>$objLemon->E,
 							"M"=>$objLemon->M,
 							"O"=>$objLemon->O,
 							"N"=>$objLemon->N);
 		arsort($lemonArray);
 		foreach($lemonArray as $key=>$value) {
 			switch ($key){
 				case "L":
 					$lemonValues[0]++;
 					break;
 				case "E":
 					$lemonValues[1]++;
 					break;
 				case "M":
 					$lemonValues[2]++;
 					break;
 				case "O":
 					$lemonValues[3]++;
 					break;
 				case "N":
 					$lemonValues[4]++;
 					break;
 			}
 			break; // we just want the first one
 		}
 	} else {
	 	$resultArray = LemonAssessmentResults::LoadArrayByAssessmentId($objLemon->Id);
		$tempArray = array(0,0,0,0,0);
	 	foreach($resultArray as $objResult) {
			$intIndex = $objResult->Question->LemonTypeId - 1;
			$tempArray[$intIndex] += $objResult->Value;
		}
 		$lemonArray = array("L"=>$tempArray[0],
 							"E"=>$tempArray[1],
 							"M"=>$tempArray[2],
 							"O"=>$tempArray[3],
 							"N"=>$tempArray[4]);
 		arsort($lemonArray);
 		foreach($lemonArray as $key=>$value) {
 			switch ($key){
 				case "L":
 					$lemonValues[0]++;
 					break;
 				case "E":
 					$lemonValues[1]++;
 					break;
 				case "M":
 					$lemonValues[2]++;
 					break;
 				case "O":
 					$lemonValues[3]++;
 					break;
 				case "N":
 					$lemonValues[4]++;
 					break;
 			}
 			break; // we just want the first one
 		}
		
 	}
 }

$graph = new PieGraph(400,400);
$graph->SetShadow();

$graph->title->Set("Group First Slice Pie Chart");
$graph->SetUserFont('ttf-dejavu/DejaVuSans.ttf');
$graph->title->SetFont(FF_USERFONT,FS_NORMAL,18);


$pieColors = array('#6C98B0','#8AC16E','#FFD43F','#FCA343','#E66E24');
$lemonValues = array_reverse($lemonValues);
$pieColors = array_reverse($pieColors);
$p1 = new PiePlot3D($lemonValues);
$p1->SetSliceColors($pieColors);
$p1->SetSize(0.35);
$p1->SetCenter(0.5,0.4);
//$p1->SetLegends($categoriesArray);
$p1->SetLabels(array("Networker\n%.1f%%","Organizer\n%.1f%%","Manager\n%.1f%%","Entrepreneur\n%.1f%%","Luminary\n%.1f%%"),1);
$p1->SetLabelType(PIE_VALUE_ADJPERCENTAGE);
$graph->graph_theme = null;
$graph->Add($p1);
$graph->Stroke();

?>
