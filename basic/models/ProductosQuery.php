<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Productos]].
 *
 * @see Productos
 */
class ProductosQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Productos[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Productos|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}