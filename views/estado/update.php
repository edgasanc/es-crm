<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Estado */

$this->title = Yii::t('app', 'Update {0}: ', Yii::t('app','Estado')) . ' ' . $model->idEstado;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Estados'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idEstado, 'url' => ['view', 'id' => $model->idEstado]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="estado-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
