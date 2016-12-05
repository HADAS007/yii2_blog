<?php

namespace backend\controllers;

use backend\models\Article;
use backend\models\ArticleCategory;
use yii\data\Pagination;

class ArticleController extends \yii\web\Controller
{
    /**文章列表
     * @return string
     */
    public function actionIndex()
    {
        $query=Article::find();
        $page=new Pagination(['totalCount'=>$query->count()]);
        $list=$query->offset($page->offset)->limit($page->limit)->orderBy('id desc')->all();
        return $this->render('index',['list'=>$list,'page'=>$page]);
    }

    /**
     * 添加文章
     * @return string|\yii\web\Response
     */
    public function actionAdd()
    {
        $model = new Article();
        $request = \Yii::$app->request;
        if ($request->isPost) {
            //>>收集数据
            $model->load($request->post());
            if ($model->save()) {
                \Yii::$app->session->setFlash('success', '添加成功');
                return $this->redirect(['index']);
            }
        }

        return $this->render('add', ['model' => $model,'articleCategories'=>ArticleCategory::getList(), 'statuses' => Article::$statuses]);

    }

    /**
     * 修改文章
     * @param $id
     * @return string|\yii\web\Response
     */
    public function actionEdit($id)
    {
        $model = Article::findOne($id);
        $request = \Yii::$app->request;
        if ($request->isPost) {
            //>>收集数据
            $model->load($request->post());
            if ($model->save()) {
                \Yii::$app->session->setFlash('success', '修改成功');
                return $this->redirect(['index']);
            }
        }

        return $this->render('add', ['model' => $model,'articleCategories'=>ArticleCategory::getList(),'statuses'=>Article::$statuses]);
    }


    /**
     * 删除文章
     * @param $id
     * @return string
     */
    public function actionRemove($id)
    {
        $article_modle=Article::findOne($id);
        if ($article_modle->delete()) {
            \Yii::$app->session->setFlash('error','删除成功');
        }else{
            \Yii::$app->session->setFlash('error','删除失败');
        }
        $this->redirect(['index']);

    }

}
