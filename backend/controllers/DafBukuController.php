<?php

namespace backend\controllers;

use Yii;
use backend\models\DafBuku;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\DatKategoriBuku;
use yii\helpers\ArrayHelper;
/**
 * DafBukuController implements the CRUD actions for DafBuku model.
 */
class DafBukuController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all DafBuku models.
     * @return mixed
     */
    public function actionIndex()
    {

        $datkategori = DatKategoriBuku::find()->all();
        $datkategori = ArrayHelper::map($datkategori,'id','nama');

        $search = yii::$app->request->queryParams;

        $query = DafBuku::find() 
                -> joinWith('kategori');

        if(!empty($search['kategori_id'])){

            $query->andFilterWhere(['like','kategori_id',$search['kategori_id']]);
        }

         if(!empty($search['judul'])){

            $query->andFilterWhere(['like','judul',$search['judul']]);
        }

         if(!empty($search['pengarang'])){

            $query->andFilterWhere(['like','pengarang',$search['pengarang']]);
        }

        if(!empty($search['tahun_terbit'])){

            $query->andFilterWhere(['like','tahun_terbit',$search['tahun_terbit']]);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => $query,

        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'datkategori' => $datkategori
        ]);
    }

    /**
     * Displays a single DafBuku model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new DafBuku model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new DafBuku();

        $datkategori = DatKategoriBuku::find()->all();
        $datkategori = ArrayHelper::map($datkategori,'id','nama');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->buku_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'datkategori' => $datkategori
            ]);
        }
    }

    /**
     * Updates an existing DafBuku model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $datkategori = DatKategoriBuku::find()->all();
        $datkategori = ArrayHelper::map($datkategori,'id','nama');

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->buku_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'datkategori' => $datkategori
            ]);
        }
    }

    /**
     * Deletes an existing DafBuku model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the DafBuku model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return DafBuku the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = DafBuku::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
