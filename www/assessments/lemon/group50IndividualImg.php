<?php 
require(dirname(__FILE__) . '/../../../includes/prepend.inc.php');

$strArgs = substr(QApplication::$PathInfo, 1 );
$assessmentArray = explode('/',$strArgs);
foreach($assessmentArray as $intAssessmentId) {
?>
<img src="<?php _p(__SUBDIRECTORY__)?>/assessments/lemon/lemon50AssessmentImg.php/<?php _p($intAssessmentId)?>" /> 
<br><br>
<?php 
}
?>
