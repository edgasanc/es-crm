<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Salida */

$this->title = Yii::t('app', 'Create {0}', Yii::t('app','Salida'));
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Salidas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="salida-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
