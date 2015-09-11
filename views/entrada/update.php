<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Entrada */

$this->title = Yii::t('app', 'Update {0}: ', Yii::t('app','Entrada')) . ' ' . $model->idEntrada;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Entradas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idEntrada, 'url' => ['view', 'idEntrada' => $model->idEntrada, 'producto_idProducto' => $model->producto_idProducto]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="entrada-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
