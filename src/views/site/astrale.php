<?php

use app\assets\AstraleAsset;
use yii\helpers\Html;

AstraleAsset::register($this);

$this->title = 'Astrale';
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <link rel="icon" type="image/png" href="/images/astrale/logo.png">
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300|Sonsie+One" rel="stylesheet"
          type="text/css">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <meta property="og:site_name" content="Astrale – Horoscope of the Zodiac">
    <meta property="og:title" content="Astrale – Horoscope of the Zodiac" />
    <meta property="og:description" content="Daily horoscopes made by professional and experienced astrologers." />
    <meta property="og:image" itemprop="image" content="/images/astrale/logo.png">
    <meta property="og:type" content="website" />
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<nav class="site-header sticky-top py-1 bg-astrale">
    <div class="container d-flex justify-content-end">
        <a class="py-2 mr-auto" href="/">
            <img src="/images/astrale/logo.png" width="24" height="24" class="d-block mx-auto">
        </a>
        <a class="py-2 d-inline-block px-4" href="/site/contact">Contact</a>
    </div>
</nav>
<div class="position-relative overflow-hidden p-3 p-md-4 m-md-3 mt-3  text-center bg-light height-100-mobile background-gradient">
    <div class="logo-container col-md-5 p-lg-5 mx-auto my-5">
        <img src="/images/astrale/logo.png" class="d-block mx-auto logo" height="200" width="200"/>
        <p class="lead font-weight-normal text-light mt-4">
            Discover what the stars are predicting for your future. Our <u>daily horoscopes</u> are made by professional and experienced astrologers using the best methodologies of classical astrology.
        </p>
    </div>
    <div class="learn product-device box-shadow d-md-block"></div>
    <div class="daily product-device product-device-2 box-shadow d-md-block"></div>
</div>
<div id="moduls" class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
    <div class="bg-light mr-md-3 py-4 px-3 py-md-5 px-md-5 text-center overflow-hidden">
        <div class="my-4">
            <img src="/images/android.svg" class="d-block mx-auto" height="100"/>
            <div class="my-4">
                <a class="btn btn-dark" href="https://play.google.com/store/apps/details?id=josep.astrale">Play Store</a>
            </div>
        </div>
    </div>
    <div class="bg-dark mr-md-3 py-4 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
        <div class="my-4">
            <img src="/images/ios.png" class="d-block mx-auto" height="100"/>
        </div>
        <div class="my-4">
            <a class="btn btn-info" href="/contactar">App Store</a>
        </div>
    </div>
</div>
<?php $this->endBody() ?>
<footer class="container py-5">
    <div class="flex-column flex-md-row d-md-flex">
        <div class="flex-fill d-none d-md-block">
            <a class="py-2" href="#">
                <img src="/images/astrale/logo.png" width="120" class="d-block  text-center text-md-left"/>
            </a>
            <small class="d-block mb-3 mt-2 text-muted">Josep Vidal © <?= date('Y') ?> </small>
        </div>
        <div class="flex-fill text-center text-md-left">
            <h5>Pages</h5>
            <ul class="list-unstyled text-small">
                <li><a class="text-muted" href="/site/contactar">Contact</a></li>
                <li><a class="text-muted" href="/site/privacy-policy">Privacy policy</a></li>
            </ul>
        </div>
        <div class="flex-fill text-center text-md-left">
            <h5>Resources</h5>
            <ul class="list-unstyled text-small">
                <li><a class="text-muted" href="https://stackoverflow.com/" target="_blank">StackOverflow</a></li>
                <li><a class="text-muted" href="https://www.yiiframework.com/doc/api/2.0" target="_blank">Yii2</a>
                </li>
                <li><a class="text-muted" href="https://es.reactjs.org/" target="_blank">React Native</a></li>
            </ul>
        </div>
        <div class="flex-fill text-center text-md-left">
            <h5>Behind Astrale</h5>
            <ul class="list-unstyled text-small">
                <li><a class="text-muted" href="https://josepvidal.dev" target="_blank">Personal page</a></li>
                <li><a class="text-muted" href="https://github.com/jvidalv" target="_blank">Github</a></li>
                <li><a class="text-muted" href="mailto:josepvidalvidal@gmail.com">Email</a></li>
            </ul>
        </div>
    </div>
</footer>
</body>
</html>
<?php $this->endPage() ?>

