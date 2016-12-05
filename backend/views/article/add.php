<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\bootstrap\Html;
/* @var $this yii\web\View */
$this->params['breadcrumbs']=[
    ['label'=>'文章管理','url'=>Url::to(['index'])],
    ['label'=>$model->isNewRecord?'添加文章':'修改文章'],
];
$form=ActiveForm::begin();
echo $form->field($model,'title')->textInput();
echo $form->field($model,'logo')->fileInput();
echo $form->field($model,'category_id')->dropDownList($articleCategories,['prompt'=>'请选择分类','style'=>'width:130px']);
echo $form->field($model,'click_num')->textInput();
echo $form->field($model,'keywords')->textInput();
echo $form->field($model,'description')->textarea();
echo $form->field($model,'content')->textarea();
echo $form->field($model,'status')->dropDownList($statuses,['prompt'=>'请选择分类','style'=>'width:130px']);
echo Html::submitInput($model->isNewRecord?'创建':'保存',['class'=>'btn btn-primary']);
ActiveForm::end();
