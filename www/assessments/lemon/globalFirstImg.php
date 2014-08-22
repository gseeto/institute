<?php // content="text/plain; charset=utf-8"
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
require_once (dirname(__FILE__) . '/../../../includes/jpgraph/jpgraph.php');
require_once (dirname(__FILE__) . '/../../../includes/jpgraph/jpgraph_pie.php');
require_once (dirname(__FILE__) . '/../../../includes/jpgraph/jpgraph_pie3d.php');

$total = 0;
$lemonValues = array(0,0,0,0,0);
$categoriesArray = array();

$txtTitle = '';
$txtType = QApplication::PathInfo(0);
$intId = QApplication::PathInfo(1);
switch($txtType) {
	case 'global':
		$objConditions = QQ::All();
		$txtTitle = 'Global Overall Primary Slices';
		break;
	case 'country':
		$objCountry = CountryList::Load($intId);
		$objConditions = QQ::All();
		$objConditions = QQ::AndCondition($objConditions,QQ::Equal( QQN::LemonAssessment()->User->CountryId, $intId));
		$txtTitle = $objCountry->Name;
		break;
	case 'gender':
		$objConditions = QQ::All();
		$objConditions = QQ::AndCondition($objConditions,QQ::Equal( QQN::LemonAssessment()->User->Gender, $intId));
		if($intId)
			$txtTitle = 'MALE';
		else 
			$txtTitle = 'FEMALE';
		break;
}

$objAssessmentCursor = LemonAssessment::QueryCursor($objConditions);
$count = $objAssessmentCursor->CountRows();
 while ($objLemon = LemonAssessment::InstantiateCursor($objAssessmentCursor)) {
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
if($txtType=='global') {
	$graph = new PieGraph(700,560);
} else {
	$graph = new PieGraph(350,280);
}
$graph->SetShadow();
//$graph->SetMargin(1,1,1,1);
//$graph->SetMarginColor('silver');

$graph->title->Set($txtTitle);
$graph->SetUserFont('ttf-dejavu/DejaVuSans.ttf');
$graph->title->SetFont(FF_USERFONT,FS_NORMAL,16);

$pieColors = array('#6C98B0','#8AC16E','#FFD43F','#FCA343','#E66E24');
$lemonValues = array_reverse($lemonValues);
$pieColors = array_reverse($pieColors);
$p1 = new PiePlot3D($lemonValues);
$p1->SetSliceColors($pieColors);
$p1->SetSize(0.25);
$p1->SetCenter(0.5, 0.4);
$p1->SetLabels(array("Networker\n%.1f%%","Organizer\n%.1f%%","Manager\n%.1f%%","Entrepreneur\n%.1f%%","Luminary\n%.1f%%"),1);
$graph->graph_theme = null;
$graph->Add($p1);

$txt = 'Total # of users: '.$count;
if($txtType=='global') {
	$caption=new Text($txt,180,420); 
}else {
	$caption=new Text($txt,180,220);
}
$caption->SetFont(FF_USERFONT,FS_NORMAL); 
$graph->AddText($caption); 

//$graph->Stroke();
// Get the handler to prevent the library from sending the
// image to the browser
$gdImgHandler = $graph->Stroke(_IMG_HANDLER);

// Stroke image to a file and browser

// Default is PNG so use ".png" as suffix
$fileName =  __UPLOAD_DIR__.'/GlobalPie.png';
$graph->img->Stream($fileName);

// Send it back to browser
$graph->img->Headers();
$graph->img->Stream();

?>
