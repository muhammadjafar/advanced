<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\models\PollsResult;
use frontend\models\PollAnswer;
use frontend\models\Polls;
use frontend\models\PollsCookies;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
     public function actionPoll()
    {
        return $this->render('index');
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionTampil()
    {
        $sessionId= Yii::$app->session->getId();
        $model = Polls::find()->orderBy(['id'=>SORT_DESC])->limit(1)->all();
        //echo $model[0]['question'];
        $id=$model[0]['id'];
        $cek=PollsCookies::find()->where(['cookies'=>$sessionId])->andWhere(['id_poll'=>$id])->count();
        //echo $id;
        $modul=Yii::$app->getDb()->createCommand("select p.*, pa.* from polls_answer pa join polls p on pa.id_poll=p.id where p.id=$id")->queryAll();
        /*if ($cek == 0) {
            return $this->render('polinganswer',['model'=>$modul]);
        }else{
            return $this->render('polinganswer');
        }*/
        return $this->render('polinganswer',['model'=>$modul, 'cek'=>$cek]);
    }
    public function actionIsiPoling($id)
    {
        $model=Yii::$app->getDb()->createCommand("select p.*, pa.* from polls_answer pa join polls p on pa.id_poll=p.id where p.id=$id")->queryAll();
        //exit();
    }
    public function actionSavePoll()
    {
        $id_polls=Yii::$app->request->post('poll');
        $id_answer=Yii::$app->request->post('answer');
        $cookies=Yii::$app->request->post('cookies');
        $cek=PollsResult::find()->where(['id_polls'=>$id_polls])->andWhere(['id_answer'=>$id_answer])->one();
        echo $id_answer."<br>";
        $ehe=count($cek);
        echo $ehe;
        //Yii::$app->session->setFlash('success', 'Terima kasih telah mengisi voting');
        //exit();
        if ($ehe == 0) {
            Yii::$app->getDb()->createCommand("insert into polls_result values (null, $id_answer, $id_polls, 1)")->execute();
            $cook=new PollsCookies();
            $cook->id_poll=$id_polls;
            $cook->cookies=$cookies;
            $cook->save();
        }else {
            Yii::$app->getDb()->createCommand("update polls_result set result=result+1 where id=$cek->id ")->execute();
            echo "aksjfkjasdf";
            $cook=new PollsCookies();
            $cook->id_poll=$id_polls;
            $cook->cookies=$cookies;
            $cook->save();
        }
       //s exit();
        return $this->redirect(['site/tampil']);
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
