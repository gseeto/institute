<?php require('/../..'.__INCLUDES__ . '/header.inc.php'); ?>

<div class="section">
<h2>Where Does The Time Go Assessment</h2>
<p>
It's often the case that we spend our time on the urgent rather than the important.<br>
This exercise will help you step back to evaluate where you're spending your time and whether it's leading towards or away from convergence.
</p>
<p>
Instructions:<br>
<ol>
<li>Identify an activity you regularly perform throughout a normal week</li>
<li>Indicate how much time on average (in hours) you spend on that particular activity each week</li>
<li>For that activity, indicate which categories (Career, Community, Calling, Creativity, or Margin) it falls under. For a description of each category, please click on the name of the category below.</li> 
</ol>
<b>Note:</b> Please choose all categories that apply to each activity. To assist in this determination, a brief explanation of each of the categories is provided below.
</p>
<!--  <div style="postion:relative; overflow:auto;"> -->
<div class="categories">
<a class="def" id="career">Career</a>
<a class="def" id="community">Community</a>
<a class="def" id="creativity">Creativity</a>
<a class="def" id="calling">Calling</a>
<a class="def" id="margin">Margin</a>
</div>

<div class="definitions" id="careerdef">
<h3>Career</h3>
<img class="left" src="<?php _p(__IMAGE_ASSETS__)?>/career.jpg" />
<p><strong>How we make a living, both long and short-term</strong></p>
<p>Almost everything is changing on the career front. The job market has undergone radical shifts since the 1990's. The old career rules no longer apply.</p>
<p>The boundaries between work and leisure are moving, and the hard edges between work and home are blurring.</p>
<p>Scripture has much to say about working hard and honestly.</p>
<p><span class="bluetext italics">Please assign this category to any activities related to your current work or occupation or to any activities that directly or indirectly support your current or future career growth.</span></p>
</div>
<div class="definitions" id="communitydef">
<h3>Community</h3>
<img class="left" src="<?php _p(__IMAGE_ASSETS__)?>/community.jpg" />
<p><strong>Who we know and spend time with</strong></p>
<p>Community looks a little different for each of us. Traditional definitions of peer, support and accountability groups are up for grabs.</p>
<p>People have a deep hunger for authentic Community. But lifestyles and demographic changes are challenging the traditional assumptions about where we find Community.</p>
<p><span class="bluetext italics">Please assign this category to any activities in which you are intentionally building relationship with those around you.</span></p>
</div>
<div class="definitions" id="creativitydef">
<h3>Creativity</h3>
<img class="left" src="<?php _p(__IMAGE_ASSETS__)?>/creativity.jpg" />
<p><strong>Our unique contributions</strong></p>
<p>When looking at Creativity I am including what we do with a paintbrush and palette, a pottery wheel or software code.</p>
<p>The process of creation: seeing something where others see nothing, articulating it, and causing it to come into being.</p><br>
<p><span class="bluetext italics">Please assign this category to any activities which directly or indirectly support your ability to make a unique contribution to your life and the lives you touch.</span></p>

</div>
<div class="definitions" id="callingdef">
<h3>Calling</h3>
<img class="left" src="<?php _p(__IMAGE_ASSETS__)?>/calling.jpg" />
<p><strong>A transcendent sense of purpose</strong></p>
<p>"Everyone has a call upon his or her life."</p>
<p>Like personality, gifts and character, the call on our lives has two different, but equal facets: it is the same for everyone, and it is different for everyone.</p>
<p>What is the same for everyone? The Westminster Confession states that the chief purpose of man is to glorify God and to enjoy him forever. This is universal.</p>
<p>But "call" seems to go beyond this broad purpose. It takes on a flavor of something specific to you and to me.
God is infinitely creative, and he has made each of us unique. He has decided that each of us is best off when we reflect the unique facet of his character that shines only through us.</p>
<p><span class="bluetext italics">Please assign this category to any activities which directly or indirectly support your understanding of God's plans and purposes for your life.</span></p>

</div>
<div class="definitions" id="margindef">
<h3>Margin</h3>
<img class="left" src="<?php _p(__IMAGE_ASSETS__)?>/margin.jpg" />
<p>Margin is the shoulder of the road, the white space around the page, the slack in the rope of life.</p>
<p>Before we can meaningfully develop strategies for Convergence, we need to assess the degree of margin in our lives.
Margin gives us the space to respond to God's leading.</p>
<p><span class="bluetext italics">Please assign this category to any activities which do not fit in to any of the 4-Cs.</span></p>
</div>
<!--  </div> -->
<div style="clear:both;"></div>
<h2>Activity List</h2>
<?php 
	$this->dtgAssessmentQuestion->Render();
?>
<br>
<?php  $this->btnAddActivity->Render(); ?>
<span id="hourCounter">Hours Remaining in the week: <span class="redtext"><?php $this->lblHours->Render();?> </span></span>
<br><br>
<?php  $this->btnSubmit->Render(); ?>
<?php  $this->btnCancel->Render(); ?>
</div>
<?php require('/../..'.__INCLUDES__ . '/footer.inc.php'); ?>