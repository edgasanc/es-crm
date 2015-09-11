<?php

namespace app\controllers;

use Yii;
use app\models\Inventario;
use app\models\InventarioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * InventarioController implements the CRUD actions for Inventario model.
 */
class InventarioController extends Controller
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
     * Lists all Inventario models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InventarioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Inventario model.
     * @param integer $idInventario
     * @param integer $producto_idProducto
     * @return mixed
     */
    public function actionView($idInventario, $producto_idProducto)
    {
        return $this->render('view', [
            'model' => $this->findModel($idInventario, $producto_idProducto),
        ]);
    }

    /**
     * Creates a new Inventario model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Inventario();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idInventario' => $model->idInventario, 'producto_idProducto' => $model->producto_idProducto]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Inventario model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idInventario
     * @param integer $producto_idProducto
     * @return mixed
     */
    public function actionUpdate($idInventario, $producto_idProducto)
    {
        $model = $this->findModel($idInventario, $producto_idProducto);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idInventario' => $model->idInventario, 'producto_idProducto' => $model->producto_idProducto]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Inventario model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idInventario
     * @param integer $producto_idProducto
     * @return mixed
     */
    public function actionDelete($idInventario, $producto_idProducto)
    {
        $this->findModel($idInventario, $producto_idProducto)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Inventario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idInventario
     * @param integer $producto_idProducto
     * @return Inventario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idInventario, $producto_idProducto)
    {
        if (($model = Inventario::findOne(['idInventario' => $idInventario, 'producto_idProducto' => $producto_idProducto])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
