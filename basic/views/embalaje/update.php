<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Embalaje */

$this->title = 'Actualizar Embalaje: ' . ' ' . $model->idEmbalaje;
$this->params['breadcrumbs'][] = ['label' => 'Embalajes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idEmbalaje, 'url' => ['view', 'id' => $model->idEmbalaje]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="embalaje-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
