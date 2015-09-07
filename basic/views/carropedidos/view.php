<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Carropedidos */

$this->title = $model->idCarroPedidos;
$this->params['breadcrumbs'][] = ['label' => 'Carropedidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="carropedidos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idCarroPedidos' => $model->idCarroPedidos, 'pedidos_idPedidos' => $model->pedidos_idPedidos, 'productos_idProducos' => $model->productos_idProducos], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idCarroPedidos' => $model->idCarroPedidos, 'pedidos_idPedidos' => $model->pedidos_idPedidos, 'productos_idProducos' => $model->productos_idProducos], [
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
            'idCarroPedidos',
            'pedidos_idPedidos',
            'productos_idProducos',
            'cantidad',
            'create_time',
            'update_time',
        ],
    ]) ?>

</div>
