<?php

namespace backend\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "article".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $logo
 * @property integer $category_id
 * @property integer $click_num
 * @property integer $status
 * @property string $keywords
 * @property string $description
 * @property string $create_time
 */
class Article extends \yii\db\ActiveRecord
{
    const STATUS_SHOW=1;
    const STATUS_HIDDEN=0;
    public static $statuses=[
      self::STATUS_SHOW=>'显示',
      self::STATUS_HIDDEN=>'隐藏',
    ];

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'create_time',
                'updatedAtAttribute' => false,


            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'category_id','status'], 'required'],
            [['content'], 'string'],
            [['category_id', 'click_num', 'status', 'create_time'], 'integer'],
            [['title', 'logo', 'keywords', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '标题',
            'content' => '内容',
            'logo' => 'Logo',
            'category_id' => '所属分类',
            'click_num' => '点击数',
            'status' => '状态',
            'keywords' => '关键字',
            'description' => '描述',
        ];
    }
}
