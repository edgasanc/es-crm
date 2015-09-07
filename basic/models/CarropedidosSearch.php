<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Carropedidos;

/**
 * CarropedidosSearch represents the model behind the search form about `app\models\Carropedidos`.
 */
class CarropedidosSearch extends Carropedidos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idCarroPedidos', 'pedidos_idPedidos', 'productos_idProducos', 'cantidad'], 'integer'],
            [['create_time', 'update_time'], 'safe'],
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
        $query = Carropedidos::find();

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
            'idCarroPedidos' => $this->idCarroPedidos,
            'pedidos_idPedidos' => $this->pedidos_idPedidos,
            'productos_idProducos' => $this->productos_idProducos,
            'cantidad' => $this->cantidad,
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
        ]);

        return $dataProvider;
    }
}
