<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pedido;

/**
 * PedidoSearch represents the model behind the search form about `app\models\Pedido`.
 */
class PedidoSearch extends Pedido
{

    public $dirCliente;
    public $nitCliente;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idPedido', 'cliente_idCliente', 'estado_idEstado'], 'integer'],
            [['fechaEntrega', 'fechaOrden', 'nitCliente', 'dirCliente'], 'safe'],
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
        $query = Pedido::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            $query->joinWith(['clienteIdCliente']);
            return $dataProvider;
        }

        $query->andFilterWhere([
            'idPedido' => $this->idPedido,
            'cliente_idCliente' => $this->cliente_idCliente,
            'fechaEntrega' => $this->fechaEntrega,
            'fechaOrden' => $this->fechaOrden,
            'estado_idEstado' => $this->estado_idEstado,
        ]);

        $query->joinWith(['clienteIdCliente' => function ($q) {
            $q->where('cliente.nit LIKE "' . $this->nitCliente . '%"');
            $q->andWhere('cliente.direccion LIKE "%' . $this->dirCliente . '%"');
        }]);

        return $dataProvider;
    }


    public function search2($params)
    {
        $query = Pedido::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            $query->joinWith(['clienteIdCliente']);
            return $dataProvider;
        }

        $query->andFilterWhere([
            'owner' => Yii::$app->user->identity->getId(),
            'idPedido' => $this->idPedido,
            'cliente_idCliente' => $this->cliente_idCliente,
            'fechaEntrega' => $this->fechaEntrega,
            'fechaOrden' => $this->fechaOrden,
            'estado_idEstado' => $this->estado_idEstado,
        ]);
        $query->joinWith(['clienteIdCliente' => function ($q) {
            $q->where('cliente.nit LIKE "' . $this->nitCliente . '%"');
        }]);

        return $dataProvider;
    }
}
