<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CarropedidosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Carropedidos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="carropedidos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Carropedidos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'idCarroPedidos',
            'pedidos_idPedidos',
            'productos_idProducos',
            'cantidad',
            //'create_time',
            // 'update_time',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
