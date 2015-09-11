<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pedido */

$this->title = $model->idPedido;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pedidos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pedido-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'idPedido' => $model->idPedido, 'cliente_idCliente' => $model->cliente_idCliente, 'estado_idEstado' => $model->estado_idEstado], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'idPedido' => $model->idPedido, 'cliente_idCliente' => $model->cliente_idCliente, 'estado_idEstado' => $model->estado_idEstado], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idPedido',
            'cliente_idCliente',
            'fechaEntrega',
            'fechaOrden',
            'estado_idEstado',
        ],
    ]) ?>

</div>
