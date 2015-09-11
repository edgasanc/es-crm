<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Entrada;

/**
 * EntradaSearch represents the model behind the search form about `app\models\Entrada`.
 */
class EntradaSearch extends Entrada
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idEntrada', 'producto_idProducto', 'cantidad'], 'integer'],

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
        $query = Entrada::find();

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
            'idEntrada' => $this->idEntrada,
            'producto_idProducto' => $this->producto_idProducto,
            'cantidad' => $this->cantidad,
        ]);

        return $dataProvider;
    }
}
