<?php require('/../..'.__INCLUDES__ . '/header.inc.php'); ?>


<div class="section">
<p>
<?php $this->lblIntroduction->Render();?>
</p>
<?php  $this->btnReturn->Render(); ?>&nbsp;&nbsp;&nbsp;
<?php  $this->btnGeneratePdf->Render(); ?>
<script type="text/javascript">

       	function DisplayChart(chartData) {
       		var chart;
       		
         // RADAR CHART
            chart = new AmCharts.AmRadarChart();
            chart.dataProvider = chartData;
            chart.categoryField = "P";
            chart.startDuration = 2;
            chart.colors = ['red','blue'];
            chart.addTitle("Post Venture Assessment", 14, '#000000', 0, true);

            // VALUE AXIS
            var valueAxis = new AmCharts.ValueAxis();
            valueAxis.gridType = "circles";
            valueAxis.fillAlpha = 0.05;
            valueAxis.fillColor = "#000000";
            valueAxis.axisAlpha = 0.2;
            valueAxis.gridAlpha = 0;
            valueAxis.fontWeight = "bold";
            valueAxis.autoGridCount = false;
            valueAxis.minimum = 0;
            valueAxis.gridCount = 7;
            valueAxis.maximum = 7;
            valueAxis.strictMinMax = true;
            chart.addValueAxis(valueAxis);

            // GRAPH
            var graph = new AmCharts.AmGraph();
            graph.valueField = "importance";
            graph.bullet = "round";
            graph.bulletAlpha = 0.7;
            graph.fillAlphas = 0.4;
            graph.balloonText = "[[category]] Importance: [[value]]"
            chart.addGraph(graph);

            var graph2 = new AmCharts.AmGraph();
            graph2.valueField = "performance";
            graph2.bullet = "round";
            graph2.bulletAlpha = 0.7;
            graph2.fillAlphas = 0.4;
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
<b>PRODUCTS</b>
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
<b>PROCESSES</b>
<div style="left:100px; margin-bottom:20px;">
Process is a driver of Impact for all organizations. Core business processes can either be handled just efficiently, or they can be deliberately directed towards the creation 
of Impact. Decision-making is an important aspect of business processes. With the ever-increasing information component of products, the location, speed, and quality 
of decision-making processes are influencing customers' perceptions of value.
</div>
<b>PEOPLE</b>
<div style="left:100px; margin-bottom:20px;">
People have a tremendous effect on the Impact of the organization. When people - including the way in which they are organized - are thoroughly aligned with the 
Purpose of the organization, Impact is heightened.
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
<b>PROFIT</b>
<div style="left:100px; margin-bottom:20px;">
The economic model of a organization is clearly essential. Transitioning profit from an accounting tool to a strategic weapon is the habit of champions. 
Sustainable impact is best achieved in concert with sustainable economics.
</div>

<?php   
	for($i=0; $i<10;$i++) {
?>
		<br>
		<h3><?php _p(CategoryType::$NameArray[$i+1]);?></h3>
	<?php 
		$this->dtgAssessmentResultsArray[$i]->Render();
	}
	?>
<br>
</div>
<div style="visibility:hidden;">
<img src='<?php _p(__SUBDIRECTORY__);?>/assessments/postventure/ventureAssessmentImg.php/<?php _p($this->objPostVentureAssessment->Id);?>'>
</div>
	<?php require('/../..'.__INCLUDES__ . '/footer.inc.php'); ?>