<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Impuesto;

/**
 * ImpuestoSearch represents the model behind the search form about `app\models\Impuesto`.
 */
class ImpuestoSearch extends Impuesto
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idImpuesto'], 'integer'],
            [['nombre'], 'safe'],
            [['valor'], 'number'],
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
        $query = Impuesto::find();

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
            'idImpuesto' => $this->idImpuesto,
            'valor' => $this->valor,
        ]);

        $query->andFilterWhere(['like', 'nombre', $this->nombre]);

        return $dataProvider;
    }
}
