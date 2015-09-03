<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Clientes]].
 *
 * @see Clientes
 */
class ClientesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Clientes[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Clientes|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}