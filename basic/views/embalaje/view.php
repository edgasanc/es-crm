<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Embalaje */

$this->title = $model->idEmbalaje;
$this->params['breadcrumbs'][] = ['label' => 'Embalajes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="embalaje-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->idEmbalaje], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Borrar', ['delete', 'id' => $model->idEmbalaje], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Esta seguro de borrar este registro?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idEmbalaje',
            'nombre',
        ],
    ]) ?>

</div>
