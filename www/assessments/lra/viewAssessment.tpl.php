<?php require('/../..'.__INCLUDES__ . '/header.inc.php'); ?>

<div class="row">
	<div class="col-md-2">&nbsp;</div>
	<div class="col-md-8 section">
	<?php  $this->btnReturn->Render(); ?>
	<div style="clear:both;"></div>
	<p>
	<?php $this->lblIntroduction->Render();?>
	</p>
	<script type="text/javascript">
	
	function DisplayPChart(chartData) {
			var chart;
			
	 // RADAR CHART
	    chart = new AmCharts.AmRadarChart();
	    chart.dataProvider = chartData;
	    chart.categoryField = "P";
	    chart.startDuration = 2;
	    chart.colors = ['red','blue', 'green'];
	    chart.addTitle("Drivers of Corporate Impact (10-Ps) Results", 14, '#000000', 0, true);
	
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
	    graph.valueField = "head";
	    graph.bullet = "round";
	    graph.balloonText = "[[category]] Head: [[value]]"
	    chart.addGraph(graph);
	
	    var graph2 = new AmCharts.AmGraph();
	    graph2.valueField = "hands";
	    graph2.bullet = "round";
	    graph2.balloonText = "[[category]] Hands: [[value]]"
	    chart.addGraph(graph2);
	
	    var graph3 = new AmCharts.AmGraph();
	    graph3.valueField = "heart";
	    graph3.bullet = "round";
	    graph3.balloonText = "[[category]] Heart: [[value]]"
	    chart.addGraph(graph3);
	    
	    // WRITE
	    chart.write("pchartdiv");
	}
	
		function DisplayFChart(chartData) {
			var chart;
			
	 // RADAR CHART
	    chart = new AmCharts.AmRadarChart();
	    chart.dataProvider = chartData;
	    chart.categoryField = "F";
	    chart.startDuration = 2;
	    chart.colors = ['red','blue', 'green'];
	    chart.addTitle("Drivers of Personal Impact (10-Fs) Results", 14, '#000000', 0, true);
	
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
	    graph.valueField = "head";
	    graph.bullet = "round";
	    graph.balloonText = "[[category]] Head: [[value]]"
	    chart.addGraph(graph);
	
	    var graph2 = new AmCharts.AmGraph();
	    graph2.valueField = "hands";
	    graph2.bullet = "round";
	    graph2.balloonText = "[[category]] Hands: [[value]]"
	    chart.addGraph(graph2);
	
	    var graph3 = new AmCharts.AmGraph();
	    graph3.valueField = "heart";
	    graph3.bullet = "round";
	    graph3.balloonText = "[[category]] Heart: [[value]]"
	    chart.addGraph(graph3);
	    
	    // WRITE
	    chart.write("fchartdiv");
	  }
	    </script>
	<p>You have completed a web-enabled assessment on various aspects affecting your
	leadership. You have indicated the extent to which you agree with a variety of statements
	that reflect a range of critical variables in organizational leadership. These variables, and
	the way in which they are aligned, have been found by The Institute to drive performance
	and effectiveness, or what we call Impact. At The Institute we view your Impact as a
	function of the alignment of your personal character and your corporate competence.</p>
	
	<p>The Institute uses the analogy of a bicycle to explain the alignment of your personal
	character and your corporate competence. A bicycle needs its two wheels to be in good
	shape to move fast and efficiently to its planned destination. The Leadership Readiness
	Assessment&#174; (LRA) involves an analysis of the alignment of the bicycle's two wheels,
	namely your Corporate Wheel and Character Wheel. The wheels ought to be going in
	exactly the same direction to drive Impact. In addition to general alignment of the two
	wheels, each wheel needs to be internally aligned for you to sustain the impact in your
	organization. This means that the spokes have to be the right length and need to be finely
	tuned to contribute to the integration of balance, speed, and responsiveness. Fine tuning
	involves internal alignments between the three areas of Head (cognitive framework,
	intellectual assets, & know how); Hands (skills, core competencies abilities &
	experience; and Heart (passions and commitment)</p>
	
	<p>Your responses on the LRA have been scored and interpreted in order to assess the
	degree to which you are fulfilling your potential and your readiness to move to the next
	level of leadership. The purpose of the Leadership Readiness Assessment is to take a
	snapshot of your current situation in what the Institute regards as the ten corporate (10-P)
	and ten character or personal (10-F) areas that drive your Impact. The assessment
	indicates the degree of personal integration and alignment for you as the leader in the
	context of your organization. The results should establish a platform for developing
	strategies to close performance gaps so that both you and your organization can achieve
	greater and more sustained Impact.</p>
	<h3>Drivers of Corporate Impact (10-Ps)</h3>
	<p>The Corporate Wheel of the bicycle requires the 10 spokes or the 10-P Drivers of Impact
	to function in alignment. You have been personally assessed on the number of spokes
	that reach the rim, the effectiveness of each of the 10 spokes, and on specific gaps in the
	spokes that prevent an end-to-end alignment of a set of processes, people, systems, and
	enabling technologies behind the corporate purpose. A more detailed explanation of each
	of the 10-P Drivers of Impact follows:</p>
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
	<p>This diagram illustrates your Head, Hands, & Heart rating for each of the 10-P Drivers.</p>
	<div id="pchartdiv" style="width:700px; height:500px;"></div>
	<br>
	<p>Your top three High Impact corporate drivers include: <br><b><?php $this->lblPHigh->Render();?></b></p>
	<p>Your lowest three Moderate/Low Impact corporate drivers include: <br><b><?php $this->lblPModerate->Render();?></b>
	After reading the detailed description for these Ps you may discover opportunities not yet realized.</p>
	<p>The larger the difference between Head, Heart and Hands may indicate a disconnect or tension between what you think, feel or do. This also can be an area of improvement.
	Your largest differences between Head, Heart and Hands are under:<br> <b><?php $this->lblPDelta->Render();?></b> 
	
	<h3>Drivers of Personal Impact (10-Fs)</h3>
	<p>The focus of the report has been on competencies, skill sets and drivers of corporate
	Impact. The focus will now shift to drivers of personal Impact. The front wheel of a
	leader is made up of the ten drivers of personal Impact - the 10-Fs. The blending of
	corporate and personal worlds means that we have to pay attention to the personal wheel
	as much as the corporate wheel. We have seen catastrophic results of leaders who have
	tremendous corporate skills, but lack character. Likewise, there have been many leaders
	who have excellent character credentials, but lack the basic skills that are needed to lead
	and manage an organization.</p>
	<p>The 10-Fs represent a model of thinking about the lives of individuals. The 10-Fs 
	comprise a model that is both theoretical and practically applicable. This model was 
	developed as a way of giving a person access to the defining areas of their lives. It is 
	frequently used as a tool to enable organizational leaders the ability to reflect on the 
	impact, contentment, and the degree of margin in the personal dimensions of their lives. </p>
	<p>Overall well-roundedness refers to your general scoring profile on the 10-F Drivers of
	Personal Impact. A more detailed explanation of each of the 10-F Drivers of Impact
	follows:</p>
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
	<div id="fchartdiv" style="width:700px; height:500px;"></div>
	
	<p>Your top three High Impact personal drivers include: <br><b><?php $this->lblFHigh->Render();?></b></p>
	<p>Your lowest three Moderate/Low Impact personal drivers include: <br><b><?php $this->lblFModerate->Render();?></b>
	After reading the detailed description for these Fs you may discover opportunities not yet realized.</p>
	<p>The larger the difference between Head, Heart and Hands may indicate a disconnect or tension between what you think, feel or do. This also can be an area of improvement.
	Your largest differences between Head, Heart and Hands are under:<br> <b><?php $this->lblFDelta->Render();?></b>
	
	<?php
	for($i=0; $i<20;$i++) {
	?>
		<br>
		<h3><?php _p(LraCategoryType::$NameArray[$i+1]);?></h3>
	<?php 
		$this->dtgAssessmentResultsArray[$i]->Render();
	}
	?>
	</div>
	<div class="col-md-2">&nbsp;</div>
</div>
<?php require('/../..'.__INCLUDES__ . '/footer.inc.php'); ?>