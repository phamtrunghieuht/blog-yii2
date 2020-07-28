<?php 

namespace frontend\widgets;

use common\models\Post;
use yii\base\Widget;

class LastestPostWidget extends Widget
{
    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $objPost = new Post();
        $posts = $objPost->getLastestPost();
        return $this->render('lastestPostWidget',['posts' => $posts]);
    }
}