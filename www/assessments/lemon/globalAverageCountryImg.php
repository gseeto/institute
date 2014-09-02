<?php // content="text/plain; charset=utf-8"
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
require_once (dirname(__FILE__) . '/../../../includes/jpgraph/jpgraph.php');
require_once (dirname(__FILE__) . '/../../../includes/jpgraph/jpgraph_pie.php');
require_once (dirname(__FILE__) . '/../../../includes/jpgraph/jpgraph_pie3d.php');

$total = 0;
$lemonValues = array(0,0,0,0,0);
$intCountry = QApplication::PathInfo(0);

$objCountry = CountryList::Load($intCountry);
$objConditions = QQ::All();
$objConditions = QQ::AndCondition($objConditions,QQ::Equal( QQN::LemonAssessment()->User->CountryId, $intCountry)); 
	
$objAssessmentCursor = LemonAssessment::QueryCursor($objConditions);
$count = $objAssessmentCursor->CountRows();
 while ($objLemon = LemonAssessment::InstantiateCursor($objAssessmentCursor)) {
 	if($objLemon->L) {
		$lemonValues[0] += $objLemon->L;
		$lemonValues[1] += $objLemon->E;
		$lemonValues[2] += $objLemon->M;
		$lemonValues[3] += $objLemon->O;
		$lemonValues[4] += $objLemon->N;
 	} else {
	 	$resultArray = LemonAssessmentResults::LoadArrayByAssessmentId($objLemon->Id);
		foreach($resultArray as $objResult) {
			$intIndex = $objResult->Question->LemonTypeId - 1;
			$lemonValues[$intIndex] += $objResult->Value;
		}
 	}
 }

$graph = new PieGraph(350,280);
$graph->SetShadow();
//$graph->SetMargin(1,1,1,1);
//$graph->SetMarginColor('silver');

$graph->title->Set($objCountry->Name);
$graph->SetUserFont('dejavu/DejaVuSans.ttf');
$graph->title->SetFont(FF_USERFONT,FS_NORMAL,18);

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
$caption=new Text($txt,180,240); 
$caption->SetFont(FF_USERFONT,FS_NORMAL); 
$graph->AddText($caption); 

$graph->Stroke();

?>
