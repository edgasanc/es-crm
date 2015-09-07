<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\jui\DatePicker;
use app\models\Clientes;
use app\models\Estado;


/* @var $this yii\web\View */
/* @var $model app\models\Pedidos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pedidos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'clientes_idClientes')->dropDownList(
        ArrayHelper::map(Clientes::find()->all(),'idClientes','razonSocial'),
        ['prompt'=>'Seleccione un cliente']
    ) ?>

    <?php echo $form->field($model,'fechaEntrega')->
    widget(DatePicker::className(),[
        'dateFormat' => 'yyyy-MM-dd',
        'clientOptions' => [
            'yearRange' => '-115:+0',
            'changeYear' => true
        ],
        'options' => ['class' => 'form-control', 'style' => 'width:25%']
    ]) ?>

    <?= $form->field($model, 'estado_idEstado')->dropDownList(
        ArrayHelper::map(Estado::find()->all(),'idEstado','nombre'),
        ['prompt'=>'Seleccione un estado']
      ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
