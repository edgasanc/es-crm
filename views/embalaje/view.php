<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Embalaje */

$this->title = "Tipo de embalaje ". $model->idEmbalaje;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Embalajes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="embalaje-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idEmbalaje',
            'nombre',
        ],
    ]) ?>

    <p>
        <?= Html::a(Yii::t('app', 'Back'), ['index'], ['class' => 'btn btn-primary']) ?>
    </p>

</div>
