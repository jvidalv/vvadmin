<?php

namespace app\modules\blog\controllers;

use app\models\blog\BlgArticleHasContent;
use Exception;
use Yii;
use app\models\blog\BlgArticle;
use app\models\blog\BlgArticleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ArticleController implements the CRUD actions for BlgArticle model.
 */
class ArticleController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all BlgArticle models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BlgArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $article = new BlgArticle(['id_user' => Yii::$app->user->identity->id]);
        $content = new BlgArticleHasContent(['id_language' => 1]);

        if(Yii::$app->request->isPost){
            $db = Yii::$app->db->beginTransaction();
            try {

                $article->load(Yii::$app->request->post());
                if(!$article->save()){
                    throw new \Exception();
                }

                $content->load(Yii::$app->request->post());
                $content->id_article = $article->id;
                if(!$content->save()){
                    throw new \Exception();
                }

                $db->commit();
            } catch(Exception $e){
                Yii::$app->session->addFlash("error", "Something went wrong creating the article");
                $db->rollBack();
            }
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'article' => $article,
            'content' => $content
        ]);
    }

    /**
     * Displays a single BlgArticle model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new BlgArticle model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BlgArticle();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing BlgArticle model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing BlgArticle model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the BlgArticle model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BlgArticle the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BlgArticle::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
