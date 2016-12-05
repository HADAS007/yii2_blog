<?php

namespace backend\controllers;

use backend\models\Article;
use backend\models\ArticleCategory;
use yii\data\Pagination;
use yii\db\ActiveRecord;

class ArticleCategoryController extends \yii\web\Controller
{
    /**
     * 添加
     * @return string|\yii\web\Response
     */
    public function actionAdd()
    {
        $model = new ArticleCategory();
        $request = \Yii::$app->request;
        if ($request->isPost) {
            //>>收集数据
            $model->load($request->post());
            if ($model->save()) {
                \Yii::$app->session->setFlash('success', '添加成功');
                return $this->redirect(['index']);
            }
        }

        return $this->render('add', ['model' => $model]);

    }

    /**
     * 修改
     * @param $id
     * @return string|\yii\web\Response
     */
    public function actionEdit($id)
    {
        $model = ArticleCategory::findOne($id);
        $request = \Yii::$app->request;
        if ($request->isPost) {
            //>>收集数据
            $model->load($request->post());
            if ($model->save()) {
                \Yii::$app->session->setFlash('success', '修改成功');
                return $this->redirect(['index']);
            }
        }

        return $this->render('add', ['model' => $model]);
    }

    /**
     * 分类列表
     * @return string
     */
    public function actionIndex()
    {
        //>>获取到所有分类
        $query = ArticleCategory::find();
        $page = new Pagination(['totalCount' => $query->count()]);
        $list = $query->offset($page->offset)->limit($page->limit)->all();
        return $this->render('index', ['list' => $list, 'page' => $page]);


    }

    public function actionRemove($id)
    {

        $model = ArticleCategory::findOne($id);
        //>>分类下面有文章的不能删除
        $articleCount = Article::find()->where(['category_id' => $id])->count();
        if ($articleCount) {
            \Yii::$app->session->setFlash('error', '该分类下还有文章');
        } elseif ($model->delete()) {
            \Yii::$app->session->setFlash('success', '删除成功');

        } else {
            $this->flashError($model);
        }
        return $this->redirect(['index']);
    }

    /**
     * 处理错误
     * @param ActiveRecord $model
     */
    private function flashError(ActiveRecord $model)
    {
        $errors = $model->getErrors();

        foreach ($errors as $error) {
            \Yii::$app->session->setFlash('error', $error);
        }
    }

}
