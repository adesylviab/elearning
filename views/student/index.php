<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\StudentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Students';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="student-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Student', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_student',
            'tgl_daftar',
            'username',
            'password',
            'nama',
            //'email:email',
            //'gender',
            //'alamat:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

        <?php
            foreach($dataStudent as $row){
        ?>
            <tr>
                <td><?=$row['username']?></td>
                <td><?=$row['email']?></td>
                <td><?=$row['alamat']?></td>
            </tr>
        <?php
            }
        ?>

</div>
