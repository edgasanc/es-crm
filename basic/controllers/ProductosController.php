<?php

namespace app\controllers;

use Yii;
use app\models\Productos;
use app\models\ProductosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductosController implements the CRUD actions for Productos model.
 */
class ProductosController extends Controller
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
     * Lists all Productos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Productos model.
     * @param integer $idProducos
     * @param integer $embalaje_idEmbalaje
     * @param integer $impuestos_idImpuesto
     * @return mixed
     */
    public function actionView($idProducos, $embalaje_idEmbalaje, $impuestos_idImpuesto)
    {
        return $this->render('view', [
            'model' => $this->findModel($idProducos, $embalaje_idEmbalaje, $impuestos_idImpuesto),
        ]);
    }

    /**
     * Creates a new Productos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Productos();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idProducos' => $model->idProducos, 'embalaje_idEmbalaje' => $model->embalaje_idEmbalaje, 'impuestos_idImpuesto' => $model->impuestos_idImpuesto]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Productos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idProducos
     * @param integer $embalaje_idEmbalaje
     * @param integer $impuestos_idImpuesto
     * @return mixed
     */
    public function actionUpdate($idProducos, $embalaje_idEmbalaje, $impuestos_idImpuesto)
    {
        $model = $this->findModel($idProducos, $embalaje_idEmbalaje, $impuestos_idImpuesto);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idProducos' => $model->idProducos, 'embalaje_idEmbalaje' => $model->embalaje_idEmbalaje, 'impuestos_idImpuesto' => $model->impuestos_idImpuesto]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Productos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idProducos
     * @param integer $embalaje_idEmbalaje
     * @param integer $impuestos_idImpuesto
     * @return mixed
     */
    public function actionDelete($idProducos, $embalaje_idEmbalaje, $impuestos_idImpuesto)
    {
        $this->findModel($idProducos, $embalaje_idEmbalaje, $impuestos_idImpuesto)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Productos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idProducos
     * @param integer $embalaje_idEmbalaje
     * @param integer $impuestos_idImpuesto
     * @return Productos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idProducos, $embalaje_idEmbalaje, $impuestos_idImpuesto)
    {
        if (($model = Productos::findOne(['idProducos' => $idProducos, 'embalaje_idEmbalaje' => $embalaje_idEmbalaje, 'impuestos_idImpuesto' => $impuestos_idImpuesto])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}