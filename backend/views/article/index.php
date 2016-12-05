<?php

use yii\helpers\Url;
use yii\bootstrap\Html;

/* @var $this yii\web\View */
$this->params['breadcrumbs'] = [
    ['label' => '文章管理']
];

echo Html::a('创建文章', Url::to(['add']), ['class' => 'btn btn-primary', 'style' => 'margin-bottom:10px']);

?>
<table class="table table-bordered table-hover table-striped">
    <tr>
        <th>ID</th>
        <th>logo</th>
        <th>文章标题</th>
        <th>文章简介</th>
        <th>发布时间</th>
        <th>操作</th>
    </tr>
    <?php foreach ($list as $row): ?>
        <tr>
            <td><?php echo $row->id; ?></td>
            <td><?php echo $row->logo; ?></td>
            <td><?php echo $row->title; ?></td>
            <td><?php echo mb_substr($row->content,0,20,'UTF-8'); ?></td>
            <td><?php echo date('Y-m-d H:i:s',$row->create_time); ?></td>
            <td><?php echo Html::a('修改', ['edit', 'id' => $row['id']]) ?>
                | <?php echo Html::a('删除', ['remove', 'id' => $row['id']]) ?></td>

        </tr>
    <?php endforeach; ?>
</table>

<?php
echo \yii\widgets\LinkPager::widget(
    ['pagination' => $page]
);
?>
