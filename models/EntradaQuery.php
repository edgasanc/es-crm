<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Entrada]].
 *
 * @see Entrada
 */
class EntradaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Entrada[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Entrada|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}