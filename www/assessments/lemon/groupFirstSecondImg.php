<?php // content="text/plain; charset=utf-8"
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
require_once (dirname(__FILE__) . '/../../../includes/jpgraph/jpgraph.php');
require_once (dirname(__FILE__) . '/../../../includes/jpgraph/jpgraph_bar.php');

setlocale (LC_ALL, 'et_EE.ISO-8859-1');

/*$sphereCount = array(0,0,0,0,0,0,0,0,0,0);
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
*/

$labels = array();
for($i=1; $i<6; $i++) {
	$labels[] = LemonType::ToString($i);
}
$data1y=array(0,0,0,0,0);
$data2y=array(0,0,0,0,0);
$strArgs = substr(QApplication::$PathInfo, 1 );
$assessmentArray = explode('/',$strArgs);
foreach($assessmentArray as $intAssessmentId) {
	$resultArray = LemonAssessmentResults::LoadArrayByAssessmentId($intAssessmentId);
	$lemonValues = array();
	foreach($resultArray as $objResult) {
		$intLemonType = $objResult->Question->LemonTypeId;
		switch($intLemonType) {
			case 1:
				$key = 'Luminary';
				break;
			case 2:
				$key = 'Entrepreneur';
				break;
			case 3:
				$key = 'Manager';
				break;
			case 4:
				$key = 'Organizer';
				break;
			case 5:
				$key = 'Networker';
				break;
		}
		if(array_key_exists($key,$lemonValues)) {
			$lemonValues[$key] += $objResult->Value;
		} else {
			$lemonValues[$key] = $objResult->Value;
		}
	}
	$i=1;
	arsort($lemonValues,SORT_NUMERIC);	
	foreach($lemonValues as $key=>$value) {
		if(($i==1) ||($i==2)) {
			switch($key) {
				case 'Luminary':
					if($i==1) 
						$data1y[0] += 1;
					else 
						$data2y[0] += 1;
					break;
				case 'Entrepreneur':
					if($i==1) 
						$data1y[1] += 1;
					else 
						$data2y[1] += 1;
					break;
				case 'Manager':
					if($i==1) 
						$data1y[2] += 1;
					else 
						$data2y[2] += 1;
					break;
				case 'Organizer':
					if($i==1) 
						$data1y[3] += 1;
					else 
						$data2y[3] += 1;
					break;
				case 'Networker':
					if($i==1) 
						$data1y[4] += 1;
					else 
						$data2y[4] += 1;
					break;
			}	
		}
		$i++;
	}
	
}

// Create the graph. These two calls are always required
$graph = new Graph(610,400);	
$graph->SetScale("textlin");
$graph->yaxis->scale->ticks->Set(1.0);

$graph->SetShadow();
$graph->img->SetMargin(80,30,40,80);

// Create the bar plots
// Primary
$b1plot = new BarPlot($data1y);
$b1plot->SetShadow();
$b1plot->SetFillColor(array('#6C98B0','#8AC16E','#FFD43F','#FCA343','#E66E24'));

//Secondary
$b1plot->SetColor('#2C7CBA');
$b2plot = new BarPlot($data2y);
$b2plot->SetShadow();
$b2plot->SetNoFill();

$b2plot->SetColor('#93C0E2');
$b2plot->SetFillColor(array('#7fa5ba','#99c981','#ffda58','#ffcc8c','#f2bd7d'));



// Create the grouped bar plot
$gbplot = new AccBarPlot(array($b1plot,$b2plot));

// ...and add it to the graPH
$graph->graph_theme = null;
$graph->Add($gbplot);

$graph->title->Set("First And Second Slices");
//$graph->xaxis->title->Set("Spheres Or Sectors");
$graph->xaxis->SetTickLabels($labels);
$graph->xaxis->SetLabelAngle(45); // 45 degrees angle

$graph->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);

// Display the graph
$graph->Stroke();
?>
