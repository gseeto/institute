<?php // content="text/plain; charset=utf-8"
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
require_once (dirname(__FILE__) . '/../../../includes/jpgraph/jpgraph.php');
require_once (dirname(__FILE__) . '/../../../includes/jpgraph/jpgraph_bar.php');
require_once (dirname(__FILE__) . '/../../../includes/jpgraph/jpgraph_table.php');

// We need some data
$labelArray = array();
$lemonValues = array(0,0,0,0,0);

for($i=1; $i<6; $i++) {
	$labelArray[] = LemonType::ToString($i);
}

$total = 0;
$strArgs = substr(QApplication::$PathInfo, 1 );
$assessmentArray = explode('/',$strArgs);
foreach($assessmentArray as $intAssessmentId) {
	$objAssessment = LemonloversAssessment::Load($intAssessmentId);
	if($objAssessment->L) {
		$lemonValues[0] += $objAssessment->L;
		$lemonValues[1] += $objAssessment->E;
		$lemonValues[2] += $objAssessment->M;
		$lemonValues[3] += $objAssessment->O;
		$lemonValues[4] += $objAssessment->N;
		$total+= $objAssessment->L + $objAssessment->E + $objAssessment->M + $objAssessment->O + $objAssessment->N;
	} else {
		$resultArray = LemonloversAssessmentResults::LoadArrayByAssessmentId($intAssessmentId);
		foreach($resultArray as $objResult) {
			$intIndex = $objResult->Question->LemonTypeId - 1;
			$lemonValues[$intIndex] += $objResult->Value;
			$total+= $objResult->Value;
		}
	}
}

// Get percentages of all the slices - or lets get the average for each type instead
for($i=0; $i<5; $i++) {
	$lemonValues[$i] = ($lemonValues[$i]/$total)*100;
	//$lemonValues[$i] = ($lemonValues[$i]/count($assessmentArray));
}


$datay = array($labelArray,$lemonValues);

// Some basic defines to specify the shape of the bar+table
$nbrbar = 5;
$cellwidth = 110;
$tableypos = 300;
$tablexpos = 60;
$tablewidth = $nbrbar*$cellwidth;
$rightmargin = 30;

// Overall graph size
$height = 350;
$width = $tablexpos+$tablewidth+$rightmargin;

// Create the basic graph. 
$graph = new Graph($width,$height);	
$graph->img->SetMargin($tablexpos,$rightmargin,30,$height-$tableypos);
$graph->SetScale("textlin");
$graph->SetMarginColor('white');

// Setup titles and fonts
$graph->title->Set('LEMON Results');
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
$table->SetNumberFormat('%0.2f');

// Format table header row
$table->SetRowFillColor(0,'teal@0.7');
$table->SetRowFont(0,FF_USERFONT,FS_NORMAL,9);
$table->SetRowAlign(0,'center');

// .. and add it to the graph
$graph->Add($table);
$graph->Stroke();

?>