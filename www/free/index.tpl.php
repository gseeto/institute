<?php require('/..'.__INCLUDES__ . '/externPheader.inc.php'); ?>
<script type="text/javascript">
			function DisplayBike(backWheel, frontWheel) {
			    // RADAR CHART
			    var chart;
			    chart = new AmCharts.AmRadarChart();
			    chart.dataProvider = backWheel;
			    chart.categoryField = "P";
			    chart.startDuration = 0;
			    chart.colors = ['red','blue'];
			
			    // TITLE
			    chart.addTitle("10-P Sample Assessment", 15);
			
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
			    graph.balloonText = "Importance: [[importance]]";
			    chart.addGraph(graph);
			
			    var graph2 = new AmCharts.AmGraph();
			    graph2.lineColor = "blue";
			    graph2.fillAlphas = 0.4;
			    graph2.bullet = "round";
			    graph2.valueField = "performance";
			    graph2.balloonText = "Performance: [[performance]]";
			    chart.addGraph(graph2);
			 
			
			    // WRITE                
			    chart.write("backdiv");
			    /***********/
			 // RADAR CHART
                var chart2;
                chart2 = new AmCharts.AmRadarChart();
                chart2.dataProvider = frontWheel;
                chart2.categoryField = "P";
                chart2.startDuration = 0;
                chart2.colors = ['red','blue'];

                // TITLE
                chart2.addTitle("10-F Sample Assessment", 15);

                // VALUE AXIS
                var valueAxisF = new AmCharts.ValueAxis();
                valueAxisF.gridType = "circles";
                valueAxisF.fillAlpha = 0.05;
                valueAxisF.fillColor = "#000000";
                valueAxisF.axisAlpha = 0.2;
                valueAxisF.gridAlpha = 0;
                valueAxisF.fontWeight = "bold";
                valueAxisF.minimum = 0;
                valueAxisF.gridCount = 7;
                valueAxisF.maximum = 7;
                chart2.addValueAxis(valueAxisF);


                // GRAPH
                var graphf = new AmCharts.AmGraph();
                graphf.lineColor = "red";
                graphf.fillAlphas = 0.4;
                graphf.bullet = "round";
                graphf.valueField = "importance";
                graphf.balloonText = "Importance: [[importance]]";
                chart2.addGraph(graphf);

                var graphf2 = new AmCharts.AmGraph();
                graphf2.lineColor = "blue";
                graphf2.fillAlphas = 0.4;
                graphf2.bullet = "round";
                graphf2.valueField = "performance";
                graphf2.balloonText = "Performance: [[performance]]";
                chart2.addGraph(graphf2);
             

                // WRITE                
                chart2.write("frontdiv");
                
                // shut down chartdiv to stop formatting issues
                document.getElementById("chartdiv").style.display = "none";
               
			}
			
            function DisplayChart(chartData) {
            	document.getElementById("chartdiv").style.display = "inline";
                // RADAR CHART
                var chart;
                chart = new AmCharts.AmRadarChart();
                chart.dataProvider = chartData;
                chart.categoryField = "P";
                chart.startDuration = 0;
                chart.colors = ['red','blue'];

                // TITLE
                chart.addTitle("10-P Sample Assessment", 15);

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
                graph.balloonText = "Importance: [[importance]]";
                chart.addGraph(graph);

                var graph2 = new AmCharts.AmGraph();
                graph2.lineColor = "blue";
                graph2.fillAlphas = 0.4;
                graph2.bullet = "round";
                graph2.valueField = "performance";
                graph2.balloonText = "Performance: [[performance]]";
                chart.addGraph(graph2);
             

                // WRITE                
                chart.write("chartdiv");
            }

            function DisplayFChart(chartData) {
            	document.getElementById("chartdiv").style.display = "inline";
                // RADAR CHART
                var chart;
                chart = new AmCharts.AmRadarChart();
                chart.dataProvider = chartData;
                chart.categoryField = "P";
                chart.startDuration = 0;
                chart.colors = ['red','blue'];

                // TITLE
                chart.addTitle("10-F Sample Assessment", 15);

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
                graph.balloonText = "Importance: [[importance]]";
                chart.addGraph(graph);

                var graph2 = new AmCharts.AmGraph();
                graph2.lineColor = "blue";
                graph2.fillAlphas = 0.4;
                graph2.bullet = "round";
                graph2.valueField = "performance";
                graph2.balloonText = "Performance: [[performance]]";
                chart.addGraph(graph2);
             

                // WRITE                
                chart.write("chartdiv");
            }
            function HideChart() {
            	document.getElementById("chartdiv").innerHTML ='';
            	document.getElementById("frontdiv").innerHTML ='';
            	document.getElementById("backdiv").innerHTML ='';
            }
        </script>
        <div style="position:relative; top:0px; overflow: auto; padding-bottom:20px;">
        <?php $this->page1->Render(); ?><?php $this->page2->Render(); ?><?php $this->page3->Render(); ?><?php $this->page4->Render(); ?>
        </div>
        <div style="padding:20px;">
        <?php $this->txtSummary->render();?>
        </div>
        <div style="width:500px; position:relative; float:left; padding-left:20px; padding-bottom:20px;">
        <?php $this->txtIntro->Render(); $this->btnPage1Next->Render();?>
		<?php $this->txtPAssessmentIntro->Render(); $this->dtgPAssessment->Render(); $this->btnPage2Prev->Render(); $this->btnPage2Next->Render();?>
		
		<?php $this->txtFAssessmentIntro->Render(); $this->dtgFAssessment->Render(); $this->btnPage3Prev->Render(); $this->btnPage3Next->Render();?>
		</div>
<div style="width:450px; float:left; padding-left:20px; overflow:auto;">
<?php $this->imgInfo->Render(); ?>
<div id="chartdiv" style="width:400px; height:400px;"></div>
<?php $this->txtPDefinitions->Render(); $this->txtFDefinitions->Render();?>
</div>
<div style="overflow:auto; padding-left:20px; padding-right:20px; width:900px;">
	<div style="height:100px;"></div>
	<?php $this->imgFrame->Render();?>
	<div id="backdiv" style="width:400px; height:400px; overflow:auto; float:left;"></div>
	<div id="frontdiv" style="width:400px; height:400px; overflow:auto; float:left;"></div>	
	<?php $this->btnPage4Prev->Render();?>
</div>

<?php require(__INCLUDES__ . '/footer.inc.php'); ?>