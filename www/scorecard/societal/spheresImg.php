<?php // content="text/plain; charset=utf-8"
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
require_once (dirname(__FILE__) . '/../../../includes/jpgraph/jpgraph.php');
require_once (dirname(__FILE__) . '/../../../includes/jpgraph/jpgraph_bar.php');

setlocale (LC_ALL, 'et_EE.ISO-8859-1');

$sphereCount = array(0,0,0,0,0,0,0,0,0,0);
$sphereKpi = array(0,0,0,0,0,0,0,0,0,0);
$intScorecardId = QApplication::PathInfo(0);
$objStrategyArray = Strategy::LoadArrayByScorecardId($intScorecardId);

// Get the associations and calculate
foreach(Strategy::LoadArrayByScorecardId($intScorecardId) as $objStrategy) {
	$sphereArray = $objStrategy->GetSpheresAsSphereArray();
	foreach($sphereArray as $objSphere) {
		$sphereCount[$objSphere->Id-1]++;
		$sphereKpi[$objSphere->Id-1] += $objStrategy->GetAverageKpiRating();
	}
}

// Get the labels
$labels = array();
foreach(Spheres::LoadAll() as $objSphere) {
	$labels[] = $objSphere->Sphere;
}

$data1y=array();
$data2y=array();
for($i=0; $i<10;$i++) {
	$data1y[$i] = ($sphereCount[$i] != 0)? ($sphereKpi[$i]/$sphereCount[$i])/5 * $sphereCount[$i] : 0;
	$data2y[$i] = ($sphereCount[$i] != 0)? $sphereCount[$i] - $data1y[$i] : 0;
}

// Create the graph. These two calls are always required
$graph = new Graph(610,400);	
$graph->SetScale("textlin");

$graph->SetShadow();
$graph->img->SetMargin(80,30,40,80);

// Create the bar plots
$b1plot = new BarPlot($data1y);
$b1plot->SetShadow();
$b1plot->SetFillColor(array('#2C7CBA','#7938C4','#E84833','#EFBB0E','#E0E80D','#71D127','#13A31D','#20C0D6','#989B9B','#E53487'));
//$b1plot->SetFillgradient('#2C7CBA','#7AAED6',GRAD_VER); 
$b1plot->SetColor('#2C7CBA');
$b2plot = new BarPlot($data2y);
$b2plot->SetShadow();
$b2plot->SetNoFill();
//$b2plot->SetFillgradient('#93C0E2','#C0D6E5',GRAD_VER);
$b2plot->SetColor('#93C0E2');
$b2plot->SetFillColor(array('#93C0E2','#AA84D6','#EF9083','#EDD589','#E8EAA4','#B5E590','#76E87D','#93E0EA','#CFD5D6','#ED90BB'));



// Create the grouped bar plot
$gbplot = new AccBarPlot(array($b1plot,$b2plot));

// ...and add it to the graPH
$graph->graph_theme = null;
$graph->Add($gbplot);

$graph->title->Set("Spheres Of Society Analysis");
//$graph->xaxis->title->Set("Spheres Or Sectors");
$graph->xaxis->SetTickLabels($labels);
$graph->xaxis->SetLabelAngle(45); // 45 degrees angle
$graph->yaxis->title->Set("# Of Strategies");

$graph->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);

// Display the graph
$graph->Stroke();
?>
