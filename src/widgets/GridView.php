<?php

namespace app\widgets;

use kartik\helpers\Html;
use kartik\icons\Icon;
use yii\helpers\ArrayHelper;
use yii\widgets\Pjax;

/**
 * Class GridView
 * @package app\widgets
 */
class GridView extends \kartik\grid\GridView
{
    /**
     * @var bool
     */
    public $pjax = true;

    /**
     * @var string[]
     */
    public $formatter = ['class' => 'yii\i18n\Formatter', 'nullDisplay' => ''];

    /**
     * @var bool
     */
    public $condensed = true;

    /**
     * @var bool
     */
    public $responsiveWrap = true;

    /**
     * @var bool
     */
    public $hover = true;

    /**
     * @var bool
     */
    public $resizableColumns = true;

    /**
     * @var bool
     */
    public $showFooter = false;

    /**
     * Default expand button options
     * @var string[]
     */
    public array $expandDataOptions = ['class' => 'btn btn-default', 'data-card-widget' => 'maximize'];


    /**
     * Lo extendemos para corregir como se ve al mostrar el loading que es muy feo
     */
    protected function beginPjax()
    {
        $view = $this->getView();
        $container = 'jQuery("#' . $this->pjaxSettings['options']['id'] . '")';
        $js = $container;
        if (ArrayHelper::getValue($this->pjaxSettings, 'neverTimeout', true)) {
            $js .= ".on('pjax:timeout', function(e){e.preventDefault()})";
        }
        $loadingCss = ArrayHelper::getValue($this->pjaxSettings, 'loadingCssClass', 'kv-grid-loading');
        $postPjaxJs = "setTimeout({$this->_gridClientFunc}, 2500);";
        $pjaxCont = '$("#' . $this->pjaxSettings['options']['id'] . '")';
        if ($loadingCss !== false) {
            if ($loadingCss === true) {
                $loadingCss = 'kv-grid-loading';
            }
            $js .= ".on('pjax:send', function(){{$pjaxCont}.addClass('{$loadingCss}')})";
            $postPjaxJs .= "{$pjaxCont}.removeClass('{$loadingCss}');";
        }
        $postPjaxJs .= "\n" . $this->_toggleScript;
        if (!empty($postPjaxJs)) {
            $event = 'pjax:complete.' . hash('crc32', $postPjaxJs);
            $js .= ".off('{$event}').on('{$event}', function(){{$postPjaxJs}})";
        }
        if ($js != $container) {
            $view->registerJs("{$js};");
        }
        Pjax::begin($this->pjaxSettings['options']);
        echo '<div class="kv-loader-overlay overlay"><i class="fas fa-2x fa-sync-alt fa-spin" style=""></i></div>';
        echo ArrayHelper::getValue($this->pjaxSettings, 'beforeGrid', '');
    }

    /**
     * Extendemos para añadir funcionalidades custom
     * @throws \yii\base\InvalidConfigException
     */
    protected function initLayout()
    {
        parent::initLayout();
        $this->replaceLayoutTokens([
            '{expand}' => $this->renderExpand(),
        ]);
    }

    /**
     * Expand button
     * @return string
     * @throws \yii\base\InvalidConfigException
     */
    private function renderExpand() : string
    {
        return Html::tag('div', Html::button(Icon::show('expand'), $this->expandDataOptions), ['class' => 'btn-group ml-1']);
    }
}