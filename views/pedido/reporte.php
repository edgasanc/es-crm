<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use kartik\datecontrol\DateControl;
use app\models\Cliente;
use app\models\Estado;
use yii\helpers\ArrayHelper;
use kartik\widgets\Select2;


/* @var $this yii\web\View */
/* @var $searchModel app\models\PedidoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = "Despacho";
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pedidos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="pedido-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="pedido-form">

        <form id="frmFechaEntrega" method="POST" action="<?=Url::to(['/pedido/despacho-productos'])?>">
            <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
            <label>Seleccione una fecha para consulta</label><br>
            <input name="fecha" type="date" required/>
            <button type="submit" class="btn btn-primary">Consultar</button>
            
        </form>
    
    </div>
    

    <?php if(!empty($model)):?>
    <h3><?= Html::encode("Productos") ?></h3>
        <table class="table table-stripped">
        <?php foreach($model as $producto) :?>
            <tr>
                <td>
                    <?= $producto->codigo; ?>
                </td>
                 <td>
                    <?= $producto->nombre; ?>
                </td>
                 <td>
                    <?= $producto->codigo; ?>
                </td>
                
            </tr>
        <?php endforeach; ?>
        </table>
    <?php endif;?>

</div>

