<?php require('/..'.__INCLUDES__ . '/header.inc.php'); ?>

<h1>The <?php _p($this->objScorecard->Name);?> Scorecard</h1>
<br>
<div class="scorecardnavbar"><ul class="scorecardnavbar">
<?php 
	// Display the Scorecard Navigation Menu
	$intWidth = floor(550 / count(InstituteForm::$NavScorecardArray));
	foreach (InstituteForm::$NavScorecardArray as $NavScorecardId => $strNavScorecardArray) {
		$strClassInfo = ($NavScorecardId == $this->intNavScorecardId) ? 'class="selected"' : null;
		if ($NavScorecardId == InstituteForm::NavScorecardGlobal) {
			if (QApplication::$Login->IsAdmin())
				printf('<li style="width: %spx;"><a href="%s%s/%s" %s title="%s">%s</a></li>',
				$intWidth, __SUBDIRECTORY__,$strNavScorecardArray[1],$this->objScorecard->Id, $strClassInfo, $strNavScorecardArray[0], $strNavScorecardArray[0]
				);
		} else {
			printf('<li style="width: %spx;"><a href="%s%s/%s" %s title="%s">%s</a></li>',
				$intWidth, __SUBDIRECTORY__,$strNavScorecardArray[1],$this->objScorecard->Id, $strClassInfo, $strNavScorecardArray[0], $strNavScorecardArray[0]
			);
		}
	}
?>
</ul></div>
<?php 
	foreach($this->btnCategoryArray as $btnCategory) {
		$btnCategory->Render();		
	}
?>
<div class='pcontent'>
<script type="text/javascript">

       function DisplayChart(userData) {
    		var chart;

           	// SERIAL CHART
                chart = new AmCharts.AmSerialChart();
                chart.dataProvider = userData;
                chart.categoryField = "P";
                // the following two lines makes chart 3D
                chart.depth3D = 20;
                chart.angle = 30;

                // AXES
                // category
                var categoryAxis = chart.categoryAxis;
                categoryAxis.labelRotation = 90;
                categoryAxis.dashLength = 5;
                categoryAxis.gridPosition = "start";

                // value
                var valueAxis = new AmCharts.ValueAxis();
                valueAxis.title = "Average KPI";
                valueAxis.dashLength = 5;
                valueAxis.maximum = 5;
                chart.addValueAxis(valueAxis);

                // GRAPH            
                var graph = new AmCharts.AmGraph();
                graph.valueField = "Kpi";
                graph.colorField = "color";
                graph.balloonText = "[[category]]: [[value]] KPI Average";
                graph.type = "column";
                graph.lineAlpha = 0;
                graph.fillAlphas = 1;
                chart.addGraph(graph);

                // WRITE
                chart.write("chartContainer");
        }
</script>

<div id="chartContainer" style="width: 800px; height: 400px; margin-top:20px;"></div>

<?php 
	foreach($this->dtgPArray as $dtgP) {
		$dtgP->Render();
	}
?>
</div>
<?php require(__INCLUDES__ . '/footer.inc.php'); ?>