<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Materi */

$this->title = 'Create Materi';
$this->params['breadcrumbs'][] = ['label' => 'Materis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="materi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
