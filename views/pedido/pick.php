<?php

use yii\helpers\Url;
use yii\widgets\DetailView;

$this->title = Yii::t('app','Pick Items');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pedidos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Pedido</h3>
    </div>
    <div class="panel-body">
        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'clienteIdCliente.razonSocial',
                'fechaOrden:date',
                'fechaEntrega:date',
            ],
        ]) ?>

<div class="producto-form">
<div ng-app="dnd">
    <div id="main" ng-controller="dndCtrl">

        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Stock</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-condensed">
                            <tr>
                                <td colspan="6">
                                    <input ng-model="searchText"
                                           placeholder="Filtrar..."
                                           style="font-size: 1em; width: 100%;">
                                </td>
                            </tr>
                            <tr>
                                <th></th>
                                <th>Stock</th>
                                <th>Embalaje</th>
                                <th>Precio</th>
                                <th>Pedido</th>
                                <th></th>
                            </tr>
                            <tr ng-repeat="item in model | filter:searchText">
                                <td>{{item.nombre}}</td>
                                <td>{{item.existencias}}</td>
                                <td>{{item.embalaje}}</td>
                                <td>{{item.precio | currency:"$":0}}</td>
                                <td><input ng-model="item.cantidad" type="number"
                                           min="0" max="999999"
                                        style="font-size: 1.2em; border-radius: 4px;"></td>
                                <td><button class="btn btn-success btn-xs" ng-click="add(item.idProducto)">+</button></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Agregados al pedido</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-condensed">
                            <tr>
                                <td colspan="4">
                                    <input ng-model="searchText2"
                                           placeholder="Filtrar..."
                                           style="font-size: 1em; width: 100%">
                                </td>
                            </tr>
                            <tr ng-repeat="item in model2 | filter:searchText2">
                                <td>{{item.nombre}}</td>
                                <td><input ng-model="item.cantidad" type="number" min="0" max="999999"
                                           style="font-size: 1.2em; border-radius: 4px;"></td>
                                <td style="text-align: right;">{{item.precio * item.cantidad | currency:"$":0}}</td>
                                <td><button class="btn btn-danger btn-xs" ng-click="quit(item.idProducto)">x</button></td>
                            </tr>
                            <tr>
                                <td colspan="2">Subtotal</td>
                                <td style="text-align: right;">{{ getTotal() | currency:"$":0 }}</td>
                                <td></td>
                            </tr>
                        </table>
                        <button class="btn btn-primary pull-right" onClick="save();">Guardar pedido</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
    </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
<script>

    var app = angular.module('dnd', []);
    app.controller('dndCtrl', function($scope, $http) {

        $scope.total = 0;
        $scope.borrados = [];

        $http.get('<?php echo Url::to(['pedido/items','idPedido'=>$model->idPedido]) ?>').
            success(function(data) {
                $scope.model = data;
            }).error(function (data, status, headers, config) {
                console.log(status);
            });
        $http.get('<?php echo Url::to(['pedido/items-pedidos','idPedido'=>$model->idPedido]) ?>').
            success(function(data) {
                $scope.model2 = data;
            }).error(function (data, status, headers, config) {
                console.log(status);
            });

        $scope.add = function(idProducto) {
            var it = $scope.findModelById(idProducto);
            $scope.model2.push(it);
            if (it.indice >= 0)
                $scope.model.splice(it.indice, 1);
        };

        $scope.quit = function(idProducto) {
            var it = $scope.findModel2ById(idProducto);
            $scope.borrados.push(idProducto);
            if (it.indice >= 0){
                $scope.model2.splice(it.indice, 1);
                $scope.model.push(it);
            }
        };

        $scope.findModelById = function(idProducto){

            for(var i = 0; i < $scope.model.length; i++){
                var product = $scope.model[i];
                if(product.idProducto == idProducto){
                    product.indice = i;
                    return product;
                }
            }
        };

        $scope.findModel2ById = function(idProducto){

            for(var i = 0; i < $scope.model2.length; i++){
                var product = $scope.model2[i];
                if(product.idProducto == idProducto){
                    product.indice = i;
                    return product;
                }
            }
        };

        $scope.getTotal = function(){
            var total = 0;
            for(var i = 0; i < $scope.model2.length; i++){
                var product = $scope.model2[i];
                total += (product.precio * product.cantidad);
            }
            return total;
        }
    });

function save() {

        var scope = angular.element($("#main")).scope();
        var idPedido = <?=$model->idPedido?>;
        var modelo = JSON.stringify(scope.model2);
        var borrados = JSON.stringify(scope.borrados);
        var dataString = "idPedido=" + idPedido + "&borrados=" + borrados + "&data=" + modelo;
        $.ajax({
            type: "POST",
            url: "<?php echo Url::to(['pedido/save-items-pedido']) ?>",
            data: dataString,
            cache: false,
            success: function (html) {
                alert("Orden de productos guardada");
                location.href="<?php echo Url::to(['pedido/index']) ?>";
            }
        });
    }
</script>
