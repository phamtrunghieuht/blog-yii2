<?php 
use yii\helpers\Url;
use yii\helpers\Html;

foreach ($posts as $key => $post) {
?>
<!-- post -->
<div class="post col-xl-6">
    <div class="post-thumbnail">
        <a href="post.html">
            <img src="<?= Yii::getAlias('@frontendImgUrl') . '/' . $post->image ?>" alt="..." class="img-fluid">
        </a>
    </div>
    <div class="post-details">
        <div class="post-meta d-flex justify-content-between">
        <div class="date meta-last"><?= $post->created_at ?></div>
        <div class="category"><a href="#"><?= $post->category->title ?></a></div>
        </div><a href="<?= Url::to(['post/view','id'=>$post->id,'slug'=>$post->slug]) ?>">
        <h3 class="h4"><?= $post->title ?></h3></a>
        <p class="text-muted"><?= $post->getPreview() ?></p>
        <footer class="post-footer d-flex align-items-center"><a href="#" class="author d-flex align-items-center flex-wrap">
            <div class="avatar"><img src="img/avatar-3.jpg" alt="..." class="img-fluid"></div>
            <div class="title"><span><?= $post->author->username ?></span></div></a>
        <!--<div class="date"><i class="icon-clock"></i> 2 months ago</div>
        <div class="comments meta-last"><i class="icon-comment"></i>12</div>-->
        </footer>
    </div>
</div>

<?php
}
?>