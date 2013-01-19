<?php // content="text/plain; charset=utf-8"
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
require_once (dirname(__FILE__) . '/../../../includes/jpgraph/jpgraph.php');
require_once (dirname(__FILE__) . '/../../../includes/jpgraph/jpgraph_pie.php');
require_once (dirname(__FILE__) . '/../../../includes/jpgraph/jpgraph_pie3d.php');

$intScorecardId = QApplication::PathInfo(0);
$objStrategyArray = Strategy::LoadArrayByScorecardId($intScorecardId);
$intAssociatedCount = 0;
foreach($objStrategyArray as $objStrategy) {
	if ($objStrategy->CountSpheresesAsSphere() != 0) {
		$intAssociatedCount++;
	}
}

$data = array($intAssociatedCount,count($objStrategyArray)-$intAssociatedCount);

$graph = new PieGraph(300,300);
$graph->SetShadow();

$graph->title->Set("Spheres Involvement Level");
$graph->title->SetFont(FF_FONT1,FS_BOLD);

$pieColors = array('green','red');
$p1 = new PiePlot3D($data);
$p1->SetSliceColors($pieColors);
$p1->SetSize(0.45);
$p1->SetCenter(0.30);
$p1->SetLegends(array('Associated','Unassociated'));
$graph->graph_theme = null;
$graph->Add($p1);
$graph->Stroke();

?>
