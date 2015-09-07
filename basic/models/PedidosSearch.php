<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pedidos;

/**
 * PedidosSearch represents the model behind the search form about `app\models\Pedidos`.
 */
class PedidosSearch extends Pedidos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idPedidos', 'clientes_idClientes', 'estado_idEstado'], 'integer'],
            [['fechaEntrega', 'create_time', 'update_time'], 'safe'],
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
        $query = Pedidos::find();

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
            'idPedidos' => $this->idPedidos,
            'clientes_idClientes' => $this->clientes_idClientes,
            'fechaEntrega' => $this->fechaEntrega,
            'estado_idEstado' => $this->estado_idEstado,
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
        ]);

        return $dataProvider;
    }
}
