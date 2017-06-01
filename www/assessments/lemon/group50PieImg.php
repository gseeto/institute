<?php // content="text/plain; charset=utf-8"
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
require_once (dirname(__FILE__) . '/../../../includes/jpgraph/jpgraph.php');
require_once (dirname(__FILE__) . '/../../../includes/jpgraph/jpgraph_pie.php');
require_once (dirname(__FILE__) . '/../../../includes/jpgraph/jpgraph_pie3d.php');

$total = 0;
$lemonValues = array(0,0,0,0,0);
$strArgs = substr(QApplication::$PathInfo, 1 );
$assessmentArray = explode('/',$strArgs);
foreach($assessmentArray as $intAssessmentId) {
	$objAssessment = Lemon50Assessment::Load($intAssessmentId);
	if($objAssessment->L) {
		$lemonValues[0] += $objAssessment->L;
		$lemonValues[1] += $objAssessment->E;
		$lemonValues[2] += $objAssessment->M;
		$lemonValues[3] += $objAssessment->O;
		$lemonValues[4] += $objAssessment->N;
		$total+= $objAssessment->L + $objAssessment->E + $objAssessment->M + $objAssessment->O + $objAssessment->N;
	} else {
		$resultArray = Lemon50AssessmentResults::LoadArrayByAssessmentId($intAssessmentId);
		foreach($resultArray as $objResult) {
			$intIndex = $objResult->Question->LemonTypeId - 1;
			$lemonValues[$intIndex] += $objResult->Value;
			$total+= $objResult->Value;
		}
	}
}

$graph = new PieGraph(400,400);
$graph->SetShadow();

$graph->title->Set("Group Pie Chart");
$graph->SetUserFont('dejavu/DejaVuSans.ttf');
$graph->title->SetFont(FF_USERFONT,FS_NORMAL,18);

$pieColors = array('#6C98B0','#8AC16E','#FFD43F','#FCA343','#E66E24');
$lemonValues = array_reverse($lemonValues);
$pieColors = array_reverse($pieColors);
$p1 = new PiePlot3D($lemonValues);
$p1->SetSliceColors($pieColors);
$p1->SetSize(0.35);
$p1->SetCenter(0.5,0.4);
$p1->SetLabels(array("Networker\n%.1f%%","Organizer\n%.1f%%","Manager\n%.1f%%","Entrepreneur\n%.1f%%","Luminary\n%.1f%%"),1);
$p1->SetLabelType(PIE_VALUE_ADJPERCENTAGE);
$graph->graph_theme = null;
$graph->Add($p1);
$graph->Stroke();

?>
