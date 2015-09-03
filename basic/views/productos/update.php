<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Productos */

$this->title = 'Update Productos: ' . ' ' . $model->idProductos;
$this->params['breadcrumbs'][] = ['label' => 'Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idProductos, 'url' => ['view', 'id' => $model->idProductos]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="productos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
