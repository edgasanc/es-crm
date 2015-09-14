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

    <h1>No puede modificar este pedido</h1>
    <h2>después de las 5 p.m del día antes de su envío</h2>

    <p>
        <?= Html::a(Yii::t('app', 'Back'), ['index'], ['class' => 'btn btn-primary']) ?>
    </p>

</div>
