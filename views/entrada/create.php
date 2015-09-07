<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Entrada */

$this->title = Yii::t('app', 'Create {0}', Yii::t('app','Entrada'));
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Entradas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="entrada-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
