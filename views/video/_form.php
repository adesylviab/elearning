<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Video */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="video-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_video')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kategori')->dropDownList(
            [
                'Adobe Lightroom' => 'Adobe Lightroom',
                'Adobe Indesign' => 'Adobe Indesign',
                'Adobe After Effect' => 'Adobe After Effect',
                'Adobe Photoshop' => 'Adobe Photoshop',
                'Adobe Premier Pro' => 'Adobe Premier Pro',
                'Adobe Illustrator' => 'Adobe Illustrator',
            ]
        ); 
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
