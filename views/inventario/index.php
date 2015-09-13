<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\InventarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Inventario');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventario-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute'=>'producto_idProducto',
                'value'=>function($model){
                    return $model->productoIdProducto->producto;
                },
            ],
            [
                'format'=>'html',
                'attribute'=>'stock',
                'value'=> function($model, $index, $dataColumn) {
                    return $model->stock . ' <span class="label label-default pull-right">'.
                    $model->productoIdProducto->embalajeIdEmbalaje->nombre
                    .'</span>';
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
