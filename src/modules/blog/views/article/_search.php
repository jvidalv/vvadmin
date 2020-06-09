<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\blog\BlgArticleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="blg-article-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_blog') ?>

    <?= $form->field($model, 'id_user') ?>

    <?= $form->field($model, 'id_category') ?>

    <?= $form->field($model, 'date') ?>

    <?php // echo $form->field($model, 'words_count') ?>

    <?php // echo $form->field($model, 'claps') ?>

    <?php // echo $form->field($model, 'featured') ?>

    <?php // echo $form->field($model, 'time_to_read') ?>

    <?php // echo $form->field($model, 'slug') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
