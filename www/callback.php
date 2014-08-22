<?php
	require(dirname(__FILE__) . '/../includes/prepend.inc.php');
 	define("STORE_DOMAIN", "inst.americommerce.com");
    define("API_USERNAME", "orderprocessor");
    define("API_PASSWORD", "LemonsRus!@#007");
    define("SECURITY_TOKEN", "9ea5f73d-8920-49f8-9f4b-4aa8ac43ea16");
    
    $mydebug = true;
	$myFile = "logFile.txt";
	$fh = fopen($myFile, 'a') or die("can't open file");
	
	function writeToLogFile($stringData) {
		global $mydebug, $fh;
		if($mydebug) {
			fwrite($fh, $stringData);
		}
	}
   // This namespace must be defined and cannot be changed.
    define("AC_NAMESPACE", "http://www.americommerce.com");
    
    $lemonAssessment = false;
    $lemonAssessmentQuantity = 0;
    $lemonGroupAssessment = false;
    $lemonGroupAssessmentQuantity = 0;
    $tenPAssessment = false;
    $tenPAssessmentQuantity = 0;
    $tenFAssessment = false;
    $tenFAssessmentQuantity = 0;
    $kingdomAssessment = false;
    $kingdomAssessmentQuantity = 0;
    
    $convergenceBook = false;
    $convergenceBookQuantity = 0;
	$convergenceEBook = false;
	$convergenceEBookQuantity = 0;
	$lemonBook = false;
	$lemonBookQuantity = 0;
	$lemonEBook = false;
	$lemonEBookQuantity = 0;
	$repurposingCapitalEBook = false;
	$repurposingCapitalEBookQuantity = 0;
	$transformingSocietyBook = false;
	$transformingSocietyBookQuantity = 0;
	$transformingSocietyEBook = false;
	$transformingSocietyEBookQuantity = 0;
	$cyclesBook = false;
	$cyclesBookQuantity = 0;
	$cyclesEBook = false;
	$cyclesEBookQuantity = 0;
	$scorecardSubscribed = false;
	$scorecardSubscribedQuantity = 0;
	$repurposingBusinessTraining = false;
	$repurposingBusinessTrainingQuantity = 0;
	$intensiveTraining = false;
	$intensiveTrainingQuantity = 0;	
    $isProcessed = "True";
    
    /* Due to the nature of .NET SOAP Web Services, we have to create a subclass of the native PHP SoapClient and
    * override the way it handles namespaces. The default way the request is formatted is not interpreted by the
    * server correctly, especially when passing in a complex object as a parameter. */
    class ACSoapClient extends SoapClient {
        function __doRequest($request, $location, $action, $version) {
            $namespace = AC_NAMESPACE;
            
            $request = preg_replace('/<ns1:(\w+)/', '<$1 xmlns="'.$namespace.'"', $request, 1);
            $request = preg_replace('/<ns1:(\w+)/', '<$1', $request);
            $request = str_replace(array('/ns1:', 'xmlns:ns1="'.$namespace.'"'), array('/', 'xmlns="'.$namespace.'"'), $request);
            
            // parent call
            return parent::__doRequest($request, $location, $action, $version);
        }
    }

    // Create a hash containing the header information for authentication.
    $header_info = array(
        "UserName"      => API_USERNAME,
        "Password"      => API_PASSWORD,
        "SecurityToken" => SECURITY_TOKEN
    );
        
    try {
    	writeToLogFile("Attempting to process order...\r\n");
        $client = new ACSoapClient("https://".STORE_DOMAIN."/store/ws/AmeriCommerceDb.asmx?wsdl");
        $header = new SoapHeader("http://www.americommerce.com", "AmeriCommerceHeaderInfo", $header_info, false);

        $client->__setSoapHeaders($header);
     
        $lastorder = $client->Order_GetLastOrderID();
        $order = $client->Order_GetByKey(array("piorderID" => $lastorder->Order_GetLastOrderIDResult))->Order_GetByKeyResult;
        $customer = $client->Customer_GetByKey(array("picustomerID" => $order->customerID->Value))->Customer_GetByKeyResult;
        $savedCustomer = $client->Customer_SaveAndGet(array("poCustomerTrans" => $customer))->Customer_SaveAndGetResult;

     	//this call fills the order items onto your already existing order object
     	// Check to see if Assessments or ebooks have been ordered and process accordingly
     	writeToLogFile("About to check for what item was purchased..\r\n");
        $orderItems = $client->Order_FillOrderItemCollection(array("poOrderTrans" => $order))->Order_FillOrderItemCollectionResult;       
        foreach($orderItems->OrderItemColTrans as $orderItemArray) {
        	foreach($orderItemArray as $orderItem) {
        		if($orderItem->itemNr == 'B2') {
	        		$convergenceBook = true;
	        		$convergenceBookQuantity = $orderItem->quantity->Value;
	        		writeToLogFile("Found ".$orderItem->itemName . " and quantity of : ".$convergenceBookQuantity."\r\n");
	        	}
        		if($orderItem->itemNr == 'B1') {
	        		$lemonBook = true;
	        		$lemonBookQuantity = $orderItem->quantity->Value;
	        		writeToLogFile("Found ".$orderItem->itemName . " and quantity of : ".$lemonBookQuantity."\r\n");
	        	}
        		if($orderItem->itemNr == 'B3') {
	        		$transformingSocietyBook = true;
	        		$transformingSocietyBookQuantity = $orderItem->quantity->Value;
	        		writeToLogFile("Found ".$orderItem->itemName . " and quantity of : ".$transformingSocietyBookQuantity."\r\n");
	        	}
        		if($orderItem->itemNr == 'B5') {
	        		$cyclesBook = true;
	        		$cyclesBookBookQuantity = $orderItem->quantity->Value;
	        		writeToLogFile("Found ".$orderItem->itemName . " and quantity of : ".$cyclesBookQuantity."\r\n");
	        	}
        		if($orderItem->itemNr == 'E1') {
	        		$lemonEBook = true;
	        		$lemonEBookQuantity = $orderItem->quantity->Value;
	        		writeToLogFile("Found ".$orderItem->itemName . " and quantity of : ".$lemonEBookQuantity."\r\n");
	        	}
        		if($orderItem->itemNr == 'E2') {
	        		$convergenceEBook = true;
	        		$convergenceEBookQuantity = $orderItem->quantity->Value;
	        		writeToLogFile("Found ".$orderItem->itemName . " and quantity of : ".$convergenceEBookQuantity."\r\n");
	        	}
        		if($orderItem->itemNr == 'E3') {
	        		$transformingSocietyEBook = true;
	        		$transformingSocietyEBookQuantity = $orderItem->quantity->Value;
	        		writeToLogFile("Found ".$orderItem->itemName . " and quantity of : ".$transformingSocietyEBookQuantity."\r\n");
	        	}
        		if($orderItem->itemNr == 'E4') {
	        		$repurposingCapitalEBook = true;
	        		$repurposingCapitalEBookQuantity = $orderItem->quantity->Value;
	        		writeToLogFile("Found ".$orderItem->itemName . " and quantity of : ".$repurposingCapitalEBookQuantity."\r\n");
	        	}
        		if($orderItem->itemNr == 'E5') {
	        		$cyclesEBook = true;
	        		$cyclesEBookQuantity = $orderItem->quantity->Value;
	        		writeToLogFile("Found ".$orderItem->itemName . " and quantity of : ".$cyclesEBookQuantity."\r\n");
	        	}
        		if(($orderItem->itemNr == 'T1')||($orderItem->itemNr == 'T2')) {
	        		$repurposingBusinessTraining = true;
	        		$repurposingBusinessTrainingQuantity = $orderItem->quantity->Value;
	        		writeToLogFile("Found ".$orderItem->itemName . " and quantity of : ".$repurposingBusinessTrainingQuantity."\r\n");
	        	}
        		if($orderItem->itemNr == 'T3') {
	        		$intensiveTraining = true;
	        		$intensiveTrainingQuantity = $orderItem->quantity->Value;
	        		writeToLogFile("Found ".$orderItem->itemName . " and quantity of : ".$intensiveTrainingQuantity."\r\n");
	        	}
	        	if($orderItem->itemNr == 'A1') {
	        		$lemonAssessment = true;
	        		$lemonAssessmentQuantity = $orderItem->quantity->Value;
	        		writeToLogFile("Found ".$orderItem->itemName . " and quantity of : ".$lemonAssessmentQuantity."\r\n");
	        	}
        		if($orderItem->itemNr == 'A5') {
	        		$lemonGroupAssessment = true;
	        		$lemonGroupAssessmentQuantity = $orderItem->quantity->Value;
	        		writeToLogFile("Found ".$orderItem->itemName . " and quantity of : ".$lemonGroupAssessmentQuantity."\r\n");
	        	}	        	
	        	if($orderItem->itemNr == 'A2') {
	        		$tenPAssessment = true;
	        		$tenPAssessmentQuantity = $orderItem->quantity->Value;
	        		writeToLogFile( "Found ".$orderItem->itemName . " and quantity of : ".$tenPAssessmentQuantity."\r\n");
	        	}
	        	if($orderItem->itemNr == 'A3') {
	        		$tenFAssessment = true;
	        		$tenFAssessmentQuantity = $orderItem->quantity->Value;
	        		writeToLogFile("Found ".$orderItem->itemName . " and quantity of : ".$tenFAssessmentQuantity."\r\n");
	        	}
	        	if($orderItem->itemNr == 'A4') {
	        		$kingdomAssessment = true;
	        		$kingdomAssessmentQuantity = $orderItem->quantity->Value;
	        		writeToLogFile( "Found ".$orderItem->itemName . " and quantity of : ".$kingdomAssessmentQuantity."\r\n");
	        	}
        	}
        }   
        $customFieldTrans = $client->Order_FillCustomFields(array("poOrderTrans" => $order))->Order_FillCustomFieldsResult;
        $customFields = $client->Order_ParseCustomFieldValues (array("poOrderTrans" => $order))->Order_ParseCustomFieldValuesResult;
        
        writeToLogFile("Finished checking for ordered items...\r\n");
        writeToLogFile("Handling order for: ". $savedCustomer->firstName.' '.$savedCustomer->lastName);
        writeToLogFile("\r\nfield key = ".$customFields->CustomFieldData->Key. "\r\nvalue = ".$customFields->CustomFieldData->Value. "\r\n");
          	
        // Update salesforce with information on who purchased what.
        writeToLogFile("Attempting to update Salesforce...");
        updateSalesforce($savedCustomer->firstName,$savedCustomer->lastName,$savedCustomer->email);
        
        // Process the order.
        if($lemonAssessment) {
        	try {
        	$objAssessment = new GroupAssessmentList();
			$objAssessment->KeyCode = $order->orderID->Value . '_Lemon';
			$objAssessment->Description = "LEMON Assessment For ".$savedCustomer->firstName.' '.$savedCustomer->lastName;
			$objAssessment->TotalKeys = $lemonAssessmentQuantity;
			$objAssessment->KeysLeft = $lemonAssessmentQuantity;
			$objAssessment->ResourceId = 5;
			$objAssessment->Save();
			sendLEMONEmail($savedCustomer->email,$objAssessment->KeyCode);
        	} catch (Exception $e) {
		        writeToLogFile("Lemon Assessment generation failed. \r\n". print_r($e,true));
		    }
        }
        
        if($lemonGroupAssessment) {
        	try {
	        	$objAssessment = new GroupAssessmentList();
				$objAssessment->KeyCode = $order->orderID->Value . '_LemonGroup';
				$objAssessment->Description = "LEMON Group Assessment For ".$savedCustomer->firstName.' '.$savedCustomer->lastName;
				$objAssessment->TotalKeys = $lemonGroupAssessmentQuantity;
				$objAssessment->KeysLeft = $lemonGroupAssessmentQuantity;
				$objAssessment->ResourceId = 5;
				$objAssessment->Save();
				sendLEMONEmail($savedCustomer->email,$objAssessment->KeyCode);
        	} catch (Exception $e) {
		        writeToLogFile("Lemon Group Assessment generation failed. \r\n". print_r($e,true));
		    }
        }
        
    	if($tenPAssessment) {
    		try {
	        	$objAssessment = new GroupAssessmentList();
				$objAssessment->KeyCode = $order->orderID->Value . '_10-P';
				$objAssessment->Description = "10-P Assessment For ".$savedCustomer->firstName.' '.$savedCustomer->lastName;
				$objAssessment->TotalKeys = $tenPAssessmentQuantity;
				$objAssessment->KeysLeft = $tenPAssessmentQuantity;
				$objAssessment->ResourceId = 2;
				$objAssessment->Save();
				sendTenPEmail($savedCustomer->email,$objAssessment->KeyCode);
    		} catch (Exception $e) {
		        writeToLogFile("10-P Assessment generation failed. \r\n". print_r($e,true));
		    }
        }
        
    	if($tenFAssessment) {
    		try {
	        	$objAssessment = new GroupAssessmentList();
				$objAssessment->KeyCode = $order->orderID->Value . '_10-F';
				$objAssessment->Description = "10-F Assessment For ".$savedCustomer->firstName.' '.$savedCustomer->lastName;
				$objAssessment->TotalKeys = $tenFAssessmentQuantity;
				$objAssessment->KeysLeft = $tenFAssessmentQuantity;
				$objAssessment->ResourceId = 3;
				$objAssessment->Save();
				sendTenFEmail($savedCustomer->email,$objAssessment->KeyCode);
    		} catch (Exception $e) {
		        writeToLogFile("10-F Assessment generation failed. \r\n". print_r($e,true));
		    }
        }
        
    	if($kingdomAssessment) {
    		try {
	        	$objAssessment = new GroupAssessmentList();
				$objAssessment->KeyCode = $order->orderID->Value . '_Kingdom';
				$objAssessment->Description = "Kingdom Assessment For ".$savedCustomer->firstName.' '.$savedCustomer->lastName;
				$objAssessment->TotalKeys = $kingdomAssessmentQuantity;
				$objAssessment->KeysLeft = $kingdomAssessmentQuantity;
				$objAssessment->ResourceId = 4;
				$objAssessment->Save();
				sendKingdomEmail($savedCustomer->email,$objAssessment->KeyCode);
    		} catch (Exception $e) {
		        writeToLogFile("Kingdom Assessment generation failed. \r\n". print_r($e,true));
		    }
        }
        
    	// After processing, set the processed flag to true
    	$customFields->CustomFieldData->Key = "processed";
    	$customFields->CustomFieldData->Value = "true";
    	$return = $client->Order_ApplyCustomFieldValues(array("poFields" =>$customFields , "poOrderTrans"=>$order))->Order_ApplyCustomFieldValuesResult;
    	
        $status = $client->Order_Save(array("poOrderTrans" => $order))->Order_SaveResult;

       // writeToLogFile( "<br>after "; var_dump($customFields));
       writeToLogFile( "\r\nAfter: field key = ".$customFields->CustomFieldData->Key. "\r\nvalue = ".$customFields->CustomFieldData->Value. "\r\n");
       writeToLogFile("End of workflow\r\n");
    
    } catch(Exception $e) {
        writeToLogFile(print_r($e,true));
    }
    
    /*
	 * sendLEMONEmail - Send an email notifying user of their lemon assessment details
	 */
	function sendLEMONEmail($emailAddress, $key_code) {
		$to = $emailAddress;
		$subject = "LEMON Leadership Assessment";
		 
		//create a boundary string. It must be unique
		//so we use the MD5 algorithm to generate a random hash
		$random_hash = md5(date('r', time())); 
		
		//define the headers we want passed. Note that they are separated with \r\n
		$headers = "From: lemon@inst.net\r\nReply-To: lemon@inst.net\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		$headers .= 'Bcc: gareths@inst.net' . "\r\n";
		
		//add boundary string and mime type specification
		//$headers .= "\r\nContent-Type: multipart/alternative; boundary=\"PHP-alt-".$random_hash."\"";
		//define the body of the message.
		ob_start(); //Turn on output buffering
		?>
		<h1>Overview</h1>
		<p>LEMON is an acrostic for five types of leaders:</p>
		<ul>
			<li>L = Luminaries</li>
			<li>E = Entrepreneurs</li>
			<li>M = Managers</li>
			<li>O = Organizers</li>
			<li>N = Networkers.</li>
		</ul>
		<p>Taken in conjunction with the book, the on-line LEMON Leadership Assessment allows you to quickly determine your primary and secondary leadership types.</p>
		<p>There are, as you expect, no wrong or bad profiles. To take the assessment go to the url below, login, and rate the statements. No written answers are needed.</p>
		
		<h1>Login Information</h1>
		<p>The URL is           http://inst.net/resources/assessments/lemon/groupLogin.php </p>
		<p>The code is: <?=$key_code?>  <br />(Please take the assessment only ONCE)</p>
		<p>You will see the login screen:</p>
		<img src="http://inst.net/lemon/images/lemonlogin.jpg" style="margin:20px; padding-right:200px;"/><br>
		
		<p>After entering the code, complete the personal/work information; name and email address are required.</p>
		
		<h1>Results</h1>
		<p>The online assessment will provide a quick review of your results; this will give preliminary insights into how you are wired.</p>
	
	
		<img src="http://inst.net/lemon/images/lemongraph.jpg" style="margin:20px; padding-right:200px;"/>
		<br>
		
		<p>Should you have any questions, please email lemon@inst.net</p>
		<p>Kind Regards,</p>
		The LEMON Assessment Administrator
		<?
		//copy current buffer contents into $message variable and delete current output buffer
		$message = ob_get_clean();
		
		 if (mail($to, $subject, $message, $headers)) {
		   writeToLogFile(("Successfully send email to contact person: ".$emailAddress."\n\r"));
		  } else {
		   writeToLogFile(("Attempted email Request Failed\n\r"));
		  }
	}
    
	/*
	 * sendTenPEmail - Send an email notifying user of their 10-P assessment details
	 */
	function sendTenPEmail($emailAddress, $key_code) {
		$to = $emailAddress;
		$subject = "10-P Assessment";
		 
		//create a boundary string. It must be unique
		//so we use the MD5 algorithm to generate a random hash
		$random_hash = md5(date('r', time())); 
		
		//define the headers we want passed. Note that they are separated with \r\n
		$headers = "From: info@inst.net\r\nReply-To: info@inst.net\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		$headers .= 'Bcc: gareths@inst.net' . "\r\n";
		
		//add boundary string and mime type specification
		//$headers .= "\r\nContent-Type: multipart/alternative; boundary=\"PHP-alt-".$random_hash."\"";
		//define the body of the message.
		ob_start(); //Turn on output buffering
		?>
		<h1>Overview</h1>
		<p>The Impact Assessment is a powerful diagnostic tool, resembling a "corporate X-ray," that 
		provides constructive feedback from and to key leaders on the top ten drivers of organizational impact.</p>
		
		<h1>Login Information</h1>
		<p>The URL is           http://inst.net/resources/assessments/tenp/groupLogin.php </p>
		<p>The code is: <?=$key_code?>  <br />(Please take the assessment only ONCE)</p>
		<p>You will see the login screen:</p>
		<img src="http://inst.net/resources/assets/images/tenPGroupLogin.JPG" style="margin:20px; padding-right:200px;"/><br>
		
		<p>After entering the code, complete the personal/work information; name and email address are required.</p>
		
		<h1>Results</h1>
		<p>This assessment quickly and effectively aggregates and analyzes the organization’s overall performance, 
		relative to importance, and highlights any disconnects. It easily identifies perceptual differences between 
		team members, departments or seniority and quickly leads all stakeholders to a shared view of reality. 
		Upon completion, you will have greater executive alignment and unity in support of your business purpose and 
		aligning resources around activities with the highest impact and return.</p>
	
	
		<img src="http://inst.net/resources/assets/images/tenpgraph.jpg" style="margin:20px;"/>
		<br>
		
		<p>Should you have any questions, please email info@inst.net</p>
		<p>Kind Regards,</p>
		The 10-P Assessment Administrator
		<?
		//copy current buffer contents into $message variable and delete current output buffer
		$message = ob_get_clean();
		
		 if (mail($to, $subject, $message, $headers)) {
		   writeToLogFile("Successfully send email to contact person: ".$emailAddress."\n\r");
		  } else {
		   writeToLogFile("Attempted email Request Failed\n\r");
		  }
	}
	
	/*
	 * sendTenFEmail - Send an email notifying user of their 10-F assessment details
	 */
	function sendTenFEmail($emailAddress, $key_code) {
		$to = $emailAddress;
		$subject = "10-F Assessment";
		 
		//create a boundary string. It must be unique
		//so we use the MD5 algorithm to generate a random hash
		$random_hash = md5(date('r', time())); 
		
		//define the headers we want passed. Note that they are separated with \r\n
		$headers = "From: info@inst.net\r\nReply-To: info@inst.net\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		$headers .= 'Bcc: gareths@inst.net' . "\r\n";
		
		//add boundary string and mime type specification
		//$headers .= "\r\nContent-Type: multipart/alternative; boundary=\"PHP-alt-".$random_hash."\"";
		//define the body of the message.
		ob_start(); //Turn on output buffering
		?>
		<h1>Overview</h1>
		<p>The 10-F Impact Assessment is a powerful personal diagnostic tool, that 
		provides constructive feedback on the top ten drivers of personal impact.</p>
		
		<h1>Login Information</h1>
		<p>The URL is           http://inst.net/resources/assessments/tenf/groupLogin.php </p>
		<p>The code is: <?=$key_code?>  <br />(Please take the assessment only ONCE)</p>
		<p>You will see the login screen:</p>
		<img src="http://inst.net/resources/assets/images/tenFGroupLogin.jpg" style="margin:20px; padding-right:200px;"/><br>
		
		<p>After entering the code, complete the personal/work information; name and email address are required.</p>
		
		<h1>Results</h1>
		<p>This assessment identifies values you have concerning your personal outlook on life, spanning the 10 F's: 
		Feelings, Fresh Thinking, Friendship, Fulfillment at Work, Function in Society, Fun, Family, Fitness, Finances and Faith. 
		This helps you identify what is important to your personal impact.</p>
	
	
		<img src="http://inst.net/resources/assets/images/tenfgraph.jpg" style="margin:20px;"/>
		<br>
		
		<p>Should you have any questions, please email info@inst.net</p>
		<p>Kind Regards,</p>
		The 10-F Assessment Administrator
		<?
		//copy current buffer contents into $message variable and delete current output buffer
		$message = ob_get_clean();
		
		 if (mail($to, $subject, $message, $headers)) {
		   writeToLogFile("Successfully send email to contact person: ".$emailAddress."\n\r");
		  } else {
		   writeToLogFile("Attempted email Request Failed\n\r");
		  }
	}
	
	/*
	 * sendKingdomEmail - Send an email notifying user of their 10-F assessment details
	 */
	function sendKingdomEmail($emailAddress, $key_code) {
		$to = $emailAddress;
		$subject = "Kingdom Impact Assessment";
		 
		//create a boundary string. It must be unique
		//so we use the MD5 algorithm to generate a random hash
		$random_hash = md5(date('r', time())); 
		
		//define the headers we want passed. Note that they are separated with \r\n
		$headers = "From: info@inst.net\r\nReply-To: info@inst.net\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		$headers .= 'Bcc: gareths@inst.net' . "\r\n";
		
		//add boundary string and mime type specification
		//$headers .= "\r\nContent-Type: multipart/alternative; boundary=\"PHP-alt-".$random_hash."\"";
		//define the body of the message.
		ob_start(); //Turn on output buffering
		?>
		<h1>Overview</h1>
		<p>There is a growing wave of business owners who subscribe to the idea that they are in business to advance God’s agenda. 
		Their businesses are often called "kingdom businesses" in that they are "about the Father’s business." Like other organizations, 
		they exist to have an Impact, but they want the impact of their business to last for eternity. Assessing how well one is achieving 
		this goal is challenging. </p>
		<p>The Kingdom Impact Assessment assists in this goal.</p>
		
		<h1>Login Information</h1>
		<p>The URL is           http://inst.net/resources/assessments/kingdom/groupLogin.php </p>
		<p>The code is: <?=$key_code?>  <br />(Please take the assessment only ONCE)</p>
		<p>You will see the login screen:</p>
		<img src="http://inst.net/resources/assets/images/kingdomGroupLogin.jpg" style="margin:20px; padding-right:200px;"/><br>
		
		<p>After entering the code, complete the personal/work information; name and email address are required.</p>
		
		<h1>Benefits</h1>
		<ul>
		<li>Probing —our work in repurposing 300 businesses around the world has given us a wealth of information on what constitutes a kingdom business</li>
 		<li>Comprehensive —The Impact Assessment looks at all drivers of corporate impact to evaluate how well kingdom thinking has permeated the business</li>
 		<li>Integrated —The entire Operating Model is considered as a whole</li>
 		<li>Insightful —The Impact Assessment quickly reveals gaps or misalignment in the Operating Model, identifies issues and shows where areas of improvement are needed</li>
 		</ul>
	
		<img src="http://inst.net/resources/assets/images/kingdomgraph.jpg" style="margin:20px;"/>
		<br>
		
		<p>Should you have any questions, please email info@inst.net</p>
		<p>Kind Regards,</p>
		The Kingdom Assessment Administrator
		<?
		//copy current buffer contents into $message variable and delete current output buffer
		$message = ob_get_clean();
		
		 if (mail($to, $subject, $message, $headers)) {
		   writeToLogFile("Successfully send email to contact person: ".$emailAddress."\n\r");
		  } else {
		   writeToLogFile("Attempted email Request Failed\n\r");
		  }
	}
	
	function updateSalesforce($firstName, $lastName, $email) {
		global 	$tenFAssessment, $tenFAssessmentQuantity, $tenPAssessment, $tenPAssessmentQuantity,
				$lemonAssessment,$lemonAssessmentQuantity,$kingdomAssessment,$kingdomAssessmentQuantity,$lemonGroupAssessment,$lemonGroupAssessmentQuantity,
				$convergenceBook,$convergenceBookQuantity,$convergenceEBook,$convergenceEBookQuantity,$lemonBook,$lemonBookQuantity,$lemonEBook,
				$lemonEBookQuantity,$repurposingCapitalEBook,$repurposingCapitalEBookQuantity,$transformingSocietyBook,$transformingSocietyBookQuantity,			
				$transformingSocietyEBook,$transformingSocietyEBookQuantity,$cyclesBook,$cyclesBookQuantity,$cyclesEBook,$cyclesEBookQuantity,
				$scorecardSubscribed,$scorecardSubscribedQuantity,$repurposingBusinessTraining,$repurposingBusinessTrainingQuantity,$intensiveTraining,			
				$intensiveTrainingQuantity;
		
		writeToLogFile( "\\r\nAbout to attempt salesforce update\r\n");
		//Check to see if cURL is installed ...
		if (!function_exists('curl_init')){
			die('Sorry cURL is not installed!');
		}
		// hard coded Identifiers for salesforce web-to-lead
		$oid = "00D700000009oC1";
		$h_Kingdom_Assessment ="00N700000032n6m";
		$h_LemonLeadership_Assessment = "00N700000032Ydn";
		$h_10PAssessment = "00N700000032Yds";
		$h_10FAssessment = "00N700000032Ydx";
		$h_LemonLeadership_GroupAssessment = "";
		$returnURL = "http://inst.americommerce.com";
		
		$h_ConvergenceBook = "00N700000032YcQ";
		$h_ConvergenceEBook = "00N700000032YcV";
		$h_LemonBook = "00N700000032Yca";
		$h_LemonEBook = "00N700000032Ycf";
		$h_RepurposingCapitalEBook = "00N700000032Yck";
		$h_TransformingSocietyBook = "00N700000032Ycp";
		$h_TransformingSocietyEBook = "00N700000032Ycu";
		$h_Cycles = "00N700000032Ycz";
		$h_CyclesEBook = "00N700000032Yd9";
		$h_ScorecardSubscribed = "00N700000032YdE";
		$h_RepurposingBusinessTraining = "00N700000032YdY";
		$h_IntensiveTraining = "00N700000032Ydd";
		
		// Construct the Post array
		$kv = array();		
		$kv[] = stripslashes('oid')."=".stripslashes($oid);
		$kv[] = stripslashes('first_name')."=".stripslashes($firstName);
		$kv[] = stripslashes('last_name')."=".stripslashes($lastName);
		$kv[] = stripslashes('email')."=".stripslashes($email);
		$kv[] = stripslashes('retURL')."=".stripslashes($returnURL);
		if($tenFAssessment){
			$kv[] = stripslashes($h_10FAssessment)."=".$tenFAssessmentQuantity;
		}	 		
		if($tenPAssessment){
			$kv[] = stripslashes($h_10PAssessment)."=".$tenPAssessmentQuantity;
		}
		if($lemonAssessment) {
			$kv[] = stripslashes($h_LemonLeadership_Assessment)."=".$lemonAssessmentQuantity;
		}
		if($lemonGroupAssessment) {
			$kv[] = stripslashes($h_LemonLeadership_GroupAssessment)."=".$lemonGroupAssessmentQuantity;
		}
		if($kingdomAssessment) {
			$kv[] = stripslashes($h_Kingdom_Assessment)."=".$kingdomAssessmentQuantity;
		}
		if($convergenceBook) {
			$kv[] = stripslashes($h_ConvergenceBook)."=".$convergenceBookQuantity;
		}
		if($convergenceEBook) {
			$kv[] = stripslashes($h_ConvergenceEBook)."=".$convergenceEBookQuantity;
		}
		if($lemonBook) {
			$kv[] = stripslashes($h_LemonBook)."=".$lemonBookQuantity;
		}
		if($lemonEBook) {
			$kv[] = stripslashes($h_LemonEBook)."=".$lemonEBookQuantity;
		}
		if($repurposingCapitalEBook) {
			$kv[] = stripslashes($h_RepurposingCapitalEBook)."=".$repurposingCapitalEBookQuantity;
		}
		if($transformingSocietyBook) {
			$kv[] = stripslashes($h_TransformingSocietyBook)."=".$transformingSocietyBookQuantity;
		}
		if($transformingSocietyEBook) {
			$kv[] = stripslashes($h_TransformingSocietyEBook)."=".$transformingSocietyEBookQuantity;
		}
		if($cyclesBook) {
			$kv[] = stripslashes($h_Cycles)."=".$cyclesBookQuantity;
		}
		if($cyclesEBook) {
			$kv[] = stripslashes($h_CyclesEBook)."=".$cyclesEBookQuantity;
		}
		if($scorecardSubscribed) {
			$kv[] = stripslashes($h_ScorecardSubscribed)."=".$scorecardSubscribedQuantity;
		}
		if($repurposingBusinessTraining) {
			$kv[] = stripslashes($h_RepurposingBusinessTraining)."=".$repurposingBusinessTrainingQuantity;
		}
		if($intensiveTraining) {
			$kv[] = stripslashes($h_IntensiveTraining)."=".$intensiveTrainingQuantity;
		}
		
		//The original form action URL from Step 2 :)
		$url = 'https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8';
		
		//Open cURL connection
		writeToLogFile( "\r\nAbout to open curl connection...\r\n");
		$ch = curl_init();
		$query_string = join("&", $kv);
		writeToLogFile( "\r\nQuery string = ". $query_string ."\r\n");
		writeToLogFile( "\r\nQuery count = ". count($kv)."\r\n");
		
		//Set the url, number of POST vars, POST data
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, count($kv));
		curl_setopt($ch, CURLOPT_POSTFIELDS, $query_string);
		
		//Set some settings that make it all work :)
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, FALSE);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
		writeToLogFile( "Set all the curl options...About to execute\r\n");
		//Execute SalesForce web to lead PHP cURL
		$result = curl_exec($ch);
		if($result) {
			writeToLogFile( "curl was successful\r\n");
		} else {
			writeToLogFile( "curl failed\r\n");
			$error = curl_error($ch);
			writeToLogFile(print_r($error,true));
		}
		writeToLogFile( "\r\nexecuted and closing the curl.\r\n");
		//close cURL connection
		curl_close($ch);
	}
?>
