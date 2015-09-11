<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ImpuestoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Impuestos');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="impuesto-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create {0}', Yii::t('app','Impuesto')), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'nombre',
            [
                'attribute'=>'valor',
                'label'=>'Valor (%)',
                'value'=> function($model){return $model->valor;},
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
