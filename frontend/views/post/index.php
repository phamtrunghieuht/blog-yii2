<!-- Hero Section-->
<section style="background: url(img/hero.jpg); background-size: cover; background-position: center center" class="hero">
<div class="container">
<div class="row">
    <div class="col-lg-7">
    <h1>Bootstrap 4 Blog - A free template by Bootstrap Temple</h1><a href="#" class="hero-link">Discover More</a>
    </div>
</div><a href=".intro" class="continue link-scroll"><i class="fa fa-long-arrow-down"></i> Scroll Down</a>
</div>
</section>
<!-- Intro Section-->
<section class="intro">
<div class="container">
<div class="row">
    <div class="col-lg-8">
    <h2 class="h3">Giới thiệu</h2>
    <p class="text-big"> Đây là website được viết bằng <strong>Yii Framework</strong></p>
    </div>
</div>
</div>
</section>
<section class="featured-posts no-padding-top">
    <div class="container">
    <?php
        echo $this->render('_partial/_listpost', ['posts'=>$posts]);
    ?>
    </div>
</section>
<!-- Gallery Section-->
<section class="gallery no-padding">    
<div class="row">
<div class="mix col-lg-3 col-md-3 col-sm-6">
    <div class="item"><a href="img/gallery-1.jpg" data-fancybox="gallery" class="image"><img src="img/gallery-1.jpg" alt="..." class="img-fluid">
        <div class="overlay d-flex align-items-center justify-content-center"><i class="icon-search"></i></div></a></div>
</div>
<div class="mix col-lg-3 col-md-3 col-sm-6">
    <div class="item"><a href="img/gallery-2.jpg" data-fancybox="gallery" class="image"><img src="img/gallery-2.jpg" alt="..." class="img-fluid">
        <div class="overlay d-flex align-items-center justify-content-center"><i class="icon-search"></i></div></a></div>
</div>
<div class="mix col-lg-3 col-md-3 col-sm-6">
    <div class="item"><a href="img/gallery-3.jpg" data-fancybox="gallery" class="image"><img src="img/gallery-3.jpg" alt="..." class="img-fluid">
        <div class="overlay d-flex align-items-center justify-content-center"><i class="icon-search"></i></div></a></div>
</div>
<div class="mix col-lg-3 col-md-3 col-sm-6">
    <div class="item"><a href="img/gallery-4.jpg" data-fancybox="gallery" class="image"><img src="img/gallery-4.jpg" alt="..." class="img-fluid">
        <div class="overlay d-flex align-items-center justify-content-center"><i class="icon-search"></i></div></a></div>
</div>
</div>
</section>
