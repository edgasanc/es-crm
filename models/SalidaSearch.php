<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Salida;

/**
 * SalidaSearch represents the model behind the search form about `app\models\Salida`.
 */
class SalidaSearch extends Salida
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idSalida', 'pedido_idPedido', 'producto_idProducto', 'cantidad'], 'integer'],
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
        $query = Salida::find();

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
            'idSalida' => $this->idSalida,
            'pedido_idPedido' => $this->pedido_idPedido,
            'producto_idProducto' => $this->producto_idProducto,
            'cantidad' => $this->cantidad,
            'precio' => $this->precio,
        ]);

        return $dataProvider;
    }
}
