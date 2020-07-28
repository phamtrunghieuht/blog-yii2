<?php
use yii\widgets\LinkPager;
use common\components\CustomPagination;
?>
<!-- Latest Posts -->
<main class="posts-listing col-lg-8"> 
  <div class="container">
    <div class="row">
    <?php
        echo $this->render('_partial/_listpostblog', ['posts'=>$posts]);
    ?>      
    </div>
    <!-- Pagination -->
    <nav aria-label="Page navigation example">
    <?php
      echo CustomPagination::widget([
          'pagination' => $pages,
          'options' => ['class' => 'pagination pagination-template d-flex justify-content-center'],

          'prevPageLabel' => '<i class="fa fa-angle-left"></i>',

          'prevPageCssClass' => 'page-item',

          'linkOptions' => ['class' => 'page-link'],

          'nextPageLabel' => '<i class="fa fa-angle-right"></i>',

          'nextPageCssClass' => 'page-item',

          'disabledPageCssClass' => '',
      ]);
    ?>
    </nav>
  </div>
</main>