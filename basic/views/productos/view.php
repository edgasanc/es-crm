<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Productos */

$this->title = $model->idProducos;
$this->params['breadcrumbs'][] = ['label' => 'Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="productos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idProducos' => $model->idProducos, 'embalaje_idEmbalaje' => $model->embalaje_idEmbalaje, 'impuestos_idImpuesto' => $model->impuestos_idImpuesto], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idProducos' => $model->idProducos, 'embalaje_idEmbalaje' => $model->embalaje_idEmbalaje, 'impuestos_idImpuesto' => $model->impuestos_idImpuesto], [
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
            'idProducos',
            'codigo',
            'producto',
            'precio',
            'embalajeIdEmbalaje.nombre',
            'impuestosIdImpuesto.valor',
            //'embalaje_idEmbalaje',
            //'impuestos_idImpuesto',
            'create_time',
            'update_time',
        ],
    ]) ?>

</div>
