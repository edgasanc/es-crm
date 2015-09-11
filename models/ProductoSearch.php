<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Producto;

/**
 * ProductoSearch represents the model behind the search form about `app\models\Producto`.
 */
class ProductoSearch extends Producto
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idProducto', 'codigo', 'embalaje_idEmbalaje', 'impuestos_idImpuesto'], 'integer'],
            [['producto'], 'safe'],
            [['precio'], 'number'],
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
        $query = Producto::find();

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
            'idProducto' => $this->idProducto,
            'codigo' => $this->codigo,
            'precio' => $this->precio,
            'embalaje_idEmbalaje' => $this->embalaje_idEmbalaje,
            'impuestos_idImpuesto' => $this->impuestos_idImpuesto,
        ]);

        $query->andFilterWhere(['like', 'producto', $this->producto]);

        return $dataProvider;
    }
}
