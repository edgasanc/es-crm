<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Salidas]].
 *
 * @see Salidas
 */
class SalidasQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Salidas[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Salidas|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}