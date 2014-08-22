<?php require('/../..'.__INCLUDES__ . '/header.inc.php'); ?>


<div class="section">
<p>
Please rate each statement below using the scale from 1 to 7 in the drop-down box to the right of the statement.<br>
<div style="padding-left:20px; margin-bottom:10px;">
1 - No, I do not agree, definitely not (even if the statement is negative)<br>
4 - Neutral, I neither agree nor disagree, maybe<br>
7 - Yes, I strongly agree, definitely<br>
</div>
<span style="color:#F90949;">HEAD: Please evaluate how much you agree or disagree with this statement from an intellectual perspective.</span>
<br>
<span style="color:#131BF9;">HANDS: Please evaluate how you are currently performing with regards to the statement.</span>
<br>
<span style="color:green;">HEART: Please evaluate how much this statement resonates with you emotionally.</span>
</p>
<?php
for($i=0; $i<20;$i++) {
?>
	<br>
	<h3><?php _p(LraCategoryType::$NameArray[$i+1]);?></h3>
<?php 
	switch(LraCategoryType::$NameArray[$i+1]) {
		case 'Purpose':
			$definition = "The purpose of an organization radically affects the ability of that organization to have an impact. Many organizations spend countless months 
laboring over clarifying their products, when what they are lacking is a  purpose. 
Others have a stated purpose but lack clarity on the values that are essential to fulfilling the purpose.";
			break;
		case 'Product':
			$definition = "Products and services are key components of how the customer experiences the organization. 
Products create the \"touch, see, and smell\" factors that make an organization come alive. 
For non-profits and service organizations, products often take the form of programs.";
			break;
		case 'Positioning':
			$definition = "If another organization creates an advantage - even if only in the perception of customers - then purpose, products and presence will not be enough. 
Establishing a clear positioning of both organization and products is essential. The value proposition of the organization and what differentiates 
it from others is essential to creating Impact.";
			break;
		case 'Presence':
			$definition = "Products consumed out of context do not carry the full Impact that the purveyor intends. 
Traditionally, marketing is intended to make consumers aware of their needs, and how particular products can fill those needs. 
Marketing  creates presence - a mind-set for the product or organization - and it builds a story and experience that goes beyond the simple consumption of the product. 
Presence results in Impact.";
			break;
		case 'Partnering':
			$definition = "Numerous books and publications have demonstrated the benefits of partnering. Attempts at partnering have not occurred out of mutual admiration and togetherness. 
It  has been demanded by customers and made a condition of business that suppliers cooperate. Why? Because they know that no one company can do everything well. 
Partnering creates better Impact for organizations and their customers alike.";
			break;
		case 'Profit':
			$definition = "The economic model of a organization is clearly essential. Transitioning profit from an accounting tool to a strategic weapon is the habit of champions. 
Sustainable impact is best achieved in concert with sustainable economics.";
			break;
		case 'Process':
			$definition = "Process is a driver of Impact for all organizations. Core business processes can either be handled just efficiently, or they can be deliberately directed towards the creation 
of Impact. Decision-making is an important aspect of business processes. With the ever-increasing information component of products, the location, speed, and quality 
of decision-making processes are influencing customers' perceptions of value.";
			break;
		case 'People':
			$definition = "People have a tremendous effect on the Impact of the organization. When people - including the way in which they are organized - are thoroughly aligned with the 
Purpose of the organization, Impact is heightened.";
			break;
		case 'Planning':
			$definition = "Appropriate planning - not Strategy by Advertising - is still a crucial driver of Impact. The old adage is true: if you fail to plan, you plan to fail.";
			break;
		case 'Place':
			$definition = "A company's location, the environment/image of the facilities, the corporate identity that goes beyond buildings, proximity to customers, 
partners, and others in one's ecosystem ... all of these can be used in the Place spoke of the Impact wheel. This is no less true for virtual organizations.";
			break;
		case 'Fresh Thinking':
			$definition = "Fresh Thinking assumes that people are born to create and that environments of fresh thinking rejuvenate you. 
Fresh thinking requires risking, perseverance, and a healthy degree of autonomy.";
			break;
		case 'Friendships':
			$definition = "Friendships are true indicators of our connectedness, appropriate awareness of our brokenness, and the deep inner qualities of trust and genuine care. Without more 
than casual work associations we will never become people of any substance and our Impact suffers.";
			break;
		case 'Feelings':
			$definition = "Feelings concern attitudes to self and others. Feelings are often the unseen but powerful motivators of actions and relationships. We need to understand them and know 
their effects on us and on others and be able to manage a range of positive and negative feelings in constructive and affirming ways.";
			break;
		case 'Family':
			$definition = "Family speaks about your roots and the single biggest factor in turning out mentally healthy kids. Integrity begins at home where you are known for who you are.";
			break;
		case 'Faith':
			$definition = "Faith is about what ultimately concerns us the most and counteracts the human tendency to be consumed with self. It reflects the deeper meaning of your life, the values 
you live for, and your capacity to do the right thing and serve others sacrificially.";
			break;
		case 'Fun':
			$definition = "Fun involves the extent to which recreation is integrated into your life as well ensuring that fun is part of the 
routine of living. \"Fun\" counteracts the tendency we have to take ourselves too seriously and to overvalue what we do at the expense of who we are.";
			break;
		case 'Fitness':
			$definition = "The lack of it puts a dent in other areas of life. Fitness is often a practical expression of other personal values concerning self-respect and self-worth.";
			break;
		case 'Finances':
			$definition = "Finances reflect not just your ability to earn but also the ability to maximize your impact through effective management your finances. The ability to judge when 
enough is enough, to spend on your value priorities rather than your comfort and convenience, to be content with what you have, and to delay gratification are all values 
associated with this area of the personal wheel.";
			break;
		case 'Fulfilment At Work':
			$definition = "Fulfillment at Work is about producing quality work, the personal meaning of work, and a sense of vocation about what you do.";
			break;
		case 'Function In Society':
			$definition = "Function in Society is underpinned by values of service, stewardship, and gratitude. It concerns your place in society and your contribution to the 
community of which you are a part.";
			break;
	}
?>
<p><?php _p($definition)?></p>
<?php 
	$this->dtgAssessmentQuestionArray[$i]->Render();
}
?>
<br>
<?php  $this->btnSubmit->Render(); ?>
<?php  $this->btnCancel->Render(); ?>
</div>
<?php require('/../..'.__INCLUDES__ . '/footer.inc.php'); ?>