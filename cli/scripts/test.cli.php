<?php
	// Setup Zend Framework load
	set_include_path(get_include_path() . ':' . __INCLUDES__);
	require_once('../includes/Zend/Loader.php');
	Zend_Loader::loadClass('Zend_Pdf');

	print "This tests to see if the Zend Framework was installed properly.\r\n";

	require('../includes/Zend/Version.php');
	if (Zend_Version::VERSION) {
		print "Your currently installed ZendFramework version is: " . Zend_Version::VERSION . "\r\n";
	}
	print "About to try generate pdf\r\n";
	// Create the PDF Object for the PDF
	$objLemonPdf = new Zend_Pdf();		
	// Create PDF
	$objPage = $objLemonPdf->newPage(Zend_Pdf_Page::SIZE_LETTER);
	$objLemonPdf->pages[] = $objPage;
	$objPage->setFont(Zend_Pdf_Font::fontWithName(Zend_Pdf_Font::FONT_HELVETICA_BOLD), 12);
	$objPage->drawText("Test run", 36, 60, 'UTF-8');
	
	$pdfFile = __UPLOAD_DIR__ . '/Lemon' . '.pdf';
	$objLemonPdf->save($pdfFile);
	print "Finished\r\n";
		
?>