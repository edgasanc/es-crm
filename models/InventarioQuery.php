<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Inventario]].
 *
 * @see Inventario
 */
class InventarioQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Inventario[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Inventario|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}