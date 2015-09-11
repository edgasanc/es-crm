<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "salida".
 *
 * @property integer $idSalida
 * @property integer $pedido_idPedido
 * @property integer $producto_idProducto
 * @property integer $cantidad
 * @property string $precio
 *
 * @property Pedido $pedidoIdPedido
 * @property Producto $productoIdProducto
 */
class Salida extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'salida';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pedido_idPedido', 'producto_idProducto', 'cantidad', 'precio'], 'required'],
            [['pedido_idPedido', 'producto_idProducto', 'cantidad'], 'integer'],
            [['precio'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idSalida' => Yii::t('app', 'Id Salida'),
            'pedido_idPedido' => Yii::t('app', 'Pedido Id Pedido'),
            'producto_idProducto' => Yii::t('app', 'Producto Id Producto'),
            'cantidad' => Yii::t('app', 'Cantidad'),
            'precio' => Yii::t('app', 'Precio'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedidoIdPedido()
    {
        return $this->hasOne(Pedido::className(), ['idPedido' => 'pedido_idPedido']);
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
     * @return SalidaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SalidaQuery(get_called_class());
    }
}
