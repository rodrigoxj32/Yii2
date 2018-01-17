<?php

namespace app\controllers;
use Yii;

class LangController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionChangeLang($lang){

        $session = Yii::$app->session;
        $session->set('lang',$lang);
        Yii::$app->language = Yii::$app->session['lang'];

        return $this->render('index');
    }

}
