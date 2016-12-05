<?php

use yii\db\Migration;

/**
 * Handles the creation of table `article_category`.
 */
class m161204_043115_create_article_category_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('article_category', [
            'id' => $this->primaryKey(),
            'name'=>$this->string()->notNull()->comment('文章分类名称'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('article_category');
    }
}
