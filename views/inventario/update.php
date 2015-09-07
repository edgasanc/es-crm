<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Inventario */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Inventario',
]) . ' ' . $model->idInventario;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Inventarios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idInventario, 'url' => ['view', 'idInventario' => $model->idInventario, 'producto_idProducto' => $model->producto_idProducto]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="inventario-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
