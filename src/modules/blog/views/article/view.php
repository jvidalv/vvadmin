<?php

use app\models\blog\BlgArticleHasAnchor;
use app\models\blog\BlgArticleHasContent;
use app\models\blog\BlgCategory;
use app\models\blog\BlgState;
use dosamigos\tinymce\TinyMce;
use kartik\datetime\DateTimePicker;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\JsExpression;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\blog\BlgArticle */
/* @var $translation app\models\blog\BlgArticleHasContent */

$this->title = $translation->title;

$this->params['breadcrumbs'][] = ['label' => 'Blogs', 'url' => '/blog'];
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => '/blog/article/index'];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => false];
?>
<?php $form = ActiveForm::begin() ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-lg-9">
            <div class="loader-tinymce">
                <i class="fa fa-spinner fa-spin"></i>
            </div>
            <?= $form->field($translation, 'content', ['template' => '<div class="container-content" style="display:none">{input}</div>'])->widget(TinyMce::className(), [
                'options' => ['rows' => 30],
                'language' => Yii::$app->language,
                'clientOptions' => [
                    'width' => "-webkit-fill-available",
                    'min_height' => 600,
                    'plugins' => [
                        "print preview paste searchreplace autolink autosave save code visualblocks visualchars wordcount autoresize image link media codesample table hr nonbreaking anchor toc advlist lists noneditable charmap quickbars",
                    ],
                    'codesample_languages' => [
                        ['text' => 'HTML/XML', 'value' => 'markup'],
                        ['text' => 'JavaScript', 'value' => 'javascript'],
                        ['text' => 'CSS', 'value' => 'css'],
                        ['text' => 'PHP', 'value' => 'php'],
                        ['text' => 'JSX', 'value' => 'jsx'],
                        ['text' => 'BASH', 'value' => 'bash'],
                    ],
                    'extended_valid_elements' => 'img[longdesc|usemap|src|border|alt=|title|hspace|vspace|width|height|align|onerror|id|class|style]',
                    'menubar' => 'file edit view insert format tools table help',
                    'toolbar' => "undo redo | bold italic underline strikethrough | image link anchor codesample | numlist bullist | charmap removeformat | code ",
                    'link_context_toolbar' => true,
                    'image_title' => true,
                    'automatic_uploads' => true,
                    'visualblocks_default_state' => true,
                    'file_picker_types' => 'image',
                    'file_picker_callback' => new JsExpression("(cb, value, meta) => uploadImageTiny(cb, value, meta)"),
                    'relative_urls' => false,
                    'remove_script_host' => false,
                    'setup' => new JsExpression('function(editor){ editor.on("init", function (e) {
                               $(".loader-tinymce").fadeOut("slow");
                               $(".container-content").fadeIn("slow");
                            });}'),
                ]
            ])
            ?>
            <?php
            //  Ghost content to make anchors work with tinymce
            echo Html::beginTag('div', ['id' => 'contents-ghost', 'class' => 'd-none']);
            echo $translation->content;
            echo Html::endTag('div');
            ?>

        </div>
        <div class="col-lg-3">
            <?php if ($translation->otherTranslations): ?>
                <div class="card">
                    <div class="card-body">
                        <?php foreach ($translation->otherTranslations as $trans) {
                            /* @var BlgArticleHasContent $trans */
                            if ($trans->id === $translation->id) continue;
                            echo Html::a($trans->id_language, Url::to(['view', 'id' => $trans->id, 'idLang' => $trans->id_language]), ['class' => 'anchor-section']);
                        } ?>
                    </div>
                </div>
            <?php endif; ?>
            <div class="card">
                <div class="card-body">
                    <?= $form->field($translation, 'id_state')->dropDownList(ArrayHelper::map(BlgState::find()->all(), 'id', 'code')) ?>
                    <?= $form->field($model, 'id_category')->dropDownList(ArrayHelper::map(BlgCategory::find()->where(['id_blog' => $model->id_blog])->all(), 'id', 'name')) ?>
                    <?= $form->field($model, 'date')->widget(DateTimePicker::class, [
                        'type' => DateTimePicker::TYPE_BUTTON,
                        'layout' => Html::tag('div', '{picker} {input}', ['class' => 'd-flex']),
                        'options' => [
                            'type' => 'text',
                            'placeholder' => Yii::t('app', 'select a date'),
                            'readonly' => true,
                            'class' => 'form-control',
                        ],
                        'pluginOptions' => [
                            'format' => 'dd-mm-yyyy hh:ii',
                            'autoclose' => true,
                        ]
                    ]); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header cursor-pointer text-center" data-target="#extra-information"
                             data-toggle="modal">
                            <strong><?= Yii::t('app', 'extra') ?></strong>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header cursor-pointer text-center" data-target="#modal-sources"
                             data-toggle="modal">
                            <strong>Sources</strong>
                        </div>
                    </div>
                </div>
            </div>
            <div class="position-sticky">
                <div class="d-flex mb-3">
                    <?= Html::submitButton('Save', ['class' => 'btn btn-primary btn-block']) ?>
                </div>
                <div class="card">
                    <div class="card-header">
                        <strong>Sections</strong>
                    </div>
                    <div class="card-body overflow-hidden">
                        <?php foreach ($translation->blgArticleHasAnchors as $anchor) {
                            /* @var BlgArticleHasAnchor $anchor */
                            echo Html::a($anchor->content, '#' . $anchor->anchor, ['class' => 'anchor-section']) . '</br>';
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
