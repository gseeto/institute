<?php require('/../..'.__INCLUDES__ . '/header.inc.php'); ?>
<script type="text/javascript">						
            function DisplayChart(chartData) {
            	//document.getElementById("chartdiv").style.display = "inline";
                // RADAR CHART
                var chart;
                chart = new AmCharts.AmRadarChart();
                chart.dataProvider = chartData;
                chart.categoryField = "P";
                chart.startDuration = 0;
                chart.colors = ['red','blue'];

                // TITLE
                chart.addTitle("Partnering Awareness Assessment", 15);

                // VALUE AXIS
                var valueAxis = new AmCharts.ValueAxis();
                valueAxis.gridType = "circles";
                valueAxis.fillAlpha = 0.05;
                valueAxis.fillColor = "#000000";
                valueAxis.axisAlpha = 0.2;
                valueAxis.gridAlpha = 0;
                valueAxis.fontWeight = "bold";
                valueAxis.minimum = 0;
                valueAxis.gridCount = 7;
                valueAxis.maximum = 7;
                chart.addValueAxis(valueAxis);


                // GRAPH
                var graph = new AmCharts.AmGraph();
                graph.lineColor = "red";
                graph.fillAlphas = 0.4;
                graph.bullet = "round";
                graph.valueField = "importance";
                graph.balloonText = "[[category]] Importance: [[importance]]";
                chart.addGraph(graph);

                var graph2 = new AmCharts.AmGraph();
                graph2.lineColor = "blue";
                graph2.fillAlphas = 0.4;
                graph2.bullet = "round";
                graph2.valueField = "performance";
                graph2.balloonText = "[[category]] Performance: [[performance]]";
                chart.addGraph(graph2);
             

                // WRITE                
                chart.write("chartdiv");
            }
                      
            function DisplayQuestions(id) {         
            	x = document.getElementsByClassName("Ps");	
            	for (i = 0; i < x.length; i++) {
            	    x[i].style.display = "none";
            	}
            	document.getElementById(id).style.display = "inline";
            }
        </script>

<div class="section">
<div id="chartdiv" style="width:400px; height:400px; margin: 0 auto; position: relative;"></div>
<p>
Please rate each statement below using the scale from 1 to 7 in the drop-down box to the right of the statement.<br>
<div style="padding-left:20px; margin-bottom:10px;">
1 - No, I do not agree, definitely not (even if the statement is negative)<br>
4 - Neutral, I neither agree nor disagree, maybe<br>
7 - Yes, I strongly agree, definitely<br>
</div>
<span style="color:#F90949;">IMPORTANCE: Please evaluate how important this statement is to the overall purpose and impact of your Company.</span>
<br>
<span style="color:#131BF9;">PERFORMANCE: Please evaluate how you feel you are currently performing relative to the importance you assigned.</span>
</p>
<?php $this->purpose->Render(); ?><?php $this->product->Render(); ?><?php $this->positioning->Render(); ?><?php $this->presence->Render(); ?><?php $this->partnering->Render(); ?><?php $this->process->Render(); ?><?php $this->people->Render(); ?><?php $this->place->Render(); ?><?php $this->planning->Render(); ?><?php $this->profit->Render(); ?>
<?php  
 
for($i=0; $i<10;$i++) {
?>
<div class="Ps" id="<?php _p(CategoryType::$NameArray[$i+1]);?>">
	<br>
	<h3><?php _p(CategoryType::$NameArray[$i+1]);?></h3>
<?php 
	$this->dtgAssessmentQuestionArray[$i]->Render();
?>
</div>
<?php 
}
?>
<br>
<?php  $this->btnPrev->Render(); ?>
<?php  $this->btnNext->Render(); ?>
<?php  $this->btnCancel->Render(); ?>
</div>
<?php require('/../..'.__INCLUDES__ . '/footer.inc.php'); ?>