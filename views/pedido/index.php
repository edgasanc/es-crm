<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PedidoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Pedidos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pedido-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create {0}', Yii::t('app','Pedido')), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idPedido',

            [
                'attribute'=>'cliente_idCliente',
                'value'=>function($model, $index, $dataColumn) {
                    return $model->clienteIdCliente->razonSocial;
                },
            ],
            'fechaOrden',
            'fechaEntrega',
            [
                'attribute'=>'estado_idEstado',
                'value'=>function($model, $index, $dataColumn) {
                    return $model->estadoIdEstado->nombre;
                },
            ],

            [
                'label' => 'Productos',
                'format' => 'raw',
                'value' => function($model){
                    return Html::a(Html::encode("[+]"),Url::to(['pedido/pick','idPedido'=>$model->idPedido]));
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
