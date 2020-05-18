<?php

use app\utils\Git;
use yii\helpers\Html;

?>
<footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
        <?= Html::tag('span', Git::getCurrentVersion(), ['class' => 'label label-primary']); ?>
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; <?= date("Y") ?>  <?= Html::a('vvadmin', 'mailto:desarroladores@factorenergia.com') ?>.</strong> Todos los derechos reservados.
</footer>
