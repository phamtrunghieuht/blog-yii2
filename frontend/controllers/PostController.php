<?php

namespace frontend\controllers;

use yii\web\Controller;
use common\models\Post;
class PostController extends Controller
{
    /**
     * Lists all Post models.
     * @return mixed
     */
    public function actionIndex()
    {
        $condition = [
            'status' => Post::STATUS_ACTIVE,            
        ];
        $posts = Post::find()->where($condition)->orderBy('created_at DESC')->limit(3)->all();

        return $this->render('index', [
            'posts' => $posts,            
        ]);
    }

    /**
     * Displays a single Post model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $this->layout = 'blog';
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionBlog()
    {
        $this->layout = 'blog';
        $condition = [
            'status' => Post::STATUS_ACTIVE,            
        ];
        $posts = Post::find()->where($condition)->orderBy('created_at DESC')->limit(3)->all();

        return $this->render('blog', [
            'posts' => $posts,            
        ]);
    }

    /**
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Post::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('backend', 'The requested page does not exist.'));
    }
}