<?php require('/../../..'.__INCLUDES__ . '/header.inc.php'); ?>


<div class="section">
<h3>INSTRUCTIONS POUR COMPLETER CETTE EVALUATION</h3>
<p>
1. Soyez sincere!<br>
2. Ne prenez pas en compte votre situation ou activite professionnelle - repondez ce que vous feriez naturellement.<br>
3. Il n'y a pas de bonnes ou mauvaises reponses.<br>
4. Ne sur-analysez pas. Si vous ne saisissez pas le sens de la proposition, ce n'est certainement pas vous; attribuez une note basse.<br>
5. Mieux vous notez vos reponses (de 0 a 7), plus l'evaluation sera precise et juste.<br>
<div style="padding-left:20px; margin-bottom:10px;">
    7 = Oui, je suis tout s fait d'accord, c'est vraiment moi<br>
    0 = Non, je ne suis pas d'accord, ce n'est pas moi du tout<br>
</div>
</p>
<?php  $this->dtgAssessmentQuestions->Render(); ?>
<?php  $this->btnSubmit->Render(); ?>
<?php  $this->btnCancel->Render(); ?>
</div>
<?php require('/../..'.__INCLUDES__ . '/footer.inc.php'); ?>