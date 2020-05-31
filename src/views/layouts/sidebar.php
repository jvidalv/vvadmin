<?php

use app\utils\Env;
use factorenergia\adminlte3\widgets\Menu;
use yii\helpers\Url;

?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= Url::home() ?>" class="brand-link py-1 text-center">
        <img src="/images/logo.svg" alt="vvadmin logo" style="height: 48px">
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
                    ['label' => 'Development', 'header' => true, 'visible', 'visible' => Env::isDev()],
                    ['label' => 'Gii', 'icon' => 'file-code', 'url' => ['/gii'], 'target' => '_blank', 'visible' => Env::isDev()],
                    ['label' => 'Debug', 'icon' => 'bug', 'url' => ['/debug'], 'target' => '_blank', 'visible' => Env::isDev()],

                    ['label' => 'App', 'header' => true, 'visible'],
                    ['label' => 'Users', 'icon' => 'users', 'url' => ['/app/users/index']],
                    ['label' => 'Contacts', 'icon' => 'envelope', 'url' => ['/app/messages/index']],

                    ['label' => 'Astrale', 'header' => true, 'visible'],
                    ['label' => 'Users', 'icon' => 'users', 'url' => ['/astrale/users/index']],
                    ['label' => 'Daily', 'icon' => 'calendar-day', 'url' => ['/astrale/daily/index']],
                    ['label' => 'Messages', 'icon' => 'envelope', 'url' => ['/astrale/messages/index']],
                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>