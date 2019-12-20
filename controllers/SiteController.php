<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\SignupForm;
use app\models\ContactForm;
use yii\db\Command;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
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
     * {@inheritdoc}
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
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new LoginForm();
        
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $username=$_POST['LoginForm']['username'];
            $rows = (new \yii\db\Query())
            ->select(['role'])
            ->from('user')
            ->where(['username' => $username])
            ->all();
            if($rows[0]['role']=='0'){
                return $this->goHome();
            }else{
                return $this->goHome();
                //return $this->goBack();
            }
        }
 
        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }
    public function actionSignup() {
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
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    public function actionMateri(){
        $dataMateri = Yii::$app->db->createCommand("SELECT * FROM materi")->queryAll();
        // var_dump($dataMateri);
        // die();
        return $this->render('materi', ['dataMateri' => $dataMateri]);
    }
    public function actionIsimateri(){
        return $this->render('isimateri');
    }
    public function actionTutorial(){
        return $this->render('tutorial');
    }
    public function actionListtutorial(){
        $kategori = $_GET['id'];
        $dataVideo = Yii::$app->db->createCommand("SELECT * FROM video WHERE kategori='".$kategori."'")->queryAll();
        // var_dump($dataMateri);
        // die();
        return $this->render('listtutorial', ['dataVideo' => $dataVideo]);
    }
    public function actionIsitutorial(){
        return $this->render('isitutorial');
    }
    public function actionListmateri(){
        $kategori = $_GET['id'];
        $dataMateri = Yii::$app->db->createCommand("SELECT * FROM materi WHERE kategori='".$kategori."'")->queryAll();
        // var_dump($dataMateri);
        // die();
        return $this->render('listmateri', ['dataMateri' => $dataMateri]);
    }
    public function actionPanel(){
        return $this->render('panel');
    }
}
