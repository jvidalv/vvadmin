<?php
/**
 * @var ActiveDataProvider $provider
 */

use app\widgets\GridView;
use kartik\icons\Icon;
use yii\data\ActiveDataProvider;

$this->params['breadcrumbs'][] = ['label' => 'Astrale', 'url' => '/astrale'];
$this->params['breadcrumbs'][] = ['label' => 'Daily', 'url' => false];
$this->title = 'Daily data';
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
        ]);
        ?>
    </div>
</div>
