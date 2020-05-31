<?php

/**
 *
 */

use app\assets\AppAsset;
use app\models\LoginForm;
use kartik\alert\Alert;
use kartik\select2\Select2;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

factorenergia\adminlte3\assets\FontAwesomeAsset::register($this);
factorenergia\adminlte3\assets\BasicAsset::register($this);
AppAsset::register($this);
$this->title = 'Contact';
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <link rel="icon" type="image/png" href="/images/logo.svg">
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="login-page">
<?php $this->beginBody() ?>
<div class="login-box">
    <div class="login-logo">
        <img src="/images/logo.svg" height="80" alt="VVADMIN"/>
    </div>
    <div class="card">
        <div class="card-body login-card-body">
            <?php if($model->hash): ?>
            <?= Alert::widget(['type' => Alert::TYPE_INFO, 'body' => 'Thanks for contacting us', 'closeButton' => false]) ?>
                <p class="login-box-msg">Here is your message id #<?= $model->hash ?></p>
            <?php else: ?>
                <p class="login-box-msg"><?= Yii::t('app', 'Contact with us'); ?></p>
                <?php $form = ActiveForm::begin(['id' => 'login-form']) ?>
            <?= $form->field($model, 'app', [
                'options' => ['class' => 'form-group has-feedback'],
                'wrapperOptions' => ['class' => 'mb-3']
            ])
                ->label(false)
                ->widget(Select2::class, ['data' => ['astrale' => 'Astrale', 'festesdepoble' => 'Festes de Poble'], 'hideSearch' => true, 'options' => ['placeholder' => $model->getAttributeLabel('app')]]) ?>
            <?= $form->field($model, 'name', [
                'options' => ['class' => 'form-group has-feedback'],
                'inputTemplate' => '{input}<div class="input-group-append"><div class="input-group-text"><span class="fas fa-user"></span></div></div>',
                'template' => '{beginWrapper}{input}{endWrapper}',
                'wrapperOptions' => ['class' => 'input-group mb-3']
            ])
                ->label(false)
                ->textInput(['placeholder' => $model->getAttributeLabel('name')]) ?>

            <?= $form->field($model, 'email', [
                'options' => ['class' => 'form-group has-feedback'],
                'inputTemplate' => '{input}<div class="input-group-append"><div class="input-group-text"><span class="fas fa-envelope"></span></div></div>',
                'template' => '{beginWrapper}{input}{endWrapper}',
                'wrapperOptions' => ['class' => 'input-group mb-3']
            ])
                ->label(false)
                ->textInput(['placeholder' => $model->getAttributeLabel('email')]) ?>

            <?= $form->field($model, 'question', [
                'options' => ['class' => 'form-group has-feedback'],
                'wrapperOptions' => ['class' => 'input-group mb-3']
            ])
                ->label(false)
                ->textarea(['placeholder' => $model->getAttributeLabel('question')]) ?>

            <hr/>

            <div class="row">
                <div class="col-12">
                    <?= Html::submitButton(Yii::t('app', 'Send'), ['class' => 'btn btn-primary btn-block']) ?>
                </div>
            </div>

            <?php if ($model->hasErrors()) : ?>
                <div class="row mt-3">
                    <div class="col-12">
                        <?php
                        foreach ($model->getErrors() as $errorsLogin) {
                            echo "<div class=\"alert alert-danger small\"> <i class='fas fa-exclamation-circle mr-1'></i>" . $errorsLogin['0'] . "<div>";
                        }
                        ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php ActiveForm::end(); ?>
            <?php endif; ?>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
