<?php

namespace app\controllers;
use Yii;

class MailController extends \yii\web\Controller
{

    public function actionSend(){
        Yii::$app->mailer->compose()
        ->setFrom('rodrigoxj32@hotmail.com')
        ->setTo('rodrigoxj35@gmail.com')
        ->setSubject('Message subject')
        ->setTextBody('Plain text content')
        ->setHtmlBody('<b>HTML content</b>')
        ->send();
    }

}
