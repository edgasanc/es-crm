<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Inventario */

$this->title = 'Update Inventario: ' . ' ' . $model->idAlmacen;
$this->params['breadcrumbs'][] = ['label' => 'Inventarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idAlmacen, 'url' => ['view', 'idAlmacen' => $model->idAlmacen, 'productos_idProducos' => $model->productos_idProducos]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="inventario-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
