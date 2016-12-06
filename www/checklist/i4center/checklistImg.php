<?php // content="text/plain; charset=utf-8"
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
require_once (dirname(__FILE__) . '/../../../includes/jpgraph/jpgraph.php');
require_once (dirname(__FILE__) . '/../../../includes/jpgraph/jpgraph_bar.php');
require_once (dirname(__FILE__) . '/../../../includes/jpgraph/jpgraph_table.php');

// We need some data
$labelArray = array();
$checklistValues = array();
$intChecklistId = QApplication::PathInfo(0);
$title =  BusinessChecklist::Load($intChecklistId)->Company->Name;
$colorArray = array('#801F15','#550800','#D4746A','#552600','#804415','#D4996A','#554800','#807015','#D4C56A','#375000','#597814','#A8C764','#061339','#162656','#50608F','#240339','#3B1255','#744B8E','#430029','#641143','#A75486'); 
$checklistCategories = ChecklistCategories::LoadAll();
for($i=0; $i<count($checklistCategories); $i++) {			
	$resultArray = BusinessChecklistResults::LoadArrayByChecklistIdAndCategory($intChecklistId,$i+1);
	$total = 0;
	foreach( $resultArray as $objResult) {
		$total += $objResult->Value;
	}
	$labelArray[] = $checklistCategories[$i]->Value;
	$checklistValues[] = (count($resultArray))? round($total/count($resultArray), 2) : 0;		
}
		
$datay = array($labelArray,$checklistValues);

// Some basic defines to specify the shape of the bar+table
$nbrbar = count($checklistCategories);
$cellwidth = 110;
$tableypos = 300;
$tablexpos = 60;
$tablewidth = $nbrbar*$cellwidth;
$rightmargin = 30;

// Overall graph size
$height = 450;
$width = $tablexpos+$tablewidth+$rightmargin;

// Create the basic graph. 
$graph = new Graph($width,$height);	
$graph->img->SetMargin($tablexpos,$rightmargin,30,$height-$tableypos);
$graph->SetScale("textlin");
$graph->SetMarginColor('white');

// Setup titles and fonts
$graph->title->Set('Checklist Status for '.$title);
$graph->SetUserFont('dejavu/DejaVuSans.ttf');
$graph->title->SetFont(FF_USERFONT,FS_NORMAL,18);
$graph->title->SetColor('#808080');
//$graph->xaxis->HideLabels();

// Setup X-axis labels
$graph->xaxis->SetTickLabels($labelArray);
$graph->xaxis->SetLabelAngle(45);
$graph->xaxis->SetFont(FF_USERFONT,FS_NORMAL,8);


$bplot = new BarPlot($datay[1]);
$bplot->SetFillColor($colorArray);
$bplot->SetColor("black");
$graph->graph_theme = null;
$graph->Add($bplot);

// Get the handler to prevent the library from sending the
// image to the browser
$gdImgHandler = $graph->Stroke(_IMG_HANDLER);

// Stroke image to a file and browser

// Default is PNG so use ".png" as suffix
$fileName =  __UPLOAD_DIR__.'/Checklist' . $intChecklistId. '.png';
$graph->img->Stream($fileName);

// Send it back to browser
$graph->img->Headers();
$graph->img->Stream();
?>