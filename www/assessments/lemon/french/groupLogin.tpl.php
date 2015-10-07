<?php require('/../..'.__INCLUDES__ . '/externheader.inc.php'); ?>
<div class="lemonSection">
<p>
Découvrez votre profil de CITRON en prenant l'évaluation citron. Après la prise de cette évaluation de 
75 questions, vous trouverez sur le profil de votre profil de CITRON primaire et secondaire. 
Vous saurez quel type de leader que vous êtes.
</p>
Si vous avez un code, s'il vous plaît entrer ici:
<?php $this->txtKeyCode->Render(); ?>
&nbsp;&nbsp;
<?php $this->btnSubmit->Render(); ?>
<br><br>
<?php  $this->lblErrorMsg->Render() ?>
</div>
<?php require('/../..'.__INCLUDES__ . '/footer.inc.php'); ?>