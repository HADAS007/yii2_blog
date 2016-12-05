<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\bootstrap\Html;
/* @var $this yii\web\View */
$this->params['breadcrumbs']=[
    ['label'=>'文章分类管理','url'=>Url::to(['index'])],
    ['label'=>$model->isNewRecord?'添加分类':'修改分类'],
];
$form=ActiveForm::begin();
echo $form->field($model,'name')->textInput();
echo Html::submitInput($model->isNewRecord?'创建':'保存',['class'=>'btn btn-primary']);
ActiveForm::end();
