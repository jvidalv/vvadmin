<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = $exception->statusCode ?? "Oops! Something went wrong.";
$this->params['breadcrumbs'][] = ['label' => $exception->statusCode ?? "Oops! Something went wrong.", 'url' => false];
$textColor = $exception->statusCode === 404 ? 'text-warning' : 'text-danger';
?>
<div class="error-page">
    <h2 class="headline <?=$textColor?>"> <?= $exception->statusCode ?? 500 ?></h2>

    <div class="error-content">
        <h3><i class="fas fa-exclamation-triangle <?=$textColor?>"></i> <?= $exception->statusCode ? $exception->getMessage() : "Oops! Something went wrong." ?></h3>
        <p>
            <?php if($exception->statusCode === 404): ?>
                We could not find the page you were looking for. Meanwhile, you may <a href="/">return to dashboard</a> or try using the search form.
            <?php endif; ?>
            <?php if($exception->statusCode !== 404): ?>
                We will work on fixing that right away. Meanwhile, you may
                <a href="/">return to dashboard</a> or try using the search form.
            <?php endif; ?>
        </p>
    </div>
    <!-- /.error-content -->
</div>
