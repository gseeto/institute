<?php // content="text/plain; charset=utf-8"
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_bar.php');

setlocale (LC_ALL, 'et_EE.ISO-8859-1');

$giantCount = array();
$giantKpi = array();
$intScorecardId = QApplication::PathInfo(0);
$objStrategyArray = Strategy::LoadArrayByScorecardId($intScorecardId);

// Get the associations and calculate
foreach(Strategy::LoadArrayByScorecardId($intScorecardId) as $objStrategy) {
	$giantArray = $objStrategy->GetGiantsAsGiantArray();
	foreach($giantArray as $objGiant) {
		if (array_keys($giantCount,$objGiant->Giant)) {
			$giantCount[$objGiant->Giant]++;
			$giantKpi[$objGiant->Giant] += $objStrategy->GetAverageKpiRating();
		} else {
			$giantCount[$objGiant->Giant] = 1;
			$giantKpi[$objGiant->Giant] = $objStrategy->GetAverageKpiRating();
		}
		
	}
}

$data1y=array();
$data2y=array();
$labels = array();
$i = 0;
foreach($giantCount as $key=>$value) {
	$data1y[$i] = ($value != 0)? ($giantKpi[$key]/$value)/5 * $value : 0;
	$data2y[$i] = ($value != 0)? $value - $data1y[$i] : 0;
	$labels[$i] = $key;
	$i++;
}

// Create the graph. These two calls are always required
$graph = new Graph(610,400);	
$graph->SetScale("textlin");

$graph->SetShadow();
$graph->img->SetMargin(80,30,40,80);

// Create the bar plots
$b1plot = new BarPlot($data1y);
$b1plot->SetFillgradient('#2C7CBA','#7AAED6',GRAD_VER); 
$b1plot->SetColor('#2C7CBA');
$b2plot = new BarPlot($data2y);
$b2plot->SetFillgradient('#93C0E2','#C0D6E5',GRAD_VER);
$b2plot->SetColor('#93C0E2');

// Create the grouped bar plot
$gbplot = new AccBarPlot(array($b1plot,$b2plot));

// ...and add it to the graPH
$graph->graph_theme = null;
$graph->Add($gbplot);

$graph->title->Set("Societal Impact Analysis");
$graph->yaxis->title->Set("# Of Strategies");
$graph->xaxis->SetTickLabels($labels);
$graph->xaxis->SetLabelAngle(45); // 45 degrees angle

$graph->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);

// Display the graph
$graph->Stroke();
?>
