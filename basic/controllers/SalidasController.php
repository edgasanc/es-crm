<?php

namespace app\controllers;

use Yii;
use app\models\Salidas;
use app\models\SalidasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SalidasController implements the CRUD actions for Salidas model.
 */
class SalidasController extends Controller
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
     * Lists all Salidas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SalidasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Salidas model.
     * @param integer $idSalidas
     * @param integer $pedidos_idPedidos
     * @param integer $productos_idProducos
     * @return mixed
     */
    public function actionView($idSalidas, $pedidos_idPedidos, $productos_idProducos)
    {
        return $this->render('view', [
            'model' => $this->findModel($idSalidas, $pedidos_idPedidos, $productos_idProducos),
        ]);
    }

    /**
     * Creates a new Salidas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Salidas();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idSalidas' => $model->idSalidas, 'pedidos_idPedidos' => $model->pedidos_idPedidos, 'productos_idProducos' => $model->productos_idProducos]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Salidas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idSalidas
     * @param integer $pedidos_idPedidos
     * @param integer $productos_idProducos
     * @return mixed
     */
    public function actionUpdate($idSalidas, $pedidos_idPedidos, $productos_idProducos)
    {
        $model = $this->findModel($idSalidas, $pedidos_idPedidos, $productos_idProducos);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idSalidas' => $model->idSalidas, 'pedidos_idPedidos' => $model->pedidos_idPedidos, 'productos_idProducos' => $model->productos_idProducos]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Salidas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idSalidas
     * @param integer $pedidos_idPedidos
     * @param integer $productos_idProducos
     * @return mixed
     */
    public function actionDelete($idSalidas, $pedidos_idPedidos, $productos_idProducos)
    {
        $this->findModel($idSalidas, $pedidos_idPedidos, $productos_idProducos)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Salidas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idSalidas
     * @param integer $pedidos_idPedidos
     * @param integer $productos_idProducos
     * @return Salidas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idSalidas, $pedidos_idPedidos, $productos_idProducos)
    {
        if (($model = Salidas::findOne(['idSalidas' => $idSalidas, 'pedidos_idPedidos' => $pedidos_idPedidos, 'productos_idProducos' => $productos_idProducos])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
