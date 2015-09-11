<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Embalaje;
use app\models\Impuesto;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;
use kartik\money\MaskMoney;


/* @var $this yii\web\View */
/* @var $model app\models\Producto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="producto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'codigo')->textInput() ?>

    <?= $form->field($model, 'producto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'precio')->widget(MaskMoney::classname(), [
        'pluginOptions' => [
            'prefix' => '$ ',
            'suffix' => '',
            'thousands' => '.',
            'decimal' => ',',
            'allowNegative' => false
        ]
    ]) ?>

    <?= $form->field($model, 'embalaje_idEmbalaje')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Embalaje::find()->all(), 'idEmbalaje', 'nombre'),
        'options' => ['placeholder' => 'Seleccione une opción'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'impuestos_idImpuesto')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Impuesto::find()->all(), 'idImpuesto', 'nombre'),
        'options' => ['placeholder' => 'Seleccione une opción'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
