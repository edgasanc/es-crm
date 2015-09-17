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
$this->title = "Reporte de ventas por dia";
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ventas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="pedido-create" xmlns="http://www.w3.org/1999/html">

    <h1><?= Html::encode($this->title) ?></h1>

    <div style="height: 2em;"></div>
    <div class="pedido-form">

        <form id="frmFechaEntrega" method="POST" action="<?=Url::to(['/pedido/reporte-ventas-diario'])?>">
            <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
            <input type="hidden" id="tipo-consulta" name="tipo-consulta" value="2">


            <div class="diaria">
                <label>Seleccione día para consultar</label><br>
                <input name="fecha" type="date" required/>
            </div>


            <div style="height: 2em;"></div>
            <button type="submit" class="btn btn-primary">Consultar</button>
            
        </form>
    
    </div>
    
    <?php if(!empty($rows)):?>
    <h3><?= Html::encode("Pedidos creados entre el dia ".$_POST['fecha'] ) ?></h3>
        <br>
        <table class="table table-stripped">
            <tr>
                <th>Username</th>
                <th>Nombre</th>
                <th>Cantidad de pedidos</th>
            </tr>
        <?php foreach($rows as $item) :?>
            <tr>
                <td>
                    <?= $item['vendedor'] ?>
                </td>
                <td>
                    <?= $item['nombre'] ?>
                </td>
                <td>
                    <?= $item['numero_pedidos'] ?>
                </td>
            </tr>
        <?php endforeach; ?>
            <tr style="font-weight: bold;">
                <td colspan="2">TOTAL PEDIDOS</td>
                <td><?= $total ?></td>
            </tr>
        </table>
    <?php else:
        if($mod==false)
        echo "<h4>No hay pedidos hechos para el dia consultado</h4>";
        endif;
    ?>


</div>

