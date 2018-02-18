<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

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
     * @return string
     */
    public function actionIndex()
    {   
        $this->layout = 'otra';




        return $this->render('index');
    }


    public function actionGetRange(){

        $vector[0] = "-89.29078893530648,13.57505933072751%%-89.27750946914372,13.57765512872909%%-89.25720417517661,13.59250392451492%%-89.27719416980679,13.6164145752801%%-89.26696816208403,13.63221845079416%%-89.22326371207942,13.65045683453148%%-89.19267659790637,13.63924564038607%%-89.14836725723816,13.64904615274604%%-89.1745184189775,13.66885887351888%%-89.18812131083962,13.69811777816281%%-89.20268045836178,13.73384721180194%%-89.23773598769641,13.742776896582%%-89.31959889692199,13.68378935848226%%-89.30298380801179,13.58258178341583%%-89.29078893530648,13.57505933072751";
        $vector[1] = "-88.15699480509055,13.45192820281175%%-88.1489298556023,13.47053774767212%%-88.1601436424707,13.50699204516589%%-88.17946471313589,13.51820775416934%%-88.18434339730507,13.52395229566966%%-88.18575596303056,13.52718798604115%%-88.19086359517337,13.52557929988498%%-88.19047709581331,13.5205717859151%%-88.19014809775352,13.51629743595402%%-88.23678400728036,13.50819690153458%%-88.23929981073617,13.50467287640925%%-88.23955170586196,13.50202348009671%%-88.226993816787,13.48385985679409%%-88.22311885673359,13.47404888480514%%-88.21519263038618,13.46419862139786%%-88.20430883015602,13.46009728599801%%-88.19411789394772,13.45467464697354%%-88.18189879258465,13.44981938181061%%-88.16719760875648,13.44959224500685%%-88.15699480509055,13.45192820281175";

        $coordenadas[] = array();
        for($k=0;$k<count($vector);$k++){

            $bodytag = str_replace("%%", "]+", $vector[$k]);
            $correct = str_replace("-", "[-", $bodytag);

            $cordenate = explode("+",$correct);

            $i=0;
            $array[] = array();
            $coor='';
            foreach ($cordenate as $item){
                $j=0;
                $val[$i] = explode(",",$item);

                //print_r($val[$i]);
                $coor.="[". str_replace("]","",$val[$i][1]) .','.str_replace("[","",$val[$i][0])."],";
                //echo '<br>';
                $array[$i][$j] =floatval(str_replace("]","",$val[$i][1]));
                $j++;
                $array[$i][$j] =floatval(str_replace("[","",$val[$i][0]));

                $i++;
            }

            $coordenadas[$k] = $array;
        }


        return json_encode($coordenadas);

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
            return $this->goBack();
        }
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

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionSaludo(){
       return $this->render("saludo",["hola"=>"Hola","mundo"=>" Mundo"]);
    }
}
