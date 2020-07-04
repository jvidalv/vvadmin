<?php

use app\models\blog\BlgBlog;
use app\models\blog\BlgCategory;
use app\widgets\GridView;
use kartik\icons\Icon;
use kartik\select2\Select2;
use yii\bootstrap4\Modal;
use yii\helpers\ArrayHelper;
use \yii\bootstrap4\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\blog\BlgArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $article \app\models\blog\BlgArticle */
/* @var $content \app\models\blog\BlgArticleHasContent */

$this->title = 'Articles';
$this->params['breadcrumbs'][] = ['label' => 'Blogs', 'url' => '/blog'];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => false];
?>
    <div class="container-fluid just">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'toolbar' => [
                [
                    'content' =>
                    Html::textInput("text", '', ['class' => 'mx-1', 'placeholder' => '🔎 Filter here..']) .
                        Html::button('<i class="fas fa-plus"></i>', [
                            'class' => 'btn btn-success',
                            'title' => 'Create article',
                            'data-toggle' => 'modal',
                            'data-target' => '#modal-create'
                        ]),
                    'options' => ['class' => 'btn-group d-flex justify-content-center ']
                ],
            ],
            'panel' => [
                'type' => GridView::TYPE_PRIMARY,
                'heading' => "List",
            ],
            'columns' => [
                [
                    'label' => '',
                    'contentOptions' => ['style' => 'width:3%;text-align:center'],
                    'format' => 'raw',
                    'value' => fn($model) => Html::a(Icon::show("edit"), Url::to(['view', 'id' => $model->id, 'idLang' => 1])),
                ],
                [
                    'attribute' => 'featured',
                    'format' => 'raw',
                    'contentOptions' => ['style' => 'width:1%;text-align:center'],
                    'value' => fn($model) => Html::a($model->featured ? 'Yes' : 'No', ['featured?id=' . $model->id], ['class' => "badge badge-" . ($model->featured ? 'warning' : 'primary'), 'data-confirm' => 'Are you sure?']),
                ],
                [
                    'attribute' => 'id_blog',
                    'value' => fn($model) => $model->blog->name ?? null,
                ],
                [
                    'attribute' => 'id_user',
                    'value' => fn($model) => $model->user->username ?? null,
                ],
                [
                    'attribute' => 'id_category',
                    'value' => fn($model) => $model->category->code ?? null,
                ],
                'title',
                'date:date',

            ],
        ]); ?>
    </div>

<?php

Modal::begin([
    'title' => "Create new article",
    'id' => 'modal-create',
]);
$form = ActiveForm::begin([
    'fieldConfig' => [
        'options' => ['class' => 'form-group row'],
        'template' => "<div class=\"col col-md-3\">{label}</div>\n<div class=\"col-12 col-md-9\">{input}<small class=\"help-block form-text c-red\">{error}</small></div>\n",
    ],
]);
echo $form->field($article, 'id_blog')->widget(Select2::class, ['data' => ArrayHelper::map(BlgBlog::find()->all(), 'id', 'name')]);
echo $form->field($article, 'id_category')->widget(Select2::class, ['data' => ArrayHelper::map(BlgCategory::find()->all(), 'id', 'name')]);
echo $form->field($content, 'title')->textInput(['maxlength' => true]);

echo Html::submitButton("Create", ['class' => 'btn btn-primary btn-block']);

ActiveForm::end();

Modal::end();