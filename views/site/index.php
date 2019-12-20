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
    <div class="col-md" style="margin-left: 50px">
        <?php
            echo Carousel::widget([
                'items' => [
                    // the item contains only the image
                    '<img id="img-cr" src="img/Banner1.png"/>',
                    '<img id="img-cr" src="img/Banner2.png"/>',
                ]
            ]);
        ?>
    </div>
</div>
