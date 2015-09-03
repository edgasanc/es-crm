<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Entradas */

$this->title = $model->idEntradas;
$this->params['breadcrumbs'][] = ['label' => 'Entradas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entradas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idEntradas' => $model->idEntradas, 'productos_idProducos' => $model->productos_idProducos], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idEntradas' => $model->idEntradas, 'productos_idProducos' => $model->productos_idProducos], [
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
            'idEntradas',
            'productos_idProducos',
            'cantidad',
            'precio',
            'create_time',
            'update_time',
        ],
    ]) ?>

</div>
