<?php

/* @var $this yii\web\View */

if(Yii::$app->user->isGuest)
    header("Location: index.php?r=user/security/login");
else
    header("Location: index.php?r=pedido/index");


die();


?>
<div class="site-index">

    <div class="body-content">

        <div class="row">

            <div class="col-lg-6">

            </div>
            <div class="col-lg-6">

            </div>
        </div>

    </div>
</div>
