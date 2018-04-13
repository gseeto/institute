<?php // content="text/plain; charset=utf-8"
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');
require_once (dirname(__FILE__) . '/../../../includes/jpgraph/jpgraph.php');
require_once (dirname(__FILE__) . '/../../../includes/jpgraph/jpgraph_bar.php');

setlocale (LC_ALL, 'et_EE.ISO-8859-1');
$labels = array();
for($i=1; $i<6; $i++) {
	$labels[] = LemonType::ToString($i);
}
$data1y=array(0,0,0,0,0);
$data2y=array(0,0,0,0,0);
$strArgs = substr(QApplication::$PathInfo, 1 );
$assessmentArray = explode('/',$strArgs);
foreach($assessmentArray as $intAssessmentId) {
	$lemonValues = array();
	$objAssessment = LemonloversAssessment::Load($intAssessmentId);
	if($objAssessment->L) {
		$lemonValues['Luminary'] = $objAssessment->L;
		$lemonValues['Entrepreneur'] = $objAssessment->E;
		$lemonValues['Manager'] = $objAssessment->M;
		$lemonValues['Organizer'] = $objAssessment->O;
		$lemonValues['Networker'] = $objAssessment->N;
	} else {
		$resultArray = LemonloversAssessmentResults::LoadArrayByAssessmentId($intAssessmentId);
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
$b2plot->SetFillColor(array('#6C98B0@0.6','#8AC16E@0.6','#FFD43F@0.6','#FCA343@0.6','#E66E24@0.6'));



// Create the grouped bar plot
$gbplot = new AccBarPlot(array($b1plot,$b2plot));

// ...and add it to the graPH
$graph->graph_theme = null;
$graph->Add($gbplot);

$graph->title->Set("First And Second Slices");
$graph->SetUserFont('dejavu/DejaVuSans.ttf');
$graph->title->SetFont(FF_USERFONT,FS_NORMAL,18);

//$graph->xaxis->title->Set("Spheres Or Sectors");
$graph->xaxis->SetTickLabels($labels);
$graph->xaxis->SetLabelAngle(45); // 45 degrees angle

$graph->yaxis->title->SetFont(FF_USERFONT,FS_NORMAL);
$graph->xaxis->title->SetFont(FF_USERFONT,FS_NORMAL);

// Display the graph
$graph->Stroke();
?>
