<?php
use \frontend\widgets\HeaderWidget;
use \frontend\widgets\FooterWidget;
use \frontend\widgets\LastestPostWidget;

/* @var $this \yii\web\View */
/* @var $content string */

$this->beginContent('@frontend/views/layouts/base.php');
echo HeaderWidget::widget();
?>
    <div class="container">
      <div class="row">
<?php
echo $content;
echo LastestPostWidget::widget();
?>
    </div>
</div>
<?php
echo FooterWidget::widget();
$this->endContent();
?>