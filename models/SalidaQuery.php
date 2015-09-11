<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Salida]].
 *
 * @see Salida
 */
class SalidaQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Salida[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Salida|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}