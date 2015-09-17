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
$this->title = "Reporte de ventas mensual";
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ventas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="pedido-create" xmlns="http://www.w3.org/1999/html">

    <h1><?= Html::encode($this->title) ?></h1>

    <div style="height: 2em;"></div>
    <div class="pedido-form">

        <form id="frmFechaEntrega" method="POST" action="<?=Url::to(['/pedido/reporte-ventas-mensual'])?>">
            <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
            <input type="hidden" id="tipo-consulta" name="tipo-consulta" value="3">
            <div class="mensual">
                <label>Seleccione mes para consultar</label><br>
                <select name="mes" required>
                    <option value="-1" selected>Seleccionar</option>
                    <option value="1">Enero</option>
                    <option value="2">Febrero</option>
                    <option value="3">Marzo</option>
                    <option value="4">Abril</option>
                    <option value="5">Mayo</option>
                    <option value="6">Junio</option>
                    <option value="7">Julio</option>
                    <option value="8">Agosto</option>
                    <option value="9">Septiembre</option>
                    <option value="10">Octubre</option>
                    <option value="11">Noviembre</option>
                    <option value="12">Diciembre</option>
                </select>
            </div>
            <div style="height: 2em;"></div>
            <button type="submit" class="btn btn-primary">Consultar</button>
            
        </form>
    
    </div>
    
    <?php if(!empty($rows)):?>
    <h3><?= Html::encode("Pedidos creados en el mes de ".Yii::t('app', (DateTime::createFromFormat('!m', $_POST['mes'])->format('F')) ) ) ?></h3>
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
        echo "<h4>No hay pedidos hechos para el mes consultado</h4>";
        endif;
    ?>


</div>

