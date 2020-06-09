<?php

use app\widgets\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\blog\BlgCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = ['label' => 'Blogs', 'url' => '/blog'];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => false];
?>
<div class="container-fluid">
    <div class="category-index">
        <div class="row">
            <div class="col-lg-4">
                <?php $form = ActiveForm::begin([
                    'fieldConfig' => [
                        'options' => ['class' => 'form-group row'],
                        'template' => "<div class=\"col col-md-4\">{label}</div>\n<div class=\"col-12 col-md-8\">{input}<small class=\"help-block form-text c-red\">{error}</small></div>\n",
                    ]
                ]); ?>
                <div class="card card-primary">
                    <div class="card-header">
                        <strong>Create a new category</strong>
                    </div>
                    <div class="card-body">
                        <?= $form->field($model, 'code')->textInput(['maxlength' => true, 'autocomplete' => 'off']) ?>
                        <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'autocomplete' => 'off']) ?>
                        <?= $form->field($model, 'description')->textInput(['maxlength' => true, 'autocomplete' => 'off']) ?>
                        <?= $form->field($model, 'priority')->textInput(['type' => 'number', 'max' => 9, 'min' => 1, 'value' => 9]) ?>
                        <?= $form->field($model, 'color')->textInput(['type' => 'color']) ?>
                    </div>
                    <div class="card-footer">
                        <?= Html::submitButton("Save", ['class' => "btn btn-primary btn-block"]) ?>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
            <div class="col-lg-8">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        'id_blog',
                        'code',
                        'name',
                        'description',
                        'color',
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>


