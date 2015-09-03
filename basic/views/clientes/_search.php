<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClientesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clientes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idCliente') ?>

    <?= $form->field($model, 'razonSocial') ?>

    <?= $form->field($model, 'direccion') ?>

    <?= $form->field($model, 'barrio') ?>

    <?= $form->field($model, 'telefono') ?>

    <?php // echo $form->field($model, 'nit') ?>

    <?php // echo $form->field($model, 'fechaCreacion') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Cancelar', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
