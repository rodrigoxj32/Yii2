<?php

namespace app\controllers;
use app\models\Posts;
use yii;

class PostsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        //return $this->render('index');

       /* $posts = Posts::find()->all();

        foreach($posts as $post ){
            echo $post->id . ", " . $post->titulo . ", " . $post->contenido . "<br>";
        }*/

        $posts = new Posts();

        if($posts->load(Yii::$app->request->post())  && $posts->validate()){

            $posts->save();
        }else{
            return $this->render("index",["posts"=>$posts]);
        }
    }

}
