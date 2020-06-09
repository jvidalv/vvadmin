<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\blog\BlgBlog */

$this->title = 'Create Blg Blog';
$this->params['breadcrumbs'][] = ['label' => 'Blg Blogs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blg-blog-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
