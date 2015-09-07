<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Carropedido */

$this->title = Yii::t('app', 'Create {0}','Create Carropedido');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Carropedidos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="carropedido-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
