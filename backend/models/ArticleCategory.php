<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "article_category".
 *
 * @property integer $id
 * @property string $name
 */
class ArticleCategory extends \yii\db\ActiveRecord
{
    public function getArticleCount()
    {
        return $this->hasMany(Article::className(),['category_id'=>'id'])->count();
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [

            'name' => '分类名称',

        ];
    }

    public static function getList()
    {
        return ArrayHelper::map(self::find()->all(),'id','name');
    }
}
