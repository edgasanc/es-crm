<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Pedidos;
use app\models\Productos;

/* @var $this yii\web\View */
/* @var $model app\models\Carropedidos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="carropedidos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pedidos_idPedidos')->dropDownList(
        ArrayHelper::map(Pedidos::find()->all(),'idPedidos','idPedidos'),
        ['prompt'=>'Seleccione un producto']
    ) ?>

    <?= $form->field($model, 'productos_idProducos')->dropDownList(
        ArrayHelper::map(Productos::find()->all(),'idProducos','producto'),
        ['prompt'=>'Seleccione un producto']
    ) ?>

    <?= $form->field($model, 'cantidad')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
