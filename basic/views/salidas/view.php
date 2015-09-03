<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Salidas */

$this->title = $model->idSalidas;
$this->params['breadcrumbs'][] = ['label' => 'Salidas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="salidas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idSalidas' => $model->idSalidas, 'pedidos_idPedidos' => $model->pedidos_idPedidos, 'productos_idProducos' => $model->productos_idProducos], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idSalidas' => $model->idSalidas, 'pedidos_idPedidos' => $model->pedidos_idPedidos, 'productos_idProducos' => $model->productos_idProducos], [
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
            'idSalidas',
            'pedidos_idPedidos',
            'productos_idProducos',
            'cantidad',
            'precio',
            'create_time',
            'update_time',
        ],
    ]) ?>

</div>
