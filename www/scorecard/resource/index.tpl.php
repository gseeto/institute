<?php require('/../..'.__INCLUDES__ . '/header.inc.php'); ?>

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

 <script type="text/javascript">

       function DisplayChart(userData) {
            var chart = new AmCharts.AmSerialChart();
            chart.dataProvider = userData;
            chart.categoryField = "name";
            chart.marginTop = 20;
            chart.marginLeft = 55;
            chart.marginRight = 15;
            chart.marginBottom = 80;
            chart.angle = 30;
            chart.depth3D = 15;
            //chart.color = "#AAAAAA";

            var catAxis = chart.categoryAxis;
            catAxis.gridCount = userData.length;
            catAxis.labelRotation = 90;

            // value
            var valueAxis = new AmCharts.ValueAxis();
            valueAxis.title = "# of Action Items";
            valueAxis.dashLength = 5;
            chart.addValueAxis(valueAxis);

            var graph = new AmCharts.AmGraph();
            graph.balloonText = "[[category]]: [[value]] Action Items";
            graph.valueField = "Actions"
            graph.type = "column";
            graph.lineAlpha = 0;
            graph.fillAlphas = 0.8;
            graph.fillColor = "#3a81ec";
            graph.lineColor = "#3a81ec";
            chart.addGraph(graph);

            chart.write('chartContainer');
        }

       	function DisplayAllocation(userData) {
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
            valueAxis.title = "# of Action Items";
            valueAxis.dashLength = 5;
            chart.addValueAxis(valueAxis);

            // GRAPH            
            var graph = new AmCharts.AmGraph();
            graph.valueField = "Actions";
            graph.colorField = "color";
            graph.balloonText = "[[category]]: [[value]] Action Items";
            graph.type = "column";
            graph.lineAlpha = 0;
            graph.fillAlphas = 1;
            chart.addGraph(graph);

            // WRITE
            chart.write("allocationContainer");
       	}
    </script>
<div id="chartContainer" style="width: 800px; height: 400px;"></div>

<div class="section">
<h2>Individual Information</h2>
<?php  $this->lstIndividuals->RenderWithName();?>
<?php 
	$this->lblTitle->Render();
	$this->lblStatistics->Render();
	$this->lblStrategies->Render();
	$this->dtgStrategies->Render();
	
	$this->lblTotalActionItems->Render();
	
	$this->lblZeroPct->Render();
	$this->dtgZeroPct->Render();
	$this->lblTwentyFivePct->Render();
	$this->dtgTwentyFivePct->Render();
	$this->lblFiftyPct->Render();
	$this->dtgFiftyPct->Render();
	$this->lblSeventyFivePct->Render();
	$this->dtgSeventyFivePct->Render();
	$this->lblHundredPct->Render();
	$this->dtgHundredPct->Render();
	$this->lblRecurringPct->Render();
	$this->dtgRecurringPct->Render();
	
	$this->lblOverdue->Render();
	$this->dtgOverdue->Render();
	
	$this->lblPriorityHigh->Render();
	$this->dtgPriorityHigh->Render();
	$this->lblPriorityMedium->Render();
	$this->dtgPriorityMedium->Render();
	$this->lblPriorityLow->Render();
	$this->dtgPriorityLow->Render();
	$this->lblPriorityNone->Render();
	$this->dtgPriorityNone->Render();
	
	$this->lblForecast->Render();
	$this->lblForecastTenDay->Render();
	$this->dtgForecastTenDay->Render();
	$this->lblForecastThirtyDay->Render();
	$this->dtgForecastThirtyDay->Render();
	
	$this->lblDebug->Render();
?>
<div id="allocationContainer" style="width: 640px; height: 400px;"></div>
<br>
</div>
<?php require('/../..'.__INCLUDES__ . '/footer.inc.php'); ?>