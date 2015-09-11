<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Entrada */

$this->title = $model->productoIdProducto->producto;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Entradas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entrada-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'productoIdProducto.producto',
            'cantidad',
            [                      // the owner name of the model
                'label' => 'Unidades',
                'value' => $model->productoIdProducto->embalajeIdEmbalaje->nombre,
            ],
            'fecha:date',
        ],
    ]) ?>

    <p>
        <?= Html::a(Yii::t('app', 'Back'), ['index'], ['class' => 'btn btn-primary']) ?>
    </p>

</div>
