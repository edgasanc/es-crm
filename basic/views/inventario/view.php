<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Inventario */

$this->title = $model->idAlmacen;
$this->params['breadcrumbs'][] = ['label' => 'Inventarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventario-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idAlmacen' => $model->idAlmacen, 'productos_idProducos' => $model->productos_idProducos], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idAlmacen' => $model->idAlmacen, 'productos_idProducos' => $model->productos_idProducos], [
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
            'idAlmacen',
            'productos_idProducos',
            'cantidad',
            'create_time',
            'update_time',
        ],
    ]) ?>

</div>
