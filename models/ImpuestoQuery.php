<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Impuesto]].
 *
 * @see Impuesto
 */
class ImpuestoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Impuesto[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Impuesto|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}