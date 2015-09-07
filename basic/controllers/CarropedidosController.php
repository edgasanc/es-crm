<?php

namespace app\controllers;

use Yii;
use app\models\Carropedidos;
use app\models\CarropedidosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CarropedidosController implements the CRUD actions for Carropedidos model.
 */
class CarropedidosController extends Controller
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
     * Lists all Carropedidos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CarropedidosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Carropedidos model.
     * @param integer $idCarroPedidos
     * @param integer $pedidos_idPedidos
     * @param integer $productos_idProducos
     * @return mixed
     */
    public function actionView($idCarroPedidos, $pedidos_idPedidos, $productos_idProducos)
    {
        return $this->render('view', [
            'model' => $this->findModel($idCarroPedidos, $pedidos_idPedidos, $productos_idProducos),
        ]);
    }

    /**
     * Creates a new Carropedidos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Carropedidos();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idCarroPedidos' => $model->idCarroPedidos, 'pedidos_idPedidos' => $model->pedidos_idPedidos, 'productos_idProducos' => $model->productos_idProducos]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Carropedidos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idCarroPedidos
     * @param integer $pedidos_idPedidos
     * @param integer $productos_idProducos
     * @return mixed
     */
    public function actionUpdate($idCarroPedidos, $pedidos_idPedidos, $productos_idProducos)
    {
        $model = $this->findModel($idCarroPedidos, $pedidos_idPedidos, $productos_idProducos);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idCarroPedidos' => $model->idCarroPedidos, 'pedidos_idPedidos' => $model->pedidos_idPedidos, 'productos_idProducos' => $model->productos_idProducos]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Carropedidos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idCarroPedidos
     * @param integer $pedidos_idPedidos
     * @param integer $productos_idProducos
     * @return mixed
     */
    public function actionDelete($idCarroPedidos, $pedidos_idPedidos, $productos_idProducos)
    {
        $this->findModel($idCarroPedidos, $pedidos_idPedidos, $productos_idProducos)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Carropedidos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idCarroPedidos
     * @param integer $pedidos_idPedidos
     * @param integer $productos_idProducos
     * @return Carropedidos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idCarroPedidos, $pedidos_idPedidos, $productos_idProducos)
    {
        if (($model = Carropedidos::findOne(['idCarroPedidos' => $idCarroPedidos, 'pedidos_idPedidos' => $pedidos_idPedidos, 'productos_idProducos' => $productos_idProducos])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
