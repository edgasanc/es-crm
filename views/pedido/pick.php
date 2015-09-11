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
                'fechaOrden',
            ],
        ]) ?>
    </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>

<div class="producto-form">
<div ng-app="dnd">
    <div id="main" ng-controller="dndCtrl">
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">Stock</h3>
                    </div>
                    <div class="panel-body">
                        <p>
                        <label>Filtrar: <input ng-model="searchText" style="font-size: 1.2em;"></label>
                        </p>
                        <ul ng-repeat="item in model | filter:searchText" class="list-group">
                            <li class="list-group-item">
                                <div class="row">
                                <div class="col-sm-8">
                                    {{item.producto}}
                                </div>
                                <div class="col-sm-4">
                                    <input ng-model="item.cantidad" type="number" min="0" max="999999">
                                    <button class="btn btn-default btn-xs" ng-click="add($index)">+</button>
                                </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Agregados al pedido</h3>
                    </div>
                    <div class="panel-body">
                        <button class="btn btn-primary pull-right" onClick="save();">Guardar</button>
                        <p>
                            <label>Filtrar: <input ng-model="searchText2" style="font-size: 1.2em;"></label>
                        </p>
                        <ul ng-repeat="item in model2 | filter:searchText2" class="list-group">
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-sm-8">
                                        {{item.producto}}
                                    </div>
                                    <div class="col-sm-4">
                                        {{item.cantidad}}
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

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
            it = $scope.model[index];
            $scope.model2.push(it);
            $scope.remove(index);
        };

        $scope.remove = function(index) {
            if (index >= 0)
                $scope.model.splice(index, 1);
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