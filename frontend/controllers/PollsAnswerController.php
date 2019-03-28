<?php

namespace frontend\controllers;

use frontend\models\PollsAnswer;
use frontend\models\PollsAnswerSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * PollsAnswerController implements the CRUD actions for PollsAnswer model.
 */
class PollsAnswerController extends Controller
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
     * Lists all PollsAnswer models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PollsAnswerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    // public function actionAnswer()
    // {
    //    $sql = SELECT answer, COUNT(answer) FROM polls_answer GROUP BY answer;
    //    $connection = Yii::app()->db;
    //    $command = $connection->createCommand($sql);
    //    $row = $command->queryAll();

    //    $this->render('index',array(
    //     'row' => $row,
    // ));

    // }

    public function actionIndexAjaxBarChart()
    {
        $data = [];

        $answerOptions = PollsAnswer::getAnswerOptions();
        $pollsAnswers = PollsAnswer::find()->select(['answer', 'COUNT(id) AS total_answer'])->groupBy(['answer'])->asArray()->all();
        if ($pollsAnswers) {
            foreach ($pollsAnswers as $pollsAnswer) {
                $answerName = $answerOptions[$pollsAnswer['answer']];

                $data[] = [
                    $answerName,
                    (int) $pollsAnswer['total_answer']
                ];
            }
        }

        $this->asJson($data);
    }

    public function actionIndexAjaxPieChart()
    {
        $data = [];

        $answerOptions = PollsAnswer::getAnswerOptions();
        $pollsAnswers = PollsAnswer::find()->select(['answer', 'COUNT(id) AS total_answer'])->groupBy(['answer'])->asArray()->all();
        if ($pollsAnswers) {
            foreach ($pollsAnswers as $pollsAnswer) {
                $answerName = $answerOptions[$pollsAnswer['answer']];

                $data[] = [
                    'name' => $answerName,
                    'y' => (int) $pollsAnswer['total_answer']
                ];
            }
        }

        $this->asJson($data);
    }

    /**
     * Displays a single PollsAnswer model.
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
     * Creates a new PollsAnswer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PollsAnswer();

        if ($model->load(Yii::$app->request->post()) ) {
            //$model->answer=$_POST['pilihanmu'];
            $model->save();
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionStoreAnswer()
    {
        $pollsAnswer = new PollsAnswer;
        $pollsAnswer->answer = Yii::$app->request->post('answer');
        $pollsAnswer->save();

        return $this->goBack(Yii::$app->request->referrer);
    }

    /**
     * Updates an existing PollsAnswer model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PollsAnswer model.
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
     * Finds the PollsAnswer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PollsAnswer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PollsAnswer::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    }
