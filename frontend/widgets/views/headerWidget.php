<?php
use yii\helpers\Url;
?>
<header class="header">
      <!-- Main Navbar-->
    <nav class="navbar navbar-expand-lg">
    <div class="search-area">
        <div class="search-area-inner d-flex align-items-center justify-content-center">
        <div class="close-btn"><i class="icon-close"></i></div>
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">  
            <form action="#">
                <div class="form-group">
                <input type="search" name="search" id="search" placeholder="What are you looking for?">
                <button type="submit" class="submit"><i class="icon-search-1"></i></button>
                </div>
            </form>
            </div>
        </div>
        </div>
    </div>
    <div class="container">
        <!-- Navbar Brand -->
        <div class="navbar-header d-flex align-items-center justify-content-between">
        <!-- Navbar Brand --><a href="index.html" class="navbar-brand">Bootstrap Blog</a>
        <!-- Toggle Button-->
        <button type="button" data-toggle="collapse" data-target="#navbarcollapse" aria-controls="navbarcollapse" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span></span><span></span><span></span></button>
        </div>
        <!-- Navbar Menu -->
        <div id="navbarcollapse" class="collapse navbar-collapse">
        <?php
        echo \yii\widgets\Menu::widget([
            'items' => [
                [
                    'label' => 'Home', 
                    'url' => Yii::$app->homeUrl,
                    'options' => ['class' => 'nav-item']
                ],
                [
                    'label' => 'Blog', 
                    'url' => ['post/blog'],
                    'options' => ['class' => 'nav-item']
                ],
            ],
            'options' => [
                'class' => 'navbar-nav ml-auto',
            ],
            'linkTemplate' => '<a href="{url}" class="nav-link">{label}</a>',
        ]);
        ?>
        <div class="navbar-text"><a href="#" class="search-btn"><i class="icon-search-1"></i></a></div>
        </div>
        
    </div>
    </nav>
</header>