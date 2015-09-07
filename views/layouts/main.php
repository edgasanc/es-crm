<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php

        $navItems=[
            ['label' => 'Inicio', 'url' => ['/site/index']],
            //['label' => 'Status', 'url' => ['/status/index']],
            //['label' => 'About', 'url' => ['/site/about']],
            //['label' => 'Contact', 'url' => ['/site/contact']]
        ];
    if (!(Yii::$app->user->isGuest) && Yii::$app->user->identity->username=="admin") {
        array_push($navItems,
            ['label' => 'Clientes', 'url' => ['cliente/index']],
            ['label' => 'Productos', 'url' => ['producto/index']],
            ['label' => 'Pedidos', 'url' => ['pedido/index']],
            [
                'label' => 'Almacen',
                'items' => [
                    ['label' => 'Inventario', 'url' => ['inventario/index']],
                    ['label' => 'Registrar Entradas', 'url' => ['entrada/index']],
                    ['label' => 'Registrar Salidas', 'url' => ['salida/index']],
                ],
            ],
            [
                'label' => 'Parametros',
                'items' => [
                    ['label' => 'Usuarios', 'url' => ['/user/admin/index']],
                    ['label' => 'Embalaje', 'url' => ['embalaje/index']],
                    ['label' => 'Impuestos', 'url' => ['impuesto/index']],
                    ['label' => 'Estado', 'url' => ['estado/index']],
                ],
            ]
        );
    }
    if (Yii::$app->user->isGuest) {
        array_push($navItems,
            ['label' => 'Ingresar', 'url' => ['/user/security/login']],
            ['label' => 'Registrarse', 'url' => ['/user/registration/register']]);
    } else {
        array_push($navItems,
            ['label' => 'Cerrar sesión (' . Yii::$app->user->identity->username . ')',
                'url' => ['/user/security/logout'],
                'linkOptions' => ['data-method' => 'post']]
        );
    }
    NavBar::begin([
        'brandLabel' => 'CRM',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $navItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy;  <?= date('Y') ?></p>


    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
