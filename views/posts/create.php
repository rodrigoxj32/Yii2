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


    <?php
    $items = ArrayHelper::map(Posts::find()->all(), 'id','titulo');
    ?>

    <?= $form->field($model, 'titulo')->dropDownList($items,
        ['prompt'=>'Seleccione' ]
    ) ?>


<?= $form->field($model, 'contenido')->dropDownList(
    ['0'=>'Seleccione un titulo' ]
) ?>



<?= Html::submitButton("Register", ["class" => "btn btn-primary",]) ?>


<?php $form->end() ?>


<script>
    $("#posts-titulo").click(
        function() {


            var titulo = $(this).val();
            $.get('/posts/curso', {titulo:titulo}, function(data){
                $('#posts-contenido').empty();
                $('#posts-contenido').html();

                var obj = JSON.parse( data);

                for (i=0; i<obj.length;i++){
                    console.log(obj[i].titulo);

                    $("#posts-contenido").append('<option value='+obj[i].titulo+'>'+obj[i].titulo+'</option>')
                }

            });
        });
</script>




<!--var titulo = $(this).val();
$.get('/posts/getCurso', {titulo:titulo}, function(data){
alert(data);-->
