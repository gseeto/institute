<?php require('/../..'.__INCLUDES__ . '/header.inc.php'); ?>
<script type="text/javascript">	

function DisplayChart(userData) {
	var chart;

   	// SERIAL CHART
        chart = new AmCharts.AmSerialChart();
        chart.dataProvider = userData;
        chart.categoryField = "section";
        // the following two lines makes chart 3D
        chart.depth3D = 20;
        chart.angle = 30;

        // AXES
        // category
        var categoryAxis = chart.categoryAxis;
        categoryAxis.labelRotation = 90;
        categoryAxis.dashLength = 5;
        categoryAxis.gridPosition = "start";

        // value
        var valueAxis = new AmCharts.ValueAxis();
        valueAxis.title = "Level of Completion";
        valueAxis.dashLength = 7;
        valueAxis.maximum = 7;
        chart.addValueAxis(valueAxis);

        // GRAPH            
        var graph = new AmCharts.AmGraph();
        graph.valueField = "value";
        graph.colorField = "color";
        graph.balloonText = "[[category]]: [[value]] Average Completion rating";
        graph.type = "column";
        graph.showAllValueLabels = true;
        graph.lineAlpha = 0;
        graph.fillAlphas = 1;
        chart.addGraph(graph);

        // WRITE
        chart.write("chartdiv");
}

                      
            function DisplayQuestions(id) {         
            	x = document.getElementsByClassName("Ps");	
            	for (i = 0; i < x.length; i++) {
            	    x[i].style.display = "none";
            	}
            	document.getElementById(id).style.display = "inline";
            }
        </script>

<div class="section">
<div id="chartdiv" style="width:800px; height:400px; margin: 0 auto; position: relative;"></div>
<div style="display:none;">
   <img src='<?php _p(__SUBDIRECTORY__);?>/checklist/i4center/checklistImg.php/<?php _p($this->objChecklist->Id);?>'> 
</div>
<?php  $this->btnGeneratePdf->Render(); ?>
<p>
Please rate each statement below using the scale from 1 to 7 in the drop-down box to the right of the statement.<br>
<div style="padding-left:20px; margin-bottom:10px;">
1 - The task has not been started yet<br>
4 - I'm about halfway done<br>
7 - The task has been completed<br>
</div>
<?php /* $this->lblDebug->Render(); */?>
</p>
<?php $this->one->Render(); ?><?php $this->two->Render(); ?><?php $this->three->Render(); ?><?php $this->four->Render(); ?><?php $this->five->Render(); ?><?php $this->six->Render(); ?><?php $this->seven->Render(); ?><?php $this->eight->Render(); ?><?php $this->nine->Render(); ?><?php $this->ten->Render(); ?><?php $this->eleven->Render(); ?>
<?php $this->twelve->Render(); ?><?php $this->thirteen->Render(); ?><?php $this->fourteen->Render(); ?><?php $this->fifteen->Render(); ?>
<?php $this->sixteen->Render(); ?><?php $this->seventeen->Render(); ?><?php $this->eighteen->Render(); ?><?php $this->nineteen->Render(); ?>
<?php $this->twenty->Render(); ?><?php $this->twentyone->Render(); ?>
<?php  
 
for($i=0; $i< ChecklistCategories::CountAll();$i++) {
?>
<div class="Ps" id="<?php _p($i+1);?>">
	<br>
	<h3><?php _p(ChecklistCategories::Load($i+1)->Value);?></h3>
<?php 
	$this->dtgChecklistQuestionArray[$i]->Render();
?>
</div>
<?php 
}
?>
<br>
<?php  $this->btnPrev->Render(); ?>
<?php  $this->btnNext->Render(); ?>
<?php  $this->btnCancel->Render(); ?>
</div>
<?php require('/../..'.__INCLUDES__ . '/footer.inc.php'); ?>