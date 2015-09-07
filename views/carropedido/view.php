<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Carropedido */

$this->title = $model->idCarroPedido;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Carropedidos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="carropedido-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'idCarroPedido' => $model->idCarroPedido, 'pedido_idPedido' => $model->pedido_idPedido, 'producto_idProducto' => $model->producto_idProducto], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'idCarroPedido' => $model->idCarroPedido, 'pedido_idPedido' => $model->pedido_idPedido, 'producto_idProducto' => $model->producto_idProducto], [
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
            'idCarroPedido',
            'pedido_idPedido',
            'producto_idProducto',
            'cantidad',
        ],
    ]) ?>

</div>
