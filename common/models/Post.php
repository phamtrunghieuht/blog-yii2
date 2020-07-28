<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use \yii\db\ActiveRecord;
use yii\db\Expression;
use yii\behaviors\SluggableBehavior;
use yii\web\UploadedFile;
use yii\helpers\Url;
use yii\helpers\StringHelper;


/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string|null $image
 * @property string|null $content
 * @property int $author_id
 * @property int $category_id
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $status
 *
 * @property User $author
 * @property Category $category
 */
class Post extends ActiveRecord
{

    /**
     * @var UploadedFile
     */
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    public $imageFile;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'author_id', 'category_id'], 'required'],
            [['content'], 'string'],
            [['imageFile'], 'file', 'skipOnEmpty'=>true, 'extensions'=>'png, jpg, jpeg'],
            [['author_id', 'category_id', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title', 'slug', 'image'], 'string', 'max' => 255],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['author_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('backend', 'ID'),
            'title' => Yii::t('backend', 'Title'),
            'slug' => Yii::t('backend', 'Slug'),
            'image' => Yii::t('backend', 'Image'),
            'content' => Yii::t('backend', 'Content'),
            'author_id' => Yii::t('backend', 'Author ID'),
            'category_id' => Yii::t('backend', 'Category ID'),
            'created_at' => Yii::t('backend', 'Created At'),
            'updated_at' => Yii::t('backend', 'Updated At'),
            'status' => Yii::t('backend', 'Status'),
        ];
    }

    /**
     * Gets query for [[Author]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UserQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => 'author_id']);
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\CategoryQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\PostQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\PostQuery(get_called_class());
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                // if you're using datetime instead of UNIX timestamp:
                'value' => new Expression('NOW()'),
            ],
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'title',                
            ],
        ];
    }

    public function uploadAndSave()
    {
        $path = Yii::getAlias('@frontendImgPath');
        
        if($this->validate())
        {
            $this->save();
            if(isset($this->imageFile))
            {
                $imageName = 'img_' . $this->id . '.' . $this->imageFile->extension;
                $imagePath = $path . '/' . $imageName;
                $this->imageFile->saveAs($imagePath);
                $this->image = $imageName;
            }
            return $this->save(false);
        }
        return false;
    }

    public function getImageUrl()
    {
        var_dump($this->image);
        return Url::to($this->image, true);
    }

    public function getPreview()
    {
        $words = 30;

        if(StringHelper::countWords($this->content) > 30)
            return StringHelper::truncateWords($this->content, $words);
        else
            return $this->content;
    }
}
