<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VideoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Videos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="video-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Video', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_video',
            'nama_video',
            'link',
            'author',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        // var_dump($model);
                        // die();
                        return  Html::a('View', 'http://localhost:8080/index.php?r=video%2Fview&id='.$model['id_video']);
                    },

                    'update' => function ($url, $model, $key) {
                        // var_dump($model);
                        // die();
                        return  Html::a('Update', 'http://localhost:8080/index.php?r=video%2Fupdate&id='.$model['id_video']);
                    },

                    'delete' => function ($url, $model, $key) {
                        return  Html::a('Delete', 'http://localhost:8080/index.php?r=video%2Fdelete&id='.$model['id_video']);
                    }

                ]
            ],
        ],
    ]); ?>


</div>
