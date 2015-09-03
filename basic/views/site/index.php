<?php

/* @var $this yii\web\View */

$this->title = 'EDGASANC-CRM';
?>
<div class="site-index">

    <!--<div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>-->

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Clientes</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Pedidos</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Almacen</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
            <div class="col-lg-6">
                <?php
                      use miloschuman\highcharts\Highcharts;

                      echo Highcharts::widget([
                      'options' => [
                          'title' => ['text' => 'Cantidad Ventas Ultima Semana'],
                          'xAxis' => [
                              'categories' => ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sábado']
                          ],
                          'yAxis' => [
                          'title' => ['text' => 'Ventas Realizadas']
                          ],
                          'series' => [
                              ['name' => 'Jane', 'data' => [1, 0, 4, 5, 6, 7]],
                              ['name' => 'John', 'data' => [5, 7, 3, 4, 2, 0]],
                              ['name' => 'Joe', 'data' => [3, 1, 6, 2, 0, 4]]
                          ]
                      ]
                      ]);
                ?>
            </div>
            <div class="col-lg-6">
                <?php
                //use miloschuman\highcharts\Highcharts;
                use yii\web\JsExpression;

                echo Highcharts::widget([
                    'scripts' => [
                        'modules/exporting',
                        'themes/grid-light',
                    ],
                    'options' => [
                        'title' => [
                            'text' => 'Monto de Ventas Ultima Semana',
                        ],
                        'xAxis' => [
                            'categories' => ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sábado'],
                        ],
                        'series' => [
                            [
                                'type' => 'column',
                                'name' => 'Jane',
                                'data' => [50000, 80000, 100000, 60000, 40000],
                            ],
                            [
                                'type' => 'column',
                                'name' => 'John',
                                'data' => [20000, 30000, 50000, 70000, 60000],
                            ],
                            [
                                'type' => 'column',
                                'name' => 'Joe',
                                'data' => [40000, 30000, 30000, 90000, 10000],
                            ],
                        ],
                    ]
                ]);
                ?>
            </div>
        </div>

    </div>
</div>
