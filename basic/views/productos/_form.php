<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Embalaje;
use app\models\Impuestos;

/* @var $this yii\web\View */
/* @var $model app\models\Productos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="productos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'codigo')->textInput() ?>

    <?= $form->field($model, 'producto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'precio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'embalaje_idEmbalaje')->dropDownList(
        ArrayHelper::map(Embalaje::find()->all(),'idEmbalaje','nombre'),
        ['prompt'=>'Seleccione un embalaje']
    ) ?>

    <?= $form->field($model, 'impuestos_idImpuesto')->dropDownList(
        ArrayHelper::map(Impuestos::find()->all(),'idImpuesto','valor'),
        ['prompt'=>'Seleccione un impuesto']
    ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
