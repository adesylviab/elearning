<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Materi';
?>
<div class="container">
    <div class="row">
        <div class="col text-center">
            <h1><?php echo $this->title; ?></h1>

        </div>
        <div class="col-md">
            <ul class="list-group list-group-flush">
                <?php
                    foreach($dataMateri as $row){
                ?>
                <li class="list-group-item"><a href="<?= Url::to(['site/isimateri', 'id' => $row['id']]); ?>"><?= $row['judul_materi'] ?></a></li>
                <?php 
                    } 
                ?>
            </ul>
        </div>
    </div>
</div>