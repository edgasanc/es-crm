<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Embalaje;
use app\models\Impuesto;


/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Productos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="producto-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create {0}', Yii::t('app','Producto')), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'codigo',
            'producto',
            'precio:currency',
            [
              'attribute'=>  'embalaje_idEmbalaje',
                'filter' => Html::activeDropDownList($searchModel, 'embalaje_idEmbalaje',
                    ArrayHelper::map(Embalaje::find()->asArray()->all(), 'idEmbalaje', 'nombre'),
                    ['class'=>'form-control','prompt' => '']),
              'value'=> function($model, $index, $dataColumn) {
                return $model->embalajeIdEmbalaje->nombre;
                },
            ],

            [
                'attribute'=>  'impuestos_idImpuesto',
                'filter' => Html::activeDropDownList($searchModel, 'impuestos_idImpuesto',
                    ArrayHelper::map(Impuesto::find()->asArray()->all(), 'idImpuesto', 'nombre'),
                    ['class'=>'form-control','prompt' => '']),
                'value'=> function($model, $index, $dataColumn) {
                    return $model->impuestosIdImpuesto->nombre;
                },
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
