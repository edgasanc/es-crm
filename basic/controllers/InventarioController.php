<?php

namespace app\controllers;

use Yii;
use app\models\Inventario;
use app\models\InvenatioSearch;
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
        $searchModel = new InvenatioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Inventario model.
     * @param integer $idAlmacen
     * @param integer $productos_idProducos
     * @return mixed
     */
    public function actionView($idAlmacen, $productos_idProducos)
    {
        return $this->render('view', [
            'model' => $this->findModel($idAlmacen, $productos_idProducos),
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
            return $this->redirect(['view', 'idAlmacen' => $model->idAlmacen, 'productos_idProducos' => $model->productos_idProducos]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Inventario model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idAlmacen
     * @param integer $productos_idProducos
     * @return mixed
     */
    public function actionUpdate($idAlmacen, $productos_idProducos)
    {
        $model = $this->findModel($idAlmacen, $productos_idProducos);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idAlmacen' => $model->idAlmacen, 'productos_idProducos' => $model->productos_idProducos]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Inventario model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idAlmacen
     * @param integer $productos_idProducos
     * @return mixed
     */
    public function actionDelete($idAlmacen, $productos_idProducos)
    {
        $this->findModel($idAlmacen, $productos_idProducos)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Inventario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idAlmacen
     * @param integer $productos_idProducos
     * @return Inventario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idAlmacen, $productos_idProducos)
    {
        if (($model = Inventario::findOne(['idAlmacen' => $idAlmacen, 'productos_idProducos' => $productos_idProducos])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
