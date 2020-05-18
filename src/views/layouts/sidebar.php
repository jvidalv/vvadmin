<?php

use factorenergia\adminlte3\widgets\Menu;
use yii\helpers\Url;

?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= Url::home() ?>" class="brand-link">
        <img src="/images/logo.svg" alt="vvadmin logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Backend</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <!--        <div class="user-panel mt-3 pb-3 mb-3 d-flex">-->
        <!--            <div class="image">-->
        <!--                <img src="/images/user-placeholder.svg" width="160"class="img-circle elevation-2" alt="User Image">-->
        <!--            </div>-->
        <!--            <div class="info">-->
        <!--                <a href="#" class="d-block">@Todo</a>-->
        <!--            </div>-->
        <!--        </div>-->

        <!-- Sidebar Menu -->
        <nav class="mt-2">

            <?php
            echo Menu::widget([
                'items' => [
                    [
                        'label' => 'vvlog',
                        'icon' => 'home',
                        'url' => ['https://factorenergia.com'],
                    ],
                    ['label' => 'Development', 'header' => true, 'visible'],
                    ['label' => 'Gii', 'icon' => 'file-code', 'url' => ['/gii'], 'target' => '_blank'],
                    ['label' => 'Debug', 'icon' => 'bug', 'url' => ['/debug'], 'target' => '_blank'],
                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>