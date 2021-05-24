<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Request */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Заявки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="request-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены что хотите удалить эту заявку?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            [
                'attribute' => 'categoryID',
                'value' => function($model)
                {
                    return $model->category->name; // Отображение названия категории
                },
                'format' => 'html'
            ],
            [
                'attribute' => 'statusID',
                'value' => function($model)
                {
                    return $model->status->name; // Отображение названия категории
                },
                'format' => 'html'
            ],
            'reject_msg',
            [
                'attribute' => 'img_before',
                'value' => function($model)
                {   
                    return Html::img('/'.$model->img_before, ['width' => 200]); // Отображение изображения ДО
                },
                'format' => 'html'
            ],
            [
                'attribute' => 'img_after',
                'value' => function($model)
                {   
                    return Html::img('/'.$model->img_after, ['width' => 200]); // Отображение изображения ПОСЛЕ
                },
                'format' => 'html'
            ],
            'created_by',
            'updated_by',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
