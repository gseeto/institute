<?php
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

/** PHPExcel */
require_once __INCLUDES__.'/Classes/PHPExcel.php';
require_once __INCLUDES__.'/Classes/PHPExcel/IOFactory.php';

//require_once '/var/www/includes/Classes/PHPExcel.php';
//require_once '/var/www/includes/Classes/PHPExcel/IOFactory.php';

	$strParameter = QApplication::PathInfo(0);
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()->setCreator("inst.net")
					 ->setLastModifiedBy("inst.net")
					 ->setTitle("Scorecard")
					 ->setSubject("Scorecard")
					 ->setDescription("Scorecard")
					 ->setKeywords("")
					 ->setCategory("");

	$company = Company::Load(Scorecard::Load($strParameter)->Company->Name);
	foreach(CategoryType::$NameArray as $val) {
		if($val != 'Purpose') {
			$objWorksheet2 = $objPHPExcel->createSheet();
			$objWorksheet2->setTitle($val);
		}
	}
	for($index=1; $index<11; $index++) {
		$objPHPExcel->setActiveSheetIndex($index-1);
		$objPHPExcel->getActiveSheet()->setTitle(CategoryType::$NameArray[$index]);
		$objPHPExcel->getActiveSheet()->setCellValue('B1', $company);
		$objPHPExcel->getActiveSheet()->getStyle('B1')->getFont()->setSize(16); 
		$objPHPExcel->getActiveSheet()->getStyle('B1')->getFont()->setBold(true);
						
		$objPHPExcel->getActiveSheet()->setCellValue('B3', CategoryType::$NameArray[$index]);
		$objPHPExcel->getActiveSheet()->getStyle('B3')->getFont()->setSize(14); 
		$objPHPExcel->getActiveSheet()->getStyle('B3')->getFont()->setBold(true);
		
		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(50);
		$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
		$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(50);
		$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(50);
		
		$i = 5;
		// Print purpose or Positioning statement
		if((CategoryType::$NameArray[$index] == 'Purpose') ||(CategoryType::$NameArray[$index] == 'Positioning')) {
			$objPHPExcel->getActiveSheet()->setCellValue('E' . $i, CategoryType::$NameArray[$index]." Statement");
			$objPHPExcel->getActiveSheet()->getStyle('E'. $i)->getFont()->setSize(12); 
			$objPHPExcel->getActiveSheet()->getStyle('E'. $i)->getFont()->setBold(true);
			$i++;
			$statementArray = Statement::LoadArrayByScorecardId($strParameter);
			if(CategoryType::$NameArray[$index] == 'Purpose') {
				if($statementArray[0]->IsPurpose) {
					$objPHPExcel->getActiveSheet()->setCellValue('E' . $i, htmlspecialchars_decode($statementArray[0]->Value));
				} else {
					$objPHPExcel->getActiveSheet()->setCellValue('E' . $i, htmlspecialchars_decode($statementArray[1]->Value));
				}
			} else {
				if($statementArray[0]->IsPurpose) {
					$objPHPExcel->getActiveSheet()->setCellValue('E' . $i, htmlspecialchars_decode($statementArray[1]->Value));
				} else {
					$objPHPExcel->getActiveSheet()->setCellValue('E' . $i, htmlspecialchars_decode($statementArray[0]->Value));
				}
			}
		}
		$i--;
		
		// Print Summary
		$objPHPExcel->getActiveSheet()->setCellValue('B' . $i, CategoryType::$NameArray[$index]." Summary");
		$objPHPExcel->getActiveSheet()->getStyle('B'. $i)->getFont()->setSize(12); 
		$objPHPExcel->getActiveSheet()->getStyle('B'. $i)->getFont()->setBold(true);
		$i++;
		$objPHPExcel->getActiveSheet()->setCellValue('A' . $i, 'Strategy');
		$objPHPExcel->getActiveSheet()->getStyle('A' . $i)->getFont()->setBold(true);
		$objPHPExcel->getActiveSheet()->setCellValue('B' . $i, "Description");
		$objPHPExcel->getActiveSheet()->getStyle('B' . $i)->getFont()->setBold(true);
		$strategyArray = Strategy::LoadArrayByScorecardIdAndCategoryTypeId($strParameter, $index);
		foreach($strategyArray as $objStrategy) {
			$objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $objStrategy->Count);
			$objPHPExcel->getActiveSheet()->setCellValue('B' . $i, htmlspecialchars_decode($objStrategy->Strategy));
			$i++;
		}
		
		// Print Detail
		$i = $i+4;
		$objPHPExcel->getActiveSheet()->setCellValue('B' . $i, CategoryType::$NameArray[$index]." Detail");
		$objPHPExcel->getActiveSheet()->getStyle('B'. $i)->getFont()->setSize(12); 
		$objPHPExcel->getActiveSheet()->getStyle('B'. $i)->getFont()->setBold(true);
		$i++;
		foreach($strategyArray as $objStrategy) {
			$objPHPExcel->getActiveSheet()->setCellValue('A' . $i, "Strategy");
			$objPHPExcel->getActiveSheet()->getStyle('A' . $i)->getFont()->setBold(true);
			$objPHPExcel->getActiveSheet()->setCellValue('B' . $i, "Description");
			$objPHPExcel->getActiveSheet()->getStyle('B' . $i)->getFont()->setBold(true);
			$objPHPExcel->getActiveSheet()->setCellValue('C' . $i, "Priority");
			$objPHPExcel->getActiveSheet()->getStyle('C' . $i)->getFont()->setBold(true);
			$i++;
			$objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $objStrategy->Count);
			$objPHPExcel->getActiveSheet()->setCellValue('B' . $i, htmlspecialchars_decode($objStrategy->Strategy));
			$objPHPExcel->getActiveSheet()->setCellValue('C' . $i, $objStrategy->Priority);
			$i++;
			$i++;
			$objPHPExcel->getActiveSheet()->setCellValue('B' . $i, "Action Items");
			$objPHPExcel->getActiveSheet()->getStyle('B' . $i)->getFont()->setBold(true);
			$i++;
			$objPHPExcel->getActiveSheet()->setCellValue('A' . $i, "index");
			$objPHPExcel->getActiveSheet()->getStyle('A' . $i)->getFont()->setBold(true);
			$objPHPExcel->getActiveSheet()->setCellValue('B' . $i, "action");
			$objPHPExcel->getActiveSheet()->getStyle('B' . $i)->getFont()->setBold(true);
			$objPHPExcel->getActiveSheet()->setCellValue('C' . $i, "when");
			$objPHPExcel->getActiveSheet()->getStyle('C' . $i)->getFont()->setBold(true);
			$objPHPExcel->getActiveSheet()->setCellValue('D' . $i, "who");
			$objPHPExcel->getActiveSheet()->getStyle('D' . $i)->getFont()->setBold(true);
			$objPHPExcel->getActiveSheet()->setCellValue('E' . $i, "comments");
			$objPHPExcel->getActiveSheet()->getStyle('E' . $i)->getFont()->setBold(true);
			$actionArray = ActionItems::LoadArrayByStrategyId($objStrategy->Id);
			foreach($actionArray as $objAction){
				$i++;
				$objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $objAction->Count);
				$objPHPExcel->getActiveSheet()->setCellValue('B' . $i, htmlspecialchars_decode($objAction->Action));
				$objPHPExcel->getActiveSheet()->setCellValue('C' . $i, gmdate("Y-m-d", strtotime($objAction->When)));
				$objUser = User::Load($objAction->Who);
				if($objUser) {
					$objPHPExcel->getActiveSheet()->setCellValue('D' . $i, $objUser->FirstName . ' '.$objUser->LastName);
				} else {
					$objPHPExcel->getActiveSheet()->setCellValue('D' . $i, ' ');
				}
				$objPHPExcel->getActiveSheet()->setCellValue('E' . $i, htmlspecialchars_decode($objAction->Comments));
			}
			$i++;
			$i++;
			$objPHPExcel->getActiveSheet()->setCellValue('B' . $i, "KPIs");
			$objPHPExcel->getActiveSheet()->getStyle('B' . $i)->getFont()->setBold(true);
			$i++;
			$objPHPExcel->getActiveSheet()->setCellValue('A' . $i, "index");
			$objPHPExcel->getActiveSheet()->getStyle('A' . $i)->getFont()->setBold(true);
			$objPHPExcel->getActiveSheet()->setCellValue('B' . $i, "KPI");
			$objPHPExcel->getActiveSheet()->getStyle('B' . $i)->getFont()->setBold(true);
			$objPHPExcel->getActiveSheet()->setCellValue('C' . $i, "Comments");
			$objPHPExcel->getActiveSheet()->getStyle('C' . $i)->getFont()->setBold(true);
			$objPHPExcel->getActiveSheet()->setCellValue('D' . $i, "rating");
			$objPHPExcel->getActiveSheet()->getStyle('D' . $i)->getFont()->setBold(true);
			$kpiArray = Kpis::LoadArrayByStrategyId($objStrategy->Id);
			foreach($kpiArray as $objKpi){
				$i++;
				$objPHPExcel->getActiveSheet()->setCellValue('A' . $i, $objKpi->Count);
				$objPHPExcel->getActiveSheet()->setCellValue('B' . $i, htmlspecialchars_decode($objKpi->Kpi));
				$objPHPExcel->getActiveSheet()->setCellValue('C' . $i, htmlspecialchars_decode($objKpi->Comments));
				$objPHPExcel->getActiveSheet()->setCellValue('D' . $i, $objKpi->Rating);
			}
			$i = $i+3;
		}
		$objPHPExcel->getActiveSheet()->getStyle('B5:F'.$i)->getAlignment()->setWrapText(true);
	}
	
    foreach($objPHPExcel->getActiveSheet()->getRowDimensions() as $rd) { 
	    $rd->setRowHeight(-1); 
	}
	///////////////////////////////////////////////////////////////////////////////////////
	// Set active sheet index to the first sheet, so Excel opens this as the first sheet
	$objPHPExcel->setActiveSheetIndex(0);
	
	
	// Redirect output to a client's web browser (Excel5)
	$tUnixTime = time();
	$sGMTMySqlString = gmdate("Y-m-d", $tUnixTime);
	header('Content-Type: application/vnd.ms-excel');
	header('Content-Disposition: attachment;filename="'.Scorecard::Load($strParameter)->Name.$sGMTMySqlString.'-scorecard.xls"');
	header('Cache-Control: max-age=0');
	
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
	$objWriter->save('php://output');
	exit;
        
?>