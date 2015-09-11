<?php

namespace app\controllers;

use Yii;
use app\models\Salida;
use app\models\SalidaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SalidaController implements the CRUD actions for Salida model.
 */
class SalidaController extends Controller
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
     * Lists all Salida models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SalidaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Salida model.
     * @param integer $idSalida
     * @param integer $pedido_idPedido
     * @param integer $producto_idProducto
     * @return mixed
     */
    public function actionView($idSalida, $pedido_idPedido, $producto_idProducto)
    {
        return $this->render('view', [
            'model' => $this->findModel($idSalida, $pedido_idPedido, $producto_idProducto),
        ]);
    }

    /**
     * Creates a new Salida model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Salida();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idSalida' => $model->idSalida, 'pedido_idPedido' => $model->pedido_idPedido, 'producto_idProducto' => $model->producto_idProducto]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Salida model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idSalida
     * @param integer $pedido_idPedido
     * @param integer $producto_idProducto
     * @return mixed
     */
    public function actionUpdate($idSalida, $pedido_idPedido, $producto_idProducto)
    {
        $model = $this->findModel($idSalida, $pedido_idPedido, $producto_idProducto);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idSalida' => $model->idSalida, 'pedido_idPedido' => $model->pedido_idPedido, 'producto_idProducto' => $model->producto_idProducto]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Salida model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idSalida
     * @param integer $pedido_idPedido
     * @param integer $producto_idProducto
     * @return mixed
     */
    public function actionDelete($idSalida, $pedido_idPedido, $producto_idProducto)
    {
        $this->findModel($idSalida, $pedido_idPedido, $producto_idProducto)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Salida model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idSalida
     * @param integer $pedido_idPedido
     * @param integer $producto_idProducto
     * @return Salida the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idSalida, $pedido_idPedido, $producto_idProducto)
    {
        if (($model = Salida::findOne(['idSalida' => $idSalida, 'pedido_idPedido' => $pedido_idPedido, 'producto_idProducto' => $producto_idProducto])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
