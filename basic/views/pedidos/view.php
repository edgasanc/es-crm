<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pedidos */

$this->title = $model->idPedidos;
$this->params['breadcrumbs'][] = ['label' => 'Pedidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pedidos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idPedidos' => $model->idPedidos, 'clientes_idClientes' => $model->clientes_idClientes], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idPedidos' => $model->idPedidos, 'clientes_idClientes' => $model->clientes_idClientes], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idPedidos',
            'clientes_idClientes',
            'estadoPedido',
            'create_time',
            'update_time',
        ],
    ]) ?>

</div>
