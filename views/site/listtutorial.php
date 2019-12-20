<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = 'Tutorial';
$request = Yii::$app->request;

$get = $request->get();
// equivalent to: $get = $_GET;

$id = $request->get('id');
?>
<style>
.card {
            background-color: whitesmoke; width: 35rem;padding: 15px; 
            box-shadow: 8px 9px 6px 0px #00000042; margin: 0;
            top: 50%;
            left: 50%;
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }
</style>
<div class="container">
    <div class="row">
        <div class="col">
            <h4>Tutorial <?= $id; ?></h4>
        </div>
        <div class="col-md" style="margin-left: 100px; margin-top: 100px">
            <div class="row">
                <?php
                    foreach($dataVideo as $row){
                ?>
                <div class="col-md-3" style="margin-top: 30px" >
                    <div class="card" style="width: 25rem;">
                        <!-- <img src="https://www.youtube.com/watch?v=3qFySlBXuTs" style="height: 180px; width: 100%" class="card-img-top" alt="..."> -->
                        <a href="<?= Url::to(['site/isitutorial', 'id' => $row['id_video']]); ?>"><iframe width="100%" height="180px" src="<?= $row['link'] ?>" class="card-img-top" alt="..."></iframe></a>
                        <div class="card-body">
                            <p class="card-text"><a href="<?= Url::to(['site/isitutorial', 'id' => $row['id_video']]); ?>"><?= $row['nama_video'] ?></a></p>
                        </div>
                    </div>
                </div>
                <?php 
                    } 
                ?>
            </div>
        </div>
    </div>
</div>