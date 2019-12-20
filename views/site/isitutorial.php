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
$dataVideo = Yii::$app->db->createCommand("SELECT * FROM video WHERE `id_video`=".$id."")->queryOne();
?>
<div class="container">
    <div class="row">
        <div class="col text-center mb-5">
            <h1><?php echo $this->title; ?> <?= $dataVideo['nama_video'] ?></h1>

        </div>
        <div class="col-md">
        <iframe width="100%" height="500" src="<?= $dataVideo['link'] ?>"></iframe>
        </div>
    </div>
</div>