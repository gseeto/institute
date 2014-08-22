<?php
/* For each user:
	See if they're assigned any scorecards
	If they belong to scorecards, 
		Determine action items assigned to them that are past the due date.
		Grab the top 5 actions assigned to them based on priority
		Send email
*/
$objConditions = QQ::All(); 	
$objConditions = QQ::AndCondition($objConditions,QQ::IsNotNull(QQN::User()->Email));
$objUserArray = User::QueryArray($objConditions);
print sprintf("User Count = %d\n\n",count($objUserArray));
foreach($objUserArray as $objUser) {
	$strTotalOutput = '';
	$strTextTotalOutput = '';
	$strIntro = sprintf("Hello %s,<br>The following is a digest of your top 5 action items for the week and a list of any Overdue items for each Scorecard you are assigned to.<br><br>Regards,<br>The Scorecard Administrator<br><br>",
		$objUser->FirstName);
	$strTextIntro = sprintf("Hello %s,\nThe following is a digest of your top 5 action items for the week and a list of any Overdue items for each Scorecard you are assigned to.\n\nRegards,
	nThe Scorecard Administrator\n\n",
		$objUser->FirstName);
	if($objUser->CountScorecards() != 0) {
		print sprintf("%s %s is a scorecard member. Check to see if they need to be notified.\n",
			$objUser->FirstName, $objUser->LastName);
		$objScorecardArray = $objUser->GetScorecardArray();
		foreach($objScorecardArray as $objScorecard) {
			$objTopFive = array();
			$objOverdue = array();
			$objTextOverdue = array();
			$objActionItemArray = $objScorecard->GetActionItemsArray();
			foreach($objActionItemArray as $objActionItem) {
				if($objActionItem->Who == $objUser->Id) {
					// Populate top 5 Actions Array
					// Populate Overdue Actions array
					//print sprintf("Scorecard: %s  \nStrategy: %s\n Action Item: %s\n\n",
					//	$objScorecard->Name,$objActionItem->Strategy->Strategy,$objActionItem->Action);
					if($objActionItem->StatusType != StatusType::_100) {
						$objTopFive[] = sprintf("%d,%s,%s,%s,%s",
							$objActionItem->Strategy->Priority,
							$objActionItem->When,
							$objActionItem->Action, 
							$objActionItem->Strategy->Strategy,
							CategoryType::ToString($objActionItem->Strategy->CategoryTypeId));
						
						$sGMTToday = gmdate("Y-m-d H:i:s", time());
						if($sGMTToday > $objActionItem->When) {
							$objOverdue[] = sprintf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>",
								CategoryType::ToString($objActionItem->Strategy->CategoryTypeId),
								$objActionItem->Strategy->Strategy,
								$objActionItem->Action,
								$objActionItem->When);
							$objTextOverdue[] = sprintf("P: %s  Strategy: %s  Action Item: %s  When: %s\n",
								CategoryType::ToString($objActionItem->Strategy->CategoryTypeId),
								$objActionItem->Strategy->Strategy,
								$objActionItem->Action,
								$objActionItem->When);
						}
					}
				}
			}
			$strOutput = '<h1>Top 5 Action Items for the Week</h1>';
			$strOutput .= '<table><th><td>Rank</td><td>P</td><td>Strategy/Action</td></th>';
			$strTextOutput = 'Top 5 Action Items for the Week\n\n';
			
			// Order the top 5 and construct the arrays.
			sort($objTopFive);
			for($i=0; $i<count($objTopFive); $i++) {
				$topFiveArray = explode(",",$objTopFive[$i]);
				$strOutput .= sprintf("<tr><td>%s</td><td>Strategy: %s<br>Action:%s</td></tr>",$i+1,$topFiveArray[4],$topFiveArray[3],$topFiveArray[2]);
				$strTextOutput .= sprintf("Rank: %s Strategy: %s  Action:%s\n",$i+1,$topFiveArray[4],$topFiveArray[3],$topFiveArray[2]);;
				if($i>=4) break;
			}
			$strOutput .= '</table>';
			$strOutput .= '<br><h1>Overdue Action Items</h1>';
			$strOutput .= '<table><th><td>P</td><td>Strategy</td><td>Action</td><td>Due By</td></th>';
			$strTextOutput .= 'Overdue Action Items';
			foreach($objOverdue as $item) {
				$strOutput .= $item;
			}
			$strOutput .= '</table>';
			$strTotalOutput .= sprintf("<h1>%s</h1>",$objScorecard->Name);
			$strTotalOutput .= $strOutput;
			
			foreach($objTextOverdue as $item) {
				$strTextOutput .= $item;
			}
			$strTextTotalOutput .= sprintf("%s",$objScorecard->Name);
			$strTextTotalOutput .= $strTextOutput;
		}
		//print sprintf("\n%s %s\n\n",$strIntro, $strTotalOutput);
		$objMessage = new QEmailMessage();
		QEmailServer::$TestMode = true;
		QEmailServer::$TestModeDirectory = '/home/gseeto/tmp/';
		QEmailServer::$SmtpServer = MAIL_SERVER;
    	$objMessage->From = 'Scorecard Administrator <info@inst.net>';
	    $objMessage->To = $objUser->Email;
	    $objMessage->Subject = 'Scorecard Action Item Digest for ' . QDateTime::NowToString(QDateTime::FormatDisplayDate);
	    $objMessage->HtmlBody = sprintf("<br>%s %s<br><br>",$strIntro, $strTotalOutput);
	    $objMessage->Body = sprintf("\n%s %s\n\n",$strTextIntro, $strTextTotalOutput);
	    QEmailServer::Send($objMessage);
	}
}


?>