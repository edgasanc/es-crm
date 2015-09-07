<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Carropedidos]].
 *
 * @see Carropedidos
 */
class CarropedidosQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Carropedidos[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Carropedidos|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}