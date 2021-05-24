<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\RequestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заявки';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Новая заявка', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            [
                'attribute' => 'categoryID',
                'value' => function($model)
                {
                    return $model->category->name; // Отображение названия категории
                },
                'format' => 'html',
                'filter' => ArrayHelper::map($categories, 'id', 'name'), // Получение пар ключ-значение категорий
                'filterInputOptions' => ['class' => 'form-control', 'prompt' => 'Все', 'id' => null]
            ],
            [
                'attribute' => 'statusID',
                'value' => function($model)
                {
                    return $model->status->name; // Отображение названия статуса
                },
                'format' => 'html',
                'filter' => ArrayHelper::map($statuses, 'id', 'name'), // Получение пар ключ-значение статусов
                'filterInputOptions' => ['class' => 'form-control', 'prompt' => 'Все', 'id' => null]
            ],
            //'img_before',
            [
                'attribute' => 'img_before',
                'value' => function($model)
                {   
                    return Html::img('/'.$model->img_before, ['width' => 100]); // Отображение изображения ДО
                },
                'format' => 'html'
            ],
            [
                'attribute' => 'img_after',
                'value' => function($model)
                {   
                    return Html::img('/'.$model->img_after, ['width' => 100]); // Отображение изображения ПОСЛЕ
                },
                'format' => 'html'
            ],
            //'img_after',
            //'created_by',
            //'updated_by',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>