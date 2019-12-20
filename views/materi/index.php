<?php

use yii\helpers\Html;
use app\models\User;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MateriSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Materi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="materi-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Materi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'judul_materi',
            'isi_materi:ntext',
            'author',
            'kategori',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        // var_dump($model);
                        // die();
                        return  Html::a('View', 'http://localhost:8080/index.php?r=materi%2Fview&id='.$model['id']);
                    },

                    'update' => function ($url, $model, $key) {
                        // var_dump($model);
                        // die();
                        return  Html::a('Update', 'http://localhost:8080/index.php?r=materi%2Fupdate&id='.$model['id']);
                    },

                    'delete' => function ($url, $model, $key) {
                        return  Html::a('Delete', 'http://localhost:8080/index.php?r=materi%2Fdelete&id='.$model['id']);
                    }

                ]
            ],
        ],
    ]); ?>


</div>
