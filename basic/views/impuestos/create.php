<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Impuestos */

$this->title = 'Create Impuestos';
$this->params['breadcrumbs'][] = ['label' => 'Impuestos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="impuestos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
