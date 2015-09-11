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
                                <td colspan="3">
                                    <input ng-model="searchText"
                                           placeholder="Filtrar..."
                                           style="font-size: 1em; width: 100%;">
                                </td>
                            </tr>
                            <tr ng-repeat="item in model | filter:searchText">
                                <td>{{item.nombre}}</td>
                                <td>{{item.existencias}}</td>
                                <td>{{item.embalaje}}</td>
                                <td>{{item.precio | currency:"$":0}}</td>
                                <td><input ng-model="item.cantidad" type="number"
                                           min="0" max="999999"
                                        style="font-size: 1.2em; border-radius: 4px;"></td>
                                <td><button class="btn btn-success btn-xs" ng-click="add($index)">+</button></td>
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
                                <td colspan="3">
                                    <input ng-model="searchText2"
                                           placeholder="Filtrar..."
                                           style="font-size: 1em; width: 100%">
                                </td>
                            </tr>
                            <tr ng-repeat="item in model2 | filter:searchText2">
                                <td>{{item.nombre}}</td>
                                <td><input ng-model="item.cantidad" type="number" min="0" max="999999"
                                           style="font-size: 1.2em; border-radius: 4px;"></td>
                                <td><button class="btn btn-danger btn-xs" ng-click="quit($index)">x</button></td>
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

        $scope.add = function(index) {
            var it = $scope.model[index];
            $scope.model2.push(it);
            if (index >= 0)
                $scope.model.splice(index, 1);
        };

        $scope.quit = function(index) {
            var it = $scope.model2[index];
            if (index >= 0){
                $scope.model2.splice(index, 1);
                it[index]=$scope.model.length;
                $scope.model.push(it);
            }
        };
    });

function save() {

        var scope = angular.element($("#main")).scope();
        var modelo = JSON.stringify(scope.model2);
        var dataString = "idPedido=" + <?=$model->idPedido?> + "&data=" + modelo;
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