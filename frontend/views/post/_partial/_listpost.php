<?php 
use yii\helpers\Url;
use yii\helpers\Html;

foreach ($posts as $key => $post) {
?>
<div class="row d-flex align-items-stretch">
<?php 
    if ($key !== array_key_first($posts) &&  $key !== array_key_last($posts)) {
?>
    <div class="image col-lg-5"><img src="<?= Yii::getAlias('@frontendImgUrl') . '/' . $post->image ?>" alt="..."></div>
    <?php }?>
    <div class="text col-lg-7">
    <div class="text-inner d-flex align-items-center">
        <div class="content">
        <header class="post-header">
            <div class="category"><a href="#"><?= $post->category->title; ?></a></div><a href="<?= Url::to(['post/view','id'=>$post->id,'slug'=>$post->slug]) ?>">
            <h2 class="h4"><?= $post->title ?></h2></a>
        </header>
        <?= $post->getPreview() ?>
        <footer class="post-footer d-flex align-items-center"><a href="#" class="author d-flex align-items-center flex-wrap">
            <div class="avatar"><img src="<?= Yii::getAlias('@frontendImgUrl') . '/' . $post->image ?>" alt="..." class="img-fluid"></div>
            <div class="title"><span><?= $post->author->username ?></span></div></a>
            <div class="date"><i class="icon-clock"></i> <?= $post->created_at ?></div>
            <div class="comments"><i class="icon-comment"></i>12</div>
        </footer>
        </div>
    </div>
    </div>
    <?php 
    if ($key === array_key_first($posts) ||  $key === array_key_last($posts)) {
?>
    <div class="image col-lg-5"><img src="<?= Yii::getAlias('@frontendImgUrl') . '/' . $post->image ?>" alt="..."></div>
    <?php }?>
</div>

<?php 
} 
?>