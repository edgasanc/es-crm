<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Carropedido;

/**
 * CarropedidoSearch represents the model behind the search form about `app\models\Carropedido`.
 */
class CarropedidoSearch extends Carropedido
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idCarroPedido', 'pedido_idPedido', 'producto_idProducto', 'cantidad'], 'integer'],
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
        $query = Carropedido::find();

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
            'idCarroPedido' => $this->idCarroPedido,
            'pedido_idPedido' => $this->pedido_idPedido,
            'producto_idProducto' => $this->producto_idProducto,
            'cantidad' => $this->cantidad,
        ]);

        return $dataProvider;
    }
}
