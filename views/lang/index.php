<?php
/* @var $this yii\web\View */

use yii\helpers\Html;

echo Html::a('Español',['change-lang','lang'=>'es']);
echo "<br>";
echo Html::a('ingles',['change-lang','lang'=>'en']);
echo "<br>";

$username = 'Rodrigo';

echo \Yii::t('app','hola, {username}!',[
    'username'=>$username
    ]);

echo "<br>";

$age = 34;
echo \Yii::t('app','Tu edad es {age}!',[
    'age'=>$age
    ]);

$precio = 100;
$cantidad = 2;
$subtotal = 200;
echo \Yii::t('app','Precio: {0}, Cantidad: {1}, SubTotal: {2}',
    [$precio,$cantidad,$subtotal]);

echo "<br>";

echo \Yii::t('app','Precio: {0}',$precio);

echo "<br>";
echo \Yii::t('app', 'Hoy es {0,date,dd-MM-yyyy}', time());

echo "<br>";
$cats=2;
echo \Yii::t('app', 'Aqui {cats,plural,=0{no hay gatos} =1{hay un gato} other{hay  # gatos}}!', ['cats' => $cats]);
