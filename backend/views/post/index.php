<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\User;
use common\models\Category;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Posts');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('backend', 'Create Post'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,        
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'slug',
            [
                'attribute' => 'author',
                'value' => 'author.username',
                'filter' => Html::activeDropDownList($searchModel, 'author_id', ArrayHelper::map(User::find()->asArray()->all(), 'id', 'username'),['class'=>'form-control','prompt' => 'Select Author']),
            ],
            [
                'attribute' => 'category',
                'value' => 'category.title',
                'filter' => Html::activeDropDownList($searchModel, 'category_id', ArrayHelper::map(Category::find()->asArray()->all(), 'id', 'title'),['class'=>'form-control','prompt' => 'Select Category']),
            ],
            
            //'created_at',
            //'update_at',
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    if ($model->status === 1) {
                        return '<i class="fas fa-check"></i>'; // "x" icon in red color
                    } else {
                        return '<i class="fas fa-times-circle"></i>'; // check icon 
                    }
                },
                'format' => 'html',
                'filter' => Html::activeDropDownList($searchModel, 'status', [0 => 'Inactive', 1 =>'Active'],['class'=>'form-control','prompt' => 'Select Status']),
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
