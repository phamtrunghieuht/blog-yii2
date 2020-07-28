<?php
use \frontend\widgets\HeaderWidget;
use \frontend\widgets\FooterWidget;

/* @var $this \yii\web\View */
/* @var $content string */

$this->beginContent('@frontend/views/layouts/base.php');
echo HeaderWidget::widget();
echo $content;
echo FooterWidget::widget();
$this->endContent();
?>