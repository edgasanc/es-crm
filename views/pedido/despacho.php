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
    
    <?php if(!empty($rows)):?>
    <h3><?= Html::encode("Productos para despachar el ".$_POST['fecha']) ?></h3>
        <table class="table table-stripped">
        <?php foreach($rows as $item) :?>
            <tr>
                <td>
                    <?= $item['codigo'] ?>
                </td>
                 <td>
                    <?= $item['producto'] ?>
                </td>
                <td>
                    <?= $item['cantidad'] ?>
                </td>
                 <td>
                    <?= $item['embalaje'] ?>
                </td>
                
            </tr>
        <?php endforeach; ?>
        </table>
    <?php else:
        if($mod==false)
        echo "<h4>No hay pedidos para despachar en la fecha ". $_POST['fecha'] ."</h4>";
        endif;
    ?>


</div>

