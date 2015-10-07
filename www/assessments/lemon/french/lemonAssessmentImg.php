<?php // content="text/plain; charset=utf-8"
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
require_once (dirname(__FILE__) . '/../../../includes/jpgraph/jpgraph.php');
require_once (dirname(__FILE__) . '/../../../includes/jpgraph/jpgraph_bar.php');
require_once (dirname(__FILE__) . '/../../../includes/jpgraph/jpgraph_table.php');

// We need some data
$labelArray = array();
$lemonValues = array(0,0,0,0,0);
$intAssessmentId = QApplication::PathInfo(0);
for($i=1; $i<6; $i++) {
	$labelArray[] = LemonType::ToString($i);
}
$objAssessment = LemonAssessment::Load($intAssessmentId);
$title = $objAssessment->User->FirstName.' '.$objAssessment->User->LastName;
if($objAssessment->L) {
	$lemonValues[0] = $objAssessment->L;
	$lemonValues[1] = $objAssessment->E;
	$lemonValues[2] = $objAssessment->M;
	$lemonValues[3] = $objAssessment->O;
	$lemonValues[4] = $objAssessment->N;
} else {
	$resultArray = LemonAssessmentResults::LoadArrayByAssessmentId($intAssessmentId);
	foreach($resultArray as $objResult) {
		$intIndex = $objResult->Question->LemonTypeId - 1;
		$lemonValues[$intIndex] += $objResult->Value;
	}
	// Save the values if they haven't already been saved.
	$objAssessment->L = $lemonValues[0];
	$objAssessment->E = $lemonValues[1];
	$objAssessment->M = $lemonValues[2];
	$objAssessment->O = $lemonValues[3];
	$objAssessment->N = $lemonValues[4];
	$objAssessment->Save();	
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
$graph->title->Set('LEMON Results for '.$title);
$graph->SetUserFont('dejavu/DejaVuSans.ttf');
$graph->title->SetFont(FF_USERFONT,FS_NORMAL,18);
$graph->title->SetColor('#808080');
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
$table->SetFont(FF_USERFONT,FS_NORMAL,10);
$table->SetAlign('center');
$table->SetMinColWidth($cellwidth);
$table->SetNumberFormat('%0.1f');

// Format table header row
$table->SetRowFillColor(0,'teal@0.7');
$table->SetRowFont(0,FF_USERFONT,FS_NORMAL,11);
$table->SetRowAlign(0,'center');

// .. and add it to the graph
$graph->Add($table);
//$graph->Stroke();

// Get the handler to prevent the library from sending the
// image to the browser
$gdImgHandler = $graph->Stroke(_IMG_HANDLER);

// Stroke image to a file and browser

// Default is PNG so use ".png" as suffix
$fileName =  __UPLOAD_DIR__.'/Lemon' . $intAssessmentId. '.png';
$graph->img->Stream($fileName);

// Send it back to browser
$graph->img->Headers();
$graph->img->Stream();
?>