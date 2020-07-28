<?php
namespace common\components;

use Yii;
use yii\base\InvalidConfigException;
use yii\helpers\Html;
use yii\base\Widget;
use yii\data\Pagination;

class CustomPagination  extends \yii\widgets\LinkPager
{
    public function init()
    {
        parent::init();
    }

    public function run()
    {
        parent::run();
    }

    protected function renderPageButton($label, $page, $class, $disabled, $active)
    {
        $options = ['class' => $class === '' ? null : $class];
        $option_a = ['class' => 'page-link'];
        $linkOptions = $this->linkOptions;
        if ($active) {
            Html::addCssClass($linkOptions, $this->activePageCssClass);
        }
        if ($disabled) {
            Html::addCssClass($options, $this->disabledPageCssClass,);
            return Html::tag('li', Html::tag('a', $label, $option_a), $options);
        }
        $linkOptions['data-page'] = $page;


        return Html::tag('li', Html::a($label, $this->pagination->createUrl($page), $linkOptions), $options);
    }
}
