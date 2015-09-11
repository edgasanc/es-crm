<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "embalaje".
 *
 * @property integer $idEmbalaje
 * @property string $nombre
 *
 * @property Producto[] $productos
 */
class Embalaje extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'embalaje';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idEmbalaje' => Yii::t('app', 'Id'),
            'nombre' => Yii::t('app', 'Nombre'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductos()
    {
        return $this->hasMany(Producto::className(), ['embalaje_idEmbalaje' => 'idEmbalaje']);
    }

    /**
     * @inheritdoc
     * @return EmbalajeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EmbalajeQuery(get_called_class());
    }
}
