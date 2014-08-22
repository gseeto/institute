<?php
	/** PHPExcel */
	require_once __INCLUDES__.'/Classes/PHPExcel.php';
	require_once __INCLUDES__.'/Classes/PHPExcel/IOFactory.php';
	
	$objParameters = new QCliParameterProcessor('upload', 'Upload Single LEMON Assessment');
	$objParameters->AddDefaultParameter('filename', QCliParameterType::String, 'LEMON Assessment to upload');
	$objParameters->AddDefaultParameter('group', QCliParameterType::String, 'Group KeyCode to assign this LEMON Assessment to');
	$objParameters->Run();
	
	$strFilename = $objParameters->GetDefaultValue('filename');
	$strgroup = $objParameters->GetDefaultValue('group');
	print "Attempting to upload ".$strFilename. "\r\n";
	
	$objPHPExcel = PHPExcel_IOFactory::load($strFilename);
	$worksheet = $objPHPExcel->getSheetByName("Personal Assessment");
	// Get Name
	$name = $worksheet->getCell("B3")->getValue();
	print "Name = ". $name . "\r\n";
	
	// Get Title
	$title = $worksheet->getCell("B4")->getValue();
	print "Title = ". $title . "\r\n";
	
	// Get Tenure
	$tenure = $worksheet->getCell("I4")->getValue();
	print "Tenure = ". $tenure . "\r\n";
	
	// Get Email
	$email = $worksheet->getCell("B6")->getValue();
	print "Email = ". $email . "\r\n";
	 // Get the summarized totals for each leadership type
	 $L = $worksheet->getCell("P3")->getCalculatedValue();
	 $E = $worksheet->getCell("Q3")->getCalculatedValue();
	 $M = $worksheet->getCell("R3")->getCalculatedValue();
	 $O = $worksheet->getCell("S3")->getCalculatedValue();
	 $N = $worksheet->getCell("T3")->getCalculatedValue();
	 
	 print "L = ".$L . " E = ". $E ." M = ".$M . " O = ". $O. " N = ".$N."\r\n";
	// The initial starting point to grab all the results of each question
	$col = 13;
	$results = array();
	for($row=14; $row <(14+75); $row++) {
		$results[] = $worksheet->getCell("N".$row)->getCalculatedValue();
	}
	$i = 1;
	foreach ($results as $result) {
		print "Q".$i . " = ". $result . "\r\n";
		$i++;
	}

	// Now to upload to the database.
	// 1) Create a user if one does not already exist
	$nameArray = explode(" ",trim($name));
	$objLogin = new Login();
	$objLogin->Username = $nameArray[1].'_generated';
	$objLogin->Password = $nameArray[1].'_generated';
	$objLogin->RoleId = Role::LoadByName("User")->Id;
	$intLoginId = $objLogin->Save();
	
	$objUser = new User();
	$objUser->FirstName = $nameArray[0];
	$objUser->LastName = $nameArray[1];
	$objUser->Email = $email;
	
	if($tenure > 7)
		$objUser->TenureId = 3;
	else if($tenure > 4)
		$objUser->TenureId = 2;
	else 
		$objUser->TenureId = 1;

	// Currently there's no easy way to connect title in the spreadsheet with the existing options we have in the new DB
	//$objUser->TitleId = $title;  
	$objUser->LoginId = $intLoginId;
	$intUserId = $objUser->Save();
		
	// 2) Create a lemon assessment object, associating with the right user Id
	$objAssessment = new LemonAssessment();
	$objAssessment->UserId = $intUserId;
    $objAssessment->ResourceId = 5; //LemonAssessment - going to have to find a nicer way of doing this
    $objAssessment->ResourceStatusId = 2; // set state to touched
    $objGroupArray = GroupAssessmentList::LoadArrayByKeyCode($strgroup);
    if(!empty($objGroupArray)) {
    	$bfound = false;
    	foreach($objGroupArray as $objGroup) {
    		if($objGroup->ResourceId == 5) {
    			$objAssessment->GroupId = $objGroup->Id;
    			$bfound = true;
    			break;
    		}
    	}
    	if(!$bfound) {
    		$objGroup = new GroupAssessmentList();
	    	$objGroup->KeyCode = $strgroup;
	    	$objGroup->ResourceId = 5;
	    	$intGroupId = $objGroup->Save();
	    	$objAssessment->GroupId = $intGroupId;
    	}
    } else {
    	$objGroup = new GroupAssessmentList();
    	$objGroup->KeyCode = $strgroup;
    	$objGroup->ResourceId = 5;
    	$intGroupId = $objGroup->Save();
    	$objAssessment->GroupId = $intGroupId;
    }
    $objUser = User::Load($intUserId);
    $objUser->AssociateResource(Resource::Load(5));
	$intAssessmentId = $objAssessment->Save();
	
	// 3) Create a LEMON Results object.
	for($i=0;$i<count($results); $i++) {	    
	    $objResults = new LemonAssessmentResults();	    
	    $objResults->AssessmentId = $intAssessmentId;  
	    $objResults->Value =  $results[$i];
	    $objResults->QuestionId = $i+1;
	    $objResults->Save(); 
    }
	print "Finished processing.\r\n";
?>