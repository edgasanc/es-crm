<?php

namespace app\controllers;

use Yii;
use app\models\Carropedido;
use app\models\CarropedidoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CarropedidoController implements the CRUD actions for Carropedido model.
 */
class CarropedidoController extends Controller
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
     * Lists all Carropedido models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CarropedidoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Carropedido model.
     * @param integer $idCarroPedido
     * @param integer $pedido_idPedido
     * @param integer $producto_idProducto
     * @return mixed
     */
    public function actionView($idCarroPedido, $pedido_idPedido, $producto_idProducto)
    {
        return $this->render('view', [
            'model' => $this->findModel($idCarroPedido, $pedido_idPedido, $producto_idProducto),
        ]);
    }

    /**
     * Creates a new Carropedido model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Carropedido();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idCarroPedido' => $model->idCarroPedido, 'pedido_idPedido' => $model->pedido_idPedido, 'producto_idProducto' => $model->producto_idProducto]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Carropedido model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idCarroPedido
     * @param integer $pedido_idPedido
     * @param integer $producto_idProducto
     * @return mixed
     */
    public function actionUpdate($idCarroPedido, $pedido_idPedido, $producto_idProducto)
    {
        $model = $this->findModel($idCarroPedido, $pedido_idPedido, $producto_idProducto);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idCarroPedido' => $model->idCarroPedido, 'pedido_idPedido' => $model->pedido_idPedido, 'producto_idProducto' => $model->producto_idProducto]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Carropedido model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idCarroPedido
     * @param integer $pedido_idPedido
     * @param integer $producto_idProducto
     * @return mixed
     */
    public function actionDelete($idCarroPedido, $pedido_idPedido, $producto_idProducto)
    {
        $this->findModel($idCarroPedido, $pedido_idPedido, $producto_idProducto)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Carropedido model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idCarroPedido
     * @param integer $pedido_idPedido
     * @param integer $producto_idProducto
     * @return Carropedido the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idCarroPedido, $pedido_idPedido, $producto_idProducto)
    {
        if (($model = Carropedido::findOne(['idCarroPedido' => $idCarroPedido, 'pedido_idPedido' => $pedido_idPedido, 'producto_idProducto' => $producto_idProducto])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
