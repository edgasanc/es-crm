<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%entradas}}".
 *
 * @property integer $idEntradas
 * @property integer $productos_idProducos
 * @property integer $cantidad
 * @property string $precio
 * @property string $create_time
 * @property string $update_time
 *
 * @property Productos $productosIdProducos
 */
class Entradas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%entradas}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['productos_idProducos'], 'required'],
            [['productos_idProducos', 'cantidad'], 'integer'],
            [['precio'], 'number'],
            [['create_time', 'update_time'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idEntradas' => 'Id Entradas',
            'productos_idProducos' => 'Productos Id Producos',
            'cantidad' => 'Cantidad',
            'precio' => 'Precio',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductosIdProducos()
    {
        return $this->hasOne(Productos::className(), ['idProducos' => 'productos_idProducos']);
    }

    /**
     * @inheritdoc
     * @return EntradasQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EntradasQuery(get_called_class());
    }
}
