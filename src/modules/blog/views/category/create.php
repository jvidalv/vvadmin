<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\blog\BlgCategory */

$this->title = 'Create Blg Category';
$this->params['breadcrumbs'][] = ['label' => 'Blg Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blg-category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
