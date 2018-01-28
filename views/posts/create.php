<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Posts;
?>

    <h1>Crear</h1>
<?php $form = ActiveForm::begin([
    'method' => 'post',
    'id' => 'formulario',
    'enableClientValidation' => false,
    //'enableAjaxValidation' => true,

]);
?>
    <div class="form-group">
        <?= $form->field($model, "contenido")->input("text") ?>
    </div>


    <?php
    $items = ArrayHelper::map(Posts::find()->all(), 'titulo','titulo');
    ?>

    <?= $form->field($model, 'titulo')->dropDownList($items,
        ['prompt'=>'Seleccione' ]
    ) ?>



<?= Html::submitButton("Register", ["class" => "btn btn-primary"]) ?>

<?php $form->end() ?>

<?=Html::script("
    $('#posts-titulo').click(
   function() {
        alert();
    });

",
    ['defer' => true])  ?>
