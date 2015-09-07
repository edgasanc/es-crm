<?php

namespace app\controllers;

use Yii;
use app\models\Entrada;
use app\models\EntradaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EntradaController implements the CRUD actions for Entrada model.
 */
class EntradaController extends Controller
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
     * Lists all Entrada models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EntradaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Entrada model.
     * @param integer $idEntrada
     * @param integer $producto_idProducto
     * @return mixed
     */
    public function actionView($idEntrada, $producto_idProducto)
    {
        return $this->render('view', [
            'model' => $this->findModel($idEntrada, $producto_idProducto),
        ]);
    }

    /**
     * Creates a new Entrada model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Entrada();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idEntrada' => $model->idEntrada, 'producto_idProducto' => $model->producto_idProducto]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Entrada model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idEntrada
     * @param integer $producto_idProducto
     * @return mixed
     */
    public function actionUpdate($idEntrada, $producto_idProducto)
    {
        $model = $this->findModel($idEntrada, $producto_idProducto);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idEntrada' => $model->idEntrada, 'producto_idProducto' => $model->producto_idProducto]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Entrada model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idEntrada
     * @param integer $producto_idProducto
     * @return mixed
     */
    public function actionDelete($idEntrada, $producto_idProducto)
    {
        $this->findModel($idEntrada, $producto_idProducto)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Entrada model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idEntrada
     * @param integer $producto_idProducto
     * @return Entrada the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idEntrada, $producto_idProducto)
    {
        if (($model = Entrada::findOne(['idEntrada' => $idEntrada, 'producto_idProducto' => $producto_idProducto])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
