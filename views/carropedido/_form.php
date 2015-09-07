<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Carropedido */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="carropedido-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pedido_idPedido')->textInput() ?>

    <?= $form->field($model, 'producto_idProducto')->textInput() ?>

    <?= $form->field($model, 'cantidad')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
