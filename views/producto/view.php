<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Producto */

$this->title = $model->idProducto;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Productos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="producto-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'idProducto' => $model->idProducto, 'embalaje_idEmbalaje' => $model->embalaje_idEmbalaje, 'impuestos_idImpuesto' => $model->impuestos_idImpuesto], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'idProducto' => $model->idProducto, 'embalaje_idEmbalaje' => $model->embalaje_idEmbalaje, 'impuestos_idImpuesto' => $model->impuestos_idImpuesto], [
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
            'idProducto',
            'codigo',
            'producto',
            'precio',
            'embalaje_idEmbalaje',
            'impuestos_idImpuesto',
        ],
    ]) ?>

</div>
