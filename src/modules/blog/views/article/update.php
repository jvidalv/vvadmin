<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\blog\BlgArticle */

$this->title = 'Update Blg Article: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Blg Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="blg-article-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
