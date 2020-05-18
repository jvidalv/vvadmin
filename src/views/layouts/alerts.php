<?php

use factorenergia\alert\AlertBlock;
use kartik\widgets\Growl; ?>

<?= AlertBlock::widget([
    'useSessionFlash' => true,
    'type' => AlertBlock::TYPE_GROWL,
    'delay' => 1,
    'options' => [
        'style' => 'z-index: 1000'
    ],
    'alertSettings' => [
        'error' => [
            'pluginOptions' => [
                'placement' => [
                    'from' => 'top',
                    'align' => 'right',
                ],
            ],
            'type' => Growl::TYPE_DANGER,
            'icon' => 'fa fa-times fa-15x',
            'showSeparator' => true,
        ],
        'success' => [
            'pluginOptions' => [
                'placement' => [
                    'from' => 'top',
                    'align' => 'right',
                ],
            ],
            'type' => Growl::TYPE_SUCCESS,
            'icon' => 'fa fa-check-square-o fa-15x',
            'showSeparator' => true,
        ],
        'info' => [
            'pluginOptions' => [
                'placement' => [
                    'from' => 'top',
                    'align' => 'right',
                ],
            ],
            'type' => Growl::TYPE_INFO,
            'icon' => 'fa fa-info-circle fa-15x',
            'showSeparator' => true,
        ],
        'warning' => [
            'pluginOptions' => [
                'placement' => [
                    'from' => 'top',
                    'align' => 'right',
                ],
            ],
            'type' => Growl::TYPE_WARNING,
            'icon' => 'fa fa-exclamation-triangle fa-15x',
            'showSeparator' => true,
        ],
    ]
]);
?>
</div>
