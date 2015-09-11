<?php

namespace app\controllers;

use app\models\Carropedido;
use app\models\Producto;
use Yii;
use app\models\Pedido;
use app\models\PedidoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;

/**
 * PedidoController implements the CRUD actions for Pedido model.
 */
class PedidoController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Pedido models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PedidoSearch();
        if(Yii::$app->user->identity->username=="admin")
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        else $dataProvider = $searchModel->search2(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pedido model.
     * @param integer $idPedido
     * @param integer $cliente_idCliente
     * @param integer $estado_idEstado
     * @return mixed
     */
    public function actionView($idPedido, $cliente_idCliente, $estado_idEstado)
    {
        return $this->render('view', [
            'model' => $this->findModel($idPedido, $cliente_idCliente, $estado_idEstado),
        ]);
    }

    /**
     * Creates a new Pedido model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pedido();
        $model->owner = Yii::$app->user->identity->getId();
        $model->estado_idEstado = 1;
        $model->fechaOrden = (new \DateTime())->format('Y-m-d');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idPedido' => $model->idPedido, 'cliente_idCliente' => $model->cliente_idCliente, 'estado_idEstado' => $model->estado_idEstado]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Pedido model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idPedido
     * @param integer $cliente_idCliente
     * @param integer $estado_idEstado
     * @return mixed
     */
    public function actionUpdate($idPedido, $cliente_idCliente, $estado_idEstado)
    {
        $model = $this->findModel($idPedido, $cliente_idCliente, $estado_idEstado);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idPedido' => $model->idPedido, 'cliente_idCliente' => $model->cliente_idCliente, 'estado_idEstado' => $model->estado_idEstado]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Pedido model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idPedido
     * @param integer $cliente_idCliente
     * @param integer $estado_idEstado
     * @return mixed
     */
    public function actionDelete($idPedido, $cliente_idCliente, $estado_idEstado)
    {
        $this->findModel($idPedido, $cliente_idCliente, $estado_idEstado)->delete();

        return $this->redirect(['index']);
    }


    public function actionPick($idPedido){
        return $this->render('pick', [
            'model' => Pedido::findOne(['idPedido'=>$idPedido]),
        ]);
    }

    public function actionItems($idPedido){
        $contenido_pedido = Carropedido::findAll(['pedido_idPedido'=>$idPedido]);
        $id_productos = array_map(function($o) { return $o->producto_idProducto; }, $contenido_pedido);
        $productos = Producto::find()->where(['NOT IN','idProducto',$id_productos])->all();
        return Json::encode($productos);
    }

    public function actionItemsPedidos($idPedido){
        $contenido_pedido = Carropedido::findAll(['pedido_idPedido'=>$idPedido]);
        $id_productos = array_map(function($o) { return $o->producto_idProducto; }, $contenido_pedido);
        $productos = Producto::find()->where(['IN','idProducto',$id_productos])->all();
        return Json::encode($productos);
    }

    public function actionSaveItemsPedido(){
        $idPedido = $_POST['idPedido'];
        $data = $_POST['data'];

        /*
         *
         * array(1) { [0]=> object(stdClass)#88 (8) { ["idProducto"]=> int(2) ["codigo"]=> int(1) ["producto"]=> string(10) "Jabon SOAP" ["precio"]=> string(8) "55000.00" ["embalaje_idEmbalaje"]=> int(4) ["impuestos_idImpuesto"]=> int(3) ["$$hashKey"]=> string(8) "object:3" ["cantidad"]=> int(5) } }
         *
         */
         $lista_productos_seleccionados = json_decode($data, true);

        foreach($lista_productos_seleccionados as $producto){
            $carropedido = new Carropedido();
            $carropedido->pedido_idPedido = $idPedido;
            $carropedido->producto_idProducto = $producto['idProducto'];
            $carropedido->cantidad = 0;
            if(isset($producto['cantidad']))
            $carropedido->cantidad = $producto['cantidad'];
            $carropedido->save();
        }
    }

    /**
     * Finds the Pedido model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idPedido
     * @param integer $cliente_idCliente
     * @param integer $estado_idEstado
     * @return Pedido the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idPedido, $cliente_idCliente, $estado_idEstado)
    {
        if (($model = Pedido::findOne(['idPedido' => $idPedido, 'cliente_idCliente' => $cliente_idCliente, 'estado_idEstado' => $estado_idEstado])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
