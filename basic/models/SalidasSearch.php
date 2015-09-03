<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Salidas;

/**
 * SalidasSearch represents the model behind the search form about `app\models\Salidas`.
 */
class SalidasSearch extends Salidas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idSalidas', 'pedidos_idPedidos', 'productos_idProducos', 'cantidad'], 'integer'],
            [['precio'], 'number'],
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
        $query = Salidas::find();

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
            'idSalidas' => $this->idSalidas,
            'pedidos_idPedidos' => $this->pedidos_idPedidos,
            'productos_idProducos' => $this->productos_idProducos,
            'cantidad' => $this->cantidad,
            'precio' => $this->precio,
            'create_time' => $this->create_time,
            'update_time' => $this->update_time,
        ]);

        return $dataProvider;
    }
}
