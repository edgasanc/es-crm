<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Impuesto */

$this->title = Yii::t('app', 'Update {0}: ', Yii::t('app','Impuesto')) . ' ' . $model->idImpuesto;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Impuestos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idImpuesto, 'url' => ['view', 'id' => $model->idImpuesto]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="impuesto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
