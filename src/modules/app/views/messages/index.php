<?php
/**
 * @var ActiveDataProvider $provider
 */

use app\widgets\GridView;
use kartik\icons\Icon;
use yii\data\ActiveDataProvider;

$this->params['breadcrumbs'][] = ['label' => 'App', 'url' => '/app'];
$this->params['breadcrumbs'][] = ['label' => 'Contacts', 'url' => false];
$this->title = 'Messages';
?>

<div class="row">
    <div class="col">
        <?php
        echo GridView::widget([
            'dataProvider' => $provider,
            'panel' => [
                'heading' => Icon::show('list'),
                'type' => 'card card-primary'
            ],
            'columns' => [
                'app',
                'name',
                'email:email',
                'question',
            ]
        ]);
        ?>
    </div>
</div>
