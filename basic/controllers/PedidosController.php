<?php

namespace app\controllers;

use Yii;
use app\models\Pedidos;
use app\models\PedidosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PedidosController implements the CRUD actions for Pedidos model.
 */
class PedidosController extends Controller
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
     * Lists all Pedidos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PedidosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pedidos model.
     * @param integer $idPedidos
     * @param integer $clientes_idClientes
     * @return mixed
     */
    public function actionView($idPedidos, $clientes_idClientes)
    {
        return $this->render('view', [
            'model' => $this->findModel($idPedidos, $clientes_idClientes),
        ]);
    }

    /**
     * Creates a new Pedidos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pedidos();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idPedidos' => $model->idPedidos, 'clientes_idClientes' => $model->clientes_idClientes]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Pedidos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idPedidos
     * @param integer $clientes_idClientes
     * @return mixed
     */
    public function actionUpdate($idPedidos, $clientes_idClientes)
    {
        $model = $this->findModel($idPedidos, $clientes_idClientes);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idPedidos' => $model->idPedidos, 'clientes_idClientes' => $model->clientes_idClientes]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Pedidos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idPedidos
     * @param integer $clientes_idClientes
     * @return mixed
     */
    public function actionDelete($idPedidos, $clientes_idClientes)
    {
        $this->findModel($idPedidos, $clientes_idClientes)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pedidos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idPedidos
     * @param integer $clientes_idClientes
     * @return Pedidos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idPedidos, $clientes_idClientes)
    {
        if (($model = Pedidos::findOne(['idPedidos' => $idPedidos, 'clientes_idClientes' => $clientes_idClientes])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
