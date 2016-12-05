<?php

use yii\db\Migration;

/**
 * Handles the creation of table `article`.
 */
class m161204_043245_create_article_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('article', [
            'id' => $this->primaryKey(),
            'title'=>$this->string()->notNull()->comment('标题'),
            'content'=>$this->text()->comment('内容'),
            'logo'=>$this->string()->comment('文章logo'),
            'category_id'=>$this->integer()->notNull()->comment('文章分类'),
            'click_num'=>$this->integer()->comment('点击数'),
            'status'=>$this->smallInteger()->defaultValue(1)->comment('1正常 0隐藏'),
            'keywords'=>$this->string()->comment('关键字'),
            'description'=>$this->string()->comment('当前文章描述'),
            'create_time'=>$this->integer()->unsigned()->comment('创建时间'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('article');
    }
}
