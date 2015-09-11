<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Carropedido]].
 *
 * @see Carropedido
 */
class CarropedidoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Carropedido[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Carropedido|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}