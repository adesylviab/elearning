<?php

namespace app\controllers;

use Yii;
use app\models\Materi;
use app\models\MateriSearch;
use yii\web\Controller;
use yii\db\Command;
use yii\web\NotFoundHttpException;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use app\models\User;
use yii\filters\VerbFilter;

/**
 * MateriController implements the CRUD actions for Materi model.
 */
class MateriController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['GET'],
                ],
            ],
        ];
    }

    /**
     * Lists all Materi models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MateriSearch();
        if(Yii::$app->user->identity->role==1){
            // $query = Yii::$app->db->createCommand("SELECT * FROM materi WHERE author='".Yii::$app->user->identity->username."'")->queryAll();
            $query = (new Query())->from('materi')->where(['author' => Yii::$app->user->identity->username]);
            $dataProvider = new ActiveDataProvider([
                'query' => $query,
            ]);
        }elseif(Yii::$app->user->identity->role==2){
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        // var_dump($dataProvider);
        // die();
        }

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Materi model.
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
     * Creates a new Materi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Materi();
        // var_dump($model);
        // die();
        if (Yii::$app->request->post()) {
            $jdl = $_REQUEST['Materi']['judul_materi'];
            $isi = $_REQUEST['Materi']['isi_materi'];
            $author = Yii::$app->user->identity->username;
            $kategori = $_REQUEST['Materi']['kategori'];
            Yii::$app->db->createCommand("INSERT INTO `materi` (`id`, `judul_materi`, `isi_materi`, `author`, `kategori`) VALUES (NULL, '".$jdl."', '".$isi."', '".$author."', '".$kategori."')")->execute();
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Materi model.
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
     * Deletes an existing Materi model.
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
     * Finds the Materi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Materi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Materi::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
