<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Request */

$this->title = 'Новая заявка';
$this->params['breadcrumbs'][] = ['label' => 'Заявки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    <?php Yii::$app->view->registerJsFile('@web/js/rejectMsgHide.js'); ?>
    <?php Yii::$app->view->registerJsFile('@web/js/imgAfterHide.js'); ?>
</div>
