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
    <h2>Season Definitions</h2>
	<div class="seasoncategories">
	<div style="width:350px; float:left; margin-right:50px;">
	<a class="def" id="desert">University of the Desert</a><br />
	<a class="def" id="discover">Discovering your gifts</a><br />
	<a class="def" id="faith">Faith</a><br />
	<a class="def" id="hear">Hearing and Fearing God</a><br />
	</div>
	<div style="width:250px; float:right; margin-left:50px;">
	<a class="def" id="integrity">Internal Integrity</a><br />
	<a class="def" id="skills">Skills Building</a><br />
	<a class="def" id="spouse">(re)choosing your spouse</a><br />
	</div>
	</div>
	<div class="definitions" id="desertdef">
<h3>University of the Desert</h3>
<img class="left" src="<?php _p(__IMAGE_ASSETS__)?>/desert.jpg" />
<p>God loves us, and he disciplines those whom he loves. Often he does a deep work... if we let him.</p>
<p>Many times this work is done in the University of the Desert. There can be many different types of University of the Desert experiences. For example:</p>
<br />
<ul>
    <li> Finance - where you learn to live beyond the edge</li>
    <li> Lonely - where your Christian friends withdraw because they don't see you as successful</li>
    <li> Relo - where you are relocated, displaced, misplaced for greater purposes that you may not yet see</li>
    <li> Ministryless - where all the "ministry" that you previously relished is turned to dust</li>
    <li> Silence - where not only is the desert quiet, but so is God</li>
    <li> Single - where what seemed like God's choice person for you somehow wasn't reading the same confirming Bible verses as you.</li>
</ul>
<p>There are many other University of the Desert's - I am sure you have your own desert story to tell.</p>
</div>
<div class="definitions" id="discoverdef">
<h3>Discovering your gifts</h3>
<img class="left" src="<?php _p(__IMAGE_ASSETS__)?>/discover.jpg" />
<p>Talent. It is amazing to see how each one of us is crafted with abilities. Stewarding-both discovering and honing-these resources for kingdom-building purposes is what the gift discovery season is about. If we are slovenly in this season we restrict the raw materials that we place back in the Master's hands.</p>
 
<p>We discover more by doing than by analysis, but we are quicker to run an opinion poll of friends and leaders as to what our gifts are than to see a need and do something. If you don't know your gifts, shut up and do something. (The poll mentality also waters down our discipline of hearing God.)</p>
</div>
<div class="definitions" id="faithdef">
<h3>Faith, knowing God</h3>
<img class="left" src="<?php _p(__IMAGE_ASSETS__)?>/faithbible.jpg" />
<p>Peter Drucker noted that very few graduate students can answer the question, "Who are you?" Can you really know yourself without knowing God? A leader who is self-aware is one who understands the context in which he or she functions. The ultimate context for life is God. Leaders with a biblical worldview are those who know that their leadership begins with God, is for God, and ends with God. It is therefore appropriate that the seasons of life begin with knowing God.</p>
<p>So the Creativity of which I speak is a creative faith. And we need to integrate this creativity into our homes, our work and the pursuit of our Calling.</p>
</div>
<div class="definitions" id="heardef">
<h3>Hearing and Fearing God</h3>
<img class="left" src="<?php _p(__IMAGE_ASSETS__)?>/calling.jpg" />
<p>How do you intuit, get things, receive inspiration, hear God? Those who fear God hear God. While this season is essential for budding entrepreneurs, we all need to develop a keener sense of how we "get" things. Hearing God is the sparkplug for creativity and innovation. This season is key, in fact, to the other seasons because in it we develop the listening and learning, hearing and following patterns that enable us to even see the other seasons.</p>
<br />
<br />
</div>
<div class="definitions" id="integritydef">
<h3>Internal Integrity</h3>
<img class="left" src="<?php _p(__IMAGE_ASSETS__)?>/integrity.jpg" />
<p>Having talent is not enough. Character is crucial. Boundless talent coupled with unbridled character is a deadly combination. We are therefore shaped by God, this way and that, until he brings us to a test the purpose of which seems to be to prove more to us than to him that the work in us has been good.</p>
 
<p>Sometimes a particular challenge we are facing causes us to begin, after it has dripped on us for a month or a quarter or a year, to look for a way out. It may be a difficult colleague, a tiresome teenager, an unscrupulous business partner or a changeable spouse. Our initial reaction is that they must change. After a while we begin to sense that this is a seasonal test of us more than it is of them.
Internal Integrity sometimes comes to us disguised as "them... their problem." It may just be God calling us to be faithful even when we have an excuse to be otherwise.</p>
</div>
<div class="definitions" id="skillsdef">
<h3>Skills Building</h3>
<img class="left" src="<?php _p(__IMAGE_ASSETS__)?>/skills.jpg" />
<p>People in business like things to happen quickly, especially when their careers are involved. Somehow it seems that our view of when the future should happen is nearer than reality. We somehow have a notion that we are ready, character and skills-wise, before we really are. There are other times when we have to step up to responsibility before we feel we are ready.</p>
 
<p>The skills building season can last for years and without a sense of the broader context it can rob us of the determination to press through towards a greater goal. If we expect a skills building season, we can embrace it and make the most of it.</p>
 
<p>A final thought on Skills Building: our time on earth is the pre-game warm-up for eternity. We don't take too many things with us into eternity, but it seems that our skills will be used in heaven, so we should take this season seriously. In the parable of the talents, when you use them well you are given authority over cities.</p>
</div>
<div class="definitions" id="spousedef">
<h3>(re)choosing your spouse</h3>
<img class="left" src="<?php _p(__IMAGE_ASSETS__)?>/spouse.jpg" />
<p>Few decisions impact the course of our lives so profoundly as who we marry. We examine this in the crucial season(s) of choosing and then re-choosing a spouse.</p>
<p>If we are to choose correctly, we must see the heart of God when it comes to marriage. The purpose of man is to bring honor, attribution, acknowledgement, kudos... glory, if you like, to God. He can receive honor when celibacy is offered as a gift to him. He can also receive honor when two people marry each other. In the grand scope of history the cross of Christ is central. In future history there will be another focal point, namely, a huge marriage between what Scripture calls the bride and the Lamb. Christ will receive the bride for which he died and has toiled. All believers from all time will be part of the bride. Marriages on earth today are to be a picture in some way of this awesome future event. So, in the grand scheme of things and for many other reasons, marriage is important to God.</p>
<p>At a later stage in life (roundabout the time when your new red sports car is in better shape than your body) you will have to choose again, or re-choose your spouse. There are many facets to this season. As we reach major milestones in our marriage and celebrate the joy of increasing kingdom productiveness, there comes the tug from God-whose love the marriage merely mirrors-to come back to him as a first love. The paradoxes of life: re-choosing the love of our life, and having God deepen the wellspring of all love, our personal relationship with him.</p>
</div>
<div style="clear:both;"></div>
<h2>Seasonal Assessment Results</h2>
<div id="chartdiv" style="width:700px; height:500px;"></div>

<br>
<br>
<?php 
	$this->dtgAssessmentResults->Render();
?>
</div>
<?php require('/../..'.__INCLUDES__ . '/footer.inc.php'); ?>