<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\blog\BlgArticle */

$this->title = 'Create Blg Article';
$this->params['breadcrumbs'][] = ['label' => 'Blg Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blg-article-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
