<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Embalaje */

$this->title = 'Crear Embalaje';
$this->params['breadcrumbs'][] = ['label' => 'Embalajes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="embalaje-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
