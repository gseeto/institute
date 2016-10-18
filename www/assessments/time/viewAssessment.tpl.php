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
                chart.rotate = true;

                // AXES
                // category
                var categoryAxis = chart.categoryAxis;
                categoryAxis.labelRotation = 60;
                categoryAxis.dashLength = 5;
                categoryAxis.gridPosition = "start";

                // value
                var valueAxis = new AmCharts.ValueAxis();
                valueAxis.title = "Hours";
                valueAxis.dashLength = 5;
                valueAxis.maximum = 100;
                valueAxis.minimum = 0;
                chart.addValueAxis(valueAxis);

                // GRAPH            
                var graph = new AmCharts.AmGraph();
                graph.valueField = "result";
                graph.colorField = "color";
                graph.balloonText = "[[category]]: [[value]] Hrs";
                graph.type = "column";
                graph.lineAlpha = 0;
                graph.fillAlphas = 1;
                chart.addGraph(graph);

                // WRITE
                chart.write("chartdiv");
        }

       	function DisplayIntersectChart(userData) {
    		var chart;

           	// SERIAL CHART
                chart = new AmCharts.AmSerialChart();
                chart.dataProvider = userData;
                chart.categoryField = "category";
                // the following two lines makes chart 3D
                chart.depth3D = 20;
                chart.angle = 30;
                chart.rotate = true;

                // AXES
                // category
                var categoryAxis = chart.categoryAxis;
                categoryAxis.labelRotation = 60;
                categoryAxis.dashLength = 5;
                categoryAxis.gridPosition = "start";

                // value
                var valueAxis = new AmCharts.ValueAxis();
                valueAxis.title = "Hours";
                valueAxis.dashLength = 5;
                valueAxis.maximum = 100;
                valueAxis.minimum = 0;
                chart.addValueAxis(valueAxis);

                // GRAPH            
                var graph = new AmCharts.AmGraph();
                graph.valueField = "result";
                graph.colorField = "color";
                graph.balloonText = "[[category]]: [[value]] Hrs";
                graph.type = "column";
                graph.lineAlpha = 0;
                graph.fillAlphas = 1;
                chart.addGraph(graph);

                // WRITE
                chart.write("intersectchartdiv");
        }


        function DisplayPieChart(chartData,mytitle,div,size) {
        	var chart;
        	var legend;

        	// PIE CHART
            chart = new AmCharts.AmPieChart();
            chart.dataProvider = chartData;
            chart.titleField = "key";
            chart.valueField = "value";
            chart.outlineColor = "#FFFFFF";
            chart.outlineAlpha = 0.8;
            chart.outlineThickness = 1;
            chart.marginTop = 10;
            chart.marginLeft = 5;
            //chart.borderAlpha = 0.8;
            //chart.borderColor = "#CCCCCC";
            chart.colors = ['#1E375C','#605032'];
            chart.minRadius = size;
            chart.labelRadius = 5;
            chart.startAngle = 20;
            chart.addTitle("");
            chart.addTitle("");
            chart.addTitle("");
            chart.addTitle("");
            chart.addTitle("");
            chart.addTitle("");
            chart.addTitle(mytitle, 20, '#000000', 0.8, true);

            // WRITE
            chart.write(div);
        }
    </script>
<h2>Time Spent</h2>
<div id="chartdiv" style="width:700px; height:500px;"></div>
<br>
<p>This table indicates how your time is allocated across all 4 C's.
While Convergence is not about balance, uneven time allocation across the 4 C's may indicate that some reprioritization is necessary, or some paradigm shifts are required.
The amount of margin available can also be a good indicator of the degree of tension or stress in your life.</p>
<?php $this->txtCRecommendation->Render();?>
<br>
<h2>Intersection of the C's</h2>
<div id="intersectchartdiv" style="width:700px; height:500px;"></div>
<p>Greater amounts of time spent at the intersection of the C's is an indicator of the degree of convergence you have in your life.
This graph should indicate areas where greater integration would be beneficial.</p>
<p>As the percentage of time spent at the intersections increases, the opportunity for more margin should also arise.</p>
<br>
<h2>Combined Convergence Chart</h2>
<div id="Careerchartdiv" style="width: 400px; height: 400px; float:left;"></div>
<div id="Communitychartdiv" style="width: 400px; height: 400px; float:left;"></div>
<div id="Creativitychartdiv" style="width: 400px; height: 400px; float:left;"></div>
<div id="Callingchartdiv" style="width: 400px; height: 400px; float:left;"></div>
<div style="clear:both;"></div>
<br>
<p>This is a visual representation of both the time spent and the level of integration found in each of the 4 C's.
The size of the pie indicates the time spent in each of the C's. The larger the pie, the more time spent in that C.</p>
<p>The respective pie ratio indicates the degree to which that particular C is integrated with the remaining C's.
As the level of convergence and integration increases for each C, the respective ratios within the respective pies should increase in terms of percentage.
</p>
<br>
<?php 
	$this->dtgAssessmentResults->Render();
?>
</div>
<?php require('/../..'.__INCLUDES__ . '/footer.inc.php'); ?>