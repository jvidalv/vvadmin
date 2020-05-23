<?php
/**
 * @var ActiveDataProvider $provider
 */

use app\models\astrale\Message;
use app\widgets\GridView;
use kartik\icons\Icon;
use yii\data\ActiveDataProvider;

$this->params['breadcrumbs'][] = ['label' => 'Astrale', 'url' => '/astrale'];
$this->params['breadcrumbs'][] = ['label' => 'Messages', 'url' => false];
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
                'email:email',
                'message',
                [
                    'attribute' => 'answered',
                    'format' => 'raw',
                    'value' => fn(Message $model) => $model->getAnsweredHtml()
                ],
            ]
        ]);
        ?>
    </div>
</div>
