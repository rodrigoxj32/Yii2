<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Posts */
/* @var $form ActiveForm */
?>
<div class="posts-agregar">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($posts, 'titulo') ?>
        <?= $form->field($posts, 'contenido') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- posts-agregar -->
