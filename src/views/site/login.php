<?php

/**
 *
 */

use app\assets\AppAsset;
use app\models\LoginForm;
use kartik\select2\Select2;
use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

factorenergia\adminlte3\assets\FontAwesomeAsset::register($this);
factorenergia\adminlte3\assets\BasicAsset::register($this);
AppAsset::register($this);

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
<body class="login-page" style="background: grey">
<?php $this->beginBody() ?>
<div class="login-box">
    <div class="login-logo">
        <img src="/images/logo.svg" height="80" alt="Norton Solutions"/>
    </div>
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg"><?= Yii::t('app', 'Backend'); ?></p>

            <?php $form = ActiveForm::begin(['id' => 'login-form']) ?>

            <?= $form->field($model, 'username', [
                'options' => ['class' => 'form-group has-feedback'],
                'inputTemplate' => '{input}<div class="input-group-append"><div class="input-group-text"><span class="fas fa-user"></span></div></div>',
                'template' => '{beginWrapper}{input}{endWrapper}',
                'wrapperOptions' => ['class' => 'input-group mb-3']
            ])
                ->label(false)
                ->textInput(['placeholder' => $model->getAttributeLabel('username')]) ?>

            <?= $form->field($model, 'password', [
                'options' => ['class' => 'form-group has-feedback'],
                'inputTemplate' => '{input}<div class="input-group-append"><div class="input-group-text"><span class="fas fa-lock"></span></div></div>',
                'template' => '{beginWrapper}{input}{endWrapper}',
                'wrapperOptions' => ['class' => 'input-group mb-3']
            ])
                ->label(false)
                ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>
            <hr/>

            <div class="row">
                <div class="col-12">
                    <?= Html::submitButton(Yii::t('app', 'Enter'), ['class' => 'btn btn-primary btn-block']) ?>
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

        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
