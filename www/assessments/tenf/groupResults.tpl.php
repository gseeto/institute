<?php require('/../..'.__INCLUDES__ . '/externPheader.inc.php'); ?>

<div class="section">
<p>
<?php $this->lblIntroduction->Render();?>
</p>
<script type="text/javascript">

       	function DisplayChart(chartData) {
       		var chart;
       		
         // RADAR CHART
            chart = new AmCharts.AmRadarChart();
            chart.dataProvider = chartData;
            chart.categoryField = "F";
            chart.startDuration = 2;
            chart.colors = ['red','blue'];
            chart.addTitle("10-F Assessment", 14, '#000000', 0, true);

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
<br>
<p>The 10-Fs represent a model of thinking about the lives of individuals. The 10-Fs 
comprise a model that is both theoretical and practically applicable. This model was 
developed as a way of giving a person access to the defining areas of their lives. It is 
frequently used as a tool to enable organizational leaders the ability to reflect on the 
impact, contentment, and the degree of margin in the personal dimensions of their lives. </p>
<p>Large gaps between Importance and Performance indicate areas for improvement. Low scores in Importance may suggest areas you have not considered but may be beneficial in improving impact.</p>
<p>Your largest gap between Importance and Performance appears to be under <b><?php $this->lblDelta->Render();?></b>. This may indicate areas of improvement.</p>
<p>Your lowest score is under <b><?php $this->lblImportance->Render();?></b>. After reading the detailed description for this F you may discover opportunities not yet realized.</p>
<p>Overall well-roundedness refers to your general scoring profile on the 10-F Drivers of 
Personal Impact. A more detailed explanation of each of the 10-F Drivers of Impact follows:</p>
<b>FUN</b> 
<div style="left:100px; margin-bottom:20px;">
Fun involves the extent to which recreation is integrated into your life as well ensuring that fun is part of the 
routine of living. "Fun" counteracts the tendency we have to take ourselves too seriously and to overvalue what we do at the expense of who we are.
</div>

<b>FULFILLMENT AT WORK</b> 
<div style="left:100px; margin-bottom:20px;">
Fulfillment at Work is about producing quality work, the personal meaning of work, and a sense of vocation about what you do.
</div>

<b>FUNCTION IN SOCIETY</b> 
<div style="left:100px; margin-bottom:20px;">
Function in Society is underpinned by values of service, stewardship, and gratitude. It concerns your place in society and your contribution to the 
community of which you are a part.
</div>

<b>FRESH THINKING</b> 
<div style="left:100px; margin-bottom:20px;">
Fresh Thinking assumes that people are born to create and that environments of fresh thinking rejuvenate you. 
Fresh thinking requires risking, perseverance, and a healthy degree of autonomy.
</div>

<b>FINANCES</b> 
<div style="left:100px; margin-bottom:20px;">
Finances reflect not just your ability to earn but also the ability to maximize your impact through effective management your finances. The ability to judge when 
enough is enough, to spend on your value priorities rather than your comfort and convenience, to be content with what you have, and to delay gratification are all values 
associated with this area of the personal wheel.
</div>

<b>FITNESS</b> 
<div style="left:100px; margin-bottom:20px;">
The lack of it puts a dent in other areas of life. Fitness is often a practical expression of other personal values concerning self-respect and self-worth.
</div>

<b>FRIENDSHIPS</b> 
<div style="left:100px; margin-bottom:20px;">
Friendships are true indicators of our connectedness, appropriate awareness of our brokenness, and the deep inner qualities of trust and genuine care. Without more 
than casual work associations we will never become people of any substance and our Impact suffers.
</div>

<b>FEELINGS</b> 
<div style="left:100px; margin-bottom:20px;">
Feelings concern attitudes to self and others. Feelings are often the unseen but powerful motivators of actions and relationships. We need to understand them and know 
their effects on us and on others and be able to manage a range of positive and negative feelings in constructive and affirming ways.
</div>

<b>FAITH</b> 
<div style="left:100px; margin-bottom:20px;">
Faith is about what ultimately concerns us the most and counteracts the human tendency to be consumed with self. It reflects the deeper meaning of your life, the values 
you live for, and your capacity to do the right thing and serve others sacrificially.
</div>

<b>FAMILY</b> 
<div style="left:100px; margin-bottom:20px;">
Family speaks about your roots and the single biggest factor in turning out mentally healthy kids. Integrity begins at home where you are known for who you are.
</div>
<?php   
	for($i=0; $i<10;$i++) {
?>
		<br>
		<h3><?php _p(FCategoryType::$NameArray[$i+1]);?></h3>
	<?php 
		$this->dtgAssessmentResultsArray[$i]->Render();
	}
	?>
<br>
</div>
<?php require('/../..'.__INCLUDES__ . '/footer.inc.php'); ?>