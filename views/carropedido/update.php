<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Carropedido */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Carropedido',
]) . ' ' . $model->idCarroPedido;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Carropedidos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idCarroPedido, 'url' => ['view', 'idCarroPedido' => $model->idCarroPedido, 'pedido_idPedido' => $model->pedido_idPedido, 'producto_idProducto' => $model->producto_idProducto]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="carropedido-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
