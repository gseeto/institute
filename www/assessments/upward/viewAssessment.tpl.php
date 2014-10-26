<?php require('/../..'.__INCLUDES__ . '/header.inc.php'); ?>


<div class="section">
<p>
<?php $this->lblIntroduction->Render();?>
</p>
<?php  $this->btnReturn->Render(); ?>
<script type="text/javascript">

       	function DisplayChart(chartData) {
       		var chart;
       		
         // RADAR CHART
            chart = new AmCharts.AmRadarChart();
            chart.dataProvider = chartData;
            chart.categoryField = "P";
            chart.startDuration = 2;
            chart.colors = ['red','blue'];
            chart.addTitle("Education 7-P Assessment", 14, '#000000', 0, true);

            // VALUE AXIS
            var valueAxis = new AmCharts.ValueAxis();
            valueAxis.axisAlpha = 0.15;
            valueAxis.minimum = 0;
            valueAxis.dashLength = 3;
            valueAxis.axisTitleOffset = 20;
            valueAxis.gridCount = 5;
            chart.addValueAxis(valueAxis);

            // GRAPH
            var graph = new AmCharts.AmGraph();
            graph.valueField = "importance";
            graph.bullet = "round";
            graph.balloonText = "[[category]] Importance: [[value]]"
            chart.addGraph(graph);

            var graph2 = new AmCharts.AmGraph();
            graph2.valueField = "performance";
            graph2.bullet = "round";
            graph2.balloonText = "[[category]] Performance: [[value]]"
            chart.addGraph(graph2);
            
            // WRITE
            chart.write("chartdiv");
                   	}
    </script>
<div id="chartdiv" style="width:700px; height:500px;"></div>
<p>Large gaps between Importance and Performance indicate areas for improvement. Low scores in Importance may suggest areas you have not considered but may be beneficial in improving impact.</p>
<p>Your largest gap between Importance and Performance appears to be under <b><?php $this->lblDelta->Render();?></b>. This may indicate areas of improvement.</p>
<p>Your lowest score is under <b><?php $this->lblImportance->Render();?></b>. After reading the detailed description for this P you may discover opportunities not yet realized.</p>
<p>A detailed explanation of each of the 10 Drivers of Impact follow.</p>
<b>PURPOSE</b> 
<div style="left:100px; margin-bottom:20px;">The purpose of an organization radically affects the ability of that organization to have an impact. Many organizations spend countless months 
laboring over clarifying their products, when what they are lacking is a  purpose. 
Others have a stated purpose but lack clarity on the values that are essential to fulfilling the purpose.
</div>
<b>SERVICES</b>
<div style="left:100px; margin-bottom:20px;">
Products and services are key components of how the customer experiences the organization. 
Products create the "touch, see, and smell" factors that make an organization come alive. 
For non-profits and service organizations, products often take the form of programs.
</div>
<b>POSITIONING</b>
<div style="left:100px; margin-bottom:20px;">
If another organization creates an advantage - even if only in the perception of customers - then purpose, products and presence will not be enough. 
Establishing a clear positioning of both organization and products is essential. The value proposition of the organization and what differentiates 
it from others is essential to creating Impact.
</div>
<b>PRESENCE</b>
<div style="left:100px; margin-bottom:20px;">
Products consumed out of context do not carry the full Impact that the purveyor intends. 
Traditionally, marketing is intended to make consumers aware of their needs, and how particular products can fill those needs. 
Marketing  creates presence - a mind-set for the product or organization - and it builds a story and experience that goes beyond the simple consumption of the product. 
Presence results in Impact.
</div>
<b>PARTNERING</b>
<div style="left:100px; margin-bottom:20px;">
Numerous books and publications have demonstrated the benefits of partnering. Attempts at partnering have not occurred out of mutual admiration and togetherness. 
It  has been demanded by customers and made a condition of business that suppliers cooperate. Why? Because they know that no one company can do everything well. 
Partnering creates better Impact for organizations and their customers alike.
</div>

<b>PLACE</b>
<div style="left:100px; margin-bottom:20px;">
A company's location, the environment/image of the facilities, the corporate identity that goes beyond buildings, proximity to customers, 
partners, and others in one's ecosystem ... all of these can be used in the Place spoke of the Impact wheel. This is no less true for virtual organizations.
</div>
<b>PLANNING</b>
<div style="left:100px; margin-bottom:20px;">
Appropriate planning - not Strategy by Advertising - is still a crucial driver of Impact. The old adage is true: if you fail to plan, you plan to fail.
</div>


<?php   
	for($i=0; $i<7;$i++) {
?>
		<br>
		<h3><?php _p(UpwardCategoryType::$NameArray[$i+1]);?></h3>
	<?php 
		$this->dtgAssessmentResultsArray[$i]->Render();
	}
	?>
<br>
</div>
<?php require('/../..'.__INCLUDES__ . '/footer.inc.php'); ?>