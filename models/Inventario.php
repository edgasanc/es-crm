<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inventario".
 *
 * @property integer $idInventario
 * @property integer $producto_idProducto
 * @property integer $stock
 *
 * @property Producto $productoIdProducto
 */
class Inventario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inventario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['producto_idProducto'], 'required'],
            [['producto_idProducto', 'stock'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idInventario' => Yii::t('app', 'Id'),
            'producto_idProducto' => Yii::t('app', 'Producto'),
            'stock' => Yii::t('app', 'Cantidad en almacén'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductoIdProducto()
    {
        return $this->hasOne(Producto::className(), ['idProducto' => 'producto_idProducto']);
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
