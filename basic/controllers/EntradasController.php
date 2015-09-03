<?php

namespace app\controllers;

use Yii;
use app\models\Entradas;
use app\models\EntradasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EntradasController implements the CRUD actions for Entradas model.
 */
class EntradasController extends Controller
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
     * Lists all Entradas models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EntradasSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Entradas model.
     * @param integer $idEntradas
     * @param integer $productos_idProducos
     * @return mixed
     */
    public function actionView($idEntradas, $productos_idProducos)
    {
        return $this->render('view', [
            'model' => $this->findModel($idEntradas, $productos_idProducos),
        ]);
    }

    /**
     * Creates a new Entradas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Entradas();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idEntradas' => $model->idEntradas, 'productos_idProducos' => $model->productos_idProducos]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Entradas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $idEntradas
     * @param integer $productos_idProducos
     * @return mixed
     */
    public function actionUpdate($idEntradas, $productos_idProducos)
    {
        $model = $this->findModel($idEntradas, $productos_idProducos);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idEntradas' => $model->idEntradas, 'productos_idProducos' => $model->productos_idProducos]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Entradas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $idEntradas
     * @param integer $productos_idProducos
     * @return mixed
     */
    public function actionDelete($idEntradas, $productos_idProducos)
    {
        $this->findModel($idEntradas, $productos_idProducos)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Entradas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $idEntradas
     * @param integer $productos_idProducos
     * @return Entradas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idEntradas, $productos_idProducos)
    {
        if (($model = Entradas::findOne(['idEntradas' => $idEntradas, 'productos_idProducos' => $productos_idProducos])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
