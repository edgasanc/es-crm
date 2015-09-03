<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Salidas */

$this->title = 'Update Salidas: ' . ' ' . $model->idSalidas;
$this->params['breadcrumbs'][] = ['label' => 'Salidas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idSalidas, 'url' => ['view', 'idSalidas' => $model->idSalidas, 'pedidos_idPedidos' => $model->pedidos_idPedidos, 'productos_idProducos' => $model->productos_idProducos]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="salidas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
