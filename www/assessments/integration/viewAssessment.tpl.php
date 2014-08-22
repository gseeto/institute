<?php require('/../..'.__INCLUDES__ . '/header.inc.php'); ?>


<div class="section">
<p>
<?php $this->lblIntroduction->Render();?>
</p>
<?php  $this->btnReturn->Render(); ?>
<script type="text/javascript">

       	function DisplayChart(userData) {
    		var chart;

           	// SERIAL CHART
                chart = new AmCharts.AmSerialChart();
                chart.dataProvider = userData;
                chart.categoryField = "category";
                // the following two lines makes chart 3D
                chart.depth3D = 20;
                chart.angle = 30;

                // AXES
                // category
                var categoryAxis = chart.categoryAxis;
                categoryAxis.labelRotation = 60;
                categoryAxis.dashLength = 5;
                categoryAxis.gridPosition = "start";

                // value
                var valueAxis = new AmCharts.ValueAxis();
                valueAxis.title = "Percentage";
                valueAxis.dashLength = 5;
                valueAxis.maximum = 100;
                valueAxis.minimum = 0;
                chart.addValueAxis(valueAxis);

                // GRAPH            
                var graph = new AmCharts.AmGraph();
                graph.valueField = "result";
                graph.colorField = "color";
                graph.balloonText = "[[category]]: [[value]] %";
                graph.type = "column";
                graph.lineAlpha = 0;
                graph.fillAlphas = 1;
                chart.addGraph(graph);

                // WRITE
                chart.write("chartdiv");
        }
    </script>
<div id="chartdiv" style="width:700px; height:500px;"></div>

<br>
<br>
<?php 
	$this->dtgAssessmentResults->Render();
?>
</div>
<?php require('/../..'.__INCLUDES__ . '/footer.inc.php'); ?>