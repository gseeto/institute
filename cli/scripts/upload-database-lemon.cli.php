<?php
	/** PHPExcel */
	require_once __INCLUDES__.'/Classes/PHPExcel.php';
	require_once __INCLUDES__.'/Classes/PHPExcel/IOFactory.php';
	
	$objParameters = new QCliParameterProcessor('uploadDB', 'Upload database of LEMON Assessment. NOTE: Because of the potential for large DBs you need to convert to a CSV file.');
	$objParameters->AddDefaultParameter('filename', QCliParameterType::String, 'LEMON Assessment Database to upload');
	$objParameters->Run();
	
	$strFilename = $objParameters->GetDefaultValue('filename');
	print "Attempting to upload ".$strFilename. "\r\n";
	
	$objPHPExcel = PHPExcel_IOFactory::load($strFilename);
	$worksheet = $objPHPExcel->getActiveSheet();
	$bIsData = true;
	$row = 18; // starting point of data
	while($bIsData) {
		$name = $worksheet->getCell("B".$row)->getValue();
		$L = $worksheet->getCell("C".$row)->getValue();
		$E = $worksheet->getCell("D".$row)->getValue();
		$M = $worksheet->getCell("E".$row)->getValue();
		$O = $worksheet->getCell("F".$row)->getValue();
		$N = $worksheet->getCell("G".$row)->getValue();
		$email = $worksheet->getCell("R".$row)->getValue();
		$sex = $worksheet->getCell("S".$row)->getValue();
		$country = $worksheet->getCell("T".$row)->getValue();
		$company = $worksheet->getCell("U".$row)->getValue();
		
		print "Name = ". $name . "    L : ".$L ."    E: ".$E ."    M: ". $M ."    O: ". $O . "    N: ".$N . " sex = ".$sex. " country = ".$country . " Company = ".$company. "\r\n";
		// Upload to the DB
		// 1) Create a user if one does not already exist
		$nameArray = explode(" ",trim($name));
		$objLogin = new Login();
		if(count($nameArray)>1){
			$objLogin->Username = $nameArray[1].'_generated';
			$objLogin->Password = $nameArray[1].'_generated';
		} else {
			$objLogin->Username = $nameArray[0].'_generated';
			$objLogin->Password = $nameArray[0].'_generated';
		}
		$objLogin->RoleId = Role::LoadByName("User")->Id;
		$intLoginId = $objLogin->Save();
		
		$objUser = new User();
		$objUser->FirstName = $nameArray[0];
		$objUser->LastName = (count($nameArray)>1)? $nameArray[1] : ' ';
		$objUser->Email = $email;
		$objCountry = CountryList::LoadByName($country);
		$objUser->CountryId = ($objCountry)? $objCountry->Id : null;
		
		if($sex == 'M')
			$objUser->Gender = 1;
		else
			$objUser->Gender = 0;
			
		$objUser->LoginId = $intLoginId;
		$intUserId = $objUser->Save();

		// 2) Create Company if it doesn't exist
		$objCompanyArray  = Company::LoadArrayByName($company);
		$intCompanyId = 0;
		if(!empty($objCompanyArray)) {
	    	$intCompanyId = $objCompanyArray[0]->Id;
		} else {
			$objCompany = new Company();
			$objCompany->Name = $company;
			$intCompanyId = $objCompany->Save();
		}
		// 2) Create a lemon assessment object, associating with the right user Id
		$objAssessment = new LemonAssessment();
		$objAssessment->UserId = $intUserId;
	    $objAssessment->ResourceId = 5; //LemonAssessment - going to have to find a nicer way of doing this
	    $objAssessment->ResourceStatusId = 2; // set state to touched
	    $objAssessment->CompanyId = $intCompanyId;
	    // Check to see if a group with Copany name exists
	    $objGroupArray = GroupAssessmentList::LoadArrayByKeyCode($company);
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
		    	$objGroup->KeyCode = $company;
		    	$objGroup->ResourceId = 5;
		    	$intGroupId = $objGroup->Save();
		    	$objAssessment->GroupId = $intGroupId;
	    	}
	    } else {
	    	$objGroup = new GroupAssessmentList();
	    	$objGroup->KeyCode = $company;
	    	$objGroup->ResourceId = 5;
	    	$intGroupId = $objGroup->Save();
	    	$objAssessment->GroupId = $intGroupId;
	    }
	    $objAssessment->L = round($L);
	    $objAssessment->E = round($E);
	    $objAssessment->M = round($M);
	    $objAssessment->O = round($O);
	    $objAssessment->N = round($N);
	    $objUser = User::Load($intUserId);
	    $objUser->AssociateResource(Resource::Load(5));
		$intAssessmentId = $objAssessment->Save();
	
		$row++;
		if(($worksheet->getCell("A".$row) == NULL) || ($worksheet->getCell("A".$row)->getValue() == null))
			$bIsData = false;		
	}
	print "Finished processing.\r\n";
?>