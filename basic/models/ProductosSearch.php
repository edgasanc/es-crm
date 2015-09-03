<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Productos;

/**
 * ProductosSearch represents the model behind the search form about `app\models\Productos`.
 */
class ProductosSearch extends Productos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idProductos', 'codigo', 'embalaje', 'impuesto', 'precio'], 'integer'],
            [['producto', 'fechaCreacion'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Productos::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'idProductos' => $this->idProductos,
            'codigo' => $this->codigo,
            'embalaje' => $this->embalaje,
            'impuesto' => $this->impuesto,
            'precio' => $this->precio,
            'fechaCreacion' => $this->fechaCreacion,
        ]);

        $query->andFilterWhere(['like', 'producto', $this->producto]);

        return $dataProvider;
    }
}
