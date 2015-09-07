<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Carropedidos */

$this->title = 'Añadir Productos';
$this->params['breadcrumbs'][] = ['label' => 'Carropedidos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="carropedidos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
