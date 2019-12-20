<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;


$this->title = 'Tutorial';
?>
<div class="container">
    <div class="row">
        <div class="col text-center">
            <h1><?php echo $this->title; ?></h1>
        </div>
        <div class="col-md">
            <ul class="list-group list-group-flush">
            <li class="list-group-item"><a href="<?= Url::to(['site/listtutorial', 'id' => 'Adobe Lightroom']); ?>">Adobe Lightroom</a></li>
                <li class="list-group-item"><a href="<?= Url::to(['site/listtutorial', 'id' => 'Adobe Indesign']); ?>">Adobe Indesign</a></li>
                <li class="list-group-item"><a href="<?= Url::to(['site/listtutorial', 'id' => 'Adobe After Effect']); ?>">Adobe After Effect</a></li>
                <li class="list-group-item"><a href="<?= Url::to(['site/listtutorial', 'id' => 'Adobe Photoshop']); ?>">Adobe Photoshop</a></li>
                <li class="list-group-item"><a href="<?= Url::to(['site/listtutorial', 'id' => 'Adobe Premier Pro']); ?>">Adobe Premier Pro</a></li>
                <li class="list-group-item"><a href="<?= Url::to(['site/listtutorial', 'id' => 'Adobe Illustrator']); ?>">Adobe Illustrator</a></li>
            </ul>
        </div>
    </div>
</div>