<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pedidos */

$this->title = 'Update Pedidos: ' . ' ' . $model->idPedidos;
$this->params['breadcrumbs'][] = ['label' => 'Pedidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idPedidos, 'url' => ['view', 'idPedidos' => $model->idPedidos, 'clientes_idClientes' => $model->clientes_idClientes]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pedidos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
