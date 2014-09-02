<?php // content="text/plain; charset=utf-8"
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
require_once (dirname(__FILE__) . '/../../../includes/jpgraph/jpgraph.php');
require_once (dirname(__FILE__) . '/../../../includes/jpgraph/jpgraph_bar.php');
require_once (dirname(__FILE__) . '/../../../includes/jpgraph/jpgraph_table.php');

$intGender = QApplication::PathInfo(0);

// We need some data
$labelArray = array();
for($i=1; $i<6; $i++) {
	$labelArray[] = LemonType::ToString($i);
}
$lemonValues = array(0,0,0,0,0);
$objConditions = QQ::All();
if ($intGender == 0) {
	$objConditions = QQ::AndCondition($objConditions,QQ::Equal( QQN::LemonAssessment()->User->Gender, false)); 
} else {
	$objConditions = QQ::AndCondition($objConditions,QQ::Equal( QQN::LemonAssessment()->User->Gender, true));
}
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
$total = array_sum($lemonValues);

// Now generate percentages
$lemonValues[0]  = round(($lemonValues[0]/$total)*100, 2);
$lemonValues[1]  = round(($lemonValues[1]/$total)*100, 2);
$lemonValues[2]  = round(($lemonValues[2]/$total)*100, 2);
$lemonValues[3]  = round(($lemonValues[3]/$total)*100, 2);
$lemonValues[4]  = round(($lemonValues[4]/$total)*100, 2);

$datay = array($labelArray,$lemonValues);

// Some basic defines to specify the shape of the bar+table
$nbrbar = 5;
$cellwidth = 50;
$tableypos = 230;
$tablexpos = 30;
$tablewidth = $nbrbar*$cellwidth;
$rightmargin = 30;

// Overall graph size
$height = 380;
$width = ($tablexpos+$tablewidth+$rightmargin)*2;

// Create the basic graph. 
$graph = new Graph($width/2,$height);	
$graph->img->SetMargin($tablexpos,$rightmargin,30,$height-$tableypos);
$graph->SetScale("textlin");
$graph->SetMarginColor('white');

// Setup titles and fonts
if ($intGender == 0) {
	$graph->title->Set('FEMALE');
} else {
	$graph->title->Set('MALE');
}
$graph->SetUserFont('dejavu/DejaVuSans.ttf');
$graph->title->SetFont(FF_USERFONT,FS_NORMAL,18);
$graph->xaxis->HideLabels();

$bplot = new BarPlot($datay[1]);
$bplot->SetFillColor(array('#6C98B0','#8AC16E','#FFD43F','#FCA343','#E66E24'));
$bplot->SetColor("black");
$graph->graph_theme = null;
$graph->Add($bplot);

//Setup the table
$table = new GTextTable();
$table->Set($datay);
$table->SetPos($tablexpos,$tableypos+1);

// Basic table formatting
$table->SetFont(FF_USERFONT,FS_NORMAL,8);
$table->SetAlign('center');
$table->SetMinColWidth($cellwidth);
$table->SetNumberFormat('%0.1f');

// Format table header row
$table->SetRowFillColor(0,'teal@0.7');
$table->SetRowFont(0,FF_USERFONT,FS_NORMAL,9);
$table->SetRowAlign(0,'center');
$table->SetCellTextOrientation(0,0,90);
$table->SetCellTextOrientation(0,1,90);
$table->SetCellTextOrientation(0,2,90);
$table->SetCellTextOrientation(0,3,90);
$table->SetCellTextOrientation(0,4,90);

// .. and add it to the graph
$graph->Add($table);

$txt = 'Total # of users: '.$count;
$caption=new Text($txt,150,360); 
$caption->SetFont(FF_USERFONT,FS_NORMAL); 
$graph->AddText($caption); 

$graph->Stroke();

?>