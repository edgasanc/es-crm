<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Productos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="productos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'codigo')->textInput() ?>

    <?= $form->field($model, 'producto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'embalaje')->textInput() ?>

    <?= $form->field($model, 'impuesto')->textInput() ?>

    <?= $form->field($model, 'precio')->textInput() ?>

    <?= $form->field($model, 'fechaCreacion')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
