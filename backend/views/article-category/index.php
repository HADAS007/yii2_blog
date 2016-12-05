<?php

use yii\helpers\Url;
use yii\bootstrap\Html;
/* @var $this yii\web\View */
$this->params['breadcrumbs']=[
        ['label'=>'文章分类管理']
];

echo Html::a('创建分类',Url::to(['add']),['class'=>'btn btn-primary','style'=>'margin-bottom:10px']);

?>
<table class="table table-bordered table-hover table-striped">
    <tr>
        <th>ID</th>
        <th>分类名称</th>
        <th>文章数量</th>
        <th>操作</th>
    </tr>
        <?php foreach($list as $row): ?>
     <tr>
         <td><?php echo $row->id;?></td>
         <td><?php echo $row->name;?></td>
         <td><?php echo $row->articleCount;?></td>
         <td><?php echo Html::a('修改',['edit','id'=>$row['id']])?> | <?php echo Html::a('删除',['remove','id'=>$row['id']])?></td>

     </tr>
       <?php endforeach; ?>
</table>

<?php
echo \yii\widgets\LinkPager::widget(
    ['pagination'=>$page]
);
?>
