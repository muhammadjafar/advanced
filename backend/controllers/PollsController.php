<?php

namespace backend\controllers;

use Yii;
use backend\models\Polls;
use backend\models\PollsSearch;
use backend\models\PollsResult;
use backend\models\Model;
use backend\models\PollsAnswer;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


/**
 * PollsController implements the CRUD actions for Polls model.
 */
class PollsController extends Controller
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
     * Lists all Polls models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PollsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionResult($id)
    {
        //$model = Yii::$app->getDb()->createCommand('select * from polls where id=11')->queryAll();
        $tanya=Polls::find('question')->where(['id'=>$id])->one();
        $model=PollsAnswer::find()->where(['id_poll'=>$id])->all();
        $data=[];
        $sum=0;
        for ($i=0; $i < count($model); $i++) { 
            //echo $model[$i]['id'];
            $cek=PollsResult::find('result')->where(['id_answer'=>$model[$i]['id']])->one();
            $result=$cek->result;
            $answer=$model[$i]['answer'];
            if($result==''){
                $result=0;
            }
            array_push($data, ["answer"=>$answer,"result"=>$result]);
            $sum+=$result;
        }
        //echo $data;
        /*for ($i=0; $i < count($data); $i++) { 
            echo $data[$i]['answer'];
            echo $data[$i]['result'];
        }*/
        
        return $this->render('result', ['question'=>$tanya->question,'data'=>$data, 'sum'=>$sum]);
    }

    /**
     * Displays a single Polls model.
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
     * Creates a new Polls model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Polls();
        $modelsPollsAnswer = [new PollsAnswer];

        if ($model->load(Yii::$app->request->post()) && $model->save()) 
        {
            $modelsPollsAnswer = Model::createMultiple(PollsAnswer::classname());
            Model::loadMultiple($modelsPollsAnswer, Yii::$app->request->post());

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsPollsAnswer) && $valid;
            
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelsPollsAnswer as $modelPollsAnswer)
                        {
                            $modelPollsAnswer->id_poll = $model->id;
                            if (! ($flag = $modelPollsAnswer->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['index']);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }
        else {
            return $this->render('create', [
                'model' => $model,
                'modelsPollsAnswer' =>(empty($modelsPollsAnswer)) ? [new PollsAnswer] : $modelsPollsAnswer
            ]);
        }
    }

    /**
     * Updates an existing Polls model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modul =PollsAnswer::findAll(['id_poll'=>$id]);
        $modelsPollsAnswer = [new PollsAnswer];

        if ($model->load(Yii::$app->request->post()) && $model->save()) 
        {
            $modelsPollsAnswer = Model::createMultiple(PollsAnswer::classname());
            Model::loadMultiple($modelsPollsAnswer, Yii::$app->request->post());

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($modelsPollsAnswer) && $valid;
            
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag = $model->save(false)) {
                        foreach ($modelsPollsAnswer as $modelPollsAnswer)
                        {
                            $modelPollsAnswer->id_poll = $model->id;
                            if (! ($flag = $modelPollsAnswer->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $transaction->commit();
                        return $this->redirect(['view', 'id' => $model->id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'modul' => $modul,
                'modelsPollsAnswer' =>(empty($modelsPollsAnswer)) ? [new PollsAnswer] : $modelsPollsAnswer
            ]);
        }
    }

    /**
     * Deletes an existing Polls model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        Yii::$app->getDb()->createCommand()->delete('polls_result', ['id_polls'=>$id])->execute();
        Yii::$app->getDb()->createCommand()->delete('polls_answer', ['id_poll'=>$id])->execute();
        Yii::$app->getDb()->createCommand()->delete('polls_cookies', ['id_poll'=>$id])->execute();
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Polls model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Polls the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Polls::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
