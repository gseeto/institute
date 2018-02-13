<?php
require(dirname(__FILE__) . '/../includes/prepend.inc.php');

extract( $_POST);
extract( $_GET);

if(isset($keycode))
	echo "got keycode = ".$keycode."<br>";
	
if(isset($description))
	echo "got description = ".$description."<br>";

if(isset($quantity))
	echo "got quantity = ".$quantity."<br>";

if(isset($resourceId))
echo "got resourceId = ".$resourceId."<br>";	

if(isset($username))
	echo "got username = ".$username."<br>";

if(isset($time))
	echo "got time = ".$time."<br>";

if(isset($dichotomy))
	echo "got dichotomy = ".$dichotomy."<br>";

if(isset($tenF))
	echo "got tenF = ".$tenF."<br>";

if(isset($seasons))
	echo "got seasons = ".$seasons."<br>";
	
if(isset($emailAddress))
	echo "got email = ".$emailAddress."<br>";

/*
 * LEMON
 */
if($resourceId == 14) {
	echo "trying to process LEMON Assessment...\n";
	$objAssessment = new GroupAssessmentList();
	$objAssessment->KeyCode = $keycode;
	$objAssessment->Description = $description;
	$objAssessment->TotalKeys = $quantity;
	$objAssessment->KeysLeft = $quantity;
	$objAssessment->ResourceId = $resourceId;
	$objAssessment->Save();
} else {
	/*
	 * Set up a username
	 */
	if($time || $dichotomy || $tenF || $seasons  ) {
		$objConditions = QQ::Equal(QQN::Login()->Username, $username);
		$loginExists = Login::QueryArray($objConditions);
		$i=1;
		while(count($loginExists) > 0) {
			$username = sprintf("%s%d",$username,$i);
			$objConditions = QQ::Equal(QQN::Login()->Username, $username);
			$loginExists = Login::QueryArray($objConditions);
			$i++;
		}
			
		$objLogin = new Login();
		$objLogin->Username = $username;
		$objLogin->Password = $order_number;
		$objLogin->RoleId = 4; // This us a user role
		$intLoginId = $objLogin->Save();
		
		$objUser = new User();
		$objUser->FirstName = $name;
		$objUser->LastName = $last_name;
		$objUser->Email = $emailAddress;
		$objUser->LoginId = $intLoginId;
		$objUser->Save();
		
		/*
		 * Convergence Assessments
		 */
		if($time == true) {
			echo "trying to process Convergence - Time Assessment...<br>";
			$objAssessment = new TimeAssessment();
	     	$objAssessment->UserId = $objUser->Id;
	     	$objAssessment->ResourceId = 8; //Time Assessment 
	     	$objAssessment->ResourceStatusId = 1; // initial state is untouched	     	
	     	$objUser->AssociateResource(Resource::Load(8));
			$objAssessment->Save();
		}
		if($dichotomy == true) {
			echo "trying to process Convergence - Integration Assessment...<br>";
			$objAssessment = new IntegrationAssessment();
	     	$objAssessment->UserId = $objUser->Id;
	     	$objAssessment->ResourceId = 6; //Integration Assessment 
	     	$objAssessment->ResourceStatusId = 1; // initial state is untouched
	     	$objUser->AssociateResource(Resource::Load(6));
			$objAssessment->Save();			
		}
		if($tenF == true) {
			echo "trying to process Convergence - 10-F...<br>";
			$objAssessment = new TenFAssessment();
	     	$objAssessment->UserId = $objUser->Id;
	     	$objAssessment->ResourceId = 3; //10-FAssessment 
	     	$objAssessment->ResourceStatusId = 1; // initial state is untouched
	     	$objUser->AssociateResource(Resource::Load(3));
			$objAssessment->Save();
		}
		if($seasons == true){
			echo "trying to process Convergence - Seasons Assessment...<br>";
			$objAssessment = new SeasonalAssessment();
	     	$objAssessment->UserId = $objUser->Id;
	     	$objAssessment->ResourceId = 7; //Seasonal Assessment
	     	$objAssessment->ResourceStatusId = 1; // initial state is untouched
	     	$objUser->AssociateResource(Resource::Load(7));
			$objAssessment->Save();
		}
	}	
}
?>