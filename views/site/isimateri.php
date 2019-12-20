<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;

$this->title = 'Materi';
$request = Yii::$app->request;

$id = $request->get('id');
$dataMateri = Yii::$app->db->createCommand("SELECT * FROM materi WHERE `id`=".$id."")->queryOne();
?>
<div class="container">
    <div class="row">
        <div class="col text-center mb-5">
            <h1><?php echo $this->title; ?> <?= $dataMateri['judul_materi'] ?></h1>

        </div>
        <div class="col-md">
            <ul class="list-group list-group-flush">
                <p class="text-justify"><?= $dataMateri['isi_materi'] ?></p>
            </ul>
        </div>
    </div>
</div>