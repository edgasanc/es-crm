<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EntradaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Entradas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entrada-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create {0}', Yii::t('app','Entrada')), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'producto_idProducto',
                'value'=> function($model, $index, $dataColumn) {
                    return $model->productoIdProducto->producto;
                },
            ],
            [
                'format'=>'html',
                'attribute'=>'cantidad',
                'value'=> function($model, $index, $dataColumn) {
                    return $model->cantidad . ' <span class="label label-default pull-right">'.
                    $model->productoIdProducto->embalajeIdEmbalaje->nombre
                        .'</span>';
                },
            ],
            'fecha:date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
