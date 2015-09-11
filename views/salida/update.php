<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Salida */

$this->title = Yii::t('app', 'Update {0}', Yii::t('app','Salida')) . ' ' . $model->idSalida;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Salidas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idSalida, 'url' => ['view', 'idSalida' => $model->idSalida, 'pedido_idPedido' => $model->pedido_idPedido, 'producto_idProducto' => $model->producto_idProducto]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="salida-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
