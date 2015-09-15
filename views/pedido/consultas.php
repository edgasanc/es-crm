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
$this->title = "Ventas";
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ventas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="pedido-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="pedido-form">

        <form id="frmFechaEntrega" method="POST" action="<?=Url::to(['/pedido/reporte-ventas'])?>">
            <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
            <label>Seleccione intervalo de fechas para consultar</label><br>
            <label>Entre:</labeL>
            <input name="fechai" type="date" required/>
            <label>Y</label>
            <input name="fechaf" type="date" required/>
            <button type="submit" class="btn btn-primary">Consultar</button>
            
        </form>
    
    </div>
    
    <?php if(!empty($rows)):?>
    <h3><?= Html::encode("Pedidos creados entre el ".$_POST['fechai']." y ".$_POST['fechaf'] ) ?></h3>
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
        echo "<h4>No hay pedidos hechos para el rango de fechas consultado</h4>";
        endif;
    ?>


</div>

