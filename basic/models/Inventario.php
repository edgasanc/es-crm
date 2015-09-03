<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%inventario}}".
 *
 * @property integer $idAlmacen
 * @property integer $productos_idProducos
 * @property integer $cantidad
 * @property string $create_time
 * @property string $update_time
 *
 * @property Productos $productosIdProducos
 */
class Inventario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%inventario}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['productos_idProducos'], 'required'],
            [['productos_idProducos', 'cantidad'], 'integer'],
            [['create_time', 'update_time'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idAlmacen' => 'Id Almacen',
            'productos_idProducos' => 'Productos Id Producos',
            'cantidad' => 'Cantidad',
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
     * @return InventarioQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new InventarioQuery(get_called_class());
    }
}
