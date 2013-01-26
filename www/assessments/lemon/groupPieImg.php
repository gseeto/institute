<?php // content="text/plain; charset=utf-8"
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
require_once (dirname(__FILE__) . '/../../../includes/jpgraph/jpgraph.php');
require_once (dirname(__FILE__) . '/../../../includes/jpgraph/jpgraph_pie.php');
require_once (dirname(__FILE__) . '/../../../includes/jpgraph/jpgraph_pie3d.php');

$total = 0;
$lemonValues = array(0,0,0,0,0);
$categoriesArray = array();
for($i=1; $i<6; $i++) {
	$categoriesArray[] = LemonType::ToString($i);
}
$strArgs = substr(QApplication::$PathInfo, 1 );
$assessmentArray = explode('/',$strArgs);
foreach($assessmentArray as $intAssessmentId) {
	$resultArray = LemonAssessmentResults::LoadArrayByAssessmentId($intAssessmentId);
	foreach($resultArray as $objResult) {
		$intIndex = $objResult->Question->LemonTypeId - 1;
		$lemonValues[$intIndex] += $objResult->Value;
		$total+= $objResult->Value;
	}
}

$graph = new PieGraph(400,400);
$graph->SetShadow();

$graph->title->Set("Group Pie Chart");
$graph->title->SetFont(FF_FONT1,FS_BOLD);

$pieColors = array('#6C98B0','#8AC16E','#FFD43F','#FCA343','#E66E24');
$p1 = new PiePlot3D($lemonValues);
$p1->SetSliceColors($pieColors);
$p1->SetSize(0.40);
$p1->SetCenter(0.5);
$p1->SetLegends($categoriesArray);
$graph->graph_theme = null;
$graph->Add($p1);
$graph->Stroke();

?>
