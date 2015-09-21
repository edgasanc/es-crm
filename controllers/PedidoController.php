<?php

namespace app\controllers;

use app\models\Carropedido;
use app\models\Inventario;
use app\models\Producto;
use app\models\ProductoDeCarro;
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
        if(Yii::$app->user->identity!=null && Yii::$app->user->identity->username=="admin")
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
            return $this->redirect(['pick', 'idPedido' => $model->idPedido]);
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
        $now = new \DateTime();
        $pedido = Pedido::findOne(['idPedido'=>$idPedido]);
        $entrega = new \DateTime($pedido->fechaEntrega);
        return $this->render('pick', [
            'model' => $pedido,
        ]);
        /*
        $entrega = $entrega->sub(new \DateInterval('P0Y0M0DT7H'));
        if($now<$entrega)
            return $this->render('pick', [
                'model' => $pedido,
            ]);
        else return $this->render('forbidden', [
            'model' => $pedido,
        ]);
        */
    }

    public function actionItems($idPedido){
        $contenido_pedido = Carropedido::findAll(['pedido_idPedido'=>$idPedido]);
        $id_productos = array_map(function($o) { return $o->producto_idProducto; }, $contenido_pedido);
        $productos = Producto::find()->where(['NOT IN','idProducto',$id_productos])->all();
        $items = array_map(function($u) {

            $temp = Inventario::findOne(['producto_IdProducto'=>$u->idProducto]);
            if(empty($temp)) $existencias = 0;
            else $existencias = $temp->stock;
            $row['idProducto']=($u->idProducto);
            $row['codigo']=($u->codigo);
            $row['nombre']=($u->producto);
            $row['precio']=($u->precio);
            $row['embalaje']=($u->embalajeIdEmbalaje->nombre);
            $row['existencias']=($existencias);

            return $row;
        }, $productos);
        return Json::encode($items);
    }

    public function actionItemsPedidos($idPedido){
        
        $contenido_pedido = Carropedido::findAll(['pedido_idPedido'=>$idPedido]);
        $id_productos = array_map(function($o) { return $o->producto_idProducto; }, $contenido_pedido);
        $productos = Producto::find()->where(['IN','idProducto',$id_productos])->all();
        $items = array_map(function($u) use ($idPedido) {

            $temp = Carropedido::findOne(['pedido_idPedido'=>$idPedido,
                'producto_idProducto'=>$u->idProducto]);
                
            if(empty($temp)) $cantidad = 0;
            else $cantidad = $temp->cantidad;
            $row['idProducto']=($u->idProducto);
            $row['codigo']=($u->codigo);
            $row['nombre']=($u->producto);
            $row['precio']=($u->precio);
            $row['embalaje']=($u->embalajeIdEmbalaje->nombre);
            $row['cantidad']=($cantidad);

            return $row;
            
        }, $productos);
        return Json::encode($items);
    }

    public function actionSaveItemsPedido(){
        $idPedido = $_POST['idPedido'];
        $data = $_POST['data'];
        $borrados = $_POST['borrados'];

        $lista_productos_a_borrar = json_decode($borrados, true);

        $lista_productos_seleccionados = json_decode($data, true);
        foreach(array_values($lista_productos_a_borrar) as $idProducto){
            $carropedido = Carropedido::find()->where(['pedido_idPedido'=>$idPedido,'producto_idProducto'=>$idProducto]);
            if($carropedido->exists()){
                $carropedido->one()->delete();
            }
        }

        foreach($lista_productos_seleccionados as $producto){

            $idProducto = $producto['idProducto'];

            $carropedido = Carropedido::find()->where(['pedido_idPedido'=>$idPedido,'producto_idProducto'=>$idProducto]);
            if($carropedido->exists()){
                $carropedido = $carropedido->one();
                $carropedido->cantidad = $producto['cantidad'];
            }else{
                $carropedido = new Carropedido();
                $carropedido->pedido_idPedido = $idPedido;
                $carropedido->producto_idProducto = $idProducto;
                $carropedido->cantidad = $producto['cantidad'];
            }
            $carropedido->save();
        }

    }

	public function actionDespachoProductos(){
	    
	    $lista_de_productos = [];
        $mod = true;
	    if(isset($_POST['fecha'])){
	        $fecha = $_POST['fecha'];
    		$lista_de_productos = Pedido::consultarProductosADespachar($fecha);
            $mod = false;
	    }

		return $this->render('despacho',[
			'rows'=>$lista_de_productos,
            'mod'=>$mod,
		]);

	}


    public function actionReporteVentas(){

        $lista_pedidos = [];
        $total = 0;
        $mod = true;
        if(isset($_POST['fechai']) && isset($_POST['fechaf'])){
            $fechai = $_POST['fechai'];
            $fechaf = $_POST['fechaf'];
            $lista_pedidos = Pedido::consultarRegistroVentas($fechai, $fechaf);
            foreach($lista_pedidos as $pedido){
                $total += $pedido['numero_pedidos'];
            }
            $mod = false;
        }

        return $this->render('reporte-ventas',[
            'rows'=>$lista_pedidos,
            'total'=>$total,
            'mod'=>$mod,
        ]);

    }


    public function actionReporteVentasDiario(){

        $lista_pedidos = [];
        $total = 0;
        $mod = true;
        if(isset($_POST['fecha'])){
            $fecha = $_POST['fecha'];
            $fechai = new \DateTime($fecha);
            $lista_pedidos = Pedido::consultarRegistroVentas($fechai->format('Y-m-d'), null);
            foreach($lista_pedidos as $pedido){
                $total += $pedido['numero_pedidos'];
            }
            $mod = false;
        }

        return $this->render('reporte-ventas-diario',[
            'rows'=>$lista_pedidos,
            'total'=>$total,
            'mod'=>$mod,
        ]);
    }

    public function actionReporteVentasMensual(){

        $lista_pedidos = [];
        $total = 0;
        $mod = true;
        if(isset($_POST['mes'])){
            $mes = $_POST['mes'];
            $lista_pedidos = Pedido::consultarRegistrosVentasMes($mes);
            foreach($lista_pedidos as $pedido){
                $total += $pedido['numero_pedidos'];
            }
            $mod = false;
        }

        return $this->render('reporte-ventas-mensual',[
            'rows'=>$lista_pedidos,
            'total'=>$total,
            'mod'=>$mod,
        ]);

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
