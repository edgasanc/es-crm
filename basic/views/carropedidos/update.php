<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Carropedidos */

$this->title = 'Update Carropedidos: ' . ' ' . $model->idCarroPedidos;
$this->params['breadcrumbs'][] = ['label' => 'Carropedidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idCarroPedidos, 'url' => ['view', 'idCarroPedidos' => $model->idCarroPedidos, 'pedidos_idPedidos' => $model->pedidos_idPedidos, 'productos_idProducos' => $model->productos_idProducos]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="carropedidos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
