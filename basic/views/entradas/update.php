<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Entradas */

$this->title = 'Update Entradas: ' . ' ' . $model->idEntradas;
$this->params['breadcrumbs'][] = ['label' => 'Entradas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idEntradas, 'url' => ['view', 'idEntradas' => $model->idEntradas, 'productos_idProducos' => $model->productos_idProducos]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="entradas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
