<?php

/* @var $this yii\web\View */
use yii\bootstrap\Carousel;
$this->title = 'E-Learning';
?>
<style>
    #img-cr {
        height: 500px;
    }
</style>
<div class="row">
    <div class="col text-center">
        <h1>E-Learning Desain Grafis Pemula</h1>
    </div>
    <div class="col-md-8" style="margin-left: 190px">
        <?php
            echo Carousel::widget([
                'items' => [
                    // the item contains only the image
                    '<img id="img-cr" src="img/1.jpg"/>',
                    '<img id="img-cr" src="img/1.jpg"/>',
                    '<img id="img-cr" src="img/1.jpg"/>',
                ]
            ]);
        ?>
    </div>
</div>
