<?php
require(dirname(__FILE__) . '/../includes/prepend.inc.php');

extract( $_POST);
extract( $_GET);

echo "got keycode = ".$keycode."\n";
echo "got description = ".$description."\n";
echo "got quantity = ".$quantity."\n";
echo "got resourceId = ".$resourceId."\n";		
echo "got username = ".$username."\n";
echo "got time = ".$time."\n";
echo "got dichotomy = ".$dichotomy."\n";
echo "got tenF = ".$tenF."\n";
echo "got seasons = ".$seasons."\n";
echo "got email = ".$emailAddress."\n";

/*
 * LEMON
 */
if($resourceId == 5) {
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
			echo "trying to process Convergence - Time Assessment...\n";
			$objAssessment = new TimeAssessment();
	     	$objAssessment->UserId = $objUser->Id;
	     	$objAssessment->ResourceId = 8; //Time Assessment 
	     	$objAssessment->ResourceStatusId = 1; // initial state is untouched	     	
	     	$objUser->AssociateResource(Resource::Load(8));
			$objAssessment->Save();
		}
		if($dichotomy == true) {
			
		}
		if($tenF == true) {
			
		}
		if($seasons == true){
			
		}
	}	
}
?>